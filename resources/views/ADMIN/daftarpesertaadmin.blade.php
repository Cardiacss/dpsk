@extends('ADMIN.layouts.main')

@section('title', 'Daftar Peserta')


@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">Home</a> /
        <a href="{{ route('admin.daftarpeserta') }}" style="text-decoration:none; color:#2994A4;">Daftar Peserta</a>
    </p>
@endsection

@section('artikel')
    {{-- Alert sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- Tombol tambah peserta --}}
    <div class="mb-3">
        <a href="/pendaftaranpesertaadmin" class="btn btn-success rounded">
            <i class="bi bi-plus-circle"></i> Tambah Peserta
        </a>
    </div>

    {{-- Form filter dan pencarian --}}
    <form action="{{ route('peserta.index') }}" method="GET" class="form-inline mb-3">
        <select name="filter" class="form-control mr-2">
            <option value="">Filter Berdasarkan</option>
            <option value="Nomor" {{ $filter == 'Nomor' ? 'selected' : '' }}>Nomor</option>
            <option value="Nama" {{ $filter == 'Nama' ? 'selected' : '' }}>Nama</option>
            <option value="Mitra" {{ $filter == 'Mitra' ? 'selected' : '' }}>Mitra</option>
        </select>
        <input type="text" name="search" value="{{ $search }}" class="form-control mr-2"
            placeholder="Masukkan data peserta" style="width: 1000px;">
        <button type="submit" class="btn btn-primary" style="background-color:#2994A4">
            <i class="bi bi-search"></i> Cari
        </button>
        <a href="{{ route('peserta.index') }}" class="btn btn-secondary ml-2">Reset</a>
    </form>

    {{-- Tabel Daftar Peserta --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped"
            style="border-radius: 10px; overflow: hidden; border-collapse: separate; border-spacing: 0;">
            <thead style="background-color:#2994A4; color:white;">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nomor Peserta</th>
                    <th class="text-center">Nama Peserta</th>
                    <th class="text-center">Unit Sekolah</th>
                    <th class="text-center">Mitra Pemberi Kerja</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($peserta as $p)
                    <tr class="text-center">
                        <td>{{ $loop->iteration + ($peserta->currentPage() - 1) * $peserta->perPage() }}</td>
                        <td>{{ $p->nopeserta }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->mitra->nama_um ?? '-' }}</td>
                        <td>{{ $p->unit->nama_um ?? '-' }}</td>
                        <td>
                            @if ($p->statuspeserta == 'Hidup')
                                <span class="badge bg-success"
                                    style="background-color: #28a745; color: white; font-weight: 600;">Aktif</span>
                            @else
                                <span class="badge bg-secondary"
                                    style="background-color: #28a745; color: white; font-weight: 600;">{{ $p->statuspeserta }}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('peserta.edit', ['idanggota' => $p->idanggota]) }}"
                                class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Ubah
                            </a>
                            <form action="{{ route('peserta.destroy', $p->idanggota) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                            <a href="{{ route('peserta.showDetail', ['idanggota' => $p->idanggota]) }}"
                                class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> Detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">Tidak ada data peserta.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
<div class="mt-3 d-flex justify-content-center">
    {{ $peserta->appends(request()->query())->links('pagination::bootstrap-4') }}
</div>

<style>
    .pagination svg {
        width: 16px !important;
        height: 16px !important;
    }

    .pagination .page-link {
        padding: 6px 12px !important;
        font-size: 14px !important;
    }

    .pagination .page-item.active .page-link {
        background-color: #2994A4 !important;
        border-color: #2994A4 !important;
        color: white !important;
    }
</style>

@endsection
