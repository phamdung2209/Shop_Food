<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestArticle extends FormRequest
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
            'a_name'          => 'required|max:190|min:3|unique:articles,a_name,'.$this->id,
            'a_description'   => 'required',
            'a_menu_id'       => 'required',
            'a_content'       => 'required',
        ];
    }

    public function messages()
    {
        return [
            'a_name.required'           => 'Dữ liệu không được để trống',
            'a_name.unique'             => 'Dữ liệu đã tồn tại',
            'a_name.min'                => 'Dữ liệu phải nhiều hơn 3 ký tự',
            'a_description.required'    => 'Dữ liệu không được để trống',
            'a_menu_id.required'        => 'Dữ liệu không được để trống',
            'a_content.required'        => 'Dữ liệu không được để trống'
        ];
    }
}
