<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companya extends Model
{
    use HasFactory;
    public function vuelos()
    {
        return $this->hasMany(Vuelo::class);
    }
}
