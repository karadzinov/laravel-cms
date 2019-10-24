<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\TwoCheckout\Twocheckout;
use App\Helpers\TwoCheckout\Twocheckout\Twocheckout_Charge;

class PaymentController extends Controller
{
	public $privateKey;
	public $sellerId;

	public function ___construct(){
		
    	$this->privateKey = Twocheckout::privateKey(config('two-checkout.private_key'));
    	$this->sellerId = Twocheckout::sellerId(config('two-checkout.seller_id'));
    	// Your username and password are required to make any Admin API call.
    	Twocheckout::username(config('two-checkout.username'));
    	Twocheckout::password(config('two-checkout.password'));

    	// If you want to turn off SSL verification (Please don't do this in your production environment)
    	Twocheckout::verifySSL(false);  // this is set to true by default

    	// To use your sandbox account set sandbox to true
    	Twocheckout::sandbox(true);

    	// All methods return an Array by default or you can set the format to 'json' to get a JSON response.
    	Twocheckout::format('json');
		
	}

    public function test(){
		    	return view('test-pay');

    	try {
    	    $charge = Twocheckout_Charge::auth(array(
    	        "sellerId" => $this->sellerId,
    	        "merchantOrderId" => "123",
    	        "token" => 'MjFiYzIzYjAtYjE4YS00ZmI0LTg4YzYtNDIzMTBlMjc0MDlk',
    	        "currency" => 'USD',
    	        "total" => '10.00',
    	        "billingAddr" => array(
    	            "name" => 'Testing Tester',
    	            "addrLine1" => '123 Test St',
    	            "city" => 'Columbus',
    	            "state" => 'OH',
    	            "zipCode" => '43123',
    	            "country" => 'USA',
    	            "email" => 'testingtester@2co.com',
    	            "phoneNumber" => '555-555-5555'
    	        ),
    	        "shippingAddr" => array(
    	            "name" => 'Testing Tester',
    	            "addrLine1" => '123 Test St',
    	            "city" => 'Columbus',
    	            "state" => 'OH',
    	            "zipCode" => '43123',
    	            "country" => 'USA',
    	            "email" => 'testingtester@2co.com',
    	            "phoneNumber" => '555-555-5555'
    	        )
    	    ));
    	    $this->assertEquals('APPROVED', $charge['response']['responseCode']);
    	} catch (Twocheckout_Error $e) {
    	    $this->assertEquals('Unauthorized', $e->getMessage());
    	}
    }
}
