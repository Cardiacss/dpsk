@extends('ADMIN.layouts.main')

@section('title', 'Pencatatan Pensiun')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">

        <a href="/home" style="text-decoration:none; color:#555;">
            Home
        </a> /

        <a href="/pengajuanpensiun" style="text-decoration:none; color:#2994A4;">
            Pengajuan Pensiun
        </a>
    </p>
@endsection

@section('artikel')


    <!-- Filter -->
    <form method="GET" action="{{ url('/pengajuanpensiun') }}" class="row mb-4">

        <!-- Nomor Peserta -->
        <div class="col-md-4 mb-3">
            <label class="form-label">Nomor Peserta</label>
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Masukan nomor peserta..."
                class="form-control">
        </div>

        <!-- Mitra -->
        <div class="col-md-4 mb-3">
            <label class="form-label">Mitra</label>
            <select name="idmitra" class="form-control">
                <option value="">Semua Mitra</option>
                @foreach ($mitraList as $m)
                    <option value="{{ $m->idmitra }}" {{ $idmitra == $m->idmitra ? 'selected' : '' }}>
                        {{ $m->nama_um }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Tombol (Bootstrap 4) -->
        <div class="col-md-4 d-flex align-items-end mb-3">
            <button type="submit" class="btn text-white mr-3" style="background-color:#2994A4;">
                Cari
            </button>

            <a href="{{ url('/pengajuanpensiun') }}" class="btn text-white" style="background-color:#6c757d;">
                Clear
            </a>
        </div>

    </form>

<!-- Tabel Peserta -->
<div class="table-responsive bg-white shadow rounded-lg">
    <table class="table table-bordered mb-0">
        <thead style="background-color:#2994A4; color:white;">
            <tr class="text-center">
                <th>No</th>
                <th>No Peserta</th>
                <th>Nama Peserta</th>
                <th>Unit Sekolah</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($peserta as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $p->nopeserta }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->mitra->nama_um ?? '-' }}</td>
                    <td class="text-center">
                        <a href="{{ url('formpengajuanpensiunadmin/' . $p->idanggota) }}" class="btn btn-sm text-white"
                            style="background-color:#2994A4;">
                            Pilih
                        </a>

                        @php
                            $pensiun = \App\Models\TAPensiun::where('idanggota', $p->idanggota)->first();
                        @endphp

                        @if($pensiun)
                            <a href="{{ route('admin.editpensiun.editByAnggota', $p->idanggota) }}" class="btn btn-sm btn-warning">
                                Edit
                            </a>
                        @else
                            <button class="btn btn-sm btn-secondary" disabled>
                                Data Pensiun Belum Ada
                            </button>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-3 text-muted">
                        Tidak ada peserta ditemukan
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


@endsection