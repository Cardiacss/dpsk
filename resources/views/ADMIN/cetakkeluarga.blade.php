<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cetak Data Keluarga</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #2994A4; color: white; }
        h2 { text-align: center; color: #2994A4; }
    </style>
</head>
<body>
    <h2>Data Keluarga Peserta</h2>

    <p><strong>Nama Peserta:</strong> {{ $peserta->nama }}</p>
    <p><strong>Nomor Peserta:</strong> {{ $peserta->nopeserta }}</p>

    <table>
        <thead>
            <tr>
                <th>Nama Anggota</th>
                <th>Tempat / Tgl Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Hubungan</th>
                <th>Status Hidup</th>
                <th>Waris</th>
            </tr>
        </thead>
        <tbody>
            @foreach($keluarga as $k)
                <tr>
                    <td>{{ $k->nm_keluarga }}</td>
                    <td>{{ $k->tempatlahir }} / {{ \Carbon\Carbon::parse($k->tgllahir)->format('d-m-Y') }}</td>
                    <td>{{ $k->jeniskelamin }}</td>
                    <td>{{ $k->hubungan }}</td>
                    <td>{{ $k->statushidup ? 'Hidup' : 'Meninggal' }}</td>
                    <td>{{ $k->bolehwaris ? 'Ya' : 'Tidak' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
