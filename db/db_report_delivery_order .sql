-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jul 2023 pada 14.23
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_report_delivery_order`
--
CREATE DATABASE IF NOT EXISTS `db_report_delivery_order` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_report_delivery_order`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pemakaian_mobil`
--

DROP TABLE IF EXISTS `riwayat_pemakaian_mobil`;
CREATE TABLE `riwayat_pemakaian_mobil` (
  `id` int(11) NOT NULL,
  `nomor_kendaraan` varchar(10) DEFAULT NULL,
  `tanggal_pemakaian` date DEFAULT NULL,
  `kilometer_awal` int(11) DEFAULT NULL,
  `kilometer_akhir` int(11) DEFAULT NULL,
  `jarak_tempuh` int(11) DEFAULT NULL,
  `id_driver` int(11) DEFAULT NULL,
  `nama_driver` varchar(50) DEFAULT NULL,
  `rute` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pengiriman_driver`
--

DROP TABLE IF EXISTS `riwayat_pengiriman_driver`;
CREATE TABLE `riwayat_pengiriman_driver` (
  `id` int(11) NOT NULL,
  `id_driver` int(11) DEFAULT NULL,
  `tanggal_pengiriman` date DEFAULT NULL,
  `nomor_kendaraan` varchar(10) DEFAULT NULL,
  `km_awal` int(11) NOT NULL,
  `km_akhir` int(100) NOT NULL,
  `total_jarak_tempuh` int(11) NOT NULL,
  `rute` varchar(100) DEFAULT NULL,
  `jumlah_pengiriman` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `riwayat_pengiriman_driver`
--

INSERT INTO `riwayat_pengiriman_driver` (`id`, `id_driver`, `tanggal_pengiriman`, `nomor_kendaraan`, `km_awal`, `km_akhir`, `total_jarak_tempuh`, `rute`, `jumlah_pengiriman`) VALUES
(0, 300, '2023-06-01', '4265', 51, 6161, 15, 'bjb', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_servis`
--

DROP TABLE IF EXISTS `riwayat_servis`;
CREATE TABLE `riwayat_servis` (
  `id_servis` int(11) NOT NULL,
  `no_plat` varchar(11) NOT NULL,
  `tanggal_servis` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `estimasi` text NOT NULL,
  `biaya` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `riwayat_servis`
--

INSERT INTO `riwayat_servis` (`id_servis`, `no_plat`, `tanggal_servis`, `keterangan`, `estimasi`, `biaya`) VALUES
(80098, 'JK 7890 LM', '0000-00-00', 'ok', '2023-06-07', '100.000'),
(80099, 'JK 7890 LM', '0000-00-00', 'ok', '2023-06-07', '100.000'),
(80100, 'JK 7890 LM', '2023-07-13', 'kampas rem', '2023-07-19', '30'),
(80101, 'AB 1234 CM', '2023-07-10', 'GANTI LAMPU', '2023-07-17', '300.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_armada`
--

DROP TABLE IF EXISTS `tb_armada`;
CREATE TABLE `tb_armada` (
  `id` int(11) NOT NULL,
  `no_plat` varchar(11) NOT NULL,
  `type_armada` enum('HINO','TAYO','KUDA','') NOT NULL,
  `tahun` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_armada`
--

INSERT INTO `tb_armada` (`id`, `no_plat`, `type_armada`, `tahun`) VALUES
(1, 'AB 1234 CM', 'HINO', '2018'),
(2, 'JK 7890 LM', 'TAYO', '2022'),
(3, 'FG 3456 HI', 'HINO', '2000'),
(4, 'BC 5678 EF', 'KUDA', '2001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

DROP TABLE IF EXISTS `tb_barang`;
CREATE TABLE `tb_barang` (
  `kode_brg` int(11) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `departemen` enum('KAMAR TIDUR','DAPUR DAN RUANG MAKAN','RUANG TAMU','RUANG KERJA','') NOT NULL,
  `restok` int(11) NOT NULL,
  `jumlah_brg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`kode_brg`, `nama_brg`, `departemen`, `restok`, `jumlah_brg`) VALUES
(114, 'Barang 1', 'KAMAR TIDUR', 10, '50'),
(115, 'Barang 2', 'RUANG TAMU', 5, '20'),
(116, 'Barang 3', 'DAPUR DAN RUANG MAKAN', 15, '10'),
(117, 'Barang 4', 'RUANG TAMU', 8, '90'),
(118, 'Barang 5', 'RUANG KERJA', 12, '100'),
(119, 'Barang 6', 'RUANG TAMU', 3, '70'),
(120, 'Barang 7', 'DAPUR DAN RUANG MAKAN', 20, '160'),
(121, 'Barang 8', 'KAMAR TIDUR', 7, '75'),
(122, 'Barang 9', 'DAPUR DAN RUANG MAKAN', 9, '40'),
(123, 'Barang 10', 'DAPUR DAN RUANG MAKAN', 6, '68');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berlaku_sim`
--

DROP TABLE IF EXISTS `tb_berlaku_sim`;
CREATE TABLE `tb_berlaku_sim` (
  `id_sim` int(11) NOT NULL,
  `driver` text NOT NULL,
  `usia` text NOT NULL,
  `tingkat_sim` text NOT NULL,
  `berlaku_sim` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_brg_laku`
--

DROP TABLE IF EXISTS `tb_brg_laku`;
CREATE TABLE `tb_brg_laku` (
  `id_laris` int(11) NOT NULL,
  `kode_brg` int(11) NOT NULL,
  `terjual` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_brg_laku`
--

INSERT INTO `tb_brg_laku` (`id_laris`, `kode_brg`, `terjual`) VALUES
(1, 122, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cekin`
--

DROP TABLE IF EXISTS `tb_cekin`;
CREATE TABLE `tb_cekin` (
  `id_cekin` int(11) NOT NULL,
  `id_pengiriman` int(11) NOT NULL,
  `dari` varchar(255) DEFAULT NULL,
  `tujuan` varchar(255) DEFAULT NULL,
  `km_berangkat` text DEFAULT NULL,
  `jam_berangkat` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_cekin`
--

INSERT INTO `tb_cekin` (`id_cekin`, `id_pengiriman`, `dari`, `tujuan`, `km_berangkat`, `jam_berangkat`) VALUES
(8, 400071, 'gudang', 'banjrmasin', '10', '21:10:00'),
(9, 400070, 'pal 15', 'banjrmasin', '10', '23:13:00'),
(10, 400073, 'banjarmasin', 'bjb', '10', '00:57:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cekout`
--

DROP TABLE IF EXISTS `tb_cekout`;
CREATE TABLE `tb_cekout` (
  `id_cekout` int(11) NOT NULL,
  `id_pengiriman` int(11) NOT NULL,
  `km_tiba` decimal(10,2) DEFAULT NULL,
  `jam_tiba` time DEFAULT NULL,
  `status` enum('TERKIRIM','PENDING') DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `foto` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_cekout`
--

INSERT INTO `tb_cekout` (`id_cekout`, `id_pengiriman`, `km_tiba`, `jam_tiba`, `status`, `keterangan`, `foto`) VALUES
(10, 400071, '0.00', '21:23:00', 'PENDING', 'ganti oli', 'download.jf'),
(11, 400070, '123.00', '22:25:00', 'TERKIRIM', 'ok', 'download.jf'),
(12, 400073, '123.00', '00:57:00', 'TERKIRIM', 'ok', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_customer`
--

DROP TABLE IF EXISTS `tb_customer`;
CREATE TABLE `tb_customer` (
  `id_cust` int(11) NOT NULL,
  `nama_cust` varchar(100) NOT NULL,
  `no_telpon` text NOT NULL,
  `alamat_cust` varchar(100) NOT NULL,
  `kelurahan` text NOT NULL,
  `rute` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_customer`
--

INSERT INTO `tb_customer` (`id_cust`, `nama_cust`, `no_telpon`, `alamat_cust`, `kelurahan`, `rute`) VALUES
(2012, 'Bima', '08125052542', 'JL.KAYU TANGIs', 'kayu tangi', 'BJM'),
(2014, 'Dani', '08123456789', 'banjarmasin', 'Pekauman', 'BJM'),
(2015, 'Dono', '081298765433', 'Banjarbaru', 'kemuning', 'BJB'),
(2016, 'BUDI', '081234567891', 'BJM', 'ass', 'BJM'),
(2017, 'sule', '081234567893', 'BJB', 'sekumpul', 'BJB'),
(2018, 'japri', '08125056541', 'BJM', 'sekumpul', 'BJB'),
(2021, 'paman', '081234567893', 'JL.KAYU TANGI', 'kayu tangi', 'BJM'),
(2024, 'Malik', '081234567893', 'Alamat 3', 'banjar', 'LUAR KOTA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cus_royal`
--

DROP TABLE IF EXISTS `tb_cus_royal`;
CREATE TABLE `tb_cus_royal` (
  `id` int(11) NOT NULL,
  `nama` int(11) NOT NULL,
  `jmlah_transaksi` int(11) NOT NULL,
  `total_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_driver`
--

DROP TABLE IF EXISTS `tb_driver`;
CREATE TABLE `tb_driver` (
  `id_driver` int(11) NOT NULL,
  `nik_driver` int(5) NOT NULL,
  `nama_driver` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `sim` varchar(10) NOT NULL,
  `berlaku_sim` date NOT NULL,
  `alamat_driver` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_driver`
--

INSERT INTO `tb_driver` (`id_driver`, `nik_driver`, `nama_driver`, `tanggal_lahir`, `jabatan`, `sim`, `berlaku_sim`, `alamat_driver`) VALUES
(1, 12345, 'Andi Susanto', '1990-01-01', 'Driver', 'B2 UMUM', '2023-01-01', 'Jalan Raya 123'),
(2, 98765, 'Budi Santosa', '1995-02-15', 'Driver', 'SIM A', '1995-02-15', 'Jalan Harapan 456'),
(3, 23456, 'Doni Prasetyo', '1985-07-10', 'Driver', 'B2 UMUM', '2023-07-10', 'Jalan Maju 789'),
(4, 56789, 'Ahmad Santoso', '1992-04-20', 'Driver', 'SIM A', '2023-04-20', 'Jalan Baru 321'),
(5, 90123, 'Rudi Kusuma', '1988-11-30', 'Driver', 'B2 UMUM', '2023-11-30', 'Jalan Sejahtera 567'),
(6, 34567, 'Hadi Pranata', '1993-09-25', 'Driver', 'SIM A', '2023-09-25', 'Jalan Damai 890'),
(7, 67890, 'Rizki Santoso', '1991-06-05', 'Driver', 'B2 UMUM', '2023-06-05', 'Jalan Indah 1234'),
(8, 1234, 'Faisal Prasetya', '1994-03-15', 'Driver', 'SIM A', '2023-03-15', 'Jalan Cemerlang 5678');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jrk_tempuh`
--

DROP TABLE IF EXISTS `tb_jrk_tempuh`;
CREATE TABLE `tb_jrk_tempuh` (
  `id_jrk` int(11) NOT NULL,
  `no_plat` varchar(11) NOT NULL,
  `km_sekarang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_jrk_tempuh`
--

INSERT INTO `tb_jrk_tempuh` (`id_jrk`, `no_plat`, `km_sekarang`) VALUES
(5, 'AB 1234 CM	', ''),
(6, 'FG 3456 HI	', '213');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembelian`
--

DROP TABLE IF EXISTS `tb_pembelian`;
CREATE TABLE `tb_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `id_cust` int(11) NOT NULL,
  `kode_brg` int(11) NOT NULL,
  `qty` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id_pembelian`, `id_surat`, `id_cust`, `kode_brg`, `qty`) VALUES
(45, 10127, 2024, 119, '5'),
(46, 10127, 2024, 119, '3'),
(47, 10131, 2016, 121, '2'),
(48, 10133, 2015, 119, '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengirim`
--

DROP TABLE IF EXISTS `tb_pengirim`;
CREATE TABLE `tb_pengirim` (
  `id_pengiriman` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `id_cust` int(11) NOT NULL,
  `no_plat` text NOT NULL,
  `nik_driver` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pengirim`
--

INSERT INTO `tb_pengirim` (`id_pengiriman`, `id_surat`, `id_cust`, `no_plat`, `nik_driver`) VALUES
(400071, 10134, 2015, 'JK 7890 LM', '34567'),
(400073, 10133, 2015, 'AB 1234 CM', '90123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rdo`
--

DROP TABLE IF EXISTS `tb_rdo`;
CREATE TABLE `tb_rdo` (
  `id_rdo` int(11) NOT NULL,
  `id_pengiriman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_rdo`
--

INSERT INTO `tb_rdo` (`id_rdo`, `id_pengiriman`) VALUES
(200030, 400071);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat`
--

DROP TABLE IF EXISTS `tb_surat`;
CREATE TABLE `tb_surat` (
  `id_surat` int(11) NOT NULL,
  `id_cust` int(11) NOT NULL,
  `tanggal_kirim` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_surat`
--

INSERT INTO `tb_surat` (`id_surat`, `id_cust`, `tanggal_kirim`) VALUES
(10126, 2016, '2023-07-10'),
(10128, 2017, '2023-07-26'),
(10129, 2015, '2023-07-09'),
(10130, 2016, '2023-07-06'),
(10133, 2015, '2023-07-10'),
(10134, 2015, '2023-07-10'),
(10135, 2016, '2023-07-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nm_user` varchar(100) NOT NULL,
  `nik` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `level` varchar(200) NOT NULL,
  `kode` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nm_user`, `nik`, `password`, `status`, `level`, `kode`) VALUES
(1, 'Andi Susanto', 12345, '$2y$10$R1G8QXHO/zulS/AVfX.TFuWebHaKgh9biRLubmU/tEhbJ0a9qrtaO', 'driver', '2', '64a7f41b65f35'),
(2, 'Budi Santoso', 98765, '$2y$10$R1G8QXHO/zulS/AVfX.TFuWebHaKgh9biRLubmU/tEhbJ0a9qrtaO', 'driver', '2', '2'),
(3, 'Doni Prasetyo', 23456, '$2y$10$R1G8QXHO/zulS/AVfX.TFuWebHaKgh9biRLubmU/tEhbJ0a9qrtaO', 'driver', '2', '2'),
(4, 'Ahmad Santoso', 56789, '$2y$10$R1G8QXHO/zulS/AVfX.TFuWebHaKgh9biRLubmU/tEhbJ0a9qrtaO', 'driver', '2', '64aa560fb4c9d'),
(5, 'Rudi Kusuma', 90123, '$2y$10$R1G8QXHO/zulS/AVfX.TFuWebHaKgh9biRLubmU/tEhbJ0a9qrtaO', 'driver', '2', '64abf42672e79'),
(6, 'rapi', 123, '$2y$10$4dC/U8WPU50t2UkjQovOGecN.KFuI07S2Kvyc9VzV.78MugogOQYO', 'staff', '1', '64abe75b44732'),
(8, 'Faisal Prasetya', 1234, '$2y$10$R1G8QXHO/zulS/AVfX.TFuWebHaKgh9biRLubmU/tEhbJ0a9qrtaO', 'driver', '2', '64a7f8524075d'),
(10, 'Hadi Pranata', 34567, '$2y$10$R1G8QXHO/zulS/AVfX.TFuWebHaKgh9biRLubmU/tEhbJ0a9qrtaO', 'driver', '2', '2'),
(11, 'Rizki Santoso', 67890, '$2y$10$R1G8QXHO/zulS/AVfX.TFuWebHaKgh9biRLubmU/tEhbJ0a9qrtaO', 'driver', '2', '64a2a86ac2e73');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `riwayat_pemakaian_mobil`
--
ALTER TABLE `riwayat_pemakaian_mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayat_pengiriman_driver`
--
ALTER TABLE `riwayat_pengiriman_driver`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayat_servis`
--
ALTER TABLE `riwayat_servis`
  ADD PRIMARY KEY (`id_servis`);

--
-- Indeks untuk tabel `tb_armada`
--
ALTER TABLE `tb_armada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_plat` (`no_plat`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_brg`);

--
-- Indeks untuk tabel `tb_berlaku_sim`
--
ALTER TABLE `tb_berlaku_sim`
  ADD PRIMARY KEY (`id_sim`);

--
-- Indeks untuk tabel `tb_brg_laku`
--
ALTER TABLE `tb_brg_laku`
  ADD PRIMARY KEY (`id_laris`);

--
-- Indeks untuk tabel `tb_cekin`
--
ALTER TABLE `tb_cekin`
  ADD PRIMARY KEY (`id_cekin`);

--
-- Indeks untuk tabel `tb_cekout`
--
ALTER TABLE `tb_cekout`
  ADD PRIMARY KEY (`id_cekout`);

--
-- Indeks untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id_cust`);

--
-- Indeks untuk tabel `tb_cus_royal`
--
ALTER TABLE `tb_cus_royal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_driver`
--
ALTER TABLE `tb_driver`
  ADD PRIMARY KEY (`id_driver`);

--
-- Indeks untuk tabel `tb_jrk_tempuh`
--
ALTER TABLE `tb_jrk_tempuh`
  ADD PRIMARY KEY (`id_jrk`);

--
-- Indeks untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `tb_pengirim`
--
ALTER TABLE `tb_pengirim`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indeks untuk tabel `tb_rdo`
--
ALTER TABLE `tb_rdo`
  ADD PRIMARY KEY (`id_rdo`);

--
-- Indeks untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `riwayat_servis`
--
ALTER TABLE `riwayat_servis`
  MODIFY `id_servis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80102;

--
-- AUTO_INCREMENT untuk tabel `tb_armada`
--
ALTER TABLE `tb_armada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `kode_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT untuk tabel `tb_berlaku_sim`
--
ALTER TABLE `tb_berlaku_sim`
  MODIFY `id_sim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_brg_laku`
--
ALTER TABLE `tb_brg_laku`
  MODIFY `id_laris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_cekin`
--
ALTER TABLE `tb_cekin`
  MODIFY `id_cekin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_cekout`
--
ALTER TABLE `tb_cekout`
  MODIFY `id_cekout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id_cust` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2025;

--
-- AUTO_INCREMENT untuk tabel `tb_cus_royal`
--
ALTER TABLE `tb_cus_royal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_driver`
--
ALTER TABLE `tb_driver`
  MODIFY `id_driver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_jrk_tempuh`
--
ALTER TABLE `tb_jrk_tempuh`
  MODIFY `id_jrk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tb_pengirim`
--
ALTER TABLE `tb_pengirim`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=400082;

--
-- AUTO_INCREMENT untuk tabel `tb_rdo`
--
ALTER TABLE `tb_rdo`
  MODIFY `id_rdo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200031;

--
-- AUTO_INCREMENT untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10136;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
