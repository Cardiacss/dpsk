<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TUnitMitra;
use App\Models\TMitra;
use App\Models\TPeserta;
use Illuminate\Http\Request;
use App\Models\TIuranPeserta;


class IuranController extends Controller
{
    public function index()
    {
        $unitmitra = TUnitMitra::all();
        return view('ADMIN.riwayatiuran', compact('unitmitra'));
    }
    public function getMitraByUnit($idunit)
    {
        $mitra = TMitra::where('idunit', $idunit)->get(['idmitra', 'nama_um']);
        return response()->json($mitra);
    }
public function detail($idmitra)
{
    // Ambil data mitra berdasarkan ID
    $mitra = TMitra::findOrFail($idmitra);

    // Ambil peserta berdasarkan ID mitra
    $peserta = TPeserta::where('idmitra', $idmitra)->get();

    // Kirim ke view
    return view('ADMIN.daftarpesertariwayatiuran', compact('mitra', 'peserta'));
}
public function getIuranPeserta($idanggota, $tahun = null)
{
    $query = TIuranPeserta::where('idanggota', $idanggota);

    if ($tahun) {
        $query->where('thn_iuran', $tahun);
    }

$data = $query->orderBy('bln_iuran')->get([
    'id_iuran', 'tglcatat', 'tglsetor', 'phdp', 'ipk_num', 'ip_num', 'ipk_num0'
]);;

    return response()->json($data);
}
public function editCatat($idanggota, $id_iuran)
{
    $iuran = TIuranPeserta::where('idanggota', $idanggota)
                ->where('id_iuran', $id_iuran)
                ->firstOrFail();

    return view('ADMIN.editcatat', compact('iuran'));
}

public function updateCatat(Request $request, $idanggota, $id_iuran)
{
    $request->validate([
        'tglsetor' => 'nullable|date',
        'phdp' => 'nullable|numeric',
        'ipk_num' => 'nullable|numeric',
        'ip_num' => 'nullable|numeric',
    ]);

    $iuran = TIuranPeserta::where('idanggota', $idanggota)
                ->where('id_iuran', $id_iuran)
                ->firstOrFail();

    $iuran->update([
        'tglsetor' => $request->tglsetor,
        'phdp' => $request->phdp,
        'ipk_num' => $request->ipk_num,
        'ip_num' => $request->ip_num,
    ]);

    return redirect("/editiuranpesertaadmin/{$idanggota}")
            ->with('success', 'Data iuran berhasil diperbarui.');
}
public function getPesertaByUnit($idunit)
{
    // Ambil semua peserta berdasarkan idunit
    $peserta = TPeserta::where('idunit', $idunit)
        ->get(['idanggota', 'nopeserta', 'nama', 'idmitra']);

    // Kembalikan data JSON untuk digunakan di AJAX
    return response()->json($peserta);
}
public function simulasiIndex(Request $request)
{
    $query = TPeserta::query();

    // Jika ada pencarian
    if ($request->has('search') && $request->search != '') {
        $query->where(function ($q) use ($request) {
            $q->where('nama', 'like', '%' . $request->search . '%')
              ->orWhere('nopeserta', 'like', '%' . $request->search . '%');
        });
    }

    // Ambil hasil
    $peserta = $query->orderBy('nama', 'asc')->get(['idanggota', 'nopeserta', 'nama']);

    return view('ADMIN.simulasi', compact('peserta'));
}
public function showSimulasiPeserta($idanggota)
{
    // Ambil data peserta berdasarkan idanggota
    $peserta = \App\Models\TPeserta::findOrFail($idanggota);

    // Kirim data ke view
    return view('ADMIN.simulasipesertaaktif', compact('peserta'));
}
}
