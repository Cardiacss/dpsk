@extends('ADMIN.layouts.main')

@section('title', 'Tabel Faktor Nilai')

@section('artikel')
<div class="min-h-screen bg-gray-100 py-10">
  <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-xl p-8">

    {{-- Breadcrumb --}}
    <nav class="mb-6">
      <ol class="flex space-x-2 text-sm text-gray-600">
        <li><a href="#" class="text-blue-600 hover:underline">Home</a></li>
        <li>/</li>
        <li class="font-semibold text-gray-800">Faktor Nilai</li>
      </ol>
    </nav>

    {{-- Judul --}}
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">Tabel Faktor Nilai</h2>
    <p class="text-center text-gray-600 mb-8">
      Faktor Nilai (FNS s/b) Pegawai/Guru, Pria/Wanita, Kawin/Lajang
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

      {{-- === PEGAWAI KAWIN === --}}
      <div class="border-2 border-cyan-500 rounded-lg p-4 bg-cyan-50">
        <h3 class="font-bold text-cyan-800 mb-2">Status: Pegawai (Kawin)</h3>
        <div class="overflow-x-auto max-h-72 overflow-y-auto">
          <table class="min-w-full text-sm text-center border border-gray-300">
            <thead class="bg-cyan-100">
              <tr>
                <th class="border px-2 py-1">Umur</th>
                <th class="border px-2 py-1">(s)Pria</th>
                <th class="border px-2 py-1">(b)Pria</th>
                <th class="border px-2 py-1">(s)Wanita</th>
                <th class="border px-2 py-1">(b)Wanita</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pegawaiKawin as $row)
                <tr>
                  <td class="border px-2 py-1">{{ $row->umur }}</td>
                  <td class="border px-2 py-1 text-red-500 cursor-pointer" 
                      onclick="editNilai('{{ $row->id }}','{{ $row->fns_s_pria_kawin }}','fns_s_pria_kawin')">
                      {{ number_format($row->fns_s_pria_kawin,5) }}
                  </td>
                  <td class="border px-2 py-1 text-red-500 cursor-pointer" 
                      onclick="editNilai('{{ $row->id }}','{{ $row->fns_b_pria_kawin }}','fns_b_pria_kawin')">
                      {{ number_format($row->fns_b_pria_kawin,5) }}
                  </td>
                  <td class="border px-2 py-1 text-red-500 cursor-pointer" 
                      onclick="editNilai('{{ $row->id }}','{{ $row->fns_s_wanita_kawin }}','fns_s_wanita_kawin')">
                      {{ number_format($row->fns_s_wanita_kawin,5) }}
                  </td>
                  <td class="border px-2 py-1 text-red-500 cursor-pointer" 
                      onclick="editNilai('{{ $row->id }}','{{ $row->fns_b_wanita_kawin }}','fns_b_wanita_kawin')">
                      {{ number_format($row->fns_b_wanita_kawin,5) }}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <form action="{{ route('faktornilai.update') }}" method="POST" class="flex justify-end items-center mt-3 space-x-2">
          @csrf
          <input type="hidden" name="id" id="edit_id">
          <input type="hidden" name="kolom" id="edit_kolom">
          <input type="text" name="nilai" id="edit_nilai" placeholder="Masukkan nilai baru"
                 class="border p-1 rounded-md text-sm w-40 focus:ring-2 focus:ring-cyan-500">
          <button type="submit" class="bg-cyan-600 hover:bg-cyan-700 text-white px-4 py-1 rounded-md font-semibold text-sm">
            Update Pegawai (Kawin)
          </button>
        </form>
      </div>

      {{-- === PEGAWAI LAJANG === --}}
      <div class="border-2 border-cyan-300 rounded-lg p-4 bg-cyan-50">
        <h3 class="font-bold text-cyan-800 mb-2">Status: Pegawai (Lajang)</h3>
        <div class="overflow-x-auto max-h-72 overflow-y-auto">
          <table class="min-w-full text-sm text-center border border-gray-300">
            <thead class="bg-cyan-100">
              <tr>
                <th class="border px-2 py-1">Umur</th>
                <th class="border px-2 py-1">(s)Pria</th>
                <th class="border px-2 py-1">(b)Pria</th>
                <th class="border px-2 py-1">(s)Wanita</th>
                <th class="border px-2 py-1">(b)Wanita</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pegawaiLajang as $row)
                <tr>
                  <td class="border px-2 py-1">{{ $row->umur }}</td>
                  <td class="border px-2 py-1 text-red-500 cursor-pointer" 
                      onclick="editNilai('{{ $row->id }}','{{ $row->fns_s_pria_lajang }}','fns_s_pria_lajang')">
                      {{ number_format($row->fns_s_pria_lajang,5) }}
                  </td>
                  <td class="border px-2 py-1 text-red-500 cursor-pointer" 
                      onclick="editNilai('{{ $row->id }}','{{ $row->fns_b_pria_lajang }}','fns_b_pria_lajang')">
                      {{ number_format($row->fns_b_pria_lajang,5) }}
                  </td>
                  <td class="border px-2 py-1 text-red-500 cursor-pointer" 
                      onclick="editNilai('{{ $row->id }}','{{ $row->fns_s_wanita_lajang }}','fns_s_wanita_lajang')">
                      {{ number_format($row->fns_s_wanita_lajang,5) }}
                  </td>
                  <td class="border px-2 py-1 text-red-500 cursor-pointer" 
                      onclick="editNilai('{{ $row->id }}','{{ $row->fns_b_wanita_lajang }}','fns_b_wanita_lajang')">
                      {{ number_format($row->fns_b_wanita_lajang,5) }}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <form action="{{ route('faktornilai.update') }}" method="POST" class="flex justify-end items-center mt-3 space-x-2">
          @csrf
          <input type="hidden" name="id" id="edit_id2">
          <input type="hidden" name="kolom" id="edit_kolom2">
          <input type="text" name="nilai" id="edit_nilai2" placeholder="Masukkan nilai baru"
                 class="border p-1 rounded-md text-sm w-40 focus:ring-2 focus:ring-cyan-500">
          <button type="submit" class="bg-cyan-600 hover:bg-cyan-700 text-white px-4 py-1 rounded-md font-semibold text-sm">
            Update Pegawai (Lajang)
          </button>
        </form>
      </div>

      {{-- === GURU KAWIN === --}}
      <div class="border-2 border-green-600 rounded-lg p-4 bg-green-50">
        <h3 class="font-bold text-green-800 mb-2">Status: Guru (Kawin)</h3>
        <div class="overflow-x-auto max-h-72 overflow-y-auto">
          <table class="min-w-full text-sm text-center border border-gray-300">
            <thead class="bg-green-100">
              <tr>
                <th class="border px-2 py-1">Umur</th>
                <th class="border px-2 py-1">(s)Pria</th>
                <th class="border px-2 py-1">(b)Pria</th>
                <th class="border px-2 py-1">(s)Wanita</th>
                <th class="border px-2 py-1">(b)Wanita</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($guruKawin as $row)
                <tr>
                  <td class="border px-2 py-1">{{ $row->umur }}</td>
                  <td class="border px-2 py-1 text-red-500 cursor-pointer" 
                      onclick="editNilai('{{ $row->id }}','{{ $row->fns_s_pria_kawin }}','fns_s_pria_kawin')">
                      {{ number_format($row->fns_s_pria_kawin,5) }}
                  </td>
                  <td class="border px-2 py-1 text-red-500 cursor-pointer" 
                      onclick="editNilai('{{ $row->id }}','{{ $row->fns_b_pria_kawin }}','fns_b_pria_kawin')">
                      {{ number_format($row->fns_b_pria_kawin,5) }}
                  </td>
                  <td class="border px-2 py-1 text-red-500 cursor-pointer" 
                      onclick="editNilai('{{ $row->id }}','{{ $row->fns_s_wanita_kawin }}','fns_s_wanita_kawin')">
                      {{ number_format($row->fns_s_wanita_kawin,5) }}
                  </td>
                  <td class="border px-2 py-1 text-red-500 cursor-pointer" 
                      onclick="editNilai('{{ $row->id }}','{{ $row->fns_b_wanita_kawin }}','fns_b_wanita_kawin')">
                      {{ number_format($row->fns_b_wanita_kawin,5) }}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <form action="{{ route('faktornilai.update') }}" method="POST" class="flex justify-end items-center mt-3 space-x-2">
          @csrf
          <input type="hidden" name="id" id="edit_id3">
          <input type="hidden" name="kolom" id="edit_kolom3">
          <input type="text" name="nilai" id="edit_nilai3" placeholder="Masukkan nilai baru"
                 class="border p-1 rounded-md text-sm w-40 focus:ring-2 focus:ring-green-500">
          <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-1 rounded-md font-semibold text-sm">
            Update Guru (Kawin)
          </button>
        </form>
      </div>

      {{-- === GURU LAJANG === --}}
      <div class="border-2 border-green-400 rounded-lg p-4 bg-green-50">
        <h3 class="font-bold text-green-800 mb-2">Status: Guru (Lajang)</h3>
        <div class="overflow-x-auto max-h-72 overflow-y-auto">
          <table class="min-w-full text-sm text-center border border-gray-300">
            <thead class="bg-green-100">
              <tr>
                <th class="border px-2 py-1">Umur</th>
                <th class="border px-2 py-1">(s)Pria</th>
                <th class="border px-2 py-1">(b)Pria</th>
                <th class="border px-2 py-1">(s)Wanita</th>
                <th class="border px-2 py-1">(b)Wanita</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($guruLajang as $row)
                <tr>
                  <td class="border px-2 py-1">{{ $row->umur }}</td>
                  <td class="border px-2 py-1 text-red-500 cursor-pointer" 
                      onclick="editNilai('{{ $row->id }}','{{ $row->fns_s_pria_lajang }}','fns_s_pria_lajang')">
                      {{ number_format($row->fns_s_pria_lajang,5) }}
                  </td>
                  <td class="border px-2 py-1 text-red-500 cursor-pointer" 
                      onclick="editNilai('{{ $row->id }}','{{ $row->fns_b_pria_lajang }}','fns_b_pria_lajang')">
                      {{ number_format($row->fns_b_pria_lajang,5) }}
                  </td>
                  <td class="border px-2 py-1 text-red-500 cursor-pointer" 
                      onclick="editNilai('{{ $row->id }}','{{ $row->fns_s_wanita_lajang }}','fns_s_wanita_lajang')">
                      {{ number_format($row->fns_s_wanita_lajang,5) }}
                  </td>
                  <td class="border px-2 py-1 text-red-500 cursor-pointer" 
                      onclick="editNilai('{{ $row->id }}','{{ $row->fns_b_wanita_lajang }}','fns_b_wanita_lajang')">
                      {{ number_format($row->fns_b_wanita_lajang,5) }}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <form action="{{ route('faktornilai.update') }}" method="POST" class="flex justify-end items-center mt-3 space-x-2">
          @csrf
          <input type="hidden" name="id" id="edit_id4">
          <input type="hidden" name="kolom" id="edit_kolom4">
          <input type="text" name="nilai" id="edit_nilai4" placeholder="Masukkan nilai baru"
                 class="border p-1 rounded-md text-sm w-40 focus:ring-2 focus:ring-green-500">
          <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-1 rounded-md font-semibold text-sm">
            Update Guru (Lajang)
          </button>
        </form>
      </div>

    </div>
  </div>
</div>

<script>
function editNilai(id, nilai, kolom) {
  document.querySelectorAll('[id^="edit_id"]').forEach(el => el.value = id);
  document.querySelectorAll('[id^="edit_nilai"]').forEach(el => el.value = nilai);
  document.querySelectorAll('[id^="edit_kolom"]').forEach(el => el.value = kolom);
}
</script>
@endsection
