<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            'branch_id' => 'required|exists:branches,id',
            'photo' => 'required_without:id|mimes:jpg,png,jpej',
            'price' => 'required|numeric',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'required' => 'هذا الحقل مطلوب .',
            'string' => 'يجب ان يكون هذا الحقل حروف .',
            'branch_id.exists' => 'القسم غير موجود.',
            'name.string'=> 'لابد ان يكون العنوان حروف.',
            'numeric' => 'يجب ان يكون هذا الحقل ارقام.',
            'photo.required_without' => 'الصورة مطلوبة ',
            'photo.jpg' => 'يجب ان تكون الصورة من نوع jpg',
            'photo.jpeg' => 'يجب ان تكون الصورة من نوع jpeg',
            'photo.png' => 'يجب ان تكون الصورة من نوع png',
        ];
    }
}
