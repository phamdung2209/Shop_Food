<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestCategory extends FormRequest
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
            'c_name' => 'required|max:190|min:3|unique:categories,c_name,'.$this->id
        ];
    }

    public function messages()
    {
        return [
            'c_name.required'   => 'Dữ liệu không được để trống',
            'c_name.unique'     => 'Dữ liệu đã tồn tại',
            'c_name.max'        => 'Dữ liệu không quá 190 ký tự',
            'c_name.min'        => 'Dữ liệu phải nhiều hơn 3 ký tự'
        ];
    }
}
