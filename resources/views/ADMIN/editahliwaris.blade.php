@extends('ADMIN.layouts.main')

@section('title', 'Edit Anggota Keluarga / Waris')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="/daftarpesertaadmin" style="text-decoration:none; color:#555;">Peserta</a> /
        <a href="{{ url('/detailpesertaadmin/' . $peserta->idanggota) }}" style="text-decoration:none; color:#555;">Lihat Detail</a> /
        <a href="{{ url('/tanggunganpesertaadmin/' . $peserta->idanggota) }}" style="text-decoration:none; color:#555;">Tanggungan</a> /
        <span style="color:#2994A4;">Edit Anggota</span>
    </p>
@endsection

@section('artikel')

<div class="card p-4" style="max-width: 750px; margin:auto;">
    <h4 class="text-center mb-4" style="color:#2994A4;">Edit Anggota Keluarga</h4>

<form action="{{ route('ahliwaris.update', $keluarga->idkeluarga) }}" method="POST">
    @csrf
        @method('PUT')

        <input type="hidden" name="idanggota" value="{{ $peserta->idanggota }}">

        {{-- Nama Lengkap --}}
        <div class="form-group mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nm_keluarga" class="form-control"
                value="{{ old('nm_keluarga', $keluarga->nm_keluarga) }}" required>
        </div>

        {{-- Tempat Lahir --}}
        <div class="form-group mb-3">
            <label>Tempat Lahir</label>
            <input type="text" name="tempatlahir" class="form-control"
                value="{{ old('tempatlahir', $keluarga->tempatlahir) }}">
        </div>

        {{-- Tanggal Lahir --}}
        <div class="form-group mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgllahir" class="form-control"
                value="{{ old('tgllahir', $keluarga->tgllahir ? \Carbon\Carbon::parse($keluarga->tgllahir)->format('Y-m-d') : '') }}">
        </div>

        {{-- Jenis Kelamin --}}
        <div class="form-group mb-3">
            <label>Jenis Kelamin</label>
            <select name="jeniskelamin" class="form-control">
                <option value="Pria" {{ old('jeniskelamin', $keluarga->jeniskelamin) == 'Pria' ? 'selected' : '' }}>Pria</option>
                <option value="Wanita" {{ old('jeniskelamin', $keluarga->jeniskelamin) == 'Wanita' ? 'selected' : '' }}>Wanita</option>
            </select>
        </div>

        {{-- Hubungan --}}
        <div class="form-group mb-3">
            <label>Hubungan</label>
            <select name="hubungan" class="form-control">
                <option value="Suami" {{ old('hubungan', $keluarga->hubungan) == 'Suami' ? 'selected' : '' }}>Suami</option>
                <option value="Istri" {{ old('hubungan', $keluarga->hubungan) == 'Istri' ? 'selected' : '' }}>Istri</option>
                <option value="Anak" {{ old('hubungan', $keluarga->hubungan) == 'Anak' ? 'selected' : '' }}>Anak</option>
                <option value="Lainnya" {{ old('hubungan', $keluarga->hubungan) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
        </div>

        {{-- Pekerjaan --}}
        <div class="form-group mb-3">
            <label>Pekerjaan</label>
            <input type="text" name="pekerjaan" class="form-control"
                value="{{ old('pekerjaan', $keluarga->pekerjaan) }}">
        </div>

        {{-- Status Hak Waris --}}
        <div class="form-group mb-3">
            <label>Status Hak Waris</label>
            <select name="statuswaris" class="form-control">
                <option value="Yes" {{ old('statuswaris', $keluarga->statuswaris) == 'Yes' ? 'selected' : '' }}>Yes</option>
                <option value="No" {{ old('statuswaris', $keluarga->statuswaris) == 'No' ? 'selected' : '' }}>No</option>
            </select>
        </div>

        {{-- Status Hidup --}}
        <div class="form-group mb-3">
            <label>Status Hidup</label>
            <select name="statushidup" class="form-control">
                <option value="Hidup" {{ old('statushidup', $keluarga->statushidup) == 'Hidup' ? 'selected' : '' }}>Hidup</option>
                <option value="Meninggal" {{ old('statushidup', $keluarga->statushidup) == 'Meninggal' ? 'selected' : '' }}>Meninggal</option>
            </select>
        </div>

        {{-- Keterangan --}}
        <div class="form-group mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan_kel" class="form-control" rows="2">{{ old('keterangan_kel', $keluarga->keterangan_kel) }}</textarea>
        </div>

        {{-- Nomor E2 --}}
        <div class="form-group mb-3">
            <label>No Surat Penunjukan Waris & Tgl (E2)</label>
            <input type="text" name="notunjukwaris" class="form-control"
                value="{{ old('notunjukwaris', $keluarga->notunjukwaris) }}">
        </div>

        {{-- Nomor E4 --}}
        <div class="form-group mb-3">
            <label>No Permohonan Waris & Tgl (E4)</label>
            <input type="text" name="nomohonwaris" class="form-control"
                value="{{ old('nomohonwaris', $keluarga->nomohonwaris) }}">
        </div>

        {{-- Tombol --}}
        <div class="text-center mt-4">
            <a href="{{ url('/tanggunganpesertaadmin/' . $peserta->idanggota) }}"
                class="btn btn-secondary px-4">Kembali</a>

            <button type="submit" class="btn px-4" style="background-color:#2994A4; color:white;">
                Simpan Perubahan
            </button>
        </div>

    </form>
</div>

<style>
    .card {
        border-radius: 14px;
    }
    label {
        font-weight: 600;
    }
</style>

@endsection