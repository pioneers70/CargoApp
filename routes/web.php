<?php

use App\Http\Controllers\Importexcel\ImportExcelController;
use App\Http\Controllers\MaterialAssetController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/assets', [MaterialAssetController::class, 'index']);
Route::get('/assets/import',[ImportExcelController::class, 'index']);
Route::post('/assets/import',[ImportExcelController::class, 'importexcel']);



require __DIR__.'/auth.php';
