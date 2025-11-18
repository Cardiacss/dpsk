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

    <!--connten-->
    <main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
        <div class="bg-white rounded-lg shadow p-6">
    <h1 class="text-xl font-bold mb-4">Riwayat Manfaat</h1>
    <nav class="text-sm mb-6 text-gray-600">
      Kepensiunan &gt; <a href="/riwayatmanfaatkepala" class="text-blue-600">Riwayat Manfaat</a>
    </nav>

    <!-- Tombol Aksi -->
    <div class="flex space-x-3 mb-6">
      <a href="/daftarpensiunkepala" class="px-4 py-2 bg-[#2994A4] text-white rounded hover:bg-cyan-700">Lihat Daftar Pensiun</a>
      <a href="/pemberianmanfaatkepala" class="px-4 py-2 bg-[#2994A4] text-white rounded hover:bg-cyan-700">Pemberian Manfaat</a>
      <button class="px-4 py-2 bg-[#2994A4] text-white rounded hover:bg-cyan-700">Cetak Manfaat</button>
    </div>

    <!-- Data Peserta -->
    <div class="bg-white p-4 rounded-lg shadow">
      <table class="w-full">
        <thead class="bg-[#2994A4] text-white">
          <tr>
            <th class="px-4 py-2 text-left">No</th>
            <th class="px-4 py-2 text-left">No Pensiun</th>
            <th class="px-4 py-2 text-left">Nama</th>
            <th class="px-4 py-2 text-center">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <tr>
            <td class="px-4 py-2">1</td>
            <td class="px-4 py-2">321</td>
            <td class="px-4 py-2">Threcia</td>
            <td class="px-4 py-2 text-center">
  <a href="{{ route('riwayatmanfaatcekkepala') }}"
     class="px-3 py-1 bg-gray-500 text-white text-sm rounded hover:bg-gray-600">
    Cek
  </a>
</td>

          </tr>
          <tr>
            <td class="px-4 py-2">2</td>
            <td class="px-4 py-2">322</td>
            <td class="px-4 py-2">Ivan</td>
            <td class="px-4 py-2 text-center">
  <a href="{{ route('riwayatmanfaatcekkepala') }}"
     class="px-3 py-1 bg-gray-500 text-white text-sm rounded hover:bg-gray-600">
    Cek
  </a>
</td>

          </tr>
          <tr>
            <td class="px-4 py-2">3</td>
            <td class="px-4 py-2">323</td>
            <td class="px-4 py-2">Filbert</td>
            <td class="px-4 py-2 text-center">
  <a href="{{ route('riwayatmanfaatcekkepala') }}"
     class="px-3 py-1 bg-gray-500 text-white text-sm rounded hover:bg-gray-600">
    Cek
  </a>
</td>

          </tr>
        </tbody>
      </table>
    </div>

    <!-- Tombol Kembali -->
    <div class="mt-6">
      <a href="/riwayatmanfaatkepala" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Kembali</a>
    </div>
  </main>
</body>
</html>