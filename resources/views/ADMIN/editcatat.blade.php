<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Iuran Peserta</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

  <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-4 text-[#2994A4]">Edit Data Iuran Peserta</h2>
    <p class="text-gray-600 mb-6">
      ID Anggota: <strong>{{ $iuran->idanggota }}</strong> |
      ID Iuran: <strong>{{ $iuran->id_iuran }}</strong>
    </p>

    <form action="{{ url('/updatecatat/' . $iuran->idanggota . '/' . $iuran->id_iuran) }}" method="POST" class="space-y-4">
      @csrf

      <div>
        <label class="block font-semibold mb-1">Tanggal Setor</label>
        <input type="date" name="tglsetor" value="{{ $iuran->tglsetor ? $iuran->tglsetor->format('Y-m-d') : '' }}" class="w-full border rounded p-2">
      </div>

      <div>
        <label class="block font-semibold mb-1">PhDP</label>
        <input type="number" name="phdp" value="{{ $iuran->phdp }}" placeholder="Masukkan PhDP" class="w-full border rounded p-2">
      </div>

      <div>
        <label class="block font-semibold mb-1">Iuran Pemberi Kerja</label>
        <input type="number" name="ipk_num" value="{{ $iuran->ipk_num }}" placeholder="Rp" class="w-full border rounded p-2">
      </div>

      <div>
        <label class="block font-semibold mb-1">Iuran Peserta</label>
        <input type="number" name="ip_num" value="{{ $iuran->ip_num }}" placeholder="Rp" class="w-full border rounded p-2">
      </div>

      <div class="flex justify-between pt-4">
<a href="{{ url('/editiuranpesertaadmin/' . $iuran->idanggota) }}" 
   class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
   Kembali
</a>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Simpan</button>
      </div>
    </form>
  </div>

</body>
</html>