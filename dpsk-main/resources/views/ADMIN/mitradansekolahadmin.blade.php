@extends('ADMIN.layouts.main')

@section('title')
    Mitra & Sekolah
@endsection

@section('artikel')
    <form action="#" method="GET" class="d-flex mb-3">
        <input type="text" name="q" class="form-control" style="width:1000px;" placeholder="Cari nama atau kode mitra">

        <button type="submit" class="btn ml-2 d-flex align-items-center"
            style="height:38px; background-color:#2994A4; color:white; border:none;">
            <i class="bi bi-search me-2"></i> Cari Mitra
        </button>

        <button type="reset" class="btn ml-2 d-flex align-items-center"
            style="height:38px; background-color:#2994A4; color:white; border:none;">
            <i class="bi bi-x-circle me-2"></i> Reset
        </button>

        <a href="{{ url('/mitraadmin') }}" class="btn ml-2 d-inline-flex align-items-center justify-content-center"
            style="height:38px; background-color:#2994A4; color:white; border:none; line-height:1;">
            <i class="bi bi-list-ul me-2"></i> Tampilkan Semua
        </a>
    </form>


    <!-- Tombol Aksi -->
    <div class="mb-3">
        <a href="/inputmitraadmin" class="btn btn-success btn-sm" style="background-color:#2994A4; color:white;">
            + Input Mitra
        </a>
        <a href="/inputsekolahadmin" class="btn btn-success btn-sm" style="background-color:#2994A4; color:white;">
            + Input Sekolah
        </a>
    </div>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center"
            style="border-radius: 10px; overflow: hidden; border-collapse: separate; border-spacing: 0;">
            <thead style="background-color:#2994A4; color:white;">
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
                @forelse ($mitra as $m)
                    <tr>
                        <td>{{ $m->idunit }}</td>
                        <td>{{ $m->nama_um }}</td>
                        <td>{{ $m->alamat_um }}</td>
                        <td>{{ $m->kelurahan }}</td>
                        <td>{{ $m->kecamatan }}</td>
                        <td>{{ $m->kotakab }}</td>
                        <td>{{ $m->provinsi }}</td>
                        <td>{{ $m->stat_um }}</td>
                        <td>{{ $m->ip_pct }}%</td>
                        <td>{{ $m->ipk_pct }}%</td>

                        <td class="text-center">
                            <!-- Tombol Lihat -->
                            <a href="{{ url('/listmitraadmin/' . $m->idunit) }}" class="btn btn-info btn-sm px-2"
                                title="Lihat">
                                Lihat
                            </a>

                            <!-- Tombol Edit -->
                            <a href="{{ route('mitra.edit', $mitra->idmitra) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                Edit
                            </a>


                            <!-- Tombol Hapus -->
                            <button type="button" class="btn btn-danger btn-sm px-2" data-bs-toggle="modal"
                                data-bs-target="#hapusModal{{ $m->idunit }}" title="Hapus">
                                Hapus
                            </button>
                        </td>



                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="text-gray-500">Belum ada data tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
