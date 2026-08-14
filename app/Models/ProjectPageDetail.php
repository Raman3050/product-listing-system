<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectPageDetail extends Model
{
    protected $fillable = [

        'project_id',

        'first_yellow_heading',
        'second_yellow_heading',
        'project_name',
        'description',
        'amount_start',

        'stat_1_value',
        'stat_1_type',

        'stat_2_value',
        'stat_2_type',

        'stat_3_value',
        'stat_3_type',

        'stat_4_value',
        'stat_4_type',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function tenants()
    {
        return $this->belongsToMany(Tenant::class)
            ->withPivot('sort_order')
            ->orderBy('sort_order');
    }
}