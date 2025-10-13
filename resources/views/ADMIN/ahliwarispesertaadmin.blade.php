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
            <a href="/daftarpesertaadmin" class="block px-3 py-1 bg-gray-200 text-black rounded">
                <span>👤</span> <span>Peserta</span>
            </a>

        <!-- Kepesertaan Dropdown -->
            <div>
                <button @click="kepesertaan = !kepesertaan" class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
                    <span class="flex items-center space-x-2">
                        <span>🧾</span> <span>Kepesertaan</span>
                    </span>
                    <span x-text="mitra ? '▾' : '▸'"></span>
                </button>
                <div x-show="kepesertaan" class="pl-10 mt-1 space-y-1" x-cloak>
                    <a href="/iuranpesertaadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Iuran Peserta</a>
                    <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Simulasi Kepersetaan & Manfaat Pensiun</a>
                </div>
            </div>


          <!-- Mitra Dropdown -->
            <div>
                <button @click="mitra = !mitra" class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
                    <span class="flex items-center space-x-2">
                        <span>🤝</span> <span>Mitra</span>
                    </span>
                <span x-text="mitra ? '▾' : '▸'"></span>
                </button>
                <div x-show="mitra" class="pl-10 mt-1 space-y-1" x-cloak>
                    <a href="/mitra&sekolahadmin"  class="block px-3 py-1 hover:bg-cyan-800 rounded">Mitra & Sekolah</a>
                    <a href="/nilaiaktuariaadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Nilai Aktuaria</a>
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
    <!-- Main Content -->
    <main class="flex-1 bg-gray-100 p-6 overflow-y-auto">
      <div class="bg-white rounded-lg shadow p-6">

        <h1 class="text-2xl font-bold text-center mb-4">Detail Peserta</h1>

        <p class="text-sm text-gray-500 mb-4">Peserta &gt; Lihat Detail &gt; Ahli Waris</p>

        <!-- Tabs -->
        <div class="flex space-x-2 mb-6 justify-center">
          <a href="{{ url('/detailpesertaadmin/'.$peserta->idanggota) }}" 
             class="px-4 py-2 bg-teal-500 text-white rounded hover:bg-teal-600">Detail</a>

          <a href="{{ url('/tanggunganpesertaadmin/'.$peserta->idanggota) }}" 
             class="px-4 py-2 bg-teal-500 text-white rounded hover:bg-teal-600"">Tanggungan</a>

          <a href="{{ url('/ahliwarispesertaadmin/'.$peserta->idanggota) }}" 
             class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Ahli Waris</a>
        </div>

        <!-- Data Peserta -->
        <div class="grid grid-cols-2 gap-4 bg-white p-4 rounded shadow mb-6">
          <div>
            <label class="block text-sm font-medium">Nomor Peserta</label>
            <input type="text" class="w-full border rounded px-2 py-1 bg-gray-100" 
                   value="{{ $peserta->nopeserta }}" readonly>
          </div>
          <div>
            <label class="block text-sm font-medium">Mitra / Pemberi Kerja</label>
            <input type="text" class="w-full border rounded px-2 py-1 bg-gray-100" 
                   value="{{ $peserta->idmitra ?? '-' }}" readonly>
          </div>
          <div>
            <label class="block text-sm font-medium">Nama Peserta</label>
            <input type="text" class="w-full border rounded px-2 py-1 bg-gray-100" 
                   value="{{ $peserta->nama }}" readonly>
          </div>
          <div>
            <label class="block text-sm font-medium">Unit Kerja</label>
            <input type="text" class="w-full border rounded px-2 py-1 bg-gray-100" 
                   value="{{ $peserta->idunit ?? '-' }}" readonly>
          </div>
          <div>
            <label class="block text-sm font-medium">Status Nikah</label>
            <input type="text" class="w-full border rounded px-2 py-1 bg-gray-100" 
                   value="{{ $peserta->statusnikah ?? '-' }}" readonly>
          </div>
          <div>
            <label class="block text-sm font-medium">Status Waris</label>
            <input type="text" class="w-full border rounded px-2 py-1 bg-gray-100" 
                   value="Aktif" readonly>
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
                <th class="py-2 px-4 text-left">Tanggal Tunjuk</th>
                <th class="py-2 px-4 text-left">Nomor Surat</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($ahliwaris as $kel)
                <tr class="border-b hover:bg-gray-50">
                  <td class="py-2 px-4">{{ $kel->nm_keluarga }}</td>
                  <td class="py-2 px-4">{{ $kel->tempatlahir }} / {{ $kel->tglahir->format('Y-m-d') }}</td>
                  <td class="py-2 px-4">{{ $kel->jeniskelamin }}</td>
                  <td class="py-2 px-4">{{ $kel->hubungan }}</td>
                  <td class="py-2 px-4">{{ $kel->pekerjaan }}</td>
                  <td class="py-2 px-4">{{ $kel->tgltunjukwaris ?? '-' }}</td>
                  <td class="py-2 px-4">{{ $kel->notunjukwaris ?? '-' }}</td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" class="text-center py-4 text-gray-500">
                    Tidak ada data ahli waris untuk peserta ini.
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <div class="mt-6">
          <a href="{{ url('/tanggunganpesertaadmin/'.$peserta->idanggota) }}" 
             class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">← Kembali</a>
        </div>

      </div>
    </main>
  </div>
</body>
</html>
