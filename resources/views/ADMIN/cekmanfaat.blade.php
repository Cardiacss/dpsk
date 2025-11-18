@extends('ADMIN.layouts.main')

@section('title', 'Detail & Edit Manfaat Pensiun')

@section('breadcrumb')
    <p class="text-muted" style="font-size:14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">
            Home
        </a> /
        <a href="/manfaat" style="text-decoration:none; color:#555;">
            Manfaat
        </a> /

        <a href="{{ route('cekmanfaat', ['idpensiun' => $manfaat->idpensiun]) }}"
            style="text-decoration:none; color:#2994A4;">
            Cek Manfaat
        </a>

    </p>
@endsection

@section('artikel')
    <div class="container p-4"> <!-- container Bootstrap -->

        <form action="{{ route('cekmanfaat.update', $manfaat->idpensiun) }}" method="POST" class="mb-4">
            @csrf
            @method('PUT')

            {{-- Informasi Peserta --}}
            <div class="mb-4">
                <div class="row mb-3 align-items-center">
                    <label class="col-md-3 col-form-label">No Peserta :</label>
                    <div class="col-md-9">
                        <input type="text" name="idanggota" value="{{ $manfaat->peserta->idanggota ?? '' }}" readonly
                            class="form-control bg-light">
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label class="col-md-3 col-form-label">Nama :</label>
                    <div class="col-md-9">
                        <input type="text" name="nama" value="{{ $manfaat->peserta->nama ?? '' }}" readonly
                            class="form-control bg-light">
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label class="col-md-3 col-form-label">Alamat :</label>
                    <div class="col-md-9">
                        <input type="text" name="alamat" value="{{ $manfaat->peserta->alamatterakhir ?? '' }}" readonly
                            class="form-control bg-light">
                    </div>
                </div>
            </div>

            {{-- Data Manfaat --}}
            <hr class="my-4">

            <div class="mb-4">
                <div class="row mb-3 align-items-center">
                    <label class="col-md-3 col-form-label">Jenis Manfaat :</label>
                    <div class="col-md-9">
                        <select name="statusmanfaat" class="form-control">
                            <option value="">-- Pilih Jenis Manfaat --</option>
                            <option value="NORMAL" {{ $manfaat->statusmanfaat == 'NORMAL' ? 'selected' : '' }}>NORMAL
                            </option>
                            <option value="SEKALIGUS" {{ $manfaat->statusmanfaat == 'SEKALIGUS' ? 'selected' : '' }}>
                                SEKALIGUS</option>
                            <option value="80PCT" {{ $manfaat->statusmanfaat == '80PCT' ? 'selected' : '' }}>80PCT</option>
                            <option value="20PCT" {{ $manfaat->statusmanfaat == '20PCT' ? 'selected' : '' }}>20PCT
                            </option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label class="col-md-3 col-form-label">Jumlah Manfaat Pensiun (Rp) :</label>
                    <div class="col-md-9">
                        <input type="text" name="mpakhir"
                            value="{{ number_format($manfaat->mpakhir ?? 0, 0, ',', '.') }}" class="form-control">
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label class="col-md-3 col-form-label">Bulan Setor :</label>
                    <div class="col-md-9">
                        <select name="bln_setor" class="form-control">
                            <option value="">-- Pilih Bulan --</option>
                            @php
                                $bulan = [
                                    1 => 'Januari',
                                    2 => 'Februari',
                                    3 => 'Maret',
                                    4 => 'April',
                                    5 => 'Mei',
                                    6 => 'Juni',
                                    7 => 'Juli',
                                    8 => 'Agustus',
                                    9 => 'September',
                                    10 => 'Oktober',
                                    11 => 'November',
                                    12 => 'Desember',
                                ];
                            @endphp
                            @foreach ($bulan as $num => $nama)
                                <option value="{{ $num }}" {{ $manfaat->bln_setor == $num ? 'selected' : '' }}>
                                    {{ $nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label class="col-md-3 col-form-label">Tahun Setor :</label>
                    <div class="col-md-9">
                        <input type="text" name="thn_setor" value="{{ $manfaat->thn_setor ?? date('Y') }}"
                            class="form-control" placeholder="Masukkan tahun setor (misal: 2025)">
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label class="col-md-3 col-form-label">Tanggal Beri Manfaat :</label>
                    <div class="col-md-9">
                        <input type="date" name="tglberimanfaat"
                            value="{{ isset($manfaat->tglberimanfaat) ? \Carbon\Carbon::parse($manfaat->tglberimanfaat)->format('Y-m-d') : '' }}"
                            class="form-control">
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label class="col-md-3 col-form-label">Manfaat Untuk :</label>
                    <div class="col-md-9">
                        <input type="number" name="manfaat_untuk" value="{{ $manfaat->manfaat_untuk ?? 0 }}"
                            class="form-control">
                    </div>
                </div>

                <div class="row mb-3 align-items-start">
                    <label class="col-md-3 col-form-label">Keterangan :</label>
                    <div class="col-md-9">
                        <textarea name="keterangan" rows="4" class="form-control"
                            placeholder="Tambahkan catatan atau keterangan tambahan di sini...">{{ $manfaat->keterangan ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Tombol Simpan --}}
            <div class="text-center mt-4">
                <button type="submit" class="btn" style="background-color: #2994A4; color: white; margin-right: 8px;">
                    Simpan
                </button>
                <a href="{{ route('manfaat.index') }}" class="btn btn-secondary">
                    Batal
                </a>
            </div>

        </form>
    </div>
@endsection
