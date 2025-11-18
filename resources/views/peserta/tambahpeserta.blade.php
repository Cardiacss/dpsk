@extends('layouts.main')
@section('title',"Pendaftaran Peserta")

@section('breadcrumb')
<p class="text-muted" style="font-size: 14px;">
    <a href="/peserta" style="text-decoration:none; color:#555;">Peserta</a> /
    <a href="/tambahpeserta" style="text-decoration:none; color:#2994A4;">Pendaftaran Peserta</a>
</p>
@endsection

@section('artikel')
    <div class="card-body">
        <form action="#" method="GET">
            @csrf

            {{-- Identitas Peserta --}}
            <div class="row">
                <div class="col-md-6">
                    <label>Nomor Peserta</label>
                    <input type="text" name="no_peserta" class="form-control">

                    <label class="mt-2">Nama Peserta</label>
                    <input type="text" name="nama" class="form-control">

                    <label class="mt-2">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control">
                </div>

                <div class="col-md-6">
                    <label>No KTP/Passport</label>
                    <input type="text" name="no_ktp" class="form-control">

                    <label class="mt-2">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="Pria">
                        <label class="form-check-label">Pria</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="Wanita">
                        <label class="form-check-label">Wanita</label>
                    </div>

                    <div class="mt-4">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control">
                    </div>
                </div>
            </div>

            <hr>

            {{-- Alamat --}}
            <label>Alamat Lengkap</label>
            <textarea name="alamat" class="form-control"></textarea>

            <div class="row mt-2">
                <div class="col-md-3">
                    <label>Kelurahan</label>
                    <input type="text" name="kelurahan" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Kota</label>
                    <input type="text" name="kota" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Provinsi</label>
                    <input type="text" name="provinsi" class="form-control">
                </div>
            </div>

            <hr>

            {{-- Mitra & Unit --}}
            <label>Mitra Pemberi Kerja</label>
            <div class="d-flex mb-2" style="gap:10px;">
                <input type="text" name="mitra" class="form-control"  style="width:70%;" readonly>
                <button type="button" class="btn btn-info">Ubah Mitra & Unit</button>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label>Unit Kerja</label>
                    <input type="text" name="unit" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control">
                </div>
            </div>

            <hr>

            {{-- Data Keluarga --}}
            <div class="row">
                <div class="col-md-6">
                    <label>Status Nikah</label>
                    <select name="status_nikah" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="Belum Nikah">Belum Nikah</option>
                        <option value="Menikah">Menikah</option>
                        <option value="Cerai">Cerai</option>
                    </select>

                    <label class="mt-2">Tanggal Pernikahan</label>
                    <input type="date" name="tgl_nikah" class="form-control">

                    <label class="mt-2">Jumlah Anak</label>
                    <input type="number" name="jml_anak" class="form-control">
                </div>

                <div class="col-md-6">
                    <label>Tanggal Pertama Iuran</label>
                    <input type="date" name="tgl_iuran" class="form-control">

                    <label class="mt-2">Tanggal Disahkan</label>
                    <input type="date" name="tgl_sah" class="form-control">

                    <label class="mt-2">Status Kartu</label>
                    <select name="status_kartu" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="Belum Tercetak">Belum Tercetak</option>
                        <option value="Sudah Tercetak">Sudah Tercetak</option>
                    </select>
                </div>
            </div>

            <hr>

            {{-- Tombol --}}
            <div class="d-flex justify-content-between">
                <a href="/peserta" class="btn btn-secondary">Kembali</a>
                <a href="/peserta" class="btn" style="background-color:#2994A4; color:white;">
                    Submit
                </a>
            </div>

            <p class="mt-3 text-muted">
                Silahkan lengkapi data pernikahan dan Anggota keluarga pada Edit Keluarga Peserta dan Pernikahan
            </p>
        </form>
    </div>
@endsection
