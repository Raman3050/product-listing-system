<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectPageDetailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $pageDetails = $this->route('project_page_detail');

        return [

            'project_id' => [
                'required',
                'exists:projects,id',
                Rule::unique('project_page_details', 'project_id')
                    ->ignore($pageDetails->id),
            ],

            'first_yellow_heading' => [
                'nullable',
                'string',
                'max:255',
            ],

            'second_yellow_heading' => [
                'nullable',
                'string',
                'max:255',
            ],

            'project_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'amount_start' => [
                'nullable',
                'string',
                'max:100',
            ],

            'stat_1_value' => ['nullable', 'string', 'max:100'],
            'stat_1_type' => ['nullable', 'string', 'max:150'],

            'stat_2_value' => ['nullable', 'string', 'max:100'],
            'stat_2_type' => ['nullable', 'string', 'max:150'],

            'stat_3_value' => ['nullable', 'string', 'max:100'],
            'stat_3_type' => ['nullable', 'string', 'max:150'],

            'stat_4_value' => ['nullable', 'string', 'max:100'],
            'stat_4_type' => ['nullable', 'string', 'max:150'],

            'tenants' => [
                'nullable',
                'array',
            ],

            'tenants.*' => [
                'exists:tenants,id',
            ],
        ];
    }
}