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
    <!-- Main Content -->
  <div class="flex-1 p-6">
    <!-- Breadcrumb -->
    <div class="text-sm text-gray-600 mb-2">
      Kepesertaan > <a href="#" class="text-blue-600 hover:underline">Iuran Peserta</a>
    </div>

    <!-- Title -->
    <h2 class="text-2xl font-bold mb-4">Daftar Peserta</h2>

    <!-- Search -->
    <div class="flex items-center mb-4">
      <input type="text" placeholder="Silahkan Cari Nama/Kode"
             class="border w-full p-2 rounded shadow">
    </div>

    <!-- Action Buttons -->
  <div class="flex space-x-4 mb-6">
  <a href="/editpesertaiurankepala" 
     class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">
     Edit
  </a>

  <button class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">
    Cetak
  </button>
</div>


    <!-- Table Peserta -->
    <table class="w-1/2 border-collapse shadow mb-6">
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
            <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
              Buka
            </button>
          </td>
        </tr>
        <tr>
          <td class="border px-4 py-2 text-center">2</td>
          <td class="border px-4 py-2">Budi</td>
          <td class="border px-4 py-2 text-center">
            <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
              Buka
            </button>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Table Iuran Detail -->
    <table class="w-full border-collapse shadow">
      <thead>
        <tr class="bg-teal-700 text-white">
          <th class="border px-4 py-2">No</th>
          <th class="border px-4 py-2">Tanggal Catat</th>
          <th class="border px-4 py-2">Tanggal Setor</th>
          <th class="border px-4 py-2">phDP</th>
          <th class="border px-4 py-2">Iuran Untuk</th>
          <th class="border px-4 py-2">Iuran Pemberi Kerja</th>
          <th class="border px-4 py-2">Iuran Peserta</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="border px-4 py-2 text-center">1</td>
          <td class="border px-4 py-2">01-01-2025</td>
          <td class="border px-4 py-2">05-01-2025</td>
          <td class="border px-4 py-2">500.000</td>
          <td class="border px-4 py-2">Januari</td>
          <td class="border px-4 py-2">250.000</td>
          <td class="border px-4 py-2">250.000</td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>