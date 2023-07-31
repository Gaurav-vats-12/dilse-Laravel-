<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGenralSettingRequst extends FormRequest
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
            'site_title' =>  'required|max:255',
            'site_email' =>  'required|email',
            'phone' =>  'required|max:11',
            'copyright_text' =>  'required',
            'site_currency' =>  'required',
            'site_location' =>  'required',
            'address' =>  'required',
            'site_currency' =>  'required',
        ];
    }
}
