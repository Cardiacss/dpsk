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
    <main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
    <div class="bg-white rounded-lg shadow p-6">
        Home > Peserta > <a href="/ubahpesertaadmin" class="text-blue-600">Ubah Peserta</a>
      </div>
      <h1 class="text-2xl font-bold mb-6 text-center">Ubah Peserta</h1>

<form action="{{ route('peserta.update', $peserta->idanggota) }}" method="POST" class="bg-white shadow-md rounded p-6 space-y-6">
  @csrf
  <!-- Identitas -->
  <div>
    <h2 class="text-lg font-semibold mb-4">Identitas</h2>
    <div class="grid grid-cols-3 gap-4">
      <div>
        <label class="block text-sm">Nomor Peserta</label>
        <input type="text" name="nopeserta" value="{{ $peserta->nopeserta }}" class="border rounded w-full px-3 py-2" />
      </div>
      <div>
        <label class="block text-sm">No KTP/Passport</label>
        <input type="text" name="id_num" value="{{ $peserta->id_num }}" class="border rounded w-full px-3 py-2" />
      </div>
      <div>
        <label class="block text-sm">Nama Peserta</label>
        <input type="text" name="nama" value="{{ $peserta->nama }}" class="border rounded w-full px-3 py-2" />
      </div>
      <div>
        <label class="block text-sm">Tempat Lahir</label>
        <input type="text" name="tempatlahir" value="{{ $peserta->tempatlahir }}" class="border rounded w-full px-3 py-2" />
      </div>
      <div>
        <label class="block text-sm">Jenis Kelamin</label>
        <div class="flex items-center gap-4 mt-1">
          <label>
            <input type="radio" name="jeniskelamin" value="Pria" {{ $peserta->jeniskelamin == 'Pria' ? 'checked' : '' }}> Pria
          </label>
          <label>
            <input type="radio" name="jeniskelamin" value="Wanita" {{ $peserta->jeniskelamin == 'Wanita' ? 'checked' : '' }}> Wanita
          </label>
        </div>
      </div>
      <div>
        <label class="block text-sm">Tanggal Lahir</label>
        <input type="date" name="tgllahir" value="{{ $peserta->tgllahir }}" class="border rounded w-full px-3 py-2" />
      </div>
    </div>
  </div>

  <!-- Alamat -->
  <div>
    <h2 class="text-lg font-semibold mb-4">Alamat</h2>
    <input type="text" name="alamatterakhir" value="{{ $peserta->alamatterakhir }}" placeholder="Alamat Lengkap" class="border rounded w-full px-3 py-2 mb-3" />
    <div class="grid grid-cols-4 gap-4">
      <input type="text" name="kelurahan" value="{{ $peserta->kelurahan }}" placeholder="Kelurahan" class="border rounded px-3 py-2" />
      <input type="text" name="kecamatan" value="{{ $peserta->kecamatan }}" placeholder="Kecamatan" class="border rounded px-3 py-2" />
      <input type="text" name="kotakab" value="{{ $peserta->kotakab }}" placeholder="Kota" class="border rounded px-3 py-2" />
      <input type="text" name="provinsi" value="{{ $peserta->provinsi }}" placeholder="Provinsi" class="border rounded px-3 py-2" />
    </div>
  </div>

  <!-- Pekerjaan -->
  <div>
    <h2 class="text-lg font-semibold mb-4">Pekerjaan</h2>
    <div class="grid grid-cols-3 gap-4">
      <input type="text" name="idmitra" value="{{ $peserta->idmitra }}" placeholder="Mitra Pemberi Kerja" class="border rounded px-3 py-2" />
      <input type="text" name="idunit" value="{{ $peserta->idunit }}" placeholder="Unit Kerja" class="border rounded px-3 py-2" />
      <input type="text" name="pkerjaanakhir" value="{{ $peserta->pkerjaanakhir }}" placeholder="Pekerjaan" class="border rounded px-3 py-2" />
    </div>
  </div>

  <!-- Keluarga -->
  <div>
    <h2 class="text-lg font-semibold mb-4">Keluarga</h2>
    <div class="grid grid-cols-3 gap-4">
      <input type="text" name="statusnikah" value="{{ $peserta->statusnikah }}" placeholder="Status Nikah" class="border rounded px-3 py-2" />
      <input type="date" name="tglkawin" value="{{ $peserta->tglkawin }}" class="border rounded px-3 py-2" />
      <input type="number" name="jumlahanak" value="{{ $peserta->jumlahanak }}" placeholder="Jumlah Anak" class="border rounded px-3 py-2" />
    </div>
  </div>

  <!-- Keanggotaan -->
  <div>
    <h2 class="text-lg font-semibold mb-4">Keanggotaan</h2>
    <div class="grid grid-cols-3 gap-4">
      <input type="date" name="tmtiuran" value="{{ $peserta->tmtkeja }}" class="border rounded px-3 py-2" />
      <input type="date" name="tglsahpeserta" value="{{ $peserta->tglsahpeserta }}" class="border rounded px-3 py-2" />
      <input type="text" name="statuspeserta" value="{{ $peserta->statuspeserta }}" placeholder="Status Kartu" class="border rounded px-3 py-2" />
    </div>
  </div>

  <!-- Tombol -->
  <div class="flex items-center justify-between">
    <a href="/daftarpesertaadmin" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>
    <button type="submit" class="px-6 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">Submit</button>
  </div>
</form>
    </main>
  </div>

</body>
</html>