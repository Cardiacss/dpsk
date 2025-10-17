<!DOCTYPE html>
<html lang="id" xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tanggungan Peserta - Admin</title>
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
        <a href="/admin/menu" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
          <span>🏠</span> <span>Home</span>
        </a>

        <!-- Peserta -->
        <a href="/daftarpesertaadmin" class="block px-3 py-1 bg-gray-200 text-black rounded">
          <span>👤</span> <span>Peserta</span>
        </a>

        <!-- Kepesertaan Dropdown -->
        <div>
          <button @click="kepesertaan = !kepesertaan"
            class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
            <span class="flex items-center space-x-2">
              <span>🧾</span> <span>Kepesertaan</span>
            </span>
            <span x-text="kepesertaan ? '▾' : '▸'"></span>
          </button>
          <div x-show="kepesertaan" class="pl-10 mt-1 space-y-1" x-cloak>
            <a href="/iuranpesertaadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Iuran Peserta</a>
            <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Simulasi Kepersetaan & Manfaat Pensiun</a>
          </div>
        </div>

        <!-- Mitra Dropdown -->
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
    <main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
      <div class="bg-white rounded-lg shadow p-6">
        <!-- Breadcrumb -->
        <p class="text-sm text-gray-500 mb-4">
          Peserta &gt; Lihat Detail &gt; <span class="text-blue-500">Tanggungan</span>
        </p>

        <!-- Title -->
        <h1 class="text-2xl font-bold text-center mb-6">
          Anggota Keluarga / Tanggungan / Waris
        </h1>

        <!-- Tabs -->
        <div class="flex space-x-2 mb-6 justify-center">
          <a href="{{ url('/detailpesertaadmin/' . $peserta->idanggota) }}"
            class="px-4 py-2 bg-teal-500 text-white rounded hover:bg-teal-600">Detail</a>

          <a href="{{ url('/tanggunganpesertaadmin/' . $peserta->idanggota) }}"
            class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Tanggungan</a>

          <a href="{{ route('ahliwarispesertaadmin', ['idanggota' => $peserta->idanggota]) }}"
            class="px-4 py-2 bg-teal-500 text-white rounded hover:bg-teal-600">
            Ahli Waris
          </a>
        </div>

        <!-- Form Header -->
        <form class="bg-white p-6 rounded shadow-md max-w-3xl mx-auto mb-6">
          <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
              <label class="block text-sm">Nomor Peserta</label>
              <input class="w-full border rounded p-2" value="{{ $peserta->nopeserta ?? '' }}" readonly />
            </div>
            <div>
              <label class="block text-sm">Nama Peserta</label>
              <input class="w-full border rounded p-2" value="{{ $peserta->nama ?? '' }}" readonly />
            </div>
            <div>
              <label class="block text-sm">Status Nikah</label>
              <input class="w-full border rounded p-2" value="{{ $peserta->statusnikah ?? '' }}" readonly />
            </div>
            <div>
              <label class="block text-sm">Mitra / Pemberi Kerja</label>
              <input class="w-full border rounded p-2" value="{{ $peserta->idmitra ?? '' }}" readonly />
            </div>
            <div>
              <label class="block text-sm">Unit Kerja</label>
              <input class="w-full border rounded p-2" value="{{ $peserta->idunit ?? '' }}" readonly />
            </div>
          </div>
          <a href="{{ route('keluarga.create', $peserta->idanggota) }}"
            class="px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-700 mb-4 inline-block">
            + Tambah Anggota Keluarga
          </a>

          <!-- Table -->
          <div class="overflow-x-auto">
            <table class="w-full text-sm border border-gray-300">
              <thead class="bg-teal-600 text-white">
                <tr>
                  <th class="px-4 py-2 border">Nama Anggota Keluarga</th>
                  <th class="px-4 py-2 border">Tempat / Tgl Lahir</th>
                  <th class="px-4 py-2 border">Jenis Kelamin</th>
                  <th class="px-4 py-2 border">Hubungan</th>
                  <th class="px-4 py-2 border">Status Hidup</th>
                  <th class="px-4 py-2 border">Waris</th>
                  <th class="px-4 py-2 border">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($keluarga as $k)
                  <tr class="bg-white hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $k->nm_keluarga }}</td>
                    <td class="px-4 py-2 border">{{ $k->tempatlahir }} /
                      {{ $k->tgllahir ? \Carbon\Carbon::parse($k->tgllahir)->format('Y-m-d') : '-' }}
                    </td>
                    <td class="px-4 py-2 border">{{ $k->jeniskelamin }}</td>
                    <td class="px-4 py-2 border">{{ $k->hubungan }}</td>
                    <td class="px-4 py-2 border">{{ $k->statushidup ? 'Hidup' : 'Meninggal' }}</td>
                    <td class="px-4 py-2 border">{{ $k->bolehwaris ? 'Ya' : 'Tidak' }}</td>
                    <td class="px-4 py-2 border text-center">
                      <div class="flex justify-center space-x-2">
                        <a href="/editanggotaahliwarispesertaadmin/{{ $k->idkeluarga }}"
                          class="px-3 py-1 bg-teal-600 text-white rounded-md hover:bg-teal-700 text-sm">
                          Ubah
                        </a>

                        <form action="{{ route('keluarga.destroy', $k->idkeluarga) }}" method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus anggota ini?')" class="inline-block">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                            Hapus
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="7" class="text-center py-4 text-gray-500">Belum ada data keluarga</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </form>

        <!-- Cetak Button -->
        <div class="flex justify-center mt-6">
          <a href="{{ route('cetakKeluarga', ['idanggota' => $peserta->idanggota]) }}"
            class="px-6 py-2 bg-teal-600 text-white rounded hover:bg-teal-700 transition duration-200">
            Cetak Keluarga
          </a>
        </div>
        </form>
      </div>
  </div>
  </main>
  </div>
</body>

</html>