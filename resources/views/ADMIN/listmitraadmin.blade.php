@extends('ADMIN.layouts.main')

@section('title', 'List Mitra Admin')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">Home</a> /
        <a href="/mitradansekolahadmin" style="text-decoration:none; color:#555;">Mitra dan Sekolah</a> /
        <a href="{{ url('/listmitraadmin/' . $unit->idunit) }}" style="text-decoration:none; color:#2994A4;"> List Mitra</a>
    </p>
@endsection

@section('artikel')

    <h2 class="mb-4" style="color:#2994A4; font-weight:bold; font-size:1.5rem;">
        Daftar Mitra untuk Unit: {{ $unit->nama_um }} ({{ $unit->idunit }})
    </h2>

    <div class="table-responsive bg-white rounded p-2">
        <table class="table table-bordered mb-0">
            <thead style="background-color:#2994A4; color:white;">
                <tr>
                    <th>ID Mitra</th>
                    <th>Nama Mitra</th>
                    <th>Alamat</th>
                    <th>Kecamatan</th>
                    <th>Kota/Kab</th>
                    <th class="text-center">Aksi</th>
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

                        <td class="text-center">
                            <div class="d-flex justify-content-center" style="gap: 0.5rem;">
                                <!-- Ubah -->
                                <a href="{{ route('mitra.edit', $m->idmitra) }}"
                                    class="btn btn-warning btn-sm d-flex align-items-center">
                                    Ubah
                                </a>

                                <!-- Hapus -->
                                <form action="{{ route('mitra.destroy', $m->idmitra) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?');" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted fst-italic">
                            Tidak ada mitra pada unit ini.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

@endsection
