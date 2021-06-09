<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class PostRequest extends FormRequest
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

    protected function prepareForValidation(){

            $this->merge([
                'slug' => Str::slug($this->title)
            ]);

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'title' => [
                    'required',
                    'max:250',
                    Rule::unique('posts','title')->ignore($this->post)
                ],
                'excerpt' => [
                    'required'
                ]
        ];
    }

    public function messages(){

        return [
            'title.required' => 'A title is required',
            'title.max' => 'A title cannot be more then 250 characters',
            'excerpt.required' => 'A title is required',
            'excerpt.max' => 'A title cannot be more then 10 characters',

        ];


    }
}
