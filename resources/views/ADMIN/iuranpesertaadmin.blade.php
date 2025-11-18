@extends('ADMIN.layouts.main')

@section('title', 'Iuran Peserta')
<div class="mb-3 text-muted">
    Kepesertaan > <span class="text-primary fw-semibold">Iuran Peserta</span>
</div>

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">

        <a href="/home" style="text-decoration:none; color:#555;">
            Home
        </a> /

        <a href="/iuranpesertaadmin" style="text-decoration:none; color:#2994A4;">
            Iuran Peserta
        </a> 
    </p>
@endsection

@section('artikel')


    <!-- Tombol Riwayat -->
    <a href="{{ route('admin.riwayatiuran') }}" class="btn btn-success mb-3">
        Riwayat Iuran & Tunggakan
    </a>

    <!-- Input Pencarian + Tombol Cari -->
    <div class="mb-3 d-flex align-items-center">
        <input type="text" class="form-control mr-2" placeholder="Silahkan Masukan Kode/Nama Peserta">

        <button class="btn" style="background-color:#2994A4; color:white; min-width:100px;">
            Cari
        </button>
    </div>


    <!-- Tabel tanpa garis hitam -->
    <div class="table-responsive shadow rounded bg-white">
        <table class="table table-borderless table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">No</th>
                    <th>Mitra</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mitras as $m)
                    <tr>
                        <td class="text-center">{{ $m->idunit }}</td>
                        <td>{{ $m->nama_um }}</td>
                        <td class="text-center">
                            <a href="{{ url('/bukamitraadmin/' . $m->idunit) }}" class="btn btn-success btn-sm">
                                📂 Buka
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted py-4">
                            Tidak ada data mitra.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
