<!DOCTYPE html>
<html lang="id" x-data="{ mitra:false, kepesertaan:false, kepensiunan:true }" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pemberian Manfaat</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100">

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
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Lihat Pensiun</a>
                    <a href="/pemberianmanfaatkepala" class="block px-3 py-1 bg-gray-200 text-black rounded">Manfaat</a>
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Riwayat</a>
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

    <!-- Content -->
    <main class="flex-1 p-6 overflow-y-auto">
      <!-- Breadcrumb -->
      <p class="text-sm text-gray-600 mb-4">
        Kepensiunan > <span class="text-blue-600">Manfaat</span>
      </p>

      <!-- Judul -->
      <h1 class="text-2xl font-bold mb-6">Pemberian Manfaat</h1>

      <!-- Card Form -->
      <div class="bg-teal-600 text-white p-8 rounded-lg w-full max-w-2xl shadow-lg">
        <form action="#" method="POST" class="space-y-4">
          
          <div class="flex justify-between items-center">
            <label class="w-1/3">Nomor Peserta</label>
            <input type="text" class="w-2/3 p-2 rounded text-black" placeholder="Masukkan nomor peserta">
          </div>

          <div class="flex justify-between items-center">
            <label class="w-1/3">Nama Peserta</label>
            <input type="text" class="w-2/3 p-2 rounded text-black" placeholder="Masukkan nama peserta">
          </div>

          <div class="flex justify-between items-center">
            <label class="w-1/3">Alamat</label>
            <input type="text" class="w-2/3 p-2 rounded text-black" placeholder="Masukkan alamat">
          </div>

          <div class="flex justify-between items-center">
            <label class="w-1/3">Jenis Manfaat</label>
            <input type="text" class="w-2/3 p-2 rounded text-black" placeholder="Jenis manfaat">
          </div>

          <div class="flex justify-between items-center">
            <label class="w-1/3">Jumlah Manfaat Pensiun (Rp.)</label>
            <input type="number" class="w-2/3 p-2 rounded text-black" placeholder="0">
          </div>

          <div class="flex justify-between items-center">
            <label class="w-1/3">Tanggal Beri Manfaat</label>
            <input type="date" class="w-2/3 p-2 rounded text-black">
          </div>

          <div class="flex justify-between items-center">
            <label class="w-1/3">Manfaat Untuk</label>
            <input type="text" class="w-2/3 p-2 rounded text-black" placeholder="Penerima manfaat">
          </div>

          <div>
            <label class="block mb-1">Keterangan</label>
            <textarea rows="3" class="w-full p-2 rounded text-black" placeholder="Tulis keterangan"></textarea>
          </div>

          <div class="text-center">
            <button type="submit" class="bg-green-500 hover:bg-green-600 px-6 py-2 rounded text-white font-semibold">
              Simpan
            </button>
          </div>

        </form>
      </div>
    </main>
  </div>

</body>
</html>
