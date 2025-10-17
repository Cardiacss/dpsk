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
        <nav class="text-sm mb-4 text-gray-600">
          <a href="#" class="hover:underline">Peserta</a> >
          <a href="#" class="hover:underline">Lihat Detail</a> >
          <a href="#" class="hover:underline">Tanggungan</a> >
          <span class="text-gray-800 font-semibold">Edit Anggota</span>
        </nav>

        <!-- Judul -->
        <h1 class="text-xl font-bold mb-6 text-center">
          Edit Anggota Keluarga/Tanggungan/Waris
        </h1>

        <!-- Form -->
        <form action="{{ route('keluarga.update', $keluarga->idkeluarga) }}" method="POST"
          class="space-y-4 max-w-2xl mx-auto">
          @csrf
          @method('PUT')

          <div>
            <label class="block text-gray-700 mb-1">Nama Lengkap</label>
            <input type="text" name="nm_keluarga" value="{{ old('nm_keluarga', $keluarga->nm_keluarga) }}"
              class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-cyan-300">
          </div>

          <div>
            <label class="block text-gray-700 mb-1">Tempat Lahir</label>
            <input type="text" name="tempatlahir" value="{{ old('tempatlahir', $keluarga->tempatlahir) }}"
              class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-cyan-300">
          </div>

          <div>
            <label class="block text-gray-700 mb-1">Tanggal Lahir</label>
            <input type="date" name="tgllahir"
              value="{{ old('tgllahir', $keluarga->tgllahir ? \Carbon\Carbon::parse($keluarga->tgllahir)->format('Y-m-d') : '') }}"
              class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-cyan-300">
          </div>

          <div>
            <label class="block text-sm">Jenis Kelamin</label>
            <select name="jeniskelamin" class="w-full border rounded p-2">
              <option value="Pria" {{ old('jeniskelamin', $keluarga->jeniskelamin) == 'Pria' ? 'selected' : '' }}>Pria
              </option>
              <option value="Wanita" {{ old('jeniskelamin', $keluarga->jeniskelamin) == 'Wanita' ? 'selected' : '' }}>
                Wanita</option>
            </select>
          </div>

          <div>
            <label class="block text-gray-700 mb-1">Hubungan</label>
            <input type="text" name="hubungan" value="{{ old('hubungan', $keluarga->hubungan) }}"
              class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-cyan-300">
          </div>

          <div>
            <label class="block text-gray-700 mb-1">Pekerjaan</label>
            <input type="text" name="pekerjaan" value="{{ old('pekerjaan', $keluarga->pekerjaan) }}"
              class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-cyan-300">
          </div>

          <div>
            <label class="block text-gray-700 mb-1">Status Hak Waris</label>
            <input type="text" name="statuswaris" value="{{ old('statuswaris', $keluarga->statuswaris) }}"
              class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-cyan-300">
          </div>

          <div>
            <label class="block text-gray-700 mb-1">Status Hidup</label>
            <select name="statushidup"
              class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-cyan-300">
              <option value="1" {{ old('statushidup', $keluarga->statushidup) == 1 ? 'selected' : '' }}>Hidup</option>
              <option value="0" {{ old('statushidup', $keluarga->statushidup) == 0 ? 'selected' : '' }}>Meninggal
              </option>
            </select>
          </div>

          <div>
            <label class="block text-gray-700 mb-1">Keterangan</label>
            <textarea name="keterangan_kel"
              class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-cyan-300">{{ old('keterangan_kel', $keluarga->keterangan_kel) }}</textarea>
          </div>

          <div>
            <label class="block text-gray-700 mb-1">No Surat Penunjukan Waris & Tgl (E2)</label>
            <input type="text" name="notunjukwaris" value="{{ old('notunjukwaris', $keluarga->notunjukwaris) }}"
              class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-cyan-300">
          </div>

          <div>
            <label class="block text-gray-700 mb-1">No Permohonan Waris & Tgl (E4)</label>
            <input type="text" name="nomohonwaris" value="{{ old('nomohonwaris', $keluarga->nomohonwaris) }}"
              class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-cyan-300">
          </div>

          <div class="text-center pt-4">
            <button type="submit" class="bg-cyan-600 hover:bg-cyan-700 text-white px-6 py-2 rounded shadow">
              Simpan Perubahan
            </button>
          </div>
        </form>
      </div>
    </main>
  </div>

</body>

</html>
