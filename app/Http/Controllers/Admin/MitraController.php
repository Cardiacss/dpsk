<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TUnitMitra;
use App\Models\TMitra;
use App\Models\TPeserta;
use App\Models\TIuranPeserta;
use App\Models\TNilaiAktuaria;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class MitraController extends Controller
{
public function index(Request $request)
{
    $search = $request->search;

    $mitras = TUnitMitra::with('nilaiaktuaria')
        ->when($search, function ($query) use ($search) {
            $query->where('nama_um', 'like', "%{$search}%")
                  ->orWhere('alamat_um', 'like', "%{$search}%")
                  ->orWhere('kelurahan', 'like', "%{$search}%")
                  ->orWhere('kecamatan', 'like', "%{$search}%")
                  ->orWhere('kotakab', 'like', "%{$search}%")
                  ->orWhere('provinsi', 'like', "%{$search}%");
        })
        ->orderByRaw("CASE WHEN stat_um = 'AKTIF' THEN 0 ELSE 1 END") 
        ->orderBy('nama_um', 'asc') 
        ->paginate(20)
        ->appends(['search' => $search]);

    return view('ADMIN.mitradansekolahadmin', compact('mitras', 'search'));
}
public function toggleStatus($idunit)
{
    $unit = TUnitMitra::where('idunit', $idunit)->firstOrFail();

    // Toggle nilai: AKTIF <-> TIDAK AKTIF
    $unit->stat_um = ($unit->stat_um === 'AKTIF') ? 'TIDAK AKTIF' : 'AKTIF';
    $unit->save();

    return redirect()->back()->with('success', 'Status unit berhasil diperbarui.');
}

    public function create()
    {
        // Ambil jumlah data terakhir untuk menentukan nomor urut berikutnya
        $next = TUnitMitra::count() + 1;

        // Buat kode romawi
        $roman = $this->toRoman($next);
        $terbilang = $this->toIndonesianNumber($next);

        // Tampilkan di view "I (Satu)"
        $kode_view = "{$roman} ({$terbilang})";

        // Tapi yang akan disimpan hanya "I"
        $kode_simpan = $roman;

        return view('ADMIN.inputmitraadmin', compact('kode_view', 'kode_simpan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idunit' => 'required|string|max:8',
            'nama_um' => 'required|string|max:255',
            'alamat_um' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kotakab' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'ip_pct' => 'required|numeric',
            'ipk_pct' => 'required|numeric',
        ]);

        TUnitMitra::create([
            'idunit' => $request->idunit, // hanya I, II, III, dst
            'nama_um' => $request->nama_um,
            'alamat_um' => $request->alamat_um,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kotakab' => $request->kotakab,
            'provinsi' => $request->provinsi,
            'stat_um' => 'Aktif',
            'ip_pct' => $request->ip_pct,
            'ipk_pct' => $request->ipk_pct,
        ]);

        return redirect()->route('admin.mitradansekolah')->with('success', 'Data mitra berhasil ditambahkan!');
    }

    private function toRoman($num)
    {
        $map = [
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1,
        ];
        $returnValue = '';
        while ($num > 0) {
            foreach ($map as $roman => $int) {
                if ($num >= $int) {
                    $num -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }

    private function toIndonesianNumber($num)
    {
        $map = [
            1 => 'Satu',
            2 => 'Dua',
            3 => 'Tiga',
            4 => 'Empat',
            5 => 'Lima',
            6 => 'Enam',
            7 => 'Tujuh',
            8 => 'Delapan',
            9 => 'Sembilan',
            10 => 'Sepuluh',
            11 => 'Sebelas',
            12 => 'Dua Belas',
            13 => 'Tiga Belas',
            14 => 'Empat Belas',
            15 => 'Lima Belas',
            16 => 'Enam Belas',
            17 => 'Tujuh Belas',
            18 => 'Delapan Belas',
            19 => 'Sembilan Belas',
            20 => 'Dua Puluh',
        ];
        return $map[$num] ?? (string) $num;
    }
    public function createSekolah()
    {
        // Ambil daftar mitra dari tabel TUnitMitra (mitra pendiri)
        $mitraList = TUnitMitra::select('idunit', 'nama_um')->get();

        // Auto-generate idmitra baru untuk t_mitra (3 digit: 001, 002, dst)
        $lastMitra = TMitra::orderBy('idmitra', 'desc')->first();
        $nextNumber = $lastMitra ? ((int) $lastMitra->idmitra + 1) : 1;
        $kode_mitra_baru = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        // Auto-generate kode unit juga (ambil dari t_unitmitra)
        $lastUnit = TUnitMitra::orderBy('idunit', 'desc')->first();
        $nextUnitNumber = $lastUnit ? ((int) $lastUnit->idunit + 1) : 1;
        $kode_unit = str_pad($nextUnitNumber, 3, '0', STR_PAD_LEFT);

        return view('ADMIN.inputsekolahadmin', compact('mitraList', 'kode_unit', 'kode_mitra_baru'));
    }

    // 🔹 AJAX untuk ambil nama mitra pendiri
    public function getNamaMitra($idunit)
    {
        $mitra = TUnitMitra::where('idunit', $idunit)->first();
        return response()->json($mitra);
    }

    // 🔹 Simpan data sekolah ke tabel t_mitra
    public function storeSekolah(Request $request)
    {
        $request->validate([
            'kode_mitra' => 'required|string|max:8', // mitra pendiri
            'kode_unit' => 'required|string|max:8',
            'nama_unit' => 'required|string|max:255',
            'alamat_unit' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'iuran_peserta' => 'required|numeric',
            'iuran_kerja' => 'required|numeric',
        ]);

        // Auto-generate ID untuk mitra (t_mitra)
        $lastMitra = TMitra::orderBy('idmitra', 'desc')->first();
        $nextNumber = $lastMitra ? ((int) $lastMitra->idmitra + 1) : 1;
        $idmitra = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        TMitra::create([
            'idmitra' => $idmitra,                  // ID mitra baru
            'idunit' => $request->kode_mitra,       // ID mitra pendiri
            'nama_um' => $request->nama_unit,       // nama sekolah
            'alamat_um' => $request->alamat_unit,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kotakab' => $request->kota,
            'provinsi' => $request->provinsi,
            'ip_pct' => $request->iuran_peserta,
            'ipk_pct' => $request->iuran_kerja,
            'stat_um' => 'Aktif',
            'urut' => $nextNumber,
            'nilaitambahan' => 0,
            'tahunaktuaria' => date('Y'),
        ]);

        return redirect()->route('admin.mitradansekolah')
            ->with('success', 'Data sekolah/mitra baru berhasil disimpan ke tabel t_mitra!');
    }
    public function listMitraByUnit($idunit)
    {
        // Ambil data unit mitra (induk)
        $unit = TUnitMitra::where('idunit', $idunit)->first();

        // Ambil daftar mitra/sekolah (anak)
        $mitras = TMitra::where('idunit', $idunit)->get();

        // Kirim ke view
        return view('ADMIN.listmitraadmin', compact('unit', 'mitras'));
    }

    // Route get-mitra berdasarkan idunit
    public function getMitraByUnit($idunit)
    {
        $mitra = TunitMitra::where('idunit', $idunit)->get();
        return response()->json($mitra);
    }
public function edit($idunit)
{
    // Ambil data unit
    $unit = TUnitMitra::findOrFail($idunit);

    // Ambil nilai IP & IPK dari tabel TNilaiAktuaria
    $nilaiAktuaria = TNilaiAktuaria::first(); // atau where('tahun', ...) jika per tahun

    // Kirim ke view
    return view('ADMIN.editmitraadmin', [
        'unit' => $unit,
        'nilaiAktuaria' => $nilaiAktuaria
    ]);
}

    // Update data ke database
    public function update(Request $request, $idunit)
{
    $request->validate([
        'nama_um' => 'required|string|max:100',
        'alamat_um' => 'required|string|max:255',
        'stat_um' => 'required|string',
    ]);

    $unit = TUnitMitra::findOrFail($idunit);
    $nilaiAktuaria = TNilaiAktuaria::first();

    $unit->update([
        'nama_um' => $request->nama_um,
        'alamat_um' => $request->alamat_um,
        'stat_um' => $request->stat_um,
        'ip_pct' => $nilaiAktuaria->ip,
        'ipk_pct' => $nilaiAktuaria->ipk,
    ]);

    return redirect()->route('admin.mitradansekolah')
        ->with('success', 'Data Unit Mitra berhasil diperbarui.');
}
public function showIuran(Request $request)
{
    $search = $request->input('search');

    $mitras = TUnitMitra::where('stat_um', 'AKTIF') // hanya yang aktif
        ->when($search, function ($query) use ($search) {
            $query->where('nama_um', 'LIKE', "%$search%")
                  ->orWhere('idunit', 'LIKE', "%$search%");
        })
        ->orderBy('idunit')
        ->paginate(20)
        ->appends(['search' => $search]); // supaya search tidak hilang di pagination

    return view('ADMIN.iuranpesertaadmin', compact('mitras'));
}

  public function mitraEdit($idmitra)
    {
        $mitra = TMitra::findOrFail($idmitra); // pakai model TMitra
        return view('ADMIN.listmitraadminedit', compact('mitra'));
    }

    // 🧱 Update Mitra
    public function mitraUpdate(Request $request, $idmitra)
    {
        $mitra = TMitra::findOrFail($idmitra);

        $validated = $request->validate([
            'nama_um' => 'required|string|max:255',
            'alamat_um' => 'nullable|string|max:255',
            'kelurahan' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'kotakab' => 'nullable|string|max:255',
            'provinsi' => 'nullable|string|max:255',
            'stat_um' => 'nullable|string|max:20',
            'ip_pct' => 'nullable|numeric',
            'ipk_pct' => 'nullable|numeric',
            'nilaitambahan' => 'nullable|numeric',
        ]);

        $mitra->update($validated);

        return redirect()->route('listmitraadmin', ['idunit' => $mitra->idunit])
            ->with('success', 'Data mitra berhasil diperbarui!');
    }
    public function unitDestroy($idunit)
    {
        try {
            $unit = TUnitMitra::findOrFail($idunit);

            // Jika ada relasi peserta atau mitra, bisa dicek dulu
            if ($unit->peserta()->count() > 0) {
                return redirect()->back()->with('error', 'Unit tidak dapat dihapus karena masih memiliki peserta terdaftar.');
            }

            $unit->delete();

            return redirect()->route('admin.mitradansekolah')
                ->with('success', 'Data unit berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus unit.');
        }
    }
    public function mitraDestroy($idmitra)
    {
        $mitra = TMitra::find($idmitra);

        if (!$mitra) {
            return redirect()->back()->with('error', 'Data mitra tidak ditemukan.');
        }

        $mitra->delete();

        return redirect()->back()->with('success', 'Data mitra berhasil dihapus.');
    }

    public function listUnit()
    {
        $units = TMitra::select('idunit')->groupBy('idunit')->get();
        return view('ADMIN.iuranpesertaadmin', compact('units'));
    }

    // Menampilkan daftar mitra (sekolah) di dalam satu unit
    public function bukaMitra(Request $request, $idunit)
{
    $unit = TUnitMitra::where('idunit', $idunit)->first();
    $search = $request->input('search');

    // Query dasar
    $query = TMitra::where('idunit', $idunit);

    // Filter hanya berdasarkan nama_um
    if ($search) {
        $query->where('nama_um', 'LIKE', '%' . $search . '%');
    }

    $mitras = $query->get();

    return view('ADMIN.bukamitraadmin', compact('unit', 'mitras', 'search'));
}
public function daftarPeserta(Request $request, $idmitra)
{
    // Ambil mitra
    $mitra = TMitra::findOrFail($idmitra);

    // Ambil input pencarian
    $search = $request->input('search');

    // Query peserta (hanya AKTIF)
    $query = TPeserta::where('idmitra', $idmitra)
                      ->where('statuspeserta', 'AKTIF'); // hanya yang AKTIF

    if ($search) {
        $query->where('nama', 'LIKE', '%' . $search . '%');
    }

    // Pagination 5 data per halaman
    $peserta = $query->paginate(5)->withQueryString(); // dengan query string agar search tetap ada saat paginate

    // Nilai Aktuaria
    $nilai = TNilaiAktuaria::where('idunit', $mitra->idunit)->first();

    // Map iuran peserta: idanggota → data iuran
    $iuranMap = TIuranPeserta::whereIn('idanggota', $peserta->pluck('idanggota'))
        ->get()
        ->keyBy('idanggota');

    return view('ADMIN.daftarpesertaiuranadmin', compact(
        'mitra', 'peserta', 'nilai', 'search', 'iuranMap'
    ));
}

    public function editIPeserta($idanggota)
    {
        $peserta = TPeserta::findOrFail($idanggota);
        return view('ADMIN.editiuranpeserta', compact('peserta'));
    }
    public function createIuran($idanggota, $idunit)
    {
        $peserta = TPeserta::findOrFail($idanggota);
        $nilai = TNilaiAktuaria::where('idunit', $idunit)->first();

        // Ambil 6 iuran terakhir berdasarkan tanggal catat
        $riwayat = TIuranPeserta::where('idanggota', $idanggota)
            ->orderByDesc('tglcatat')
            ->limit(6)
            ->get();

        // Hitung rata-rata PhDP
        $rataPhdp = $riwayat->avg('phdp') ?? 0;

        return view('ADMIN.catatiuran', compact('peserta', 'riwayat', 'rataPhdp','nilai'));
    }

public function storeIuran(Request $request, $idanggota)
{
    // Validasi input
    $validated = $request->validate([
        'tglcatat' => 'required|date',
        'tglsetor' => 'required|date',
        'phdp'     => 'required|numeric',
        'bln_iuran'=> 'required|integer',
        'thn_iuran'=> 'required|integer',
    ]);

    // Ambil peserta untuk mendapatkan idunit
    $peserta = TPeserta::findOrFail($idanggota);

    // Ambil nilai aktuaria sesuai unit peserta
    $nilai = TNilaiAktuaria::where('idunit', $peserta->idunit)->first();

    // Hitung IP & IPK berdasarkan PhDP
    $ip_pct = $nilai?->ip ?? 0;
    $ipk_pct = $nilai?->ipk ?? 0;

    $phdp = $validated['phdp'];
    $ip_num = $phdp * $ip_pct / 100;
    $ipk_num = $phdp * $ipk_pct / 100;

    // Simpan ke database
    TIuranPeserta::create([
        'idanggota' => $idanggota,
        'tglcatat'  => $validated['tglcatat'],
        'tglsetor'  => $validated['tglsetor'],
        'phdp'      => $phdp,
        'ip_pct'    => $ip_pct,
        'ip_num'    => $ip_num,
        'ipk_pct'   => $ipk_pct,
        'ipk_num'   => $ipk_num,
        'bln_iuran' => $validated['bln_iuran'],
        'thn_iuran' => $validated['thn_iuran'],
    ]);

    return redirect()->back()->with('success', 'Iuran peserta berhasil dicatat!');
}

    public function showIuranPeserta($idanggota)
    {
        // Ambil data peserta
        $peserta = TPeserta::findOrFail($idanggota);

        // Ambil semua iuran peserta berdasarkan idanggota
        $iuranList = TIuranPeserta::where('idanggota', $idanggota)
            ->orderByDesc('thn_iuran')
            ->orderByDesc('bln_iuran')
            ->get();

        return view('ADMIN.editiuranpeserta', compact('peserta', 'iuranList'));
    }
    public function cetakIuranPeserta($idanggota)
    {
        $peserta = TPeserta::findOrFail($idanggota);

        $iuranList = TIuranPeserta::where('idanggota', $idanggota)
            ->orderByDesc('thn_iuran')
            ->orderByDesc('bln_iuran')
            ->get();

        // Load view ke PDF
        $pdf = Pdf::loadView('ADMIN.cetak_iuranpeserta_pdf', [
            'peserta' => $peserta,
            'iuranList' => $iuranList,
        ])->setPaper('a4', 'portrait');

        // Unduh otomatis
        return $pdf->download('IuranPeserta_' . $peserta->idanggota . '.pdf');
    }
    public function editcatat($idanggota, $id_iuran)
    {
        $iuran = TIuranPeserta::where('idanggota', $idanggota)
            ->where('id_iuran', $id_iuran)
            ->firstOrFail();

        return view('ADMIN.editcatat', compact('iuran'));
    }

public function updatecatat(Request $request, $idanggota, $id_iuran)
{
    // Ambil data iuran berdasarkan ID
    $iuran = TIuranPeserta::where('idanggota', $idanggota)
        ->where('id_iuran', $id_iuran)
        ->firstOrFail();

    // Validasi input
    $validated = $request->validate([
        'tglsetor' => 'required|date',
        'phdp' => 'required|numeric|min:0',
        'ip_num' => 'required|numeric|min:0',
        'ipk_num' => 'required|numeric|min:0',
    ]);

    // Update data
    $iuran->update($validated);

    // Pastikan ada nilai 'from' di form
    $from = $request->input('from');

    // Redirect sesuai asal form
    switch ($from) {
        case 'detailmitraadmin':
            return redirect()->to("/detailmitraadmin/{$idanggota}")
                ->with('success', 'Data iuran peserta berhasil diperbarui.');

        case 'daftarpesertaiuranadmin':
            return redirect()->to("/editiuranpesertaadmin/{$idanggota}")
                ->with('success', 'Data iuran peserta berhasil diperbarui.');

        default:
            // Default aman kalau lupa hidden input
            return redirect()->back()
                ->with('success', 'Data iuran peserta berhasil diperbarui.');
    }
}

}