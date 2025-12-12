@extends('ADMIN.layouts.main')

@section('title', 'Riwayat Manfaat')

@section('breadcrumb')
    <p class="text-muted" style="font-size:14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">
            Home
        </a> /
        <a href="/riwayatmanfaat" style="text-decoration:none; color:#2994A4;">
            Riwayat Manfaat
        </a> 

    </p>
@endsection

@section('artikel')
    {{-- Form Pencarian --}}
    <form action="{{ route('admin.riwayatmanfaat') }}" method="GET" class="form-inline mb-3">
        <p style="color: #FF0000;">Cari peserta pensiunan berdasarkan nomor peserta atau nama mitra</p>
        <input type="text" name="search" class="form-control mr-2" style="width:1270px;"
               placeholder="Cari nama atau nomor mitra" value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary" style="background-color:#2994A4">
            <i class="bi bi-search"></i> Cari Mitra
        </button>
    </form>

    {{-- Tabel Riwayat Manfaat --}}
    <div class="table-responsive mt-4">
        <table class="table table-bordered table-striped"
               style="border-radius: 10px; overflow: hidden; border-collapse: separate; border-spacing: 0;">
            <thead style="background-color:#2994A4; color:white;">
                <tr class="text-center">
                    <th>No</th>
                    <th>Nomor Mitra</th>
                    <th>Nama Pemberi Kerja</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mitra as $index => $m)
                    <tr class="text-center">
                        <td>{{ $mitra->firstItem() + $index }}</td>
                        <td>{{ $m->idmitra }}</td>
                        <td>{{ $m->nama_um }}</td>
                        <td>
                            <a href="/pilihpensiun/{{ $m->idmitra }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> Pilih
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-3">Tidak ada data mitra ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-3">
    {{ $mitra->links('pagination::bootstrap-5') }}
</div>
    </div>
@endsection