<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TManfaatPensiun;
use App\Models\TMitra;


class ManfaatPensiunController extends Controller
{
    public function index($idanggota, Request $request)
{
    $search = $request->input('search');

    // Ambil data manfaat pensiun berdasarkan idanggota
    $query = TManfaatPensiun::with('peserta')
        ->whereHas('peserta', function ($q) use ($idanggota) {
            $q->where('idanggota', $idanggota);
        });

    // Filter tambahan kalau ada pencarian
    if (!empty($search)) {
        $query->where(function ($q) use ($search) {
            $q->where('jenismanfaat', 'like', "%{$search}%")
                ->orWhere('tglberimanfaat', 'like', "%{$search}%");
        });
    }

    $manfaat = $query->orderByDesc('tglberimanfaat')->get();

    // Ambil data peserta (satu saja)
    $peserta = $manfaat->first()?->peserta;

    // Ambil data mitra dari peserta (kalau ada relasi di model)
    $mitra = $peserta?->mitra;

    return view('ADMIN.detailpesertapensiun', compact('manfaat', 'search', 'idanggota', 'peserta', 'mitra'));
}    public function destroy($id)
    {
        $manfaat = TManfaatPensiun::findOrFail($id);
        $manfaat->delete();

        return redirect()->route('detailpesertapensiun')->with('success', 'Data manfaat pensiun berhasil dihapus.');
    }
    public function riwayatMitra(Request $request)
    {
        $search = $request->input('search');

        // Ambil semua mitra atau berdasarkan pencarian
        $query = TMitra::query();

        if (!empty($search)) {
            $query->where('idmitra', 'like', "%{$search}%")
                ->orWhere('nama_um', 'like', "%{$search}%");
        }

        $mitra = $query->orderBy('idmitra', 'asc')->get();

        return view('ADMIN.riwayatmanfaat', compact('mitra', 'search'));
    }
}
