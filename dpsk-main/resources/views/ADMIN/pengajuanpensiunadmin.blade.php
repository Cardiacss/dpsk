@extends('ADMIN.layouts.main')

@section('title', 'Pengajuan Pensiun')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        Kepesertaan › <span class="text-teal-700 font-semibold">Pengajuan Pensiun</span>
    </p>
@endsection

@section('artikel')

    {{-- Alert Sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- Form Filter --}}
    <form method="GET" action="{{ url('/pengajuanpensiun') }}" class="form-inline mb-3">

        {{-- Nomor Peserta --}}
        <label class="mr-2">Nomor Peserta</label>
        <input type="text" name="search" value="{{ $search ?? '' }}" class="form-control mr-2"
            placeholder="Masukan nomor peserta">

        {{-- Mitra --}}
        <label class="mr-2">Mitra</label>
        <select name="idmitra" class="form-control mr-2">
            <option value="">Semua Mitra</option>
            @foreach ($mitraList as $m)
                <option value="{{ $m->idmitra }}" {{ $idmitra == $m->idmitra ? 'selected' : '' }}>
                    {{ $m->nama_um }}
                </option>
            @endforeach
        </select>

        {{-- Tombol Aksi --}}
        <button type="submit" class="btn btn-primary" style="background-color:#2994A4;">
            <i class="bi bi-search"></i> Cari
        </button>
        <a href="{{ url('/pengajuanpensiun') }}" class="btn btn-secondary ml-2">Reset</a>
    </form>

    {{-- Tabel Data Peserta --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped"
            style="border-radius: 10px; overflow: hidden; border-collapse: separate; border-spacing: 0;">
            <thead style="background-color:#2994A4; color:white;">
                <tr class="text-center">
                    <th>No</th>
                    <th>Nomor Peserta</th>
                    <th>Nama Peserta</th>
                    <th>Mitra</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($peserta as $index => $p)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nopeserta }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->mitra->nama_um ?? '-' }}</td>
                        <td>
                            <a href="{{ url('formpengajuanpensiunadmin/' . $p->idanggota) }}"
                                class="btn btn-success btn-sm">
                                <i class="bi bi-check-circle"></i> Pilih
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Tidak ada peserta ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
