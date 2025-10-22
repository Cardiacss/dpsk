<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TUnitMitra;
use App\Models\TMitra;
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
    $unit = \App\Models\TUnitMitra::where('idunit', $idunit)->first();

    // Ambil daftar mitra/sekolah (anak)
    $mitras = \App\Models\TMitra::where('idunit', $idunit)->get();

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
        $mitra = TUnitMitra::findOrFail($idunit);
        return view('ADMIN.listmitraadmin', compact('mitra'));
    }

    // Update data ke database
    public function update(Request $request, $idunit)
    {
        $mitra = TUnitMitra::findOrFail($idunit);

        $validated = $request->validate([
            'nama_um' => 'required|string|max:255',
            'alamat_um' => 'nullable|string|max:255',
            'kelurahan' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'kotakab' => 'nullable|string|max:255',
            'provinsi' => 'nullable|string|max:255',
            'stat_um' => 'nullable|string|max:50',
            'ip_pct' => 'nullable|numeric',
            'ipk_pct' => 'nullable|numeric',
            'urut' => 'nullable|integer',
            'nilaitambahan' => 'nullable|numeric',
            'tahunakatuaria' => 'nullable|integer',
        ]);

        $mitra->update($validated);

        return redirect()->back()->with('success', 'Data mitra berhasil diperbarui!');
    }
    public function showIuran()
{
    // Ambil semua data dari tabel t_unitmitra
    $mitras = TUnitMitra::orderBy('idunit')->get();

    // Kirim data ke view
    return view('ADMIN.iuranpesertaadmin', compact('mitras'));
}
}
