<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TAPensiun;
use App\Models\TMitra;
use App\Models\TUnitMitra;
use App\Models\TPeserta;
use Illuminate\Support\Facades\DB;

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

    // Query semua data pensiun, hanya yang belum terminasi
    $query = TAPensiun::with('peserta')
        ->whereNull('tglterminasi'); // 🔹 hanya data aktif

    // Jika ada pencarian
    if (!empty($search)) {
        $query->where(function ($q) use ($search) {
            $q->where('nopensiun', 'like', "%{$search}%")
              ->orWhereHas('peserta', function ($q2) use ($search) {
                  $q2->where('nama', 'like', "%{$search}%");
              });
        });
    }

    // Ambil hasil dengan pagination
    $data = $query->paginate(20);

    return view('ADMIN.kepensiunan', compact('data'));
}
    public function show($idanggota)
{
    // Ambil data pensiun berdasarkan idanggota
    $pensiun = TAPensiun::with('peserta')->where('idanggota', $idanggota)->first();
    $peserta = TPeserta::find($pensiun->idanggota);

    if (!$pensiun) {
        return redirect()->back()->with('error', 'Data peserta tidak ditemukan.');
    }

    return view('ADMIN.detailpesertaaktif', compact('pensiun', 'peserta'));
}
    public function edit($idanggota)
{
    // Ambil data pensiun berdasarkan idanggota
    $pensiun = TAPensiun::with('peserta')->where('idanggota', $idanggota)->first();
    $peserta = TPeserta::find($pensiun->idanggota);

    if (!$pensiun) {
        return redirect()->back()->with('error', 'Data peserta tidak ditemukan.');
    }

    return view('ADMIN.ubahpesertaaktif', compact('pensiun', 'peserta'));
}
public function update(Request $request, $idanggota)
{
    // Validasi data
    $request->validate([
        'nopensiun' => 'nullable|string',
        'nama' => 'nullable|string',
        'tglmohon' => 'nullable|date',
        'tmtpensiun' => 'nullable|date',
        'nosuratberhenti' => 'nullable|string',
        'statuspensiun' => 'nullable|string',
        'statusmanfaat' => 'nullable|string',
        'pensiun' => 'nullable|string',
        'statushidup' => 'nullable|string',
        'keterangan' => 'nullable|string',
        'pertama_terima' => 'nullable|string',
        'terakhir_terima' => 'nullable|string',
        'mpakhir' => 'nullable|numeric',
        'besaran_manfaat' => 'nullable|numeric',
        'rekening' => 'nullable|string',
    ]);

    $pensiun = TAPensiun::where('idanggota', $idanggota)->firstOrFail();

    // Siapkan data untuk diupdate
    $updateData = [
        'nopensiun' => $request->nopensiun,
        'nama' => $request->nama,
        'tglmohon' => $request->tglmohon,
        'tmtpensiun' => $request->tmtpensiun,
        'nosuratberhenti' => $request->nosuratberhenti,
        'statuspensiun' => $request->statuspensiun,
        'statusmanfaat' => $request->statusmanfaat,
        'pensiun' => $request->pensiun,
        'statushidup' => $request->statushidup,
        'keterangan' => $request->keterangan,
        'pertama_terima' => $request->pertama_terima,
        'terakhir_terima' => $request->terakhir_terima,
        'mpakhir' => $request->mpakhir,
        'besaran_manfaat' => $request->besaran_manfaat,
        'rekening' => $request->rekening,
    ];

    // Jika pensiun = "Selesai", otomatis set tglterminasi ke tanggal sekarang
    if ($request->pensiun === 'Selesai') {
        $updateData['tglterminasi'] = now(); // Carbon::now()
    }

    $pensiun->update($updateData);

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

   $peserta = $query->orderBy('nama')   // optional, biar rapi
                 ->paginate(20)
                 ->appends([
                     'search' => $search,
                     'idmitra' => $idmitra
                 ]);

    return view('ADMIN.pengajuanpensiunadmin', compact('peserta', 'mitraList', 'idmitra', 'search'));
}

public function formPengajuan($idanggota)
{
    // Misal ambil data peserta berdasarkan idanggota
    $peserta = TPeserta::where('idanggota', $idanggota)->first();

    if (!$peserta) {
        abort(404, 'Peserta tidak ditemukan');
    }

    // Tampilkan view form pengajuan
    return view('ADMIN.formpengajuanpensiunadmin', compact('peserta'));
}
    public function create($idanggota)
    {
        $peserta = TPeserta::where('idanggota', $idanggota)->firstOrFail();
        return view('ADMIN.formpengajuanpensiunadmin', compact('peserta'));
    }

// ✅ Menyimpan data pengajuan pensiun
public function store(Request $request)
{
    $validated = $request->validate([
        'nopensiun' => 'nullable|string|max:100',
        'idanggota' => 'required|integer',
        'tglmohon' => 'nullable|date',
        'tmtpensiun' => 'nullable|date',
        'nosuratberhenti' => 'nullable|string|max:100',
        'statusmanfaat' => 'nullable|string|max:50',
        'noagendadpsk' => 'nullable|string|max:100',
        'keterangan' => 'nullable|string|max:255',
        'suratdari' => 'nullable|string|max:150',
        'tglsuratdari' => 'nullable|date',
        'nosuratdari' => 'nullable|string|max:100',
        'dodt' => 'nullable|date', // ✅ Tambahkan validasi dodt
        'statushidup' => 'nullable',
    ]);

    // ✅ Simpan ke tabel t_apensiun
    TAPensiun::create([
        'nopensiun' => $validated['nopensiun'] ?? null,
        'idanggota' => $validated['idanggota'],
        'tglmohon' => $validated['tglmohon'] ?? null,
        'tmtpensiun' => $validated['tmtpensiun'] ?? null,
        'nosuratberhenti' => $validated['nosuratberhenti'] ?? null,
        'statusmanfaat' => $validated['statusmanfaat'] ?? null,
        'noagendadpsk' => $validated['noagendadpsk'] ?? null,
        'keterangan' => $validated['keterangan'] ?? null,
        'suratdari' => $validated['suratdari'] ?? null,
        'tglsuratdari' => $validated['tglsuratdari'] ?? null,
        'nosuratdari' => $validated['nosuratdari'] ?? null,
        'statushidup' => $validated['statushidup'] ?? 1,
    ]);

    // ✅ Jika user mengisi tanggal meninggal, update ke tabel pengguna
    if (!empty($validated['dodt'])) {
        DB::table('t_peserta')
            ->where('idanggota', $validated['idanggota'])
            ->update(['dodt' => $validated['dodt']]);
    }

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
public function simulasiView(Request $request)
{
    $idanggota   = $request->query('idanggota');
    $tgllahir    = $request->query('tgllahir');
    $tmtkeja     = $request->query('tmtkeja');
    $tmtpensiun  = $request->query('tmtpensiun');
    $dodt        = $request->query('dodt'); // opsional

    if (empty($tgllahir) || empty($tmtkeja) || empty($tmtpensiun)) {
        return response()->json(['error' => 'Tanggal lahir, TMT kerja, dan tanggal pensiun wajib diisi.']);
    }

    try {
        $tglLahir       = new \DateTime($tgllahir);
        $tglMulaiKerja  = new \DateTime($tmtkeja);
        $tglPensiun     = new \DateTime($tmtpensiun);

        // Masa kerja
        $diffKerja = $tglPensiun->diff($tglMulaiKerja);
        $masaKerja = $diffKerja->y + ($diffKerja->m / 12);

        // Usia Peserta (pakai DoDT kalau diisi)
        $tglAcuanUsia = !empty($dodt) ? new \DateTime($dodt) : new \DateTime();
        $diffUsiaPeserta = $tglAcuanUsia->diff($tglLahir);
        $usiaPeserta = $diffUsiaPeserta->y + ($diffUsiaPeserta->m / 12);

        // Usia Pensiun = tmtpensiun - tgllahir
        $diffUsiaPensiun = $tglPensiun->diff($tglLahir);
        $usiaPensiun = $diffUsiaPensiun->y + ($diffUsiaPensiun->m / 12);

        // Data peserta
        $peserta = DB::table('t_peserta')->where('idanggota', $idanggota)->first();
        if (!$peserta) {
            return response()->json(['error' => 'Data peserta tidak ditemukan.']);
        }

$statusNikah = trim($peserta->statusnikah ?? 'Belum Kawin');

// Konversi K / TK menjadi teks lengkap
if ($statusNikah === 'K') {
    $statusNikah = 'Kawin';
} elseif ($statusNikah === 'TK') {
    $statusNikah = 'Tidak Kawin';
} elseif (strtolower($statusNikah) === 'belum kawin') {
    $statusNikah = 'Tidak Kawin';
}
        $jenisKelamin    = $peserta->jeniskelamin ?? 'Pria';
        $pekerjaanakhir  = $peserta->pkerjaanakhir ?? 'PEGAWAI';

        // PHDP
        $phdp = DB::table('t_iuranpeserta')->where('idanggota', $idanggota)->value('phdp') ?? 0;

        // FNSS
        $umur = (int)$diffUsiaPeserta->y;
        $faktor = \App\Models\TFaktorNilai::where('umur','<=',$umur)
                    ->where('statuskerja', strtoupper($pekerjaanakhir))
                    ->orderBy('umur','desc')
                    ->first();

        $fnss = 1;
        if ($faktor) {
            if ($jenisKelamin == 'Pria' && $statusNikah == 'Kawin') $fnss = $faktor->fns_s_pria_kawin;
            if ($jenisKelamin == 'Wanita' && $statusNikah == 'Kawin') $fnss = $faktor->fns_s_wanita_kawin;
            if ($jenisKelamin == 'Pria' && $statusNikah == 'Belum Kawin') $fnss = $faktor->fns_s_pria_lajang;
            if ($jenisKelamin == 'Wanita' && $statusNikah == 'Belum Kawin') $fnss = $faktor->fns_s_wanita_lajang;
        }

        // Rumus MP
        $rumusMP = 0.6 * ($masaKerja + ($usiaPensiun - $usiaPeserta)) * 0.021 * $phdp;

        // ==========================
        //  LANGKAH PERHITUNGAN
        // ==========================

        $steps = [];

        $steps[] = "60% × (MK + (Usia Pensiun − Usia Peserta)) × 2,1% × PhDP";
        $steps[] = "60% × (" . number_format($masaKerja, 2) . " + (" . 
                    number_format($usiaPensiun, 2) . " − " . number_format($usiaPeserta, 2) . ")) × 2,1% × Rp. " . number_format($phdp, 0);
        $steps[] = "60% × (" . number_format($masaKerja + ($usiaPensiun - $usiaPeserta), 2) . " × 2,1% × Rp. " . number_format($phdp, 0) . ")";
        $steps[] = "MP = Rp. " . number_format($rumusMP, 2);

        return response()->json([
            'masa_kerja' => round($masaKerja, 2),
            'pekerjaan_terakhir' => $pekerjaanakhir,
            'usia' => round($usiaPeserta, 2),
            'usia_pensiun' => round($usiaPensiun, 2),
            'status_kawin' => $statusNikah,
            'phdp' => $phdp,
            'fnss' => $fnss,
            'perhitungan' => $steps, // <<<<<<<<<< INI YANG TAMPILKAN LANGKAH
'manfaat' => [
    'MP'   => round($rumusMP, 2),
    '100%' => round($fnss * $rumusMP * 12, 2),
    'status_kawin' => $statusNikah,
    '20%'  => round(0.2 * $fnss * $rumusMP * 12, 2),
    '80%'  => round(0.8 * ($masaKerja * 0.021 * $phdp), 2),
]
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Format tanggal tidak valid.',
            'detail' => $e->getMessage()
        ]);
    }
}

public function editPensiun($id)
{
    $pensiun = TAPensiun::findOrFail($id);
    $peserta = TPeserta::find($pensiun->idanggota);

    return view('ADMIN.editpensiun', compact('pensiun', 'peserta'));
}

public function updatePensiun(Request $request, $id)
{
    $pensiun = TAPensiun::findOrFail($id);

    $validated = $request->validate([
        'pekerjaan' => 'nullable|string|max:100',
        'nopensiun' => 'required|string|max:50',
        'tglmohon' => 'required|date',
        'tmtpensiun' => 'required|date',
        'nosuratberhenti' => 'required|string|max:50',
        'statusmanfaat' => 'required|string',
        'nilaivariabel' => 'nullable|numeric',
        'noagendadpsk' => 'nullable|string|max:50',
        'batasmp' => 'nullable|numeric',
        'keterangan' => 'nullable|string',
        'nosuratdari' => 'nullable|string|max:50',
        'suratdari' => 'nullable|string|max:100',
        'tglsuratdari' => 'nullable|date',
    ]);

    $pensiun->update($validated);

return redirect('/pengajuanpensiun')
       ->with('success', 'Data pensiun berhasil diperbarui!');
}
public function editPensiunByAnggota($idanggota)
{
    $pensiun = TAPensiun::where('idanggota', $idanggota)->firstOrFail();
    $peserta = TPeserta::find($idanggota);

    return view('ADMIN.editpensiun', compact('pensiun', 'peserta'));
}
}