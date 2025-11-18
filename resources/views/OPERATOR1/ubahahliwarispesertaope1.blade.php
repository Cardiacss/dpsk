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
    <nav class="text-sm mb-4 text-gray-600">
      <a href="#" class="hover:underline">Peserta</a> >
      <a href="#" class="hover:underline">Lihat Detail</a> >
      <a href="#" class="hover:underline">Ahli Waris</a> >
      <span class="text-gray-800 font-semibold">Ubah Ahli Waris</span>
    </nav>

    <!-- Judul -->
    <h1 class="text-xl font-bold mb-6 text-center">
      Ubah Ahli Waris
    </h1>

    <!-- Form -->
    <form class="space-y-4 max-w-2xl mx-auto">
      <div>
        <label class="block text-gray-700 mb-1">Nama Lengkap</label>
        <input type="text" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-cyan-300">
      </div>

      <div>
        <label class="block text-gray-700 mb-1">Tempat Lahir</label>
        <input type="text" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-cyan-300">
      </div>

      <div>
        <label class="block text-gray-700 mb-1">Tanggal Lahir</label>
        <input type="date" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-cyan-300">
      </div>

      <div>
        <label class="block text-gray-700 mb-1">Jenis Kelamin</label>
        <select class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-cyan-300">
          <option>Laki-laki</option>
          <option>Perempuan</option>
        </select>
      </div>

      <div>
        <label class="block text-gray-700 mb-1">Hubungan</label>
        <input type="text" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-cyan-300">
      </div>

      <div>
        <label class="block text-gray-700 mb-1">Pekerjaan</label>
        <input type="text" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-cyan-300">
      </div>

      <div>
        <label class="block text-gray-700 mb-1">Tanggal</label>
        <input type="date" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-cyan-300">
      </div>

      <div>
        <label class="block text-gray-700 mb-1">Nomor Surat</label>
        <input type="text" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-cyan-300">
      </div>

      <!-- Tombol -->
      <div class="text-center pt-4">
        <button type="submit" class="bg-cyan-600 hover:bg-cyan-700 text-white px-6 py-2 rounded shadow">
          Simpan
        </button>
      </div>
    </form>
  </div>
</main>