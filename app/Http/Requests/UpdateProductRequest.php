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
    public function prepareForValidation()
    {
        $this->merge([
            'stock_count' => $this->stock_count === null ? 0 : $this->stock_count,
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'gallery' => 'required|string',
            'stock_count' => 'required|integer|min:0',
        ];
    }
     /**
     * Custom validation error messages.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Product name is required.',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Price must be a valid number.',
            'category_id.required' => 'Please select a category.',
            'category_id.exists' => 'Selected category does not exist.',
            'stock_count.required' => 'Stock count is required.',
            'stock_count.integer' => 'Stock count must be an integer.',
        ];
    }
}
