<?php

namespace App\Http\Requests\Dashboard\Products;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends FormRequest
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
        $productId = $this->route('product'); // Assuming the product ID is passed in the route parameter

        return [
            'category_id' => 'required|exists:categories,id',
            'name.ar' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products', 'name->ar')->ignore($productId), // Ignore the current product

            ],
            'name.en' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products', 'name->en')->ignore($productId), // Ignore the current product
            ],
                'description.ar' => 'required',
                'description.en' => 'required',
                'image' => 'nullable|image|mimes:png,jpg,jpeg',
                'purchase_price' => 'required',
                'sale_price' => 'required',
                'stock' => 'required',
        ];
    }

    public function messages(){
        if(app()->getLocale() == 'ar'){
            return [
                'category_id.required' => 'حقل القسم مطلوب .',
                'category_id.exists' => 'القسم غير موجود بقاعدة البيانات .',
                'name.ar.required' => 'حقل الاسم العربى مطلوب .',
                'name.en.required' => 'حقل الاسم الانجليزى مطلوب .',
                'name.ar.unique' => 'قيمة الاسم باللغة العربية مستخدمة من قبل .',
                'name.en.unique' => 'قيمة الاسم باللغة الانجليزية مستخدمة من قبل .',
                'description.ar.required' => 'حقل الوصف العربى مطلوب .',
                'description.en.required' => 'حقل الوصف الانجليزى مطلوب .',
                'image.image' => 'لابد ان يكون الملف صورة .',
                'image.mimes' => 'نوع الصورة المرفقة غير متوافق .',
                'purchase_price.required' => 'حقل سعر الشراء مطلوب .',
                'sale_price.required' => 'حقل سعر البيع مطلوب .',
                'stock.required' => 'حقل المخزن مطلوب .',
            ];
        }elseif(app()->getLocale() == 'en'){
            return [
                'category_id.required' => 'The category field is required.',
                'category_id.exists' => 'The arabic category field not exists in database.',
                'name.ar.required' => 'The arabic name field is required.',
                'name.en.required' => 'The english name field is required.',
                'name.ar.unique' => 'The arabic name is already used .',
                'name.en.unique' => 'The english name is already used .',
                'description.ar.required' => 'The arabic description field is required.',
                'description.en.required' => 'The english description field is required.',
                'image.image' => 'The file must be an image.',
                'image.mimes' => 'The image extension is not compatible.',
                'purchase_price.required' => 'The purchase price field is required.',
                'sale_price.required' => 'The sale price field is required.',
                'stock.required' => 'The stock field is required.',
            ];
        }
    }
}
