<?php

namespace App\Livewire;

use App\Livewire\Forms\ApplicantForm;
use App\Models\Applicant;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layout.app')]

class AddApplicantsPage extends Component
{
    public ApplicantForm $form;

    public function submitForm()
    {
        $this->form->validate();
        Applicant::create([
            'first_name' => $this->form->first_name,
            'last_name' => $this->form->last_name,
            'salary' => $this->form->salary,
            'address' => $this->form->address,
            'birthday' => $this->form->birthday,
            'user_id' => auth()->id(), 
            'experience' => $this->form->experience,
            'category' => $this->form->category,
            'status' => Applicant::$status['Processing'],
        ]);
        session()->flash('success', 'New Applicant Created!');

        $this->form->reset();
        return redirect()->route('applicants');
        }
    
    public function render()
    {
        return view('livewire.add-applicants-page');
    }
}
