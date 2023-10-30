<?php

namespace App\Http\Requests\Admin\Coupon;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCouponRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'coupon_code' =>  'required|max:255',
            'banner_discription' =>  'max:5000',
            'discount_type' => 'required|in:percentage,fixed_cart',
            'coupon_amount' =>  'required|max:30',
            'minimum_amount' =>  'required|max:30',
            'coupon_type' => 'required|in:referral,offer',
            'status' => 'required|in:active,inactive',

        ];
    }
}
