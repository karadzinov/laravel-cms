<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'                  => 'required|max:255|unique:users',
            'first_name'            => '',
            'last_name'             => '',
            'email'                 => 'required|email|max:255|unique:users',
            'password'              => 'required|min:6|max:20|confirmed',
            'password_confirmation' => 'required|same:password',
            'role'                  => 'required',
        ];
    }

    public function messages(){
        
        return [
            'name.unique'         => trans('auth.userNameTaken'),
            'name.required'       => trans('auth.userNameRequired'),
            'first_name.required' => trans('auth.fNameRequired'),
            'last_name.required'  => trans('auth.lNameRequired'),
            'email.required'      => trans('auth.emailRequired'),
            'email.email'         => trans('auth.emailInvalid'),
            'password.required'   => trans('auth.passwordRequired'),
            'password.min'        => trans('auth.PasswordMin'),
            'password.max'        => trans('auth.PasswordMax'),
            'role.required'       => trans('auth.roleRequired'),
        ];
    }
}
