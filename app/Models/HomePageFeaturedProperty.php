<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePageFeaturedProperty extends Model
{
    protected $fillable = [
        'project_id',
        'unit_id',
        'display_image',
        'sort_order',
        'status',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
