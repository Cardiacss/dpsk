<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TKeluarga;

class TambahAnggotaPesertaController extends Controller
{
    public function store(Request $request, $idanggota)
    {
        $request->validate([
            'nm_keluarga' => 'required|string|max:100',
            'tempatlahir' => 'nullable|string|max:50',
            'tglahir' => 'nullable|date',
            'jeniskelamin' => 'required|string|max:10',
            'hubungan' => 'required|string|max:50',
            'pekerjaan' => 'nullable|string|max:50',
            'statuswiras' => 'nullable|string|max:20',
            'statushidup' => 'required|string|max:10',
            'keterangan_kel' => 'nullable|string',
            'notunjukwaris' => 'nullable|string|max:50',
            'nomohonwaris' => 'nullable|string|max:50',
        ]);

        TKeluarga::create([
            'idanggota'      => $idanggota,
            'nm_keluarga'    => $request->nm_keluarga,
            'tempatlahir'    => $request->tempatlahir,
            'tglahir'        => $request->tglahir,
            'jeniskelamin'   => $request->jeniskelamin,
            'hubungan'       => $request->hubungan,
            'pekerjaan'      => $request->pekerjaan,
            'statuswiras'    => $request->statuswiras,
            'statushidup'    => $request->statushidup === 'Hidup' ? 1 : 0,
            'keterangan_kel' => $request->keterangan_kel,
            'notunjukwaris'  => $request->notunjukwaris,
            'nomohonwaris'   => $request->nomohonwaris,
            'bolehwaris'     => 1, // default jika anggota ini boleh menjadi ahli waris
        ]);

        return redirect('/tanggunganpesertaadmin/'.$idanggota)
               ->with('success', 'Anggota keluarga berhasil ditambahkan!');
    }
}

