<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Settings;
use App\Mail\FaqPageEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function faqEmail(Request $request){
    	
    	try {
    		$settings = Settings::first();

    		$to = $settings->email;
    		$sender = $request->get('name');
    		$from = $request->get('email');
    		$subject = $request->get('subject');
    		$category = $request->get('category');
    		$message = $request->get('message');
    		$email = (object) compact(
    			'to', 'sender', 'from', 'subject', 'category', 'message'
    		);
    		$email = new FaqPageEmail($email);

    		Mail::send($email);

    		return response()->json(['sent'=>'yes']);
    	} catch (Exception $e) {
			
			return $e->getMessage();
    	}
    }
}
