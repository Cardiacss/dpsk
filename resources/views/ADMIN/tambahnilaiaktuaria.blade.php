@extends('ADMIN.layouts.main')

@section('title', 'Tambah Nilai Aktuaria')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">

        <a href="/home" style="text-decoration:none; color:#555;">
            Home
        </a> /

        <a href="/nilaiaktuariaadmin" style="text-decoration:none; color:#555;">
            Nilai Aktuaria
        </a> /

        <a href="/datanilaiaktuariaadmin?idunit={{ $mitra->idunit }}" style="text-decoration:none; color:#555;">
            Data Nilai Aktuaria
        </a> /

        <a href="/nilaiaktuaria/create/{{ $mitra->idunit }}" style="text-decoration:none; color:#2994A4;">
            Tambah Nilai Aktuaria
        </a>

    </p>
@endsection


@section('artikel')
    <div class="d-flex justify-content-center">
        <div class="w-50"> <!-- Lebar form sesuai edit Mitra/Sekolah -->

            <form action="{{ route('nilaiaktuaria.store') }}" method="POST">
                @csrf

                <!-- ID Unit -->
                <div class="mb-3">
                    <label class="form-label fw-bold">ID Unit</label>
                    <input type="text" name="idunit" value="{{ $mitra->idunit }}" readonly class="form-control">
                </div>

                <!-- Nama Mitra -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Mitra</label>
                    <input type="text" value="{{ $mitra->nama_um }}" readonly class="form-control">
                </div>

                <!-- Tahun Aktuaria -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Tahun Aktuaria</label>
                    <input type="number" name="thnaktuaria" placeholder="Masukkan tahun aktuaria" class="form-control"
                        required>
                </div>

                <!-- Bulan Berlaku -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Bulan Berlaku</label>
                    <input type="number" name="blnberlaku" placeholder="Masukkan bulan berlaku (1–12)" class="form-control"
                        required>
                </div>

                <!-- Tahun Berlaku -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Tahun Berlaku</label>
                    <input type="number" name="thnberlaku" placeholder="Masukkan tahun berlaku" class="form-control"
                        required>
                </div>

                <!-- IP -->
                <div class="mb-3">
                    <label class="form-label fw-bold">IP</label>
                    <input type="number" name="ip" step="0.01" placeholder="Masukkan nilai IP" class="form-control"
                        required>
                </div>

                <!-- IPK -->
                <div class="mb-3">
                    <label class="form-label fw-bold">IPK</label>
                    <input type="number" name="ipk" step="0.01" placeholder="Masukkan nilai IPK"
                        class="form-control" required>
                </div>

                <!-- Nilai Tambahan -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Nilai Tambahan</label>
                    <input type="number" name="nilaitambahan" step="0.01"
                        placeholder="Masukkan nilai tambahan (opsional)" class="form-control">
                </div>

                <!-- Tombol -->
                <div class="d-flex justify-content-center mt-4" style="gap:10px;">
                    <a href="/datanilaiaktuariaadmin?idunit={{ $mitra->idunit }}" class="btn btn-secondary"
                        style="width:150px;">
                        Kembali
                    </a>

                    <button type="submit" class="btn" style="background-color:#2994A4; color:white; width:150px;">
                        Simpan Data
                    </button>
                </div>


            </form>

        </div>
    </div>
@endsection
