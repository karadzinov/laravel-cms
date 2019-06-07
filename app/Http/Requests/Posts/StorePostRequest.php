<?php
namespace App\Http\Requests\Posts;
use Illuminate\Foundation\Http\FormRequest;
class StorePostRequest extends FormRequest
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
            "user_id"       => "required",
            "category_id"   => "required",
            "title"         => "required|max:255",
            "subtitle"      => "required|max:500",
            "main_text"     => "required",
            "workflow"      => "required",
            "location"      => "max:255",
            "video"         => "url|regex:{$youtubeRegex}",
        ];
    }
    public function messages(){
        
        return[
            'regex' => 'Video must be valid youtube link.',
        ];
    }
}