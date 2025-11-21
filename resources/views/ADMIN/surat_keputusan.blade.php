<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; font-size: 12px; line-height: 1.5; }
        h3 { text-align: center; margin-bottom: 10px; }
        .section-title { font-weight: bold; margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top:5px; }
        td { padding:4px; vertical-align: top; }
        .indent { margin-left:20px; }
        .number { font-weight: bold; }
        .ttd { margin-top:40px; text-align:right; }
    </style>
</head>
<body>

<h3>DATA UNTUK PEMBUATAN SK PENSIUN DIPERCEPAT</h3>

<b>Nama :</b> {{ $nama }}<br>
<b>Jabatan :</b> {{ $jabatan }}<br>
<b>Alamat :</b> {{ $alamat }}<br>
<b>TTL :</b> {{ $ttl }}<br>
<b>Usia Pensiun :</b> {{ $usia_pensiun }}<br><br>

<div class="number">1. Surat permohonan ybs tertanggal :</div>
<div class="indent">{{ $tgl_permohonan }}</div>

<div class="number">2. Surat pengantar pengurus : {{ $pengantar_dari }}</div>
<div class="indent">
    tertanggal : {{ $pengantar_tanggal }} No. : {{ $pengantar_nomor }} <br>
    a. SK Pensiun dari : {{ $sk_dari }}<br>
    b. Tertanggal : {{ $sk_tanggal }} No. : {{ $sk_nomor }}<br>
    c. Terhitung mulai : {{ $tmt_pensiun }}
</div>

<div class="number">3.</div>
<div class="indent">
    a. Surat Kematian dari : {{ $surat_kematian_dari ?: '-' }} <br>
    b. Tertanggal : {{ $surat_kematian_tgl ?: '--' }} No. : {{ $surat_kematian_nomor ?: '--' }}<br>
    c. Meninggal dunia pada tanggal : {{ $tgl_meninggal ?: '--' }} <br>
    d. Usia pada waktu meninggal : {{ $usia_meninggal ?: '--' }}
</div>

<div class="number">4.</div>
<div class="indent">
    a. Menjadi peserta / pensiunan YDPSK sejak : {{ $peserta_sejak }}<br>
    b. No. Register : {{ $no_register }}<br>
    c. Bayar iuran pensiun sejak : {{ $iuran_sejak }} Status : {{ $status }}<br>
    d. Setor Terakhir : {{ $setor_terakhir }} Masa Kerja : {{ $masa_kerja }}
</div>

<div class="number">5. Susunan Keluarga :</div>
<div class="indent">
    a. Istri / Suami bernama {{ $nama_pasangan }}<br>
    {{ $ttl_pasangan }} Nikah {{ $tgl_nikah }}
</div>

<div class="number">6. Besarnya penerimaan pensiun :</div>
<div class="indent">
MP = MK x 2,1% x PhDP x PV <br><br>

= {{ $mk }} x 2.1% x Rp {{ number_format($phdp,0,',','.') }} x {{ $pv }}<br>
= Rp {{ number_format($mp,0,',','.') }}<br>
= dibulatkan menjadi <b>Rp {{ number_format($mp,0,',','.') }}</b><br><br>

<b>100%</b> = 100% x FNSS x (MK x 2.1% x PhDP) x 12 <br>
= Rp {{ number_format($mp100,0,',','.') }}<br><br>

<b>20%</b> = Rp {{ number_format($mp20,0,',','.') }}<br><br>

<b>80%</b> = Rp {{ number_format($mp80,0,',','.') }}
</div>

<hr><br>

<h3>FORMULIR MUTASI PERORANGAN</h3>

<b>AKHIR KEPESERTAAN DALAM PENGURUSAN ANGGOTA INI</b><br><br>

1. Nama : {{ $nama }}<br>
2. Jabatan : {{ $jabatan }}<br>
3. No. DP : {{ $no_register }}<br><br>

<b>DALAM HAL A :</b> Formulir ini disertai data-data Lengkap / Kurang<br>
<b>DALAM HAL B :</b> {{ $status }}<br><br>

1. Pernyataan keluar sebagai peserta YDPSK  
&nbsp;&nbsp;&nbsp;Meninggal dunia : a) Tanpa keluarga b) Dengan Keluarga<br>
2. Mencapai usia pensiun<br>
3. Diberhentikan sebelum umur pensiun<br>
4. Pindah ke Pengurus Anggota :<br>
5. Lain-lain, yaitu :<br><br>

<b>CATATAN KHUSUS</b><br>
I. BENTUK SURAT :<br>
&nbsp;&nbsp;&nbsp;a. Tembusan / perseorangan<br>
&nbsp;&nbsp;&nbsp;b. Surat Pengantar {{ $pengantar_dari }}<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tertanggal {{ $pengantar_tanggal }} No. {{ $pengantar_nomor }}<br><br>

II. DALAM HAL B<br>
1. Ybs telah menjadi peserta sejak {{ $peserta_sejak }} s/d {{ $setor_terakhir }}<br>
2. Status ybs : {{ $status }}<br>
3. Tanggal lahir {{ $ttl }}<br>
4. Usia s/d : {{ $usia_pensiun }}<br>
5. Masa kerja yang telah dijalani : {{ $masa_kerja }}<br><br>

<b>RINCIAN PERHITUNGAN RATA-RATA GAJI SELAMA 2 TAHUN TERAKHIR</b><br><br>

1. Nama : {{ $nama }}<br>
2. Jabatan : {{ $jabatan }}<br>
3. Status Jabatan : {{ $status }}<br>
4. Perhitungan Sejak : {{ $gaji_mulai }} s/d {{ $gaji_akhir }}<br><br>

<b>Dasar Perhitungan :</b><br>
Tahun {{ $tahun1 }} Dasar Iuran Pensiun : Rp {{ number_format($iuran1,0,',','.') }}<br>
Tahun {{ $tahun2 }} Dasar Iuran Pensiun : Rp {{ number_format($iuran2,0,',','.') }}<br><br>

II. Rata-rata gaji selama 2 tahun :  
Rp {{ number_format($rata_gaji,0,',','.') }}<br><br>

III. Besarnya penerimaan pensiun dipercepat<br><br>

<div class="ttd">
Salatiga, {{ $tanggal_surat }}<br><br>
Ka. Kantor
</div>

</body>
</html>
