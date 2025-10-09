<!DOCTYPE html>
<html lang="id" x-data="{ mitra:false, kepesertaan:false, kepensiunan:true }" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Terminasi Kepala</title>
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

        <nav class="flex-1 px-4 space-y-2" x-data="{ kepesertaan:false, mitra:false, kepensiunan:true }">
            <!-- Home -->
            <a href="/dashboardkepalasekolah" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
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
                    <span x-text="kepesertaan ? '▾' : '▸'"></span>
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
                <button @click="kepensiunan = !kepensiunan" class="w-full flex justify-between items-center px-3 py-2 bg-cyan-800 rounded">
                    <span class="flex items-center space-x-2">
                        <span>📑</span> <span>Kepensiunan</span>
                    </span>
                    <span x-text="kepensiunan ? '▾' : '▸'"></span>
                </button>
                <div x-show="kepensiunan" class="pl-10 mt-1 space-y-1" x-cloak>
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Pengajuan Pensiun</a>
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Perubahan Pensiun</a>
                    <!-- Aktif di sini -->
                    <a href="/daftarpensiunkepala" class="block px-3 py-1 bg-gray-200 text-black rounded">Lihat Pensiun</a>
                    <a href="" class="block px-3 py-1 hover:bg-cyan-800 rounded">Manfaat</a>
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
            <h1 class="text-2xl font-bold mb-4">Ubah Pensiunan – Murniati (Sukidjan)</h1>
      <nav class="text-sm text-gray-500 mb-6">
        Kepensiunan &gt; Lihat Pensiun &gt; <span class="text-cyan-700">Ubah Pensiunan</span>
      </nav>

      <button onclick="window.history.back()" 
              class="bg-cyan-600 text-white px-4 py-2 rounded mb-6 hover:bg-cyan-700">Kembali</button>

      <form class="bg-white shadow rounded p-6 space-y-4 max-w-2xl">
        <div>
          <label class="block text-sm font-medium">Nomor Peserta</label>
          <input type="text" value="781" class="w-full border rounded px-3 py-2" readonly />
        </div>
        <div>
          <label class="block text-sm font-medium">Nama Peserta</label>
          <input type="text" value="Murniati (Sukidjan)" class="w-full border rounded px-3 py-2" />
        </div>
        <div>
          <label class="block text-sm font-medium">Tanggal Mohon</label>
          <input type="date" value="2008-02-01" class="w-full border rounded px-3 py-2" />
        </div>
        <div>
          <label class="block text-sm font-medium">Terhitung Mulai Tanggal</label>
          <input type="date" value="2016-01-01" class="w-full border rounded px-3 py-2" />
        </div>
        <div>
          <label class="block text-sm font-medium">No Surat Berhenti</label>
          <input type="text" value="-" class="w-full border rounded px-3 py-2" />
        </div>
        <div>
          <label class="block text-sm font-medium">Status Pensiun</label>
          <input type="text" value="JANDUD" class="w-full border rounded px-3 py-2" />
        </div>
        <div>
          <label class="block text-sm font-medium">Status Manfaat</label>
          <input type="text" value="NORMAL" class="w-full border rounded px-3 py-2" />
        </div>
        <div>
          <label class="block text-sm font-medium">Pensiun</label>
          <input type="text" value="SELESAI" class="w-full border rounded px-3 py-2" />
        </div>
        <div>
          <label class="block text-sm font-medium">Status Hidup</label>
          <input type="text" value="Meninggal" class="w-full border rounded px-3 py-2" />
        </div>
        <div>
          <label class="block text-sm font-medium">Tanggal Meninggal</label>
          <input type="date" value="2016-12-11" class="w-full border rounded px-3 py-2" />
          <p class="text-xs text-gray-500 mt-1">Biarkan kosong apabila masih hidup</p>
        </div>
        <div>
          <label class="block text-sm font-medium">Keterangan</label>
          <textarea class="w-full border rounded px-3 py-2" rows="3"></textarea>
        </div>
        <button type="submit" 
                class="bg-cyan-600 text-white px-6 py-2 rounded hover:bg-cyan-700">Simpan</button>
      </form>
    </main>
  </div>
</body>
</html>