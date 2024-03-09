<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Asset\AssetsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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

Route::resource('assets', AssetsController::class)->middleware('auth');

Route::middleware('auth')->group(function() {
    Route::post('/assets/month-pagination', [AssetsController::class, 'monthPaginationAjax'])->name('assets.monthPaginationAjax');
    Route::get('/assets/next_month', 'AssetController@nextMonth')->name('assets.nextMonth');
});

require __DIR__.'/auth.php';
