<!DOCTYPE html>
<html lang="id" x-data="{ mitra:false, kepesertaan:false, kepensiunan:false }">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Nilai Aktuaria</title>
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
        <a href="/menuadmin" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
          <span>🏠</span> <span>Home</span>
        </a>

        <a href="#" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
          <span>👤</span> <span>Peserta</span>
        </a>

        <!-- Kepesertaan -->
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

        <!-- Mitra -->
        <div x-data="{ mitra: window.location.pathname.includes('mitra') || window.location.pathname.includes('nilaiaktuariaadmin') }">
          <button @click="mitra = !mitra" 
                  :class="mitra ? 'bg-cyan-800' : ''"
                  class="w-full flex justify-between items-center px-3 py-2 rounded hover:bg-cyan-800">
            <span class="flex items-center space-x-2">
              <span>🤝</span> <span>Mitra</span>
            </span>
            <span x-text="mitra ? '▾' : '▸'"></span>
          </button>

          <div x-show="mitra" class="pl-10 mt-1 space-y-1" x-cloak>
            <a href="/mitra&sekolahadmin"
              :class="window.location.pathname.includes('mitra') 
                      ? 'bg-white text-[#2994A4] font-semibold rounded block px-3 py-1' 
                      : 'block px-3 py-1 hover:bg-cyan-800 rounded'">
              Mitra & Sekolah
            </a>

            <a href="/nilaiaktuariaadmin"
              :class="window.location.pathname.includes('nilaiaktuariaadmin') 
                      ? 'bg-white text-[#2994A4] font-semibold rounded block px-3 py-1' 
                      : 'block px-3 py-1 hover:bg-cyan-800 rounded'">
              Nilai Aktuaria
            </a>
          </div>
        </div>

        <!-- Kepensiunan -->
        <div>
          <button @click="kepensiunan = !kepensiunan" class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
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
            <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Daftar Terminasi</a>
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

    <!-- Content -->
    <main class="flex-1 bg-white p-6 overflow-auto">
      <h1 class="text-2xl font-bold mb-3">Edit Nilai Aktuaria</h1>

      <div class="card shadow-sm bg-white p-4 rounded">
        <form action="{{ route('nilaiaktuaria.update', $nilai->idaktuaria) }}" method="POST">
  @csrf
  @method('PUT')

  <div class="grid grid-cols-2 gap-4 mb-4">
    <div>
      <label class="block mb-1">Tahun Aktuaria</label>
      <input type="text" name="thnaktuaria" value="{{ $nilai->thnaktuaria }}" readonly
             class="w-full border px-3 py-2 rounded">
    </div>
    <div>
      <label class="block mb-1">Nama Mitra</label>
      <input type="text" name="namamitra" value="{{ $mitra->nama_um ?? '' }}" readonly
             class="w-full border px-3 py-2 rounded">
    </div>
  </div>

  <div class="grid grid-cols-2 gap-4 mb-4">
    <div>
      <label class="block mb-1">Bulan Berlaku</label>
      <input type="number" name="blnberlaku" value="{{ $nilai->blnberlaku }}" required
             class="w-full border px-3 py-2 rounded">
    </div>
    <div>
      <label class="block mb-1">Tahun Berlaku</label>
      <input type="number" name="thnberlaku" value="{{ $nilai->thnberlaku }}" required
             class="w-full border px-3 py-2 rounded">
    </div>
  </div>

  <div class="grid grid-cols-3 gap-4 mb-4">
    <div>
      <label class="block mb-1">IP</label>
      <input type="number" name="ip" step="0.01" value="{{ $nilai->ip }}" required
             class="w-full border px-3 py-2 rounded">
    </div>
    <div>
      <label class="block mb-1">IPK</label>
      <input type="number" name="ipk" step="0.01" value="{{ $nilai->ipk }}" required
             class="w-full border px-3 py-2 rounded">
    </div>
    <div>
      <label class="block mb-1">Nilai Tambahan</label>
      <input type="number" name="nilaitambahan" step="0.01" value="{{ $nilai->nilaitambahan }}"
             class="w-full border px-3 py-2 rounded">
    </div>
  </div>

  <div class="flex gap-4 mt-4">
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
      💾 Simpan Perubahan
    </button>
    <a href="{{ url('/datanilaiaktuariaadmin?idunit=' . $mitra->idunit) }}" 
       class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
      ← Kembali
    </a>
  </div>
</form>
      </div>
    </main>
  </div>

</body>
</html>