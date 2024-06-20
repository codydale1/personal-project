<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Route;

Route::resource('applicants', ApplicantController::class)
    ->only(['index', 'show']);

Route::get('', fn()=>to_route('auth.create'));
Route::get('login', fn()=>to_route('auth.create'));
Route::resource('auth', AuthController::class)
    ->only(['create','store']);
Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])
    ->name('auth.destroy');

Route::middleware('auth')->group(function () {
    // Route::resource('jobs.application', JobApplicationController::class)
    //     ->only(['create', 'store']);
});