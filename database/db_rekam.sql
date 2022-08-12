-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2022 at 03:08 AM
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
('PWSGRK00001', 'GHFG');

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
('PWSPKR00001', 'KIKI');

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
('PWSPSL00001', 'SADSAD'),
('PWSPSL00002', 'KIKI');

-- --------------------------------------------------------

--
-- Table structure for table `pom`
--

CREATE TABLE `pom` (
  `id_pasien` varchar(100) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('PWSROF00004', 'HKL'),
('PWSROF00002', 'JKJJKHJH'),
('PWSROF00003', 'POPOP'),
('PWSROF00001', 'RARA');

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
('PWSPOLIDNS00001', 'PWSUMM00001', 'PWSPDF00001', 'asd', 'ABSANS (LENA), ABSES TELINGA (ABSES BEZOLD), ACUTE CORONARY SYNDROME (SINDROM KORONER AKUT), ALZHEIMER DISEASE (PENYAKIT ALZHEIMER), ANEURISMA AORTA (PELEBARAN ABNORMAL AORTA).', 'asd', 'retret', 'selesai', '2022-08-12');

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
(1, 'PWSROF00001', 1, 1205101612950001, 'RARA', 'Laki-laki', '02121545', '2022-07-27', 26, 'Pekerja', 'RARA', 'Act. Askep', 'Executive', '62854545123', 'RO', 'RO', 'admin'),
(3, 'PWSROF00002', 1, 54654, 'JKJJKHJH', 'Laki-laki', '45454', '2022-07-27', 45, 'Pekerja', 'BVVH', 'Electrical', 'Executive', '6244444758', 'Pasir Salak', 'OP 2005B', 'admin'),
(4, 'PWSROF00003', 1, 7878787, 'POPOP', 'Laki-laki', '980980980', '2022-07-27', 90, 'Suami/Istri', 'UIOUIOUI', 'Electrical', 'PGHT', '62678678679', 'Pasir Salak', 'OP 99', 'admin'),
(5, 'PWSPSL00001', 1, 65756, 'SADSAD', 'Laki-laki', '789789', '2022-07-27', 89, 'Pekerja', 'SADSAD', 'ESD', 'BRG', '6278978978', 'Pangkor', 'OP 2005A', 'admin'),
(6, 'PWSPSL00002', 1, 67866, 'KIKI', 'Laki-laki', '45', '2022-06-29', 21, 'Pekerja', '45', 'Danton', 'Executive', '6246566', 'Pangkor', 'OP 99', 'admin'),
(7, 'PWSPKR00001', 1, 567, 'KIKI', 'Laki-laki', '567', '2022-06-28', 67, 'Suami/Istri', 'ASD', 'DGM', 'PB', '6265856', 'Pasir Salak', 'OP 2005B', 'admin'),
(8, 'PWSGRK00001', 1, 45645654, 'GHFG', 'Laki-laki', '7658678', '2022-07-27', 78, 'Pekerja', 'UKUK', 'EP', 'PB', '6276867867', 'Pasir Salak', 'OP 2005A', 'admin'),
(9, 'PWSROF00004', 1, 98098, 'HKL', 'Perempuan', '78987987', '2022-07-03', 67, 'Anak Pekerja', 'JLJKLJK', 'Assistant', 'PB', '627897898', 'RO', 'RO', 'admin'),
(12, 'PWSUMM00001', 1, 656444, 'JHGHJ', 'Laki-laki', '7878', '2022-03-31', 24, 'Umum', 'JHKJHK', 'Umum', 'Umum', '627867876', 'Umum', 'Umum', 'admin');

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
('PWSPDF00001', 'PWSUMM00001', 5, '2022-08-12', '07:47:00', '165', '65', '65', '65', '65', '65', '65', '6sadsadfas', 'selesai', 'PERAWAT');

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
('PWSPOLIPKT00001', 'ABSANS (LENA)', 'absans (lena) merupakan salah satu kondisi kejang epilepsi yang termasuk dalam golongan kejang umum (generalized seizures). istilah lain untuk kondisi ini adalah petit mal. kondisi ini ditandai dengan adanya kehilangan kesadaran dalam waktu singkat, misalnya memiliki pandangan kosong dan biasanya penderita tidak menyadari episode kejang yang baru saja dialami.\r\n\r\nabsans biasanya terjadi pertama kali pada anak usia 4-8 tahun. serangan absans terjadi tanpa peringatan atau tanda-tanda. kondisi ini jarang menimbulkan komplikasi yang parah dan jarang berlanjut hingga pasien dewasa.'),
('PWSPOLIPKT00002', 'ABSES TELINGA (ABSES BEZOLD)', 'abses bezold adalah kondisi terjadinya penumpukan nanah di jaringan dalam leher tepatnya di bagian sternomastoid yang terletak di belakang telinga. kondisi ini adalah komplikasi yang jarang terjadi pada kasus mastoiditis (infeksi dan peradangan pada tonjolan tulang di belakang telinga yang dikenal dengan tulang mastoid). diberi nama abses bezold sesuai dengan penemunya, yaitu dr friedrich bezold.'),
('PWSPOLIPKT00003', 'ACUTE CORONARY SYNDROME (SINDROM KORONER AKUT)', 'acute coronary syndrome (sindrom koroner akut)'),
('PWSPOLIPKT00004', 'ALZHEIMER DISEASE (PENYAKIT ALZHEIMER)', 'penyakit alzheimer adalah penyakit progresif yang mengakibatkan penurunan memori dan fungsi mental penting lainnya. pada awalnya, seseorang dengan penyakit alzheimer mungkin mengalami kebingungan ringan dan kesulitan mengingat. akhirnya, orang-orang dengan penyakit ini bahkan mungkin lupa orang-orang penting dalam hidup mereka dan mengalami perubahan kepribadian yang dramatis.\r\n\r\npenyakit alzheimer adalah penyebab paling umum dari demensia, yaitu sekelompok gangguan otak yang menyebabkan hilangnya kemampuan intelektual dan sosial.\r\n\r\npada penyakit alzheimer, fungsi sel-sel otak menurun dan mengalami kematian, menyebabkan penurunan yang bertahap terhadap memori dan fungsi mental. namun seiring berjalannya waktu, penyakit ini semakin menghilangkan kemampuan memori bahkan pada memori yang baru saja terjadi. kecepatan perburukan alzheimer bervariasi antar individu.\r\n\r\njika anda memiliki alzheimer, anda mungkin menjadi yang pertama untuk menyadari bahwa anda mengalami kesulitan lebih dari biasanya untuk mengingat hal-hal dan mengatur pikiran anda. atau anda mungkin tidak menyadari bahwa ada sesuatu yang salah, bahkan ketika perubahan tersebut terlihat oleh anggota keluarga, teman dekat atau rekan kerja.\r\n\r\nalzheimer umumnya terjadi pada orang lanjut usia. jika ada orang muda yang menderita penyakit ini, itu biasanya akibat kelainan atau cedera otak. selalu konsultasi kepada dokter untuk informasi lebih lanjut.'),
('PWSPOLIPKT00005', 'ANEURISMA AORTA (PELEBARAN ABNORMAL AORTA)', 'aneurisma adalah kondisi terjadinya penggelembungan atau pembengkakan pada salah satu bagian pembuluh darah. aneurisma dapat terjadi di beberapa bagian tubuh, tetapi kasus yang sering terjadi adalah pada bagian aorta atau pembuluh darah di otak.\r\n\r\n \r\n\r\ndisebut aneurisma aorta apabila aneurisma terjadi pada pembuluh darah aorta, yakni pembuluh darah arteri terbesar di dalam tubuh. pembuluh darah ini berfungsi mengalirkan darah dari jantung ke seluruh tubuh. aneurisma aorta bersifat terlokalisasi, dapat terjadi di aorta bagian atas di sekitar dada, atau pada aorta bagian bawah yang berada di sekitar perut. pelebaran pembuluh darah ini berpotensi untuk ruptur (pecah) dan bersifat mengancam nyawa.');

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
(6, 'PWSUMM00001', 'PWSPOLIDNS00001', 'JHGHJ', '2022-08-12', 24, 'ABSANS (LENA), ABSES TELINGA (ABSES BEZOLD), ACUTE CORONARY SYNDROME (SINDROM KORONER AKUT), ALZHEIMER DISEASE (PENYAKIT ALZHEIMER), ANEURISMA AORTA (PELEBARAN ABNORMAL AORTA).', 'Umum', 'Laki-laki', 'Umum', '07:47:00', '', '0000-00-00', '0000-00-00', 'fdgfd ');

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
('PWSUMM00001', 'JHGHJ');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_rujukan`
--
ALTER TABLE `tbl_rujukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_ssakit`
--
ALTER TABLE `tbl_ssakit`
  MODIFY `id_suratsakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
