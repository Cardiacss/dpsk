<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TPeserta;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class PesertaController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nopeserta' => 'required',
            'nama' => 'required',
            'jeniskelamin' => 'required',
            'tempatlahir' => 'nullable|string',
            'tgllahir' => 'nullable|date',
            'alamatterakhir' => 'nullable|string',
            'kelurahan' => 'nullable|string',
            'kecamatan' => 'nullable|string',
            'tmtkeja' => 'nullable|date', // ubah ke date karena ini tanggal mulai kerja
            'kotakab' => 'nullable|string',
            'provinsi' => 'nullable|string',
            'pekerjaanakhir' => 'nullable|string',
            'idmitra' => 'nullable|string',
            'idunit' => 'nullable|string',
            'statusnikah' => 'nullable|string',
            'tglkawin' => 'nullable|date',
            'jumlahanak' => 'nullable|integer',
            'tmtiuran' => 'nullable|date',
            'tglsahpeserta' => 'nullable|date',
            'statuspeserta' => 'nullable|string',
            'id_num' => 'nullable|string',
        ]);

        // 🛠 Perbaikan default value
        $validated['statushiduo'] = 1;
        $validated['statuspeserta'] = $validated['statuspeserta'] ?? 'AKTIF';
        $validated['jumlahanak'] = $validated['jumlahanak'] ?? 0;

        // Jika ada kolom opsional lain yang boleh kosong, isi string kosong biar aman
        $validated['tmtkeja'] = $validated['tmtkeja'] ?? null;

        TPeserta::create($validated);

        return redirect()->route('peserta.index')->with('success', 'Peserta berhasil ditambahkan!');
    }

    public function index(Request $request)
    {
        // Ambil parameter filter dan pencarian
        $filter = $request->input('filter');
        $search = $request->input('search');

        // Query dasar
        $query = TPeserta::query();

        // Filter
        if ($filter && $search) {
            switch ($filter) {
                case 'Nomor':
                    $query->where('nopeserta', 'LIKE', "%{$search}%");
                    break;
                case 'Nama':
                    $query->where('nama', 'LIKE', "%{$search}%");
                    break;
                case 'Mitra':
                    $query->where('idmitra', 'LIKE', "%{$search}%");
                    break;
            }
        }

        // Ambil hasil
        $peserta = $query->paginate(10);

        return view('ADMIN.daftarpesertaadmin', compact('peserta', 'filter', 'search'));
    }

    public function create()
    {
        // arahkan ke form pendaftaran peserta
        return view('ADMIN.pendaftaranpesertaadmin');
    }
    public function destroy($idanggota)
    {
        $peserta = TPeserta::findOrFail($idanggota);
        $peserta->delete();

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil dihapus.');
    }
    public function edit($idanggota)
    {
        $peserta = TPeserta::findOrFail($idanggota);
        return view('ADMIN.ubahpesertaadmin', compact('peserta'));
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
            'idmitra' => 'nullable|string',
            'idunit' => 'nullable|string',
            'tmtkeja' => 'nullable|date',
            'statusnikah' => 'nullable|string',
            'tglkawin' => 'nullable|date',
            'jumlahanak' => 'nullable|integer',
            'tmtiuran' => 'nullable|date',
            'tglsahpeserta' => 'nullable|date',
            'statuspeserta' => 'nullable|string',
            'id_num' => 'nullable|string',
        ]);

        $peserta->update($validated);

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil diperbarui!');
    }
    public function show($idanggota)
    {
        $peserta = TPeserta::findOrFail($idanggota);
        return view('ADMIN.detailpesertaadmin', compact('peserta'));
    }
    public function showDetail($idanggota)
    {
        $peserta = DB::table('t_peserta')->where('idanggota', $idanggota)->first();

        if (!$peserta) {
            return redirect('/daftarpesertaadmin')->with('error', 'Data peserta tidak ditemukan');
        }

        return view('ADMIN.detailpesertaadmin', compact('peserta'));
    }
    public function cetakKartu($idanggota)
    {
        $peserta = TPeserta::findOrFail($idanggota);

        // Load view untuk PDF
        $pdf = Pdf::loadView('ADMIN.kartupeserta', compact('peserta'));

        // Download file PDF dengan nama peserta
        return $pdf->download('Kartu_Peserta_' . $peserta->nama . '.pdf');
    }
}
