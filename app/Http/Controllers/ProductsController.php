<?php

namespace App\Http\Controllers;

use App\Models\{Category, Currency, Product, User};
use Illuminate\Http\Request;

class ProductsController extends Controller
{
     public function index(){
     	$currency = Currency::symbol();
        $categories = Category::whereHas('products')->get();
        $products = Product::where('active', '=', 1)->latest()->paginate(20);

        $cart = collect([]);
        if(auth()->user()){
            $cart = User::where('id', '=', auth()->user()->id)->first()->cart()->get();
        }
        $data = compact('products', 'currency', 'categories', 'cart');
        
        return view($this->path . 'products/index', $data);
    }

    public function show($product){
     	$currency = Currency::symbol();
    	$product = Product::find($product);
        
    	return view($this->path.'products/show', compact('product', 'currency'));
    }
}
