<!DOCTYPE html>
<html lang="id" x-data="{ kepesertaan:false, mitra:false, kepensiunan:false, currentPage:'home' }">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu Kepala Sekolah</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-900">

  <div class="flex h-screen">\
    <!-- Sidebar -->
    <aside class="w-64 bg-[#2994A4] text-white flex flex-col">
      <div class="p-4 text-lg font-bold border-b border-white/20">
        DANA PENSIUN <br> SEKOLAH KRISTEN
      </div>

      <nav class="flex-1 px-2 py-4 space-y-2">
        <!-- Home -->
        <a href="/dashboaroperator1"
           @click="currentPage='home'"
           class="flex items-center space-x-2 px-3 py-2 rounded"
           :class="currentPage==='home' ? 'bg-gray-200 text-black' : 'hover:bg-[#257d8d]'">
          <span>🏠</span>
          <span>Home</span>
        </a>

        <!-- Peserta -->
        <a href="/daftarpesertaope1"
           @click="currentPage='peserta'"
           class="flex items-center space-x-2 px-3 py-2 rounded"
           :class="currentPage==='peserta' ? 'bg-gray-200 text-black' : 'hover:bg-[#257d8d]'">
          <span>👤</span>
          <span>PESERTA</span>
        </a>
        <!-- Logout -->
        <a href="/login" class="flex items-center space-x-2 px-3 py-2 hover:bg-[#257d8d] rounded">
          <span>🚪</span>
          <span>LOGOUT</span>
        </a>
      </nav>

      <!-- Footer Sidebar -->
      <div class="p-4 text-xs border-t border-white/20">
        Gedung Fakultas Teknologi Informasi <br>
        Universitas Kristen Satya Wacana <br>
        Jl. Diponegoro No. 52-60 Salatiga <br>
        Indonesia <br>
        <a href="mailto:ftik@uksw.edu" class="underline">ftik@uksw.edu</a>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 bg-white p-6">
      <h1 class="text-center text-2xl font-bold mb-6">SELAMAT DATANG</h1>
      <p class="text-center text-lg">Anda Masuk Sebagai Operator 1
      </p>
    </main>
  </div>

</body>
</html>
