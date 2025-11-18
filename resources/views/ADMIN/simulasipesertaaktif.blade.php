@extends('ADMIN.layouts.main')

@section('title')
    Simulasi Kepersertaan dan Pemberian Manfaat
    <br>
    <small class="text-muted">Simulasi Peserta Aktif</small>
@endsection

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">

        <a href="/home" style="text-decoration:none; color:#555;">
            Home
        </a> /

        <a href="/simulasi" style="text-decoration:none; color:#555;">
            Simulasi
        </a> /

        <a href="{{ route('admin.simulasipesertaaktif', ['idanggota' => $peserta->idanggota]) }}"
            style="text-decoration: none; color: #29BFAF;">
            Simulasi Peserta Aktif
        </a>


    </p>
@endsection

@section('artikel')
    <hr>

    <h5 class="mb-3">Simulasi Calon Peserta</h5>
    <div class="container-fluid">
        {{-- Data Peserta --}}
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
                <input type="date" class="form-control" id="tgllahir" name="tgllahir"
                    value="{{ $peserta->tgllahir ? $peserta->tgllahir->format('Y-m-d') : '' }}" readonly>
            </div>
        </div>

        <div class="form-group row mb-2">
            <label class="col-sm-3 col-form-label">Tanggal Mulai Kerja</label>
            <div class="col-sm-9">
                <input type="date" class="form-control" id="tmtkeja" name="tmtkeja"
                    value="{{ $peserta->tmtkeja ? $peserta->tmtkeja->format('Y-m-d') : '' }}" readonly>
            </div>
        </div>

        <hr>

        {{-- Pilih Surat Keterangan --}}
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

        {{-- Form SK Meninggal --}}
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
                    <input type="date" id="dodt" name="dodt" class="form-control">
                </div>
            </div>
        </div>

        {{-- Form SK Sakit --}}
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

        <div class="form-group row mb-3">
            <label class="col-sm-3 col-form-label">Simulasi</label>
            <div class="col-sm-9">
                <button id="btnSimulasi" type="button" class="btn btn-block"
                    style="background-color:#2994A4; color:white;">
                    Jalankan Simulasi
                </button>
            </div>
        </div>


        <div id="hasilSimulasi" class="mt-4"></div>
    </div>

    <script>
        function tampilkanFormSurat() {
            const jenis = document.getElementById("suratketerangan").value;
            document.getElementById("formKematian").style.display = jenis === "meninggal" ? "block" : "none";
            document.getElementById("formSakit").style.display = jenis === "sakit" ? "block" : "none";
        }

        document.getElementById("btnSimulasi").addEventListener("click", function() {
            const idanggota = document.getElementById("idanggota").value;
            const tmtpensiun = document.getElementById("tmtpensiun").value;
            const batas = document.getElementById("batasmanfaatbulanan").value;
            const dodt = document.getElementById("dodt")?.value || '';

            const data = {
                idanggota: idanggota,
                tmtpensiun: tmtpensiun,
                dodt: dodt,
                batasmanfaatbulanan: batas,
                _token: "{{ csrf_token() }}"
            };

            fetch("{{ route('admin.simulasipesertaaktif.hitung') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify(data)
                })
                .then(res => res.json())
                .then(res => {
                    let html = '';
                    if (res.tipe === 'normal') {
                        html = `
                <div class="card mt-4 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">📘 Simulasi Normal (Tidak Meninggal)</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr><th>Masa Kerja</th><td>${res.masa_kerja} tahun</td></tr>
                            <tr><th>Usia</th><td>${res.usia} tahun</td></tr>
                            <tr><th>Usia Pensiun</th><td>${res.usia_pensiun} tahun</td></tr>
                            <tr><th>PHDP</th><td>Rp ${new Intl.NumberFormat('id-ID').format(res.phdp)}</td></tr>
                            <tr><th>Faktor Nilai (FNSS)</th><td>${res.fnss}</td></tr>
                            <tr><th>Pekerjaan Terakhir</th><td>${res.pkerjaanakhir}</td></tr>
<tr>
    <th>MP</th>
    <td><strong>Rp ${new Intl.NumberFormat('id-ID').format(res.manfaat.MP)}</strong></td>
</tr>
<tr>
    <th>100%</th>
    <td><strong>Rp ${new Intl.NumberFormat('id-ID').format(res.manfaat['100%'])}</strong></td>
</tr>
<tr>
    <th>80%</th>
    <td><strong>Rp ${new Intl.NumberFormat('id-ID').format(res.manfaat['80%'])}</strong></td>
</tr>
<tr>
    <th>20%</th>
    <td><strong>Rp ${new Intl.NumberFormat('id-ID').format(res.manfaat['20%'])}</strong></td>
</tr>
                        </table>
                    </div>
                </div>`;
                    } else if (res.tipe === 'meninggal') {
                        html = `
                <div class="card mt-4 shadow-sm">
                    <div class="card-header bg-danger text-white">
                        <h5 class="mb-0">⚰️ Simulasi Meninggal</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered mt-2">
                            <tbody>
                                <tr><th>Masa Kerja</th><td>${res.masakerja} tahun</td></tr>
                                <tr><th>Usia Saat Pensiun</th><td>${res.usiapensiun} tahun</td></tr>
                                <tr><th>Status Pensiun</th><td>${res.statuspensiun}</td></tr>
                                <tr><th>Pekerjaan Terakhir</th><td>${res.pekerjaan_terakhir}</td></tr>
                                <tr class="table-secondary">
                                    <th>Manfaat Bulanan</th>
                                    <td><strong>Rp ${new Intl.NumberFormat('id-ID').format(res.batasmanfaatbulanan)}</strong></td>
                                </tr>
                                <tr class="table-success">
                                    <th>MP 60%</th>
                                    <td><strong style="font-size: 18px;">Rp ${new Intl.NumberFormat('id-ID').format(res.mp)}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>`;
                    }
                    document.getElementById("hasilSimulasi").innerHTML = html;
                });
        });

        function cetakPenawaran() {
            const data = {
                idanggota: document.getElementById("idanggota").value,
                tmtpensiun: document.getElementById("tmtpensiun").value,
                dodt: document.getElementById("dodt")?.value || '',
                batasmanfaatbulanan: document.getElementById("batasmanfaatbulanan").value,
                _token: "{{ csrf_token() }}"
            };
            window.location.href = `/cetak-penawaran-pensiun?` + new URLSearchParams(data);
        }
    </script>
@endsection
