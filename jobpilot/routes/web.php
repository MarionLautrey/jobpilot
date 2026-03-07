<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect()->route('offres.index');
});

// Routes Offres protégées par authentification
Route::middleware(['auth'])->group(function () {
    Route::resource('offres', OffreController::class);
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';

Route::resource('entreprises', EntrepriseController::class);
Route::resource('candidats', CandidatController::class);

