<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules(): array
    {
        return [
            'car_plate' => 'required|string',
            'booking_id' => 'required|integer'
        ];
    }

    public function messages(): array
    {
        return [
            'car_plate.required' => 'You must set your car plate',
            'booking_id.required' => 'You must set ID booking date'

        ];
    }
}
