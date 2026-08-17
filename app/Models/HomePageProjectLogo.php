<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePageProjectLogo extends Model
{
    protected $fillable = [
        'builder_id',
        'sort_order',
        'status',
    ];

    public function builder()
    {
        return $this->belongsTo(Builder::class);
    }
}
