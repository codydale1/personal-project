<?php

namespace App\Livewire;

use App\Livewire\Forms\ApplicantFormData;
use App\Models\Applicant;
use Livewire\Component;

class ApplicantForm extends Component
{
    public ApplicantFormData $form;
    
    public function mount($applicantData = null)
    {
        $this->applicantData = $applicantData ?? new Applicant(); 
        if ($this->applicantData->exists) {
            $this->form->first_name = $this->applicantData->first_name;
            $this->form->last_name = $this->applicantData->last_name;
            $this->form->birthday = $this->applicantData->birthday->format('Y-m-d');
            $this->form->salary = $this->applicantData->salary;
            $this->form->address = $this->applicantData->address;
            $this->form->category = $this->applicantData->category;
            $this->form->experience = $this->applicantData->experience;
        }
    }

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
            'status' => Applicant::$status['Processing'],
        ]);
        session()->flash('success', 'form submitted');

        $this->form->reset();
    }
    public function render()
    {
        return view('livewire.applicant-form');
    }

}
