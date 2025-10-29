<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Mitra Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="bg-gray-900">
  <div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-[#2994A4] text-white flex flex-col"
           x-data="{ kepesertaan:false, mitra:true, kepensiunan:false, master:false }">
      <div class="p-4 text-lg font-bold border-b border-white/20">
        DANA PENSIUN <br> SEKOLAH KRISTEN
      </div>

      <nav class="flex-1 px-4 space-y-2">
        <a href="/menuadmin" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
          <span>🏠</span> <span>Home</span>
        </a>

        <a href="/daftarpesertaadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">
          <span>👤</span> <span>Peserta</span>
        </a>

        <div x-data="{ kepesertaan: false }">
          <button @click="kepesertaan = !kepesertaan"
                  class="w-full flex justify-between items-center px-3 py-2 rounded hover:bg-cyan-800">
            <span class="flex items-center space-x-2">
              <span>🧾</span> <span>Kepesertaan</span>
            </span>
            <span x-text="kepesertaan ? '▾' : '▸'"></span>
          </button>
          <div x-show="kepesertaan" class="pl-10 mt-1 space-y-1" x-cloak>
            <a href="/iuranpesertaadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Iuran Peserta</a>
            <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">
              Simulasi Kepesertaan & Manfaat Pensiun
            </a>
          </div>
        </div>

        <div x-data="{ mitra:true }">
          <button @click="mitra = !mitra"
                  :class="mitra ? 'bg-cyan-800' : ''"
                  class="w-full flex justify-between items-center px-3 py-2 rounded hover:bg-cyan-800">
            <span class="flex items-center space-x-2">
              <span>🤝</span> <span>Mitra</span>
            </span>
            <span x-text="mitra ? '▾' : '▸'"></span>
          </button>
          <div x-show="mitra" class="pl-10 mt-1 space-y-1" x-cloak>
            <a href="/mitra&sekolahadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">
              Mitra & Sekolah
            </a>
            <a href="/nilaiaktuariaadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">
              Nilai Aktuaria
            </a>
          </div>
        </div>

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
     <main class="flex-1 bg-white p-6 overflow-auto">
      <h2 class="text-2xl font-bold mb-6 text-[#2994A4]">Edit Data Sekolah</h2>

      <div class="max-w-xl bg-white p-6 rounded shadow">
       <form action="{{ route('mitra.update', $mitra->idmitra) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1">ID Mitra</label>
            <input type="text" name="idunit" value="{{ $mitra->idunit }}" class="w-full border rounded px-3 py-2 bg-gray-100" readonly>
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1">Nama Mitra</label>
            <input type="text" name="nama_um" value="{{ $mitra->nama_um }}" class="w-full border rounded px-3 py-2">
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1">Alamat</label>
            <input type="text" name="alamat_um" value="{{ $mitra->alamat_um }}" class="w-full border rounded px-3 py-2">
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1">Kecamatan</label>
            <input type="text" name="kecamatan" value="{{ $mitra->kecamatan }}" class="w-full border rounded px-3 py-2">
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1">Kota/Kab</label>
            <input type="text" name="kotakab" value="{{ $mitra->kotakab }}" class="w-full border rounded px-3 py-2">
          </div>

          <div class="flex justify-end space-x-3">
            <a href="/listmitraadmin" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Kembali</a>
            <button type="submit" class="bg-[#2994A4] hover:bg-cyan-700 text-white px-4 py-2 rounded">Simpan</button>
          </div>
        </form>
      </div>
    </main>
  </div>
</body>
</html>