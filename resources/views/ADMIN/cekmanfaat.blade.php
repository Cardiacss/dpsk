@extends('ADMIN.layouts.main')

@section('title', 'Detail & Edit Manfaat Pensiun')

@section('artikel')
<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg p-8 border border-gray-200">
    <h1 class="text-3xl font-extrabold mb-8 text-center text-teal-700 tracking-wide">
        Detail & Edit Pemberian Manfaat Pensiun
    </h1>

    <form action="{{ route('cekmanfaat.update', $manfaat->idpensiun) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Informasi Peserta --}}
        <div class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                <label class="text-sm font-semibold text-gray-700">No Peserta :</label>
                <input type="text" name="idanggota"
                    value="{{ $manfaat->peserta->idanggota ?? '' }}" readonly
                    class="col-span-2 border border-gray-300 rounded-lg p-3 bg-gray-100 focus:ring-2 focus:ring-teal-400 focus:outline-none">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                <label class="text-sm font-semibold text-gray-700">Nama :</label>
                <input type="text" name="nama"
                    value="{{ $manfaat->peserta->nama ?? '' }}" readonly
                    class="col-span-2 border border-gray-300 rounded-lg p-3 bg-gray-100 focus:ring-2 focus:ring-teal-400 focus:outline-none">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                <label class="text-sm font-semibold text-gray-700">Alamat :</label>
                <input type="text" name="alamat"
                    value="{{ $manfaat->peserta->alamatterakhir ?? '' }}" readonly
                    class="col-span-2 border border-gray-300 rounded-lg p-3 bg-gray-50 focus:ring-2 focus:ring-teal-400 focus:outline-none">
            </div>
        </div>

        {{-- Data Manfaat --}}
        <hr class="my-6 border-gray-300">

        <div class="space-y-4">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                <label class="text-sm font-semibold text-gray-700">Jenis Manfaat :</label>
                <select name="statusmanfaat"
                    class="col-span-2 border border-gray-300 rounded-lg p-3 bg-gray-50 focus:ring-2 focus:ring-teal-400 focus:outline-none">
                    <option value="">-- Pilih Jenis Manfaat --</option>
                    <option value="NORMAL" {{ $manfaat->statusmanfaat == 'NORMAL' ? 'selected' : '' }}>NORMAL</option>
                    <option value="SEKALIGUS" {{ $manfaat->statusmanfaat == 'SEKALIGUS' ? 'selected' : '' }}>SEKALIGUS</option>
                    <option value="80PCT" {{ $manfaat->statusmanfaat == '80PCT' ? 'selected' : '' }}>80PCT</option>
                    <option value="20PCT" {{ $manfaat->statusmanfaat == '20PCT' ? 'selected' : '' }}>20PCT</option>
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                <label class="text-sm font-semibold text-gray-700">Jumlah Manfaat Pensiun (Rp) :</label>
                <input type="text" name="mpakhir"
                    value="{{ number_format($manfaat->mpakhir ?? 0, 0, ',', '.') }}"
                    class="col-span-2 border border-gray-300 rounded-lg p-3 bg-gray-50 focus:ring-2 focus:ring-teal-400 focus:outline-none">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                <label class="text-sm font-semibold text-gray-700">Bulan Setor :</label>
                <select name="bln_setor"
                    class="col-span-2 border border-gray-300 rounded-lg p-3 bg-gray-50 focus:ring-2 focus:ring-teal-400 focus:outline-none">
                    <option value="">-- Pilih Bulan --</option>
                    @php
                        $bulan = [
                            1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',5=>'Mei',6=>'Juni',
                            7=>'Juli',8=>'Agustus',9=>'September',10=>'Oktober',11=>'November',12=>'Desember'
                        ];
                    @endphp
                    @foreach($bulan as $num => $nama)
                        <option value="{{ $num }}" {{ $manfaat->bln_setor == $num ? 'selected' : '' }}>
                            {{ $nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                <label class="text-sm font-semibold text-gray-700">Tahun Setor :</label>
                <input type="text" name="thn_setor"
                    value="{{ $manfaat->thn_setor ?? date('Y') }}"
                    class="col-span-2 border border-gray-300 rounded-lg p-3 bg-gray-50 focus:ring-2 focus:ring-teal-400 focus:outline-none"
                    placeholder="Masukkan tahun setor (misal: 2025)">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                <label class="text-sm font-semibold text-gray-700">Tanggal Beri Manfaat :</label>
                <input type="date" name="tglberimanfaat"
                    value="{{ isset($manfaat->tglberimanfaat) ? \Carbon\Carbon::parse($manfaat->tglberimanfaat)->format('Y-m-d') : '' }}"
                    class="col-span-2 border border-gray-300 rounded-lg p-3 bg-gray-50 focus:ring-2 focus:ring-teal-400 focus:outline-none">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                <label class="text-sm font-semibold text-gray-700">Manfaat Untuk :</label>
                <input type="number" name="manfaat_untuk"
                    value="{{ $manfaat->manfaat_untuk ?? 0 }}"
                    class="col-span-2 border border-gray-300 rounded-lg p-3 bg-gray-50 focus:ring-2 focus:ring-teal-400 focus:outline-none">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                <label class="text-sm font-semibold text-gray-700">Keterangan :</label>
                <textarea name="keterangan" rows="4"
                    class="col-span-2 border border-gray-300 rounded-lg p-3 bg-gray-50 focus:ring-2 focus:ring-teal-400 focus:outline-none"
                    placeholder="Tambahkan catatan atau keterangan tambahan di sini...">{{ $manfaat->keterangan ?? '' }}</textarea>
            </div>
        </div>

        {{-- Tombol Simpan --}}
        <div class="flex justify-end mt-8">
            <button type="submit"
                class="px-8 py-3 bg-teal-600 text-white font-semibold rounded-lg shadow hover:bg-teal-700 focus:ring-2 focus:ring-teal-400 transition duration-200">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
