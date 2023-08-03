<?php

namespace App\Http\Requests\Admin\Banner;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
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
            'banner_title' =>  'required|max:255',
            'banner_heading' =>  'required|max:255',
            'banner_discription' =>  'required',
            'banner_type' => 'required|in:home,popup,promo,sales',
            'home_banner_button_url' => 'required_if:banner_type,==,home',
            'home_banner_button_name' => 'required_if:banner_type,==,home|max:255',
            'popup_banner_button_url' => 'required_if:banner_type,==,popup',
            'popup_banner_button_name' => 'required_if:banner_type,==,popup|max:255',
            'promo_banner_button_url' => 'required_if:banner_type,==,promo',
            'promo_banner_button_name' => 'required_if:banner_type,==,promo|max:255',
            'banner_sales_start_date' => 'required_if:banner_type,==,sales',
            'banner_sales_end_date' => 'required_if:banner_type,==,sales',
            'status' => 'required|in:active,inactive',
        ];
    }
}
