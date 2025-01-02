<?php

namespace App\Http\Requests\Dashboard\Users;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'password' => 'required|confirmed',
            'permissions' => 'required|array',
        ];
    }

    public function messages(){
        if(app()->getLocale() == 'ar'){
            return [
                'name.required' => 'حقل الاسم مطلوب .',
                'email.required' => 'حقل البريد الالكترونى مطلوب .',
                'email.unique' => 'البريد الالكترونى مستخدم مسبقا .',
                'image.image' => 'لابد ان يكون الملف صورة .',
                'image.mimes' => 'نوع الصورة المرفقة غير متوافق .',
                'password.required' => 'حقل كلمة المرور مطلوب .',
                'password.confirmed' => 'لابد من تاكيد كلمة المرور .',
                'permissions.required' => 'لابد ان يكون للمستخدم صلاحيات .',
                'permissions.array' => 'لابد ان تكون الصلاحيات مصفوفة .',
            ];
        }elseif(app()->getLocale() == 'en'){
            return [
                'name.required' => 'The name field is required.',
                'email.required' => 'The email field is required.',
                'email.unique' => 'The email field must be unique.',
                'image.image' => 'The file must be an image.',
                'image.mimes' => 'The image extension is not compatible.',
                'password.required' => 'The password field is required.',
                'password.confirmed' => 'The password confirmation field is required.',
                'permissions.required' => 'The permissions field is required.',
                'permissions.array' => 'The permissions field must be array given .',
            ];
        }
    }
}
