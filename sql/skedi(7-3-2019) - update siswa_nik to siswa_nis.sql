-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2019 at 05:25 PM
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
(484522205, 'Rahayu Palastri M.Pd', '0010', '0', ''),
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
  `alarm_time` time DEFAULT NULL,
  `day` varchar(100) NOT NULL,
  `note` text,
  `guru_id` varchar(255) NOT NULL,
  `mapel_id` varchar(255) NOT NULL,
  `kelas_id` varchar(255) NOT NULL,
  `jurusan_id` varchar(100) NOT NULL,
  `room_id` varchar(255) NOT NULL,
  `schedule_id` varchar(255) NOT NULL,
  `siswa_nik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `jurusan_id` int(5) NOT NULL,
  `jurusan_name` varchar(200) NOT NULL,
  `jurusan_kepala` varchar(100) DEFAULT NULL,
  `jurusan_note` text,
  `jurusan_singkat` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`jurusan_id`, `jurusan_name`, `jurusan_kepala`, `jurusan_note`, `jurusan_singkat`) VALUES
(1, 'Teknik  Kontruksi Gedung, Sanitasi dan Perawatan', 'Bapak', 'KGSP', 'KGSP'),
(2, 'Teknik Desain Pemodelan dan Informasi Bangunan', 'Bapak', 'DPIB', 'DPIB'),
(3, 'Teknik Audio Video', 'Bapak', 'TAV', 'TAV'),
(4, 'Teknik Elektronika Daya dan Komunikasi', 'Bapak', 'TEDK', 'TEDK'),
(5, 'Teknik Komputer dan Jaringan', 'Bapak Sugiyono', 'TKJ', 'TKJ'),
(6, 'Sistem Informasi, Jaringan dan Aplikasi', 'Bapak', 'SIJA', 'SIJA'),
(7, 'Teknik Otomasi Industri', 'Bapak', 'TOI A dan TOI B', 'TOI'),
(8, 'Teknik Fabrikasi Logam dan Manufaktur', 'Bapak', 'TFLM A dan TFLM B', 'TFLM'),
(9, 'Teknik Bodi Otomotif', 'Bapak', 'TBO', 'TBO'),
(10, 'Teknik Manajemen dan Perawatan Otomotif', 'Bapak', 'TMPO', 'TMPO'),
(11, 'Kimia Industri', 'Bapak', 'KI A dan KI B', 'KI'),
(12, 'Kimia Analis', 'Bapak', 'KA A dan KA B', 'KA'),
(13, 'Geologi Pertambangan', 'Bapak', 'GP A dan GP B', 'GP'),
(14, 'Teknik Pengolahan Migas dan Petrokimia', 'Bapak', 'TPMP', 'TPMP');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(5) NOT NULL,
  `kelas_name` varchar(255) NOT NULL,
  `kelas_jurusan` varchar(255) NOT NULL,
  `kelas_sub` varchar(2) DEFAULT NULL,
  `kelas_notasi` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kelas_name`, `kelas_jurusan`, `kelas_sub`, `kelas_notasi`) VALUES
(1, '10', '13', 'A', '10-GP-A'),
(2, '10', '13', 'B', '10-GP-B'),
(4, '10', '7', 'A', '10-TOI-A'),
(5, '10', '7', 'B', '10-TOI-B'),
(6, '10', '8', 'A', '10-TFLM-A'),
(7, '10', '8', 'B', '10-TFLM-B'),
(8, '10', '11', 'A', '10-KI-A'),
(9, '10', '11', 'B', '10-KI-B'),
(10, '10', '12', 'A', '10-KA-A'),
(11, '10', '12', 'B', '10-KA-B'),
(12, '10', '1', '', '10-KGSP'),
(13, '10', '2', '', '10-DPIB'),
(14, '10', '3', '', '10-TAV'),
(15, '10', '4', '', '10-TEDK'),
(16, '10', '5', '', '10-TKJ'),
(18, '10', '6', '', '10-SIJA'),
(19, '12', '10', '', '12-TMPO');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `mapel_id` int(15) NOT NULL,
  `mapelname` varchar(255) NOT NULL,
  `mapel_note` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`mapel_id`, `mapelname`, `mapel_note`) VALUES
(1, 'PPKn', 'Pendidikan Pancasila dan Kewarganegaraan'),
(2, 'Fisika', 'Fisika'),
(3, 'Kimia', 'Kimia'),
(4, 'B.Ing', 'Bahasa Inggris'),
(5, 'P.A.I', 'Pendidikan Agama Islam'),
(6, 'Mtk', 'Matematika'),
(7, 'Penjaskes', 'Pendidikan Jasmani dan Kesehatan'),
(8, 'S.Budaya', 'Seni Budaya'),
(9, 'B.Ind', 'Bahasa Indonesia'),
(10, 'Simdig', 'Simulasi Digital'),
(11, 'B.Jawa', 'Bahasa Jawa'),
(12, 'S.Ind', 'Sejarah???'),
(13, 'Komp.&Jar', 'Komputer dan Jaringan (TKJ & SIJA)'),
(14, 'Dsr Desain Grafis', 'Dasar Desain Grafis (TKJ & SIJA)'),
(15, 'S.Komp', 'Sistem Komputer (TKJ & SIJA)'),
(16, 'Pemr.Dasar', 'Pemrograman Dasar (TKJ & SIJA)'),
(17, 'Gamb.Teknik', 'Gambar Teknik (DPIB, KGSP, TOI, TFLM, GP, TPMP)'),
(18, 'T.Penguk.Tanah', 'Teknik Pengukuran Tanah (DPIB & KGSP)'),
(19, 'Mek.Tek', 'Mekanika Teknik (DPIB & KGSP)'),
(20, 'KB', 'Konstruksi Bangunan (DPIB & KGSP)'),
(21, 'KGBT', 'KGBT (TAV & TEDK)'),
(22, 'DLE', 'DLE (TAV & TEDK)'),
(23, 'TPMM', 'TPMM (TAV & TEDK)'),
(24, 'Dsr.List.& Elekt.', 'Dasar Listrik dan Elektro (TOI)'),
(25, 'PDEM', 'PDEM (TOI)'),
(26, 'Pek.Dsr T. Mesin', 'Pek. Dasar Teknik Mesin (TFLM)'),
(27, 'PTDO', 'PTDO (TBO & TMPO)'),
(28, 'TDO.tkr', 'TDO.tkr (TBO & TMPO)'),
(29, 'Mikrobio', 'Mikrobiologi (KI & KA)'),
(30, 'Tek. Dsr. Lab', 'Teknik Dasar Laboratorium (KI & KA)'),
(31, 'Konstanta Tek.', 'Konstanta Teknik (KI & KA)'),
(32, 'Anl. Kim. Das', 'Analisis Kimia Dasar (KI & KA)'),
(33, 'Dasar2 Geologi', 'Dasar-Dasar Geologi (GP & TPMP)'),
(34, 'K3LH', 'K3LH (GP)'),
(35, 'Peng.Ind.Migas', 'Peng. Ind. Migas (TPMP)'),
(36, 'Gamb. TO', 'Gambar Teknik Otomotif (TBO & TMPO)');

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
(1, 'RT 5', 'Ruang Teori 5'),
(2, 'RT 6', 'Ruang Teori 6'),
(3, 'RT 7', 'Ruang Teori 7'),
(4, 'RT 8', 'Ruang Teori 8'),
(5, 'RT 9', 'Ruang Teori 9'),
(6, 'RT 10', 'Ruang Teori 10'),
(7, 'RT 11', 'Ruang Teori 11'),
(8, 'RT 12', 'Ruang Teori 12'),
(9, 'RT 13', 'Ruang Teori 13'),
(10, 'RT 14', 'Ruang Teori 14'),
(11, 'RT 15', 'Ruang Teori 15'),
(12, 'RT 16', 'Ruang Teori 16'),
(13, 'RT 17', 'Ruang Teori 17'),
(14, 'RT 18', 'Ruang Teori 18'),
(15, 'RT 19', 'Ruang Teori 19'),
(16, 'RT 20', 'Ruang Teori 20'),
(17, 'RT 21', 'Ruang Teori 21'),
(18, 'RT 22', 'Ruang Teori 22'),
(19, 'RT 23', 'Ruang Teori 23'),
(20, 'RT 24', 'Ruang Teori 24'),
(21, 'RT 25', 'Ruang Teori 25'),
(22, 'KKPI 1', 'KKPI 1'),
(23, 'KKPI 2', 'KKPI 2'),
(24, 'GP 1', 'GP 1'),
(25, 'GP 2', 'GP 2'),
(26, 'GP 3', 'GP 3'),
(27, 'GP 4', 'GP 4'),
(28, 'KIM 1', 'KIM 1'),
(29, 'KIM 2', 'KIM 2'),
(30, 'KIM 3', 'KIM 3'),
(31, 'KIM 4', 'KIM 4'),
(32, 'KIM 5', 'KIM 5'),
(33, 'LAP', 'Lapangan'),
(829, 'Lab Kimia', 'Di samping ruang kelas 11 IPS 4'),
(830, 'GP1', 'GP1'),
(831, 'Ruang Teori 3', 'kelas teori');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(15) NOT NULL,
  `start_time` time NOT NULL,
  `finish_time` time NOT NULL,
  `day` varchar(100) NOT NULL,
  `jam_mulai` int(2) NOT NULL,
  `jam_akhir` int(2) NOT NULL,
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

INSERT INTO `schedule` (`schedule_id`, `start_time`, `finish_time`, `day`, `jam_mulai`, `jam_akhir`, `note`, `guru_id`, `mapel_id`, `kelas_id`, `jurusan_id`, `room_id`) VALUES
(212334, '08:00:00', '09:00:00', 'Selasa', 0, 0, NULL, '893488650', '4', '51', '11', '2'),
(356671, '09:00:00', '10:00:00', 'Senin', 0, 0, NULL, '415656947', '4', '122', '5', '3'),
(432432, '09:00:00', '10:00:00', 'Jumat', 0, 0, NULL, '287521762', '3', '51', '12', '3'),
(634643, '11:00:00', '13:00:00', 'Rabu', 0, 0, NULL, '746952542', '4', '51', '14', '2'),
(3213213, '06:00:00', '08:00:00', 'Sabtu', 0, 0, NULL, '1006974173', '9', '31', '9', '1'),
(3213214, '06:00:00', '08:00:00', 'Sabtu', 0, 0, NULL, '1006974173', '9', '31', '9', '1'),
(3213215, '06:00:00', '08:00:00', 'Sabtu', 0, 0, NULL, '1006974173', '9', '31', '9', '1'),
(6346432, '11:00:00', '13:00:00', 'Rabu', 0, 0, NULL, '746952542', '4', '51', '14', '2'),
(34211177, '10:00:00', '12:00:00', 'Kamis', 0, 0, NULL, '1018780774', '3', '31', '2', '2'),
(34211178, '01:00:00', '00:00:00', 'Senin', 1, 3, 'edited', '484522205', '0010', '1', '13', '829'),
(34211179, '00:00:00', '00:00:00', 'Selasa', 1, 3, NULL, '893488650', '4', '1', '13', '830'),
(34211180, '08:00:00', '09:00:00', 'Senin', 2, 3, '', '193779719', '4', '1', '13', '3'),
(34211181, '10:00:00', '11:00:00', 'Senin', 5, 6, '', '335577392', '9', '1', '13', '2'),
(34211182, '11:01:00', '13:11:00', 'Senin', 7, 8, '', '660910456', '15', '1', '13', '2'),
(34211183, '11:01:00', '13:11:00', 'Senin', 7, 8, '', '660910456', '15', '1', '13', '2'),
(34211184, '09:01:00', '11:00:00', 'Senin', 4, 5, '', '297235554', '9', '1', '13', '830'),
(34211185, '10:00:00', '11:00:00', 'Senin', 3, 4, '', '940359672', '21', '1', '13', '1'),
(34211186, '08:30:00', '10:30:00', 'Senin', 2, 4, '', '869559553', '21', '1', '13', '3'),
(34211187, '00:00:00', '00:00:00', 'Senin', 0, 0, '', '', '', '1', '13', ''),
(34211188, '09:00:00', '10:30:00', 'Senin', 4, 5, '', '688235432', '4', '1', '13', '2'),
(34211189, '12:00:00', '13:00:00', 'Senin', 7, 8, '', '1274182432', '9', '1', '13', '3'),
(34211190, '12:00:00', '13:00:00', 'Senin', 7, 8, '', '1274182432', '9', '1', '13', '3'),
(34211191, '13:00:00', '14:00:00', 'Senin', 8, 9, '', '1365634231', '18', '1', '13', '2'),
(34211192, '15:30:00', '17:00:00', 'Senin', 10, 11, '', '1122157636', '17', '1', '13', '830'),
(34211193, '11:11:00', '12:12:00', 'Senin', 11, 12, '', '318953382', '2', '1', '13', '2'),
(34211194, '01:01:00', '02:02:00', 'Senin', 1, 2, '', '287521762', '1', '1', '13', '3'),
(34211195, '00:00:00', '00:00:00', 'Senin', 0, 0, '', '', '', '1', '13', ''),
(34211196, '07:00:00', '08:00:00', 'Senin', 1, 2, 'bawa alat peraga', '869559553', '17', '1', '13', '3'),
(34211197, '08:00:00', '09:00:00', 'Senin', 2, 3, '', '415656947', '3', '1', '13', '1'),
(34211198, '06:59:00', '06:06:00', 'Senin', 5, 6, '', '193779719', '10', '2', '13', '829'),
(34211199, '09:09:00', '08:11:00', 'Senin', 3, 4, '', '656724838', '13', '2', '13', '3'),
(34211200, '07:01:00', '08:00:00', 'Senin', 1, 2, '', '167876273', '4', '2', '13', '2'),
(34211201, '11:11:00', '12:12:00', 'Selasa', 1, 2, '', '335577392', '3', '2', '13', '3');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
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
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`siswa_id`, `siswa_nis`, `siswa_name`, `siswa_alamat`, `kelas_id`, `jurusan_id`, `siswa_password`, `siswa_note`) VALUES
(1324, '4324324', 'dasdsa', 'rewrewrew', '10', '5', '2343242', ''),
(1325, '5140411151', 'Soimah', 'sss', '2', '13', '12345', 'harus'),
(1326, '4214214214', 'Adi Mikomi', 'Jalan Kenangan', '16', '5', 'testing', ''),
(1327, '23131231231', 'Brodi Loius', 'Jalan Anggrek 201', '4', '7', 'testing', ''),
(1328, '123tes', '123tes', '123tes', '10', '11', '123tes', ''),
(1332, '8888', 'Vikartamano', '', '8', '11', 'skedi1234', '');

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
  MODIFY `jurusan_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `mapel_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=832;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34211202;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `siswa_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1333;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
