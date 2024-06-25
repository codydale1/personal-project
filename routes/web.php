<?php

use App\Http\Controllers\AuthController;

use App\Livewire\ApplicantsPage;
use App\Livewire\EditApplicantsPage;
use App\Livewire\AddApplicantsPage;
use App\Livewire\AuthPage;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
Route::get('', fn()=>to_route('auth'));
Route::get('/auth', fn()=>to_route('auth'));
Route::get('/login', AuthPage::class)
    ->name('auth');

Route::post('/auth/store', [AuthController::class, 'store'])
    ->name('auth.store');
});

Route::middleware('user')->group(function () {

Route::get('/applicants', ApplicantsPage::class)->name('applicants');
Route::get('/applicants/add', AddApplicantsPage::class)->name('applicants.add');
Route::get('/applicants/edit/{id}', EditApplicantsPage::class)->name('applicants.edit');

Route::get('', fn()=>to_route('applicants'));
Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])
    ->name('auth.destroy');
});