@extends('ADMIN.layouts.main')

@section('title', 'Ubah Pensiunan')

@section('breadcrumb')
<p class="text-muted" style="font-size: 14px;">
    <a href="/kepensiunan" style="text-decoration:none; color:#555;">Kepensiunan</a> /
    <a href="/lihatpensiunadmin" style="text-decoration:none; color:#555;">Lihat Pensiun</a> /
    <a href="#" style="text-decoration:none; color:#2994A4;">Ubah Pensiunan</a>
</p>
@endsection

@section('artikel')
<div class="bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold mb-4">Ubah Data Pensiunan – {{ $pensiun->peserta->nama ?? 'Tanpa Nama' }}</h1>

    <a href="/lihatpensiunadmin" 
       class="bg-[#2994A4] hover:bg-[#257f8d] text-white px-4 py-2 rounded mb-6 shadow inline-block">
        Kembali
    </a>

    <form action="{{ route('pensiun.update', $pensiun->id) }}" method="POST" class="bg-white shadow rounded p-6 space-y-4 max-w-2xl">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium">No Pensiun</label>
            <input type="text" name="nopensiun" value="{{ old('nopensiun', $pensiun->nopensiun) }}" class="w-full border rounded px-3 py-2" readonly>
        </div>

        <div>
            <label class="block text-sm font-medium">ID Anggota</label>
            <input type="text" name="idanggota" value="{{ old('idanggota', $pensiun->idanggota) }}" class="w-full border rounded px-3 py-2" readonly>
        </div>

        <div>
            <label class="block text-sm font-medium">Tanggal Mohon</label>
            <input type="date" name="tglmohon" value="{{ old('tglmohon', $pensiun->tglmohon) }}" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block text-sm font-medium">Terhitung Mulai Tanggal</label>
            <input type="date" name="tmtpensiun" value="{{ old('tmtpensiun', $pensiun->tmtpensiun) }}" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block text-sm font-medium">No Surat Berhenti</label>
            <input type="text" name="nosuratberhenti" value="{{ old('nosuratberhenti', $pensiun->nosuratberhenti) }}" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block text-sm font-medium">No Agenda PSK</label>
            <input type="text" name="noagendapsk" value="{{ old('noagendapsk', $pensiun->noagendapsk) }}" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block text-sm font-medium">Status Hidup</label>
            <select name="statushidup" class="w-full border rounded px-3 py-2">
                <option value="Hidup" {{ old('statushidup', $pensiun->statushidup) == 'Hidup' ? 'selected' : '' }}>Hidup</option>
                <option value="Meninggal" {{ old('statushidup', $pensiun->statushidup) == 'Meninggal' ? 'selected' : '' }}>Meninggal</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium">Status Manfaat</label>
            <select name="statusmanfaat" class="w-full border rounded px-3 py-2">
                <option value="NORMAL" {{ old('statusmanfaat', $pensiun->statusmanfaat) == 'NORMAL' ? 'selected' : '' }}>NORMAL</option>
                <option value="LAINNYA" {{ old('statusmanfaat', $pensiun->statusmanfaat) == 'LAINNYA' ? 'selected' : '' }}>LAINNYA</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium">Keterangan</label>
            <textarea name="keterangan" class="w-full border rounded px-3 py-2" rows="3">{{ old('keterangan', $pensiun->keterangan) }}</textarea>
        </div>

        <button type="submit" 
                class="bg-[#2994A4] hover:bg-[#257f8d] text-white px-6 py-2 rounded shadow">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection