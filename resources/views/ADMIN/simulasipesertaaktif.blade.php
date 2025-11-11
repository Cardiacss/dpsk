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
                <input type="date" class="form-control" id="tanggallahir"
                    value="{{ $peserta->tgllahir ? $peserta->tgllahir->format('Y-m-d') : '' }}" readonly>
            </div>
        </div>

        <div class="form-group row mb-2">
            <label class="col-sm-3 col-form-label">Tanggal Mulai Kerja</label>
                <div class="col-sm-9">
            <input type="date" class="form-control" id="tanggalmulaikerja"
                value="{{ $peserta->tmtkeja ? $peserta->tmtkeja->format('Y-m-d') : '' }}" readonly>
        </div>
        
    </div>

    <hr>

    <div class="form-group row mb-2">
        <label class="col-sm-3 col-form-label">Surat Keterangan Tambahan</label>
        <div class="col-sm-9">
            <select class="form-control" id="suratketerangan">
                <option value="">Pilih jika ada</option>
                <option value="meninggal">Surat Meninggal</option>
                <option value="lainnya">Surat Cerai</option>
            </select>
        </div>
    </div>

    <hr>

    <div class="form-group row mb-3">
        <label class="col-sm-3 col-form-label">Rencana Penilaian</label>
        <div class="col-sm-9">
            <input type="date" class="form-control" id="rencanapenilaian">
        </div>
    </div>

    <div class="text-center mb-4">
        <button type="button" class="btn btn-info" onclick="simulasikan()">Simulasikan</button>
    </div>

    <hr id="garisSimulasi" style="display:none;">

    {{-- ✅ Hasil Simulasi --}}
    <div id="hasilSimulasi" style="display:none;">
        <h5>Hasil Simulasi</h5>
        <p>Masa Kerja: <span id="masaKerja"></span> tahun</p>
        <p>Pekerjaan Terakhir: <span id="pekerjaanTerakhir"></span></p>
        <p>Status Pensiun: <span id="statusPensiun"></span></p>
        <p>Pensiun pada: <span id="tanggalPensiun"></span></p>

        <table class="table table-bordered mt-3">
            <thead class="thead-light">
                <tr>
                    <th>Jenis Manfaat</th>
                    <th>Perhitungan Manfaat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>MP</td>
                    <td>100%</td>
                </tr>
                <tr>
                    <td>100%</td>
                    <td>Rp 2.000.000</td>
                </tr>
                <tr>
                    <td>20%</td>
                    <td>Rp 400.000</td>
                </tr>
                <tr>
                    <td>80%</td>
                    <td>Rp 1.600.000</td>
                </tr>
            </tbody>
        </table>

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
@endsection

@section('script')
    <script>
        function simulasikan() {
            document.getElementById('hasilSimulasi').style.display = 'block';
            document.getElementById('garisSimulasi').style.display = 'block';
        }
    </script>
@endsection