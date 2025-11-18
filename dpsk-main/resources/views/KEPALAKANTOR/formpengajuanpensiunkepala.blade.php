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
                    <!-- Aktif di sini -->
                    <a href="
                    " class="block px-3 py-1 bg-gray-200 text-black rounded">Pengajuan Pensiun</a>
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Perubahan Pensiun</a>
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Lihat Pensiun</a>
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

    <!-- Konten Utama -->
<!-- Main Content -->
  <main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
        <div class="bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold text-center mb-6">Pengajuan Pensiun</h1>

    <!-- Breadcrumb -->
    <div class="mb-6 text-sm">
      <span>Kepesertaan</span> > 
      <a href="pengajuanpensiun.html" class="text-blue-600 hover:underline">Pengajuan Pensiun</a>
    </div>

    <!-- Form -->
    <div class="bg-white p-6 rounded-lg shadow">
      <form class="grid grid-cols-2 gap-6">

        <!-- Kiri -->
        <div class="space-y-4">
          <div>
            <label class="block text-sm font-medium">Nomor Peserta</label>
            <input type="text" class="w-full mt-1 border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Nama Peserta</label>
            <input type="text" class="w-full mt-1 border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Pekerjaan</label>
            <input type="text" class="w-full mt-1 border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Alamat Sebelum Pensiun</label>
            <textarea class="w-full mt-1 border rounded p-2"></textarea>
          </div>
          <div>
            <label class="block text-sm font-medium">Alamat Sekarang</label>
            <textarea class="w-full mt-1 border rounded p-2"></textarea>
          </div>
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium">Kelurahan</label>
              <input type="text" class="w-full mt-1 border rounded p-2">
            </div>
            <div>
              <label class="block text-sm font-medium">Kecamatan</label>
              <input type="text" class="w-full mt-1 border rounded p-2">
            </div>
          </div>
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium">Kota/Kabupaten</label>
              <input type="text" class="w-full mt-1 border rounded p-2">
            </div>
            <div>
              <label class="block text-sm font-medium">Provinsi</label>
              <input type="text" class="w-full mt-1 border rounded p-2">
            </div>
          </div>
          <div>
            <label class="block text-sm font-medium">Surat Keterangan Tambahan</label>
            <select class="w-full mt-1 border rounded p-2">
              <option>Pilih jika ada</option>
              <option>Ada</option>
              <option>Tidak Ada</option>
            </select>
          </div>
          <div>
            <label class="block text-sm font-medium">Tanggal Lahir</label>
            <input type="date" class="w-full mt-1 border rounded p-2">
          </div>
        </div>

        <!-- Kanan -->
        <div class="space-y-4">
          <div>
            <label class="block text-sm font-medium">Tanggal Mulai Kerja</label>
            <input type="date" class="w-full mt-1 border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Nomor SK Pensiun</label>
            <input type="text" class="w-full mt-1 border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Nomor Peserta Pensiun</label>
            <input type="text" class="w-full mt-1 border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Tanggal Pensiun</label>
            <input type="date" class="w-full mt-1 border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Nilai Variabel</label>
            <input type="text" value="0.021" class="w-full mt-1 border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Nomor Agenda DPSK</label>
            <input type="text" class="w-full mt-1 border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Batas Maximum MP</label>
            <input type="number" value="2000000" class="w-full mt-1 border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Jenis Manfaat</label>
            <select class="w-full mt-1 border rounded p-2">
              <option>Simulasi</option>
              <option>Normal</option>
            </select>
          </div>
        </div>

      </form>
    <!-- Tombol Aksi -->
<div class="col-span-2 flex justify-end mt-6">
  <a href="pengajuanpensiunkepala" class="px-6 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">
    Simpan
  </a>
</div>
    </div>
  </main>
</body>
</html>
</html>