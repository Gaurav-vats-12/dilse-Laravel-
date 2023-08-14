<?php

namespace App\Http\Requests\Checkout;

use Illuminate\Foundation\Http\FormRequest;

class StoreCheckoutRequest extends FormRequest
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
            'billing_first_name' => 'required|min:1|max:50',
            'billing_last_name' => 'required|min:1|max:50',
            'billing_phone' => 'required|min:1|max:10',
            'billing_email' => 'required|email',
            'billing_address_1' => 'required|min:1|max:255',
            'billing_address_2' => 'required|min:1|max:255',
            'billing_country' => 'required',
            'billing_state' => 'required',
            'billing_city' => 'required',
            'billing_postcode' => 'required|min:1|max:7',
        ];
    }


}
