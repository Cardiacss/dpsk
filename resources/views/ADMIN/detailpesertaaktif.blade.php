@extends('ADMIN.layouts.main')
@section('title', 'DETAIL PENSIUNAN')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">
            Home
        </a> /
        <a href="/lihatpensiun" style="text-decoration:none; color:#555;">Lihat Pensiun</a> /
        <a href="{{ route('admin.detailpesertaaktif', ['idanggota' => $pensiun->idanggota]) }}"
            style="text-decoration:none; color:#2994A4;">
            Detail Pensiunan
        </a>

    </p>
@endsection

@section('artikel')
    <div class="container mt-4">
        <a href="/lihatpensiun" class="btn btn-sm" style="background-color:#2994A4; color:white;">Kembali</a>

        <table class="table table-borderless mt-3" style="width:70%;">
            <tbody>
                <tr>
                    <td>Nomor Peserta</td>
                    <td>{{ $pensiun->idanggota }}</td>
                </tr>
                <tr>
                    <td>Nama Peserta</td>
                    <td>{{ $pensiun->peserta->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Tanggal Mohon</td>
                    <td>{{ $pensiun->tglmohon?->format('Y-m-d') ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Terhitung Mulai Tanggal</td>
                    <td>{{ $pensiun->tmtpensiun?->format('Y-m-d') ?? '-' }}</td>
                </tr>
                <tr>
                    <td>No Surat Berhenti</td>
                    <td>{{ $pensiun->nosuratberhenti ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Status Pensiun</td>
                    <td>{{ $pensiun->statuspensiun ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Status Manfaat</td>
                    <td>{{ $pensiun->statusmanfaat ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Status Hidup</td>
                    <td>{{ $pensiun->statushidup ? 'Hidup' : 'Meninggal' }}</td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>{{ $pensiun->keterangan ?? '-' }}</td>
                </tr>
            </tbody>
        </table>

        <hr>

        <table class="table table-borderless" style="width:70%;">
            <tbody>
                <tr>
                    <td>Manfaat</td>
                    <td>Pertama terima pada</td>
                    <td>Bulan {{ $pensiun->first_bulan ?? '-' }} Tahun {{ $pensiun->first_tahun ?? '-' }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Terakhir terima pada</td>
                    <td>Bulan {{ $pensiun->last_bulan ?? '-' }} Tahun {{ $pensiun->last_tahun ?? '-' }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Besaran manfaat terakhir</td>
                    <td>Rp. {{ number_format($pensiun->mpakhir, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Rekening</td>
                    <td>{{ $pensiun->rekening ?? '-' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
