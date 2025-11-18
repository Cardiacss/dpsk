@extends('ADMIN.layouts.main')

@section('title', 'Edit Mitra Admin')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">Home</a> /
        <a href="/mitradansekolahadmin" style="text-decoration:none; color:#555;">Mitra dan Sekolah</a> /
        <a href="{{ url('/listmitraadmin/' . $mitra->idunit) }}" style="text-decoration:none; color:#555;">List Mitra</a> /
        <a href="{{ url('/mitra/edit/' . $mitra->idmitra) }}" style="text-decoration:none; color:#2994A4;">
            Edit Mitra
        </a>
    </p>
@endsection




@section('artikel')

    <div class="d-flex justify-content-center">
        <form action="{{ route('mitra.update', $mitra->idmitra) }}" method="POST" style="width:100%; max-width:700px;">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">ID Mitra</label>
                <input type="text" name="idunit" value="{{ $mitra->idunit }}" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Mitra</label>
                <input type="text" name="nama_um" value="{{ $mitra->nama_um }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat_um" value="{{ $mitra->alamat_um }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Kecamatan</label>
                <input type="text" name="kecamatan" value="{{ $mitra->kecamatan }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Kota/Kab</label>
                <input type="text" name="kotakab" value="{{ $mitra->kotakab }}" class="form-control">
            </div>

            <div class="d-flex justify-content-center mt-3" style="gap: 1rem;">
                <a href="{{ route('listmitraadmin', $mitra->idunit) }}" class="btn btn-secondary">Kembali</a>

                <button type="submit" class="btn text-white" style="background-color: #2994A4;">Simpan</button>
            </div>

        </form>
    </div>

@endsection
