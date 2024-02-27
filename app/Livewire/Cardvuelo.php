<?php

namespace App\Livewire;

use Livewire\Component;

class Cardvuelo extends Component
{
    public $vuelo;

    public function mount($vuelo = null)
    {
        $this->vuelo = $vuelo;
    }

    public function render()
    {
        return view('livewire.cardvuelo', [
            'vuelo' => $this->vuelo
        ]);
    }
}
