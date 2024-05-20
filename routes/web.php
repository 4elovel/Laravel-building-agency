<?php

use App\Http\Controllers\ApartmentRequestController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\WelcomeController;

Route::middleware([SetLocale::class])->group(function () {
Route::get('/',[WelcomeController::class, 'showForm'])->name('apartment.application.form');
Route::post('/',[WelcomeController::class, 'submitForm'])->name('apartment.application.submit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/building/request',[BuildingController::class, 'showForm'])->name('building.form');
    Route::post('/building/request',[BuildingController::class, 'submitForm'])->name('building.submit');

    Route::get('/apartment-requests', [ApartmentRequestController::class, 'index'])->name('apartment.requests.index');
    Route::delete('/apartment-requests/{id}', [ApartmentRequestController::class, 'destroy'])->name('apartment.requests.destroy');
});
});
require __DIR__.'/auth.php';
