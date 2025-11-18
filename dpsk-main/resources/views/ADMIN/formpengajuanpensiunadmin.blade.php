@extends('ADMIN.layouts.main')

@section('title', 'Form Pengajuan Pensiun')

@section('artikel')
    <form action="{{ route('admin.formpengajuanpensiun.store') }}" method="POST">
        @csrf

        <div class="row g-3">

            <!-- KIRI -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Nomor Peserta</label>
                    <input type="text" name="idanggota" value="{{ $peserta->idanggota }}" readonly
                        class="form-control bg-light">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Peserta</label>
                    <input type="text" value="{{ $peserta->nama }}" readonly class="form-control bg-light">
                </div>

                <div class="mb-3">
                    <label class="form-label">Pekerjaan</label>
                    <input type="text" name="pekerjaan" value="GURU" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">No Pensiun</label>
                    <input type="text" name="nopensiun" class="form-control" required>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Surat Keterangan Tambahan</label>
                        <select id="sk_tambahan" name="sk_tambahan" class="form-select bg-light text-dark border rounded"
                            style="width:100%; padding-top:0.47rem; padding-bottom:0.47rem; height:calc(2.25rem + 2px); line-height:1.5;">
                            <option value="" selected disabled>-- Pilih Surat Keterangan --</option>
                            <option value="SK Kematian">SK Kematian</option>
                            <option value="SK Sakit">SK Sakit</option>
                        </select>
                    </div>
                </div>



                <!-- Bagian Surat Tambahan -->
                <div id="form_sk_tambahan" class="mt-2 d-none">
                    <div class="row g-2">
                        <div class="col-md-6">
                            <label class="form-label">Nomor Surat</label>
                            <input type="text" name="nosuratdari" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Surat Dari</label>
                            <input type="text" name="suratdari" class="form-control">
                        </div>
                    </div>
                    <div class="row g-2 mt-2">
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Surat</label>
                            <input type="date" name="tglsuratdari" class="form-control">
                        </div>
                        <div class="col-md-6" id="tgl_meninggal_div">
                            <label class="form-label">Tanggal Meninggal</label>
                            <input type="date" name="dodt" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Tanggal Mohon</label>
                    <input type="date" name="tglmohon" class="form-control" required>
                </div>
            </div>

            <!-- KANAN -->
            <div class="col-md-6">

                <div class="row g-2">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tgllahir"
                            value="{{ $peserta->tgllahir ? date('Y-m-d', strtotime($peserta->tgllahir)) : '' }}"
                            class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tgl Mulai Kerja</label>
                        <input type="date" name="tmtkeja"
                            value="{{ $peserta->tmtkeja ? date('Y-m-d', strtotime($peserta->tmtkeja)) : '' }}"
                            class="form-control">
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" rows="3" class="form-control" placeholder="Masukkan keterangan tambahan..." required></textarea>
                </div>

                <div class="row g-2">
                    <div class="col-md-6">
                        <label class="form-label">Nomor SK Pensiun</label>
                        <input type="text" name="nosuratberhenti" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nomor Peserta Pensiun</label>
                        <input type="text" name="nopesertapensiun" value="555" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <label class="form-label">Tgl Pensiun (TMP)</label>
                    <input type="date" name="tmtpensiun" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nilai Variabel</label>
                    <input type="text" name="nilaivariabel" value="0.021" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor Agenda DPSK</label>
                    <input type="text" name="noagendadpsk" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Manfaat</label>
                    <select name="statusmanfaat" class="form-select bg-light text-dark border rounded"
                        style="width:100%; padding-top:0.47rem; padding-bottom:0.47rem; height:calc(2.25rem + 2px); line-height:1.5;">
                        <option value="Bulanan" selected>Bulanan</option>
                        <option value="100%">100% (Sekaligus)</option>
                        <option value="20%">20%</option>
                    </select>
                </div>



                <div class="mb-3">
                    <label class="form-label">Simulasi</label>
                    <button id="btnSimulasi" type="button" class="btn btn-teal w-100"
                        style="background-color:#2994A4; color:white;">
                        Jalankan Simulasi
                    </button>
                </div>

                <div class="mb-3">
                    <label class="form-label">Batas Maksimum MP</label>
                    <input type="text" name="batasmp" value="2000000" class="form-control">
                </div>
            </div>

            <!-- TOMBOL -->
            <div class="col-12 text-center mt-4">
                <a href="/pengajuanpensiun"
                    class="btn btn-secondary px-4 me-2">
                    Kembali
                </a>
                <button type="submit" class="btn text-white px-4" style="background-color:#2994A4; border:none;">
                    Simpan
                </button>
            </div>


        </div>
    </form>


    <!-- Script Surat Tambahan -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const select = document.getElementById('sk_tambahan');
            const formSection = document.getElementById('form_sk_tambahan');
            const tglMeninggalDiv = document.getElementById('tgl_meninggal_div');

            function toggleForm() {
                const value = select.value;
                if (value === 'SK Kematian') {
                    formSection.classList.remove('d-none');
                    tglMeninggalDiv.classList.remove('d-none');
                } else if (value === 'SK Sakit') {
                    formSection.classList.remove('d-none');
                    tglMeninggalDiv.classList.add('d-none');
                } else {
                    formSection.classList.add('d-none');
                }
            }

            toggleForm();
            select.addEventListener('change', toggleForm);
        });
    </script>

    <!-- Script Simulasi -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
                return {
                    tahun,
                    bulan
                };
            }

            simulasiBtn.addEventListener('click', function() {
                const pekerjaan = document.querySelector('[name="pekerjaan"]').value;
                const tgllahir = document.querySelector('[name="tgllahir"]').value;
                const dodt = document.querySelector('[name="dodt"]').value;
                const tmtkeja = document.querySelector('[name="tmtkeja"]').value;
                const tmtpensiun = document.querySelector('[name="tmtpensiun"]').value;

                if (!tgllahir || !tmtkeja || !tmtpensiun) {
                    alert("Harap isi Tanggal Lahir, TMT Kerja, dan Tanggal Pensiun terlebih dahulu!");
                    return;
                }

                const query = new URLSearchParams({
                    pekerjaan,
                    tgllahir,
                    dodt,
                    tmtkeja,
                    tmtpensiun
                });

                fetch(`/admin/simulasiView?${query.toString()}`)
                    .then(res => res.json())
                    .then(data => {
                        if (data.error) {
                            hasilDiv.innerHTML = `<p class="text-danger mt-3">${data.error}</p>`;
                            return;
                        }

                        const usiaObj = hitungUsiaLengkap(tgllahir, tmtpensiun);
                        const usiaTahunDesimal = usiaObj.tahun + usiaObj.bulan / 12;

                        let html = `
          <div class="mt-4 border-top pt-3">
            <h5 class="text-teal-700 mb-2 fw-bold">Hasil Simulasi</h5>
            <table class="table table-bordered table-sm mb-3">
              <thead class="table-light">
                <tr>
                  <th>Masa Kerja</th>
                  <th>Pekerjaan Terakhir</th>
                  <th>Usia Peserta</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center">${data.masa_kerja} tahun</td>
                  <td class="text-center">${data.pekerjaan_terakhir}</td>
                  <td class="text-center">${usiaObj.tahun} tahun ${usiaObj.bulan} bulan</td>
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
          <h6 class="fw-semibold">Tabel Jenis Manfaat</h6>
          <table class="table table-bordered table-sm">
            <thead class="table-light">
              <tr>
                <th>Jenis Manfaat</th>
                <th>Perhitungan Manfaat</th>
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
              <td class="text-center">${jenis}</td>
              <td class="text-center">${nilai.toFixed(2)}</td>
            </tr>`;
                        });

                        html += `</tbody></table></div>`;
                        hasilDiv.innerHTML = html;
                    })
                    .catch(err => {
                        console.error("Error:", err);
                        hasilDiv.innerHTML =
                            `<p class="text-danger mt-3">Terjadi kesalahan saat menghitung simulasi.</p>`;
                    });
            });
        });
    </script>

    <!-- tempat hasil -->
    <div id="hasilSimulasi" class="mt-3"></div>
@endsection
