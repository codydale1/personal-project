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

    public $applicantData;
    
    #[Url(history:true)]
    public $perPage = 5;

    #[Url(history:true)]

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

    public function editApplicant($applicant)
    {
        $this->applicantData = $applicant;
    }

    public function render()
    {
        return view('livewire.applicants-page', 
        ['applicants' => Applicant::search($this->search)
        ->when($this->status !== '', function($query){
            $query->where('status', $this->status);
        })
        ->when($this->category !== '', function($query) {
            $query->where('category', $this->category);
        })
        ->when($this->experience !== '', function($query) {
            $query->where('experience', $this->experience);
        })
        ->when($this->min_salary !== '', function($query) {
            $query->where('salary', '>=' ,$this->min_salary);
        })
        ->when($this->max_salary !== '', function($query) {
            $query->where('salary', '<=', $this->max_salary);
        })
        ->paginate($this->perPage)]);
    }
  

    public function delete(Applicant $applicant){
        $applicant->delete();
    }
}
