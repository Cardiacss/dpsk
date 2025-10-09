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
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Pengajuan Pensiun</a>
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Perubahan Pensiun</a>
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Lihat Pensiun</a>
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Manfaat</a>
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Riwayat</a>
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Daftar Terminasi</a>
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
      <h2 class="text-2xl font-bold text-center mb-6">Mitra Pendiri</h2>
      <form action="#" method="POST" class="space-y-4">
        @csrf
        <div class="grid grid-cols-2 gap-4 items-center">
          <label>Kode Mitra Pendiri</label>
          <select name="kode_mitra" class="border rounded px-3 py-2">
            <option value="">Pilih Mitra</option>
          </select>

          <label>Nama Mitra Pendiri</label>
          <input type="text" name="nama_mitra" class="border rounded px-3 py-2">

          <label>Kode Unit</label>
          <input type="text" name="kode_unit" class="border rounded px-3 py-2">

          <label>Nama Unit/Sekolah</label>
          <input type="text" name="nama_unit" class="border rounded px-3 py-2">

          <label>Alamat Unit/Sekolah</label>
          <input type="text" name="alamat_unit" class="border rounded px-3 py-2">

          <label>Kelurahan</label>
          <input type="text" name="kelurahan" class="border rounded px-3 py-2">

          <label>Kota/Kabupaten</label>
          <input type="text" name="kota" class="border rounded px-3 py-2">

          <label>Kecamatan</label>
          <input type="text" name="kecamatan" class="border rounded px-3 py-2">

          <label>Provinsi</label>
          <input type="text" name="provinsi" class="border rounded px-3 py-2">

          <label>Penetapan Iuran Peserta %</label>
          <input type="number" step="0.01" name="iuran_peserta" class="border rounded px-3 py-2">

          <label>Penetapan Iuran Pemberi Kerja %</label>
          <input type="number" step="0.01" name="iuran_kerja" class="border rounded px-3 py-2">
        </div>

        <p class="text-center text-sm mt-4">Silahkan Lengkapi Data Anda Dengan Benar</p>

        <div class="text-center mt-6">
          <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded">
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
