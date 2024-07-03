<?php

use App\Http\Controllers\AssetCategoryController;
use App\Http\Controllers\CargoAuth\LoginController;
use App\Http\Controllers\CargoAuth\LogoutController;
use App\Http\Controllers\CargoAuth\RegistrationController;
use App\Http\Controllers\Importexcel\ImportExcelController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\MaterialAssetController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\VpuObjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('cargoapp.index');
});

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/
//Route::get('/mainpage',[MainPageController::class,'index'])->middleware('auth')->name('mainpage');
/*Route::get('/mainpage',[MainPageController::class,'index'])->middleware('auth')->name('mainpage');*/
/*Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/

Route::name('user.')->group(function () {
    Route::view('/mainpage', 'mainpage.index')->middleware('userGroupAllow')->name('mainpage');

    Route::get('/', function () {
        if (Auth::check()) {
            return redirect(route('user.mainpage'));
        }
        return view('cargoapp.index');
    });
    Route::post('/login', [LoginController::class,'login'])->name('login');
    Route::post('/logout', [LogoutController::class,'logout'])->name('logout');
    Route::post('/registration', [RegistrationController::class,'save']);


    Route::get('/registration', function () {
        if (Auth::check()) {
            return redirect(route('user.mainpage'));
        }
        return view('cargoapp.registration');
    })->name('registration');
});


Route::get('/materialAssets/import', [ImportExcelController::class, 'index'])->middleware('userGroupAllow')->name('materialAssets.import');
Route::post('/materialAssets/import', [ImportExcelController::class, 'importexcel'])->middleware('userGroupAllow')->name('materialAssets.add');
Route::get('/materialAssets/search', [MaterialAssetController::class, 'search'])->middleware('userGroupAllow')->name('materialAssets.search');

Route::get('/operations/transfer', [OperationController::class, 'index_transfer'])->middleware('userGroupAllow')->name('operations.index_transfer');
Route::post('operations/transfer', [OperationController::class, 'transfer'])->middleware('userGroupAllow')->name('operations.transfer');

Route::get('/operations/writeoff', [OperationController::class, 'index_writeoff'])->middleware('userGroupAllow')->name('operations.index_writeoff');
Route::post('operations/writeoff', [OperationController::class, 'writeoff'])->middleware('userGroupAllow')->name('operations.writeoff');


Route::middleware('userGroupAllow')->group(function () {
    Route::resource('materialAssets', MaterialAssetController::class);
    Route::resource('assetsCategories', AssetCategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('operations', OperationController::class);
    Route::resource('inventories', InventoryController::class);
    Route::resource('vpuObjects', VpuObjectController::class);
    Route::resource('systems', SystemController::class);
});
