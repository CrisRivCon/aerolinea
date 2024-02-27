<?php

namespace App\Livewire;

use Livewire\Component;

class Buscador extends Component
{
    public $busqueda;

    public function buscar($busqueda)
    {
        $this->dispatch('buscar-vuelo', busqueda: $busqueda);
    }

    public function render()
    {
        return view('livewire.buscador');
    }
}
