<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category, Currency, Product, Review, User};

class ProductsController extends Controller
{
    public function index(Request $request){
        
        $products = $this->prepareProducts($request);
        $request = $request->all();
        
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

    public function show($slug){

     	$currency = Currency::symbol();
    	$product = Product::with('reviews', 'reviews.user')->where('slug', '=', $slug)->first();
        $canWriteReview = !$product->reviews()->pluck('user_id')->contains(auth()->user()->id);
        
    	return view($this->path.'products/show', compact('product', 'currency', 'canWriteReview'));
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
        $userId = auth()->user()->id;
        $product = Product::findOrFail($request->get('product_id'));

        if($product->reviews()->pluck('user_id')->contains($userId)){
            return redirect()->back()->with(['error'=>trans('general.already-wrote-review')]);
        }

        $review = new Review();
        $review->user_id = $userId;
        $review->product_id = $product->id;
        $review->content = $request->get('content');
        $review->rating = $request->get('rating');
        $review->save();

        return redirect()
                ->route('products.show', ["id"=>$request->get('product_id')])
                ->with('success', trans('general.successfully-added-review'));  
    }

    public function myReviews(){

        $user = User::with('reviews', 'reviews.product')->findOrFail(auth()->user()->id);

        return view($this->path.'reviews/index', compact('user'));
    }

    public function editReview($id){
        
        $review = Review::with('product')->findOrFail($id);
        if($review->user_id != auth()->user()->id){
            abort(403);
        }

        return view($this->path.'reviews/edit', compact('review'));
    }

    public function updatereview(Request $request, $id){
        $validatedData = $request->validate([
            'content' => 'required|max:1000',
            'rating' => 'required',
        ]);

        $review = Review::findOrFail($id);
        $review->content = $request->get('content');
        $review->rating = $request->get('rating');
        $review->save();

        return redirect()->route('products.myReviews')
                ->with(['success'=>trans('general.succcessfully-updated')]);
    }

    public function deleteReview($id){
        
        $review = Review::findOrFail($id);
        if($review->user_id != auth()->user()->id){
            abort(403);
        }

        $review->delete();

        return redirect()->route('products.myReviews')
                ->with(['success'=>trans('general.succcessfully-deleted')]);

    }
}
