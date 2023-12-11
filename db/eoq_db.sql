-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2023 at 10:05 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eoq_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` varchar(20) NOT NULL,
  `nm_barang` varchar(100) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_beli` int NOT NULL,
  `stok` int NOT NULL,
  `tgl_record` date NOT NULL,
  `jam_record` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nm_barang`, `satuan`, `harga_beli`, `stok`, `tgl_record`, `jam_record`) VALUES
('BRG-0001', 'Kayu Mahoni', 'Batang', 80000, 10, '2023-12-10', '11:14:00'),
('BRG-0002', 'Kayu Albasia', 'Batang', 90000, 10, '2023-12-10', '11:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemakaian`
--

CREATE TABLE `tbl_pemakaian` (
  `id_pemakaian` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bukti_keluar` varchar(20) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `qty` int NOT NULL,
  `tanggal` date NOT NULL,
  `tgl_record` date NOT NULL,
  `jam_record` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_pemakaian`
--

INSERT INTO `tbl_pemakaian` (`id_pemakaian`, `bukti_keluar`, `id_barang`, `qty`, `tanggal`, `tgl_record`, `jam_record`) VALUES
('PMK-0001', 'BK-0001/10-12-2023', 'BRG-0002', 5, '2023-12-10', '2023-12-10', '14:41:52'),
('PMK-0002', 'BK-0002/10-12-2023', 'BRG-0002', 10, '2023-12-08', '2023-12-10', '15:27:50'),
('PMK-0003', 'BK-0003/10-12-2023', 'BRG-0001', 3, '2023-12-06', '2023-12-10', '16:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemesanan`
--

CREATE TABLE `tbl_pemesanan` (
  `id_pemesanan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `surat_jalan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_supplier` varchar(20) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `qty` int NOT NULL,
  `tanggal` date NOT NULL,
  `tgl_record` date NOT NULL,
  `jam_record` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_pemesanan`
--

INSERT INTO `tbl_pemesanan` (`id_pemesanan`, `surat_jalan`, `id_supplier`, `id_barang`, `qty`, `tanggal`, `tgl_record`, `jam_record`) VALUES
('PSN-0001', 'SJ-0001/10-12-2023', 'SPY-0002', 'BRG-0002', 20, '2023-12-10', '2023-12-10', '14:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` varchar(20) NOT NULL,
  `nm_supplier` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tgl_record` date NOT NULL,
  `jam_record` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `nm_supplier`, `alamat`, `telepon`, `tgl_record`, `jam_record`) VALUES
('SPY-0002', 'PT. Jaya Jaya', 'Jln. Disini Aja No.02', '081122334455', '2023-12-09', '11:13:00'),
('SPY-0003', 'CV. Sehati', 'Jln. Itu tuh', '081554433221', '2023-12-09', '11:14:00'),
('SPY-0004', 'Cv. Wei Wei', 'jalan setiabudi', '0811223300998', '2023-12-10', '02:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `role` enum('1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `email`, `username`, `password`, `role`, `status`) VALUES
('USR-0001', 'Resa Shafitri', 'resa@gmail.com', 'admin', 'admin', '1', 'Y'),
('USR-0002', 'Ianatul Azizah', 'ianatul@gmail.com', 'gudang', 'gudang', '2', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_pemakaian`
--
ALTER TABLE `tbl_pemakaian`
  ADD PRIMARY KEY (`id_pemakaian`);

--
-- Indexes for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
