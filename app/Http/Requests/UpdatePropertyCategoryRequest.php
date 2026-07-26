<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyCategoryRequest extends FormRequest
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
        $propertyCategory = $this->route('property_category');

        return [
            'name' => [
                'required',
                'string',
                'max:150',
                Rule::unique('property_categories', 'name')
                    ->ignore($propertyCategory->id),
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('property_categories', 'slug')
                    ->ignore($propertyCategory->id),
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
