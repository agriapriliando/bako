<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PasarController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('tentang', [HomeController::class, 'tentang']);

Route::get('grafik/mingguan', [GrafikController::class, 'index']); // semuakategori
Route::get('grafik/datamingguan', [GrafikController::class, 'dataGrafik']); // semua kategori
Route::get('grafikbarang/{itemid}', [GrafikController::class, 'grafikbarang']); // by id
Route::get('grafikbarang/datamingguan/{itemid}', [GrafikController::class, 'dataMingguan']);
Route::get('grafikbarang/databulanan/{itemid}', [GrafikController::class, 'dataBulanan']);
Route::get('grafikbarang/{itemid}/{tahun}', [GrafikController::class, 'dataTahunan']);

Route::get('report/{pasar_id}/{tgl}', [ReportController::class, 'html']);
Route::get('report/{pasar_id}/{tgl}/pdf', [ReportController::class, 'pdf']);
Route::get('reporthet/{pasar_id}/{tgl}', [ReportController::class, 'htmlhet']);
Route::get('reporthet/{pasar_id}/{tgl}/pdf', [ReportController::class, 'pdfhet']);
// http://localhost/sembakolaravel/public/report/1/2024-04-07
Route::get('report/{pasar_id}/{tgl}/excel', [ExcelController::class, 'export']);
// http://localhost/sembakolaravel/public/report/1/2024-04-07/excel

Route::get('setting/{id}', [SettingController::class, 'dataSetting']);
Route::patch('setting/{setting}/update', [SettingController::class, 'updateSetting']);
Route::get('setting/{setting}/reset', [SettingController::class, 'resetSetting']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::middleware('cekStatus')->group(function () {
        Route::get('users', [UserController::class, 'index']);
        Route::get('users/create', [UserController::class, 'create']);
        Route::post('users', [UserController::class, 'store']);
        Route::delete('users/{id}', [UserController::class, 'destroy']);
        Route::get('users/{user}/edit', [UserController::class, 'edit']);
        Route::patch('users/{user}', [UserController::class, 'update']);
        Route::get('users/{user}/reset', [UserController::class, 'resetPass']);
    });
    Route::get('gantipass', [UserController::class, 'editPass']);
    Route::patch('gantipass', [UserController::class, 'gantiPass']);
    Route::resource('categories', CategoryController::class);
    Route::get('/listitem/{tglinput}/{pasar_id}', [PriceController::class, 'listitem'])->name('listitem');
    Route::get('/prices/create/{pasar_id}', [PriceController::class, 'create']);
    Route::resource('items', ItemController::class);
    Route::resource('pasars', PasarController::class);
    Route::resource('prices', PriceController::class);
    Route::get('prices/deletes/{tgl}/{pasar_id}', [PriceController::class, 'deletes']);
    Route::get('prices/copy/{tgl}/{pasar_id}', [PriceController::class, 'copyDataKemarin']);
    Route::post('priceby', [PriceController::class, 'priceby']);
    Route::get('hargapasar/{slugpasar}', [PriceController::class, 'hargapasar']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
