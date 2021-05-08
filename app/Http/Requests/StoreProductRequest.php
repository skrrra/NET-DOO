<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
        return [
            'name' => 'bail|required|unique:products|max:255',
            'price' => 'bail|required',
            'amount' => 'bail|required',
            'state' => 'bail|required',
            'active' => 'bail|required',
            'categories' => 'bail|required',
            'image' => 'bail|required',
            'image.*' => 'bail|required|image|mimes:jpeg,png,jpg,svg|max:1024',
            'short_details' => 'bail|required|max:5000',
            'long_details' => 'bail|required|max:10000',
        ];
    }
}
