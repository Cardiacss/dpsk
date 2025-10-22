<!DOCTYPE html>
<html lang="id" x-data="{ mitra:false, kepesertaan:false, kepensiunan:false }" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Data Nilai Aktuaria</title>
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
      <!-- Home -->
      <a href="/menuadmin" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
        <span>🏠</span> <span>Home</span>
      </a>

      <!-- Mitra Dropdown -->
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
             :class="window.location.pathname.includes('mitra&sekolahadmin') 
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

      <!-- Logout -->
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
    </form>

    <!-- Table -->
    <div class="p-6 bg-white shadow-lg rounded-lg w-full">
  <h2 class="text-2xl font-bold text-[#2994A4] mb-4">
    Data Nilai Aktuaria Mitra: {{ $mitra->nama_um ?? 'Tidak diketahui' }}
  </h2>
    <div class="overflow-x-auto">
      <table class="w-full border-collapse border border-gray-300">
        <thead class="bg-[#2994A4] text-white">
          <tr>
            <th class="p-2 border">No</th>
            <th class="p-2 border">Bulan Berlaku</th>
            <th class="p-2 border">Tahun Berlaku</th>
            <th class="p-2 border">IP</th>
            <th class="p-2 border">IPK</th>
            <th class="p-2 border">Nilai Tambahan</th>
          </tr>
        </thead>
        <tbody class="text-center">
          @forelse ($nilaiAktuarias as $index => $n)
            <tr class="hover:bg-gray-100">
              <td class="p-2 border">{{ $index + 1 }}</td>
              <td class="p-2 border">{{ $n->blnberlaku }}</td>
              <td class="p-2 border">{{ $n->thnberlaku }}</td>
              <td class="p-2 border">{{ $n->ip }}</td>
              <td class="p-2 border">{{ $n->ipk }}</td>
              <td class="p-2 border">{{ $n->nilaitambahan }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="p-2 border text-gray-500">Belum ada data nilai aktuaria untuk mitra ini.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
