<?php

namespace App\Http\Requests\Slides;

use Illuminate\Foundation\Http\FormRequest;

class StoreSlideRequest extends FormRequest
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
            'title'     => 'required|max:255',
            'subtitle'  => 'required|max:255',
            'image'     => 'required_without:video',
            'video'     => 'required_without:image',
        ];
    }
}
