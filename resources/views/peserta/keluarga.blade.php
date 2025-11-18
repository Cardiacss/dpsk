@extends('layouts.main')
@section('title',"Keluarga/Tanggungan/Waris")

@section('breadcrumb')
<p class="text-muted" style="font-size: 14px;">
    <a href="/peserta" style="text-decoration:none; color:#555;">Peserta</a> /
    <a href="/keluarga" style="text-decoration:none; color:#2994A4;">Keluarga</a>
</p>
@endsection

@section('artikel')
<div class="card">
    <div class="card-body">

        {{-- Tabs --}}
        <div class="keluarga-tabs">
        <ul class="nav nav-pills justify-content-center mb-4">
            <li class="nav-item">
                <a href="/peserta/detail" class="nav-link">Detail</a>
            </li>
            <li class="nav-item">
                <a href="/peserta/keluarga" class="nav-link active">Keluarga</a>
            </li>
            <li class="nav-item">
                <a href="/peserta/ahliwaris" class="nav-link">Ahli Waris</a>
            </li>
        </ul>
        </div>

        {{-- Informasi Peserta --}}
        <form class="row g-3 mb-4">
            <div class="col-md-4">
                <label class="form-label">Nomor Peserta</label>
                <input type="text" class="form-control" value="123456" disabled>
            </div>
            <div class="col-md-4">
                <label class="form-label">Nama Peserta</label>
                <input type="text" class="form-control" value="John Doe" disabled>
            </div>
            <div class="col-md-4">
                <label class="form-label">Status Nikah</label>
                <input type="text" class="form-control" value="Menikah" disabled>
            </div>
            <div class="col-md-6">
                <label class="form-label">Mitra / Pemberi Kerja</label>
                <input type="text" class="form-control" value="Yayasan Bopkri" disabled>
            </div>
            <div class="col-md-6">
                <label class="form-label">Unit Kerja</label>
                <input type="text" class="form-control" value="Bopkri 1" disabled>
            </div>
        </form>

        {{-- Button Tambah Keluarga --}}
        <div class="mb-3 text-end">
            <a href="/peserta/keluarga/tambahkeluarga" class="btn rounded-pill" style="background-color:#2994A4; color:white;">
                + Tambah Keluarga
            </a>
        </div>


        {{-- Tabel Anggota Keluarga --}}
        <div class="table-responsive">
            <table class="table table-bordered table-striped" style="border-radius: 10px; overflow: hidden; border-collapse: separate; border-spacing: 0;">
                <thead style="background-color:#2994A4; color:white;" class="text-center">
                    <tr>
                        <th>Nama Anggota Keluarga</th>
                        <th>Tempat / Tgl Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Hubungan</th>
                        <th>Status Hidup</th>
                        <th>Waris</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Herawati Rubiana</td>
                        <td>Yogyakarta / 1985-07-08</td>
                        <td>Wanita</td>
                        <td>Sedarah</td>
                        <td>Hidup</td>
                        <td>Ya</td>
                        <td class="text-center">
                            <a href="/peserta/keluarga/ubahkeluarga" class="btn btn-sm btn-warning">
                                    Ubah
                            </a>
                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusModal">
                                Hapus
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Modal -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content rounded-100 shadow"> <!-- rounded biar pojoknya melengkung -->
      <div class="modal-body text-center p-5">
        <p class="mb-4 fs-5">Yakin mau hapus data ini?</p>

        <div class="d-flex justify-content-center">
          <!-- tombol hapus -->
          <button type="button" class="btn btn-danger px-4 mx-2"
                  onclick="alert('Data berhasil dihapus (dummy).')"
                  data-dismiss="modal">
            Hapus
          </button>

          <!-- tombol batal -->
          <button type="button" class="btn btn-secondary px-4 mx-2" data-dismiss="modal">
            Batal
          </button>
        </div>
      </div>
    </div>
  </div>
</div>



        {{-- Tombol Cetak & Kembali --}}
        <div class="mt-4 text-center">
            <!-- Tombol Cetak di tengah -->
            <button class="btn mb-3" style="background-color:#2994A4; color:white;">
                Cetak Keluarga
            </button>

            <!-- Tombol Kembali di kiri dengan spasi ke bawah -->
        <div class="text-left">
            <a href="/peserta" class="btn" style="background-color:#2994A4; color:white;">
                Kembali
            </a>
        </div>
</div>


    </div>
</div>

{{-- Styling tambahan untuk tabs --}}
<style>
.keluarga-tabs .nav-link {
    border-radius: 50px;
    padding: 10px 20px;
    margin: 0 5px;
    color: #2994A4;
    border: 1px solid #2994A4;
    transition: 0.3s;
}
.keluarga-tabs .nav-link.active {
    background-color: #2994A4;
    color: white !important;
}
.keluarga-tabs .nav-link:hover {
    background-color: #e6f4f5;
}
</style>
@endsection
