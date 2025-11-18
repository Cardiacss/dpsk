@extends('layouts.main')

@section('title', "Detail Peserta")

@section('breadcrumb')
<p class="text-muted" style="font-size: 14px;">
    <a href="/peserta" style="text-decoration:none; color:#555;">Peserta</a> /
    <a href="/detail" style="text-decoration:none; color:#2994A4;">Detail Peserta</a>
</p>
@endsection

@section('artikel')
<div class="card">
    <div class="card-body">

        {{-- Tabs (Pills Style) --}}
        <div class="detail-tabs">
            <ul class="nav nav-pills justify-content-center mb-4" id="detailTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail" type="button" role="tab">
                        Detail

                    </button>
                </li>
                <li class="nav-item">
                    <a href="/peserta/keluarga" class="nav-link {{ $key == 'keluarga' ? 'active' : '' }}">
                    Keluarga
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/peserta/ahliwaris" class="nav-link {{ $key == 'ahliwaris' ? 'active' : '' }}">
                    Ahli Waris
                    </a>
                </li>
            </ul>
        </div>

        {{-- Isi Tab --}}
        <div class="tab-content" id="detailTabContent">

            {{-- Tab Detail --}}
            <div class="tab-pane fade show active" id="detail" role="tabpanel">
                <form class="mx-auto" style="max-width:900px;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Nomor Peserta</label>
                                <input type="text" class="form-control" value="123456789" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label>Nama Peserta</label>
                                <input type="text" class="form-control" value="John Doe" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" value="Jakarta" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label>No KTP/Passport</label>
                                <input type="text" class="form-control" value="987654321" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label>Jenis Kelamin</label>
                                <input type="text" class="form-control" value="Laki-laki" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" value="1990-01-01" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label>Alamat Lengkap</label>
                                <input type="text" class="form-control" value="Jl. Merdeka No. 10" disabled>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Kelurahan</label>
                                <input type="text" class="form-control" value="Cempaka Putih" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label>Kota</label>
                                <input type="text" class="form-control" value="Jakarta" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label>Status Nikah</label>
                                <input type="text" class="form-control" value="Menikah" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label>Tanggal Perkawinan</label>
                                <input type="date" class="form-control" value="2015-06-15" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label>Jumlah Anak</label>
                                <input type="number" class="form-control" value="2" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label>Tanggal Pertama Iuran</label>
                                <input type="date" class="form-control" value="2020-01-01" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label>Tanggal Disahkan</label>
                                <input type="date" class="form-control" value="2020-02-01" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label>Status Kartu</label>
                                <input type="text" class="form-control" value="Aktif" disabled>
                            </div>
                        </div>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="d-flex justify-content-between mt-4">
                        <a href="/peserta" class="btn" style="background-color:#2994A4; color:white;">
                            Kembali
                        </a>
                        <button type="button" class="btn" style="background-color:#2994A4; color:white;">
                            Cetak Kartu Peserta
                        </button>
                    </div>
                </form>
            </div>

            {{-- Tab Keluarga --}}
            <div class="tab-pane fade" id="keluarga" role="tabpanel">
                <p class="text-center mt-3">Data keluarga akan ditampilkan di sini.</p>
            </div>

            {{-- Tab Ahli Waris --}}
            <div class="tab-pane fade" id="ahliwaris" role="tabpanel">
                <p class="text-center mt-3">Data ahli waris akan ditampilkan di sini.</p>
            </div>

        </div>
    </div>
</div>

{{-- Styling tambahan untuk tabs --}}
<style>
.detail-tabs .nav-link {
    border-radius: 50px;
    padding: 10px 20px;
    margin: 0 5px;
    color: #2994A4;
    border: 1px solid #2994A4;
    transition: 0.3s;
}
.detail-tabs .nav-link.active {
    background-color: #2994A4;
    color: white !important;
}
.detail-tabs .nav-link:hover {
    background-color: #e6f4f5;
}
</style>
@endsection
