<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TSukuBunga;
use App\Models\IdxReward;
use App\Models\TPeraturan;
use Illuminate\Support\Facades\DB;
use App\Models\TFaktorNilai;

class MasterController extends Controller
{
    public function index()
    {
        $data = TSukuBunga::orderBy('tahun', 'desc')->get();
        return view('ADMIN.sukubunga', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer',
            'besaran' => 'required|numeric',
        ]);

        // Jika ada ID, berarti mode edit
        if ($request->id) {
            $data = TSukuBunga::findOrFail($request->id);
            $data->update([
                'tahun' => $request->tahun,
                'peserta' => $request->besaran,
            ]);
            return redirect()->route('sukubunga.index')->with('success', 'Data berhasil diperbarui!');
        }

        // Jika tidak ada ID, berarti tambah data baru
        TSukuBunga::create([
            'tahun' => $request->tahun,
            'peserta' => $request->besaran,
        ]);

        return redirect()->route('sukubunga.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($tahun)
    {
        $editData = TSukuBunga::where('tahun', $tahun)->firstOrFail();
        $data = TSukuBunga::orderBy('tahun', 'desc')->get();
        return view('ADMIN.sukubunga', compact('data', 'editData'));
    }
    public function destroy($tahun)
    {
        TSukuBunga::findOrFail($tahun)->delete();
        return redirect()->route('sukubunga.index')->with('success', 'Data berhasil dihapus!');
    }
    public function indeksIndex()
    {
        $data = IdxReward::orderBy('tgl', 'desc')->get();
        return view('ADMIN.indekspenghargaan', compact('data'));
    }

    // Menyimpan atau memperbarui data indeks penghargaan
    public function indeksStore(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'besaran' => 'required|numeric',
        ]);

        // Jika data dengan tanggal tersebut sudah ada, update
        $data = IdxReward::where('tgl', $request->tanggal)->first();

        if ($data) {
            $data->update([
                'indexrw' => $request->besaran,
            ]);
        } else {
            IdxReward::create([
                'tgl' => $request->tanggal,
                'indexrw' => $request->besaran,
            ]);
        }

        return redirect()->route('indeks.index')->with('success', 'Data berhasil disimpan!');
    }
        public function indexPeraturan()
    {
    // Filter berdasarkan skepentingan
    $data1 = TPeraturan::where('skepentingan', 'Penawaran Pensiun')->get();
    $data2 = TPeraturan::where('skepentingan', 'SKNormalMengingat1')->get();
    $data3 = TPeraturan::where('skepentingan', 'SKNormalMengingat2')->get();

    return view('ADMIN.peraturan', compact('data1', 'data2', 'data3'));
    }
        public function storePeraturan(Request $request)
    {
        // Update jika sudah ada skepentingan, kalau belum, buat baru
        $item = TPeraturan::updateOrCreate(
            ['skepentingan' => $request->skepentingan],
            [
                'namaperaturan' => $request->namaperaturan,
                'sesuai' => $request->sesuai
            ]
        );

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
        public function indexFaktor()
    {
    
        // Filter data sesuai status kerja
        $pegawaiKawin = TFaktorNilai::where('statuskerja', 'pegawai')->get();
        $pegawaiLajang = TFaktorNilai::where('statuskerja', 'pegawai')->get();
        $guruKawin = TFaktorNilai::where('statuskerja', 'guru')->get();
        $guruLajang = TFaktorNilai::where('statuskerja', 'guru')->get();

        return view('ADMIN.faktornilai', compact('pegawaiKawin', 'pegawaiLajang', 'guruKawin', 'guruLajang'));
    
}
public function updateFaktor(Request $request)
{
 $request->validate([
            'id' => 'required|integer',
            'kolom' => 'required|string',
            'nilai' => 'required|numeric'
        ]);

        TFaktorNilai::where('id', $request->id)->update([
            $request->kolom => $request->nilai
        ]);

        return redirect()->back()->with('success', 'Nilai berhasil diperbarui!');
    }
}
