-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03 Jan 2018 pada 22.37
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sitasi_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `act_log`
--

CREATE TABLE `act_log` (
  `id_act` int(10) NOT NULL,
  `tgl_act` datetime NOT NULL,
  `id_ptgs` varchar(10) NOT NULL,
  `act` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_ptgs` int(13) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(500) NOT NULL,
  `nama_ptgs` varchar(100) NOT NULL,
  `alamat_ptgs` varchar(150) NOT NULL,
  `telepon_ptgs` varchar(13) NOT NULL,
  `status` varchar(8) NOT NULL,
  `jns_kelamin_ptgs` varchar(9) NOT NULL,
  `enabled` int(1) NOT NULL,
  `ditmbh_pd` datetime NOT NULL,
  `diupdt_pd` datetime NOT NULL,
  `dihps_pd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_ptgs`, `username`, `password`, `nama_ptgs`, `alamat_ptgs`, `telepon_ptgs`, `status`, `jns_kelamin_ptgs`, `enabled`, `ditmbh_pd`, `diupdt_pd`, `dihps_pd`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'wakwaw', 'brebes', '081234567890', 'Admin', 'Perempuan', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'cgwkw', '21232f297a57a5a743894a0e4a801fc3', 'Coeg Wakwaw', 'Tegal', '081234500000', 'Petugas', 'Laki-laki', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'dio', 'b60ee1e541699f854ec2858d0a676193', 'Dio Surandito', 'Brebes', '212', 'Petugas', 'Laki-laki', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'PTGS', 'Brebes', '911', 'Petugas', 'Laki-laki', 0, '0000-00-00 00:00:00', '2018-01-03 14:54:55', '0000-00-00 00:00:00'),
(5, 'dito', 'f8b03a8066a7ce125f4deb04b251b1ef', 'Dito', 'Brebes', '911111', 'Petugas', 'Perempuan', 1, '2018-01-03 00:00:00', '2018-01-03 00:00:00', '2018-01-03 13:45:54'),
(6, 'lutfi', 'cdb0b6889f4def26f43951b2d5b7a9e3', 'lutfiansyah', 'slawi', '212', 'Petugas', 'Laki-laki', 0, '2018-01-03 14:57:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `saldo_sw`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `saldo_sw` (
`nis` varchar(10)
,`saldo` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_sw` int(11) NOT NULL,
  `nis` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `nama_ortu` varchar(50) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `kelompok` varchar(10) NOT NULL,
  `disabled` int(1) NOT NULL,
  `ditmbh_pd` datetime NOT NULL,
  `diupdt_pd` datetime NOT NULL,
  `dihps_pd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_sw`, `nis`, `nama`, `alamat`, `tgl_lahir`, `jenis_kelamin`, `nama_ortu`, `telepon`, `kelompok`, `disabled`, `ditmbh_pd`, `diupdt_pd`, `dihps_pd`) VALUES
(1, '100001', 'wakwaw jr', 'Brebes', '2012-11-01', 'Perempuan', 'wakwaw', '081234567890', 'A1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '100002', 'Upin Jr', 'Kampung Durian Runtuh', '2012-01-01', 'Laki-laki', 'Upin', '081239999910', 'A2', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '100003', 'dio', 'Brebes', '2011-01-04', 'Laki-laki', 'dio tua', '9999', 'A2', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '100004', 'Kancil jr', 'brebes', '2017-12-08', 'Laki-laki', 'Kancil', '0888888888', 'A3', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '100005', 'Gilang', 'procot', '2012-06-13', 'Laki-laki', 'Bapak Gilang', '082323232200', 'B1', 0, '2018-01-03 15:02:37', '2018-01-03 15:03:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_trans` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `tgl_trans` date NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `id_ptgs` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_trans`, `nis`, `tgl_trans`, `debit`, `kredit`, `id_ptgs`) VALUES
(1, '100001', '2017-12-04', 100000, 0, '3'),
(2, '100001', '2017-12-13', 0, 20000, '3'),
(3, '100002', '2017-12-03', 90000, 0, '3'),
(4, '100001', '2017-12-20', 10000, 0, '3'),
(5, '100003', '2017-12-11', 10000, 0, '4'),
(6, '100002', '2017-12-25', 0, 80000, '4'),
(7, '100001', '2017-12-30', 10000, 0, '4'),
(8, '100001', '2017-12-30', 0, 20000, '4'),
(9, '100001', '2017-12-30', 10000, 0, '4'),
(10, '100001', '2017-12-30', 0, 5000, '4'),
(11, '100001', '2017-12-31', 0, 5000, '4'),
(12, '100004', '2018-01-02', 100000, 0, '4'),
(13, '100002', '2018-01-02', 100000, 0, '4'),
(14, '100002', '2018-01-02', 0, 90000, '4'),
(15, '100005', '2018-01-03', 200000, 0, '6'),
(16, '100005', '2018-01-03', 0, 200000, '6'),
(17, '100005', '2018-01-03', 80000, 0, '6'),
(18, '100005', '2018-01-03', 50000, 0, '6');

-- --------------------------------------------------------

--
-- Struktur untuk view `saldo_sw`
--
DROP TABLE IF EXISTS `saldo_sw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `saldo_sw`  AS  select `transaksi`.`nis` AS `nis`,(sum(`transaksi`.`debit`) - sum(`transaksi`.`kredit`)) AS `saldo` from `transaksi` group by `transaksi`.`nis` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `act_log`
--
ALTER TABLE `act_log`
  ADD PRIMARY KEY (`id_act`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_ptgs`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_sw`),
  ADD UNIQUE KEY `nis_uq` (`nis`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_trans`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `act_log`
--
ALTER TABLE `act_log`
  MODIFY `id_act` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_ptgs` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_sw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
