<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Iuran Peserta</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h2 { color: #2994A4; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #444; padding: 6px; text-align: center; }
        th { background-color: #2994A4; color: white; }
    </style>
</head>
<body>

    <h2>Laporan Iuran Peserta</h2>
    <p><strong>Nama Peserta:</strong> {{ $peserta->nama ?? '-' }}</p>
    <p><strong>ID Anggota:</strong> {{ $peserta->idanggota }}</p>
    <p><strong>Status:</strong> {{ $peserta->status ?? 'AKTIF' }}</p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Tanggal Catat</th>
                <th>Tanggal Setor</th>
                <th>PhDP</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Iuran Pemberi Kerja</th>
                <th>Iuran Peserta</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($iuranList as $index => $i)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $i->tglcatat->format('Y-m-d') }}</td>
                    <td>{{ $i->tglsetor->format('Y-m-d') }}</td>
                    <td>Rp {{ number_format($i->phdp, 0, ',', '.') }}</td>
                    <td>{{ str_pad($i->bln_iuran, 2, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $i->thn_iuran }}</td>
                    <td>Rp {{ number_format($i->ipk_num, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($i->ip_num, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Tidak ada data iuran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
