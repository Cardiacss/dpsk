@extends('ADMIN.layouts.main')

@section('artikel')
    <h2 class="text-white text-center mb-3 p-2" style="background-color:#2994A4;">
        Daftar Mitra untuk Unit: {{ $unit->nama_um }} ({{ $unit->idunit }})
    </h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="bg-primary text-white">
                <tr>
                    <th>ID Mitra</th>
                    <th>Nama Mitra</th>
                    <th>Alamat</th>
                    <th>Kecamatan</th>
                    <th>Kota/Kab</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mitras as $m)
                    <tr>
                        <td>{{ $m->idmitra }}</td>
                        <td>{{ $m->nama_um }}</td>
                        <td>{{ $m->alamat_um }}</td>
                        <td>{{ $m->kecamatan }}</td>
                        <td>{{ $m->kotakab }}</td>
                        <td>
                            <a href="{{ route('mitra.edit', $m->idmitra) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('mitra.destroy', $m->idmitra) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-muted">Tidak ada mitra pada unit ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
