-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Okt 2023 pada 13.19
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_mebel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `ID` int(11) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `barang_pesanan` varchar(255) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `metode_pembayaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`ID`, `nama_pemesan`, `alamat`, `nomor_telepon`, `barang_pesanan`, `bukti_pembayaran`, `metode_pembayaran`) VALUES
(2, 'depin', 'Jln. M. Said GG. Camar RT. 14 NO.116 Kel. Lok Bahu Kec. Sungai Kunjang  Samarinda ', '081354902543', 'Sofa Kayu Anyaman', 'WIN_20230605_07_59_29_Pro.jpg', 'Transfer'),
(6, 'yuan', 'Jln. Ramania', '085262728292', 'Dipan Kayu Ukir', 'WIN_20230306_10_26_09_Pro.jpg', 'Cash'),
(7, 'hapnisia', 'Jln. M. Yamin', '081254905469', 'Sofa Kayu Anyaman', '', 'Transfer'),
(8, 'hapni', 'Jln.P.SU', '0813146469', 'Dipan Kayu Ukir', '', 'Cash'),
(9, 'b', '', '3', 'Dipan Kayu Ukir', '2023-10-25 poto sia jamal.jpeg', 'Transfer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
