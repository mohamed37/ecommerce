<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoriesRequest extends FormRequest
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
           'category_id' => 'required|min:1',
           'name' => 'required|string|max:150',
           'photo' => 'required_without:id|mimes:jpg,jpeg,png', //without:id => must required photo if user do not insert photo
           
        ];
    }

    public function messages()
    {
        return[
            'required' => 'هذا الحقل مطلوب .',
            'string' => 'يجب ان يكون هذا الحقل حروف .',
            'photo.required_without' => 'هذه الصورة مطلوبة.', 
            'mimes.jpg' => 'يجب ان يكون الصورة من نوع jpg.',
            'mimes.jpeg' => 'يجب ان يكون الصورة من نوع jpeg.',
            'mimes.png' => 'يجب ان يكون الصورة من نوع png.'
        ];
    }
}
