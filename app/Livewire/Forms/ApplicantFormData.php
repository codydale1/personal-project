<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ApplicantFormData extends Form
{
    #[Validate('required|string|min:1|max:50')]
    public $first_name = "";

    #[Validate('required|string|min:1|max:50')]
    public $last_name = "";

}
