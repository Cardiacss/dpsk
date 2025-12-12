@extends('ADMIN.layouts.main')

@section('title', 'Tabel Faktor Nilai')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">
            Home
        </a> /
        <a href="{{ route('faktornilai.index') }}" style="text-decoration:none; color:#2994A4;">
            Faktor Nilai
        </a>
    </p>
@endsection

@section('artikel')
    <p class="text-center mb-4">
        Faktor Nilai (FNS s/b) Pegawai/Guru, Pria/Wanita, Kawin/Lajang
    </p>
    <form action="{{ route('faktornilai.import') }}" method="POST" enctype="multipart/form-data" class="mb-3">
    @csrf
    <div class="input-group">
        <input type="file" name="file" class="form-control" accept=".xlsx,.xls" required>
        <button class="btn btn-primary" type="submit">Import Excel</button>
    </div>
</form>

    <div class="row">

        {{-- Loop 4 jenis tabel --}}
        @foreach ([['title' => 'Pegawai (Kawin)', 'data' => $pegawaiKawin, 'color' => 'primary', 'id' => 1], ['title' => 'Pegawai (Lajang)', 'data' => $pegawaiLajang, 'color' => 'info', 'id' => 2], ['title' => 'Guru (Kawin)', 'data' => $guruKawin, 'color' => 'success', 'id' => 3], ['title' => 'Guru (Lajang)', 'data' => $guruLajang, 'color' => 'success', 'id' => 4]] as $tabel)
            <div class="col-12 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body p-3">
                        <h5 class="card-title">{{ $tabel['title'] }}</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm text-center mb-2 w-100">
                                <thead class="table-{{ $tabel['color'] }}">
                                    <tr>
                                        <th>Umur</th>
                                        <th>(s)Pria</th>
                                        <th>(b)Pria</th>
                                        <th>(s)Wanita</th>
                                        <th>(b)Wanita</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tabel['data'] as $row)
                                        <tr>
                                            <td>{{ $row->umur }}</td>
    @php
    if (str_contains($tabel['title'], 'Kawin')) {
        $cols = [
            'fns_s_pria_kawin',
            'fns_b_pria_kawin',
            'fns_s_wanita_kawin',
            'fns_b_wanita_kawin',
        ];
    } else {
        $cols = [
            'fns_s_pria_lajang',
            'fns_b_pria_lajang',
            'fns_s_wanita_lajang',
            'fns_b_wanita_lajang',
        ];
    }
@endphp
                                            @foreach ($cols as $col)
                                                <td class="text-danger cursor-pointer"
                                                    onclick="editNilai('{{ $row->id }}','{{ $row->$col }}','{{ $col }}')">
                                                    {{ number_format($row->$col, 5) }}
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <form action="{{ route('faktornilai.update') }}" method="POST" class="form-inline mt-2">
                            @csrf
                            <input type="hidden" name="id" id="edit_id{{ $tabel['id'] }}" />
                            <input type="hidden" name="kolom" id="edit_kolom{{ $tabel['id'] }}" />

                            <input type="text" name="nilai" id="edit_nilai{{ $tabel['id'] }}"
                                placeholder="Masukkan nilai baru" class="form-control form-control-sm mr-2"
                                style="width:150px;" />

                            <button type="submit" class="btn"
                                style="background-color:#2994A4; color:white; font-size:0.875rem; padding:0.35rem 0.75rem;">
                                Update {{ $tabel['title'] }}
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <script>
        function editNilai(id, nilai, kolom) {
            document.querySelectorAll('[id^="edit_id"]').forEach(el => el.value = id);
            document.querySelectorAll('[id^="edit_nilai"]').forEach(el => el.value = nilai);
            document.querySelectorAll('[id^="edit_kolom"]').forEach(el => el.value = kolom);
        }
    </script>
@endsection
