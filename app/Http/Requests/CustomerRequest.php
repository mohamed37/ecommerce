<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'email' => 'required|email|unique:customers,email,'.$this-> id,
            'password' => 'required_without:id|string|min:8',
            'mobile' => 'required|numeric|unique:customers,mobile,'.$this-> id,
            'address' => 'sometimes|nullable|string', 
            'logo' => 'required_without:id|mimes:jpg,jpeg,png', //without:id => must required logo if user do not insert logo
            'phone' => 'required|numeric'
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
            'min' => 'هذا الحقل صغير .',
            'address.string'=> 'لابد ان يكون العنوان حروف.',
            'logo.required_without' => 'الصورة مطلوبة ',
            'password.required_without' => 'كلمة المرور مطلوبة ',
            'logo.jpg' => 'يجب ان تكون الصورة من نوع jpg',
            'logo.jpeg' => 'يجب ان تكون الصورة من نوع jpeg',
            'logo.png' => 'يجب ان تكون الصورة من نوع png',


        ];
    }
}
