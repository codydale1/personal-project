<?php

namespace App\Livewire;

use App\Models\Applicant;
use Livewire\Component;

class DeleteModal extends Component
{
    public $applicant;

    public function mount($applicant)
    {
        $this->applicant = $applicant;
    }

    public function onClick()
    {
        if ($this->applicant){
            dd($this->applicant);
            $this->applicant->delete();
        }
        return redirect()->route('applicants.index');
    }

    public function render()
    {
        return view('livewire.delete-modal');
    }
}