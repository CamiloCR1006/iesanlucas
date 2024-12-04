<?php

namespace App\Livewire;

use App\Models\Graduate;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Tables\Actions\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Illuminate\Support\HtmlString;
use Livewire\Component;

class SectionGraduate extends Component
{
    public $name;
    public $year;
    public $level_of_study;
    public $undergraduate;
    public $postgraduate;
    public $phone_number;
    public $email;
    public $permision;

    public function send() : void {
        if(!$this->validar()) {
            $this->dispatch('error');
            return;
        }

        Graduate::create([
            'name' => $this->name,
            'year' => $this->year,
            'level_of_study' => $this->level_of_study,
            'undergraduate' => $this->undergraduate,
            'postgraduate' => $this->postgraduate,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'permision' => $this->permision,
        ]);

        $this->dispatch('success');

        $this->name = '';
        $this->year = '';
        $this->level_of_study = '';
        $this->undergraduate = '';
        $this->postgraduate = '';
        $this->phone_number = '';
        $this->email = '';
        $this->permision = '';

    }

    public function validar() : bool {
        if($this->name == '') {
            return false;
        }

        if($this->year == '') {
            return false;
        }

        if($this->level_of_study == '' || $this->level_of_study == null) {
            return false;
        }


        if($this->phone_number == '') {
            return false;
        }

        if($this->email == '') {
            return false;
        }

        if($this->permision == '') {
            return false;
        }

        return true;
    }

    public function render()
    {
        return view('livewire.section-graduate');
    }
}
