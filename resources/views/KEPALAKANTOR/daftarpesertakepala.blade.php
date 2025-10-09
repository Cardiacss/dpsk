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
            <a href="/dashboardkepalasekolah" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
                <span>🏠</span> <span>Home</span>
            </a>

            <!-- Peserta -->
            <a href="/daftarpesertakepala" class="block px-3 py-1 bg-gray-200 text-black rounded">
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
            <div>
                <button @click="mitra = !mitra" class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
                    <span class="flex items-center space-x-2">
                        <span>🤝</span> <span>Mitra</span>
                    </span>
                <span x-text="mitra ? '▾' : '▸'"></span>
                </button>
                <div x-show="mitra" class="pl-10 mt-1 space-y-1" x-cloak>
                    <a href="/mitra&sekolahkepala"  class="block px-3 py-1 hover:bg-cyan-800 rounded">Mitra & Sekolah</a>
                    <a href="/nilaiaktuariakepala" class="block px-3 py-1 hover:bg-cyan-800 rounded">Nilai Aktuaria</a>
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
                    <a href="/pengajuanpensiunkepala" class="block px-3 py-1 hover:bg-cyan-800 rounded">Pengajuan Pensiun</a>
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Perubahan Pensiun</a>
                    <a href="/daftarpensiunkepala" class="block px-3 py-1 hover:bg-cyan-800 rounded">Lihat Pensiun</a>
                    <a href="/pemberianmanfaatkepala" class="block px-3 py-1 hover:bg-cyan-800 rounded">Manfaat</a>
                    <a href="/riwayatmanfaatkepala" class="block px-3 py-1 hover:bg-cyan-800 rounded">Riwayat</a>
                    <a href="/daftarterminasikepala" class="block px-3 py-1 hover:bg-cyan-800 rounded">Daftar Terminasi</a>
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
<!--konten-->
      <main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
    <div class="bg-white rounded-lg shadow p-6">
      <h1 class="text-2xl font-bold text-center mb-6">Daftar Peserta</h1>

      <div class="mb-4">
        <a href="/pendaftaranpesertakepala" class="px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-700 flex items-center space-x-2">
          <span>➕</span>
          <span>Add Peserta</span>
        </a>
      </div>

      <div class="flex flex-wrap items-center gap-2 mb-4">
        <select class="border rounded px-3 py-2">
          <option>Nomor</option>
          <option>Nama</option>
          <option>Mitra</option>
        </select>
        <input type="text" placeholder="Masukkan data peserta yang ingin dicari" class="flex-1 border rounded px-3 py-2">
        <button class="bg-cyan-600 text-white px-4 py-2 rounded hover:bg-cyan-700">Cari Peserta</button>
      </div>

      <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow rounded">
          <thead class="bg-teal-600 text-white">
            <tr>
              <th class="px-4 py-2">No</th>
              <th class="px-4 py-2">No Peserta</th>
              <th class="px-4 py-2">Nama Peserta</th>
              <th class="px-4 py-2">Mitra</th>
              <th class="px-4 py-2">Unit</th>
              <th class="px-4 py-2">Status Kartu Peserta</th>
              <th class="px-4 py-2">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-t">
              <td class="px-4 py-2">1</td>
              <td class="px-4 py-2">123</td>
              <td class="px-4 py-2">Threcia</td>
              <td class="px-4 py-2">Wanita</td>
              <td class="px-4 py-2">Sengata</td>
              <td class="px-4 py-2">Belum Tercetak</td>
              <td class="px-4 py-2 space-x-2">
                <a href="/ubahpesertakepala" class="px-3 py-1 bg-teal-600 text-white text-sm rounded hover:bg-teal-700">Ubah</a>
                <a href="#" class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700">Hapus</a>
                <a href="/detailpesertakepala" class="px-3 py-1 bg-blue-500 text-white text-sm rounded hover:bg-blue-600">Detail</a>
              </td>
            </tr>
            <tr class="border-t">
              <td class="px-4 py-2">2</td>
              <td class="px-4 py-2">124</td>
              <td class="px-4 py-2">Ivan</td>
              <td class="px-4 py-2">Pria</td>
              <td class="px-4 py-2">Jogja</td>
              <td class="px-4 py-2">Belum Tercetak</td>
              <td class="px-4 py-2 space-x-2">
                <a href="/ubahpesertakepala" class="px-3 py-1 bg-teal-600 text-white text-sm rounded hover:bg-teal-700">Ubah</a>
                <a href="#" class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700">Hapus</a>
                <a href="/detailpesertakepala" class="px-3 py-1 bg-blue-500 text-white text-sm rounded hover:bg-blue-600">Detail</a>
              </td>
            </tr>
            <tr class="border-t">
              <td class="px-4 py-2">3</td>
              <td class="px-4 py-2">125</td>
              <td class="px-4 py-2">Filbert</td>
              <td class="px-4 py-2">Pria</td>
              <td class="px-4 py-2">Jakarta</td>
              <td class="px-4 py-2">Belum Tercetak</td>
             <td class="px-4 py-2 space-x-2">
  <a href="/ubahpesertakepala" 
     class="px-3 py-1 bg-teal-600 text-white text-sm rounded hover:bg-teal-700">
     Ubah
  </a>
  <a href="#" 
     class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700">
     Hapus
  </a>
  <a href="/detailpesertakepala" 
     class="px-3 py-1 bg-blue-500 text-white text-sm rounded hover:bg-blue-600">
     Detail
  </a>
</td>

            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>
</html>