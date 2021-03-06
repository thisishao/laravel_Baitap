<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'      =>  'required|max:255',
            'price'     =>  'required',
            'category'  =>  'required',
            'brand'     =>  'required',
            'company'   =>  'required',
            'detail'    =>  'required',
            'image'     =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'required'  => ':attribute Không được để trống',
            'max'       => ':attribute Không được lớn hơn :max',
            'min'       => ':attribute Không được nhỏ hơn :min',
            'email'     => ':attribute Đã tồn tại',
        ];
    }
    public function attributes()
    {
        return [
            'name'      =>  'Tên',
            'price'     =>  'Price',
            'category'  =>  'Category',
            'brand'     =>  'Brand',
            'company'   =>  'Company',
            'detail'    =>  'Detail',
            'image'     =>  'Hình ảnh',
        ];
    }
}
