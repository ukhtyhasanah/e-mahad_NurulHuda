-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2021 at 04:57 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-ma_had`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `Id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_admin` varchar(255) DEFAULT NULL,
  `role_user` varchar(255) DEFAULT NULL,
  `id_user` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`Id`, `email`, `password`, `nama_admin`, `role_user`, `id_user`) VALUES
(2, 'admin@gmail.com', '$2y$10$AIxith3klXwMIMT/t3CpHOasClDF8l1JWV66U1zob78mXT4wksaJq', 'Riyan', '0', NULL),
(35, 'aisya@gmail.com', '$2y$10$9O5zF9q/ewboUeUJxvbI6eqVStllIFC3q2JurwodM1TR17oFsy3oy', '', '1', 24),
(36, 'adi@gmail.com', '$2y$10$ha5Dr9lp8BcaykKQuOxNzeIHO2WWhVKQVufSAif8oMIk3zFo6GuLi', '', '1', 25),
(37, 'diah@gmail.com', '$2y$10$hMLEKYGe07tL80O.X5LcZOdrf.b9rivvZTs9d.DoNyOA0X7ydew2y', '', '1', 26),
(38, 'sa@gmail.com', '$2y$10$dvZnD/Jfg50owM8yHD4ajuY1xiFCJ2WJOwvn40PpP1fylhMkXkVh6', '', '1', 27);

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `nis` int(11) NOT NULL,
  `nama_alumni` varchar(200) NOT NULL,
  `email_alumni` varchar(200) DEFAULT NULL,
  `tahun` varchar(200) DEFAULT NULL,
  `institut_perusahaan` varchar(200) DEFAULT NULL,
  `alamat_alumni` varchar(200) NOT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `no_hp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`nis`, `nama_alumni`, `email_alumni`, `tahun`, `institut_perusahaan`, `alamat_alumni`, `agama`, `no_hp`) VALUES
(12, 'Ukhty Hasanah', 'ukhty@gmail.com', '2017', 'UIN Malang', 'Manado, SULUT', 'Islam', '089128327865'),
(111, 'nama', 'email', '2016', 'UIN', 'manado', 'islam', '0812342312121');

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `id_message` int(11) NOT NULL,
  `user_message` varchar(100) DEFAULT NULL,
  `message_time` time DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`id_message`, `user_message`, `message_time`, `user_id`) VALUES
(259, 'Assalamualaikum\r\n', '19:28:59', 78),
(260, 'Selamat bergabung', '19:29:43', 79),
(261, 'hai', '10:11:30', 82),
(262, 'assalamualaikum', '10:13:12', 82),
(263, 'www', '10:49:30', 82),
(267, 'a', '15:34:53', 82),
(268, 'b\r\n', '15:36:26', 82),
(269, 'hai', '22:17:28', 82),
(270, 'assalamualaikum\r\n', '18:57:00', 83),
(271, 'hai apakabar', '19:02:52', 78),
(272, 'assalamualaikum\r\n', '19:50:57', 85),
(273, 'assalamuaikum', '20:00:48', 84),
(274, 'sjd', '16:09:55', 84),
(275, 'Assalamualaikum', '09:32:40', 84),
(276, 'p\r\n', '09:38:50', 84);

-- --------------------------------------------------------

--
-- Table structure for table `chat_user`
--

CREATE TABLE `chat_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `chat_rank` int(11) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_user`
--

INSERT INTO `chat_user` (`id_user`, `username`, `email`, `chat_rank`, `password`) VALUES
(78, 'admin', 'admin@mail.com', 2, 'admin'),
(79, 'user', 'user@mail.com', 1, 'ee11cbb19052e40b07aac0ca060c23ee'),
(82, 'salsa', 'salsabellaelizzah08@gmail.com', 1, 'e34cd298a2d3f385afeb06ae920aa545'),
(83, 'bella', 'bella@gmail.com', 1, '25d55ad283aa400af464c76d713c07ad'),
(84, 'indana', 'indana@gmail.com', 1, 'ad35393e0066a82476b2a1715f2c774d'),
(85, 'diahmami', 'diah@gmail.com', 1, '7540f34663fe950ad7581c1370145455');

-- --------------------------------------------------------

--
-- Table structure for table `cicilan_pendaftaran`
--

CREATE TABLE `cicilan_pendaftaran` (
  `Id` int(11) NOT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `id_detail_pendaftaran` int(11) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `tanggal_pembayaran` varchar(255) DEFAULT NULL,
  `status_cicilan` int(11) NOT NULL,
  `cicilan_ke` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cicilan_pendaftaran`
--

INSERT INTO `cicilan_pendaftaran` (`Id`, `bukti_pembayaran`, `id_detail_pendaftaran`, `nominal`, `tanggal_pembayaran`, `status_cicilan`, `cicilan_ke`) VALUES
(19, '03-09-26WhatsApp Image 2021-09-04 at 11.27.08.jpeg', 24, 895000, '2021-09-07', 1, 1),
(20, '04-11-432.png', 23, 895000, '2021-11-07', 1, 1),
(21, '04-11-412.png', 25, 895000, '2021-11-07', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pendaftaran`
--

CREATE TABLE `detail_pendaftaran` (
  `Id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `metode_pembayaran_pendaftaran` varchar(255) DEFAULT NULL COMMENT 'metode_pembayaran',
  `kelas` varchar(255) DEFAULT NULL,
  `usia` varchar(255) DEFAULT NULL,
  `status_pendaftaran` varchar(255) DEFAULT NULL,
  `status_kegiatan` int(11) NOT NULL DEFAULT 0,
  `biaya_kegiatan` int(11) DEFAULT 0,
  `tanggal_kegiatan` date DEFAULT NULL,
  `bukti_konfirmasi_pembayaran_kegiatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pendaftaran`
--

INSERT INTO `detail_pendaftaran` (`Id`, `id_user`, `id_admin`, `tanggal_daftar`, `metode_pembayaran_pendaftaran`, `kelas`, `usia`, `status_pendaftaran`, `status_kegiatan`, `biaya_kegiatan`, `tanggal_kegiatan`, `bukti_konfirmasi_pembayaran_kegiatan`) VALUES
(23, 24, 2, '2021-09-04', 'L', 'B', '12 tahun 8 bulan', '4', 0, 0, NULL, NULL),
(24, 25, 2, '2021-09-04', 'L', 'B', '12 tahun 8 bulan', '4', 1, 500000, '2021-11-07', '04-11-081.PNG'),
(25, 26, 2, '2021-09-04', 'L', 'B', '12 tahun 8 bulan', '4', 0, 500000, '2021-11-07', '04-11-022.png'),
(26, 27, 2, '2021-09-04', NULL, 'B', '12 tahun 8 bulan', '1', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ekskul`
--

CREATE TABLE `ekskul` (
  `id_ekskul` char(5) NOT NULL,
  `nama_ekskul` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ekskul`
--

INSERT INTO `ekskul` (`id_ekskul`, `nama_ekskul`) VALUES
('E001', 'Pramuka'),
('E002', 'Kaligrafi'),
('E003', 'Baca Kitab'),
('E004', 'Bahasa');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `tgl_upload` date NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `tgl_upload`, `nama`) VALUES
(12, '2021-07-01', 'img5.jpg'),
(13, '2021-07-01', 'img6.jpg'),
(14, '2021-07-01', 'img2.jpg'),
(15, '2021-07-01', 'img4.jpg'),
(16, '2021-07-01', 'img1.jpg'),
(17, '2021-07-01', 'img7.jpg'),
(18, '2021-07-01', 'img3.jpg'),
(19, '2021-07-01', '2.jpeg'),
(20, '2021-07-01', '1.jpeg'),
(21, '2021-07-09', 'kelurga.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `NIP` int(11) NOT NULL,
  `nama_guru` varchar(100) DEFAULT NULL,
  `password` varchar(11) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `kode_mapel_kegiatan` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`NIP`, `nama_guru`, `password`, `alamat`, `telp`, `kode_mapel_kegiatan`) VALUES
(2, 'Diyah Tri Subiyanto, S.Pd.', 'a', '-', '-', ''),
(3, 'Munawaroh, S.S.', 'b', '-', '-', ''),
(4, 'Ita Nuraini, S.Pd.', 'c', '-', '-', ''),
(5, 'Mahmud Syahroni, S.Pd.', 'd', '-', '-', ''),
(6, 'M. Abdul Basit Al Arzak, S.Pd.', 'e', '-', '-', ''),
(7, 'Fikri Muhammad Ahsanul Fikri Ardianto, S.Pd.', 'f', '-', '-', ''),
(2147483647, 'Dyah Muntiyas, S.Pd.', '', '-', '-', '');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `Id` int(11) NOT NULL,
  `nama_hari` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`Id`, `nama_hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'PR');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_hari` int(11) DEFAULT NULL,
  `id_mapel` varchar(255) DEFAULT NULL,
  `kelas` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_hari`, `id_mapel`, `kelas`) VALUES
(1, 1, 'P0002', 'A'),
(2, 1, 'P0003', 'A'),
(3, 1, 'P0004', 'A'),
(4, 1, 'P0005', 'A'),
(5, 1, 'P0006', 'A'),
(6, 1, 'P0017', 'A'),
(7, 1, 'P0008', 'A'),
(8, 1, 'P0002', 'B'),
(9, 1, 'P0003', 'B'),
(10, 1, 'P0004', 'B'),
(11, 1, 'P0005', 'B'),
(12, 1, 'P0006', 'B'),
(13, 1, 'P0017', 'B'),
(15, 2, 'P0009', 'B'),
(16, 2, 'P0005', 'B'),
(17, 2, 'P0010', 'B'),
(18, 2, 'P0011', 'B'),
(19, 2, 'P0006', 'B'),
(20, 2, 'P0017', 'B'),
(22, 1, 'P0008', 'B'),
(23, 2, 'P0008', 'B'),
(24, 3, 'P0012', 'B'),
(25, 3, 'P0013', 'B'),
(26, 3, 'P0014', 'B'),
(27, 3, 'P0015', 'B'),
(28, 3, 'P0006', 'B'),
(29, 3, 'P0017', 'B'),
(31, 3, 'P0008', 'B'),
(32, 4, 'P0003', 'B'),
(33, 4, 'P0005', 'B'),
(34, 4, 'P0011', 'B'),
(35, 4, 'P0004', 'B'),
(36, 4, 'P0006', 'B'),
(37, 4, 'P0017', 'B'),
(39, 4, 'P0008', 'B'),
(40, 5, 'P0009', 'B'),
(41, 5, 'P0010', 'B'),
(43, 5, 'P0006', 'B'),
(45, 5, 'P0008', 'B'),
(47, 6, 'P0004', 'B'),
(49, 6, 'P0011', 'B'),
(51, 6, 'P0010', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `alpa` int(11) NOT NULL,
  `izin` int(11) NOT NULL,
  `sakit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`id`, `id_siswa`, `alpa`, `izin`, `sakit`) VALUES
(6, 2, 3, 3, 3),
(8, 1, 3, 3, 3),
(9, 1, 1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `kode_mapel_kegiatan` char(5) NOT NULL DEFAULT '',
  `nama_mapel_kegiatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`kode_mapel_kegiatan`, `nama_mapel_kegiatan`) VALUES
('P0001', 'Matematika'),
('P0002', 'Upacara'),
('P0003', 'Membaca'),
('P0004', 'Bahasa'),
('P0005', 'Seni'),
('P0006', 'Istirahat'),
('P0008', 'Pulang'),
('P0009', 'Iqro'),
('P0010', 'Hijaiyah'),
('P0011', 'Angka'),
('P0012', 'Olah Raga'),
('P0013', 'Bhs Inggris'),
('P0014', 'Melukis'),
('P0015', 'Menari'),
('P0017', 'Evaluasi'),
('P0018', 'Acara');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `id_mapel` char(5) CHARACTER SET latin1 NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `kkm` int(11) DEFAULT NULL,
  `tugas1` int(11) DEFAULT NULL,
  `tugas2` int(11) DEFAULT NULL,
  `tugas3` int(11) DEFAULT NULL,
  `tugas4` int(11) DEFAULT NULL,
  `tugas5` int(11) DEFAULT NULL,
  `uts` int(11) DEFAULT NULL,
  `uas` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `predikat` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `id_mapel`, `id_guru`, `id_siswa`, `semester`, `kkm`, `tugas1`, `tugas2`, `tugas3`, `tugas4`, `tugas5`, `uts`, `uas`, `nilai`, `predikat`, `deskripsi`) VALUES
(11, 'P0003', 2, 2, 'Semester 1', 70, 70, 70, 70, 70, 70, 70, 78, 73, 'C', 'Cukup'),
(18, 'P0009', 2, 1, 'Semester 1', 70, 70, 70, 70, 70, 70, 80, 80, 77, 'B', 'Baik'),
(20, 'P0001', 2, 3, 'Semester 1', 70, 90, 90, 90, 90, 90, 90, 0, 54, 'D', 'Kurang');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_ekskul`
--

CREATE TABLE `nilai_ekskul` (
  `id` int(11) NOT NULL,
  `id_ekskul` char(5) NOT NULL,
  `nis` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `predikat` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_ekskul`
--

INSERT INTO `nilai_ekskul` (`id`, `id_ekskul`, `nis`, `nilai`, `predikat`, `deskripsi`) VALUES
(1, 'E002', 2, 100, 'A', 'Baik Sekali'),
(4, 'E002', 1, 80, 'D', 'Kurang'),
(5, 'E001', 2, 100, 'A', 'Baik Sekali'),
(9, 'E003', 1, 100, 'A', 'Baik Sekali');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_spp`
--

CREATE TABLE `pembayaran_spp` (
  `Id` int(11) NOT NULL,
  `tanggal_pembayaran_spp` date DEFAULT NULL,
  `cicilan_ke` int(11) NOT NULL,
  `status_spp` int(11) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran_spp`
--

INSERT INTO `pembayaran_spp` (`Id`, `tanggal_pembayaran_spp`, `cicilan_ke`, `status_spp`, `user_id`) VALUES
(19, '2017-12-21', 1, 1, '8'),
(20, '2017-12-21', 1, 1, '8'),
(21, '2017-12-24', 3, 1, '8'),
(22, '2017-12-24', 4, 1, '8'),
(23, '2017-12-24', 5, 1, '8'),
(24, '2017-12-24', 6, 1, '8'),
(25, '2017-12-27', 1, 1, '9'),
(26, '2017-12-27', 2, 1, '9'),
(27, '2017-12-27', 3, 1, '9'),
(28, '2017-12-27', 4, 1, '9'),
(29, '2017-12-27', 5, 1, '9'),
(30, '2017-12-27', 6, 1, '9'),
(31, '2017-12-27', 1, 1, '9'),
(32, '2017-12-29', 1, 1, '10'),
(33, '2021-04-27', 1, 1, '11'),
(34, '2021-04-27', 1, 1, '11'),
(35, '2021-07-05', 1, 1, '12'),
(36, '2021-09-07', 1, 1, '25'),
(37, '2021-11-07', 2, 1, '25'),
(38, '2021-11-07', 1, 1, '24'),
(39, '2021-11-07', 1, 1, '26'),
(40, '2021-11-07', 2, 0, '26'),
(41, '2021-11-07', 3, 0, '26');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `Id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nama_panggilan` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `jumlah_saudara` int(11) DEFAULT NULL,
  `di_jakarta_ikut` varchar(100) DEFAULT NULL,
  `nama_ayah` varchar(255) DEFAULT NULL,
  `tempat_lahir_ayah` varchar(255) DEFAULT NULL,
  `tanggal_lahir_ayah` date DEFAULT NULL,
  `pendidikan_terakhir_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) DEFAULT NULL,
  `agama_ayah` varchar(255) DEFAULT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `tempat_lahir_ibu` varchar(255) DEFAULT NULL,
  `tanggal_lahir_ibu` date DEFAULT NULL,
  `pendidikan_terakhir_ibu` varchar(255) DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) DEFAULT NULL,
  `agama_ibu` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `upload_akte` varchar(255) DEFAULT NULL,
  `upload_kartu_keluarga` varchar(255) DEFAULT NULL,
  `foto_anak` varchar(255) DEFAULT NULL,
  `foto_keluarga` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`Id`, `nama`, `nama_panggilan`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `anak_ke`, `jumlah_saudara`, `di_jakarta_ikut`, `nama_ayah`, `tempat_lahir_ayah`, `tanggal_lahir_ayah`, `pendidikan_terakhir_ayah`, `pekerjaan_ayah`, `agama_ayah`, `nama_ibu`, `tempat_lahir_ibu`, `tanggal_lahir_ibu`, `pendidikan_terakhir_ibu`, `pekerjaan_ibu`, `agama_ibu`, `telp`, `upload_akte`, `upload_kartu_keluarga`, `foto_anak`, `foto_keluarga`) VALUES
(24, 'aisya', 'ais', 'manado', '2009-01-01', 'P', 3, 3, '', 'aa', 'aa', '1980-01-01', 'aa', 'aa', 'aa', 'aa', 'aa', '1980-01-01', 'aa', 'aa', 'aa', '432', '09-09-49WhatsApp Image 2021-09-04 at 11.27.08.jpeg', '09-09-49WhatsApp Image 2021-09-04 at 11.27.08.jpeg', '09-09-27WhatsApp Image 2021-09-04 at 11.27.08.jpeg', '09-09-27WhatsApp Image 2021-09-04 at 11.27.08.jpeg'),
(25, 'adi Ganteng', 'adi', 'bb', '2009-01-01', 'L', 2, 2, '', 'bb', 'bb', '1980-01-01', 'bb', 'bb', 'bb', 'bb', 'bb', '1980-01-01', 'bb', 'bb', 'bb', '32332', '09-09-27ukhty.jpeg', '09-09-27ukhty.jpeg', '09-09-34WhatsApp Image 2021-09-04 at 11.27.08.jpeg', '09-09-34WhatsApp Image 2021-09-04 at 11.27.08.jpeg'),
(26, 'diah', 'diah', 'jombang', '2009-01-01', 'P', 1, 1, '', 'ss', 'ss', '1980-01-01', 'ss', 'ss', 'ss', 'ss', 'ss', '1980-01-01', 'ss', 'ss', 'ss', '33', '10-09-38WhatsApp Image 2021-09-04 at 11.27.08.jpeg', '10-09-38WhatsApp Image 2021-09-04 at 11.27.08.jpeg', '10-09-31WhatsApp Image 2021-09-04 at 11.27.08.jpeg', '10-09-31ukhty.jpeg'),
(27, 'sa', 'sa', 'sa', '2009-01-01', 'L', 1, 2, '', 'sa', 'sa', '1980-01-01', 'sa', 'sa', 'sa', 'sa', 'sa', '1980-01-01', 'sa', 'sa', 'sa', '32', '10-09-09ukhty.jpeg', '10-09-09ukhty.jpeg', '10-09-33ukhty.jpeg', '10-09-33ukhty.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(11) NOT NULL,
  `id_detail_pendaftaran` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `id_detail_pendaftaran`, `nama`, `kelas`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`) VALUES
(1, 24, 'aisya', '12', 'manado', '2009-01-01', 'P'),
(2, 25, 'adi Ganteng', '12', 'Probolinggo Barat', '2009-01-01', 'L'),
(3, 26, 'diah', '12', 'jombang', '2009-01-01', 'P');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `chat_user`
--
ALTER TABLE `chat_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `cicilan_pendaftaran`
--
ALTER TABLE `cicilan_pendaftaran`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `id_detail_pendaftaran` (`id_detail_pendaftaran`);

--
-- Indexes for table `detail_pendaftaran`
--
ALTER TABLE `detail_pendaftaran`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `ekskul`
--
ALTER TABLE `ekskul`
  ADD PRIMARY KEY (`id_ekskul`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`NIP`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_hari` (`id_hari`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kode_mapel_kegiatan`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `nilai_ekskul`
--
ALTER TABLE `nilai_ekskul`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ekskul` (`id_ekskul`),
  ADD KEY `id_siswa` (`nis`);

--
-- Indexes for table `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD UNIQUE KEY `id_detail_pendaftaran` (`id_detail_pendaftaran`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT for table `chat_user`
--
ALTER TABLE `chat_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `cicilan_pendaftaran`
--
ALTER TABLE `cicilan_pendaftaran`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `detail_pendaftaran`
--
ALTER TABLE `detail_pendaftaran`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `NIP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483649;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `nilai_ekskul`
--
ALTER TABLE `nilai_ekskul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `nis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pendaftaran` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD CONSTRAINT `chat_message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `chat_user` (`id_user`);

--
-- Constraints for table `cicilan_pendaftaran`
--
ALTER TABLE `cicilan_pendaftaran`
  ADD CONSTRAINT `cicilan_pendaftaran_ibfk_1` FOREIGN KEY (`id_detail_pendaftaran`) REFERENCES `detail_pendaftaran` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_pendaftaran`
--
ALTER TABLE `detail_pendaftaran`
  ADD CONSTRAINT `detail_pendaftaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pendaftaran` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pendaftaran_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `akun` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`kode_mapel_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_hari`) REFERENCES `hari` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `kehadiran_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`NIS`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`NIS`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`NIP`),
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`kode_mapel_kegiatan`);

--
-- Constraints for table `nilai_ekskul`
--
ALTER TABLE `nilai_ekskul`
  ADD CONSTRAINT `nilai_ekskul_ibfk_1` FOREIGN KEY (`id_ekskul`) REFERENCES `ekskul` (`id_ekskul`),
  ADD CONSTRAINT `nilai_ekskul_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `siswa` (`NIS`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_detail_pendaftaran`) REFERENCES `pendaftaran` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
