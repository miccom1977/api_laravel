<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'car_plate' => 'required|unique:bookings'
        ];
    }

    public function messages(): array
    {
        return [
            'car_plate.required' => 'Set car plate',
            'car_plate.unique' => 'This care plate is exist'
        ];
    }
}
