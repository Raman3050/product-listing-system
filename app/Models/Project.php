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

        'rera_number',
        'possession_date',

        'project_area',
        'area_unit',

        'total_towers',
        'total_units',

        'logo',
        'featured_image',
        'brochure',

        'meta_title',
        'meta_description',
        'meta_keywords',

        'status',
    ];

    protected $casts = [

        'status' => 'boolean',

        'possession_date' => 'date',
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

}