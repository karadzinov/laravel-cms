<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Settings;
use App\Mail\FaqPageEmail;
use Illuminate\Http\Request;
use App\Mail\ContactPageEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Email\EmailRequest;

class EmailController extends Controller
{
    public function faqEmail(EmailRequest $request){
    	
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

    public function contactPageEmail(EmailRequest $request){
        
        try {
            $settings = Settings::first();

            $to = $settings->email;
            $sender = $request->get('name');
            $from = $request->get('email');
            $subject = $request->get('subject');
            $message = $request->get('message');
            $email = (object) compact(
                'to', 'sender', 'from', 'subject', 'message'
            );
            $email = new ContactPageEmail($email);

            Mail::send($email);

            return response()->json(['sent'=>'yes']);
        } catch (Exception $e) {
            return $e->getMessage();
            return response()->json(['sent'=>'no']);
        }
    }
}
