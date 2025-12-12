@extends('ADMIN.layouts.main')
@section('title', 'Daftar Peserta Riwayat Iuran')

@section('breadcrumb') <p class="text-muted" style="font-size: 14px;"> <a href="/home" style="text-decoration:none; color:#555;">Home</a> / <a href="/iuranpesertaadmin" style="text-decoration:none; color:#555;">Iuran Peserta</a> / <a href="/riwayatiuranadmin" style="text-decoration:none; color:#555;">Riwayat Iuran</a> / <a href="{{ route('admin.detailmitra', $mitra->idmitra) }}" style="text-decoration:none; color:#2994A4;">Daftar Peserta Riwayat Iuran</a> </p>
@endsection

@section('artikel')
{{-- Form Pencarian --}} <form action="#" method="GET" class="form-inline mb-3"> <p style="color: #FF0000;">Cari peserta berdasarkan nomor peserta atau nama</p> <input type="text" class="form-control mr-2" id="searchInput" style="width:1270px;" placeholder="Cari nama atau nomor peserta"> <button type="button" class="btn btn-primary" style="background-color:#2994A4" onclick="cariPeserta()"> <i class="bi bi-search"></i> Cari </button> </form>

{{-- Dua Kolom: Daftar Peserta & Detail --}}
<div class="row mt-4">
    {{-- Kolom Kiri: Daftar Peserta --}}
    <div class="col-md-6">
        <table class="table table-bordered table-striped shadow-sm"
            style="border-radius: 10px; overflow: hidden; border-collapse: separate; border-spacing: 0; background:white;">
            <thead style="background-color:#2994A4; color:white;">
                <tr class="text-center">
                    <th style="width:20px;">No</th>
                    <th style="width:50px;">Nama Peserta</th>
                    <th style="width:60px;">Menu</th>
                </tr>
            </thead>
            <tbody id="tabelPeserta">
                @forelse ($peserta as $index => $p)
                    <tr class="text-center align-middle">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>
                            <button class="btn btn-info btn-sm"
                                onclick="tampilkanDetail('{{ $p->idanggota }}', '{{ $p->nama }}', '{{ $p->nopeserta }}', '{{ $p->statuspeserta }}')">
                                <i class="bi bi-eye"></i> Cek
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="3">Tidak ada peserta pada mitra ini</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{-- Pagination --}}
<div class="mt-2">
    {{ $peserta->links('pagination::bootstrap-5') }}
</div>
    </div>

    {{-- Kolom Kanan: Detail Peserta --}}
    <div class="col-md-6" id="detailPeserta" style="display:none;">
        <div class="card shadow-sm p-4" style="border-radius: 10px; width:100%; background:white;">
            <h5 id="namaPeserta" class="fw-bold text-primary mb-2"></h5>
            <p id="infoPeserta" class="mb-1" style="font-size: 14px;"></p>
            <p><strong>Status Kepesertaan:</strong> <span id="statusPeserta" class="text-success">Pensiun</span></p>

            <hr>

            {{-- Tabel Iuran --}}
            <div id="tabelIuran" style="display:block;">
                <table class="table table-bordered table-striped"
                    style="border-radius: 10px; overflow: hidden; border-collapse: separate; border-spacing: 0; table-layout: auto; width: 100%;">
                    <thead style="background-color:#2994A4; color:white;">
                        <tr class="text-center">
                            <th>Tanggal Catat</th>
                            <th>Tanggal Setor</th>
                            <th>PhDP</th>
                            <th>Iuran Pemberi Kerja</th>
                            <th>Iuran Peserta</th>
                            <th>Tunggakan</th>
                            <th>Koreksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>

{{-- Script --}}
<script>
    let currentIdAnggota = null;

    function tampilkanDetail(idanggota, nama, nopeserta, status) {
        currentIdAnggota = idanggota;
        document.getElementById("detailPeserta").style.display = "block";
        document.getElementById("namaPeserta").innerText = nama;
        document.getElementById("infoPeserta").innerText = nopeserta + " | {{ $mitra->nama_um }}";
        document.getElementById("statusPeserta").innerText = status || "Aktif";

        tampilkanIuran();
    }

function tampilkanIuran() {
    if (!currentIdAnggota) {
        alert("Silakan pilih peserta terlebih dahulu.");
        return;
    }

    fetch(`/getIuranPeserta/${currentIdAnggota}`)
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector("#tabelIuran tbody");
            tbody.innerHTML = "";

            if (data.length === 0) {
                tbody.innerHTML = `<tr class="text-center"><td colspan="7">Tidak ada data iuran</td></tr>`;
            } else {
                // Urutkan data berdasarkan tglsetor: terbaru paling atas
                data.sort((a, b) => new Date(b.tglsetor) - new Date(a.tglsetor));

                data.forEach(item => {
                    const tglSetor = new Date(item.tglsetor);
                    const bulanSetor = tglSetor.getMonth() + 1;
                    const tahunSetor = tglSetor.getFullYear();

                    const now = new Date();
                    const bulanSekarang = now.getMonth() + 1;
                    const tahunSekarang = now.getFullYear();

                    let tunggakan = (tahunSekarang - tahunSetor) * 12 + (bulanSekarang - bulanSetor);
                    if (tunggakan < 0) tunggakan = 0;

                    const warning = tunggakan > 0 ? `<span class="text-danger fw-bold">⚠ ${tunggakan} bln</span>` : '-';

                    const row = `
                        <tr class="text-center">
                            <td>${formatTanggal(item.tglcatat)}</td>
                            <td>${formatTanggal(item.tglsetor)}</td>
                            <td>Rp ${parseFloat(item.phdp).toLocaleString('id-ID')}</td>
                            <td>Rp ${parseFloat(item.ipk_num).toLocaleString('id-ID')}</td>
                            <td>Rp ${parseFloat(item.ip_num).toLocaleString('id-ID')}</td>
                            <td>${warning}</td>
                            <td>
                                <a href="/editcatat/${currentIdAnggota}/${item.id_iuran}?from=detailpesertaiuranadmin"
                                   class="btn btn-sm btn-warning text-white"
                                   style="background-color:#f59e0b;">
                                   <i class="bi bi-pencil-square"></i> Edit
                                </a>
                            </td>
                        </tr>`;
                    tbody.innerHTML += row;
                });
            }

            document.getElementById("tabelIuran").style.display = "block";
        })
        .catch(err => {
            console.error(err);
            alert("Gagal mengambil data iuran.");
        });
}

    function formatTanggal(dateString) {
        if (!dateString) return '-';
        const d = new Date(dateString);
        if (isNaN(d)) return '-';
        return d.toISOString().split('T')[0];
    }

    function cariPeserta() {
        const keyword = document.getElementById("searchInput").value.toLowerCase();
        const rows = document.querySelectorAll("#tabelPeserta tr");

        rows.forEach(row => {
            const nama = row.cells[1].innerText.toLowerCase();
            row.style.display = nama.includes(keyword) ? "" : "none";
        });
    }
</script>


@endsection
