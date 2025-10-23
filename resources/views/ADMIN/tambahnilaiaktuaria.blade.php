<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tambah Nilai Aktuaria</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900">

  <div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-[#2994A4] text-white flex flex-col">
      <div class="p-4 text-lg font-bold border-b border-white/20">
        DANA PENSIUN <br> SEKOLAH KRISTEN
      </div>

      <nav class="flex-1 px-4 space-y-2">
        <a href="/menuadmin" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
          <span>🏠</span> <span>Home</span>
        </a>

        <a href="/nilaiaktuariaadmin" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
          <span>📊</span> <span>Data Nilai Aktuaria</span>
        </a>

        <a href="/login" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
          <span>🚪</span> <span>Logout</span>
        </a>
      </nav>

      <div class="p-4 text-xs border-t border-white/20">
        Gedung Fakultas Teknologi Informasi <br />
        Universitas Kristen Satya Wacana <br />
        <a href="mailto:ftik@uksw.edu" class="underline">ftik@uksw.edu</a>
      </div>
    </aside>

    <!-- Content -->
    <main class="flex-1 bg-white p-6 overflow-auto">
      <h1 class="text-2xl font-bold mb-6">TAMBAH NILAI AKTUARIA</h1>

      <!-- Form Tambah Nilai Aktuaria -->
      <form action="{{ route('nilaiaktuaria.store') }}" method="POST" class="max-w-xl space-y-4">
        @csrf

        <!-- ID Unit (readonly) -->
        <div>
          <label class="block font-semibold mb-1 text-gray-700">ID Unit</label>
          <input type="text" name="idunit" value="{{ $mitra->idunit }}" readonly
                 class="w-full border border-gray-300 bg-gray-100 text-gray-700 rounded px-3 py-2 focus:outline-none">
        </div>

        <!-- Nama Mitra (readonly) -->
        <div>
          <label class="block font-semibold mb-1 text-gray-700">Nama Mitra</label>
          <input type="text" value="{{ $mitra->nama_um }}" readonly
                 class="w-full border border-gray-300 bg-gray-100 text-gray-700 rounded px-3 py-2 focus:outline-none">
        </div>

        <!-- Tahun Aktuaria (Primary Key) -->
        <div>
          <label class="block font-semibold mb-1 text-gray-700">Tahun Aktuaria</label>
          <input type="number" name="thnaktuaria" placeholder="Masukkan tahun aktuaria"
                 class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-[#2994A4] focus:outline-none" required>
        </div>

        <!-- Bulan Berlaku -->
        <div>
          <label class="block font-semibold mb-1 text-gray-700">Bulan Berlaku</label>
          <input type="number" name="blnberlaku" placeholder="Masukkan bulan berlaku (1-12)"
                 class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-[#2994A4] focus:outline-none" required>
        </div>

        <!-- Tahun Berlaku -->
        <div>
          <label class="block font-semibold mb-1 text-gray-700">Tahun Berlaku</label>
          <input type="number" name="thnberlaku" placeholder="Masukkan tahun berlaku"
                 class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-[#2994A4] focus:outline-none" required>
        </div>

        <!-- IP -->
        <div>
          <label class="block font-semibold mb-1 text-gray-700">IP</label>
          <input type="number" name="ip" step="0.01" placeholder="Masukkan nilai IP"
                 class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-[#2994A4] focus:outline-none" required>
        </div>

        <!-- IPK -->
        <div>
          <label class="block font-semibold mb-1 text-gray-700">IPK</label>
          <input type="number" name="ipk" step="0.01" placeholder="Masukkan nilai IPK"
                 class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-[#2994A4] focus:outline-none" required>
        </div>

        <!-- Nilai Tambahan -->
        <div>
          <label class="block font-semibold mb-1 text-gray-700">Nilai Tambahan</label>
          <input type="number" name="nilaitambahan" step="0.01" placeholder="Masukkan nilai tambahan (opsional)"
                 class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-[#2994A4] focus:outline-none">
        </div>

        <!-- Tombol Aksi -->
        <div class="flex items-center gap-3 mt-6">
          <button type="submit"
                  class="bg-[#2994A4] text-white px-5 py-2 rounded hover:bg-cyan-700 transition">
            💾 Simpan Data
          </button>

<a href="/datanilaiaktuariaadmin?idunit={{ $mitra->idunit }}"
   class="bg-gray-300 text-gray-800 px-5 py-2 rounded hover:bg-gray-400 transition">
  ↩️ Kembali
</a>
        </div>
      </form>
    </main>
  </div>
</body>
</html>
