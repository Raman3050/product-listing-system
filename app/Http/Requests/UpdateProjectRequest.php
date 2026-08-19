<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
        $project = $this->route('project');

        return [

            'name' => [
                'required',
                'string',
                'max:200',
                Rule::unique('projects', 'name')->ignore($project->id),
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('projects', 'slug')->ignore($project->id),
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

            // Location Details
            'address' => [
                'nullable',
                'string',
                'max:500',
            ],

            'google_maps_url' => [
                'nullable',
                'string',
                'url',
                'max:2048',
            ],

            'nearby_locations' => [
                'nullable',
                'array',
            ],

            'nearby_locations.*.name' => [
                'nullable',
                'string',
                'max:150',
            ],

            'nearby_locations.*.distance' => [
                'nullable',
                'string',
                'max:50',
            ],

            'investment_details' => [
                'nullable',
                'array',
            ],
            'investment_details.*.heading' => [
                'nullable',
                'string',
                'max:255',
            ],
            'investment_details.*.points' => [
                'nullable',
                'array',
            ],
            'investment_details.*.points.*' => [
                'nullable',
                'string',
            ],

            'faqs' => [
                'nullable',
                'array',
            ],
            'faqs.*.question' => [
                'nullable',
                'string',
            ],
            'faqs.*.answer' => [
                'nullable',
                'string',
            ],

            // Floor Plan
            'floor_plan_image' => [
                'nullable',
                'mimes:jpg,jpeg,png,webp,avif',
                'max:4096',
            ],

            'floor_plan_pdf' => [
                'nullable',
                'mimes:pdf',
                'max:10240',
            ],
        ];
    }
}
