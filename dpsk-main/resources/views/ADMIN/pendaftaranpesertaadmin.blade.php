@extends('admin.layouts.main')

@section('title', 'Pendaftaran Peserta')

@section('artikel')
    <div class="container-fluid mt-3 px-4">
        <form action="{{ route('peserta.store') }}" method="POST">
            @csrf

            {{-- ======================== IDENTITAS ======================== --}}
            <h5 class="mb-3 text-dark fw-bold">Identitas Peserta</h5>
            <div class="row g-3">

                {{-- Nomor Peserta --}}
                <div class="form-group col-md-6">
                    <label>Nomor Peserta <span class="text-danger">*</span></label>
                    <input name="nopeserta" value="{{ old('nopeserta') }}"
                        class="form-control @error('nopeserta') is-invalid @enderror" required>
                    @error('nopeserta')
                        <div class="invalid-feedback">Wajib diisi.</div>
                    @enderror
                </div>

                {{-- No KTP/Passport --}}
                <div class="form-group col-md-6">
                    <label>No KTP / Passport <span class="text-danger">*</span></label>
                    <input name="id_num" value="{{ old('id_num') }}" class="form-control" required>
                </div>

                {{-- Nama Peserta --}}
                <div class="form-group col-md-6">
                    <label>Nama Peserta <span class="text-danger">*</span></label>
                    <input name="nama" value="{{ old('nama') }}" class="form-control" required>
                </div>

                {{-- Jenis Kelamin --}}
                <div class="form-group col-md-6">
                    <label>Jenis Kelamin <span class="text-danger">*</span></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jeniskelamin" value="Pria" required>
                        <label class="form-check-label">Pria</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jeniskelamin" value="Wanita">
                        <label class="form-check-label">Wanita</label>
                    </div>
                </div>

                {{-- Tempat Lahir --}}
                <div class="form-group col-md-6">
                    <label>Tempat Lahir <span class="text-danger">*</span></label>
                    <input name="tempatlahir" value="{{ old('tempatlahir') }}" class="form-control" required>
                </div>

                {{-- Tanggal Lahir --}}
                <div class="form-group col-md-6">
                    <label>Tanggal Lahir <span class="text-danger">*</span></label>
                    <input type="date" name="tgllahir" value="{{ old('tgllahir') }}" class="form-control"
                        placeholder="mm/dd/yyyy" required>
                </div>

                {{-- Alamat Lengkap --}}
                <div class="form-group col-md-12">
                    <label>Alamat Lengkap <span class="text-danger">*</span></label>
                    <input name="alamatterakhir" value="{{ old('alamatterakhir') }}" class="form-control" required>
                </div>

                <div class="form-group col-md-6">
                    <label>Kecamatan</label>
                    <input name="kecamatan" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label>Kelurahan</label>
                    <input name="kelurahan" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label>Kota</label>
                    <input name="kotakab" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label>Provinsi</label>
                    <input name="provinsi" class="form-control">
                </div>
            </div>

            {{-- ======================== PEKERJAAN ======================== --}}
            <h5 class="mt-4 mb-3 text-dark fw-bold text-left">Pekerjaan</h5>

            <div class="row justify-content-left">
                <div class="col-md-6"> {{-- Setengah lebar halaman dan ditengah --}}

                    {{-- Tanggal Mulai Kerja --}}
                    <div class="form-group mb-3">
                        <label>Tanggal Mulai Kerja</label>
                        <input type="date" name="tmtkeja" class="form-control" placeholder="mm/dd/yyyy">
                    </div>

                    {{-- Pilih Unit Mitra --}}
                    <div class="form-group mb-3">
                        <label>Pilih Unit Mitra</label>
                        <select id="idunit" name="idunit" class="form-control">
                            <option value="">-- Pilih Unit Mitra --</option>
                            @foreach ($unitmitra as $unit)
                                <option value="{{ $unit->idunit }}">{{ $unit->idunit }} - {{ $unit->nama_um }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Pilih Mitra --}}
                    <div class="form-group mb-3">
                        <label>Pilih Mitra</label>
                        <select id="idmitra" name="idmitra" class="form-control" disabled>
                            <option value="">-- Pilih Mitra --</option>
                        </select>
                    </div>



                    {{-- Pekerjaan --}}
                    <div class="form-group mb-3">
                        <label>Pekerjaan</label>
                        <input name="pekerjaanakhir" class="form-control">
                    </div>

                </div>
            </div>


            {{-- ======================== KELUARGA ======================== --}}
            <h5 class="mt-4 mb-3 text-dark fw-bold text-left">Keluarga</h5>

            <div class="row justify-content-start">
                <div class="col-md-6"> {{-- Setengah lebar halaman, posisi kiri --}}

                    {{-- Status Nikah --}}
                    <div class="form-group mb-3">
                        <label>Status Nikah</label>
                        <input name="statusnikah" class="form-control">
                    </div>

                    {{-- Tanggal Perkawinan --}}
                    <div class="form-group mb-3">
                        <label>Tanggal Perkawinan</label>
                        <input type="date" name="tglkawin" class="form-control">
                    </div>

                    {{-- Jumlah Anak --}}
                    <div class="form-group mb-3">
                        <label>Jumlah Anak</label>
                        <input type="number" name="jumlahanak" class="form-control">
                    </div>

                </div>
            </div>

            {{-- ======================== KEANGGOTAAN ======================== --}}
            <h5 class="mt-4 mb-3 text-dark fw-bold">Keanggotaan</h5>
            <div class="row g-3">
                <div class="form-group col-md-6">
                    <label>Tanggal Pertama Iuran</label>
                    <input type="date" name="tmtiuran" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label>Tanggal Disahkan</label>
                    <input type="date" name="tglsahpeserta" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label>Status Kartu</label>
                    <input name="statuspeserta" class="form-control">
                </div>
            </div>

            {{-- ======================== TOMBOL ======================== --}}
            <div class="d-flex justify-content-left mt-4 mb-3">
                <a href="/daftarpesertaadmin" class="btn btn-secondary mx-2">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn text-white mx-2" style="background-color:#2994A4;">
                    <i class="bi bi-check2-circle"></i> Submit
                </button>
            </div>


        </form>
    </div>

    {{-- Script Relasi Unit → Mitra --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const unitSelect = document.getElementById('idunit');
            const mitraSelect = document.getElementById('idmitra');

            unitSelect.addEventListener('change', function() {
                const idunit = this.value;
                mitraSelect.innerHTML = '<option value="">-- Pilih Mitra --</option>';
                mitraSelect.disabled = true;

                if (idunit) {
                    fetch(`/get-mitra/${idunit}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.length > 0) {
                                data.forEach(mitra => {
                                    const opt = document.createElement('option');
                                    opt.value = mitra.idmitra;
                                    opt.textContent = `${mitra.idmitra} - ${mitra.nama_um}`;
                                    mitraSelect.appendChild(opt);
                                });
                                mitraSelect.disabled = false;
                            } else {
                                const opt = document.createElement('option');
                                opt.textContent = 'Tidak ada mitra untuk unit ini';
                                mitraSelect.appendChild(opt);
                            }
                        })
                        .catch(err => console.error('Gagal memuat mitra:', err));
                }
            });
        });
    </script>
@endsection
