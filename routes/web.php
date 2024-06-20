<?php

use App\Http\Controllers\AssetCategoryController;
use App\Http\Controllers\Importexcel\ImportExcelController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\MaterialAssetController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\VpuObjectController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/materialAssets/import',[ImportExcelController::class, 'index'])->name('materialAssets.import');
Route::post('/materialAssets/import',[ImportExcelController::class, 'importexcel'])->name('materialAssets.add');

Route::get('/operations/transfer',[OperationController::class,'index_transfer'])->name('operations.index_transfer');
Route::post('operations/transfer', [OperationController::class,'transfer'])->name('operations.transfer');
Route::get('/operations/writeoff',[OperationController::class,'index_writeoff'])->name('operations.index_writeoff');
Route::post('operations/writeoff', [OperationController::class,'writeoff'])->name('operations.writeoff');


Route::resource('materialAssets', MaterialAssetController::class);
Route::resource('assetsCategories', AssetCategoryController::class);
Route::resource('tags', TagController::class);
Route::resource('operations', OperationController::class);
Route::resource('inventories', InventoryController::class);
Route::resource('vpuObjects', VpuObjectController::class);
Route::resource('systems', SystemController::class);


/*Route::get('/assets', [MaterialAssetController::class, 'index'])->name('assets.index');
Route::get('/assets/create', [MaterialAssetController::class, 'create'])->name('assets.create');
Route::post('/assets', [MaterialAssetController::class, 'store'])->name('assets.store');
Route::get('/assets/{materialAsset}', [MaterialAssetController::class, 'show'])->name('assets.show');
Route::get('/assets/{$materialAsset}/edit',[MaterialAssetController::class,'edit'])->name('assets.edit');
Route::put('/assets/{$materialAsset}',[MaterialAssetController::class,'update'])->name('assets.update');
Route::delete('/assets/{$materialAsset}',[MaterialAssetController::class,'destroy'])->name('assets.destroy');*/



require __DIR__.'/auth.php';

