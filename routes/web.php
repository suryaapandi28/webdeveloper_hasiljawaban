<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccountPenggunaController;
use App\Http\Controllers\DashboardpenggunaController;
use App\Http\Controllers\DashboardadminController;

Route::get('/', function () {
    return redirect('/login');
});

Route::controller(AccountPenggunaController::class)->group(function () {
    Route::get('/login', 'Login');
    Route::get('/register', 'Register');

    Route::post('/register/validasi-register', 'Val_Register');
    Route::post('/login/validasi', 'Val_Login');

    Route::get('/logout', 'Logout');
});


Route::controller(DashboardpenggunaController::class)->group(function () {
    Route::get('/portal/pengguna/dashboard', 'Dashboard');

    Route::get('/portal/pengguna/peminjamaan/view', 'Viewpinjam');
    Route::get('/portal/pengguna/peminjamaan/tambah', 'Tambahpinjam');
    Route::get('/portal/pengguna/peminjamaan/tambah/{idkendaraan}', 'Tambahnextpinjam');

    Route::post('/portal/admin/peminjamaan/createpinjam', 'createpinjam');

});

Route::controller(DashboardadminController::class)->group(function () {
    Route::get('/portal/admin/dashboard', 'Dashboard');
    Route::get('/portal/admin/kendaraan/view', 'ViewKendaraan');
    Route::get('/portal/admin/kendaraan/tambah', 'TambahKendaraan');

    Route::post('/portal/admin/kendaraan/createkendaraan', 'createkendaraan');

});
