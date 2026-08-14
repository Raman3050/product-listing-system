<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [

        'name',
        'slug',

        'property_category_id',
        'builder_id',
        'location_id',

        'description',

        // Location Details
        'address',
        'google_maps_url',
        'nearby_locations',

        'rera_number',
        'possession_date',

        'project_area',
        'area_unit',

        'total_towers',
        'total_units',

        'logo',
        'featured_image',
        'brochure',

        // Floor Plan
        'floor_plan_image',
        'floor_plan_pdf',

        'meta_title',
        'meta_description',
        'meta_keywords',

        'status',
    ];

    protected $casts = [

        'status' => 'boolean',

        'possession_date' => 'date',

        'nearby_locations' => 'array',
    ];

    public function propertyCategory()
    {
        return $this->belongsTo(PropertyCategory::class);
    }

    public function builder()
    {
        return $this->belongsTo(Builder::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'amenity_project');
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function pageDetails()
    {
        return $this->hasOne(ProjectPageDetail::class);
    }

}