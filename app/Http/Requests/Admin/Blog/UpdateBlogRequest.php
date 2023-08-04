<?php

namespace App\Http\Requests\Admin\Blog;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'blog_title' =>  'required|max:255',
            'blog_content' =>  'required',
            'blog_meta_title' =>  'required|max:255',
            'blog_meta_description' =>  'required',
            'status' => 'required|in:published,inactive,draft',
        ];
    }
}
