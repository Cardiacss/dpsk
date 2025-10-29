<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ubah Peserta</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-900">

<div class="flex h-screen">
  <!-- Sidebar -->
  <aside class="w-64 bg-[#2994A4] text-white flex flex-col" 
         x-data="{ kepesertaan:false, mitra:false, kepensiunan:false, master:false }">

    <div class="p-4 text-lg font-bold border-b border-white/20">
      DANA PENSIUN <br> SEKOLAH KRISTEN
    </div>

    <nav class="flex-1 px-4 space-y-2">
      <a href="/admin/menu" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
        <span>🏠</span> <span>Home</span>
      </a>

      <a href="/daftarpesertaadmin" class="block px-3 py-1 bg-gray-200 text-black rounded">
        <span>👤</span> <span>Peserta</span>
      </a>

      <div>
        <button @click="kepesertaan = !kepesertaan" class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
          <span class="flex items-center space-x-2">
            <span>🧾</span> <span>Kepesertaan</span>
          </span>
          <span x-text="kepesertaan ? '▾' : '▸'"></span>
        </button>
        <div x-show="kepesertaan" class="pl-10 mt-1 space-y-1" x-cloak>
          <a href="/iuranpesertaadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Iuran Peserta</a>
          <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">Simulasi Kepesertaan</a>
        </div>
      </div>

      <div>
        <button @click="mitra = !mitra" class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
          <span class="flex items-center space-x-2">
            <span>🤝</span> <span>Mitra</span>
          </span>
          <span x-text="mitra ? '▾' : '▸'"></span>
        </button>
        <div x-show="mitra" class="pl-10 mt-1 space-y-1" x-cloak>
          <a href="/mitradansekolahadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Mitra & Sekolah</a>
          <a href="/nilaiaktuariaadmin" class="block px-3 py-1 hover:bg-cyan-800 rounded">Nilai Aktuaria</a>
        </div>
      </div>

      <div>
        <button @click="kepensiunan = !kepensiunan" class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
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

      <a href="/login" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
        <span>🚪</span> <span>Logout</span>
      </a>
    </nav>

    <div class="p-4 text-xs border-t border-white/20">
      Gedung Fakultas Teknologi Informasi <br />
      Universitas Kristen Satya Wacana <br />
      Jl. Dr. O. Notohamidjojo, Salatiga <br />
      <a href="mailto:ftik@uksw.edu" class="underline">ftik@uksw.edu</a>
    </div>
  </aside>

  <!-- Main -->
  <main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
    <div class="bg-white rounded-lg shadow p-6 mb-6">
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
            <label class="block text-sm font-medium">Nomor Peserta</label>
            <input type="text" name="nopeserta" value="{{ $peserta->nopeserta }}" class="border rounded w-full p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">No KTP/Passport</label>
            <input type="text" name="id_num" value="{{ $peserta->id_num }}" class="border rounded w-full p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Nama Peserta</label>
            <input type="text" name="nama" value="{{ $peserta->nama }}" class="border rounded w-full p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Tempat Lahir</label>
            <input type="text" name="tempatlahir" value="{{ $peserta->tempatlahir }}" class="border rounded w-full p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Jenis Kelamin</label>
            <div class="flex items-center gap-4 mt-1">
              <label><input type="radio" name="jeniskelamin" value="Pria" {{ $peserta->jeniskelamin == 'Pria' ? 'checked' : '' }}> Pria</label>
              <label><input type="radio" name="jeniskelamin" value="Wanita" {{ $peserta->jeniskelamin == 'Wanita' ? 'checked' : '' }}> Wanita</label>
            </div>
          </div>
<div>
  <label class="block text-sm font-medium">Tanggal Lahir</label>
  <input type="date" name="tgllahir"
    value="{{ old('tgllahir', $peserta->tgllahir ? \Carbon\Carbon::parse($peserta->tgllahir)->format('Y-m-d') : '') }}"
    class="border rounded w-full p-2">
</div>
        </div>
      </div>

      <!-- Alamat -->
      <div>
        <h2 class="text-lg font-semibold mb-4">Alamat</h2>
        <textarea name="alamatterakhir" class="border rounded w-full px-3 py-2 mb-3">{{ $peserta->alamatterakhir }}</textarea>
        <div class="grid grid-cols-4 gap-4">
          <div><label class="block text-sm">Kelurahan</label><input type="text" name="kelurahan" value="{{ $peserta->kelurahan }}" class="border rounded w-full p-2"></div>
          <div><label class="block text-sm">Kecamatan</label><input type="text" name="kecamatan" value="{{ $peserta->kecamatan }}" class="border rounded w-full p-2"></div>
          <div><label class="block text-sm">Kota/Kabupaten</label><input type="text" name="kotakab" value="{{ $peserta->kotakab }}" class="border rounded w-full p-2"></div>
          <div><label class="block text-sm">Provinsi</label><input type="text" name="provinsi" value="{{ $peserta->provinsi }}" class="border rounded w-full p-2"></div>
        </div>
      </div>

<!-- Pekerjaan -->
<div>
  <h2 class="text-lg font-semibold mb-4">Pekerjaan</h2>
  <div class="grid grid-cols-2 gap-4">

    <!-- Dropdown Unit Mitra -->
    <div>
      <label for="idunit" class="block text-sm font-medium text-gray-700">Pilih Unit Mitra</label>
      <select id="idunit" name="idunit" class="w-full border rounded p-2">
        <option value="">-- Pilih Unit Mitra --</option>
        @foreach($unitmitra as $unit)
          <option 
            value="{{ $unit->idunit }}"
            {{ $peserta->idunit == $unit->idunit ? 'selected' : '' }}>
            {{ $unit->idunit }} - {{ $unit->nama_um }}
          </option>
        @endforeach
      </select>
    </div>

    <!-- Dropdown Mitra Pemberi Kerja -->
    <div>
      <label for="idmitra" class="block text-sm font-medium text-gray-700">Mitra Pemberi Kerja</label>
      <select id="idmitra" name="idmitra" class="w-full border rounded p-2 bg-gray-100">
        <option value="">-- Pilih Mitra Pemberi Kerja --</option>
        @foreach($mitra as $m)
          <option 
            value="{{ $m->idmitra }}" 
            data-idunit="{{ $m->idunit }}"
            {{ $peserta->idmitra == $m->idmitra ? 'selected' : '' }}>
            {{ $m->idmitra }} - {{ $m->nama_um }}
          </option>
        @endforeach
      </select>
    </div>

  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const unitSelect = document.getElementById('idunit');
  const mitraSelect = document.getElementById('idmitra');
  const allMitraOptions = Array.from(mitraSelect.options).slice(1).map(opt => opt.cloneNode(true)); 
  const selectedMitraAwal = "{{ $peserta->idmitra }}";

  function filterMitra() {
    const selectedUnit = unitSelect.value;

    // Hapus semua opsi
    mitraSelect.innerHTML = '<option value="">-- Pilih Mitra Pemberi Kerja --</option>';

    // Filter sesuai unit
    const filtered = selectedUnit
      ? allMitraOptions.filter(opt => opt.dataset.idunit === selectedUnit)
      : allMitraOptions;

    // Tambahkan kembali opsi
    filtered.forEach(opt => mitraSelect.appendChild(opt.cloneNode(true)));

    // Jika nilai lama masih valid, pilihkan kembali
    if (filtered.some(opt => opt.value === selectedMitraAwal)) {
      mitraSelect.value = selectedMitraAwal;
    }
  }

  // Jalankan saat pertama kali (edit mode)
  filterMitra();

  // Jalankan setiap kali idunit berubah
  unitSelect.addEventListener('change', filterMitra);
});
</script>

      <!-- Keluarga -->
      <div>
        <h2 class="text-lg font-semibold mb-4">Data Keluarga</h2>
        <div class="grid grid-cols-3 gap-4">
          <div><label class="block text-sm">Status Nikah</label><input type="text" name="statusnikah" value="{{ $peserta->statusnikah }}" class="border rounded w-full p-2"></div>
          <div>
  <label class="block text-sm font-medium">Tanggal Pernikahan</label>
  <input type="date" name="tglkawin"
    value="{{ old('tglkawin', $peserta->tglkawin ? \Carbon\Carbon::parse($peserta->tglkawin)->format('Y-m-d') : '') }}"
    class="border rounded w-full p-2">
</div>
          <div><label class="block text-sm">Jumlah Anak</label><input type="number" name="jumlahanak" value="{{ $peserta->jumlahanak }}" class="border rounded w-full p-2"></div>
        </div>
      </div>

      <!-- Keanggotaan -->
      <div>
        <h2 class="text-lg font-semibold mb-4">Keanggotaan</h2>
        <div class="grid grid-cols-3 gap-4">
          <div>
  <label class="block text-sm font-medium">Tanggal Pertama Iuran</label>
  <input type="date" name="tmtiuran"
    value="{{ old('tmtiuran', $peserta->tmtiuran ? \Carbon\Carbon::parse($peserta->tmtiuran)->format('Y-m-d') : '') }}"
    class="border rounded w-full p-2">
</div>
          <div>
  <label class="block text-sm font-medium">Tanggal Disahkan</label>
  <input type="date" name="tglsahpeserta"
    value="{{ old('tglsahpeserta', $peserta->tglsahpeserta ? \Carbon\Carbon::parse($peserta->tglsahpeserta)->format('Y-m-d') : '') }}"
    class="border rounded w-full p-2">
</div>
          <div><label class="block text-sm">Status Kartu</label><input type="text" name="statuspeserta" value="{{ $peserta->statuspeserta }}" class="border rounded w-full p-2"></div>
        </div>
      </div>

      <div class="flex items-center justify-between pt-4">
        <a href="/daftarpesertaadmin" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>
        <button type="submit" class="px-6 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">Submit</button>
      </div>
    </form>
  </main>
</div>

</body>
</html>
