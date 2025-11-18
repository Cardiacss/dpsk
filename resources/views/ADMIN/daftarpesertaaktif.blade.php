@extends('ADMIN.layouts.main')

@section('title', 'Daftar Pensiunan')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">

        <a href="/home" style="text-decoration:none; color:#555;">
            Home
        </a> /

        <a href="/pengubahanpensiun" style="text-decoration:none; color:#2994A4;">
            Pengubahan Pensiun
        </a> 
    </p>
@endsection


@section('artikel')

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped mb-0 text-center align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>No Pensiun</th>
                            <th>Nama</th>
                            <th>Status Pensiun</th>
                            <th>Status Manfaat</th>
                            <th>Keterangan</th>
                            <th>Status Hidup</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($pensiuns as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nopensiun }}</td>
                                <td>{{ $item->peserta->nama ?? '-' }}</td>
                                <td>{{ $item->statuspensiun }}</td>
                                <td>{{ $item->statusmanfaat }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    @if ($item->statushidup)
                                        <span class="badge bg-success">Hidup</span>
                                    @else
                                        <span class="badge bg-danger">Meninggal</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.editpensiun.edit', $item->idpensiun) }}"
                                        class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-3 text-muted">
                                    Belum ada data pensiun
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
