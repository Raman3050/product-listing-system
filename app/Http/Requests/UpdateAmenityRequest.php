<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateAmenityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $amenity = $this->route('amenity');

        return [

            'name' => [
                'required',
                'string',
                'max:150',
                Rule::unique('amenities', 'name')
                    ->ignore($amenity->id),
            ],

            'icon' => [
                'nullable',
                'string',
                'max:100',
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('amenities', 'slug')
                    ->ignore($amenity->id),
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],
        ];
    }
}
