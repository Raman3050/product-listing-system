<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUnitRequest extends FormRequest
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
        $unit = $this->route('unit');

        return [

            'project_id' => [
                'required',
                'exists:projects,id',
            ],

            'property_type_id' => [
                'required',
                'exists:property_types,id',
            ],

            'tenant_id' => [
                'nullable',
                'exists:tenants,id',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('units', 'slug')
                    ->ignore($unit->id),
            ],

            'price' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'price_on_request' => [
                'nullable',
                'boolean',
            ],

            'annual_roi' => [
                'nullable',
                'numeric',
                'min:0',
                'max:100',
            ],

            'lease_status' => [
                'nullable',
                'string',
                'max:100',
            ],

            'lock_in_years' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'monthly_rental' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'minimum_rental' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'floor_size' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'floor_size_unit' => [
                'nullable',
                'string',
                'max:50',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'meta_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'meta_description' => [
                'nullable',
                'string',
            ],

            'meta_keywords' => [
                'nullable',
                'string',
            ],

            'features' => [
                'nullable',
                'array',
            ],

            'features.*' => [
                'exists:unit_features,id',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],

        ];
    }
}
