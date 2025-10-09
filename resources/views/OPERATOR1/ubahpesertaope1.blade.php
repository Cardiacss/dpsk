<!DOCTYPE html>
<html lang="id" x-data="{ }" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Kepala Sekolah</title>
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

      <nav class="flex-1 px-4 space-y-2">
        <!-- Home -->
        <a href="/dashboaroperator1" 
           class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
          <span>🏠</span> <span>Home</span>
        </a>

        <!-- Peserta -->
        <a href="/daftarpesertakepala" 
           class="flex items-center space-x-2 px-3 py-2 bg-gray-200 text-black rounded">
          <span>👤</span> <span>Peserta</span>
        </a>

        <!-- Logout -->
        <a href="/login" 
           class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
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
        Home > Peserta > <a href="/ubahpesertaope1" class="text-blue-600">Ubah Peserta</a>
      </div>
      <h1 class="text-2xl font-bold mb-6 text-center">Ubah Peserta</h1>

      <form class="bg-white shadow-md rounded p-6 space-y-6">
        <!-- Identitas -->
        <div>
          <h2 class="text-lg font-semibold mb-4">Identitas</h2>
          <div class="grid grid-cols-3 gap-4">
            <div>
              <label class="block text-sm">Nomor Peserta</label>
              <input type="text" class="border rounded w-full px-3 py-2" />
            </div>
            <div>
              <label class="block text-sm">No KTP/Passport</label>
              <input type="text" class="border rounded w-full px-3 py-2" />
            </div>
            <div>
              <label class="block text-sm">Nama Peserta</label>
              <input type="text" class="border rounded w-full px-3 py-2" />
            </div>
            <div>
              <label class="block text-sm">Tempat Lahir</label>
              <input type="text" class="border rounded w-full px-3 py-2" />
            </div>
            <div>
              <label class="block text-sm">Jenis Kelamin</label>
              <div class="flex items-center gap-4 mt-1">
                <label><input type="radio" name="jk" /> Pria</label>
                <label><input type="radio" name="jk" /> Wanita</label>
              </div>
            </div>
            <div>
              <label class="block text-sm">Tanggal Lahir</label>
              <input type="date" class="border rounded w-full px-3 py-2" />
            </div>
          </div>
        </div>

        <!-- Alamat -->
        <div>
          <h2 class="text-lg font-semibold mb-4">Alamat</h2>
          <input type="text" placeholder="Alamat Lengkap" class="border rounded w-full px-3 py-2 mb-3" />
          <div class="grid grid-cols-4 gap-4">
            <input type="text" placeholder="Kelurahan" class="border rounded px-3 py-2" />
            <input type="text" placeholder="Kecamatan" class="border rounded px-3 py-2" />
            <input type="text" placeholder="Kota" class="border rounded px-3 py-2" />
            <input type="text" placeholder="Provinsi" class="border rounded px-3 py-2" />
          </div>
        </div>

        <!-- Pekerjaan -->
        <div>
          <h2 class="text-lg font-semibold mb-4">Pekerjaan</h2>
          <div class="grid grid-cols-3 gap-4">
            <input type="text" placeholder="Mitra Pemberi Kerja" class="border rounded px-3 py-2" />
            <input type="text" placeholder="Unit Kerja" class="border rounded px-3 py-2" />
            <input type="text" placeholder="Pekerjaan" class="border rounded px-3 py-2" />
          </div>
          <button type="button" class="mt-3 bg-teal-600 text-white px-4 py-2 rounded hover:bg-teal-700">
            Ubah Mitra & Unit
          </button>
        </div>

        <!-- Keluarga -->
        <div>
          <h2 class="text-lg font-semibold mb-4">Keluarga</h2>
          <div class="grid grid-cols-3 gap-4">
            <input type="text" placeholder="Status Nikah" class="border rounded px-3 py-2" />
            <input type="date" class="border rounded px-3 py-2" placeholder="Tanggal Perkawinan" />
            <input type="number" placeholder="Jumlah Anak" class="border rounded px-3 py-2" />
          </div>
        </div>

        <!-- Keanggotaan -->
        <div>
          <h2 class="text-lg font-semibold mb-4">Keanggotaan</h2>
          <div class="grid grid-cols-3 gap-4">
            <input type="date" class="border rounded px-3 py-2" placeholder="Tanggal Pertama Iuran" />
            <input type="date" class="border rounded px-3 py-2" placeholder="Tanggal Disahkan" />
            <input type="text" placeholder="Status Kartu" class="border rounded px-3 py-2" />
          </div>
        </div>

        <div class="flex items-center justify-between">
          <a href="/daftarpesertakepala" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>
          <button type="submit" class="px-6 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">Submit</button>
        </div>
        <p class="text-sm text-gray-600 mt-4">
          Silahkan lengkapi data Pernikahan dan Anggota Keluarga pada Edit Keluarga Peserta dan Pernikahan
        </p>
      </form>
    </main>
  </div>

</body>
</html>