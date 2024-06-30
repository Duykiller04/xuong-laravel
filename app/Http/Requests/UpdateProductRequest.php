<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|string',
            'sku' => 'required|string',
            'price_regular' => 'required|numeric',
            'price_sale' => 'numeric',
        ];
    }
    public function messages() : array{
        return [
            'name.required' => 'Bạn chưa nhập tên sản phẩm',
            'name.string' => 'Tên sản phẩm phải là chữ',
            'sku.required' => 'Bạn chưa nhập SKU',
            'sku.string' => 'SKU phải là chữ',
            'price_regular.required' => 'Bạn chưa nhập giá bán',
            'price_regular.numeric' => 'Giá bán phải là số',
            'price_sale.numeric' => 'Giá bán sale phải là số',
        ];
    }
}
