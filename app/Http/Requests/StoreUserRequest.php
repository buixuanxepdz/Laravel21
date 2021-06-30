<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => "required|email|unique:users,email, $this->id",
            'address' => 'required',
            'phone' => 'required|numeric|max:9999999999',
            'password' => 'required|max:6',
            'image[]' => 'required',
            'image[]' => 'image',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ':attribute không được để trống',
            'email.requied' => 'Email không được để trống',
            'email.unique' => 'Email đã tồn tại',
            'address.required' => ':attribute không được để trống',
            'phone.required' =>  ':attribute không được để trống',
            'phone.numeric' => 'Kí tự nhập vào phải là số',
            'phone.max' => ':attribute không được vượt quá 10 số',
            'password.required'  => 'Hãy nhập mật khẩu',
            'password.max'  => 'Mật khẩu chứa tối đa 6 ký tự',
            'image[].required' => 'Hãy chọn 1 tấm ảnh',
            'image[].image' => 'Dữ liệu phải là ảnh'
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên',
            'address' => 'Địa chỉ',
            'phone'  => 'Số điện thoại'
        ];
    }
}
