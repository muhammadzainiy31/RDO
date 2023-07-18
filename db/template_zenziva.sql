-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 18, 2023 at 03:53 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

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

-- --------------------------------------------------------

--
-- Table structure for table `template_zenziva`
--

DROP TABLE IF EXISTS `template_zenziva`;
CREATE TABLE IF NOT EXISTS `template_zenziva` (
  `id` int NOT NULL AUTO_INCREMENT,
  `flag` varchar(50) NOT NULL,
  `kalimat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `template_zenziva`
--

INSERT INTO `template_zenziva` (`id`, `flag`, `kalimat`) VALUES
(1, 'antar', 'Kami dari Informa. Ingin mengabarkan paket anda, sedang kami kirim dan dalam perjalanan.'),
(2, 'kirim', 'Paket anda sudah selesai kami kirimkan. Terima kasih atas pembeliannya.'),
(3, 'pending', 'Kami dari Informa. Ingin mengabarkan pengiriman paket anda tertunda, kami akan informasikan jika pengiriman selanjutnya. Mohon maaf atas kendala ini.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
