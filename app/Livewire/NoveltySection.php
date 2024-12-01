<?php

namespace App\Livewire;

use App\Models\Novelty;
use Livewire\Component;
use Livewire\WithPagination;

class NoveltySection extends Component
{
    use WithPagination;
 
    public function render()
    {
        return view('livewire.novelty-section',[
            "novelties" => Novelty::where('active', 1)->paginate(5)
        ]);
    }
}
