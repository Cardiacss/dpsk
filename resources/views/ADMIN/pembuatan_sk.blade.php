<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h3 { text-align: center; }
        table { width:100%; border-collapse: collapse; margin-top:20px; }
        td { padding:5px; vertical-align: top; }
    </style>
</head>
<body>

<h3>DATA PEMBUATAN SK</h3>

<table border="1">
    <tr>
        <td>ID Anggota</td>
        <td>{{ $idanggota }}</td>
    </tr>
    <tr>
        <td>TMT Pensiun</td>
        <td>{{ $tmtpensiun }}</td>
    </tr>
    <tr>
        <td>DODT</td>
        <td>{{ $dodt ?: '-' }}</td>
    </tr>
    <tr>
        <td>Batas Manfaat Bulanan</td>
        <td>Rp {{ number_format($batasmanfaatbulanan,0,',','.') }}</td>
    </tr>
    <tr>
        <td>Tanggal Surat Permohonan</td>
        <td>{{ $sk_permohonan }}</td>
    </tr>
    <tr>
        <td>Tanggal Pengantar Surat</td>
        <td>{{ $sk_tgl_pengantar }}</td>
    </tr>
    <tr>
        <td>Nomor Pengantar Surat</td>
        <td>{{ $sk_nomor_pengantar }}</td>
    </tr>
    <tr>
        <td>Tanggal SK</td>
        <td>{{ $sk_tanggal }}</td>
    </tr>
    <tr>
        <td>Nomor SK</td>
        <td>{{ $sk_nomor }}</td>
    </tr>
</table>

</body>
</html>
