<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$id_pengaduan = $_POST['id_pengaduan'];
$tgl_tanggapan = date('Y-m-d');
$tanggapan = $_POST['tanggapan'];
$id_petugas = $_POST['id_petugas'];
$nik = $_POST['nik'];
$status = $_POST['status'];

// menginput data ke database
mysqli_query($koneksi,"insert into tanggapan (id_tanggapan, id_pengaduan, tgl_tanggapan, tanggapan, id_petugas, nik) value (null,'$id_pengaduan','$tgl_tanggapan','$tanggapan','$id_petugas', '$nik')");
mysqli_query($koneksi,"update pengaduan set status='$status' where id_pengaduan='$id_pengaduan'");

// mengalihkan halaman kembali ke index.php
header("location:data_pengaduanbaru.php");

?>