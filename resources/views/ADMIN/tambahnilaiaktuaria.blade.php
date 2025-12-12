@extends('ADMIN.layouts.main')

@section('title', 'Tambah Nilai Aktuaria')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">

        <a href="/home" style="text-decoration:none; color:#555;">
            Home
        </a> /

        <a href="/nilaiaktuariaadmin" style="text-decoration:none; color:#555;">
            Nilai Aktuaria
        </a> /

        <a href="/datanilaiaktuariaadmin?idunit={{ $mitra->idunit }}" style="text-decoration:none; color:#555;">
            Data Nilai Aktuaria
        </a> /

        <a href="/nilaiaktuaria/create/{{ $mitra->idunit }}" style="text-decoration:none; color:#2994A4;">
            Tambah Nilai Aktuaria
        </a>

    </p>
@endsection


@section('artikel')
    <div class="d-flex justify-content-center">
        <div class="w-50"> <!-- Lebar form sesuai edit Mitra/Sekolah -->

            <form action="{{ route('nilaiaktuaria.store') }}" method="POST">
                @csrf

                <!-- ID Unit -->
                <div class="mb-3">
                    <label class="form-label fw-bold">ID Unit</label>
                    <input type="text" name="idunit" value="{{ $mitra->idunit }}" readonly class="form-control">
                </div>

                <!-- Nama Mitra -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Mitra</label>
                    <input type="text" value="{{ $mitra->nama_um }}" readonly class="form-control">
                </div>

                <!-- Tahun Aktuaria -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Tahun Aktuaria</label>
                    <input type="number" name="thnaktuaria" placeholder="Masukkan tahun aktuaria" class="form-control"
                        required>
                </div>

                <!-- Bulan Berlaku -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Bulan Berlaku</label>
                    <input type="number" name="blnberlaku" placeholder="Masukkan bulan berlaku (1–12)" class="form-control"
                        required>
                </div>

                <!-- Tahun Berlaku -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Tahun Berlaku</label>
                    <input type="number" name="thnberlaku" placeholder="Masukkan tahun berlaku" class="form-control"
                        required>
                </div>

<div class="mb-3">
    <label class="form-label fw-bold">IP (Iuran Peserta)</label>
    <div class="input-group">
        <input type="number" name="ip" id="ip" step="0.01" value="6" class="form-control" readonly>
        <span class="input-group-text">%</span>
    </div>
</div>

<!-- Iuran Normal (yang diinput user) -->
<div class="mb-3">
    <label class="form-label fw-bold">Iuran Normal</label>
    <div class="input-group">
        <input type="number" name="nilaitambahan" id="nilaitambahan" step="0.01"
               placeholder="Masukkan Iuran Normal" class="form-control" required
               oninput="hitungIPK()">
        <span class="input-group-text">%</span>
    </div>
</div>

<!-- IPK = Iuran Normal - 6% (otomatis) -->
<div class="mb-3">
    <label class="form-label fw-bold">IPK (Iuran Pemberi Kerja)</label>
    <div class="input-group">
        <input type="number" name="ipk" id="ipk" step="0.01" class="form-control" readonly>
        <span class="input-group-text">%</span>
    </div>
</div>

<script>
function hitungIPK() {
    let ip = 6; // fixed 6%
    let iuranNormal = parseFloat(document.getElementById('nilaitambahan').value) || 0;
    let ipk = iuranNormal - ip;

    // Tidak boleh minus
    document.getElementById('ipk').value = ipk > 0 ? ipk.toFixed(2) : 0;
}
</script>
                <!-- Tombol -->
                <div class="d-flex justify-content-center mt-4" style="gap:10px;">
                    <a href="/datanilaiaktuariaadmin?idunit={{ $mitra->idunit }}" class="btn btn-secondary"
                        style="width:150px;">
                        Kembali
                    </a>

                    <button type="submit" class="btn" style="background-color:#2994A4; color:white; width:150px;">
                        Simpan Data
                    </button>
                </div>


            </form>

        </div>
    </div>
@endsection
