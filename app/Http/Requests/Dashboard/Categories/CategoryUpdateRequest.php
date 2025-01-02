<?php

namespace App\Http\Requests\Dashboard\Categories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryUpdateRequest extends FormRequest
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
        $categoryId = $this->route('category'); // Get the category ID from the route
        return [
            'name.en' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'name->en')->ignore($categoryId), // Ignore the current category
            ],
            'name.ar' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'name->ar')->ignore($categoryId), // Ignore the current category
            ],
        ];
    }

    public function messages(){
        if(app()->getLocale() == 'ar'){
            return [
                'name.ar.required' => 'حقل الاسم العربى مطلوب .',
                'name.en.required' => 'حقل الاسم الانجليزى مطلوب .',
                'name.ar.unique' => 'قيمة الاسم باللغة العربية مستخدمة من قبل .',
                'name.en.unique' => 'قيمة الاسم باللغة الانجليزية مستخدمة من قبل .',
            ];
        }elseif(app()->getLocale() == 'en'){
            return [
                'name.ar.required' => 'The arabic name field is required.',
                'name.en.required' => 'The english name field is required.',
                'name.ar.unique' => 'The arabic name is already used .',
                'name.en.unique' => 'The english name is already used .',
            ];
        }
    }
}
