-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2022 at 04:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rekam`
--

-- --------------------------------------------------------

--
-- Table structure for table `grik`
--

CREATE TABLE `grik` (
  `id_pasien` varchar(100) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grik`
--

INSERT INTO `grik` (`id_pasien`, `nama_pasien`) VALUES
('PWSGRK00001', 'EE'),
('PWSGRK00002', 'FF'),
('PWSGRK00003', 'GG'),
('PWSGRK00004', 'HH'),
('PWSGRK00005', 'II'),
('PWSGRK00006', 'JJ'),
('PWSGRK00007', 'KK'),
('PWSGRK00008', 'LL'),
('PWSGRK00009', 'MM'),
('PWSGRK00010', 'NN');

-- --------------------------------------------------------

--
-- Table structure for table `pangkor`
--

CREATE TABLE `pangkor` (
  `id_pasien` varchar(100) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pangkor`
--

INSERT INTO `pangkor` (`id_pasien`, `nama_pasien`) VALUES
('PWSPKR00001', 'U'),
('PWSPKR00002', 'V'),
('PWSPKR00003', 'W'),
('PWSPKR00004', 'X'),
('PWSPKR00005', 'Y'),
('PWSPKR00006', 'Z'),
('PWSPKR00007', 'AA'),
('PWSPKR00008', 'BB'),
('PWSPKR00009', 'CC'),
('PWSPKR00010', 'DD');

-- --------------------------------------------------------

--
-- Table structure for table `pasirsalak`
--

CREATE TABLE `pasirsalak` (
  `id_pasien` varchar(100) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasirsalak`
--

INSERT INTO `pasirsalak` (`id_pasien`, `nama_pasien`) VALUES
('PWSPSL00001', 'K'),
('PWSPSL00002', 'L'),
('PWSPSL00003', 'M'),
('PWSPSL00004', 'N'),
('PWSPSL00005', 'O'),
('PWSPSL00006', 'P'),
('PWSPSL00007', 'Q'),
('PWSPSL00008', 'R'),
('PWSPSL00009', 'S'),
('PWSPSL00010', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `pom`
--

CREATE TABLE `pom` (
  `id_pasien` varchar(100) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pom`
--

INSERT INTO `pom` (`id_pasien`, `nama_pasien`) VALUES
('PWSPOM0001', 'OO'),
('PWSPOM0002', 'PP'),
('PWSPOM0003', 'QQ'),
('PWSPOM0004', 'RR'),
('PWSPOM0005', 'SS'),
('PWSPOM0006', 'TT'),
('PWSPOM0007', 'UU'),
('PWSPOM0008', 'VV'),
('PWSPOM0009', 'WW'),
('PWSPOM0010', 'XX');

-- --------------------------------------------------------

--
-- Table structure for table `ro`
--

CREATE TABLE `ro` (
  `id_pasien` varchar(100) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ro`
--

INSERT INTO `ro` (`id_pasien`, `nama_pasien`) VALUES
('PWSROF00001', 'A'),
('PWSROF00002', 'B'),
('PWSROF00003', 'C'),
('PWSROF00004', 'D'),
('PWSROF00005', 'E'),
('PWSROF00006', 'F'),
('PWSROF00007', 'G'),
('PWSROF00008', 'H'),
('PWSROF00009', 'I'),
('PWSROF00010', 'J');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diagnosa`
--

CREATE TABLE `tbl_diagnosa` (
  `id_diagnosa` varchar(50) NOT NULL,
  `id_pasien` varchar(20) NOT NULL,
  `id_pendaftaran` varchar(20) NOT NULL,
  `pemeriksaan` varchar(200) NOT NULL,
  `diagnosa` text NOT NULL,
  `terapi` varchar(200) NOT NULL,
  `resep` varchar(200) NOT NULL,
  `status` varchar(15) NOT NULL,
  `tgl_diagnosa` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_diagnosa`
--

INSERT INTO `tbl_diagnosa` (`id_diagnosa`, `id_pasien`, `id_pendaftaran`, `pemeriksaan`, `diagnosa`, `terapi`, `resep`, `status`, `tgl_diagnosa`) VALUES
('PWSDNA00001', 'PWSROF00002', 'PWSPDF00002', 'a', 'BATUK.', 'a', 'a', 'resep', '2022-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id` int(11) NOT NULL,
  `id_pasien` varchar(20) NOT NULL,
  `id_author` int(10) NOT NULL,
  `nik` bigint(20) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `jk` char(10) NOT NULL,
  `no_bpjs` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `umur` int(10) NOT NULL,
  `status_pasien` varchar(25) NOT NULL,
  `nama_pekerja` varchar(50) NOT NULL,
  `jabatan_pekerja` varchar(25) NOT NULL,
  `status_pekerja` varchar(25) NOT NULL,
  `nohp_pekerja` varchar(15) NOT NULL,
  `estate` varchar(20) NOT NULL,
  `op` varchar(20) NOT NULL,
  `author` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`id`, `id_pasien`, `id_author`, `nik`, `nama_pasien`, `jk`, `no_bpjs`, `tgl_lahir`, `umur`, `status_pasien`, `nama_pekerja`, `jabatan_pekerja`, `status_pekerja`, `nohp_pekerja`, `estate`, `op`, `author`) VALUES
(49, 'PWSPOM0009', 5, 148, 'WW', 'Laki-laki', '10048', '2022-07-19', 58, 'Pekerja', 'WW', 'EP', 'BHL', '6285254043088', 'PKS', 'PKS', 'perawat'),
(1, 'PWSROF00001', 5, 100, 'A', 'Laki-laki', '10000', '2022-06-01', 10, 'Pekerja', 'A', 'Act. Askep', 'Executive', '6285254043040', 'Regional Office', 'Regional Office', 'perawat'),
(2, 'PWSROF00002', 5, 101, 'B', 'Perempuan', '10001', '2022-06-02', 11, 'Suami/Istri', 'B', 'Act. Manager', 'PB', '6285254043041', 'Regional Office', 'Regional Office', 'perawat'),
(3, 'PWSROF00003', 5, 102, 'C', 'Laki-laki', '10002', '2022-06-03', 12, 'Keluarga Tambahan', 'C', 'Adm. Kebun', 'PGHT', '6285254043042', 'Regional Office', 'Regional Office', 'perawat'),
(4, 'PWSROF00004', 5, 103, 'D', 'Perempuan', '10003', '2022-06-04', 13, 'Anak Pekerja', 'D', 'Analis Laboratorium', 'BHL', '6285254043043', 'Regional Office', 'Regional Office', 'perawat'),
(5, 'PWSROF00005', 5, 104, 'E', 'Laki-laki', '10004', '2022-06-05', 14, 'Pekerja', 'E', 'Anggota', 'BRG', '6285254043044', 'Regional Office', 'Regional Office', 'perawat'),
(6, 'PWSROF00006', 5, 105, 'F', 'Perempuan', '10005', '2022-06-06', 15, 'Suami/Istri', 'F', 'Askep', 'Executive', '6285254043045', 'Regional Office', 'Regional Office', 'perawat'),
(7, 'PWSROF00007', 5, 106, 'G', 'Laki-laki', '10006', '2022-06-07', 16, 'Keluarga Tambahan', 'G', 'Assistant', 'PB', '6285254043046', 'Regional Office', 'Regional Office', 'perawat'),
(8, 'PWSROF00008', 5, 107, 'H', 'Perempuan', '10007', '2022-06-08', 17, 'Anak Pekerja', 'H', 'Bidan', 'PGHT', '6285254043047', 'Regional Office', 'Regional Office', 'perawat'),
(9, 'PWSROF00009', 5, 108, 'I', 'Laki-laki', '10008', '2022-06-09', 18, 'Pekerja', 'I', 'Bilal Masjid', 'BHL', '6285254043048', 'Regional Office', 'Regional Office', 'perawat'),
(10, 'PWSROF00010', 5, 109, 'J', 'Perempuan', '10009', '2022-06-10', 19, 'Suami/Istri', 'J', 'Danru', 'BRG', '6285254043049', 'Regional Office', 'Regional Office', 'perawat'),
(11, 'PWSPSL00001', 5, 110, 'K', 'Laki-laki', '10010', '2022-06-11', 20, 'Keluarga Tambahan', 'K', 'Danton', 'Executive', '6285254043050', 'Pasir Salak', 'OP 96', 'perawat'),
(12, 'PWSPSL00002', 5, 111, 'L', 'Perempuan', '10011', '2022-06-12', 21, 'Anak Pekerja', 'L', 'DED', 'PB', '6285254043051', 'Pasir Salak', 'OP 97 A', 'perawat'),
(13, 'PWSPSL00003', 5, 112, 'M', 'Laki-laki', '10012', '2022-06-13', 22, 'Pekerja', 'M', 'DGM', 'PGHT', '6285254043052', 'Pasir Salak', 'OP 97 B', 'perawat'),
(14, 'PWSPSL00004', 5, 113, 'N', 'Perempuan', '10013', '2022-06-14', 23, 'Suami/Istri', 'N', 'Dokter', 'BHL', '6285254043053', 'Pasir Salak', 'OP 97 C', 'perawat'),
(15, 'PWSPSL00005', 5, 114, 'O', 'Laki-laki', '10014', '2022-06-15', 24, 'Keluarga Tambahan', 'O', 'EP', 'BRG', '6285254043054', 'Pasir Salak', 'OP 97 D', 'perawat'),
(16, 'PWSPSL00006', 5, 115, 'P', 'Perempuan', '10015', '2022-06-16', 25, 'Anak Pekerja', 'P', 'Electrical', 'Executive', '6285254043055', 'Pasir Salak', 'OP 98 A', 'perawat'),
(17, 'PWSPSL00007', 5, 116, 'Q', 'Laki-laki', '10016', '2022-06-17', 26, 'Pekerja', 'Q', 'Assistant', 'PB', '6285254043056', 'Pasir Salak', 'OP 96', 'perawat'),
(18, 'PWSPSL00008', 5, 117, 'R', 'Perempuan', '10017', '2022-06-18', 27, 'Suami/Istri', 'R', 'Act. Askep', 'PGHT', '6285254043057', 'Pasir Salak', 'OP 97 A', 'perawat'),
(19, 'PWSPSL00009', 5, 118, 'S', 'Laki-laki', '10018', '2022-06-19', 28, 'Keluarga Tambahan', 'S', 'Act. Manager', 'BHL', '6285254043058', 'Pasir Salak', 'OP 97 B', 'perawat'),
(20, 'PWSPSL00010', 5, 119, 'T', 'Perempuan', '10019', '2022-06-20', 29, 'Anak Pekerja', 'T', 'Adm. Kebun', 'BRG', '6285254043059', 'Pasir Salak', 'OP 97 C', 'perawat'),
(21, 'PWSPKR00001', 5, 120, 'U', 'Laki-laki', '10020', '2022-06-21', 30, 'Pekerja', 'U', 'Analis Laboratorium', 'Executive', '6285254043060', 'Pangkor', 'OP 98 B', 'perawat'),
(22, 'PWSPKR00002', 5, 121, 'V', 'Perempuan', '10021', '2022-06-22', 31, 'Suami/Istri', 'V', 'Anggota', 'PB', '6285254043061', 'Pangkor', 'OP 98 C', 'perawat'),
(23, 'PWSPKR00003', 5, 122, 'W', 'Laki-laki', '10022', '2022-06-23', 32, 'Keluarga Tambahan', 'W', 'Askep', 'PGHT', '6285254043062', 'Pangkor', 'OP 98 D', 'perawat'),
(24, 'PWSPKR00004', 5, 123, 'X', 'Perempuan', '10023', '2022-06-24', 33, 'Anak Pekerja', 'X', 'Assistant', 'BHL', '6285254043063', 'Pangkor', 'OP 99', 'perawat'),
(25, 'PWSPKR00005', 5, 124, 'Y', 'Laki-laki', '10024', '2022-06-25', 34, 'Pekerja', 'Y', 'Bidan', 'BRG', '6285254043064', 'Pangkor', 'OP 2007 B', 'perawat'),
(26, 'PWSPKR00006', 5, 125, 'Z', 'Perempuan', '10025', '2022-06-26', 35, 'Suami/Istri', 'Z', 'Bilal Masjid', 'Executive', '6285254043065', 'Pangkor', 'OP 2008', 'perawat'),
(27, 'PWSPKR00007', 5, 126, 'AA', 'Laki-laki', '10026', '2022-06-27', 36, 'Keluarga Tambahan', 'AA', 'Danru', 'PB', '6285254043066', 'Pangkor', 'OP 98 B', 'perawat'),
(28, 'PWSPKR00008', 5, 127, 'BB', 'Perempuan', '10027', '2022-06-28', 37, 'Anak Pekerja', 'BB', 'Danton', 'PGHT', '6285254043067', 'Pangkor', 'OP 98 C', 'perawat'),
(29, 'PWSPKR00009', 5, 128, 'CC', 'Laki-laki', '10028', '2022-06-29', 38, 'Pekerja', 'CC', 'DED', 'BHL', '6285254043068', 'Pangkor', 'OP 98 D', 'perawat'),
(30, 'PWSPKR00010', 5, 129, 'DD', 'Perempuan', '10029', '2022-06-30', 39, 'Suami/Istri', 'DD', 'DGM', 'BRG', '6285254043069', 'Pangkor', 'OP 99', 'perawat'),
(31, 'PWSGRK00001', 5, 130, 'EE', 'Laki-laki', '10030', '2022-07-01', 40, 'Keluarga Tambahan', 'EE', 'Dokter', 'Executive', '6285254043070', 'Grik', 'OP 2003/2004', 'perawat'),
(32, 'PWSGRK00002', 5, 131, 'FF', 'Perempuan', '10031', '2022-07-02', 41, 'Anak Pekerja', 'FF', 'EP', 'PB', '6285254043071', 'Grik', 'OP 2005 A', 'perawat'),
(33, 'PWSGRK00003', 5, 132, 'GG', 'Laki-laki', '10032', '2022-07-03', 42, 'Pekerja', 'GG', 'Electrical', 'PGHT', '6285254043072', 'Grik', 'OP 2005 B', 'perawat'),
(34, 'PWSGRK00004', 5, 133, 'HH', 'Perempuan', '10033', '2022-07-04', 43, 'Suami/Istri', 'HH', 'Assistant', 'BHL', '6285254043073', 'Grik', 'OP 2006 A', 'perawat'),
(35, 'PWSGRK00005', 5, 134, 'II', 'Laki-laki', '10034', '2022-07-05', 44, 'Keluarga Tambahan', 'II', 'Act. Askep', 'BRG', '6285254043074', 'Grik', 'OP 2006 B', 'perawat'),
(36, 'PWSGRK00006', 5, 135, 'JJ', 'Perempuan', '10035', '2022-07-06', 45, 'Anak Pekerja', 'JJ', 'Act. Manager', 'Executive', '6285254043075', 'Grik', 'OP 2007 A', 'perawat'),
(37, 'PWSGRK00007', 5, 136, 'KK', 'Laki-laki', '10036', '2022-07-07', 46, 'Pekerja', 'KK', 'Adm. Kebun', 'PB', '6285254043076', 'Grik', 'OP 2003/2004', 'perawat'),
(38, 'PWSGRK00008', 5, 137, 'LL', 'Perempuan', '10037', '2022-07-08', 47, 'Suami/Istri', 'LL', 'Analis Laboratorium', 'PGHT', '6285254043077', 'Grik', 'OP 2005 A', 'perawat'),
(39, 'PWSGRK00009', 5, 138, 'MM', 'Laki-laki', '10038', '2022-07-09', 48, 'Keluarga Tambahan', 'MM', 'Anggota', 'BHL', '6285254043078', 'Grik', 'OP 2005 B', 'perawat'),
(40, 'PWSGRK00010', 5, 139, 'NN', 'Perempuan', '10039', '2022-07-10', 49, 'Anak Pekerja', 'NN', 'Askep', 'BRG', '6285254043079', 'Grik', 'OP 2006 A', 'perawat'),
(41, 'PWSPOM0001', 5, 140, 'OO', 'Laki-laki', '10040', '2022-07-11', 50, 'Pekerja', 'OO', 'Assistant', 'Executive', '6285254043080', 'PKS', 'PKS', 'perawat'),
(42, 'PWSPOM0002', 5, 141, 'PP', 'Perempuan', '10041', '2022-07-12', 51, 'Suami/Istri', 'PP', 'Bidan', 'PB', '6285254043081', 'PKS', 'PKS', 'perawat'),
(43, 'PWSPOM0003', 5, 142, 'QQ', 'Laki-laki', '10042', '2022-07-13', 52, 'Keluarga Tambahan', 'QQ', 'Bilal Masjid', 'PGHT', '6285254043082', 'PKS', 'PKS', 'perawat'),
(44, 'PWSPOM0004', 5, 143, 'RR', 'Perempuan', '10043', '2022-07-14', 53, 'Anak Pekerja', 'RR', 'Danru', 'BHL', '6285254043083', 'PKS', 'PKS', 'perawat'),
(45, 'PWSPOM0005', 5, 144, 'SS', 'Laki-laki', '10044', '2022-07-15', 54, 'Pekerja', 'SS', 'Danton', 'BRG', '6285254043084', 'PKS', 'PKS', 'perawat'),
(46, 'PWSPOM0006', 5, 145, 'TT', 'Perempuan', '10045', '2022-07-16', 55, 'Suami/Istri', 'TT', 'DED', 'Executive', '6285254043085', 'PKS', 'PKS', 'perawat'),
(47, 'PWSPOM0007', 5, 146, 'UU', 'Laki-laki', '10046', '2022-07-17', 56, 'Keluarga Tambahan', 'UU', 'DGM', 'PB', '6285254043086', 'PKS', 'PKS', 'perawat'),
(48, 'PWSPOM0008', 5, 147, 'VV', 'Perempuan', '10047', '2022-07-18', 57, 'Anak Pekerja', 'VV', 'Dokter', 'PGHT', '6285254043087', 'PKS', 'PKS', 'perawat'),
(50, 'PWSPOM0010', 5, 149, 'XX', 'Perempuan', '10049', '2022-07-20', 59, 'Suami/Istri', 'XX', 'Electrical', 'BRG', '6285254043089', 'PKS', 'PKS', 'perawat'),
(51, 'PWSUMM00001', 5, 150, 'ZZ', 'Laki-laki', '10050', '2022-07-21', 60, 'Umum', 'ZZ', 'Umum', 'Umum', '6285254043080', 'Umum', 'Umum', 'perawat'),
(52, 'PWSUMM00002', 5, 151, 'AAA', 'Perempuan', '10051', '2022-07-22', 61, 'Umum', 'AAA', 'Umum', 'Umum', '6285254043081', 'Umum', 'Umum', 'perawat'),
(53, 'PWSUMM00003', 5, 152, 'BBB', 'Laki-laki', '10052', '2022-07-23', 62, 'Umum', 'BBB', 'Umum', 'Umum', '6285254043082', 'Umum', 'Umum', 'perawat'),
(55, 'PWSUMM00005', 5, 154, 'DDD', 'Laki-laki', '10054', '2022-07-25', 64, 'Umum', 'DDD', 'Umum', 'Umum', '6285254043084', 'Umum', 'Umum', 'perawat'),
(56, 'PWSUMM00006', 5, 155, 'EEE', 'Perempuan', '10055', '2022-07-26', 65, 'Umum', 'EEE', 'Umum', 'Umum', '6285254043085', 'Umum', 'Umum', 'perawat'),
(57, 'PWSUMM00007', 5, 156, 'FFF', 'Laki-laki', '10056', '2022-07-27', 66, 'Umum', 'FFF', 'Umum', 'Umum', '6285254043086', 'Umum', 'Umum', 'perawat'),
(58, 'PWSUMM00008', 5, 157, 'GGG', 'Perempuan', '10057', '2022-07-28', 67, 'Umum', 'GGG', 'Umum', 'Umum', '6285254043087', 'Umum', 'Umum', 'perawat'),
(59, 'PWSUMM00009', 5, 158, 'HHH', 'Laki-laki', '10058', '2022-07-29', 68, 'Umum', 'HHH', 'Umum', 'Umum', '6285254043088', 'Umum', 'Umum', 'perawat'),
(60, 'PWSUMM00010', 5, 159, 'III', 'Perempuan', '10059', '2022-07-30', 69, 'Umum', 'III', 'Umum', 'Umum', '6285254043089', 'Umum', 'Umum', 'perawat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `id_pendaftaran` varchar(20) NOT NULL,
  `id_pasien` varchar(25) NOT NULL,
  `id_author` int(10) NOT NULL,
  `tanggal_pendaftaran` date NOT NULL,
  `jam_b` time NOT NULL,
  `tinggi_badan` char(3) NOT NULL,
  `berat_badan` char(3) NOT NULL,
  `lingkar_perut` char(3) NOT NULL,
  `tensi_darah` varchar(15) NOT NULL,
  `suhu` char(5) NOT NULL,
  `nadi` char(10) NOT NULL,
  `pernafasan` varchar(20) NOT NULL,
  `keluhan_pasien` varchar(200) NOT NULL,
  `status` varchar(15) NOT NULL,
  `author` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`id_pendaftaran`, `id_pasien`, `id_author`, `tanggal_pendaftaran`, `jam_b`, `tinggi_badan`, `berat_badan`, `lingkar_perut`, `tensi_darah`, `suhu`, `nadi`, `pernafasan`, `keluhan_pasien`, `status`, `author`) VALUES
('PWSPDF00048', 'PWSPOM0008', 5, '2022-08-17', '12:47:00', '146', '76', '76', '120/143', '76', '76', '76', 'Pusing', 'diagnosa', 'perawat'),
('PWSPDF00047', 'PWSPOM0007', 5, '2022-08-16', '11:47:00', '145', '75', '75', '120/142', '75', '75', '75', 'Mencret', 'antri', 'perawat'),
('PWSPDF00046', 'PWSPOM0006', 5, '2022-08-15', '10:47:00', '144', '74', '74', '120/141', '74', '74', '74', 'Muntah', 'diagnosa', 'perawat'),
('PWSPDF00045', 'PWSPOM0005', 5, '2022-08-14', '09:47:00', '143', '73', '73', '120/140', '73', '73', '73', 'Pilek', 'antri', 'perawat'),
('PWSPDF00044', 'PWSPOM0004', 5, '2022-08-13', '08:47:00', '142', '72', '72', '120/139', '72', '72', '72', 'Batuk', 'diagnosa', 'perawat'),
('PWSPDF00043', 'PWSPOM0003', 5, '2022-08-12', '07:47:00', '141', '71', '71', '120/138', '71', '71', '71', 'Demam', 'antri', 'perawat'),
('PWSPDF00042', 'PWSPOM0002', 5, '2022-08-12', '14:18:00', '140', '70', '70', '120/137', '70', '70', '70', 'Pusing', 'diagnosa', 'perawat'),
('PWSPDF00041', 'PWSPOM0001', 5, '2022-08-13', '15:58:00', '139', '69', '69', '120/136', '69', '69', '69', 'Mencret', 'antri', 'perawat'),
('PWSPDF00040', 'PWSGRK00010', 5, '2022-08-29', '00:47:00', '138', '68', '68', '120/135', '68', '68', '68', 'Muntah', 'diagnosa', 'perawat'),
('PWSPDF00038', 'PWSGRK00008', 5, '2022-08-27', '22:47:00', '136', '66', '66', '120/133', '66', '66', '66', 'Batuk', 'diagnosa', 'perawat'),
('PWSPDF00039', 'PWSGRK00009', 5, '2022-08-28', '23:47:00', '137', '67', '67', '120/134', '67', '67', '67', 'Pilek', 'antri', 'perawat'),
('PWSPDF00036', 'PWSGRK00006', 5, '2022-08-25', '20:47:00', '134', '64', '64', '120/131', '64', '64', '64', 'Pusing', 'diagnosa', 'perawat'),
('PWSPDF00037', 'PWSGRK00007', 5, '2022-08-26', '21:47:00', '135', '65', '65', '120/132', '65', '65', '65', 'Demam', 'antri', 'perawat'),
('PWSPDF00034', 'PWSGRK00004', 5, '2022-08-23', '18:47:00', '132', '62', '62', '120/129', '62', '62', '62', 'Muntah', 'diagnosa', 'perawat'),
('PWSPDF00035', 'PWSGRK00005', 5, '2022-08-24', '19:47:00', '133', '63', '63', '120/130', '63', '63', '63', 'Mencret', 'antri', 'perawat'),
('PWSPDF00031', 'PWSGRK00001', 5, '2022-08-20', '15:47:00', '129', '59', '59', '120/126', '59', '59', '59', 'Demam', 'antri', 'perawat'),
('PWSPDF00032', 'PWSGRK00002', 5, '2022-08-21', '16:47:00', '130', '60', '60', '120/127', '60', '60', '60', 'Batuk', 'diagnosa', 'perawat'),
('PWSPDF00033', 'PWSGRK00003', 5, '2022-08-22', '17:47:00', '131', '61', '61', '120/128', '61', '61', '61', 'Pilek', 'antri', 'perawat'),
('PWSPDF00030', 'PWSPKR00010', 5, '2022-08-19', '14:47:00', '128', '58', '58', '120/125', '58', '58', '58', 'Pusing', 'diagnosa', 'perawat'),
('PWSPDF00029', 'PWSPKR00009', 5, '2022-08-18', '13:47:00', '127', '57', '57', '120/124', '57', '57', '57', 'Mencret', 'antri', 'perawat'),
('PWSPDF00028', 'PWSPKR00008', 5, '2022-08-17', '12:47:00', '126', '56', '56', '120/123', '56', '56', '56', 'Muntah', 'diagnosa', 'perawat'),
('PWSPDF00027', 'PWSPKR00007', 5, '2022-08-16', '11:47:00', '125', '55', '55', '120/122', '55', '55', '55', 'Pilek', 'antri', 'perawat'),
('PWSPDF00026', 'PWSPKR00006', 5, '2022-08-15', '10:47:00', '124', '54', '54', '120/121', '54', '54', '54', 'Batuk', 'diagnosa', 'perawat'),
('PWSPDF00025', 'PWSPKR00005', 5, '2022-08-14', '09:47:00', '123', '53', '53', '120/120', '53', '53', '53', 'Demam', 'antri', 'perawat'),
('PWSPDF00024', 'PWSPKR00004', 5, '2022-08-13', '08:47:00', '122', '52', '52', '120/119', '52', '52', '52', 'Pusing', 'diagnosa', 'perawat'),
('PWSPDF00023', 'PWSPKR00003', 5, '2022-08-12', '07:47:00', '121', '51', '51', '120/118', '51', '51', '51', 'Mencret', 'antri', 'perawat'),
('PWSPDF00022', 'PWSPKR00002', 5, '2022-08-12', '14:18:00', '120', '50', '50', '120/117', '50', '50', '50', 'Muntah', 'diagnosa', 'perawat'),
('PWSPDF00021', 'PWSPKR00001', 5, '2022-08-13', '15:58:00', '119', '49', '49', '120/116', '49', '49', '49', 'Pilek', 'antri', 'perawat'),
('PWSPDF00020', 'PWSPSL00010', 5, '2022-08-29', '00:47:00', '118', '48', '48', '120/115', '48', '48', '48', 'Batuk', 'diagnosa', 'perawat'),
('PWSPDF00019', 'PWSPSL00009', 5, '2022-08-28', '23:47:00', '117', '47', '47', '120/114', '47', '47', '47', 'Demam', 'antri', 'perawat'),
('PWSPDF00018', 'PWSPSL00008', 5, '2022-08-27', '22:47:00', '116', '46', '46', '120/113', '46', '46', '46', 'Pusing', 'diagnosa', 'perawat'),
('PWSPDF00017', 'PWSPSL00007', 5, '2022-08-26', '21:47:00', '115', '45', '45', '120/112', '45', '45', '45', 'Mencret', 'antri', 'perawat'),
('PWSPDF00016', 'PWSPSL00006', 5, '2022-08-25', '20:47:00', '114', '44', '44', '120/111', '44', '44', '44', 'Muntah', 'diagnosa', 'perawat'),
('PWSPDF00015', 'PWSPSL00005', 5, '2022-08-24', '19:47:00', '113', '43', '43', '120/110', '43', '43', '43', 'Pilek', 'antri', 'perawat'),
('PWSPDF00014', 'PWSPSL00004', 5, '2022-08-23', '18:47:00', '112', '42', '42', '120/109', '42', '42', '42', 'Batuk', 'diagnosa', 'perawat'),
('PWSPDF00013', 'PWSPSL00003', 5, '2022-08-22', '17:47:00', '111', '41', '41', '120/108', '41', '41', '41', 'Demam', 'antri', 'perawat'),
('PWSPDF00012', 'PWSPSL00002', 5, '2022-08-21', '16:47:00', '110', '40', '40', '120/107', '40', '40', '40', 'Pusing', 'diagnosa', 'perawat'),
('PWSPDF00011', 'PWSPSL00001', 5, '2022-08-20', '15:47:00', '109', '39', '39', '120/106', '39', '39', '39', 'Mencret', 'antri', 'perawat'),
('PWSPDF00010', 'PWSROF00010', 5, '2022-08-19', '14:47:00', '108', '38', '38', '120/105', '38', '38', '38', 'Muntah', 'diagnosa', 'perawat'),
('PWSPDF00009', 'PWSROF00009', 5, '2022-08-18', '13:47:00', '107', '37', '37', '120/104', '37', '37', '37', 'Pilek', 'antri', 'perawat'),
('PWSPDF00008', 'PWSROF00008', 5, '2022-08-17', '12:47:00', '106', '36', '36', '120/103', '36', '36', '36', 'Batuk', 'diagnosa', 'perawat'),
('PWSPDF00007', 'PWSROF00007', 5, '2022-08-16', '11:47:00', '105', '35', '35', '120/102', '35', '35', '35', 'Demam', 'antri', 'perawat'),
('PWSPDF00006', 'PWSROF00006', 5, '2022-08-15', '10:47:00', '104', '34', '34', '120/101', '34', '34', '34', 'Pusing', 'diagnosa', 'perawat'),
('PWSPDF00005', 'PWSROF00005', 5, '2022-08-14', '09:47:00', '103', '33', '33', '120/100', '33', '33', '33', 'Mencret', 'antri', 'perawat'),
('PWSPDF00004', 'PWSROF00004', 5, '2022-08-13', '08:47:00', '102', '32', '32', '120/99', '32', '32', '32', 'Muntah', 'diagnosa', 'perawat'),
('PWSPDF00003', 'PWSROF00003', 5, '2022-08-12', '07:47:00', '101', '31', '31', '120/98', '31', '31', '31', 'Pilek', 'antri', 'perawat'),
('PWSPDF00002', 'PWSROF00002', 5, '2022-08-12', '14:18:00', '100', '30', '30', '120/97', '30', '30', '30', 'Batuk', 'resep', 'perawat'),
('PWSPDF00001', 'PWSROF00001', 5, '2022-08-13', '15:58:00', '99', '29', '29', '120/96', '29', '29', '29', 'Demam', 'antri', 'perawat'),
('PWSPDF00049', 'PWSPOM0009', 5, '2022-08-18', '13:47:00', '147', '77', '77', '120/144', '77', '77', '77', 'Demam', 'antri', 'perawat'),
('PWSPDF00050', 'PWSPOM0010', 5, '2022-08-19', '14:47:00', '148', '78', '78', '120/145', '78', '78', '78', 'Batuk', 'diagnosa', 'perawat'),
('PWSPDF00051', 'PWSUMM00001', 5, '2022-08-20', '15:47:00', '149', '79', '79', '120/146', '79', '79', '79', 'Pilek', 'antri', 'perawat'),
('PWSPDF00052', 'PWSUMM00002', 5, '2022-08-21', '16:47:00', '150', '80', '80', '120/147', '80', '80', '80', 'Muntah', 'diagnosa', 'perawat'),
('PWSPDF00053', 'PWSUMM00003', 5, '2022-08-22', '17:47:00', '151', '81', '81', '120/148', '81', '81', '81', 'Mencret', 'antri', 'perawat'),
('PWSPDF00054', 'PWSUMM00004', 5, '2022-08-23', '18:47:00', '152', '82', '82', '120/149', '82', '82', '82', 'Pusing', 'diagnosa', 'perawat'),
('PWSPDF00055', 'PWSUMM00005', 5, '2022-08-24', '19:47:00', '153', '83', '83', '120/150', '83', '83', '83', 'Demam', 'antri', 'perawat'),
('PWSPDF00056', 'PWSUMM00006', 5, '2022-08-25', '20:47:00', '154', '84', '84', '120/151', '84', '84', '84', 'Batuk', 'diagnosa', 'perawat'),
('PWSPDF00057', 'PWSUMM00007', 5, '2022-08-26', '21:47:00', '155', '85', '85', '120/152', '85', '85', '85', 'Pilek', 'antri', 'perawat'),
('PWSPDF00058', 'PWSUMM00008', 5, '2022-08-27', '22:47:00', '156', '86', '86', '120/153', '86', '86', '86', 'Muntah', 'diagnosa', 'perawat'),
('PWSPDF00059', 'PWSUMM00009', 5, '2022-08-28', '23:47:00', '157', '87', '87', '120/154', '87', '87', '87', 'Mencret', 'antri', 'perawat'),
('PWSPDF00060', 'PWSUMM00010', 5, '2022-08-29', '00:47:00', '158', '88', '88', '120/155', '88', '88', '88', 'Pusing', 'diagnosa', 'perawat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penyakit`
--

CREATE TABLE `tbl_penyakit` (
  `id_penyakit` varchar(50) NOT NULL,
  `nama_penyakit` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penyakit`
--

INSERT INTO `tbl_penyakit` (`id_penyakit`, `nama_penyakit`, `deskripsi`) VALUES
('PWSPKT00001', 'DEMAM', 'demam'),
('PWSPKT00002', 'BATUK', 'batuk');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rujukan`
--

CREATE TABLE `tbl_rujukan` (
  `id` int(11) NOT NULL,
  `id_pasien` varchar(20) NOT NULL,
  `no_bpjs` varchar(20) NOT NULL,
  `rs` varchar(50) NOT NULL,
  `poli` varchar(50) NOT NULL,
  `tgl_rujuk` date NOT NULL,
  `hasil_diagnosa` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_buat_rujukan` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ssakit`
--

CREATE TABLE `tbl_ssakit` (
  `id_suratsakit` int(11) NOT NULL,
  `id_pasien` varchar(50) NOT NULL,
  `id_diagnosa` varchar(50) NOT NULL,
  `nama_pasien` text NOT NULL,
  `tanggal_pendaftaran` date NOT NULL,
  `umur` int(10) NOT NULL,
  `diagnosa` text NOT NULL,
  `jabatan_pekerja` varchar(50) NOT NULL,
  `jk` varchar(40) NOT NULL,
  `status_pekerja` varchar(100) NOT NULL,
  `jam_b` time NOT NULL,
  `waktu_i` text NOT NULL,
  `dari_t` date NOT NULL,
  `sampai_d` date NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ssakit`
--

INSERT INTO `tbl_ssakit` (`id_suratsakit`, `id_pasien`, `id_diagnosa`, `nama_pasien`, `tanggal_pendaftaran`, `umur`, `diagnosa`, `jabatan_pekerja`, `jk`, `status_pekerja`, `jam_b`, `waktu_i`, `dari_t`, `sampai_d`, `catatan`) VALUES
(6, 'PWSUMM00001', 'PWSPOLIDNS00001', 'JHGHJ', '2022-08-12', 24, 'ABSANS (LENA), ABSES TELINGA (ABSES BEZOLD), ACUTE CORONARY SYNDROME (SINDROM KORONER AKUT), ALZHEIMER DISEASE (PENYAKIT ALZHEIMER), ANEURISMA AORTA (PELEBARAN ABNORMAL AORTA).', 'Umum', 'Laki-laki', 'Umum', '07:47:00', '', '0000-00-00', '0000-00-00', 'fdgfd '),
(7, 'PWSROF00004', 'PWSDNG00001', 'HKL', '2022-08-12', 67, 'ABSES TELINGA (ABSES BEZOLD).', 'Assistant', 'Perempuan', 'PB', '14:18:00', '', '0000-00-00', '0000-00-00', 'dsfsdf '),
(8, 'PWSUMM00001', 'PWSDNG00003', 'JHGHJ', '2022-08-12', 24, 'ACUTE CORONARY SYNDROME (SINDROM KORONER AKUT).', 'Umum', 'Laki-laki', 'Umum', '07:47:00', '', '0000-00-00', '0000-00-00', 'wqewqewqe '),
(9, 'PWSROF00002', 'PWSDNG00001', 'B', '2022-08-12', 11, 'BATUK.', 'Act. Manager', 'Perempuan', 'PB', '14:18:00', '', '0000-00-00', '0000-00-00', 'a ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stok`
--

CREATE TABLE `tbl_stok` (
  `id_stok` varchar(50) NOT NULL,
  `id_author` int(10) NOT NULL,
  `nama_obat` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `stok` int(11) NOT NULL,
  `barang_masuk` int(11) NOT NULL,
  `barang_keluar` int(11) NOT NULL,
  `satuan` int(11) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `kategori` text NOT NULL,
  `deskripsi` text NOT NULL,
  `author` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama`, `username`, `password`, `jabatan`, `level`) VALUES
(1, 'admin', 'admin', '$2y$10$EY7FSN/vv3ejd6zHZagJb.7dJ53vjnD6iNelB5XUlTEqJflynxjzi', 'admin', 'admin'),
(2, 'muhammad rafi hadi kesuma', 'rafi', '$2y$10$LFhxGP2n3PJJhJBlGLyjMOvSRAHqnxYEzvjTTBwxjasqMayt98RHi', 'staff', 'staff'),
(3, 'HADI', 'hadi', '$2y$10$wlhZkGr92fqw5BMMTr2Cpu6kFn65dqPbZfhkeO8lX626/lQBZAaXG', 'Dokter', 'dokter'),
(4, 'KESUMA', 'kesuma', '$2y$10$hCx57wVaLecoFsRIN.m7KOGUkg1fNLdxX836S643fXJk5/bWkffP6', 'Manager', 'manager'),
(5, 'PERAWAT', 'perawat', '$2y$10$9PKre1RJg8FgqrZyF4CQfOZ0RHh/kfoCL42MoRlnrQs6FpnfP4pfm', 'perawat', 'perawat');

-- --------------------------------------------------------

--
-- Table structure for table `umum`
--

CREATE TABLE `umum` (
  `id_pasien` varchar(20) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `umum`
--

INSERT INTO `umum` (`id_pasien`, `nama_pasien`) VALUES
('PWSUMM00001', 'ZZ'),
('PWSUMM00002', 'AAA'),
('PWSUMM00003', 'BBB'),
('PWSUMM00004', 'CCC'),
('PWSUMM00005', 'DDD'),
('PWSUMM00006', 'EEE'),
('PWSUMM00007', 'FFF'),
('PWSUMM00008', 'GGG'),
('PWSUMM00009', 'HHH'),
('PWSUMM00010', 'III');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grik`
--
ALTER TABLE `grik`
  ADD PRIMARY KEY (`id_pasien`),
  ADD UNIQUE KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `pangkor`
--
ALTER TABLE `pangkor`
  ADD PRIMARY KEY (`id_pasien`),
  ADD UNIQUE KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `pasirsalak`
--
ALTER TABLE `pasirsalak`
  ADD PRIMARY KEY (`id_pasien`),
  ADD UNIQUE KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `pom`
--
ALTER TABLE `pom`
  ADD PRIMARY KEY (`id_pasien`),
  ADD UNIQUE KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `ro`
--
ALTER TABLE `ro`
  ADD PRIMARY KEY (`id_pasien`),
  ADD UNIQUE KEY `id_pasien` (`id_pasien`),
  ADD UNIQUE KEY `nama_pasien` (`nama_pasien`);

--
-- Indexes for table `tbl_diagnosa`
--
ALTER TABLE `tbl_diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`),
  ADD UNIQUE KEY `id_diagnosa` (`id_diagnosa`);

--
-- Indexes for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD UNIQUE KEY `id_pendaftaran` (`id_pendaftaran`);

--
-- Indexes for table `tbl_penyakit`
--
ALTER TABLE `tbl_penyakit`
  ADD PRIMARY KEY (`id_penyakit`),
  ADD UNIQUE KEY `id_penyakit` (`id_penyakit`);

--
-- Indexes for table `tbl_rujukan`
--
ALTER TABLE `tbl_rujukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ssakit`
--
ALTER TABLE `tbl_ssakit`
  ADD PRIMARY KEY (`id_suratsakit`);

--
-- Indexes for table `tbl_stok`
--
ALTER TABLE `tbl_stok`
  ADD PRIMARY KEY (`id_stok`),
  ADD UNIQUE KEY `id_stok` (`id_stok`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `umum`
--
ALTER TABLE `umum`
  ADD PRIMARY KEY (`id_pasien`),
  ADD UNIQUE KEY `id_pasien` (`id_pasien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_rujukan`
--
ALTER TABLE `tbl_rujukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_ssakit`
--
ALTER TABLE `tbl_ssakit`
  MODIFY `id_suratsakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
