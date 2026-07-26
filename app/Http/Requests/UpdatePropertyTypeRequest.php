<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePropertyTypeRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $propertyType = $this->route('property_type');

        return [

            'property_category_id' => [
                'required',
                'exists:property_categories,id',
            ],

            'name' => [
                'required',
                'string',
                'max:150',
                Rule::unique('property_types', 'name')
                    ->ignore($propertyType->id),
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('property_types', 'slug')
                    ->ignore($propertyType->id),
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
