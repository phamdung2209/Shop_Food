<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestAttribute extends FormRequest
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
            'atb_name'         => 'required|max:190|min:1|unique:attributes,atb_name,'.$this->id,
            'atb_type_id'      => 'required',
        ];
    }

    public function messages()
    {
        return [
            'atb_name.required'         => 'Dữ liệu không được để trống',
            'atb_name.unique'           => 'Dữ liệu đã tồn tại',
            'atb_name.min'                => 'Dữ liệu phải nhiều hơn 3 ký tự',
            'atb_type_id.required'         => 'Dữ liệu không được để trống',
        ];
    }
}
