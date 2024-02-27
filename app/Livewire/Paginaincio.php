<?php

namespace App\Livewire;

use App\Models\Vuelo;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Paginaincio extends Component
{
    use WithPagination;
    public $busqueda;

    #[On('buscar-vuelo')]

    public function buscarCodigo($busqueda = '%')
    {
        $this->busqueda = $busqueda;
    }

    public function render()
    {
        return view('livewire.paginaincio',
        [
            'vuelos' => Vuelo::with(['aeropuertoDestino', 'aeropuertoOrigen', 'companya'])
                                ->whereRaw("lower(vuelos.codigo) LIKE lower('%".$this->busqueda."%')")
                                ->paginate(4)
        ]);
    }
}
