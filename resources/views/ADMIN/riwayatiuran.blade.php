@extends('ADMIN.layouts.main')
@section('title', 'Riwayat Iuran')

@section('breadcrumb')
<p class="text-muted" style="font-size: 14px;">
    <a href="/kepersertaan" style="text-decoration:none; color:#555;">Peserta</a> /
    <a href="/riwayatiuran" style="text-decoration:none; color:#2994A4;">Riwayat Iuran Peserta</a> 
</p>
@endsection

@section('artikel')
{{-- Kontainer Dua Kolom --}}
<div class="row mt-4">
    {{-- Kolom Kiri: Daftar Mitra --}}
    <div class="col-md-6">
        <table class="table table-bordered table-striped"
            style="border-radius: 10px; overflow: hidden; border-collapse: separate; border-spacing: 0;">
            <thead style="background-color:#2994A4; color:white;">
                <tr>
                    <th colspan="2" class="text-center" style="font-size:18px; padding:10px;">
                        Daftar Mitra
                    </th>
                </tr>
                <tr class="text-center">
                    <th>Nama Mitra</th>
                    <th>Pilihan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($unitmitra as $u)
                <tr class="text-center">
                    <td>{{ $u->nama_um }}</td>
                    <td>
                        <button class="btn btn-info btn-sm" onclick="tampilkanUnit('{{ $u->idunit }}', '{{ $u->nama_um }}')">
                            <i class="bi bi-eye"></i> Tampilkan
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Kolom Kanan: Daftar Unit --}}
    <div class="col-md-6" id="tabelUnit" style="display:none;">
        <table class="table table-bordered table-striped"
            style="border-radius: 10px; overflow: hidden; border-collapse: separate; border-spacing: 0;">
            <thead style="background-color:#2994A4; color:white;">
                <tr>
                    <th colspan="2" class="text-center" style="font-size:18px; padding:10px;">
                        Daftar Unit <span id="namaUnit"></span>
                    </th>
                </tr>
                <tr class="text-center">
                    <th>Nama Unit</th>
                    <th>Pilihan</th>
                </tr>
            </thead>
            <tbody id="dataUnit">
                {{-- Data akan diisi oleh JavaScript --}}
            </tbody>
        </table>
    </div>
</div>

{{-- Script --}}
<script>
function tampilkanUnit(idunit, namaUnit) {
    document.getElementById("namaUnit").innerText = `(${namaUnit})`;
    document.getElementById("tabelUnit").style.display = "block";
    const tbody = document.getElementById("dataUnit");
    tbody.innerHTML = "<tr><td colspan='2' class='text-center'>Memuat data...</td></tr>";

    fetch(`/riwayatiuranadmin/unit/${idunit}`)
        .then(response => response.json())
        .then(data => {
            tbody.innerHTML = "";
            if (data.length === 0) {
                tbody.innerHTML = "<tr><td colspan='2' class='text-center'>Tidak ada unit ditemukan</td></tr>";
            } else {
                data.forEach(mitra => {
                    const row = `
                        <tr class="text-center">
                            <td>${mitra.nama_um}</td>
                            <td>
                                <a href="/detailmitraadmin/${mitra.idmitra}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                            </td>
                        </tr>`;
                    tbody.insertAdjacentHTML('beforeend', row);
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            tbody.innerHTML = "<tr><td colspan='2' class='text-center text-danger'>Gagal memuat data</td></tr>";
        });
}
</script>
@endsection
