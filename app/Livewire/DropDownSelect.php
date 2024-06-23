<?php

namespace App\Livewire;

use Livewire\Component;

class DropDownSelect extends Component
{
    public $title;
    public array $options;

    public function updatedValue($value)
    {
        $this->dispatch('statusUpdated', $value);
    }
    public function render()
    {
        return view('livewire.drop-down-select');
    }
}
