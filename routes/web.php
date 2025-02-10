<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicineCalculatorController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/', [MedicineCalculatorController::class, 'index']);
Route::post('/calculate', [MedicineCalculatorController::class, 'calculate'])->name('calculate');

Route::get('/medicine-calculator', [MedicineCalculatorController::class, 'index'])->name('medicine.calculator');
Route::post('/medicine-calculator', [MedicineCalculatorController::class, 'calculate'])->name('medicine.calculate');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
