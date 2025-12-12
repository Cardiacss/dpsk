<?php

namespace App\Http\Controllers\Admin;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\TUnitMitra;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\TMitra;
use App\Models\TPeserta;
use App\Models\TAPensiun;
use Illuminate\Http\Request;
use App\Models\TIuranPeserta;
use App\Models\TFaktorNilai;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class IuranController extends Controller
{
public function index()
{
    $unitmitra = TUnitMitra::orderBy('nama_um')->paginate(20);

    return view('ADMIN.riwayatiuran', compact('unitmitra'));
}
    public function getMitraByUnit($idunit)
    {
        $mitra = TMitra::where('idunit', $idunit)->get(['idmitra', 'nama_um']);
        return response()->json($mitra);
    }
public function detail($idmitra)
    {
        // Ambil data mitra berdasarkan ID
        $mitra = TMitra::findOrFail($idmitra);

        // Ambil peserta berdasarkan ID mitra
            $peserta = TPeserta::where('idmitra', $idmitra)
                        ->orderBy('nama', 'asc') // opsional, urutkan alfabet
                        ->paginate(10);

        // Kirim ke view
        return view('ADMIN.daftarpesertariwayatiuran', compact('mitra', 'peserta'));
    }
    public function getIuranPeserta($idanggota, $tahun = null)
    {
        $query = TIuranPeserta::where('idanggota', $idanggota);

        if ($tahun) {
            $query->where('thn_iuran', $tahun);
        }

        $data = $query->orderBy('bln_iuran')->get([
            'id_iuran',
            'tglcatat',
            'tglsetor',
            'phdp',
            'ipk_num',
            'ip_num',
            'ipk_num0'
        ]);;

        return response()->json($data);
    }
public function editCatat($idanggota, $id_iuran)
{
    // Ambil iuran sekaligus relasi peserta dan mitra
    $iuran = TIuranPeserta::with('peserta.mitra')
        ->where('idanggota', $idanggota)
        ->where('id_iuran', $id_iuran)
        ->firstOrFail();

    $mitra = $iuran->peserta->mitra; // ini cara akses mitra
    return view('ADMIN.editcatat', compact('iuran', 'mitra'));
}

    public function updateCatat(Request $request, $idanggota, $id_iuran)
    {
        // Validasi
        $request->validate([
            'tglsetor'   => 'nullable|date',
            'phdp'       => 'nullable|numeric',
            'ipk_num'    => 'nullable|numeric',
            'ip_num'     => 'nullable|numeric',
            'bln_iuran'  => 'required|integer|min:1|max:12',
            'thn_iuran'  => 'required|integer|min:2000|max:2100',
        ]);

        // Ambil record iuran berdasarkan idanggota + id_iuran
        $iuran = TIuranPeserta::where('idanggota', $idanggota)
            ->where('id_iuran', $id_iuran)
            ->firstOrFail();

        // Update semua field termasuk bulan & tahun
        $iuran->update([
            'tglsetor'   => $request->tglsetor,
            'phdp'       => $request->phdp,
            'ipk_num'    => $request->ipk_num,
            'ip_num'     => $request->ip_num,
            'bln_iuran'  => $request->bln_iuran,
            'thn_iuran'  => $request->thn_iuran,
        ]);

        // Redirect kembali
        return redirect("/editiuranpesertaadmin/{$idanggota}")
            ->with('success', 'Data iuran berhasil diperbarui.');
    }
    public function getPesertaByUnit($idunit)
    {
        // Ambil semua peserta berdasarkan idunit
        $peserta = TPeserta::where('idunit', $idunit)
            ->get(['idanggota', 'nopeserta', 'nama', 'idmitra']);

        // Kembalikan data JSON untuk digunakan di AJAX
        return response()->json($peserta);
    }
    public function simulasiIndex(Request $request)
    {
        $query = TPeserta::query();

        // Jika ada pencarian
        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                    ->orWhere('nopeserta', 'like', '%' . $request->search . '%');
            });
        }

        // Ambil hasil
        $peserta = $query->orderBy('nama', 'asc')->get(['idanggota', 'nopeserta', 'nama']);

        return view('ADMIN.simulasi', compact('peserta'));
    }
    public function simulasiPesertaAktif($idanggota)
    {
        $peserta = TPeserta::findOrFail($idanggota);

        // Ambil data pensiun jika ada
        $pensiun = TAPensiun::where('idanggota', $idanggota)->first();

        return view('ADMIN.simulasipesertaaktif', compact('peserta', 'pensiun'));
    }
    private function toTahunBulan($value)
{
    $tahun = floor($value);
    $bulan = round(($value - $tahun) * 12);

    return $tahun . " tahun " . $bulan . " bulan";
}
    private function ambilFNSS($peserta)
{
    $umur = now()->diff(new \DateTime($peserta->tgllahir))->y;
    $pk = strtoupper($peserta->pkerjaanakhir);

    $faktor = TFaktorNilai::where('umur', '<=', $umur)
        ->where('statuskerja', $pk)
        ->orderBy('umur', 'desc')
        ->first();

    if (!$faktor) return 1;

    $jk = $peserta->jeniskelamin;
    $kawin = $peserta->statusnikah;

    if ($jk == 'Pria' && $kawin == 'Kawin') return $faktor->fns_s_pria_kawin;
    if ($jk == 'Wanita' && $kawin == 'Kawin') return $faktor->fns_s_wanita_kawin;
    if ($jk == 'Pria' && $kawin == 'Belum Kawin') return $faktor->fns_s_pria_lajang;
    if ($jk == 'Wanita' && $kawin == 'Belum Kawin') return $faktor->fns_s_wanita_lajang;

    return 1;
}
private function round500($value)
{
    return ceil($value / 500) * 500;
}
private function ambilFNSInterpolasi($peserta, $usiaPensiun)
{
    $pk = strtoupper($peserta->pkerjaanakhir);

    $bawah = TFaktorNilai::where('umur', '<=', floor($usiaPensiun))
        ->where('statuskerja', $pk)
        ->orderBy('umur', 'desc')
        ->first();

    $atas = TFaktorNilai::where('umur', '>', floor($usiaPensiun))
        ->where('statuskerja', $pk)
        ->orderBy('umur', 'asc')
        ->first();

    if (!$bawah || !$atas) {
        return $bawah->fnsb ?? 1;
    }

    $u1 = $bawah->umur;
    $u2 = $atas->umur;

    $f1 = $bawah->fnsb;
    $f2 = $atas->fnsb;

    // interpolasi
    return $f1 + (($usiaPensiun - $u1) / ($u2 - $u1)) * ($f2 - $f1);
}


    public function hitungSimulasi(Request $request)
{
    $idanggota = $request->idanggota;

    // ------------------------
    // AMBIL DATA PESERTA
    // ------------------------
    $peserta = TPeserta::findOrFail($idanggota);
    $phdp = DB::table('t_iuranpeserta')->where('idanggota', $idanggota)->value('phdp') ?? 0;

    $tgllahir   = new \DateTime($peserta->tgllahir);
    $tmtKerja   = new \DateTime($peserta->tmtkeja);
    $tmtPensiun = new \DateTime($request->tmtpensiun);

    // ------------------------
    // HITUNG USIA & MASA KERJA
    // ------------------------
    $diffMK = $tmtKerja->diff($tmtPensiun);
    $masaKerja = $diffMK->y + ($diffMK->m / 12);

    $diffUsiaSekarang = now()->diff($tgllahir);
    $usiaPeserta = $diffUsiaSekarang->y + ($diffUsiaSekarang->m / 12);

    $diffUsiaPensiun = $tmtPensiun->diff($tgllahir);
    $usiaPensiun = $diffUsiaPensiun->y + ($diffUsiaPensiun->m / 12);

    // ------------------------
    // USIA NORMAL BERDASARKAN PEKERJAAN
    // ------------------------
    $pk = strtolower($peserta->pkerjaanakhir);

    $usiaNormal = ($pk == 'guru') ? 60 : 56;
    $usiaCepat  = $usiaNormal - 10;

    // ------------------------
    // CEK JENIS PENSIUN
    // ------------------------

    // A. MENINGGAL = Janda/Duda Pasif
    if (!empty($request->dodt)) {
        $mp_jd = 0.60 * ($masaKerja * 0.021 * $phdp);

        return response()->json([
            'tipe' => 'meninggal',
            'masakerja' => $this->toTahunBulan($masaKerja),
            'usiapensiun' => $this->toTahunBulan($usiaPensiun),
            'statuspensiun' => 'Janda/Duda Pasif',
            'mp' => $this->round500($mp_jd),
            'batasmanfaatbulanan' => $request->batasmanfaatbulanan,
            'jenis_kelamin' => $peserta->jeniskelamin,
            'status_kawin' => $peserta->statusnikah,
            'pekerjaan_terakhir' => $peserta->pkerjaanakhir,
        ]);
    }

    // B. PENGEMBALIAN IURAN (MK < 3)
    if ($masaKerja < 3) {
        return response()->json([
            'tipe' => 'refund',
            'pesan' => 'Masa kerja kurang dari 3 tahun → Pengembalian Iuran',
            'total_iuran' => $this->round500($phdp * $masaKerja) // sesuaikan jika ada rumus lain
        ]);
    }

    // C. DISABILITAS / CACAT (SK Sakit)
    if ($request->suratketerangan == 'sakit') {

        $tambahanMK = max(0, $usiaNormal - $usiaPeserta);

        $mp = ($masaKerja + $tambahanMK) * 0.021 * $phdp;

        return response()->json([
            'tipe' => 'disabilitas',
            'masa_kerja' => $this->toTahunBulan($masaKerja),
            'tambahan_mk' => $tambahanMK . ' tahun',
            'jenis_kelamin' => $peserta->jeniskelamin,
            'status_kawin' => $peserta->statusnikah,
            'pekerjaan_terakhir' => $peserta->pkerjaanakhir,
            'mp_bulanan' => $this->round500($mp),
            '100%' => $this->round500($mp * 12),
            '80%' => $this->round500(0.8 * $mp),
            '20%' => $this->round500(0.2 * $mp * 12),
        ]);
    }

    // D. PENSIUN NORMAL
    if ($usiaPensiun >= $usiaNormal) {

        $mp = $masaKerja * 0.021 * $phdp;

        $fnss = $this->ambilFNSS($peserta);

        return response()->json([
            'tipe' => 'normal',
            'usia' => $this->toTahunBulan($usiaPeserta),
            'usia_pensiun' => $this->toTahunBulan($usiaPensiun),
            'masa_kerja' => $this->toTahunBulan($masaKerja),
            'jenis_kelamin' => $peserta->jeniskelamin,
            'status_kawin' => $peserta->statusnikah,
            'pekerjaan_terakhir' => $peserta->pkerjaanakhir,
            'fnss' => $fnss,
            'manfaat' => [
                'MP'   => $this->round500($mp),
                '100%' => $this->round500($fnss * $mp * 12),
                '80%'  => $this->round500(0.8 * $mp),
                '20%'  => $this->round500(0.2 * $fnss * $mp * 12),
            ]
        ]);
    }

    // E. PENSIUN CEPAT (EARLY RETIREMENT)
    if ($usiaPensiun >= $usiaCepat && $usiaPensiun < $usiaNormal) {

        // Ambil FNS interpolasi
        $fns = $this->ambilFNSInterpolasi($peserta, $usiaPensiun);

        $mp = $masaKerja * 0.021 * $phdp * $fns;

        return response()->json([
            'tipe' => 'cepat',
            'usia' => $this->toTahunBulan($usiaPensiun),
            'fns_interpolasi' => $fns,
            'jenis_kelamin' => $peserta->jeniskelamin,
            'status_kawin' => $peserta->statusnikah,
            'pekerjaan_terakhir' => $peserta->pkerjaanakhir,
            'masa_kerja' => $this->toTahunBulan($masaKerja),
            'mp' => $this->round500($mp),
            '100%' => $this->round500($mp * 12),
            '80%' => $this->round500(0.8 * $mp),
            '20%' => $this->round500(0.2 * $mp * 12),
        ]);
    }

// F. PENSIUN TUNDA
return response()->json([
    'tipe' => 'tunda',
    'usia' => $this->toTahunBulan($usiaPeserta),
    'usia_pensiun' => $this->toTahunBulan($usiaPensiun),
    'masa_kerja' => $this->toTahunBulan($masaKerja),
    'jenis_kelamin' => $peserta->jeniskelamin,
    'status_kawin' => $peserta->statusnikah,
    'pekerjaan_terakhir' => $peserta->pkerjaanakhir,    
    'pesan' => 'Peserta berhenti sebelum usia pensiun cepat.',
]);
}


public function importExcel(Request $request, $idmitra)
{
    // VALIDASI FILE
    $validator = Validator::make($request->all(), [
        'file' => 'required|mimes:xlsx,xls,csv|max:2048'
    ]);

    if ($validator->fails()) {
        return back()->with('error', 'Format file harus XLSX/XLS/CSV (max 2MB).');
    }

    $file = $request->file('file');
    $data = Excel::toArray([], $file)[0]; // sheet pertama

    // HEADER WAJIB
    $required = [
        'tgl_catat','tgl_setor','phdp','ip_pct','ipk_pct',
        'bln_iuran','thn_iuran','gajipokok','idanggota','nama'
    ];

    $header = array_map(fn($h) => strtolower(trim($h)), $data[0]);

    foreach ($required as $col) {
        if (!in_array($col, $header)) {
            return back()->with('error', "Kolom '$col' tidak ditemukan. Pastikan menggunakan TEMPLATE Format G.");
        }
    }

    $col = array_flip($header);
    unset($data[0]); // hapus header

    $imported = 0;
    $skipped  = 0;

    foreach ($data as $row) {

        $idanggota = $row[$col['idanggota']] ?? null;
        $nama      = trim($row[$col['nama']] ?? '');

        // jika idanggota kosong → cari berdasarkan nama (LIKE fleksibel)
        if (!$idanggota) {
            if ($nama !== '') {
                $peserta = TPeserta::where('nama', 'LIKE', '%' . $nama . '%')->first();
                if ($peserta) {
                    $idanggota = $peserta->idanggota;
                } else {
                    $skipped++;
                    continue;
                }
            } else {
                $skipped++;
                continue;
            }
        }

        // Hitung iuran
        $phdp    = floatval($row[$col['phdp']]);
        $ip_pct  = floatval($row[$col['ip_pct']]);
        $ipk_pct = floatval($row[$col['ipk_pct']]);

        $ip_num  = $phdp * ($ip_pct / 100);
        $ipk_num = $phdp * ($ipk_pct / 100);

        // Tanggal Excel bisa number atau string
        $tglcatatExcel = $row[$col['tgl_catat']];
        $tglsetorExcel = $row[$col['tgl_setor']];

        try {
            $tglcatat = is_numeric($tglcatatExcel)
                        ? Date::excelToDateTimeObject($tglcatatExcel)
                        : Carbon::createFromFormat('d/m/Y', $tglcatatExcel);

            $tglsetor = is_numeric($tglsetorExcel)
                        ? Date::excelToDateTimeObject($tglsetorExcel)
                        : Carbon::createFromFormat('d/m/Y', $tglsetorExcel);
        } catch (\Exception $e) {
            $skipped++;
            continue;
        }

        // SIMPAN
        TIuranPeserta::create([
            'idanggota' => $idanggota,
            'tglcatat'  => $tglcatat,
            'tglsetor'  => $tglsetor,
            'phdp'      => $phdp,
            'ip_pct'    => $ip_pct,
            'ipk_pct'   => $ipk_pct,
            'ip_num'    => $ip_num,
            'ipk_num'   => $ipk_num,
            'bln_iuran' => $row[$col['bln_iuran']],
            'thn_iuran' => $row[$col['thn_iuran']],
            'gajipokok' => $row[$col['gajipokok']],
            'flag_iuran'=> 'NORMAL', // default supaya muncul
        ]);

        $imported++;
    }

    return back()->with(
        'success',
        "Berhasil import $imported data. $skipped baris dilewati"
    );
}


}
