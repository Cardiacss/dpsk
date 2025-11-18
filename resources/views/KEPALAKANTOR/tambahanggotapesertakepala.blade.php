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
     Peserta > Lihat Detail > Tanggungan > <span class="text-blue-500">Tambah Anggota</span>
    </div>
    <h2 class="text-2xl font-bold mb-6">Tambah Anggota Keluarga/Tanggungan/Waris</h2>

    <form class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium">Nama Lengkap</label>
          <input type="text" class="w-full border rounded px-3 py-2">
        </div>
        <div>
          <label class="block text-sm font-medium">Tempat Lahir</label>
          <input type="text" class="w-full border rounded px-3 py-2">
        </div>
        <div>
          <label class="block text-sm font-medium">Tanggal Lahir</label>
          <input type="date" class="w-full border rounded px-3 py-2">
        </div>
        <div>
          <label class="block text-sm font-medium">Jenis Kelamin</label>
          <select class="w-full border rounded px-3 py-2">
            <option>Pria</option>
            <option>Wanita</option>
          </select>
        </div>
        <div>
          <label class="block text-sm font-medium">Hubungan</label>
          <input type="text" class="w-full border rounded px-3 py-2">
        </div>
        <div>
          <label class="block text-sm font-medium">Pekerjaan</label>
          <input type="text" class="w-full border rounded px-3 py-2">
        </div>
        <div>
          <label class="block text-sm font-medium">Status Hak Waris</label>
          <input type="text" class="w-full border rounded px-3 py-2">
        </div>
        <div>
          <label class="block text-sm font-medium">Status Hidup</label>
          <select class="w-full border rounded px-3 py-2">
            <option>Hidup</option>
            <option>Meninggal</option>
          </select>
        </div>
        <div class="md:col-span-2">
          <label class="block text-sm font-medium">Keterangan</label>
          <textarea class="w-full border rounded px-3 py-2"></textarea>
        </div>
        <div>
          <label class="block text-sm font-medium">No Surat Penunjukan Waris & Tgl (E2)</label>
          <input type="text" class="w-full border rounded px-3 py-2">
        </div>
        <div>
          <label class="block text-sm font-medium">No Permohonan Waris & Tgl (E4)</label>
          <input type="text" class="w-full border rounded px-3 py-2">
        </div>
      </div>

      <div class="flex justify-center mt-6">
        <button type="submit" class="px-6 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">Simpan</button>
      </div>
    </form>
  </main>
</body>
</html>