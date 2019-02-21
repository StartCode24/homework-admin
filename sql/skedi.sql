-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2019 at 11:51 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skedi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(2) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `status`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `guru_id` int(25) NOT NULL,
  `guruname` varchar(255) NOT NULL,
  `mapel_id` varchar(255) NOT NULL,
  `guru_jurusan` varchar(100) NOT NULL,
  `guru_note` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`guru_id`, `guruname`, `mapel_id`, `guru_jurusan`, `guru_note`) VALUES
(167836786, 'Baktianto Maryadi M.Pd', '13', '0', ''),
(167876273, 'Koko Mansur S.Pd', '2', '0', ''),
(193779719, 'Bagya Halim M.Pd', '7', '0', ''),
(267620334, 'Sabri Januar M.Pd', '5', '0', ''),
(287521762, 'Raihan Pranowo M.Pd', '5', '0', ''),
(297235554, 'Dewi Agustina M.Pd', '1', '0', ''),
(318953382, 'Natalia Namaga S.Pd', '8', '0', ''),
(335577392, 'Cici Lailasari S.Pd', '6', '0', ''),
(415656947, 'Keisha Maryati S.Pd', '12', '0', ''),
(416525660, 'Prabawa Haryanto M.Pd', '6', '0', ''),
(484522205, 'Rahayu Palastri M.Pd', '10', '0', ''),
(509872834, 'Bambang Mahendra S.Pd', '3', '0', ''),
(656724838, 'Gandi Simanjuntak M.Pd', '7', '0', ''),
(660910456, 'Julia Rahmawati M.Pd', '5', '0', ''),
(688235432, 'Dwi Sirait S.Pd', '2', '0', ''),
(746952542, 'Aditya Prayoga S.Pd', '13', '0', ''),
(869559553, 'Yani Suartini S.Pd', '8', '0', ''),
(893488650, 'Dasa Nugroho S.Pd', '9', '0', ''),
(940359672, 'Winda Wulandari S.Pd', '8', '0', ''),
(947032968, 'Hasna Wastuti S.Pd', '6', '0', ''),
(971672831, 'Salsabila Prastuti M.Pd', '3', '0', ''),
(980044067, 'Hana Kusmawati S.Pd', '12', '0', ''),
(1006974173, 'Kayla Mayasari S.Pd', '9', '0', ''),
(1018780774, 'Dewi Maryati S.Pd', '5', '0', ''),
(1099176225, 'Balidin Wacana M.Pd', '6', '0', ''),
(1122157636, 'Zelda Purnawati S.Pd', '7', '0', ''),
(1274182432, 'Gaduh Rajata S.Pd', '12', '0', ''),
(1301902278, 'Dina Mulyani S.Pd', '10', '0', ''),
(1321724732, 'Karman Prakasa S.Pd', '4', '0', ''),
(1365634231, 'Bakianto Megantara S.Pd', '10', '0', ''),
(1389049999, 'Purwadi Natsir M.Pd', '2', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `homework_id` int(25) NOT NULL,
  `homework_date` date NOT NULL,
  `start_time` time NOT NULL,
  `finish_time` time NOT NULL,
  `day` varchar(100) NOT NULL,
  `note` text,
  `guru_id` varchar(255) NOT NULL,
  `mapel_id` varchar(255) NOT NULL,
  `kelas_id` varchar(255) NOT NULL,
  `jurusan_id` varchar(100) NOT NULL,
  `room_id` varchar(255) NOT NULL,
  `schedule_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `jurusan_id` int(5) NOT NULL,
  `jurusan_name` varchar(200) NOT NULL,
  `jurusan_kepala` varchar(100) DEFAULT NULL,
  `jurusan_note` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`jurusan_id`, `jurusan_name`, `jurusan_kepala`, `jurusan_note`) VALUES
(1, 'Teknik konstruksi gedung, sanitasi dan perawatan', 'Bahri', 'tes'),
(2, 'Teknik Komputer Dan Jaringan', NULL, NULL),
(3, 'Teknik Sistem Informasi, Jaringan Dan Aplikasi', NULL, NULL),
(4, 'Teknik Desain Pemodelan Dan Informasi Bangunan', NULL, NULL),
(5, 'Teknik Elektronika Daya Dan Komunikasi', NULL, NULL),
(6, 'Teknik Audio Video', NULL, NULL),
(7, 'Teknik Otomasi Industri', NULL, NULL),
(8, 'Teknik Manajemen Dan Perawatan Otomotif', NULL, NULL),
(9, 'Teknik Bodi Otomotif', NULL, NULL),
(10, 'Teknik Fabrikasi Logam Dan Manufaktur', NULL, NULL),
(11, 'Kimia Industri', NULL, NULL),
(12, 'Kimia Analis', NULL, NULL),
(13, 'Geologi Pertambangan', NULL, NULL),
(14, 'Teknik Pengolahan Migas Dan Petrokimia', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(5) NOT NULL,
  `kelas_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kelas_name`) VALUES
(1, '10'),
(2, '11'),
(3, '12');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `mapel_id` varchar(255) NOT NULL,
  `mapelname` varchar(255) NOT NULL,
  `mapel_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`mapel_id`, `mapelname`, `mapel_note`) VALUES
('1', 'IPA', ''),
('2', 'IPS', ''),
('3', 'Bimbingan Konseling', ''),
('4', 'Bahasa Inggris', ''),
('9', 'Bahasa Jawa', '');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(25) NOT NULL,
  `roomname` varchar(255) NOT NULL,
  `room_note` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `roomname`, `room_note`) VALUES
(1, 'Ruang AVI 1', 'tes'),
(2, 'Ruang Teori 1', NULL),
(3, 'Ruang Teori 2', NULL),
(829, 'Lab Kimia', 'Di samping ruang kelas 11 IPS 4');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` varchar(255) NOT NULL,
  `schedule_date` date NOT NULL,
  `start_time` time NOT NULL,
  `finish_time` time NOT NULL,
  `day` varchar(100) NOT NULL,
  `jam_ke` int(2) NOT NULL,
  `note` text,
  `guru_id` varchar(255) NOT NULL,
  `mapel_id` varchar(255) NOT NULL,
  `kelas_id` varchar(255) NOT NULL,
  `jurusan_id` varchar(100) NOT NULL,
  `room_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `schedule_date`, `start_time`, `finish_time`, `day`, `jam_ke`, `note`, `guru_id`, `mapel_id`, `kelas_id`, `jurusan_id`, `room_id`) VALUES
('212334', '2018-12-04', '08:00:00', '09:00:00', 'Selasa', 0, NULL, '893488650', '4', '51', '11', '2'),
('3213213', '2018-11-24', '06:00:00', '08:00:00', 'Sabtu', 0, NULL, '1006974173', '9', '31', '9', '1'),
('3213214', '2018-11-24', '06:00:00', '08:00:00', 'Sabtu', 0, NULL, '1006974173', '9', '31', '9', '1'),
('3213215', '2018-11-24', '06:00:00', '08:00:00', 'Sabtu', 0, NULL, '1006974173', '9', '31', '9', '1'),
('34211177', '2018-11-29', '10:00:00', '12:00:00', 'Kamis', 0, NULL, '1018780774', '3', '31', '2', '2'),
('356671', '2018-12-03', '09:00:00', '10:00:00', 'Senin', 0, NULL, '415656947', '4', '122', '5', '3'),
('432432', '2018-11-30', '09:00:00', '10:00:00', 'Jumat', 0, NULL, '287521762', '3', '51', '12', '3'),
('634643', '2018-12-05', '11:00:00', '13:00:00', 'Rabu', 0, NULL, '746952542', '4', '51', '14', '2'),
('6346432', '2018-12-05', '11:00:00', '13:00:00', 'Rabu', 0, NULL, '746952542', '4', '51', '14', '2');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `siswa_id` varchar(255) NOT NULL,
  `siswa_nik` varchar(50) NOT NULL,
  `siswa_name` varchar(50) NOT NULL,
  `siswa_alamat` varchar(50) DEFAULT NULL,
  `kelas_id` varchar(255) NOT NULL,
  `jurusan_id` varchar(100) NOT NULL,
  `siswa_password` varchar(50) NOT NULL,
  `siswa_note` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`siswa_id`, `siswa_nik`, `siswa_name`, `siswa_alamat`, `kelas_id`, `jurusan_id`, `siswa_password`, `siswa_note`) VALUES
('3432432432', '5140411151', 'Soimah', 'sss', '31', '7', '12345', 'harus'),
('42112', '4214214214', 'Adi Mikomi', 'Jalan Kenangan', '31', '6', 'testing', NULL),
('432422221323', '23131231231', 'Brodi Loius', 'Jalan Anggrek 201', '31', '9', 'testing', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`guru_id`);

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`homework_id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`jurusan_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`mapel_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `guru_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1389050000;

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `homework_id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `jurusan_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=830;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
