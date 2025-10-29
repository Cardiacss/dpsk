<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TUnitMitra;
use App\Models\TNilaiAktuaria;

class NilaiAktuariaController extends Controller
{
    // Daftar mitra
    public function index(Request $request)
    {
        $search = $request->input('search');

        $mitras = $search 
            ? TUnitMitra::where('nama_um', 'like', '%' . $search . '%')->get()
            : TUnitMitra::all();

        return view('ADMIN.nilaiaktuariaadmin', compact('mitras', 'search'));
    }

    // Tampilkan data nilai aktuaria per mitra
    public function showByMitra(Request $request)
    {
        $idunit = $request->query('idunit');

        if (!$idunit) {
            return redirect()->route('nilaiaktuariaadmin')->with('error', 'ID Unit tidak ditemukan.');
        }

        $mitra = TUnitMitra::where('idunit', $idunit)->first();

        if (!$mitra) {
            return redirect()->route('nilaiaktuariaadmin')->with('error', 'Data mitra tidak ditemukan.');
        }

        $nilaiAktuarias = TNilaiAktuaria::where('idunit', $idunit)
                            ->orderBy('thnberlaku', 'desc')
                            ->get();

        return view('ADMIN.datanilaiaktuariaadmin', compact('mitra', 'nilaiAktuarias'));
    }

    // Form tambah
        public function create($idunit)
        {
            $mitra = TUnitMitra::where('idunit', $idunit)->firstOrFail();
            return view('ADMIN.tambahnilaiaktuaria', compact('mitra'));
        }

        // Simpan data baru
public function store(Request $request)
{
    $validated = $request->validate([
        'thnaktuaria' => 'required|integer',
        'idunit' => 'required|string|max:8',
        'ip' => 'required|numeric',
        'ipk' => 'required|numeric',
        'blnberlaku' => 'required|integer|min:1|max:12',
        'thnberlaku' => 'required|integer',
        'nilaitambahan' => 'nullable|numeric',
    ]);

    try {
        // idaktuaria auto increment, tidak perlu dimasukkan
        TNilaiAktuaria::create($validated);

        return redirect('/datanilaiaktuariaadmin?idunit=' . $request->idunit)
            ->with('success', 'Data Nilai Aktuaria berhasil disimpan!');
    } catch (\Exception $e) {
        return back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
    }
}

// Form edit
public function edit($idaktuaria)
{
    $nilai = TNilaiAktuaria::findOrFail($idaktuaria);
    $mitra = TUnitMitra::where('idunit', $nilai->idunit)->first();

    return view('ADMIN.editnilaiaktuariaadmin', compact('nilai', 'mitra'));
}

// Update data
public function update(Request $request, $idaktuaria)
{
    $validated = $request->validate([
        'ip' => 'required|numeric',
        'ipk' => 'required|numeric',
        'blnberlaku' => 'required|integer|min:1|max:12',
        'thnberlaku' => 'required|integer',
        'nilaitambahan' => 'nullable|numeric',
    ]);

    $nilai = TNilaiAktuaria::findOrFail($idaktuaria);
    $nilai->update($validated);

    return redirect('/datanilaiaktuariaadmin?idunit=' . $nilai->idunit)
        ->with('success', 'Data nilai aktuaria berhasil diperbarui!');
}

// Hapus data
public function destroy($idaktuaria)
{
    $nilai = TNilaiAktuaria::findOrFail($idaktuaria);
    $idunit = $nilai->idunit;
    $nilai->delete();

    return redirect()->route('nilaiaktuaria.show', ['idunit' => $idunit])
                     ->with('success', 'Data nilai aktuaria berhasil dihapus.');
}

}