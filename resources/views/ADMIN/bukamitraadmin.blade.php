@extends('ADMIN.layouts.main')

@section('title', 'Daftar Peserta')

@section('artikel')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">

        <a href="/home" style="text-decoration:none; color:#555;">
            Home
        </a> /

        <a href="/iuranpesertaadmin" style="text-decoration:none; color:#555;">
            Iuran Peserta
        </a> /

        <a href="/bukamitraadmin/{{ $unit->idunit }}" style="text-decoration:none; color:#2994A4;">
            Daftar Unit
        </a>
    </p>
@endsection

<!-- Tombol Riwayat Iuran & Tunggakan -->
<a href="{{ route('admin.riwayatiuran') }}" class="btn btn-success mb-3">
    <i class="bi bi-plus-lg"></i> Riwayat Iuran & Tunggakan
</a>

<!-- Search -->
<div class="mb-3">
    <input type="text" class="form-control" placeholder="Silahkan Cari Unit Anda">
</div>

<!-- Table -->
<div class="table-responsive">
    <table class="table table-bordered table-hover text-center mb-0">
        <thead class="table-primary">
            <tr>
                <th>Unit</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mitras as $mitra)
                <tr>
                    <td>{{ $mitra->nama_um }}</td>
                    <td>
                        <a href="/daftarpesertaiuranadmin/{{ $mitra->idmitra }}" class="btn btn-sm"
                            style="background-color: #2994A4; color: white;">
                            Lihat Peserta
                        </a>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="2" class="text-muted">Tidak ada mitra ditemukan untuk unit ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Tombol Kembali -->
<div class="mt-4">
    <a href="/menuadmin" class="btn btn-secondary">
        Kembali
    </a>
</div>
@endsection
