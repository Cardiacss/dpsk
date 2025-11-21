@extends('ADMIN.layouts.main')

@section('title', 'Tambah Anggota Keluarga')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">Home</a> /
        <a href="/daftarpesertaadmin" style="text-decoration:none; color:#555;">Daftar Peserta</a> /
        <a href="{{ url('/tanggunganpesertaadmin/' . $peserta->idanggota) }}" style="text-decoration:none; color:#555;"> 
            Tanggungan Peserta 
        </a> /
         <a href="{{ url('/tambahkeluarga/' . $peserta->idanggota) }}" style="text-decoration:none; color:#2994A4;">
            Tambah Anggota Keluarga 
        </a>
    </p>
@endsection

@section('artikel')
    <form action="{{ route('keluarga.store') }}" method="POST" class="mx-auto" style="max-width: 720px;">
        @csrf
        <input type="hidden" name="idanggota" value="{{ $peserta->idanggota }}">

        <div class="row g-3">
            <div class="col-md-6 d-flex flex-column">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nm_keluarga" class="form-control flex-grow-1" required>
            </div>

            <div class="col-md-6 d-flex flex-column">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" name="tempatlahir" class="form-control flex-grow-1">
            </div>

            <div class="col-md-6 d-flex flex-column">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tgllahir" class="form-control flex-grow-1">
            </div>

            <div class="col-md-6 d-flex flex-column">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jeniskelamin" class="form-select flex-grow-1">
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
            </div>

<div class="col-md-6 d-flex flex-column">
    <label class="form-label">Hubungan</label>
    <select name="hubungan" class="form-control flex-grow-1">
        <option value="Suami">Suami</option>
        <option value="Istri">Istri</option>
        <option value="Anak">Anak</option>
    </select>
</div>

            <div class="col-md-6 d-flex flex-column">
                <label class="form-label">Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control flex-grow-1">
            </div>

            <div class="col-md-6 d-flex flex-column">
                <label class="form-label">Status Hak Waris</label>
                <input type="text" name="statuswaris" class="form-control flex-grow-1">
            </div>

            <div class="col-md-6 d-flex flex-column">
                <label class="form-label">Status Hidup</label>
                <select name="statushidup" class="form-select flex-grow-1">
                    <option value="Hidup">Hidup</option>
                    <option value="Meninggal">Meninggal</option>
                </select>
            </div>

            <div class="col-12 d-flex flex-column">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan_kel" class="form-control flex-grow-1"></textarea>
            </div>

            <div class="col-md-6 d-flex flex-column">
                <label class="form-label">No Surat Penunjukan Waris & Tgl (E2)</label>
                <input type="text" name="notunjukwaris" class="form-control flex-grow-1">
            </div>

            <div class="col-md-6 d-flex flex-column">
                <label class="form-label">No Permohonan Waris & Tgl (E4)</label>
                <input type="text" name="nomohonwaris" class="form-control flex-grow-1">
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-secondary me-2">Kembali</a>
            <button type="submit" class="btn" style="background-color:#2994A4; color:white;">Simpan</button>
        </div>

    </form>
@endsection
