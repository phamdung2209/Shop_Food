<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestUpdateProfile extends FormRequest
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

    public function rules()
    {
        return [
            'email' => 'required|max:190|min:3|unique:admins,email,'.$this->id
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Dữ liệu không được để trống',
            'email.min' => 'Dữ liệu phải nhiều hơn 3 ký tự',
            'email.unique'   => 'Tài khoản đã tồn tại',
        ];
    }
}
