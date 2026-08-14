<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'slug',
        'description',
        'business_category',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function projectPageDetails()
    {
        return $this->belongsToMany(ProjectPageDetail::class)
            ->withPivot('sort_order')
            ->orderBy('sort_order');
    }
}