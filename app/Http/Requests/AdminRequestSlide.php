<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestSlide extends FormRequest
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
            'sd_title'         => 'required',
            'sd_link'          => 'required',
        ];
    }

    public function messages()
    {
        return [
            'sd_title.required'         => 'Dữ liệu không được để trống',
            'sd_link.required'         => 'Dữ liệu không được để trống',
        ];
    }
}
