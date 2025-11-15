    @extends('ADMIN.layouts.main')

    @section('title', 'Edit Mitra & Sekolah')

    @section('breadcrumb')
    <p class="text-muted text-sm">
        <a href="/mitra&sekolahadmin" class="text-blue-600 hover:underline">Mitra & Sekolah</a> /
        <span>Edit</span>
    </p>
    @endsection

    @section('artikel')
    <div class="bg-white p-8 rounded-lg shadow-md">

        <h2 class="text-2xl font-semibold mb-6 text-center text-gray-800">
            Edit Mitra & Sekolah
        </h2>

        <form action="{{ route('unit.update', $unit->idunit) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-6">

                <!-- Kode Unit -->
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Kode Unit</label>
                    <input type="text" value="{{ $unit->idunit }}" readonly
                        class="w-full border border-gray-300 bg-gray-100 p-2 rounded">
                </div>

                <!-- Nama Unit -->
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Nama Unit/Mitra</label>
                    <input type="text" name="nama_um" value="{{ $unit->nama_um }}" readonly
                        class="w-full border border-gray-300 p-2 rounded">
                </div>

                <!-- Alamat -->
                <div class="col-span-2">
                    <label class="block mb-1 font-semibold text-gray-700">Alamat Unit/Mitra</label>
                    <input type="text" name="alamat_um" value="{{ $unit->alamat_um }}"
                        class="w-full border border-gray-300 p-2 rounded">
                </div>

                <!-- Kelurahan -->
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Kelurahan</label>
                    <input type="text" name="kelurahan" value="{{ $unit->kelurahan }}"
                        class="w-full border border-gray-300 p-2 rounded">
                </div>

                <!-- Kecamatan -->
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Kecamatan</label>
                    <input type="text" name="kecamatan" value="{{ $unit->kecamatan }}"
                        class="w-full border border-gray-300 p-2 rounded">
                </div>

                <!-- Kota/Kabupaten -->
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Kota/Kabupaten</label>
                    <input type="text" name="kotakab" value="{{ $unit->kotakab }}"
                        class="w-full border border-gray-300 p-2 rounded">
                </div>

                <!-- Provinsi -->
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Provinsi</label>
                    <input type="text" name="provinsi" value="{{ $unit->provinsi }}"
                        class="w-full border border-gray-300 p-2 rounded">
                </div>

                <!-- Status -->
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Status</label>
                    <select name="stat_um" class="w-full border border-gray-300 p-2 rounded">
                        <option value="Aktif" {{ $unit->stat_um == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Nonaktif" {{ $unit->stat_um == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                <!-- IP dan IPK -->
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Iuran Peserta (%)</label>
<input type="number" step="0.01" name="ip_pct" 
       value="{{ $unit->ip_pct ?? $nilaiAktuaria->ip }}"
       class="w-full border border-gray-300 p-2 rounded">
                </div>

                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Iuran Pemberi Kerja (%)</label>
<input type="number" step="0.01" name="ipk_pct" 
       value="{{ $unit->ipk_pct ?? $nilaiAktuaria->ipk }}"
       class="w-full border border-gray-300 p-2 rounded">   
                </div>

            </div>

            <div class="mt-8 text-right">
                <a href="/mitra&sekolahadmin"
                class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">
                    Kembali
                </a>

                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    Simpan Perubahan
                </button>
            </div>
        </form>

    </div>
    @endsection
