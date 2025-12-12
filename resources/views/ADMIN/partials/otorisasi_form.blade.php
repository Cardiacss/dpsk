<form action="{{ route('admin.otorisasi.store') }}" method="POST" class="mb-4">
    @csrf

    <input type="hidden" name="idotorisasi" value="{{ $item->id ?? '' }}">

    {{-- TEKS OTORISASI --}}
    <div class="form-group">
        <label><strong>Teks Otorisasi :</strong></label>
        <textarea name="isi" rows="3" class="form-control"
            placeholder="Masukkan teks otorisasi...">{{ $item->isi ?? '' }}</textarea>
    </div>

    {{-- JABATAN --}}
    <div class="form-group">
        <label><strong>Jabatan :</strong></label>
        <input type="text" class="form-control" name="jabatan"
               value="{{ $item->jabatan ?? $jabatan }}" readonly>
    </div>

    <button type="submit" class="btn btn-teal btn-block" 
            style="background-color:#2994A4; color:white; padding:10px 0;">
        SIMPAN
    </button>
</form>