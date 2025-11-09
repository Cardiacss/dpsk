<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Iuran Peserta</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">

  <div class="w-full max-w-xl bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-4 text-[#2994A4] text-center">Edit Data Iuran Peserta</h2>

    <div class="text-gray-600 mb-6 text-center">
      <p>
        ID Anggota: <strong>{{ $iuran->idanggota }}</strong> |
        ID Iuran: <strong>{{ $iuran->id_iuran }}</strong>
      </p>
    </div>

    {{-- 🟢 FORM --}}
    <form action="{{ url('/updatecatat/' . $iuran->idanggota . '/' . $iuran->id_iuran) }}" method="POST" class="space-y-4">
      @csrf

      {{-- Hidden input untuk menyimpan asal halaman --}}
      <input type="hidden" name="from" value="{{ request('from') }}">

      {{-- Tanggal Setor --}}
      <div>
        <label class="block font-semibold mb-1">Tanggal Setor</label>
        <input type="date" name="tglsetor" 
               value="{{ $iuran->tglsetor ? $iuran->tglsetor->format('Y-m-d') : '' }}" 
               class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-[#2994A4]">
        @error('tglsetor')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- PhDP --}}
      <div>
        <label class="block font-semibold mb-1">PhDP</label>
        <input type="number" name="phdp" value="{{ old('phdp', $iuran->phdp) }}" 
               placeholder="Masukkan PhDP" 
               class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-[#2994A4]">
        @error('phdp')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Iuran Pemberi Kerja --}}
      <div>
        <label class="block font-semibold mb-1">Iuran Pemberi Kerja</label>
        <input type="number" name="ipk_num" value="{{ old('ipk_num', $iuran->ipk_num) }}" 
               placeholder="Rp" 
               class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-[#2994A4]">
        @error('ipk_num')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Iuran Peserta --}}
      <div>
        <label class="block font-semibold mb-1">Iuran Peserta</label>
        <input type="number" name="ip_num" value="{{ old('ip_num', $iuran->ip_num) }}" 
               placeholder="Rp" 
               class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-[#2994A4]">
        @error('ip_num')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Tombol Aksi --}}
      <div class="flex justify-between pt-6">
        @if(request('from') === 'detailmitraadmin')
          <a href="{{ url('/detailmitraadmin/' . $iuran->idanggota) }}" 
             class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
             Kembali
          </a>
        @else
          <a href="{{ url('/editiuranpesertaadmin/' . $iuran->idanggota) }}" 
             class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
             Kembali
          </a>
        @endif

        <button type="submit" 
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
          Simpan
        </button>
      </div>
    </form>
  </div>

</body>
</html>
