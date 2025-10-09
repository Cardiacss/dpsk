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
        <a href="/daftarpesertaope1" 
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
  <a href="detailpesertakepala" 
     class="px-4 py-2 bg-teal-500 text-white rounded hover:bg-teal-600">
     Detail
  </a>

  <!-- Tombol Tanggungan -->
  <a href="/tanggunganpesertaope1" 
     class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
     Tanggungan
  </a>

  <!-- Tombol Ahli Waris -->
  <a href="/ahliwarispesertaope1" 
     class="px-4 py-2 bg-teal-500 text-white rounded hover:bg-teal-600">
     Ahli Waris
  </a>
</div>

      <!-- FORM DETAIL -->
      <form class="bg-white p-6 rounded shadow-md max-w-2xl mx-auto">
        <div class="grid grid-cols-2 gap-4 mb-4">
          <div>
            <label class="block text-sm">Nomor peserta</label>
            <input class="w-full border rounded p-2" readonly />
          </div>
          <div>
            <label class="block text-sm">Nama Peserta</label>
            <input class="w-full border rounded p-2" readonly />
          </div>
          <div>
            <label class="block text-sm">Tempat Lahir</label>
            <input class="w-full border rounded p-2" readonly />
          </div>
          <div>
            <label class="block text-sm">No KTP/Passport</label>
            <input class="w-full border rounded p-2" readonly />
          </div>
          <div>
            <label class="block text-sm">Jenis Kelamin</label>
            <input class="w-full border rounded p-2" readonly />
          </div>
          <div>
            <label class="block text-sm">Tanggal Lahir</label>
            <input class="w-full border rounded p-2" readonly />
          </div>
          <div class="col-span-2">
            <label class="block text-sm">Alamat Lengkap</label>
            <input class="w-full border rounded p-2" readonly />
          </div>
          <div>
            <label class="block text-sm">Kelurahan</label>
            <input class="w-full border rounded p-2" readonly />
          </div>
          <div>
            <label class="block text-sm">Kota</label>
            <input class="w-full border rounded p-2" readonly />
          </div>
          <div>
            <label class="block text-sm">Status Nikah</label>
            <input class="w-full border rounded p-2" readonly />
          </div>
          <div>
            <label class="block text-sm">Tanggal Perkawinan</label>
            <input class="w-full border rounded p-2" readonly />
          </div>
          <div>
            <label class="block text-sm">Jumlah Anak</label>
            <input class="w-full border rounded p-2" readonly />
          </div>
          <div>
            <label class="block text-sm">Tanggal Pertama Iuran</label>
            <input class="w-full border rounded p-2" readonly />
          </div>
          <div>
            <label class="block text-sm">Tanggal Disahkan</label>
            <input class="w-full border rounded p-2" readonly />
          </div>
          <div>
            <label class="block text-sm">Status Kartu</label>
            <input class="w-full border rounded p-2" readonly />
          </div>
        </div>

        <!-- Tombol -->
        <div class="flex justify-between mt-6">
          <a href="daftarpesertakepala.html" 
             class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">
            Kembali
          </a>
          <button type="button" 
                  class="px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">
            Cetak Kartu Peserta
          </button>
        </div>
      </form>
    </main>
  </div>
</body>
</html>