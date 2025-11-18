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

    <!-- Main Content -->
    <main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
    <div class="bg-white rounded-lg shadow p-6">
         <!-- Breadcrumb -->
    <p class="text-sm text-gray-500 mb-4">
      Peserta &gt; Lihat Detail &gt; <span class="text-blue-500">Tanggungan</span>
    </p>

    <!-- Title -->
    <h1 class="text-2xl font-bold text-center mb-6">
      Anggota Keluarga/Tanggungan/Waris
    </h1>

    <!-- Tabs -->
   <div class="flex space-x-2 mb-6 justify-center">
  <!-- Tombol Detail -->
  <a href=".detailpesertakepala" 
     class="px-4 py-2 bg-teal-500 text-white rounded hover:bg-teal-600">
     Detail
  </a>

  <!-- Tombol Tanggungan -->
  <a href="/tanggunganpesertakepala" 
     class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
     Tanggungan
  </a>

  <!-- Tombol Ahli Waris -->
  <a href="/ahliwarispesertakepala" 
     class="px-4 py-2 bg-teal-500 text-white rounded hover:bg-teal-600">
     Ahli Waris
  </a>
</div>

    <!-- Form Header -->
    <form class="bg-white p-6 rounded shadow-md max-w-3xl mx-auto mb-6">
      <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
          <label class="block text-sm">Nomor Peserta</label>
          <input class="w-full border rounded p-2" readonly />
        </div>
        <div>
          <label class="block text-sm">Nama Peserta</label>
          <input class="w-full border rounded p-2" readonly />
        </div>
        <div>
          <label class="block text-sm">Status Nikah</label>
          <input class="w-full border rounded p-2" readonly />
        </div>
        <div>
          <label class="block text-sm">Mitra / Pemberi Kerja</label>
          <input class="w-full border rounded p-2" readonly />
        </div>
        <div>
          <label class="block text-sm">Unit Kerja</label>
          <input class="w-full border rounded p-2" readonly />
        </div>
      </div>

      <!-- Tambah Button -->
     <a href="/tambahanggotapesertakepala" 
   class="px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-700 mb-4 inline-block">
  + Tambah
</a>


      <!-- Table -->
      <div class="overflow-x-auto">
        <table class="w-full text-sm border border-gray-300">
          <thead class="bg-teal-600 text-white">
            <tr>
              <th class="px-4 py-2 border">Nama Anggota Keluarga</th>
              <th class="px-4 py-2 border">Tempat/Tgl Lahir</th>
              <th class="px-4 py-2 border">Jenis Kelamin</th>
              <th class="px-4 py-2 border">Hubungan</th>
              <th class="px-4 py-2 border">Status Hidup</th>
              <th class="px-4 py-2 border">Waris</th>
              <th class="px-4 py-2 border">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr class="bg-white">
              <td class="px-4 py-2 border">Herawati Rubiana</td>
              <td class="px-4 py-2 border">Yogyakarta / 1985-07-08</td>
              <td class="px-4 py-2 border">Wanita</td>
              <td class="px-4 py-2 border">Saudara</td>
              <td class="px-4 py-2 border">Hidup</td>
              <td class="px-4 py-2 border">Ya</td>
             <td class="px-4 py-2 border space-x-2">
  <a href="/editanggotaahliwarispesertakepala" 
     class="px-3 py-1 bg-teal-600 text-white rounded hover:bg-teal-700 text-sm inline-block">
    Ubah
  </a>
  <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">Hapus</button>
</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Cetak Button -->
      <div class="flex justify-center mt-6">
        <button type="button" 
                class="px-6 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">
          Cetak Keluarga
        </button>
      </div>
    </form>

    <!-- Kembali Button -->
    <div class="max-w-3xl mx-auto">
      <a href="detailpeserta.html" 
         class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">
        Kembali
      </a>
    </div>
  </main>
</div>
</body>
</html>