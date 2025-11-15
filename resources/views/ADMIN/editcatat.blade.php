@extends('ADMIN.layouts.main')

@section('title', 'Edit Iuran Peserta')

@section('breadcrumb')
<p class="text-muted text-sm">
    <a href="/iuranpesertakepala" class="text-blue-600 hover:underline">Iuran Peserta</a> /
    <span>Edit</span>
</p>
@endsection

@section('artikel')
<div class="bg-white rounded-lg shadow p-6">

    <h2 class="text-2xl font-bold mb-4 text-[#2994A4] text-center">Edit Data Iuran Peserta</h2>

    <div class="text-gray-600 mb-6 text-center">
        <p>
            ID Anggota: <strong>{{ $iuran->idanggota }}</strong> |
            ID Iuran: <strong>{{ $iuran->id_iuran }}</strong>
        </p>
    </div>

    <form action="{{ url('/updatecatat/' . $iuran->idanggota . '/' . $iuran->id_iuran) }}" method="POST" class="space-y-4">
        @csrf

        {{-- Tanggal Setor --}}
        <div>
            <label class="block font-semibold mb-1">Tanggal Setor</label>
            <input type="date" name="tglsetor" 
                   value="{{ $iuran->tglsetor ? $iuran->tglsetor->format('Y-m-d') : '' }}" 
                   class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-[#2994A4]">
            @error('tglsetor')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- PhDP --}}
        <div>
            <label class="block font-semibold mb-1">PhDP</label>
            <input type="number" name="phdp" value="{{ old('phdp', $iuran->phdp) }}" 
                   placeholder="Masukkan PhDP" 
                   class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-[#2994A4]">
            @error('phdp')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- IPK --}}
        <div>
            <label class="block font-semibold mb-1">IPK</label>
            <input type="number" name="ipk_num" value="{{ old('ipk_num', $iuran->ipk_num) }}" 
                   placeholder="Rp" 
                   class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-[#2994A4]">
            @error('ipk_num')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- IP --}}
        <div>
            <label class="block font-semibold mb-1">IP</label>
            <input type="number" name="ip_num" value="{{ old('ip_num', $iuran->ip_num) }}" 
                   placeholder="Rp" 
                   class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-[#2994A4]">
            @error('ip_num')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Bulan dan Tahun Iuran --}}
        <div class="flex gap-4">
            <div class="flex-1">
                <label class="block font-semibold mb-1">Bulan Iuran</label>
                <select name="bln_iuran" 
                        class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-[#2994A4]">
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ $iuran->bln_iuran == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
                @error('bln_iuran')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex-1">
                <label class="block font-semibold mb-1">Gaji Pokok</label>
                <input type="number" name="gajipokok" 
                       value="{{ old('gajipokok', $iuran->gajipokok) }}" 
                       placeholder="Gaji Pokok" 
                       class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-[#2994A4]">
                @error('gajipokok')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex-1">
                <label class="block font-semibold mb-1">Tahun Iuran</label>
                <input type="number" name="thn_iuran" 
                       value="{{ old('thn_iuran', $iuran->thn_iuran) }}" 
                       placeholder="Tahun" 
                       class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-[#2994A4]">
                @error('thn_iuran')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Tombol Aksi --}}
        <div class="flex justify-between pt-6">
            <a href="{{ url()->previous() }}" 
               class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
               Kembali
            </a>

            <button type="submit" 
                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
