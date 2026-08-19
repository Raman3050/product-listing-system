<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTenantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $tenant = $this->route('tenant');

        return [
            'name' => [
                'required',
                'string',
                'max:150',
                Rule::unique('tenants', 'name')
                    ->ignore($tenant->id),
            ],

            'logo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,avif',
                'max:2048',
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('tenants', 'slug')
                    ->ignore($tenant->id),
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'business_category' => [
                'nullable',
                'string',
                'max:100',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],
        ];
    }
}