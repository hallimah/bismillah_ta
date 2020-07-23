-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2020 at 10:31 AM
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
(1, 'keterangan rumah', '30', '0.3'),
(2, 'jumlah tanggungan', '20', '0.2'),
(3, 'jumlah aset', '30', '0.3'),
(4, 'program sosial', '20', '0.2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_desa`
--

CREATE TABLE `tb_desa` (
  `id_desa` int(3) NOT NULL,
  `nama_desa` varchar(225) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `total_penduduk` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_desa`
--

INSERT INTO `tb_desa` (`id_desa`, `nama_desa`, `kecamatan_id`, `total_penduduk`) VALUES
(1, 'ADIWERNA', 1, ''),
(2, 'BALAMOA', 13, ''),
(3, 'BALAPULANG KULON', 2, ''),
(4, 'BALAPULANG WETAN', 2, ''),
(5, 'BALARADIN', 10, ''),
(6, 'BANGUN GALIH', 9, ''),
(7, 'BANJAR AGUNG', 18, ''),
(8, 'BANJAR ANYAR', 2, ''),
(9, 'BANJARTURI', 18, ''),
(10, 'BATUAGUNG', 2, ''),
(11, 'BATUMIRAH', 4, ''),
(12, 'BATUNYANA', 3, ''),
(13, 'BEDUG', 13, ''),
(14, 'BEGAWAT', 4, ''),
(15, 'BERSOLE', 1, ''),
(16, 'BLUBUK', 6, ''),
(17, 'BOGARES KIDUL', 13, ''),
(18, 'BOGARES LOR', 13, ''),
(19, 'BOJONG', 3, ''),
(20, 'BOJONGSANA', 15, ''),
(21, 'BONGKOK', 9, ''),
(22, 'BREKAT', 17, ''),
(23, 'BUKATEJA', 2, ''),
(24, 'BULAKPACING', 6, ''),
(25, 'BULAKWARU', 17, ''),
(26, 'BUMIHARJA', 17, ''),
(27, 'BUMIJAWA', 4, ''),
(28, 'BUNIWAH', 3, ''),
(29, 'CANGKRING', 16, ''),
(30, 'CARUL', 4, ''),
(31, 'CAWITALI', 4, ''),
(32, 'CEMPAKA', 4, ''),
(33, 'CENGGINI', 2, ''),
(34, 'CERIH', 7, ''),
(35, 'CIBUNAR', 2, ''),
(36, 'CIKURA', 3, ''),
(37, 'CILONGOK', 2, ''),
(38, 'CINTAMANIK', 4, ''),
(39, 'CURUG', 13, ''),
(40, 'DANARAJA', 11, ''),
(41, 'DANAREJA', 2, ''),
(42, 'DANASARI', 3, ''),
(43, 'DANASARI', 3, ''),
(44, 'DANAWARIH', 2, ''),
(45, 'DAWUHAN', 16, ''),
(46, 'DEMANGHARJO', 18, ''),
(47, 'DEPOK', 13, ''),
(48, 'DERMASANDI', 13, ''),
(49, 'DERMASUCI', 13, ''),
(50, 'DINUK', 9, ''),
(51, 'DUKUH RINGIN', 14, ''),
(52, 'DUKUH SALAM', 14, ''),
(53, 'DUKUH TENGAH', 11, ''),
(54, 'DUKUHBANGSA', 7, ''),
(55, 'DUKUHBENDA', 4, ''),
(56, 'DUKUHDAMU', 10, ''),
(57, 'DUKUHJATI KIDUL', 13, ''),
(58, 'DUKUHJATI WETAN', 8, ''),
(59, 'DUKUHLO', 10, ''),
(60, 'DUKUHSEMBUNG', 13, ''),
(61, 'DUKUHTENGAH', 3, ''),
(62, 'DUKUHTURI', 5, ''),
(63, 'DUKUHWARU', 6, ''),
(64, 'GANTUNGAN', 7, ''),
(65, 'GEMBONG KULON', 16, ''),
(66, 'GEMBONGDADI', 15, ''),
(67, 'GETASKEREP', 16, ''),
(68, 'GROBOG KULON', 13, ''),
(69, 'GROBOG WETAN', 13, ''),
(70, 'GUCI', 4, ''),
(71, 'GUMALAR', 1, ''),
(72, 'GUMAYUN', 6, ''),
(73, 'GUNUNG AGUNG', 4, ''),
(74, 'GUNUNGJATI', 3, ''),
(75, 'HARJASARI', 15, ''),
(76, 'HARJOSARI KIDUL', 1, ''),
(77, 'HARJOSARI LOR', 1, ''),
(78, 'HARJOWINANGUN', 2, ''),
(79, 'JATIBOGOR', 15, ''),
(80, 'JATILABA', 11, ''),
(81, 'JATILAWANG', 9, ''),
(82, 'JATIMULYA', 15, ''),
(83, 'JATIMULYO', 10, ''),
(84, 'JATIRAWA', 17, ''),
(85, 'JATIWANGI', 12, ''),
(86, 'JEJEG', 4, ''),
(87, 'JEMBAYAT', 11, ''),
(88, 'JENGGAWUR', 13, ''),
(89, 'KABUKAN', 17, ''),
(90, 'KABUNAN', 6, ''),
(91, 'KAGOK', 14, ''),
(92, 'KAJEN', 10, ''),
(93, 'KAJEN', 16, ''),
(94, 'KAJENENGAN', 3, ''),
(95, 'KALADAWA', 16, ''),
(96, 'KALIBAKUNG', 2, ''),
(97, 'KALIGAYAM', 11, ''),
(98, 'KALIJAMBE', 17, ''),
(99, 'KALIJAMBU', 3, ''),
(100, 'KALIKANGKUNG', 13, ''),
(101, 'KALIMATI', 1, ''),
(102, 'KALISALAK', 11, ''),
(103, 'KALISAPU', 14, ''),
(104, 'KALISOKA', 6, ''),
(105, 'KALIWUNGU', 2, ''),
(106, 'KAMBANGAN', 10, ''),
(107, 'KARANG ANYAR', 8, ''),
(108, 'KARANGANYAR', 5, ''),
(109, 'KARANGANYAR', 12, ''),
(110, 'KARANGDAWA', 11, ''),
(111, 'KARANGJAMBU', 2, ''),
(112, 'KARANGJATI', 17, ''),
(113, 'KARANGMALANG', 8, ''),
(114, 'KARANGMANGU', 17, ''),
(115, 'KARANGMULYA', 15, ''),
(116, 'KARANGMULYO', 3, ''),
(117, 'KARANGWULUH', 15, ''),
(118, 'KEBANDINGAN', 8, ''),
(119, 'KEDAWUNG', 3, ''),
(120, 'KEDOKANSAYANG', 17, ''),
(121, 'KEDUNGBANTENG', 8, ''),
(122, 'KEDUNGBUNGKUS', 17, ''),
(123, 'KEDUNGJATI', 18, ''),
(124, 'KEDUNGKELOR', 18, ''),
(125, 'KEDUNGSUGIH', 12, ''),
(126, 'KEDUNGSUKUN', 1, ''),
(127, 'KEMANGGUNGAN', 17, ''),
(128, 'KEMANTRAN', 9, ''),
(129, 'KEMUNING', 9, ''),
(130, 'KENDALSERUT', 13, ''),
(131, 'KENDAYAKAN', 18, ''),
(132, 'KEPUNDUHAN', 9, ''),
(133, 'KERTAHARJA', 12, ''),
(134, 'KERTASARI', 15, ''),
(135, 'KERTAYASA', 9, ''),
(136, 'KESADIKAN', 17, ''),
(137, 'KESAMIRAN', 17, ''),
(138, 'KESUBEN', 10, ''),
(139, 'KETANGGUNGAN', 5, ''),
(140, 'KRAMAT', 9, ''),
(141, 'KREMAN', 18, ''),
(142, 'KUDAILE', 14, ''),
(143, 'KUPU', 5, ''),
(144, 'LANGGEN', 16, ''),
(145, 'LEBAK GOAH', 10, ''),
(146, 'LEBAKSIU KIDUL', 10, ''),
(147, 'LEBAKSIU LOR', 10, ''),
(148, 'LEBETENG', 17, ''),
(149, 'LEMBASARI', 7, ''),
(150, 'LENGKONG', 3, ''),
(151, 'LUMINGSER', 1, ''),
(152, 'MANGUNSAREN', 17, ''),
(153, 'MARGA AYU', 11, ''),
(154, 'MARGAAYU', 11, ''),
(155, 'MARGAMULYA', 8, ''),
(156, 'MARGAPADANG', 17, ''),
(157, 'MARGASARI', 11, ''),
(158, 'MARIBAYA', 9, ''),
(159, 'MEJASEM BARAT', 9, ''),
(160, 'MEJASEM TIMUR', 9, ''),
(161, 'MINDAKA', 17, ''),
(162, 'MOKAHA', 7, ''),
(163, 'MULYOHARJO', 12, ''),
(164, 'MUNCANGLARANG', 4, ''),
(165, 'MUNJUNG AGUNG', 9, ''),
(166, 'PACUL', 16, ''),
(167, 'PADAHARJA', 9, ''),
(168, 'PADASARI', 7, ''),
(169, 'PAGEDANGAN', 1, ''),
(170, 'PAGERBARANG', 12, ''),
(171, 'PAGERKASIH', 4, ''),
(172, 'PAGERWANGI', 2, ''),
(173, 'PAGIYANTEN', 1, ''),
(174, 'PAGONGAN', 5, ''),
(175, 'PAKEMBARAN', 14, ''),
(176, 'PAKETIBAN', 13, ''),
(177, 'PAKULAUT', 11, ''),
(178, 'PAMIRITAN', 2, ''),
(179, 'PANGKAH', 13, ''),
(180, 'PECABEAN', 13, ''),
(181, 'PECANGAKAN', 1, ''),
(182, 'PEDAGANGAN', 6, ''),
(183, 'PEDESLOHOR', 1, ''),
(184, 'PEGIRIKAN', 16, ''),
(185, 'PEKAUMAN KULON', 5, ''),
(186, 'PENARUKAN', 1, ''),
(187, 'PENARUKAN', 1, ''),
(188, 'PENDAWA', 10, ''),
(189, 'PENER', 13, ''),
(190, 'PENUJAH', 8, ''),
(191, 'PENUSUPAN', 13, ''),
(192, 'PESAREAN', 1, ''),
(193, 'PESAREAN', 12, ''),
(194, 'PROCOT', 14, ''),
(195, 'PRUPUK SELATAN', 11, ''),
(196, 'PRUPUK UTARA', 11, ''),
(197, 'PUCANGLUWUK', 3, ''),
(198, 'PURBASANA', 17, ''),
(199, 'PURBAYASA', 13, ''),
(200, 'PURWAHAMBA', 15, ''),
(201, 'RAJEGWESI', 12, ''),
(202, 'RANCAWIRU', 13, ''),
(203, 'RANDUSARI', 12, ''),
(204, 'RANGIMULYA', 18, ''),
(205, 'REMBUL', 3, ''),
(206, 'SANGKANAYU', 3, ''),
(207, 'SANGKANJAYA', 2, ''),
(208, 'SELAPURA', 6, ''),
(209, 'SEMBOJA', 12, ''),
(210, 'SEMEDO', 8, ''),
(211, 'SESEPAN', 2, ''),
(212, 'SETU', 17, ''),
(213, 'SIDAKATON', 5, ''),
(214, 'SIDAMULYA', 18, ''),
(215, 'SIDAPURNA', 5, ''),
(216, 'SIDO MULYO', 12, ''),
(217, 'SIDOHARJO', 15, ''),
(218, 'SIDOMULYO', 18, ''),
(219, 'SIGEDONG', 4, ''),
(220, 'SIGENTONG', 18, ''),
(221, 'SINDANG', 6, ''),
(222, 'SITAIL', 7, ''),
(223, 'SLARANG KIDUL', 10, ''),
(224, 'SLARANG LOR', 6, ''),
(225, 'SLAWI KULON', 14, ''),
(226, 'SLAWI WETAN', 14, ''),
(227, 'SOKASARI', 4, ''),
(228, 'SOKATENGAH', 4, ''),
(229, 'SRENGSENG', 12, ''),
(230, 'SUKAREJA', 18, ''),
(231, 'SUMBAGA', 4, ''),
(232, 'SUMINGKIR', 8, ''),
(233, 'SUNIARSIH', 3, ''),
(234, 'SURADADI', 15, ''),
(235, 'SUROKIDUL', 12, ''),
(236, 'TALANG', 16, ''),
(237, 'TALOK', 13, ''),
(238, 'TAMANSARI', 7, ''),
(239, 'TARUB', 17, ''),
(240, 'TEGALANDONG', 10, ''),
(241, 'TEMBOK BANJARAN', 1, ''),
(242, 'TEMBOK KIDUL', 1, ''),
(243, 'TEMBOK LOR', 1, ''),
(244, 'TEMBOK LUWUNG', 1, ''),
(245, 'TEMBONGWAH', 2, ''),
(246, 'TIMBANGREJA', 10, ''),
(247, 'TONGGARA', 8, ''),
(248, 'TRAJU', 4, ''),
(249, 'TRAYEMAN', 14, ''),
(250, 'TUWEL', 3, ''),
(251, 'UJUNGRUSI', 1, ''),
(252, 'WANASARI', 11, ''),
(253, 'WANGANDAWA', 16, ''),
(254, 'WARUREJA', 18, ''),
(255, 'WOTGALIH', 7, ''),
(256, 'WRINGIN JENGGOT', 2, ''),
(257, 'YAMANSARI', 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `kecamatan_id` int(11) NOT NULL,
  `nama_kecamatan` varchar(20) NOT NULL,
  `total_penduduk` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`kecamatan_id`, `nama_kecamatan`, `total_penduduk`) VALUES
(1, 'ADIWERNA', '129751'),
(2, 'BALAPULANG', '92293'),
(3, 'BOJONG', '71500'),
(4, 'BUMIJAWA', '93896'),
(5, 'DUKUHTURI', '98042'),
(6, 'DUKUHWARU', '67442'),
(7, 'JATINEGARA', '59358'),
(8, 'KEDUNGBANTENG', '45208'),
(9, 'KRAMAT', '113914'),
(10, 'LEBAKSIU', '95055'),
(11, 'MARGASARI', '107485'),
(12, 'PAGERBARANG', '62590'),
(13, 'PANGKAH', '111908'),
(14, 'SLAWI', '77349'),
(15, 'SURADADI', '92063'),
(16, 'TALANG', '103030'),
(17, 'TARUB', '85872'),
(18, 'WARUREJA', '66331');

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
(1, 1, 1, 1, '1', '241', '5', '18', '28', '17', '1', '5.4', '8.4', '3.4', '18', 'tinggi', 2020),
(5, 2, 2, 2, '1', '241', '5', '18', '28', '17', '1', '5.4', '8.4', '3.4', '18', 'tinggi', 2020),
(6, 3, 3, 3, '1', '241', '5', '18', '28', '17', '1', '5.4', '8.4', '3.4', '18', 'tinggi', 2020),
(7, 4, 4, 4, '1', '241', '5', '18', '28', '17', '1', '5.4', '8.4', '3.4', '18', 'sedang', 2020),
(8, 5, 5, 5, '1', '241', '5', '18', '28', '17', '1', '5.4', '8.4', '3.4', '18', 'tinggi', 2020),
(9, 6, 6, 6, '1', '241', '4', '15', '28', '17', '0.8', '4.5', '8.4', '3.4', '17', 'sedang', 2020),
(10, 7, 7, 7, '1', '241', '2', '30', '31', '17', '0.4', '9', '9.3', '3.4', '22', 'tinggi', 2020),
(11, 8, 8, 8, '2', '3', '3', '22', '28', '17', '0.6', '6.6', '8.4', '3.4', '19', 'tinggi', 2020),
(12, 9, 9, 9, '2', '3', '7', '36', '39', '17', '1.4', '10.8', '11.7', '3.4', '27', '', 2020),
(13, 10, 10, 10, '3', '12', '2', '15', '28', '17', '0.4', '4.5', '8.4', '3.4', '17', '', 2020),
(14, 11, 11, 11, '1', '241', '3', '15', '28', '17', '0.6', '4.5', '8.4', '3.4', '17', '', 2020);

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
(1, '1', '1', '3', '1', '3', '1', '3', '1', '3', '1', 3, '1', '3', '1', '3', '0', '1', '1', '1', '1', '3', '1', '3', '1', '3', '1', ''),
(2, '2', '2', '4', '2', '4', '2', '3', '2', '4', '1', 3, '2', '4', '1', '4', '0', '1', '2', '4', '2', '4', '2', '4', '2', '4', '2', ''),
(3, '3', '2', '3', '2', '4', '2', '3', '2', '4', '1', 3, '2', '4', '1', '4', '9', '1', '2', '4', '2', '4', '2', '4', '2', '4', '2', ''),
(4, '4', '2', '4', '2', '4', '2', '3', '2', '4', '1', 3, '2', '4', '2', '4', '0', '1', '2', '4', '1', '3', '2', '4', '2', '4', '2', ''),
(5, '5', '1', '3', '1', '3', '1', '3', '1', '3', '1', 3, '1', '3', '1', '3', '0', '1', '1', '3', '1', '3', '1', '3', '1', '3', '1', ''),
(6, '6', '1', '3', '1', '3', '1', '3', '1', '3', '1', 3, '1', '3', '1', '3', '0', '1', '1', '3', '1', '3', '1', '3', '1', '3', '1', ''),
(7, '7', '2', '4', '2', '3', '1', '3', '1', '3', '1', 3, '1', '3', '1', '3', '0', '1', '1', '3', '1', '3', '1', '3', '1', '3', '1', ''),
(8, '8', '1', '3', '1', '3', '1', '3', '1', '3', '1', 3, '1', '3', '1', '3', '0', '1', '1', '3', '1', '3', '1', '3', '1', '3', '1', ''),
(9, '9', '2', '4', '2', '4', '2', '4', '2', '4', '1', 3, '2', '4', '2', '3', '0', '1', '1', '3', '1', '3', '1', '3', '1', '3', '1', ''),
(10, '10', '1', '3', '1', '3', '1', '3', '1', '3', '1', 3, '1', '3', '1', '3', '0', '1', '1', '3', '1', '3', '1', '3', '1', '3', '1', ''),
(11, '11', '1', '3', '1', '3', '1', '3', '1', '3', '1', 3, '1', '3', '1', '3', '0', '1', '1', '3', '1', '3', '1', '3', '1', '3', '1', '');

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
(1, '1', '1', '1', '70', '2', '1', '2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', ''),
(2, '2', '1', '1', '70', '4', '1', '2', '4', '2', '5', '3', '1', '1', '3', '1', '1', '1', ''),
(3, '3', '1', '1', '78', '2', '1', '2', '4', '2', '4', '1', '1', '2', '3', '1', '1', '1', ''),
(4, '4', '1', '1', '82', '4', '1', '2', '4', '2', '5', '2', '1', '2', '3', '1', '1', '1', ''),
(5, '5', '1', '1', '74', '2', '1', '2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', ''),
(6, '6', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', ''),
(7, '7', '1', '1', '60', '4', '1', '2', '4', '2', '5', '1', '1', '1', '3', '2', '1', '1', ''),
(8, '8', '2', '3', '45', '3', '3', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', ''),
(9, '9', '2', '2', '50', '2', '1', '2', '4', '2', '5', '2', '2', '1', '3', '3', '2', '3', ''),
(10, '10', '1', '1', '56', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', ''),
(11, '11', '1', '1', '78', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '');

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
  `jumlah_art` char(10) NOT NULL,
  `tahun_input` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penduduk_pengenalan_tempat`
--

INSERT INTO `tb_penduduk_pengenalan_tempat` (`id`, `kk`, `nik`, `kecamatan`, `kelurahan`, `alamat`, `nama_krt`, `jumlah_art`, `tahun_input`) VALUES
(1, '3328112202082761', '3328112605690002', '1', '241', 'DESA TEMBOK BANJARAN RT 010 RW 02', 'SUKARNO', '5', 2020),
(2, '0000000000000000', '3328116312740001', '1', '241', 'TEMBOK BANJARAN RT 04 RW 01', 'DESY SULUH', '4', 2020),
(3, '0000000000000000', '3328112507700003', '1', '241', 'DESA TEMBOK BANJARAN RT 010 RW 02', 'AKHMAD KHASANI', '4', 2020),
(4, '0000000000000000', '3328112702640003', '1', '241', 'TEMBOK BANJARAN RT 17 RW 03', 'SUWARTO', '11', 2020),
(5, '3332839499484882', '1234567890987654', '1', '241', 'DESA TEMBOK BANJARAN RT 012 RW 02', 'SUHARYATI', '5', 2020),
(6, '3332839499484882', '3328112605690002', '1', '241', 'DESA TEMBOK BANJARAN RT 010 RW 02', 'MASRITAH', '4', 2020),
(7, '0928388884444333', '3328112507700003', '1', '241', 'DESA TEMBOK BANJARAN RT 010 RW 02', 'TORIKHIN', '2', 2020),
(8, '0928388884444333', '1234567890987654', '2', '3', 'rt 30/4', 'KOMAR', '3', 2020),
(9, '3328112202082761', '1234567890987654', '2', '3', 'RT 12 RW 2', 'SUKARNO', '7', 2020),
(10, '3332839499484882', '1234567890987654', '3', '12', 'rt 30/4', 'RUYAH', '2', 2020),
(11, '3332839499484882', '3328112605690002', '1', '241', 'DESA TEMBOK BANJARAN RT 010 RW 02', 'RUYAH', '3', 2020);

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
(1, 'rendah', '30', '40'),
(2, 'sedang', '20', '30'),
(3, 'tinggi', '10', '20');

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
(2, 'sejahtera', '15', '0.15'),
(3, 'kurang sejahtera', '30', '0.30');

-- --------------------------------------------------------

--
-- Table structure for table `tb_variabel_kecamatan`
--

CREATE TABLE `tb_variabel_kecamatan` (
  `variabel_id` int(11) NOT NULL,
  `nama_variabel` varchar(50) NOT NULL,
  `jenis_io` enum('Input','Output','','') NOT NULL,
  `a` decimal(10,0) NOT NULL,
  `b` decimal(10,0) NOT NULL,
  `c` decimal(10,0) NOT NULL,
  `d` decimal(10,0) NOT NULL,
  `persen_var_a` char(5) NOT NULL,
  `persen_var_b` char(5) NOT NULL,
  `persen_var_c` char(5) NOT NULL,
  `persen_var_d` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_variabel_kecamatan`
--

INSERT INTO `tb_variabel_kecamatan` (`variabel_id`, `nama_variabel`, `jenis_io`, `a`, `b`, `c`, `d`, `persen_var_a`, `persen_var_b`, `persen_var_c`, `persen_var_d`) VALUES
(1, 'Kemiskinan', 'Input', '10', '20', '30', '0', '0.100', '0.200', '0.300', '0'),
(2, 'Ketelantaran', 'Input', '10', '20', '30', '30', '0.100', '0.200', '0.300', '0.300'),
(3, 'Kecacatan', 'Input', '0', '10', '20', '30', '0', '0.100', '0.200', '0.300'),
(4, 'kesejahteraan', 'Output', '10', '20', '30', '40', '0.100', '0.200', '0.300', '0.400');

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
-- Indexes for table `tb_tingkat_kesejahteraan`
--
ALTER TABLE `tb_tingkat_kesejahteraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_variabel_desa`
--
ALTER TABLE `tb_variabel_desa`
  ADD PRIMARY KEY (`variabel_id`);

--
-- Indexes for table `tb_variabel_kecamatan`
--
ALTER TABLE `tb_variabel_kecamatan`
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
  MODIFY `id_desa` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `tb_klasifikasi_penduduk`
--
ALTER TABLE `tb_klasifikasi_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_penduduk_kepemilikan_aset`
--
ALTER TABLE `tb_penduduk_kepemilikan_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_penduduk_keterangan_rumah`
--
ALTER TABLE `tb_penduduk_keterangan_rumah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_penduduk_pengenalan_tempat`
--
ALTER TABLE `tb_penduduk_pengenalan_tempat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_tingkat_kesejahteraan`
--
ALTER TABLE `tb_tingkat_kesejahteraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_variabel_desa`
--
ALTER TABLE `tb_variabel_desa`
  MODIFY `variabel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_variabel_kecamatan`
--
ALTER TABLE `tb_variabel_kecamatan`
  MODIFY `variabel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
