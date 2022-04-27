<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchesRequest extends FormRequest
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
            'name' => 'required|string|max:150',
            'vendor_id' => 'required|min:1',
            'phone' => 'required|numeric',
            'photo' => 'required_without:id|mimes:jpg,png,jpej',
            'location' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'required' => 'هذا الحقل مطلوب .',
            'string' => 'يجب ان يكون هذا الحقل حروف.',
            'numeric' => 'يجب ان يكون هذا الحقل ارقام.',
            'mimes.jpg' => 'يجب ان يكون الصورة من نوع jpg.',
            'mimes.jpeg' => 'يجب ان يكون الصورة من نوع jpeg.',
            'mimes.png' => 'يجب ان يكون الصورة من نوع png.',
            'photo.required_without' => 'الصورة مطلوبة. '
        ];
    }
}
