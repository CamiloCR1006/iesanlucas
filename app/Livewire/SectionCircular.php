<?php

namespace App\Livewire;

use App\Models\Circular;
use Livewire\Component;

class SectionCircular extends Component
{
    public $circulars;

    public function mount(){
        $this->circulars = Circular::where('active', true)->get();
    }

    public function render()
    {
        return view('livewire.section-circular');
    }
}
