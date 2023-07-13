<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends FormRequest
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
            'email'     => 'required|max:190|min:3|unique:users,email,'.$this->id,
            'name'      => 'required',
            'phone'     => 'required|unique:users,phone,'.$this->id,
            'password'  => 'required',
//            'g-recaptcha-response' => 'required|captcha'
        ];
    }

    public function messages()
    {
        return [
            'name.required'          => 'Dữ liệu không được để trống',
            'email.required'         => 'Dữ liệu không được để trống',
            'email.unique'           => 'Dữ liệu đã tồn tại',
            'phone.unique'           => 'Dữ liệu đã tồn tại',
            'phone.required'         => 'Dữ liệu không được để trống',
            'password.required'      => 'Dữ liệu không được để trống',
        ];
    }
}
