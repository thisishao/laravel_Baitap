<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name'      => 'required|max:255',
            // 'password'  => 'min:8',
            'avatar'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'required'  => ':attribute Không được để trống',
            'max'       => ':attribute Không được lớn hơn :max',
            'min'       => ':attribute Không được nhỏ hơn :min',
        ];
    }

    public function attributes()
    {
        return [
            'name'      => 'Tên',
            'password'  => 'Mật khẩu',
            'image'     =>  'Avatar',
        ];
    }
}
