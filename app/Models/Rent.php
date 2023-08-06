<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rent extends Model
{
    protected $guarded = [];
    use HasFactory;
    use SoftDeletes;

    public function lifebuoy()
    {
        return $this->belongsTo(Lifebuoy::class);
    }

    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }

    public function ride()
    {
        return $this->belongsTo(Ride::class);
    }

    public function return_rent()
    {
        return $this->hasOne(ReturnRent::class);
    }
}
