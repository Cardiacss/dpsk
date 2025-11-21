<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TUnitMitra;
use App\Models\TMitra;
use App\Models\TPeserta;
use App\Models\TAPensiun;
use Illuminate\Http\Request;
use App\Models\TIuranPeserta;
use Illuminate\Support\Facades\DB;

class IuranController extends Controller
{
    public function index()
    {
        $unitmitra = TUnitMitra::all();
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
        $peserta = TPeserta::where('idmitra', $idmitra)->get();

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
        $iuran = TIuranPeserta::where('idanggota', $idanggota)
            ->where('id_iuran', $id_iuran)
            ->firstOrFail();

        return view('ADMIN.editcatat', compact('iuran'));
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
    private function round500($value)
    {
        return round($value / 500) * 500;
    }
    public function hitungSimulasi(Request $request)
    {
        $idanggota = $request->idanggota;
        $dodt      = $request->dodt;

        // Ambil data peserta
        $peserta = TPeserta::findOrFail($idanggota);
        $pensiun = TAPensiun::where('idanggota', $idanggota)->first();

        $tgllahir = new \DateTime($peserta->tgllahir);
        $tmtkeja  = new \DateTime($peserta->tmtkeja);
        $tmtpensiun = new \DateTime($request->tmtpensiun);

        // Ambil pekerjaan terakhir & status
        $pekerjaanakhir = $peserta->pkerjaanakhir ?? '-';
        $statuspensiun  = $pensiun->statuspensiun ?? '-';

        // CASE NORMAL (tidak meninggal)
        if (empty($dodt)) {

            $diffKerja = $tmtpensiun->diff($tmtkeja);
            $masaKerja = $diffKerja->y + ($diffKerja->m / 12);

            $diffUsiaPeserta = (new \DateTime())->diff($tgllahir);
            $usiaPeserta = $diffUsiaPeserta->y + ($diffUsiaPeserta->m / 12);

            $diffUsiaPensiun = $tmtpensiun->diff($tgllahir);
            $usiaPensiun = $diffUsiaPensiun->y + ($diffUsiaPensiun->m / 12);

            $phdp = DB::table('t_iuranpeserta')->where('idanggota', $idanggota)->value('phdp') ?? 0;

            // fnss
            $statusNikah = $peserta->statusnikah ?? 'Belum Kawin';
            $jenisKelamin = $peserta->jeniskelamin ?? 'Pria';
            $umur = (int)$diffUsiaPeserta->y;
            $faktor = \App\Models\TFaktorNilai::where('umur', '<=', $umur)
                ->where('statuskerja', strtoupper($pekerjaanakhir))
                ->orderBy('umur', 'desc')
                ->first();

            $fnss = 1;
            if ($faktor) {
                if ($jenisKelamin == 'Pria' && $statusNikah == 'Kawin') $fnss = $faktor->fns_s_pria_kawin;
                if ($jenisKelamin == 'Wanita' && $statusNikah == 'Kawin') $fnss = $faktor->fns_s_wanita_kawin;
                if ($jenisKelamin == 'Pria' && $statusNikah == 'Belum Kawin') $fnss = $faktor->fns_s_pria_lajang;
                if ($jenisKelamin == 'Wanita' && $statusNikah == 'Belum Kawin') $fnss = $faktor->fns_s_wanita_lajang;
            }

            $rumusMP = 0.6 * ($masaKerja + ($usiaPensiun - $usiaPeserta)) * 0.021 * $phdp;

            return response()->json([
                'tipe' => 'normal',
                'masa_kerja' => $this->toTahunBulan($masaKerja),
                'usia' => $this->toTahunBulan($usiaPeserta),
                'usia_pensiun' => $this->toTahunBulan($usiaPensiun),
                'phdp' => $phdp,
                'fnss' => $fnss,
                'status_kawin' => $peserta->statusnikah,
                'jenis_kelamin' => $peserta->jeniskelamin,
                'pkerjaanakhir' => $pekerjaanakhir,
                'manfaat' => [
                    'MP' => $this->round500($rumusMP),
                    '100%' => $this->round500($fnss * $rumusMP * 12),
                    '80%' => $this->round500(0.8 * ($masaKerja * 0.021 * $phdp)),
                    '20%' => $this->round500(0.2 * $fnss * $rumusMP * 12),
                ]
            ]);
        }

        // CASE MENINGGAL (dodt ada)
        $manfaat_bulan = (float)$request->batasmanfaatbulanan;

        $masaKerja = $tmtpensiun->diff($tmtkeja);
        $masaKerjaTahun = $masaKerja->y + ($masaKerja->m / 12);

        $usiaPensiun = $tgllahir->diff($tmtpensiun);
        $usiaPensiunTahun = $usiaPensiun->y + ($usiaPensiun->m / 12);

        $mp = 0.60 * $manfaat_bulan;

        return response()->json([
            'tipe' => 'meninggal',
            'mp' => $this->round500($mp),
            'masakerja' => $this->toTahunBulan($masaKerjaTahun),
            'usiapensiun' => $this->toTahunBulan($usiaPensiunTahun),
            'statuspensiun' => $statuspensiun,
            'jenis_kelamin' => $peserta->jeniskelamin,
            'pekerjaan_terakhir' => $pekerjaanakhir,
            'batasmanfaatbulanan' => $manfaat_bulan,
            'status_kawin' => $peserta->statusnikah,
        ]);
    }
}
