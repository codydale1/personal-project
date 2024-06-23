<?php

namespace App\Livewire;

use Livewire\Component;

class ApplicantRow extends Component
{

    public $applicant;
    
    public function render()
    {
        return view('livewire.applicant-row');
    }
}
