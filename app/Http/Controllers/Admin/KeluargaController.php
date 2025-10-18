<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TKeluarga;
use App\Models\TPeserta;
use Barryvdh\DomPDF\Facade\Pdf;

class KeluargaController extends Controller
{
    // Tampilkan form tambah keluarga
    public function create($idanggota)
    {
        $peserta = TPeserta::findOrFail($idanggota);
        return view('ADMIN.tambahanggotapesertaadmin', compact('peserta'));
    }

    // Simpan data keluarga ke database
public function store(Request $request)
{
    $request->validate([
        'idanggota' => 'required|exists:t_peserta,idanggota',
        'nm_keluarga' => 'required|string|max:255',
        'tempatlahir' => 'nullable|string|max:100',
        'tgllahir' => 'nullable|date',
        'jeniskelamin' => 'required|string',
        'hubungan' => 'nullable|string|max:50',
        'pekerjaan' => 'nullable|string|max:100',
        'statuswaris' => 'nullable|string|max:50',
        'statushidup' => 'nullable|string|max:10',
        'keterangan_kel' => 'nullable|string',
        'notunjukwaris' => 'nullable|string|max:100',
        'nomohonwaris' => 'nullable|string|max:100',
    ]);

    TKeluarga::create([
        'idanggota' => $request->idanggota,
        'nm_keluarga' => $request->nm_keluarga,
        'tempatlahir' => $request->tempatlahir,
        'tgllahir' => $request->tgllahir,
        'jeniskelamin' => $request->jeniskelamin,
        'hubungan' => $request->hubungan,
        'pekerjaan' => $request->pekerjaan,
        'statuswaris' => $request->statuswaris,
        'statushidup' => $request->statushidup,
        'keterangan_kel' => $request->keterangan_kel,
        'notunjukwaris' => $request->notunjukwaris,
        'nomohonwaris' => $request->nomohonwaris,
    ]);

    // ✅ Redirect ke halaman tanggungan peserta sesuai idanggota
    return redirect()
        ->route('tanggunganpesertaadmin', ['idanggota' => $request->idanggota])
        ->with('success', 'Anggota keluarga berhasil ditambahkan.');
}
    public function ahliwaris($idanggota)
    {
        // Ambil data peserta berdasarkan id
        $peserta = TPeserta::findOrFail($idanggota);

        // Ambil semua keluarga yang berhubungan dengan peserta ini
        $ahliwaris = TKeluarga::where('idanggota', $idanggota)->get();

        // Kirim data ke view
        return view('ADMIN.ahliwarispesertaadmin', compact('peserta', 'ahliwaris'));
    }
    public function cetakKeluarga($idanggota)
    {
        $peserta = TPeserta::findOrFail($idanggota);
        $keluarga = TKeluarga::where('idanggota', $idanggota)->get();

        $pdf = PDF::loadView('ADMIN.cetakkeluarga', compact('peserta', 'keluarga'))
            ->setPaper('A4', 'portrait');

        return $pdf->download('Data_Keluarga_' . $peserta->nama . '.pdf');
    }
public function destroy($idkeluarga)
{
    // Cari data berdasarkan ID
    $keluarga = TKeluarga::findOrFail($idkeluarga);

    // Simpan id anggota untuk redirect nanti
    $idanggota = $keluarga->idanggota;

    // Hapus data
    $keluarga->delete();

return redirect()
    ->route('tanggunganpesertaadmin', ['idanggota' => $idanggota])
    ->with('success', 'Data anggota keluarga berhasil dihapus.');;
}
    
public function update(Request $request, $idkeluarga)
{
    $request->validate([
        'nm_keluarga' => 'required|string|max:255',
        'tempatlahir' => 'nullable|string|max:100',
        'tgllahir' => 'nullable|date',
        'jeniskelamin' => 'required|string',
        'hubungan' => 'nullable|string|max:50',
        'pekerjaan' => 'nullable|string|max:100',
        'statuswaris' => 'nullable|string|max:50',
        'statushidup' => 'nullable|string|max:10',
        'keterangan_kel' => 'nullable|string',
        'notunjukwaris' => 'nullable|string|max:100',
        'nomohonwaris' => 'nullable|string|max:100',
    ]);

    $keluarga = TKeluarga::findOrFail($idkeluarga);
    $keluarga->update($request->all());

    return redirect()
        ->route('tanggunganpesertaadmin', ['idanggota' => $keluarga->idanggota])
        ->with('success', 'Data anggota keluarga berhasil diperbarui.');
}
public function edit($idkeluarga)
{
    // Ambil data keluarga berdasarkan id
    $keluarga = TKeluarga::findOrFail($idkeluarga);

    // Ambil data peserta terkait keluarga ini
    $peserta = TPeserta::findOrFail($keluarga->idanggota);

    // Kirim ke view edit
    return view('ADMIN.editanggotaahliwarispesertaadmin', compact('keluarga', 'peserta'));
}   
}
