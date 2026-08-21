<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Builder extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'slug',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}