@extends('ADMIN.layouts.main')
@section('title', 'Daftar Index Penghargaan')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">
            Home
        </a> /
        <a href="{{ route('indeks.index') }}" style="text-decoration:none; color:#2994A4;">
            Indeks
        </a>
    </p>
@endsection


@section('artikel')
    <h5 style="color:#555; margin-bottom:20px;">Indeks Penghargaan</h5>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <!-- ====== TABEL DATA ====== -->
        <div class="col-md-6">
            <div class="table-responsive">
                <table class="table table-bordered table-striped"
                    style="border-radius: 10px; overflow: hidden; border-collapse: separate; border-spacing: 0;">
                    <thead style="background-color:#2994A4; color:white;" class="text-center">
                        <tr>
                            <th>Tanggal</th>
                            <th>Besaran Index</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $item->tgl->format('Y-m-d') }}</td>
                                <td>{{ $item->indexrw }}%</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">Belum ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ====== FORM TAMBAH ====== -->
        <div class="col-md-6">
            <div class="card p-3" style="border-radius:10px; border:1px solid #ccc;">
                <h5 style="margin-bottom:15px;">Tambah / Perbarui</h5>
                <form action="{{ route('indeks.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="besaran">Besaran</label>
                        <div class="input-group">
                            <input type="text" id="besaran" name="besaran" class="form-control"
                                placeholder="Masukkan besaran index" required>
                            <span class="input-group-text" style="background-color:#f8f9fa;">%</span>
                        </div>
                    </div>
                    <button type="submit" class="btn" style="background-color:#2994A4; color:white;">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
