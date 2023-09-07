<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;
//use Carbon\Carbon;

class StoreBookingTable extends FormRequest
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
            'name' => 'required|max:20',
            'email' => 'required|email',
            'date' => 'required|date|after:yesterday',
            'time' => 'required',
            'phone' => 'required|min:10|max:20',
            'select_part' => 'required',
        ];
    }
}





