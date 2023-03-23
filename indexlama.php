<?php 
// session_start();
// if($_SESSION['status']!="login"){
//   header("location:ava.php");
//   header("location:log.php?pesan=belum_login");
// }
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pengaduan Masyarakat</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
        <a href="index.php" class="navbar-brand">
          <img src="assets/dist/img/logopekatcrop.png" alt="PEKAT Logo" class="brand-image img-circle elevation-2" style="opacity: .9">
          <span class="brand-text font-weight-light">PEKAT</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="index.php" class="nav-link">
                <i class="fas fa-home"></i> Home
              </a>
            </li>
            <li class="nav-item">
              <a href="pengaduan.php" class="nav-link">
                <i class="fas fa-newspaper"></i> Tulis Pengaduan
              </a>
            </li>
          </ul>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" href="logout.php">
              <i class="fas fa-door-open"></i> Logout
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Pengaduan Masyarakat</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">

              <div class="card card-success card-outline">
                <div class="card-header">
                  <h5 class="card-title m-0">Home</h5>
                </div>
                <div class="card-body">
                  <?php
                  include "koneksi.php";
                  $masyarakat    =mysqli_query($koneksi, "SELECT * FROM masyarakat where username='$_SESSION[username]'");
                  while($d = mysqli_fetch_array($masyarakat)){
                    ?>
                    <h6 class="card-title">Hai, <b><?=$d['nama']?></b>! Selamat Datang Di Aplikasi Pengaduan Masyarakat</h6>
                  <?php } ?>
                  <p class="card-text">Dengan aplikasi ini, Anda dapat memberikan laporan mengenai masalah-masalah yang terjadi di sekitar Anda dan kami akan bekerja keras untuk menyelesaikan masalah tersebut. Kami sangat menghargai partisipasi Anda dalam membantu meningkatkan kualitas hidup masyarakat.</p>
                  <a href="pengaduan.php" class="btn btn-success">Tulis Pengaduan</a>
                </div>
              </div>
            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; <?= date('Y'); ?> <a href="index.php">PEKAT</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
