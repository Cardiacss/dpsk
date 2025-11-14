@extends('ADMIN.layouts.main')

@section('title', isset($pensiun) ? 'Edit Pengajuan Pensiun' : 'Form Edit Pensiun')

@section('artikel')
<div class="bg-white rounded-lg shadow p-6">
  <h1 class="text-2xl font-bold text-center mb-6 text-teal-700">
    {{ isset($pensiun) ? 'Edit Data Pengajuan Pensiun' : 'Form Edit Pensiun' }}
  </h1>

  <form 
    action="{{ isset($pensiun) ? route('admin.editpensiun.update', $pensiun->idpensiun) : route('admin.editpensiun.store') }}" 
    method="POST" 
    class="grid grid-cols-2 gap-6">
    
    @csrf
    @if(isset($pensiun))
      @method('PUT')
    @endif

    <!-- KIRI -->
    <div class="space-y-4">
      <div>
        <label class="block text-sm font-medium">Nomor Peserta</label>
        <input type="text" name="i  nggota" 
               value="{{ $pensiun->idanggota ?? $peserta->idanggota }}" 
               readonly
               class="w-full mt-1 border rounded p-2 bg-gray-100">
      </div>

      <div>
        <label class="block text-sm font-medium">Nama Peserta</label>
        <input type="text" 
               value="{{ $peserta->nama }}" readonly
               class="w-full mt-1 border rounded p-2 bg-gray-100">
      </div>

      <div>
        <label class="block text-sm font-medium">Pekerjaan</label>
        <input type="text" name="pekerjaan"
               value="{{ $pensiun->pekerjaan ?? 'GURU' }}"
               class="w-full mt-1 border rounded p-2 bg-gray-50">
      </div>

      <div>
        <label class="block text-sm font-medium">No Pensiun</label>
        <input type="text" name="nopensiun" 
               value="{{ $pensiun->nopensiun ?? '' }}"
               class="w-full mt-1 border rounded p-2 bg-gray-50" required>
      </div>

      {{-- SURAT TAMBAHAN --}}
      <div>
        <label class="block text-sm font-medium">Surat keterangan tambahan</label>
        <select id="sk_tambahan" name="sk_tambahan"
                class="w-full mt-1 border rounded p-2 bg-gray-50">
          <option value="">-- Pilih Surat Keterangan --</option>
          <option value="SK Kematian" {{ ($pensiun->sk_tambahan ?? '') == 'SK Kematian' ? 'selected' : '' }}>SK Kematian</option>
          <option value="SK Sakit" {{ ($pensiun->sk_tambahan ?? '') == 'SK Sakit' ? 'selected' : '' }}>SK Sakit</option>
        </select>
      </div>

      {{-- FORM SURAT TAMBAHAN --}}
      <div id="form_sk_tambahan" class="mt-3 hidden">
        <div class="grid grid-cols-2 gap-2">
          <div>
            <label class="block text-sm font-medium">Nomor Surat</label>
            <input type="text" name="nosuratdari" 
                   value="{{ $pensiun->nosuratdari ?? '' }}"
                   class="w-full mt-1 border rounded p-2 bg-gray-50">
          </div>
          <div>
            <label class="block text-sm font-medium">Surat Dari</label>
            <input type="text" name="suratdari" 
                   value="{{ $pensiun->suratdari ?? '' }}"
                   class="w-full mt-1 border rounded p-2 bg-gray-50">
          </div>
        </div>

        <div class="grid grid-cols-2 gap-2 mt-2">
          <div>
            <label class="block text-sm font-medium">Tanggal Surat</label>
            <input type="date" name="tglsuratdari" 
                   value="{{ isset($pensiun->tglsuratdari) ? date('Y-m-d', strtotime($pensiun->tglsuratdari)) : '' }}"
                   class="w-full mt-1 border rounded p-2 bg-gray-50">
          </div>
          <div id="tgl_meninggal_div">
            <label class="block text-sm font-medium">Tanggal Meninggal</label>
            <input type="date" name="dodt" 
                   value="{{ isset($pensiun->dodt) ? date('Y-m-d', strtotime($pensiun->dodt)) : '' }}"
                   class="w-full mt-1 border rounded p-2 bg-gray-50">
          </div>
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium">Tanggal Mohon</label>
        <input type="date" name="tglmohon"
               value="{{ isset($pensiun->tglmohon) ? date('Y-m-d', strtotime($pensiun->tglmohon)) : '' }}"
               class="w-full mt-1 border rounded p-2 bg-gray-50" required>
      </div>
    </div>

    <!-- KANAN -->
    <div class="space-y-4">
      <div class="grid grid-cols-2 gap-2">
        <div>
          <label class="block text-sm font-medium">Tanggal Lahir</label>
          <input type="date" name="tgllahir"
                 value="{{ $peserta->tgllahir ? date('Y-m-d', strtotime($peserta->tgllahir)) : '' }}"
                 class="w-full mt-1 border rounded p-2 bg-gray-50">
        </div>
        <div>
          <label class="block text-sm font-medium">TMT Kerja</label>
          <input type="date" name="tmtkeja"
                 value="{{ $peserta->tmtkeja ? date('Y-m-d', strtotime($peserta->tmtkeja)) : '' }}"
                 class="w-full mt-1 border rounded p-2 bg-gray-50">
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium">Keterangan</label>
        <textarea name="keterangan" rows="3"
                  class="w-full mt-1 border rounded p-2 bg-gray-50"
                  required>{{ $pensiun->keterangan ?? '' }}</textarea>
      </div>

      <div class="grid grid-cols-2 gap-2">
        <div>
          <label class="block text-sm font-medium">Nomor SK Pensiun</label>
          <input type="text" name="nosuratberhenti"
                 value="{{ $pensiun->nosuratberhenti ?? '' }}"
                 class="w-full mt-1 border rounded p-2 bg-gray-50" required>
        </div>
      </div>

      <div class="grid grid-cols-2 gap-2">
        <div>
          <label class="block text-sm font-medium">Tgl Pensiun (TMP)</label>
          <input type="date" name="tmtpensiun"
                 value="{{ isset($pensiun->tmtpensiun) ? date('Y-m-d', strtotime($pensiun->tmtpensiun)) : '' }}"
                 class="w-full mt-1 border rounded p-2 bg-gray-50" required>
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium">Nilai Variabel</label>
        <input type="text" name="nilaivariabel"
               value="{{ $pensiun->nilaivariabel ?? '0.021' }}"
               class="w-full mt-1 border rounded p-2 bg-gray-50">
      </div>

      <div>
        <label class="block text-sm font-medium">Nomor Agenda DPSK</label>
        <input type="text" name="noagendadpsk"
               value="{{ $pensiun->noagendadpsk ?? '' }}"
               class="w-full mt-1 border rounded p-2 bg-gray-50" required>
      </div>

      <div class="grid grid-cols-2 gap-2">
        <div>
          <label class="block text-sm font-medium">Jenis Manfaat</label>
          <select name="statusmanfaat" class="w-full mt-1 border rounded p-2 bg-gray-50">
            <option value="Bulanan" {{ ($pensiun->statusmanfaat ?? '') == 'Bulanan' ? 'selected' : '' }}>Bulanan</option>
            <option value="100%" {{ ($pensiun->statusmanfaat ?? '') == '100%' ? 'selected' : '' }}>100%</option>
            <option value="20%" {{ ($pensiun->statusmanfaat ?? '') == '20%' ? 'selected' : '' }}>20%</option>
          </select>
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium">Batas maksimum MP</label>
        <input type="text" name="batasmp"
               value="{{ $pensiun->batasmp ?? '2000000' }}"
               class="w-full mt-1 border rounded p-2 bg-gray-50">
      </div>
    </div>

    <div class="col-span-2 flex justify-end mt-6">
      <button type="submit"
              class="px-6 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">
        {{ isset($pensiun) ? 'Update Data' : 'Simpan' }}
      </button>
    </div>
  </form>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const select = document.getElementById('sk_tambahan');
  const formSection = document.getElementById('form_sk_tambahan');
  const tglMeninggalDiv = document.getElementById('tgl_meninggal_div');

  function toggleForm() {
    const value = select.value;
    if (value === 'SK Kematian') {
      formSection.classList.remove('hidden');
      tglMeninggalDiv.classList.remove('hidden');
    } else if (value === 'SK Sakit') {
      formSection.classList.remove('hidden');
      tglMeninggalDiv.classList.add('hidden');
    } else {
      formSection.classList.add('hidden');
    }
  }

  toggleForm();
  select.addEventListener('change', toggleForm);
});
</script>
@endsection