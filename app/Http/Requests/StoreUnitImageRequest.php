<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUnitImageRequest extends FormRequest
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

            'unit_id' => [
                'required',
                'exists:units,id'
            ],

            'images' => [
                'required',
                'array'
            ],

            'images.*' => [
                'mimes:jpg,jpeg,png,webp,avif',
                'max:2048'
            ],

        ];
    }
}
