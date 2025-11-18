<form action="{{ route('admin.peraturan.store') }}" method="POST" class="mb-4">
    @csrf
    <input type="hidden" name="skepentingan" value="{{ $skepentingan ?? $item->skepentingan ?? '' }}">

    <div class="form-group mb-3 row align-items-start">
        <label class="col-md-2 col-form-label">Teks Peraturan :</label>
        <div class="col-md-10">
            <textarea name="namaperaturan" class="form-control" rows="3">{{ $item->namaperaturan ?? '' }}</textarea>
        </div>
    </div>

    <div class="form-group mb-3 row align-items-start">
        <label class="col-md-2 col-form-label">Kesesuaian :</label>
        <div class="col-md-10">
            <textarea name="sesuai" class="form-control" rows="2">{{ $item->sesuai ?? '' }}</textarea>
        </div>
    </div>

    <div class="text-end">
        <button type="submit" class="btn" style="background-color:#2994A4; color:white; width:100%;">
            SIMPAN
        </button>
    </div>
</form>
