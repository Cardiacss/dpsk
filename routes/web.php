<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// ----------------------------
// GRUP RUTE UNTUK ADMINISTRATOR
// ----------------------------
Route::middleware(['auth', 'role:Administrator'])->group(function () {
    Route::get('/admin/menu', function () {
        return view('ADMIN.menuadmin');
    })->name('admin.menu');

    Route::get('/admin/daftarpeserta', [App\Http\Controllers\Admin\PesertaController::class, 'index'])
        ->name('admin.daftarpeserta');
    Route::get('/daftarpesertaadmin', [App\Http\Controllers\Admin\PesertaController::class, 'index'])->name('peserta.index');
    Route::get('/pendaftaranpesertaadmin', [App\Http\Controllers\Admin\PesertaController::class, 'create'])->name('peserta.create');
    Route::post('/pendaftaranpesertaadmin', [App\Http\Controllers\Admin\PesertaController::class, 'store'])->name('peserta.store');
    Route::delete('/pendaftaranpesertaadmin/{idanggota}', [App\Http\Controllers\Admin\PesertaController::class, 'destroy'])
        ->name('peserta.destroy');
    // routes/web.php
    Route::get('/ubahpesertaadmin/{idanggota}', [App\Http\Controllers\Admin\PesertaController::class, 'edit'])
        ->name('peserta.edit');
    Route::delete('/hapuspeserta/{idanggota}', [App\Http\Controllers\Admin\PesertaController::class, 'destroy'])->name('peserta.destroy');
    Route::get('/ubahpesertaadmin/{idanggota}', [App\Http\Controllers\Admin\PesertaController::class, 'edit'])
        ->name('peserta.edit');
    Route::post('/ubahpesertaadmin/{idanggota}', [App\Http\Controllers\Admin\PesertaController::class, 'update'])
        ->name('peserta.update');
    Route::get('/detailpesertaadmin/{idanggota}', [App\Http\Controllers\Admin\PesertaController::class, 'showDetail'])
    ->name('peserta.showDetail');

});

// ----------------------------
// GRUP RUTE UNTUK OPERATOR 1
// ----------------------------
Route::middleware(['auth', 'role:Operator1'])->group(function () {
    Route::get('/operator1/menu', function () {
        return view('OPERATOR1.menuoperator1');
    })->name('operator1.menu');
});

// ----------------------------
// GRUP RUTE UNTUK OPERATOR 2
// ----------------------------
Route::middleware(['auth', 'role:Operator2'])->group(function () {
    Route::get('/operator2/menu', function () {
        return view('OPERATOR2.menuoperator2');
    })->name('operator2.menu');
});

// ----------------------------
// GRUP RUTE UNTUK KEPALA KANTOR
// ----------------------------
Route::middleware(['auth', 'role:Kepala'])->group(function () {
    Route::get('/kepala/menu', function () {
        return view('KEPALAKANTOR.menukepalakantor');
    })->name('kepala.menu');
});
