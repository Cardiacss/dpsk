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
        <a href="/admin/menu" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
          <span>🏠</span> <span>Home</span>
        </a>

        <a href="/daftarpesertaadmin" class="block px-3 py-1 bg-gray-200 text-black rounded">
          <span>👤</span> <span>Peserta</span>
        </a>

        <!-- Kepesertaan -->
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
        <p class="text-sm text-gray-500 mb-4">
          Peserta &gt; <a href="#" class="text-blue-500">Pendaftaran Peserta</a>
        </p>

        <h1 class="text-2xl font-bold mb-6 text-center">Pendaftaran Peserta</h1>

        <!-- Form -->
        <form action="{{ route('peserta.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
          @csrf

          <!-- Identitas -->
          <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
              <label class="block text-sm font-medium">Nomor Peserta <span class="text-red-600">*</span></label>
              <input name="nopeserta" value="{{ old('nopeserta') }}"
                     class="w-full border rounded p-2 @error('nopeserta') border-red-500 @enderror" required>
              @error('nopeserta')
                <p class="text-red-500 text-sm mt-1">Wajib diisi.</p>
              @enderror
            </div>

            <div>
              <label class="block text-sm font-medium">No KTP/Passport <span class="text-red-600">*</span></label>
              <input name="id_num" value="{{ old('id_num') }}"
                     class="w-full border rounded p-2 @error('id_num') border-red-500 @enderror" required>
              @error('id_num')
                <p class="text-red-500 text-sm mt-1">Wajib diisi.</p>
              @enderror
            </div>

            <div>
              <label class="block text-sm font-medium">Nama Peserta <span class="text-red-600">*</span></label>
              <input name="nama" value="{{ old('nama') }}"
                     class="w-full border rounded p-2 @error('nama') border-red-500 @enderror" required>
              @error('nama')
                <p class="text-red-500 text-sm mt-1">Wajib diisi.</p>
              @enderror
            </div>

            <div>
              <label class="block text-sm font-medium">Jenis Kelamin <span class="text-red-600">*</span></label>
              <div class="flex space-x-4 mt-2 @error('jeniskelamin') border border-red-500 rounded p-2 @enderror">
                <label><input type="radio" name="jeniskelamin" value="Pria" {{ old('jeniskelamin') == 'Pria' ? 'checked' : '' }}> Pria</label>
                <label><input type="radio" name="jeniskelamin" value="Wanita" {{ old('jeniskelamin') == 'Wanita' ? 'checked' : '' }}> Wanita</label>
              </div>
              @error('jeniskelamin')
                <p class="text-red-500 text-sm mt-1">Wajib diisi.</p>
              @enderror
            </div>

            <div>
              <label class="block text-sm font-medium">Tempat Lahir <span class="text-red-600">*</span></label>
              <input name="tempatlahir" value="{{ old('tempatlahir') }}"
                     class="w-full border rounded p-2 @error('tempatlahir') border-red-500 @enderror" required>
              @error('tempatlahir')
                <p class="text-red-500 text-sm mt-1">Wajib diisi.</p>
              @enderror
            </div>

            <div>
              <label class="block text-sm font-medium">Tanggal Lahir <span class="text-red-600">*</span></label>
              <input type="date" name="tgllahir" value="{{ old('tgllahir') }}"
                     class="w-full border rounded p-2 @error('tgllahir') border-red-500 @enderror" required>
              @error('tgllahir')
                <p class="text-red-500 text-sm mt-1">Wajib diisi.</p>
              @enderror
            </div>

            <!-- Alamat -->
            <div class="col-span-2">
              <label class="block text-sm font-medium">Alamat Lengkap <span class="text-red-600">*</span></label>
              <input name="alamatterakhir" value="{{ old('alamatterakhir') }}"
                     class="w-full border rounded p-2 @error('alamatterakhir') border-red-500 @enderror" required>
              @error('alamatterakhir')
                <p class="text-red-500 text-sm mt-1">Wajib diisi.</p>
              @enderror
            </div>

            <div>
              <label class="block text-sm">Kecamatan</label>
              <input name="kecamatan" class="w-full border rounded p-2" />
            </div>
                      
            <div>
              <label class="block text-sm">Kelurahan</label>
              <input name="kelurahan" class="w-full border rounded p-2" />
            </div>
            
            <div>
              <label class="block text-sm">Kota</label>
              <input name="kotakab" class="w-full border rounded p-2" />
            </div>

            <div>
              <label class="block text-sm">Provinsi</label>
              <input name="provinsi" class="w-full border rounded p-2" />
            </div>
          </div>


          <!-- PEKERJAAN -->
          <div class="mb-4">
            <h2 class="text-lg font-semibold mb-2">Pekerjaan</h2>
            <div>
              <label class="block text-sm">Tanggal Mulai Kerja (TMT Kerja)</label>
              <input type="date" name="tmtkeja" class="w-full border rounded p-2" required>
            </div>

            <div class="grid grid-cols-2 gap-4 mt-2">
              <div>
                <label class="block text-sm">Mitra Pemberi Kerja</label>
                <input name="idmitra" class="w-full border rounded p-2" />
              </div>
              <div>
                <label class="block text-sm">Unit Kerja</label>
                <input name="idunit" class="w-full border rounded p-2" />
              </div>
              <div class="col-span-2">
                <label class="block text-sm">Pekerjaan</label>
                <input name="pekerjaanakhir" class="w-full border rounded p-2" />
              </div>
            </div>
          </div>

          <!-- Keluarga -->
          <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
              <label class="block text-sm">Status Nikah</label>
              <input name="statusnikah" class="w-full border rounded p-2" />
            </div>
            <div>
              <label class="block text-sm">Tanggal Perkawinan</label>
              <input type="date" name="tglkawin" class="w-full border rounded p-2" />
            </div>
            <div class="col-span-2">
              <label class="block text-sm">Jumlah Anak</label>
              <input type="number" name="jumlahanak" class="w-full border rounded p-2" />
            </div>
          </div>

          <!-- Keanggotaan -->
          <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
              <label class="block text-sm">Tanggal Pertama Iuran</label>
              <input type="date" name="tmtiuran" class="w-full border rounded p-2" />
            </div>
            <div>
              <label class="block text-sm">Tanggal Disahkan</label>
              <input type="date" name="tglsahpeserta" class="w-full border rounded p-2" />
            </div>
            <div class="col-span-2">
              <label class="block text-sm">Status Kartu</label>
              <input name="statuspeserta" class="w-full border rounded p-2" />
            </div>
          </div>

          <!-- Tombol -->
          <div class="flex space-x-4">
            <a href="/daftarpesertaadmin" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">
              Kembali
            </a>
            <button type="submit" class="px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">
              Submit
            </button>
          </div>
        </form>
      </div>
    </main>
  </div>
</body>
</html>
