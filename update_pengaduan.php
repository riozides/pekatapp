<?php
include 'koneksi.php';

$id_pengaduan = $_POST['id_pengaduan'];
$tgl_pengaduan = date('Y-m-d');
$nik = $_POST['nik'];
$isi_laporan = $_POST['isi_laporan'];
$foto = $_FILES['foto']['name'];

if($foto != "") {
	$ekstensi_diperbolehkan = array('png','jpg','jpeg');
	$x = explode('.', $foto);
	$ekstensi = strtolower(end($x));
	$file_tmp = $_FILES['foto']['tmp_name'];   
	$angka_acak     = rand(1,999);
	$nama_foto_baru = $angka_acak.'-'.$foto;
	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
		move_uploaded_file($file_tmp, 'upload/'.$nama_foto_baru);

		$query  = "update pengaduan set tgl_pengaduan='$tgl_pengaduan', nik='$nik', isi_laporan='$isi_laporan', foto='$nama_foto_baru'";
		$query .= "WHERE id_pengaduan = '$id_pengaduan'";
		$result = mysqli_query($koneksi, $query);
		if(!$result){
			die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
				" - ".mysqli_error($koneksi));
		} else {
			echo "<script>alert('Data berhasil diubah.');window.location='pengaduanlagi.php';</script>";
		}
	} else {     
		echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='pengaduanlagi.php';</script>";
	}
} else {
	$query  = "update pengaduan set tgl_pengaduan='$tgl_pengaduan', nik='$nik', isi_laporan='$isi_laporan'";
	$query .= "WHERE id_pengaduan = '$id_pengaduan'";
	$result = mysqli_query($koneksi, $query);
	if(!$result){
		die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
			" - ".mysqli_error($koneksi));
	} else {
		echo "<script>alert('Data berhasil diubah.');window.location='pengaduanlagi.php';</script>";
	}
}
?>