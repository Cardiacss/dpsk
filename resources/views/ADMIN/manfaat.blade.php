@extends('ADMIN.layouts.main')

@section('title', 'Daftar Pensiun')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="/home" style="text-decoration:none; color:#555;">
            Home
        </a> /

        <a href="/manfaat" style="text-decoration:none; color:#2994A4;">
            Manfaat
        </a> 
    </p>
@endsection

@section('artikel')


    <!-- Form Filter -->
    <form action="{{ route('manfaat.index') }}" method="GET" class="row g-2 mb-4 align-items-end">
        <div class="col-md-4">
            <label class="form-label">Nama Peserta</label>
            <input type="text" name="nopeserta" value="{{ request('nopeserta') }}" class="form-control" />
        </div>
        <div class="col-md-4">
            <label class="form-label">Mitra</label>
            <select name="mitra" class="form-control"> <!-- pake form-control biar sama dengan input -->
                <option value="">Pilih Mitra</option>
                @foreach ($mitras as $m)
                    <option value="{{ $m->nama_um }}" {{ request('mitra') == $m->nama_um ? 'selected' : '' }}>
                        {{ $m->nama_um }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4 d-flex">
            <button type="submit" class="btn mr-2" style="background-color: #2994A4; color: white;">
                Cari
            </button>
            <a href="{{ route('manfaat.index') }}" class="btn btn-secondary">
                Clear
            </a>
        </div>




    </form>

    <!-- Card untuk tabel -->
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-0"
                    style="border-radius: 0; border-collapse: separate; border-spacing: 0;">
                    <thead style="background-color:#2994A4; color:white;">
                        <tr>
                            <th class="text-center">No</th>
                            <th>No Pensiun</th>
                            <th>Nama</th>
                            <th>Mitra</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($manfaat as $index => $item)
                            <tr class="text-center">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nopensiun }}</td>
                                <td>{{ $item->peserta->nama ?? '-' }}</td>
                                <td>{{ $item->peserta->mitra->nama_um ?? '-' }}</td>
                                <td>
                                    <a href="/cekmanfaat/{{ $item->idpensiun }}" class="btn btn-sm"
                                        style="background-color: #2994A4; color: white;">
                                        Cek
                                    </a>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Tidak ada data manfaat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
