<?php
namespace App\Helpers\TwoCheckout\Twocheckout\Api;

use App\Helpers\TwoCheckout\Twocheckout;

class Twocheckout_Payment extends Twocheckout
{

    public static function retrieve()
    {
        $request = new Twocheckout_Api_Requester();
        $urlSuffix = '/api/acct/list_payments';
        $result = $request->doCall($urlSuffix);
        $response = Twocheckout_Util::returnResponse($result);
        return $response;
    }

    public static function pending()
    {
        $request = new Twocheckout_Api_Requester();
        $urlSuffix = '/api/acct/detail_pending_payment';
        $result = $request->doCall($urlSuffix);
        $response = Twocheckout_Util::returnResponse($result);
        return $response;
    }

}