<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title'         =>  'required',
            'image'         =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description'   =>  'required',
            'content'       =>  'required',
        ];
    }

    public function messages()
    {
        return [
            'required'  => ':attribute Không được để trống',
        ];
    }

    public function attributes()
    {
        return [
            'title'         => 'Title',
            'image'         => 'Image',
            'description'   =>  'Avatar',
            'content'       => 'Content'
        ];
    }
}
