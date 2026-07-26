<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class SlugHelper
{
    /**
     * Generate a unique slug.
     *
     * @param string $value
     * @param string $modelClass
     * @param string $column
     * @return string
     */
    public static function generate(
        string $value,
        string $modelClass,
        string $column = 'slug'
    ): string {

        $slug = Str::slug($value);

        $originalSlug = $slug;

        $count = 1;

        while (
            $modelClass::where($column, $slug)->exists()
        ) {

            $slug = $originalSlug . '-' . $count;

            $count++;
        }

        return $slug;
    }
}