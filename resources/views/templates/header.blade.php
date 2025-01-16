<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Inventaris</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo-small.png" alt="Logo">
          </div>
        </a>
        <a href="#" class="simple-text logo-normal">Inventaris</a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active">
            <a href="../home">
              <i class="nc-icon nc-bank"></i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#barangInventarisMenu" data-toggle="collapse" aria-expanded="false" class="nav-link">
              <i class="nc-icon nc-box-2"></i>
              <p>Barang Inventaris <b class="caret mt-2"></b></p>
            </a>
            <div id="barangInventarisMenu" class="collapse">
              <ul class="nav">
                <li>
                  <a href="../barang-inventaris">
                    <span class="sidebar-normal">Daftar Barang</span>
                  </a>
                </li>
                <li>
                  <a href="./penerimaan-barang.html">
                    <span class="sidebar-normal">Penerimaan Barang</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a href="#peminjamanBarangMenu" data-toggle="collapse" aria-expanded="false" class="nav-link">
              <i class="nc-icon nc-bookmark-2"></i>
              <p>Peminjaman Barang <b class="caret mt-2"></b></p>
            </a>
            <div id="peminjamanBarangMenu" class="collapse">
              <ul class="nav">
                <li>
                  <a href="./daftar-peminjaman.html">
                    <span class="sidebar-normal">Daftar Peminjaman</span>
                  </a>
                </li>
                <li>
                  <a href="./pengembalian-barang.html">
                    <span class="sidebar-normal">Pengembalian Barang</span>
                  </a>
                </li>
                <li>
                  <a href="./barang-belum-kembali.html">
                    <span class="sidebar-normal">Barang Belum Kembali</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a href="#laporanBarangMenu" data-toggle="collapse" aria-expanded="false" class="nav-link">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Laporan <b class="caret mt-2"></b></p>
            </a>
            <div id="laporanBarangMenu" class="collapse">
              <ul class="nav">
                <li>
                  <a href="./laporan-daftar-barang.html">
                    <span class="sidebar-normal">Laporan Daftar Barang</span>
                  </a>
                </li>
                <li>
                  <a href="./laporan-barang.html">
                    <span class="sidebar-normal">Laporan Barang</span>
                  </a>
                </li>
                <li>
                  <a href="./laporan-status-barang.html">
                    <span class="sidebar-normal">Laporan Status Barang</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <button class="navbar-toggler">
              <span class="navbar-toggler-bar bar1"></span>
              <span class="navbar-toggler-bar bar2"></span>
              <span class="navbar-toggler-bar bar3"></span>
            </button>
            <a class="navbar-brand" href="javascript:;">Halo, User!</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="javascript:;">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="javascript:;">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="content">
        @yield('content')
      </div>
      @include('templates.footer')
    </div>
  </div>
</body>

</html>