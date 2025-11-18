@extends('ADMIN.layouts.main')

@section('title', 'Tambah Unit / Sekolah Mitra')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">Home</a> /
        <a href="/mitradansekolahadmin" style="text-decoration:none; color:#555;">Mitra dan Sekolah</a> /
        <a href="/inputsekolahadmin" style="text-decoration:none; color:#2994A4;">Input Sekolah</a> 
    </p>
@endsection

@section('artikel')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Card container dengan border warna #2994A4 -->
                <div class="border rounded p-4 mb-4" style="border-color: #2994A4; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                    <form action="{{ route('admin.storesekolah') }}" method="POST">
                        @csrf
                        <div class="form-group row mb-3">
                            <label for="kode_mitra" class="col-sm-4 col-form-label">Kode Mitra Pendiri</label>
                            <div class="col-sm-8">
                                <select name="kode_mitra" id="kode_mitra" class="form-control" required>
                                    <option value="">Pilih Mitra</option>
                                    @foreach ($mitraList as $m)
                                        <option value="{{ $m->idunit }}">{{ $m->idunit }} - {{ $m->nama_um }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="nama_mitra" class="col-sm-4 col-form-label">Nama Mitra Pendiri</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama_mitra" id="nama_mitra" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="kode_unit" class="col-sm-4 col-form-label">Kode Unit</label>
                            <div class="col-sm-8">
                                <input type="text" id="kode_unit" name="kode_unit" class="form-control"
                                    value="{{ $kode_unit }}">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="nama_unit" class="col-sm-4 col-form-label">Nama Unit / Sekolah</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama_unit" id="nama_unit" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="alamat_unit" class="col-sm-4 col-form-label">Alamat Unit / Sekolah</label>
                            <div class="col-sm-8">
                                <input type="text" name="alamat_unit" id="alamat_unit" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="kelurahan" class="col-sm-4 col-form-label">Kelurahan</label>
                            <div class="col-sm-8">
                                <input type="text" name="kelurahan" id="kelurahan" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="kecamatan" class="col-sm-4 col-form-label">Kecamatan</label>
                            <div class="col-sm-8">
                                <input type="text" name="kecamatan" id="kecamatan" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="kota" class="col-sm-4 col-form-label">Kota / Kabupaten</label>
                            <div class="col-sm-8">
                                <input type="text" name="kota" id="kota" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="provinsi" class="col-sm-4 col-form-label">Provinsi</label>
                            <div class="col-sm-8">
                                <input type="text" name="provinsi" id="provinsi" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="iuran_peserta" class="col-sm-4 col-form-label">Penetapan Iuran Peserta (%)</label>
                            <div class="col-sm-8">
                                <input type="number" step="0.01" name="iuran_peserta" id="iuran_peserta"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="iuran_kerja" class="col-sm-4 col-form-label">Penetapan Iuran Pemberi Kerja
                                (%)</label>
                            <div class="col-sm-8">
                                <input type="number" step="0.01" name="iuran_kerja" id="iuran_kerja"
                                    class="form-control" required>
                            </div>
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

    <script>
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
