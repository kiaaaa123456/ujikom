<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\jenisController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'index']);
    Route::group(['middleware' => ['cekUserLogin:1']], function () {
        Route::resource('/category', CategoryController::class);
        Route::resource('/jenis', jenisController::class);
        Route::get('exportjenis', [jenisController::class, 'jenisExport'])->name('exportjenis');
        Route::get('pdfjenis', [jenisController::class, 'jenisPdf'])->name('pdfjenis');
        Route::post('jenis/import', [jenisController::class, 'importData'])->name('import-jenis');
        Route::resource('/pelanggan', PelangganController::class);
        Route::resource('/menu', MenuController::class);
        Route::resource('/stok', StokController::class);
    });

    Route::group(['middleware' => ['cekUserLogin:2']], function () {
        Route::resource('/pemesanan', PemesananController::class);
        Route::get('nota/{nofaktur}', [TransaksiController::class, 'faktur']);
        Route::resource('/transaksi', TransaksiController::class);
    });
});
