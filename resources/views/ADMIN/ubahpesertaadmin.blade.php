@extends('ADMIN.layouts.main')

@section('title', 'Ubah Peserta')

@section('breadcrumb')
    <p class="text-muted text-sm">
        Home / Peserta / <span class="text-blue-600">Ubah Peserta</span>
    </p>
@endsection

@section('artikel')

<div class="bg-white rounded-lg shadow p-6">

    <h1 class="text-2xl font-bold mb-6 text-center">Ubah Peserta</h1>

    <form action="{{ route('peserta.update', $peserta->idanggota) }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        {{-- ================= IDENTITAS ================= --}}
        <div>
            <h2 class="text-lg font-semibold mb-4">Identitas</h2>

            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium">Nomor Peserta</label>
                    <input type="text" name="nopeserta" value="{{ $peserta->nopeserta }}"
                        class="border rounded w-full p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">No KTP/Passport</label>
                    <input type="text" name="id_num" value="{{ $peserta->id_num }}"
                        class="border rounded w-full p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Nama Peserta</label>
                    <input type="text" name="nama" value="{{ $peserta->nama }}" class="border rounded w-full p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Tempat Lahir</label>
                    <input type="text" name="tempatlahir" value="{{ $peserta->tempatlahir }}"
                        class="border rounded w-full p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Jenis Kelamin</label>
                    <div class="flex gap-4 mt-1">
                        <label>
                            <input type="radio" name="jeniskelamin" value="Pria"
                                {{ $peserta->jeniskelamin == 'Pria' ? 'checked' : '' }}>
                            Pria
                        </label>

                        <label>
                            <input type="radio" name="jeniskelamin" value="Wanita"
                                {{ $peserta->jeniskelamin == 'Wanita' ? 'checked' : '' }}>
                            Wanita
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium">Tanggal Lahir</label>
                    <input type="date" name="tgllahir"
                        value="{{ old('tgllahir', $peserta->tgllahir ? \Carbon\Carbon::parse($peserta->tgllahir)->format('Y-m-d') : '') }}"
                        class="border rounded w-full p-2">
                </div>
            </div>
        </div>


        {{-- ================= ALAMAT ================= --}}
        <div>
            <h2 class="text-lg font-semibold mb-4">Alamat</h2>

            <textarea name="alamatterakhir" class="border rounded w-full px-3 py-2 mb-4">{{ $peserta->alamatterakhir }}</textarea>

            <div class="grid grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-medium">Kelurahan</label>
                    <input type="text" name="kelurahan" value="{{ $peserta->kelurahan }}"
                        class="border rounded w-full p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Kecamatan</label>
                    <input type="text" name="kecamatan" value="{{ $peserta->kecamatan }}"
                        class="border rounded w-full p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Kota/Kabupaten</label>
                    <input type="text" name="kotakab" value="{{ $peserta->kotakab }}"
                        class="border rounded w-full p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Provinsi</label>
                    <input type="text" name="provinsi" value="{{ $peserta->provinsi }}"
                        class="border rounded w-full p-2">
                </div>
            </div>
        </div>


        {{-- ================= PEKERJAAN ================= --}}
        <div>
            <h2 class="text-lg font-semibold mb-4">Pekerjaan</h2>
            <div class="grid grid-cols-2 gap-4">

                <div>
                    <label class="block text-sm font-medium">Pilih Unit Mitra</label>
                    <select name="idunit" id="idunit" class="border rounded w-full p-2">
                        <option value="">-- Pilih Unit Mitra --</option>
                        @foreach($unitmitra as $unit)
                            <option value="{{ $unit->idunit }}" {{ $peserta->idunit == $unit->idunit ? 'selected' : '' }}>
                                {{ $unit->idunit }} - {{ $unit->nama_um }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium">Mitra Pemberi Kerja</label>
                    <select name="idmitra" id="idmitra" class="border rounded w-full p-2">
                        <option value="">-- Pilih Mitra Pemberi Kerja --</option>
                        @foreach($mitra as $m)
                            <option value="{{ $m->idmitra }}" data-idunit="{{ $m->idunit }}"
                                {{ $peserta->idmitra == $m->idmitra ? 'selected' : '' }}>
                                {{ $m->idmitra }} - {{ $m->nama_um }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>
        </div>


        {{-- FILTER DROPDOWN MITRA --}}
        <script>
            document.addEventListener('DOMContentLoaded', () => {

                const unitSelect = document.getElementById('idunit');
                const mitraSelect = document.getElementById('idmitra');
                const allMitraOptions = Array.from(mitraSelect.options).slice(1).map(o => o.cloneNode(true));
                const selectedOld = "{{ $peserta->idmitra }}";

                function filterMitra() {
                    const selectedUnit = unitSelect.value;

                    mitraSelect.innerHTML = `<option value="">-- Pilih Mitra Pemberi Kerja --</option>`;

                    const filtered = selectedUnit
                        ? allMitraOptions.filter(opt => opt.dataset.idunit === selectedUnit)
                        : allMitraOptions;

                    filtered.forEach(opt => mitraSelect.appendChild(opt));

                    if (filtered.some(opt => opt.value === selectedOld)) {
                        mitraSelect.value = selectedOld;
                    }
                }

                filterMitra();
                unitSelect.addEventListener('change', filterMitra);
            });
        </script>


        {{-- ================= KELUARGA ================= --}}
        <div>
            <h2 class="text-lg font-semibold mb-4">Data Keluarga</h2>

            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium">Status Nikah</label>
                    <select name="statusnikah" class="border rounded w-full p-2">
                        <option value="">-- Pilih Status --</option>
                        <option value="Sudah Nikah" {{ $peserta->statusnikah == 'Sudah Nikah' ? 'selected' : '' }}>Kawin</option>
                        <option value="Belum Nikah" {{ $peserta->statusnikah == 'Belum Nikah' ? 'selected' : '' }}>Tidak Kawin</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium">Tanggal Pernikahan</label>
                    <input type="date" name="tglkawin"
                        value="{{ old('tglkawin', $peserta->tglkawin ? \Carbon\Carbon::parse($peserta->tglkawin)->format('Y-m-d') : '') }}"
                        class="border rounded w-full p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Jumlah Anak</label>
                    <input type="number" name="jumlahanak" value="{{ $peserta->jumlahanak }}"
                        class="border rounded w-full p-2">
                </div>
            </div>
        </div>


        {{-- ================= KEANGGOTAAN ================= --}}
        <div>
            <h2 class="text-lg font-semibold mb-4">Keanggotaan</h2>

            <div class="grid grid-cols-3 gap-4">

                <div>
                    <label class="block text-sm font-medium">Tanggal Pertama Iuran</label>
                    <input type="date" name="tmtiuran"
                        value="{{ old('tmtiuran', $peserta->tmtiuran ? \Carbon\Carbon::parse($peserta->tmtiuran)->format('Y-m-d') : '') }}"
                        class="border rounded w-full p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Tanggal Disahkan</label>
                    <input type="date" name="tglsahpeserta"
                        value="{{ old('tglsahpeserta', $peserta->tglsahpeserta ? \Carbon\Carbon::parse($peserta->tglsahpeserta)->format('Y-m-d') : '') }}"
                        class="border rounded w-full p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Status Kartu</label>
                    <select name="statuspeserta" class="border rounded w-full p-2">
                        <option value="">-- Pilih Status --</option>
                        <option value="Sudah Tercetak" {{ $peserta->statuspeserta == 'Sudah Tercetak' ? 'selected' : '' }}>Sudah Tercetak</option>
                        <option value="Belum Tercetak" {{ $peserta->statuspeserta == 'Belum Tercetak' ? 'selected' : '' }}>Belum Tercetak</option>
                    </select>
                </div>

            </div>
        </div>


        {{-- ================= BUTTON ================= --}}
        <div class="flex justify-between pt-4">
            <a href="/daftarpesertaadmin" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                Kembali
            </a>

            <button type="submit" class="px-6 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">
                Simpan Perubahan
            </button>
        </div>

    </form>
</div>

@endsection
