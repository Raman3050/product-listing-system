<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUnitFeatureRequest extends FormRequest
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
        $unitFeature = $this->route('unit_feature');

        return [
            'name' => [
                'required',
                'string',
                'max:150',
                Rule::unique('unit_features', 'name')
                    ->ignore($unitFeature->id),
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('unit_features', 'slug')
                    ->ignore($unitFeature->id),
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
