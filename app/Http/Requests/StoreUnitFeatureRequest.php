<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUnitFeatureRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:150',
                'unique:unit_features,name',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:unit_features,slug',
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
