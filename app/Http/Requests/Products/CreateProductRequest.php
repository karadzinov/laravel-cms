<?php

namespace App\Http\Requests\Products;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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

        return [
            "name"          => "required|max:191|unique:products,name",
            "description"   => "required|max:64000",
            "price"         => "required|min:0|numeric",
            "reduction"     => "numeric|nullable|min:0|max:100",
            "quantity"      => "numeric|nullable|min:0",
            "main_image"    => "required|image",
            "video"         => "nullable|url|regex:{$youtubeRegex}",
        ];
    }
}
