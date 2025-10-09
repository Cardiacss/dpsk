@extends('layouts.main')
@section('title',"Ubah Ahli Waris")

@section('breadcrumb')
<p class="text-muted" style="font-size: 14px;">
    <a href="{{ url('/peserta') }}" style="text-decoration:none; color:#555;">Peserta</a> /
    <a href="{{ url('/peserta/ahliwaris') }}" style="text-decoration:none; color:#555;">Ahli Waris</a> /
    <a href="{{ url('/peserta/ahliwaris/ubahahliwaris') }}" style="text-decoration:none; color:#2994A4;">Ubah Ahli Waris</a>
    </p>
@endsection

@section('artikel')
<div class="card">
    <div class="card-body">

        {{-- Tabs --}}
        <div class="ahliwaris-tabs">
        <ul class="nav nav-pills justify-content-center mb-4">
            <li class="nav-item">
                <a href="/peserta/detail" class="nav-link">Detail</a>
            </li>
            <li class="nav-item">
                <a href="/peserta/keluarga" class="nav-link">Keluarga</a>
            </li>
            <li class="nav-item">
                <a href="/peserta/ahliwaris" class="nav-link active">Ahli Waris</a>
            </li>
        </ul>
        </div>

        {{-- Judul --}}
        <h4 class="mb-4 text-center">Ubah Ahli Waris</h4>

        {{-- Form Ubah Ahli Waris --}}
        <form action="/peserta/ahliwaris/ubahahliwaris" method="POST">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="Siti Aminah">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="Yogyakarta">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" value="1990-05-10">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-9">
                    <select class="form-control">
                        <option selected>Perempuan</option>
                        <option>Laki-laki</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Hubungan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="Istri">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Pekerjaan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="Ibu Rumah Tangga">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tanggal</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" value="2020-01-01">
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-3 col-form-label">Nomor Surat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="SK-2020-123">
                </div>
            </div>

            {{-- Tombol --}}
            <div class="d-flex justify-content-between mt-4">
                <a href="/peserta/ahliwaris" class="btn" style="background-color:#6c757d; color:white;">
                    Kembali
                </a>
            <button type="submit" class="btn" style="background-color:#2994A4; color:white;">
                    Simpan Perubahan
            </button>
            </div>
        </form>

    </div>
</div>

{{-- Styling tambahan untuk tabs --}}
<style>
.ahliwaris-tabs .nav-link {
    border-radius: 50px;
    padding: 10px 20px;
    margin: 0 5px;
    color: #2994A4;
    border: 1px solid #2994A4;
    transition: 0.3s;
}
.ahliwaris-tabs .nav-link.active {
    background-color: #2994A4;
    color: white !important;
}
.ahliwaris-tabs .nav-link:hover {
    background-color: #e6f4f5;
}
</style>
@endsection
