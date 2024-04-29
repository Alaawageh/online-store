<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'description' => 'string|nullable',
            'price' => 'required|numeric|min:0',
            'qty' => 'numeric|nullable',
            'status' => 'boolean',
            'category_id' => 'required|exists:categories,id',
            'key' => 'nullable|array|max:255',
            'value' => 'nullable|array|max:255'
        ];
    }
}
