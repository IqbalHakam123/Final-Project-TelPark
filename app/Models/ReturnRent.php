<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnRent extends Model
{

    protected $table = 'returns';
    use HasFactory;

    public function rent()
    {
        return $this->belongsTo(Rent::class);
    }
}
