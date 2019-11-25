<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
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
            'title'                 => 'required|max:255',
            'email'                 => 'required|email|max:255',
            'main_url'              => 'required|max:255',
            'address'               => 'required|max:255',
            'phone_number'          => 'required|max:255',
            'logo'                  => 'max:255',
            'slogan'                => 'max:255',
            'meta_image'            => 'max:255',
            'currency'              => 'required',
            'countries'             => 'required',
            'meta_title'            => 'max:255',
            'instagram'             => 'max:255',
            'twitter'               => 'max:255',
            'facebook'              => 'max:255',
            'linkedin'              => 'max:255',
            'ios_app'               => 'max:255',
            'android_app'           => 'max:255',
            'lat'                   => '',
            'lng'                   => '',
        ];
    }

    public function messages()
    {
        return [
            'title.required'        => trans('settings.titleRequired'),
            'email.required'        => trans('settings.emailRequired'),
            'email.email'           => trans('settings.emailInvalid'),                
            'address.required'      => trans('settings.addressRequired'),
            'main_url.required'     => trans('settings.mainURLRequired'),
            'lat'                   => '', //'Latitude required',
            'lng'                   => '', //'Longtitude required',
        ];
    }
}
