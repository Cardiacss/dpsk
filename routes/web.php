<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\NilaiAktuariaController;
use App\Http\Controllers\Admin\IuranController;
use App\Http\Controllers\Admin\MasterController;
use App\Http\Controllers\Admin\PensiunController;
use App\Http\Controllers\Admin\CetakController;
/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/logout', function() {
    auth()->logout();
    return redirect('/');
});

// ============================================================================
// GRUP RUTE UNTUK ADMINISTRATOR
// ============================================================================
Route::middleware(['auth', 'role:Administrator'])->group(function () {

    // ---------------- DASHBOARD ----------------
    Route::get('/home', function () {
        return view('ADMIN.menuadmin');
    })->name('admin.menu');
    // Halaman Peraturan
Route::get('/peraturan', [MasterController::class, 'indexPeraturan'])->name('admin.peraturan');
Route::post('/peraturan', [MasterController::class, 'storePeraturan'])->name('admin.peraturan.store');
// Halaman Suku Bunga
Route::get('/sukubunga', [MasterController::class, 'index'])->name('sukubunga.index');
Route::post('/sukubunga/store', [MasterController::class, 'store'])->name('sukubunga.store');
Route::get('/sukubunga/edit/{tahun}', [MasterController::class, 'edit'])->name('sukubunga.edit');
Route::post('/sukubunga/delete/{tahun}', [MasterController::class, 'destroy'])->name('sukubunga.delete');

// Halaman Indeks Penghargaan
Route::get('/indeks', [MasterController::class, 'indeksIndex'])->name('indeks.index');
Route::post('/indeks', [MasterController::class, 'indeksStore'])->name('indeks.store');

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
    Route::get('/get-mitra/{idunit}', [App\Http\Controllers\Admin\PesertaController::class, 'getMitraByUnit']);
    Route::get('/riwayatiuranadmin', [IuranController::class, 'index'])->name('admin.riwayatiuran');
        Route::get('/manfaat/detail/{id}', [App\Http\Controllers\Admin\ManfaatPensiunController::class, 'detail']);

    // Fetch daftar mitra berdasarkan unit
    Route::get('/riwayatiuranadmin/unit/{idunit}', [IuranController::class, 'getMitraByUnit'])->name('admin.getMitraByUnit');

    // Halaman detail daftar peserta riwayat iuran
    Route::get('/detailmitraadmin/{idmitra}', [IuranController::class, 'detail'])->name('admin.detailmitra');
    Route::get('/getIuranPeserta/{idanggota}/{tahun?}', [App\Http\Controllers\Admin\IuranController::class, 'getIuranPeserta'])
        ->name('admin.getIuranPeserta');
    Route::get('/editcatat/{idanggota}/{id_iuran}', [App\Http\Controllers\Admin\IuranController::class, 'editCatat'])
        ->name('admin.editcatat');

    // Proses update data iuran peserta
    Route::post('/updatecatat/{idanggota}/{id_iuran}', [App\Http\Controllers\Admin\IuranController::class, 'updateCatat'])
        ->name('admin.updatecatat');
    Route::get('/getpesertabyunit/{idunit}', [App\Http\Controllers\Admin\IuranController::class, 'getPesertaByUnit']);
    Route::get('/simulasiadmin', [App\Http\Controllers\Admin\IuranController::class, 'simulasiIndex'])
        ->name('admin.simulasi');
Route::get('/simulasipesertaaktif/{idanggota}', 
    [App\Http\Controllers\Admin\IuranController::class, 'simulasiPesertaAktif']
)->name('admin.simulasipesertaaktif');

Route::post('/simulasipesertaaktif/hitung', 
    [App\Http\Controllers\Admin\IuranController::class, 'hitungSimulasi']
)->name('admin.simulasipesertaaktif.hitung');
    Route::get('/simulasi', [IuranController::class, 'simulasiIndex'])->name('admin.simulasi');
Route::get('/simulasi/{idanggota}', [IuranController::class, 'showSimulasiPeserta'])
    ->name('admin.simulasi.show');
    Route::get('/admin/simulasiView', [App\Http\Controllers\Admin\PensiunController::class, 'simulasiView']);
Route::get('/faktornilai', [App\Http\Controllers\Admin\MasterController::class, 'indexFaktor'])->name('faktornilai.index');
Route::post('/faktornilai/update', [App\Http\Controllers\Admin\MasterController::class, 'updateFaktor'])->name('faktornilai.update');
Route::get('/cetak-penawaran-pensiun', [CetakController::class, 'cetakPenawaran']);
Route::get('/cetak-data-pembuatan-sk', [CetakController::class, 'cetakPembuatanSK']);
Route::get('/cetak-sk', [CetakController::class, 'cetakSK']);


    // ---------------- KEPENSIUNAN ----------------
    Route::get('/pengajuanpensiun', [App\Http\Controllers\Admin\PensiunController::class, 'pengajuanPensiun'])
        ->name('admin.pengajuanpensiun');
    Route::get('/formpengajuanpensiunadmin/{idanggota}', [PensiunController::class, 'create'])
        ->name('admin.formpengajuanpensiun');
        Route::get('/editpensiun/anggota/{idanggota}/edit', [PensiunController::class, 'editPensiunByAnggota'])->name('admin.editpensiun.editByAnggota');


    Route::post('/formpengajuanpensiunadmin/store', [PensiunController::class, 'store'])
        ->name('admin.formpengajuanpensiun.store');

    Route::get('/lihatpensiun', [App\Http\Controllers\Admin\PensiunController::class, 'daftarSemua'])
        ->name('admin.kepensiunan');
    // Halaman Pilih Pensiun
    Route::get('/pilihpensiun/{idmitra}', [App\Http\Controllers\Admin\PensiunController::class, 'index'])
        ->name('admin.pilihpensiun');
    Route::get('/manfaat', [App\Http\Controllers\Admin\ManfaatPensiunController::class, 'indexManfaat'])->name('manfaat.index');
    Route::get('/cekmanfaat/{idpensiun}', [App\Http\Controllers\Admin\ManfaatPensiunController::class, 'cekManfaat'])->name('cekmanfaat');

Route::put('/cekmanfaat/{idpensiun}', [App\Http\Controllers\Admin\ManfaatPensiunController::class, 'updateManfaat'])->name('cekmanfaat.update');
    Route::get('/riwayatmanfaat', [App\Http\Controllers\Admin\ManfaatPensiunController::class, 'riwayatMitra'])
        ->name('admin.riwayatmanfaat');
Route::get('/pengubahanpensiun', [App\Http\Controllers\Admin\ManfaatPensiunController::class, 'indexEdit'])->name('daftarpesertaaktif');

// Detail Pensiunan
Route::get('/detailpensiun/{idpensiun}', [App\Http\Controllers\Admin\ManfaatPensiunController::class, 'detail'])->name('detailpesertapensiun');

// Edit Pensiunan
Route::get('/editpensiun/{id}/edit', [PensiunController::class, 'editPensiun'])->name('admin.editpensiun.edit');
Route::put('/editpensiun/{id}', [PensiunController::class, 'updatePensiun'])->name('admin.editpensiun.update');

    Route::get('/detailpesertapensiun/{idanggota}', [App\Http\Controllers\Admin\ManfaatPensiunController::class, 'index'])
        ->name('detailpesertapensiun');
    Route::get('/detailpesertaaktif/{idanggota}', [App\Http\Controllers\Admin\PensiunController::class, 'show'])
        ->name('admin.detailpesertaaktif');
    Route::delete('/hapusmanfaat/{id}', [App\Http\Controllers\Admin\ManfaatPensiunController::class, 'destroy'])->name('hapusmanfaat');
    Route::get('/pensiun/edit/{idanggota}', [App\Http\Controllers\Admin\PensiunController::class, 'edit'])
        ->name('admin.pensiun.edit');
    Route::get('/detailterminasipensiunadmin/{id}', [App\Http\Controllers\Admin\PensiunController::class, 'showTerminasi'])
        ->name('pensiun.terminasi.detail');
    Route::get('/terminasipensiun', [App\Http\Controllers\Admin\PensiunController::class, 'terminasi'])
        ->name('pensiun.terminasi');
    Route::get('/editpensiunadmin/{id}', [App\Http\Controllers\Admin\PensiunController::class, 'edit'])->name('pensiun.PenEdit');
    Route::put('/editpensiunadmin/{id}', [App\Http\Controllers\Admin\PensiunController::class, 'update'])->name('pensiun.PenUpdate');
    Route::post('/pensiun/update/{idanggota}', [App\Http\Controllers\Admin\PensiunController::class, 'update'])
        ->name('admin.pensiun.update');
    Route::get('/cetakmanfaat/{idanggota}', [App\Http\Controllers\Admin\ManfaatPensiunController::class, 'cetakManfaat'])
        ->name('pensiun.cetakManfaat');


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
    Route::get('/tanggunganpesertaadmin/{idanggota}', [App\Http\Controllers\Admin\TanggunganPesertaController::class, 'index'])
        ->name('tanggunganpesertaadmin');
        Route::patch('/keluarga/waris/{idkeluarga}', 
    [App\Http\Controllers\Admin\AhliWarisPesertaController::class, 'setWaris'])->name('keluarga.setWaris');
    Route::get('/tambahanggotapesertaadmin', [App\Http\Controllers\Admin\TanggunganPesertaController::class, 'create'])
        ->name('tambahanggotapesertaadmin');

    // ---------------- AHLI WARIS ----------------
    Route::get('/ahliwarispesertaadmin/{idanggota}', [App\Http\Controllers\Admin\AhliWarisPesertaController::class, 'index'])
        ->name('ahliwarispesertaadmin');
            Route::get('/tambahahliwarispeserta/{idanggota}', [App\Http\Controllers\Admin\AhliWarisPesertaController::class, 'create'])
        ->name('tambahahliwarispeserta');
    Route::post('/tambahahliwarispeserta/{idanggota}', [App\Http\Controllers\Admin\AhliWarisPesertaController::class, 'store'])
        ->name('simpanahliwarispeserta');
        Route::delete('/ahliwarispesertaadmin/{id}', [App\Http\Controllers\Admin\AhliWarisPesertaController::class, 'destroy'])
    ->name('hapusahliwarispeserta');



    // ---------------- IURAN ----------------
    Route::get('/iuranpesertaadmin', [App\Http\Controllers\Admin\MitraController::class, 'showIuran'])
        ->name('admin.iuranpeserta');

    // ---------------- MITRA ----------------

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

    Route::get('/inputsekolahadmin', [App\Http\Controllers\Admin\MitraController::class, 'createSekolah'])
        ->name('admin.inputsekolah');
    Route::post('/inputsekolahadmin/store', [App\Http\Controllers\Admin\MitraController::class, 'storeSekolah'])
        ->name('admin.storesekolah');

    Route::get('/get-mitra/{idunit}', [App\Http\Controllers\Admin\PesertaController::class, 'getMitraByUnit']);
    Route::get('/unit/edit/{idunit}', [App\Http\Controllers\Admin\MitraController::class, 'edit'])
        ->name('unit.edit');

    Route::put('/unit/update/{idunit}', [App\Http\Controllers\Admin\MitraController::class, 'update'])
        ->name('unit.update');
    Route::get('/get-nama-mitra/{idunit}', [App\Http\Controllers\Admin\MitraController::class, 'getNamaMitra']);

    Route::get('/listmitraadmin/{idunit}', [App\Http\Controllers\Admin\MitraController::class, 'listMitraByUnit'])
        ->name('listmitraadmin');
    Route::post('/update-mitra/{idunit}', [App\Http\Controllers\Admin\MitraController::class, 'update'])
        ->name('update.mitra');
    Route::delete('/unit/destroy/{idunit}', [App\Http\Controllers\Admin\MitraController::class, 'unitDestroy'])
        ->name('unit.destroy');
    Route::delete('/mitra/{idmitra}', [App\Http\Controllers\Admin\MitraController::class, 'mitraDestroy'])
        ->name('mitra.destroy');
    Route::get('/nilaiaktuariaadmin', [NilaiAktuariaController::class, 'index'])
        ->name('nilaiaktuariaadmin');

    Route::get('/editmitraadmin/{id}', function ($id) {
        return view('ADMIN.listmitraadminedit', ['id' => $id]);
    });

    Route::get('/mitra/edit/{idmitra}', [App\Http\Controllers\Admin\MitraController::class, 'mitraEdit'])
        ->name('mitra.edit');
    Route::put('/mitra/update/{idmitra}', [App\Http\Controllers\Admin\MitraController::class, 'mitraUpdate'])
        ->name('mitra.update');

    Route::get('/bukamitraadmin/{idunit}', [App\Http\Controllers\Admin\MitraController::class, 'bukaMitra'])
        ->name('admin.bukamitra');
    Route::get('/iuranpesertaadmin/show', [App\Http\Controllers\Admin\MitraController::class, 'showIuran'])
        ->name('admin.iuranpeserta.show');
    Route::get('/bukamitraadmin/{idunit}', [App\Http\Controllers\Admin\MitraController::class, 'bukaMitra'])
        ->name('admin.bukamitra');
    Route::get('/daftarpesertaiuranadmin/{idmitra}', [App\Http\Controllers\Admin\MitraController::class, 'daftarPeserta'])
        ->name('admin.daftarpesertaiuran');
    Route::get('/editiuranpesertaadmin/{idanggota}', [App\Http\Controllers\Admin\MitraController::class, 'editIPeserta'])
        ->name('admin.editiuranpeserta');
Route::get('/catatiuranadmin/{idanggota}/{idunit}', [App\Http\Controllers\Admin\MitraController::class, 'createIuran'])
    ->name('admin.catatiuran');
    Route::post('/catatiuranadmin/{idanggota}', [App\Http\Controllers\Admin\MitraController::class, 'storeIuran'])
        ->name('admin.catatiuran.store');
    Route::get('/editiuranpesertaadmin/{idanggota}', [App\Http\Controllers\Admin\MitraController::class, 'showIuranPeserta'])
        ->name('admin.editiuranpeserta');
    Route::get('/cetak-iuranpeserta/{idanggota}', [App\Http\Controllers\Admin\MitraController::class, 'cetakIuranPeserta'])
        ->name('admin.cetakIuranPeserta');
    Route::get('/editcatat/{idanggota}/{id_iuran}', [App\Http\Controllers\Admin\MitraController::class, 'editcatat'])->name('admin.editcatat');
    Route::post('/updatecatat/{idanggota}/{id_iuran}', [App\Http\Controllers\Admin\MitraController::class, 'updatecatat'])->name('admin.updatecatat');

    // ---------------- NILAI AKTUARIA ----------------
    Route::get('/datanilaiaktuariaadmin', [NilaiAktuariaController::class, 'showByMitra'])
        ->name('datanilaiaktuariaadmin');
    Route::post('/nilaiaktuaria/store', [NilaiAktuariaController::class, 'store'])
        ->name('nilaiaktuaria.store');
    Route::get('/nilaiaktuaria/create/{idunit}', [NilaiAktuariaController::class, 'create'])
        ->name('nilaiaktuaria.create');
    Route::get('/nilaiaktuaria/edit/{idaktuaria}', [NilaiAktuariaController::class, 'edit'])
        ->name('nilaiaktuaria.edit');
    Route::put('/nilaiaktuaria/update/{idaktuaria}', [NilaiAktuariaController::class, 'update'])
        ->name('nilaiaktuaria.update');
    Route::delete('/nilaiaktuaria/delete/{idaktuaria}', [NilaiAktuariaController::class, 'destroy'])
        ->name('nilaiaktuaria.destroy');
    Route::get('/nilaiaktuaria/show', [NilaiAktuariaController::class, 'showByMitra'])
        ->name('nilaiaktuaria.show');

    Route::get('/editnilaiaktuariaadmin', function () {
        //
    });
});

// ============================================================================
// GRUP RUTE UNTUK OPERATOR 1
// ============================================================================


// ============================================================================
// GRUP RUTE UNTUK OPERATOR 2
// ============================================================================
Route::middleware(['auth', 'role:Operator2'])->group(function () {
    Route::get('/operator2/menu', function () {
        return view('OPERATOR2.menuoperator2');
    })->name('operator2.menu');
});

// ============================================================================
// GRUP RUTE UNTUK KEPALA KANTOR
// ============================================================================
Route::middleware(['auth', 'role:Kepala'])->group(function () {
    Route::get('/kepala/menu', function () {
        return view('KEPALAKANTOR.menukepalakantor');
    })->name('kepala.menu');
});
