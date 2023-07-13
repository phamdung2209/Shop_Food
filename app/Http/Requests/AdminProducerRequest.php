<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProducerRequest extends FormRequest
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
            'pdr_name'         => 'required|max:190|min:1|unique:producer,pdr_name,'.$this->id,
            'pdr_email'        => 'required|max:190|min:1|unique:producer,pdr_email,'.$this->id,
            'pdr_slug'         =>  'nullable|max:190|min:1|unique:producer,pdr_slug,'.$this->id,
            'pdr_phone'        => 'required',
        ];
    }

    public function messages()
    {
        return [
            'pdr_name.required'         => 'Dữ liệu không được để trống',
            'pdr_name.unique'           => 'Dữ liệu đã tồn tại',
            'pdr_email.required'        => 'Dữ liệu không được để trống',
            'pdr_email.unique'          => 'Dữ liệu đã tồn tại',
            'pdr_phone.required'        => 'Dữ liệu không được để trống'
        ];
    }
}
