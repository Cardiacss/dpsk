<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kartu Peserta - {{ $peserta->nama }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .card {
            border: 2px solid #2994A4;
            border-radius: 10px;
            padding: 20px;
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
            color: #2994A4;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        td {
            padding: 6px 8px;
            border-bottom: 1px solid #ddd;
        }
        .label { font-weight: bold; width: 40%; color: #333; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Kartu Peserta Dana Pensiun</h2>
        <table>
            <tr><td class="label">Nomor Peserta</td><td>{{ $peserta->nopeserta }}</td></tr>
            <tr><td class="label">Nama</td><td>{{ $peserta->nama }}</td></tr>
            <tr><td class="label">Tempat, Tanggal Lahir</td><td>{{ $peserta->tempatlahir }}, {{ $peserta->tgllahir }}</td></tr>
            <tr><td class="label">Jenis Kelamin</td><td>{{ $peserta->jeniskelamin }}</td></tr>
            <tr><td class="label">Alamat</td><td>{{ $peserta->alamatterakhir }}</td></tr>
            <tr><td class="label">Kelurahan</td><td>{{ $peserta->kelurahan }}</td></tr>
            <tr><td class="label">Kecamatan</td><td>{{ $peserta->kecamatan }}</td></tr>
            <tr><td class="label">Kota/Kabupaten</td><td>{{ $peserta->kotakab }}</td></tr>
            <tr><td class="label">Provinsi</td><td>{{ $peserta->provinsi }}</td></tr>
            <tr><td class="label">Status Nikah</td><td>{{ $peserta->statusnikah }}</td></tr>
            <tr><td class="label">Jumlah Anak</td><td>{{ $peserta->jumlahanak }}</td></tr>
            <tr><td class="label">Tanggal Disahkan</td><td>{{ $peserta->tglsahpeserta }}</td></tr>
            <tr><td class="label">Status Peserta</td><td>{{ $peserta->statuspeserta }}</td></tr>
        </table>
        <p style="text-align:center; margin-top:20px; font-size:12px; color:#555;">
            Dicetak otomatis oleh sistem DPSK - {{ now()->format('d/m/Y') }}
        </p>
    </div>
</body>
</html>
