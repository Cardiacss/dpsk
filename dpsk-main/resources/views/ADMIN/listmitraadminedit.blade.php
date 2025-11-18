@extends('ADMIN.layouts.main')

@section('title', 'Edit Data Sekolah')

@section('breadcrumb')
    <p class="text-sm text-gray-500 mb-4">
        <a href="/mitra&sekolahadmin" class="text-gray-600 hover:text-[#2994A4]">Mitra</a> /
        <span class="text-[#2994A4] font-semibold">Edit Data Sekolah</span>
    </p>
@endsection

@section('artikel')
    <div class="container mt-4 mb-5 d-flex justify-content-center">
        <div class="rounded p-4 shadow-sm" style="max-width: 600px; width: 100%;">
            <form action="{{ route('mitra.update', $mitra->idmitra) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">ID Mitra</label>
                    <input type="text" name="idunit" value="{{ $mitra->idunit }}" class="form-control bg-light"
                        readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Mitra</label>
                    <input type="text" name="nama_um" value="{{ $mitra->nama_um }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Alamat</label>
                    <input type="text" name="alamat_um" value="{{ $mitra->alamat_um }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Kecamatan</label>
                    <input type="text" name="kecamatan" value="{{ $mitra->kecamatan }}" class="form-control">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Kota / Kabupaten</label>
                    <input type="text" name="kotakab" value="{{ $mitra->kotakab }}" class="form-control">
                </div>

                {{-- ======================== TOMBOL ======================== --}}
                <div class="d-flex justify-content-center mt-4 mb-3">
                    <a href="/mitradansekolahadmin" class="btn btn-secondary mx-2">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn text-white mx-2" style="background-color:#2994A4;">
                        <i class="bi bi-check2-circle"></i> Submit
                    </button>
                </div>


            </form>
        </div>
    </div>
@endsection
