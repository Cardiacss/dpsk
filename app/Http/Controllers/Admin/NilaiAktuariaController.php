<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TUnitMitra;
use App\Models\TNilaiAktuaria;

class NilaiAktuariaController extends Controller
{
    // Halaman utama: daftar mitra
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $mitras = TUnitMitra::where('nama_um', 'like', '%' . $search . '%')->get();
        } else {
            $mitras = TUnitMitra::all();
        }

        return view('ADMIN.nilaiaktuariaadmin', compact('mitras', 'search'));
    }

    // Halaman data nilai aktuaria per mitra
    public function showByMitra(Request $request)
    {
        // Ambil idunit dari query string
        $idunit = $request->query('idunit');

        if (!$idunit) {
            return redirect()->route('nilaiaktuariaadmin')->with('error', 'ID Unit tidak ditemukan.');
        }

        // Ambil data mitra
        $mitra = TUnitMitra::where('idunit', $idunit)->first();

        if (!$mitra) {
            return redirect()->route('nilaiaktuariaadmin')->with('error', 'Data mitra tidak ditemukan.');
        }

        // Ambil semua data nilai aktuaria milik mitra ini
        $nilaiAktuarias = TNilaiAktuaria::where('idunit', $idunit)
                            ->orderBy('thnberlaku', 'desc')
                            ->get();

        return view('ADMIN.datanilaiaktuariaadmin', compact('mitra', 'nilaiAktuarias'));
    }
}
