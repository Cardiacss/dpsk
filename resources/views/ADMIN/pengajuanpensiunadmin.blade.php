@extends('ADMIN.layouts.main')

@section('title', 'Pengajuan Pensiun')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        Kepesertaan › <span class="text-[#2994A4]">Pengajuan Pensiun</span>
    </p>
@endsection

@section('artikel')
<div class="bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold mb-6 text-center">Daftar Peserta Aktif</h1>

    <!-- Filter -->
    <form method="GET" action="{{ url('/pengajuanpensiun') }}" class="flex gap-4 mb-6 flex-wrap">
        <div class="flex-1 min-w-[250px]">
            <label class="block text-gray-700 mb-1">Nomor Peserta</label>
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Masukan nomor peserta..."
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <div class="flex-1 min-w-[250px]">
            <label class="block text-gray-700 mb-1">Mitra</label>
            <select name="idmitra" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                <option value="">Semua Mitra</option>
                @foreach ($mitraList as $m)
                    <option value="{{ $m->idmitra }}" {{ $idmitra == $m->idmitra ? 'selected' : '' }}>
                        {{ $m->nama_um }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex items-end gap-2">
            <button type="submit" class="px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">Cari</button>
            <a href="{{ url('/pengajuanpensiun') }}" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Clear</a>
        </div>
    </form>

    <!-- Tabel Peserta -->
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-teal-600 text-white">
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">No Peserta</th>
                    <th class="px-4 py-2 text-left">Nama Peserta</th>
                    <th class="px-4 py-2 text-left">Mitra</th>
                    <th class="px-4 py-2 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($peserta as $index => $p)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $p->nopeserta }}</td>
                        <td class="px-4 py-2">{{ $p->nama }}</td>
                        <td class="px-4 py-2">{{ $p->mitra->nama_um ?? '-' }}</td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ url('formpengajuanpensiunadmin/' . $p->idanggota) }}"
                               class="px-3 py-1 bg-teal-600 text-white text-sm rounded hover:bg-teal-700">
                                Pilih
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-3 text-gray-500">Tidak ada peserta ditemukan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
