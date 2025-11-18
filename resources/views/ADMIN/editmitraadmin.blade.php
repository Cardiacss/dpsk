@extends('ADMIN.layouts.main')

@section('title', 'Edit Mitra & Sekolah')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">Home</a> /
        <a href="/mitradansekolahadmin" style="text-decoration:none; color:#555;">Mitra dan Sekolah</a> /
        <a href="{{ url('/unit/edit/' . $unit->idunit) }}" style="text-decoration:none; color:#2994A4;">
            Edit Mitra dan Sekolah
        </a>
    </p>
@endsection

@section('breadcrumb')
    <p class="text-muted small">
        <a href="/mitra&sekolahadmin" class="text-primary text-decoration-none">Mitra & Sekolah</a> /
        <span>Edit</span>
    </p>
@endsection

@section('artikel')
    <div class="d-flex justify-content-center">
        <div class="w-50"> <!-- Lebar form lebih ramping -->

            <form action="{{ route('unit.update', $unit->idunit) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Kode Unit -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Kode Unit</label>
                    <input type="text" value="{{ $unit->idunit }}" readonly class="form-control">
                </div>

                <!-- Nama Unit -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Unit/Mitra</label>
                    <input type="text" name="nama_um" value="{{ $unit->nama_um }}" readonly class="form-control">
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Alamat Unit/Mitra</label>
                    <input type="text" name="alamat_um" value="{{ $unit->alamat_um }}" class="form-control">
                </div>

                <!-- Kelurahan -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Kelurahan</label>
                    <input type="text" name="kelurahan" value="{{ $unit->kelurahan }}" class="form-control">
                </div>

                <!-- Kecamatan -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Kecamatan</label>
                    <input type="text" name="kecamatan" value="{{ $unit->kecamatan }}" class="form-control">
                </div>

                <!-- Kota/Kabupaten -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Kota/Kabupaten</label>
                    <input type="text" name="kotakab" value="{{ $unit->kotakab }}" class="form-control">
                </div>

                <!-- Provinsi -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Provinsi</label>
                    <input type="text" name="provinsi" value="{{ $unit->provinsi }}" class="form-control">
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Status</label>
                    <select name="stat_um" class="form-control"> <!-- ubah form-select → form-control -->
                        <option value="Aktif" {{ $unit->stat_um == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Nonaktif" {{ $unit->stat_um == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                <!-- IP dan IPK -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Iuran Peserta (%)</label>
                    <input type="number" step="0.01" name="ip_pct" value="{{ $unit->ip_pct ?? $nilaiAktuaria->ip }}"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Iuran Pemberi Kerja (%)</label>
                    <input type="number" step="0.01" name="ipk_pct" value="{{ $unit->ipk_pct ?? $nilaiAktuaria->ipk }}"
                        class="form-control">
                </div>

                <div class="text-center mt-4">
                    <a href="/mitradansekolahadmin" class="btn"
                        style="background-color:#6c757d; color:white; border:none; padding:0.5rem 1rem; margin-right:0.5rem;">
                        Kembali
                    </a>
                    <button type="submit" class="btn"
                        style="background-color:#2994A4; color:white; border:none; padding:0.5rem 1rem;">
                        Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>
    </div>
@endsection
