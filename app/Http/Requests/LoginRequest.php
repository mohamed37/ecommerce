<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     *|unique:admins
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|exists:admins,email',
            'password' => 'required| min:6',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'البريد الالكتروني مطلوب.',
            'email.email' => 'يجب ان يكون عنوان بريد الكتروني صالح.',
            'email.exists' => ' البريد الالكتروني غير مسجل ',
            'password.required' => 'كلمة المرور مطلوبة .',
            'password.min' => 'يجب ان تكون كلمة المرور 6 حروف او ارقام علي الاقل.'
        ];
    }
}
