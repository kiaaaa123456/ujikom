<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\jenisController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MejaController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'index']);
    // Route::get('/', [HomeController::class, 'chart']);
    // Route::get('/', [HomeController::class, 'index2']);
    Route::group(['middleware' => ['cekUserLogin:1']], function () {
        Route::resource('/category', CategoryController::class);
        Route::get('pdfcategory', [CategoryController::class, 'categoryPdf'])->name('pdfcategory');
        Route::get('exportcategory', [CategoryController::class, 'categoryExport'])->name('exportcategory');
        Route::post('category/import', [CategoryController::class, 'importData'])->name('import-category');
        Route::resource('/jenis', jenisController::class);
        Route::get('exportjenis', [jenisController::class, 'jenisExport'])->name('exportjenis');
        Route::get('pdfjenis', [jenisController::class, 'jenisPdf'])->name('pdfjenis');
        Route::post('jenis/import', [jenisController::class, 'importData'])->name('import-jenis');
        Route::resource('/pelanggan', PelangganController::class);
        Route::get('pdfpelanggan', [PelangganController::class, 'pelangganPdf'])->name('pdfpelanggan');
        Route::get('exportpelanggan', [PelangganController::class, 'pelangganExport'])->name('exportpelanggan');
        Route::post('pelanggan/import', [PelangganController::class, 'importData'])->name('import-pelanggan');
        Route::resource('/menu', MenuController::class);
        Route::resource('/meja', MejaController::class);
        Route::get('pdfmeja', [MejaController::class, 'mejaPdf'])->name('pdfmeja');
        Route::get('exportmeja', [MejaController::class, 'mejaExport'])->name('exportmeja');
        Route::post('meja/import', [MejaController::class, 'importData'])->name('import-meja');
        Route::get('exportmenu', [MenuController::class, 'menuExport'])->name('exportmenu');
        Route::get('pdfmenu', [MenuController::class, 'menuPdf'])->name('pdfmenu');
        Route::post('menu/import', [MenuController::class, 'importData'])->name('import-menu');
        Route::resource('/stok', StokController::class);
        Route::post('stok/import', [StokController::class, 'importData'])->name('import-stok');
        Route::get('pdfstok', [StokController::class, 'stokPdf'])->name('pdfstok');
        Route::get('exportstok', [StokController::class, 'stokExport'])->name('exportstok');
        Route::get('tentang-aplikasi', [HomeController::class, 'tentangAplikasi']);
        Route::get('contactUs', [HomeController::class, 'contactUs']);
        Route::resource('/produk-titipan', ProductController::class);
        Route::get('pdfproduct', [ProductController::class, 'productPdf'])->name('pdfproduct');
        Route::get('exportproduct', [ProductController::class, 'productExport'])->name('exportproduct');
        Route::post('produk-titipan/import', [ProductController::class, 'importData'])->name('import-produk-titipan');
        Route::post('/produk-titipan/{id}/update-stok', [ProductController::class, 'updateStok'])->name('produk-titipan.update-stok');
        Route::resource('absensi', AbsensiController::class);
        Route::get('pdfabsensi', [AbsensiController::class, 'absensiPdf'])->name('pdfabsensi');
        Route::get('exportabsensi', [AbsensiController::class, 'absensiExport'])->name('exportabsensi');
        Route::get('unduhabsensi', [AbsensiController::class, 'unduhExport'])->name('unduhabsensi');
        Route::post('absensi/import', [AbsensiController::class, 'importData'])->name('import-absensi');
        Route::post('update-status', [AbsensiController::class, 'updateStatus']);
        Route::post('/simpan-waktu', [AbsensiController::class, 'simpanWaktu']);

    });

    Route::group(['middleware' => ['cekUserLogin:2']], function () {
        Route::resource('/pemesanan', PemesananController::class);
        Route::get('nota/{nofaktur}', [TransaksiController::class, 'faktur']);
        Route::resource('/transaksi', TransaksiController::class);
    });

    Route::group(['middleware' => ['cekUserLogin:3']], function () {
        Route::resource('/laporan', DetailTransaksiController::class);
        Route::get('pdflaporan', [DetailTransaksiController::class, 'laporanPdf'])->name('pdflaporan');
        Route::get('exportlaporan', [DetailTransaksiController::class, 'laporanExport'])->name('exportlaporan');
        Route::post('laporan', [DetailTransaksiController::class, 'filter'])->name('laporan');
        // Route::get('nota/{nofaktur}', [TransaksiController::class, 'faktur']);
        // Route::resource('/transaksi', TransaksiController::class);
    });
});
