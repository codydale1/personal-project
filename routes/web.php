<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
Route::get('', fn()=>to_route('auth.create'));
Route::get('login', fn()=>to_route('auth.create'));
Route::resource('auth', AuthController::class)
    ->only(['create','store']);
});

Route::middleware('user')->group(function () {
    Route::resource('applicants', ApplicantController::class)
    ->only(['index', 'show']);
Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])
    ->name('auth.destroy');
});