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

document.getElementById("btnSimulasi").addEventListener("click", function () {

    const data = {
        idanggota: document.getElementById("idanggota").value,
        tmtpensiun: document.getElementById("tmtpensiun").value,
        dodt: document.getElementById("dodt")?.value || '',
        batasmanfaatbulanan: document.getElementById("batasmanfaatbulanan").value,
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
                            <tr><th>Masa Kerja</th><td>${res.masa_kerja} </td></tr>
                            <tr><th>Usia</th><td>${res.usia}</td></tr>
                            <tr><th>Usia Pensiun</th><td>${res.usia_pensiun}</td></tr>
                            <tr><th>Status Perkawinan</th><td>${res.status_kawin}</td></tr>
                            <tr><th>Jenis Kelamin</th><td>${res.jenis_kelamin}</td></tr>
                            <tr><th>Pekerjaan Terakhir</th><td>${res.pkerjaanakhir}</td></tr>
                            <tr><th>MP</th><td><strong>Rp ${new Intl.NumberFormat('id-ID').format(res.manfaat.MP)}</strong></td></tr>
                            <tr><th>100%</th><td><strong>Rp ${new Intl.NumberFormat('id-ID').format(res.manfaat['100%'])}</strong></td></tr>
                            <tr><th>80%</th><td><strong>Rp ${new Intl.NumberFormat('id-ID').format(res.manfaat['80%'])}</strong></td></tr>
                            <tr><th>20%</th><td><strong>Rp ${new Intl.NumberFormat('id-ID').format(res.manfaat['20%'])}</strong></td></tr>
                        </table>
                    </div>
                </div>
            `;

        } else if (res.tipe === 'meninggal') {

            html = `
                <div class="card mt-4 shadow-sm">
                    <div class="card-header bg-danger text-white">
                        <h5 class="mb-0">⚰️ Simulasi Meninggal</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered mt-2">
                            <tbody>
                                <tr><th>Masa Kerja</th><td>${res.masakerja}</td></tr>
                                <tr><th>Usia Saat Pensiun</th><td>${res.usiapensiun}</td></tr>
                                <tr><th>Status Perkawinan</th><td>${res.status_kawin}</td></tr>
                                <tr><th>Jenis Kelamin</th><td>${res.jenis_kelamin}</td></tr>
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
                </div>
            `;
        }

        // Tambahkan hidden input + tombol modal
        html += `
            <input type="hidden" id="mp" value="${res.manfaat?.MP || ''}">
            <input type="hidden" id="manfaat100" value="${res.manfaat?.['100%'] || ''}">
            <input type="hidden" id="manfaat80" value="${res.manfaat?.['80%'] || ''}">
            <input type="hidden" id="manfaat20" value="${res.manfaat?.['20%'] || ''}">

            <div class="mt-3 row">
                <div class="col-md-4 mb-2">
                    <button class="btn btn-primary btn-sm w-100" data-toggle="modal" data-target="#modalPenawaran">
                        Cetak Penawaran Pensiun
                    </button>
                </div>
                <div class="col-md-4 mb-2">
                    <button class="btn btn-primary btn-sm w-100" data-toggle="modal" data-target="#modalPembuatanSK">
                        Cetak Data Pembuatan SK
                    </button>
                </div>
                <div class="col-md-4 mb-2">
                    <button class="btn btn-primary btn-sm w-100" data-toggle="modal" data-target="#modalCetakSK">
                        Cetak SK
                    </button>
                </div>
            </div>
        `;

        document.getElementById("hasilSimulasi").innerHTML = html;
    });
});

// ================== CETAK ==================

function cetakPenawaran() {
    const data = {
        idanggota: document.getElementById("idanggota").value,
        tmtpensiun: document.getElementById("tmtpensiun").value,
        dodt: document.getElementById("dodt")?.value || '',
        batasmanfaatbulanan: document.getElementById("batasmanfaatbulanan").value,
    };
    window.location.href = "/cetak-penawaran-pensiun?" + new URLSearchParams(data);
}

function cetakDataPembuatanSK() {
    const data = {
        idanggota: document.getElementById("idanggota").value,
        tmtpensiun: document.getElementById("tmtpensiun").value,
        dodt: document.getElementById("dodt")?.value || '',
        batasmanfaatbulanan: document.getElementById("batasmanfaatbulanan").value,
    };
    window.location.href = "/cetak-data-pembuatan-sk?" + new URLSearchParams(data);
}

function cetakSK() {
    const data = {
        idanggota: document.getElementById("idanggota").value,
        tmtpensiun: document.getElementById("tmtpensiun").value,
        dodt: document.getElementById("dodt")?.value || '',
        batasmanfaatbulanan: document.getElementById("batasmanfaatbulanan").value,
    };
    window.location.href = "/cetak-sk?" + new URLSearchParams(data);
}
</script>
    <div class="modal fade" id="modalPenawaran" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Informasi Tambahan</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Nomor Surat</label>
          <div class="col-sm-8">
            <input type="text" id="nomor_surat" class="form-control">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Jenis Manfaat</label>
          <div class="col-sm-8">
            <select id="jenis_manfaat" class="form-control">
              <option value="Sekaligus Sebagian">Sekaligus Sebagian</option>
              <option value="Sekaligus">Sekaligus</option>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Bulan Surat</label>
          <div class="col-sm-8">
            <select id="bulan_surat" class="form-control">
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

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Tahun Surat</label>
          <div class="col-sm-8">
            <input type="number" id="tahun_surat" class="form-control">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Alamat Tujuan</label>
          <div class="col-sm-8">
            <input type="text" id="alamat_tujuan" class="form-control">
          </div>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="submitPenawaranModal()">
          Cetak Penawaran Pensiun
        </button>
        <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
      </div>

    </div>
  </div>
</div>
<script>
function submitPenawaranModal() {
    let nomor = document.getElementById('nomor_surat').value;
    let manfaat = document.getElementById('jenis_manfaat').value;
    let bulan = document.getElementById('bulan_surat').value;
    let tahun = document.getElementById('tahun_surat').value;
    let alamat = document.getElementById('alamat_tujuan').value;

    const data = {
        idanggota: document.getElementById("idanggota").value,
        tmtpensiun: document.getElementById("tmtpensiun").value,
        dodt: document.getElementById("dodt")?.value || '',
        batasmanfaatbulanan: document.getElementById("batasmanfaatbulanan").value,

        // data popup
        nomor_surat: nomor,
        jenis_manfaat: manfaat,
        bulan_surat: bulan,
        tahun_surat: tahun,
        alamat_tujuan: alamat,

        // TAMBAHKAN INI
        mp: document.getElementById("mp").value,
        manfaat100: document.getElementById("manfaat100").value,
        manfaat80: document.getElementById("manfaat80").value,
        manfaat20: document.getElementById("manfaat20").value,
    };

    $('#modalPenawaran').modal('hide');

    window.location.href = `/cetak-penawaran-pensiun?` + new URLSearchParams(data);
}
</script>
<!-- Modal Data Pembuatan SK -->
<div class="modal fade" id="modalPembuatanSK" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Informasi Tambahan</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <div class="form-group row">
          <label class="col-sm-5 col-form-label">Surat Permohonan ybs tertanggal</label>
          <div class="col-sm-7">
            <input type="date" id="sk_permohonan" class="form-control">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-5 col-form-label">Tanggal Pengantar Surat</label>
          <div class="col-sm-7">
            <input type="date" id="sk_tgl_pengantar" class="form-control">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-5 col-form-label">Nomor Pengantar Surat</label>
          <div class="col-sm-7">
            <input type="text" id="sk_nomor_pengantar" class="form-control">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-5 col-form-label">Tanggal SK</label>
          <div class="col-sm-7">
            <input type="date" id="sk_tanggal" class="form-control">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-5 col-form-label">Nomor SK</label>
          <div class="col-sm-7">
            <input type="text" id="sk_nomor" class="form-control">
          </div>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="submitPembuatanSK()">
          Cetak Data Pembuatan SK
        </button>
        <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
      </div>

    </div>
  </div>
</div>
<script>
function submitPembuatanSK() {

    let dataTambahan = {
        sk_permohonan: document.getElementById('sk_permohonan').value,
        sk_tgl_pengantar: document.getElementById('sk_tgl_pengantar').value,
        sk_nomor_pengantar: document.getElementById('sk_nomor_pengantar').value,
        sk_tanggal: document.getElementById('sk_tanggal').value,
        sk_nomor: document.getElementById('sk_nomor').value,
    };

    // Data utama dari form simulasi
   const data = {
    idanggota: document.getElementById("idanggota").value,
    tmtpensiun: document.getElementById("tmtpensiun").value,
    dodt: document.getElementById("dodt")?.value || '',
    batasmanfaatbulanan: document.getElementById("batasmanfaatbulanan").value,

    mp: document.getElementById("mp").value,
    manfaat100: document.getElementById("manfaat100").value,
    manfaat80: document.getElementById("manfaat80").value,
    manfaat20: document.getElementById("manfaat20").value,

    ...dataTambahan
};

    // Tutup modal
    $('#modalPembuatanSK').modal('hide');

    // Redirect ke PDF
    window.location.href = `/cetak-data-pembuatan-sk?` + new URLSearchParams(data);
}
</script>
<!-- Modal Cetak SK -->
<div class="modal fade" id="modalCetakSK" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Informasi Tambahan</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <div class="form-group row">
          <label class="col-sm-5 col-form-label">Bulan Surat</label>
          <div class="col-sm-7">
            <select class="form-control" id="bulan_surat_sk">
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

        <div class="form-group row">
          <label class="col-sm-5 col-form-label">Nomor Surat</label>
          <div class="col-sm-7">
            <input type="text" id="nomor_surat_sk" class="form-control">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-5 col-form-label">Tahun Surat</label>
          <div class="col-sm-7">
            <input type="number" id="tahun_surat_sk" class="form-control" min="1900" max="2100">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-5 col-form-label">Anak-anak telah dewasa?</label>
          <div class="col-sm-7">
            <select id="anak_dewasa_sk" class="form-control">
              <option value="Belum">Belum</option>
              <option value="Sudah">Sudah</option>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-5 col-form-label">Jenis Manfaat</label>
          <div class="col-sm-7">
            <select id="jenis_manfaat_sk" class="form-control">
              <option value="Sekaligus">Sekaligus</option>
              <option value="Sekaligus_Sebagian">Sekaligus Sebagian</option>
              <option value="Bulanan">Bulanan</option>
            </select>
          </div>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-dark" onclick="submitCetakSK()">
          Cetak SK
        </button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>

    </div>
  </div>
</div> 
<script>
function submitCetakSK() {

    let tambahan = {
        bulan_surat: document.getElementById('bulan_surat_sk').value,
        nomor_surat: document.getElementById('nomor_surat_sk').value,
        tahun_surat: document.getElementById('tahun_surat_sk').value,
        anak_dewasa: document.getElementById('anak_dewasa_sk').value,
        jenis_manfaat: document.getElementById('jenis_manfaat_sk').value,
    };

    const data = {
        idanggota: document.getElementById("idanggota").value,
        tmtpensiun: document.getElementById("tmtpensiun").value,
        dodt: document.getElementById("dodt")?.value || '',
        batasmanfaatbulanan: document.getElementById("batasmanfaatbulanan").value,

        // 🔥 HASIL SIMULASI YANG SUDAH ADA
        mp: document.getElementById("mp").value,
        manfaat100: document.getElementById("manfaat100").value,
        manfaat80: document.getElementById("manfaat80").value,
        manfaat20: document.getElementById("manfaat20").value,

        ...tambahan
    };

    $('#modalCetakSK').modal('hide');

    window.location.href = `/cetak-sk?` + new URLSearchParams(data);
}

</script>
@endsection
