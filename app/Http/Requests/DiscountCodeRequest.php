<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class DiscountCodeRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $validate = [
            //
            'd_code'         => 'required|max:190|min:1|unique:discount_code,d_code,'.$this->id,
            'd_percentage'  => 'required',
            'd_number_code'  => 'required'
        ];

        return $validate;
    }

    public function messages()
    {
        return [
            'd_code.required'       => 'Dữ liệu không được phép để trống',
            'd_number_code.required'       => 'Dữ liệu không được phép để trống',
            'd_percentage.required'       => 'Dữ liệu không được phép để trống',
            'd_code.max'            => 'Vượt quá số ký tự cho phép',
            'd_code.unique' => 'Mã code đã bị trùng',
            'start_date.after'            => 'Ngày bắt đầu phải lớn hơn ngày hiện tại',
            'end_date.after'            => 'Ngày kết thúc phải lớn hơn ngày bắt đầu và ngày hiện tại'
        ];
    }
}
