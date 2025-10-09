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
                     <!-- Aktif di sini -->
                    <a href="/pemberianmanfaatkepala" class="block px-3 py-1 bg-gray-200 text-black rounded">Manfaat</a>
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Riwayat</a>
                    <a href="/pemberianmanfaatkepala" class="block px-3 py-1 hover:bg-cyan-800 rounded">Daftar Terminasi</a>
                    
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
      <p class="text-sm text-gray-500 mb-4">
        Peserta &gt; <a href="#" class="text-blue-500">Pendaftaran Peserta</a>
      </p>

      <!-- Judul -->
      <h1 class="text-2xl font-bold mb-6 text-center">Pendaftaran Peserta</h1>

      <form class="bg-white p-6 rounded shadow-md">
        <!-- Identitas -->
        <div class="grid grid-cols-2 gap-4 mb-4">
          <div>
            <label class="block text-sm">Nomor peserta</label>
            <input class="w-full border rounded p-2" />
          </div>
          <div>
            <label class="block text-sm">No KTP/Passport</label>
            <input class="w-full border rounded p-2" />
          </div>
          <div>
            <label class="block text-sm">Nama Peserta</label>
            <input class="w-full border rounded p-2" />
          </div>
          <div>
            <label class="block text-sm">Jenis Kelamin</label>
            <div class="flex space-x-4 mt-2">
              <label><input type="radio" name="gender" /> Pria</label>
              <label><input type="radio" name="gender" /> Wanita</label>
            </div>
          </div>
          <div>
            <label class="block text-sm">Tempat Lahir</label>
            <input class="w-full border rounded p-2" />
          </div>
          <div>
            <label class="block text-sm">Tanggal Lahir</label>
            <input type="date" class="w-full border rounded p-2" />
          </div>
        </div>

        <!-- Alamat -->
        <div class="mb-4">
          <label class="block text-sm">Alamat Lengkap</label>
          <input class="w-full border rounded p-2 mb-4" />
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-sm">Kelurahan</label>
              <input class="w-full border rounded p-2" />
            </div>
            <div>
              <label class="block text-sm">Kecamatan</label>
              <input class="w-full border rounded p-2" />
            </div>
            <div>
              <label class="block text-sm">Kota</label>
              <input class="w-full border rounded p-2" />
            </div>
            <div>
              <label class="block text-sm">Provinsi</label>
              <input class="w-full border rounded p-2" />
            </div>
          </div>
        </div>

        <!-- PEKERJAAN -->
        <div class="mb-4">
          <h2 class="text-lg font-semibold mb-2">Pekerjaan</h2>
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-sm">Mitra Pemberi Kerja</label>
              <input class="w-full border rounded p-2" />
            </div>
            <div>
              <label class="block text-sm">Unit Kerja</label>
              <input class="w-full border rounded p-2" />
            </div>
            <div class="col-span-2">
              <label class="block text-sm">Pekerjaan</label>
              <input class="w-full border rounded p-2" />
            </div>
          </div>
          <!-- Tombol Ubah Mitra & Unit -->
          <div class="flex justify-end mt-3">
            <button type="button" 
                    class="px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">
              Ubah Mitra & Unit
            </button>
          </div>
        </div>

        <!-- Keluarga -->
        <div class="grid grid-cols-2 gap-4 mb-4">
          <div>
            <label class="block text-sm">Status Nikah</label>
            <input class="w-full border rounded p-2" />
          </div>
          <div>
            <label class="block text-sm">Tanggal Perkawinan</label>
            <input type="date" class="w-full border rounded p-2" />
          </div>
          <div class="col-span-2">
            <label class="block text-sm">Jumlah Anak</label>
            <input type="number" class="w-full border rounded p-2" />
          </div>
        </div>

        <!-- Keanggotaan -->
        <div class="grid grid-cols-2 gap-4 mb-4">
          <div>
            <label class="block text-sm">Tanggal Pertama Iuran</label>
            <input type="date" class="w-full border rounded p-2" />
          </div>
          <div>
            <label class="block text-sm">Tanggal Disahkan</label>
            <input type="date" class="w-full border rounded p-2" />
          </div>
          <div class="col-span-2">
            <label class="block text-sm">Status Kartu</label>
            <input class="w-full border rounded p-2" />
          </div>
        </div>

        <!-- Catatan -->
        <p class="text-sm text-gray-600 mb-4">
          Silahkan lengkapi data Pernikahan dan Anggota Keluarga pada Edit Keluarga Peserta dan Pernikahan.
        </p>

        <!-- Tombol -->
        <div class="flex space-x-4">
          <a href="daftarpesertakepala.html" 
             class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">
            Kembali
          </a>
          <button type="submit" 
                  class="px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">
            Submit
          </button>
        </div>
      </form>
    </main>
  </div>
</body>
</html>