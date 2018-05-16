-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2018 at 08:46 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prj_pbw`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `Nomor` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Jenis_Kelamin` varchar(255) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `NIK` varchar(255) NOT NULL,
  `No_HP` varchar(255) DEFAULT NULL,
  `is_admin` varchar(20) NOT NULL,
  `Token` int(10) NOT NULL,
  `Path` varchar(255) NOT NULL,
  `is_upload` varchar(4) NOT NULL,
  `date` date NOT NULL,
  `DefaultPath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`Nomor`, `Email`, `Password`, `Nama`, `Jenis_Kelamin`, `Alamat`, `Tanggal_Lahir`, `NIK`, `No_HP`, `is_admin`, `Token`, `Path`, `is_upload`, `date`, `DefaultPath`) VALUES
(64, 'evann888@gmail.com', 'bbRpbVXURqpxZM3JBDdhNJsxSJSgKvn2zxbW20+3DpJZcmayFYi431A/RyETMCCAZew1K+wdvRUkhnpKQk/Txg==', 'Nevermore', 'Laki-Laki', 'Wisma Permai III no 12', '2002-05-08', '1234567890123453', '081803610588', '0', 0, 'Nevermore_1525988419.', '0', '2018-05-10', 'defaultuser.png'),
(65, 'admin@admin.com', 'G+2X/t3UMVuhJC0sK1xJBo3hmECrTJnvFaSFxj9Qw9lD4EVDSUyph5W0K4QvjsdqlKwUqaQHHWqmtklIl9j01Q==', 'Admin', '', '', '0000-00-00', '', NULL, '1', 0, '', '', '2018-05-16', 'defaultuser.png'),
(66, 'glhf3033@gmail.com', 'EEg35PaJvp4UIJbrSRVrhfx3KxzaQonz6vwXEaXpWO8VvP4LArxchlhiFwBGHDM1RZq1Ug7M7RlAwQzNMOA8BQ==', 'Evan', 'Laki-Laki', 'Wisma Permai III no 12', '2002-04-29', '1234567890123456', '081803610580', '', 0, 'Evan_1526465618.', '0', '2018-05-16', 'defaultuser.png'),
(67, 'evan8@gmail.com', 'rhuOjAwoxcWp4O0ZgHCyQh8kl60eVnewXSEiMBVlraXNQh8MmBOBow1LBRRipQK4f5C3CBfZkAgmvrXJwCtCHw==', 'Evan', 'Laki-Laki', 'Wisma Permai III no 12', '2002-05-08', '1234567890123453', '081803610588', '', 0, 'Evan_1526486817.jpg', '1', '2018-05-16', '');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `ID` int(11) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `Judul_Buku` varchar(255) NOT NULL,
  `Pengarang` varchar(255) NOT NULL,
  `Penerbit` varchar(255) NOT NULL,
  `Kategori` varchar(255) NOT NULL,
  `Stok` int(255) NOT NULL,
  `is_upload` varchar(4) NOT NULL,
  `Path` varchar(255) NOT NULL,
  `DefaultPath` varchar(20) NOT NULL,
  `Hits` int(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`ID`, `ISBN`, `Judul_Buku`, `Pengarang`, `Penerbit`, `Kategori`, `Stok`, `is_upload`, `Path`, `DefaultPath`, `Hits`) VALUES
(181, '1234567891122', 'Harry Potter', 'Jk. Rowling', 'Gramedia', '', 5, '1', 'Harry_Potter_1526327862.jpg', '', 0),
(183, '1234567891123', 'Lord Of The Ring', 'J. R. R. Tolkien', 'Allen & Unwin', '', 2, '1', 'Lord_of_The_Ring_1526327985.jpg', '', 0),
(184, '1234567891124', 'Dilan1990', 'Pidi Baiq', 'Gramedia', '', 2, '1', 'Dilan1990_1526341813.jpg', '', 0),
(185, '1234567891125', 'Lima Sekawan', 'Grid Blyton', 'Gramedia', '', 3, '1', 'Lima_Sekawan_1526434716.jpg', '', 1),
(186, '1234567891126', 'The Hobbit', 'J. R. R. Tolkien', 'Gramedia', '', 0, '1', 'The_Hobbit_1526445565.jpg', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `logpinjaman`
--

CREATE TABLE `logpinjaman` (
  `ID` int(11) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `Judul_Buku` varchar(255) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Tanggal_Booking` date NOT NULL,
  `is_booking` int(4) NOT NULL,
  `Tanggal_Pinjaman` date NOT NULL,
  `Tanggal_Kembali` date NOT NULL,
  `Jumlah` int(255) NOT NULL,
  `Hari` int(20) NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logpinjaman`
--

INSERT INTO `logpinjaman` (`ID`, `ISBN`, `Judul_Buku`, `Nama`, `Email`, `Tanggal_Booking`, `is_booking`, `Tanggal_Pinjaman`, `Tanggal_Kembali`, `Jumlah`, `Hari`, `Status`) VALUES
(39, '1234567891126', 'The Hobbit', 'Nevermore', 'evann888@gmail.com', '2018-05-16', 1, '2018-05-16', '2018-05-17', 0, 1, 'Menunggu Konfirmasi'),
(40, '1234567891123', 'Lord Of The Ring', 'Nevermore', 'evann888@gmail.com', '2018-05-16', 1, '2018-05-16', '2018-05-17', 0, 1, 'Menunggu Konfirmasi'),
(41, '1234567891126', 'The Hobbit', 'Admin', 'admin@admin.com', '2018-05-16', 1, '2018-05-16', '2018-05-17', 0, 1, 'Menunggu Konfirmasi'),
(42, '1234567891125', 'Lima Sekawan', 'Evan', 'evan8@gmail.com', '2018-05-16', 1, '2018-05-16', '2018-05-17', 0, 1, 'Menunggu Konfirmasi'),
(43, '1234567891125', 'Lima Sekawan', 'Admin', 'admin@admin.com', '2018-05-16', 1, '2018-05-16', '2018-05-17', 0, 3, 'Telah dikembalikan'),
(44, '1234567891125', 'Lima Sekawan', 'Admin', 'admin@admin.com', '2018-05-16', 1, '2018-05-16', '2018-05-17', 0, 1, 'Telah dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `ID` int(11) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `Judul_Buku` varchar(255) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Tanggal_Booking` date NOT NULL,
  `is_booking` int(4) NOT NULL,
  `Tanggal_Pinjaman` date NOT NULL,
  `Tanggal_Kembali` date NOT NULL,
  `Jumlah` int(255) NOT NULL,
  `Hari` int(20) NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`ID`, `ISBN`, `Judul_Buku`, `Nama`, `Email`, `Tanggal_Booking`, `is_booking`, `Tanggal_Pinjaman`, `Tanggal_Kembali`, `Jumlah`, `Hari`, `Status`) VALUES
(40, '1234567891123', 'Lord Of The Ring', 'Nevermore', 'evann888@gmail.com', '2018-05-16', 1, '2018-05-16', '2018-05-17', 1, 1, 'Telah Disetujui');

--
-- Triggers `pinjaman`
--
DELIMITER $$
CREATE TRIGGER `Testing` AFTER UPDATE ON `pinjaman` FOR EACH ROW UPDATE buku set buku.Stok=Stok-new.Jumlah
        WHERE buku.ISBN = new.ISBN
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `backup` AFTER INSERT ON `pinjaman` FOR EACH ROW INSERT INTO logpinjaman VALUES(new.ID, new.ISBN, new.Judul_Buku, new.Nama, new.Email, new.Tanggal_Booking, new.is_booking, new.Tanggal_Pinjaman, new.Tanggal_Kembali, new.Jumlah, new.Hari, new.Status)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `backup2` BEFORE UPDATE ON `pinjaman` FOR EACH ROW UPDATE logpinjaman set logpinjaman.Tanggal_Pinjaman = new.Tanggal_Pinjaman, logpinjaman.Tanggal_Kembali = new.Tanggal_Kembali WHERE logpinjaman.ISBN = new.ISBN
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`Nomor`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`ISBN`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `Nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;
--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
