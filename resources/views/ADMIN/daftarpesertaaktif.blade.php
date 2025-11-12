@extends('ADMIN.layouts.main')

@section('title', 'Daftar Pensiunan')

@section('breadcrumb')
@endsection

@section('artikel')

<div class="overflow-x-auto">
    <table class="min-w-full text-sm text-center border border-gray-200">
        <thead class="bg-[#2994A4] text-white">
            <tr>
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">No Pensiun</th>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Status Pensiun</th>
                <th class="px-4 py-2">Status Manfaat</th>
                <th class="px-4 py-2">Keterangan</th>
                <th class="px-4 py-2">Status Hidup</th>
                <th class="px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pensiuns as $item)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                <td class="px-4 py-2">{{ $item->nopensiun }}</td>
                <td class="px-4 py-2">{{ $item->peserta->nama ?? '-' }}</td>
                <td class="px-4 py-2">{{ $item->statuspensiun }}</td>
                <td class="px-4 py-2">{{ $item->statusmanfaat }}</td>
                <td class="px-4 py-2">{{ $item->keterangan }}</td>
                <td class="px-4 py-2">{{ $item->statushidup ? 'Hidup' : 'Meninggal' }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('detailpesertapensiun', $item->idanggota) }}" class="bg-[#2994A4] text-white px-3 py-1 rounded hover:bg-cyan-700 text-xs">Lihat Detail</a>
                    <a href="{{ route('editpensiun', $item->idpensiun) }}" class="bg-[#2994A4] text-white px-3 py-1 rounded hover:bg-cyan-700 text-xs">Edit</a>
                    <a href="{{ route('cekmanfaat', $item->idpensiun) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-xs">Cek</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="px-4 py-2 text-center">Belum ada data pensiun</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
