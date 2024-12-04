<?php

namespace App\Livewire;

use App\Models\Feedback;
use Livewire\Component;

class FormSection extends Component
{
    public $name;
    public $message;

    public function render()
    {
        return view('livewire.form-section');
    }

    public function send(): void
    {
        if ($this->name == '') {
            $this->dispatch('name-error');
            return;
        }

        if ($this->message == '') {
            $this->dispatch('message-error');
            return;
        }

        Feedback::create([
            'name' => $this->name,
            'message' => $this->message,
        ]);

        $this->message = '';
        $this->name = '';



        $this->dispatch('message-sent');
    }
}
