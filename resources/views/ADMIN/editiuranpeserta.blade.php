@extends('ADMIN.layouts.main')

@section('title', 'Iuran Peserta - ' . ($peserta->nama ?? 'Peserta'))

@section('artikel')
    <div class="container-fluid p-0">

        <!-- Status -->
        <div class="mb-4">
            <span class="font-weight-bold">Status Kepesertaan:</span>
            <span class="text-success">{{ $peserta->status ?? 'AKTIF' }}</span>
        </div>

        <!-- Filter -->
        <div class="form-inline mb-4">
            <label for="tahun" class="mr-2 font-weight-bold">Iuran Tahun:</label>
            <input id="tahun" type="number" placeholder="Masukkan tahun" class="form-control mr-2" style="width:500px;">
            <button class="btn" style="background-color:#2994A4; color:white;">Tampilkan</button>
            <a href="{{ route('admin.cetakIuranPeserta', ['idanggota' => $peserta->idanggota]) }}"
                class="btn btn-secondary ml-2">
                Cetak
            </a>
        </div>

        <!-- Tabel -->
        <div class="table-responsive">
            <table class="table table-bordered table-sm text-center mb-0">
                <thead class="text-white" style="background-color:#2994A4;">
                    <tr>
                        <th>#</th>
                        <th>Tanggal Catat</th>
                        <th>Tanggal Setor</th>
                        <th>PhDP</th>
                        <th>Iuran Untuk</th>
                        <th>Iuran Pemberi Kerja</th>
                        <th>Iuran Peserta</th>
                        <th>Koreksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($iuranList as $index => $i)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $i->tglcatat->format('Y-m-d') }}</td>
                            <td>{{ $i->tglsetor->format('Y-m-d') }}</td>
                            <td>Rp {{ number_format($i->phdp, 0, ',', '.') }}</td>
                            <td>{{ str_pad($i->bln_iuran, 2, '0', STR_PAD_LEFT) }}-{{ $i->thn_iuran }}</td>
                            <td>Rp {{ number_format($i->ipk_num, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($i->ip_num, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ url('/editcatat/' . $i->idanggota . '/' . $i->id_iuran . '?from=editpesertaiuranadmin') }}"
                                    class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">Belum ada data iuran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection
