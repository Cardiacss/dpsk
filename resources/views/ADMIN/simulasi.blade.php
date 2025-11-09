@extends('ADMIN.layouts.main')
@section('title', 'Simulasi Kepersertaan dan Pemberian Manfaat')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="/kepersertaan" style="text-decoration:none; color:#555;">Kepersertaan</a> /
        <a href="{{ route('admin.simulasi') }}" style="text-decoration:none; color:#2994A4;">Simulasi</a>
    </p>
@endsection

@section('artikel')
    {{-- 🔍 Form Pencarian --}}
<form action="{{ route('admin.simulasi') }}" method="GET" class="form-inline mb-3">
    <input type="text" name="search" value="{{ request('search') }}"
        class="form-control" style="width:1270px; margin-right:10px;"
        placeholder="Cari nama atau nomor peserta">

    <button type="submit" class="btn btn-primary"
        style="background-color:#2994A4; margin-top:5px;">
        <i class="bi bi-search"></i> Cari
    </button>
</form>


    {{-- 📋 Tabel Peserta --}}
    <div class="table-responsive mt-4">
        <table class="table table-bordered table-striped"
            style="border-radius: 10px; overflow: hidden; border-collapse: separate; border-spacing: 0;">
            <thead style="background-color:#2994A4; color:white;">
                <tr class="text-center">
                    <th>No Peserta</th>
                    <th>Nama</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($peserta as $p)
                    <tr class="text-center">
                        <td>{{ $p->nopeserta }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>
<a href="{{ route('admin.simulasipesertaaktif', $p->idanggota) }}" class="btn btn-info btn-sm">
    <i class="bi bi-eye"></i> Pilih
</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">Tidak ada data peserta</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection