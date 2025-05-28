<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentController::class, 'index'])->name('landing');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/signup', [StudentController::class, 'showRegistrationForm'])->name('signup');
Route::post('/signup', [StudentController::class, 'store'])->name('signup.submit');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
    Route::post('/dashboard', [SubjectController::class, 'store'])->name('subjects.store');

    Route::put('/subjects/{subject_id}', [SubjectController::class, 'update'])->name('subjects.update');
    Route::delete('/subjects/{subject_id}', [SubjectController::class, 'destroy'])->name('subjects.destroy');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


