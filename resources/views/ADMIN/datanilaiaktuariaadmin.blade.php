<!DOCTYPE html>
<html lang="id" x-data="{ mitra:false, kepesertaan:false, kepensiunan:false }" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Operator 2</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-900">

  <div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-[#2994A4] text-white flex flex-col">
      <div class="p-4 text-lg font-bold border-b border-white/20">
        DANA PENSIUN <br> SEKOLAH KRISTEN
      </div>

      <nav class="flex-1 px-4 space-y-2" x-data="{ kepesertaan:false, mitra:false, kepensiunan:false }">
        <a href="/menuadmin" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
          <span>🏠</span> <span>Home</span>
        </a>

        <a href="#" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
          <span>👤</span> <span>Peserta</span>
        </a>

        <!-- Kepesertaan -->
        <div>
          <button @click="kepesertaan = !kepesertaan" class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
            <span class="flex items-center space-x-2">
              <span>🧾</span> <span>Kepesertaan</span>
            </span>
            <span x-text="kepesertaan ? '▾' : '▸'"></span>
          </button>
          <div x-show="kepesertaan" class="pl-10 mt-1 space-y-1" x-cloak>
            <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Iuran Peserta</a>
            <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Simulasi Kepersetaan & Manfaat Pensiun</a>
          </div>
        </div>

        <!-- Mitra -->
        <div x-data="{ mitra: window.location.pathname.includes('mitra') || window.location.pathname.includes('nilaiaktuariaadmin') }">
          <button @click="mitra = !mitra" 
                  :class="mitra ? 'bg-cyan-800' : ''"
                  class="w-full flex justify-between items-center px-3 py-2 rounded hover:bg-cyan-800">
            <span class="flex items-center space-x-2">
              <span>🤝</span> <span>Mitra</span>
            </span>
            <span x-text="mitra ? '▾' : '▸'"></span>
          </button>

          <div x-show="mitra" class="pl-10 mt-1 space-y-1" x-cloak>
            <a href="/mitra&sekolahadmin"
              :class="window.location.pathname.includes('mitra') 
                      ? 'bg-white text-[#2994A4] font-semibold rounded block px-3 py-1' 
                      : 'block px-3 py-1 hover:bg-cyan-800 rounded'">
              Mitra & Sekolah
            </a>

            <a href="/nilaiaktuariaadmin"
              :class="window.location.pathname.includes('nilaiaktuariaadmin') 
                      ? 'bg-white text-[#2994A4] font-semibold rounded block px-3 py-1' 
                      : 'block px-3 py-1 hover:bg-cyan-800 rounded'">
              Nilai Aktuaria
            </a>
          </div>
        </div>

        <!-- Kepensiunan -->
        <div>
          <button @click="kepensiunan = !kepensiunan" class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
            <span class="flex items-center space-x-2">
              <span>📑</span> <span>Kepensiunan</span>
            </span>
            <span x-text="kepensiunan ? '▾' : '▸'"></span>
          </button>
          <div x-show="kepensiunan" class="pl-10 mt-1 space-y-1" x-cloak>
            <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Pengajuan Pensiun</a>
            <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Perubahan Pensiun</a>
            <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Lihat Pensiun</a>
            <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Manfaat</a>
            <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Riwayat</a>
            <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Daftar Terminasi</a>
          </div>
        </div>

        <a href="/login" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
          <span>🚪</span> <span>Logout</span>
        </a>
      </nav>

      <div class="p-4 text-xs border-t border-white/20">
        Gedung Fakultas Teknologi Informasi <br />
        Universitas Kristen Satya Wacana <br />
        Jl. Dr. O. Notohamidjojo, Salatiga <br />
        <a href="mailto:ftik@uksw.edu" class="underline">ftik@uksw.edu</a>
      </div>
    </aside>

    <!-- Content -->
    <main class="flex-1 bg-white p-6 overflow-auto">
      <h1 class="text-2xl font-bold mb-3">DATA NILAI AKTUARIA</h1>

      <!-- Tombol Tambah Nilai Aktuaria -->
      <div class="mb-6">
        <a href="{{ route('nilaiaktuaria.create', ['idunit' => $mitra->idunit]) }}"
           class="inline-flex items-center gap-2 bg-[#2994A4] text-white px-4 py-2 rounded hover:bg-cyan-700 transition">
          ➕ <span>Tambah Nilai Aktuaria</span>
        </a>
      </div>

      <!-- Search -->
      <div class="flex items-center gap-3 mb-4">
        <input type="text" placeholder="Masukkan data peserta yang ingin dicari"
          class="flex-1 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#2994A4]">
        <button class="p-2 rounded hover:bg-gray-200 transition" title="Filter">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-[#2994A4]">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M3 4.5h18M6 9.75h12M9 15h6m-3 4.5v-4.5" />
          </svg>
        </button>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto bg-white shadow rounded">
        <table class="w-full border-collapse">
          <thead class="bg-[#2994A4] text-white">
            <tr>
              <th class="p-2 border">No</th>
              <th class="p-2 border">Tahun</th>
              <th class="p-2 border">Nama Mitra</th>
              <th class="p-2 border">Ip</th>
              <th class="p-2 border">Ipk</th>
              <th class="p-2 border">Nilai Tambah</th>
              <th class="p-2 border">Action</th>
            </tr>
          </thead>
          <tbody class="text-center">
  @forelse ($nilaiAktuarias as $index => $item)
    <tr>
      <td class="p-2 border">{{ $index + 1 }}</td>
      <td class="p-2 border">{{ $item->thnaktuaria }}</td>
      <td class="p-2 border">{{ $mitra->nama_um ?? 'Tidak Diketahui' }}</td>
      <td class="p-2 border">{{ $item->ip }}</td>
      <td class="p-2 border">{{ $item->ipk }}</td>
      <td class="p-2 border">{{ $item->nilaitambahan ?? '-' }}</td>
      <td class="p-2 border">
        <div class="flex justify-center gap-2">
          <a href="{{ route('nilaiaktuaria.edit', $item->thnaktuaria) }}"
             class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">
            ✏️ Edit
          </a>
          <form action="{{ route('nilaiaktuaria.destroy', $item->thnaktuaria) }}" method="POST"
                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
              🗑️ Hapus
            </button>
          </form>
        </div>
      </td>
    </tr>
  @empty
    <tr>
      <td colspan="7" class="p-2 border text-gray-500" style="height:100px;">
        Belum ada data tersedia
      </td>
    </tr>
  @endforelse
</tbody>
        </table>
      </div>
    </main>
  </div>

</body>
</html>