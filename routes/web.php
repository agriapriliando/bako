<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PasarController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
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

Route::get('report/{pasar_id}/{tgl}', [ReportController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::get('/listitem/{tglinput}/{pasar_id}', [PriceController::class, 'listitem'])->name('listitem');
    Route::get('/prices/create/{pasar_id}', [PriceController::class, 'create']);
    Route::resource('items', ItemController::class);
    Route::resource('pasars', PasarController::class);
    Route::resource('prices', PriceController::class);
    Route::post('priceby', [PriceController::class, 'priceby']);
    Route::get('hargapasar/{slugpasar}', [PriceController::class, 'hargapasar']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
