<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<title>.:Web - @yield('title'):.!</title>
<style>
    /* === SIDEBAR === */
    .sidebar {
        background-color: #2994A4;
        height: 100vh;
        position: fixed;
        top: 20;
        left: 0;
        width: 305px; /* col-md-2 */
        z-index: 100;
        display: flex;
        flex-direction: column;
        margin-bottom:5px;
    }

    /* Sidebar header */
    .sidebar-header {
        color: white;
        font-weight: bold;
        font-size: 23px;
        margin-left:20px;
        margin-right:20px;
        padding: 20px 15px 10px;
        line-height: 1.3;
        border-bottom: 1px solid rgba(255,255,255,0.2);
    }

    /* Jarak menu utama dari header */
    .sidebar .nav {
        margin-top: 20px;
        padding-left:15px;
    }

    /* Menu utama */
    .sidebar .nav-link {
        color: white;
        font-size: 18px;
        margin-top: 10px;
        padding: 15px 15px;
        display: flex;
        gap: 8px;
        padding-left: 30px;
        display: inline-flex;
        width:270px;
        border-radius: 50px;
        transition: 0.3s;

    }

    .sidebar .nav-link.active {
        background-color: #1f6f82;
    }

    /* Submenu wrapper */
    .submenu {
        padding-left: 40px;   /* selalu menjorok */

    }

    /* Submenu link */
    .sidebar .submenu .nav-link {
        font-size: 15px;
        width: 230px; /* kalau perlu fix width */
        background-color: transparent;
        margin-top:10px;
    }

    /* Hover submenu */
    .sidebar .submenu .nav-link:hover {
        background: rgba(255,255,255,0.15);
    }

    .sidebar .nav-link:hover {
        background-color: #1f7c88; /* warna highlight pas cursor diarahkan */
        color: #fff; /* biar teks tetap kontras */
        border-radius: 50px; /* biar keliatan smooth */
        }

    /* Footer sidebar sticky bawah */
    .sidebar-footer {
        margin-top: auto;
        color: white;
        font-size: 18px;
        text-align: left;
        padding: 25px;
        border-top: 1px solid rgba(255,255,255,0.2);
    }

    /* === HEADER CONTENT === */
    .header {
        background-color: #FFFFFF;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        padding: 20px;
        position: fixed;
        top: 0;
        left: 305px;
        right: 0;
        z-index: 999;
    }

    /* === MAIN CONTENT === */
    .main-content {
        margin-left: 300px;
        padding: 20px;
        padding-top: 100px;
    }

    .content {
        padding: 20px;
    }
</style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column">
        <div>
            <div class="sidebar-header">
                DANA PENSIUN <br> SEKOLAH KRISTEN
            </div>

            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link {{ ($key == 'home') ? 'active' : '' }}" href="/home">
                    <i class="bi bi-house-door-fill"></i> Home
                </a>
                <a class="nav-link {{ ($key == 'peserta') ? 'active' : '' }}" href="/peserta">
                    <i class="bi bi-person-lines-fill"></i>Peserta
                </a>

                <!-- Mitra -->
                <a class="nav-link d-flex align-items-left {{ ($key == 'mitra') ? 'active' : '' }}"
                    href="#"
                    data-toggle="collapse"
                    data-target="#mitraMenu"
                    aria-expanded="false">

                    <i class="bi bi-building mr-2"></i>
                    <span>Mitra</span>
                    <i class="bi bi-caret-down-fill ml-2"></i>
                </a>


                <div class="collapse" id="mitraMenu">
                    <div class="submenu">
                    <a class="nav-link" href="/mitra">
                        <i class="bi bi-mortarboard"></i> Mitra & Sekolah
                    </a>
                    <a class="nav-link" href="/nilaiaktuaria">
                        <i class="bi bi-graph-up"></i> Nilai Aktuaria
                    </a>
                    </div>
                </div>

                <!-- Kepersertaan -->

                <a class="nav-link d-flex align-items-left {{ ($key == 'kepersertaan') ? 'active' : '' }}"
                    href="#"
                    data-toggle="collapse"
                    data-target="#kepersertaanMenu"
                    aria-expanded="false">

                    <i class="bi bi-person-lines-fill mr-2"></i>
                    <span>Kepersertaan</span>
                    <i class="bi bi-caret-down-fill ml-2"></i>
                </a>

                <div class="collapse" id="kepersertaanMenu">
                    <div class="submenu">
                    <a class="nav-link" href="/iuranpeserta">
                        <i class="bi bi-cash"></i>Iuran Peserta
                    </a>
                    <a class="nav-link" href="/simulasi">
                        <i class="bi bi-graph-up"></i>Simulasi Kepersertaan & Manfaat Pensiun
                    </a>
                    </div>
                </div>

                <!-- Kepensiunan -->
                <a class="nav-link d-flex align-items-left {{ ($key == 'kepensiunan') ? 'active' : '' }}"
                    href="#"
                    data-toggle="collapse"
                    data-target="#kepensiunanMenu"
                    aria-expanded="false">

                    <i class="bi bi-person"></i>
                    <span>Kepensiunan</span>
                    <i class="bi bi-caret-down-fill ml-2"></i>
                </a>

                <div class="collapse" id="kepensiunanMenu">
                    <div class="submenu">
                    <a class="nav-link" href="/pengajuanpensiun">
                        <i class="bi bi-file-earmark-plus"></i>Pengajuan Pensiun
                    </a>
                    <a class="nav-link" href="/pengubahanpensiun">
                        <i class="bi bi-pencil-square"></i>Pengubahan Pensiun
                    </a>
                    <a class="nav-link" href="/lihatpensiun">
                        <i class="bi bi-eye"></i>Lihat Pensiun
                    </a>
                    <a class="nav-link" href="/manfaat">
                        <i class="bi bi-gift"></i>Manfaat
                    </a>
                    <a class="nav-link" href="/riwayatmanfaat">
                        <i class="bi bi-gift"></i>Riwayat Manfaat
                    </a>
                    <a class="nav-link" href="/terminasipensiun">
                        <i class="bi bi-gift"></i>Daftar Terminasi Pensiun
                    </a>
                    </div>
                </div>

                <a class="nav-link d-flex align-items-left {{ ($key == 'master') ? 'active' : '' }}"
                    href="#"
                    data-toggle="collapse"
                    data-target="#masterMenu"
                    aria-expanded="false">

                <i class="bi bi-gear"></i>
                    <span>Master</span>
                <i class="bi bi-caret-down-fill ml-2"></i>
                </a>

                <div class="collapse" id="masterMenu">
                    <div class="submenu">
                    <a class="nav-link" href="/faktornilai">
                        <i class="bi bi-calculator"></i> Faktor Nilai
                    </a>
                    <a class="nav-link" href="/pengguna">
                        <i class="bi bi-people"></i> Pengguna
                    </a>
                    <a class="nav-link" href="/hakakses">
                        <i class="bi bi-shield-lock"></i> Hak Akses
                    </a>
                    <a class="nav-link" href="/indeks">
                        <i class="bi bi-bar-chart-line"></i> Indeks
                    </a>
                    <a class="nav-link" href="/sukubunga">
                        <i class="bi bi-currency-dollar"></i> Suku Bunga
                    </a>
                    <a class="nav-link" href="/peraturan">
                        <i class="bi bi-file-earmark-text"></i> Peraturan
                    </a>
                    <a class="nav-link" href="/logout">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                </div>
            </div>



            </div>
        </div>

        <!-- Footer Sidebar -->
        <div class="sidebar-footer">
            <small class="text-white">
                <i class="bi bi-building"></i>
                Gedung Fakultas Teknologi Informasi<br>
                Kampus III Universitas Kristen Satya Wacana<br>
                Jl. Dr.O. Notohamidjodjo<br>
                Blotongan, Sidorejo, Kota Salatiga, 50715<br>
                Indonesia<br>

                <i class="bi bi-envelope"></i>
                fti@uksw.edu
            </small>
        </div>
    </div>

    <!-- Main Content -->
    <div class="col-md-10 main-content">
        <!-- Header content -->
        <div class="header">
            <div class="dropdown float-right">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                    <i class="bi bi-person-square"></i> User
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">{{ Auth::user()->name ?? "" }}</a>
                    <a class="dropdown-item" href="/user">Change Password</a>
                    <a class="dropdown-item" href="/logout">Logout</a>
                </div>
            </div>
        </div>

        <!-- Isi utama -->
        <div class="content">

            <!-- Breadcrumb -->
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
</div>

<!-- Script Bootstrap -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
</body>
</html>
