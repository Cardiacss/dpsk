@extends('ADMIN.layouts.main')

@section('title', 'Terminasi Pensiun')

@section('breadcrumb')
<p class="text-muted" style="font-size: 14px;">
    <a href="/kepensiunan" style="text-decoration:none; color:#555;">Kepensiunan</a> /
    <a href="#" style="text-decoration:none; color:#2994A4;">Terminasi Pensiun</a>
</p>
@endsection

@section('artikel')
<div class="bg-white rounded-lg shadow p-6">
    <!-- Breadcrumb di konten -->
    <div class="text-sm text-gray-600 mb-4">
        <span>Kepensiunan</span> >
        <span class="text-blue-600 font-semibold">Terminasi</span>
    </div>

    <!-- Judul -->
    <h1 class="text-2xl font-bold mb-6">Terminasi Pensiun</h1>

    <!-- Tombol tampilkan semua -->
    <button class="mb-4 bg-[#2994A4] hover:bg-[#257f8d] text-white px-4 py-2 rounded shadow">
        Tampilkan semua Daftar Terminasi Pensiun
    </button>

 <!-- Filter -->
<form method="GET" action="{{ route('pensiun.terminasi') }}">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div>
            <label class="block text-sm font-medium text-gray-700">Nomor Peserta</label>
            <input type="text" name="nopeserta" value="{{ request('nopeserta') }}"
                   placeholder="Cari Nomor Peserta"
                   class="mt-1 w-full border rounded p-2 focus:ring focus:ring-[#2994A4] focus:outline-none"/>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Unit</label>
            <select name="idunit" class="mt-1 w-full border rounded p-2 focus:ring focus:ring-[#2994A4] focus:outline-none">
                <option value="">Pilih Unit</option>
                @foreach($unitmitra as $u)
                    <option value="{{ $u->idunit }}" {{ request('idunit') == $u->idunit ? 'selected' : '' }}>
                        {{ $u->nama_um }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="flex gap-2 mb-6">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Cari</button>
        <a href="{{ route('pensiun.terminasi') }}" class="bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded">
            Clear
        </a>
    </div>
</form>

    <!-- Tabel -->
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 text-sm">
            <thead class="bg-[#2994A4] text-white">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">No Pensiun</th>
                    <th class="px-4 py-2 border">Nama Pensiunan</th>
                    <th class="px-4 py-2 border">Pekerjaan</th>
                    <th class="px-4 py-2 border">Unit Terakhir</th>
                    <th class="px-4 py-2 border">Tanggal Pensiun</th>
                    <th class="px-4 py-2 border">Tanggal Berakhir</th>
                    <th class="px-4 py-2 border">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white text-gray-700">
    @forelse($pensiun as $index => $p)
        <tr class="border-t">
            <td class="px-4 py-2 border">{{ $index + 1 }}</td>
            <td class="px-4 py-2 border">{{ $p->nopensiun ?? '-' }}</td>
            <td class="px-4 py-2 border">{{ $p->peserta->nama ?? '-' }}</td>
            <td class="px-4 py-2 border">{{ $p->peserta->pkerjaanakhir ?? '-' }}</td>
            <td class="px-4 py-2 border">{{ $p->peserta->unit->nama_um ?? '-' }}</td>
            <td class="px-4 py-2 border">
                {{ $p->tmtpensiun ? $p->tmtpensiun->format('d-m-Y') : '-' }}
            </td>
            <td class="px-4 py-2 border">
                {{ $p->tglterminasi ? $p->tglterminasi->format('d-m-Y') : '-' }}
            </td>
            <td class="px-4 py-2 border text-center">
<a href="{{ route('pensiun.terminasi.detail', $p->idpensiun) }}" 
   class="text-blue-600 hover:text-blue-800 font-semibold">
   Detail
</a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="8" class="text-center text-gray-500 py-4">Tidak ada data terminasi pensiun.</td>
        </tr>
    @endforelse
</tbody>
        </table>
    </div>
</div>
@endsection