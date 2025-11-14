<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TUnitMitra;
use App\Models\TMitra;
use App\Models\TPeserta;
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
public function showSimulasiPeserta(Request $request, $idanggota)
{
    // Ambil data peserta
    $peserta = TPeserta::find($idanggota);

    // Jika peserta tidak ditemukan
    if (!$peserta) {
        if ($request->ajax()) {
            return response()->json(['error' => 'Data peserta tidak ditemukan.']);
        }
        abort(404, 'Peserta tidak ditemukan');
    }

    // 🟢 Jika request AJAX (tombol simulasi ditekan)
    if ($request->ajax()) {
        try {
            // Ambil input tanggal dari form
            $tmtpensiun = $request->query('tmtpensiun');
            $tanggalMeninggal = $request->query('tanggal_meninggal');

            if (empty($tmtpensiun)) {
                return response()->json(['error' => 'Tanggal pensiun wajib diisi.']);
            }

            // Ambil tanggal dari database
            $tgllahir = $peserta->tgllahir;
            $tmtkerja = $peserta->tmtkerja;

            if (empty($tgllahir) || empty($tmtkerja)) {
                return response()->json(['error' => 'Data tanggal lahir atau TMT kerja tidak lengkap di database.']);
            }

            // Hitung masa kerja
            $tglMulaiKerja = new \DateTime($tmtkerja);
            $tglPensiun = new \DateTime($tmtpensiun);
            $diffKerja = $tglPensiun->diff($tglMulaiKerja);
            $masaKerja = $diffKerja->y + ($diffKerja->m / 12);

            // Hitung usia (pakai tanggal meninggal jika ada)
            $tglLahir = new \DateTime($tgllahir);
            $tglSekarang = $tanggalMeninggal ? new \DateTime($tanggalMeninggal) : new \DateTime();
            $diffUsia = $tglSekarang->diff($tglLahir);
            $usiaPeserta = $diffUsia->y + ($diffUsia->m / 12);
            $umur = (int)$diffUsia->y;

            // Ambil faktor nilai
            $statusNikah = $peserta->statusnikah ?? 'Belum Kawin';
            $jenisKelamin = $peserta->jeniskelamin ?? 'Pria';
            $pekerjaanakhir = strtoupper($peserta->pkerjaanakhir ?? 'PEGAWAI');
            $statusKerja = in_array($pekerjaanakhir, ['GURU', 'PEGAWAI']) ? 'S' : 'B';

            // 🔹 Ambil PHDP terakhir dari t_iuranpeserta (decimal(18,3))
            $phdp = DB::table('t_iuranpeserta')
                ->where('idanggota', $idanggota)
                ->orderBy('id_iuran', 'desc')
                ->value('phdp');

            $phdp = (float) ($phdp ?? 0);

            // 🔹 Ambil faktor nilai berdasarkan umur dan status kerja
            $faktor = \App\Models\TFaktorNilai::where('umur', '<=', $umur)
                ->where('statuskerja', $statusKerja)
                ->orderBy('umur', 'desc')
                ->first();

            // Default faktor NSS = 1
            $fnss = 1;
            if ($faktor) {
                if ($statusKerja == 'S') {
                    if ($jenisKelamin == 'Pria' && $statusNikah == 'Kawin') $fnss = $faktor->fns_s_pria_kawin;
                    if ($jenisKelamin == 'Wanita' && $statusNikah == 'Kawin') $fnss = $faktor->fns_s_wanita_kawin;
                    if ($jenisKelamin == 'Pria' && $statusNikah == 'Belum Kawin') $fnss = $faktor->fns_s_pria_lajang;
                    if ($jenisKelamin == 'Wanita' && $statusNikah == 'Belum Kawin') $fnss = $faktor->fns_s_wanita_lajang;
                } else {
                    if ($jenisKelamin == 'Pria' && $statusNikah == 'Kawin') $fnss = $faktor->fns_b_pria_kawin;
                    if ($jenisKelamin == 'Wanita' && $statusNikah == 'Kawin') $fnss = $faktor->fns_b_wanita_kawin;
                    if ($jenisKelamin == 'Pria' && $statusNikah == 'Belum Kawin') $fnss = $faktor->fns_b_pria_lajang;
                    if ($jenisKelamin == 'Wanita' && $statusNikah == 'Belum Kawin') $fnss = $faktor->fns_b_wanita_lajang;
                }
            }

            // 🔹 Hitung manfaat pensiun
            $rumusDasar = 0.6 * $masaKerja * 0.021 * $phdp;
            $manfaatMP = $rumusDasar;
            $manfaat100 = 1 * $fnss * $rumusDasar * 12;
            $manfaat80 = $manfaatMP * 0.8;
            $manfaat20 = $manfaatMP * 0.2;

            // 🔹 Format angka ribuan untuk tampilan
            $format = fn($val) => number_format($val, 3, ',', '.');

            return response()->json([
                'masa_kerja' => round($masaKerja, 2),
                'pekerjaan_terakhir' => $pekerjaanakhir,
                'usia' => round($usiaPeserta, 2),
                'phdp' => $format($phdp),
                'fnss' => $fnss,
                'manfaat' => [
                    'MP' => $format($manfaatMP),
                    '100%' => $format($manfaat100),
                    '80%' => $format($manfaat80),
                    '20%' => $format($manfaat20),
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Terjadi kesalahan dalam perhitungan.',
                'detail' => $e->getMessage()
            ]);
        }
    }

    // 🟣 Jika bukan AJAX → tampilkan halaman simulasi
    return view('ADMIN.simulasipesertaaktif', compact('peserta'));
}

}
