@extends('ADMIN.layouts.main')

@section('title', isset($pensiun) ? 'Edit Pengajuan Pensiun' : 'Form Edit Pensiun')

@section('breadcrumb')
    <p class="text-muted" style="font-size: 14px;">
        <a href="{{ route('admin.menu') }}" style="text-decoration:none; color:#555;">
            Home
        </a> /
        <a href="{{ route('daftarpesertaaktif') }}" style="text-decoration:none; color:#555;">
            Pengubahan Pensiun
        </a> /
        <a href="{{ route('admin.editpensiun.edit', ['id' => $pensiun->idpensiun]) }}" style="color: #2994A4;">
            Edit Pensiun
        </a>


    </p>
@endsection

@section('artikel')

    <form
        action="{{ isset($pensiun) ? route('admin.editpensiun.update', $pensiun->idpensiun) : route('admin.editpensiun.store') }}"
        method="POST">
        @csrf
        @if (isset($pensiun))
            @method('PUT')
        @endif

        <div class="row">
            <!-- KIRI -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label>Nomor Peserta</label>
                    <input type="text" name="idanggota" value="{{ $pensiun->idanggota ?? $peserta->idanggota }}" readonly
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label>Nama Peserta</label>
                    <input type="text" value="{{ $peserta->nama }}" readonly class="form-control">
                </div>

                <div class="mb-3">
                    <label>Pekerjaan</label>
                    <input type="text" name="pekerjaan" value="{{ $pensiun->pekerjaan ?? 'GURU' }}" class="form-control"
                        readonly>
                </div>

                <div class="mb-3">
                    <label>No Pensiun</label>
                    <input type="text" name="nopensiun" value="{{ $pensiun->nopensiun ?? '' }}" class="form-control"
                        required>
                </div>

                <div class="mb-3">
                    <label>Status Pensiun</label>
                    <select name="statuspensiun" id="statuspensiun" class="form-control">
                        <option value="Normal" {{ ($pensiun->statuspensiun ?? '') == 'Normal' ? 'selected' : '' }}>Normal
                        </option>
                        <option value="Janda" {{ ($pensiun->statuspensiun ?? '') == 'Janda' ? 'selected' : '' }}>Janda
                        </option>
                        <option value="Duda" {{ ($pensiun->statuspensiun ?? '') == 'Duda' ? 'selected' : '' }}>Duda
                        </option>
                        <option value="Anak" {{ ($pensiun->statuspensiun ?? '') == 'Anak' ? 'selected' : '' }}>Anak
                        </option>
                    </select>
                </div>

                <div id="form_sk_tambahan" class="mb-3" style="display:none;">
                    <div class="row g-2">
                        <div class="col">
                            <label>Nomor Surat</label>
                            <input type="text" name="nosuratdari" value="{{ $pensiun->nosuratdari ?? '' }}"
                                class="form-control">
                        </div>
                        <div class="col">
                            <label>Surat Dari</label>
                            <input type="text" name="suratdari" value="{{ $pensiun->suratdari ?? '' }}"
                                class="form-control">
                        </div>
                    </div>

                    <div class="row g-2 mt-2">
                        <div class="col">
                            <label>Tanggal Surat</label>
                            <input type="date" name="tglsuratdari"
                                value="{{ isset($pensiun->tglsuratdari) ? date('Y-m-d', strtotime($pensiun->tglsuratdari)) : '' }}"
                                class="form-control">
                        </div>
                        <div class="col" id="tgl_meninggal_div">
                            <label>Tanggal Meninggal</label>
                            <input type="date" name="dodt"
                                value="{{ isset($pensiun->dodt) ? date('Y-m-d', strtotime($pensiun->dodt)) : '' }}"
                                class="form-control">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Tanggal Mohon</label>
                    <input type="date" name="tglmohon"
                        value="{{ isset($pensiun->tglmohon) ? date('Y-m-d', strtotime($pensiun->tglmohon)) : '' }}"
                        class="form-control" required>
                </div>
            </div>

            <!-- KANAN -->
            <div class="col-md-6">
                <div class="row g-2 mb-3">
                    <div class="col">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgllahir"
                            value="{{ $peserta->tgllahir ? date('Y-m-d', strtotime($peserta->tgllahir)) : '' }}" readonly
                            class="form-control">
                    </div>
                    <div class="col">
                        <label>TMT Kerja</label>
                        <input type="date" name="tmtkeja"
                            value="{{ $peserta->tmtkeja ? date('Y-m-d', strtotime($peserta->tmtkeja)) : '' }}"
                            class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label>Nomor SK Pensiun</label>
                    <input type="text" name="nosuratberhenti" value="{{ $pensiun->nosuratberhenti ?? '' }}"
                        class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Tgl Pensiun (TMP)</label>
                    <input type="date" name="tmtpensiun"
                        value="{{ isset($pensiun->tmtpensiun) ? date('Y-m-d', strtotime($pensiun->tmtpensiun)) : '' }}"
                        class="form-control" required>
                </div>


                <div class="mb-3">
                    <label>Nomor Agenda DPSK</label>
                    <input type="text" name="noagendadpsk" value="{{ $pensiun->noagendadpsk ?? '' }}"
                        class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Jenis Manfaat</label>
                    <select name="statusmanfaat" class="form-control">
                        <option value="Bulanan" {{ ($pensiun->statusmanfaat ?? '') == 'Bulanan' ? 'selected' : '' }}>
                            Bulanan</option>
                        <option value="100%" {{ ($pensiun->statusmanfaat ?? '') == '100%' ? 'selected' : '' }}>100%
                        </option>
                        <option value="20%" {{ ($pensiun->statusmanfaat ?? '') == '20%' ? 'selected' : '' }}>20%
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Batas maksimum MP</label>
                    <input type="text" name="batasmp" value="{{ $pensiun->batasmp ?? '2000000' }}"
                        class="form-control">
                </div>
            </div>

            <!-- Tombol Kembali dan Simpan di tengah dengan jarak -->
            <div class="col-12 d-flex justify-content-center mt-4" style="gap:12px;">
                <a href="{{ url()->previous() }}" class="btn btn-secondary px-4 py-2">Kembali</a>
                <button type="submit" class="btn text-white px-4 py-2" style="background-color:#2994A4;">
                    {{ isset($pensiun) ? 'Update Data' : 'Simpan' }}
                </button>
            </div>


        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const select = document.getElementById('sk_tambahan');
            const formSection = document.getElementById('form_sk_tambahan');
            const tglMeninggalDiv = document.getElementById('tgl_meninggal_div');

            function toggleForm() {
                const value = select.value;
                if (value === 'SK Kematian') {
                    formSection.style.display = 'block';
                    tglMeninggalDiv.style.display = 'block';
                } else if (value === 'SK Sakit') {
                    formSection.style.display = 'block';
                    tglMeninggalDiv.style.display = 'none';
                } else {
                    formSection.style.display = 'none';
                }
            }

            toggleForm();
            select.addEventListener('change', toggleForm);
        });
    </script>
@endsection
