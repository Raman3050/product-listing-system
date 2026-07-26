<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'status',
        'sort_order',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}