<?php

namespace App\Http\Controllers;

use App\Models\{Currency, Product};
use Illuminate\Http\Request;
use App\Helpers\TwoCheckout\Twocheckout;
use App\Helpers\TwoCheckout\Twocheckout\Twocheckout_Charge;
use App\Helpers\TwoCheckout\Twocheckout\Api\Twocheckout_Error;

class PurchasesController extends Controller
{
	public $privateKey;
	public $sellerId;

	public function ___construct(){
		
    	$this->privateKey = Twocheckout::privateKey(config('two-checkout.private_key'));
    	$this->sellerId = Twocheckout::sellerId(config('two-checkout.seller_id'));
    	// // Your username and password are required to make any Admin API call.
    	// Twocheckout::username(config('two-checkout.username'));
    	// Twocheckout::password(config('two-checkout.password'));

    	// // If you want to turn off SSL verification (Please don't do this in your production environment)
    	// Twocheckout::verifySSL(false);  // this is set to true by default

    	// // To use your sandbox account set sandbox to true
    	// Twocheckout::sandbox(true);

    	// // All methods return an Array by default or you can set the format to 'json' to get a JSON response.
    	// Twocheckout::format('json');
		
	}

	public function charge(Request $request){
		// dd($request->get('token'));
		if(!empty($request->get('token'))){
		    
		    // Token info
		    $token  = $request->get('token');
		    
		    // Card info
		    $card_num = $request->get('card_num');
		    $card_cvv = $request->get('cvv');
		    $card_exp_month = $request->get('exp_month');
		    $card_exp_year = $request->get('exp_year');
		    
		    // Buyer info
		    $name = auth()->user()->name;
		    $email = auth()->user()->email;
		    $phoneNumber = '555-555-5555';
		    $addrLine1 = '123 Test St';
		    $city = 'Columbus';
		    $state = 'OH';
		    $zipCode = '43123';
		    $country = 'USA';
		    
		    // Item info
		    $itemName = 'Premium Script CodexWorld';
		    $itemNumber = 'PS123456';
		    $itemPrice = '25.00';
		    $currency = 'USD';
		    $orderID = 'SKA92712382139';
		    
		    // Set API key
		    Twocheckout::privateKey(config('two-checkout.private_key'));
		    Twocheckout::sellerId(config('two-checkout.seller_id'));
		    Twocheckout::sandbox(true);
		    
		    try {
		        // Charge a credit card
		        $charge = Twocheckout_Charge::auth(array(
		            "merchantOrderId" => $orderID,
		            "token"      => $token,
		            "currency"   => $currency,
		            "total"      => $itemPrice,
		            "billingAddr" => array(
		                "name" => $name,
		                "addrLine1" => $addrLine1,
		                "city" => $city,
		                "state" => $state,
		                "zipCode" => $zipCode,
		                "country" => $country,
		                "email" => $email,
		                "phoneNumber" => $phoneNumber
		            )
		        ));
		        
		        // Check whether the charge is successful
		        if ($charge['response']['responseCode'] == 'APPROVED') {
		            
		            // Order details
		            $orderNumber = $charge['response']['orderNumber'];
		            $total = $charge['response']['total'];
		            $transactionId = $charge['response']['transactionId'];
		            $currency = $charge['response']['currencyCode'];
		            $status = $charge['response']['responseCode'];
		            
		            // Include database config file
		            // include_once 'dbConfig.php';
		            
		            // Insert order info to database
		            // $sql = "INSERT INTO orders(name, email, card_num, card_cvv, card_exp_month, card_exp_year, item_name, item_number, item_price, currency, paid_amount, order_number, txn_id, payment_status, created, modified) VALUES('".$name."', '".$email."', '".$card_num."', '".$card_cvv."', '".$card_exp_month."', '".$card_exp_year."', '".$itemName."', '".$itemNumber."','".$itemPrice."', '".$currency."', '".$total."', '".$orderNumber."', '".$transactionId."', '".$status."', NOW(), NOW())";
		            // $insert = $db->query($sql);
		            // $insert_id = $db->insert_id;
		            
		            $statusMsg = '<h2>Thanks for your Order!</h2>';
		            $statusMsg .= '<h4>The transaction was successful. Order details are given below:</h4>';
		            $statusMsg .= "<p>Order ID: insertid</p>";
		            $statusMsg .= "<p>Order Number: {$orderNumber}</p>";
		            $statusMsg .= "<p>Transaction ID: {$transactionId}</p>";
		            $statusMsg .= "<p>Order Total: {$total} {$currency}</p>";
		        }
		    } catch (Twocheckout_Error $e) {
		        $statusMsg = '<h2>Transaction failed!</h2>';
		        $statusMsg .= '<p>'.$e->getMessage().'</p>';
		    }
		    
		}else{
		    $statusMsg = "<p>Form submission error...</p>";
		}
		dd($statusMsg);

		
	}

    public function index(Request $request){
    	$quantity = $request->get('quantity') ?? 1;
    	$product = Product::findOrFail($request->get('product_id'));
    	$currency = Currency::symbol();

    	$data = compact('product', 'currency', 'quantity');

		return view($this->path . 'purchases/checkout', $data);
    }
}
