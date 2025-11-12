@extends('ADMIN.layouts.main')

@section('title', 'Edit Pensiun')

@section('breadcrumb')
@endsection

@section('artikel')
<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-8">
    <h1 class="text-xl font-semibold mb-6">Edit Pensiun - {{ $pensiun->peserta->nama ?? '-' }}</h1>

    <form action="#" method="POST" class="space-y-4">
        @csrf
        <div>
            <label>No Pensiun</label>
            <input type="text" value="{{ $pensiun->nopensiun }}" class="border rounded p-2 w-full">
        </div>
        <div>
            <label>Status Pensiun</label>
            <select class="border rounded p-2 w-full">
                <option {{ $pensiun->statuspensiun == 'JANDA' ? 'selected' : '' }}>JANDA</option>
                <option {{ $pensiun->statuspensiun == 'DUDA' ? 'selected' : '' }}>DUDA</option>
                <option {{ $pensiun->statuspensiun == 'PENSIUN' ? 'selected' : '' }}>PENSIUN</option>
            </select>
        </div>
        <div>
            <label>Status Manfaat</label>
            <select class="border rounded p-2 w-full">
                <option {{ $pensiun->statusmanfaat == 'NORMAL' ? 'selected' : '' }}>NORMAL</option>
                <option {{ $pensiun->statusmanfaat == 'TERTUNDA' ? 'selected' : '' }}>TERTUNDA</option>
                <option {{ $pensiun->statusmanfaat == 'DIPERPANJANG' ? 'selected' : '' }}>DIPERPANJANG</option>
            </select>
        </div>
        <div>
            <label>Keterangan</label>
            <textarea class="border rounded p-2 w-full">{{ $pensiun->keterangan }}</textarea>
        </div>

        <button type="submit" class="bg-[#2994A4] text-white px-6 py-2 rounded hover:bg-cyan-700">Simpan</button>
    </form>
</div>
@endsection
