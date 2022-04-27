<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorsRequest extends FormRequest
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
            'name' => 'required|string|max:150|min:2',
            'email' => 'required|email|unique:vendors,email,'.$this-> id,
            'password' => 'required_without:id',
            'mobile' => 'required|numeric|unique:vendors,mobile,'.$this-> id,
            'category_id'  => 'required|exists:main_categories,id',
            'address' => 'sometimes|nullable|string', 
            'logo' => 'required_without:id|mimes:jpg,jpeg,png', //without:id => must required logo if user do not insert logo
            'subcat' => 'sometimes|required'
        ];

    }

    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب .',
            'string' => 'يجب ان يكون هذا الحقل حروف .',
            'email.unique' => 'البريد الالكتروني مستخدم من قبل.',
            'email.email' => 'يجب ان يكون عنوان بريد الكتروني صالح.',
            'mobile.unique' => 'رقم الهاتف مستخدم من قبل..',
            'max' => 'هذا الحقل كبير .',
            'category_id.exists' => 'القسم غير موجود.',
            'password.required_without' => 'كلمة المرور مطلوبة ',
            'password.required_without' => 'كلمة المرور مطلوبة ',
            'address.string'=> 'لابد ان يكون العنوان حروف.',
            'logo.required_without' => 'الصورة مطلوبة ',
            'logo.jpg' => 'يجب ان تكون الصورة من نوع jpg',
            'logo.jpeg' => 'يجب ان تكون الصورة من نوع jpeg',
            'logo.png' => 'يجب ان تكون الصورة من نوع png',


        ];
    }
}
