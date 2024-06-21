<?php

namespace App\Livewire;

use Livewire\Component;

class DeleteButton extends Component
{
    public $applicant;

    public function mount($applicant)
    {
        $this->applicant = $applicant;
    }

    public function render()
    {
        return view('livewire.delete-button');
    }
}
