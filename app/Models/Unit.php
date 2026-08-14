<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'project_id',
        'property_type_id',
        'tenant_id',

        'name',
        'slug',

        'price',
        'price_on_request',

        'annual_roi',
        'lease_status',
        'lock_in_years',
        'monthly_rental',
        'minimum_rental',

        'floor_size',
        'floor_size_unit',

        'description',

        'meta_title',
        'meta_description',
        'meta_keywords',

        'status',
    ];

    protected $casts = [
        'price_on_request' => 'boolean',
        'status' => 'boolean',
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

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function features()
    {
        return $this->belongsToMany(UnitFeature::class, 'unit_feature');
    }

}