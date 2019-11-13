<?php

namespace App\Http\Requests\Products;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        $youtubeRegex = "/^(?:https:\/\/(?:www\\.)?youtube.com\/)(watch\\?v=)([a-zA-Z0-9_]*)/";
        // dd(Rule::unique('products', 'name')->ignore($this->id));
        return [
            "name"          => "required|max:191|".Rule::unique('products', 'name')->ignore($this->product),
            "description"   => "required|max:64000",
            "price"         => "required|min:0|numeric",
            "reduction"     => "numeric|min:0|max:100|nullable",
            "quantity"      => "numeric|min:0|nullable",
            "main_image"    => "image",
            "video"         => "nullable|url|regex:{$youtubeRegex}",
        ];
    }
}
