<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUnitRequest extends FormRequest
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
        return [

            'project_id' => ['required', 'exists:projects,id'],

            'property_type_id' => ['required', 'exists:property_types,id'],

            'name' => ['required', 'max:255'],

            'slug' => ['nullable', 'unique:units,slug'],

            'price' => ['nullable', 'numeric'],

            'price_on_request' => ['nullable', 'boolean'],

            'booking_amount' => ['nullable', 'numeric'],

            'carpet_area' => ['nullable', 'numeric'],

            'builtup_area' => ['nullable', 'numeric'],

            'super_area' => ['nullable', 'numeric'],

            'area_unit' => ['nullable'],

            'bedrooms' => ['nullable', 'integer'],

            'bathrooms' => ['nullable', 'integer'],

            'balconies' => ['nullable', 'integer'],

            'floor' => ['nullable', 'integer'],

            'total_floors' => ['nullable', 'integer'],

            'facing' => ['nullable'],

            'description' => ['nullable'],

            'meta_title' => ['nullable'],

            'meta_description' => ['nullable'],

            'meta_keywords' => ['nullable'],

            'status' => ['nullable', 'boolean'],

        ];
    }
}
