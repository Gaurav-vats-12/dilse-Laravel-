<?php

namespace App\Http\Requests\Admin\ExtraItems;

use Illuminate\Foundation\Http\FormRequest;

class StoreExtaItemsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' =>'required',
            'extra_product_image' =>'required',
            'description' =>'required',
            'price' => 'required',
            'status' => 'required|in:1,0',

        ];
    }
}
