-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2023 at 11:01 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bimucorner`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `nama`, `email`, `password`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'admin'),
(2, '   burhan', 'burhan@gmail.com', 'burhan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL,
  `namakategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategori`, `namakategori`) VALUES
(10, ' Minuman'),
(11, ' Makanan');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `idmeja` int(11) NOT NULL,
  `nomeja` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`idmeja`, `nomeja`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `idpembelian` int(11) NOT NULL,
  `notransaksi` varchar(50) NOT NULL,
  `nama` text NOT NULL,
  `nohp` varchar(25) NOT NULL,
  `nomeja` varchar(10) NOT NULL,
  `grandtotal` varchar(50) NOT NULL,
  `status` text NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`idpembelian`, `notransaksi`, `nama`, `nohp`, `nomeja`, `grandtotal`, `status`, `waktu`) VALUES
(2, '#INV-20230408013807', 'Sugeng', '089512895821', '1', '60000', 'Sedang di proses, mohon ditunggu ya', '2023-04-08 13:38:07'),
(3, '#INV-20230408013903', 'Sugeng', '084192894214', '2', '60000', 'Sedang di proses, mohon ditunggu ya', '2023-04-08 13:39:03'),
(4, '#INV-20230408014142', 'Sugeng', '08591289512', '3', '38000', 'Sedang di proses, mohon ditunggu ya', '2023-04-08 13:41:42'),
(5, '#INV-20230408014334', 'Sugeng', '08591289512', '1', '38000', 'Makanan sudah siap dan diantarkan', '2023-04-08 13:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `pembeliandetail`
--

CREATE TABLE `pembeliandetail` (
  `idpembeliandetail` int(11) NOT NULL,
  `idpembelian` int(11) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `namaproduk` text NOT NULL,
  `hargaproduk` varchar(50) NOT NULL,
  `subharga` text NOT NULL,
  `jumlah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembeliandetail`
--

INSERT INTO `pembeliandetail` (`idpembeliandetail`, `idpembelian`, `idproduk`, `namaproduk`, `hargaproduk`, `subharga`, `jumlah`) VALUES
(1, 2, 8, 'Kwetiau Goreng', '15000', '15000', '2'),
(2, 2, 4, 'Suki Goreng', '10000', '10000', '3'),
(3, 3, 8, 'Kwetiau Goreng', '15000', '15000', '4'),
(4, 4, 15, 'Choco Taro Sense', '10000', '10000', '1'),
(5, 4, 13, 'Green tea Latte Sense', '14000', '14000', '2'),
(6, 5, 15, 'Choco Taro Sense', '10000', '10000', '1'),
(7, 5, 13, 'Green tea Latte Sense', '14000', '28000', '2');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(11) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `namaproduk` text NOT NULL,
  `hargaproduk` text NOT NULL,
  `fotoproduk` text NOT NULL,
  `deskripsiproduk` text NOT NULL,
  `kesediaanproduk` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idproduk`, `idkategori`, `namaproduk`, `hargaproduk`, `fotoproduk`, `deskripsiproduk`, `kesediaanproduk`) VALUES
(3, 10, 'Lemon Tea', '15000', 'Lemon Tea.jpg', '<p>Lemon Tea Signature</p>\r\n', 'Tidak Tersedia'),
(4, 11, 'Suki Goreng', '10000', 'suki.jpg', '<p>Suki Goreng</p>\r\n', 'Tersedia'),
(8, 11, 'Kwetiau Goreng', '15000', 'kwetiau.jpg', '<p>Kwetiau Goreng</p>\r\n', 'Tersedia'),
(10, 11, 'Nasi Goreng', '12000', 'nasi goreng.jpg', '<p>Nasi Goreng Original Bimu Corner</p>\r\n', 'Tersedia'),
(13, 10, 'Green tea Latte Sense', '14000', 'Green tea Latte Sense.jpg', '<p>Green tea Latte Sense</p>\r\n', 'Tersedia'),
(14, 10, 'BrownSugar Milk', '9000', 'BrownSugar Milk.jpg', '<p>Minuman&nbsp;BrownSugar Milk dengan choco milk powder</p>\r\n', 'Tersedia'),
(15, 10, 'Choco Taro Sense', '10000', 'Choco Taro Sense.jpg', '<p>Choco Taro Sense Original&nbsp;</p>\r\n', 'Tidak Tersedia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`idmeja`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`idpembelian`);

--
-- Indexes for table `pembeliandetail`
--
ALTER TABLE `pembeliandetail`
  ADD PRIMARY KEY (`idpembeliandetail`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`),
  ADD KEY `id_kategori` (`idkategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `idmeja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `idpembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembeliandetail`
--
ALTER TABLE `pembeliandetail`
  MODIFY `idpembeliandetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
