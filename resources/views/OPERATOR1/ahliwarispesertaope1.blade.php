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
         <!-- MAIN CONTENT -->
  <main class="flex-1 bg-gray-100 p-6">
    <h1 class="text-2xl font-bold text-center mb-4">Detail Peserta</h1>

    <!-- Breadcrumb -->
    <p class="text-sm text-gray-500 mb-4">Peserta &gt; Lihat Detail &gt; Ahli Waris</p>

    <!-- Tabs -->
   <!-- Tabs -->
   <div class="flex space-x-2 mb-6 justify-center">
  <!-- Tombol Detail -->
  <a href="/detailpesertaope1" 
     class="px-4 py-2 bg-teal-500 text-white rounded hover:bg-teal-600">
     Detail
  </a>

  <!-- Tombol Tanggungan -->
  <a href="/tanggunganpesertaope1" 
     class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
     Tanggungan
  </a>

  <!-- Tombol Ahli Waris -->
  <a href="#" 
     class="px-4 py-2 bg-teal-500 text-white rounded hover:bg-teal-600">
     Ahli Waris
  </a>
</div>

    <!-- Data Peserta -->
    <div class="grid grid-cols-2 gap-4 bg-white p-4 rounded shadow mb-6">
      <div>
        <label class="block text-sm font-medium">Nomor Peserta</label>
        <input type="text" class="w-full border rounded px-2 py-1" value="123456" disabled />
      </div>
      <div>
        <label class="block text-sm font-medium">Mitra / Pemberi Kerja</label>
        <input type="text" class="w-full border rounded px-2 py-1" value="PT Contoh" disabled />
      </div>
      <div>
        <label class="block text-sm font-medium">Nama Peserta</label>
        <input type="text" class="w-full border rounded px-2 py-1" value="Budi Santoso" disabled />
      </div>
      <div>
        <label class="block text-sm font-medium">Unit Kerja</label>
        <input type="text" class="w-full border rounded px-2 py-1" value="Keuangan" disabled />
      </div>
      <div>
        <label class="block text-sm font-medium">Status Nikah</label>
        <input type="text" class="w-full border rounded px-2 py-1" value="Menikah" disabled />
      </div>
      <div>
        <label class="block text-sm font-medium">Status Waris</label>
        <input type="text" class="w-full border rounded px-2 py-1" value="Aktif" disabled />
      </div>
    </div>

    <!-- Tabel Ahli Waris -->
    <h2 class="font-semibold mb-2">Menunjuk :</h2>
    <div class="bg-white rounded shadow overflow-hidden">
      <table class="w-full text-sm">
        <thead class="bg-teal-500 text-white">
          <tr>
            <th class="py-2 px-4 text-left">Nama Lengkap</th>
            <th class="py-2 px-4 text-left">Tempat/Tgl Lahir</th>
            <th class="py-2 px-4 text-left">Jenis Kelamin</th>
            <th class="py-2 px-4 text-left">Hubungan</th>
            <th class="py-2 px-4 text-left">Pekerjaan</th>
            <th class="py-2 px-4 text-left">Tanggal</th>
            <th class="py-2 px-4 text-left">Nomor Surat</th>
            <th class="py-2 px-4 text-left">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b">
            <td class="py-2 px-4">Herawati Rubiana</td>
            <td class="py-2 px-4">Yogyakarta / 1985-07-08</td>
            <td class="py-2 px-4">Wanita</td>
            <td class="py-2 px-4">Istri</td>
            <td class="py-2 px-4">Hidup</td>
            <td class="py-2 px-4">2025-09-25</td>
            <td class="py-2 px-4">001/AW/2025</td>
           <td class="px-4 py-2 border space-x-2">
  <a href="/ubahahliwarispesertaope1" 
     class="px-3 py-1 bg-teal-600 text-white rounded hover:bg-teal-700 text-sm inline-block">
    Ubah
  </a>
  <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">Hapus</button>
</td>

          </tr>
        </tbody>
      </table>
    </div>

    <!-- Tombol Kembali -->
    <div class="mt-6">
      <a href="detailpeserta.html" 
         class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>
    </div>
  </main>
</body>
</html>