@extends('ADMIN.layouts.main')

@section('title')
    Simulasi Kepersertaan dan Pemberian Manfaat
    <br>
    <small class="text-muted">Simulasi Peserta Aktif</small>
@endsection

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="/kepersertaan" style="text-decoration:none; color:#555;">Kepersertaan</a> /
        <a href="{{ route('admin.simulasi') }}" style="text-decoration:none; color:#555;">Simulasi</a> /
        <a href="#" style="text-decoration:none; color:#2994A4;">Simulasi Peserta Aktif</a>
    </p>
@endsection

@section('artikel')

    <hr>

    <h5 class="mb-3">Simulasi Calon Peserta</h5>
    <div class="container-fluid">
        {{-- ✅ Data Peserta dari Database --}}
        <div class="form-group row mb-2">
            <label class="col-sm-3 col-form-label">No Peserta</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="nopeserta" value="{{ $peserta->nopeserta ?? '' }}" readonly>
            </div>
        </div>

        <div class="form-group row mb-2">
            <label class="col-sm-3 col-form-label">Nama Peserta</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="namapeserta" value="{{ $peserta->nama ?? '' }}" readonly>
            </div>
        </div>

        <div class="form-group row mb-2">
            <label class="col-sm-3 col-form-label">2%</label>
            <div class="col-sm-9">
                <div class="input-group">
                    <input type="text" class="form-control" id="persen" value="0.021">
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row mb-2">
            <label class="col-sm-3 col-form-label">Batas Manfaat Bulanan</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="batasmanfaatbulanan" value="2000000">
            </div>
        </div>

        <div class="form-group row mb-2">
            <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-9">
                <input type="date" class="form-control" id="tanggallahir" name="tgllahir"
                    value="{{ $peserta->tgllahir ? $peserta->tgllahir->format('Y-m-d') : '' }}" readonly>
            </div>
        </div>


        <div class="form-group row mb-2">
            <label class="col-sm-3 col-form-label">Tanggal Mulai Kerja</label>
            <div class="col-sm-9">
                <input type="date" class="form-control" id="tanggalmulaikerja" name="tmtkeja"
                    value="{{ $peserta->tmtkeja ? $peserta->tmtkeja->format('Y-m-d') : '' }}" readonly>
            </div>

        </div>

        <hr>

        <div class="form-group row mb-2">
            <label class="col-sm-3 col-form-label">Surat Keterangan Tambahan</label>
            <div class="col-sm-9">
                <select class="form-control" id="suratketerangan" onchange="tampilkanFormSurat()">
                    <option value="">Pilih jika ada</option>
                    <option value="meninggal">SK Meninggal</option>
                    <option value="sakit">SK Sakit</option>
                </select>
            </div>
        </div>

        {{-- ✅ Form SK Meninggal --}}
        <div id="formKematian" style="display: none;">
            <div class="form-group row mb-2">
                <label class="col-sm-3 col-form-label">Nomor Surat</label>
                <div class="col-sm-3">
                    <input type="text" name="nomor_surat_meninggal" class="form-control" placeholder="Nomor surat">
                </div>
                <label class="col-sm-2 col-form-label">Surat Dari</label>
                <div class="col-sm-4">
                    <input type="text" name="surat_dari_meninggal" class="form-control"
                        placeholder="Instansi yang mengeluarkan">
                </div>
            </div>

            <div class="form-group row mb-2">
                <label class="col-sm-3 col-form-label">Tanggal Surat</label>
                <div class="col-sm-3">
                    <input type="date" name="tanggal_surat_meninggal" class="form-control">
                </div>
                <label class="col-sm-2 col-form-label">Tanggal Meninggal</label>
                <div class="col-sm-4">
                    <input type="date" name="tanggal_meninggal" class="form-control">
                </div>
            </div>
        </div>

        {{-- ✅ Form SK Sakit --}}
        <div id="formSakit" style="display: none;">
            <div class="form-group row mb-2">
                <label class="col-sm-3 col-form-label">Nomor Surat</label>
                <div class="col-sm-3">
                    <input type="text" name="nomor_surat_sakit" class="form-control" placeholder="Nomor surat">
                </div>
                <label class="col-sm-2 col-form-label">Surat Dari</label>
                <div class="col-sm-4">
                    <input type="text" name="surat_dari_sakit" class="form-control"
                        placeholder="Instansi yang mengeluarkan">
                </div>
            </div>

            <div class="form-group row mb-2">
                <label class="col-sm-3 col-form-label">Tanggal Surat</label>
                <div class="col-sm-3">
                    <input type="date" name="tanggal_surat_sakit" class="form-control">
                </div>
            </div>
        </div>

        <hr>

        <div class="form-group row mb-3">
            <label class="col-sm-3 col-form-label">Rencana Pensiun</label>
            <div class="col-sm-9">
                <input type="date" class="form-control" id="tmtpensiun" name="tmtpensiun">
            </div>
        </div>
        <input type="hidden" id="idanggota" name="idanggota" value="{{ $peserta->idanggota }}">
        <div>
            <label class="block text-sm font-medium">Simulasi</label>
            <button id="btnSimulasi" type="button"
                class="w-full mt-1 bg-[#2994A4] hover:bg-[#257F8C] text-white font-semibold py-2 px-4 rounded transition">
                Jalankan Simulasi
            </button>
        </div>
        <div class="d-flex justify-content-center flex-wrap mt-4">
            <button class="btn m-2" style="background-color:#2994A4; color:white;" data-toggle="modal"
                data-target="#modalPenawaran">
                Cetak Penawaran Pensiun
            </button>
            <button class="btn m-2" style="background-color:#2994A4; color:white;" data-toggle="modal"
                data-target="#modalPembuatanSK">
                Cetak Data Pembuatan SK
            </button>
            <button class="btn m-2" style="background-color:#2994A4; color:white;" data-toggle="modal"
                data-target="#modalCetakSK">
                Cetak SK
            </button>
        </div>

    </div>

    {{-- 🧾 Modal Cetak Penawaran --}}
    <div class="modal fade" id="modalPenawaran" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <h5 class="mb-3 text-center fw-bold">Informasi Tambahan</h5>
                <div class="form-group row mb-2">
                    <label class="col-sm-5 col-form-label">Nomor Surat</label>
                    <div class="col-sm-7"><input type="text" class="form-control"></div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-5 col-form-label">Jenis Manfaat</label>
                    <div class="col-sm-7">
                        <select class="form-control">
                            <option>Sekaligus</option>
                            <option>Sebagian</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-5 col-form-label">Bulan Surat</label>
                    <div class="col-sm-7">
                        <select class="form-control">
                            <option>Januari</option>
                            <option>Februari</option>
                            <option>Maret</option>
                            <option>April</option>
                            <option>Mei</option>
                            <option>Juni</option>
                            <option>Juli</option>
                            <option>Agustus</option>
                            <option>September</option>
                            <option>Oktober</option>
                            <option>November</option>
                            <option>Desember</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-5 col-form-label">Tahun Surat</label>
                    <div class="col-sm-7"><input type="number" class="form-control"></div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-5 col-form-label">Alamat Tujuan</label>
                    <div class="col-sm-7"><input type="text" class="form-control"></div>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary me-2" style="background-color:#2994A4; color:white;">Cetak Penawaran
                        Pensiun</button>
                    <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    {{-- 🧾 Modal Cetak Data Pembuatan SK --}}
    <div class="modal fade" id="modalPembuatanSK" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <h5 class="mb-3 text-center fw-bold">Informasi Tambahan</h5>
                <div class="form-group row mb-2">
                    <label class="col-sm-6 col-form-label">Surat Permohonan Tertanggal</label>
                    <div class="col-sm-6"><input type="date" class="form-control"></div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-6 col-form-label">Tanggal Pengantar Surat</label>
                    <div class="col-sm-6"><input type="date" class="form-control"></div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-6 col-form-label">Nomor Pengantar Surat</label>
                    <div class="col-sm-6"><input type="text" class="form-control"></div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-6 col-form-label">Tanggal SK</label>
                    <div class="col-sm-6"><input type="date" class="form-control"></div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-6 col-form-label">Nomor SK</label>
                    <div class="col-sm-6"><input type="text" class="form-control"></div>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary me-2" style="background-color:#2994A4; color:white;">Cetak Data
                        Pembuatan SK</button>
                    <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    {{-- 🧾 Modal Cetak SK --}}
    <div class="modal fade" id="modalCetakSK" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <h5 class="mb-3 text-center fw-bold">Informasi Tambahan</h5>
                <div class="form-group row mb-2">
                    <label class="col-sm-6 col-form-label">Bulan Surat</label>
                    <div class="col-sm-6">
                        <select class="form-control">
                            <option>Januari</option>
                            <option>Februari</option>
                            <option>Maret</option>
                            <option>April</option>
                            <option>Mei</option>
                            <option>Juni</option>
                            <option>Juli</option>
                            <option>Agustus</option>
                            <option>September</option>
                            <option>Oktober</option>
                            <option>November</option>
                            <option>Desember</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-6 col-form-label">Nomor Surat</label>
                    <div class="col-sm-6"><input type="text" class="form-control"></div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-6 col-form-label">Tahun Surat</label>
                    <div class="col-sm-6"><input type="number" class="form-control"></div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-6 col-form-label">Anak Telah Dewasa</label>
                    <div class="col-sm-6">
                        <select class="form-control">
                            <option>Belum</option>
                            <option>Sudah</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-6 col-form-label">Jenis Manfaat</label>
                    <div class="col-sm-6">
                        <select class="form-control">
                            <option>Sekaligus</option>
                            <option>Sebagian</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-6 col-form-label">Manfaat</label>
                    <div class="col-sm-6">
                        <select class="form-control">
                            <option>Janda / Duda</option>
                            <option>Normal</option>
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary me-2" style="background-color:#2994A4; color:white;">Cetak SK</button>
                    <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
<script>
  function tampilkanFormSurat() {
    const select = document.getElementById('suratketerangan');
    const formKematian = document.getElementById('formKematian');
    const formSakit = document.getElementById('formSakit');
    formKematian.style.display = 'none';
    formSakit.style.display = 'none';

    if (select.value === 'meninggal') formKematian.style.display = 'block';
    else if (select.value === 'sakit') formSakit.style.display = 'block';
  }

  document.addEventListener('DOMContentLoaded', function () {
    const simulasiBtn = document.getElementById('btnSimulasi');
    const hasilDiv = document.getElementById('hasilSimulasi');
    hasilDiv.innerHTML = '';

    function hitungUsiaLengkap(tgllahir, tmtpensiun) {
      const lahir = new Date(tgllahir);
      const pensiun = new Date(tmtpensiun);
      let tahun = pensiun.getFullYear() - lahir.getFullYear();
      let bulan = pensiun.getMonth() - lahir.getMonth();
      if (bulan < 0) { tahun -= 1; bulan += 12; }
      return { tahun, bulan };
    }

    simulasiBtn.addEventListener('click', function (e) {
      e.preventDefault();

      const pekerjaan = document.querySelector('[name="pekerjaan"]')?.value;
      const tgllahir = document.querySelector('[name="tgllahir"]')?.value;
      const tmtkeja = document.querySelector('[name="tmtkeja"]')?.value;
      const tmtpensiun = document.querySelector('[name="tmtpensiun"]')?.value;
      const tanggalMeninggal = document.querySelector('[name="tanggal_meninggal"]')?.value || "";
      const idanggota = document.getElementById('idanggota')?.value; // ✅ dari input hidden

      if (!tgllahir || !tmtkeja || !tmtpensiun) {
        alert("⚠️ Harap isi Tanggal Lahir, TMT Kerja, dan Tanggal Pensiun terlebih dahulu!");
        return;
      }

      if (!idanggota) {
        alert("⚠️ ID Anggota tidak ditemukan! Pastikan data peserta sudah dimuat dari database.");
        return;
      }

      fetch(`/simulasipesertaaktif/${idanggota}?ajax=1&tmtpensiun=${tmtpensiun}&tanggal_meninggal=${tanggalMeninggal}`)
        .then(res => res.json())
        .then(data => {
          if (data.error) {
            hasilDiv.innerHTML = `<p class="text-red-600 mt-4">${data.error}</p>`;
            return;
          }

          const usiaObj = hitungUsiaLengkap(tgllahir, tmtpensiun);
          const masaKerja = parseFloat(data.masa_kerja) || 0;
          const usiaPeserta = parseFloat(data.usia) || 0;
          const phdp = parseFloat(data.phdp) || 0;
          const fnss = parseFloat(data.fnss) || 1;
          const usiaPensiun = usiaObj.tahun + usiaObj.bulan / 12;

          const rumusDasar = 0.6 * (masaKerja + (usiaPensiun - usiaPeserta)) * 0.021 * phdp;
          const nilaiMP = rumusDasar;
          const nilai100 = 1 * fnss * rumusDasar * 12;
          const nilai80 = 0.8 * (0.6 * masaKerja * 0.021 * phdp);
          const nilai20 = 0.2 * fnss * rumusDasar * 12;

          hasilDiv.innerHTML = `
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
                    <td class="border p-2 text-center">${masaKerja.toFixed(2)} tahun</td>
                    <td class="border p-2 text-center">${data.pekerjaan_terakhir ?? pekerjaan ?? '-'}</td>
                    <td class="border p-2 text-center">${usiaObj.tahun} tahun ${usiaObj.bulan} bulan</td>
                  </tr>
                </tbody>
              </table>
              <h3 class="text-md font-semibold mb-2">Tabel Jenis Manfaat</h3>
              <table class="w-full border text-sm">
                <thead class="bg-gray-100">
                  <tr><th class="border p-2">Jenis Manfaat</th><th class="border p-2">Perhitungan Manfaat</th></tr>
                </thead>
                <tbody>
                  <tr><td class="border p-2 text-center">MP</td><td class="border p-2 text-center">Rp ${nilaiMP.toLocaleString()}</td></tr>
                  <tr><td class="border p-2 text-center">100%</td><td class="border p-2 text-center">Rp ${nilai100.toLocaleString()}</td></tr>
                  <tr><td class="border p-2 text-center">80%</td><td class="border p-2 text-center">Rp ${nilai80.toLocaleString()}</td></tr>
                  <tr><td class="border p-2 text-center">20%</td><td class="border p-2 text-center">Rp ${nilai20.toLocaleString()}</td></tr>
                </tbody>
              </table>
            </div>`;
        })
        .catch(err => {
          console.error("Error:", err);
          hasilDiv.innerHTML = `<p class="text-red-600 mt-4">Terjadi kesalahan saat menghitung simulasi.</p>`;
        });
    });
  });
</script>

    <div id="hasilSimulasi" class="mt-4"></div>
@endsection