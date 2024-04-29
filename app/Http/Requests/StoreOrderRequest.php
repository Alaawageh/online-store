<?php

namespace App\Http\Requests;

use App\Enums\OrderEnum;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'first_name' => 'string|max:255|required',
            'last_name' => 'string|max:255|required',
            'email' => 'email|required|max:255',
            'phone' => 'numeric|required',
            'address' => 'required|string|max:1024',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
        ];
    }
}
