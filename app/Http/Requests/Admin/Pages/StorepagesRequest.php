<?php

namespace App\Http\Requests\Admin\Pages;

use Illuminate\Foundation\Http\FormRequest;

class StorepagesRequest extends FormRequest
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
            'page_title' =>  'required|max:255',
            'page_slug' =>  'required|max:255',
            'page_content' =>  'required|max:5000',
            'page_title' =>  'required|max:255',
            'status' => 'required|in:active,inactive',
        ];
    }
}
