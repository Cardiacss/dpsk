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
      Kepesertaan > <a href="#" class="text-blue-600 hover:underline">Iuran Peserta</a> > Edit
    </div>

    <!-- Title -->
    <h2 class="text-2xl font-bold mb-6">Edit Data Iuran Peserta</h2>

    <!-- Form Edit -->
    <form action="#" method="POST" class="bg-white shadow rounded p-6 max-w-xl">
      <div class="mb-4">
        <label class="block mb-1 font-semibold">Tanggal Setor</label>
        <input type="date" name="tanggal_setor" class="w-full border rounded p-2">
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-semibold">phDP</label>
        <input type="number" name="phdp" class="w-full border rounded p-2" placeholder="Masukkan phDP">
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-semibold">ip (15,2%)</label>
        <input type="number" name="ip_15" class="w-full border rounded p-2" placeholder="Masukkan ip (15,2%)">
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-semibold">ip (6%)</label>
        <input type="number" name="ip_6" class="w-full border rounded p-2" placeholder="Masukkan ip (6%)">
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-semibold">Tanggal Iuran</label>
        <input type="month" name="tanggal_iuran" class="w-full border rounded p-2">
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-semibold">Ulangi dalam (kali)</label>
        <input type="number" name="ulangi_dalam" class="w-full border rounded p-2">
      </div>

      <div class="mb-6">
        <label class="block mb-1 font-semibold">Rata-rata phDP 2 Tahun</label>
        <input type="number" name="rata_phdp" class="w-full border rounded p-2" readonly value="5000000">
      </div>

      <!-- Tombol -->
      <div class="flex justify-end space-x-4">
        <a href="daftarpesertaiuran1kepala.blade.php" 
           class="px-6 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Batal</a>
        <button type="submit" 
                class="px-6 py-2 bg-green-500 text-white rounded hover:bg-green-600">Simpan</button>
      </div>
    </form>
  </div>

</body>
</html>