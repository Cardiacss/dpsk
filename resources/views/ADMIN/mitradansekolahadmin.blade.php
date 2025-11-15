<!DOCTYPE html>
<html lang="id" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Menu Admin</title>
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
<div 
  x-data="{ mitra: window.location.pathname.includes('mitradansekolahadmin') || window.location.pathname.includes('nilaiaktuariaadmin') }">
  
  <button @click="mitra = !mitra" 
          :class="mitra ? 'bg-cyan-800' : ''"
          class="w-full flex justify-between items-center px-3 py-2 rounded hover:bg-cyan-800">
    <span class="flex items-center space-x-2">
      <span>🤝</span> <span>Mitra</span>
    </span>
    <span x-text="mitra ? '▾' : '▸'"></span>
  </button>

  <div x-show="mitra" class="pl-10 mt-1 space-y-1" x-cloak>
    <!-- Mitra & Sekolah -->
    <a href="/mitradansekolahadmin"
       :class="window.location.pathname.includes('mitradansekolahadmin') 
                ? 'bg-white text-[#2994A4] font-semibold rounded block px-3 py-1' 
                : 'block px-3 py-1 hover:bg-cyan-800 rounded'">
      Mitra & Sekolah
    </a>

    <!-- Nilai Aktuaria -->
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
                <button @click="kepensiunan = !kepensiunan" class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
                    <span class="flex items-center space-x-2">
                        <span>📑</span> <span>Kepensiunan</span>
                    </span>
                    <span x-text="mitra ? '▾' : '▸'"></span>
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
    <!-- Content -->
  <main class="flex-1 bg-white p-6 overflow-auto">
    <!-- Mitra & Sekolah Page -->
    <div x-show="currentPage === 'mitra'" x-cloak>
      <h1 class="text-2xl font-bold mb-6">MITRA & SEKOLAH</h1>

      <!-- Tombol Aksi -->
      <div class="flex flex-wrap gap-3 mb-6">
        <a href="/inputmitraadmin"
           class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded flex items-center space-x-2">
          <span>➕</span><span>Input Mitra</span>
        </a>
        <a href="/inputsekolahadmin"
           class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded flex items-center space-x-2">
          <span>➕</span><span>Input Sekolah</span>
        </a>
      </div>

      <!-- Search -->
<form method="GET" action="/mitradansekolahadmin" class="flex items-center gap-3 mb-4 w-full">
    <input type="text" 
           name="search"
           value="{{ request('search') }}"
           placeholder="Masukkan data mitra yang ingin dicari"
           class="flex-1 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#2994A4]">

    <button type="submit"
      class="p-2 rounded hover:bg-gray-200 transition" title="Cari">
      🔍
    </button>
</form>

      <!-- Table -->
      <div class="overflow-x-auto bg-white shadow rounded">
  <table class="w-full border-collapse">
    <thead class="bg-[#2994A4] text-white">
      <tr>
        <th class="p-2 border">Kode</th>
        <th class="p-2 border">Nama Unit/Mitra</th>
        <th class="p-2 border">Alamat Unit/Mitra</th>
        <th class="p-2 border">Kelurahan</th>
        <th class="p-2 border">Kecamatan</th>
        <th class="p-2 border">Kota/Kabupaten</th>
        <th class="p-2 border">Provinsi</th>
        <th class="p-2 border">Status</th>
        <th class="p-2 border">Iuran Peserta</th>
        <th class="p-2 border">Iuran Pemberi Kerja</th>
        <!-- Tambahkan kolom aksi -->
        <th class="p-2 border">Aksi</th>
      </tr>
    </thead>

    <tbody class="text-center">
  @forelse ($mitras as $m)
    <tr>
      <td class="p-2 border">{{ $m->idunit }}</td>
      <td class="p-2 border">{{ $m->nama_um }}</td>
      <td class="p-2 border">{{ $m->alamat_um }}</td>
      <td class="p-2 border">{{ $m->kelurahan }}</td>
      <td class="p-2 border">{{ $m->kecamatan }}</td>
      <td class="p-2 border">{{ $m->kotakab }}</td>
      <td class="p-2 border">{{ $m->provinsi }}</td>
      <td class="p-2 border">{{ $m->stat_um }}</td>
      <td class="p-2 border">{{ $m->nilaiaktuaria->ip ?? 'Belum Ada Data' }}%</td>
      <td class="p-2 border">{{ $m->nilaiaktuaria->ipk ?? 'Belum Ada Data' }}%</td>
      <td class="p-2 border">
        <div class="flex justify-center space-x-2">
         <a href="{{ url('/listmitraadmin/' . $m->idunit) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded">Lihat</a>
<form action="{{ route('unit.destroy', $m->idunit) }}" method="POST" 
      onsubmit="return confirm('Yakin ingin menghapus unit ini?')" 
      style="display:inline;">
  @csrf
  @method('DELETE')
  <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded">
  Hapus
  </button>
</form>
<a href="{{ route('unit.edit', ['idunit' => $m->idunit]) }}"
   class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded">
   Edit
</a>
        </div>
      </td>
    </tr>
  @empty
    <tr>
      <td colspan="11" class="p-2 border text-gray-500">Belum ada data tersedia</td>
    </tr>
  @endforelse
</tbody>
  </table>
</div>