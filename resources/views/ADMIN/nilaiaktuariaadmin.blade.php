@extends('ADMIN.layouts.main')

@section('title', 'Nilai Aktuaria')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">Home</a> /
        <a href="/nilaiaktuariaadmin" style="text-decoration:none; color:#2994A4;">Nilai Aktuaria</a> 
    </p>
@endsection

@section('artikel')

    <!-- Search -->
    <div class="mb-3 w-100">
        <form method="GET" action="{{ route('nilaiaktuariaadmin') }}" class="d-flex gap-2 w-100">
            <input type="text" name="search" placeholder="Masukkan Nama Mitra" value="{{ request('search') }}"
                class="form-control flex-grow-1">
            <button type="submit" class="btn btn-light" title="Filter">
                Filter
            </button>
        </form>
    </div>

    <!-- Table -->
    <div class="table-responsive bg-white shadow rounded">
        <table class="table table-bordered mb-0 text-center">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No</th>
                    <th>Nama Mitra</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($mitras as $index => $m)
                    <tr class="align-middle">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $m->nama_um }}</td>
                        <td>
                            <a href="{{ route('datanilaiaktuariaadmin') }}?idunit={{ $m->idunit }}"
                                class="btn btn-success btn-sm">
                                📂 Buka
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-muted">Belum ada data tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
