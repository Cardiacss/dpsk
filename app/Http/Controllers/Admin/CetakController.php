<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\TUnitMitra;
use App\Models\TPeserta;

class CetakController extends Controller
{
   public function cetakPenawaran(Request $request)
{
    $unit = TUnitMitra::where('idunit', $request->idanggota)->first();
    $peserta = TPeserta::where('idanggota', $request->idanggota)->first();

    $nama_ppk = $unit ? $unit->nama_um : '-';
    $kota_ppk = $unit ? $unit->kotakab : '-';
    $nama = $peserta ? $peserta->nama : '-';
    // Format tanggal: hari ini
    $tanggal = now()->format('d');  // contoh: 12

    // Format bulan dari form (pastikan sudah dalam bentuk nama bulan)
    // Jika bulan_surat berupa angka (1–12), konversi dulu:
    $bulan = $request->bulan_surat;

    // Tahun dari form
    $tahun = $request->tahun_surat;

    // Gabungkan jadi satu string tanggal surat
    $tanggal_surat = "$tanggal $bulan $tahun";

    $data = [
        'idanggota' => $request->idanggota,
        'tmtpensiun' => $request->tmtpensiun,
        'dodt' => $request->dodt,
        'batasmanfaatbulanan' => $request->batasmanfaatbulanan,

        'nomor_surat' => $request->nomor_surat,
        'jenis_manfaat' => $request->jenis_manfaat,
        'bulan_surat' => $bulan,
        'tahun_surat' => $tahun,
        'alamat_tujuan' => $request->alamat_tujuan,

        // Tambahan
        'mp' => $request->mp,
        'mp100' => $request->manfaat100,
        'mp80' => $request->manfaat80,
        'mp20' => $request->manfaat20,

        // Kirim tanggal surat
        'tanggal_surat' => $tanggal_surat,
        'nama_ppk' => $nama_ppk,
        'kota_ppk' => $kota_ppk,
        'nama' => $nama,
    ];

    $pdf = Pdf::loadView('admin.penawaran', $data);
    return $pdf->download('penawaran_pensiun.pdf');
}
public function cetakPembuatanSK(Request $r)
{
    // Data masuk dari URLSearchParams + nilai manfaat
    $data = [
        'idanggota' => $r->idanggota,
        'tmtpensiun' => $r->tmtpensiun,
        'dodt' => $r->dodt,
        'batasmanfaatbulanan' => $r->batasmanfaatbulanan,

        // Tambahan modal
        'sk_permohonan' => $r->sk_permohonan,
        'sk_tgl_pengantar' => $r->sk_tgl_pengantar,
        'sk_nomor_pengantar' => $r->sk_nomor_pengantar,
        'sk_tanggal' => $r->sk_tanggal,
        'sk_nomor' => $r->sk_nomor,

        // Tambahan manfaat dari hidden input
        'mp' => $r->mp,
        'manfaat100' => $r->manfaat100,
        'manfaat80' => $r->manfaat80,
        'manfaat20' => $r->manfaat20,
    ];

    // Render view ke PDF
    $pdf = PDF::loadView('ADMIN.pembuatan_sk', $data)
            ->setPaper('A4', 'portrait');

    return $pdf->stream('pembuatan_sk.pdf');
}
    public function cetakSK(Request $request)
{
    $data = [
        'idanggota' => $request->idanggota,
        'tmtpensiun' => $request->tmtpensiun,
        'dodt' => $request->dodt,
        'batasmanfaatbulanan' => $request->batasmanfaatbulanan,

        // Dari modal
        'nomor_surat' => $request->nomor_surat,
        'jenis_manfaat' => $request->jenis_manfaat,
        'bulan_surat' => $request->bulan_surat,
        'tahun_surat' => $request->tahun_surat,
        'alamat_tujuan' => $request->alamat_tujuan,

        // Tambahan MP
        'mp' => $request->mp,
        'manfaat100' => $request->manfaat100,
        'manfaat80' => $request->manfaat80,
        'manfaat20' => $request->manfaat20,
    ];

    $pdf = Pdf::loadView('ADMIN.penawaran', $data);
    return $pdf->download('penawaran_pensiun.pdf');
}
}
