<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    use HasFactory;

    public function visitors()
    {
        return $this->hasMany(Visitor::class);
    }
}
