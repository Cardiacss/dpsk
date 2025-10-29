<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Mitra & Sekolah - Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100">
  <div class="flex h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-[#2994A4] text-white flex flex-col">
      <div class="p-4 text-lg font-bold border-b border-white/20 text-center">
        DANA PENSIUN <br> SEKOLAH KRISTEN
      </div>

      <nav class="flex-1 px-4 space-y-2 mt-4">
        <a href="/menuadmin" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
          🏠 <span>Home</span>
        </a>
        <a href="/mitra&sekolahadmin" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded bg-cyan-800">
          🤝 <span>Mitra & Sekolah</span>
        </a>
        <a href="/nilaiaktuariaadmin" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
          📊 <span>Nilai Aktuaria</span>
        </a>
      </nav>

      <div class="p-4 text-xs border-t border-white/20 text-center">
        Gedung FTI UKSW, Salatiga <br>
        <a href="mailto:ftik@uksw.edu" class="underline">ftik@uksw.edu</a>
      </div>
    </aside>

    <!-- Halaman Konten -->
    <main class="flex-1 p-8 overflow-auto bg-white">
      <h2 class="text-2xl font-semibold mb-6 text-center text-gray-800">Edit Mitra & Sekolah</h2>

      <!-- Form Edit -->
      <form action="{{ route('unit.update', $unit->idunit) }}" method="POST">
  @csrf
  @method('PUT')

  <div class="grid grid-cols-2 gap-6">
    <div>
      <label class="block mb-1 font-semibold text-gray-700">Nama Mitra</label>
      <input type="text" name="nama_um" value="{{ $unit->nama_um }}" class="w-full border border-gray-300 rounded p-2">
    </div>

    <div>
      <label class="block mb-1 font-semibold text-gray-700">Alamat</label>
      <input type="text" name="alamat_um" value="{{ $unit->alamat_um }}" class="w-full border border-gray-300 rounded p-2">
    </div>

    <div>
      <label class="block mb-1 font-semibold text-gray-700">Status</label>
      <select name="stat_um" class="w-full border border-gray-300 rounded p-2">
        <option value="Aktif" {{ $unit->stat_um == 'Aktif' ? 'selected' : '' }}>Aktif</option>
        <option value="Nonaktif" {{ $unit->stat_um == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
      </select>
    </div>

    <div>
      <label class="block mb-1 font-semibold text-gray-700">Iuran Peserta</label>
      <input type="number" step="0.01" name="ip_pct" value="{{ $unit->ip_pct }}" class="w-full border border-gray-300 rounded p-2">
    </div>

    <div>
      <label class="block mb-1 font-semibold text-gray-700">Iuran Pemberi Kerja</label>
      <input type="number" step="0.01" name="ipk_pct" value="{{ $unit->ipk_pct }}" class="w-full border border-gray-300 rounded p-2">
    </div>
  </div>

  <div class="mt-8 text-right">
    <a href="/mitradansekolahadmin" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
  </div>
</form>
    </main>
  </div>
</body>
</html>