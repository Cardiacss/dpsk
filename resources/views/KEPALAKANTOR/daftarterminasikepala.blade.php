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
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Manfaat</a>
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Riwayat</a>
                    <!-- Aktif di sini -->
                    <a href="/daftarterminasikepala" class="block px-3 py-1 bg-gray-200 text-black rounded">Daftar Terminasi</a>
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
            <span class="text-blue-600 font-semibold">Terminasi</span>
        </div>

        <!-- Judul -->
        <h1 class="text-2xl font-bold mb-6">Terminasi Pensiun</h1>

        <!-- Tombol tampilkan semua -->
        <button class="mb-4 bg-[#2994A4] hover:bg-[#257f8d] text-white px-4 py-2 rounded shadow">
            Tampilkan semua Daftar Terminasi Pensiun
        </button>

        <!-- Filter -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nomor Peserta</label>
                <input type="text" placeholder="Cari Nomor Peserta"
                       class="mt-1 w-full border rounded p-2 focus:ring focus:ring-[#2994A4] focus:outline-none"/>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Mitra</label>
                <select class="mt-1 w-full border rounded p-2 focus:ring focus:ring-[#2994A4] focus:outline-none">
                    <option value="">Pilih Mitra</option>
                </select>
            </div>
        </div>

        <div class="flex gap-2 mb-6">
            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Cari</button>
            <button class="bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded">Clear</button>
        </div>

        <!-- Tabel -->
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 text-sm">
                <thead class="bg-[#2994A4] text-white">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">No Pensiun</th>
                        <th class="px-4 py-2 border">Nama Pensiunan</th>
                        <th class="px-4 py-2 border">Pekerjaan</th>
                        <th class="px-4 py-2 border">Unit Terakhir</th>
                        <th class="px-4 py-2 border">Tanggal Pensiun</th>
                        <th class="px-4 py-2 border">Tanggal Berakhir</th>
                        <th class="px-4 py-2 border">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-gray-700">
                    <!-- Contoh data dummy -->
                    <tr class="border-t">
                        <td class="px-4 py-2 border">1</td>
                        <td class="px-4 py-2 border">PN-001</td>
                        <td class="px-4 py-2 border">Budi Santoso</td>
                        <td class="px-4 py-2 border">Guru</td>
                        <td class="px-4 py-2 border">SMA Kristen 1</td>
                        <td class="px-4 py-2 border">01-01-2020</td>
                        <td class="px-4 py-2 border">01-01-2025</td>
                       <td class="px-4 py-2 border text-center">
                        <a href="{{ route('detailterminasipensiunkepala') }}"
                        class="inline-block bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded-lg shadow">
                        Lihat Detail
                        </a>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
</div>
</body>
</html>
