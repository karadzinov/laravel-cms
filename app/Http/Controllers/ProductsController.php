<?php

namespace App\Http\Controllers;

use App\Models\{Currency, Product};
use Illuminate\Http\Request;

class ProductsController extends Controller
{
     public function index(){
     	$currency = Currency::symbol();
        $products = Product::where('active', '=', 1)->paginate(20);

        return view($this->path . 'products/index', compact('products', 'currency'));
    }

    public function show($product){
    	
     	$currency = Currency::symbol();
    	$product = Product::find($product);

    	return view($this->path.'products/show', compact('product', 'currency'));
    }
}
