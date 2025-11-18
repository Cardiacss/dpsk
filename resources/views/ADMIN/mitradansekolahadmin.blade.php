@extends('ADMIN.layouts.main')

@section('title', 'Mitra & Sekolah')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">Home</a> /
        <a href="/mitradansekolahadmin" style="text-decoration:none; color:#2994A4;">Mitra dan Sekolah</a> 
    </p>
@endsection

@section('artikel')

    <!-- Tombol Tambah -->
    <div class="mb-4 d-flex" style="gap: 12px; padding: 0 10px;">
        <a href="/inputmitraadmin" class="btn btn-success d-flex align-items-center px-3">
            + Input Mitra
        </a>
        <a href="/inputsekolahadmin" class="btn btn-success d-flex align-items-center px-3">
            + Input Sekolah
        </a>
    </div>


    <!-- Search -->
    <form method="GET" action="/mitradansekolahadmin" class="form-inline mb-4">
        <!-- Input search -->
        <input type="text" name="search" value="{{ request('search') }}"
            placeholder="Masukkan data mitra yang ingin dicari" class="form-control mr-2" style="width: 1055PX;">

        <!-- Tombol Cari -->
        <button type="submit" class="btn btn-primary mr-2"
            style="height: 38px; min-width: 90px; background-color:#2994A4; border:none;">
            Cari
        </button>

    </form>



    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center align-middle">
            <thead class="table-light">
                <tr>
                    <th>Kode</th>
                    <th>Nama Unit/Mitra</th>
                    <th>Alamat Unit/Mitra</th>
                    <th>Kelurahan</th>
                    <th>Kecamatan</th>
                    <th>Kota/Kabupaten</th>
                    <th>Provinsi</th>
                    <th>Status</th>
                    <th>Iuran Peserta</th>
                    <th>Iuran Pemberi Kerja</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($mitras as $m)
                    <tr>
                        <td>{{ $m->idunit }}</td>
                        <td>{{ $m->nama_um }}</td>
                        <td>{{ $m->alamat_um }}</td>
                        <td>{{ $m->kelurahan }}</td>
                        <td>{{ $m->kecamatan }}</td>
                        <td>{{ $m->kotakab }}</td>
                        <td>{{ $m->provinsi }}</td>
                        <td>{{ $m->stat_um }}</td>
                        <td>{{ $m->nilaiaktuaria->ip ?? 'Belum Ada Data' }}%</td>
                        <td>{{ $m->nilaiaktuaria->ipk ?? 'Belum Ada Data' }}%</td>

                        <td class="text-center" style="width: 140px;">
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Lihat -->
                                <a href="{{ url('/listmitraadmin/' . $m->idunit) }}" class="p-2 rounded"
                                    style="background-color: #2994A4; color: white; border: none;">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <!-- Hapus -->
                                <form action="{{ route('unit.destroy', $m->idunit) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus unit ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 rounded"
                                        style="background-color: #dc3545; color: white; border: none;">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>

                                <!-- Edit -->
                                <a href="{{ route('unit.edit', ['idunit' => $m->idunit]) }}" class="p-2 rounded"
                                    style="background-color: #ffc107; color: white; border: none;">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </div>
                        </td>


                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="text-muted">Belum ada data tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
