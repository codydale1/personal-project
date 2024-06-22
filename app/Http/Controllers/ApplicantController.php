<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class ApplicantController extends Controller
{
    use WithPagination;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = request()->only('search', 'min_salary', 'max_salary', 'experience', 'category', 'status','main_filter');
        return view('applicants.index', ['applicants' => Applicant::filter($filters)->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
