<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class Loginrequest extends FormRequest
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
            'email' => 'required|',
            'password' => 'required|min:5|max:30',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'max'      => ':attribute không được quá 30 ký tự',
            'min'      => ':attribute không được dưới 5 ký tự',
        ];
    }
    public function attributes()
    {
        return [
            'email'         => 'Email',
            'password'      => 'Mật khẩu',
        ];
    }
}
