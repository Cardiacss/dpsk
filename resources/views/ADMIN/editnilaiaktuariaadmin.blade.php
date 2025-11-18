@extends('ADMIN.layouts.main')

@section('title', 'Edit Nilai Aktuaria')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">

        <a href="/home" style="text-decoration:none; color:#555;">
            Home
        </a> /

        <a href="/nilaiaktuariaadmin" style="text-decoration:none; color:#555;">
            Nilai Aktuaria
        </a> /

        <a href="/datanilaiaktuariaadmin?idunit={{ $nilai->idunit }}" style="text-decoration:none; color:#555;">
            Data Nilai Aktuaria
        </a> /

        <a href="/nilaiaktuaria/edit/{{ $nilai->idaktuaria }}" style="text-decoration:none; color:#2994A4;">
            Edit Nilai Aktuaria
        </a>

    </p>
@endsection


@section('artikel')
    <div class="d-flex justify-content-center">
        <div class="w-50"> <!-- Lebar form disesuaikan -->

            <div class="card p-4 shadow-sm">
                <form action="{{ route('nilaiaktuaria.update', $nilai->idaktuaria) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Tahun Aktuaria & Nama Mitra -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tahun Aktuaria</label>
                        <input type="text" name="thnaktuaria" value="{{ $nilai->thnaktuaria }}" readonly
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Mitra</label>
                        <input type="text" value="{{ $mitra->nama_um ?? '' }}" readonly class="form-control">
                    </div>

                    <!-- IP, IPK, Nilai Tambahan -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">IP</label>
                        <input type="number" step="0.01" name="ip" value="{{ $nilai->ip }}" required
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">IPK</label>
                        <input type="number" step="0.01" name="ipk" value="{{ $nilai->ipk }}" required
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nilai Tambahan</label>
                        <input type="number" step="0.01" name="nilaitambahan" value="{{ $nilai->nilaitambahan }}"
                            class="form-control">
                    </div>

                    <!-- Bulan Berlaku & Tahun Berlaku -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Bulan Berlaku</label>
                        <input type="number" min="1" max="12" name="blnberlaku"
                            value="{{ $nilai->blnberlaku }}" required class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Tahun Berlaku</label>
                        <input type="number" name="thnberlaku" value="{{ $nilai->thnberlaku }}" required
                            class="form-control">
                    </div>

                    <!-- Tombol -->
                    <div class="d-flex justify-content-center mt-4">
                        <a href="{{ url('/datanilaiaktuariaadmin?idunit=' . $mitra->idunit) }}" class="btn"
                            style="background-color:#6c757d; color:white; width:150px; margin-right:10px;">
                            Kembali
                        </a>

                        <button type="submit" class="btn" style="background-color:#2994A4; color:white; width:150px;">
                            Simpan
                        </button>
                    </div>


                </form>
            </div>

        </div>
    </div>
@endsection
