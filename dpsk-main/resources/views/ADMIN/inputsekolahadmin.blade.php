@extends('ADMIN.layouts.main')

@section('title', 'Tambah Unit / Sekolah Mitra')

@section('breadcrumb')
    <p class="text-sm text-gray-500 mb-4">
        <a href="/mitra&sekolahadmin" class="text-gray-600 hover:text-[#2994A4]">Mitra</a> /
        <span class="text-[#2994A4] font-semibold">Tambah Unit / Sekolah Mitra</span>
    </p>
@endsection

@section('artikel')
    <div class="container mt-4 mb-5" style="max-width: 600px;">
        <form action="{{ route('admin.storesekolah') }}" method="POST">
            @csrf

            <div class="row g-3">

                {{-- Pilih Mitra --}}
                <div class="col-md-12 mb-3">
                    <label for="kode_mitra" class="form-label fw-semibold">Kode Mitra Pendiri</label>
                    <select name="kode_mitra" id="kode_mitra" class="form-select w-100" required
                        style="background-color:#f8f9fa; border:1px solid #ccc; padding:8px;">
                        <option value="">Pilih Mitra</option>
                        @foreach ($mitraList as $m)
                            <option value="{{ $m->idunit }}">{{ $m->idunit }} - {{ $m->nama_um }}</option>
                        @endforeach
                    </select>
                </div>


                {{-- Nama Mitra Otomatis --}}
                <div class="col-md-12">
                    <label for="nama_mitra" class="form-label">Nama Mitra Pendiri</label>
                    <input type="text" name="nama_mitra" id="nama_mitra" class="form-control bg-light" readonly>
                </div>

                {{-- Kode Unit --}}
                <div class="col-md-12">
                    <label for="kode_unit" class="form-label">Kode Unit</label>
                    <input type="text" id="kode_unit" name="kode_unit" class="form-control" value="{{ $kode_unit }}">
                </div>

                {{-- Nama Unit --}}
                <div class="col-md-12">
                    <label class="form-label">Nama Unit / Sekolah</label>
                    <input type="text" name="nama_unit" class="form-control" required>
                </div>

                {{-- Alamat --}}
                <div class="col-md-12">
                    <label class="form-label">Alamat Unit / Sekolah</label>
                    <input type="text" name="alamat_unit" class="form-control" required>
                </div>

                {{-- Kelurahan --}}
                <div class="col-md-12">
                    <label class="form-label">Kelurahan</label>
                    <input type="text" name="kelurahan" class="form-control" required>
                </div>

                {{-- Kecamatan --}}
                <div class="col-md-12">
                    <label class="form-label">Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control" required>
                </div>

                {{-- Kota --}}
                <div class="col-md-12">
                    <label class="form-label">Kota / Kabupaten</label>
                    <input type="text" name="kota" class="form-control" required>
                </div>

                {{-- Provinsi --}}
                <div class="col-md-12">
                    <label class="form-label">Provinsi</label>
                    <input type="text" name="provinsi" class="form-control" required>
                </div>

                {{-- Iuran Peserta --}}
                <div class="col-md-12">
                    <label class="form-label">Penetapan Iuran Peserta (%)</label>
                    <input type="number" step="0.01" name="iuran_peserta" class="form-control" required>
                </div>

                {{-- Iuran Pemberi Kerja --}}
                <div class="col-md-12">
                    <label class="form-label">Penetapan Iuran Pemberi Kerja (%)</label>
                    <input type="number" step="0.01" name="iuran_kerja" class="form-control" required>
                </div>
            </div>

            <p class="text-center text-muted mt-3">
                Silakan lengkapi data dengan benar sebelum disubmit.
            </p>

            {{-- ======================== TOMBOL ======================== --}}
            <div class="d-flex justify-content-center mt-4 mb-3">
                <a href="/daftarpesertaadmin" class="btn btn-secondary mx-2">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn text-white mx-2" style="background-color:#2994A4;">
                    <i class="bi bi-check2-circle"></i> Submit
                </button>
            </div>

        </form>
    </div>

    <script>
        // ambil nama mitra otomatis
        document.getElementById('kode_mitra').addEventListener('change', function() {
            const idunit = this.value;
            if (idunit) {
                fetch(`/get-nama-mitra/${idunit}`)
                    .then(res => res.json())
                    .then(data => {
                        document.getElementById('nama_mitra').value = data.nama_um || '';
                    })
                    .catch(err => console.error('Gagal mengambil nama mitra:', err));
            } else {
                document.getElementById('nama_mitra').value = '';
            }
        });
    </script>
@endsection
