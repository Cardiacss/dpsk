@extends('ADMIN.layouts.main')

@section('title', 'Pendaftaran Peserta')

@section('breadcrumb')
<p class="text-sm text-gray-500 mb-4">
    Peserta &gt; <span class="text-blue-500">Pendaftaran Peserta</span>
</p>
@endsection

@section('artikel')

<h1 class="text-2xl font-bold mb-6 text-center">Pendaftaran Peserta</h1>

<div class="bg-white p-6 rounded shadow-md">

    <form action="{{ route('peserta.store') }}" method="POST">
        @csrf

        {{-- IDENTITAS --}}
        <div class="grid grid-cols-2 gap-4 mb-4">

            <div>
                <label class="block text-sm font-medium">Nomor Peserta <span class="text-red-600">*</span></label>
                <input name="nopeserta" value="{{ old('nopeserta') }}"
                       class="w-full border rounded p-2 @error('nopeserta') border-red-500 @enderror" required>
                @error('nopeserta') <p class="text-red-500 text-sm mt-1">Wajib diisi.</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">No KTP/Passport <span class="text-red-600">*</span></label>
                <input name="id_num" value="{{ old('id_num') }}"
                       class="w-full border rounded p-2 @error('id_num') border-red-500 @enderror" required>
                @error('id_num') <p class="text-red-500 text-sm mt-1">Wajib diisi.</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Nama Peserta <span class="text-red-600">*</span></label>
                <input name="nama" value="{{ old('nama') }}"
                       class="w-full border rounded p-2 @error('nama') border-red-500 @enderror" required>
                @error('nama') <p class="text-red-500 text-sm mt-1">Wajib diisi.</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Jenis Kelamin <span class="text-red-600">*</span></label>
                <div class="flex space-x-4 mt-2">
                    <label><input type="radio" name="jeniskelamin" value="Pria"
                                  {{ old('jeniskelamin') == 'Pria' ? 'checked' : '' }}> Pria</label>
                    <label><input type="radio" name="jeniskelamin" value="Wanita"
                                  {{ old('jeniskelamin') == 'Wanita' ? 'checked' : '' }}> Wanita</label>
                </div>
                @error('jeniskelamin') <p class="text-red-500 text-sm mt-1">Wajib diisi.</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Tempat Lahir <span class="text-red-600">*</span></label>
                <input name="tempatlahir" value="{{ old('tempatlahir') }}"
                       class="w-full border rounded p-2 @error('tempatlahir') border-red-500 @enderror" required>
                @error('tempatlahir') <p class="text-red-500 text-sm mt-1">Wajib diisi.</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Tanggal Lahir <span class="text-red-600">*</span></label>
                <input type="date" name="tgllahir" value="{{ old('tgllahir') }}"
                       class="w-full border rounded p-2 @error('tgllahir') border-red-500 @enderror" required>
                @error('tgllahir') <p class="text-red-500 text-sm mt-1">Wajib diisi.</p> @enderror
            </div>

            {{-- Alamat --}}
            <div class="col-span-2">
                <label class="block text-sm font-medium">Alamat Lengkap <span class="text-red-600">*</span></label>
                <input name="alamatterakhir" value="{{ old('alamatterakhir') }}"
                       class="w-full border rounded p-2 @error('alamatterakhir') border-red-500 @enderror" required>
                @error('alamatterakhir') <p class="text-red-500 text-sm mt-1">Wajib diisi.</p> @enderror
            </div>

            <div><label class="block text-sm">Kecamatan</label><input name="kecamatan" class="w-full border rounded p-2"></div>
            <div><label class="block text-sm">Kelurahan</label><input name="kelurahan" class="w-full border rounded p-2"></div>
            <div><label class="block text-sm">Kota</label><input name="kotakab" class="w-full border rounded p-2"></div>
            <div><label class="block text-sm">Provinsi</label><input name="provinsi" class="w-full border rounded p-2"></div>

        </div>


        {{-- PEKERJAAN --}}
        <div class="mb-4">
            <h2 class="text-lg font-semibold mb-2">Pekerjaan</h2>

            <label class="block text-sm">Tanggal Mulai Kerja (TMT Kerja)</label>
            <input type="date" name="tmtkeja" class="w-full border rounded p-2 mb-4" required>

            {{-- Unit Mitra --}}
            <div class="mb-4">
                <label class="block text-sm font-medium">Pilih Unit Mitra</label>
                <select id="idunit" name="idunit" class="w-full border rounded p-2">
                    <option value="">-- Pilih Unit Mitra --</option>
                    @foreach($unitmitra as $unit)
                        <option value="{{ $unit->idunit }}">{{ $unit->idunit }} - {{ $unit->nama_um }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Mitra --}}
            <div class="mb-4">
                <label class="block text-sm font-medium">Pilih Mitra</label>
                <select id="idmitra_select" class="w-full border rounded p-2" disabled>
                    <option value="">-- Pilih Mitra --</option>
                </select>
            </div>

            <input type="hidden" name="idmitra" id="idmitra">
            <input type="hidden" name="namamitra" id="namamitra">

            <script>
                document.getElementById('idunit').addEventListener('change', function () {
                    const idunit = this.value;
                    const mitraSelect = document.getElementById('idmitra_select');

                    mitraSelect.innerHTML = '<option value="">-- Pilih Mitra --</option>';
                    mitraSelect.disabled = true;

                    if (idunit) {
                        fetch(`/get-mitra/${idunit}`)
                            .then(res => res.json())
                            .then(data => {
                                data.forEach(mitra => {
                                    mitraSelect.innerHTML += `<option value="${mitra.idmitra}">${mitra.idmitra} - ${mitra.nama_um}</option>`;
                                });
                                mitraSelect.disabled = false;
                            });
                    }
                });

                document.getElementById('idmitra_select').addEventListener('change', function () {
                    document.getElementById('idmitra').value = this.value;
                    document.getElementById('namamitra').value = this.options[this.selectedIndex].text;
                });
            </script>

            <div class="col-span-2">
                <label class="block text-sm">Pekerjaan</label>
                <input name="pekerjaanakhir" class="w-full border rounded p-2">
            </div>
        </div>


        {{-- KELUARGA --}}
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm">Status Nikah</label>
                <select name="statusnikah" class="w-full border rounded p-2" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Kawin">Kawin</option>
                    <option value="Tidak Kawin">Tidak Kawin</option>
                </select>
            </div>

            <div>
                <label class="block text-sm">Tanggal Perkawinan</label>
                <input type="date" name="tglkawin" class="w-full border rounded p-2">
            </div>

            <div class="col-span-2">
                <label class="block text-sm">Jumlah Anak</label>
                <input type="number" name="jumlahanak" class="w-full border rounded p-2">
            </div>
        </div>


        {{-- KEANGGOTAAN --}}
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm">Tanggal Pertama Iuran</label>
                <input type="date" name="tmtiuran" class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block text-sm">Tanggal Disahkan Sebagai Peserta</label>
                <input type="date" name="tglsahpeserta" class="w-full border rounded p-2">
            </div>

            <div class="col-span-2">
                <label class="block text-sm">Status Kartu</label>
                <select name="statuspeserta" class="w-full border rounded p-2">
                    <option value="">-- Pilih Status Kartu --</option>
                    <option value="Belum Dicetak">Belum Dicetak</option>
                    <option value="Sudah Dicetak">Sudah Dicetak</option>
                </select>
            </div>
        </div>


        {{-- TOMBOL --}}
        <div class="flex space-x-4">
            <a href="/daftarpesertaadmin" class="px-4 py-2 bg-gray-400 text-white rounded">Kembali</a>
            <button type="submit" class="px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">Submit</button>
        </div>

    </form>
</div>

@endsection
