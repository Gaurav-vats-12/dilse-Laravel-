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
            'billing_full_name' => 'required|min:1|max:50',
            'billing_phone' => 'required',
            'billing_email' => 'required|email',
            'billing_address_1' => 'required|min:1|max:255',
            'billing_address_2' => 'required|min:1|max:255',
            'billing_country' => 'required',
            'billing_state' => 'required',
            'billing_city' => 'required',
            'billing_postcode' => 'required|min:1|max:7',
//            'payment_method' => 'required|in:pay_on_delivery,pay_on_store,payonline',
            // 'full_name' => 'required_if:payment_method,==,payonline|min:1|max:255',
            // 'full_name' => 'required_if:payment_method,==,payonline|min:1|max:255',
            // 'card_number' => 'required_if:payment_method,==,payonline|numeric|min:1|max:12',
            // 'cvc' => 'required_if:payment_method,==,payonline|numeric|min:1|max:4',
            // 'exp_month' => 'required_if:payment_method,==,payonline',
            // 'exp_year' => 'required_if:payment_method,==,payonline',
        ];
    }


}
