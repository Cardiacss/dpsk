<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iuran Peserta - {{ $peserta->nama ?? 'Peserta' }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">
  <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg p-6">

    <h2 class="text-2xl font-bold mb-4 text-[#2994A4]">Iuran Peserta: {{ $peserta->nama ?? '-' }}</h2>

    <!-- Status -->
    <div class="mb-4">
      <span class="font-semibold">Status Kepesertaan:</span>
      <span class="text-green-600">{{ $peserta->status ?? 'AKTIF' }}</span>
    </div>

    <!-- Filter -->
    <div class="flex items-center space-x-4 mb-6">
      <label for="tahun" class="font-semibold">Iuran Tahun:</label>
      <input id="tahun" type="number" placeholder="Masukkan tahun" class="border rounded p-2 w-32">
      <button class="bg-[#2994A4] text-white px-4 py-2 rounded hover:bg-cyan-700">Tampilkan</button>
      <a href="{{ route('admin.cetakIuranPeserta', ['idanggota' => $peserta->idanggota]) }}"
        class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
        Cetak
      </a>
    </div>

    <!-- Tabel -->
    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-300 text-sm">
        <thead class="bg-[#2994A4] text-white">
          <tr>
            <th class="px-3 py-2 border">#</th>
            <th class="px-3 py-2 border">Tanggal Catat</th>
            <th class="px-3 py-2 border">Tanggal Setor</th>
            <th class="px-3 py-2 border">PhDP</th>
            <th class="px-3 py-2 border">Iuran Untuk</th>
            <th class="px-3 py-2 border">Iuran Pemberi Kerja</th>
            <th class="px-3 py-2 border">Iuran Peserta</th>
            <th class="px-3 py-2 border">Koreksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($iuranList as $index => $i)
            <tr class="text-center hover:bg-gray-50">
              <td class="border px-2 py-1">{{ $index + 1 }}</td>
              <td class="border px-2 py-1">{{ $i->tglcatat->format('Y-m-d') }}</td>
              <td class="border px-2 py-1">{{ $i->tglsetor->format('Y-m-d') }}</td>
              <td class="border px-2 py-1">Rp {{ number_format($i->phdp, 0, ',', '.') }}</td>
              <td class="border px-2 py-1">{{ str_pad($i->bln_iuran, 2, '0', STR_PAD_LEFT) }}-{{ $i->thn_iuran }}</td>
              <td class="border px-2 py-1">Rp {{ number_format($i->ipk_num, 0, ',', '.') }}</td>
              <td class="border px-2 py-1">Rp {{ number_format($i->ip_num, 0, ',', '.') }}</td>
              <td class="border px-2 py-1 text-blue-600">
<a href="{{ url('/editcatat/' . $i->idanggota . '/' . $i->id_iuran . '?from=editpesertaiuranadmin') }}" 
   class="hover:underline">
   Edit
</a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="8" class="text-center text-gray-500 py-3">Belum ada data iuran.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </div>
</body>

</html>