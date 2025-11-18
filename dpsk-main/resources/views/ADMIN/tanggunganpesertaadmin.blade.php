@extends('ADMIN.layouts.main')

@section('title', 'Tanggungan Peserta')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="/daftarpesertaadmin" style="text-decoration:none; color:#555;">Peserta</a> /
        <span style="color:#2994A4;">Tanggungan</span>
    </p>
@endsection

@section('artikel')
    <div class="container-fluid px-4"><!-- ❗Semua konten dibungkus di sini -->

        {{-- Tabs --}}
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
                    <a href="{{ route('ahliwarispesertaadmin', ['idanggota' => $peserta->idanggota]) }}"
                        class="nav-link {{ request()->routeIs('ahliwarispesertaadmin') ? 'active' : '' }}">
                        Ahli Waris
                    </a>
                </li>
            </ul>
        </div>

        {{-- Informasi Peserta --}}
        <form class="row g-3 mb-4">
            {{-- Baris 1 - 3 kolom --}}
            <div class="col-md-4">
                <label class="form-label">Nomor Peserta</label>
                <input type="text" class="form-control" value="{{ $peserta->nopeserta ?? '' }}" disabled>
            </div>
            <div class="col-md-4">
                <label class="form-label">Nama Peserta</label>
                <input type="text" class="form-control" value="{{ $peserta->nama ?? '' }}" disabled>
            </div>
            <div class="col-md-4">
                <label class="form-label">Status Nikah</label>
                <input type="text" class="form-control" value="{{ $peserta->statusnikah ?? '' }}" disabled>
            </div>

            {{-- Baris 2 - 2 kolom --}}
            <div class="col-md-6">
                <label class="form-label">Mitra / Pemberi Kerja</label>
                <input type="text" class="form-control" value="{{ $peserta->mitra->nama_um ?? '-' }}" disabled>
            </div>
            <div class="col-md-6">
                <label class="form-label">Unit Kerja</label>
                <input type="text" class="form-control" value="{{ $peserta->unit->nama_um ?? '-' }}" disabled>
            </div>
        </form>

        {{-- Tombol Tambah --}}
        <div class="text-end mb-3">
            <a href="{{ route('keluarga.create', $peserta->idanggota) }}" class="btn"
                style="background-color:#2994A4; color:white;">
                + Tambah Anggota Keluarga
            </a>
        </div>

        {{-- Tabel Keluarga --}}
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center w-100">
                <thead style="background-color:#2994A4; color:white;">
                    <tr>
                        <th>Nama Anggota Keluarga</th>
                        <th>Tempat / Tgl Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Hubungan</th>
                        <th>Status Hidup</th>
                        <th>Waris</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($keluarga as $k)
                        <tr>
                            <td>{{ $k->nm_keluarga }}</td>
                            <td>{{ $k->tempatlahir }} /
                                {{ $k->tgllahir ? \Carbon\Carbon::parse($k->tgllahir)->format('Y-m-d') : '-' }}
                            </td>
                            <td>{{ $k->jeniskelamin }}</td>
                            <td>{{ $k->hubungan }}</td>
                            <td>{{ $k->statushidup ? 'Hidup' : 'Meninggal' }}</td>
                            <td>{{ $k->bolehwaris ? 'Ya' : 'Tidak' }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="/editanggotaahliwarispesertaadmin/{{ $k->idkeluarga }}" class="btn btn-sm"
                                        style="background-color:#2994A4; color:white;">
                                        Ubah
                                    </a>
                                    <form action="{{ route('keluarga.destroy', ['idkeluarga' => $k->idkeluarga]) }}"
                                        method="POST" onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-muted">Belum ada data keluarga</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Tombol Cetak --}}
        <div class="text-center mt-4 mb-4">
            <a href="{{ route('cetakKeluarga', ['idanggota' => $peserta->idanggota]) }}" class="btn px-4"
                style="background-color:#2994A4; color:white;">
                Cetak Keluarga
            </a>
        </div>

    </div><!-- Tutup container-fluid utama -->

    {{-- Styling --}}
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
    </style>
@endsection
