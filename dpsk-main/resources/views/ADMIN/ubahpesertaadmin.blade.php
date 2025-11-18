@extends('ADMIN.layouts.main')
@section('title', 'Ubah Peserta')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="/daftarpesertaadmin" style="text-decoration:none; color:#555;">Peserta</a> /
        <a href="#" style="text-decoration:none; color:#2994A4;">Ubah Peserta</a>
    </p>
@endsection

@section('artikel')
    <div class="card-body">
        <form action="{{ route('peserta.update', $peserta->idanggota) }}" method="POST">
            @csrf

            {{-- IDENTITAS --}}
            <div class="row">
                <div class="col-md-6">
                    <label>Nomor Peserta</label>
                    <input type="text" name="nopeserta" class="form-control"
                        value="{{ old('nopeserta', $peserta->nopeserta) }}">

                    <label class="mt-2">No KTP / Passport</label>
                    <input type="text" name="id_num" class="form-control" value="{{ old('id_num', $peserta->id_num) }}">

                    <label class="mt-2">Nama Peserta</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $peserta->nama) }}">
                </div>

                <div class="col-md-6">
                    <label>Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jeniskelamin" value="Pria"
                            {{ $peserta->jeniskelamin == 'Pria' ? 'checked' : '' }}>
                        <label class="form-check-label">Pria</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jeniskelamin" value="Wanita"
                            {{ $peserta->jeniskelamin == 'Wanita' ? 'checked' : '' }}>
                        <label class="form-check-label">Wanita</label>
                    </div>

                    <div class="mt-3">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgllahir" class="form-control"
                            value="{{ old('tgllahir', $peserta->tgllahir ? \Carbon\Carbon::parse($peserta->tgllahir)->format('Y-m-d') : '') }}">
                    </div>

                    <div class="mt-3">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempatlahir" class="form-control"
                            value="{{ old('tempatlahir', $peserta->tempatlahir) }}">
                    </div>
                </div>
            </div>

            <hr>

            {{-- ALAMAT --}}
            <label>Alamat Lengkap</label>
            <textarea name="alamatterakhir" class="form-control">{{ old('alamatterakhir', $peserta->alamatterakhir) }}</textarea>

            <div class="row mt-2">
                <div class="col-md-3">
                    <label>Kelurahan</label>
                    <input type="text" name="kelurahan" class="form-control"
                        value="{{ old('kelurahan', $peserta->kelurahan) }}">
                </div>
                <div class="col-md-3">
                    <label>Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control"
                        value="{{ old('kecamatan', $peserta->kecamatan) }}">
                </div>
                <div class="col-md-3">
                    <label>Kota/Kabupaten</label>
                    <input type="text" name="kotakab" class="form-control"
                        value="{{ old('kotakab', $peserta->kotakab) }}">
                </div>
                <div class="col-md-3">
                    <label>Provinsi</label>
                    <input type="text" name="provinsi" class="form-control"
                        value="{{ old('provinsi', $peserta->provinsi) }}">
                </div>
            </div>

            <hr>

            {{-- PEKERJAAN --}}
            <div class="row">
                <div class="col-md-6">
                    <label>Pilih Unit Mitra</label>
                    <select id="idunit" name="idunit" class="form-control">
                        <option value="">-- Pilih Unit Mitra --</option>
                        @foreach ($unitmitra as $unit)
                            <option value="{{ $unit->idunit }}" {{ $peserta->idunit == $unit->idunit ? 'selected' : '' }}>
                                {{ $unit->idunit }} - {{ $unit->nama_um }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label>Mitra Pemberi Kerja</label>
                    <select id="idmitra" name="idmitra" class="form-control bg-light">
                        <option value="">-- Pilih Mitra Pemberi Kerja --</option>
                        @foreach ($mitra as $m)
                            <option value="{{ $m->idmitra }}" data-idunit="{{ $m->idunit }}"
                                {{ $peserta->idmitra == $m->idmitra ? 'selected' : '' }}>
                                {{ $m->idmitra }} - {{ $m->nama_um }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <hr>

            {{-- DATA KELUARGA --}}
            <div class="row">
                <div class="col-md-4">
                    <label>Status Nikah</label>
                    <input type="text" name="statusnikah" class="form-control"
                        value="{{ old('statusnikah', $peserta->statusnikah) }}">
                </div>
                <div class="col-md-4">
                    <label>Tanggal Pernikahan</label>
                    <input type="date" name="tglkawin" class="form-control"
                        value="{{ old('tglkawin', $peserta->tglkawin ? \Carbon\Carbon::parse($peserta->tglkawin)->format('Y-m-d') : '') }}">
                </div>
                <div class="col-md-4">
                    <label>Jumlah Anak</label>
                    <input type="number" name="jumlahanak" class="form-control"
                        value="{{ old('jumlahanak', $peserta->jumlahanak) }}">
                </div>
            </div>

            <hr>

            {{-- KEANGGOTAAN --}}
            <div class="row">
                <div class="col-md-4">
                    <label>Tanggal Pertama Iuran</label>
                    <input type="date" name="tmtiuran" class="form-control"
                        value="{{ old('tmtiuran', $peserta->tmtiuran ? \Carbon\Carbon::parse($peserta->tmtiuran)->format('Y-m-d') : '') }}">
                </div>
                <div class="col-md-4">
                    <label>Tanggal Disahkan</label>
                    <input type="date" name="tglsahpeserta" class="form-control"
                        value="{{ old('tglsahpeserta', $peserta->tglsahpeserta ? \Carbon\Carbon::parse($peserta->tglsahpeserta)->format('Y-m-d') : '') }}">
                </div>
                <div class="col-md-4">
                    <label>Status Kartu</label>
                    <input type="text" name="statuspeserta" class="form-control bg-light"
                        value="{{ old('statuspeserta', $peserta->statuspeserta) }}">
                </div>
            </div>

            <hr>

            {{-- TOMBOL --}}
            <div class="d-flex justify-content-between">
                <a href="/daftarpesertaadmin" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn" style="background-color:#2994A4; color:white;">Simpan
                    Perubahan</button>
            </div>

        </form>
    </div>

    {{-- SCRIPT FILTER MITRA BERDASARKAN UNIT --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const unitSelect = document.getElementById('idunit');
            const mitraSelect = document.getElementById('idmitra');
            const allMitraOptions = Array.from(mitraSelect.options).slice(1).map(opt => opt.cloneNode(true));
            const selectedMitraAwal = "{{ $peserta->idmitra }}";

            function filterMitra() {
                const selectedUnit = unitSelect.value;
                mitraSelect.innerHTML = '<option value="">-- Pilih Mitra Pemberi Kerja --</option>';

                const filtered = selectedUnit ?
                    allMitraOptions.filter(opt => opt.dataset.idunit === selectedUnit) :
                    allMitraOptions;

                filtered.forEach(opt => mitraSelect.appendChild(opt.cloneNode(true)));

                if (filtered.some(opt => opt.value === selectedMitraAwal)) {
                    mitraSelect.value = selectedMitraAwal;
                }
            }

            filterMitra();
            unitSelect.addEventListener('change', filterMitra);
        });
    </script>
@endsection
