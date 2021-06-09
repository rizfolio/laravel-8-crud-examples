<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
                'title' => [
                    'required',
                    'max:250',
                    Rule::unique('categories','title')->ignore($this->category)
                ] 
        ];
    }

    public function messages(){

        return [
            'title.required' => 'A title is required',
            'title.max' => 'A title cannot be more then 250 characters'
        ];


    }
}