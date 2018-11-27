-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2018 at 01:41 PM
-- Server version: 10.1.30-MariaDB
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `status`) VALUES
('1', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `guru_id` varchar(255) NOT NULL,
  `guruname` varchar(255) NOT NULL,
  `mapel_id` varchar(255) NOT NULL,
  `guru_jurusan` varchar(100) NOT NULL,
  `guru_note` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`guru_id`, `guruname`, `mapel_id`, `guru_jurusan`, `guru_note`) VALUES
('1006974173', 'Kayla Mayasari S.Pd', '9', '0', ''),
('1018780774', 'Dewi Maryati S.Pd', '5', '0', ''),
('1099176225', 'Balidin Wacana M.Pd', '6', '0', ''),
('1122157636', 'Zelda Purnawati S.Pd', '7', '0', ''),
('1274182432', 'Gaduh Rajata S.Pd', '12', '0', ''),
('1301902278', 'Dina Mulyani S.Pd', '10', '0', ''),
('1321724732', 'Karman Prakasa S.Pd', '4', '0', ''),
('1365634231', 'Bakianto Megantara S.Pd', '10', '0', ''),
('1389049999', 'Purwadi Natsir M.Pd', '2', '0', ''),
('167836786', 'Baktianto Maryadi M.Pd', '13', '0', ''),
('167876273', 'Koko Mansur S.Pd', '2', '0', ''),
('193779719', 'Bagya Halim M.Pd', '7', '0', ''),
('267620334', 'Sabri Januar M.Pd', '5', '0', ''),
('287521762', 'Raihan Pranowo M.Pd', '5', '0', ''),
('297235554', 'Dewi Agustina M.Pd', '1', '0', ''),
('318953382', 'Natalia Namaga S.Pd', '8', '0', ''),
('335577392', 'Cici Lailasari S.Pd', '6', '0', ''),
('415656947', 'Keisha Maryati S.Pd', '12', '0', ''),
('416525660', 'Prabawa Haryanto M.Pd', '6', '0', ''),
('484522205', 'Rahayu Palastri M.Pd', '10', '0', ''),
('509872834', 'Bambang Mahendra S.Pd', '3', '0', ''),
('656724838', 'Gandi Simanjuntak M.Pd', '7', '0', ''),
('660910456', 'Julia Rahmawati M.Pd', '5', '0', ''),
('688235432', 'Dwi Sirait S.Pd', '2', '0', ''),
('746952542', 'Aditya Prayoga S.Pd', '13', '0', ''),
('869559553', 'Yani Suartini S.Pd', '8', '0', ''),
('893488650', 'Dasa Nugroho S.Pd', '9', '0', ''),
('940359672', 'Winda Wulandari S.Pd', '8', '0', ''),
('947032968', 'Hasna Wastuti S.Pd', '6', '0', ''),
('971672831', 'Salsabila Prastuti M.Pd', '3', '0', ''),
('980044067', 'Hana Kusmawati S.Pd', '12', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `jurusan_id` varchar(100) NOT NULL,
  `jurusan_name` varchar(200) NOT NULL,
  `jurusan_kepala` varchar(100) DEFAULT NULL,
  `jurusan_note` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`jurusan_id`, `jurusan_name`, `jurusan_kepala`, `jurusan_note`) VALUES
('1', 'Teknik konstruksi gedung, sanitasi dan perawatan', NULL, NULL),
('10', 'Teknik Fabrikasi Logam Dan Manufaktur', NULL, NULL),
('11', 'Kimia Industri', NULL, NULL),
('12', 'Kimia Analis', NULL, NULL),
('13', 'Geologi Pertambangan', NULL, NULL),
('14', 'Teknik Pengolahan Migas Dan Petrokimia', NULL, NULL),
('2', 'Teknik Komputer Dan Jaringan', NULL, NULL),
('3', 'Teknik Sistem Informasi, Jaringan Dan Aplikasi', NULL, NULL),
('4', 'Teknik Desain Pemodelan Dan Informasi Bangunan', NULL, NULL),
('5', 'Teknik Elektronika Daya Dan Komunikasi', NULL, NULL),
('6', 'Teknik Audio Video', NULL, NULL),
('7', 'Teknik Otomasi Industri', NULL, NULL),
('8', 'Teknik Manajemen Dan Perawatan Otomotif', NULL, NULL),
('9', 'Teknik Bodi Otomotif', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` varchar(255) NOT NULL,
  `kelas_name` varchar(255) NOT NULL,
  `kelas_jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kelas_name`, `kelas_jurusan`) VALUES
('31', 'Kimia Organik', 'Kimia');

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
('9', 'Bahasa Jawa', '');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` varchar(255) NOT NULL,
  `roomname` varchar(255) NOT NULL,
  `room_note` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `roomname`, `room_note`) VALUES
('1', 'Ruang AVI', NULL),
('829', 'Lab Kimia', 'Di samping ruang kelas 11 IPS 4');

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

INSERT INTO `schedule` (`schedule_id`, `schedule_date`, `start_time`, `finish_time`, `day`, `note`, `guru_id`, `mapel_id`, `kelas_id`, `jurusan_id`, `room_id`) VALUES
('3213213', '2018-11-24', '06:00:00', '08:00:00', 'Sabtu', NULL, '1006974173', '9', '31', '9', '1');

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
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `mapel_id` (`mapel_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `jurusan_id` (`jurusan_id`),
  ADD KEY `guru_id` (`guru_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`siswa_id`),
  ADD KEY `siswa_jurusan` (`jurusan_id`),
  ADD KEY `siswa_kelas` (`kelas_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`),
  ADD CONSTRAINT `schedule_ibfk_3` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`jurusan_id`),
  ADD CONSTRAINT `schedule_ibfk_4` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`mapel_id`),
  ADD CONSTRAINT `schedule_ibfk_5` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`guru_id`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`jurusan_id`),
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
