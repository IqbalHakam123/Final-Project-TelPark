<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lifebuoy extends Model
{
    use HasFactory;

    public function rents()
    {
        return $this->hasMany(Rent::class);
    }

    public function rides()
    {
        return $this->belongsToMany(Ride::class, 'ride_lifebuoy', 'lifebuoy_id', 'ride_id')->withTimestamps();
    }
}
