<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TUnitMitra;
use App\Models\TMitra;
use App\Models\TPeserta;
use App\Models\TIuranPeserta;
use Barryvdh\DomPDF\Facade\Pdf;

class MitraController extends Controller
{
    public function index()
    {
        $mitra = TUnitMitra::all();
        return view('ADMIN.mitradansekolahadmin', compact('mitra'));
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
        // Ambil data unit berdasarkan ID
        $unit = TUnitMitra::findOrFail($idunit);

        // Kirim ke view editmitraadmin.blade.php
        return view('ADMIN.editmitraadmin', compact('unit'));
    }

    // Update data ke database
    public function update(Request $request, $idunit)
    {
        // Validasi input
        $request->validate([
            'nama_um' => 'required|string|max:100',
            'alamat_um' => 'required|string|max:255',
            'stat_um' => 'required|string',
            'ip_pct' => 'required|numeric',
            'ipk_pct' => 'required|numeric',
        ]);

        // Ambil data yang akan diupdate
        $unit = TUnitMitra::findOrFail($idunit);

        // Update data
        $unit->update([
            'nama_um' => $request->nama_um,
            'alamat_um' => $request->alamat_um,
            'stat_um' => $request->stat_um,
            'ip_pct' => $request->ip_pct,
            'ipk_pct' => $request->ipk_pct,
        ]);
        return redirect()->route('admin.mitradansekolah')
            ->with('success', 'Data Unit Mitra berhasil diperbarui.');
    }
    public function showIuran()
    {
        // Ambil semua data dari tabel t_unitmitra
        $mitras = TUnitMitra::orderBy('idunit')->get();

        // Kirim data ke view
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
    public function bukaMitra($idunit)
    {
        $unit = TUnitMitra::where('idunit', $idunit)->first();
        $mitras = TMitra::where('idunit', $idunit)->get();

        return view('ADMIN.bukamitraadmin', compact('unit', 'mitras'));
    }
    public function daftarPeserta($idmitra)
    {
        // Ambil mitra sesuai ID
        $mitra = TMitra::findOrFail($idmitra);

        // Ambil semua peserta dengan idmitra tersebut
        $peserta = TPeserta::where('idmitra', $idmitra)->get();

        // Kirim ke view
        return view('ADMIN.daftarpesertaiuranadmin', compact('mitra', 'peserta'));
    }
    public function editIPeserta($idanggota)
    {
        $peserta = TPeserta::findOrFail($idanggota);
        return view('ADMIN.editiuranpeserta', compact('peserta'));
    }
    public function createIuran($idanggota)
    {
        $peserta = TPeserta::findOrFail($idanggota);

        // Ambil 6 iuran terakhir berdasarkan tanggal catat
        $riwayat = TIuranPeserta::where('idanggota', $idanggota)
            ->orderByDesc('tglcatat')
            ->limit(6)
            ->get();

        // Hitung rata-rata PhDP
        $rataPhdp = $riwayat->avg('phdp') ?? 0;

        return view('ADMIN.catatiuran', compact('peserta', 'riwayat', 'rataPhdp'));
    }

    public function storeIuran(Request $request, $idanggota)
    {
        $validated = $request->validate([
            'gajipokok' => 'required|numeric',
            'phdp' => 'required|numeric',
            'ip_num' => 'required|numeric',
            'ip_pct' => 'required|numeric',
            'ipk_pct' => 'required|numeric',
            'ipk_num' => 'required|numeric',
            'tglcatat' => 'required|date',
            'tglsetor' => 'required|date',
            'thn_iuran' => 'required|integer',
            'bln_iuran' => 'required|integer',
            'flag_iuran' => 'nullable|string|max:12',
            'ip_num0' => 'nullable|numeric',
            'ipk_num0' => 'nullable|numeric',
        ]);

        $validated['idanggota'] = $idanggota;
        $validated['ip_num0'] = $validated['ip_num0'] ?? 0;
        $validated['ipk_num0'] = $validated['ipk_num0'] ?? 0;

        TIuranPeserta::create($validated);

        return redirect()
            ->route('admin.catatiuran', ['idanggota' => $idanggota])
            ->with('success', 'Iuran peserta berhasil dicatat.');
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
        $iuran = TIuranPeserta::where('idanggota', $idanggota)
            ->where('id_iuran', $id_iuran)
            ->firstOrFail();

        // Validasi input
        $request->validate([
            'tglsetor' => 'required|date',
            'phdp' => 'required|numeric|min:0',
            'ip_num' => 'required|numeric|min:0',
            'ipk_num' => 'required|numeric|min:0',
        ]);

        // Update data
        $iuran->update([
            'tglsetor' => $request->tglsetor,
            'phdp' => $request->phdp,
            'ip_num' => $request->ip_num,
            'ipk_num' => $request->ipk_num,
        ]);

        return redirect()->route('catatpesertaiuranadmin')->with('success', 'Data iuran peserta berhasil diperbarui.');
    }
}
