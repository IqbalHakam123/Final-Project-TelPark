<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    use HasFactory;

    public function rents()
    {
        return $this->hasMany(Rent::class);
    }

    public function lifebuoys()
    {
        return $this->belongsToMany(Lifebuoy::class, 'ride_lifebuoy', 'ride_id', 'lifebuoy_id')->withTimestamps();
    }
}
