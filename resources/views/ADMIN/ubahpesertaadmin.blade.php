@extends('ADMIN.layouts.main')

@section('title', 'Ubah Peserta')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">Home</a> /
        <a href="{{ route('admin.daftarpeserta') }}" style="text-decoration:none; color:#555;">Daftar Peserta</a> /
        <a href="{{ route('peserta.edit', $peserta->idanggota) }}" style="text-decoration:none; color:#2994A4;">Ubah Peserta</a>

    </p>
@endsection



@section('artikel')

    <div class="container-fluid mt-3 px-4">

        <form action="{{ route('peserta.update', $peserta->idanggota) }}" method="POST">
            @csrf

            {{-- ======================== IDENTITAS ======================== --}}
            <h5 class="mb-3 text-dark fw-bold">Identitas Peserta</h5>
            <div class="row g-3">

                <div class="form-group col-md-6">
                    <label>Nomor Peserta</label>
                    <input name="nopeserta" value="{{ $peserta->nopeserta }}" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label>No KTP / Passport</label>
                    <input name="id_num" value="{{ $peserta->id_num }}" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label>Nama Peserta</label>
                    <input name="nama" value="{{ $peserta->nama }}" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label>Tempat Lahir</label>
                    <input name="tempatlahir" value="{{ $peserta->tempatlahir }}" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label>Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="jeniskelamin" value="Pria" class="form-check-input"
                            {{ $peserta->jeniskelamin == 'Pria' ? 'checked' : '' }}>
                        <label class="form-check-label">Pria</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input type="radio" name="jeniskelamin" value="Wanita" class="form-check-input"
                            {{ $peserta->jeniskelamin == 'Wanita' ? 'checked' : '' }}>
                        <label class="form-check-label">Wanita</label>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgllahir"
                        value="{{ $peserta->tgllahir ? \Carbon\Carbon::parse($peserta->tgllahir)->format('Y-m-d') : '' }}"
                        class="form-control">
                </div>

                {{-- ALAMAT --}}
                <div class="form-group col-md-12">
                    <label>Alamat Lengkap</label>
                    <textarea name="alamatterakhir" class="form-control">{{ $peserta->alamatterakhir }}</textarea>
                </div>

                <div class="form-group col-md-6">
                    <label>Kecamatan</label>
                    <input name="kecamatan" value="{{ $peserta->kecamatan }}" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label>Kelurahan</label>
                    <input name="kelurahan" value="{{ $peserta->kelurahan }}" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label>Kota/Kabupaten</label>
                    <input name="kotakab" value="{{ $peserta->kotakab }}" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label>Provinsi</label>
                    <input name="provinsi" value="{{ $peserta->provinsi }}" class="form-control">
                </div>

            </div>

            {{-- ======================== PEKERJAAN ======================== --}}
            <h5 class="mt-4 mb-3 text-dark fw-bold">Pekerjaan</h5>
            <div class="row g-3">

                <div class="form-group col-md-6">
                    <label>Pilih Unit Mitra</label>
                    <select name="idunit" id="idunit" class="form-control">
                        <option value="">-- Pilih Unit Mitra --</option>
                        @foreach ($unitmitra as $unit)
                            <option value="{{ $unit->idunit }}" {{ $peserta->idunit == $unit->idunit ? 'selected' : '' }}>
                                {{ $unit->idunit }} - {{ $unit->nama_um }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label>Pilih Mitra Pemberi Kerja</label>
                    <select name="idmitra" id="idmitra" class="form-control">
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

            {{-- FILTER SCRIPT --}}
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const unit = document.getElementById('idunit');
                    const mitra = document.getElementById('idmitra');
                    const all = [...mitra.options].slice(1).map(o => o.cloneNode(true));
                    const selected = "{{ $peserta->idmitra }}";

                    function filter() {
                        const uid = unit.value;
                        mitra.innerHTML = `<option value="">-- Pilih Mitra Pemberi Kerja --</option>`;

                        let f = uid ? all.filter(o => o.dataset.idunit === uid) : all;

                        f.forEach(o => mitra.appendChild(o));

                        if (f.some(o => o.value === selected)) {
                            mitra.value = selected;
                        }
                    }

                    filter();
                    unit.addEventListener('change', filter);
                });
            </script>

            {{-- ======================== KELUARGA ======================== --}}
            <h5 class="mt-4 mb-3 text-dark fw-bold">Keluarga</h5>
            <div class="row g-3">

                <div class="form-group col-md-6">
                    <label>Status Nikah</label>
                    <select name="statusnikah" class="form-control">
                        <option value="">-- Pilih Status --</option>
                        <option value="Sudah Nikah" {{ $peserta->statusnikah == 'Sudah Nikah' ? 'selected' : '' }}>Kawin
                        </option>
                        <option value="Belum Nikah" {{ $peserta->statusnikah == 'Belum Nikah' ? 'selected' : '' }}>Tidak
                            Kawin</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label>Tanggal Perkawinan</label>
                    <input type="date" name="tglkawin"
                        value="{{ $peserta->tglkawin ? \Carbon\Carbon::parse($peserta->tglkawin)->format('Y-m-d') : '' }}"
                        class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label>Jumlah Anak</label>
                    <input type="number" name="jumlahanak" value="{{ $peserta->jumlahanak }}" class="form-control">
                </div>
            </div>

            {{-- ======================== KEANGGOTAAN ======================== --}}
            <h5 class="mt-4 mb-3 text-dark fw-bold">Keanggotaan</h5>
            <div class="row g-3">

                <div class="form-group col-md-6">
                    <label>Tanggal Pertama Iuran</label>
                    <input type="date" name="tmtiuran"
                        value="{{ $peserta->tmtiuran ? \Carbon\Carbon::parse($peserta->tmtiuran)->format('Y-m-d') : '' }}"
                        class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label>Tanggal Disahkan</label>
                    <input type="date" name="tglsahpeserta"
                        value="{{ $peserta->tglsahpeserta ? \Carbon\Carbon::parse($peserta->tglsahpeserta)->format('Y-m-d') : '' }}"
                        class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label>Status Kartu</label>
                    <select name="statuspeserta" class="form-control">
                        <option value="">-- Pilih Status --</option>
                        <option value="1" {{ $peserta->statuspeserta == 1 ? 'selected' : '' }}>Sudah Tercetak
                        </option>
                        <option value="0" {{ $peserta->statuspeserta == 0 ? 'selected' : '' }}>Belum Tercetak
                        </option>
                    </select>
                </div>

            </div>

            {{-- BUTTON --}}
            <div class="d-flex justify-content-left mt-4 mb-3">
                <a href="/daftarpesertaadmin" class="btn btn-secondary mx-2">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn text-white mx-2" style="background-color:#2994A4;">
                    <i class="bi bi-check2-circle"></i> Simpan Perubahan
                </button>
            </div>

        </form>
    </div>

@endsection
