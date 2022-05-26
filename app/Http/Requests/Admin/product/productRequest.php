<?php

namespace App\Http\Requests\Admin\product;

use Illuminate\Foundation\Http\FormRequest;

class productRequest extends FormRequest
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
            'name_product'       => 'required|max:100|min:2',
            'category_id'       => 'required',
            'price'       => 'required',
            'qty'       => 'required|min:1',
            'image_product'       => 'required',
        ];
    }
}
