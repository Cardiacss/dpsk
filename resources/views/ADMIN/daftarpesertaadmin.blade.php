@extends('ADMIN.layouts.main')

@section('title', 'Daftar Peserta')

@section('artikel')
<div class="flex flex-col">
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-center mb-6">Daftar Peserta</h1>

        <div class="mb-4">
            <a href="/pendaftaranpesertaadmin"
               class="px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-700 flex items-center space-x-2 w-fit">
                <span>➕</span>
                <span>Tambah Peserta</span>
            </a>
        </div>

        <!-- Form Filter dan Pencarian -->
        <div class="flex flex-wrap items-center gap-2 mb-4">
            <form action="{{ route('peserta.index') }}" method="GET" class="flex flex-wrap gap-2 w-full">
                <select name="filter" class="border rounded px-3 py-2">
                    <option value="">Filter Berdasarkan</option>
                    <option value="Nomor" {{ $filter == 'Nomor' ? 'selected' : '' }}>Nomor</option>
                    <option value="Nama" {{ $filter == 'Nama' ? 'selected' : '' }}>Nama</option>
                    <option value="Mitra" {{ $filter == 'Mitra' ? 'selected' : '' }}>Mitra</option>
                </select>
                <input type="text" name="search" value="{{ $search }}" placeholder="Masukkan data peserta..."
                       class="flex-1 border rounded px-3 py-2">
                <button type="submit" class="bg-cyan-600 text-white px-4 py-2 rounded hover:bg-cyan-700">Cari</button>
                <a href="{{ route('peserta.index') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Reset</a>
            </form>
        </div>

        <!-- Tabel Daftar Peserta -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded">
                <thead class="bg-teal-600 text-white">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">No Peserta</th>
                        <th class="px-4 py-2 border">Nama Peserta</th>
                        <th class="px-4 py-2 border">Mitra</th>
                        <th class="px-4 py-2 border">Unit</th>
                        <th class="px-4 py-2 border">Status</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($peserta as $p)
                        <tr class="border-t text-center hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $loop->iteration + ($peserta->currentPage() - 1) * $peserta->perPage() }}</td>
                            <td class="px-4 py-2">{{ $p->nopeserta }}</td>
                            <td class="px-4 py-2">{{ $p->nama }}</td>
                            <td class="px-4 py-2">{{ $p->mitra->nama_um ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $p->unit->nama_um ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $p->statuspeserta }}</td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="{{ route('peserta.edit', ['idanggota' => $p->idanggota]) }}"
                                   class="px-3 py-1 bg-teal-600 text-white text-sm rounded hover:bg-teal-700">
                                   Ubah
                                </a>
                                <form action="{{ route('peserta.destroy', $p->idanggota) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700">
                                        Hapus
                                    </button>
                                </form>
                                <a href="{{ route('peserta.showDetail', ['idanggota' => $p->idanggota]) }}"
                                   class="px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                                   Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-gray-500">Tidak ada data peserta.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $peserta->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection
  