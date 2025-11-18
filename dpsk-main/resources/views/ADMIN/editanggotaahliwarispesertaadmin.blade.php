@extends('ADMIN.layouts.main')

@section('title', 'Edit Anggota Keluarga / Waris')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="/daftarpesertaadmin" style="text-decoration:none; color:#555;">Peserta</a> /
        <a href="{{ url('/detailpesertaadmin/' . $peserta->idanggota) }}" style="text-decoration:none; color:#555;">Lihat
            Detail</a> /
        <a href="{{ url('/tanggunganpesertaadmin/' . $peserta->idanggota) }}"
            style="text-decoration:none; color:#555;">Tanggungan</a> /
        <span style="color:#2994A4;">Edit Anggota</span>
    </p>
@endsection

@section('artikel')
    <div class="card">
        <div class="card-body">

            {{-- Form Edit Anggota --}}
            <div class="tab-content">
                <div class="tab-pane show active">

                    <form action="{{ route('keluarga.update', $keluarga->idkeluarga) }}" method="POST" class="mx-auto"
                        style="max-width: 900px;">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="idanggota" value="{{ $peserta->idanggota }}">

                        <div class="row">
                            {{-- Kolom Kiri --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nm_keluarga" class="form-control"
                                        value="{{ old('nm_keluarga', $keluarga->nm_keluarga) }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Tempat Lahir</label>
                                    <input type="text" name="tempatlahir" class="form-control"
                                        value="{{ old('tempatlahir', $keluarga->tempatlahir) }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="tgllahir" class="form-control"
                                        value="{{ old('tgllahir', $keluarga->tgllahir ? \Carbon\Carbon::parse($keluarga->tgllahir)->format('Y-m-d') : '') }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Jenis Kelamin</label>
                                    <select name="jeniskelamin" class="form-control">
                                        <option value="Pria"
                                            {{ old('jeniskelamin', $keluarga->jeniskelamin) == 'Pria' ? 'selected' : '' }}>
                                            Pria</option>
                                        <option value="Wanita"
                                            {{ old('jeniskelamin', $keluarga->jeniskelamin) == 'Wanita' ? 'selected' : '' }}>
                                            Wanita</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Hubungan</label>
                                    <input type="text" name="hubungan" class="form-control"
                                        value="{{ old('hubungan', $keluarga->hubungan) }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Pekerjaan</label>
                                    <input type="text" name="pekerjaan" class="form-control"
                                        value="{{ old('pekerjaan', $keluarga->pekerjaan) }}">
                                </div>
                            </div>

                            {{-- Kolom Kanan --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Status Hak Waris</label>
                                    <input type="text" name="statuswaris" class="form-control"
                                        value="{{ old('statuswaris', $keluarga->statuswaris) }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Status Hidup</label>
                                    <select name="statushidup" class="form-control">
                                        <option value="1"
                                            {{ old('statushidup', $keluarga->statushidup) == 1 ? 'selected' : '' }}>Hidup
                                        </option>
                                        <option value="0"
                                            {{ old('statushidup', $keluarga->statushidup) == 0 ? 'selected' : '' }}>
                                            Meninggal</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label>No Surat Penunjukan Waris &amp; Tgl (E2)</label>
                                    <input type="text" name="notunjukwaris" class="form-control"
                                        value="{{ old('notunjukwaris', $keluarga->notunjukwaris) }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>No Permohonan Waris &amp; Tgl (E4)</label>
                                    <input type="text" name="nomohonwaris" class="form-control"
                                        value="{{ old('nomohonwaris', $keluarga->nomohonwaris) }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Keterangan</label>
                                    <textarea name="keterangan_kel" class="form-control">{{ old('keterangan_kel', $keluarga->keterangan_kel) }}</textarea>
                                </div>
                            </div>
                        </div>

                        {{-- Tombol --}}
                        <div class="text-end mt-4">
                            <a href="{{ url('/tanggunganpesertaadmin/' . $peserta->idanggota) }}"
                                class="btn btn-secondary px-4 me-2">Kembali</a>
                            <button type="submit" class="btn px-4" style="background-color:#2994A4; color:white;">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    {{-- Styling --}}
    <style>
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
