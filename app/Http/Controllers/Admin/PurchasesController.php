<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Purchase, Settings};

class PurchasesController extends Controller
{
    public function index(){
    	$purchases = Purchase::with('user', 'products', 'shipping')->latest()->paginate(50);
    	
    	return view('admin/purchases/index', compact('purchases'));
    }

    public function show($purchase){

    	$purchase = Purchase::with('user', 'products')->findOrFail($purchase);
    	$settings = Settings::first();
    	if($purchase->completed){
    		return view('admin/purchases/show', compact('purchase', 'settings'));
    	}
    	$currency =  $settings->currencySymbol;

    	return view('admin/purchases/show-uncompleted', compact('purchase', 'currency'));
    	
    }
}
