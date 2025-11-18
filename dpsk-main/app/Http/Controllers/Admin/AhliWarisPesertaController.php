<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TPeserta;
use App\Models\TKeluarga;

class AhliWarisPesertaController extends Controller
{
public function index($idanggota)
    {
        // Ambil data peserta
        $peserta = TPeserta::findOrFail($idanggota);

        // Ambil semua keluarga peserta
        $keluarga = TKeluarga::where('idanggota', $idanggota)->get();

        // Ambil hanya yang boleh jadi ahli waris
        $ahliwaris = TKeluarga::where('idanggota', $idanggota)
            ->where('bolehwaris', 1)
            ->get();

        // Kirim semua data ke view
        return view('ADMIN.ahliwarispesertaadmin', compact('peserta', 'keluarga', 'ahliwaris'));
    }
}
