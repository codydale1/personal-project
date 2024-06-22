<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Applicant;
use Livewire\Attributes\Layout;

#[Layout('layout.app')]
class ApplicantsPage extends Component
{
    use WithPagination;

    #[Url()]
    public $perPage = 5;

    #[Url(history:true)]
    public $search = '';
    public function render()
    {
        return view('livewire.applicants-page', 
        ['applicants' => Applicant::search($this->search)
            ->paginate($this->perPage)]);
    }
    public function updatedSearch(){
        $this->resetPage();
    }

    public function delete(Applicant $applicant){
        $applicant->delete();
    }
}
