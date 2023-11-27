<?php

namespace App\Modules\Admins\Http\Requests;

use App\Modules\Admins\Models\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return array(
            'name' => array('string', 'max:255'),
            'email' => array('email', 'max:255', Rule::unique(Admin::class)->ignore($this->user('admin')->id)),
        );
    }
}
