<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class HomePageFeaturedPropertyRequest extends FormRequest
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
            'project_id' => 'required|exists:projects,id',
            'unit_id' => 'required|exists:units,id',
            'display_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,avif|max:2048',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ];
    }
}
