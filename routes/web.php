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

    // ---------------- PESERTA ----------------
    Route::get('/admin/daftarpeserta', [App\Http\Controllers\Admin\PesertaController::class, 'index'])
        ->name('admin.daftarpeserta');
    Route::get('/daftarpesertaadmin', [App\Http\Controllers\Admin\PesertaController::class, 'index'])
        ->name('peserta.index');
    Route::get('/pendaftaranpesertaadmin', [App\Http\Controllers\Admin\PesertaController::class, 'create'])
        ->name('peserta.create');
    Route::post('/pendaftaranpesertaadmin', [App\Http\Controllers\Admin\PesertaController::class, 'store'])
        ->name('peserta.store');
    Route::get('/ubahpesertaadmin/{idanggota}', [App\Http\Controllers\Admin\PesertaController::class, 'edit'])
        ->name('peserta.edit');
    Route::post('/ubahpesertaadmin/{idanggota}', [App\Http\Controllers\Admin\PesertaController::class, 'update'])
        ->name('peserta.update');
    Route::delete('/hapuspeserta/{idanggota}', [App\Http\Controllers\Admin\PesertaController::class, 'destroy'])
        ->name('peserta.destroy');
    Route::get('/detailpesertaadmin/{idanggota}', [App\Http\Controllers\Admin\PesertaController::class, 'showDetail'])
        ->name('peserta.showDetail');
    Route::get('/cetak-kartu-peserta/{idanggota}', [App\Http\Controllers\Admin\PesertaController::class, 'cetakKartu'])
        ->name('peserta.cetakKartu');

    // ---------------- KELUARGA ----------------
    Route::get('/tambahkeluarga/{idanggota}', [App\Http\Controllers\Admin\KeluargaController::class, 'create'])
        ->name('keluarga.create');
    Route::post('/tambahkeluarga', [App\Http\Controllers\Admin\KeluargaController::class, 'store'])
        ->name('keluarga.store');
    Route::delete('/keluarga/{idkeluarga}', [App\Http\Controllers\Admin\KeluargaController::class, 'destroy'])
        ->name('keluarga.destroy');
    Route::put('/updateanggotaahliwarispesertaadmin/{idkeluarga}', [App\Http\Controllers\Admin\KeluargaController::class, 'update'])
        ->name('keluarga.update');
    Route::get('/cetakKeluarga/{idanggota}', [App\Http\Controllers\Admin\KeluargaController::class, 'cetakKeluarga'])
        ->name('cetakKeluarga');
    Route::get('/editanggotaahliwarispesertaadmin/{id}', [App\Http\Controllers\Admin\KeluargaController::class, 'edit'])
        ->name('keluarga.edit');


    // ---------------- TANGGUNGAN ----------------
    Route::get(
        '/tanggunganpesertaadmin/{idanggota}',
        [App\Http\Controllers\Admin\TanggunganPesertaController::class, 'index']
    )->name('tanggunganpesertaadmin');

    Route::get('/tambahanggotapesertaadmin', [App\Http\Controllers\Admin\TanggunganPesertaController::class, 'create'])
        ->name('tambahanggotapesertaadmin');


    // ---------------- AHLI WARIS ----------------
    Route::get('/ahliwarispesertaadmin/{idanggota}', [App\Http\Controllers\Admin\AhliWarisPesertaController::class, 'index'])
        ->name('ahliwarispesertaadmin');

    // ---------------- IURAN ----------------
        Route::get('/iuranpesertaadmin', [App\Http\Controllers\Admin\MitraController::class, 'showIuran'])->name('admin.iuranpeserta');



    // ---------------- MITRA  ----------------
    Route::get('/mitradansekolahadmin', function () {
        return view('ADMIN.mitradansekolahadmin');
    })->name('mitradansekolahadmin');

    Route::get('/inputmitraadmin', function () {
        return view('ADMIN.inputmitraadmin');
    })->name('inputmitraadmin');
    Route::get('/mitradansekolahadmin', [App\Http\Controllers\Admin\MitraController::class, 'index'])
        ->name('admin.mitradansekolah');

    Route::get('/inputmitraadmin', [App\Http\Controllers\Admin\MitraController::class, 'create'])
        ->name('admin.inputmitra');

    Route::post('/inputmitraadmin', [App\Http\Controllers\Admin\MitraController::class, 'store'])
        ->name('admin.storemitra');
        Route::get('/inputsekolahadmin', function () {
    return view('ADMIN.inputsekolahadmin');
})->name('inputsekolahadmin');
Route::get('/nilaiaktuariaadmin', function () {
    return view('ADMIN.nilaiaktuariaadmin');
})->name('nilaiaktuariaadmin');
Route::get('/inputsekolahadmin', [App\Http\Controllers\Admin\MitraController::class, 'createSekolah'])->name('admin.inputsekolah');
Route::get('/get-mitra/{idunit}', [App\Http\Controllers\Admin\PesertaController::class, 'getMitraByUnit']);
Route::get('/get-nama-mitra/{idunit}', [App\Http\Controllers\Admin\MitraController::class, 'getNamaMitra']);
Route::post('/inputsekolahadmin/store', [App\Http\Controllers\Admin\MitraController::class, 'storeSekolah'])
    ->name('admin.storesekolah');
    Route::get('/datanilaiaktuariaadmin', function () {
        return view('ADMIN.datanilaiaktuariaadmin');
    })->name('datanilaiaktuariaadmin');
  Route::get('/listmitraadmin/{idunit}', [App\Http\Controllers\Admin\MitraController::class, 'listMitraByUnit'])
     ->name('listmitraadmin');
Route::post('/update-mitra/{idunit}', [App\Http\Controllers\Admin\MitraController::class, 'update'])->name('update.mitra');
Route::get('/nilaiaktuariaadmin', [App\Http\Controllers\Admin\NilaiAktuariaController::class, 'index'])->name('nilaiaktuariaadmin');
Route::get('/datanilaiaktuariaadmin', [App\Http\Controllers\Admin\NilaiAktuariaController::class, 'showByMitra'])
    ->name('datanilaiaktuariaadmin');
    
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
