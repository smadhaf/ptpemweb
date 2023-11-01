-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Nov 2023 pada 15.43
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
(7, 'hapnisia', 'Jln. M. Yamin', '081254905469', 'Sofa Kayu Anyaman', 'planet9_Wallpaper_5000x2813.jpg', 'Transfer'),
(8, 'hapni', 'Jln.P.SU', '0813146469', 'Dipan Kayu Ukir', 'woi.jpg', 'Cash'),
(9, 'b', 'a', '3', 'Dipan Kayu Ukir', '2023-10-25 poto sia jamal.jpeg', 'Transfer'),
(11, 'y', 'yoo', '3', 'Dipan Kayu Ukir', 'Screenshot 2023-10-29 224314.png', 'Transfer'),
(12, 'ucup', 'jl. santai', '08434646464', 'Meja Serat Kayu', '2023-11-01 Nitro_Wallpaper_5000x2813.jpg', 'Transfer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'depin', '123'),
(2, 'saya', '$2y$10$X7VxoA2eM/gBH5egv0ItY.kGiPJ1xIKBgWEhTi.ERoONYXhizg/NW'),
(3, 'ahmad', '$2y$10$UgpQX8FwsHjfx9nfYkmJ0ezR3fL6uBZwoEXyyhP2TB4tzwWYvnSgS');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
