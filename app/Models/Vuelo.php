<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'origen_id',
        'destino_id',
        'companya_id',
        'salida',
        'llegada',
        'plazas',
        'precio'
    ];

    public function companya()
    {
        return $this->belongsTo(Companya::class);
    }
    public function aeropuertoOrigen()
    {
        return $this->belongsTo(Aeropuerto::class, 'origen_id');
    }
    public function aeropuertoDestino()
    {
        return $this->belongsTo(Aeropuerto::class, 'destino_id');
    }
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function plazasDisponibles()
    {
        return $this->plazas - count($this->reservas);
    }
}
