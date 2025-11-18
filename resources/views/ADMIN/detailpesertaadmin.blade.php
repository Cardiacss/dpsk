@extends('ADMIN.layouts.main')

@section('title', 'Detail Peserta')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">Home</a> /
        <a href="/daftarpesertaadmin" style="text-decoration:none; color:#555;">Daftar Peserta</a> /
        <a href="{{ url('/detailpesertaadmin/' . $peserta->idanggota) }}" style="text-decoration:none; color:#2994A4;">
            Detail Peserta
        </a>
    </p>
@endsection


@section('artikel')
    <div class="card">
        <div class="card-body">

            {{-- Tabs --}}
            <div class="detail-tabs mb-4">
                <ul class="nav nav-pills justify-content-center" id="detailTab">
                    <li class="nav-item">
                        <a href="{{ url('/detailpesertaadmin/' . $peserta->idanggota) }}"
                            class="nav-link {{ request()->is('detailpesertaadmin/' . $peserta->idanggota) ? 'active' : '' }}">
                            Detail
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/tanggunganpesertaadmin/' . $peserta->idanggota) }}"
                            class="nav-link {{ request()->is('tanggunganpesertaadmin/' . $peserta->idanggota) ? 'active' : '' }}">
                            Tanggungan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('ahliwarispesertaadmin', ['idanggota' => $peserta->idanggota]) }}"
                            class="nav-link {{ request()->routeIs('ahliwarispesertaadmin') ? 'active' : '' }}">
                            Ahli Waris
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Detail Peserta --}}
            <div class="tab-content">
                <div class="tab-pane show active">
                    <form class="mx-auto" style="max-width: 900px;">
                        <div class="row">
                            {{-- Kolom Kiri --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Nomor Peserta</label>
                                    <input type="text" class="form-control" value="{{ $peserta->nopeserta }}" disabled>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Nama Peserta</label>
                                    <input type="text" class="form-control" value="{{ $peserta->nama }}" disabled>
                                </div>
                                <div class="form-group mb-3">
                                    <label>No KTP/Passport</label>
                                    <input type="text" class="form-control" value="{{ $peserta->id_num }}" disabled>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" value="{{ $peserta->tempatlahir }}"
                                        disabled>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Tanggal Lahir</label>
                                    <input type="text" class="form-control"
                                        value="{{ \Carbon\Carbon::parse($peserta->tgllahir)->format('d-m-Y') }}" disabled>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Jenis Kelamin</label>
                                    <input type="text" class="form-control" value="{{ $peserta->jeniskelamin }}"
                                        disabled>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Status Nikah</label>
                                    <input type="text" class="form-control" value="{{ $peserta->statusnikah }}"
                                        disabled>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Tanggal Perkawinan</label>
                                    <input type="text" class="form-control"
                                        value="{{ \Carbon\Carbon::parse($peserta->tglkawin)->format('d-m-Y') }}" disabled>
                                </div>
                            </div>

                            {{-- Kolom Kanan --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Alamat Lengkap</label>
                                    <input type="text" class="form-control" value="{{ $peserta->alamatterakhir }}"
                                        disabled>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Kelurahan</label>
                                    <input type="text" class="form-control" value="{{ $peserta->kelurahan }}" disabled>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Kecamatan</label>
                                    <input type="text" class="form-control" value="{{ $peserta->kecamatan }}" disabled>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Kota/Kabupaten</label>
                                    <input type="text" class="form-control" value="{{ $peserta->kotakab }}" disabled>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Provinsi</label>
                                    <input type="text" class="form-control" value="{{ $peserta->provinsi }}" disabled>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Jumlah Anak</label>
                                    <input type="text" class="form-control" value="{{ $peserta->jumlahanak }}" disabled>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Tanggal Pertama Iuran</label>
                                    <input type="text" class="form-control"
                                        value="{{ \Carbon\Carbon::parse($peserta->tmtiuran)->format('d-m-Y') }}" disabled>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Tanggal Disahkan</label>
                                    <input type="text" class="form-control"
                                        value="{{ \Carbon\Carbon::parse($peserta->tglsahpeserta)->format('d-m-Y') }}"
                                        disabled>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Status Kartu</label>
                                    <input type="text" class="form-control" value="{{ $peserta->statuspeserta }}"
                                        disabled>
                                </div>
                            </div>
                        </div>

                        {{-- Tombol --}}
                        <div class="text-end mt-4 text-center">
                            <a href="/daftarpesertaadmin" class="btn btn-secondary px-4 me-2">Kembali</a>
                            <a href="{{ route('peserta.cetakKartu', $peserta->idanggota) }}" class="btn px-4"
                                style="background-color:#2994A4; color:white;">
                                Cetak Kartu Peserta
                            </a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    {{-- Styling Tabs --}}
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

        .card {
            border-radius: 12px;
        }

        .btn-secondary {
            background-color: #999;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #777;
        }
    </style>
@endsection
