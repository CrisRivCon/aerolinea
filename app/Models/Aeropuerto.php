<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aeropuerto extends Model
{
    use HasFactory;
    public function salidas()
    {
        return $this->hasMany(Vuelo::class,  'origen_id', 'id');
    }
    public function llegadas()
    {
        return $this->hasMany(Vuelo::class,  'destino_id', 'id');
    }

}
