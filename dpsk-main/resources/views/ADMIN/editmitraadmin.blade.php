@extends('ADMIN.layouts.main')

@section('title', 'Edit Mitra & Sekolah')

@section('breadcrumb')
    <p class="text-sm text-gray-500 mb-4">
        <a href="/mitradansekolahadmin" class="text-gray-600 hover:text-[#2994A4]">Mitra & Sekolah</a> /
        <span class="text-[#2994A4] font-semibold">Edit Mitra & Sekolah</span>
    </p>
@endsection

@section('artikel')
    <div class="container mt-4">
        <form action="{{ route('unit.update', $unit->idunit) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="table-responsive">
                <table class="table table-borderless align-middle">
                    <tbody>
                        <tr>
                            <td style="width: 25%;"><label class="fw-bold">Nama Mitra</label></td>
                            <td>
                                <input type="text" name="nama_um" value="{{ $unit->nama_um }}" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td><label class="fw-bold">Alamat</label></td>
                            <td>
                                <input type="text" name="alamat_um" value="{{ $unit->alamat_um }}" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td><label class="fw-bold">Status</label></td>
                            <td>
                                <select name="stat_um" class="form-control">
                                    <option value="Aktif" {{ $unit->stat_um == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Nonaktif" {{ $unit->stat_um == 'Nonaktif' ? 'selected' : '' }}>Nonaktif
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label class="fw-bold">Iuran Peserta</label></td>
                            <td>
                                <input type="number" step="0.01" name="ip_pct" value="{{ $unit->ip_pct }}"
                                    class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td><label class="fw-bold">Iuran Pemberi Kerja</label></td>
                            <td>
                                <input type="number" step="0.01" name="ipk_pct" value="{{ $unit->ipk_pct }}"
                                    class="form-control">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Tombol Aksi -->
            <div class="text-center mt-4 d-flex justify-content-center">
                <a href="/mitradansekolahadmin" class="btn btn-secondary mx-2 px-4">Kembali</a>
                <button type="submit" class="btn text-white mx-2 px-4" style="background-color:#2994A4;">Simpan</button>
            </div>
        </form>
    </div>
@endsection
