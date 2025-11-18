<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>.:Web - @yield('title'):.!</title>

    <style>
        /* SIDEBAR */
        .sidebar {
            background-color: #2994A4;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 305px;
            z-index: 100;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            scrollbar-width: none;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.15);
            margin: 0;
        }

        .sidebar-header {
            color: white;
            font-weight: bold;
            font-size: 23px;
            padding: 20px 15px 10px;
            line-height: 1.3;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            text-align: left;
            margin-bottom: 15px;
        }

        .sidebar .nav-link {
            color: white;
            font-size: 17px;
            margin-top: 10px;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-radius: 50px;
            transition: all 0.25s ease;
            width: 260px;
            padding-left: 30px;

        }

        .sidebar .nav-link:hover {
            background-color: #1f7c88;
            color: #fff;
            transform: translateX(5px);
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
        }

        .sidebar .nav-link.active {
            background-color: #1f6f82;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
            border-left: 4px solid #fff;
        }

        .nav-link.active-parent {
            background-color: #1f6f82 !important;
            color: #fff !important;
            border-radius: 50px;
            border-left: 4px solid #fff;
        }

        .submenu {
            padding-left: 45px;
            transition: 0.3s;
        }

        .submenu .nav-link {
            font-size: 15px;
            width: 220px;
            background-color: transparent;
            margin-top: 5px;
        }

        .submenu .nav-link:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        .sidebar-footer {
            margin-top: auto;
            color: white;
            font-size: 15px;
            text-align: left;
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            opacity: 0.9;
        }

        .sidebar-footer i {
            margin-right: 6px;
        }

        /* HEADER */
        .header {
            background-color: #FFFFFF;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            padding: 18px 25px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 70px;
            z-index: 50;
            border-bottom-left-radius: 15px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .header .btn {
            border-radius: 8px;
            transition: 0.3s;
        }

        .header .btn:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        /* MAIN CONTENT */
        .main-content {
            margin-left: 300px;
            padding: 20px;
            padding-top: 100px;
            background-color: #f6f9fb;
            min-height: 100vh;
        }

        .content {
            padding: 20px;
        }

        .card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
        }

        .card-header {
            background-color: #fff;
            border-bottom: 2px solid #e9ecef;
        }

        .card-header h4 {
            color: #006d77;
            font-weight: 600;
        }

        .breadcrumb {
            background: transparent;
            padding-left: 0;
            margin-bottom: 15px;
            font-size: 15px;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            color: #6c757d;
        }

        .btn {
            border-radius: 8px;
        }

        .btn-success {
            margin-bottom: 15px;
        }

        .table {
            border-radius: 10px;
            overflow: hidden;
        }

        .table th {
            background-color: #2994A4;
            color: white;
            font-weight: 500;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f9fa;
        }

        @media (max-width: 992px) {
            .sidebar {
                width: 250px;
            }

            .main-content {
                margin-left: 250px;
            }

            .header {
                left: 250px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .main-content {
                margin-left: 0;
                padding-top: 80px;
            }

            .header {
                left: 0;
                right: 0;
            }
        }
    </style>
</head>

<body>
    @php
        // ✅ Fungsi aktif menu & submenu (cukup 1x di sini)
        function isActiveMenu($patterns)
        {
            foreach ((array) $patterns as $pattern) {
                if (request()->is($pattern)) {
                    return true;
                }
            }
            return false;
        }

        function isActiveSubMenu($patterns)
        {
            foreach ((array) $patterns as $pattern) {
                if (request()->is($pattern)) {
                    return 'active';
                }
            }
            return '';
        }
    @endphp

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="sidebar d-flex flex-column">
                <div>
                    <div class="sidebar-header">
                        WEB DANA PENSIUN <br> SEKOLAH KRISTEN
                    </div>

                    <div class="nav flex-column nav-pills">
                        <a class="nav-link {{ request()->is('admin/menu') ? 'active' : '' }}" href="/admin/menu">
                            <i class="bi bi-house-door-fill"></i> Home
                        </a>

                        <!-- PESERTA -->
                        <a class="nav-link {{ request()->is('admin/daftarpeserta*') ||
                        request()->is('daftarpesertaadmin*') ||
                        request()->is('pendaftaranpesertaadmin*') ||
                        request()->is('ubahpesertaadmin*') ||
                        request()->is('detailpesertaadmin*') ||
                        request()->is('tanggunganpesertaadmin*') ||
                        request()->is('ahliwarispesertaadmin*') ||
                        request()->is('tambahkeluarga*') ||
                        request()->is('tambahkeluarga*') ||
                        request()->is('editanggotaahliwarispesertaadmin*')
                            ? 'active'
                            : '' }}"
                            href="{{ route('admin.daftarpeserta') }}">
                            <i class="bi bi-person-lines-fill mr-2"></i> Peserta
                        </a>


                        <!-- MITRA -->
                        @php
                            $mitraPatterns = [
                                'mitradansekolahadmin*',
                                'nilaiaktuariaadmin*',
                                'datanilaiaktuariaadmin*',
                                'nilaiaktuaria*',
                                'listmitraadmin*',
                                'unit/edit*',
                                'mitra/edit*',
                                'inputmitraadmin*',
                                'inputsekolahadmin*',
                                'editmitraadmin*',
                                'bukamitraadmin*',
                            ];
                        @endphp
                        <a class="nav-link d-flex align-items-left {{ isActiveMenu($mitraPatterns) ? 'active-parent' : '' }}"
                            href="#mitraMenu" data-toggle="collapse"
                            aria-expanded="{{ isActiveMenu($mitraPatterns) ? 'true' : 'false' }}">
                            <i class="bi bi-building mr-2"></i> Mitra
                            <i class="bi bi-caret-down-fill ml-auto"></i>
                        </a>
                        <div class="collapse {{ isActiveMenu($mitraPatterns) ? 'show' : '' }}" id="mitraMenu">
                            <div class="submenu">
                                <a class="nav-link {{ isActiveSubMenu([
                                    'mitradansekolahadmin*',
                                    'inputmitraadmin*',
                                    'inputsekolahadmin*',
                                    'listmitraadmin*',
                                    'listmitraadminedit*',
                                    'editmitraadmin*',
                                    'unit/edit*',
                                    'mitra/edit*',
                                ])
                                    ? 'active'
                                    : '' }}"
                                    href="/mitradansekolahadmin">
                                    Mitra & Sekolah
                                </a>


                                <a class="nav-link {{ isActiveSubMenu(['nilaiaktuariaadmin*', 'datanilaiaktuariaadmin*', 'nilaiaktuaria*']) ? 'active' : '' }}"
                                    href="/nilaiaktuariaadmin">
                                    Nilai Aktuaria
                                </a>
                            </div>


                        </div>

                        <!-- KEPERSERTAAN -->
                        @php
                            $kepersertaanPatterns = [
                                'riwayatiuranadmin*',
                                'simulasi*',
                                'editcatat*',
                                'detailmitraadmin*',
                            ];
                        @endphp

                        <a class="nav-link d-flex align-items-left {{ isActiveMenu($kepersertaanPatterns) ? 'active-parent' : '' }}"
                            href="#kepersertaanMenu" data-toggle="collapse"
                            aria-expanded="{{ isActiveMenu($kepersertaanPatterns) ? 'true' : 'false' }}">
                            <i class="bi bi-person-lines-fill mr-2"></i> Kepersertaan
                            <i class="bi bi-caret-down-fill ml-auto"></i>
                        </a>

                        <div class="collapse {{ isActiveMenu($kepersertaanPatterns) ? 'show' : '' }}"
                            id="kepersertaanMenu">
                            <div class="submenu">
                                <a class="nav-link {{ isActiveSubMenu(['riwayatiuranadmin*', 'detailmitraadmin*']) ? 'active' : '' }}"
                                    href="/riwayatiuranadmin">
                                    Iuran Peserta
                                </a>

                                <a class="nav-link {{ isActiveSubMenu(['simulasi*']) ? 'active' : '' }}"
                                    href="/simulasi">
                                    Simulasi Kepersertaan
                                </a>
                            </div>
                        </div>

                        @php
                            // Semua URL kategori Kepensiunan
                            $kepensiunanPatterns = [
                                'pengajuanpensiun*',
                                'formpengajuanpensiunadmin*',
                                'pengubahanpensiun*',
                                'daftarpensiunadmin*',
                                'lihatpensiun*',
                                'pilihpensiun*',
                                'manfaat*',
                                'riwayatmanfaat*',
                                'detailpesertapensiun*',
                                'detailpesertaaktif*',
                                'terminasipensiun*',
                                'editpensiunadmin*',
                                'pensiun/edit*',
                                'pensiun/update*',
                                'cetakmanfaat*',
                            ];
                        @endphp

                        <!-- Parent menu tanpa href -->
                        <a class="nav-link d-flex align-items-left {{ isActiveMenu($kepensiunanPatterns) ? 'active-parent' : '' }}"
                            role="button" data-toggle="collapse" href="#kepensiunanMenu"
                            aria-expanded="{{ isActiveMenu($kepensiunanPatterns) ? 'true' : 'false' }}"
                            aria-controls="kepensiunanMenu">
                            <i class="bi bi-person"></i> Kepensiunan
                            <i class="bi bi-caret-down-fill ml-auto"></i>
                        </a>

                        <!-- Submenu -->
                        <div class="collapse {{ isActiveMenu($kepensiunanPatterns) ? 'show' : '' }}"
                            id="kepensiunanMenu">
                            <div class="submenu">
                                <a class="nav-link {{ isActiveSubMenu(['pengajuanpensiun*', 'formpengajuanpensiunadmin*']) ? 'active' : '' }}"
                                    href="/pengajuanpensiun">
                                    Pengajuan Pensiun
                                </a>

                                <a class="nav-link {{ isActiveSubMenu(['pengubahanpensiun*']) ? 'active' : '' }}"
                                    href="/pengubahanpensiun">
                                    Pengubahan
                                </a>


                                <a class="nav-link {{ isActiveSubMenu(['Kepensiunan*', 'lihatpensiun*']) ? 'active' : '' }}"
                                    href="/lihatpensiun">
                                    Lihat
                                </a>


                                <a class="nav-link {{ isActiveSubMenu(['manfaat*', 'cetakmanfaat*']) ? 'active' : '' }}"
                                    href="/manfaat">
                                    Manfaat
                                </a>

                                <a class="nav-link {{ isActiveSubMenu(['riwayatmanfaat*', 'pilihpensiun*']) ? 'active' : '' }}"
                                    href="/riwayatmanfaat">
                                    Riwayat
                                </a>

                                <a class="nav-link {{ isActiveSubMenu(['terminasipensiun*']) ? 'active' : '' }}"
                                    href="/terminasipensiun">
                                    Terminasi
                                </a>
                            </div>
                        </div>


                        <!-- MASTER -->
                        @php
                            $masterPatterns = [
                                'faktornilai*',
                                'pengguna*',
                                'hakakses*',
                                'indeks*',
                                'sukubunga*',
                                'peraturan*',
                            ];
                        @endphp
                        <a class="nav-link d-flex align-items-left {{ isActiveMenu($masterPatterns) ? 'active-parent' : '' }}"
                            href="#masterMenu" data-toggle="collapse"
                            aria-expanded="{{ isActiveMenu($masterPatterns) ? 'true' : 'false' }}">
                            <i class="bi bi-gear"></i> Master
                            <i class="bi bi-caret-down-fill ml-auto"></i>
                        </a>
                        <div class="collapse {{ isActiveMenu($masterPatterns) ? 'show' : '' }}" id="masterMenu">
                            <div class="submenu">
                                <a class="nav-link {{ isActiveSubMenu(['faktornilai*']) }}" href="/faktornilai">Faktor
                                    Nilai</a>
                                <a class="nav-link {{ isActiveSubMenu(['pengguna*']) }}" href="/pengguna">Pengguna</a>
                                <a class="nav-link {{ isActiveSubMenu(['hakakses*']) }}" href="/hakakses">Hak Akses</a>
                                <a class="nav-link {{ isActiveSubMenu(['indeks*']) }}" href="/indeks">Indeks</a>
                                <a class="nav-link {{ isActiveSubMenu(['sukubunga*']) }}" href="/sukubunga">Suku
                                    Bunga</a>
                                <a class="nav-link {{ isActiveSubMenu(['peraturan*']) }}"
                                    href="/peraturan">Peraturan</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Sidebar -->
                <div class="sidebar-footer">
                    <small class="text-white">
                        <i class="bi bi-building"></i>
                        Fakultas Teknologi Informasi<br>
                        Universitas Kristen Satya Wacana<br>
                        <i class="bi bi-envelope"></i>
                        fti@uksw.edu
                    </small>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 main-content">
            <div class="header">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"
                        style="background-color: #2994A4; color: white;">
                        <i class="bi bi-person-square"></i> User
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">{{ Auth::user()->name ?? '' }}</a>
                        <a class="dropdown-item" href="/logout">Logout</a>
                    </div>
                </div>
            </div>

            <div class="content">
                @yield('breadcrumb')
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">@yield('title')</h4>
                    </div>
                    <div class="card-body">
                        @yield('artikel')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>

    @yield('script')
</body>

</html>
