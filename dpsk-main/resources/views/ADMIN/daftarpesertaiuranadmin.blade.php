<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Peserta Iuran Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="bg-gray-900">
  <div class="flex h-screen overflow-hidden">
    
    <!-- Sidebar -->
    <aside class="w-64 bg-[#2994A4] text-white flex flex-col"
           x-data="{ kepesertaan:false, mitra:false, kepensiunan:false, master:false }">

      <!-- Header -->
      <div class="p-4 text-lg font-bold border-b border-white/20">
        DANA PENSIUN <br> SEKOLAH KRISTEN
      </div>

      <!-- Menu -->
      <nav class="flex-1 px-4 space-y-2 overflow-y-auto">
        <a href="/menuadmin" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
          <span>🏠</span> <span>Home</span>
        </a>

        <a href="/daftarpesertaadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">
          👤 Peserta
        </a>

        <!-- Kepesertaan -->
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
              Simulasi Kepesertaan
            </a>
          </div>
        </div>

        <!-- Mitra -->
        <div>
          <button @click="mitra = !mitra" 
                  class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
            <span class="flex items-center space-x-2">
              <span>🤝</span> <span>Mitra</span>
            </span>
            <span x-text="mitra ? '▾' : '▸'"></span>
          </button>

          <div x-show="mitra" class="pl-10 mt-1 space-y-1" x-cloak>
            <a href="/mitra&sekolahadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Mitra & Sekolah</a>
            <a href="/nilaiaktuariaadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Nilai Aktuaria</a>
          </div>
        </div>

        <!-- Kepensiunan -->
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
            <a href="/daftarpensiunadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Lihat Pensiun</a>
            <a href="/pemberianmanfaatadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Manfaat</a>
            <a href="/riwayatmanfaatadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Riwayat</a>
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
        <a href="mailto:ftik@uksw.edu" class="underline">ftik@uksw.edu</a>
      </div>
    </aside>

    <!-- Konten -->
    <main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
      <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold mb-4">
          Daftar Peserta Mitra: {{ $mitra->nama_um }}
        </h2>

        <input type="text" placeholder="Silahkan Cari Nama/Kode"
               class="border w-full p-2 mb-6 rounded shadow">

        <table class="w-full border-collapse shadow mb-6">
          <thead>
            <tr class="bg-teal-700 text-white">
              <th class="border px-4 py-2">No</th>
              <th class="border px-4 py-2">No Peserta</th>
              <th class="border px-4 py-2">Nama</th>
              <th class="border px-4 py-2">Action</th>
            </tr>
          </thead>
          <tbody x-data="{ openId: null }">
            @foreach ($peserta as $index => $p)
              <tr @click="openId = (openId === {{ $p->idanggota }} ? null : {{ $p->idanggota }})"
                  class="cursor-pointer hover:bg-gray-200">
                <td class="border px-4 py-2 text-center">{{ $index + 1 }}</td>
                <td class="border px-4 py-2">{{ $p->nopeserta }}</td>
                <td class="border px-4 py-2">{{ $p->nama }}</td>
                <td class="border px-4 py-2 text-center">
                  <span x-text="openId === {{ $p->idanggota }} ? '▾' : 'Detail'" class="font-bold"></span>
                </td>
              </tr>

              <tr x-show="openId === {{ $p->idanggota }}" x-cloak class="bg-gray-50">
                <td colspan="4" class="p-4">
                  <table class="w-full border-collapse shadow-inner text-sm">
                    <tr><td class="border px-4 py-2 font-bold w-1/3">Nama</td><td class="border px-4 py-2">{{ $p->nama }}</td></tr>
                    <tr><td class="border px-4 py-2 font-bold">Tanggal Lahir</td><td class="border px-4 py-2">{{ $p->tgllahir?->format('d-m-Y') }}</td></tr>
                    <tr><td class="border px-4 py-2 font-bold">Alamat</td><td class="border px-4 py-2">{{ $p->alamatterakhir }}</td></tr>
                    <tr>
                      <td class="border px-4 py-2 font-bold">Aksi</td>
                      <td class="border px-4 py-2">
                        <div class="flex space-x-2">
<a href="{{ route('admin.catatiuran', ['idanggota' => $p->idanggota]) }}" 
   class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
   Catat
</a>
<a href="{{ route('admin.editiuranpeserta', ['idanggota' => $p->idanggota]) }}" 
   class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
   Edit
</a>
                          <form action="{{ route('peserta.destroy', $p->idanggota) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">Hapus</button>
                          </form>
                        </div>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>
</html>
