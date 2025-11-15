@extends('ADMIN.layouts.main')

@section('title', 'Edit Nilai Aktuaria')

@section('breadcrumb')
<p class="text-muted text-sm">
    <a href="/nilaiaktuariaadmin" class="text-blue-600 hover:underline">Nilai Aktuaria</a> /
    <span>Edit</span>
</p>
@endsection

@section('artikel')
<h1 class="text-2xl font-bold mb-6">EDIT NILAI AKTUARIA</h1>

<div class="bg-white p-6 shadow rounded">
    <form action="{{ route('nilaiaktuaria.update', $nilai->idaktuaria) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Tahun Aktuaria & Nama Mitra -->
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block font-semibold mb-1 text-gray-700">Tahun Aktuaria</label>
                <input type="text" name="thnaktuaria" value="{{ $nilai->thnaktuaria }}" readonly
                    class="w-full border bg-gray-100 text-gray-700 px-3 py-2 rounded">
            </div>

            <div>
                <label class="block font-semibold mb-1 text-gray-700">Nama Mitra</label>
                <input type="text" value="{{ $mitra->nama_um ?? '' }}" readonly
                    class="w-full border bg-gray-100 text-gray-700 px-3 py-2 rounded">
            </div>
        </div>

        <!-- IP, IPK, Nilai Tambahan -->
        <div class="grid grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block font-semibold mb-1 text-gray-700">IP</label>
                <input type="number" step="0.01" name="ip" value="{{ $nilai->ip }}" required
                    class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <label class="block font-semibold mb-1 text-gray-700">IPK</label>
                <input type="number" step="0.01" name="ipk" value="{{ $nilai->ipk }}" required
                    class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <label class="block font-semibold mb-1 text-gray-700">Nilai Tambahan</label>
                <input type="number" step="0.01" name="nilaitambahan" value="{{ $nilai->nilaitambahan }}"
                    class="w-full border px-3 py-2 rounded">
            </div>
        </div>

        <!-- Bulan Berlaku & Tahun Berlaku -->
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block font-semibold mb-1 text-gray-700">Bulan Berlaku</label>
                <input type="number" min="1" max="12" name="blnberlaku" value="{{ $nilai->blnberlaku }}" required
                    class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <label class="block font-semibold mb-1 text-gray-700">Tahun Berlaku</label>
                <input type="number" name="thnberlaku" value="{{ $nilai->thnberlaku }}" required
                    class="w-full border px-3 py-2 rounded">
            </div>
        </div>

        <!-- Tombol -->
        <div class="flex gap-4 mt-6">
            <button type="submit"
                class="bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700 transition">
                💾 Simpan Perubahan
            </button>

            <a href="{{ url('/datanilaiaktuariaadmin?idunit=' . $mitra->idunit) }}"
                class="bg-gray-500 text-white px-5 py-2 rounded hover:bg-gray-600 transition">
                ← Kembali
            </a>
        </div>
    </form>
</div>
@endsection
