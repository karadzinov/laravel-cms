<?php
namespace App\Helpers\TwoCheckout\Twocheckout\Api;

use App\Helpers\TwoCheckout\Twocheckout;

class Twocheckout_Company extends Twocheckout
{

    public static function retrieve()
    {
        $request = new Twocheckout_Api_Requester();
        $urlSuffix = '/api/acct/detail_company_info';
        $result = $request->doCall($urlSuffix);
        return Twocheckout_Util::returnResponse($result);
    }
}

