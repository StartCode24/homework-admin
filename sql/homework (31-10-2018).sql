-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2018 at 06:10 AM
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
-- Database: `homework`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
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
  `guru_id` int(255) NOT NULL,
  `guruname` varchar(255) NOT NULL,
  `guru_mapel` text NOT NULL,
  `guru_note` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`guru_id`, `guruname`, `guru_mapel`, `guru_note`) VALUES
(167836786, 'Baktianto Maryadi M.Pd', '13', ''),
(167876273, 'Koko Mansur S.Pd', '2', ''),
(193779719, 'Bagya Halim M.Pd', '7', ''),
(267620334, 'Sabri Januar M.Pd', '5', ''),
(287521762, 'Raihan Pranowo M.Pd', '5', ''),
(297235554, 'Dewi Agustina M.Pd', '1', ''),
(318953382, 'Natalia Namaga S.Pd', '8', ''),
(335577392, 'Cici Lailasari S.Pd', '6', ''),
(415656947, 'Keisha Maryati S.Pd', '12', ''),
(416525660, 'Prabawa Haryanto M.Pd', '6', ''),
(484522205, 'Rahayu Palastri M.Pd', '10', ''),
(509872834, 'Bambang Mahendra S.Pd', '3', ''),
(656724838, 'Gandi Simanjuntak M.Pd', '7', ''),
(660910456, 'Julia Rahmawati M.Pd', '5', ''),
(688235432, 'Dwi Sirait S.Pd', '2', ''),
(746952542, 'Aditya Prayoga S.Pd', '13', ''),
(869559553, 'Yani Suartini S.Pd', '8', ''),
(893488650, 'Dasa Nugroho S.Pd', '9', ''),
(940359672, 'Winda Wulandari S.Pd', '8', ''),
(947032968, 'Hasna Wastuti S.Pd', '6', ''),
(971672831, 'Salsabila Prastuti M.Pd', '3', ''),
(980044067, 'Hana Kusmawati S.Pd', '12', ''),
(1006974173, 'Kayla Mayasari S.Pd', '9', ''),
(1018780774, 'Dewi Maryati S.Pd', '5', ''),
(1099176225, 'Balidin Wacana M.Pd', '6', ''),
(1122157636, 'Zelda Purnawati S.Pd', '7', ''),
(1274182432, 'Gaduh Rajata S.Pd', '12', ''),
(1301902278, 'Dina Mulyani S.Pd', '10', ''),
(1321724732, 'Karman Prakasa S.Pd', '4', ''),
(1365634231, 'Bakianto Megantara S.Pd', '10', ''),
(1389049999, 'Purwadi Natsir M.Pd', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `jurusan_id` int(11) NOT NULL,
  `jurusan_name` varchar(200) NOT NULL,
  `jurusan_jumlah_kelas` int(2) DEFAULT NULL,
  `jurusan_kepala` varchar(100) DEFAULT NULL,
  `jurusan_note` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`jurusan_id`, `jurusan_name`, `jurusan_jumlah_kelas`, `jurusan_kepala`, `jurusan_note`) VALUES
(1, 'Teknik konstruksi gedung, sanitasi dan perawatan', 1, NULL, NULL),
(2, 'Teknik Komputer Dan Jaringan', 1, NULL, NULL),
(3, 'Teknik Sistem Informasi, Jaringan Dan Aplikasi', 1, NULL, NULL),
(4, 'Teknik Desain Pemodelan Dan Informasi Bangunan', 1, NULL, NULL),
(5, 'Teknik Elektronika Daya Dan Komunikasi', 1, NULL, NULL),
(6, 'Teknik Audio Video', 1, NULL, NULL),
(7, 'Teknik Otomasi Industri', 1, NULL, NULL),
(8, 'Teknik Manajemen Dan Perawatan Otomotif', 1, NULL, NULL),
(9, 'Teknik Bodi Otomotif', 1, NULL, NULL),
(10, 'Teknik Fabrikasi Logam Dan Manufaktur', 1, NULL, NULL),
(11, 'Kimia Industri', 1, NULL, NULL),
(12, 'Kimia Analis', 1, NULL, NULL),
(13, 'Geologi Pertambangan', 1, NULL, NULL),
(14, 'Teknik Pengolahan Migas Dan Petrokimia', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `mapel_id` int(255) NOT NULL,
  `mapelname` varchar(255) NOT NULL,
  `mapel_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`mapel_id`, `mapelname`, `mapel_note`) VALUES
(3432432, 'Bahasa Jawa', '');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(255) NOT NULL,
  `roomname` varchar(255) NOT NULL,
  `room_note` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `roomname`, `room_note`) VALUES
(1, 'Ruang AVI', NULL),
(829, 'Lab Kimia', 'Di samping ruang kelas 11 IPS 4');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(255) NOT NULL,
  `schedule_date` date NOT NULL,
  `start_time` time NOT NULL,
  `finish_time` time NOT NULL,
  `day` varchar(100) NOT NULL,
  `note` text,
  `teacher_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `siswa_id` varchar(50) NOT NULL,
  `siswa_nik` varchar(50) NOT NULL,
  `siswa_name` varchar(50) NOT NULL,
  `siswa_alamat` varchar(50) DEFAULT NULL,
  `siswa_kelas` varchar(50) NOT NULL,
  `siswa_jurusan` varchar(50) NOT NULL,
  `siswa_password` varchar(50) NOT NULL,
  `siswa_note` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`siswa_id`, `siswa_nik`, `siswa_name`, `siswa_alamat`, `siswa_kelas`, `siswa_jurusan`, `siswa_password`, `siswa_note`) VALUES
('001', '5140411151', 'nunung', 'sleman', '7B', 'otomotif', '5140411151', ''),
('1001502', '7680305012', 'Jati Setiawan', 'Kab. Bantul', '19', '13', '', ''),
('100329', '1626656601', 'Lanang Kuswoyo', 'Kab. Sleman', '5', '12', '', ''),
('1009083', '8067261101', 'Ega Napitupulu', 'Kab. Sleman', '12', '8', '', ''),
('1010504', '8202004810', 'Pardi Bagus Hardiansyah', 'Kota Yogyakarta', '13', '1', '', ''),
('1010820', '7747911310', 'Labuh Marpaung', 'Kota Yogyakarta', '11', '9', '', ''),
('1016348', '3366956312', 'Sarah Riyanti', 'Kab. Sleman', '6', '8', '', ''),
('102185', '0412302912', 'Nasrullah Cahyono Saptono', 'Kab. Gunung Kidul', '1', '8', '', ''),
('1028075', '7638972205', 'Ghaliyati Chelsea Permata', 'Kota Yogyakarta', '6', '11', '', ''),
('102935', '8127920512', 'Niyaga Kuswoyo', 'Kab. Sleman', '14', '7', '', ''),
('1031668', '0256981105', 'Nasim Gilang Hutasoit', 'Kota Yogyakarta', '1', '8', '', ''),
('1031826', '5524092005', 'Pardi Rajasa ', 'Kab. Bantul', '10', '6', '', ''),
('1033879', '3551164112', 'Restu Namaga ', 'Kab. Bantul', '7', '2', '', ''),
('1034511', '5188940603', 'Jayadi Maryadi', 'Kota Yogyakarta', '3', '6', '', ''),
('1035933', '7591761703', 'Genta Janet Susanti', 'Kab. Sleman', '4', '12', '', ''),
('1038223', '9345976710', 'Vera Rahmi Wastuti', 'Kab. Gunung Kidul', '15', '11', '', ''),
('1045172', '5575174812', 'Harjasa Sihotang', 'Kota Yogyakarta', '12', '3', '', ''),
('1048015', '1666006310', 'Cakrawangsa Wibowo ', 'Kab. Sleman', '14', '1', '', ''),
('1048963', '3633265805', 'Cakrajiya Sihotang', 'Kab. Bantul', '8', '13', '', ''),
('1052201', '2718122401', 'Enteng Raden Widodo', 'Kab. Sleman', '13', '12', '', ''),
('1056189', '9773995703', 'Upik Rajasa', 'Kota Yogyakarta', '11', '10', '', ''),
('1059545', '3200044702', 'Nadine Nuraini ', 'Kota Yogyakarta', '12', '4', '', ''),
('1064244', '2341185210', 'Ivan Irawan', 'Kota Yogyakarta', '11', '11', '', ''),
('1067837', '3403074308', 'Eman Kurniawan', 'Kab. Bantul', '6', '8', '', ''),
('1067916', '6300902403', 'Gawati Permata', 'Kab. Sleman', '10', '1', '', ''),
('1071272', '6026832912', 'Vivi Amalia Yulianti', 'Kab. Sleman', '12', '8', '', ''),
('1074391', '6561011208', 'Puput Paramita Rahmawati ', 'Kab. Gunung Kidul', '20', '11', '', ''),
('1075813', '3452761812', 'Hartaka Latupono', 'Kab. Sleman', '1', '4', '', ''),
('1076524', '6212815608', 'Ratna Shania Mayasari', 'Kota Yogyakarta', '2', '13', '', ''),
('1077432', '9671491901', 'Bahuwarna Saputra', 'Kab. Bantul', '3', '10', '', ''),
('108186', '2150741008', 'Virman Winarno', 'Kab. Sleman', '4', '13', '', ''),
('1083433', '3447646111', 'Anastasia Pudjiastuti', 'Kab. Gunung Kidul', '6', '2', '', ''),
('1087935', '4983823001', 'Lamar Widodo', 'Kab. Sleman', '3', '8', '', ''),
('1094371', '0767792706', 'Baktianto Natsir', 'Kab. Sleman', '20', '4', '', ''),
('1098122', '3330116411', 'Karna Damanik', 'Kab. Bantul', '5', '12', '', ''),
('1098675', '6324796212', 'Sari Oktaviani', 'Kab. Gunung Kidul', '16', '10', '', ''),
('110319', '8134486608', 'Sabrina Hana Lailasari', 'Kab. Gunung Kidul', '6', '2', '', ''),
('1103295', '9145263004', 'Sabri Hakim', 'Kota Yogyakarta', '10', '12', '', ''),
('1105624', '8852095803', 'Luwar Simbolon ', 'Kab. Bantul', '13', '1', '', ''),
('110674', '6951675510', 'Kezia Mayasari', 'Kab. Sleman', '16', '13', '', ''),
('1115022', '5858642911', 'Nova Rahimah ', 'Kab. Bantul', '9', '3', '', ''),
('1116838', '2161010901', 'Siska Namaga ', 'Kota Yogyakarta', '13', '9', '', ''),
('112095', '2332605611', 'Puti Nasyidah', 'Kab. Gunung Kidul', '17', '6', '', ''),
('1121023', '2950131112', 'Mahesa Nasrullah Budiman', 'Kab. Bantul', '12', '7', '', ''),
('1122879', '7974291512', 'Yuliana Puspita ', 'Kab. Bantul', '8', '3', '', ''),
('1124380', '7198391212', 'Mila Anggraini', 'Kab. Bantul', '13', '1', '', ''),
('1131842', '9223411912', 'Oni Suryatmi', 'Kab. Bantul', '9', '1', '', ''),
('1142227', '5953980706', 'Sadina Hariyah ', 'Kab. Sleman', '12', '5', '', ''),
('1144122', '2175282408', 'Diana Usamah', 'Kota Yogyakarta', '20', '3', '', ''),
('1144320', '3643384404', 'Ira Zamira Susanti', 'Kota Yogyakarta', '2', '4', '', ''),
('1146649', '6914475511', 'Ami Hartati', 'Kab. Bantul', '5', '6', '', ''),
('1151032', '0252441412', 'Cici Permata ', 'Kab. Bantul', '5', '5', '', ''),
('1152454', '5479204207', 'Azalea Sudiati', 'Kab. Bantul', '6', '10', '', ''),
('1153046', '8740731708', 'Hamzah Situmorang ', 'Kota Yogyakarta', '10', '12', '', ''),
('1158692', '7530892303', 'Harjaya Gilang Simbolon ', 'Kab. Sleman', '2', '5', '', ''),
('1162917', '7529101704', 'Margana Manullang', 'Kab. Gunung Kidul', '13', '6', '', ''),
('1168840', '3534572907', 'Balijan Kurniawan', 'Kab. Bantul', '12', '5', '', ''),
('1173697', '3126890502', 'Kasusra Jailani ', 'Kab. Bantul', '19', '10', '', ''),
('1176382', '7743945407', 'Okta Thamrin ', 'Kab. Bantul', '12', '11', '', ''),
('1179264', '6040206108', 'Limar Maryadi', 'Kab. Bantul', '7', '12', '', ''),
('1184990', '0060844704', 'Ikin Megantara', 'Kab. Bantul', '3', '11', '', ''),
('1190202', '8129970606', 'Umay Ardianto', 'Kab. Bantul', '1', '1', '', ''),
('1190439', '2145495203', 'Gading Saragih', 'Kab. Gunung Kidul', '14', '4', '', ''),
('1191979', '0478765503', 'Anom Baktianto Prabowo ', 'Kab. Gunung Kidul', '12', '4', '', ''),
('1194387', '9087120705', 'Hasta Warsita Setiawan ', 'Kab. Bantul', '20', '12', '', ''),
('119440', '5249611001', 'Keisha Kiandra Pudjiastuti ', 'Kota Yogyakarta', '16', '10', '', ''),
('1195019', '9339973011', 'Vanya Karen Fujiati ', 'Kab. Bantul', '16', '3', '', ''),
('1199007', '3294601606', 'Hasim Kairav Nashiruddin ', 'Kab. Gunung Kidul', '14', '1', '', ''),
('120229', '5863376007', 'Ulya Permata ', 'Kota Yogyakarta', '1', '12', '', ''),
('120348', '1189561603', 'Marwata Halim', 'Kota Yogyakarta', '18', '7', '', ''),
('1206865', '8632354705', 'Ella Widya Laksmiwati', 'Kab. Gunung Kidul', '12', '2', '', ''),
('1208168', '3176621207', 'Kuncara Hutagalung ', 'Kab. Sleman', '17', '12', '', ''),
('1209431', '2759486807', 'Shania Puspasari ', 'Kab. Bantul', '9', '7', '', ''),
('1216894', '8783122612', 'Julia Endah Widiastuti ', 'Kab. Gunung Kidul', '5', '7', '', ''),
('1218197', '8410812410', 'Chelsea Agustina ', 'Kab. Gunung Kidul', '9', '4', '', ''),
('1222145', '8084866502', 'Fathonah Puti Safitri ', 'Kota Yogyakarta', '14', '13', '', ''),
('1222185', '1198370807', 'Lamar Pranowo', 'Kab. Sleman', '7', '2', '', ''),
('1222896', '6240985003', 'Tania Permata', 'Kab. Sleman', '7', '12', '', ''),
('1223488', '2589474408', 'Estiono Suwarno', 'Kab. Sleman', '11', '13', '', ''),
('1225107', '7995152311', 'Zelda Mandasari ', 'Kota Yogyakarta', '13', '6', '', ''),
('1230121', '1573064110', 'Padma Dina Astuti', 'Kab. Sleman', '10', '8', '', ''),
('1231543', '0359570103', 'Rachel Anggraini', 'Kab. Bantul', '11', '1', '', ''),
('123270', '0123216503', 'Raisa Carla Novitasari', 'Kab. Sleman', '5', '11', '', ''),
('123349', '9661900901', 'Laras Yulia Astuti', 'Kab. Gunung Kidul', '9', '3', '', ''),
('1234425', '7435434208', 'Laras Puspita', 'Kota Yogyakarta', '5', '2', '', ''),
('1235649', '2428966308', 'Irsad Budiman', 'Kab. Bantul', '5', '7', '', ''),
('1236992', '6713731407', 'Jatmiko Lukman Maryadi', 'Kab. Bantul', '2', '7', '', ''),
('1241612', '7624921803', 'Artawan Hutasoit', 'Kab. Bantul', '16', '9', '', ''),
('1246745', '1510702211', 'Maida Laksmiwati', 'Kota Yogyakarta', '9', '7', '', ''),
('1248008', '6871614804', 'Vero Manullang', 'Kab. Sleman', '1', '1', '', ''),
('1250061', '9142896311', 'Jamalia Ilsa Lailasari ', 'Kab. Sleman', '18', '11', '', ''),
('125441', '2886504906', 'Bakti Marpaung', 'Kab. Gunung Kidul', '19', '2', '', ''),
('1255550', '3468200402', 'Mitra Widodo', 'Kab. Bantul', '1', '7', '', ''),
('1261236', '4440071601', 'Raihan Uwais', 'Kab. Gunung Kidul', '6', '3', '', ''),
('1261946', '7485183007', 'Jamil Ivan Megantara ', 'Kab. Sleman', '7', '12', '', ''),
('1267198', '1822584302', 'Simon Ardianto ', 'Kota Yogyakarta', '16', '5', '', ''),
('1269251', '2493480506', 'Garan Waluyo', 'Kab. Bantul', '13', '2', '', ''),
('1271699', '2266695809', 'Enteng Ghani Putra', 'Kota Yogyakarta', '13', '12', '', ''),
('1281531', '1159844712', 'Irnanto Sihotang ', 'Kota Yogyakarta', '5', '4', '', ''),
('1286072', '2827782211', 'Candrakanta Mursita Tamba ', 'Kab. Sleman', '14', '13', '', ''),
('1294048', '7242631002', 'Gabriella Farah Aryani ', 'Kota Yogyakarta', '9', '9', '', ''),
('1296141', '6599162908', 'Sari Aryani ', 'Kab. Bantul', '18', '8', '', ''),
('1299734', '8283106805', 'Jais Galih Simbolon', 'Kota Yogyakarta', '14', '5', '', ''),
('1308776', '7681765701', 'Rudi Simanjuntak', 'Kab. Sleman', '20', '8', '', ''),
('1315568', '8308740611', 'Gaman Simbolon', 'Kab. Bantul', '7', '2', '', ''),
('1318174', '5334905305', 'Jaeman Heryanto Prakasa ', 'Kota Yogyakarta', '16', '10', '', ''),
('1318450', '7636122507', 'Paris Nasyiah', 'Kab. Sleman', '2', '3', '', ''),
('1332941', '0906971901', 'Radit Adriansyah', 'Kab. Gunung Kidul', '19', '12', '', ''),
('1335547', '4340111405', 'Titin Halimah', 'Kota Yogyakarta', '8', '7', '', ''),
('1342773', '2351484901', 'Silvia Uyainah ', 'Kab. Bantul', '10', '4', '', ''),
('1345142', '7925641004', 'Taufan Pradana', 'Kab. Bantul', '6', '9', '', ''),
('1346800', '5214606309', 'Imam Sihombing ', 'Kab. Gunung Kidul', '20', '5', '', ''),
('1351657', '8903511509', 'Cemplunk Jatmiko Wahyudin ', 'Kab. Bantul', '8', '9', '', ''),
('1356988', '1471991305', 'Nyoman Ilyas Setiawan ', 'Kab. Sleman', '2', '8', '', ''),
('1358133', '9672214411', 'Dinda Rahayu ', 'Kab. Bantul', '17', '7', '', ''),
('136142', '8100944809', 'Najam Sinaga ', 'Kota Yogyakarta', '20', '1', '', ''),
('1366069', '8434680907', 'Leo Permadi', 'Kab. Bantul', '20', '13', '', ''),
('1367135', '1433241202', 'Cici Cindy Maryati ', 'Kab. Sleman', '11', '8', '', ''),
('1368399', '4177595607', 'Embuh Chandra Prayoga', 'Kab. Gunung Kidul', '3', '3', '', ''),
('1373532', '0738286812', 'Luthfi Hendri Saefullah', 'Kota Yogyakarta', '16', '13', '', ''),
('1373887', '6050891308', 'Rika Mayasari ', 'Kab. Gunung Kidul', '7', '12', '', ''),
('138235', '7141430607', 'Malika Nurdiyanti', 'Kab. Sleman', '9', '13', '', ''),
('138511', '5608851811', 'Ifa Laksmiwati', 'Kab. Gunung Kidul', '15', '6', '', ''),
('1386760', '2786845211', 'Edi Santoso ', 'Kab. Sleman', '1', '2', '', ''),
('1388102', '6396226809', 'Prabu Permadi ', 'Kab. Sleman', '18', '2', '', ''),
('1389721', '3583386707', 'Salimah Usada', 'Kab. Sleman', '1', '8', '', ''),
('138985', '1995986703', 'Farah Maryati', 'Kab. Sleman', '2', '12', '', ''),
('1391498', '0932361104', 'Tina Anggraini', 'Kab. Gunung Kidul', '12', '12', '', ''),
('144592', '7226820206', 'Artawan Paiman Lazuardi', 'Kab. Sleman', '2', '3', '', ''),
('146882', '7858250106', 'Intan Janet Mulyani ', 'Kab. Bantul', '13', '3', '', ''),
('147909', '2151137112', 'Jaka Candra Prakasa', 'Kab. Gunung Kidul', '11', '7', '', ''),
('157819', '4010956102', 'Fitria Nurdiyanti', 'Kab. Gunung Kidul', '7', '5', '', ''),
('160978', '7156046710', 'Wulan Yuniar', 'Kab. Sleman', '7', '11', '', ''),
('163347', '1574455103', 'Bakiadi Irawan', 'Kota Yogyakarta', '3', '3', '', ''),
('164374', '1134037007', 'Salwa Lestari', 'Kota Yogyakarta', '1', '8', '', ''),
('176496', '6809826003', 'Puspa Mulyani', 'Kab. Bantul', '3', '12', '', ''),
('178628', '9341535208', 'Violet Ade Winarsih', 'Kab. Gunung Kidul', '5', '1', '', ''),
('179023', '3473880709', 'Kanda Gatra Hutasoit', 'Kota Yogyakarta', '8', '2', '', ''),
('190750', '6034642210', 'Daru Irfan Budiyanto ', 'Kab. Gunung Kidul', '7', '6', '', ''),
('191935', '5181341201', 'Adiarja Among Sinaga', 'Kab. Bantul', '15', '8', '', ''),
('195528', '9048085204', 'Melinda Uyainah ', 'Kab. Bantul', '10', '5', '', ''),
('196594', '7437320408', 'Kanda Pratama', 'Kab. Gunung Kidul', '1', '13', '', ''),
('200187', '4749192407', 'Gaman Megantara ', 'Kab. Sleman', '16', '10', '', ''),
('204688', '1105702506', 'Slamet Harto Maheswara ', 'Kab. Gunung Kidul', '13', '4', '', ''),
('207729', '9648332812', 'Rahmat Dalimin Pangestu ', 'Kota Yogyakarta', '16', '2', '', ''),
('220206', '2698180108', 'Novi Nasyiah', 'Kota Yogyakarta', '8', '5', '', ''),
('222812', '7138501601', 'Farah Raina Purwanti', 'Kab. Gunung Kidul', '17', '13', '', ''),
('225616', '2555745903', 'Cornelia Prastuti', 'Kota Yogyakarta', '7', '8', '', ''),
('229209', '6666054206', 'Cahyanto Putra', 'Kab. Gunung Kidul', '2', '5', '', ''),
('229919', '4463442511', 'Opan Gantar Nainggolan', 'Kab. Sleman', '3', '2', '', ''),
('239435', '0309591811', 'Banawa Haryanto', 'Kab. Gunung Kidul', '16', '11', '', ''),
('242515', '6874002205', 'Ifa Restu Laksita ', 'Kab. Sleman', '12', '12', '', ''),
('247056', '5899984311', 'Embuh Budi Habibi ', 'Kab. Gunung Kidul', '1', '9', '', ''),
('251320', '7246305508', 'Chandra Saputra', 'Kota Yogyakarta', '5', '12', '', ''),
('252308', '1159096102', 'Rafid Damanik', 'Kab. Bantul', '11', '1', '', ''),
('253216', '0018160103', 'Kamila Fitriani Pertiwi ', 'Kab. Gunung Kidul', '13', '11', '', ''),
('255782', '4607444204', 'Yoga Wahyudin', 'Kab. Gunung Kidul', '9', '3', '', ''),
('258625', '0035555410', 'Bakiadi Hidayanto', 'Kab. Bantul', '12', '2', '', ''),
('262969', '2130255612', 'Suci Raina Padmasari', 'Kab. Gunung Kidul', '20', '11', '', ''),
('271418', '2921010801', 'Candra Kusumo', 'Kab. Sleman', '2', '13', '', ''),
('272564', '8819761403', 'Upik Natsir ', 'Kab. Sleman', '17', '12', '', ''),
('274143', '5432350607', 'Darijan Bakijan Salahudin', 'Kab. Gunung Kidul', '7', '3', '', ''),
('279079', '4481094101', 'Bagus Galar Tamba', 'Kab. Bantul', '19', '13', '', ''),
('279355', '8930122408', 'Pardi Okto Manullang ', 'Kab. Sleman', '5', '6', '', ''),
('281922', '2712322204', 'Argono Alambana Waskita ', 'Kab. Bantul', '2', '11', '', ''),
('282514', '6259044612', 'Devi Zulaika', 'Kab. Sleman', '5', '12', '', ''),
('285831', '3881235409', 'Jamalia Yulianti', 'Kab. Sleman', '15', '4', '', ''),
('288358', '7538161506', 'Kania Pratiwi ', 'Kab. Gunung Kidul', '19', '6', '', ''),
('290924', '3215812602', 'Citra Purwanti', 'Kab. Sleman', '15', '12', '', ''),
('295939', '3762275408', 'Ciaobella Ajeng Oktaviani', 'Kab. Sleman', '12', '1', '', ''),
('298466', '0059421611', 'Cakrabirawa Ajiman Widodo', 'Kota Yogyakarta', '16', '4', '', ''),
('298703', '2672715204', 'Makara Mahendra', 'Kab. Gunung Kidul', '9', '7', '', ''),
('299769', '6471222904', 'Mursinin Wasita', 'Kab. Bantul', '20', '1', '', ''),
('303204', '3081704401', 'Teguh Sihotang', 'Kab. Gunung Kidul', '6', '1', '', ''),
('305218', '4345144306', 'Tami Laksita ', 'Kota Yogyakarta', '11', '8', '', ''),
('310272', '5225684909', 'Murti Laswi Nugroho ', 'Kota Yogyakarta', '20', '13', '', ''),
('311022', '8507174107', 'Najam Kawaca Marbun ', 'Kab. Gunung Kidul', '13', '12', '', ''),
('313431', '9764124610', 'Ana Pratiwi', 'Kab. Bantul', '20', '7', '', ''),
('319117', '8338695007', 'Gamanto Lukman Saptono', 'Kota Yogyakarta', '5', '3', '', ''),
('320499', '6046080211', 'Nabila Padmasari', 'Kota Yogyakarta', '14', '6', '', ''),
('321565', '2115165502', 'Artanto Yono Marbun ', 'Kota Yogyakarta', '5', '13', '', ''),
('322552', '3482912103', 'Shania Farida', 'Kota Yogyakarta', '11', '2', '', ''),
('332423', '8352066701', 'Puji Cinta Mayasari', 'Kab. Bantul', '14', '10', '', ''),
('334240', '3698050204', 'Jarwa Sihotang', 'Kab. Bantul', '18', '3', '', ''),
('338938', '1554206710', 'Estiono Mandala', 'Kab. Bantul', '16', '10', '', ''),
('343084', '7656645005', 'Nadine Usamah', 'Kab. Sleman', '3', '6', '', ''),
('345414', '5924917009', 'Dalima Zelda Mayasari ', 'Kab. Sleman', '6', '8', '', ''),
('346993', '0745660707', 'Intan Wani Wulandari ', 'Kab. Gunung Kidul', '16', '11', '', ''),
('353232', '2529216711', 'Prakosa Maryadi ', 'Kota Yogyakarta', '12', '6', '', ''),
('358563', '3729932402', 'Devi Clara Hartati', 'Kab. Bantul', '7', '4', '', ''),
('367289', '1475987011', 'Cici Padmasari', 'Kab. Sleman', '15', '12', '', ''),
('368315', '5380932602', 'Malika Karen Nuraini', 'Kab. Sleman', '13', '4', '', ''),
('369737', '6504705511', 'Qori Halima Pudjiastuti', 'Kota Yogyakarta', '14', '9', '', ''),
('370487', '6538765511', 'Ismail Irawan ', 'Kota Yogyakarta', '7', '8', '', ''),
('373291', '2674900609', 'Uli Silvia Hassanah ', 'Kota Yogyakarta', '17', '4', '', ''),
('375541', '2626425605', 'Mustika Prasetyo', 'Kab. Sleman', '16', '1', '', ''),
('376923', '0992822511', 'Kasim Radit Budiman ', 'Kab. Gunung Kidul', '5', '4', '', ''),
('377318', '2122493001', 'Cecep Manullang', 'Kab. Sleman', '7', '4', '', ''),
('380595', '9533246001', 'Najib Saragih', 'Kab. Gunung Kidul', '4', '6', '', ''),
('391177', '6142504202', 'Wirda Wulan Pertiwi ', 'Kab. Gunung Kidul', '8', '10', '', ''),
('393823', '9246192803', 'Puspa Rahimah ', 'Kab. Sleman', '9', '8', '', ''),
('395797', '2047050404', 'Saiful Nashiruddin', 'Kota Yogyakarta', '2', '12', '', ''),
('398482', '4905904804', 'Jarwi Prasetyo', 'Kab. Sleman', '15', '12', '', ''),
('400298', '4945356509', 'Prabowo Widodo ', 'Kab. Gunung Kidul', '19', '6', '', ''),
('407840', '3902366811', 'Wahyu Edward Budiman ', 'Kab. Gunung Kidul', '20', '11', '', ''),
('408511', '8375430804', 'Opan Lukita Saefullah', 'Kab. Sleman', '8', '4', '', ''),
('414632', '7606041802', 'Upik Rajasa', 'Kab. Gunung Kidul', '7', '4', '', ''),
('416093', '2825892004', 'Salwa Uyainah', 'Kab. Gunung Kidul', '1', '12', '', ''),
('417119', '0567635708', 'Padma Farah Suryatmi ', 'Kab. Bantul', '19', '4', '', ''),
('421739', '6564506209', 'Lili Astuti ', 'Kab. Bantul', '13', '6', '', ''),
('422450', '0199221804', 'Cawuk Saragih', 'Kota Yogyakarta', '14', '2', '', ''),
('425569', '4425340312', 'Eva Kusmawati ', 'Kab. Gunung Kidul', '2', '6', '', ''),
('435796', '9257431601', 'Vicky Betania Wijayanti ', 'Kab. Gunung Kidul', '15', '12', '', ''),
('436822', '7917754806', 'Luthfi Lantar Waluyo', 'Kab. Sleman', '14', '4', '', ''),
('439231', '2241204807', 'Jamal Wakiman Hutapea', 'Kota Yogyakarta', '2', '11', '', ''),
('440258', '3290226205', 'Suci Hastuti', 'Kab. Bantul', '20', '3', '', ''),
('440613', '8781574905', 'Lintang Susanti ', 'Kab. Gunung Kidul', '10', '1', '', ''),
('440889', '0366724610', 'Salsabila Gasti Mulyani ', 'Kab. Bantul', '16', '7', '', ''),
('448510', '3655565603', 'Wardaya Darsirah Setiawan', 'Kab. Bantul', '1', '5', '', ''),
('449892', '9098856407', 'Rama Habibi', 'Kota Yogyakarta', '10', '8', '', ''),
('450840', '3156552005', 'Almira Padmasari', 'Kab. Bantul', '4', '7', '', ''),
('451235', '5457757011', 'Vivi Permata', 'Kab. Bantul', '7', '8', '', ''),
('451511', '2167301010', 'Aris Hutasoit ', 'Kota Yogyakarta', '13', '13', '', ''),
('454393', '0842393004', 'Alika Hassanah', 'Kab. Bantul', '7', '1', '', ''),
('455104', '5353924602', 'Hartaka Suwarno', 'Kota Yogyakarta', '8', '11', '', ''),
('455973', '6302212201', 'Ratih Almira Nasyidah ', 'Kab. Sleman', '17', '5', '', ''),
('456683', '6530884405', 'Michelle Purwanti', 'Kab. Bantul', '18', '1', '', ''),
('462251', '8663241908', 'Harjasa Haryanto ', 'Kab. Gunung Kidul', '6', '2', '', ''),
('469556', '2555950407', 'Julia Oktaviani', 'Kab. Sleman', '13', '4', '', ''),
('469990', '5800277107', 'Banawi Firmansyah', 'Kab. Sleman', '7', '8', '', ''),
('470464', '4616194612', 'Cahyo Sihombing ', 'Kab. Bantul', '15', '1', '', ''),
('471767', '9756843008', 'Slamet Natsir', 'Kab. Gunung Kidul', '19', '11', '', ''),
('472675', '2300286007', 'Bakianto Wibisono ', 'Kab. Bantul', '1', '8', '', ''),
('474610', '1430987008', 'Lembah Maryadi ', 'Kab. Gunung Kidul', '1', '10', '', ''),
('476387', '6937991007', 'Umar Manullang ', 'Kab. Sleman', '13', '13', '', ''),
('477097', '8476241110', 'Kiandra Putri Winarsih', 'Kab. Bantul', '13', '10', '', ''),
('477295', '1181042606', 'Carla Puput Prastuti', 'Kota Yogyakarta', '14', '10', '', ''),
('478282', '1917260208', 'Asmianto Sihombing', 'Kab. Gunung Kidul', '1', '12', '', ''),
('478440', '9913156111', 'Lanang Balamantri Prabowo ', 'Kab. Gunung Kidul', '10', '10', '', ''),
('484481', '3577381207', 'Hasan Tamba', 'Kota Yogyakarta', '5', '4', '', ''),
('494076', '4859985102', 'Gamblang Dabukke', 'Kab. Sleman', '2', '6', '', ''),
('495853', '5955386608', 'Cahyo Tamba', 'Kab. Sleman', '14', '10', '', ''),
('500157', '7795466708', 'Cindy Lestari', 'Kota Yogyakarta', '10', '3', '', ''),
('508172', '0985065204', 'Praba Sinaga ', 'Kab. Gunung Kidul', '17', '2', '', ''),
('510383', '9303696612', 'Raisa Puspasari', 'Kab. Bantul', '3', '9', '', ''),
('513029', '9174780605', 'Ifa Permata', 'Kab. Sleman', '4', '6', '', ''),
('514095', '1590074105', 'Kuncara Saptono', 'Kab. Sleman', '15', '1', '', ''),
('514845', '6702174905', 'Kamaria Palastri', 'Kota Yogyakarta', '8', '13', '', ''),
('515872', '2794945409', 'Darimin Permadi ', 'Kab. Sleman', '7', '5', '', ''),
('521518', '9594431705', 'Dimas Prayoga ', 'Kab. Sleman', '19', '11', '', ''),
('524164', '0205232301', 'Suci Ghaliyati Rahayu', 'Kab. Gunung Kidul', '20', '9', '', ''),
('526020', '6261374704', 'Harja Caket Zulkarnain', 'Kab. Bantul', '16', '5', '', ''),
('530245', '1229080209', 'Indra Lanjar Habibi ', 'Kab. Sleman', '7', '6', '', ''),
('534193', '9615300510', 'Amelia Indah Lestari', 'Kab. Sleman', '13', '1', '', ''),
('536562', '8922270402', 'Gaiman Ramadan ', 'Kab. Gunung Kidul', '8', '6', '', ''),
('540234', '7105575810', 'Azalea Maryati', 'Kab. Bantul', '7', '9', '', ''),
('548408', '1748142201', 'Bancar Budiman', 'Kab. Gunung Kidul', '4', '5', '', ''),
('551448', '1911502006', 'Lanjar Perkasa Kusumo', 'Kab. Gunung Kidul', '8', '3', '', ''),
('553936', '3125066709', 'Sarah Melani', 'Kab. Gunung Kidul', '20', '3', '', ''),
('556542', '2869984507', 'Jaeman Mandala', 'Kab. Gunung Kidul', '8', '11', '', ''),
('563017', '6295836301', 'Jasmin Laila Lestari ', 'Kab. Sleman', '18', '9', '', ''),
('565900', '8141720912', 'Galih Marbun', 'Kab. Gunung Kidul', '12', '10', '', ''),
('568664', '5774084808', 'Syahrini Restu Mardhiyah ', 'Kab. Sleman', '10', '3', '', ''),
('572573', '6292254407', 'Fitria Farida', 'Kota Yogyakarta', '3', '8', '', ''),
('574823', '3846776109', 'Jarwi Hutagalung', 'Kab. Gunung Kidul', '2', '5', '', ''),
('575337', '5656432202', 'Samiah Hartati', 'Kab. Gunung Kidul', '1', '1', '', ''),
('579325', '3042990209', 'Usyi Rika Purwanti ', 'Kab. Bantul', '19', '12', '', ''),
('582878', '1861805509', 'Faizah Purnawati ', 'Kota Yogyakarta', '2', '6', '', ''),
('583115', '1713960312', 'Galih Pradipta', 'Kab. Sleman', '15', '10', '', ''),
('583787', '7365586006', 'Jarwa Sirait', 'Kab. Bantul', '4', '3', '', ''),
('586353', '9960641102', 'Tira Pudjiastuti ', 'Kab. Gunung Kidul', '20', '8', '', ''),
('589709', '9607212806', 'Tira Syahrini Padmasari ', 'Kab. Bantul', '2', '2', '', ''),
('590144', '1237034102', 'Virman Putra ', 'Kab. Gunung Kidul', '16', '6', '', ''),
('590223', '2326256604', 'Cinthia Alika Mulyani', 'Kota Yogyakarta', '1', '11', '', ''),
('590973', '3505972002', 'Gada Kusumo', 'Kab. Gunung Kidul', '14', '10', '', ''),
('591012', '6748762410', 'Puspa Rahimah', 'Kab. Gunung Kidul', '6', '13', '', ''),
('593184', '6226805801', 'Bagus Narpati', 'Kab. Bantul', '20', '5', '', ''),
('597330', '6732636204', 'Rahayu Maryati', 'Kota Yogyakarta', '7', '13', '', ''),
('599423', '0939744706', 'Langgeng Pranowo', 'Kab. Bantul', '16', '12', '', ''),
('599620', '1015524507', 'Ulva Hafshah Mulyani', 'Kab. Gunung Kidul', '17', '13', '', ''),
('599976', '2971127107', 'Viktor Utama', 'Kab. Sleman', '8', '11', '', ''),
('601594', '3225114809', 'Calista Uyainah', 'Kab. Bantul', '10', '4', '', ''),
('608899', '7469820203', 'Lalita Hassanah', 'Kab. Sleman', '17', '6', '', ''),
('611150', '5464274501', 'Dian Nurdiyanti', 'Kab. Gunung Kidul', '16', '3', '', ''),
('611268', '3547504511', 'Sarah Haryanti ', 'Kab. Bantul', '12', '11', '', ''),
('613874', '8937975010', 'Jelita Aryani', 'Kab. Gunung Kidul', '1', '6', '', ''),
('614427', '3740870912', 'Elvin Hutagalung ', 'Kab. Gunung Kidul', '13', '5', '', ''),
('619600', '4223530401', 'Luwes Lazuardi', 'Kab. Sleman', '18', '5', '', ''),
('622917', '6274714903', 'Hasna Laksita', 'Kota Yogyakarta', '7', '9', '', ''),
('628602', '5559140403', 'Umar Mandala', 'Kab. Bantul', '12', '6', '', ''),
('631169', '0485671804', 'Mutia Gina Nasyiah', 'Kab. Sleman', '8', '11', '', ''),
('631840', '3202002005', 'Luwar Kuswoyo', 'Kota Yogyakarta', '17', '4', '', ''),
('636578', '8488736312', 'Darsirah Suryono', 'Kab. Gunung Kidul', '7', '1', '', ''),
('636776', '0198314602', 'Erik Panca Ardianto ', 'Kota Yogyakarta', '8', '2', '', ''),
('646489', '5682665007', 'Kambali Natsir', 'Kab. Sleman', '3', '12', '', ''),
('654347', '7610426710', 'Bakiman Dartono Pradipta', 'Kab. Bantul', '2', '12', '', ''),
('655255', '6184530510', 'Devi Rahmawati', 'Kab. Sleman', '3', '9', '', ''),
('655768', '3903484104', 'Silvia Gilda Zulaika ', 'Kab. Gunung Kidul', '3', '5', '', ''),
('658374', '7658994203', 'Jaswadi Salahudin ', 'Kab. Gunung Kidul', '11', '13', '', ''),
('660546', '8336701011', 'Reksa Hutagalung', 'Kota Yogyakarta', '5', '4', '', ''),
('668127', '7589746907', 'Cecep Sinaga ', 'Kab. Sleman', '18', '12', '', ''),
('670101', '4932945312', 'Zulfa Hasanah', 'Kab. Bantul', '11', '4', '', ''),
('670891', '8257606208', 'Hasan Pangestu ', 'Kab. Bantul', '16', '5', '', ''),
('674484', '3016130310', 'Ivan Kariman Suwarno', 'Kab. Gunung Kidul', '11', '2', '', ''),
('675787', '0469134512', 'Farhunnisa Yolanda', 'Kab. Gunung Kidul', '15', '13', '', ''),
('677367', '0235324706', 'Jessica Maryati', 'Kab. Bantul', '6', '3', '', ''),
('684553', '5507146903', 'Tiara Tina Nasyidah ', 'Kab. Gunung Kidul', '16', '10', '', ''),
('687120', '6045050807', 'Hendri Eka Hutasoit', 'Kab. Gunung Kidul', '12', '3', '', ''),
('688225', '8044071101', 'Ciaobella Pratiwi ', 'Kab. Gunung Kidul', '15', '13', '', ''),
('688739', '3670450701', 'Dariati Firgantoro', 'Kota Yogyakarta', '15', '9', '', ''),
('690989', '2523666102', 'Ibrani Mahendra', 'Kab. Gunung Kidul', '13', '6', '', ''),
('691424', '8123602112', 'Pangeran Kusumo', 'Kab. Sleman', '8', '9', '', ''),
('693121', '9806650404', 'Ayu Fujiati', 'Kab. Bantul', '15', '7', '', ''),
('696478', '1767164807', 'Gadang Dipa Hutagalung ', 'Kota Yogyakarta', '17', '1', '', ''),
('699913', '3349131402', 'Cahya Ivan Santoso ', 'Kota Yogyakarta', '3', '1', '', ''),
('701532', '3079236711', 'Lala Astuti ', 'Kota Yogyakarta', '5', '7', '', ''),
('705125', '9582882612', 'Tami Novitasari ', 'Kab. Bantul', '20', '4', '', ''),
('705599', '7027121105', 'Faizah Hariyah', 'Kota Yogyakarta', '7', '10', '', ''),
('706704', '6536096504', 'Wulan Samiah Andriani', 'Kab. Gunung Kidul', '10', '7', '', ''),
('710219', '8298412805', 'Rahmi Aryani ', 'Kab. Gunung Kidul', '1', '12', '', ''),
('710929', '7496836308', 'Taswir Sihotang', 'Kab. Sleman', '2', '8', '', ''),
('711127', '6841126902', 'Daruna Bajragin Pranowo ', 'Kota Yogyakarta', '3', '8', '', ''),
('713219', '8114602804', 'Cakrawala Soleh Januar', 'Kota Yogyakarta', '12', '8', '', ''),
('718116', '7096171203', 'Vanya Mulyani', 'Kota Yogyakarta', '12', '2', '', ''),
('725657', '2550665202', 'Dagel Saputra ', 'Kab. Gunung Kidul', '12', '8', '', ''),
('727237', '7147536309', 'Putri Wahyuni', 'Kota Yogyakarta', '2', '11', '', ''),
('736397', '2502586508', 'Ika Pratiwi ', 'Kab. Sleman', '5', '9', '', ''),
('747887', '2228114609', 'Ani Wulan Lailasari ', 'Kab. Gunung Kidul', '11', '10', '', ''),
('750730', '8992847005', 'Jessica Kuswandari', 'Kab. Sleman', '14', '8', '', ''),
('754284', '8381913009', 'Carla Yulianti', 'Kab. Bantul', '16', '2', '', ''),
('754324', '1976664303', 'Karsa Adriansyah', 'Kab. Sleman', '9', '5', '', ''),
('755232', '9696962607', 'Viman Sitorus', 'Kab. Bantul', '11', '2', '', ''),
('755745', '9500347003', 'Cahya Hutapea', 'Kab. Gunung Kidul', '10', '10', '', ''),
('757482', '8216305605', 'Dimaz Situmorang', 'Kab. Sleman', '9', '11', '', ''),
('759536', '3403311906', 'Edward Catur Simanjuntak ', 'Kab. Gunung Kidul', '6', '8', '', ''),
('761668', '1022834707', 'Drajat Pradana', 'Kab. Sleman', '8', '10', '', ''),
('762418', '1972335910', 'Eka Wahyuni', 'Kab. Bantul', '1', '9', '', ''),
('762734', '5682556010', 'Yulia Janet Hartati', 'Kab. Gunung Kidul', '19', '4', '', ''),
('766169', '0397034507', 'Lidya Widya Suartini ', 'Kab. Gunung Kidul', '5', '4', '', ''),
('773908', '5716982301', 'Sadina Yolanda', 'Kab. Sleman', '7', '9', '', ''),
('775962', '1129236203', 'Dina Ajeng Purnawati ', 'Kota Yogyakarta', '4', '6', '', ''),
('778252', '6035234504', 'Martana Kuswoyo', 'Kab. Gunung Kidul', '15', '5', '', ''),
('779792', '1465031302', 'Jaga Sitorus', 'Kab. Sleman', '13', '6', '', ''),
('784135', '4597030411', 'Eman Halim Najmudin', 'Kota Yogyakarta', '1', '2', '', ''),
('794480', '5305602812', 'Tiara Hasna Laksita ', 'Kab. Bantul', '11', '3', '', ''),
('796889', '2065676510', 'Limar Tarihoran', 'Kab. Gunung Kidul', '19', '10', '', ''),
('807510', '6446114706', 'Dono Ganjaran Waskita', 'Kab. Bantul', '15', '4', '', ''),
('810590', '3606962512', 'Karen Zelaya Agustina', 'Kota Yogyakarta', '11', '5', '', ''),
('819948', '6411232802', 'Maria Usamah ', 'Kab. Bantul', '15', '4', '', ''),
('824765', '9859366310', 'Harjo Drajat Nugroho', 'Kota Yogyakarta', '10', '6', '', ''),
('827095', '1389936507', 'Raden Harja Prabowo ', 'Kab. Gunung Kidul', '13', '8', '', ''),
('828201', '0877350805', 'Ulya Sabrina Palastri ', 'Kab. Sleman', '16', '5', '', ''),
('830649', '2797131007', 'Kayla Anggraini', 'Kab. Gunung Kidul', '16', '3', '', ''),
('832899', '6388637001', 'Elma Handayani', 'Kab. Gunung Kidul', '14', '13', '', ''),
('837085', '3993816805', 'Halima Suryatmi', 'Kab. Bantul', '13', '11', '', ''),
('841586', '9681702702', 'Bagus Rajata', 'Kota Yogyakarta', '10', '5', '', ''),
('841823', '3596324906', 'Salman Kusumo', 'Kota Yogyakarta', '4', '8', '', ''),
('850786', '9344531802', 'Icha Sudiati ', 'Kota Yogyakarta', '5', '6', '', ''),
('853392', '2332786304', 'Slamet Widodo', 'Kab. Sleman', '14', '1', '', ''),
('854182', '0134094611', 'Prayogo Waluyo ', 'Kab. Bantul', '19', '2', '', ''),
('854340', '4818676909', 'Yance Victoria Farida ', 'Kab. Sleman', '8', '13', '', ''),
('867883', '1669601511', 'Ratna Lailasari', 'Kab. Gunung Kidul', '11', '10', '', ''),
('869779', '7883663110', 'Kamila Puspita', 'Kab. Gunung Kidul', '19', '9', '', ''),
('869897', '1455430306', 'Ayu Agnes Nasyiah', 'Kab. Sleman', '16', '4', '', ''),
('874754', '0205440204', 'Syahrini Ulya Yolanda ', 'Kab. Sleman', '4', '9', '', ''),
('881071', '0767727112', 'Chelsea Permata ', 'Kab. Bantul', '4', '9', '', ''),
('885533', '2994191403', 'Edward Manullang', 'Kab. Sleman', '9', '13', '', ''),
('889561', '1374031104', 'Dono Damanik', 'Kab. Bantul', '19', '1', '', ''),
('889837', '3544230402', 'Hani Yulianti', 'Kab. Sleman', '5', '6', '', ''),
('892641', '3976245707', 'Jarwadi Martaka Wibisono ', 'Kab. Bantul', '15', '2', '', ''),
('896787', '9066724404', 'Daruna Hardana Sirait', 'Kab. Sleman', '1', '11', '', ''),
('898524', '2429660103', 'Zulfa Hasanah', 'Kab. Gunung Kidul', '20', '12', '', ''),
('898840', '2156250412', 'Nardi Najmudin ', 'Kab. Bantul', '18', '7', '', ''),
('910409', '3956784810', 'Clara Susanti', 'Kab. Gunung Kidul', '9', '13', '', ''),
('911830', '7098520902', 'Soleh Kusumo ', 'Kab. Gunung Kidul', '10', '6', '', ''),
('912739', '0693605201', 'Saka Pradipta', 'Kab. Sleman', '12', '2', '', ''),
('914910', '1781992108', 'Karimah Ratna Handayani', 'Kota Yogyakarta', '6', '7', '', ''),
('917753', '7888311410', 'Zaenab Betania Laksmiwati ', 'Kab. Bantul', '8', '5', '', ''),
('918227', '2186262101', 'Ilyas Sitompul', 'Kab. Sleman', '15', '11', '', ''),
('919254', '4248626706', 'Zelaya Rahimah', 'Kab. Sleman', '14', '3', '', ''),
('920833', '5078532709', 'Wulan Safitri', 'Kab. Gunung Kidul', '4', '6', '', ''),
('924940', '4290260202', 'Anom Prabu Megantara', 'Kab. Bantul', '18', '12', '', ''),
('937812', '1898764302', 'Balidin Rajata', 'Kota Yogyakarta', '13', '2', '', ''),
('939036', '1477556105', 'Lili Anggraini ', 'Kab. Sleman', '13', '8', '', ''),
('940339', '9770897008', 'Irfan Haryanto ', 'Kab. Bantul', '17', '5', '', ''),
('942313', '8605092411', 'Kartika Hariyah', 'Kab. Bantul', '10', '9', '', ''),
('947762', '5956935502', 'Lukman Zulkarnain ', 'Kota Yogyakarta', '1', '2', '', ''),
('951869', '9599606909', 'Rahmi Shania Wahyuni ', 'Kab. Gunung Kidul', '16', '8', '', ''),
('953882', '7165716003', 'Danuja Maheswara', 'Kab. Sleman', '1', '2', '', ''),
('958344', '6803422309', 'Warsita Sihombing', 'Kab. Bantul', '5', '6', '', ''),
('961345', '1964871804', 'Putri Shakila Lailasari', 'Kab. Gunung Kidul', '17', '2', '', ''),
('965688', '6966686606', 'Raina Agustina', 'Kab. Gunung Kidul', '5', '11', '', ''),
('967781', '5332197108', 'Cayadi Simbolon', 'Kab. Gunung Kidul', '14', '10', '', ''),
('972124', '9273071810', 'Zaenab Astuti', 'Kab. Sleman', '2', '6', '', ''),
('974612', '7846811901', 'Adikara Lazuardi', 'Kab. Bantul', '14', '6', '', ''),
('977850', '8907345605', 'Jamal Putra', 'Kab. Bantul', '19', '5', '', ''),
('987010', '4571426411', 'Lukman Narpati ', 'Kab. Bantul', '2', '4', '', ''),
('989222', '0493540110', 'Dimaz Marpaung', 'Kab. Bantul', '8', '11', '', ''),
('997277', '6144743110', 'Cindy Widiastuti', 'Kota Yogyakarta', '8', '12', '', ''),
('999448', '1994196910', 'Ayu Hariyah ', 'Kota Yogyakarta', '2', '3', '', ''),
('999646', '4050753101', 'Tari Mandasari', 'Kota Yogyakarta', '3', '4', '', '');

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
  ADD PRIMARY KEY (`guru_id`),
  ADD KEY `teacher_id` (`guru_id`),
  ADD KEY `teacher_id_2` (`guru_id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`mapel_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `mapel_id` (`mapel_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `guru` (`guru_id`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`),
  ADD CONSTRAINT `schedule_ibfk_3` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`mapel_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
