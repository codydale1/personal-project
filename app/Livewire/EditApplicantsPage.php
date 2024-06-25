<?php

namespace App\Livewire;

use App\Livewire\Forms\ApplicantForm;
use App\Models\Applicant;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layout.app')]
class EditApplicantsPage extends Component
{
    public ApplicantForm $form;
    public Applicant $applicant;

    public function mount($id)
    {
        $this->applicant = Applicant::find($id);
        $this->loadApplicantData();
    }

    public function loadApplicantData()
    {
        if ($this->applicant) {
            $this->form->first_name = $this->applicant->first_name;
            $this->form->last_name = $this->applicant->last_name;
            $this->form->birthday = $this->applicant->birthday;
            $this->form->salary = (string)$this->applicant->salary;
            $this->form->address = $this->applicant->address;
            $this->form->category = $this->applicant->category;
            $this->form->experience = $this->applicant->experience;
            $this->form->status = $this->applicant->status;

        }
    }

    public function submitForm()
    {
        $this->form->validate();

        if ($this->applicant) {
            $this->applicant->update([
                'first_name' => $this->form->first_name,
                'last_name' => $this->form->last_name,
                'salary' => $this->form->salary,
                'address' => $this->form->address,
                'birthday' => $this->form->birthday,
                'category' => $this->form->category,
                'experience' => $this->form->experience,
                'status' => $this->form->status,
            ]);

            session()->flash('success', 'Applicant Updated!');
        }

        return redirect()->route('applicants');
    }

    public function render()
    {
        return view('livewire.edit-applicants-page');
    }
}