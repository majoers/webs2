<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'product-name' => 'required|string|max:100|unique:products',
            'product-genre' => 'required|string|max:100',
            'product-category' => 'required|string',
            'product-image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048'
        ];
    }
}
