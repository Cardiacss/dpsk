@extends('ADMIN.layouts.main')

@section('title', 'Ahli Waris Peserta')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">Home</a> /
        <a href="/daftarpesertaadmin" style="text-decoration:none; color:#555;">Daftar Peserta</a> /
        <a href="{{ url('/ahliwarispesertaadmin/' . $peserta->idanggota) }}" style="text-decoration:none; color:#2994A4;">
            Ahli Waris
        </a> 
    </p>
@endsection

@section('artikel')
    <div class="container-fluid px-4">

        {{-- Tabs Navigasi --}}
        <div class="detail-tabs mb-4">
            <ul class="nav nav-pills justify-content-center" id="detailTab">
                <li class="nav-item">
                    <a href="{{ url('/detailpesertaadmin/' . $peserta->idanggota) }}"
                        class="nav-link {{ request()->is('detailpesertaadmin/' . $peserta->idanggota) ? 'active' : '' }}">
                        Detail
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/tanggunganpesertaadmin/' . $peserta->idanggota) }}"
                        class="nav-link {{ request()->is('tanggunganpesertaadmin/' . $peserta->idanggota) ? 'active' : '' }}">
                        Tanggungan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/ahliwarispesertaadmin/' . $peserta->idanggota) }}"
                        class="nav-link {{ request()->is('ahliwarispesertaadmin/' . $peserta->idanggota) ? 'active' : '' }}">
                        Ahli Waris
                    </a>
                </li>
            </ul>
        </div>

        {{-- Informasi Peserta --}}
        <form class="row g-3 mb-4">
            <div class="col-md-4">
                <label class="form-label">Nomor Peserta</label>
                <input type="text" class="form-control" value="{{ $peserta->nopeserta }}" disabled>
            </div>
            <div class="col-md-4">
                <label class="form-label">Nama Peserta</label>
                <input type="text" class="form-control" value="{{ $peserta->nama }}" disabled>
            </div>
            <div class="col-md-4">
                <label class="form-label">Status Nikah</label>
                <input type="text" class="form-control" value="{{ $peserta->statusnikah ?? '-' }}" disabled>
            </div>

            <div class="col-md-4">
                <label class="form-label">Mitra / Pemberi Kerja</label>
                <input type="text" class="form-control" value="{{ $peserta->mitra->nama_um ?? '-' }}" disabled>
            </div>
            <div class="col-md-4">
                <label class="form-label">Unit Kerja</label>
                <input type="text" class="form-control" value="{{ $peserta->unit->nama_um ?? '-' }}" disabled>
            </div>
            <div class="col-md-4">
                <label class="form-label">Status Waris</label>
                <input type="text" class="form-control" value="Aktif" disabled>
            </div>
        </form>

        {{-- Judul Tabel --}}
        <h5 class="mt-4 mb-3 text-center" style="color:#2994A4;">Daftar Anggota Keluarga</h5>

        {{-- Tabel Keluarga --}}
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center w-100">
                <thead style="background-color:#2994A4; color:white;">
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Tempat / Tgl Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Hubungan</th>
                        <th>Status Hidup</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($keluarga as $kel)
                        <tr>
                            <td>{{ $kel->nm_keluarga }}</td>
                            <td>{{ $kel->tempatlahir }} /
                                {{ $kel->tgllahir ? \Carbon\Carbon::parse($kel->tgllahir)->format('d-m-Y') : '-' }}</td>
                            <td>{{ $kel->jeniskelamin }}</td>
                            <td>{{ $kel->hubungan }}</td>
                            <td>{{ $kel->statushidup ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-muted py-3">Tidak ada anggota keluarga untuk peserta ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Tombol Aksi --}}
        <div class="text-end mt-4 mb-4">
            <a href="/daftarpesertaadmin" class="btn btn-secondary px-4 me-2">
                Kembali
            </a>
        </div>

    </div>

    {{-- Styling Tabs dan Table --}}
    <style>
        .detail-tabs .nav-link {
            border-radius: 50px;
            padding: 10px 20px;
            margin: 0 5px;
            color: #2994A4;
            border: 1px solid #2994A4;
            transition: 0.3s;
        }

        .detail-tabs .nav-link.active {
            background-color: #2994A4;
            color: white !important;
        }

        .detail-tabs .nav-link:hover {
            background-color: #e6f4f5;
        }

        table th,
        table td {
            vertical-align: middle !important;
        }

        table {
            font-size: 14px;
        }

        .btn-secondary {
            background-color: #999;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #777;
        }
    </style>
@endsection
