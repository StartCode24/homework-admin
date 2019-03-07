-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07 Mar 2019 pada 17.59
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homework`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `siswa_id` int(10) NOT NULL,
  `siswa_nis` varchar(50) NOT NULL,
  `siswa_name` varchar(50) NOT NULL,
  `siswa_alamat` varchar(50) DEFAULT NULL,
  `kelas_id` varchar(255) NOT NULL,
  `jurusan_id` varchar(100) NOT NULL,
  `siswa_password` varchar(50) NOT NULL,
  `siswa_note` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`siswa_id`, `siswa_nis`, `siswa_name`, `siswa_alamat`, `kelas_id`, `jurusan_id`, `siswa_password`, `siswa_note`) VALUES
(1324, '4324324', 'dasdsa', 'rewrewrew', '10', '5', '2343242', ''),
(1325, '5140411151', 'Soimah', 'sss', '2', '13', '12345', 'harus'),
(1326, '4214214214', 'Adi Mikomi', 'Jalan Kenangan', '16', '5', 'testing', ''),
(1327, '23131231231', 'Brodi Loius', 'Jalan Anggrek 201', '4', '7', 'testing', ''),
(1328, '123tes', '123tes', '123tes', '10', '11', '123tes', ''),
(1332, '8888', 'Vikartamano', '', '8', '11', 'skedi1234', ''),
(1333, '51404', 'Sarifudin', 'sss', '1', '13', '123456', 'sss');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `siswa_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1334;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
