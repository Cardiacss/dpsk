<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TPeserta;
use App\Models\TUnitMitra;
use App\Models\TMitra;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PesertaController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nopeserta' => 'required|string|max:20',
            'nama' => 'required|string|max:100',
            'tempatlahir' => 'required|string|max:100',
            'tgllahir' => 'required|date',
            'jeniskelamin' => 'required|string',
            'alamatterakhir' => 'required|string',
            'kelurahan' => 'nullable|string',
            'kecamatan' => 'nullable|string',
            'kotakab' => 'nullable|string',
            'provinsi' => 'nullable|string',
            'idunit' => 'required|string',
            'statusnikah' => 'nullable|string',
            'tglkawin' => 'nullable|date',
            'jumlahanak' => 'nullable|integer',
            'tmtkeja' => 'nullable|date',
            'tglsahpeserta' => 'nullable|date',
            'statuspeserta' => 'nullable|string',
            'id_num' => 'nullable|string',
            'tmtiuran' => 'nullable|date',
        ]);

        // ✅ Cek unit valid
        $unit = TUnitMitra::where('idunit', $validated['idunit'])->first();
        if (!$unit) {
            return back()->withErrors(['idunit' => 'Kode unit tidak ditemukan dalam tabel t_unitmitra.']);
        }

        // ✅ Cari idmitra dari TMitra berdasarkan idunit
        $mitra = TMitra::where('idunit', $validated['idunit'])->first();
        if (!$mitra) {
            return back()->withErrors(['idunit' => 'Tidak ditemukan mitra untuk unit ini di tabel t_mitra.']);
        }

        // ✅ Isi nilai tambahan
        $validated['idmitra'] = $mitra->idmitra;
        $validated['statushidup'] = 1;
        $validated['statuspeserta'] = $validated['statuspeserta'] ?? 'AKTIF';
        $validated['jumlahanak'] = $validated['jumlahanak'] ?? 0;

        TPeserta::create($validated);

        return redirect('/daftarpesertaadmin')->with('success', 'Peserta berhasil ditambahkan.');
    }

public function index(Request $request)
{
    $filter = $request->input('filter');
    $search = $request->input('search');

    // Tampilkan hanya peserta yg aktif
    $query = TPeserta::with(['mitra', 'unit'])
        ->where('statuspeserta', 'AKTIF');  // <--- FILTER STATUS

    // Filter pencarian
    if ($search) {
        if ($filter == 'Nomor') {
            $query->where('nopeserta', 'like', "%{$search}%");
        } elseif ($filter == 'Nama') {
            $query->where('nama', 'like', "%{$search}%");
        } elseif ($filter == 'Mitra') {
            $query->whereHas('mitra', function ($q) use ($search) {
                $q->where('nama_um', 'like', "%{$search}%");
            });
        }
    }

    // Pagination
    $peserta = $query->paginate(20);

    return view('ADMIN.daftarpesertaadmin', compact('peserta', 'filter', 'search'));
}


    public function create()
    {
        $unitmitra = TUnitMitra::all();
        return view('ADMIN.pendaftaranpesertaadmin', compact('unitmitra'));
    }

    public function destroy($idanggota)
    {
        $peserta = TPeserta::findOrFail($idanggota);
        $peserta->keluarga()->delete();
        $peserta->delete();

        return redirect()->route('peserta.index')
            ->with('success', 'Peserta dan seluruh data keluarganya berhasil dihapus.');
    }

public function edit($idanggota)
{
    $peserta = TPeserta::findOrFail($idanggota);
    $unitmitra = TUnitMitra::all();
    $mitra = TMitra::all();

    // Format tanggal
    $tanggalFields = ['tgllahir', 'tmtiuran', 'tglsahpeserta', 'tglkawin'];
    foreach ($tanggalFields as $field) {
        if (!empty($peserta->$field)) {
            try {
                $peserta->$field = \Carbon\Carbon::parse($peserta->$field)->format('Y-m-d');
            } catch (\Exception $e) {
                $peserta->$field = null;
            }
        }
    }

    return view('ADMIN.ubahpesertaadmin', compact('peserta', 'unitmitra', 'mitra'));
}
    public function update(Request $request, $idanggota)
    {
        $peserta = TPeserta::findOrFail($idanggota);

        $validated = $request->validate([
            'nopeserta' => 'required|string',
            'nama' => 'required|string',
            'tempatlahir' => 'nullable|string',
            'tgllahir' => 'nullable|date',
            'jeniskelamin' => 'nullable|string',
            'alamatterakhir' => 'nullable|string',
            'kelurahan' => 'nullable|string',
            'kecamatan' => 'nullable|string',
            'kotakab' => 'nullable|string',
            'provinsi' => 'nullable|string',
            'pkerjaanakhir' => 'nullable|string',
            'idunit' => 'nullable|string',
            'idmitra' => 'nullable|string', 
            'tmtkeja' => 'nullable|date',
            'statusnikah' => 'nullable|string',
            'tglkawin' => 'nullable|date',
            'jumlahanak' => 'nullable|integer',
            'tgltiuran' => 'nullable|date',
            'tglsahpeserta' => 'nullable|date',
            'statuspeserta' => 'nullable|string',
            'id_num' => 'nullable|string',
        ]);

if (empty($validated['idmitra']) && !empty($validated['idunit'])) {
    $mitra = TMitra::where('idunit', $validated['idunit'])->first();
    if ($mitra) {
        $validated['idmitra'] = $mitra->idmitra;
    }

}

        $peserta->update($validated);

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil diperbarui!');
    }

    public function show($idanggota)
    {
        $peserta = TPeserta::findOrFail($idanggota);
        return view('ADMIN.detailpesertaadmin', compact('peserta'));
    }

    public function cetakKartu($idanggota)
    {
        $peserta = TPeserta::findOrFail($idanggota);
        $pdf = Pdf::loadView('ADMIN.kartupeserta', compact('peserta'));
        return $pdf->download('Kartu_Peserta_' . $peserta->nama . '.pdf');
    }

    public function getMitraByUnit($idunit)
    {
        $mitra = TMitra::where('idunit', $idunit)->get(['idmitra', 'nama_um']);
        return response()->json($mitra);
    }
    public function showDetail($idanggota)
{
    $peserta = TPeserta::with(['mitra', 'unit', 'keluarga'])->find($idanggota);

    if (!$peserta) {
        return redirect()->back()->with('error', 'Data peserta tidak ditemukan.');
    }

    return view('ADMIN.detailpesertaadmin', compact('peserta'));
}
}
