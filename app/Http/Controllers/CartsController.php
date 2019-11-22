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
    			$productId = $request->get('product_id');
    			$check = $user->cart()
    					->where('product_id', '=', $productId)
    					->first();

    			if($check){
    				return response()->json(["status"=>"already-added", "message" => trans('general.already-in-cart')]);
    			}
    			
    			$product = Product::findOrFail($request->get('product_id'));
    			$quantity = $request->get('quantity') ?? 1;
    			$user->cart()->attach($product, ['quantity'=>$quantity]);

    			return response()->json(["status"=>"success", "message" => trans('general.added-to-cart')]);
    		} catch (Exception $e) {
    			
    			return response()->json(["status"=>"failed", "message" => trans('general.cart-error')]);
    		}
    	}

    	return false;	
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
