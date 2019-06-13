<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function show(Page $page, $title){
    	
    	return view('user/pages/show', compact('page'));
    }
}
