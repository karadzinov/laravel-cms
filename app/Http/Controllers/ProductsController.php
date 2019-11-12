<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\{Category, Currency, Product, User};

class ProductsController extends Controller
{
     public function index(Request $request){
        
        $products = $this->prepareProducts($request);
        $request = $request->all();
        // dd($request);
     	$currency = Currency::symbol();
        $categories = Category::whereHas('products')->get();

        $cart = collect([]);
        $wishlist = collect([]);
        if(auth()->user()){
           $user = User::where('id', '=', auth()->user()->id)
                    ->first();
           $cart = $user->cart()->get();
           $wishlist = $user->wishlist()->get();

        }
        $data = compact('products', 'currency', 'categories', 'cart', 'wishlist', 'request');
        
        return view($this->path . 'products/index', $data);
    }

    public function show($product){
     	$currency = Currency::symbol();
    	$product = Product::with('reviews', 'reviews.user')->find($product);
        
    	return view($this->path.'products/show', compact('product', 'currency'));
    }

    public function prepareProducts(Request $request){
        
        $query = Product::where('active', '=', 1)->with('reviews', 'reviews.user');

        if($request->get('sort_by')){
            $sort = $request->get('sort_by');
            $query->orderBy($sort, $request->get('order'));
        }
        if($request->get('price_min')){
            $query->where('price', '>', $request->get('price_min'));
        }

        if($request->get('price_max')){
            $query->where('price', '<', $request->get('price_max'));
        }

        if($request->get('category')){
            $query->where('category_id', '=', $request->get('category'));
        }

        return $query->paginate(20);
        
    }

    public function storeReview(Request $request){
        
        $validatedData = $request->validate([
            'content' => 'required|max:1000',
            'rating' => 'required',
        ]);
        // dd($request->all());
        $review = new Review();
        $review->user_id = auth()->user()->id;
        $review->product_id = $request->get('product_id');
        $review->content = $request->get('content');
        $review->rating = $request->get('rating');
        $review->save();
// dd($review);
        return redirect()
                ->route('products.show', ["id"=>$request->get('product_id')])
                ->with('success', trans('general.successfully-added-review'));  
    }
}
