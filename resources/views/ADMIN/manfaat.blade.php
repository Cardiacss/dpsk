@extends('ADMIN.layouts.main')

@section('title', 'Manfaat')

@section('breadcrumb')
<p class="text-muted" style="font-size: 14px;">
    <a href="/kepensiunanadmin" style="text-decoration:none; color:#555;">Kepensiunan</a> /
    <a href="/manfaatpensiunadmin" style="text-decoration:none; color:#2994A4;">Manfaat</a>
</p>
@endsection

@section('artikel')
<div class="container">
    <!-- Judul -->
    <h1 class="text-2xl font-bold mb-4">Pemberian Manfaat</h1>

    <!-- Form Filter -->
<form action="{{ route('manfaat.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <label class="block text-sm font-medium text-gray-700">Nama Peserta</label>
        <input type="text" name="nopeserta" value="{{ request('nopeserta') }}"
               class="mt-1 w-full border rounded p-2 focus:ring focus:ring-[#2994A4] focus:outline-none"/>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Mitra</label>
        <select name="mitra" class="mt-1 w-full border rounded p-2 focus:ring focus:ring-[#2994A4] focus:outline-none">
            <option value="">Pilih Mitra</option>
            @foreach($mitras as $m)
                <option value="{{ $m->nama_um }}" {{ request('mitra') == $m->nama_um ? 'selected' : '' }}>
                    {{ $m->nama_um }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="flex gap-2 mt-2 md:mt-0">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Cari</button>
        <a href="{{ route('manfaat.index') }}" class="bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded">Clear</a>
    </div>
</form>

    <!-- Tabel -->
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 text-sm">
            <thead class="bg-[#2994A4] text-white">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">No Pensiun</th>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Mitra</th>
                    <th class="px-4 py-2 border">Action</th>
                </tr>
            </thead>
<tbody class="bg-white text-gray-700">
@foreach($manfaat as $index => $item)
<tr>
    <td class="px-4 py-2 border text-center">{{ $index + 1 }}</td>
    <td class="px-4 py-2 border">{{ $item->nopensiun }}</td>
    <td class="px-4 py-2 border">
        {{ $item->peserta->nama ?? '-' }}
    </td>
    <td class="px-4 py-2 border">
        {{ $item->peserta->mitra->nama_um ?? '-' }}
    </td>
    <td class="px-4 py-2 border text-center">
        <a href="/cekmanfaat/{{ $item->idpensiun }}"
           class="inline-block bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded-lg shadow">
           Cek
        </a>
    </td>
</tr>
@endforeach
</tbody>
    </div>
</div>
@endsection
