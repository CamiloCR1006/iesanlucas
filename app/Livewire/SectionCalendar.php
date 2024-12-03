<?php

namespace App\Livewire;

use App\Models\Calendar;
use Livewire\Component;

class SectionCalendar extends Component
{
    public $calendar;
    public function mount(): void
    {
        $this->calendar = Calendar::where('active', true)->first();
    }

    public function render()
    {
        return view('livewire.section-calendar');
    }
}
