@extends('ADMIN.layouts.main')

@section('title', 'Tambah Anggota Keluarga / Waris')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="/daftarpesertaadmin" style="text-decoration:none; color:#555;">Peserta</a> /
        <a href="{{ url('/detailpesertaadmin/' . $peserta->idanggota) }}" style="text-decoration:none; color:#555;">Lihat
            Detail</a> /
        <a href="{{ url('/tanggunganpesertaadmin/' . $peserta->idanggota) }}"
            style="text-decoration:none; color:#555;">Tanggungan</a> /
        <span style="color:#2994A4;">Tambah Anggota</span>
    </p>
@endsection

@section('artikel')
    <div class="card">
        <div class="card-body">


            {{-- Form Tambah Anggota --}}
            <div class="tab-content">
                <div class="tab-pane show active">

                    <form action="{{ route('keluarga.store') }}" method="POST" class="mx-auto" style="max-width: 900px;">
                        @csrf
                        <input type="hidden" name="idanggota" value="{{ $peserta->idanggota }}">

                        <div class="row">
                            {{-- Kolom Kiri --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nm_keluarga" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Tempat Lahir</label>
                                    <input type="text" name="tempatlahir" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="tgllahir" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Jenis Kelamin</label>
                                    <select name="jeniskelamin" class="form-control">
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Hubungan</label>
                                    <input type="text" name="hubungan" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Pekerjaan</label>
                                    <input type="text" name="pekerjaan" class="form-control">
                                </div>
                            </div>

                            {{-- Kolom Kanan --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Status Hak Waris</label>
                                    <input type="text" name="statuswaris" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Status Hidup</label>
                                    <select name="statushidup" class="form-control">
                                        <option value="Hidup">Hidup</option>
                                        <option value="Meninggal">Meninggal</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label>No Surat Penunjukan Waris &amp; Tgl (E2)</label>
                                    <input type="text" name="notunjukwaris" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label>No Permohonan Waris &amp; Tgl (E4)</label>
                                    <input type="text" name="nomohonwaris" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Keterangan</label>
                                    <textarea name="keterangan_kel" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        {{-- Tombol --}}
                        <div class="text-end mt-4">
                            <a href="{{ url('/tanggunganpesertaadmin/' . $peserta->idanggota) }}"
                                class="btn btn-secondary px-4 me-2">Kembali</a>
                            <button type="submit" class="btn px-4" style="background-color:#2994A4; color:white;">
                                Simpan
                            </button>
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
