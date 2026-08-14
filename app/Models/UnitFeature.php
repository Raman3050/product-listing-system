<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitFeature extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function units()
    {
        return $this->belongsToMany(Unit::class, 'unit_feature');
    }
}