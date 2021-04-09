<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Product;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $product = Product::find($this->route('id'));
        return [
            'name' => [
                'bail',
                'required',
                'max:255',
                Rule::unique('products')->ignore($product)
            ],
            'price' => 'bail|required',
            'amount' => 'bail|required',
            'state' => 'bail|required',
            'active' => 'bail|required',
            'image' => 'bail|image|mimes:jpeg,png,jpg,svg|max:1024',
            'categories' => 'bail|required'
        ];
    }
}
