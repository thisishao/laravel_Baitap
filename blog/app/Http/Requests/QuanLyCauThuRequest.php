<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuanLyCauThuRequest extends FormRequest
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
            'age'       => 'required|integer|max:50',
            'national'  => 'required|max:255',
            'position'  => 'required|max:255',
            'salary'    => 'required|integer|max:100000',
        ];
    }

    public function messages()
    {
        return [
            'required'  => ':attribute Không được để trống',
            'min'       => ':attribute Không được nhỏ hơn :min',
            'max'       => ':attribute Không được lớn hơn :max',
            'integer'   => ':attribute Chỉ được nhập số',
        ];
    }

    public function attributes()
    {
        return [
            'name'      => 'Tên cầu thủ',
            'age'       => 'Tuổi cầu thủ',
            'national'  => 'Quốc tịch',
            'position'  => 'Vị trí',
            'salary'    => 'Lương',
        ];
    }
}
