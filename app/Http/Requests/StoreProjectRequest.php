<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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

            // Basic Information
            'name' => [
                'required',
                'string',
                'max:200',
                'unique:projects,name',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:projects,slug',
            ],

            'property_category_id' => [
                'required',
                'exists:property_categories,id',
            ],

            'builder_id' => [
                'required',
                'exists:builders,id',
            ],

            'location_id' => [
                'required',
                'exists:locations,id',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            // Project Details
            'rera_number' => [
                'nullable',
                'string',
                'max:255',
            ],

            'possession_date' => [
                'nullable',
                'date',
            ],

            'project_area' => [
                'nullable',
                'numeric',
            ],

            'area_unit' => [
                'nullable',
                'string',
                'max:50',
            ],

            'total_towers' => [
                'nullable',
                'integer',
            ],

            'total_units' => [
                'nullable',
                'integer',
            ],

            // Media
            'logo' => [
                'nullable',
                'mimes:jpg,jpeg,png,webp,avif',
                'max:2048',
            ],

            'featured_image' => [
                'nullable',
                'mimes:jpg,jpeg,png,webp,avif',
                'max:4096',
            ],

            'brochure' => [
                'nullable',
                'mimes:pdf',
                'max:10240',
            ],

            // SEO
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

            'status' => [
                'nullable',
                'boolean',
            ],

            'amenities' => [
                'nullable',
                'array',
            ],

            'amenities.*' => [
                'exists:amenities,id',
            ],
        ];
    }
}
