<!DOCTYPE html>
<html lang="id" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Catat Iuran Peserta</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100">

<div class="flex h-screen">
  <!-- Sidebar -->
  <aside class="w-64 bg-[#2994A4] text-white flex flex-col" 
         x-data="{ kepesertaan:true, mitra:false, kepensiunan:false }">

    <div class="p-4 text-lg font-bold border-b border-white/20">
      DANA PENSIUN <br> SEKOLAH KRISTEN
    </div>

    <nav class="flex-1 px-4 space-y-2">
      <a href="/dashboardkepalasekolah" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
        <span>🏠</span> <span>Home</span>
      </a>

      <a href="/daftarpesertakepala" class="flex items-center space-x-2 px-3 py-2 hover:bg-cyan-800 rounded">
        <span>👤</span> <span>Peserta</span>
      </a>

      <div>
        <button @click="kepesertaan = !kepesertaan" 
                class="w-full flex justify-between items-center px-3 py-2 bg-cyan-800 rounded">
          <span class="flex items-center space-x-2">
            <span>🧾</span> <span>Kepesertaan</span>
          </span>
          <span x-text="kepesertaan ? '▾' : '▸'"></span>
        </button>
        <div x-show="kepesertaan" class="pl-10 mt-1 space-y-1" x-cloak>
          <a href="/iuranpesertakepala" 
             class="block px-3 py-1 bg-white text-[#2994A4] font-semibold rounded">
            Iuran Peserta
          </a>
          <a href="#" class="block px-3 py-1 hover:bg-cyan-800 rounded">
            Simulasi Kepesertaan & Manfaat Pensiun
          </a>
        </div>
      </div>

      <div>
        <button @click="mitra = !mitra" 
                class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
          <span class="flex items-center space-x-2">
            <span>🤝</span> <span>Mitra</span>
          </span>
          <span x-text="mitra ? '▾' : '▸'"></span>
        </button>
        <div x-show="mitra" class="pl-10 mt-1 space-y-1" x-cloak>
          <a href="/mitra&sekolahkepala" class="block px-3 py-1 hover:bg-cyan-800 rounded">Mitra & Sekolah</a>
          <a href="/nilaiaktuariakepala" class="block px-3 py-1 hover:bg-cyan-800 rounded">Nilai Aktuaria</a>
        </div>
      </div>

      <div>
        <button @click="kepensiunan = !kepensiunan" 
                class="w-full flex justify-between items-center px-3 py-2 hover:bg-cyan-800 rounded">
          <span class="flex items-center space-x-2">
            <span>📑</span> <span>Kepensiunan</span>
          </span>
          <span x-text="kepensiunan ? '▾' : '▸'"></span>
        </button>
        <div x-show="kepensiunan" class="pl-10 mt-1 space-y-1" x-cloak>
          <a href="/pengajuanpensiunkepala" class="block px-3 py-1 hover:bg-cyan-800 rounded">Pengajuan Pensiun</a>
          <a href="/daftarpensiunkepala" class="block px-3 py-1 hover:bg-cyan-800 rounded">Lihat Pensiun</a>
          <a href="/pemberianmanfaatkepala" class="block px-3 py-1 hover:bg-cyan-800 rounded">Manfaat</a>
          <a href="/riwayatmanfaatkepala" class="block px-3 py-1 hover:bg-cyan-800 rounded">Riwayat</a>
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

  <!-- Main Content -->
  <div class="flex-1 p-6 overflow-y-auto">
    <div class="text-sm text-gray-600 mb-3">
      Kepesertaan > <a href="#" class="text-blue-600 hover:underline">Iuran Peserta</a>
    </div>

    <h2 class="text-2xl font-bold mb-6">Catat Iuran Peserta</h2>

    <div class="bg-white rounded-lg shadow p-6">

     <form action="{{ route('admin.catatiuran.store', ['idanggota' => $peserta->idanggota]) }}" method="POST" class="space-y-4">
    @csrf

    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-semibold">
            No. Peserta: <span class="font-bold">{{ $peserta->idanggota }}</span> | 
            Nama: <span class="font-bold">{{ $peserta->nama }}</span>
        </h3>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <label for="tglcatat" class="block text-sm font-medium mb-1">Tanggal Catat</label>
            <input type="date" id="tglcatat" name="tglcatat" value="{{ date('Y-m-d') }}" class="border rounded w-full p-2" required>
        </div>
        <div>
            <label for="tglsetor" class="block text-sm font-medium mb-1">Tanggal Setor</label>
            <input type="date" id="tglsetor" name="tglsetor" value="{{ date('Y-m-d') }}" class="border rounded w-full p-2" required>
        </div>
        <div>
            <label for="phdp" class="block text-sm font-medium mb-1">PhDP</label>
            <input type="number" id="phdp" name="phdp" step="0.001" class="border rounded w-full p-2" required>
        </div>
    </div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div>
        <label for="ip_pct" class="block text-sm font-medium mb-1">
            IP ({{ $nilai?->ip ?? 'Belum Ada Data' }}%) 
        </label>
        <input type="number" id="ip_pct" name="ip_pct" step="0.01"
               class="border rounded w-full p-2"
               placeholder="IP"
               value=""
               readonly
               required>
    </div>
    <div>
        <label for="ipk_pct" class="block text-sm font-medium mb-1">
            IPK ({{ $nilai?->ipk ?? 'Belum Ada Data' }}%) 
        </label>
        <input type="number" id="ipk_pct" name="ipk_pct" step="0.01"
               class="border rounded w-full p-2"
               placeholder="IPK"
               value=""
               readonly
               required>
    </div>
</div>


<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div>
        <label for="bln_iuran" class="block text-sm font-medium mb-1">Bulan Iuran</label>
        <select id="bln_iuran" name="bln_iuran" class="border rounded w-full p-2" required>
            <option value="">Pilih Bulan</option>
            @foreach([
                1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',
                5=>'Mei',6=>'Juni',7=>'Juli',8=>'Agustus',
                9=>'September',10=>'Oktober',11=>'November',12=>'Desember'
            ] as $num => $bln)
                <option value="{{ $num }}" {{ old('bln_iuran') == $num ? 'selected' : '' }}>
                    {{ $bln }}
                </option>
            @endforeach
        </select>
    </div>
        <div>
            <label for="thn_iuran" class="block text-sm font-medium mb-1">Tahun Iuran</label>
            <input type="number" id="thn_iuran" name="thn_iuran" value="{{ date('Y') }}" class="border rounded w-full p-2" required>
        </div>
    </div>
            <div class="space-x-2">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500">
                Simpan
            </button>
            <a href="javascript:history.back()" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">
                Kembali
            </a>
        </div>
</form>


      <hr class="my-6">

      <h4 class="text-lg font-semibold mb-2">Iuran 6 Bulan Terakhir</h4>

      @if($riwayat->isEmpty())
        <p class="text-gray-600">Belum ada catatan iuran.</p>
      @else
        <table class="w-full border-collapse border text-sm shadow">
          <thead class="bg-teal-700 text-white text-center">
            <tr>
              <th class="border px-3 py-2">Tanggal Catat</th>
              <th class="border px-3 py-2">Tanggal Setor</th>
              <th class="border px-3 py-2">PhDP</th>
              <th class="border px-3 py-2">IPK</th>
              <th class="border px-3 py-2">IP</th>
              <th class="border px-3 py-2">Bln-Thn Iuran</th>
            </tr>
          </thead>
          <tbody class="text-center">
            @foreach($riwayat as $r)
              <tr class="hover:bg-gray-50">
                <td class="border px-3 py-2">{{ \Carbon\Carbon::parse($r->tglcatat)->format('d-m-Y') }}</td>
                <td class="border px-3 py-2">{{ \Carbon\Carbon::parse($r->tglsetor)->format('d-m-Y') }}</td>
                <td class="border px-3 py-2">Rp {{ number_format($r->phdp, 0, ',', '.') }}</td>
                <td class="border px-3 py-2">Rp {{ number_format($r->ipk_num, 0, ',', '.') }}</td>
                <td class="border px-3 py-2">Rp {{ number_format($r->ip_num, 0, ',', '.') }}</td>
                <td class="border px-3 py-2">{{ str_pad($r->bln_iuran,2,'0',STR_PAD_LEFT) }} - {{ $r->thn_iuran }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif

      <p class="mt-4 text-gray-700 font-semibold">
        Rata-rata PhDP 6 Bulan Terakhir : 
        <span class="text-green-700">
          Rp {{ number_format($rataPhdp, 0, ',', '.') }}
        </span>
      </p>

    </div>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Ambil elemen input
    const phdpInput = document.getElementById('phdp');
    const ipInput = document.getElementById('ip_pct');
    const ipkInput = document.getElementById('ipk_pct');

    // Ambil persentase dari server (Blade)
    const ipPercent = parseFloat("{{ $nilai?->ip ?? 0 }}");
    const ipkPercent = parseFloat("{{ $nilai?->ipk ?? 0 }}");

    phdpInput.addEventListener('input', function() {
        const phdp = parseFloat(this.value) || 0;

        // Hitung IP dan IPK
        const ipValue = (phdp * ipPercent / 100).toFixed(2);
        const ipkValue = (phdp * ipkPercent / 100).toFixed(2);

        // Tampilkan hasil di textbox
        ipInput.value = ipValue;
        ipkInput.value = ipkValue;
    });
});
</script>
</body>
</html>