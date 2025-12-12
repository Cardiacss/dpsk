@extends('ADMIN.layouts.main')

@section('title', 'Form Pencatatan Pensiun')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">
            Home
        </a> /
        <a href="{{ route('admin.pengajuanpensiun') }}" style="text-decoration:none; color:#555;">
            Pengajuan Pensiun
        </a> /
        <a href="{{ route('admin.formpengajuanpensiun', ['idanggota' => $peserta->idanggota]) }}"
            style="text-decoration:none; color:#2994A4; font-weight:bold;">
            Form Pengajuan Pensiun
        </a>
    </p>
@endsection

@section('artikel')
    <div class="container my-4">

        <form action="{{ route('admin.formpengajuanpensiun.store') }}" method="POST">
            @csrf
            <div class="row">
                <!-- KIRI -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nomor Peserta</label>
                        <input type="text" name="idanggota" value="{{ $peserta->idanggota }}" readonly
                            class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Peserta</label>
                        <input type="text" value="{{ $peserta->nama }}" readonly class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pekerjaan</label>
                        <input type="text" name="pekerjaan" value="GURU" class="form-control" readonly/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No Pensiun</label>
                        <input type="text" name="nopensiun" class="form-control" required />
                    </div>

                    <div id="form_sk_tambahan" class="mb-3 d-none">
                        <div class="row g-2">
                            <div class="col">
                                <label class="form-label">Nomor Surat</label>
                                <input type="text" name="nosuratdari" class="form-control">
                            </div>
                            <div class="col">
                                <label class="form-label">Surat Dari</label>
                                <input type="text" name="suratdari" class="form-control">
                            </div>
                        </div>

                        <div class="row g-2 mt-2">
                            <div class="col">
                                <label class="form-label">Tanggal Surat</label>
                                <input type="date" name="tglsuratdari" class="form-control">
                            </div>
                            <div class="col" id="tgl_meninggal_div">
                                <label class="form-label">Tanggal Meninggal</label>
                                <input type="date" name="dodt" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Mohon</label>
                        <input type="date" name="tglmohon" class="form-control" required>
                    </div>
                </div>

                <!-- KANAN -->
                <div class="col-md-6">
                    <div class="row g-2">
                        <div class="col">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tgllahir"
                                value="{{ $peserta->tgllahir ? date('Y-m-d', strtotime($peserta->tgllahir)) : '' }}" readonly
                                class="form-control">
                        </div>
                        <div class="col">
                            <label class="form-label">Tgl Mulai Kerja</label>
                            <input type="date" name="tmtkeja"
                                value="{{ $peserta->tmtkeja ? date('Y-m-d', strtotime($peserta->tmtkeja)) : '' }}"
                                class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor SK Pensiun</label>
                        <input type="text" name="nosuratberhenti" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tgl Pensiun (TMP)</label>
                        <input type="date" name="tmtpensiun" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nomor Agenda DPSK</label>
                        <input type="text" name="noagendadpsk" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jenis Manfaat</label>
                        <select name="statusmanfaat" class="form-select form-control w-100">
                            <option value="Bulanan" selected>Bulanan</option>
                            <option value="100%">100% (Sekaligus)</option>
                            <option value="20%">20%</option>
                        </select>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Batas maksimum MP</label>
                        <input type="text" name="batasmp" value="2000000" class="form-control">
                    </div>
                </div>
            </div>

            <!-- Tombol Kembali dan Simpan di kanan -->
            <div class="d-flex justify-content-center align-items-center mt-4" style="gap:12px;">
                <a href="/pengajuanpensiun" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn text-white" style="background-color:#2994A4;">Simpan</button>
            </div>



        </form>

        <!-- HASIL SIMULASI -->
        <div id="hasilSimulasi" class="mt-4"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const select = document.getElementById('sk_tambahan');
            const formSection = document.getElementById('form_sk_tambahan');
            const tglMeninggalDiv = document.getElementById('tgl_meninggal_div');

            function toggleForm() {
                if (select.value === 'SK Kematian') {
                    formSection.classList.remove('d-none');
                    tglMeninggalDiv.classList.remove('d-none');
                } else if (select.value === 'SK Sakit') {
                    formSection.classList.remove('d-none');
                    tglMeninggalDiv.classList.add('d-none');
                } else {
                    formSection.classList.add('d-none');
                }
            }
            toggleForm();
            select.addEventListener('change', toggleForm);

            function konversiUsia(desimal) {
                const tahun = Math.floor(desimal);
                const bulan = Math.round((desimal - tahun) * 12);
                return {
                    tahun,
                    bulan
                };
            }

            const simulasiBtn = document.getElementById('btnSimulasi');
            const hasilDiv = document.getElementById('hasilSimulasi');

            simulasiBtn.addEventListener('click', function() {
                const tgllahir = document.querySelector('[name="tgllahir"]').value;
                const tmtkeja = document.querySelector('[name="tmtkeja"]').value;
                const tmtpensiun = document.querySelector('[name="tmtpensiun"]').value;
                const idanggota = document.querySelector('[name="idanggota"]').value;
                const dodt = document.querySelector('[name="dodt"]')?.value ?? "";

                if (!tgllahir || !tmtkeja || !tmtpensiun) {
                    alert("Harap isi Tanggal Lahir, TMT Kerja, dan Tanggal Pensiun terlebih dahulu!");
                    return;
                }

                const query = new URLSearchParams({
                    tgllahir,
                    tmtkeja,
                    tmtpensiun,
                    idanggota,
                    dodt
                });

                fetch(`/admin/simulasiView?${query.toString()}`)
                    .then(res => res.json())
                    .then(data => {
                        if (data.error) {
                            hasilDiv.innerHTML =
                                `<div class="alert alert-danger mt-2">${data.error}</div>`;
                            return;
                        }

                        const usiaPesertaObj = konversiUsia(data.usia);

                        hasilDiv.innerHTML = `
          <div class="card mt-3">
            <div class="card-header bg-teal text-white">
              Hasil Simulasi
            </div>
            <div class="card-body">
              <table class="table table-bordered mb-3">
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
                    <td class="text-center">${usiaPesertaObj.tahun} tahun ${usiaPesertaObj.bulan} bulan</td>
                  </tr>
                </tbody>
              </table>

              <h5>Jenis Manfaat</h5>
              <table class="table table-bordered">
                <thead class="table-light">
                  <tr>
                    <th>Jenis Manfaat</th>
                    <th>Perhitungan Manfaat</th>
                  </tr>
                </thead>
                <tbody>
                  <tr><td>MP</td><td>Rp ${new Intl.NumberFormat('id-ID').format(data.manfaat.MP)}</td></tr>
                  <tr><td>100%</td><td>Rp ${new Intl.NumberFormat('id-ID').format(data.manfaat["100%"])}</td></tr>
                  <tr><td>80%</td><td>Rp ${new Intl.NumberFormat('id-ID').format(data.manfaat["80%"])}</td></tr>
                  <tr><td>20%</td><td>Rp ${new Intl.NumberFormat('id-ID').format(data.manfaat["20%"])}</td></tr>
                </tbody>
              </table>
            </div>
          </div>
        `;
                    })
                    .catch(() => {
                        hasilDiv.innerHTML =
                            `<div class=sk"alert alert-danger mt-2">Terjadi kesalahan saat menghitung simulasi.</div>`;
                    });
            });
        });
    </script>
@endsection
