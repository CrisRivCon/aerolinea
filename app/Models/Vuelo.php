<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'id_aeropuerto_origen',
        'id_aeropuerto_destino',
        'id_companya',
        'fecha_salida',
        'fecha_llegada',
        'plazas',
        'precio'
    ];

    public function companya()
    {
        return $this->belongsTo(Companya::class);
    }
    public function aeropuertoOrigen()
    {
        return $this->belongsTo(Aeropuerto::class, 'id_aeropuerto_origen');
    }
    public function aeropuertoDestino()
    {
        return $this->belongsTo(Aeropuerto::class, 'id_aeropuerto_destino');
    }
}
