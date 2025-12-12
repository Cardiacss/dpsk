<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TManfaatPensiun;
use App\Models\TMitra;
use App\Models\TPeserta;
use App\Models\TAPensiun;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ManfaatImport;
use Illuminate\Support\Facades\DB;


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
    }
    public function destroy($id)
    {
        $manfaat = TManfaatPensiun::findOrFail($id);
        $manfaat->delete();

        return redirect()->route('detailpesertapensiun', ['idanggota' => $manfaat->idanggota])
                 ->with('success', 'Data manfaat pensiun berhasil dihapus.');
    }
    public function riwayatMitra(Request $request)
{
    $search = $request->input('search');

    $mitra = TMitra::when($search, function ($query) use ($search) {
            $query->where('idmitra', 'like', "%{$search}%")
                  ->orWhere('nama_um', 'like', "%{$search}%");
        })
        ->orderBy('idmitra', 'asc')
        ->paginate(20)                       // ⬅ pagination 20
        ->appends(['search' => $search]);    // ⬅ supaya search tetap saat pindah halaman

    return view('ADMIN.riwayatmanfaat', compact('mitra', 'search'));
}
    public function cetakManfaat($idanggota)
    {
        // Ambil data peserta + relasi unit & mitra
        $peserta = TPeserta::with(['unit', 'mitra'])->findOrFail($idanggota);

        // Ambil semua data manfaat peserta ini
        $manfaat = TManfaatPensiun::where('idanggota', $idanggota)->get();

        // Buat PDF dari view
        $pdf = PDF::loadView('ADMIN.cetakmanfaat', compact('peserta', 'manfaat'))
            ->setPaper('A4', 'portrait');

        return $pdf->stream('Manfaat_Pensiun_' . $peserta->nama . '.pdf');
    }
    public function indexManfaat(Request $request)
{
    $query = TAPensiun::with(['peserta', 'peserta.mitra']);

    // Filter nama peserta
    if ($request->filled('nopeserta')) {
        $nopeserta = $request->nopeserta;
        $query->whereHas('peserta', function ($q) use ($nopeserta) {
            $q->where('nama', 'like', '%' . $nopeserta . '%');
        });
    }

    // Filter mitra
    if ($request->filled('mitra')) {
        $mitra = $request->mitra;
        $query->whereHas('peserta.mitra', function ($q) use ($mitra) {
            $q->where('nama_um', $mitra);
        });
    }
    $manfaat = $query->paginate(20)->appends($request->all());

    // Data dropdown mitra
    $mitras = TMitra::all();

    return view('ADMIN.manfaat', compact('manfaat', 'mitras'));
}

   public function cekManfaat($idpensiun)
{
    $manfaat = TAPensiun::with(['peserta', 'peserta.mitra', 'manfaat'])
        ->findOrFail($idpensiun);

    return view('ADMIN.cekmanfaat', compact('manfaat'));
}
        public function indexEdit()
    {
        $pensiuns = TAPensiun::with('peserta')->get();
        return view('ADMIN.daftarpesertaaktif', compact('pensiuns'));
    }

    // Detail Pensiunan
public function detail($id)
{
    $manfaat = TAPensiun::with('peserta.mitra')->find($id);

    return response()->json($manfaat);
}
    // Edit Pensiunan
    public function edit($idpensiun)
    {
        $pensiun = TAPensiun::with('peserta')->findOrFail($idpensiun);
        return view('ADMIN.editpensiun', compact('pensiun'));
    }
public function updateManfaat(Request $request, $idpensiun)
{
    $pensiun = TAPensiun::with('peserta')->findOrFail($idpensiun);

    $jumlah = (int) $request->manfaat_untuk; // berapa kali insert
    $bln = (int) $request->bln_setor;        // bulan awal
    $thn = (int) $request->thn_setor;        // tahun awal

    $mpakhir = str_replace('.', '', $request->mpakhir);

    for ($i = 0; $i < $jumlah; $i++) {

        // jika bulan > 12, reset dan tahun +1
        if ($bln > 12) {
            $bln = 1;
            $thn++;
        }

        // insert satu baris
        TManfaatPensiun::create([
            'idanggota'       => $pensiun->idanggota,
            'tglberimanfaat'  => $request->tglberimanfaat,
            'manfaat_untuk'   => 1, // setiap record mewakili 1 bulan
            'keterangan'      => $request->keterangan,
            'thn_setor'       => $thn,
            'bln_setor'       => $bln,
            'nilai_mp'        => $mpakhir,
        ]);

        // increment bulan untuk loop berikutnya
        $bln++;
    }

    // boleh update mpakhir terbaru di t_apensiun
    $pensiun->update([
        'mpakhir' => $mpakhir,
        'statusmanfaat' => $request->statusmanfaat,
    ]);

    return redirect('/manfaat')->with('success', 'Data manfaat pensiun baru berhasil ditambahkan!');
}
public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls',
    ]);

    $data = Excel::toArray([], $request->file('file'));
    $rows = $data[0];

    foreach ($rows as $index => $row) {
        if ($index == 0) continue; // Lewati header

        $nama           = $row[0];
        $tglberimanfaat = $row[1] ?? null; // YYYY-MM atau YYYY-MM-DD
        $bln_setor      = $row[2] ?? 0;
        $thn_setor      = $row[3] ?? 0;
        $nilai_mp       = $row[4] ?? 0;
        $keterangan     = $row[5] ?? '';

        // Cari idanggota dari nama
        $peserta = DB::table('t_peserta')->where('nama', $nama)->first();
        if (!$peserta) continue;

        // Pastikan tglberimanfaat format valid YYYY-MM-DD
        if (!empty($tglberimanfaat)) {
            if (preg_match('/^\d{4}-\d{2}$/', $tglberimanfaat)) {
                $tglberimanfaat = $tglberimanfaat . '-01';
            }
        } else {
            $tglberimanfaat = null;
        }

        // Insert ke t_manfaatpensiun
        DB::table('t_manfaatpensiun')->insert([
            'idanggota'      => $peserta->idanggota,
            'tglberimanfaat' => $tglberimanfaat,
            'bln_setor'      => $bln_setor,
            'thn_setor'      => $thn_setor,
            'nilai_mp'       => $nilai_mp,
            'keterangan'     => $keterangan,
        ]);
    }

    return redirect()->route('manfaat.index')->with('success', 'Data manfaat pensiun berhasil diimport.');
}
}
