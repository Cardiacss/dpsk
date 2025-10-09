<!DOCTYPE html>
<html lang="id" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nilai Aktuaria</title>
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

 <nav class="flex-1 px-4 space-y-2">
      <!-- Home -->
      <a href="/dashboaroperator2" @click="currentPage='home'"
         class="flex items-center space-x-2 px-3 py-2 rounded"
         :class="currentPage==='home' ? 'bg-gray-200 text-black' : 'hover:bg-cyan-800'">
        <span>🏠</span> <span>Home</span>
      </a>

      <!-- Mitra Dropdown -->
      <div x-data="{ mitra: true }">
        <button @click="mitra = !mitra"
          class="w-full flex items-center justify-between p-2 hover:bg-[#257d8d] rounded">
          <div class="flex items-center space-x-3">
            <span>🤝</span> <span>Mitra</span>
          </div>
          <span x-text="mitra ? '▾' : '▸'"></span>
        </button>

        <div x-show="mitra" class="ml-8 mt-1 space-y-1" x-cloak>
          <a href="/mitra&sekolahope2"
             class="block p-2 hover:bg-[#257d8d] rounded">
             Mitra & Sekolah
          </a>

          <!-- Aktif di sini -->
          <a href="/nilaiaktuariaope2"
             class="block p-2 bg-gray-200 text-black rounded">
             Nilai Aktuaria
          </a>
        </div>
      </div>

      <!-- Logout -->
      <a href="/login" class="flex items-center space-x-3 p-2 hover:bg-red-600 rounded">
        <span>🚪</span> <span>Logout</span>
      </a>
    </nav>

    <div class="p-4 text-xs border-t border-white/20">
      Gedung Fakultas Teknologi Informasi <br>
      Universitas Kristen Satya Wacana <br>
      Jl. Dr. O. Notohamidjojo, Salatiga <br>
      <a href="mailto:ftik@uksw.edu" class="underline">ftik@uksw.edu</a>
    </div>
  </aside>

  <!-- Content -->
  <main class="flex-1 bg-white p-6 overflow-auto">
    <h1 class="text-2xl font-bold mb-6">NILAI AKTUARIA</h1>

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
            <th class="p-2 border">Nama Mitra</th>
            <th class="p-2 border">Action</th>
          </tr>
        </thead>

        <tbody class="text-center">
          <!-- Contoh satu data -->
          <tr>
            <td class="p-2 border">1</td>
            <td class="p-2 border">Mitra A</td>
            <td class="p-2 border">
              <div class="flex justify-center">
                <a href="/datanilaiaktuariaope2" 
                   class="bg-green-500 hover:bg-green-600 text-white px-4 py-1 rounded flex items-center gap-1">
                  📂 Buka
                </a>
              </div>
            </td>
          </tr>

          <!-- Placeholder jika tidak ada data -->
          <!--
          <tr>
            <td colspan="3" class="p-6 border text-gray-500">
              Belum ada data tersedia
            </td>
          </tr>
          -->
        </tbody>
      </table>
    </div>
  </main>
</div>

</body>
</html>
