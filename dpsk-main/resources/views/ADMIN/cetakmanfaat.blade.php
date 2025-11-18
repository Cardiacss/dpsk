<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Manfaat Pensiun</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; color: #333; }
        h1, h2 { text-align: center; margin-bottom: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #999; padding: 6px; text-align: left; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h1>Data Manfaat Pensiun</h1>
    <h2>{{ $peserta->nama ?? '-' }}</h2>
    <hr>

    <h3>Data Peserta</h3>
    <table>
        <tr>
            <th>ID Anggota</th>
            <td>{{ $peserta->idanggota }}</td>
        </tr>
        <tr>
            <th>ID Unit</th>
            <td>{{ $peserta->idunit ?? '-' }}</td>
        </tr>
        <tr>
            <th>ID Mitra</th>
            <td>{{ $peserta->idmitra ?? '-' }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $peserta->nama ?? '-' }}</td>
        </tr>
        <tr>
            <th>Nomor Peserta</th>
            <td>{{ $peserta->nopeserta ?? '-' }}</td>
        </tr>
    </table>

    <br>

    <h3>Riwayat Manfaat Pensiun</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Beri Manfaat</th>
                <th>Tahun Setor</th>
                <th>Bulan Setor</th>
                <th>Nilai Manfaat</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($manfaat as $i => $m)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $m->tglberimanfaat ? $m->tglberimanfaat->format('d-m-Y') : '-' }}</td>
                <td>{{ $m->thn_setor ?? '-' }}</td>
                <td>{{ $m->bln_setor ?? '-' }}</td>
                <td>Rp {{ number_format($m->nilai_mp, 0, ',', '.') }}</td>
                <td>{{ $m->keterangan ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align:center;">Tidak ada data manfaat</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
