<?php

namespace App\Http\Controllers;

use App\Models\{Category, Currency, Product, User};
use Illuminate\Http\Request;

class ProductsController extends Controller
{
     public function index(Request $request){
        
        $products = $this->prepareProducts($request);
        $request = $request->all();
        // dd($request);
     	$currency = Currency::symbol();
        $categories = Category::whereHas('products')->get();

        $cart = collect([]);
        if(auth()->user()){
            $cart = User::where('id', '=', auth()->user()->id)
                    ->first()
                    ->cart()
                    ->get();
        }
        $data = compact('products', 'currency', 'categories', 'cart', 'request');
        
        return view($this->path . 'products/index', $data);
    }

    public function show($product){
     	$currency = Currency::symbol();
    	$product = Product::find($product);
        
    	return view($this->path.'products/show', compact('product', 'currency'));
    }

    public function prepareProducts(Request $request){
        
        $query = Product::where('active', '=', 1);

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
}
