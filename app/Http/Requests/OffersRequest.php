<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OffersRequest extends FormRequest
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
            'name' => 'required|string',
            'discount' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return[
            'required' => 'هذا الحقل مطلوب .',
            'string' => 'يجب ان يكون هذا الحقل حروف .',
            'numeric' => 'يجب ان يكون هذا الحقل رقما.'
        ];
    }
}
