<?php

use App\Http\Controllers\AssetCategoryController;
use App\Http\Controllers\Importexcel\ImportExcelController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\MaterialAssetController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\VpuObjectController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

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



Route::get('/materialAssets/import', [ImportExcelController::class, 'index'])->middleware('auth')->name('materialAssets.import');
Route::post('/materialAssets/import', [ImportExcelController::class, 'importexcel'])->middleware('auth')->name('materialAssets.add');
Route::get('/materialAssets/search',[MaterialAssetController::class, 'search'])->middleware('auth')->name('materialAssets.search');

Route::get('/operations/transfer', [OperationController::class, 'index_transfer'])->middleware('auth')->name('operations.index_transfer');
Route::post('operations/transfer', [OperationController::class, 'transfer'])->middleware('auth')->name('operations.transfer');

Route::get('/operations/writeoff', [OperationController::class, 'index_writeoff'])->middleware('auth')->name('operations.index_writeoff');
Route::post('operations/writeoff', [OperationController::class, 'writeoff'])->middleware('auth')->name('operations.writeoff');

Route::get('/main',[MainPageController::class,'index'])->middleware('auth')->name('main.index');

Route::middleware('auth')->group(function () {
    Route::resource('materialAssets', MaterialAssetController::class);
    Route::resource('assetsCategories', AssetCategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('operations', OperationController::class);
    Route::resource('inventories', InventoryController::class);
    Route::resource('vpuObjects', VpuObjectController::class);
    Route::resource('systems', SystemController::class);
});
