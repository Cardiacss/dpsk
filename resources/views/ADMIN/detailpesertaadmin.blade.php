<!DOCTYPE html>
<html lang="id" xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Menu Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="bg-gray-900">

  <div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-[#2994A4] text-white flex flex-col"
      x-data="{ kepesertaan:false, mitra:false, kepensiunan:false, master:false }">

      <!-- Header -->
      <div class="p-4 text-lg font-bold border-b border-white/20">
        DANA PENSIUN <br> SEKOLAH KRISTEN
      </div>

      <!-- Menu -->
      <nav class="flex-1 px-4 space-y-2">
        <!-- Home -->
        <a href="/menuadmin" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
          <span>🏠</span> <span>Home</span>
        </a>

        <!-- Peserta -->
        <a href="/daftarpesertaadmin" class="block px-3 py-1 bg-gray-200 text-black rounded">
          <span>👤</span> <span>Peserta</span>
        </a>

        <!-- Kepesertaan Dropdown -->
        <div>
          <button @click="kepesertaan = !kepesertaan"
            class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
            <span class="flex items-center space-x-2">
              <span>🧾</span> <span>Kepesertaan</span>
            </span>
            <span x-text="mitra ? '▾' : '▸'"></span>
          </button>
          <div x-show="kepesertaan" class="pl-10 mt-1 space-y-1" x-cloak>
            <a href="/iuranpesertaadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Iuran Peserta</a>
            <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Simulasi Kepersetaan & Manfaat Pensiun</a>
          </div>
        </div>


        <!-- Mitra Dropdown -->
        <div>
          <button @click="mitra = !mitra"
            class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
            <span class="flex items-center space-x-2">
              <span>🤝</span> <span>Mitra</span>
            </span>
            <span x-text="mitra ? '▾' : '▸'"></span>
          </button>
          <div x-show="mitra" class="pl-10 mt-1 space-y-1" x-cloak>
            <a href="/mitra&sekolahadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Mitra & Sekolah</a>
            <a href="/nilaiaktuariaadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Nilai Aktuaria</a>
          </div>
        </div>

        <!-- Kepensiunan Dropdown -->
        <div>
          <button @click="kepensiunan = !kepensiunan"
            class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
            <span class="flex items-center space-x-2">
              <span>📑</span> <span>Kepensiunan</span>
            </span>
            <span x-text="mitra ? '▾' : '▸'"></span>
          </button>
          <div x-show="kepensiunan" class="pl-10 mt-1 space-y-1" x-cloak>
            <a href="/pengajuanpensiunadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Pengajuan Pensiun</a>
            <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Perubahan Pensiun</a>
            <a href="/daftarpensiunadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Lihat Pensiun</a>
            <a href="/pemberianmanfaatadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Manfaat</a>
            <a href="/riwayatmanfaatadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Riwayat</a>
            <a href="/daftarterminasiadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Daftar Terminasi</a>
          </div>
        </div>

        <!-- Master -->
        <div>
          <button @click="master = !master"
            class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
            <span class="flex items-center space-x-2">
              <span>⚙️</span> <span>Master</span>
            </span>
            <span x-text="master ? '▾' : '▸'"></span>
          </button>
          <div x-show="master" class="pl-10 mt-1 space-y-1" x-cloak>
            <a href="/users" class="block px-3 py-1 hover:bg-cyan-800 rounded">Users</a>
            <a href="/roles" class="block px-3 py-1 hover:bg-cyan-800 rounded">Roles</a>
          </div>
        </div>

        <!-- Logout -->
        <a href="/login" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
          <span>🚪</span> <span>Logout</span>
        </a>
      </nav>

      <!-- Footer -->
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
          Peserta &gt; Lihat Detail &gt; <span class="text-blue-500">Detail</span>
        </p>

        <!-- Judul -->
        <h1 class="text-2xl font-bold text-center mb-6">Detail Peserta</h1>

        <!-- TAB -->
        <!-- Tabs -->
        <div class="flex space-x-2 mb-6 justify-center">
          <!-- Tombol Detail -->
          <a href="detailpesertaadmin" class="px-4 py-2 bg-teal-500 text-white rounded hover:bg-teal-600">
            Detail
          </a>

          <!-- Tombol Tanggungan -->
          <a href="/tanggunganpesertaadmin" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
            Tanggungan
          </a>

          <!-- Tombol Ahli Waris -->
          <a href="/ahliwarispesertaadmin" class="px-4 py-2 bg-teal-500 text-white rounded hover:bg-teal-600">
            Ahli Waris
          </a>
        </div>

        <!-- FORM DETAIL -->
        <form class="bg-white p-6 rounded shadow-md max-w-2xl mx-auto">
          <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
              <label class="block text-sm">Nomor Peserta</label>
              <input class="w-full border rounded p-2" value="{{ $peserta->nopeserta }}" readonly />
            </div>
            <div>
              <label class="block text-sm">Nama Peserta</label>
              <input class="w-full border rounded p-2" value="{{ $peserta->nama }}" readonly />
            </div>
            <div>
              <label class="block text-sm">Tempat Lahir</label>
              <input class="w-full border rounded p-2" value="{{ $peserta->tempatlahir }}" readonly />
            </div>
            <div>
              <label class="block text-sm">No KTP/Passport</label>
              <input class="w-full border rounded p-2" value="{{ $peserta->id_num }}" readonly />
            </div>
            <div>
              <label class="block text-sm">Jenis Kelamin</label>
              <input class="w-full border rounded p-2" value="{{ $peserta->jeniskelamin }}" readonly />
            </div>
            <div>
              <label class="block text-sm">Tanggal Lahir</label>
              <input class="w-full border rounded p-2" value="{{ $peserta->tgllahir }}" readonly />
            </div>
            <div class="col-span-2">
              <label class="block text-sm">Alamat Lengkap</label>
              <input class="w-full border rounded p-2" value="{{ $peserta->alamatterakhir }}" readonly />
            </div>
            <div>
              <label class="block text-sm">Kelurahan</label>
              <input class="w-full border rounded p-2" value="{{ $peserta->kelurahan }}" readonly />
            </div>
            <div>
              <label class="block text-sm">Kecamatan</label>
              <input class="w-full border rounded p-2" value="{{ $peserta->kecamatan }}" readonly />
            </div>
            <div>
              <label class="block text-sm">Kota/Kabupaten</label>
              <input class="w-full border rounded p-2" value="{{ $peserta->kotakab }}" readonly />
            </div>
            <div>
              <label class="block text-sm">Provinsi</label>
              <input class="w-full border rounded p-2" value="{{ $peserta->provinsi }}" readonly />
            </div>
            <div>
              <label class="block text-sm">Status Nikah</label>
              <input class="w-full border rounded p-2" value="{{ $peserta->statusnikah }}" readonly />
            </div>
            <div>
              <label class="block text-sm">Tanggal Perkawinan</label>
              <input class="w-full border rounded p-2" value="{{ $peserta->tglkawin }}" readonly />
            </div>
            <div>
              <label class="block text-sm">Jumlah Anak</label>
              <input class="w-full border rounded p-2" value="{{ $peserta->jumlahanak }}" readonly />
            </div>
            <div>
              <label class="block text-sm">Tanggal Pertama Iuran</label>
              <input class="w-full border rounded p-2" value="{{ $peserta->tmtiuran }}" readonly />
            </div>
            <div>
              <label class="block text-sm">Tanggal Disahkan</label>
              <input class="w-full border rounded p-2" value="{{ $peserta->tglsahpeserta }}" readonly />
            </div>
            <div>
              <label class="block text-sm">Status Kartu</label>
              <input class="w-full border rounded p-2" value="{{ $peserta->statuspeserta }}" readonly />
            </div>
          </div>

          <!-- Tombol -->
          <div class="flex justify-between mt-6">
            <a href="/daftarpesertaadmin" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">
              Kembali
            </a>
            <button type="button" class="px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">
              Cetak Kartu Peserta
            </button>
          </div>
        </form>
    </main>
  </div>
</body>

</html>