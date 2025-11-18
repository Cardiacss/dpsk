  <!DOCTYPE html>
<html lang="id" x-data="{ mitra:false, kepesertaan:false, kepensiunan:true }" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Terminasi admin</title>
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
            <a href="/menuadmin class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
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
                    <a href="/mitra&sekolahadmin"  class="block px-3 py-1 hover:bg-cyan-800 rounded">Mitra & Sekolah</a>
                    <a href="/nilaiaktuariaadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Nilai Aktuaria</a>
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
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Manfaat</a>
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Riwayat</a>
                    <!-- Aktif di sini -->
                    <a href="/daftarterminasiadmin" class="block px-3 py-1 bg-gray-200 text-black rounded">Daftar Terminasi</a>
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
        <div class="text-sm text-gray-600 mb-4">
          <span>Kepensiunan</span> >
          <a href="/daftarterminasiadmin" class="text-blue-600 font-semibold">Terminasi</a>
        </div>

        <!-- Judul -->
        <h1 class="text-2xl font-bold mb-6">Detail Terminasi Pensiun</h1>

        <!-- Form Detail -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
          <div>
            <label class="block font-medium">Nomor Peserta</label>
            <input type="text" value="123456" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
          </div>
          <div>
            <label class="block font-medium">No Pensiun</label>
            <input type="text" value="PNS001" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
          </div>

          <div>
            <label class="block font-medium">Nama Peserta</label>
            <input type="text" value="Budi Santoso" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
          </div>
          <div>
            <label class="block font-medium">No KTP/Passpor</label>
            <input type="text" value="331xxxxxxxx" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
          </div>

          <div>
            <label class="block font-medium">Tempat Lahir</label>
            <input type="text" value="Salatiga" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
          </div>
          <div>
            <label class="block font-medium">Jenis Kelamin</label>
            <input type="text" value="Laki-laki" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
          </div>

          <div>
            <label class="block font-medium">Tanggal Lahir</label>
            <input type="text" value="01-01-1965" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
          </div>
          <div>
            <label class="block font-medium">Alamat</label>
            <input type="text" value="Jl. Diponegoro No. 10" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
          </div>

          <div>
            <label class="block font-medium">Kelurahan</label>
            <input type="text" value="Sidorejo" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
          </div>
          <div>
            <label class="block font-medium">Kecamatan</label>
            <input type="text" value="Sidorejo Lor" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
          </div>

          <div>
            <label class="block font-medium">Kota</label>
            <input type="text" value="Salatiga" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
          </div>
          <div>
            <label class="block font-medium">Provinsi</label>
            <input type="text" value="Jawa Tengah" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
          </div>

          <div>
            <label class="block font-medium">Pekerjaan</label>
            <input type="text" value="Guru" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
          </div>
          <div>
            <label class="block font-medium">Unit</label>
            <input type="text" value="SMA Kristen 1" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
          </div>

          <div>
            <label class="block font-medium">Tgl Pensiun</label>
            <input type="text" value="01-01-2025" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
          </div>
          <div>
            <label class="block font-medium">Tanggal Terminasi</label>
            <input type="text" value="01-09-2025" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
          </div>

          <div>
            <label class="block font-medium">Total Iuran</label>
            <input type="text" value="Rp 150.000.000" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
          </div>
          <div>
            <label class="block font-medium">Total Manfaat</label>
            <input type="text" value="Rp 200.000.000" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
          </div>
        </div>

        <!-- Tombol Kembali -->
        <div class="mt-6">
          <a href="/daftarterminasiadmin" 
             class="bg-[#2994A4] hover:bg-[#257f8d] text-white px-4 py-2 rounded shadow">
             Kembali
          </a>
        </div>
      </div>
    </main>
  </div>
</body>
</html>