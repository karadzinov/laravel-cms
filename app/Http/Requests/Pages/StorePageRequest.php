<?php

namespace App\Http\Requests\Pages;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest
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
            'title'     =>'required|max:255|'.Rule::unique('pages')->ignore($this->id),
            'subtitle'  =>'required|max:500',
            'main_text' =>'required'
        ];
    }
}
