<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class MemberLoginRequest extends FormRequest
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
            'email'     => 'required|email:rfc',
            'password'  => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            'required'  => ':attribute Không được để trống',
            'max'       => ':attribute Không được lớn hơn :max',
            'min'       => ':attribute Không được nhỏ hơn :min',
            'email'     => ':attribute Không đúng định dạng',
        ];
    }

    public function attributes()
    {
        return [
            'email'     => 'Email',
            'password'  => 'Mật khẩu',
        ];
    }
}
