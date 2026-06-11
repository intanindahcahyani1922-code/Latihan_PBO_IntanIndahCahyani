-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2026 at 07:13 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan_pbo_ti-1d_intanindahcahyani`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tiket`
--

CREATE TABLE `tabel_tiket` (
  `id_tiket` int NOT NULL,
  `nama_film` varchar(100) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int NOT NULL,
  `harga_dasar_tiket` decimal(10,2) NOT NULL,
  `jenis_studio` enum('Reguler','IMAX','Velvet') NOT NULL,
  `tipe_audio` varchar(50) DEFAULT NULL,
  `lokasi_baris` varchar(10) DEFAULT NULL,
  `kacamata_3d_id` int DEFAULT NULL,
  `efek_gerak_fitur` varchar(50) DEFAULT NULL,
  `bantal_selimut_pack` tinyint(1) DEFAULT '0',
  `layanan_butler` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_tiket`
--

INSERT INTO `tabel_tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `jumlah_kursi`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
(1, 'Avengers: Endgame', '2026-06-12 13:00:00', 150, 40000.00, 'Reguler', 'Dolby Digital 5.1', 'A-G', NULL, NULL, 0, 0),
(2, 'KKN di Desa Penari', '2026-06-12 15:30:00', 120, 35000.00, 'Reguler', 'Dolby Digital 5.1', 'B-H', NULL, NULL, 0, 0),
(3, 'Spiderman: No Way Home', '2026-06-12 18:45:00', 150, 45000.00, 'Reguler', 'Dolby Atmos', 'A-G', NULL, NULL, 0, 0),
(4, 'Agak Laen', '2026-06-13 12:00:00', 100, 35000.00, 'Reguler', 'Stereo 2.0', 'C-J', NULL, NULL, 0, 0),
(5, 'Siksa Kubur', '2026-06-13 14:15:00', 130, 40000.00, 'Reguler', 'Dolby Digital 5.1', 'A-F', NULL, NULL, 0, 0),
(6, 'The Conjuring 4', '2026-06-14 21:00:00', 140, 45000.00, 'Reguler', 'Dolby Atmos', 'B-G', NULL, NULL, 0, 0),
(7, 'Dilan 1991', '2026-06-15 16:00:00', 90, 35000.00, 'Reguler', 'Dolby Digital 5.1', 'D-K', NULL, NULL, 0, 0),
(8, 'Avatar: The Way of Water', '2026-06-12 14:00:00', 250, 75000.00, 'IMAX', 'IMAX 12-Channel', 'A-P', 301, 'Laser Projection', 0, 0),
(9, 'Dune: Part Two', '2026-06-12 19:30:00', 220, 80000.00, 'IMAX', 'IMAX 12-Channel', 'B-O', NULL, 'Laser Projection', 0, 0),
(10, 'Oppenheimer', '2026-06-13 13:00:00', 200, 75000.00, 'IMAX', 'IMAX 6-Channel', 'C-N', NULL, '70mm Film Effect', 0, 0),
(11, 'Interstellar (Re-release)', '2026-06-13 17:00:00', 250, 75000.00, 'IMAX', 'IMAX 12-Channel', 'A-P', NULL, 'Laser Projection', 0, 0),
(12, 'Top Gun: Maverick', '2026-06-14 11:00:00', 210, 80000.00, 'IMAX', 'IMAX 12-Channel', 'D-M', NULL, 'Vibration Fitur', 0, 0),
(13, 'Godzilla x Kong', '2026-06-14 15:30:00', 240, 85000.00, 'IMAX', 'IMAX 12-Channel', 'A-P', 302, '4D Shaking', 0, 0),
(14, 'Inception', '2026-06-15 20:00:00', 180, 75000.00, 'IMAX', 'IMAX 6-Channel', 'B-L', NULL, 'Standard IMAX', 0, 0),
(15, 'Titanic (Remastered)', '2026-06-12 12:30:00', 40, 120000.00, 'Velvet', 'Dolby Atmos', 'V-A', NULL, 'Sofa Bed Comfort', 1, 1),
(16, 'The Great Gatsby', '2026-06-12 16:00:00', 30, 130000.00, 'Velvet', 'Dolby Atmos', 'V-B', NULL, 'Sofa Bed Comfort', 1, 1),
(17, 'La La Land', '2026-06-13 18:00:00', 40, 120000.00, 'Velvet', 'Dolby Digital 5.1', 'V-A', NULL, 'Premium Pack', 1, 0),
(18, 'Past Lives', '2026-06-13 20:30:00', 30, 110000.00, 'Velvet', 'Stereo 2.0', 'V-C', NULL, 'Standard Velvet', 1, 0),
(19, 'A Quiet Place: Day One', '2026-06-14 14:00:00', 40, 135000.00, 'Velvet', 'Dolby Atmos', 'V-A', NULL, 'Surround Haptic Bed', 1, 1),
(20, 'Anatomie d\'une chute', '2026-06-14 17:30:00', 30, 120000.00, 'Velvet', 'Dolby Digital 5.1', 'V-B', NULL, 'Sofa Bed Comfort', 1, 0),
(21, 'Challengers', '2026-06-15 19:00:00', 40, 125000.00, 'Velvet', 'Dolby Atmos', 'V-A', NULL, 'Premium Pack', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  MODIFY `id_tiket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
