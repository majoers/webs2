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
            'name' => 'required|string|max:100',
            'subcategory' => 'required|string|max:100',
            'category' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048',
            'price' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return ['name.required' =>'The product name can\'t be empty',
            'subcategory.required' =>'The product subcategory can\'t be empty',
            'category.required ' => 'The product category can\'t be empty',
            'description.required' => 'The product description can\'t be empty',
            'price.required' => 'The product price can\'t be empty'];
    }
}
