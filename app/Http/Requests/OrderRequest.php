<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'customer_id' => 'required|exists:customers,id',
            'total_price' => 'required|numeric',
            'address' => 'required|string'
        ];
    }

    public function messages()
    {
        return[
            'required' => 'هذا الحقل مطلوب .',
            'customer_id.exists' => 'العميل غير موجود.',
            'numeric' => 'يجب ان يكون هذا الحقل ارقام.',
            'string' => 'يجب ان يكون حروف .'

        ];
    }
}
