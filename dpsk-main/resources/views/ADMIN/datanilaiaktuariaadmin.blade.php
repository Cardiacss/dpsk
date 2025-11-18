@extends('ADMIN.layouts.main')

@section('title', 'Data Nilai Aktuaria')

@section('breadcrumb')
    <p class="text-sm text-gray-500 mb-4">
        <a href="/mitra&sekolahadmin" class="text-gray-600 hover:text-[#2994A4]">Mitra</a> /
        <span class="text-[#2994A4] font-semibold">Nilai Aktuaria</span>
    </p>
@endsection

@section('artikel')
    <!-- Tombol Tambah Nilai Aktuaria -->
    <div class="mb-4">
        <a href="{{ route('nilaiaktuaria.create', ['idunit' => $mitra->idunit]) }}" class="btn text-white"
            style="background-color:#2994A4;">
            + Tambah Nilai Aktuaria
        </a>
    </div>

    <!-- Search -->
    <form method="GET" action="{{ route('nilaiaktuariaadmin') }}" class="d-flex align-items-center mb-4 w-100">
        <input type="text" name="search" placeholder="Masukkan data peserta yang ingin dicari"
            class="form-control border border-secondary mx-2 w-100" value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-secondary mx-2" title="Filter">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="1.5" class="text-[#2994A4]">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h18M6 9.75h12M9 15h6m-3 4.5v-4.5" />
            </svg>
        </button>
    </form>

    <!-- Table -->
    <div class="table-responsive shadow-sm">
        <table class="table table-bordered text-center align-middle">
            <thead style="background-color:#2994A4; color:white;">
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
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('nilaiaktuaria.edit', $item->idaktuaria) }}"
                                    class="btn btn-success btn-sm px-3">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('nilaiaktuaria.destroy', $item->idaktuaria) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm px-3">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-muted py-4">Belum ada data tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
