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
          <button @click="currentPage = 'nilaiakturia'" 
                  class="block w-full text-left px-3 py-1 hover:bg-cyan-800 rounded">Nilai Aktuaria</button>
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


  <!-- Konten Utama -->
  <main class="flex-1 p-8 bg-white overflow-y-auto">
    <div class="max-w-3xl mx-auto border-2 border-blue-400 rounded-lg p-8 mb-10">
    <h1 class="text-2xl font-bold mb-4 text-center">Input Mitra</h1>
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
      <h2 class="text-center text-xl font-bold mb-6">Mitra Pendiri</h2>
      <form action="#" method="POST" class="space-y-4">
        <div>
          <label class="block text-sm font-medium mb-1">Kode Mitra Pendiri</label>
          <input type="text" class="w-full border rounded px-3 py-2" />
        </div>
        <div>
          <label class="block text-sm font-medium mb-1">Nama Mitra Pendiri</label>
          <input type="text" class="w-full border rounded px-3 py-2" />
        </div>
        <div>
          <label class="block text-sm font-medium mb-1">Alamat Mitra Pendiri</label>
          <input type="text" class="w-full border rounded px-3 py-2" />
        </div>
        <div>
          <label class="block text-sm font-medium mb-1">Kelurahan</label>
          <input type="text" class="w-full border rounded px-3 py-2" />
        </div>
        <div>
          <label class="block text-sm font-medium mb-1">Kota/Kabupaten</label>
          <input type="text" class="w-full border rounded px-3 py-2" />
        </div>
        <div>
          <label class="block text-sm font-medium mb-1">Kecamatan</label>
          <input type="text" class="w-full border rounded px-3 py-2" />
        </div>
        <div>
          <label class="block text-sm font-medium mb-1">Provinsi</label>
          <input type="text" class="w-full border rounded px-3 py-2" />
        </div>
        <div>
          <label class="block text-sm font-medium mb-1">Penetapan Iuran Peserta %</label>
          <input type="number" class="w-full border rounded px-3 py-2" />
        </div>
        <div>
          <label class="block text-sm font-medium mb-1">Penetapan Iuran Pemberi Kerja %</label>
          <input type="number" class="w-full border rounded px-3 py-2" />
        </div>
        <p class="text-center text-sm text-gray-600">Silahkan Lengkapi Data Anda Dengan Benar</p>
        <div class="text-center">
          <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded shadow">
            Submit
          </button>
        </div>
      </form>
    </div>
  </main>
</div>
<!-- Footer bawah halaman -->
<footer class="bg-gray-800 text-white text-center text-sm py-4">
  &copy; {{ date('Y') }} Dana Pensiun Sekolah Kristen. Semua Hak Dilindungi.
</footer>

</body>
</html>
