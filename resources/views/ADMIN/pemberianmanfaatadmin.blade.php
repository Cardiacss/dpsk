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
  x-data="{ 
    path: window.location.pathname,
    kepensiunan: /pengajuanpensiunadmin|perubahanpensiunadmin|lihatpensiunadmin|daftarpensiunadmin|manfaatpensiunadmin|riwayatpensiunadmin|terminasipensiunadmin/.test(window.location.pathname) 
  }"
>
  <!-- Tombol Utama -->
  <button @click="kepensiunan = !kepensiunan" 
          :class="kepensiunan ? 'bg-cyan-800' : ''"
          class="w-full flex justify-between items-center px-3 py-2 rounded hover:bg-cyan-800">
    <span class="flex items-center space-x-2">
      <span>📑</span> <span>Kepensiunan</span>
    </span>
    <span x-text="kepensiunan ? '▾' : '▸'"></span>
  </button>

  <!-- Submenu -->
  <div x-show="kepensiunan" class="pl-10 mt-1 space-y-1" x-cloak>
    <!-- Pengajuan Pensiun -->
    <a href="/pengajuanpensiunadmin"
       :class="path.includes('pengajuanpensiunadmin') 
                ? 'bg-white text-[#2994A4] font-semibold rounded block px-3 py-1' 
                : 'block px-3 py-1 hover:bg-cyan-800 rounded'">
      Pengajuan Pensiun
    </a>

    <!-- Perubahan Pensiun -->
    <a href="/perubahanpensiunadmin"
       :class="path.includes('perubahanpensiunadmin') 
                ? 'bg-white text-[#2994A4] font-semibold rounded block px-3 py-1' 
                : 'block px-3 py-1 hover:bg-cyan-800 rounded'">
      Perubahan Pensiun
    </a>

    <!-- Lihat Pensiun -->
    <a href="/daftarpensiunadmin"
       :class="path.includes('daftarpensiunadmin') || path.includes('lihatpensiunadmin') 
                ? 'bg-white text-[#2994A4] font-semibold rounded block px-3 py-1' 
                : 'block px-3 py-1 hover:bg-cyan-800 rounded'">
      Lihat Pensiun
    </a>

    <!-- Manfaat -->
    <a href="/manfaatpensiunadmin"
       :class="path.includes('manfaatpensiunadmin') 
                ? 'bg-white text-[#2994A4] font-semibold rounded block px-3 py-1' 
                : 'block px-3 py-1 hover:bg-cyan-800 rounded'">
      Manfaat
    </a>

    <!-- Riwayat -->
    <a href="/riwayatpensiunadmin"
       :class="path.includes('riwayatpensiunadmin') 
                ? 'bg-white text-[#2994A4] font-semibold rounded block px-3 py-1' 
                : 'block px-3 py-1 hover:bg-cyan-800 rounded'">
      Riwayat
    </a>

    <!-- Terminasi -->
    <a href="/terminasipensiunadmin"
       :class="path.includes('terminasipensiunadmin') 
                ? 'bg-white text-[#2994A4] font-semibold rounded block px-3 py-1' 
                : 'block px-3 py-1 hover:bg-cyan-800 rounded'">
      Terminasi
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

      <!-- Breadcrumb -->
      <div class="text-sm text-gray-600 mb-4">
        <span>Kepensiunan</span> >
        <span class="text-blue-600 font-semibold">Manfaat</span>
      </div>

      <!-- Judul -->
      <h1 class="text-2xl font-bold mb-6">Pemberian Manfaat</h1>

      <!-- Form Filter -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div>
          <label class="block text-sm font-medium text-gray-700">Nomor Peserta</label>
          <input type="text" value="123"
            class="mt-1 w-full border rounded p-2 focus:ring focus:ring-[#2994A4] focus:outline-none"/>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Mitra</label>
          <select class="mt-1 w-full border rounded p-2 focus:ring focus:ring-[#2994A4] focus:outline-none">
            <option value="">Pilih Mitra</option>
            <option value="YPPK">YPPK</option>
          </select>
        </div>
      </div>

      <div class="flex gap-2 mb-6">
        <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Cari</button>
        <button class="bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded">Clear</button>
        <button class="bg-[#2994A4] hover:bg-[#257f8d] text-white px-4 py-2 rounded">Tampilkan Semua</button>
      </div>

      <!-- Tabel -->
      <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 text-sm">
          <thead class="bg-[#2994A4] text-white">
            <tr>
              <th class="px-4 py-2 border">No</th>
              <th class="px-4 py-2 border">No Pensiun</th>
              <th class="px-4 py-2 border">Nama</th>
              <th class="px-4 py-2 border">Mitra</th>
              <th class="px-4 py-2 border">Action</th>
            </tr>
          </thead>
          <tbody class="bg-white text-gray-700">
            <tr>
              <td class="px-4 py-2 border text-center">1</td>
              <td class="px-4 py-2 border">123</td>
              <td class="px-4 py-2 border">Threcia</td>
              <td class="px-4 py-2 border">YPPK</td>
              <td class="px-4 py-2 border text-center">
                        <a href="/pemberianmanfaatcekadmin"
                        class="inline-block bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded-lg shadow">
                        Cek
                        </a>
                    </td>
            </tr>
            <tr>
              <td class="px-4 py-2 border text-center">2</td>
              <td class="px-4 py-2 border">123</td>
              <td class="px-4 py-2 border">Ivan</td>
              <td class="px-4 py-2 border">YPPK</td>
              <td class="px-4 py-2 border text-center">
                        <a href="/pemberianmanfaatcekadmin"
                        class="inline-block bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded-lg shadow">
                        Cek
                        </a>
                    </td>
            </tr>
            <tr>
              <td class="px-4 py-2 border text-center">3</td>
              <td class="px-4 py-2 border">123</td>
              <td class="px-4 py-2 border">Filbert</td>
              <td class="px-4 py-2 border">YPPK</td>
             <td class="px-4 py-2 border text-center">
                        <a href="/pemberianmanfaatcekadmin"
                        class="inline-block bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded-lg shadow">
                        Cek
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
