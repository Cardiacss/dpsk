@extends('ADMIN.layouts.main')

@section('title', 'Detail & Edit Manfaat Pensiun')

@section('artikel')
<div class="bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold mb-6 text-teal-700">Detail & Edit Pemberian Manfaat</h1>

<form action="{{ route('cekmanfaat.update', $manfaat->idpensiun) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="grid grid-cols-3 gap-4 items-center">
            <label class="text-sm font-medium">No Peserta :</label>
            <input type="text" name="idanggota" value="{{ $manfaat->peserta->idanggota ?? '' }}" readonly
                   class="col-span-2 border rounded p-2 bg-gray-100">
        </div>

        <div class="grid grid-cols-3 gap-4 items-center">
            <label class="text-sm font-medium">Nama :</label>
            <input type="text" name="nama" value="{{ $manfaat->peserta->nama ?? '' }}" readonly
                   class="col-span-2 border rounded p-2 bg-gray-100">
        </div>

        <div class="grid grid-cols-3 gap-4 items-center">
            <label class="text-sm font-medium">Alamat :</label>
            <input type="text" name="alamat" value="{{ $manfaat->peserta->alamatterakhir ?? '' }}" readonly
                   class="col-span-2 border rounded p-2 bg-gray-50">
        </div>

        <div class="grid grid-cols-3 gap-4 items-center">
            <label class="text-sm font-medium">Jenis Manfaat :</label>
            <input type="text" name="statusmanfaat" value="{{ $manfaat->statusmanfaat ?? '' }}"
                   class="col-span-2 border rounded p-2">
        </div>

<div class="grid grid-cols-3 gap-4 items-center">
    <label class="text-sm font-medium">Jumlah Manfaat Pensiun (Rp.) :</label>
    <input type="text" name="nilai_mp" 
           value="{{ number_format($manfaat->nilai_mp ?? 0, 0, ',', '.') }}"
           class="col-span-2 border rounded p-2">
</div>

<div class="grid grid-cols-3 gap-4 items-center">
    <label class="text-sm font-medium">Tanggal Beri Manfaat :</label>
    <input type="date" name="tglberimanfaat" 
           value="{{ optional($manfaat->tgl_beri)->format('Y-m-d') ?? '' }}"
           class="col-span-2 border rounded p-2 bg-gray-50">
</div>

        <div class="grid grid-cols-3 gap-4 items-center">
            <label class="text-sm font-medium">Manfaat untuk :</label>
            <input type="number" name="manfaat_untuk" value="{{ $manfaat->manfaat_untuk ?? 0 }}" class="col-span-2 border rounded p-2 bg-gray-50">
        </div>

        <div class="grid grid-cols-3 gap-4 items-start">
            <label class="text-sm font-medium">Keterangan :</label>
            <textarea name="keterangan" rows="3" class="col-span-2 border rounded p-2 bg-gray-50">{{ $manfaat->keterangan ?? '' }}</textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
    