@extends('ADMIN.layouts.main')

@section('title', 'Edit Iuran Peserta')

@section('breadcrumb')

<p class="text-muted" style="font-size: 14px;">
    <a href="/iuranpesertakepala" class="text-primary">Iuran Peserta</a> /
    <span>Edit</span>
</p>
@endsection

@section('artikel')

<div class="container-fluid py-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="text-center text-muted mb-4">
                <p>
                    ID Anggota: <strong>{{ $iuran->idanggota }}</strong> |
                    ID Iuran: <strong>{{ $iuran->id_iuran }}</strong>
                </p>
            </div>

```
        <form action="{{ url('/updatecatat/' . $iuran->idanggota . '/' . $iuran->id_iuran) }}" method="POST">
            @csrf

            <!-- Tanggal Setor -->
            <div class="mb-3">
                <label for="tglsetor" class="form-label">Tanggal Setor</label>
                <input type="date" name="tglsetor" id="tglsetor"
                    value="{{ $iuran->tglsetor ? $iuran->tglsetor->format('Y-m-d') : '' }}"
                    class="form-control @error('tglsetor') is-invalid @enderror">
                @error('tglsetor')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- PhDP -->
            <div class="mb-3">
                <label for="phdp" class="form-label">PhDP</label>
                <input type="number" name="phdp" id="phdp" value="{{ old('phdp', $iuran->phdp) }}"
                    class="form-control @error('phdp') is-invalid @enderror" placeholder="Masukkan PhDP">
                @error('phdp')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- IPK -->
            <div class="mb-3">
                <label for="ipk_num" class="form-label">IPK</label>
                <input type="number" name="ipk_num" id="ipk_num" value="{{ old('ipk_num', $iuran->ipk_num) }}"
                    class="form-control @error('ipk_num') is-invalid @enderror" placeholder="Rp">
                @error('ipk_num')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- IP -->
            <div class="mb-3">
                <label for="ip_num" class="form-label">IP</label>
                <input type="number" name="ip_num" id="ip_num" value="{{ old('ip_num', $iuran->ip_num) }}"
                    class="form-control @error('ip_num') is-invalid @enderror" placeholder="Rp">
                @error('ip_num')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Bulan, Gaji Pokok, Tahun -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label d-block">Bulan Iuran</label>
                    <div class="dropdown">
                        <button class="btn btn-light border dropdown-toggle w-100 text-dark" type="button"
                            id="dropdownBulanIuran" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            {{ $iuran->bln_iuran
                                ? [
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
                                ][$iuran->bln_iuran]
                                : 'Pilih Bulan' }}
                        </button>
                        <div class="dropdown-menu w-100" aria-labelledby="dropdownBulanIuran">
                            @foreach ([
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
    ] as $num => $bln)
                                <a class="dropdown-item {{ $iuran->bln_iuran == $num ? 'active' : '' }}"
                                    href="#"
                                    onclick="event.preventDefault(); document.getElementById('bln_iuran_input').value='{{ $num }}'; this.closest('.dropdown').querySelector('button').textContent='{{ $bln }}';">
                                    {{ $bln }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <input type="hidden" name="bln_iuran" id="bln_iuran_input" value="{{ $iuran->bln_iuran }}">
                    @error('bln_iuran')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="gajipokok" class="form-label">Gaji Pokok</label>
                    <input type="number" name="gajipokok" id="gajipokok"
                        value="{{ old('gajipokok', $iuran->gajipokok) }}"
                        class="form-control @error('gajipokok') is-invalid @enderror" placeholder="Gaji Pokok">
                    @error('gajipokok')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="thn_iuran" class="form-label">Tahun Iuran</label>
                    <input type="number" name="thn_iuran" id="thn_iuran"
                        value="{{ old('thn_iuran', $iuran->thn_iuran) }}"
                        class="form-control @error('thn_iuran') is-invalid @enderror" placeholder="Tahun">
                    @error('thn_iuran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Tombol -->
            <div class="d-flex mb-3">
                <!-- Kembali ke detail mitra -->
                <a href="{{ url('/detailmitraadmin/' . $iuran->peserta->mitra->idmitra) }}" class="btn"
                    style="background-color:#6c757d; color:white; border:none; margin-right:10px;">
                    Kembali
                </a>

                <!-- Simpan -->
                <button type="submit" class="btn" style="background-color:#29c7ac; color:white; border:none;">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

</div>
@endsection
