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
<div 
  x-data="{ kepensiunan: window.location.pathname.includes('pengajuanpensiunadmin') 
                        || window.location.pathname.includes('perubahanpensiunadmin') 
                        || window.location.pathname.includes('lihatpensiunadmin') 
                        || window.location.pathname.includes('daftarpensiunadmin') 
                        || window.location.pathname.includes('manfaatpensiunadmin') 
                        || window.location.pathname.includes('riwayatpensiunadmin') 
                        || window.location.pathname.includes('terminasipensiunadmin') }"
>
  <button @click="kepensiunan = !kepensiunan" 
          :class="kepensiunan ? 'bg-cyan-800' : ''"
          class="w-full flex justify-between items-center px-3 py-2 rounded hover:bg-cyan-800">
    <span class="flex items-center space-x-2">
      <span>📑</span> <span>Kepensiunan</span>
    </span>
    <span x-text="kepensiunan ? '▾' : '▸'"></span>
  </button>

  <div x-show="kepensiunan" class="pl-10 mt-1 space-y-1" x-cloak>
    <!-- Pengajuan Pensiun -->
    <a href="/pengajuanpensiunadmin"
       :class="window.location.pathname.includes('pengajuanpensiunadmin') 
                ? 'bg-white text-[#2994A4] font-semibold rounded block px-3 py-1' 
                : 'block px-3 py-1 hover:bg-cyan-800 rounded'">
      Pengajuan Pensiun
    </a>

    <!-- Perubahan Pensiun -->
    <a href="/perubahanpensiunadmin"
       :class="window.location.pathname.includes('perubahanpensiunadmin') 
                ? 'bg-white text-[#2994A4] font-semibold rounded block px-3 py-1' 
                : 'block px-3 py-1 hover:bg-cyan-800 rounded'">
      Perubahan Pensiun
    </a>

    <!-- Lihat Pensiun -->
    <a href="/daftarpensiunadmin"
       :class="window.location.pathname.includes('daftarpensiunadmin') 
                || window.location.pathname.includes('lihatpensiunadmin') 
                ? 'bg-white text-[#2994A4] font-semibold rounded block px-3 py-1' 
                : 'block px-3 py-1 hover:bg-cyan-800 rounded'">
      Lihat Pensiun
    </a>

    <!-- Manfaat -->
    <a href="/manfaatpensiunadmin"
       :class="window.location.pathname.includes('manfaatpensiunadmin') 
                ? 'bg-white text-[#2994A4] font-semibold rounded block px-3 py-1' 
                : 'block px-3 py-1 hover:bg-cyan-800 rounded'">
      Manfaat
    </a>

    <!-- Riwayat -->
    <a href="/riwayatpensiunadmin"
       :class="window.location.pathname.includes('riwayatpensiunadmin') 
                ? 'bg-white text-[#2994A4] font-semibold rounded block px-3 py-1' 
                : 'block px-3 py-1 hover:bg-cyan-800 rounded'">
      Riwayat
    </a>

    <!-- Daftar Terminasi -->
    <a href="/terminasipensiunadmin"
       :class="window.location.pathname.includes('terminasipensiunadmin') 
                ? 'bg-white text-[#2994A4] font-semibold rounded block px-3 py-1' 
                : 'block px-3 py-1 hover:bg-cyan-800 rounded'">
      Daftar Terminasi
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

    <!-- Main Content -->
 <main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
        <div class="bg-white rounded-lg shadow p-6">
      <h1 class="text-2xl font-bold text-center mb-6">Daftar Pensiunan</h1>

      <!-- Breadcrumb -->
      <div class="mb-6 text-sm">
        <span>Kepesertaan</span> > 
        <a href="lihatpensiun.html" class="text-blue-600 hover:underline">Lihat Pensiun</a>
      </div>

      <!-- Form Pencarian -->
      <div class="flex items-center space-x-4 mb-6">
        <div class="flex-1">
          <label class="block text-sm">Nomor Peserta</label>
          <input type="text" placeholder="Masukkan nomor peserta yang ingin dicari" class="w-full border rounded p-2">
        </div>
        <div>
          <label class="block text-sm">Mitra</label>
          <select class="border rounded p-2">
            <option>LPPK SALATIGA</option>
            <option>LPPK SEMARANG</option>
          </select>
        </div>
        <div class="flex space-x-2 pt-5">
          <button class="px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">Cari</button>
          <button class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Clear</button>
          <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Tampilkan Semua</button>
        </div>
      </div>

      <!-- Tabel -->
      <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300">
          <thead class="bg-teal-700 text-white">
            <tr>
              <th class="border border-gray-300 px-4 py-2">No</th>
              <th class="border border-gray-300 px-4 py-2">No Pensiun</th>
              <th class="border border-gray-300 px-4 py-2">Nama</th>
              <th class="border border-gray-300 px-4 py-2">Status Pensiun</th>
              <th class="border border-gray-300 px-4 py-2">Status Manfaat</th>
              <th class="border border-gray-300 px-4 py-2">Keterangan</th>
              <th class="border border-gray-300 px-4 py-2">Status Hidup</th>
              <th class="border border-gray-300 px-4 py-2">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr class="text-center">
              <td class="border px-4 py-2">1</td>
              <td class="border px-4 py-2">123</td>
              <td class="border px-4 py-2">Thresia</td>
              <td class="border px-4 py-2">JANUDD</td>
              <td class="border px-4 py-2">NORMAL</td>
              <td class="border px-4 py-2">-</td>
              <td class="border px-4 py-2">Hidup</td>
             <td class="border px-4 py-2 space-x-2">
  <a href="/detailpensiunadmin" 
     class="px-3 py-1 bg-blue-500 text-white text-sm rounded hover:bg-blue-600">
     Lihat Detail
  </a>
  <a href="/ubahpensiunadmin" 
     class="px-3 py-1 bg-teal-600 text-white text-sm rounded hover:bg-teal-700">
     Ubah
  </a>
</td>
            </tr>
            <tr class="text-center">
              <td class="border px-4 py-2">2</td>
              <td class="border px-4 py-2">124</td>
              <td class="border px-4 py-2">Ivan</td>
              <td class="border px-4 py-2">NORMAL</td>
              <td class="border px-4 py-2">NORMAL</td>
              <td class="border px-4 py-2">-</td>
              <td class="border px-4 py-2">Hidup</td>
              <td class="border px-4 py-2 space-x-2">
  <a href="/detailpensiunadmin" 
     class="px-3 py-1 bg-blue-500 text-white text-sm rounded hover:bg-blue-600">
     Lihat Detail
  </a>
  <a href="#" 
     class="px-3 py-1 bg-teal-600 text-white text-sm rounded hover:bg-teal-700">
     Ubah
  </a>
</td>
            </tr>
            <tr class="text-center">
              <td class="border px-4 py-2">3</td>
              <td class="border px-4 py-2">125</td>
              <td class="border px-4 py-2">Filbert</td>
              <td class="border px-4 py-2">NORMAL</td>
              <td class="border px-4 py-2">NORMAL</td>
              <td class="border px-4 py-2">-</td>
              <td class="border px-4 py-2">Hidup</td>
              <td class="border px-4 py-2 space-x-2">
  <a href="/detailpensiunadmin" 
     class="px-3 py-1 bg-blue-500 text-white text-sm rounded hover:bg-blue-600">
     Lihat Detail
  </a>
  <a href="#" 
     class="px-3 py-1 bg-teal-600 text-white text-sm rounded hover:bg-teal-700">
     Ubah
  </a>
</td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </main>

</body>
</html>