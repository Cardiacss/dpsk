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
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Lihat Pensiun</a>
                    <a href="" class="block px-3 py-1 hover:bg-cyan-800 rounded">Manfaat</a>
                    <!-- Aktif di sini -->
                    <a href="/riwayatmanfaatkepala" class="block px-3 py-1 bg-gray-200 text-black rounded">Riwayat</a>
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

     <!-- MAIN -->
    <div class="flex-1 flex flex-col overflow-hidden">
      <!-- Top bar -->
      <header class="bg-white border-b h-14 flex items-center justify-end px-6">
        <div class="flex items-center gap-4">
          <div class="flex items-center gap-3">
            <img src="https://i.pravatar.cc/40" alt="admin" class="rounded-full w-8 h-8" />
            <span class="text-sm text-gray-700">Admin</span>
          </div>
        </div>
      </header>

      <!-- Content area -->
      <main class="flex-1 p-6 overflow-y-auto bg-gray-100">
        <div class="bg-white rounded-lg shadow-lg p-6">

          <!-- Heading -->
          <h1 class="text-2xl font-bold text-center mb-4">Riwayat Manfaat - Murniati (Sukidjan)</h1>

          <!-- Breadcrumb -->
          <div class="text-sm text-gray-600 mb-4">
            Kepensiunan &nbsp;›&nbsp; <a href="/riwayatmanfaatkepala" class="text-blue-600">Riwayat Manfaat</a>
          </div>

          <!-- Action buttons -->
          <div class="flex gap-3 mb-6">
            <a href="/daftarpensiunkepala" class="px-4 py-2 bg-[#2994A4] text-white rounded shadow-sm">Lihat Daftar Pensiun</a>
            <a href="/pemberianmanfaatkepala" class="px-4 py-2 bg-[#2994A4] text-white rounded shadow-sm">Pemberian Manfaat</a>
            <button class="px-4 py-2 bg-[#2994A4] text-white rounded shadow-sm">Cetak Manfaat</button>
          </div>

          <!-- Search / filter row -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end mb-6">
            <div>
              <label class="text-sm text-red-600 block mb-1">Nomor Peserta</label>
              <div class="relative">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">🔍</span>
                <input type="text" value="123" class="pl-10 pr-3 py-2 w-full border rounded shadow-sm bg-white" />
              </div>
            </div>

            <div>
              <label class="text-sm text-gray-700 block mb-1">Mitra</label>
              <select class="w-full border rounded px-3 py-2">
                <option value="">Pilih Mitra</option>
                <option selected>YPPK</option>
              </select>
            </div>

            <div class="flex gap-2 justify-start md:justify-end">
              <button class="px-4 py-2 bg-[#2994A4] text-white rounded">Cari</button>
              <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded">Clear</button>
            </div>
          </div>

          <!-- Table -->
          <div class="overflow-x-auto">
            <table class="min-w-full text-sm border-collapse">
              <thead>
                <tr class="bg-[#2994A4] text-white">
                  <th class="px-4 py-3 border">No</th>
                  <th class="px-4 py-3 border">No Pensiun</th>
                  <th class="px-4 py-3 border">Nama</th>
                  <th class="px-4 py-3 border">Tanggal Beri Manfaat</th>
                  <th class="px-4 py-3 border">Tahun Setor</th>
                  <th class="px-4 py-3 border">Bulan Setor</th>
                  <th class="px-4 py-3 border">Nilai Manfaat</th>
                  <th class="px-4 py-3 border">Keterangan</th>
                  <th class="px-4 py-3 border">Koreksi</th>
                </tr>
              </thead>

              <tbody class="bg-white text-gray-700">
                <!-- Row 1: lengkap -->
                <tr class="border-b">
                  <td class="px-4 py-3 border">1</td>
                  <td class="px-4 py-3 border">123</td>
                  <td class="px-4 py-3 border">Trhecia</td>
                  <td class="px-4 py-3 border">1 January 2012</td>
                  <td class="px-4 py-3 border">2012</td>
                  <td class="px-4 py-3 border">1</td>
                  <td class="px-4 py-3 border">Rp. 205.000</td>
                  <td class="px-4 py-3 border">Migrasi</td>
                  <td class="px-4 py-3 border text-center">
                    <button class="text-xs px-2 py-1 bg-gray-300 text-gray-800 rounded">Hapus</button>
                  </td>
                </tr>

                <!-- Baris kosong sesuai gambar -->
                <tr class="border-b">
                  <td class="px-4 py-3 border">2</td>
                  <td class="px-4 py-3 border"></td>
                  <td class="px-4 py-3 border"></td>
                  <td class="px-4 py-3 border"></td>
                  <td class="px-4 py-3 border"></td>
                  <td class="px-4 py-3 border"></td>
                  <td class="px-4 py-3 border"></td>
                  <td class="px-4 py-3 border"></td>
                  <td class="px-4 py-3 border text-center"></td>
                </tr>

                <tr class="border-b">
                  <td class="px-4 py-3 border">3</td>
                  <td class="px-4 py-3 border"></td>
                  <td class="px-4 py-3 border"></td>
                  <td class="px-4 py-3 border"></td>
                  <td class="px-4 py-3 border"></td>
                  <td class="px-4 py-3 border"></td>
                  <td class="px-4 py-3 border"></td>
                  <td class="px-4 py-3 border"></td>
                  <td class="px-4 py-3 border text-center"></td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Tombol Kembali -->
          <div class="mt-6">
            <a href="/riwayatmanfaatkepala" class="inline-block px-4 py-2 bg-[#2994A4] text-white rounded">Kembali</a>
          </div>

        </div>
      </main>
    </div>

  </div>
</body>
</html>