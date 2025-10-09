@extends('layouts.main')
@section('title',"Daftar Peserta")

@section('artikel')
    {{-- Alert notifikasi (contoh) --}}
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Peserta berhasil ditambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    {{-- Tombol tambah peserta --}}
    <div class="mb-3">
        <a href="/peserta/tambahpeserta" class="btn btn-success rounded">
            <i class="bi bi-plus-circle"></i> Tambah Peserta
        </a>
    </div>

    {{-- Form pencarian --}}
    <form action="#" method="GET" class="form-inline mb-3">
        <input type="text" class="form-control mr-2" style="width:1270px;" placeholder="Cari nama atau nomor peserta">
        <button type="submit" class="btn btn-primary"  style="background-color:#2994A4">
            <i class="bi bi-search"></i> Cari Peserta
        </button>
    </form>

    {{-- Tabel peserta (frontend only) --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped" style="border-radius: 10px; overflow: hidden; border-collapse: separate; border-spacing: 0;">
            <thead style="background-color:#2994A4; color:white;">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nomor Peserta</th>
                    <th class="text-center">Nama Peserta</th>
                    <th class="text-center">Mitra</th>
                    <th class="text-center">Unit</th>
                    <th class="text-center">Status Kartu</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- Baris dummy (contoh) --}}
                <tr>
                    <td>1</td>
                    <td>123</td>
                    <td>Filbert Ivan</td>
                    <td>Yayasan</td>
                    <td>Bopkri 1</td>
                    <td>Belum Tercetak</td>
                    <td class="text-center">
                        <a href="/peserta/detail" class="btn btn-info btn-sm">
                            <i class="bi bi-eye"></i>Detail
                        </a>
                        <a href="peserta/ubahpeserta" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i> Ubah
                        </a>
                        <button class="btn btn-danger" btn-sm data-toggle="modal" data-target="#hapusModal">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </td>
                </tr>

                {{-- Baris kosong (kalau tidak ada data) --}}
                <tr>
                    <td colspan="7" class="text-center">Belum ada data peserta</td>
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
@endsection
