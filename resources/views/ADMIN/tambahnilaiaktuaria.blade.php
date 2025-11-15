@extends('ADMIN.layouts.main')

@section('title', 'Tambah Nilai Aktuaria')

@section('breadcrumb')
<p class="text-muted text-sm">
    <a href="/nilaiaktuariaadmin" class="text-blue-600 hover:underline">Nilai Aktuaria</a> /
    <span>Tambah</span>
</p>
@endsection

@section('artikel')
<h1 class="text-2xl font-bold mb-6">TAMBAH NILAI AKTUARIA</h1>

<form action="{{ route('nilaiaktuaria.store') }}" method="POST" class="max-w-xl space-y-4">
    @csrf

    <!-- ID Unit -->
    <div>
        <label class="block font-semibold mb-1 text-gray-700">ID Unit</label>
        <input type="text" name="idunit" value="{{ $mitra->idunit }}" readonly
               class="w-full border border-gray-300 bg-gray-100 text-gray-700 rounded px-3 py-2">
    </div>

    <!-- Nama Mitra -->
    <div>
        <label class="block font-semibold mb-1 text-gray-700">Nama Mitra</label>
        <input type="text" value="{{ $mitra->nama_um }}" readonly
               class="w-full border border-gray-300 bg-gray-100 text-gray-700 rounded px-3 py-2">
    </div>

    <!-- Tahun Aktuaria -->
    <div>
        <label class="block font-semibold mb-1 text-gray-700">Tahun Aktuaria</label>
        <input type="number" name="thnaktuaria" placeholder="Masukkan tahun aktuaria"
               class="w-full border border-gray-300 rounded px-3 py-2" required>
    </div>

    <!-- Bulan Berlaku -->
    <div>
        <label class="block font-semibold mb-1 text-gray-700">Bulan Berlaku</label>
        <input type="number" name="blnberlaku" placeholder="Masukkan bulan berlaku (1–12)"
               class="w-full border border-gray-300 rounded px-3 py-2" required>
    </div>

    <!-- Tahun Berlaku -->
    <div>
        <label class="block font-semibold mb-1 text-gray-700">Tahun Berlaku</label>
        <input type="number" name="thnberlaku" placeholder="Masukkan tahun berlaku"
               class="w-full border border-gray-300 rounded px-3 py-2" required>
    </div>

    <!-- IP -->
    <div>
        <label class="block font-semibold mb-1 text-gray-700">IP</label>
        <input type="number" name="ip" step="0.01" placeholder="Masukkan nilai IP"
               class="w-full border border-gray-300 rounded px-3 py-2" required>
    </div>

    <!-- IPK -->
    <div>
        <label class="block font-semibold mb-1 text-gray-700">IPK</label>
        <input type="number" name="ipk" step="0.01" placeholder="Masukkan nilai IPK"
               class="w-full border border-gray-300 rounded px-3 py-2" required>
    </div>

    <!-- Nilai Tambahan -->
    <div>
        <label class="block font-semibold mb-1 text-gray-700">Nilai Tambahan</label>
        <input type="number" name="nilaitambahan" step="0.01" placeholder="Masukkan nilai tambahan (opsional)"
               class="w-full border border-gray-300 rounded px-3 py-2">
    </div>

    <!-- Tombol -->
    <div class="flex items-center gap-3 mt-6">
        <button type="submit"
                class="bg-[#2994A4] text-white px-5 py-2 rounded hover:bg-cyan-700 transition">
            💾 Simpan Data
        </button>

        <a href="/datanilaiaktuariaadmin?idunit={{ $mitra->idunit }}"
           class="bg-gray-300 text-gray-800 px-5 py-2 rounded hover:bg-gray-400 transition">
            ↩️ Kembali
        </a>
    </div>

</form>
@endsection
