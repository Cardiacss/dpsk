@extends('ADMIN.layouts.main')

@section('title', 'Nilai Aktuaria')

@section('breadcrumb')
    <p class="text-sm text-gray-500 mb-4">
        <a href="/mitra&sekolahadmin" class="text-gray-600 hover:text-[#2994A4]">Mitra</a> /
        <span class="text-[#2994A4] font-semibold">Nilai Aktuaria</span>
    </p>
@endsection

@section('artikel')
    <div class="container mt-4 mb-5">
        <!-- Search -->
        <form method="GET" action="{{ route('nilaiaktuariaadmin') }}" class="d-flex align-items-center mb-4 w-100">
            <input type="text" name="search" placeholder="Masukkan Nama Mitra" value="{{ request('search') }}"
                class="form-control border border-secondary mx-2 w-100">
            <button type="submit" class="btn btn-outline-secondary mx-2" title="Filter">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1.5" class="text-[#2994A4]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h18M6 9.75h12M9 15h6m-3 4.5v-4.5" />
                </svg>
            </button>
        </form>


        <!-- Table -->
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-bordered text-center align-middle">
                <thead class="text-white" style="background-color:#2994A4;">
                    <tr>
                        <th>No</th>
                        <th>Nama Mitra</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mitras as $index => $m)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $m->nama_um }}</td>
                            <td>
                                <a href="{{ route('datanilaiaktuariaadmin') }}?idunit={{ $m->idunit }}"
                                    class="btn btn-success btn-sm px-3">
                                    📂 Buka
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-4 text-muted">Belum ada data tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection
