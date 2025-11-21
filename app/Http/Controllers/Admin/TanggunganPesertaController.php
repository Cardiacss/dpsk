<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TPeserta;     
use App\Models\TKeluarga;

class TanggunganPesertaController extends Controller
{
public function index($idanggota)
{
    $peserta = TPeserta::findOrFail($idanggota);

    $keluarga = TKeluarga::where('idanggota', $idanggota)
                         ->get();

    return view('ADMIN.tanggunganpesertaadmin', compact('peserta', 'keluarga'));
}
    public function create()
{
    return view('ADMIN.tambahanggotapesertaadmin');
}
}
