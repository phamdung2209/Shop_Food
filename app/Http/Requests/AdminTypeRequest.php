<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminTypeRequest extends FormRequest
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
            //
            't_name'         => 'required|max:190|min:1|unique:types,t_name,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            't_name.required'         => 'Dữ liệu không được để trống',
            't_name.unique'           => 'Dữ liệu đã tồn tại',
        ];
    }
}
