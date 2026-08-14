<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTenantRequest extends FormRequest
{
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
                'unique:tenants,name',
            ],

            'logo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:tenants,slug',
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