<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreHotelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool //ini maksudny apakah request boleh dijalan oleh user ini
    {
        return true;
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
            'name' => 'required|string|max:225',
            'description' => 'required|string',
            'city' => 'required|string|max:100',
            'address' => 'required|string', //cukup string karena di migration text
            'latitude' => 'nullable|numeric|between:-90,90',
            'longtitude' => 'nullable|numeric|between:-180,180',

            'check_in_time' => 'nullable|date_format:H:i', //artinya H: jam, I:menit
            'check_out_time' => 'nullable|date_format:H:i',

        ];
    }
}
