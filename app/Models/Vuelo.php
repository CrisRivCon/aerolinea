<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\UseItem;

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

    public function completo()
    {
        return $this->plazasDisponibles() == 0;
    }

    public function asientos()
    {
        return range(1,$this->plazas);
    }

    public function asientosReservados()
    {
        $asientos = function($reserva)
        {
            return $reserva->asiento;
        };

        $reservas = $this->reservas->all();

        $reservados = array_map($asientos, $reservas);

        return $reservados;
    }

    public function esta_reservado($asiento)
    {
        return in_array($asiento, $this->asientosReservados());
    }

}
