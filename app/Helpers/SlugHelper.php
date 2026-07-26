<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class SlugHelper
{
    public static function generate(string $model, string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;

        $counter = 1;

        while (true) {

            $query = $model::where('slug', $slug);

            if ($ignoreId) {
                $query->where('id', '!=', $ignoreId);
            }

            if (!$query->exists()) {
                break;
            }

            $slug = $originalSlug . '-' . $counter++;
        }

        return $slug;
    }
}