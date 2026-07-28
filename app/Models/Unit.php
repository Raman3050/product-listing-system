<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [

        'project_id',
        'property_type_id',

        'name',
        'slug',

        'price',
        'price_on_request',
        'booking_amount',

        'carpet_area',
        'builtup_area',
        'super_area',
        'area_unit',

        'bedrooms',
        'bathrooms',
        'balconies',

        'floor',
        'total_floors',

        'facing',

        'description',

        'meta_title',
        'meta_description',
        'meta_keywords',

        'status',

    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function images()
    {
        return $this->hasMany(UnitImage::class);
    }

}