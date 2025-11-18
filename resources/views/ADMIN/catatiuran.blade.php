@extends('ADMIN.layouts.main')

@section('title', 'Catat Iuran Peserta')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">

        <a href="/home" style="text-decoration:none; color:#555;">
            Home
        </a> /

        <a href="/iuranpesertaadmin" style="text-decoration:none; color:#555;">
            Iuran Peserta
        </a> /

        <a href="{{ isset($mitra) ? '/bukamitraadmin/' . $mitra->idunit : '#' }}" style="text-decoration:none; color:#555;">
            Daftar Mitra
        </a> /

        <a href="{{ isset($mitra) ? '/daftarpesertaiuranadmin/' . $mitra->idmitra : '#' }}"
            style="text-decoration:none; color:#555;">
            Daftar Peserta Iuran
        </a> /

        <a style="text-decoration:none; color:#2994A4; font-weight:bold;">
            Catat
        </a>

    </p>
@endsection


@section('artikel')
    <div class="container-fluid py-4">

        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.catatiuran.store', ['idanggota' => $peserta->idanggota]) }}" method="POST">
                    @csrf

                    <!-- Info Peserta -->
                    <div class="mb-3">
                        <h5>No. Peserta: <span class="fw-bold">{{ $peserta->idanggota }}</span> | Nama: <span
                                class="fw-bold">{{ $peserta->nama }}</span></h5>
                    </div>

                    <!-- Tanggal & PhDP -->
                    <div class="row mb-3">
                        <div class="col-md-4 mb-2">
                            <label for="tglcatat" class="form-label">Tanggal Catat</label>
                            <input type="date" id="tglcatat" name="tglcatat" value="{{ date('Y-m-d') }}"
                                class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="tglsetor" class="form-label">Tanggal Setor</label>
                            <input type="date" id="tglsetor" name="tglsetor" value="{{ date('Y-m-d') }}"
                                class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="phdp" class="form-label">PhDP</label>
                            <input type="number" id="phdp" name="phdp" step="0.001" class="form-control"
                                required>
                        </div>
                    </div>

                    <!-- IP & IPK -->
                    <div class="row mb-3">
                        <div class="col-md-6 mb-2">
                            <label for="ip_pct" class="form-label">IP ({{ $nilai?->ip ?? 'Belum Ada Data' }}%)</label>
                            <input type="number" id="ip_pct" name="ip_pct" step="0.01" class="form-control" readonly
                                required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="ipk_pct" class="form-label">IPK ({{ $nilai?->ipk ?? 'Belum Ada Data' }}%)</label>
                            <input type="number" id="ipk_pct" name="ipk_pct" step="0.01" class="form-control" readonly
                                required>
                        </div>
                    </div>

                    <!-- Bulan & Tahun Iuran -->
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="bln_iuran" class="form-label d-block">Bulan Iuran</label>
                            <select id="bln_iuran" name="bln_iuran" class="form-control" required>
                                <option value="">Pilih Bulan</option>
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
                                    <option value="{{ $num }}"
                                        {{ old('bln_iuran', $iuran->bln_iuran ?? '') == $num ? 'selected' : '' }}>
                                        {{ $bln }}
                                    </option>
                                @endforeach
                            </select>

                            @error('bln_iuran')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="thn_iuran" class="form-label">Tahun Iuran</label>
                            <input type="number" id="thn_iuran" name="thn_iuran" value="{{ date('Y') }}"
                                class="form-control" required>
                        </div>
                    </div>
                    <!-- Tombol -->
                    <div class="mb-3 d-flex">
                        <button type="submit" class="btn"
                            style="background-color:#2994A4; color:white; border:none; width:100px; height:35px; line-height:1.5; margin-right:10px;">
                            Simpan
                        </button>
                        <button type="button" class="btn"
                            style="background-color:#6c757d; color:white; border:none; width:100px; height:35px; line-height:1.5;"
                            onclick="history.back()">
                            Kembali
                        </button>
                    </div>


                </form>
            </div>
        </div>

        <!-- Riwayat 6 Bulan Terakhir -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Iuran 6 Bulan Terakhir</h5>

                @if ($riwayat->isEmpty())
                    <p class="text-muted">Belum ada catatan iuran.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center mb-0">
                            <thead class="table-primary">
                                <tr>
                                    <th>Tanggal Catat</th>
                                    <th>Tanggal Setor</th>
                                    <th>PhDP</th>
                                    <th>IPK</th>
                                    <th>IP</th>
                                    <th>Bln-Thn Iuran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($riwayat as $r)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($r->tglcatat)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($r->tglsetor)->format('d-m-Y') }}</td>
                                        <td>Rp {{ number_format($r->phdp, 0, ',', '.') }}</td>
                                        <td>Rp {{ number_format($r->ipk_num, 0, ',', '.') }}</td>
                                        <td>Rp {{ number_format($r->ip_num, 0, ',', '.') }}</td>
                                        <td>{{ str_pad($r->bln_iuran, 2, '0', STR_PAD_LEFT) }} - {{ $r->thn_iuran }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                <p class="mt-3 fw-semibold">
                    Rata-rata PhDP 6 Bulan Terakhir:
                    <span class="text-success">Rp {{ number_format($rataPhdp, 0, ',', '.') }}</span>
                </p>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const phdpInput = document.getElementById('phdp');
            const ipInput = document.getElementById('ip_pct');
            const ipkInput = document.getElementById('ipk_pct');

            const ipPercent = parseFloat("{{ $nilai?->ip ?? 0 }}");
            const ipkPercent = parseFloat("{{ $nilai?->ipk ?? 0 }}");

            phdpInput.addEventListener('input', function() {
                const phdp = parseFloat(this.value) || 0;
                ipInput.value = (phdp * ipPercent / 100).toFixed(2);
                ipkInput.value = (phdp * ipkPercent / 100).toFixed(2);
            });
        });
    </script>
@endsection
