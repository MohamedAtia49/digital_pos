<?php

namespace App\Http\Requests\Dashboard\Clients;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'nullable|email|unique:clients,email',
            'phone' => 'required',
            'national_number' => 'required|unique:clients,national_number',
            'address' => 'required',
        ];
    }

    public function messages(){
        if(app()->getLocale() == 'ar'){
            return [
                'name.required' => 'حقل الاسم مطلوب .',
                'email.email' => 'البريد الالكترونى ليس صحيح .',
                'email.unique' => 'البريد الالكترونى مستخدم مسبقا .',
                'phone.required' => 'حقل الهاتف المحمول مطلوب .',
                'phone.array' => 'حقل الهاتف المحول به خطأ ما .',
                'national_number.required' => 'حقل الرقم القومى مطلوب .',
                'national_number.unique' => 'حقل الرقم القومى خاص بشخص اخر .',
                'address.required' => 'حقل العنوان مطلوب .',
            ];
        }elseif(app()->getLocale() == 'en'){
            return [
                'name.required' => 'The name field is required.',
                'email.required' => 'The email not correct',
                'email.unique' => 'The email field must be unique.',
                'phone.required' => 'The name phone is required.',
                'phone.array' => 'The phone has something wrong ! .',
                'national_number.required' => 'The national number field is required.',
                'national_number.unique' => 'The national number used for other person .',
                'address.required' => 'The address field is required.',
            ];
        }
    }
}
