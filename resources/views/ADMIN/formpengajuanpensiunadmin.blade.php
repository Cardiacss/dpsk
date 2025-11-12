@extends('ADMIN.layouts.main')

@section('title', 'Form Pengajuan Pensiun')

@section('artikel')
<div class="bg-white rounded-lg shadow p-6">
  <h1 class="text-2xl font-bold text-center mb-6 text-teal-700">Form Pengajuan Pensiun</h1>

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
        <label class="block text-sm font-medium">Pekerjaan</label>
        <input type="text" name="pekerjaan" value="GURU"
               class="w-full mt-1 border rounded p-2 bg-gray-50">
      </div>

      <!-- Nomor Pensiun -->
      <div>
        <label class="block text-sm font-medium">No Pensiun</label>
        <input type="text" name="nopensiun" class="w-full mt-1 border rounded p-2 bg-gray-50" required>
      </div>

      {{-- SURAT TAMBAHAN --}}
      <div>
        <label class="block text-sm font-medium">Surat keterangan tambahan</label>
        <select id="sk_tambahan" name="sk_tambahan"
                class="w-full mt-1 border rounded p-2 bg-gray-50">
          <option value="">-- Pilih Surat Keterangan --</option>
          <option value="SK Kematian">SK Kematian</option>
          <option value="SK Sakit">SK Sakit</option>
        </select>
      </div>

      {{-- Bagian Form Surat --}}
      <div id="form_sk_tambahan" class="mt-3 hidden">
        <div class="grid grid-cols-2 gap-2">
          <div>
            <label class="block text-sm font-medium">Nomor Surat</label>
            <input type="text" name="nosuratdari" class="w-full mt-1 border rounded p-2 bg-gray-50">
          </div>
          <div>
            <label class="block text-sm font-medium">Surat Dari</label>
            <input type="text" name="suratdari" class="w-full mt-1 border rounded p-2 bg-gray-50">
          </div>
        </div>

        <div class="grid grid-cols-2 gap-2 mt-2">
          <div>
            <label class="block text-sm font-medium">Tanggal Surat</label>
            <input type="date" name="tglsuratdari" class="w-full mt-1 border rounded p-2 bg-gray-50">
          </div>
          <div id="tgl_meninggal_div">
            <label class="block text-sm font-medium">Tanggal Meninggal</label>
            <input type="date" name="dodt" class="w-full mt-1 border rounded p-2 bg-gray-50">
          </div>
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium">Tanggal Mohon</label>
        <input type="date" name="tglmohon" class="w-full mt-1 border rounded p-2 bg-gray-50" required>
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
          <label class="block text-sm font-medium">Tgl Mulai Kerja</label>
          <input type="date" name="tmtkeja"
                 value="{{ $peserta->tmtkeja ? date('Y-m-d', strtotime($peserta->tmtkeja)) : '' }}"
                 class="w-full mt-1 border rounded p-2 bg-gray-50">
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium">Keterangan</label>
        <textarea name="keterangan" rows="3" class="w-full mt-1 border rounded p-2 bg-gray-50"
                  placeholder="Masukkan keterangan tambahan jika ada..." required></textarea>
      </div>

      <div class="grid grid-cols-2 gap-2">
        <div>
          <label class="block text-sm font-medium">Nomor SK Pensiun</label>
          <input type="text" name="nosuratberhenti" class="w-full mt-1 border rounded p-2 bg-gray-50" required>
        </div>
        <div>
          <label class="block text-sm font-medium">Nomor Peserta Pensiun</label>
          <input type="text" name="nopesertapensiun" value="555"
                 class="w-full mt-1 border rounded p-2 bg-gray-50" required>
        </div>
      </div>

      <div class="grid grid-cols-2 gap-2">
        <div>
          <label class="block text-sm font-medium">Tgl Pensiun (TMP)</label>
          <input type="date" name="tmtpensiun" class="w-full mt-1 border rounded p-2 bg-gray-50" required>
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium">Nilai Variabel</label>
        <input type="text" name="nilaivariabel" value="0.021" class="w-full mt-1 border rounded p-2 bg-gray-50">
      </div>

      <div>
        <label class="block text-sm font-medium">Nomor Agenda DPSK</label>
        <input type="text" name="noagendadpsk" class="w-full mt-1 border rounded p-2 bg-gray-50" required>
      </div>

      <div class="grid grid-cols-2 gap-2">
        <div>
          <label class="block text-sm font-medium">Jenis Manfaat</label>
          <select name="statusmanfaat" class="w-full mt-1 border rounded p-2 bg-gray-50">
            <option value="Bulanan" selected>Bulanan</option>
            <option value="100%">100% (Sekaligus)</option>
            <option value="20%">20%</option>
          </select>
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium">Simulasi</label>
        <button id="btnSimulasi" type="button"
                class="w-full mt-1 bg-[#2994A4] hover:bg-[#257F8C] text-white font-semibold py-2 px-4 rounded transition">
          Jalankan Simulasi
        </button>
      </div>

      <div>
        <label class="block text-sm font-medium">Batas maksimum MP</label>
        <input type="text" name="batasmp" value="2000000" class="w-full mt-1 border rounded p-2 bg-gray-50">
      </div>
    </div>

    <!-- TOMBOL -->
    <div class="col-span-2 flex justify-end mt-6">
      <button type="submit" class="px-6 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">Simpan</button>
    </div>
  </form>
</div>

<!-- Script Surat Tambahan -->
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

<!-- Script Simulasi -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  const simulasiBtn = document.getElementById('btnSimulasi');
  const hasilDiv = document.getElementById('hasilSimulasi');

  function hitungUsiaLengkap(tgllahir, tmtpensiun) {
    const lahir = new Date(tgllahir);
    const pensiun = new Date(tmtpensiun);

    let tahun = pensiun.getFullYear() - lahir.getFullYear();
    let bulan = pensiun.getMonth() - lahir.getMonth();

    if (bulan < 0) {
      tahun -= 1;
      bulan += 12;
    }

    return { tahun, bulan };
  }

  simulasiBtn.addEventListener('click', function () {
    const pekerjaan = document.querySelector('[name="pekerjaan"]').value;
    const tgllahir = document.querySelector('[name="tgllahir"]').value;
    const dodt = document.querySelector('[name="dodt"]').value;
    const tmtkeja = document.querySelector('[name="tmtkeja"]').value;
    const tmtpensiun = document.querySelector('[name="tmtpensiun"]').value;

    if (!tgllahir || !tmtkeja || !tmtpensiun) {
      alert("Harap isi Tanggal Lahir, TMT Kerja, dan Tanggal Pensiun terlebih dahulu!");
      return;
    }

    const query = new URLSearchParams({ pekerjaan, tgllahir, dodt, tmtkeja, tmtpensiun });

    fetch(`/admin/simulasiView?${query.toString()}`)
      .then(res => res.json())
      .then(data => {
        if (data.error) {
          hasilDiv.innerHTML = `<p class="text-red-600 mt-4">${data.error}</p>`;
          return;
        }

        const usiaObj = hitungUsiaLengkap(tgllahir, tmtpensiun);
        const usiaTahunDesimal = usiaObj.tahun + usiaObj.bulan / 12;

        let html = `
          <div class="mt-6 border-t pt-4">
            <h2 class="text-lg font-bold mb-2 text-teal-700">Hasil Simulasi</h2>
            <table class="w-full border text-sm mb-4">
              <thead class="bg-gray-100">
                <tr>
                  <th class="border p-2">Masa Kerja</th>
                  <th class="border p-2">Pekerjaan Terakhir</th>
                  <th class="border p-2">Usia Peserta</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="border p-2 text-center">${data.masa_kerja} tahun</td>
                  <td class="border p-2 text-center">${data.pekerjaan_terakhir}</td>
                  <td class="border p-2 text-center">${usiaObj.tahun} tahun ${usiaObj.bulan} bulan</td>
                </tr>
              </tbody>
            </table>
        `;

        const masa_kerja = parseFloat(data.masa_kerja) || 0;
        const usia_pensiun = usiaTahunDesimal;
        const usia_peserta = parseFloat(data.usia) || 0;
        const phdp = 0;
        const dasar = 0.6 * 0.021 * phdp;

        const manfaat = ['MP', '100%', '80%', '20%'];
        html += `
          <h3 class="text-md font-semibold mb-2">Tabel Jenis Manfaat</h3>
          <table class="w-full border text-sm">
            <thead class="bg-gray-100">
              <tr>
                <th class="border p-2">Jenis Manfaat</th>
                <th class="border p-2">Perhitungan Manfaat</th>
              </tr>
            </thead>
            <tbody>
        `;

        manfaat.forEach(jenis => {
          let nilai = dasar * (masa_kerja + (usia_pensiun - usia_peserta));
          if (jenis === '80%') nilai *= 0.8;
          if (jenis === '20%') nilai *= 0.2;
          if (jenis === '100%') nilai *= 1;

          html += `
            <tr>
              <td class="border p-2 text-center">${jenis}</td>
              <td class="border p-2 text-center">${nilai.toFixed(2)}</td>
            </tr>
          `;
        });

        html += `</tbody></table></div>`;
        hasilDiv.innerHTML = html;
      })
      .catch(err => {
        console.error("Error:", err);
        hasilDiv.innerHTML = `<p class="text-red-600 mt-4">Terjadi kesalahan saat menghitung simulasi.</p>`;
      });
  });
});
</script>

<!-- tempat hasil -->
<div id="hasilSimulasi" class="col-span-2"></div>
@endsection
