@extends('layouts.main')
@section('title',"Ahli Waris")

@section('breadcrumb')
<p class="text-muted" style="font-size: 14px;">
    <a href="/peserta" style="text-decoration:none; color:#555;">Peserta</a> /
    <a href="/ahliwaris" style="text-decoration:none; color:#2994A4;">Ahli Waris</a>
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
          <a href="/peserta/keluarga" class="nav-link">Keluarga</a>
        </li>
        <li class="nav-item">
          <a href="/peserta/ahliwaris" class="nav-link active">Ahli Waris</a>
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
      <div class="col-md-4">
        <label class="form-label">Mitra / Pemberi Kerja</label>
        <input type="text" class="form-control" value="Yayasan Bopkri" disabled>
      </div>
      <div class="col-md-4">
        <label class="form-label">Unit Kerja</label>
        <input type="text" class="form-control" value="Bopkri 1" disabled>
      </div>
      <div class="col-md-4">
        <label class="form-label">Status Waris</label>
        <input type="text" class="form-control" value="Ya" disabled>
      </div>
    </form>

    {{-- Tabel Ahli Waris --}}
    <div class="table-responsive">
      <table class="table table-bordered table-striped text-center" style="border-radius: 10px; overflow: hidden; border-collapse: separate; border-spacing: 0; text-center">
        <thead style="background-color:#2994A4; color:white;">
          <tr>
            <th>Nama Lengkap</th>
            <th>Tempat / Tgl Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Hubungan</th>
            <th>Pekerjaan</th>
            <th>Tanggal</th>
            <th>Nomor Surat</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Maria Yuliana</td>
            <td>Yogyakarta / 1990-01-15</td>
            <td>Wanita</td>
            <td>Istri</td>
            <td>Guru</td>
            <td>2025-01-10</td>
            <td>AR-123/2025</td>
            <td>
              <a href="/peserta/ahliwaris/ubahahliwaris" class="btn btn-sm btn-warning">Ubah</a>
              <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusModal">Hapus</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    {{-- Tombol Kembali --}}
    <div class="mt-4 text-left">
      <a href="/peserta" class="btn" style="background-color:#2994A4; color:white;">
        Kembali
      </a>
    </div>

  </div>
</div>

{{-- Modal Hapus --}}
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered" role="document">
    <div class="modal-content rounded-3">
      <div class="modal-body text-center p-4">
        <p class="mb-4">Yakin mau hapus data ini?</p>
        <div class="d-flex justify-content-center">
          <button type="button" class="btn btn-danger px-4 mx-2" onclick="alert('Data berhasil dihapus (dummy).')" data-dismiss="modal">Hapus</button>
          <button type="button" class="btn btn-secondary px-4 mx-2" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Styling Tabs --}}
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
