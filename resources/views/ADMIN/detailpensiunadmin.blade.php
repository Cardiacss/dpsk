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
      <h1 class="text-2xl font-bold mb-4">Detail Pensiunan - Murniati (Sukidjan)</h1>
      <nav class="text-sm text-gray-500 mb-6">
        Kepensiunan &gt; Lihat Pensiun &gt; <span class="text-cyan-700">Lihat Detail</span>
      </nav>

      <button 
  class="bg-cyan-600 text-white px-4 py-2 rounded mb-6 hover:bg-cyan-700" 
  onclick="window.location.href='/daftarpensiunadmin'">
  Kembali
</button>


      <div class="bg-white shadow rounded p-6 space-y-3">
        <div class="flex justify-between"><span class="font-medium">Nomor Peserta</span><span>781</span></div>
        <div class="flex justify-between"><span class="font-medium">Nama Peserta</span><span>Murniati (Sukidjan)</span></div>
        <div class="flex justify-between"><span class="font-medium">Tanggal Mohon</span><span>2008-02-01</span></div>
        <div class="flex justify-between"><span class="font-medium">Terhitung Mulai Tanggal</span><span>2016-01-01</span></div>
        <div class="flex justify-between"><span class="font-medium">No Surat Berhenti</span><span>-</span></div>
        <div class="flex justify-between"><span class="font-medium">Status Pensiun</span><span>JANDUD</span></div>
        <div class="flex justify-between"><span class="font-medium">Status Manfaat</span><span>NORMAL</span></div>
        <div class="flex justify-between"><span class="font-medium">Pensiun</span><span>SELESAI</span></div>
        <div class="flex justify-between"><span class="font-medium">Status Hidup</span><span>Meninggal</span></div>
        <div class="flex justify-between"><span class="font-medium">Keterangan</span><span>-</span></div>

        <hr class="my-4"/>

        <h2 class="font-semibold text-lg mb-2">Manfaat</h2>
        <div class="flex justify-between"><span>Pertama Terima Pada</span><span>Bulan Januari Tahun 2012</span></div>
        <div class="flex justify-between"><span>Terakhir Terima Pada</span><span>Bulan Januari Tahun 2024</span></div>
        <div class="flex justify-between"><span>Besaran Manfaat Terakhir</span><span>Rp. 205.000</span></div>
        <div class="flex justify-between"><span>Rekening</span><span>AMBIL TUNAI</span></div>
        <div class="flex justify-between"><span>Manfaat</span><span>Bulanan</span></div>
      </div>
    </main>
  </div>
</body>
</html>
