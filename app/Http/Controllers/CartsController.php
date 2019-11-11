<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\{Currency, Product, User};

class CartsController extends Controller
{
    public function cart(){
		$cart = auth()->user()->cart;
    	$currency = Currency::symbol();

    	return view($this->path.'purchases/cart', compact('cart', 'currency'));
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
    	try {
    		$product = Product::findOrFail($request->get('product_id'));
    		$pivot = auth()->user()->cart()
    					->where('product_id', '=', $request->get('product_id'))
    					->first()->pivot;

    		$pivot->quantity = $request->get('quantity');
    		$pivot->save();
    	} catch (Exception $e) {
			return respnse()->json(['status'=>'failed', 'message'=>$e->getMessage()]); 		
    	}

    	return response()->json(['status'=>'success', 'message'=>trans('general.succcessfully-updated')]);
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
