-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 03:29 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `tlpn` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `tlpn`) VALUES
('', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', ''),
('2179836317', 'Alfarizi', 'alfa', '56aed7e7485ff03d5605b885b86e947e', '090897867565'),
('3210218330312', 'Winda', 'winda', '05e34fb81599a32b5ff2d9e54a898d09', '098988879787'),
('3213220101010003', 'Ambaro', 'ambaro', 'e4e791328893532c1df1d061e94f46af', '088888888888'),
('3213240009090002', 'Aminudin', 'aminudin', 'a5e2c477deef9c3cb8b78c5f33229a09', '089888888888'),
('32192743892', 'Bambang', 'bambang', 'a9711cbb2e3c2d5fc97a63e45bbe5076', '02349832847'),
('32234784739473', 'Aminah', 'aminah', '90b74c589f46e8f3a484082d659308bd', '0894734736438'),
('5582725539', 'Ridho', 'ridho', '926a161c6419512d711089538c80ac70', '0890789887'),
('9833747507', 'User', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '08');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES
(7, '2023-03-20', '9833747507', 'Terjadi kecelakaan di simpang lima', '72782517_6375fe9f9f619.png', 'selesai'),
(8, '2023-03-20', '5582725539', 'Terjadi kecelakaan beruntun di jl.ibrahim adjie', '1825311161_6375fe9f9f619.png', 'selesai'),
(9, '2023-03-21', '9833747507', 'terjadi kebakaran di cisaranten kulon', '1365550067_download.png', 'selesai'),
(10, '2023-03-21', '9833747507', 'sungai di antapani penuh dengan sampah', '445219624_2905272199.jpg', 'selesai'),
(11, '2023-03-21', '2179836317', 'terjadi banjir di cingised', '1155870522_032607800_1657950015-Jalan_penghubung_Tangerang-Jakarta_terputus_akibat_banjir-ANGGA_2.png', 'selesai'),
(12, '2023-03-21', '2179836317', 'selokan di komplek posgiro tersumbat', '2043639360_1412677598288725604.png', 'selesai'),
(13, '2023-03-22', '3210218330312', 'Polusi udara yang kian meningkat di provinsi DKI Jakarta', '1194093842_1cd54cf1a4e84da87c9872fdfd543b1f.png', 'selesai'),
(14, '2023-03-23', '32234784739473', 'terjadi pembegalan di jalan riau', '505314635_3992130237.png', 'selesai'),
(15, '2023-03-23', '32234784739473', 'seorang ibu-ibu ditabrak lari ole pengendara mobil', '869395084_tabrak-lari-ibu2.png', 'selesai'),
(16, '2023-03-23', '32192743892', 'jalanan di jl. Kertamanah mengalami kerusakan ', '831419427_jalan-lubang-di-sidoarjo-1_43.png', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `nik` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`, `nik`) VALUES
(1, 'Administrator', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', 'admin', ''),
(2, 'Petugas', 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', '', 'petugas', '');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nik` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`, `nik`) VALUES
(3, 1, '2023-01-24', 'Baik Akan kami proses', 1, ''),
(4, 1, '2023-01-24', 'Selesai Kami Proses', 1, ''),
(5, 2, '2023-01-24', 'tunggu kak', 1, ''),
(6, 2, '2023-01-25', 'Selesai kami perbaiki', 2, ''),
(7, 5, '2023-01-25', 'sedang di proses', 1, ''),
(9, 6, '2023-03-19', 'Sudah kami bersihkan dan sudah kami beri arahan untuk tidak membuang sampah sembarang apalagi di sungai', 2, ''),
(11, 7, '2023-03-20', 'sudah kami beri penanganan pada korban kecelakaan, lalu korban juga telah dilarikan ke rumah sakit', 1, ''),
(12, 8, '2023-03-21', 'Sedang kami atasi kecelakaan', 2, ''),
(13, 8, '2023-03-21', 'Sudah kami atasi', 2, ''),
(14, 9, '2023-03-21', 'kami akan mengirimkan pemadam kebakaran', 2, ''),
(15, 9, '2023-03-21', 'kebakaran telah di padamkan dan tidak ada korban jiwa ataupun terluka', 2, ''),
(16, 10, '2023-03-21', 'akan kami kirimkan petugas kebersihan', 1, ''),
(17, 10, '2023-03-21', 'sudah kami bersihkan dan kami himbau untuk tidak membuang sampah di sungai', 1, ''),
(18, 11, '2023-03-21', 'Akan kami kirim relawan untuk membantu warga mengungsi', 2, ''),
(19, 11, '2023-03-21', 'para relawan telah selesai mengevakuasi warga', 2, ''),
(20, 12, '2023-03-21', 'sedang diadakan gotong royong', 1, ''),
(21, 12, '2023-03-23', 'selokan sudah bersih dan tidak ada lag yang tersumbat', 2, '2179836317'),
(22, 12, '2023-03-23', 'selokan telah bersih dan tidak ada lagi sampah yang tersumbat', 2, '2179836317'),
(23, 13, '2023-03-23', 'akan kami upayakan agar dapat mengurangi polusi udara', 2, '3210218330312'),
(24, 13, '2023-03-23', 'kami sudah menghimbau kepada masyarakat untuk menggunakan transportasi umum agar mengurangi dampak polusi berlebih', 2, ''),
(25, 14, '2023-03-23', 'kami akan mencari pelaku begal terkait laporan tersebut', 2, ''),
(26, 13, '2023-03-23', 'kami sudah memberi himbauan kepada masyarakat untuk menggunakan sepeda apabila jarak tempuh terbilang dekat', 2, ''),
(27, 14, '2023-03-23', 'pelaku begal sudah kami amankan dan akan kami beri hukuman yang setimpal', 2, ''),
(28, 15, '2023-03-23', 'akan kami selidiki lebih lanjut terkait laporan dan foto laporan tersebut', 2, '32234784739473'),
(29, 15, '2023-03-23', 'sudah kami tangkap pelaku tabrak lari ', 1, '32234784739473'),
(30, 16, '2023-03-23', '', 2, '32192743892'),
(31, 16, '2023-03-23', 'jalanan berhasil kami perbaiki dan sudah tidak ada lubang lagi', 2, '32192743892');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `nik` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `nik` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
