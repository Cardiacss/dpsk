@extends('ADMIN.layouts.main')
@section('title', 'DAFTAR PESERTA AKTIF')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">
            Home
        </a> /
        <a href="/lihatpensiun" style="text-decoration:none; color:#2994A4;">Lihat Pensiun</a>
    </p>
@endsection


@section('artikel')

    <form action="{{ route('admin.kepensiunan') }}" method="GET" class="form-inline mb-3">
        <p style="color: #FF0000;">Cari peserta pensiunan berdasarkan nomor peserta atau nama mitra</p>
        <input type="text" name="q" class="form-control mr-2" style="width:1000px;"
            placeholder="Cari nama atau nomor peserta" value="{{ request('q') }}">

        <button type="submit" class="btn btn-primary" style="background-color:#2994A4">
            <i class="bi bi-search"></i> Cari Peserta
        </button>

        <a href="{{ route('admin.kepensiunan') }}" class="btn btn-secondary ml-2">
            <i class="bi bi-x-circle"></i> Reset
        </a>
    </form>

    {{-- Tabel Peserta Pensiun --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped"
            style="border-radius: 10px; overflow: hidden; border-collapse: separate; border-spacing: 0;">
            <thead style="background-color:#2994A4; color:white;" class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nomor Pensiun</th>
                    <th>Nama</th>
                    <th>Status Pensiun</th>
                    <th>Status Manfaat</th>
                    <th>Keterangan</th>
                    <th>Status Hidup</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse ($data as $index => $p)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $p->nopensiun }}</td>
                        <td>{{ $p->peserta->nama ?? '-' }}</td>
                        <td>{{ $p->statuspensiun ?? '-' }}</td>
                        <td>{{ $p->statusmanfaat ?? '-' }}</td>
                        <td>{{ $p->keterangan ?? '-' }}</td>
                        <td>{{ $p->statushidup ? 'Hidup' : 'Meninggal' }}</td>
                        <td class="text-center">
                            <!-- Tombol Detail -->
                            <a href="{{ route('admin.detailpesertaaktif', ['idanggota' => $p->idanggota]) }}"
                                class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> Detail
                            </a>

                            <!-- Tombol Ubah -->
                            <a href="{{ route('admin.pensiun.edit', ['idanggota' => $p->idanggota]) }}"
                                class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Ubah
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-3">
                            Tidak ada data peserta pensiun ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-3">
    {{ $data->links('pagination::bootstrap-5') }}
</div>
    </div>

@endsection
