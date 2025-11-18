<!DOCTYPE html>
<html lang="id" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Iuran Peserta</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100">

  <div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-[#2994A4] text-white flex flex-col" 
           x-data="{ kepesertaan:true, mitra:false, kepensiunan:false }">

      <div class="p-4 text-lg font-bold border-b border-white/20">
        DANA PENSIUN <br> SEKOLAH KRISTEN
      </div>

      <nav class="flex-1 px-4 space-y-2">
        <!-- Home -->
        <a href="/dashboardkepalasekolah" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
          <span>🏠</span> <span>Home</span>
        </a>

        <!-- Peserta -->
        <a href="/daftarpesertakepala" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
          <span>👤</span> <span>Peserta</span>
        </a>

        <!-- Kepesertaan Dropdown -->
        <div>
          <button @click="kepesertaan = !kepesertaan" 
                  class="w-full flex justify-between items-center px-3 py-2 bg-cyan-800 rounded">
            <span class="flex items-center space-x-2">
              <span>🧾</span> <span>Kepesertaan</span>
            </span>
            <span x-text="kepesertaan ? '▾' : '▸'"></span>
          </button>
          <div x-show="kepesertaan" class="pl-10 mt-1 space-y-1" x-cloak>
            <a href="/iuranpesertakepala" 
               class="block px-3 py-1 bg-white text-[#2994A4] font-semibold rounded">
              Iuran Peserta
            </a>
            <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">
              Simulasi Kepesertaan & Manfaat Pensiun
            </a>
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
            <a href="/mitra&sekolahkepala" class="block px-3 py-1 hover:bg-cyan-800 rounded">Mitra & Sekolah</a>
            <a href="/nilaiaktuariakepala" class="block px-3 py-1 hover:bg-cyan-800 rounded">Nilai Aktuaria</a>
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
            <a href="/pengajuanpensiunkepala" class="block px-3 py-1 hover:bg-cyan-800 rounded">Pengajuan Pensiun</a>
            <a href="/daftarpensiunkepala" class="block px-3 py-1 hover:bg-cyan-800 rounded">Lihat Pensiun</a>
            <a href="/pemberianmanfaatkepala" class="block px-3 py-1 hover:bg-cyan-800 rounded">Manfaat</a>
            <a href="/riwayatmanfaatkepala" class="block px-3 py-1 hover:bg-cyan-800 rounded">Riwayat</a>
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

  <!-- Konten -->
  <main class="flex-1 p-6 overflow-auto">
    <!-- Breadcrumb -->
    <div class="mb-4 text-sm text-gray-700">
      <span>Kepesertaan</span> &gt; <a href="/iuranpeserta" class="text-blue-600">Iuran Peserta</a>
    </div>

    <!-- Search -->
    <div class="mb-4">
      <input type="text" placeholder="Silahkan Cari Unit Anda"
             class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" />
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
      <table class="w-full border shadow rounded text-center">
        <thead class="bg-teal-700 text-white">
          <tr>
            <th class="px-4 py-2 border">Unit</th>
            <th class="px-4 py-2 border">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="px-4 py-2 border">Unit 1</td>
            <td class="px-4 py-2 border">
              <a href="/daftarpesertaiurankepala" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 inline-block">Buka</a>
            </td>
          </tr>
          <tr>
            <td class="px-4 py-2 border">Unit 2</td>
            <td class="px-4 py-2 border">
              <a href="/daftarpesertaiurankepala" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 inline-block">Buka</a>
            </td>
          </tr>
          <tr>
            <td class="px-4 py-2 border">Unit 3</td>
            <td class="px-4 py-2 border">
              <a href="/daftarpesertaiurankepala" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 inline-block">Buka</a>
            </td>
          </tr>
          <tr>
            <td class="px-4 py-2 border">Unit 4</td>
            <td class="px-4 py-2 border">
              <a href="/daftarpesertaiurankepala" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 inline-block">Buka</a>
            </td>
          </tr>
          <tr>
            <td class="px-4 py-2 border">Unit 5</td>
            <td class="px-4 py-2 border">
              <a href="/daftarpesertaiurankepala" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 inline-block">Buka</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</div>
</body>
</html>