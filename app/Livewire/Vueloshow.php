<?php

namespace App\Livewire;

use Livewire\Component;

class Vueloshow extends Component
{
    public $vuelo;
    public function render()
    {
        $vuelo = $this->vuelo;
        return view('livewire.vueloshow',[
            'vuelo' => $vuelo,
        ]);
    }
}
