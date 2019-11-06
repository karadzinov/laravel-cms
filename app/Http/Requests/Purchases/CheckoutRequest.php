<?php

namespace App\Http\Requests\Purchases;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "phone"                 => "required|numeric",
            "home_address"          => "required|max:191",
            "country"               => "required",
            "city"                  => "required|max:191",
            "zip"                   => "required|numeric",
            
            "shipping_first_name"   => "required_without:same_shipping",
            "shipping_last_name"    => "required_without:same_shipping",
            "shipping_email"        => "required_without:same_shipping",
            "shipping_phone"        => "required_without:same_shipping|numeric",
            "shipping_home_address" => "required_without:same_shipping|max:191",
            "shipping_country"      => "required_without:same_shipping",
            "shipping_city"         => "required_without:same_shipping|max:191",
            "shipping_zip"          => "required_without:same_shipping|numeric",
        ];
    }
}
