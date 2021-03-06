<?php

use App\Models\HargaProduct;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccAdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\StokGabahController;
use App\Http\Controllers\AccKaryawanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\HargaProductController;
use App\Http\Controllers\AccPerusahaanController;
use App\Http\Controllers\ForcastingController;
use App\Http\Controllers\RekapPenjualanController;
use App\Http\Controllers\StokProdukJadiController;
use App\Http\Controllers\StokPengeringanController;
use App\Http\Controllers\StokPenyortiranController;
use App\Http\Controllers\JenisPengeluaranController;
use App\Http\Controllers\LaporanKeuanganController;
use App\Http\Controllers\StokPenggilinganController;
use App\Http\Controllers\StokPenyortiran2Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'logout']);

Route::middleware(['guest'])->group(function () {
  Route::get('/login', [LoginController::class, 'login'])->name('login');
  Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::middleware(['auth'])->group(function () {
  Route::get('/logout', [LoginController::class, 'logout']);
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('db');

  Route::resource('/account/perusahaan', AccPerusahaanController::class)->except(['show', 'destroy']);

  Route::resource('/stock/gabah', StokGabahController::class)->except(['show']);

  Route::get('/stok/pengeringan', [StokPengeringanController::class, 'index'])->name('stok-pengeringan');
  Route::get('/stock/pengeringan/create', [StokPengeringanController::class, 'createData'])->name('createPengeringan');
  Route::post('/stock/pengeringan/createData', [StokPengeringanController::class, 'createDataPengeringan'])->name('createDataPengeringan');
  Route::get('/stock/pengeringan/{id}/delete', [StokPengeringanController::class, 'delete'])->name('deletePengeringan');
  Route::get('/stock/pengeringan/{id}/edit', [StokPengeringanController::class, 'edit'])->name('editPengeringan');
  Route::post('/stock/pengeringan/{id}/editData', [StokPengeringanController::class, 'editData'])->name('editDataPengeringan');

  Route::get('/stok/penggilingan', [StokPenggilinganController::class, 'index'])->name('stok-penggilingan');
  Route::get('/stock/penggilingan/create', [StokPenggilinganController::class, 'createData'])->name('createPenggilingan');
  Route::post('/stock/penggilingan/createData', [StokPenggilinganController::class, 'createDataPenggilingan'])->name('createDataPenggilingan');
  Route::get('/stock/penggilingan/{id}/delete', [StokPenggilinganController::class, 'delete'])->name('deletePenggilingan');
  Route::get('/stock/penggilingan/{id}/edit', [StokPenggilinganController::class, 'edit'])->name('editPenggilingan');
  Route::post('/stock/penggilingan/{id}/editData', [StokPenggilinganController::class, 'editData'])->name('editDataPenggilingan');

  Route::get('account/profile', [ProfileController::class, 'index'])->name('profile');
  Route::resource('/account/admin', AccAdminController::class)->except(['show', 'destroy']);
  Route::get('/account/admin/{id}/delete', [AccAdminController::class, 'destroy']);
  Route::resource('/account/karyawan', AccKaryawanController::class)->except(['show', 'destroy']);
  Route::get('/account/karyawan/{id}/delete', [AccKaryawanController::class, 'destroy']);

  Route::resource('/stock/penyortiran', StokPenyortiranController::class)->except(['show']);
  Route::resource('/stock/penyortiran2', StokPenyortiran2Controller::class)->except(['show']);

  Route::resource('/stock/produkJadi', StokProdukJadiController::class)->except(['show', 'destroy']);

  Route::resource('/stock/produkJadi/harga', HargaProductController::class)->except(['show', 'destroy']);
  Route::get('/stock/produkJadi/harga/{id}/delete', [HargaProductController::class, 'destroy']);

  Route::get('/penjualan/getStok', [PenjualanController::class, 'getStok'])->name('penjualan.getStok');
  Route::resource('/penjualan', PenjualanController::class)->except(['destroy']);

  Route::get('/rekapPenjualan', [RekapPenjualanController::class, 'index'])->name('rekapPenjualan.index');
  Route::get('/rekapPenjualan/filter', [RekapPenjualanController::class, 'viewFilter'])->name('rekapPenjualan.filter');

  Route::resource('/keuangan/pengeluaran/jenis', JenisPengeluaranController::class);

  Route::resource('/keuangan/pengeluaran', PengeluaranController::class, [
    'names' => [
      'index' => 'keuangan.pengeluaran.index',
      'create' => 'keuangan.pengeluaran.create',
      'store' => 'keuangan.pengeluaran.store',
      'show' => 'keuangan.pengeluaran.show',
      'edit' => 'keuangan.pengeluaran.edit',
      'update' => 'keuangan.pengeluaran.update',
      'destroy' => 'keuangan.pengeluaran.destroy'
    ]
  ]);

  Route::get('/keuangan/laporanKeuangan', [LaporanKeuanganController::class, 'index'])->name('laporanKeuangan.index');
  Route::get('/keuangan/laporanKeuangan/filter', [LaporanKeuanganController::class, 'viewFilter'])->name('laporanKeuangan.filter');

  Route::get('/keuangan/peramalan', [ForcastingController::class, 'index'])->name('peramalan.index');
  Route::post('/keuangan/peramalan/result', [ForcastingController::class, 'result'])->name('peramalan.result');
});
