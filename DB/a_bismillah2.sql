-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2020 at 03:44 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_bismillah2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(225) NOT NULL,
  `user_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`user_id`, `user_email`, `user_password`, `user_nama`) VALUES
(1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bobot_penduduk`
--

CREATE TABLE `tb_bobot_penduduk` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `bobot` char(10) NOT NULL,
  `persen` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bobot_penduduk`
--

INSERT INTO `tb_bobot_penduduk` (`id`, `nama`, `bobot`, `persen`) VALUES
(1, 'keterangan rumah', '10', '0.1'),
(2, 'jumlah tanggungan', '20', '0.2'),
(3, 'jumlah aset', '30', '0.3'),
(4, 'program sosial', '20', '0.2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_desa`
--

CREATE TABLE `tb_desa` (
  `id_desa` int(3) NOT NULL,
  `nama_desa` varchar(50) NOT NULL,
  `kecamatan_id` char(11) NOT NULL,
  `total_penduduk` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_desa`
--

INSERT INTO `tb_desa` (`id_desa`, `nama_desa`, `kecamatan_id`, `total_penduduk`) VALUES
(2, 'ADIWERNA', '1', '4240'),
(3, 'BERSOLE', '1', '1371'),
(4, 'GUMALAR', '1', '1657'),
(5, 'HARJOSARI KIDUL', '1', '3107'),
(6, 'HARJOSARI LOR', '1', '3033'),
(7, 'KALIMATI', '1', '1839'),
(8, 'KALIWADAS', '1', '1581'),
(9, 'KEDUNGSUKUN', '1', '871'),
(10, 'LEMAHDUWUR', '1', '1162'),
(11, 'LUMINGSER', '1', '1695'),
(12, 'PAGEDANGAN', '1', '1928'),
(13, 'PAGIYANTEN', '1', '1803'),
(14, 'PECANGAKAN', '1', '833'),
(15, 'PEDESLOHOR', '1', '1835'),
(16, 'PENARUKAN', '1', '2163'),
(17, 'PESAREAN', '1', '4058'),
(18, 'TEMBOK BANJARAN', '1', '1553'),
(19, 'TEMBOK KIDUL', '1', '1674'),
(20, 'TEMBOK LOR', '1', '1242'),
(21, 'TEMBOK LUWUNG', '1', '3339'),
(22, 'UJUNGRUSI', '1', '2938'),
(23, 'BALAPULANG KULON', '2', '2024'),
(24, 'BALAPULANG WETAN', '2', '5170'),
(25, 'BANJARANYAR', '2', '3160'),
(26, 'BATUAGUNG', '2', '1629'),
(27, 'BUKATEJA', '2', '992'),
(28, 'CENGGINI', '2', '1528'),
(29, 'CIBUNAR', '2', '961'),
(30, 'CILONGOK', '2', '945'),
(31, 'DANAREJA', '2', '999'),
(32, 'DANAWARIH', '2', '2490'),
(33, 'HARJAWINANGUN', '2', '1931'),
(34, 'KALIBAKUNG', '2', '1099'),
(35, 'KALIWUNGU', '2', '1362'),
(36, 'KARANGJAMBU', '2', '1933'),
(37, 'PAGERWANGI', '2', '531'),
(38, 'PAMIRITAN', '2', '2075'),
(39, 'SANGKANJAYA', '2', '347'),
(40, 'SESEPAN', '2', '1048'),
(41, 'TEMBONGWAH', '2', '1528'),
(42, 'WRINGINJENGGOT', '2', '975'),
(43, 'BATUNYANA', '3', '598'),
(44, 'BOJONG', '3', '3009'),
(45, 'BUNIWAH', '3', '1248'),
(46, 'CIKURA', '3', '1339'),
(47, 'DANASARI', '3', '1489'),
(48, 'DUKUHTENGAH', '3', '1011'),
(49, 'GUNUNGJATI', '3', '786'),
(50, 'KAJENENGAN', '3', '1386'),
(51, 'KALIJAMBU', '3', '739'),
(52, 'KARANGMULYA', '3', '1857'),
(53, 'KEDAWUNG', '3', '962'),
(54, 'LENGKONG', '3', '1664'),
(55, 'PUCANGLUWUK', '3', '1279'),
(56, 'REMBUL', '3', '2888'),
(57, 'SANGKANAYU', '3', '394'),
(58, 'SUNIARSIH', '3', '709'),
(59, 'TUWEL', '3', '3112'),
(60, 'BATUMIRAH', '4', '1430'),
(61, 'BEGAWAT', '4', '1597'),
(62, 'BUMIJAWA', '4', '4431'),
(63, 'CARUL', '4', '349'),
(64, 'CAWITALI', '4', '1179'),
(65, 'CEMPAKA', '4', '1967'),
(66, 'CINTAMANIK', '4', '2111'),
(67, 'DUKUHBENDA', '4', '2965'),
(68, 'GUCI', '4', '1356'),
(69, 'GUNUNGAGUNG', '4', '1766'),
(70, 'JEJEG', '4', '1822'),
(71, 'MUNCANGLARANG', '4', '1949'),
(72, 'PAGERKASIH', '4', '678'),
(73, 'SIGEDONG', '4', '2355'),
(74, 'SOKASARI', '4', '1670'),
(75, 'SOKATENGAH', '4', '1674'),
(76, 'SUMBAGA', '4', '1780'),
(77, 'TRAJU', '4', '1245'),
(78, 'BANDASARI', '5', '1421'),
(79, 'DEBONG WETAN', '5', '1178'),
(80, 'DUKUHTURI', '5', '1321'),
(81, 'GROGOL', '5', '1162'),
(82, 'KADEMANGARAN', '5', '2066'),
(83, 'KARANGANYAR', '5', '2004'),
(84, 'KEPANDEAN', '5', '2472'),
(85, 'KETANGGUNGAN', '5', '1059'),
(86, 'KUPU', '5', '1390'),
(87, 'LAWATAN', '5', '1822'),
(88, 'PAGONGAN', '5', '2581'),
(89, 'PEKAUMAN KULON', '5', '1725'),
(90, 'PENGABEAN', '5', '1984'),
(91, 'PENGARASAN', '5', '916'),
(92, 'PEPEDAN', '5', '2032'),
(93, 'SIDAKATON', '5', '3650'),
(94, 'SIDAPURNA', '5', '2779'),
(95, 'SUTAPRANAN', '5', '1556'),
(96, 'BLUBUK', '6', '3715'),
(97, 'BULAKPACING', '6', '1754'),
(98, 'DUKUHWARU', '6', '3254'),
(99, 'GUMAYUN', '6', '2307'),
(100, 'KABUNAN', '6', '2213'),
(101, 'KALISOKA', '6', '2131'),
(102, 'PEDAGANGAN', '6', '2498'),
(103, 'SELAPURA', '6', '1324'),
(104, 'SINDANG', '6', '1531'),
(105, 'SLARANG LOR', '6', '2235'),
(106, 'ARGATAWANG', '7', '772'),
(107, 'CAPAR', '7', '474'),
(108, 'CERIH', '7', '1762'),
(109, 'DUKUHBANGSA', '7', '1389'),
(110, 'GANTUNGAN', '7', '1180'),
(111, 'JATINEGARA', '7', '971'),
(112, 'KEDUNGWUNGU', '7', '870'),
(113, 'LEBAKWANGI', '7', '1370'),
(114, 'LEMBASARI', '7', '1341'),
(115, 'LUWIJAWA', '7', '1160'),
(116, 'MOKAHA', '7', '925'),
(117, 'PADASARI', '7', '1562'),
(118, 'PENYALAHAN', '7', '1467'),
(119, 'SITAIL', '7', '815'),
(120, 'SUMBARANG', '7', '1593'),
(121, 'TAMANSARI', '7', '1647'),
(122, 'WOTGALIH', '7', '1385'),
(123, 'DUKUHJATI WETAN', '8', '945'),
(124, 'KARANGANYAR', '8', '2870'),
(125, 'KARANGMALANG', '8', '1583'),
(126, 'KEBANDINGAN', '8', '1911'),
(127, 'KEDUNGBANTENG', '8', '2583'),
(128, 'MARGAMULYA', '8', '1256'),
(129, 'PENUJAH', '8', '810'),
(130, 'SEMEDO', '8', '927'),
(131, 'SUMINGKIR', '8', '1130'),
(132, 'TONGGARA', '8', '1835'),
(133, 'BABAKAN', '9', '1412'),
(134, 'BANGUNGALIH', '9', '1296'),
(135, 'BONGKOK', '9', '2162'),
(136, 'DAMPYAK', '9', '2214'),
(137, 'DINUK', '9', '933'),
(138, 'JATILAWANG', '9', '1935'),
(139, 'KEMANTRAN', '9', '1566'),
(140, 'KEMUNING', '9', '1247'),
(141, 'KEPUNDUHAN', '9', '980'),
(142, 'KERTAHARJA', '9', '1447'),
(143, 'KERTAYASA', '9', '3483'),
(144, 'KETILENG', '9', '870'),
(145, 'KRAMAT', '9', '2225'),
(146, 'MARIBAYA', '9', '1813'),
(147, 'MEJASEM BARAT', '9', '4495'),
(148, 'MEJASEM TIMUR', '9', '2970'),
(149, 'MUNJUNGAGUNG', '9', '2084'),
(150, 'PADAHARJA', '9', '1896'),
(151, 'PLUMBUNGAN', '9', '1015'),
(152, 'TANJUNGHARJA', '9', '1919'),
(153, 'BALARADIN', '10', '1920'),
(154, 'DUKUHDAMU', '10', '1532'),
(155, 'DUKUHLO', '10', '1434'),
(156, 'JATIMULYA', '10', '1666'),
(157, 'KAJEN', '10', '1322'),
(158, 'KAMBANGAN', '10', '3147'),
(159, 'KESUBEN', '10', '3583'),
(160, 'LEBAKGOWAH', '10', '2096'),
(161, 'LEBAKSIU KIDUL', '10', '2608'),
(162, 'LEBAKSIU LOR', '10', '1668'),
(163, 'PENDAWA', '10', '1726'),
(164, 'SLARANG KIDUL', '10', '1694'),
(165, 'TEGALANDONG', '10', '2365'),
(166, 'TIMBANGREJA', '10', '1962'),
(167, 'YAMANSARI', '10', '3959'),
(168, 'DANARAJA', '11', '1122'),
(169, 'DUKUHTENGAH', '11', '2424'),
(170, 'JATILABA', '11', '3463'),
(171, 'JEMBAYAT', '11', '4661'),
(172, 'KALIGAYAM', '11', '853'),
(173, 'KALISALAK', '11', '3414'),
(174, 'KARANGDAWA', '11', '5208'),
(175, 'MARGAAYU', '11', '1710'),
(176, 'MARGASARI', '11', '4276'),
(177, 'PAKULAUT', '11', '3502'),
(178, 'PRUPUK SELATAN', '11', '3711'),
(179, 'PRUPUK UTARA', '11', '2050'),
(180, 'WANASARI', '11', '974'),
(181, 'JATIWANGI', '12', '1699'),
(182, 'KARANGANYAR', '12', '2101'),
(183, 'KEDUNGSUGIH', '12', '843'),
(184, 'KERTAHARJA', '12', '1591'),
(185, 'MULYOHARJO', '12', '1163'),
(186, 'PAGERBARANG', '12', '2472'),
(187, 'PESAREAN', '12', '1344'),
(188, 'RAJEGWESI', '12', '1393'),
(189, 'RANDUSARI', '12', '4084'),
(190, 'SEMBOJA', '12', '1190'),
(191, 'SIDOMULYO', '12', '828'),
(192, 'SRENGSENG', '12', '1435'),
(193, 'SUROKIDUL', '12', '1475'),
(194, 'BALAMOA', '13', '2019'),
(195, 'BEDUG', '13', '1704'),
(196, 'BOGARES KIDUL', '13', '2544'),
(197, 'BOGARES LOR', '13', '1014'),
(198, 'CURUG', '13', '788'),
(199, 'DEPOK', '13', '1004'),
(200, 'DERMASANDI', '13', '1595'),
(201, 'DERMASUCI', '13', '1071'),
(202, 'DUKUHJATI KIDUL', '13', '1289'),
(203, 'DUKUHSEMBUNG', '13', '969'),
(204, 'GROBOG KULON', '13', '2271'),
(205, 'GROBOG WETAN', '13', '2551'),
(206, 'JENGGAWUR', '13', '827'),
(207, 'KALIKANGKUNG', '13', '1634'),
(208, 'KENDALSERUT', '13', '2510'),
(209, 'PAKETIBAN', '13', '998'),
(210, 'PANGKAH', '13', '2645'),
(211, 'PECABEAN', '13', '1996'),
(212, 'PENER', '13', '1822'),
(213, 'PENUSUPAN', '13', '2972'),
(214, 'PURBAYASA', '13', '705'),
(215, 'RANCAWIRU', '13', '1381'),
(216, 'TALOK', '13', '910'),
(217, 'DUKUHSALAM', '14', '2077'),
(218, 'DUKUHWRINGIN', '14', '2777'),
(219, 'KAGOK', '14', '1374'),
(220, 'KALISAPU', '14', '4191'),
(221, 'KUDAILE', '14', '2796'),
(222, 'PAKEMBARAN', '14', '2984'),
(223, 'PROCOT', '14', '2156'),
(224, 'SLAWI KULON', '14', '3029'),
(225, 'SLAWI WETAN', '14', '2905'),
(226, 'TRAYEMAN', '14', '1668'),
(227, 'BOJONGSANA', '15', '1269'),
(228, 'GEMBONGDADI', '15', '2312'),
(229, 'HARJASARI', '15', '3466'),
(230, 'JATIBOGOR', '15', '3702'),
(231, 'JATIMULYA', '15', '3290'),
(232, 'KARANGMULYA', '15', '1893'),
(233, 'KARANGWULUH', '15', '1006'),
(234, 'KERTASARI', '15', '3739'),
(235, 'PURWAHAMBA', '15', '2595'),
(236, 'SIDAHARJA', '15', '2553'),
(237, 'SURADADI', '15', '4692'),
(238, 'BENGLE', '16', '1947'),
(239, 'CANGKRING', '16', '1795'),
(240, 'DAWUHAN', '16', '1663'),
(241, 'DUKUHMALANG', '16', '1140'),
(242, 'GEMBONG KULON', '16', '1488'),
(243, 'GETASKEREP', '16', '1514'),
(244, 'KAJEN', '16', '1435'),
(245, 'KALADAWA', '16', '2286'),
(246, 'KALIGAYAM', '16', '2206'),
(247, 'KEBASEN', '16', '1393'),
(248, 'LANGGEN', '16', '1201'),
(249, 'PACUL', '16', '2609'),
(250, 'PASANGAN', '16', '1431'),
(251, 'PEGIRIKAN', '16', '2654'),
(252, 'PEKIRINGAN', '16', '1597'),
(253, 'PESAYANGAN', '16', '2352'),
(254, 'TALANG', '16', '956'),
(255, 'TEGALWANGI', '16', '2058'),
(256, 'WANGANDAWA', '16', '2314'),
(257, 'BREKAT', '17', '1722'),
(258, 'BULAKWARU', '17', '2666'),
(259, 'BUMIHARJA', '17', '1485'),
(260, 'JATIRAWA', '17', '2103'),
(261, 'KABUKAN', '17', '1300'),
(262, 'KALIJAMBE', '17', '1113'),
(263, 'KARANGJATI', '17', '1833'),
(264, 'KARANGMANGU', '17', '1514'),
(265, 'KEDOKANSAYANG', '17', '1875'),
(266, 'KEDUNGBUNGKUS', '17', '862'),
(267, 'KEMANGGUNGAN', '17', '708'),
(268, 'KESADIKAN', '17', '1559'),
(269, 'KESAMIRAN', '17', '753'),
(270, 'LEBETENG', '17', '1473'),
(271, 'MANGUNSAREN', '17', '1190'),
(272, 'MARGAPADANG', '17', '1087'),
(273, 'MINDAKA', '17', '1370'),
(274, 'PURBASANA', '17', '1158'),
(275, 'SETU', '17', '1512'),
(276, 'TARUB', '17', '1215'),
(277, 'BANJARAGUNG', '18', '2247'),
(278, 'BANJARTURI', '18', '1683'),
(279, 'DEMANGHARJO', '18', '2919'),
(280, 'KEDUNGJATI', '18', '1767'),
(281, 'KEDUNGKELOR', '18', '2249'),
(282, 'KENDAYAKAN', '18', '2276'),
(283, 'KREMAN', '18', '1679'),
(284, 'RANGIMULYA', '18', '926'),
(285, 'SIDAMULYA', '18', '1426'),
(286, 'SIGENTONG', '18', '1289'),
(287, 'SUKAREJA', '18', '1862'),
(288, 'WARUREJA', '18', '2153');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `kecamatan_id` int(11) NOT NULL,
  `nama_kecamatan` varchar(30) NOT NULL,
  `total_penduduk` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`kecamatan_id`, `nama_kecamatan`, `total_penduduk`) VALUES
(1, 'ADIWERNA', '43922'),
(2, 'BALAPULANG', '32727'),
(3, 'BOJONG', '24470'),
(4, 'BUMIJAWA', '32324'),
(5, 'DUKUHTURI', '33118'),
(6, 'DUKUHWARU', '20683'),
(7, 'JATINEGARA', '59358'),
(8, 'KEDUNGBANTENG', '15850'),
(9, 'KRAMAT', '37962'),
(10, 'LEBAKSIU', '32682'),
(11, 'MARGASARI', '37368'),
(12, 'PAGERBARANG', '21618'),
(13, 'PANGKAH', '37219'),
(14, 'SLAWI', '25957'),
(15, 'SURADADI', '30517'),
(16, 'TALANG', '34039'),
(17, 'TARUB', '28498'),
(18, 'WARUREJA', '22476');

-- --------------------------------------------------------

--
-- Table structure for table `tb_klasifikasi_penduduk`
--

CREATE TABLE `tb_klasifikasi_penduduk` (
  `id` int(11) NOT NULL,
  `aset_id` int(11) NOT NULL,
  `rumah_id` int(11) NOT NULL,
  `tempat_id` int(11) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `jumlah_tanggungan` char(10) NOT NULL,
  `keterangan_rumah` char(10) NOT NULL,
  `jumlah_kepemilikan_aset` char(10) NOT NULL,
  `program_sosial` char(10) NOT NULL,
  `bobot_tanggungan` char(10) NOT NULL,
  `bobot_keterangan_rumah` char(10) NOT NULL,
  `bobot_jumlah_aset` char(10) NOT NULL,
  `bobot_program_sosial` char(10) NOT NULL,
  `total_bobot` decimal(10,0) NOT NULL,
  `klasifikasi` varchar(30) NOT NULL,
  `tahun_klasifikasi` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_klasifikasi_penduduk`
--

INSERT INTO `tb_klasifikasi_penduduk` (`id`, `aset_id`, `rumah_id`, `tempat_id`, `kecamatan`, `kelurahan`, `jumlah_tanggungan`, `keterangan_rumah`, `jumlah_kepemilikan_aset`, `program_sosial`, `bobot_tanggungan`, `bobot_keterangan_rumah`, `bobot_jumlah_aset`, `bobot_program_sosial`, `total_bobot`, `klasifikasi`, `tahun_klasifikasi`) VALUES
(1, 1, 1, 1, '3', '43', '6', '19', '28', '17', '', '', '', '', '0', '', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penduduk_kepemilikan_aset`
--

CREATE TABLE `tb_penduduk_kepemilikan_aset` (
  `id` int(11) NOT NULL,
  `kk` char(16) NOT NULL,
  `tabung_gas` char(10) NOT NULL,
  `lemari_es` char(10) NOT NULL,
  `ac` char(10) NOT NULL,
  `pemanas_air` char(10) NOT NULL,
  `telepon` char(10) NOT NULL,
  `televisi` char(10) NOT NULL,
  `emas` char(10) NOT NULL,
  `komputer` char(10) NOT NULL,
  `sepeda` char(10) NOT NULL,
  `sepeda_motor` int(10) NOT NULL,
  `monil` char(10) NOT NULL,
  `perahu` char(10) NOT NULL,
  `lahan` char(10) NOT NULL,
  `properti_lain` char(10) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `omset` char(10) NOT NULL,
  `peserta_kks_kps` char(2) NOT NULL,
  `peserta_kip_bsm` char(2) NOT NULL,
  `peserta_kis` char(2) NOT NULL,
  `peserta_bpjs` char(2) NOT NULL,
  `peserta_jamsostek` char(2) NOT NULL,
  `peserta_asuransi_lainnya` char(2) NOT NULL,
  `peserta_pkh` char(2) NOT NULL,
  `penerima_raskin` char(2) NOT NULL,
  `kur` char(2) NOT NULL,
  `total_jaminan_sosial` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penduduk_kepemilikan_aset`
--

INSERT INTO `tb_penduduk_kepemilikan_aset` (`id`, `kk`, `tabung_gas`, `lemari_es`, `ac`, `pemanas_air`, `telepon`, `televisi`, `emas`, `komputer`, `sepeda`, `sepeda_motor`, `monil`, `perahu`, `lahan`, `properti_lain`, `pekerjaan`, `omset`, `peserta_kks_kps`, `peserta_kip_bsm`, `peserta_kis`, `peserta_bpjs`, `peserta_jamsostek`, `peserta_asuransi_lainnya`, `peserta_pkh`, `penerima_raskin`, `kur`, `total_jaminan_sosial`) VALUES
(1, '1', '1', '3', '1', '3', '1', '3', '1', '3', '1', 3, '1', '3', '1', '3', '0', '1', '1', '3', '1', '3', '1', '3', '1', '3', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penduduk_keterangan_rumah`
--

CREATE TABLE `tb_penduduk_keterangan_rumah` (
  `id` int(11) NOT NULL,
  `kk` char(16) NOT NULL,
  `status_tempat_tinggal` varchar(50) NOT NULL,
  `status_lahan_tempat_tinggal` varchar(50) NOT NULL,
  `luas_lantai` char(10) NOT NULL,
  `jenis_lantai_terluas` varchar(50) NOT NULL,
  `jenis_dinding_terluas` varchar(50) NOT NULL,
  `kondisi_dinding` varchar(50) NOT NULL,
  `jenis_atap_terluas` varchar(50) NOT NULL,
  `kondisi_atap` varchar(50) NOT NULL,
  `sumber_air_minum` varchar(50) NOT NULL,
  `cara_memperoleh_air_minum` varchar(50) NOT NULL,
  `sumber_penerangan_utama` varchar(50) NOT NULL,
  `daya_terpasang` varchar(20) NOT NULL,
  `bahan_bakar_memasak` varchar(50) NOT NULL,
  `penggunaan_fasilitas_bab` varchar(50) NOT NULL,
  `jenis_kloset` varchar(50) NOT NULL,
  `tempat_pembuangan_akhir_tinja` varchar(50) NOT NULL,
  `total` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penduduk_keterangan_rumah`
--

INSERT INTO `tb_penduduk_keterangan_rumah` (`id`, `kk`, `status_tempat_tinggal`, `status_lahan_tempat_tinggal`, `luas_lantai`, `jenis_lantai_terluas`, `jenis_dinding_terluas`, `kondisi_dinding`, `jenis_atap_terluas`, `kondisi_atap`, `sumber_air_minum`, `cara_memperoleh_air_minum`, `sumber_penerangan_utama`, `daya_terpasang`, `bahan_bakar_memasak`, `penggunaan_fasilitas_bab`, `jenis_kloset`, `tempat_pembuangan_akhir_tinja`, `total`) VALUES
(1, '1', '1', '1', '1', '1', '1', '1', '1', '5', '1', '1', '1', '1', '1', '1', '1', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penduduk_pengenalan_tempat`
--

CREATE TABLE `tb_penduduk_pengenalan_tempat` (
  `id` int(11) NOT NULL,
  `kk` char(16) NOT NULL,
  `nik` char(16) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `nama_krt` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `jumlah_art` char(10) NOT NULL,
  `tahun_input` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penduduk_pengenalan_tempat`
--

INSERT INTO `tb_penduduk_pengenalan_tempat` (`id`, `kk`, `nik`, `kecamatan`, `kelurahan`, `alamat`, `nama_krt`, `jenis_kelamin`, `jumlah_art`, `tahun_input`) VALUES
(1, '0928388884444333', '3328112507700003', '3', '43', 'DESA TEMBOK BANJARAN RT 010 RW 02', 'SUKARNO', 'L', '6', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_variabel`
--

CREATE TABLE `tb_sub_variabel` (
  `sub_id` int(11) NOT NULL,
  `sub_variabel_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `skor` decimal(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sub_variabel`
--

INSERT INTO `tb_sub_variabel` (`sub_id`, `sub_variabel_id`, `nama`, `skor`) VALUES
(1, 1, 'milik sendiri', '1'),
(2, 1, 'kontak/sewa', '2'),
(3, 1, 'bebas sewa', '3'),
(4, 1, 'dinas', '4'),
(5, 1, 'lainnya', '5'),
(6, 2, 'milik sendiri', '1'),
(7, 2, 'milik orang lain', '2'),
(8, 2, 'tanah negara', '3'),
(9, 2, 'lainnya', '4'),
(10, 3, '> 8m2 /orang', '1'),
(11, 3, '< 8m2 /orang', '2'),
(12, 4, 'marmer/granit', '1'),
(13, 4, 'keramik', '2'),
(14, 4, 'parket/vinil/permadani', '3'),
(15, 4, 'Ubin/Tegel/Teraso', '4'),
(16, 4, 'Kayu/Papan Kualitas tinggi', '5'),
(17, 4, 'sementara/bata merah', '6'),
(18, 4, 'bambu', '7'),
(19, 4, 'Kayu/Papan Kualitas Rendah', '8'),
(20, 4, 'tanah', '9'),
(21, 4, 'lainnya', '10'),
(22, 5, 'tembok', '1'),
(23, 5, 'Plesteran anyaman bambu/kawat', '2'),
(24, 5, 'kayu', '3'),
(25, 5, 'Anyaman Bambu', '4'),
(26, 5, 'Batang Kayu', '5'),
(27, 5, 'bambu', '6'),
(28, 5, 'lainnya', '7'),
(29, 6, 'bagus/kualitas tinggi', '1'),
(30, 6, 'jelek/kualitas rendah', '2'),
(31, 7, 'beton/genteng beton', '1'),
(32, 7, 'genteng keramik', '2'),
(33, 7, 'genteng metal', '3'),
(34, 7, 'tanah liat', '4'),
(35, 7, 'asbes', '5'),
(36, 7, 'seng', '6'),
(37, 7, 'sirap', '7'),
(38, 7, 'bambu', '8'),
(39, 8, 'air kemasan bermerk', '1'),
(40, 8, 'air isi ulang', '2'),
(41, 8, 'leding meteran', '3'),
(42, 8, 'leding eceran', '4'),
(43, 8, 'sumur bor/pompa', '5'),
(44, 8, 'sumur terlindungi', '6'),
(45, 8, 'sumur tidak terlindungi', '7'),
(46, 8, 'mata air terlindug', '8'),
(47, 8, 'Mata Air Tidak Terlindung', '9'),
(48, 8, 'air sungai/danau/waduk', '10'),
(49, 8, 'Air Hujan', '11'),
(50, 8, 'lainnya', '12'),
(51, 9, 'membeli eceran', '1'),
(52, 9, 'jelek/kualitas rendah', '2'),
(53, 9, 'tidak membeli', '3'),
(54, 10, 'Listrik PLN', '1'),
(55, 10, 'Listrik non PLN', '2'),
(56, 10, 'Bukan Listrik', '3'),
(57, 11, '450 watt', '1'),
(58, 11, '900 watt', '2'),
(59, 12, 'listrik', '1'),
(60, 12, 'gas > 3kg', '2'),
(61, 12, 'gas 3kg', '3'),
(62, 13, 'sediri', '1'),
(63, 13, 'Bersama', '2'),
(64, 14, 'leher angsa', '1'),
(65, 14, 'plengsengan', '2'),
(66, 15, 'tangki', '1'),
(67, 15, 'spal', '2'),
(68, 15, 'lubang tanah', '3'),
(69, 16, 'bagus/kualitas tinggi', '5'),
(70, 16, 'jelek/kualitas rendah', '2'),
(71, 15, 'kolam/sungai/danau/laut', '4'),
(72, 15, 'pantai/lapangan/kebun', '5'),
(73, 15, 'lainnya', '6'),
(74, 14, 'cemplung/cubluk', '3'),
(75, 14, 'tidak pakai', '4'),
(76, 13, 'umum', '3'),
(77, 13, 'tidak ada', '4'),
(78, 12, 'gas kota/biogas', '4'),
(79, 12, 'minyak tanah', '5'),
(80, 12, 'briket', '6'),
(81, 12, 'arang', '7'),
(82, 12, 'kayu bakar', '8'),
(83, 12, 'tidak memasak', '9'),
(84, 11, '1.300 watt', '4'),
(85, 11, '2.200 watt', '5'),
(86, 11, '> 2.200 watt', '6'),
(87, 11, 'tanpa meteran', '7');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tingkat_kesejahteraan`
--

CREATE TABLE `tb_tingkat_kesejahteraan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `min` char(20) NOT NULL,
  `max` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tingkat_kesejahteraan`
--

INSERT INTO `tb_tingkat_kesejahteraan` (`id`, `nama`, `min`, `max`) VALUES
(1, 'Hampir Miskin', '20', '30'),
(2, 'Miskin', '10', '20'),
(3, 'Sangat Miskin', '0', '10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_variabel`
--

CREATE TABLE `tb_variabel` (
  `variabel_id` int(11) NOT NULL,
  `nama_variabel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_variabel`
--

INSERT INTO `tb_variabel` (`variabel_id`, `nama_variabel`) VALUES
(1, 'Status Bangunan'),
(2, 'status lahan'),
(3, 'luas lantai'),
(4, 'Jenis Lantai Tempat '),
(5, 'Jenis Dinding'),
(6, 'kualitas dinding'),
(7, 'jenis atap '),
(8, 'Sumber Air Minum'),
(9, 'cara memperoleh air'),
(10, 'Sumber Penerangan Rumah'),
(11, 'daya listrik'),
(12, 'Bahan Bakar untuk Memasak'),
(13, 'Fasilitas Buang Air Besar'),
(14, 'jenis kloset'),
(15, 'tempat pembuangan akhir tinja'),
(16, 'kondisi atap');

-- --------------------------------------------------------

--
-- Table structure for table `tb_variabel_desa`
--

CREATE TABLE `tb_variabel_desa` (
  `variabel_id` int(11) NOT NULL,
  `nama_variabel` varchar(50) NOT NULL,
  `min` decimal(10,0) NOT NULL,
  `persen` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_variabel_desa`
--

INSERT INTO `tb_variabel_desa` (`variabel_id`, `nama_variabel`, `min`, `persen`) VALUES
(1, 'sangat sejahtera', '10', '0.10'),
(2, 'sejahtera', '20', '0.20'),
(3, 'kurang sejahtera', '30', '0.30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tb_bobot_penduduk`
--
ALTER TABLE `tb_bobot_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_desa`
--
ALTER TABLE `tb_desa`
  ADD PRIMARY KEY (`id_desa`),
  ADD KEY `kecamatan_id` (`kecamatan_id`);

--
-- Indexes for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`kecamatan_id`);

--
-- Indexes for table `tb_klasifikasi_penduduk`
--
ALTER TABLE `tb_klasifikasi_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penduduk_kepemilikan_aset`
--
ALTER TABLE `tb_penduduk_kepemilikan_aset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penduduk_keterangan_rumah`
--
ALTER TABLE `tb_penduduk_keterangan_rumah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penduduk_pengenalan_tempat`
--
ALTER TABLE `tb_penduduk_pengenalan_tempat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sub_variabel`
--
ALTER TABLE `tb_sub_variabel`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `tb_tingkat_kesejahteraan`
--
ALTER TABLE `tb_tingkat_kesejahteraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_variabel`
--
ALTER TABLE `tb_variabel`
  ADD PRIMARY KEY (`variabel_id`);

--
-- Indexes for table `tb_variabel_desa`
--
ALTER TABLE `tb_variabel_desa`
  ADD PRIMARY KEY (`variabel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_bobot_penduduk`
--
ALTER TABLE `tb_bobot_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_desa`
--
ALTER TABLE `tb_desa`
  MODIFY `id_desa` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT for table `tb_klasifikasi_penduduk`
--
ALTER TABLE `tb_klasifikasi_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_penduduk_kepemilikan_aset`
--
ALTER TABLE `tb_penduduk_kepemilikan_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_penduduk_keterangan_rumah`
--
ALTER TABLE `tb_penduduk_keterangan_rumah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_penduduk_pengenalan_tempat`
--
ALTER TABLE `tb_penduduk_pengenalan_tempat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_sub_variabel`
--
ALTER TABLE `tb_sub_variabel`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `tb_tingkat_kesejahteraan`
--
ALTER TABLE `tb_tingkat_kesejahteraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_variabel`
--
ALTER TABLE `tb_variabel`
  MODIFY `variabel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_variabel_desa`
--
ALTER TABLE `tb_variabel_desa`
  MODIFY `variabel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
