@extends('ADMIN.layouts.main')

@section('title', 'Edit Anggota Keluarga')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">Home</a> /
        <a href="/daftarpesertaadmin" style="text-decoration:none; color:#555;">Daftar Peserta</a> /
        <a href="{{ url('/tanggunganpesertaadmin/' . $peserta->idanggota) }}" style="text-decoration:none; color:#555;">
            Tanggungan Peserta
        </a> /
        <a href="{{ url('/editanggotaahliwarispesertaadmin/' . $keluarga->idkeluarga) }}"
            style="text-decoration:none; color:#2994A4;">
            Edit Anggota Ahli Waris
        </a>

    </p>
@endsection

@section('artikel')

    <form action="{{ route('keluarga.update', $keluarga->idkeluarga) }}" method="POST" class="mx-auto"
        style="max-width: 720px;">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="nm_keluarga" value="{{ old('nm_keluarga', $keluarga->nm_keluarga) }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Tempat Lahir</label>
            <input type="text" name="tempatlahir" value="{{ old('tempatlahir', $keluarga->tempatlahir) }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" name="tgllahir"
                value="{{ old('tgllahir', $keluarga->tgllahir ? \Carbon\Carbon::parse($keluarga->tgllahir)->format('Y-m-d') : '') }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select name="jeniskelamin" class="form-control">
                <option value="Pria" {{ old('jeniskelamin', $keluarga->jeniskelamin) == 'Pria' ? 'selected' : '' }}>Pria
                </option>
                <option value="Wanita" {{ old('jeniskelamin', $keluarga->jeniskelamin) == 'Wanita' ? 'selected' : '' }}>
                    Wanita</option>
            </select>
        </div>

<div class="mb-3">
    <label class="form-label">Hubungan</label>
    <select name="hubungan" class="form-control">
        <option value="Suami" {{ old('hubungan', $keluarga->hubungan) == 'Suami' ? 'selected' : '' }}>Suami</option>
        <option value="Istri" {{ old('hubungan', $keluarga->hubungan) == 'Istri' ? 'selected' : '' }}>Istri</option>
        <option value="Anak" {{ old('hubungan', $keluarga->hubungan) == 'Anak' ? 'selected' : '' }}>Anak</option>
    </select>
</div>
        <div class="mb-3">
            <label class="form-label">Pekerjaan</label>
            <input type="text" name="pekerjaan" value="{{ old('pekerjaan', $keluarga->pekerjaan) }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Status Hak Waris</label>
            <input type="text" name="statuswaris" value="{{ old('statuswaris', $keluarga->statuswaris) }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Status Hidup</label>
            <select name="statushidup" class="form-control">
                <option value="1" {{ old('statushidup', $keluarga->statushidup) == 1 ? 'selected' : '' }}>Hidup
                </option>
                <option value="0" {{ old('statushidup', $keluarga->statushidup) == 0 ? 'selected' : '' }}>Meninggal
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan_kel" class="form-control" rows="3">{{ old('keterangan_kel', $keluarga->keterangan_kel) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">No Surat Penunjukan Waris & Tgl (E2)</label>
            <input type="text" name="notunjukwaris" value="{{ old('notunjukwaris', $keluarga->notunjukwaris) }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">No Permohonan Waris & Tgl (E4)</label>
            <input type="text" name="nomohonwaris" value="{{ old('nomohonwaris', $keluarga->nomohonwaris) }}"
                class="form-control">
        </div>

        <div class="text-center mt-4">
            <a href="/daftarpesertaadmin" class="btn btn-secondary me-2">Kembali</a>
            <button type="submit" class="btn" style="background-color:#2994A4; color:white;">Simpan Perubahan</button>
        </div>
    </form>
@endsection
