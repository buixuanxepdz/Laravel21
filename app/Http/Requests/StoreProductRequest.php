<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'         => 'required|min:5|max:50',
            'origin_price' => 'required|numeric',
            'sale_price'   => 'required|numeric',
            'content'      => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.min' => 'Tên phải chứa it nhất 5 kí tự',
            'name.max' => 'Tên dài thế',
            'origin_price.required' => ':attribute không được để trống',
            'sale_price.required' => ':attribute không được để trống',
            'content.required' => ':attribute không được để trống'
        ];
    }
    public function attributes()
    {
        return [
            'sale_price' => 'giá bán',
            'origin_price' => 'giá gốc',
            'content' => 'mô tả'
        ];
    }
}
