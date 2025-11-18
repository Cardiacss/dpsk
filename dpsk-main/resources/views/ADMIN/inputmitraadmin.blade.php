@extends('ADMIN.layouts.main')

@section('title', 'Input Mitra')

@section('breadcrumb')
    <p class="text-sm text-gray-500 mb-4">
        <a href="/mitra&sekolahadmin" class="text-gray-600 hover:text-[#2994A4]">Mitra</a> /
        <span class="text-[#2994A4] font-semibold">Input Mitra</span>
    </p>
@endsection

@section('artikel')
    <div class="container mt-4 mb-5" style="max-width: 700px;">
        <form action="{{ route('admin.storemitra') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Kode Mitra Pendiri</label>
                <input type="text" class="form-control bg-light" value="{{ $kode_view }}" readonly>
                <input type="hidden" name="idunit" value="{{ $kode_simpan }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Mitra Pendiri</label>
                <input type="text" name="nama_um" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat Mitra</label>
                <input type="text" name="alamat_um" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kelurahan</label>
                <input type="text" name="kelurahan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kecamatan</label>
                <input type="text" name="kecamatan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kota/Kabupaten</label>
                <input type="text" name="kotakab" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Provinsi</label>
                <input type="text" name="provinsi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Iuran Peserta (%)</label>
                <input type="number" name="ip_pct" class="form-control" step="0.01" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Iuran Pemberi Kerja (%)</label>
                <input type="number" name="ipk_pct" class="form-control" step="0.01" required>
            </div>

            <div class="text-center mt-4 mb-3">
                <button type="submit" class="btn text-white px-4" style="background-color:#2994A4;">
                    Submit
                </button>
            </div>


        </form>
    </div>
@endsection
