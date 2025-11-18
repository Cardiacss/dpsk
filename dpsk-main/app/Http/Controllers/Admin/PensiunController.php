<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TAPensiun;
use App\Models\TMitra;
use App\Models\TUnitMitra;
use App\Models\TPeserta;

class PensiunController extends Controller
{
    public function index($idmitra, Request $request)
    {
        $search = $request->input('search');

        // Ambil nama mitra untuk ditampilkan di header halaman
        $mitra = TMitra::find($idmitra);

        // Query pensiun dengan relasi peserta, hanya peserta dari mitra tersebut
        $query = TAPensiun::with('peserta')
            ->whereHas('peserta', function ($q) use ($idmitra) {
                $q->where('idmitra', $idmitra);
            });

        // Jika ada pencarian
        if (!empty($search)) {
            $query->where('nopensiun', 'like', "%{$search}%")
                ->orWhereHas('peserta', function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%");
                });
        }

        // Ambil hasilnya
        $pensiun = $query->orderBy('nopensiun', 'asc')->get();

        return view('ADMIN.pilihpensiun', compact('pensiun', 'search', 'mitra'));
    }
        public function daftarSemua(Request $request)
    {
        $search = $request->input('search');

        // Query semua data pensiun
        $query = TAPensiun::with('peserta');

        // Jika ada pencarian
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('nopensiun', 'like', "%{$search}%")
                    ->orWhereHas('peserta', function ($q2) use ($search) {
                        $q2->where('nama', 'like', "%{$search}%");
                    });
            });
        }

        // Pagination 10 data per halaman
        $pensiun = $query->orderBy('nopensiun', 'asc')->paginate(10);

        return view('ADMIN.kepensiunan', compact('pensiun', 'search'));
    }
    public function show($idanggota)
{
    // Ambil data pensiun berdasarkan idanggota
    $pensiun = TAPensiun::with('peserta')->where('idanggota', $idanggota)->first();

    if (!$pensiun) {
        return redirect()->back()->with('error', 'Data peserta tidak ditemukan.');
    }

    return view('ADMIN.detailpesertaaktif', compact('pensiun'));
}
public function edit($idanggota)
{
    // Ambil data berdasarkan idanggota
    $pensiun = TAPensiun::where('idanggota', $idanggota)->firstOrFail();

    // Kirim data ke view
    return view('ADMIN.ubahpesertaaktif', compact('pensiun'));
}

public function update(Request $request, $idanggota)
{
    // Validasi data (optional, bisa kamu tambahkan lagi sesuai kebutuhan)
    $request->validate([
        'nopensiun' => 'nullable|string',
        'nama' => 'nullable|string',
        'tglmohon' => 'nullable|date',
        'tmtpensiun' => 'nullable|date',
        'nosurat' => 'nullable|string',
        'statuspensiun' => 'nullable|string',
        'statusmanfaat' => 'nullable|string',
        'pensiun' => 'nullable|string',
        'statushidup' => 'nullable|string',
        'keterangan' => 'nullable|string',
        'pertama_terima' => 'nullable|string',
        'terakhir_terima' => 'nullable|string',
        'besaran_manfaat' => 'nullable|string',
        'rekening' => 'nullable|string',
        'jenis_manfaat' => 'nullable|string',
    ]);

    // Update data
    $pensiun = TAPensiun::where('idanggota', $idanggota)->firstOrFail();
    $pensiun->update([
        'nopensiun' => $request->nopensiun,
        'nama' => $request->nama,
        'tglmohon' => $request->tglmohon,
        'tmtpensiun' => $request->tmtpensiun,
        'nosuratberhenti' => $request->nosuratberhanti,
        'statuspensiun' => $request->statuspensiun,
        'statusmanfaat' => $request->statusmanfaat,
        'pensiun' => $request->pensiun,
        'statushidup' => $request->statushidup,
        'keterangan' => $request->keterangan,
        'pertama_terima' => $request->pertama_terima,
        'terakhir_terima' => $request->terakhir_terima,
        'besaran_manfaat' => $request->besaran_manfaat,
        'rekening' => $request->rekening,
        'jenis_manfaat' => $request->jenis_manfaat,
    ]);

return redirect('/lihatpensiun')->with('success', 'Data pensiun berhasil diperbarui.');
}

public function pengajuanPensiun(Request $request)
{
    // Ambil semua mitra untuk dropdown
    $mitraList = TMitra::select('idmitra', 'nama_um')->get();

    // Ambil nilai pencarian (opsional)
    $search = $request->input('search');
    $idmitra = $request->input('idmitra');

    // Query peserta aktif
    $query = TPeserta::with('mitra')->where('statuspeserta', 'AKTIF');

    // Filter berdasarkan mitra (jika dipilih)
    if ($idmitra) {
        $query->where('idmitra', $idmitra);
    }

    // Filter berdasarkan nomor peserta (jika diisi)
    if ($search) {
        $query->where('nopeserta', 'like', '%' . $search . '%');
    }

    $peserta = $query->get();

    return view('ADMIN.pengajuanpensiunadmin', compact('peserta', 'mitraList', 'idmitra', 'search'));
}

public function formPengajuan($idanggota)
{
    // Misal ambil data peserta berdasarkan idanggota
    $peserta = \App\Models\TPeserta::where('idanggota', $idanggota)->first();

    if (!$peserta) {
        abort(404, 'Peserta tidak ditemukan');
    }

    // Tampilkan view form pengajuan
    return view('ADMIN.formpengajuanpensiunadmin', compact('peserta'));
}
 public function create($idanggota)
    {
        // Ambil data peserta berdasarkan idanggota
        $peserta = TPeserta::where('idanggota', $idanggota)->firstOrFail();

        return view('ADMIN.formpengajuanpensiunadmin', compact('peserta'));
    }

    public function store(Request $request)
    {
        TAPensiun::create([
            'nopensiun' => $request->nopensiun,
            'idanggota' => $request->idanggota,
            'tglmohon' => $request->tglmohon,
            'tmtpensiun' => $request->tmtpensiun,
            'nosuratberhenti' => $request->nosuratberhenti,
            'noagendapsk' => $request->noagendapsk,
            'statushidup' => $request->statushidup,
            'statusmanfaat' => $request->statusmanfaat,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/lihatpensiun')->with('success', 'Data pengajuan pensiun berhasil disimpan.');
    }
    public function PenEdit($id)
{
    $pensiun = TAPensiun::findOrFail($id);
    return view('ADMIN.ubahpensiun', compact('pensiun'));
}

public function PenUpdate(Request $request, $id)
{
    $pensiun = TAPensiun::findOrFail($id);

    $pensiun->update([
        'nopensiun' => $request->nopensiun,
        'idanggota' => $request->idanggota,
        'tglmohon' => $request->tglmohon,
        'tmtpensiun' => $request->tmtpensiun,
        'nosuratberhenti' => $request->nosuratberhenti,
        'noagendapsk' => $request->noagendapsk,
        'statushidup' => $request->statushidup,
        'statusmanfaat' => $request->statusmanfaat,
        'keterangan' => $request->keterangan,
    ]);

    return redirect('/lihatpensiunadmin')->with('success', 'Data pensiunan berhasil diperbarui.');
}
public function terminasi(Request $request)
{
    // Ambil semua unit untuk dropdown
    $unitmitra = TUnitMitra::orderBy('nama_um')->get();

    // Query dasar
    $query = TAPensiun::with(['peserta.unit'])
        ->whereNotNull('tglterminasi');

    // Filter berdasarkan unit (idunit di tabel TPeserta)
    if ($request->filled('idunit')) {
        $query->whereHas('peserta', function ($q) use ($request) {
            $q->where('idunit', $request->idunit);
        });
    }

    // Jalankan query
    $pensiun = $query->get();

    return view('ADMIN.daftarterminasiadmin', compact('pensiun', 'unitmitra'));
}
public function showTerminasi($id)
{
    // Ambil data pensiun + peserta + unit terkait
    $pensiun = TAPensiun::with(['peserta.unit'])->findOrFail($id);

    return view('ADMIN.detailterminasipensiunadmin', compact('pensiun'));
}
}
