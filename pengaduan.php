<?php 
session_start();
if($_SESSION['status']!="login"){
  header("location:log.php?pesan=belum_login");
}
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
  <title>Aplikasi Pengaduaan Masyarakat</title>

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
          <img src="assets/dist/img/logopekatcrop.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
                  <h5 class="card-title m-0">Tulis Pengaduan</h5>
                </div>
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th style="width: 100px">Foto</th>
                        <th style="width: 200px">Tanggal Pengaduan</th>
                        <th>Isi Laporan</th>
                        <th>Status</th>
                        <th style="width: 100px">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      include "koneksi.php";
                      $masyarakat    =mysqli_query($koneksi, "SELECT * FROM masyarakat where username='$_SESSION[username]'");
                      while($d = mysqli_fetch_array($masyarakat)){
                        $pengaduan    =mysqli_query($koneksi, "SELECT * FROM pengaduan where nik='$d[nik]'");
                        while($d_pengaduan = mysqli_fetch_array($pengaduan)){
                          ?>
                          <tr>
                            <td><?php echo $no++; ?></td>
                            <td><img src="upload/<?=$d_pengaduan['foto']?>" width="100"></td>
                            <td><?=$d_pengaduan['tgl_pengaduan']?></td>
                            <td><?=$d_pengaduan['isi_laporan']?></td>
                            <td>
                              <?php if ($d_pengaduan['status'] == '0') { ?>
                                <span class="badge bg-warning">Menunggu</span>
                              <?php } else if ($d_pengaduan['status'] == 'proses') { ?>
                                <span class="badge bg-primary">Proses</span>
                              <?php } else { ?>
                                <span class="badge bg-success">Selesai</span>
                              <?php } ?>
                            </td>
                            <td>
                              <a href="" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#modal-edit<?=$d_pengaduan['id_pengaduan']?>"><i class="fas fa-edit"></i></a>
                              <a href="hapus_pengaduan.php?id_pengaduan=<?php echo $d_pengaduan['id_pengaduan']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                          </tr>

                          <div class="modal fade" id="modal-edit<?=$d_pengaduan['id_pengaduan']?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Edit Pengaduan</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form method="post" action="update_pengaduan.php" enctype="multipart/form-data">
                                    <div class="card-body">
                                      <div class="form-group">
                                        <label>Isi Laporan</label>
                                        <input type="text" name="id_pengaduan" value="<?=$d_pengaduan['id_pengaduan']?>" hidden>
                                        <input type="text" name="nik" value="<?=$d_pengaduan['nik']?>" hidden>
                                        <textarea class="form-control" name="isi_laporan" rows="3" placeholder="Enter ..."><?=$d_pengaduan['isi_laporan']?></textarea>
                                      </div>
                                      <div class="form-group">
                                        <label>Foto Pengaduan</label>
                                        <img src="upload/<?=$d_pengaduan['foto']?>" width="100">
                                        <input type="file" name="foto" class="form-control">
                                        <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah foto pengaduan</i>
                                      </div>
                                    </div>                                  
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                    <button type="submit" class="btn btn-primary">Simpan Pengaduan</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php }} ?>
                      </tbody>
                    </table>                  
                  </div>
                  <div class="card-footer">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
                      Tambah Pengaduan
                    </button>
                  </div>
                </div>



                <?php
                include "koneksi.php";
                $masyarakat    =mysqli_query($koneksi, "SELECT * FROM masyarakat where username='$_SESSION[username]'");
                while($d = mysqli_fetch_array($masyarakat)){
                  ?>
                  <div class="modal fade" id="modal-tambah">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Tambah Pengaduan</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="simpan_pengaduan.php" enctype="multipart/form-data">
                            <div class="card-body">
                              <div class="form-group">
                                <label>Isi Laporan</label>
                                <input type="text" name="nik" value="<?=$d['nik']?>" hidden>
                                <textarea class="form-control" name="isi_laporan" rows="3" placeholder="Enter ..."></textarea>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputFile">Upload Foto</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" name="foto" class="form-control" accept="image/png, image/gif, image/jpeg">
                                  </div>
                                </div>
                              </div>
                            </div>                            
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-primary">Simpan Pengaduan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php } ?>

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
        <strong>Copyright &copy; <?= date('Y'); ?> <a href="pengaduan.php">PEKAT</a>.</strong> All rights reserved.
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
