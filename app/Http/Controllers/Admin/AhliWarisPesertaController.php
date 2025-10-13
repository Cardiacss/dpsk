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

        // Ambil keluarga yang terkait dan boleh menjadi ahli waris
        $ahliwaris = TKeluarga::where('idanggota', $idanggota)
            ->where('bolehwaris', 1)
            ->get();

        // Kirim data ke view
        return view('ADMIN.ahliwarispesertaadmin', compact('peserta', 'ahliwaris'));
    }
}
