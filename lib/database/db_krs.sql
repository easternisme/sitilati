-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2018 at 02:49 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_krs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE IF NOT EXISTS `tb_dosen` (
  `nik` int(11) NOT NULL,
  `nama_dosen` varchar(100) DEFAULT NULL,
  `nrp` varchar(50) DEFAULT NULL,
  `pangkat` varchar(50) DEFAULT NULL,
  `jenis_kelamin_dosen` enum('pria','wanita') DEFAULT NULL,
  `tempat_lahir_dosen` varchar(30) DEFAULT NULL,
  `tgl_lahir_dosen` date DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `jabatan` varchar(30) DEFAULT NULL,
  `password_dosen` varchar(225) DEFAULT NULL,
  `hak_akses` enum('admin','dosen') DEFAULT NULL,
  `foto_dosen` varchar(50) DEFAULT '../images/user.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`nik`, `nama_dosen`, `nrp`, `pangkat`, `jenis_kelamin_dosen`, `tempat_lahir_dosen`, `tgl_lahir_dosen`, `alamat`, `jabatan`, `password_dosen`, `hak_akses`, `foto_dosen`) VALUES
(1001, 'Memet Sena,SKp MPd', '344353', 'Letkol', 'pria', 'JAKARTA', '1965-02-13', 'PERUM. VILLA MAHKOTA INDAH BLOK E NO.3 TARUMAJAYA BEKASI', 'Direktur', 'cc2c46a59e294797e8483688b28994aa463d4724', 'dosen', '../images/user.png'),
(12345, 'Timur Yulis', NULL, NULL, 'pria', 'Cilacap', '1990-06-17', NULL, NULL, '8cb2237d0679ca88db6464eac60da96345513964', 'admin', '../images/user.png'),
(12346, 'Sulaeman', NULL, NULL, 'pria', NULL, NULL, NULL, NULL, '8cb2237d0679ca88db6464eac60da96345513964', 'dosen', '../images/user.png'),
(1234556, 'Fajar', '1234567', 'Serka', 'pria', 'Magelang', '1980-12-14', 'Rindam Diponegoro Magelang', 'operator komputer', 'dd2220518ac94eca7fc81fbc4dd7176817b64e5c', 'dosen', '../images/user.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kops_surat`
--

CREATE TABLE IF NOT EXISTS `tb_kops_surat` (
  `nim` int(11) DEFAULT NULL,
  `kertas` varchar(1) DEFAULT NULL,
  `baris_1` varchar(50) DEFAULT NULL,
  `baris_2` varchar(50) DEFAULT NULL,
  `margin_kiri_baris_1` int(11) DEFAULT NULL,
  `margin_kiri_baris_2` int(11) DEFAULT NULL,
  `panjang_garis` int(11) DEFAULT NULL,
  `margin_kiri_garis` int(11) DEFAULT NULL,
  `ttd_kota` varchar(50) DEFAULT NULL,
  `ttd_pejabat_1` varchar(50) DEFAULT NULL,
  `ttd_pejabat_2` varchar(50) DEFAULT NULL,
  `ttd_pejabat_3` varchar(50) DEFAULT NULL,
  `ttd_pejabat_4` varchar(50) DEFAULT NULL,
  `ttd_nama` varchar(50) DEFAULT NULL,
  `ttd_pangkat` varchar(20) DEFAULT NULL,
  `ttd_corp` varchar(5) DEFAULT NULL,
  `ttd_nrp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kops_surat`
--

INSERT INTO `tb_kops_surat` (`nim`, `kertas`, `baris_1`, `baris_2`, `margin_kiri_baris_1`, `margin_kiri_baris_2`, `panjang_garis`, `margin_kiri_garis`, `ttd_kota`, `ttd_pejabat_1`, `ttd_pejabat_2`, `ttd_pejabat_3`, `ttd_pejabat_4`, `ttd_nama`, `ttd_pangkat`, `ttd_corp`, `ttd_nrp`) VALUES
(123456, 'L', NULL, NULL, 4, 4, 0, 5, '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_krs`
--

CREATE TABLE IF NOT EXISTS `tb_krs` (
  `id_krs` int(11) NOT NULL,
  `nim` int(11) DEFAULT NULL,
  `id_perkuliahan` int(11) DEFAULT NULL,
  `tingkat` int(11) DEFAULT NULL,
  `nilai` double(3,2) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_krs`
--

INSERT INTO `tb_krs` (`id_krs`, `nim`, `id_perkuliahan`, `tingkat`, `nilai`, `keterangan`) VALUES
(16, 123456, 7, 1, 3.87, NULL),
(17, 123, 7, 1, 3.78, '-'),
(18, 1234567, 7, 1, 3.67, '-'),
(19, 1234567, 10, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `tb_mahasiswa` (
  `nim` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('pria','wanita') DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `password_mhs` varchar(225) DEFAULT NULL,
  `hak_akses` varchar(10) DEFAULT 'mahasiswa',
  `foto_mahasiswa` varchar(50) DEFAULT '../images/user.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`nim`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `password_mhs`, `hak_akses`, `foto_mahasiswa`) VALUES
(123, 'Timur', 'pria', 'jakarta', '1989-07-19', 'Pondok Karadenan Asri', '632914bac8f9c6c390504816f92faca37c6b4014', 'mahasiswa', '../images/user.png'),
(123456, 'Naba Putri Utami', 'wanita', 'BANYUMAS', '0000-00-00', 'Cibinong,jkpaerjkjprajjaio,Jawa Baratr', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'mahasiswa', '../images/user.png'),
(1234567, 'YULISTIO', 'pria', 'CILACAP', '1991-07-17', 'CILODONG', '8e6418a82257d193a675b2d2e9051f5d0b7a0192', 'mahasiswa', '../images/user.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matkul`
--

CREATE TABLE IF NOT EXISTS `tb_matkul` (
  `id_matkul` int(11) NOT NULL,
  `kode_matkul` varchar(20) DEFAULT NULL,
  `nama_matkul` varchar(50) DEFAULT NULL,
  `semester` varchar(3) DEFAULT NULL,
  `sks` varchar(3) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_matkul`
--

INSERT INTO `tb_matkul` (`id_matkul`, `kode_matkul`, `nama_matkul`, `semester`, `sks`) VALUES
(1, 'WAT 1.01.GS', 'Kewarganegaraan', '1', '2'),
(2, 'WAT 1.02.GS', 'Kep.Anak I 2', '2', '2'),
(3, 'WAT 1.03.GS', 'Komputer', '1', '2'),
(4, 'WAT 1.04.GS', 'KMB I', '1', '2'),
(5, 'WAT 1.05.GS', 'Kandungan', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_perkuliahan`
--

CREATE TABLE IF NOT EXISTS `tb_perkuliahan` (
  `id_perkuliahan` int(11) NOT NULL,
  `nik` int(11) DEFAULT NULL,
  `id_matkul` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_perkuliahan`
--

INSERT INTO `tb_perkuliahan` (`id_perkuliahan`, `nik`, `id_matkul`) VALUES
(7, 12345, 1),
(8, 1001, 4),
(9, 1234556, 3),
(10, 12346, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_kops_surat`
--
ALTER TABLE `tb_kops_surat`
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `tb_krs`
--
ALTER TABLE `tb_krs`
  ADD PRIMARY KEY (`id_krs`), ADD KEY `nim` (`nim`), ADD KEY `id_perkuliahan` (`id_perkuliahan`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `tb_perkuliahan`
--
ALTER TABLE `tb_perkuliahan`
  ADD PRIMARY KEY (`id_perkuliahan`), ADD KEY `nik` (`nik`), ADD KEY `id_matkul` (`id_matkul`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_krs`
--
ALTER TABLE `tb_krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_perkuliahan`
--
ALTER TABLE `tb_perkuliahan`
  MODIFY `id_perkuliahan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_kops_surat`
--
ALTER TABLE `tb_kops_surat`
ADD CONSTRAINT `tb_kops_surat_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `tb_mahasiswa` (`nim`);

--
-- Constraints for table `tb_krs`
--
ALTER TABLE `tb_krs`
ADD CONSTRAINT `tb_krs_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `tb_mahasiswa` (`nim`),
ADD CONSTRAINT `tb_krs_ibfk_4` FOREIGN KEY (`id_perkuliahan`) REFERENCES `tb_perkuliahan` (`id_perkuliahan`);

--
-- Constraints for table `tb_perkuliahan`
--
ALTER TABLE `tb_perkuliahan`
ADD CONSTRAINT `tb_perkuliahan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tb_dosen` (`nik`),
ADD CONSTRAINT `tb_perkuliahan_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `tb_matkul` (`id_matkul`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
