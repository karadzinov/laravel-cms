<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(){
    	
    	$faqs = FAQ::all();

    	return view('user/faq/index', compact('faqs'));
    }
}
