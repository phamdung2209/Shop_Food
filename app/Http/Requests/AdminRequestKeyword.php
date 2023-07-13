<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestKeyword extends FormRequest
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
            'k_name' => 'required|max:190|min:3|unique:keywords,k_name,'.$this->id
        ];
    }

    public function messages()
    {
        return [
            'k_name.required'   => 'Dữ liệu không được để trống',
            'k_name.unique'     => 'Dữ liệu đã tồn tại',
            'k_name.max'        => 'Dữ liệu không quá 190 ký tự',
            'k_name.min'        => 'Dữ liệu phải nhiều hơn 3 ký tự'
        ];
    }
}
