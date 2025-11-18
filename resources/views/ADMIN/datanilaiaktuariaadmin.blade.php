@extends('ADMIN.layouts.main')

@section('title', 'Nilai Aktuaria')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">Home</a> /
        <a href="{{ route('nilaiaktuariaadmin') }}" style="text-decoration:none; color:#555;">Nilai Aktuaria</a> /
        <a href="/datanilaiaktuariaadmin" style="text-decoration:none; color:#2994A4;">
            Data Nilai Aktuaria
        </a>

    </p>
@endsection


@section('artikel')
    <!-- Tombol Tambah Nilai Aktuaria -->
    <div class="mb-3">
        <a href="{{ route('nilaiaktuaria.create', ['idunit' => $mitra->idunit]) }}" class="btn"
            style="background-color:#2994A4; color:white;">
            + Tambah Nilai Aktuaria
        </a>
    </div>
    <!-- Search -->
    <div class="mb-3">
        <form method="GET" action="{{ route('nilaiaktuariaadmin') }}" class="d-flex w-100">
            <input type="text" name="search" placeholder="Masukkan data peserta yang ingin dicari"
                value="{{ request('search') }}" class="form-control" style="margin-right:8px;">
            <button type="submit" class="btn" style="background-color:#2994A4; color:white; padding:0.5rem 1rem;"
                title="Filter">
                Filter
            </button>
        </form>
    </div>



    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Tahun</th>
                    <th>Nama Mitra</th>
                    <th>Ip</th>
                    <th>Ipk</th>
                    <th>Nilai Tambah</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($nilaiAktuarias as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->thnaktuaria }}</td>
                        <td>{{ $mitra->nama_um ?? 'Tidak Diketahui' }}</td>
                        <td>{{ $item->ip }}</td>
                        <td>{{ $item->ipk }}</td>
                        <td>{{ $item->nilaitambahan ?? '-' }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('nilaiaktuaria.edit', $item->idaktuaria) }}"
                                    class="btn btn-warning btn-sm mr-2" title="Edit">
                                    Edit
                                </a>
                                <form action="{{ route('nilaiaktuaria.destroy', $item->idaktuaria) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">Hapus</button>
                                </form>
                            </div>
                        </td>


                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-muted" style="height:100px;">Belum ada data tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
