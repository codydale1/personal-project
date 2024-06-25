<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use App\Models\Applicant;
use Livewire\Form;

class ApplicantFormData extends Form
{
    #[Validate('required|string|min:1|max:50')]
    public $first_name="";

    #[Validate('required|string|min:1|max:50')]
    public $last_name="";

    #[Validate('required|string|min:0')]
    public $salary="";

    #[Validate('required|string|min:1|max:100')]
    public $address="";

    #[Validate('required|date')]
    public $birthday="";

    #[Validate('required|in:software_engineer,quality_assurance,technical_director')]
    public $category = '';

    #[Validate('required|in:entry,intermediate,senior')]
    public $experience = '';


    public function mount()
    {
        $this->category = array_values(Applicant::$category)[0];
        $this->experience = array_values(Applicant::$experience)[0];
    }
}
