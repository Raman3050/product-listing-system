<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectImageRequest extends FormRequest
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

            'project_id' => [
                'required',
                'exists:projects,id',
            ],

            'images' => [
                'required',
                'array',
                'min:1',
            ],

            'images.*' => [
                'mimes:jpg,jpeg,png,webp,avif',
                'max:4096',
            ],

        ];
    }
}
