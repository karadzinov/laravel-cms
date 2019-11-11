<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Currency, Product, User};

class WishlistsController extends Controller
{

	public function index(){
		$user = User::findOrFail(auth()->user()->id);
		$wishlist = $user->wishlist()->get();
		$cart = $user->cart()->get();
		$currency = Currency::symbol();

		return view($this->path.'wishlist/index', compact('wishlist', 'cart', 'currency'));
	}

    public function add(Request $request){
        
       try {
           $product = Product::find($request->get('product_id'));
           $user = User::find(auth()->user()->id);
           if($user->wishlist->contains($product)){
           		return response()->json([
			        "status"=>"already-added",
			        "message"=>trans('general.already-added')
			    ]); 
           }
           $user->wishlist()->save($product);

           return response()->json([
               "status"=>"success",
               "message"=>trans('general.added-to-wishlist')
           ]);

       } catch (Exception $e) {
           
           return response()->json([
               "status"=>"failed",
               "message"=>trans('general.wishlist-error')
           ]);
       }
    }

    public function remove(Request $request){
       try {
           $product = Product::find($request->get('product_id'));
           $user = User::find(auth()->user()->id);
           $user->wishlist()->detach($product);

           return response()->json([
               "status"=>"success",
               "message"=>trans('general.succcessfully-deleted')
           ]);

       } catch (Exception $e) {
           
           return response()->json([
               "status"=>"failed",
               "message"=>trans('general.error_response')
           ]);
       }
    }
}
