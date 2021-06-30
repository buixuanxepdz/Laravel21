<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
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
            'name' => 'required|min:1|max:50'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ':attribute thương hiệu không được để trống'
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên'
        ];
    }
}
