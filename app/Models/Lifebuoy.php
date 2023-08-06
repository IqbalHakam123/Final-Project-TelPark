<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lifebuoy extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function rents()
    {
        return $this->hasMany(Rent::class);
    }

    public function rides()
    {
        return $this->belongsToMany(Ride::class, 'ride_lifebuoy', 'lifebuoy_id', 'ride_id')->withTimestamps();
    }
}
