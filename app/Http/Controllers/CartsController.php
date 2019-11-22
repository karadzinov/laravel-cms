<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\Metadata\Metadata;
use App\Models\{Product, Settings, User};

class CartsController extends Controller
{
    public function cart(){
		$cart = auth()->user()->cart;
    	$currency = Settings::first()->currencySymbol;
        $metadata = new Metadata(trans('general.my-cart'));

    	return view($this->path.'purchases/cart', compact('cart', 'currency', 'metadata'));
    }
    
    public function addToCart(Request $request){
    	if($request->ajax()){
    		try {
                $user = User::find(auth()->user()->id);
                $cart = $user->cart();
    			$productId = $request->get('product_id');
                $json = ["status"=>"success", "message" => trans('general.added-to-cart')];

    			$check = $cart->where('product_id', '=', $productId)->first();

    			if($check){
    				$json = ["status"=>"already-added", "message" => trans('general.already-in-cart')];
    			}
    			
    			$product = Product::findOrFail($request->get('product_id'));
    			$quantity = $request->get('quantity') ?? 1;
    			$cart->attach($product, ['quantity'=>$quantity]);
                
                if($user->cart->count()===1){
                    $json = $this->initializeCart($user->cart);
                }else{
                    $product = $cart->where('product_id', '=', $product->id)->first();
                    $json["view"] = $this->makeNavCartItem($product);
                }
                
    			return response()->json($json);
    		} catch (Exception $e) {

    			return response()->json(["status"=>"failed", "message" => trans('general.cart-error')]);
    		}
    	}

    	return false;	
    }

    public function makeNavCartItem($product){
          $cart = (object) array();
          $currency = Settings::first()->currencySymbol;
          $cart->currency = $currency;

          $view = view($this->path.'partials/nav-cart-item', compact('product', 'cart'))->render();

          return $view;
    }

    public function initializeCart($cart){

        $currency = Settings::first()->currencySymbol;
        $cart->totalPrice = $this->totalCartPrice($cart).$currency;
        $cart->currency = $currency;

        $view = view($this->path.'partials/nav-cart', compact('cart', 'currency'))->render();
        
        return ["status"   =>"new", 
            "message"   => trans('general.added-to-cart'),
            "view"      => $view
            ];        
    }

    public function totalCartPrice($cart){
       $sum = 0;
       foreach($cart as $product){
           $sum += $product->currentPrice * $product->pivot->quantity;
       }

       return number_format($sum, 2, '.', ' ');
   }
    public function changeQuantity(Request $request){
    	$request->validate([
    	    'product_id' => 'required|numeric',
    	    'quantity' => 'required|numeric',
    	]);
        $quantity = $request->get('quantity');

    	try {
    		$product = Product::findOrFail($request->get('product_id'));
            $availableQuantity = $product->quantity;

            if((null!==$availableQuantity) && (-1 >= $availableQuantity-$quantity)){
                $updateQuantity = $this->updateQuantity($request->get('product_id'), $availableQuantity);
                return response()->json(
                    ['status'=>'warning', 
                    'message'=>trans('general.no-more-on-stock', 
                        ['name'=>$product->name, 'quantity' => $availableQuantity]),
                    'quantity' => (string)$availableQuantity
                    ]
                );      
            }
    		$updateQuantity = $this->updateQuantity($request->get('product_id'), $quantity);
    	} catch (Exception $e) {
			return response()->json(['status'=>'failed', 'message'=>$e->getMessage()]); 		
    	}

    	return response()->json(['status'=>'success', 'message'=>trans('general.succcessfully-updated')]);
    }

    public function updateQuantity($product, $quantity){
        $pivot = auth()->user()->cart()
                    ->where('product_id', '=', $product)
                    ->first()->pivot;

        $pivot->quantity = $quantity;
        $pivot->save();
    }

    public function deleteFromCart(Request $request){
    	$request->validate([
    	    'product_id' => 'required|numeric',
    	]);

    	try {
    		$pivot = auth()->user()->cart()->detach($request->get('product_id'));
    	} catch (Exception $e) {
			return respnse()->json(['status'=>'failed', 'message'=>$e->getMessage()]); 		
    	}
    	
    	return response()->json(['status'=>'success', 'message'=>trans('general.succcessfully-updated')]);
    }
}
