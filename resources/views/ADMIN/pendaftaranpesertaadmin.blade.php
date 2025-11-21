@extends('ADMIN.layouts.main')

@section('title', 'Pendaftaran Peserta')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">Home</a> /
        <a href="{{ route('admin.daftarpeserta') }}" style="text-decoration:none; color:#555;">Daftar Peserta</a> /
        <a href="{{ route('peserta.create') }}" style="text-decoration:none; color:#2994A4;">Pendaftaran Peserta</a>
    </p>
@endsection

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
                    <label>No KTP/Passport <span class="text-danger">*</span></label>
                    <input name="id_num" value="{{ old('id_num') }}"
                        class="form-control @error('id_num') is-invalid @enderror" required>
                </div>

                {{-- Nama --}}
                <div class="form-group col-md-6">
                    <label>Nama Peserta <span class="text-danger">*</span></label>
                    <input name="nama" value="{{ old('nama') }}"
                        class="form-control @error('nama') is-invalid @enderror" required>
                </div>

                {{-- Jenis Kelamin --}}
                <div class="form-group col-md-6">
                    <label>Jenis Kelamin <span class="text-danger">*</span></label><br>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jeniskelamin" value="Pria"
                            {{ old('jeniskelamin') == 'Pria' ? 'checked' : '' }}>
                        <label class="form-check-label">Pria</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jeniskelamin" value="Wanita"
                            {{ old('jeniskelamin') == 'Wanita' ? 'checked' : '' }}>
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
                    <input type="date" name="tgllahir" value="{{ old('tgllahir') }}" class="form-control" required>
                </div>

                {{-- Alamat --}}
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
            <h5 class="mt-4 mb-3 text-dark fw-bold">Pekerjaan</h5>

            <div class="row justify-content-start">
                <div class="col-md-6">

                    <div class="form-group mb-3">
                        <label>Tanggal Mulai Kerja</label>
                        <input type="date" name="tmtkeja" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label>Pilih Pemberi Kerja</label>
                        <select id="idunit" name="idunit" class="form-control">
                            <option value="">-- Pilih Pemberi Kerja --</option>
                            @foreach ($unitmitra as $unit)
                                <option value="{{ $unit->idunit }}">{{ $unit->idunit }} - {{ $unit->nama_um }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label>Pilih Unit Sekolah</label>
                        <select id="idmitra_select" class="form-control" disabled>
                            <option value="">-- Pilih Unit Sekolah --</option>
                        </select>
                    </div>

                    <input type="hidden" name="idmitra" id="idmitra">
                    <input type="hidden" name="namamitra" id="namamitra">

<div class="form-group mb-3">
    <label>Pekerjaan</label>
    <select name="pekerjaanakhir" class="form-control">
        <option value="Guru" selected>Guru</option>
        <option value="Pegawai">Pegawai</option>
    </select>
</div>

                </div>
            </div>

            {{-- ======================== KELUARGA ======================== --}}
            <h5 class="mt-4 mb-3 text-dark fw-bold">Keluarga</h5>

            <div class="row">
                <div class="col-md-6">

                    <div class="form-group mb-3">
                        <label>Status Nikah</label>
                        <select name="statusnikah" class="form-control" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="Kawin">Kawin</option>
                            <option value="Tidak Kawin">Tidak Kawin</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label>Tanggal Perkawinan</label>
                        <input type="date" name="tglkawin" class="form-control">
                    </div>

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
                    <label>Tanggal Disahkan Sebagai Peserta</label>
                    <input type="date" name="tglsahpeserta" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label>Status Peserta</label>
                    <select name="statuspeserta" class="form-control">
                        <option value="">-- Pilih Status Peserta--</option>
                        <option value="AKTIF">AKTIF</option>
                        <option value="TIDAK">TIDAK</option>
                    </select>
                </div>

            </div>

            {{-- ======================== TOMBOL ======================== --}}
            <div class="d-flex justify-content-left mt-4 mb-3">
                <a href="/daftarpesertaadmin" class="btn btn-secondary mx-2">
                    Kembali
                </a>
                <button type="submit" class="btn text-white mx-2" style="background-color:#2994A4;">
                    Submit
                </button>
            </div>


        </form>
    </div>

    {{-- SCRIPT --}}
    <script>
        document.getElementById('idunit').addEventListener('change', function() {
            const idunit = this.value;
            const mitraSelect = document.getElementById('idmitra_select');

            mitraSelect.innerHTML = '<option value="">-- Pilih Mitra --</option>';
            mitraSelect.disabled = true;

            if (idunit) {
                fetch(`/get-mitra/${idunit}`)
                    .then(res => res.json())
                    .then(data => {
                        data.forEach(mitra => {
                            mitraSelect.innerHTML +=
                                `<option value="${mitra.idmitra}">${mitra.idmitra} - ${mitra.nama_um}</option>`;
                        });
                        mitraSelect.disabled = false;
                    });
            }
        });

        document.getElementById('idmitra_select').addEventListener('change', function() {
            document.getElementById('idmitra').value = this.value;
            document.getElementById('namamitra').value = this.options[this.selectedIndex].text;
        });
    </script>

@endsection
