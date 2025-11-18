@extends('ADMIN.layouts.main')

@section('title', 'Tambah Nilai Aktuaria')

@section('breadcrumb')
    <p class="text-sm text-gray-500 mb-4">
        <a href="/nilaiaktuariaadmin" class="text-gray-600 hover:text-[#2994A4]">Nilai Aktuaria</a> /
        <span class="text-[#2994A4] font-semibold">Tambah Data</span>
    </p>
@endsection

@section('artikel')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
        <form action="{{ route('nilaiaktuaria.store') }}" method="POST" style="max-width: 600px; width: 100%;">
            @csrf

            <!-- ID Unit -->
            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary">ID Unit</label>
                <input type="text" name="idunit" value="{{ $mitra->idunit }}" readonly
                    class="form-control bg-light text-muted border-secondary">
            </div>

            <!-- Nama Mitra -->
            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary">Nama Mitra</label>
                <input type="text" value="{{ $mitra->nama_um }}" readonly
                    class="form-control bg-light text-muted border-secondary">
            </div>

            <!-- Tahun Aktuaria -->
            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary">Tahun Aktuaria</label>
                <input type="number" name="thnaktuaria" placeholder="Masukkan tahun aktuaria"
                    class="form-control border-secondary" required>
            </div>

            <!-- Bulan Berlaku -->
            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary">Bulan Berlaku</label>
                <input type="number" name="blnberlaku" placeholder="Masukkan bulan berlaku (1-12)"
                    class="form-control border-secondary" required>
            </div>

            <!-- Tahun Berlaku -->
            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary">Tahun Berlaku</label>
                <input type="number" name="thnberlaku" placeholder="Masukkan tahun berlaku"
                    class="form-control border-secondary" required>
            </div>

            <!-- IP -->
            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary">IP</label>
                <input type="number" name="ip" step="0.01" placeholder="Masukkan nilai IP"
                    class="form-control border-secondary" required>
            </div>

            <!-- IPK -->
            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary">IPK</label>
                <input type="number" name="ipk" step="0.01" placeholder="Masukkan nilai IPK"
                    class="form-control border-secondary" required>
            </div>

            <!-- Nilai Tambahan -->
            <div class="mb-4">
                <label class="form-label fw-semibold text-secondary">Nilai Tambahan</label>
                <input type="number" name="nilaitambahan" step="0.01" placeholder="Masukkan nilai tambahan (opsional)"
                    class="form-control border-secondary">
            </div>

            <!-- Tombol Aksi -->
            <div class="text-center mt-4 d-flex justify-content-center">
                <button type="submit" class="btn text-white px-4 mx-2" style="background-color:#2994A4;">
                    Simpan Data
                </button>
                <a href="/datanilaiaktuariaadmin?idunit={{ $mitra->idunit }}" class="btn btn-secondary px-4 mx-2">
                    Kembali
                </a>
            </div>

        </form>
    </div>
@endsection
