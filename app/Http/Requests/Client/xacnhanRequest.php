<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class xacnhanRequest extends FormRequest
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
            'soluong' => 'required|',
            'hovaten' => 'required|min:5',
            'sodienthoai' => 'required|min:5|max:12',
            'diachi' => 'required|',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'max'      => ':attribute không được quá 12 ký tự',
            'min'      => ':attribute không được dưới 5 ký tự',
        ];
    }
    public function attributes()
    {
        return [
            'soluong'         => 'Số lượng',
            'hovaten'      => 'Họ và tên',
            'sodienthoai'      => 'Số điện thoại',
            'diachi'      => 'Địa chỉ',
        ];
    }
}
