<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            
              'title'=>['string','required','max:255'],
              'description'=>['string','required'],
               'image'=>['string','mimes:png,jpg,jpeg','nullable', 'max:2048'],
                 'isComment'=>['required'],
                 'isSharable'=>['required'],
                 'isActive'=>['required'],
                 'category_id'=>['required']
                  
        ];
    }
}
