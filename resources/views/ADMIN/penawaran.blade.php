<!DOCTYPE html>
<html>
<head>
  <style>
    body { 
      font-family: sans-serif; 
      font-size: 13px; 
      line-height: 1.5;
    }
    h3, h4 { text-align: center; margin: 0; }
    .header { text-align: center; margin-bottom: 20px; }
    .alamat { text-align:center; font-size:12px; margin-bottom:30px; }
    table { width: 100%; border-collapse: collapse; }
    td { padding: 6px; vertical-align: top; }
    .ttd { text-align:right; margin-top: 50px; }
  </style>
</head>
<body>

<div class="header">
  <b>DANA PENSIUN SEKOLAH KRISTEN</b><br>
  <div class="alamat">
    Jalan Cemara Raya No. 42 Telp. (0298) 324590/325492<br>
    Fax. (0298) 324590, E-mail: DPSK_SLTG@yahoo.co.id<br>
    SALATIGA
  </div>
</div>

<p>Salatiga, {{ $tanggal_surat }}</p>

<p>
Nomor : {{ $nomor_surat }}<br>
Lamp. : - <br>
Hal &nbsp;&nbsp;&nbsp;&nbsp;: Penawaran Manfaat Pensiun Sekaligus Sebagian
</p>

<br>

<p>
Kepada Yth.<br>
Pengurus {{ $nama_ppk }}<br>
di {{ $kota_ppk }}
</p>

<p>Dengan Hormat,</p>

<p>
Berdasarkan penelitian atas data permohonan pensiun Sdr. <b>{{ $nama }}</b>,
maka permohonan pensiun tersebut dapat dikabulkan 
dengan besarnya penerimaan Manfaat Pensiun setiap bulan sebesar 
{{-- <b>Rp {{ number_format($mp_bulanan, 0, ',', '.') }}</b> terhitung mulai 
{{ $tmt_pensiun }}.
</p> --}}

{{-- <p>
Berkenaan dengan telah disahkannya Peraturan Dana Pensiun Sekolah Kristen 
Nomor {{ $nomor_peraturan }} oleh Dewan Komisioner OJK tanggal 
{{ $tanggal_ojk }} yang berlaku efektif mulai tanggal tersebut, maka sesuai 
dengan ketentuan pasal 39 dan 40, peserta dapat memilih cara pembayaran:
</p> --}}

<ol>
  <li>Pembayaran sekaligus sebagian (20%) dan sisanya 80% dibayar per bulan.</li>
  <li>Pembayaran sekaligus 100% dari Manfaat Pensiun.</li>
</ol>

<p>Berikut perhitungan manfaat pensiun:</p>

<h4>Pembayaran 20% (Sekaligus)</h4>
<table border="1">
  <tr>
    <td>Manfaat Pensiun 20%</td>
    <td>Rp {{ number_format($mp20, 0, ',', '.') }}</td>
  </tr>
</table>

<h4>Pembayaran 80% (Bulanan)</h4>
<table border="1">
  <tr>
    <td>Manfaat Pensiun 80%</td>
    <td>Rp {{ number_format($mp80, 0, ',', '.') }}</td>
  </tr>
</table>

<h4>Pembayaran 100% (Sekaligus)</h4>
<table border="1">
  <tr>
    <td>Manfaat Pensiun 100%</td>
    <td>Rp {{ number_format($mp100, 0, ',', '.') }}</td>
  </tr>
</table>

<br>

<p>
Peserta diminta memilih salah satu alternatif tersebut dan mengisi Surat Pernyataan terlampir
paling lambat 1 bulan sejak surat ini diterbitkan.
</p>

{{-- <div class="ttd">
  Pengurus Dana Pensiun Sekolah Kristen<br><br><br>
  <b>{{ $penandatangan }}</b><br>
  {{ $jabatan_penandatangan }}
</div> --}}

</body>
</html>
