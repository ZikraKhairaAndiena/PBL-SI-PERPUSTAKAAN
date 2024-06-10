-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jan 2024 pada 15.16
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama1` varchar(100) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`, `nama1`, `level`) VALUES
(1, 'admin', 'admin', 'Admin 1', 'admin'),
(2, 'pustakawan', 'pustakawan', 'pustakawan', 'pustakawan'),
(3, 'pustakawan2', 'pustakawan', 'pustakawan2', 'pustakawan'),
(4, 'pustakawan3', 'pustakawan', 'Pustakawan 3', 'pustakawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_anggota`
--

CREATE TABLE `data_anggota` (
  `id` int(11) NOT NULL,
  `id_anggota` varchar(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `notelp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_anggota`
--

INSERT INTO `data_anggota` (`id`, `id_anggota`, `nama`, `gender`, `jurusan`, `prodi`, `jenis`, `email`, `notelp`) VALUES
(1, '2201092018', 'Mardhatillah', 'P', 'Teknologi Informasi', 'D3-Manajemen Informatika', 'Mahasiswa', 'tilamardha@gmail.com', '0852365458'),
(2, '2201092037', 'Zikra Khaira Andiena', 'P', 'Teknologi Informasi', 'D3-Manajemen Informatika', 'Mahasiswa', '', ''),
(3, '2201092055', 'Steffani Bofilwitz', 'P', 'Teknologi Informasi', 'D3-Manajemen Informatika', 'Mahasiswa', '', ''),
(4, '2201092049', 'Qori Nadhif Ikhwan', 'L', 'Teknologi Informasi', 'D3-Manajemen Informatika', 'Mahasiswa', '', ''),
(11, '12345678', 'Rendi Aditama Putra', 'L', 'Teknologi Informasi', 'D3-Manajemen Informatika', 'Pegawai', '', ''),
(12, '2201091012', 'Rahma Vika Safitri', 'P', 'Teknologi Informasi', 'D3-Manajemen Informatika', 'Mahasiswa', '', ''),
(15, '199209108', 'Coba Dosen', 'P', 'Teknologi Informasi', 'D3-Manajemen Informatika', 'Dosen', '', ''),
(16, '22356566', 'Tila Tila', 'P', 'Teknologi Informasi', 'D3-Manajemen Informatika', 'Pegawai', 'tila@gmail.com', '0852365458'),
(17, '09920019', 'Laila', 'P', 'Teknik Elektro', 'D4-Teknik Elektronika', 'Dosen', 'lailaturrahmi@gmail.com', '123456'),
(18, '445663', 'Surya', 'L', 'Administrasi Niaga', 'D3-Administrasi Bisnis', 'Dosen', 'surya@gmail.com', '0885566'),
(19, '4444444', 'Suep', 'P', 'Teknik Mesin', 'D3-Teknik Alat Berat', 'Mahasiswa', 'aaaaaaa', '111111111111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_buku`
--

CREATE TABLE `data_buku` (
  `id` int(11) NOT NULL,
  `issn` varchar(100) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang_id` int(11) NOT NULL,
  `penerbit_id` int(11) NOT NULL,
  `thn_terbit` varchar(50) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tersedia` int(11) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `tgl_input` varchar(75) NOT NULL,
  `gambar` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_buku`
--

INSERT INTO `data_buku` (`id`, `issn`, `judul`, `pengarang_id`, `penerbit_id`, `thn_terbit`, `kategori_id`, `jumlah`, `tersedia`, `asal`, `tgl_input`, `gambar`) VALUES
(37, 'A001', 'Sistem Informasi', 1, 1, '2004', 7, 22, 22, 'Beli', '2024/01/08', 'gambar_buku/kalkulus.jpg'),
(38, 'B001', 'Social Intelligence', 2, 1, '2004', 8, 21, 21, 'Beli', '2024/01/05', 'gambar_buku/Social Intelligence.png'),
(39, 'C001', 'Kalkulus', 2, 3, '2002', 8, 1, 1, 'Beli', '2024/01/07', 'gambar_buku/Social Intelligence.png'),
(40, 'A002', ' Dasar-Dasar Teknik Informatika', 3, 5, '2020', 7, 50, 50, 'Beli', '2024/01/08', 'gambar_buku/Dasar-Dasar Teknik Informatika.jpg'),
(41, 'A003', 'Pengantar Teknologi Informasi', 4, 6, '2017', 7, 15, 14, 'Beli', '2024/01/08', 'gambar_buku/Pengantar Teknologi Informasi.jpg'),
(42, 'A004', 'Penelitian Teknik Informatika', 3, 5, '2012', 7, 45, 44, 'Beli', '2024/01/08', 'gambar_buku/Teknik Informatika.jpg'),
(43, 'A005', 'Cerdas Untuk Mahasiswa Teknik Informatika', 6, 5, '2017', 7, 25, 24, 'Beli', '2024/01/08', 'gambar_buku/Komputer Cerdas Untuk Mahasiswa Teknik Informatika.jpg'),
(44, 'A006', 'Pengolahan Audio & Video Kompetensi Keahlian Multimedia ', 7, 5, '2020', 7, 25, 25, 'Beli', '2024/01/08', 'gambar_buku/Pengolahan Audio & Video Kompetensi Keahlian Multimedia Program Keahlian Teknik Komputer dan Informatika.jpg'),
(45, 'A007', 'Pengantar Teknologi Informatika Dan Komunikasi Data', 8, 6, '2012', 7, 45, 45, 'Beli', '2024/01/08', 'gambar_buku/Pengantar Teknologi Informatika Dan Komunikasi Data.jpg'),
(46, 'D001', 'AAA', 4, 2, '2002', 8, 15, 15, 'Beli', '2024/01/10', 'gambar_buku/Komputer Cerdas Untuk Mahasiswa Teknik Informatika.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(7, 'Information Technology'),
(8, 'Social Sciences'),
(9, 'Applied Sciences');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `id` int(11) NOT NULL,
  `nama_penerbit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`id`, `nama_penerbit`) VALUES
(1, 'Erlangga'),
(2, 'Yudistira'),
(3, 'Gramedia'),
(5, 'Deepublish'),
(6, 'Andi Offset');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengarang`
--

CREATE TABLE `pengarang` (
  `id` int(11) NOT NULL,
  `nama_pengarang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengarang`
--

INSERT INTO `pengarang` (`id`, `nama_pengarang`) VALUES
(1, 'Rinaldi Munir'),
(2, 'Daniel Goleman'),
(3, '	Novega Pratama Adiputra'),
(4, 'Buhori Muslim'),
(5, ' Ade Djohar Maturidi'),
(6, 'Nur Nafi’iyah'),
(7, '	Johnie Rogers Swanda Pasaribu, S.Kom., M.Kom.'),
(8, '	Bagaskoro, S.Kom., M.M.'),
(9, 'Dwi Krisbiantoro');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `perlu` varchar(150) NOT NULL,
  `saran` varchar(255) NOT NULL,
  `tgl_kunjung` date NOT NULL,
  `jam_kunjung` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`id`, `nama`, `email`, `perlu`, `saran`, `tgl_kunjung`, `jam_kunjung`) VALUES
(1, 'Tila', 'tilamardha@gmail.com', 'Mencari Buku', 'aa', '2024-01-02', '13:55:00'),
(2, 'Mardhatillah', 'mardhatillah2134@gmail.com', 'Mencari Buku', 'zzz', '2024-01-02', '13:57:00'),
(3, 'Mardhatillah', 'mardhatillah2134@gmail.com', 'Mencari Buku', 'a', '2024-01-02', '08:03:16'),
(4, 'Mardhatillah', 'mardhatillah2134@gmail.com', 'Mencari Buku', 'a', '2024-01-02', '08:03:16'),
(5, 'Mardhatillah', 'mardhatillah2134@gmail.com', 'Mencari Buku', 'a', '2024-01-02', '08:03:16'),
(6, 'Mardhatillah', 'mardhatillah2134@gmail.com', 'Mencari Buku', 'a', '2024-01-02', '08:03:16'),
(7, 'Mardhatillah', 'mardhatillah2134@gmail.com', 'Mencari Buku', 'aqa', '2024-01-02', '08:03:16'),
(8, 'Mardhatillah', 'mardhatillah2134@gmail.com', 'Mencari Buku', 'aqa', '2024-01-02', '08:03:16'),
(9, 'Mardhatillah', 'mardhatillah2134@gmail.com', 'Mencari Buku', 'aqa', '2024-01-02', '08:03:16'),
(10, 'Mardhatillah', 'mardhatillah2134@gmail.com', 'Mencari Buku', 'aqa', '2024-01-02', '08:03:16'),
(11, 'Mardhatillah', 'mardhatillah2134@gmail.com', 'Mencari Buku', 'aqa', '2024-01-02', '08:03:16'),
(26, 'Tila', 'tilamardha@gmail.com', 'Mencari Buku', 'aaa', '2024-01-02', '14:14:00'),
(27, 'Tila', 'tilamardha@gmail.com', 'Mencari Buku', 'hhhh', '2024-01-02', '14:32:00'),
(28, 'Tila', 'andi@gmail.com', 'Mencari Buku', 'aaaaaa', '2024-01-02', '14:34:00'),
(29, 'Mardhatillah', 'tilamardha@gmail.com', 'Mencari Buku buku buku', 'm', '2024-01-02', '14:35:00'),
(30, 'Tila', 'sddd', 'Mencari Buku', 'aaaa', '2024-01-02', '14:38:00'),
(31, 'Zikra Khaira Andiena', 'tilamardha@gmail.com', 'Mencari Buku', 'aaaa', '2024-01-02', '15:28:00'),
(32, 'Tila', 'andi@gmail.com', 'Mencari Buku', 'zz', '2024-01-02', '15:39:00'),
(33, 'Tila', 'andi@gmail.com', 'Mencari Buku', 'zz', '2024-01-02', '15:39:00'),
(34, 'Tila Tila Tila', 'lailaturrahmi@gmail.com', 'Mencari Buku', 'aaa', '2024-01-02', '15:39:00'),
(35, 'Tila Tila Tila', 'lailaturrahmi@gmail.com', 'Mencari Buku', 'aaa', '2024-01-02', '15:39:00'),
(36, 'Tila Tila Tila', 'lailaturrahmi@gmail.com', 'Mencari Buku buku buku', 'a', '2024-01-02', '15:45:00'),
(37, 'Tila Tila Tila', 'lailaturrahmi@gmail.com', 'Mencari Buku buku buku', 'a', '2024-01-02', '15:45:00'),
(38, 'Mardhatillah', 'tilamardha@gmail.com', 'Mencari Buku', 'abcd', '2024-01-02', '15:47:00'),
(39, 'Mardhatillah', 'tilamardha@gmail.com', 'Mencari Buku', 'abcd', '2024-01-02', '15:47:00'),
(40, 'Tila', 'tila@gmail.com', 'Mencari Buku buku buku', 'abc', '2024-01-02', '23:33:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_pinjam`
--

CREATE TABLE `trans_pinjam` (
  `id` int(11) NOT NULL,
  `issn` varchar(255) NOT NULL,
  `id_anggota` varchar(11) NOT NULL,
  `tgl_pinjam` varchar(50) NOT NULL,
  `tgl_kembali` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `trans_pinjam`
--

INSERT INTO `trans_pinjam` (`id`, `issn`, `id_anggota`, `tgl_pinjam`, `tgl_kembali`, `status`, `ket`) VALUES
(4, 'A001', '2147483647', '2024/01/06', '2024-01-14', 'kembali', ''),
(5, 'B001', '2147483647', '2024/01/06', '2024/01/07', 'kembali', ''),
(9, 'A001', '12345678', '2024/01/06', '2024/01/07', 'kembali', ''),
(10, 'A001', '12345678', '2024/01/06', '2024/01/07', 'kembali', ''),
(11, 'A001', '12345678', '2024/01/07', '2024/01/08', 'kembali', ''),
(12, 'A001', '12345678', '2024/01/07', '2024/01/08', 'kembali', ''),
(13, 'C001', '22356566', '2024/01/07', '2024/01/08', 'kembali', ''),
(17, 'A006', '09920019', '2024-01-10', '2024-01-17', 'kembali', ''),
(23, 'A003', '22356566', '2024/01/10', '2024/01/17', 'pinjam', ''),
(24, 'A004', '445663', '2024/01/10', '2024/02/09', 'pinjam', ''),
(25, 'A005', '2201092018', '2024/01/01', '2024/01/08', 'pinjam', ''),
(26, 'B001', '445663', '2024/01/10', '2024-02-16', 'kembali', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `data_anggota`
--
ALTER TABLE `data_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_buku`
--
ALTER TABLE `data_buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `issn` (`issn`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `pengarang` (`pengarang_id`),
  ADD KEY `pengarang_id` (`pengarang_id`),
  ADD KEY `penerbit_id` (`penerbit_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengarang`
--
ALTER TABLE `pengarang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `trans_pinjam`
--
ALTER TABLE `trans_pinjam`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_anggota`
--
ALTER TABLE `data_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `data_buku`
--
ALTER TABLE `data_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengarang`
--
ALTER TABLE `pengarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `trans_pinjam`
--
ALTER TABLE `trans_pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_buku`
--
ALTER TABLE `data_buku`
  ADD CONSTRAINT `data_buku_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_buku_ibfk_2` FOREIGN KEY (`pengarang_id`) REFERENCES `pengarang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_buku_ibfk_3` FOREIGN KEY (`penerbit_id`) REFERENCES `penerbit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
