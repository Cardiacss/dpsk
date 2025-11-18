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

            <!-- Peserta -->
            <a href="#" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
                <span>👤</span> <span>Peserta</span>
            </a>

            <!-- Kepesertaan Dropdown -->
            <div>
                <button @click="kepesertaan = !kepesertaan" class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
                    <span class="flex items-center space-x-2">
                        <span>🧾</span> <span>Kepesertaan</span>
                    </span>
                    <span x-text="mitra ? '▾' : '▸'"></span>
                </button>
                <div x-show="kepesertaan" class="pl-10 mt-1 space-y-1" x-cloak>
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Iuran Peserta</a>
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Simulasi Kepersetaan & Manfaat Pensiun</a>
                </div>
            </div>

            <!-- Mitra Dropdown -->
<div 
  x-data="{ mitra: window.location.pathname.includes('mitra') || window.location.pathname.includes('nilaiaktuariaadmin') }"
>
  <button @click="mitra = !mitra" 
          :class="mitra ? 'bg-cyan-800' : ''"
          class="w-full flex justify-between items-center px-3 py-2 rounded hover:bg-cyan-800">
    <span class="flex items-center space-x-2">
      <span>🤝</span> <span>Mitra</span>
    </span>
    <span x-text="mitra ? '▾' : '▸'"></span>
  </button>

  <div x-show="mitra" class="pl-10 mt-1 space-y-1" x-cloak>
    <!-- Mitra & Sekolah -->
    <a href="/mitra&sekolahadmin"
       :class="window.location.pathname.includes('mitra') 
                ? 'bg-white text-[#2994A4] font-semibold rounded block px-3 py-1' 
                : 'block px-3 py-1 hover:bg-cyan-800 rounded'">
      Mitra & Sekolah
    </a>

    <!-- Nilai Aktuaria -->
    <a href="/nilaiaktuariaadmin"
       :class="window.location.pathname.includes('nilaiaktuariaadmin') 
                ? 'bg-white text-[#2994A4] font-semibold rounded block px-3 py-1' 
                : 'block px-3 py-1 hover:bg-cyan-800 rounded'">
      Nilai Aktuaria
    </a>
  </div>
</div>


   <!-- Kepensiunan Dropdown -->
            <div>
                <button @click="kepensiunan = !kepensiunan" class="w-full flex justify-between items-center px-3 py-2 bg-cyan-800 rounded">
                    <span class="flex items-center space-x-2">
                        <span>📑</span> <span>Kepensiunan</span>
                    </span>
                    <span x-text="kepensiunan ? '▾' : '▸'"></span>
                </button>
                <div x-show="kepensiunan" class="pl-10 mt-1 space-y-1" x-cloak>
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Pengajuan Pensiun</a>
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Perubahan Pensiun</a>
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Lihat Pensiun</a>
                    <a href="" class="block px-3 py-1 hover:bg-cyan-800 rounded">Manfaat</a>
                    <!-- Aktif di sini -->
                    <a href="/riwayatmanfaatadmin" class="block px-3 py-1 bg-gray-200 text-black rounded">Riwayat</a>
                    <a href="/daftarterminasiadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Daftar Terminasi</a>
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

     <!-- Main Content -->
     <main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
        <div class="bg-white rounded-lg shadow p-6">
    <h1 class="text-xl font-bold mb-4">Riwayat Manfaat</h1>
    <nav class="text-sm mb-6 text-gray-600">
      Kepensiunan &gt; <span class="text-blue-600">Riwayat Manfaat</span>
    </nav>

    <!-- Pencarian -->
    <div class="mb-6">
      <label for="nomorPeserta" class="block text-red-600 mb-1">
        Cari peserta pensiunan berdasarkan nomor peserta/Mitra
      </label>
      <div class="flex items-center space-x-2">
        <input type="text" id="nomorPeserta" placeholder="Nomor Peserta"
               class="border rounded px-3 py-2 flex-1 shadow-sm focus:outline-none focus:ring-2 focus:ring-cyan-600">
        <button class="px-4 py-2 bg-cyan-600 text-white rounded shadow hover:bg-cyan-700">Cari</button>
        <button class="px-4 py-2 bg-gray-400 text-white rounded shadow hover:bg-gray-500">Clear</button>
      </div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
      <table class="min-w-full border border-gray-200">
        <thead class="bg-[#2994A4] text-white">
          <tr>
            <th class="px-4 py-2 text-left">No</th>
            <th class="px-4 py-2 text-left">Nomor Mitra</th>
            <th class="px-4 py-2 text-left">Nama Mitra</th>
            <th class="px-4 py-2 text-center">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <tr>
            <td class="px-4 py-2">1</td>
            <td class="px-4 py-2">123</td>
            <td class="px-4 py-2">Threcia</td>
            <td class="px-4 py-2 text-center">
  <a href="/riwayatmanfaat1admin" 
     class="px-3 py-1 bg-gray-500 text-white text-sm rounded hover:bg-gray-600">
    Pilih
  </a>
</td>
          </tr>
          <tr>
            <td class="px-4 py-2">2</td>
            <td class="px-4 py-2">123</td>
            <td class="px-4 py-2">Ivan</td>
            <td class="px-4 py-2 text-center">
  <a href="/riwayatmanfaat1admin" 
     class="px-3 py-1 bg-gray-500 text-white text-sm rounded hover:bg-gray-600">
    Pilih
  </a>
</td>
          </tr>
          <tr>
            <td class="px-4 py-2">3</td>
            <td class="px-4 py-2">123</td>
            <td class="px-4 py-2">Filbert</td>
            <td class="px-4 py-2 text-center">
  <a href="/riwayatmanfaat1admin" 
     class="px-3 py-1 bg-gray-500 text-white text-sm rounded hover:bg-gray-600">
    Pilih
  </a>
</td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>