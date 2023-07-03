-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2021 at 08:44 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sppkipaw`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `pLogin` (IN `a1` VARCHAR(100), IN `a2` VARCHAR(100))  SELECT * FROM tbl_petugas WHERE username = a1 AND password = a2$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pPetugas` ()  SELECT * FROM tbl_petugas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pPetugasSimpan` (IN `a1` VARCHAR(100), IN `a2` VARCHAR(100), IN `a3` VARCHAR(100), IN `a4` ENUM('admin','petugas'))  INSERT INTO tbl_petugas(username, password, nama_petugas, level) VALUES(a1, a2, a3,a4)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pPetugasUpdate` (IN `a1` VARCHAR(100), IN `a2` VARCHAR(100), IN `a3` VARCHAR(100), IN `a4` ENUM('admin','petugas'), IN `a5` INT)  UPDATE tbl_petugas SET nama_petugas=a1, username=a2, password=a3, level=a4 WHERE id_petugas = a5$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pSiswa` ()  SELECT * FROM tb_siswa INNER JOIN tbl_kelas ON tb_siswa.id_kelas=tbl_kelas.id_kelas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pSiswaDelete` (IN `a1` VARCHAR(100))  DELETE FROM tb_siswa WHERE nisn =a1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pSiswaLogin` (IN `a1` VARCHAR(100), IN `a2` VARCHAR(100))  SELECT * FROM tb_siswa WHERE nisn = a1 AND nis = a2$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PSiswaSimpan` (IN `a1` VARCHAR(100), IN `a2` VARCHAR(100), IN `a3` VARCHAR(100), IN `a4` ENUM('Laki-laki','Perempuan'), IN `a5` INT, IN `a6` VARCHAR(100), IN `a7` VARCHAR(100), IN `a8` VARCHAR(100))  INSERT INTO tb_siswa(nisn, nis, nama, jenis_kelamin, id_kelas, kompetensi_keahlian, alamat, no_telepon) VALUES(a1,a2, a3, a4,a5, a6, a7, a8)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pSiswaUpdate` (IN `a1` VARCHAR(100), IN `a2` INT, IN `a3` VARCHAR(100), IN `a4` VARCHAR(100), IN `a5` VARCHAR(100), IN `a6` VARCHAR(100), IN `a7` ENUM('Laki-laki','Perempuan'))  UPDATE tb_siswa SET nama = a1, id_kelas = a2, kompetensi_keahlian = a3, alamat = a4, no_telepon = a5 , jenis_kelamin=a7 WHERE nisn = a6$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `wali_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`, `wali_kelas`) VALUES
(1, 'RPL XII-B', 'Bu Kartika'),
(4, 'TKJ XII-A', 'bbb');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `nisn` char(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_bayar` varchar(2) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `id_spp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `nisn`, `tgl_bayar`, `bulan_bayar`, `jumlah_bayar`, `id_petugas`, `id_spp`) VALUES
(24, '123', '2021-04-01', '01', 100001, 1, 1);

--
-- Triggers `tbl_pembayaran`
--
DELIMITER $$
CREATE TRIGGER `tBayar` AFTER INSERT ON `tbl_pembayaran` FOR EACH ROW UPDATE tb_siswa SET total_bayar=total_bayar + new.jumlah_bayar WHERE nisn = new.nisn
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tEdit` BEFORE UPDATE ON `tbl_pembayaran` FOR EACH ROW UPDATE tb_siswa SET total_bayar = total_bayar - old.jumlah_bayar + new.jumlah_bayar WHERE nisn= new.nisn
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tHapus` BEFORE DELETE ON `tbl_pembayaran` FOR EACH ROW UPDATE tb_siswa SET total_bayar = total_bayar - old.jumlah_bayar WHERE nisn= old.nisn
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(4, 'petugas', 'petugas', 'petugas', 'petugas'),
(5, '1', '1', '1', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spp`
--

CREATE TABLE `tbl_spp` (
  `idspp` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_spp`
--

INSERT INTO `tbl_spp` (`idspp`, `tahun`, `nominal`) VALUES
(1, 2021, 200000),
(3, 2019, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nisn` char(10) NOT NULL,
  `nis` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nisn`, `nis`, `nama`, `jenis_kelamin`, `id_kelas`, `kompetensi_keahlian`, `alamat`, `no_telepon`, `total_bayar`) VALUES
('123', '123', 'Faishal', 'Laki-laki', 1, 'p', 'p', '00', 100001),
('234', '234', 'Rizal mursidin', 'Perempuan', 4, 'o', 'l', '9', 0),
('345', '345', 'rizal', 'Laki-laki', 1, 'l', 'l', '10', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tbl_spp`
--
ALTER TABLE `tbl_spp`
  ADD PRIMARY KEY (`idspp`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_spp`
--
ALTER TABLE `tbl_spp`
  MODIFY `idspp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD CONSTRAINT `tbl_pembayaran_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `tbl_petugas` (`id_petugas`),
  ADD CONSTRAINT `tbl_pembayaran_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `tb_siswa` (`nisn`),
  ADD CONSTRAINT `tbl_pembayaran_ibfk_3` FOREIGN KEY (`id_spp`) REFERENCES `tbl_spp` (`idspp`);

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
