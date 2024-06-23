<?php

namespace App\Livewire;

use App\Models\Applicant;
use Livewire\Component;

class DeleteButton extends Component
{
    public $applicant;

    public function delete(Applicant $applicant)
    {
        $applicant->delete();
        $this->dispatch('applicantDeleted', $applicant->id);
    }

    public function mount($applicant)
    {
        $this->applicant = $applicant;
    }

    public function render()
    {
        return view('livewire.delete-button');
    }
}
