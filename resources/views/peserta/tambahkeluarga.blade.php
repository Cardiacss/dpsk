@extends('layouts.main')

@section('title', "Tambah Anggota Keluarga / Tanggungan / Waris")

@section('breadcrumb')
<p class="text-muted" style="font-size: 14px;">
<a href="{{ url('/peserta') }}" style="text-decoration:none; color:#555;">Peserta</a> /
<a href="{{ url('/peserta/keluarga') }}" style="text-decoration:none; color:#555;">Keluarga</a> /
<a href="{{ url('/peserta/keluarga/tambahkeluarga') }}" style="text-decoration:none; color:#2994A4;">Tambah Anggota Keluarga</a>

</p>
@endsection

@section('artikel')
<div class="card">
    <div class="card-body">

        {{-- Tabs (tetap ada di atas) --}}
        <div class="keluarga-tabs">
            <ul class="nav nav-pills justify-content-center mb-4" id="detailTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a href="/peserta/detail" class="nav-link">Detail</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="/peserta/keluarga" class="nav-link active">Keluarga</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="/peserta/ahliwaris" class="nav-link">Ahli Waris</a>
                </li>
            </ul>
        </div>

        {{-- Form Tambah --}}
        <form action="/peserta/keluarga/tambahkeluarga" method="POST" style="max-width: 700px; margin:auto;">
            @csrf
            <div class="form-group mb-3">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" placeholder="Masukkan nama lengkap">
            </div>

            <div class="form-group mb-3">
                <label>Tempat Lahir</label>
                <input type="text" class="form-control" placeholder="Masukkan tempat lahir">
            </div>

            <div class="form-group mb-3">
                <label>Tanggal Lahir</label>
                <input type="date" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label>Jenis Kelamin</label>
                <select class="form-control">
                    <option value="">-- Pilih --</option>
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Hubungan</label>
                <input type="text" class="form-control" placeholder="Masukkan hubungan">
            </div>

            <div class="form-group mb-3">
                <label>Pekerjaan</label>
                <input type="text" class="form-control" placeholder="Masukkan pekerjaan">
            </div>

            <div class="form-group mb-3">
                <label>Status Hak Waris</label>
                <input type="text" class="form-control" placeholder="Masukkan status hak waris">
            </div>

            <div class="form-group mb-3">
                <label>Status Hidup</label>
                <select class="form-control">
                    <option value="">-- Pilih --</option>
                    <option>Hidup</option>
                    <option>Meninggal</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Keterangan</label>
                <textarea class="form-control" rows="3"></textarea>
            </div>

            <div class="form-group mb-3">
                <label>No Surat Penunjukan Waris & Tanggal (E2)</label>
                <input type="text" class="form-control mb-2" placeholder="Nomor Surat">
                <input type="date" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label>No Permohonan Waris & Tanggal (E4)</label>
                <input type="text" class="form-control mb-2" placeholder="Nomor Permohonan">
                <input type="date" class="form-control">
            </div>

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-between mt-4">
                <a href="/peserta" class="btn" style="background-color:#6c757d; color:white;">
                    Kembali
                </a>
                <button type="submit" class="btn" style="background-color:#2994A4; color:white;">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Styling tambahan untuk tabs --}}
<style>
    .keluarga-tabs .nav-link {
        border-radius: 50px;
        padding: 10px 20px;
        margin: 0 5px;
        color: #2994A4;
        border: 1px solid #2994A4;
        transition: 0.3s;
    }
    .keluarga-tabs .nav-link.active {
        background-color: #2994A4;
        color: white !important;
    }
    .keluarga-tabs .nav-link:hover {
        background-color: #e6f4f5;
    }
</style>
@endsection
