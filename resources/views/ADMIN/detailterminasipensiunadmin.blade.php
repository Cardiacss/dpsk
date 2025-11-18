@extends('ADMIN.layouts.main')

@section('title', 'Detail Terminasi Pensiun')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">
            Home
        </a> /
        <a href="{{ route('pensiun.terminasi') }}" style="text-decoration:none; color:#555;">
            Terminasi Pensiun
        </a> /
        <a href="{{ route('pensiun.terminasi.detail', ['id' => $pensiun->idpensiun]) }}"
            style="text-decoration:none; color:#2994A4;">
            Detail Terminasi Pensiun
        </a>
    </p>
@endsection


@section('artikel')

    <div class="row g-3">
        <div class="col-md-6">
            <label>Nomor Peserta</label>
            <input type="text" value="{{ $pensiun->peserta->nopeserta ?? '-' }}" readonly class="form-control" />
        </div>
        <div class="col-md-6">
            <label>No Pensiun</label>
            <input type="text" value="{{ $pensiun->nopensiun ?? '-' }}" readonly class="form-control" />
        </div>

        <div class="col-md-6">
            <label>Nama Peserta</label>
            <input type="text" value="{{ $pensiun->peserta->nama ?? '-' }}" readonly class="form-control" />
        </div>
        <div class="col-md-6">
            <label>No KTP/Passpor</label>
            <input type="text" value="{{ $pensiun->peserta->nopeserta ?? '-' }}" readonly class="form-control" />
        </div>

        <div class="col-md-6">
            <label>Tempat Lahir</label>
            <input type="text" value="{{ $pensiun->peserta->tempatlahir ?? '-' }}" readonly class="form-control" />
        </div>
        <div class="col-md-6">
            <label>Jenis Kelamin</label>
            <input type="text" value="{{ $pensiun->peserta->jeniskelamin ?? '-' }}" readonly class="form-control" />
        </div>

        <div class="col-md-6">
            <label>Tanggal Lahir</label>
            <input type="text" value="{{ optional($pensiun->peserta->tgllahir)->format('d-m-Y') ?? '-' }}" readonly
                class="form-control" />
        </div>
        <div class="col-md-6">
            <label>Alamat</label>
            <input type="text" value="{{ $pensiun->peserta->alamatterakhir ?? '-' }}" readonly class="form-control" />
        </div>

        <div class="col-md-6">
            <label>Kelurahan</label>
            <input type="text" value="{{ $pensiun->peserta->kelurahan ?? '-' }}" readonly class="form-control" />
        </div>
        <div class="col-md-6">
            <label>Kecamatan</label>
            <input type="text" value="{{ $pensiun->peserta->kecamatan ?? '-' }}" readonly class="form-control" />
        </div>

        <div class="col-md-6">
            <label>Kota</label>
            <input type="text" value="{{ $pensiun->peserta->kotakab ?? '-' }}" readonly class="form-control" />
        </div>
        <div class="col-md-6">
            <label>Provinsi</label>
            <input type="text" value="{{ $pensiun->peserta->provinsi ?? '-' }}" readonly class="form-control" />
        </div>

        <div class="col-md-6">
            <label>Pekerjaan</label>
            <input type="text" value="{{ $pensiun->peserta->pkerjaanakhir ?? '-' }}" readonly class="form-control" />
        </div>
        <div class="col-md-6">
            <label>Unit</label>
            <input type="text" value="{{ $pensiun->peserta->unit->nama_um ?? '-' }}" readonly class="form-control" />
        </div>

        <div class="col-md-6">
            <label>Tgl Pensiun</label>
            <input type="text" value="{{ optional($pensiun->tmtpensiun)->format('d-m-Y') ?? '-' }}" readonly
                class="form-control" />
        </div>
        <div class="col-md-6">
            <label>Tanggal Terminasi</label>
            <input type="text" value="{{ optional($pensiun->tglterminasi)->format('d-m-Y') ?? '-' }}" readonly
                class="form-control" />
        </div>

        <div class="col-md-6">
            <label>Total Iuran</label>
            <input type="text" value="Rp {{ number_format($pensiun->peserta->total_iuran ?? 0, 0, ',', '.') }}" readonly
                class="form-control" />
        </div>
        <div class="col-md-6">
            <label>Total Manfaat</label>
            <input type="text" value="Rp {{ number_format($pensiun->mpakhir ?? 0, 0, ',', '.') }}" readonly
                class="form-control" />
        </div>
    </div>

    <div class="mt-4">
        <a href="/terminasipensiun" class="btn" style="background-color: #2994A4; color: white;">
            Kembali
        </a>
    </div>
@endsection
