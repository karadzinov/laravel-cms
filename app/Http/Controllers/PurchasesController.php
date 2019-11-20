<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Metadata\Metadata;
use App\Helpers\TwoCheckout\Twocheckout;
use App\Http\Requests\Purchases\CheckoutRequest;
use App\Helpers\TwoCheckout\Twocheckout\Twocheckout_Charge;
use App\Helpers\TwoCheckout\Twocheckout\Api\Twocheckout_Error;
use App\Models\{Product, Purchase, Settings, ShippingInformation, User};

class PurchasesController extends Controller
{
	public $privateKey;
	public $sellerId;

	public function ___construct(){
		
		// $this->middleware('my-purchases');


    	$this->privateKey = Twocheckout::privateKey(config('two-checkout.private_key'));
    	$this->sellerId = Twocheckout::sellerId(config('two-checkout.seller_id'));
    	// // Your username and password are required to make any Admin API call.
    	// Twocheckout::username(config('two-checkout.username'));
    	// Twocheckout::password(config('two-checkout.password'));

    	// // If you want to turn off SSL verification (Please don't do this in your production environment)
    	// Twocheckout::verifySSL(false);  // this is set to true by default

    	// // To use your sandbox account set sandbox to true
    	// Twocheckout::sandbox(true);

    	// // All methods return an Array by default or you can set the format to 'json' to get a JSON response.
    	// Twocheckout::format('json');
		
	}

    public function index(){
    	$userId = auth()->user()->id;
    	$user = User::with('purchases', 'purchases.products')->findOrFail($userId);
        $metadata = new Metadata(trans('general.my-purchases'));
    	
    	return view($this->path.'purchases/index', compact('user', 'metadata'));
    }

    public function show($purchase){
    	$purchase = Purchase::with('user', 'products')->findOrFail($purchase);
    	$settings = Settings::first();
    	$currency = Settings::first()->currencySymbol;
        $metadata = new Metadata(trans('general.my-purchases'));

    	return view($this->path.'purchases/show', compact('purchase', 'settings', 'currency', 'metadata'));
    }

    public function edit($purchase){
    	$purchase = Purchase::with('products')->findOrFail($purchase);
    	if($purchase->completed){
    		return redirect()->back();
    	}
    	$currency = Settings::first()->currencySymbol;
        $metadata = new Metadata(trans('general.edit-purchase'));

    	return view($this->path . 'purchases/edit', compact('purchase', 'currency', 'metadata'));
    }

    public function update(Request $request, $purchase){
		$purchase = Purchase::findOrFail($purchase);

		$products = $request->get('products');
		$productsSold = $this->prepareProductsAndPrice($products);

		$purchase->phone = $request->get('phone');
		$purchase->home_address = $request->get('home_address');
		$purchase->country = $request->get('country');
		$purchase->city = $request->get('city');
		$purchase->zip = $request->get('zip');
		$purchase->save();
		$currency = Settings::first()->currencySymbol;

		return redirect()->route('purchases.payment', $purchase->id);
    }

	public function charge(Request $request){
		$purchase = Purchase::findOrFail($request->get('purchase'));
		if(!empty($request->get('token'))){

		    $charge = $this->chargePurchase($request, $purchase);
		    if($charge["status"]==="success"){

		    	return redirect()->route('purchases.completed');
		    }

			return redirect()->back()->with("error", $charge["message"]);
		}
		
		return redirect()->back()->with("errors", trans('general.general-error'));
	}

	public function completed(){
        $metadata = new Metadata(trans('general.completed'));
		
		return view($this->path.'purchases/completed', compact('metadata'));
	}

	public function chargePurchase(Request $request, Purchase $purchase){
		
		$token  = $request->get('token');
		
		// Card info
		$card_num = $request->get('card_num');
		$card_cvv = $request->get('cvv');
		$card_exp_month = $request->get('exp_month');
		$card_exp_year = $request->get('exp_year');
		
		$currency = Currency::where('active', '=', 1)->first()->name;
		
		Twocheckout::privateKey(config('two-checkout.private_key'));
		Twocheckout::sellerId(config('two-checkout.seller_id'));
		Twocheckout::sandbox(true);
		
		try {
		    // Charge a credit card
		    $charge = Twocheckout_Charge::auth(array(
		        "merchantOrderId" => $purchase->id,
		        "token"      => $token,
		        "currency"   => $currency,
		        "total"      => $purchase->total,
		        "billingAddr" => array(
		            "name" => auth()->user()->name,
		            "addrLine1" => $purchase->home_address,
		            "city" => $purchase->city,
		            "state" => $purchase->country,
		            "zipCode" => $purchase->zip,
		            "country" => $purchase->country,
		            "email" => auth()->user()->email,
		            "phoneNumber" => $purchase->phone
		        )
		    ));
		    if ($charge['response']['responseCode'] == 'APPROVED') {
		        $response = $charge['response'];
		       	$updatedPurchase = $this->updatePurchase($response, $purchase);

		        return ["status"=>"success"];
		    }
		} catch (Twocheckout_Error $e) {

		        return [
		        	"status" => "error",
		        	"message" => $e->getMessage()
		        ];
		}

		return $statusMsg;
	}

	public function updatePurchase($response, Purchase $purchase){
		try {
			// Order details
			$orderNumber = $response['orderNumber'];
			$transactionId = $response['transactionId'];
			$currency = $response['currencyCode'];
			$status = $response['responseCode'];
			$currentProductsPrices = $this->updatePrices($purchase);
			$purchase->order_number = $orderNumber;
			$purchase->transaction_id = $transactionId;
			$purchase->status = $status;
			$purchase->completed = true;
			$purchase->currency = $currency;
			$purchase->save();
			$cleanWishlist = $this->cleanWishlist($purchase);

			return true;
		} catch (Exception $e) {
			
			return false;
		}
	}

	public function cleanWishlist(Purchase $purchase){
		$user = $purchase->user;
		$wishlist = $user->wishlist;
		foreach($wishlist as $item){
			if($purchase->products->contains($item)){
				$user->wishlist()->detach($item);
			}
		}

		return true;
	}

	public function updatePrices(Purchase $purchase){
		
		foreach($purchase->products as $product){
		   $purchase->products()->updateExistingPivot($product, ['current_price' => $product->currentPrice]);
		}

		return true;
	}

	public function store(CheckoutRequest $request){
		$products = $request->get('products');
		$productsSold = $this->prepareProductsAndPrice($products);
		if($request->has('cart')){
			auth()->user()->cart()->detach();
		}

		$purchase = new Purchase();
		$purchase->user_id = auth()->user()->id;
		$purchase->completed = false;
		$purchase->phone = $request->get('phone');
		$purchase->home_address = $request->get('home_address');
		$purchase->country = $request->get('country');
		$purchase->city = $request->get('city');
		$purchase->zip = $request->get('zip');
		$purchase->save();
		if(!$request->has('same_shipping')){
			$this->addShipping($purchase, $request);
		}
		foreach($products as $id => $quantity){
			
			$purchase->products()->save($productsSold->items[$id], ['quantity'=>$quantity]);
		}
		$currency = Settings::first()->currencySymbol;

		return redirect()->route('purchases.payment', $purchase->id);
	}

	public function addShipping(Purchase $purchase, Request $request){
		
		$shipping= new ShippingInformation();
		$shipping->purchase_id = $purchase->id;
		$shipping->first_name = $request->get('shipping_first_name');
		$shipping->last_name = $request->get('shipping_last_name');
		$shipping->phone = $request->get('shipping_phone');
		$shipping->email = $request->get('shipping_email');
		$shipping->home_address = $request->get('shipping_home_address');
		$shipping->country = $request->get('shipping_country');
		$shipping->city = $request->get('shipping_city');
		$shipping->zip = $request->get('shipping_zip');

		return $shipping->save();
	}

	public function payment($purchase){
		$purchase = Purchase::findOrFail($purchase);
    	$currency = Settings::first()->currencySymbol;

		return view($this->path . 'purchases/card', compact('purchase', 'currency'));
	}

    public function buyNow(Request $request){
    	$quantity = $request->get('quantity') ?? 1;
    	$product = Product::findOrFail($request->get('product_id'));
    	$currency = Settings::first()->currencySymbol;
        $metadata = new Metadata($product->name, $product->short_description, $product->thumbnail);

    	$data = compact('product', 'currency', 'quantity', 'metadata');

		return view($this->path . 'purchases/checkout', $data);
    }

    public function prepareProductsAndPrice($products){
    	$items = [];
    	foreach($products as $id => $quantity) {
    		$product = Product::findOrFail($id);
    		$items[$id] = $product;
    	}

    	return (object) compact('items');
    }

    public function checkoutCart(){
    	
    	$cart = auth()->user()->cart;
    	$currency = Settings::first()->currencySymbol;

    	return view($this->path.'purchases/checkout', compact('cart', 'currency'));
    }
}
