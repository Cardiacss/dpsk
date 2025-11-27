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

    // Ambil hanya yang boleh jadi ahli waris (bolehwaris TIDAK NULL)
    $ahliwaris = TKeluarga::where('idanggota', $idanggota)
        ->whereNotNull('bolehwaris')->where('bolehwaris', 1)
        ->get();

    // Kirim semua data ke view
    return view('ADMIN.ahliwarispesertaadmin', compact('peserta', 'keluarga', 'ahliwaris'));
}
    public function setWaris($idkeluarga)
{
    $keluarga = TKeluarga::findOrFail($idkeluarga);

    $keluarga->update([
        'bolehwaris' => 1
    ]);

    return redirect()->route('ahliwarispesertaadmin', [
    'idanggota' => $keluarga->idanggota
])->with('success', 'Anggota berhasil dijadikan ahli waris.');
}
 public function create($idanggota)
    {
        $peserta = TPeserta::where('idanggota', $idanggota)->first();

        return view('ADMIN.tambahahliwarispeserta', compact('peserta'));
    }
public function store(Request $request, $idanggota)
    {
        $validated = $request->validate([
            'nm_keluarga'      => 'required|string',
            'jeniskelamin'     => 'nullable|string',
            'tempatlahir'      => 'nullable|string',
            'tgllahir'         => 'nullable|date',
            'pekerjaan'        => 'nullable|string',
            'hubungan'         => 'nullable|string',
            'keterangan_kel'   => 'nullable|string',
            'statuswaris'      => 'nullable|string',
            'notunjukwaris'    => 'nullable|string',
            'nomohonwaris'     => 'nullable|string',
            'statushidup'      => 'nullable|string',
            'bolehwaris'       => 'nullable|string',
        ]);

        // Simpan ke database
        TKeluarga::create([
            'idanggota'        => $idanggota,
            'nm_keluarga'      => $validated['nm_keluarga'],
            'jeniskelamin'     => $request->jeniskelamin,
            'tempatlahir'      => $request->tempatlahir,
            'tgllahir'         => $request->tgllahir,
            'pekerjaan'        => $request->pekerjaan,
            'hubungan'         => $request->hubungan,
            'keterangan_kel'   => $request->keterangan_kel,
            'statuswaris'      => $request->statuswaris,
            'notunjukwaris'    => $request->notunjukwaris,
            'nomohonwaris'     => $request->nomohonwaris,
            'statushidup'      => $validated['statushidup'],
            'bolehwaris'       => $request->bolehwaris,
        ]);

        return redirect('/ahliwarispesertaadmin/' . $idanggota)
            ->with('success', 'Ahli waris berhasil ditambahkan.');
    }
    public function destroy($idkeluarga)
{
    $keluarga = TKeluarga::findOrFail($idkeluarga);
    $idanggota = $keluarga->idanggota; // supaya bisa redirect kembali ke halaman peserta
    $keluarga->delete();

    return redirect('/ahliwarispesertaadmin/' . $idanggota)
        ->with('success', 'Ahli waris berhasil dihapus.');
}

}
