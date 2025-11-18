<!DOCTYPE html>
<html lang="id" 
      x-data="{ mitra:true, kepesertaan:false, kepensiunan:false, currentPage:'mitra' }" 
      xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Operator 2</title>
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
      <a href="/dashboaroperator2" @click="currentPage='home'"
         class="flex items-center space-x-2 px-3 py-2 rounded"
         :class="currentPage==='home' ? 'bg-gray-200 text-black' : 'hover:bg-cyan-800'">
        <span>🏠</span> <span>Home</span>
      </a>

      <!-- Mitra Dropdown -->
      <div x-data="{ open:true }">
        <button @click="open = !open"
          class="w-full flex items-center justify-between p-2 rounded hover:bg-[#257d8d]">
          <div class="flex items-center space-x-3">
            <span>🤝</span> <span>Mitra</span>
          </div>
          <span x-text="open ? '▾' : '▸'"></span>
        </button>

        <div x-show="open" class="pl-10 mt-1 space-y-1" x-cloak>
          <!-- Mitra & Sekolah -->
          <a href="/mitra&sekolahope2" 
             @click="currentPage='mitra'"
             class="block px-3 py-1 rounded"
             :class="currentPage==='mitra' 
                     ? 'bg-gray-200 text-black' 
                     : 'hover:bg-cyan-800'">
            Mitra & Sekolah
          </a>

          <!-- Nilai Aktuaria -->
          <a href="/nilaiaktuariaope2" 
             @click="currentPage='nilaiaktuaria'"
             class="block px-3 py-1 rounded"
             :class="currentPage==='nilaiaktuaria' 
                     ? 'bg-gray-200 text-black' 
                     : 'hover:bg-cyan-800'">
            Nilai Aktuaria
          </a>
        </div>
      </div>

      <!-- Logout -->
      <a href="/login"
         class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
        <span>🚪</span> <span>Logout</span>
      </a>
    </nav>

    <div class="p-4 text-xs border-t border-white/20">
      Gedung Fakultas Teknologi Informasi <br>
      Universitas Kristen Satya Wacana <br>
      Jl. Dr. O. Notohamidjojo, Salatiga <br>
      <a href="mailto:ftik@uksw.edu" class="underline">ftik@uksw.edu</a>
    </div>
  </aside>
  <!-- Content -->
  <main class="flex-1 bg-white p-6 overflow-auto">
    <h1 class="text-2xl font-bold mb-6">Edit Sekolah</h1>

    <div class="overflow-x-auto bg-white shadow rounded">
      <table class="w-full border-collapse">
        <thead class="bg-[#2994A4] text-white">
          <tr>
            <th class="p-2 border">Kode Unit</th>
            <th class="p-2 border">Nama Unit/Sekolah</th>
            <th class="p-2 border">Alamat Unit/Sekolah</th>
            <th class="p-2 border">Kelurahan</th>
            <th class="p-2 border">Kecamatan</th>
            <th class="p-2 border">Kota/Kabupaten</th>
            <th class="p-2 border">Provinsi</th>
            <th class="p-2 border">Kode Mitra Pendiri</th>
            <th class="p-2 border">Status</th>
            <th class="p-2 border">Aksi</th>
          </tr>
        </thead>
        <tbody class="text-center">
          @for ($i = 1; $i <= 5; $i++)
            <tr>
              <td class="p-2 border">{{ $i }}</td>
              <td class="p-2 border"></td>
              <td class="p-2 border"></td>
              <td class="p-2 border"></td>
              <td class="p-2 border"></td>
              <td class="p-2 border"></td>
              <td class="p-2 border"></td>
              <td class="p-2 border"></td>
              <td class="p-2 border"></td>
              <td class="p-2 border">
                <div class="flex justify-center space-x-2">
                  <button class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded">✏️</button>
                  <button class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded">🗑️</button>
                </div>
              </td>
            </tr>
          @endfor
        </tbody>
      </table>
    </div>

    <div class="mt-6">
      <button class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded shadow">
        Submit
      </button>
    </div>
  </main>
</div>

</body>
</html>
