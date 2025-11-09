@extends('ADMIN.layouts.main')

@section('title', 'Form Pengajuan Pensiun')

@section('artikel')
<div class="bg-white rounded-lg shadow p-6">
  <h1 class="text-2xl font-bold text-center mb-6">Form Pengajuan Pensiun</h1>

  <form action="{{ route('admin.formpengajuanpensiun.store') }}" method="POST" class="grid grid-cols-2 gap-6">
    @csrf

    <!-- KIRI -->
    <div class="space-y-4">
      <div>
        <label class="block text-sm font-medium">Nomor Peserta</label>
        <input type="text" name="idanggota" value="{{ $peserta->idanggota }}" readonly
               class="w-full mt-1 border rounded p-2 bg-gray-100">
      </div>
      <div>
        <label class="block text-sm font-medium">Nama Peserta</label>
        <input type="text" value="{{ $peserta->nama }}" readonly
               class="w-full mt-1 border rounded p-2 bg-gray-100">
      </div>

      <div>
        <label class="block text-sm font-medium">No Pensiun</label>
        <input type="text" name="nopensiun" class="w-full mt-1 border rounded p-2">
      </div>

      <div>
        <label class="block text-sm font-medium">Status Hidup</label>
        <select name="statushidup" class="w-full mt-1 border rounded p-2">
          <option value="1">Hidup</option>
          <option value="0">Meninggal</option>
        </select>
      </div>

      <div>
        <label class="block text-sm font-medium">Tanggal Mohon</label>
        <input type="date" name="tglmohon" class="w-full mt-1 border rounded p-2">
      </div>
    </div>

    <!-- KANAN -->
    <div class="space-y-4">
      <div>
        <label class="block text-sm font-medium">Tanggal Pensiun</label>
        <input type="date" name="tmtpensiun" class="w-full mt-1 border rounded p-2">
      </div>

      <div>
        <label class="block text-sm font-medium">No Surat Berhenti</label>
        <input type="text" name="nosuratberhenti" class="w-full mt-1 border rounded p-2">
      </div>
      <div>
        <label class="block text-sm font-medium">Nomor Agenda DPSK</label>
        <input type="text" name="noagendapsk" class="w-full mt-1 border rounded p-2">
      </div>
      <div>
        <label class="block text-sm font-medium">Status Manfaat</label>
        <select name="statusmanfaat" class="w-full mt-1 border rounded p-2">
          <option value="normal">Normal</option>
          <option value="simulasi">Simulasi</option>
        </select>
      </div>
            <div>
        <label class="block text-sm font-medium">Keterangan</label>
        <textarea name="keterangan" class="w-full mt-1 border rounded p-2"></textarea>
      </div>
    </div>

    <!-- TOMBOL -->
    <div class="col-span-2 flex justify-end mt-6">
      <button type="submit" class="px-6 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">
        Simpan
      </button>
    </div>
  </form>
</div>
@endsection
