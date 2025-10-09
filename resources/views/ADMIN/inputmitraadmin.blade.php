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
<!-- Mitra Dropdown -->
<div x-data="{ mitra: window.location.pathname.includes('mitra') || window.location.pathname.includes('nilaiaktuariaadmin') }">

  <button @click="mitra = !mitra" 
          :class="mitra ? 'bg-cyan-800' : ''"
          class="w-full flex justify-between items-center px-3 py-2 rounded hover:bg-cyan-800">
    <span class="flex items-center space-x-2">
      <span>🤝</span> <span>Mitra</span>
    </span>
    <span x-text="mitra ? '▾' : '▸'"></span>
  </button>

  <div x-show="mitra" class="pl-10 mt-1 space-y-1" x-cloak>
    <!-- Mitra & Sekolah (selalu highlight kalau URL ada 'mitra') -->
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
