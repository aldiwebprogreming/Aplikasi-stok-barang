<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
<link href="../css/sb-admin-2.min.css" rel="stylesheet">
<link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">TOKOKU</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="produk.php">
          <i class="fas fa-fw fa-tag"></i>
          <span>Produk</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="data_barang.php">
          <i class="fas fa-fw fa-th"></i>
          <span>Data Barang</span></a>
      </li>

    <hr class="sidebar-divider d-none d-md-block">

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="data_penjualan.php">
          <i class="fas fa-fw fa-list-alt"></i>
          <span>Data Penjualan</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <li class="nav-item">
        <a class="nav-link" href="data_hutang.php">
          <i class="fas fa-fw fa-list-ul"></i>
          <span>Data Hutang</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">


      <li class="nav-item">
        <a class="nav-link" href="akun.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Tambah Akun</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" onclick="return confirm('Apakah kamu yakin ingin keluar ?')" href="logout.php">
          <i class="fas fa-fw-sign-out" aria-hidden="true"></i>
          <span> < Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>