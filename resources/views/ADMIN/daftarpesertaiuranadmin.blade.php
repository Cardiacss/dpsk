@extends('ADMIN.layouts.main')

@section('title', 'Daftar Peserta Iuran Admin')


@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">

        <a href="/home" style="text-decoration:none; color:#555;">
            Home
        </a> /

        <a href="/iuranpesertaadmin" style="text-decoration:none; color:#555;">
            Iuran Peserta
        </a> /

        <a href="/bukamitraadmin/{{ $mitra->idunit }}" style="text-decoration:none; color:#555;">
            Daftar Mitra
        </a> /

        <a href="/daftarpesertaiuranadmin/{{ $mitra->idmitra }}" style="text-decoration:none; color:#2994A4;">
            Daftar Peserta Iuran
        </a>

    </p>
@endsection

@section('artikel')

    <h2 class="mb-4">
        Daftar Peserta Mitra: {{ $mitra->nama_um }}
    </h2>

    <!-- Form Pencarian -->
    <input type="text" placeholder="Silahkan Cari Nama/Kode" class="form-control mb-3"
        style="width: 100%; max-width: 100%;">

    <table class="table table-bordered table-hover w-100">
        <thead style="background-color: #2994A4; color: #fff;">
            <tr class="text-center">
                <th>No</th>
                <th>No Peserta</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peserta as $index => $p)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $p->nopeserta }}</td>
                    <td>{{ $p->nama }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.catatiuran', ['idanggota' => $p->idanggota, 'idunit' => $p->idunit]) }}"
                            class="btn btn-sm"
                            style="min-width: 70px; background-color: #2994A4; color: #fff; border-color: #2994A4;">
                            Catat
                        </a>

                        <a href="{{ route('admin.editiuranpeserta', ['idanggota' => $p->idanggota]) }}"
                            class="btn btn-warning btn-sm" style="min-width: 70px;">
                            Edit
                        </a>
                        <form action="{{ route('peserta.destroy', $p->idanggota) }}" method="POST"
                            style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" style="min-width: 70px;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
