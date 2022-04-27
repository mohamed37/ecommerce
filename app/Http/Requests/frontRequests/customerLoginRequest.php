<?php

namespace App\Http\Requests\frontRequests;

use Illuminate\Foundation\Http\FormRequest;

class customerLoginRequest extends FormRequest
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
            'email' => 'required|exists:customers,email',
            'password' => 'required|min:6'
        ];

    }

    public function messages()
    {
        return[
            'required' => 'هذا الحقل مطلوب.',
            'email.exists' => ' البريد الالكتروني غير مسجل ',
            'password.min' => 'لا تقل كلمة المرور عن 6 ارقام او حروف'
        ];
    }
}
