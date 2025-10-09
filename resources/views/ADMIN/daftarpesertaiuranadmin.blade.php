<!DOCTYPE html>
<html lang="id" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Menu Admin</title>
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
        <!-- Home -->
        <a href="/menuadmin" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
          <span>🏠</span> <span>Home</span>
        </a>

        <!-- Peserta -->
            <a href="/daftarpesertaadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">
                <span>👤</span> <span>Peserta</span>
            </a>

      <!-- Kepesertaan Dropdown -->
<div x-data="{ kepesertaan: window.location.pathname.includes('iuranpesertaadmin') }">
  <button @click="kepesertaan = !kepesertaan" 
          :class="kepesertaan ? 'bg-cyan-800' : ''"
          class="w-full flex justify-between items-center px-3 py-2 rounded hover:bg-cyan-800">
    <span class="flex items-center space-x-2">
      <span>🧾</span> <span>Kepesertaan</span>
    </span>
    <span x-text="kepesertaan ? '▾' : '▸'"></span>
  </button>

  <div x-show="kepesertaan" class="pl-10 mt-1 space-y-1" x-cloak>
    <a href="/iuranpesertaadmin" 
       :class="window.location.pathname.includes('iuranpesertaadmin') 
                ? 'bg-white text-[#2994A4] font-semibold rounded block px-3 py-1' 
                : 'block px-3 py-1 hover:bg-cyan-800 rounded'">
      Iuran Peserta
    </a>
    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">
      Simulasi Kepesertaan & Manfaat Pensiun
    </a>
  </div>
</div>



          <!-- Mitra Dropdown -->
            <div>
                <button @click="mitra = !mitra" class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
                    <span class="flex items-center space-x-2">
                        <span>🤝</span> <span>Mitra</span>
                    </span>
                <span x-text="mitra ? '▾' : '▸'"></span>
                </button>
                <div x-show="mitra" class="pl-10 mt-1 space-y-1" x-cloak>
                    <a href="/mitra&sekolahadmin"  class="block px-3 py-1 hover:bg-cyan-800 rounded">Mitra & Sekolah</a>
                    <a href="/nilaiaktuariaadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Nilai Aktuaria</a>
                </div>
            </div>

         <!-- Kepensiunan Dropdown -->
            <div>
                <button @click="kepensiunan = !kepensiunan" class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
                    <span class="flex items-center space-x-2">
                        <span>📑</span> <span>Kepensiunan</span>
                    </span>
                    <span x-text="mitra ? '▾' : '▸'"></span>
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
        <a href="/login" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
          <span>🚪</span> <span>Logout</span>
        </a>
      </nav>

      <!-- Footer -->
      <div class="p-4 text-xs border-t border-white/20">
        Gedung Fakultas Teknologi Informasi <br />
        Universitas Kristen Satya Wacana <br />
        Jl. Dr. O. Notohamidjojo, Salatiga <br />
        <a href="mailto:ftik@uksw.edu" class="underline">ftik@uksw.edu</a>
      </div>
    </aside>

    <!-- Konten -->
  <main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
        <div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold mb-4">Daftar Peserta</h2>
            <!-- Search -->
    <input type="text" placeholder="Silahkan Cari Nama/Kode"
           class="border w-full p-2 mb-6 rounded shadow">

    <!-- Table -->
    <table class="w-1/2 border-collapse shadow">
      <thead>
        <tr class="bg-teal-700 text-white">
          <th class="border px-4 py-2">No</th>
          <th class="border px-4 py-2">Nama</th>
          <th class="border px-4 py-2">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="border px-4 py-2 text-center">1</td>
          <td class="border px-4 py-2">Andi</td>
          <td class="border px-4 py-2 text-center">
            <a href="/daftarpesertaiuran1kepala" 
               class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 inline-block">
              Buka
            </a>
          </td>
        </tr>
        <tr>
          <td class="border px-4 py-2 text-center">2</td>
          <td class="border px-4 py-2">Budi</td>
          <td class="border px-4 py-2 text-center">
            <a href="/daftarpesertaiuran1kepala" 
               class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 inline-block">
              Buka
            </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>