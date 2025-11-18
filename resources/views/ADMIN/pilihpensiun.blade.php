@extends('ADMIN.layouts.main')

@section('title', 'Riwayat Manfaat Pensiun - ' . ($mitra->nama_um ?? 'Mitra Tidak Diketahui'))

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">
            Home
        </a> /
        <a href="/riwayatmanfaat" style="text-decoration:none; color:#555;">Riwayat Manfaat</a> /
        <a href="{{ route('admin.pilihpensiun', ['idmitra' => $mitra->idmitra]) }}"
            style="text-decoration:none; color:#2994A4;">
            Peserta Pensiun - {{ $mitra->nama_um ?? '-' }}
        </a>
    </p>
@endsection


@section('artikel')
    <div class="card">
        <div class="card-body">

            {{-- Tabs --}}
            <div class="riwayatpensiunmitra-tabs mb-4">
                <ul class="nav nav-pills justify-content-center" id="mitrapensiunTab">
                    <li class="nav-item">
                        <a href="/lihatpensiun" class="nav-link">Daftar Pensiun</a>
                    </li>
                    <li class="nav-item">
                        <a href="/manfaat" class="nav-link">Pemberian Manfaat</a>
                    </li>
                </ul>
            </div>

            {{-- Form Pencarian --}}
            <form action="{{ route('admin.pilihpensiun', ['idmitra' => $mitra->idmitra]) }}" method="GET"
                class="form-inline mb-3">
                <input type="text" name="search" class="form-control mr-2" style="width:300px;"
                    placeholder="Cari nama peserta atau nomor pensiun" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary" style="background-color:#2994A4">
                    <i class="bi bi-search"></i> Cari
                </button>
            </form>

            {{-- Tabel Data Pensiun --}}
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center"
                    style="border-radius: 10px; overflow: hidden; border-collapse: separate; border-spacing: 0;">
                    <thead style="background-color:#2994A4; color:white;">
                        <tr>
                            <th>No</th>
                            <th>Nomor Pensiun</th>
                            <th>Nama Peserta</th>
                            <th>Status Pensiun</th>
                            <th>Tanggal Pensiun</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pensiun as $index => $p)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $p->nopensiun }}</td>
                                <td>{{ $p->peserta->nama ?? '-' }}</td>
                                <td>{{ $p->statuspensiun ?? '-' }}</td>
                                <td>{{ $p->tmtpensiun ? $p->tmtpensiun->format('d-m-Y') : '-' }}</td>
                                <td>
                                    <a href="{{ route('detailpesertapensiun', ['idanggota' => $p->peserta->idanggota]) }}"
                                        class="btn btn-sm btn-info">Cek</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-3">Tidak ada peserta pensiun untuk mitra
                                    ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <style>
        .riwayatpensiunmitra-tabs .nav-link {
            border-radius: 50px;
            padding: 10px 20px;
            margin: 0 5px;
            color: #2994A4;
            border: 1px solid #2994A4;
            transition: 0.3s;
        }

        .riwayatpensiunmitra-tabs .nav-link.active {
            background-color: #2994A4;
            color: white !important;
        }

        .riwayatpensiunmitra-tabs .nav-link:hover {
            background-color: #e6f4f5;
        }
    </style>
@endsection
