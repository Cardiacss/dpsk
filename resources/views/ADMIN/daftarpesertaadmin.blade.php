<!DOCTYPE html>
<html lang="id" xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Menu Admin - Daftar Peserta</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="bg-gray-900">

  <div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-[#2994A4] text-white flex flex-col"
      x-data="{ kepesertaan:false, mitra:false, kepensiunan:false, master:false }">

      <!-- Header -->
      <div class="p-4 text-lg font-bold border-b border-white/20">
        DANA PENSIUN <br> SEKOLAH KRISTEN
      </div>

      <!-- Menu -->
      <nav class="flex-1 px-4 space-y-2">
        <a href="/menuadmin" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
          <span>🏠</span> <span>Home</span>
        </a>

        <!-- Peserta -->
        <a href="/daftarpesertaadmin" class="block px-3 py-1 bg-gray-200 text-black rounded">
          <span>👤</span> <span>Peserta</span>
        </a>

        <!-- Kepesertaan Dropdown -->
        <div>
          <button @click="kepesertaan = !kepesertaan"
            class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
            <span class="flex items-center space-x-2">
              <span>🧾</span> <span>Kepesertaan</span>
            </span>
            <span x-text="kepesertaan ? '▾' : '▸'"></span>
          </button>
          <div x-show="kepesertaan" class="pl-10 mt-1 space-y-1" x-cloak>
            <a href="/iuranpesertaadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Iuran Peserta</a>
            <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Simulasi Kepesertaan & Manfaat Pensiun</a>
          </div>
        </div>

        <!-- Mitra Dropdown -->
        <div>
          <button @click="mitra = !mitra"
            class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
            <span class="flex items-center space-x-2">
              <span>🤝</span> <span>Mitra</span>
            </span>
            <span x-text="mitra ? '▾' : '▸'"></span>
          </button>
          <div x-show="mitra" class="pl-10 mt-1 space-y-1" x-cloak>
            <a href="/mitra&sekolahadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Mitra & Sekolah</a>
            <a href="/nilaiaktuariaadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Nilai Aktuaria</a>
          </div>
        </div>

        <!-- Kepensiunan Dropdown -->
        <div>
          <button @click="kepensiunan = !kepensiunan"
            class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
            <span class="flex items-center space-x-2">
              <span>📑</span> <span>Kepensiunan</span>
            </span>
            <span x-text="kepensiunan ? '▾' : '▸'"></span>
          </button>
          <div x-show="kepensiunan" class="pl-10 mt-1 space-y-1" x-cloak>
            <a href="/pengajuanpensiunadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Pengajuan Pensiun</a>
            <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Perubahan Pensiun</a>
            <a href="/daftarpensiunadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Lihat Pensiun</a>
            <a href="/pemberianmanfaatadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Manfaat</a>
            <a href="/riwayatmanfaatadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Riwayat</a>
            <a href="/daftarterminasiadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Daftar Terminasi</a>
          </div>
        </div>

        <!-- Master -->
        <div>
          <button @click="master = !master"
            class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
            <span class="flex items-center space-x-2">
              <span>⚙️</span> <span>Master</span>
            </span>
            <span x-text="master ? '▾' : '▸'"></span>
          </button>
          <div x-show="master" class="pl-10 mt-1 space-y-1" x-cloak>
            <a href="/users" class="block px-3 py-1 hover:bg-cyan-800 rounded">Users</a>
            <a href="/roles" class="block px-3 py-1 hover:bg-cyan-800 rounded">Roles</a>
          </div>
        </div>

        <!-- Logout -->
        <form action="{{ route('logout') }}" method="POST" class="mt-2">
          @csrf
          <button type="submit"
            class="flex items-center space-x-2 px-3 py-2 w-full text-left hover:bg-cyan-800 rounded">
            <span>🚪</span> <span>Logout</span>
          </button>
        </form>
      </nav>

      <!-- Footer -->
      <div class="p-4 text-xs border-t border-white/20">
        Gedung Fakultas Teknologi Informasi <br />
        Universitas Kristen Satya Wacana <br />
        Jl. Dr. O. Notohamidjojo, Salatiga <br />
        <a href="mailto:ftik@uksw.edu" class="underline">ftik@uksw.edu</a>
      </div>
    </aside>

    <!-- Konten utama -->
    <main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
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
                  <td class="px-4 py-2">{{ $p->idmitra }}</td>
                  <td class="px-4 py-2">{{ $p->idunit }}</td>
                  <td class="px-4 py-2">{{ $p->statuspeserta }}</td>
                  <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('peserta.edit', ['idanggota' => $p->idanggota]) }}"
                      class="px-3 py-1 bg-teal-600 text-white text-sm rounded hover:bg-teal-700">
                      Ubah
                    </a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')"
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
    </main>
  </div>
</body>

</html>