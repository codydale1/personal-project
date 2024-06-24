<?php

namespace App\Livewire;

use Livewire\Component;

class ApplicantForm extends Component
{
    public ApplicantForm $form;


    public function submitForm()
    {
        $this->validate();

        session()->flash('success', 'form submitted');

        $this->form->reset();
    }
    public function render()
    {
        return view('livewire.applicant-form');
    }
}
