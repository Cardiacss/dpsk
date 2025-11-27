@extends('ADMIN.layouts.main')

@section('title', 'Daftar Peserta Iuran Admin')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">

        <a href="/home" style="text-decoration:none; color:#555;">
            Home
        </a> /

        <a href="/iuranpesertaadmin" style="text-decoration:none; color:#555;">
            Iuran Peserta
        </a> /

        <a href="/bukamitraadmin/{{ $mitra->idunit }}" style="text-decoration:none; color:#555;">
            Daftar Mitra
        </a> /

        <a href="/daftarpesertaiuranadmin/{{ $mitra->idmitra }}" style="text-decoration:none; color:#2994A4;">
            Daftar Peserta Iuran
        </a>

    </p>
@endsection

@section('artikel')

    <div class="container-fluid py-4">
        <div class="row">

            <!-- KIRI: Daftar Peserta -->
            <div class="col-md-6">
                <h2 class="mb-4">
                    Daftar Peserta Mitra: {{ $mitra->nama_um }}
                </h2>

                <!-- Form Pencarian -->
<form method="GET" action="">
    <div class="d-flex mb-3">
        <input type="text"
               name="search"
               class="form-control"
               placeholder="Silahkan Cari Nama Peserta"
               value="{{ request('search') }}">

        <button class="btn btn-primary ms-2" type="submit">
            Cari
        </button>
    </div>
</form>

                <table class="table table-bordered table-hover w-100">
                    <thead style="background-color: #2994A4; color: #fff;">
                        <tr class="text-center">
                            <th>No</th>
                            <th>No Peserta</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peserta as $index => $p)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $p->nopeserta }}</td>
                                <td>{{ $p->nama }}</td>
                                <td class="text-center">
<button class="btn btn-sm"
    style="min-width: 70px; background-color: #2994A4; color: #fff; border-color: #2994A4;"
    onclick="showForm(
        'catat',
        {{ $p->idanggota }},
        '{{ $p->nama }}',
        {{ $nilai?->ip ?? 0 }},
        {{ $nilai?->ipk ?? 0 }}
    )">
    Catat
</button>

                                    <button class="btn btn-warning btn-sm" style="min-width: 70px;"
                                        onclick="showForm('edit', {{ $p->idanggota }}, '{{ $p->nama }}')">
                                        Edit
                                    </button>

                                    <form action="{{ route('peserta.destroy', $p->idanggota) }}" method="POST"
                                        style="display:inline-block;"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            style="min-width: 70px;">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- KANAN: Form Catat / Edit -->
            <div class="col-md-6">
                <div id="formContainer">
                    <p class="text-muted">Pilih peserta di sebelah kiri untuk menampilkan form Catat atau Edit.</p>
                </div>
            </div>

        </div>
    </div>

<script>
    // Function untuk menampilkan form sesuai button diklik
    function showForm(type, idanggota, nama, ipPersen = 0, ipkPersen = 0) {

        let formHtml = '';

        if (type === 'catat') {
            formHtml = `
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <form action="/catatiuranadmin/${idanggota}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <h5>No. Peserta: <span class="fw-bold">${idanggota}</span> | Nama: <span class="fw-bold">${nama}</span></h5>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 mb-2">
                                <label for="tglcatat" class="form-label">Tanggal Catat</label>
                                <input type="date" id="tglcatat" name="tglcatat" value="{{ date('Y-m-d') }}" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="tglsetor" class="form-label">Tanggal Setor</label>
                                <input type="date" id="tglsetor" name="tglsetor" value="{{ date('Y-m-d') }}" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="phdp" class="form-label">PhDP</label>
                                <input type="number" id="phdp" name="phdp" step="0.001" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 mb-2">
                                <label for="ip_pct" class="form-label">IP ({{ $nilai?->ip ?? 'Belum Ada Data' }}%)</label>
                                <input type="number" id="ip_pct" name="ip_pct" step="0.01" class="form-control" readonly required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="ipk_pct" class="form-label">IPK ({{ $nilai?->ipk ?? 'Belum Ada Data' }}%)</label>
                                <input type="number" id="ipk_pct" name="ipk_pct" step="0.01" class="form-control" readonly required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="bln_iuran" class="form-label d-block">Bulan Iuran</label>
                                <select id="bln_iuran" name="bln_iuran" class="form-control" required>
                                    <option value="">Pilih Bulan</option>
                                    @foreach ([1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'] as $num => $bln)
                                        <option value="{{ $num }}">{{ $bln }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="thn_iuran" class="form-label">Tahun Iuran</label>
                                <input type="number" id="thn_iuran" name="thn_iuran" value="{{ date('Y') }}" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3 d-flex">
                            <button type="submit" class="btn" style="background-color:#2994A4; color:white; border:none; width:100px; height:35px; line-height:1.5; margin-right:10px;">Simpan</button>
                            <button type="button" class="btn" style="background-color:#6c757d; color:white; border:none; width:100px; height:35px; line-height:1.5;" onclick="document.getElementById('formContainer').innerHTML='<p class=\\'text-muted\\'>Pilih peserta di sebelah kiri untuk menampilkan form Catat atau Edit.</p>';">Kembali</button>
                        </div>
                    </form>
                </div>
            </div>`;
        }

        if (type === 'edit') {
            formHtml = `
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="/updatecatat/${idanggota}/{{ $iuran->id_iuran ?? '' }}" method="POST">
                        @csrf
                        <div class="text-center text-muted mb-4">
                            <p>ID Anggota: <strong>${idanggota}</strong> | ID Iuran: <strong>{{ $iuran->id_iuran ?? '' }}</strong></p>
                        </div>

                        <div class="mb-3">
                            <label for="tglsetor" class="form-label">Tanggal Setor</label>
                            <input type="date" name="tglsetor" id="tglsetor" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="phdp" class="form-label">PhDP</label>
                            <input type="number" name="phdp" id="phdp" class="form-control" placeholder="Masukkan PhDP">
                        </div>

                        <div class="mb-3">
                            <label for="ipk_num" class="form-label">IPK</label>
                            <input type="number" name="ipk_num" id="ipk_num" class="form-control" placeholder="Rp">
                        </div>

                        <div class="mb-3">
                            <label for="ip_num" class="form-label">IP</label>
                            <input type="number" name="ip_num" id="ip_num" class="form-control" placeholder="Rp">
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label d-block">Bulan Iuran</label>
                                <input type="number" class="form-control" placeholder="Bulan">
                            </div>
                            <div class="col-md-4">
                                <label for="gajipokok" class="form-label">Gaji Pokok</label>
                                <input type="number" name="gajipokok" id="gajipokok" class="form-control" placeholder="Gaji Pokok">
                            </div>
                            <div class="col-md-4">
                                <label for="thn_iuran" class="form-label">Tahun Iuran</label>
                                <input type="number" name="thn_iuran" id="thn_iuran" class="form-control" placeholder="Tahun">
                            </div>
                        </div>

                        <div class="d-flex mb-3">
                            <button type="button" class="btn" style="background-color:#6c757d; color:white; border:none; margin-right:10px;" onclick="document.getElementById('formContainer').innerHTML='<p class=\\'text-muted\\'>Pilih peserta di sebelah kiri untuk menampilkan form Catat atau Edit.</p>';">Kembali</button>
                            <button type="submit" class="btn" style="background-color:#29c7ac; color:white; border:none;">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>`;
        }

        // Masukkan HTML
        document.getElementById('formContainer').innerHTML = formHtml;
        initHitungIP(ipPersen, ipkPersen);
    }
</script>
<script>
function initHitungIP(ipPersen, ipkPersen) {
    setTimeout(() => {
        const phdp = document.getElementById("phdp");
        const ipInput = document.getElementById("ip_pct");
        const ipkInput = document.getElementById("ipk_pct");

        if (!phdp || !ipInput || !ipkInput) return;

        function hitung() {
            const val = parseFloat(phdp.value) || 0;
            ipInput.value = (val * ipPersen / 100).toFixed(2);
            ipkInput.value = (val * ipkPersen / 100).toFixed(2);
        }

        phdp.addEventListener("input", hitung);

    }, 100); // tunggu form selesai di-render
}
</script>

@endsection
