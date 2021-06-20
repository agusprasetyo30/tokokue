-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2021 at 09:33 PM
-- Server version: 8.0.23
-- PHP Version: 7.3.27-9+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int NOT NULL,
  `nama` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Kue Cup'),
(2, 'Roti Bakar'),
(3, 'Kue Lapis'),
(4, 'Es Krim'),
(5, 'Donat'),
(6, 'Oreo Cake');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_makanan`
--

CREATE TABLE `kategori_makanan` (
  `id` int NOT NULL,
  `id_makanan` int NOT NULL,
  `id_kategori` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori_makanan`
--

INSERT INTO `kategori_makanan` (`id`, `id_makanan`, `id_kategori`) VALUES
(8, 10, 2),
(9, 10, 4),
(10, 1, 1),
(11, 1, 2),
(12, 2, 2),
(13, 2, 3),
(14, 3, 3),
(15, 3, 6),
(16, 4, 5),
(17, 11, 5);

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `id` int NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `harga` int DEFAULT NULL,
  `gambar` text,
  `resep` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`id`, `nama`, `harga`, `gambar`, `resep`) VALUES
(1, 'Kue Klepon', 5000, 'KueKlepon.jpg', '<p>Tinggal dimakan saja</p>'),
(2, 'Kue Lumpur', 7000, 'KueLumpur.jpg', '<p>Pokok enak</p>'),
(3, 'Kue Serabi', 10000, 'KueSerabi.jpg', '<p>Sama kayak serabeh ?</p>'),
(4, 'Kue Pukis', 10000, 'KuePukis.jpg', '<p>Jangan sampai 1 huruf hilang</p>'),
(10, 'Gedang Goreng', 20000, 'GedangGoreng.jpg', '<p>1. Tuku tepung</p><p>2. kek i banyu</p><p>3. goreng</p><p>4. pangan</p>'),
(11, 'Donat Kentang', 15000, 'DonatKentang.jpg', '<p>1. Keluar rumah</p><p>2. Ambil sepeda motor</p><p>3. pergi ke toko donat</p>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `status`) VALUES
(1, 'Admin123', 'admin', '202cb962ac59075b964b07152d234b70', 'AKTIF'),
(8, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'AKTIF'),
(10, 'Adhi Setyo Wibisono', 'melkan123', 'bf5309523a84358d17bb12559d2c2a35', 'AKTIF'),
(11, 'Andana Widanda', 'andana123', '9cf70db714f1f234c6a26f3820203a50', 'AKTIF'),
(12, 'Anwar Adi Setiyono', 'kodox123', '3bcad38d49b9fb261c60a7251df39a27', 'NONAKTIF'),
(13, 'Arif Budi Kusuma', 'arifsangpenakluk', '8a3ee1b5446ab52693919f275e7b4382', 'AKTIF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_makanan`
--
ALTER TABLE `kategori_makanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_makanan_makanan` (`id_makanan`),
  ADD KEY `kategori_makanan_kategori` (`id_kategori`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori_makanan`
--
ALTER TABLE `kategori_makanan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategori_makanan`
--
ALTER TABLE `kategori_makanan`
  ADD CONSTRAINT `kategori_makanan_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kategori_makanan_makanan` FOREIGN KEY (`id_makanan`) REFERENCES `makanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
