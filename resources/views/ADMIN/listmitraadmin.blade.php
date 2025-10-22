<!DOCTYPE html>
<html lang="id" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>List Mitra Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="bg-gray-900">
  <div class="flex h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-[#2994A4] text-white flex flex-col"
           x-data="{ kepesertaan:false, mitra:false, kepensiunan:false, master:false }">

      <!-- Header -->
      <div class="p-4 text-lg font-bold border-b border-white/20">
        DANA PENSIUN <br> SEKOLAH KRISTEN
      </div>

      <!-- Menu -->
      <nav class="flex-1 px-4 space-y-2">
        <!-- Home -->
        <a href="/menuadmin" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
          <span>🏠</span> <span>Home</span>
        </a>

        <!-- Peserta -->
        <a href="/daftarpesertaadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">
          <span>👤</span> <span>Peserta</span>
        </a>

        <!-- Kepesertaan Dropdown -->
        <div x-data="{ kepesertaan: window.location.pathname.includes('iuranpesertaadmin') }">
          <button @click="kepesertaan = !kepesertaan"
                  :class="kepesertaan ? 'bg-cyan-800' : ''"
                  class="w-full flex justify-between items-center px-3 py-2 rounded hover:bg-cyan-800">
            <span class="flex items-center space-x-2">
              <span>🧾</span> <span>Kepesertaan</span>
            </span>
            <span x-text="kepesertaan ? '▾' : '▸'"></span>
          </button>

          <div x-show="kepesertaan" class="pl-10 mt-1 space-y-1" x-cloak>
            <a href="/iuranpesertaadmin"
               :class="window.location.pathname.includes('iuranpesertaadmin') 
                        ? 'bg-white text-[#2994A4] font-semibold rounded block px-3 py-1' 
                        : 'block px-3 py-1 hover:bg-cyan-800 rounded'">
              Iuran Peserta
            </a>
            <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">
              Simulasi Kepesertaan & Manfaat Pensiun
            </a>
          </div>
        </div>

        <!-- Mitra Dropdown -->
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

        <!-- Kepensiunan Dropdown -->
        <div>
          <button @click="kepensiunan = !kepensiunan"
                  class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
            <span class="flex items-center space-x-2">
              <span>📑</span> <span>Kepensiunan</span>
            </span>
            <span x-text="kepensiunan ? '▾' : '▸'"></span>
          </button>

          <div x-show="kepensiunan" class="pl-10 mt-1 space-y-1" x-cloak>
            <a href="/pengajuanpensiunadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Pengajuan Pensiun</a>
            <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Perubahan Pensiun</a>
            <a href="/daftarpensiunadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Lihat Pensiun</a>
            <a href="/pemberianmanfaatadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Manfaat</a>
            <a href="/riwayatmanfaatadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Riwayat</a>
            <a href="/daftarterminasiadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Daftar Terminasi</a>
          </div>
        </div>

        <!-- Master -->
        <div>
          <button @click="master = !master"
                  class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
            <span class="flex items-center space-x-2">
              <span>⚙️</span> <span>Master</span>
            </span>
            <span x-text="master ? '▾' : '▸'"></span>
          </button>
          <div x-show="master" class="pl-10 mt-1 space-y-1" x-cloak>
            <a href="/users" class="block px-3 py-1 hover:bg-cyan-800 rounded">Users</a>
            <a href="/roles" class="block px-3 py-1 hover:bg-cyan-800 rounded">Roles</a>
          </div>
        </div>

        <!-- Logout -->
        <a href="/login" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
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
    <main class="flex-1 bg-white p-6 overflow-auto">
      <h2 class="text-2xl font-bold mb-6 text-[#2994A4]">
        Daftar Mitra untuk Unit: {{ $unit->nama_um }} ({{ $unit->idunit }})
      </h2>

      <div class="overflow-x-auto bg-white shadow rounded">
        <table class="w-full border-collapse border">
          <thead class="bg-[#2994A4] text-white">
            <tr>
              <th class="border px-3 py-2 text-left">ID Mitra</th>
              <th class="border px-3 py-2 text-left">Nama Mitra</th>
              <th class="border px-3 py-2 text-left">Alamat</th>
              <th class="border px-3 py-2 text-left">Kecamatan</th>
              <th class="border px-3 py-2 text-left">Kota/Kab</th>
              <th class="border px-3 py-2 text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($mitras as $m)
            <tr class="hover:bg-gray-100">
              <td class="border px-3 py-2">{{ $m->idmitra }}</td>
              <td class="border px-3 py-2">{{ $m->nama_um }}</td>
              <td class="border px-3 py-2">{{ $m->alamat_um }}</td>
              <td class="border px-3 py-2">{{ $m->kecamatan }}</td>
              <td class="border px-3 py-2">{{ $m->kotakab }}</td>
              <td class="border px-3 py-2 text-center">
                <a href="{{ url('/editmitraadmin/' . $m->idmitra) }}" 
                   class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                  Edit
                </a>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="6" class="border text-center py-4 text-gray-500 italic">
                Tidak ada mitra pada unit ini.
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>
</html>
