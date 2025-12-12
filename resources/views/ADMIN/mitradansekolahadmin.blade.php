@extends('ADMIN.layouts.main')

@section('title', 'Mitra & Sekolah')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">
            Home
        </a> /
        <a href="/mitradansekolahadmin" style="text-decoration:none; color:#2994A4;">
            Mitra dan Sekolah
        </a>
    </p>
@endsection

@section('artikel')

    {{-- Tombol Tambah --}}
    <div class="mb-4 d-flex" style="gap: 12px; padding: 0 10px;">
        <a href="/inputmitraadmin" class="btn btn-success d-flex align-items-center px-3">+ Input Mitra</a>
        <a href="/inputsekolahadmin" class="btn btn-success d-flex align-items-center px-3">+ Input Sekolah</a>
    </div>

    {{-- Search --}}
    <form method="GET" action="/mitradansekolahadmin" class="form-inline mb-4">
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Masukkan data mitra yang ingin dicari"
               class="form-control mr-2" style="width: 1055px;">

        <button type="submit" class="btn btn-primary mr-2"
                style="height: 38px; min-width: 90px; background-color:#2994A4; border:none;">
            Cari
        </button>
    </form>

    {{-- Tabel --}}
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center align-middle">
            <thead class="table-light">
                <tr>
                    <th>Kode</th>
                    <th>Mitra Pemberi Kerja</th>
                    <th>Alamat</th>
                    <th>Kelurahan</th>
                    <th>Kecamatan</th>
                    <th>Kota/Kabupaten</th>
                    <th>Provinsi</th>
                    <th>Status</th>
                    <th>Iuran Peserta</th>
                    <th>Iuran Pemberi Kerja</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($mitras as $m)
                    <tr>
                        <td>{{ $m->idunit }}</td>
                        <td>{{ $m->nama_um }}</td>
                        <td>{{ $m->alamat_um }}</td>
                        <td>{{ $m->kelurahan }}</td>
                        <td>{{ $m->kecamatan }}</td>
                        <td>{{ $m->kotakab }}</td>
                        <td>{{ $m->provinsi }}</td>
                        <td>{{ $m->stat_um }}</td>
                        <td>{{ isset($m->ip_pct) ? $m->ip_pct * 100 . '%' : 'Belum Ada Data' }}</td>
                        <td>{{ isset($m->ipk_pct) ? $m->ipk_pct * 100 . '%' : 'Belum Ada Data' }}</td>
                        <td class="text-center" style="width: 180px;">
    <div class="d-flex justify-content-center" style="gap: 6px;">

        {{-- Tombol Lihat --}}
        <a href="{{ url('/listmitraadmin/' . $m->idunit) }}"
           class="btn btn-sm"
           style="background-color: #2994A4; color: white;">
            <i class="bi bi-eye"></i>
        </a>

        {{-- Tombol Aktif / Nonaktif --}}
        <form action="{{ route('unit.toggle', $m->idunit) }}" method="POST">
            @csrf
            @method('PUT')

            <button type="submit" class="btn btn-sm"
                style="background-color: {{ $m->stat_um == 'AKTIF' ? '#dc3545' : '#198754' }};
                       color: white;">
                {{ $m->stat_um == 'AKTIF' ? 'Nonaktifkan' : 'Aktifkan' }}
            </button>
        </form>

        {{-- Tombol Edit --}}
        <a href="{{ route('unit.edit', ['idunit' => $m->idunit]) }}"
           class="btn btn-sm"
           style="background-color: #ffc107; color: white;">
            <i class="bi bi-pencil"></i>
        </a>

    </div>
</td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="text-muted text-center py-3">
                            Belum ada data tersedia
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $mitras->links('pagination::bootstrap-5') }}
        </div>
    </div>

@endsection
