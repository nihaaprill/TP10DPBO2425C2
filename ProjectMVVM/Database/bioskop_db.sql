-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Des 2025 pada 15.49
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioskop_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id_booking` int(11) NOT NULL,
  `id_schedule` int(11) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `seats` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bookings`
--

INSERT INTO `bookings` (`id_booking`, `id_schedule`, `customer_name`, `seats`) VALUES
(1, 1, 'Ahmad Pratama', 3),
(2, 2, 'Dewi Anggun', 2),
(3, 3, 'Kevin Wijaya', 4),
(4, 4, 'Nabila Putri', 2),
(5, 5, 'Rio Alexander', 1),
(6, 6, 'Siti Zahra', 5),
(7, 7, 'Bagas Satrio', 2),
(8, 8, 'Rika Amelia', 3),
(9, 9, 'Amelia Nuraini', 4),
(10, 10, 'Farhan Saputra', 2),
(11, 11, 'Joni', 5),
(13, 11, 'Dudin', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `movies`
--

CREATE TABLE `movies` (
  `id_movie` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `movies`
--

INSERT INTO `movies` (`id_movie`, `title`, `genre`, `duration`) VALUES
(1, 'Avengers: Endgame', 'Action', 182),
(2, 'Inside Out 2', 'Animation', 110),
(3, 'Spider-Man: No Way Home', 'Action', 148),
(4, 'Conjuring 3', 'Horror', 112),
(5, 'Frozen 2', 'Animation', 103),
(6, 'John Wick 4', 'Action', 100),
(7, 'Barbie', 'Comedy', 114),
(8, 'Oppenheimer', 'Drama', 150),
(9, 'The Nun II', 'Horror', 110),
(10, 'Wonka', 'Fantasy', 120),
(12, 'It (2017)', 'Fantasy', 135),
(16, 'Zootopia', 'Family', 185);

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedules`
--

CREATE TABLE `schedules` (
  `id_schedule` int(11) NOT NULL,
  `id_movie` int(11) DEFAULT NULL,
  `id_studio` int(11) DEFAULT NULL,
  `showtime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `schedules`
--

INSERT INTO `schedules` (`id_schedule`, `id_movie`, `id_studio`, `showtime`) VALUES
(1, 1, 1, '2025-12-05 14:00:00'),
(2, 2, 2, '2025-12-05 10:00:00'),
(3, 3, 3, '2025-12-05 18:00:00'),
(4, 4, 4, '2025-12-05 21:30:00'),
(5, 5, 5, '2025-12-05 09:30:00'),
(6, 6, 6, '2025-12-05 19:00:00'),
(7, 7, 7, '2025-12-05 13:00:00'),
(8, 8, 6, '2025-12-05 16:00:00'),
(9, 9, 9, '2025-12-05 22:00:00'),
(10, 10, 8, '2025-12-05 11:45:00'),
(11, 12, 1, '2025-12-04 21:05:00'),
(15, 16, 14, '2025-12-04 22:42:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `studios`
--

CREATE TABLE `studios` (
  `id_studio` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `studios`
--

INSERT INTO `studios` (`id_studio`, `name`, `capacity`) VALUES
(1, 'Studio 1', 120),
(2, 'Studio 2', 90),
(3, 'Studio 3', 150),
(4, 'Studio 4', 200),
(5, 'Studio 5', 80),
(6, 'Studio 6 VIP', 60),
(7, 'Studio 7', 140),
(8, 'Studio 8', 100),
(9, 'Studio 9 Atmos', 180),
(10, 'Studio 10 Gold', 10),
(14, 'Studio anak', 20);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_schedule` (`id_schedule`);

--
-- Indeks untuk tabel `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id_movie`);

--
-- Indeks untuk tabel `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id_schedule`),
  ADD KEY `id_movie` (`id_movie`),
  ADD KEY `id_studio` (`id_studio`);

--
-- Indeks untuk tabel `studios`
--
ALTER TABLE `studios`
  ADD PRIMARY KEY (`id_studio`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `movies`
--
ALTER TABLE `movies`
  MODIFY `id_movie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id_schedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `studios`
--
ALTER TABLE `studios`
  MODIFY `id_studio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`id_schedule`) REFERENCES `schedules` (`id_schedule`);

--
-- Ketidakleluasaan untuk tabel `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`id_movie`) REFERENCES `movies` (`id_movie`),
  ADD CONSTRAINT `schedules_ibfk_2` FOREIGN KEY (`id_studio`) REFERENCES `studios` (`id_studio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
