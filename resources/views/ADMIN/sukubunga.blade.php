@extends('ADMIN.layouts.main')
@section('title', 'Daftar Suku Bunga')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="/master" style="text-decoration:none; color:#555;">Master</a> /
        <a href="/sukubunga" style="text-decoration:none; color:#2994A4;">Suku Bunga</a>
    </p>
@endsection

@section('artikel')
    <h5 style="color:#555; margin-bottom:20px;">Suku Bunga</h5>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <!-- ================== TABEL DATA ================== -->
        <div class="col-md-6">
            <div class="table-responsive">
                <table class="table table-bordered table-striped"
                    style="border-radius: 10px; overflow: hidden; border-collapse: separate; border-spacing: 0;">
                    <thead style="background-color:#2994A4; color:white;" class="text-center">
                        <tr>
                            <th>Tahun</th>
                            <th>Besaran Index</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $item->tahun }}</td>
                                <td>{{ $item->peserta }}%</td>
                                <td>
                                    <a href="{{ route('sukubunga.edit', $item->tahun) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Ubah
                                    </a>

                                    <form action="{{ route('sukubunga.delete', $item->tahun) }}" method="POST"
                                        style="display:inline-block;"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-muted">Tidak ada data suku bunga.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ================== FORM TAMBAH / EDIT ================== -->
        <div class="col-md-6">
            <div class="card p-3 position-relative" style="border-radius:10px; border:1px solid #ccc;">
                <h5 style="margin-bottom:20px;">
                    {{ isset($editData) ? 'Edit Data' : 'Tambah Data' }}
                </h5>

                <div class="mb-3">
                    <a href="{{ route('sukubunga.index') }}" class="btn btn-sm"
                        style="background-color:#2994A4; color:white; width:auto;">
                        Batal
                    </a>
                </div>

                <!-- Form Tambah / Update -->
                <form action="{{ route('sukubunga.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $editData->id ?? '' }}">

                    <div class="form-group mb-3">
                        <label for="tahun">Tahun</label>
                        <input type="number" id="tahun" name="tahun" class="form-control"
                            value="{{ old('tahun', $editData->tahun ?? '') }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="besaran">Besaran</label>
                        <div class="input-group">
                            <input type="text" id="besaran" name="besaran" class="form-control"
                                placeholder="Masukkan besaran index" value="{{ old('besaran', $editData->peserta ?? '') }}"
                                required>
                            <span class="input-group-text">%</span>
                        </div>
                    </div>

                    <button type="submit" class="btn" style="background-color:#2994A4; color:white;">
                        {{ isset($editData) ? 'Perbarui Data' : '+ Tambah Data' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection