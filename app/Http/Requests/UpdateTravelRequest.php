<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTravelRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'travel_name' => 'string|max:255',
            'departure_date' => 'required|date',
            'return_date' => 'required|date',
            'means_of_transport' => 'string|max:255',
            'accommodation' => 'string|max:255',
            //ensures that the number format is valid for a decimal value
            'budget' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'destiny_name' => 'string',
            'location' => 'string'
        ];
    }
}
