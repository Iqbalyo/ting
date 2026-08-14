<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHotelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //karena user mau update data,beda sama store,kemudian fokus ke rules
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //

             'name' => 'sometimes|string|max:225',
            'description' => 'sometimes|string',
            'city' => 'sometimes|string|max:100',
            'address' => 'sometimes|string', //cukup string karena di migration text
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180', //longitude diperbaiki nanti

            'check_in_time' => 'nullable|date_format:H:i', //artinya H: jam, I:menit
            'check_out_time' => 'nullable|date_format:H:i',

            //next pergi ke update di controller
        ];

    }
}
