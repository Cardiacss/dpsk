@extends('ADMIN.layouts.main')

@section('title', 'Input Mitra')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">Home</a> /
        <a href="/mitradansekolahadmin" style="text-decoration:none; color:#555;">Mitra dan Sekolah</a> /
        <a href="/inputmitraadmin" style="text-decoration:none; color:#2994A4;">Input Mitra</a> 
    </p>
@endsection

@section('artikel')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Card container dengan border warna #2994A4 dan shadow -->
                <div class="border rounded p-4 mb-4" style="border-color: #2994A4; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                    <form action="{{ route('admin.storemitra') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label class="form-label">Kode Mitra Pendiri</label>
                            <input type="text" class="form-control bg-light" value="{{ $kode_view }}" readonly>
                            <input type="hidden" name="idunit" value="{{ $kode_simpan }}">
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Nama Mitra Pendiri</label>
                            <input type="text" name="nama_um" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Alamat Mitra</label>
                            <input type="text" name="alamat_um" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Kelurahan</label>
                            <input type="text" name="kelurahan" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Kecamatan</label>
                            <input type="text" name="kecamatan" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Kota / Kabupaten</label>
                            <input type="text" name="kotakab" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Provinsi</label>
                            <input type="text" name="provinsi" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Iuran Peserta (%)</label>
                            <input type="number" name="ip_pct" class="form-control" step="0.01" required>
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label">Iuran Pemberi Kerja (%)</label>
                            <input type="number" name="ipk_pct" class="form-control" step="0.01" required>
                        </div>

                        <p class="text-center text-muted mb-3">
                            Silakan lengkapi data dengan benar sebelum disubmit.
                        </p>

                        <div class="text-center">
                            <a href="/mitradansekolahadmin" class="btn btn-secondary px-4 me-2">
                                Kembali
                            </a>
                            <button type="submit" class="btn text-white px-4" style="background-color:#2994A4;">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
