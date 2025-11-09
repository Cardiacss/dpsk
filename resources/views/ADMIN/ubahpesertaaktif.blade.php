@extends('ADMIN.layouts.main')
@section('title', "Ubah Peserta Aktif")

@section('artikel')
<div class="container d-flex justify-content-center mt-5">
    <div style="width: 100%; max-width: 700px;">
        <a href="{{ url()->previous() }}" class="btn btn-sm mb-3" style="background-color:#2994A4; color:white;">Kembali</a>

        <form method="POST" action="{{ route('admin.pensiun.update', $pensiun->idanggota) }}">
            @csrf
            <div class="form-group mb-3">
                <label>Nomor Peserta</label>
                <input type="text" name="nopensiun" class="form-control" value="{{ $pensiun->nopensiun }}">
            </div>

            <div class="form-group mb-3">
                <label>Nama Peserta</label>
                <input type="text" name="nama" class="form-control" value="{{ $pensiun->nama }}">
            </div>

            <div class="form-group mb-3">
                <label>Tanggal Mohon</label>
                <input type="date" name="tglmohon" class="form-control" value="{{ $pensiun->tglmohon ? $pensiun->tglmohon->format('Y-m-d') : '' }}">
            </div>

            <div class="form-group mb-3">
                <label>Terhitung Mulai Tanggal</label>
                <input type="date" name="tmtpensiun" class="form-control" value="{{ $pensiun->tmtpensiun ? $pensiun->tmtpensiun->format('Y-m-d') : ''  }}">
            </div>

            <div class="form-group mb-3">
                <label>No Surat Berhenti</label>
                <input type="text" name="nosuratberhanti" class="form-control" value="{{ $pensiun->nosuratberhenti }}">
            </div>

            <div class="form-group mb-3">
                <label>Status Pensiun</label>
                <input type="text" name="statuspensiun" class="form-control" value="{{ $pensiun->statuspensiun }}">
            </div>

            <div class="form-group mb-3">
                <label>Status Manfaat</label>
                <input type="text" name="statusmanfaat" class="form-control" value="{{ $pensiun->statusmanfaat }}">
            </div>

            <div class="form-group mb-3">
                <label>Pensiun</label>
                <input type="text" name="pensiun" class="form-control" value="{{ $pensiun->pensiun }}">
            </div>

<div class="form-group mb-3">
    <label>Status Hidup</label>
    <select name="statushidup" class="form-control">
        <option value="1" {{ $pensiun->statushidup == 1 ? 'selected' : '' }}>Hidup</option>
        <option value="0" {{ $pensiun->statushidup == 0 ? 'selected' : '' }}>Meninggal</option>
    </select>
</div>

            <div class="form-group mb-3">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="{{ $pensiun->keterangan }}">
            </div>

            <hr>
            <h6><strong>Manfaat</strong></h6>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Pertama Terima Pada</label>
                    <input type="text" name="pertama_terima" class="form-control" value="{{ $pensiun->pertama_terima }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Terakhir Terima Pada</label>
                    <input type="text" name="terakhir_terima" class="form-control" value="{{ $pensiun->terakhir_terima }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Besaran Manfaat Terakhir</label>
                    <input type="text" name="besaran_manfaat" class="form-control" value="{{ $pensiun->besaran_manfaat }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Rekening</label>
                    <input type="text" name="rekening" class="form-control" value="{{ $pensiun->rekening }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Jenis Manfaat</label>
                    <input type="text" name="jenis_manfaat" class="form-control" value="{{ $pensiun->jenis_manfaat }}">
                </div>
            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn" style="background-color:#2994A4; color:white;">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
