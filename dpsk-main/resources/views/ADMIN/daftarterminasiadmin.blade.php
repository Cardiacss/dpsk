@extends('ADMIN.layouts.main')

@section('title', 'Terminasi Pensiun')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="/kepensiunan" style="text-decoration:none; color:#555;">Kepensiunan</a> /
        <a href="#" style="text-decoration:none; color:#2994A4;">Terminasi Pensiun</a>
    </p>
@endsection

@section('artikel')
    <div class="container-fluid px-4">


        <!-- Tombol Tampilkan Semua -->
        <div class="mb-3 text-end">
            <a href="{{ route('pensiun.terminasi') }}" class="btn"
                style="background-color:#2994A4; color:white; border-radius:8px;">
                Tampilkan semua Daftar Terminasi Pensiun
            </a>
        </div>

        <!-- Filter dalam 1 baris -->
        <form method="GET" action="{{ route('pensiun.terminasi') }}" class="mb-4">
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <input type="text" name="nopeserta" value="{{ request('nopeserta') }}" class="form-control mb-2"
                        placeholder="Nomor Peserta">
                </div>
                <div class="col-auto">
                    <select name="idunit" class="form-control mb-2">
                        <option value="">Pilih Unit</option>
                        @foreach ($unitmitra as $u)
                            <option value="{{ $u->idunit }}" {{ request('idunit') == $u->idunit ? 'selected' : '' }}>
                                {{ $u->nama_um }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn mb-2" style="background-color:#2994A4; color:white;">Cari</button>
                </div>
                <div class="col-auto">
                    <a href="{{ route('pensiun.terminasi') }}" class="btn mb-2" style="background-color:#ccc; color:black;">
                        Clear
                    </a>
                </div>
            </div>
        </form>


        <!-- Tabel Responsive -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead style="background-color:#2994A4; color:white;">
                    <tr>
                        <th>No</th>
                        <th>No Pensiun</th>
                        <th>Nama Pensiunan</th>
                        <th>Pekerjaan</th>
                        <th>Unit Terakhir</th>
                        <th>Tanggal Pensiun</th>
                        <th>Tanggal Berakhir</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pensiun as $index => $p)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $p->nopensiun ?? '-' }}</td>
                            <td>{{ $p->peserta->nama ?? '-' }}</td>
                            <td>{{ $p->peserta->pkerjaanakhir ?? '-' }}</td>
                            <td>{{ $p->peserta->unit->nama_um ?? '-' }}</td>
                            <td>{{ $p->tmtpensiun ? $p->tmtpensiun->format('d-m-Y') : '-' }}</td>
                            <td>{{ $p->tglterminasi ? $p->tglterminasi->format('d-m-Y') : '-' }}</td>
                            <td>
                                <a href="{{ route('pensiun.terminasi.detail', $p->idpensiun) }}">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">Tidak ada data terminasi pensiun.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    <!-- Styling mirip halaman lain -->
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
            vertical-align: middle;
            font-size: 14px;
        }

        button {
            background-color: #2994A4;
            color: white;
            border: none;
            padding: 6px 12px;
            cursor: pointer;
        }

        button:hover {
            background-color: #257f8d;
        }

        .form-control {
            width: 100%;
            padding: 6px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
@endsection
