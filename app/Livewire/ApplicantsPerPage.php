<?php

namespace App\Livewire;

use Livewire\Component;

class ApplicantsPerPage extends Component
{
    public $perPage = 5;

    public function updatedPerPage()
    {
        $this->dispatch('perPageUpdated', $this->perPage);
    }

    public function render()
    {
        return view('livewire.applicants-per-page');
    }
}
