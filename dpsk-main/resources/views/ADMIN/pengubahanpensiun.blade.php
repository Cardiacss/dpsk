@extends('ADMIN.layouts.main')

@section('title', 'Ubah Data Pengajuan Pensiun')

@section('artikel')
    <form action="{{ route('admin.pensiun.update', $pensiun->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3">

            <!-- KIRI -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Nomor Peserta</label>
                    <input type="text" name="idanggota" value="{{ $pensiun->idanggota }}" readonly
                        class="form-control bg-light">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Peserta</label>
                    <input type="text" value="{{ $pensiun->peserta->nama ?? '' }}" readonly
                        class="form-control bg-light">
                </div>

                <div class="mb-3">
                    <label class="form-label">Pekerjaan</label>
                    <input type="text" name="pekerjaan" value="{{ old('pekerjaan', $pensiun->pekerjaan) }}"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">No Pensiun</label>
                    <input type="text" name="nopensiun" value="{{ old('nopensiun', $pensiun->nopensiun) }}"
                        class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Surat Keterangan Tambahan</label>
                    <select id="sk_tambahan" name="sk_tambahan" class="form-select bg-light text-dark border rounded">
                        <option value="" disabled>-- Pilih Surat Keterangan --</option>
                        <option value="SK Kematian" {{ $pensiun->sk_tambahan == 'SK Kematian' ? 'selected' : '' }}>SK
                            Kematian</option>
                        <option value="SK Sakit" {{ $pensiun->sk_tambahan == 'SK Sakit' ? 'selected' : '' }}>SK Sakit
                        </option>
                    </select>
                </div>

                <!-- Bagian Surat Tambahan -->
                <div id="form_sk_tambahan" class="{{ $pensiun->sk_tambahan ? '' : 'd-none' }}">
                    <div class="row g-2">
                        <div class="col-md-6">
                            <label class="form-label">Nomor Surat</label>
                            <input type="text" name="nosuratdari" value="{{ old('nosuratdari', $pensiun->nosuratdari) }}"
                                class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Surat Dari</label>
                            <input type="text" name="suratdari" value="{{ old('suratdari', $pensiun->suratdari) }}"
                                class="form-control">
                        </div>
                    </div>
                    <div class="row g-2 mt-2">
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Surat</label>
                            <input type="date" name="tglsuratdari"
                                value="{{ old('tglsuratdari', $pensiun->tglsuratdari) }}" class="form-control">
                        </div>
                        <div class="col-md-6" id="tgl_meninggal_div"
                            style="{{ $pensiun->sk_tambahan == 'SK Sakit' ? 'display:none;' : '' }}">
                            <label class="form-label">Tanggal Meninggal</label>
                            <input type="date" name="dodt" value="{{ old('dodt', $pensiun->dodt) }}"
                                class="form-control">
                        </div>
                    </div>
                </div>

                <div class="mb-4 mt-3">
                    <label class="form-label">Tanggal Mohon</label>
                    <input type="date" name="tglmohon" value="{{ old('tglmohon', $pensiun->tglmohon) }}"
                        class="form-control" required>
                </div>
            </div>

            <!-- KANAN -->
            <div class="col-md-6">

                <div class="row g-2">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tgllahir"
                            value="{{ old('tgllahir', $pensiun->tgllahir ? date('Y-m-d', strtotime($pensiun->tgllahir)) : '') }}"
                            class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tgl Mulai Kerja</label>
                        <input type="date" name="tmtkeja"
                            value="{{ old('tmtkeja', $pensiun->tmtkeja ? date('Y-m-d', strtotime($pensiun->tmtkeja)) : '') }}"
                            class="form-control">
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" rows="3" class="form-control" required>{{ old('keterangan', $pensiun->keterangan) }}</textarea>
                </div>

                <div class="row g-2">
                    <div class="col-md-6">
                        <label class="form-label">Nomor SK Pensiun</label>
                        <input type="text" name="nosuratberhenti"
                            value="{{ old('nosuratberhenti', $pensiun->nosuratberhenti) }}" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nomor Peserta Pensiun</label>
                        <input type="text" name="nopesertapensiun"
                            value="{{ old('nopesertapensiun', $pensiun->nopesertapensiun) }}" class="form-control"
                            required>
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <label class="form-label">Tgl Pensiun (TMP)</label>
                    <input type="date" name="tmtpensiun" value="{{ old('tmtpensiun', $pensiun->tmtpensiun) }}"
                        class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nilai Variabel</label>
                    <input type="text" name="nilaivariabel"
                        value="{{ old('nilaivariabel', $pensiun->nilaivariabel) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor Agenda DPSK</label>
                    <input type="text" name="noagendadpsk" value="{{ old('noagendadpsk', $pensiun->noagendadpsk) }}"
                        class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Manfaat</label>
                    <select name="statusmanfaat" class="form-select bg-light text-dark border rounded">
                        <option value="Bulanan" {{ $pensiun->statusmanfaat == 'Bulanan' ? 'selected' : '' }}>Bulanan
                        </option>
                        <option value="100%" {{ $pensiun->statusmanfaat == '100%' ? 'selected' : '' }}>100% (Sekaligus)
                        </option>
                        <option value="20%" {{ $pensiun->statusmanfaat == '20%' ? 'selected' : '' }}>20%</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Batas Maksimum MP</label>
                    <input type="text" name="batasmp" value="{{ old('batasmp', $pensiun->batasmp) }}"
                        class="form-control">
                </div>
            </div>

            <!-- TOMBOL -->
            <div class="col-12 text-center mt-4">
                <a href="/pengajuanpensiun" class="btn btn-secondary px-4 me-2">Kembali</a>
                <button type="submit" class="btn text-white px-4" style="background-color:#2994A4;">Perbarui</button>
            </div>

        </div>
    </form>

    <!-- Script Surat Tambahan -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const select = document.getElementById('sk_tambahan');
            const formSection = document.getElementById('form_sk_tambahan');
            const tglMeninggalDiv = document.getElementById('tgl_meninggal_div');

            function toggleForm() {
                const value = select.value;
                if (value === 'SK Kematian') {
                    formSection.classList.remove('d-none');
                    tglMeninggalDiv.style.display = 'block';
                } else if (value === 'SK Sakit') {
                    formSection.classList.remove('d-none');
                    tglMeninggalDiv.style.display = 'none';
                } else {
                    formSection.classList.add('d-none');
                }
            }

            toggleForm();
            select.addEventListener('change', toggleForm);
        });
    </script>
@endsection
