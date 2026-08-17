<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePageUnitBanner extends Model
{
    protected $fillable = [
        'project_id',
        'unit_id',
        'yellow_tagline',
        'heading',
        'description',
        'button_text',
        'background_image',
        'card_title',
        'card_category',
        'card_brand',
        'card_area',
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
