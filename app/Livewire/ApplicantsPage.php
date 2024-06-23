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

    public $search = '';

    #[Url(history:true)]
    public $status = '';

    #[Url(history:true)]
    public $category = '';

    #[Url(history:true)]
    public $experience = '';

    #[Url(history:true)]
    public $min_salary = '';

    #[Url(history:true)]
    public $max_salary = '';

    // protected $listeners = [
    //     'perPageUpdated' => 'updatePerPage',
    //     'searchUpdated' => 'updateSearch',
    //     'statusUpdated' => 'updateStatus',
    //     'applicantDeleted' => 'removeApplicant',
    // ];

  


    public function render()
    {
        return view('livewire.applicants-page', 
        ['applicants' => Applicant::search($this->search)
            ->paginate($this->perPage)]);
    }
  

    public function delete(Applicant $applicant){
        $applicant->delete();
    }
}
