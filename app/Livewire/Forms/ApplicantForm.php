<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use App\Models\Applicant;
use Livewire\Form;

class ApplicantForm extends Form
{
    #[Validate('required|string|min:1|max:50')]
    public $first_name='';

    #[Validate('required|string|min:1|max:50')]
    public $last_name='';

    #[Validate('required|string|min:0')]
    public $salary='';

    #[Validate('required|string|min:1|max:100')]
    public $address='';

    #[Validate('required|date')]
    public $birthday='';

    #[Validate('required|in:software_engineer,quality_assurance,technical_director')]
    public $category = '';

    #[Validate('required|in:entry,intermediate,senior')]
    public $experience = '';

    public $status = '';


}
