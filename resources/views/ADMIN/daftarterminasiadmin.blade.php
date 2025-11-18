@extends('ADMIN.layouts.main')

@section('title', 'Terminasi Pensiun')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">
            Home
        </a> /
        <a href="/terminasipensiun" style="text-decoration:none; color:#2994A4;">Terminasi Pensiun</a> 

    </p>
@endsection

@section('artikel')

    <!-- Tombol tampilkan semua -->
    <button class="btn" style="background-color: #2994A4; color: white; margin-bottom: 16px;">
        Tampilkan semua Daftar Terminasi Pensiun
    </button>

    <!-- Filter -->
    <form method="GET" action="{{ route('pensiun.terminasi') }}" class="mb-4">
        <div class="row g-2 align-items-end">
            <div class="col-md-4">
                <label>Nomor Peserta</label>
                <input type="text" name="nopeserta" value="{{ request('nopeserta') }}" class="form-control w-100"
                    placeholder="Cari Nomor Peserta">
            </div>
            <div class="col-md-4">
                <label>Unit</label>
                <select name="idunit" class="form-control w-100">
                    <option value="">Pilih Unit</option>
                    @foreach ($unitmitra as $u)
                        <option value="{{ $u->idunit }}" {{ request('idunit') == $u->idunit ? 'selected' : '' }}>
                            {{ $u->nama_um }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 d-flex justify-content-start" style="gap: 8px;">
                <button type="submit" class="btn" style="background-color: #2994A4; color: white;">
                    Cari
                </button>
                <a href="{{ route('pensiun.terminasi') }}" class="btn btn-secondary">
                    Clear
                </a>
            </div>


        </div>
    </form>


    <!-- Tabel -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped mb-0">
            <thead style="background-color: #2994A4; color: white;">
                <tr>
                    <th class="text-center">No</th>
                    <th>No Pensiun</th>
                    <th>Nama Pensiunan</th>
                    <th>Pekerjaan</th>
                    <th>Unit Terakhir</th>
                    <th>Tanggal Pensiun</th>
                    <th>Tanggal Berakhir</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pensiun as $index => $p)
                    <tr class="text-center">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $p->nopensiun ?? '-' }}</td>
                        <td>{{ $p->peserta->nama ?? '-' }}</td>
                        <td>{{ $p->peserta->pkerjaanakhir ?? '-' }}</td>
                        <td>{{ $p->peserta->unit->nama_um ?? '-' }}</td>
                        <td>{{ $p->tmtpensiun ? $p->tmtpensiun->format('d-m-Y') : '-' }}</td>
                        <td>{{ $p->tglterminasi ? $p->tglterminasi->format('d-m-Y') : '-' }}</td>
                        <td>
                            <a href="{{ route('pensiun.terminasi.detail', $p->idpensiun) }}" class="btn"
                                style="background-color: #2994A4; color: white;">
                                Detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">Tidak ada data terminasi pensiun.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
