<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <title>.:Web - @yield('title'):.!</title>

  <style>
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
    }

    .sidebar-header {
      color: white;
      font-weight: bold;
      font-size: 23px;
      padding: 20px;
      line-height: 1.3;
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .sidebar .nav {
      margin-top: 10px;
      padding-left: 15px;
    }

    .sidebar .nav-link {
      color: white;
      font-size: 18px;
      margin-top: 10px;
      padding: 15px 20px;
      border-radius: 50px;
      transition: 0.3s;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .sidebar .nav-link:hover {
      background-color: #1f7c88;
      color: #fff;
    }

    .sidebar .nav-link.active {
      background-color: #1f6f82;
    }

    .submenu {
      padding-left: 40px;
    }

    .submenu .nav-link {
      font-size: 15px;
      background-color: transparent;
      margin-top: 5px;
    }

    .submenu .nav-link:hover {
      background: rgba(255, 255, 255, 0.15);
    }

    .sidebar-footer {
      margin-top: auto;
      color: white;
      font-size: 14px;
      padding: 20px;
      border-top: 1px solid rgba(255, 255, 255, 0.2);
    }

    .header {
      background-color: #FFFFFF;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 20px;
      position: fixed;
      top: 0;
      left: 305px;
      right: 0;
      z-index: 999;
    }

    .main-content {
      margin-left: 305px;
      padding: 20px;
      padding-top: 100px;
    }

    .dropdown-menu {
      z-index: 2000 !important;
    }

    .header .dropdown-menu {
      position: absolute;
      top: 100%;
      right: 0;
    }
  </style>
</head>

<body>
  @php
      $key = $key ?? '';
  @endphp

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="sidebar d-flex flex-column">
        <div>
          <div class="sidebar-header">
            DANA PENSIUN <br> SEKOLAH KRISTEN
          </div>

          <div class="nav flex-column">
            <a class="nav-link {{ $key == 'home' ? 'active' : '' }}" href="/home">
              <i class="bi bi-house-door-fill"></i> Home
            </a>

            <a class="nav-link {{ request()->is('peserta*') ? 'active' : '' }}" href="/admin/daftarpeserta">
              <i class="bi bi-person-lines-fill"></i> Peserta
            </a>

            <a class="nav-link d-flex justify-content-between align-items-center"
              data-toggle="collapse" href="#mitraMenu" role="button" aria-expanded="false"
              aria-controls="mitraMenu">
              <span><i class="bi bi-building"></i> Mitra</span>
              <i class="bi bi-caret-down-fill"></i>
            </a>
            <div class="collapse" id="mitraMenu">
              <div class="submenu">
                <a class="nav-link" href="/mitradansekolahadmin"><i class="bi bi-mortarboard"></i> Mitra & Sekolah</a>
                <a class="nav-link" href="/nilaiaktuariaadmin"><i class="bi bi-graph-up"></i> Nilai Aktuaria</a>
              </div>
            </div>

            <a class="nav-link d-flex justify-content-between align-items-center"
              data-toggle="collapse" href="#kepensiunanMenu" role="button" aria-expanded="false"
              aria-controls="kepensiunanMenu">
              <span><i class="bi bi-person"></i> Kepensiunan</span>
              <i class="bi bi-caret-down-fill"></i>
            </a>
            <div class="collapse" id="kepensiunanMenu">
              <div class="submenu">
                <a class="nav-link" href="/pengajuanpensiun"><i class="bi bi-file-earmark-plus"></i> Pengajuan Pensiun</a>
                <a class="nav-link" href="/pengubahanpensiun"><i class="bi bi-pencil-square"></i> Pengubahan Pensiun</a>
                <a class="nav-link" href="/lihatpensiun"><i class="bi bi-eye"></i> Lihat Pensiun</a>
                <a class="nav-link" href="/manfaat"><i class="bi bi-gift"></i> Pemberian Manfaat</a>
                <a class="nav-link" href="/riwayatmanfaat"><i class="bi bi-clock-history"></i> Riwayat Manfaat</a>
                <a class="nav-link" href="/terminasipensiun"><i class="bi bi-list-check"></i> Daftar Terminasi Pensiun</a>
              </div>
            </div>

            <a class="nav-link d-flex justify-content-between align-items-center"
              data-toggle="collapse" href="#masterMenu" role="button" aria-expanded="false"
              aria-controls="masterMenu">
              <span><i class="bi bi-gear"></i> Master</span>
              <i class="bi bi-caret-down-fill"></i>
            </a>
            <div class="collapse" id="masterMenu">
              <div class="submenu">
                <a class="nav-link" href="/faktornilai"><i class="bi bi-calculator"></i> Faktor Nilai</a>
                <a class="nav-link" href="/pengguna"><i class="bi bi-people"></i> Pengguna</a>
                <a class="nav-link" href="/hakakses"><i class="bi bi-shield-lock"></i> Hak Akses</a>
                <a class="nav-link" href="/indeks"><i class="bi bi-bar-chart-line"></i> Indeks</a>
                <a class="nav-link" href="/sukubunga"><i class="bi bi-currency-dollar"></i> Suku Bunga</a>
                <a class="nav-link" href="/peraturan"><i class="bi bi-file-earmark-text"></i> Peraturan</a>
                <a class="nav-link" href="/logout"><i class="bi bi-box-arrow-right"></i> Logout</a>
              </div>
            </div>
          </div>
        </div>

        <div class="sidebar-footer">
          <small>
            <i class="bi bi-building"></i> Gedung Fakultas Teknologi Informasi<br>
            Universitas Kristen Satya Wacana<br>
            Jl. Dr. O. Notohamidjodjo, Blotongan<br>
            Salatiga, 50715, Indonesia<br><br>
            <i class="bi bi-envelope"></i> fti@uksw.edu
          </small>
        </div>
      </div>

      <!-- Main Content -->
      <div class="col-md-10 main-content">
        <div class="header">
          <div class="dropdown float-right">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="bi bi-person-square"></i> User
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">{{ Auth::user()->name ?? '' }}</a>
              <a class="dropdown-item" href="/user">Change Password</a>
              <a class="dropdown-item" href="/logout">Logout</a>
            </div>
          </div>
        </div>

        <div class="content">
          @yield('breadcrumb')
          <div class="card">
            <div class="card-header text-center">
              <h4>@yield('title')</h4>
            </div>
            <div class="card-body">
              @yield('artikel')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Urutan script yang benar -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
</body>

</html>
