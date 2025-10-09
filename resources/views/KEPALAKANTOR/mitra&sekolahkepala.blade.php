<!DOCTYPE html>
<html lang="id" xmlns="http://www.w3.org/1999/xhtml" x-data="{ mitra:false, kepesertaan:false, kepensiunan:false, currentPage: 'home' }">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <nav class="flex-1 px-4 space-y-2">
      <!-- Home -->
      <button @click="currentPage = 'home'" 
              class="flex w-full items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded text-left">
        <span>🏠</span> <span>Home</span>
      </button>

      <!-- Peserta -->
      <button @click="currentPage = 'peserta'" 
              class="flex w-full items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded text-left">
        <span>👤</span> <span>Peserta</span>
      </button>

      <!-- Kepesertaan Dropdown -->
      <div>
        <button @click="kepesertaan = !kepesertaan" 
                class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
          <span class="flex items-center space-x-2">
            <span>🧾</span> <span>Kepesertaan</span>
          </span>
          <span x-text="kepesertaan ? '▾' : '▸'"></span>
        </button>
        <div x-show="kepesertaan" class="pl-10 mt-1 space-y-1" x-cloak>
          <button @click="currentPage = 'iuran'" 
                  class="block w-full text-left px-3 py-1 hover:bg-cyan-800 rounded">Iuran Peserta</button>
          <button @click="currentPage = 'simulasi'" 
                  class="block w-full text-left px-3 py-1 hover:bg-cyan-800 rounded">Simulasi Kepesertaan & Manfaat Pensiun</button>
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
          <button @click="currentPage = 'mitra'" 
                  class="block w-full text-left px-3 py-1 hover:bg-cyan-800 rounded">Mitra & Sekolah</button>
          <button @click="currentPage = 'datanilaiakturia'" 
        class="block w-full text-left px-3 py-1 hover:bg-cyan-800 rounded">
  Nilai Aktuaria
</button>

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
          <button @click="currentPage = 'pengajuan'" 
                  class="block w-full text-left px-3 py-1 hover:bg-cyan-800 rounded">Pengajuan Pensiun</button>
          <button @click="currentPage = 'perubahan'" 
                  class="block w-full text-left px-3 py-1 hover:bg-cyan-800 rounded">Perubahan Pensiun</button>
          <button @click="currentPage = 'lihatpensiun'" 
                  class="block w-full text-left px-3 py-1 hover:bg-cyan-800 rounded">Lihat Pensiun</button>
          <button @click="currentPage = 'manfaat'" 
                  class="block w-full text-left px-3 py-1 hover:bg-cyan-800 rounded">Manfaat</button>
          <button @click="currentPage = 'riwayat'" 
                  class="block w-full text-left px-3 py-1 hover:bg-cyan-800 rounded">Riwayat</button>
          <button @click="currentPage = 'terminasi'" 
                  class="block w-full text-left px-3 py-1 hover:bg-cyan-800 rounded">Daftar Terminasi</button>
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

  <!-- Content -->
  <main class="flex-1 bg-white p-6 overflow-auto">

    <!-- Home Page -->
    <div x-show="currentPage === 'home'" x-cloak>
      <h1 class="text-center text-2xl font-bold mb-6">SELAMAT DATANG</h1>
      <p class="text-center text-lg">Anda Masuk Sebagai Operator 2</p>
    </div>
    <!-- Mitra & Sekolah Page -->
    <div x-show="currentPage === 'mitra'" x-cloak>
      <h1 class="text-2xl font-bold mb-6">MITRA & SEKOLAH</h1>

      <!-- Tombol Aksi -->
      <div class="flex flex-wrap gap-3 mb-6">
        <a href="{{ route('inputmitrakepala') }}"
           class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded flex items-center space-x-2">
          <span>➕</span><span>Input Mitra</span>
        </a>

        <a href="/editmitrakepala"
           class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded flex items-center space-x-2">
          <span>✏️</span><span>Edit Mitra</span>
        </a>

        <a href="{{ route('inputsekolahkepala') }}"
           class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded flex items-center space-x-2">
          <span>➕</span><span>Input Sekolah</span>
        </a>

        <a href="/editsekolahkepala"
   class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded flex items-center space-x-2">
  <span>✏️</span><span>Edit Sekolah</span>
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
        <th class="p-2 border">Kode</th>
        <th class="p-2 border">Nama Unit/Mitra</th>
        <th class="p-2 border">Alamat Unit/Mitra</th>
        <th class="p-2 border">Kelurahan</th>
        <th class="p-2 border">Kecamatan</th>
        <th class="p-2 border">Kota/Kabupaten</th>
        <th class="p-2 border">Provinsi</th>
        <th class="p-2 border">Status</th>
        <th class="p-2 border">Iuran Peserta</th>
        <th class="p-2 border">Iuran Pemberi Kerja</th>
        <!-- Tambahkan kolom aksi -->
        <th class="p-2 border">Aksi</th>
      </tr>
    </thead>

    <tbody class="text-center">
      <tr>
        <td class="p-2 border">001</td>
        <td class="p-2 border">Mitra Contoh</td>
        <td class="p-2 border">Jl. Mawar No.1</td>
        <td class="p-2 border">Kel. A</td>
        <td class="p-2 border">Kec. B</td>
        <td class="p-2 border">Kota Contoh</td>
        <td class="p-2 border">Prov. Contoh</td>
        <td class="p-2 border">Aktif</td>
        <td class="p-2 border">5%</td>
        <td class="p-2 border">10%</td>

        <!-- Kolom tombol aksi -->
        <td class="p-2 border">
          <div class="flex justify-center space-x-2">
            <!-- Tombol Edit -->
            <button
              class="bg-green-500 hover:bg-green-600 text-white p-2 rounded shadow-md flex items-center justify-center"
              title="Edit"
            >
              ✏️
            </button>
            <!-- Tombol Hapus -->
            <button
              class="bg-red-500 hover:bg-red-600 text-white p-2 rounded shadow-md flex items-center justify-center"
              title="Hapus"
            >
              🗑️
            </button>
          </div>
        </td>
      </tr>

      <!-- Placeholder jika tidak ada data -->
      <tr>
        <td colspan="11" class="p-2 border text-gray-500" style="height:100px;">
          Belum ada data tersedia
        </td>
      </tr>
    </tbody>
  </table>
</div>
