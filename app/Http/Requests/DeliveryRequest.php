<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryRequest extends FormRequest
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
            'firstname' => 'required|string|max:150',
            'lastname' => 'required|string|max:150',
            'username' => 'required|string|unique:deliveries,username,'.$this->id,
            'email' =>'required|email|max:150|unique:deliveries,email,'.$this->id,
            'password' => 'required_without:id',
            'phone' => 'required|numeric|unique:deliveries,phone,'.$this->id,
            'photo' => 'required_without:id|mimes:jpg,png,jpeg',
            'address' => 'sometimes|nullable|string',
            'card_number' => 'required|numeric|unique:deliveries,card_number,'.$this->id,
            'age' => 'required|numeric'

        ];
    }

    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب .',
            'string' => 'يجب ان يكون هذا الحقل حروف .',
            'max' => 'هذا الحقل طويل .',
            'firstname.string'=> 'لابد ان يكون الاسم الاول حروف.',
            'lastname.string'=> 'لابد ان يكون الاسم الاخير حروف.',
            'username.string'=> 'لابد ان يكون الاسم  حروف.',
            'email.unique' => 'البريد الالكتروني مستخدم من قبل.',
            'email.email' => 'يجب ان يكون عنوان بريد الكتروني صالح.',
            'password.required_without' => 'كلمة المرور مطلوبة ',
            'mobile.unique' => 'رقم الهاتف مستخدم من قبل..',
            'address.string'=> 'لابد ان يكون العنوان حروف.',
            'photo.required_without' => 'الصورة مطلوبة ',
            'photo.jpg' => 'يجب ان تكون الصورة من نوع jpg',
            'photo.jpeg' => 'يجب ان تكون الصورة من نوع jpeg',
            'photo.png' => 'يجب ان تكون الصورة من نوع png',
            'numeric' => 'يجب ان يكون رقما',
            'card_number.unique' => 'هذا الرقم موجود من قبل.',
            'phone.unique' => 'هذا الرقم موجود من قبل.'

        ];
    }
}
