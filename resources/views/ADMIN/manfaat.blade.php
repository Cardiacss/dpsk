@extends('ADMIN.layouts.main')

@section('title', 'Daftar & Cek Manfaat Pensiun')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="/home" style="text-decoration:none; color:#555;">Home</a> /
        <a href="/manfaat" style="text-decoration:none; color:#2994A4;">Manfaat</a>
    </p>
@endsection

@section('artikel')
    <div class="container-fluid py-4">
        <div class="row">

            <!-- KIRI: Daftar Manfaat -->
            <div class="col-md-6">
                <h4 class="mb-4">Daftar Manfaat Pensiun</h4>

                <!-- Form Filter -->
                <form action="{{ route('manfaat.index') }}" method="GET" class="row g-2 mb-4 align-items-end">
                    <div class="col-md-6">
                        <label class="form-label">Nama Peserta</label>
                        <input type="text" name="nopeserta" value="{{ request('nopeserta') }}" class="form-control" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mitra</label>
                        <select name="mitra" class="form-control">
                            <option value="">Pilih Mitra</option>
                            @foreach ($mitras as $m)
                                <option value="{{ $m->nama_um }}" {{ request('mitra') == $m->nama_um ? 'selected' : '' }}>
                                    {{ $m->nama_um }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 d-flex mt-2">
                        <button class="btn"
                            style="background-color:#2994A4; color:white; margin-right:6px;">Cari</button>
                        <a href="{{ route('manfaat.index') }}" class="btn btn-secondary">Clear</a>
                    </div>
                </form>

                <!-- Tabel Daftar Manfaat -->
                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0">
                                <thead style="background-color:#2994A4; color:white;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>No Pensiun</th>
                                        <th>Nama</th>
                                        <th>Mitra</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($manfaat as $index => $item)
                                        <tr class="text-center">
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->nopensiun }}</td>
                                            <td>{{ $item->peserta->nama ?? '-' }}</td>
                                            <td>{{ $item->peserta->mitra->nama_um ?? '-' }}</td>
                                            <td>
                                                <button class="btn btn-sm" style="background-color:#2994A4; color:white;"
                                                    onclick="showManfaat({{ $item->idpensiun }})">
                                                    Cek
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">Tidak ada data manfaat.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KANAN: Detail / Edit Manfaat -->
            <div class="col-md-6">
                <div id="detailPeserta" class="text-center text-muted p-4">
                    Pilih tombol <b>CEK</b> di kiri untuk melihat detail manfaat.
                </div>
            </div>

        </div>
    </div>

    <script>
        function showManfaat(idpensiun) {
            fetch(`/manfaat/detail/${idpensiun}`)
                .then(res => res.json())
                .then(data => {
                    let html = `
<div class="card shadow-sm">
    <div class="card-body">
        <form action="/cekmanfaat/${data.idpensiun}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">

            <div class="mb-3 row">
                <label class="col-md-4 col-form-label">No Pensiun:</label>
                <div class="col-md-8">
                    <input type="text" class="form-control bg-light" value="${data.nopensiun}" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-md-4 col-form-label">No Peserta:</label>
                <div class="col-md-8">
                    <input type="text" class="form-control bg-light" value="${data.peserta.idanggota}" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-md-4 col-form-label">Nama:</label>
                <div class="col-md-8">
                    <input type="text" class="form-control bg-light" value="${data.peserta.nama}" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-md-4 col-form-label">Alamat:</label>
                <div class="col-md-8">
                    <input type="text" class="form-control bg-light" value="${data.peserta.alamatterakhir}" readonly>
                </div>
            </div>

            <hr>

            <div class="mb-3 row">
                <label class="col-md-4 col-form-label">Jenis Manfaat:</label>
                <div class="col-md-8">
                    <select name="statusmanfaat" class="form-control">
                        <option value="">-- Pilih Jenis Manfaat --</option>
                        <option value="NORMAL" ${data.statusmanfaat == 'NORMAL' ? 'selected' : ''}>NORMAL</option>
                        <option value="SEKALIGUS" ${data.statusmanfaat == 'SEKALIGUS' ? 'selected' : ''}>SEKALIGUS</option>
                        <option value="80PCT" ${data.statusmanfaat == '80PCT' ? 'selected' : ''}>80PCT</option>
                        <option value="20PCT" ${data.statusmanfaat == '20PCT' ? 'selected' : ''}>20PCT</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-md-4 col-form-label">Jumlah Manfaat (Rp):</label>
                <div class="col-md-8">
                    <input type="text" name="mpakhir" class="form-control" value="${data.mpakhir ?? 0}">
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-md-4 col-form-label">Bulan Setor:</label>
                <div class="col-md-8">
                    <select name="bln_setor" class="form-control">
                        ${[1,2,3,4,5,6,7,8,9,10,11,12].map(i => `<option value="${i}" ${data.bln_setor == i ? 'selected' : ''}>${['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'][i-1]}</option>`).join('')}
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-md-4 col-form-label">Tahun Setor:</label>
                <div class="col-md-8">
                    <input type="text" name="thn_setor" class="form-control" value="${data.thn_setor ?? new Date().getFullYear()}">
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-md-4 col-form-label">Tanggal Beri:</label>
                <div class="col-md-8">
                    <input type="date" name="tglberimanfaat" class="form-control" value="${data.tglberimanfaat ?? ''}">
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-md-4 col-form-label">Manfaat Untuk:</label>
                <div class="col-md-8">
                    <input type="number" name="manfaat_untuk" class="form-control" value="${data.manfaat_untuk ?? 0}">
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-md-4 col-form-label">Keterangan:</label>
                <div class="col-md-8">
                    <textarea name="keterangan" rows="3" class="form-control">${data.keterangan ?? ''}</textarea>
                </div>
            </div>

            <div class="text-center mt-3">
                <button class="btn" style="background-color:#2994A4; color:white;">Simpan</button>
                <button type="button" class="btn btn-secondary" onclick="document.getElementById('detailPeserta').innerHTML='Pilih tombol CEK di kiri untuk melihat detail manfaat.'">Batal</button>
            </div>
        </form>
    </div>
</div>
`;
                    document.getElementById('detailPeserta').innerHTML = html;
                });
        }
    </script>
@endsection
