<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id'=>'required',
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'img'=>'required',
            'available_quantity'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'category_id.required'=>'cateory_id is required',
            'name.required'=>'product name is required',
            'price.required'=>'price is required',
            'description.required'=>'brief is required',
            'img.required'=>'image is required',
            'available_quantity.required'=>'available quantity is required',
        ];
    }
}
