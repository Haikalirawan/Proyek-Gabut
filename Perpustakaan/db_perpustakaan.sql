-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Feb 2020 pada 14.11
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(11) NOT NULL,
  `kd_buku` int(11) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `nama_penerbit` varchar(100) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `katagori` varchar(100) NOT NULL,
  `rak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `kd_buku`, `judul_buku`, `nama_penerbit`, `tahun_terbit`, `katagori`, `rak`) VALUES
(1, 1, 'baygon', 'doyok', '2020-02-02', 'buku cerita', '3'),
(2, 2, 'si kancil', 'hasirama', '2019-12-02', 'buku cerita', '7'),
(3, 3, 'kkn di desa penari', 'lutfi', '2019-01-07', 'buku cerita', '5'),
(4, 4, 'fisika', 'albert einstein', '1790-02-23', 'buku pelajaran', '2'),
(5, 5, 'goegrafi', 'agos', '2020-02-02', 'buku pelajaran', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `kd_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `kd_jurusan`, `nama_jurusan`) VALUES
(1, 101, 'rpl'),
(2, 102, 'tkj'),
(3, 103, 'tkr'),
(4, 104, 'tsm'),
(5, 105, 'tgb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kd_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `kd_kategori`, `nama_kategori`) VALUES
(1, 10001, 'buku cerita'),
(2, 10002, 'buku pelajaran'),
(3, 10003, 'cerpen'),
(4, 10004, 'novel'),
(5, 10005, 'buku pantun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kd_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(75) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `kd_kelas`, `nama_kelas`, `jurusan`) VALUES
(1, 1001, '10', 'rpl'),
(2, 1002, '10', 'tkj'),
(3, 1003, '11', 'tkr'),
(4, 1004, '12', 'rpl 1'),
(5, 1005, '12', 'rpl 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `kd_peminjaman` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `nama_peminjaman` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id_peminjaman`, `kd_peminjaman`, `tgl_pinjam`, `judul_buku`, `kelas`, `nama_peminjaman`) VALUES
(1, 3908, '2020-02-17', 'angin pengembara', 'XII RPL 1', 'dayat'),
(2, 93287, '2020-02-16', 'si kancil', 'XI tkj', 'mahmud'),
(3, 9537289, '2020-02-15', 'fast fuorious', 'X RPL 1', 'LUTFI'),
(4, 8787657, '2020-02-14', 'BUAJOI IJO', 'XII TKR 3', 'FAHMI '),
(5, 783957, '2020-02-13', 'FISIKA', 'XI KI 2', 'IDA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penerbit`
--

CREATE TABLE `tbl_penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `kd_penerbit` int(11) NOT NULL,
  `nama_penerbit` varchar(100) NOT NULL,
  `alamat_penerbit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penerbit`
--

INSERT INTO `tbl_penerbit` (`id_penerbit`, `kd_penerbit`, `nama_penerbit`, `alamat_penerbit`) VALUES
(1, 12345, 'FARID', 'POCONG'),
(2, 56789, 'LUTFI', 'PANG MACAN'),
(3, 9876, 'FAHMI', 'LAOK BULUNG'),
(4, 65432, 'FASAL', 'DUNIA'),
(5, 123458, 'EFAN', 'AKHIRAT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengembalian`
--

CREATE TABLE `tbl_pengembalian` (
  `id_kembali` int(11) NOT NULL,
  `kd_kembali` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `nama_peminjam` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengembalian`
--

INSERT INTO `tbl_pengembalian` (`id_kembali`, `kd_kembali`, `tgl_kembali`, `judul_buku`, `kelas`, `nama_peminjam`) VALUES
(1, 8946, '2020-02-04', 'GEOGRAFI', 'XI RPL 2', 'DAYAT'),
(2, 23546, '2020-02-04', 'HARI AKHIR', 'XII RPL 1', 'EFAN'),
(3, 983674, '2020-02-06', 'HIDAYAH ALLAH', 'XI RPL 2', 'DANI'),
(4, 98468, '2020-02-05', 'ZIMBABWE', 'XII RPL 2', 'RAFI'),
(5, 982695, '2020-02-04', 'ADEM SARI', 'XI TKJ 2', 'NUR HADI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `jk_petugas` varchar(30) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `nip`, `nama_petugas`, `jk_petugas`, `jabatan`) VALUES
(1, 9837298, 'LUTFI', 'LK', 'KETUA'),
(2, 739579, 'FARID ', 'LK', 'PEGAWAI BIASA'),
(3, 83468, 'DIMAS', 'LK', 'PEGAWAI BIASA'),
(4, 8923889, 'HAIKAL', 'LK', 'PEGAWAI BIASA'),
(5, 734837, 'EFAN', 'LK', 'WAKIL KETUA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rak`
--

CREATE TABLE `tbl_rak` (
  `id_rak` int(11) NOT NULL,
  `kd_rak` int(11) NOT NULL,
  `nama_rak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_rak`
--

INSERT INTO `tbl_rak` (`id_rak`, `kd_rak`, `nama_rak`) VALUES
(1, 1, '1'),
(2, 2, '2'),
(3, 3, '3'),
(4, 4, '4'),
(5, 5, '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(50) NOT NULL,
  `kd_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jk_siswa` varchar(20) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `kd_siswa`, `nama_siswa`, `jk_siswa`, `kelas`, `jurusan`) VALUES
(1, 1233, 'HAIKAL', 'LK', 'XII', 'RPL'),
(2, 784375, 'EFAN', 'LK', 'XII', 'RPL 1'),
(3, 98348, 'LUTFI', 'LK', 'XII', 'RPL 1'),
(4, 89368, 'AGOS', 'P', 'XII', 'RPL 1'),
(5, 9740, 'SILVI', 'P', 'XII', 'RPL 1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indeks untuk tabel `tbl_penerbit`
--
ALTER TABLE `tbl_penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indeks untuk tabel `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  ADD PRIMARY KEY (`id_kembali`);

--
-- Indeks untuk tabel `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tbl_rak`
--
ALTER TABLE `tbl_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_penerbit`
--
ALTER TABLE `tbl_penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_rak`
--
ALTER TABLE `tbl_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
