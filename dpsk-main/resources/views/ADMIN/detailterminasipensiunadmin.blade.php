@extends('ADMIN.layouts.main')

@section('title', 'Detail Terminasi Pensiun')

@section('breadcrumb')
<p class="text-muted" style="font-size: 14px;">
    <a href="/kepensiunan" style="text-decoration:none; color:#555;">Kepensiunan</a> /
    <a href="/daftarterminasiadmin" style="text-decoration:none; color:#2994A4;">Daftar Terminasi</a>
</p>
@endsection

@section('artikel')
<div class="bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold mb-6">Detail Terminasi Pensiun</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
        <div>
            <label class="block font-medium">Nomor Peserta</label>
            <input type="text" value="{{ $pensiun->peserta->nopeserta ?? '-' }}" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
        </div>
        <div>
            <label class="block font-medium">No Pensiun</label>
            <input type="text" value="{{ $pensiun->nopensiun ?? '-' }}" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
        </div>

        <div>
            <label class="block font-medium">Nama Peserta</label>
            <input type="text" value="{{ $pensiun->peserta->nama ?? '-' }}" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
        </div>
        <div>
            <label class="block font-medium">No KTP/Passpor</label>
            <input type="text" value="{{ $pensiun->peserta->nopeserta ?? '-' }}" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
        </div>

        <div>
            <label class="block font-medium">Tempat Lahir</label>
            <input type="text" value="{{ $pensiun->peserta->tempatlahir ?? '-' }}" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
        </div>
        <div>
            <label class="block font-medium">Jenis Kelamin</label>
            <input type="text" value="{{ $pensiun->peserta->jeniskelamin ?? '-' }}" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
        </div>

        <div>
            <label class="block font-medium">Tanggal Lahir</label>
            <input type="text" value="{{ optional($pensiun->peserta->tgllahir)->format('d-m-Y') ?? '-' }}" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
        </div>
        <div>
            <label class="block font-medium">Alamat</label>
            <input type="text" value="{{ $pensiun->peserta->alamatterakhir ?? '-' }}" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
        </div>

        <div>
            <label class="block font-medium">Kelurahan</label>
            <input type="text" value="{{ $pensiun->peserta->kelurahan ?? '-' }}" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
        </div>
        <div>
            <label class="block font-medium">Kecamatan</label>
            <input type="text" value="{{ $pensiun->peserta->kecamatan ?? '-' }}" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
        </div>

        <div>
            <label class="block font-medium">Kota</label>
            <input type="text" value="{{ $pensiun->peserta->kotakab ?? '-' }}" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
        </div>
        <div>
            <label class="block font-medium">Provinsi</label>
            <input type="text" value="{{ $pensiun->peserta->provinsi ?? '-' }}" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
        </div>

        <div>
            <label class="block font-medium">Pekerjaan</label>
            <input type="text" value="{{ $pensiun->peserta->pkerjaanakhir ?? '-' }}" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
        </div>
        <div>
            <label class="block font-medium">Unit</label>
            <input type="text" value="{{ $pensiun->peserta->unit->nama_um ?? '-' }}" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
        </div>

        <div>
            <label class="block font-medium">Tgl Pensiun</label>
            <input type="text" value="{{ optional($pensiun->tmtpensiun)->format('d-m-Y') ?? '-' }}" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
        </div>
        <div>
            <label class="block font-medium">Tanggal Terminasi</label>
            <input type="text" value="{{ optional($pensiun->tglterminasi)->format('d-m-Y') ?? '-' }}" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
        </div>

        <div>
            <label class="block font-medium">Total Iuran</label>
            <input type="text" value="Rp {{ number_format($pensiun->peserta->total_iuran ?? 0, 0, ',', '.') }}" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
        </div>
        <div>
            <label class="block font-medium">Total Manfaat</label>
            <input type="text" value="Rp {{ number_format($pensiun->mpakhir ?? 0, 0, ',', '.') }}" readonly class="mt-1 w-full border rounded p-2 bg-gray-100"/>
        </div>
    </div>

    <div class="mt-6">
        <a href="/daftarterminasiadmin" class="bg-[#2994A4] hover:bg-[#257f8d] text-white px-4 py-2 rounded shadow">
            Kembali
        </a>
    </div>
</div>
@endsection