@extends('ADMIN.layouts.main')
@section('title', 'Peserta Pensiun ')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="/kepensiunan" style="text-decoration:none; color:#555;">Kepensiunan</a> /
        <a href="/riwayatmanfaat" style="text-decoration:none; color:#2994A4;">Riwayat Manfaat</a> /
        <a href="/pilihpensiun" style="text-decoration:none; color:#2994A4;">Peserta Pensiun - Mitra</a> /
        <a href="/detailpesertapensiun" style="text-decoration:none; color:#2994A4;">Peserta Pensiun - Nama</a>
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
                        <a href="/pemberianmanfaat" class="nav-link">Pemberian Manfaat</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/cetakmanfaat/' . request()->segment(2)) }}" class="nav-link">Cetak Manfaat</a>
                    </li>
                </ul>
            </div>

            {{-- Tabel Peserta Pensiun --}}
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center"
                    style="border-radius: 10px; overflow: hidden; border-collapse: separate; border-spacing: 0;">
                    <thead style="background-color:#2994A4; color:white;">
                        <tr>
                            <th>No</th>
                            <th>Nomor Peserta</th>
                            <th>Nama</th>
                            <th>Tanggal Beri Manfaat</th>
                            <th>Tahun Setor</th>
                            <th>Bulan Setor</th>
                            <th>Nilai Manfaat</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($manfaat as $index => $m)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $m->idanggota }}</td>
                                <td>{{ $m->peserta->nama ?? '-' }}</td>
                                <td>{{ $m->tglberimanfaat ? $m->tglberimanfaat->format('d M Y') : '-' }}</td>
                                <td>{{ $m->thn_setor }}</td>
                                <td>{{ $m->bln_setor }}</td>
                                <td>Rp {{ number_format($m->nilai_mp, 0, ',', '.') }}</td>
                                <td>{{ $m->keterangan }}</td>
                                <td>
                                    <form action="{{ route('hapusmanfaat', $m->idmanfaatpensiun) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">Tidak ada data manfaat pensiun.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

<div class="text-left mt-2">
    @if(!empty($mitra) && isset($mitra->idmitra))
        <a href="{{ route('admin.pilihpensiun', ['idmitra' => $mitra->idmitra]) }}" 
           class="btn" style="background-color:#2994A4; color:white;">Kembali</a>
    @else
        <a href="{{ url()->previous() }}" 
           class="btn" style="background-color:#2994A4; color:white;">Kembali</a>
    @endif
</div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content rounded-100 shadow">
                <div class="modal-body text-center p-5">
                    <p class="mb-4 fs-5">Yakin mau hapus data ini?</p>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-danger px-4 mx-2" onclick="alert('Data berhasil dihapus')"
                            data-dismiss="modal">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Styling Tabs --}}
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