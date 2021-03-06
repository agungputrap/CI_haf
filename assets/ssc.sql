-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2015 at 03:41 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ssc`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi_guru`
--

CREATE TABLE IF NOT EXISTS `absensi_guru` (
`Id_Absen` int(11) NOT NULL,
  `Kode_Jadwal` int(3) NOT NULL,
  `Staff_yang_mengabsen` int(8) NOT NULL,
  `Status_Mengajar` varchar(24) NOT NULL DEFAULT 'Mengajar',
  `Kode_Guru_Pengganti` char(2) DEFAULT NULL,
  `Tanggal` date NOT NULL,
  `Waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `absensi_siswa`
--

CREATE TABLE IF NOT EXISTS `absensi_siswa` (
`Id_Absen` int(8) NOT NULL,
  `Nama_Siswa` varchar(30) NOT NULL,
  `Kode_Jadwal` int(3) NOT NULL,
  `Staff_yang_mengabsen` varchar(30) NOT NULL,
  `Tanggal` date NOT NULL,
  `Waktu` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi_siswa`
--

INSERT INTO `absensi_siswa` (`Id_Absen`, `Nama_Siswa`, `Kode_Jadwal`, `Staff_yang_mengabsen`, `Tanggal`, `Waktu`) VALUES
(6, 'Vierra Citra', 4, 'Saeful Bahri', '2015-02-04', '19:51:46'),
(7, 'Waliyyin Razan Qanit', 3, 'Saeful Bahri', '2015-02-04', '19:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `absensi_staff`
--

CREATE TABLE IF NOT EXISTS `absensi_staff` (
`Id_Absen` int(8) NOT NULL,
  `Kode_Tugas` int(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `Tanggal` date NOT NULL,
  `Waktu` time NOT NULL,
  `Status` varchar(12) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi_staff`
--

INSERT INTO `absensi_staff` (`Id_Absen`, `Kode_Tugas`, `username`, `Tanggal`, `Waktu`, `Status`) VALUES
(12, 3, 'Dadang Reza', '2015-01-31', '22:40:21', 'Terlambat'),
(14, 2, 'Saeful Bahri', '2015-02-02', '12:26:05', 'Berhasil');

-- --------------------------------------------------------

--
-- Table structure for table `absensi_staff_baru`
--

CREATE TABLE IF NOT EXISTS `absensi_staff_baru` (
`Id_Absen` int(11) NOT NULL,
  `Kode_Tugas` int(11) NOT NULL,
  `Nama` varchar(32) NOT NULL,
  `Tanggal` date NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Status2` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `biaya_ssc`
--

CREATE TABLE IF NOT EXISTS `biaya_ssc` (
`Id_Biaya` int(2) NOT NULL,
  `Nama_Program` varchar(12) NOT NULL,
  `Biaya_per_Tahun` int(8) NOT NULL,
  `Biaya_per_Semester` int(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya_ssc`
--

INSERT INTO `biaya_ssc` (`Id_Biaya`, `Nama_Program`, `Biaya_per_Tahun`, `Biaya_per_Semester`) VALUES
(1, 'SMA - XII', 8000000, 4500000),
(2, 'SMA - XI', 7000000, 4000000),
(3, 'SMA - X', 4000000, 7500000),
(4, 'SMP - IX', 3500000, 6500000),
(5, 'SMP - VIII', 3500000, 6000000),
(6, 'SMP - VII', 3000000, 6000000);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `Id_User` int(8) NOT NULL DEFAULT '0',
  `Kode_Guru` char(2) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Jenis_Kelamin` varchar(12) NOT NULL,
  `Mata_Pelajaran` varchar(12) NOT NULL,
  `Program` varchar(12) NOT NULL,
  `Status_Guru` varchar(12) NOT NULL,
  `Gaji_per_Shift` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`Id_User`, `Kode_Guru`, `Nama`, `Jenis_Kelamin`, `Mata_Pelajaran`, `Program`, `Status_Guru`, `Gaji_per_Shift`) VALUES
(8, 'DA', 'Dudung A. S.', 'Laki - Laki', 'Fisika', 'SMA', 'Tetap', 80000),
(9, 'AS', 'Asep Rustiawan', 'Laki - Laki', 'Matematika', 'SMA', 'Tetap', 80000),
(49, 'CR', 'Citra Resmi', 'Perempuan', 'Indonesia', 'SMP', 'Aktif', 60000),
(50, 'YS', 'Yudi Setiawan', 'Laki - Laki', 'Kimia', 'SMA', 'Aktif', 80000),
(51, 'AD', 'Anita D. P.', 'Perempuan', 'Inggris', 'SMP/SMA', 'Aktif', 60000),
(52, 'FY', 'Fityan', 'Laki - Laki', 'Biologi', 'SMP/SMA', 'Aktif', 75000),
(53, 'AL', 'Ari Lestari', 'Perempuan', 'Fisika', 'SMP', 'Aktif', 60000),
(54, 'SY', 'Syamsudin', 'Laki - Laki', 'Kimia', 'SMP/SMA', 'Aktif', 80000),
(55, 'MS', 'Makmur Sunarya', 'Laki - Laki', 'IPS', 'SMP', 'Aktif', 50000),
(56, 'AT', 'Atid ', 'Perempuan', 'Biologi', 'SMA', 'Aktif', 75000);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
`Id_Jadwal` int(3) NOT NULL,
  `Kode_Kelas` int(5) NOT NULL,
  `Kode_Shift` char(4) NOT NULL,
  `Kode_Guru` char(2) NOT NULL,
  `Hari` varchar(16) NOT NULL,
  `Tanggal_Mulai` date NOT NULL,
  `Ruangan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`Id_Jadwal`, `Kode_Kelas`, `Kode_Shift`, `Kode_Guru`, `Hari`, `Tanggal_Mulai`, `Ruangan`) VALUES
(1, 801, 'B01', 'AS', 'Monday', '2015-01-05', 6),
(2, 802, 'B01', 'DA', 'Monday', '2015-01-05', 6),
(3, 801, 'B02', 'DA', 'Wednesday', '2015-01-05', 7),
(4, 802, 'B02', 'AS', 'Wednesday', '2015-01-05', 7);

-- --------------------------------------------------------

--
-- Table structure for table `kas_ssc`
--

CREATE TABLE IF NOT EXISTS `kas_ssc` (
`Id_Kas` int(10) NOT NULL,
  `Jenis_Transaksi` varchar(16) NOT NULL,
  `Nominal_Transaksi` int(12) NOT NULL,
  `Kas_Awal` int(12) NOT NULL,
  `Kas_Akhir` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `Kode` int(5) NOT NULL,
  `Program` int(2) NOT NULL,
  `Deksripsi` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`Kode`, `Program`, `Deksripsi`) VALUES
(801, 1, 'SMA 1 Garut'),
(802, 2, 'Campuran');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
`Kode_Pembayaran` int(8) NOT NULL,
  `Tipe_Transaksi` varchar(16) NOT NULL,
  `Atas_Nama` varchar(30) NOT NULL,
  `Staff_yang_menerima` varchar(30) NOT NULL,
  `Nominal` int(8) NOT NULL,
  `Tanggal` date NOT NULL,
  `Waktu` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`Kode_Pembayaran`, `Tipe_Transaksi`, `Atas_Nama`, `Staff_yang_menerima`, `Nominal`, `Tanggal`, `Waktu`) VALUES
(9, 'Pendaftaran', 'Rafif', 'Saeful Bahri', 7000000, '2015-02-06', '14:02:01'),
(10, 'Pendaftaran', 'Rafif', 'Dadang Reza', 1000000, '2015-02-06', '17:14:55'),
(11, 'Pendaftaran', 'Rusev', 'Saeful Bahri', 4000000, '2015-02-26', '23:45:28'),
(12, 'Pendaftaran', 'asdasdasd', 'Saeful Bahri', 3000000, '2015-02-28', '21:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `shift_ssc`
--

CREATE TABLE IF NOT EXISTS `shift_ssc` (
  `Kode_Shift` char(4) NOT NULL,
  `Waktu_Mulai` time NOT NULL,
  `Waktu_Berakhir` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift_ssc`
--

INSERT INTO `shift_ssc` (`Kode_Shift`, `Waktu_Mulai`, `Waktu_Berakhir`) VALUES
('', '00:00:00', '00:00:00'),
('B01', '14:30:00', '15:45:00'),
('B02', '19:30:00', '20:30:00'),
('S01', '09:00:00', '12:00:00'),
('S02', '11:00:00', '17:30:00'),
('S03', '13:00:00', '17:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `Id_User` int(8) NOT NULL DEFAULT '0',
  `No_SSC` int(10) NOT NULL DEFAULT '0',
  `Nama` varchar(30) NOT NULL,
  `Jenis_Kelamin` varchar(12) NOT NULL,
  `Program` int(2) NOT NULL,
  `Asal_Sekolah` varchar(32) NOT NULL,
  `Kode_Kelas` int(5) NOT NULL DEFAULT '0',
  `Status_Pembayaran` varchar(16) NOT NULL,
  `Sisa_Pembayaran` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`Id_User`, `No_SSC`, `Nama`, `Jenis_Kelamin`, `Program`, `Asal_Sekolah`, `Kode_Kelas`, `Status_Pembayaran`, `Sisa_Pembayaran`) VALUES
(2, 80000001, 'Waliyyin Razan Qanit', 'Laki - Laki', 1, 'SMA 1 Garut', 801, 'Lunas', 0),
(3, 80000002, 'Budi Anduk', 'Laki - Laki', 1, 'SMA 1 Garut', 801, 'Lunas', 0),
(4, 80000003, 'Vierra Citra', 'Perempuan', 2, 'SMA 1 Garut', 802, 'Lunas', 0),
(5, 80000004, 'Dinda Putri Mutiara', 'Perempuan', 2, 'SMA 11 Garut', 802, 'Lunas', 0),
(28, 0, 'Rafif', 'Laki Laki', 1, 'SMA 6 Garut', 0, 'Lunas', 0),
(57, 0, 'Rusev', 'Laki Laki', 2, 'Russia 1', 0, 'Belum Lunas', 3000000),
(60, 0, 'asdasdasd', 'Laki Laki', 2, 'SMA Odong', 0, 'Belum Lunas', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `Id_User` int(8) NOT NULL DEFAULT '0',
  `Id_Staff` int(8) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Jenis_Kelamin` varchar(12) NOT NULL,
  `Bagian` varchar(12) NOT NULL,
  `Gaji_per_Bulan` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Id_User`, `Id_Staff`, `Nama`, `Jenis_Kelamin`, `Bagian`, `Gaji_per_Bulan`) VALUES
(6, 11000001, 'Saeful Bahri', 'Laki - Laki', 'Keuangan', 1000000),
(7, 11000002, 'Dadang Reza', 'Perempuan', 'Kesiswaan', 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `tugas_staff`
--

CREATE TABLE IF NOT EXISTS `tugas_staff` (
`Id_Tugas` int(2) NOT NULL,
  `Kode_Staff` int(8) NOT NULL,
  `Kode_Shift` char(4) NOT NULL,
  `Hari` varchar(12) NOT NULL,
  `Tanggal_Mulai` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas_staff`
--

INSERT INTO `tugas_staff` (`Id_Tugas`, `Kode_Staff`, `Kode_Shift`, `Hari`, `Tanggal_Mulai`) VALUES
(5, 11000002, 'S02', 'Monday', '2015-08-10'),
(13, 11000002, 'S01', 'Tuesday', '2015-08-13'),
(14, 11000002, 'S03', 'Tuesday', '2015-08-13'),
(15, 11000002, 'S02', 'Wednesday', '2015-08-13'),
(16, 11000002, 'S01', 'Thursday', '2015-08-13'),
(17, 11000002, 'S03', 'Thursday', '2015-08-13'),
(18, 11000002, 'S02', 'Friday', '2015-08-13'),
(19, 11000002, 'S01', 'Saturday', '2015-08-13'),
(20, 11000002, 'S03', 'Saturday', '2015-08-13'),
(43, 11000001, 'S01', 'Monday', '2015-08-14'),
(44, 11000001, 'S03', 'Monday', '2015-08-14'),
(45, 11000001, 'S01', 'Tuesday', '2015-08-14'),
(46, 11000001, 'S03', 'Tuesday', '2015-08-14'),
(47, 11000001, 'S01', 'Wednesday', '2015-08-14'),
(48, 11000001, 'S03', 'Wednesday', '2015-08-14'),
(49, 11000001, 'S02', 'Thursday', '2015-08-14'),
(50, 11000001, 'S02', 'Friday', '2015-08-14'),
(51, 11000001, 'S02', 'Saturday', '2015-08-14'),
(52, 11000001, 'S02', 'Sunday', '2015-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_staff_baru`
--

CREATE TABLE IF NOT EXISTS `tugas_staff_baru` (
`Id_Tugas` int(8) NOT NULL,
  `User_Staff` varchar(16) NOT NULL,
  `Hari` varchar(12) NOT NULL,
  `Tanggal_Mulai` date NOT NULL,
  `Jam_Masuk` time NOT NULL,
  `Jam_Keluar` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas_staff_baru`
--

INSERT INTO `tugas_staff_baru` (`Id_Tugas`, `User_Staff`, `Hari`, `Tanggal_Mulai`, `Jam_Masuk`, `Jam_Keluar`) VALUES
(1, 'Dadang', 'Saturday', '2015-07-25', '18:00:00', '20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`Id` int(8) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Alamat` varchar(120) NOT NULL,
  `No_Telp` varchar(16) NOT NULL,
  `Role` varchar(8) NOT NULL DEFAULT 'Siswa',
  `Status_Akun` varchar(12) NOT NULL DEFAULT 'Aktif',
  `Durasi_Akun` varchar(16) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Username`, `Password`, `Alamat`, `No_Telp`, `Role`, `Status_Akun`, `Durasi_Akun`) VALUES
(1, 'Admin', 'Admin', 'Depok', '087877319065', 'Admin', 'Aktif', '1 Tahun'),
(2, 'qanit03', 'waliyyin', 'JLn Babakan Selaawi, KAV GMI B 21', '02622247030', 'Siswa', 'Aktif', '1 Tahun'),
(3, 'Budi', 'budianduk', 'Perum Cimanganten', '089988776511', 'Siswa', 'Aktif', '1 Tahun'),
(4, 'Vierra', 'vierra', 'Perum Pertamina, Jalan Terusan Pembangunan', '0262223765', 'Siswa', 'Aktif', '1 Tahun'),
(5, 'Dinda', 'Dinda', 'Sukaregang, Garut', '02622245678', 'Siswa', 'Aktif', '1 Tahun'),
(6, 'Epung', 'epung', 'Jalan leuwidaun, tarogong kidul', '0262233386', 'Staff', 'Aktif', '1 Tahun'),
(7, 'Dadang', 'dada', 'Sukaregang', '08123232323', 'Staff', 'Aktif', '1 Tahun'),
(8, 'Dudung', 'dudung', 'Jalan Gordah, Perum Gordah', '081311878424', 'Guru', 'Aktif', '1 Tahun'),
(9, 'Asep', 'asep', 'Jalan Babakan Selaawi, Perum GMI KAV B 21', '02622247030', 'Guru', 'Aktif', '1 Tahun'),
(28, 'rafif', 'rafif', 'garut', '0811567323', 'Siswa', 'Aktif', '1 Tahun'),
(29, 'mudzani.akbar', 'mudzani', 'Jalan Babakan Selaawi ', '0899567321', 'Siswa', 'Aktif', '1 Tahun'),
(30, 'syifa.aghnia', 'syifnia', 'Karangpawitan, Garut', '08565112345', 'Siswa', 'Aktif', '1 Tahun'),
(31, 'sekar.arumsari', 'sekar', 'Jalan Ciledug, Garut', '0812344567', 'Siswa', 'Aktif', '1 Tahun'),
(32, 'hafiyyan.sayyid', 'h4f1yy4n', 'Cimanuk, 388', '087877319000', 'Siswa', 'Aktif', '1 Tahun'),
(33, 'stevany.jess', 'stevany', 'Kav GMI B20', '08121487654', 'Siswa', 'Aktif', '1 Tahun'),
(34, 'faisal.ramdhani', 'faisal', 'Jalan Otista', '0883219987', 'Siswa', 'Aktif', '1 Tahun'),
(35, 'reni.purnamasari', 'renzkirei', 'Jalan Ciledug', '085759683119', 'Siswa', 'Aktif', '1 Tahun'),
(36, 'm.khoir', 'coir', 'Cikajang, Garut', '088567123', 'Siswa', 'Aktif', '1 Tahun'),
(37, 'ratih.rizki', 'rharha', 'Leles, Garut', '081233456', 'Siswa', 'Aktif', '1 Tahun'),
(38, 'muhammad.dhabith', 'dhabith', 'Kav GMI A31', '02622247773', 'Siswa', 'Aktif', '1 Tahun'),
(39, 'gheni.indriyani', 'gheni', 'Jalan Ciwalen, Garut', '08778123456', 'Siswa', 'Aktif', '1 Tahun'),
(40, 'chika.celaka', 'chika', 'karangpawitan', '081988765', 'Siswa', 'Aktif', '1 Tahun'),
(41, 'muhammad.bintang', 'bintang', 'Cempaka, Garut', '02622334568', 'Siswa', 'Aktif', '1 Tahun'),
(42, 'arri.kurniawan', 'arrior', 'Jalan Suherman, Garut', '0857123000', 'Siswa', 'Aktif', '1 Tahun'),
(43, 'yiska.intan', 'yiska', 'Jalan proklamasi, Garut', '08779110067', 'Siswa', 'Aktif', '1 Tahun'),
(44, 'bobby.setiawan', 'bobby', 'Jalan leuwidaun, Garut', '0899912346', 'Siswa', 'Aktif', '1 Tahun'),
(45, 'jaka.nurhadi', 'jakarut', 'Jalan garut kota, Garut', '08834423167', 'Siswa', 'Aktif', '1 Tahun'),
(46, 'dewi.sulistya', 'dewisulis', 'Jalan cimanganten, Garut', '08993245673', 'Siswa', 'Aktif', '1 Tahun'),
(47, 'chaerani.antasari', 'chaera', 'jalan papandayan, garut', '0819993210', 'Siswa', 'Aktif', '1 Tahun'),
(48, 'muhammad,khalid', 'khalid', 'Perum cimanganten', '0262312456', 'Siswa', 'Aktif', '1 Tahun'),
(49, 'citra.resmi', 'citra', 'Jalan pramuka, Garut', '0821345678', 'Guru', 'Aktif', '1 Tahun'),
(50, 'yudi.setiawan', 'yudistira', 'jalan karangpawitan', '08143332122', 'Guru', 'Aktif', '1 Tahun'),
(51, 'anita.depe', 'anide', 'Jalan otista, Garut', '0870998765', 'Guru', 'Aktif', '1 Tahun'),
(52, 'fityan.suryani', 'fityan', 'Jalan pakenjeng, Garut', '0821343767', 'Guru', 'Aktif', '1 Tahun'),
(53, 'ari.lestari', 'ariles', 'rancabango, garut', '0262758433', 'Guru', 'Aktif', '1 Tahun'),
(54, 'syamsudin', 'syamsu', 'jalan suci, garut', '08560008123', 'Guru', 'Aktif', '1 Tahun'),
(55, 'makmur.sunarya', 'makmur', 'Jalan cikuray, garut', '0262733123', 'Guru', 'Aktif', '1 Tahun'),
(56, 'atid', 'atidd', 'Perum Paseban, Garut', '0859123665', 'Guru', 'Aktif', '1 Tahun'),
(57, 'Rusev', 'rusev', '123456789', 'Russia', 'Siswa', 'Aktif', '1 Tahun'),
(60, 'asdfghjkl', 'asdfghjkl', '234567890', 'asdfghjkl', 'Siswa', 'Aktif', '1 Semester');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi_guru`
--
ALTER TABLE `absensi_guru`
 ADD PRIMARY KEY (`Id_Absen`,`Kode_Jadwal`,`Staff_yang_mengabsen`);

--
-- Indexes for table `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
 ADD PRIMARY KEY (`Id_Absen`);

--
-- Indexes for table `absensi_staff`
--
ALTER TABLE `absensi_staff`
 ADD PRIMARY KEY (`Id_Absen`,`Kode_Tugas`,`username`);

--
-- Indexes for table `absensi_staff_baru`
--
ALTER TABLE `absensi_staff_baru`
 ADD PRIMARY KEY (`Id_Absen`);

--
-- Indexes for table `biaya_ssc`
--
ALTER TABLE `biaya_ssc`
 ADD PRIMARY KEY (`Id_Biaya`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
 ADD PRIMARY KEY (`Id_User`), ADD KEY `Kode_Guru` (`Kode_Guru`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
 ADD PRIMARY KEY (`Id_Jadwal`), ADD KEY `Kode_Guru` (`Kode_Guru`), ADD KEY `Kode_Kelas` (`Kode_Kelas`), ADD KEY `Kode_Shift` (`Kode_Shift`);

--
-- Indexes for table `kas_ssc`
--
ALTER TABLE `kas_ssc`
 ADD PRIMARY KEY (`Id_Kas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`Kode`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
 ADD PRIMARY KEY (`Kode_Pembayaran`);

--
-- Indexes for table `shift_ssc`
--
ALTER TABLE `shift_ssc`
 ADD PRIMARY KEY (`Kode_Shift`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
 ADD PRIMARY KEY (`Id_User`,`Program`,`Kode_Kelas`), ADD KEY `Program` (`Program`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
 ADD PRIMARY KEY (`Id_User`);

--
-- Indexes for table `tugas_staff`
--
ALTER TABLE `tugas_staff`
 ADD PRIMARY KEY (`Id_Tugas`,`Kode_Staff`);

--
-- Indexes for table `tugas_staff_baru`
--
ALTER TABLE `tugas_staff_baru`
 ADD PRIMARY KEY (`Id_Tugas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi_guru`
--
ALTER TABLE `absensi_guru`
MODIFY `Id_Absen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
MODIFY `Id_Absen` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `absensi_staff`
--
ALTER TABLE `absensi_staff`
MODIFY `Id_Absen` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `absensi_staff_baru`
--
ALTER TABLE `absensi_staff_baru`
MODIFY `Id_Absen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `biaya_ssc`
--
ALTER TABLE `biaya_ssc`
MODIFY `Id_Biaya` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
MODIFY `Id_Jadwal` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kas_ssc`
--
ALTER TABLE `kas_ssc`
MODIFY `Id_Kas` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
MODIFY `Kode_Pembayaran` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tugas_staff`
--
ALTER TABLE `tugas_staff`
MODIFY `Id_Tugas` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `tugas_staff_baru`
--
ALTER TABLE `tugas_staff_baru`
MODIFY `Id_Tugas` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `Id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`Kode_Kelas`) REFERENCES `kelas` (`Kode`) ON UPDATE CASCADE,
ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`Kode_Shift`) REFERENCES `shift_ssc` (`Kode_Shift`) ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`Program`) REFERENCES `biaya_ssc` (`Id_Biaya`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
