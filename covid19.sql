-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 09 Sep 2024 pada 05.28
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid19`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(10) NOT NULL,
  `kd_gejala` char(4) NOT NULL DEFAULT '',
  `nm_gejala` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `kd_gejala`, `nm_gejala`) VALUES
(37, 'G001', 'Demam 36,6 derajat celcius dan 37 derajat celcius'),
(38, 'G002', 'Demam 37,2 derajat celcius dan 37,8 derajat celcius'),
(39, 'G003', 'Demam 38,4 derajat celcius dan 40 derajat celcius'),
(40, 'G004', 'Batuk Kering'),
(41, 'G005', 'Pilek dan hidung tersumbat'),
(42, 'G006', 'Hilangnya indra penciuman (anosmia)'),
(43, 'G007', 'Hilangnya indra perasa/pengecapan (ageusia)'),
(44, 'G008', 'Sakit tenggorokan'),
(45, 'G009', 'Sakit kepala'),
(46, 'G010', 'Frekuensi  napas  12 - 20  kali  per menit'),
(47, 'G011', 'Merasa mual/muntah dan sakit perut'),
(48, 'G012', 'Saturasi oksigen > 95%'),
(49, 'G013', 'Kesulitan atau tidak bisa makan dan minum'),
(50, 'G014', 'Letih dan lemas'),
(51, 'G015', 'Frekuensi  napas  20 - 30  kali  per menit'),
(52, 'G016', 'Mengalami dehidrasi'),
(53, 'G017', 'Saturasi oksigen > 93% dan < 95%'),
(54, 'G018', 'Mengalami tanda-tanda gagal pernapasan'),
(55, 'G019', 'Saturasi  oksigen tidak  meningkat diatas 93% meskipun memakai alat bantu  pernapasan    yang    paling sederhana (nasal canul)'),
(56, 'G020', 'Mulai hilangnya kesadaran'),
(57, 'G021', 'Saturasi oksigen < 93%'),
(58, 'G022', 'Nyeri otot dan nyeri tulang'),
(59, 'G023', 'Sesak napas'),
(60, 'G024', 'Sulit berpikir jernih'),
(61, 'G025', 'Diare'),
(62, 'G026', 'Frekuensi napas > 30 kali per menit'),
(63, 'G027', 'Hipertemia atau Hiportemia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_diagnosa`
--

CREATE TABLE `hasil_diagnosa` (
  `id` int(4) UNSIGNED NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `pekerjaan` varchar(60) NOT NULL,
  `tanggal` date NOT NULL,
  `telp` varchar(15) NOT NULL,
  `noip` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `hasil_diagnosa`
--

INSERT INTO `hasil_diagnosa` (`id`, `alamat`, `kd_penyakit`, `kelamin`, `nama`, `pekerjaan`, `tanggal`, `telp`, `noip`) VALUES
(1, 'villa tangerang regency sangiang', 'P001', 'Pria', 'Muhammad Fadilah', 'programmer', '2024-09-09', '085311320870', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(4) UNSIGNED NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `nm_penyakit` varchar(60) NOT NULL,
  `definisi` text NOT NULL,
  `solusi` text NOT NULL,
  `uraian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `kd_penyakit`, `nm_penyakit`, `definisi`, `solusi`, `uraian`) VALUES
(1, 'P001', 'Covid XBB Omicron Ringan', 'Pasien dengan infeksi saluran napas oleh virus dengan gejala tidak spesifik seperti demam, lemah, batuk, nyeri otot, sakit tenggorokan, hidung tersumbat, sakit kepala. Meskipun jarang, pasien dapat dengan keluhan diare, mual atau muntah \r\n ', 'Pasien dapat melakukan isolasi mandiri selama 10 hari di rumah ditambah 3 hari bebas gangguan pernapasan dan demam atau pasien dapat pergi ke rumah sakit dengan menghubungi dokter umum terlebih dahulu untuk melakukan konsultasi lebih lanjut atau dengan Telemedicine yaitu konsultasi dengan dokter secara online.', 'Covid XBB Omicron  dapat lebih cepat menular dari varian sebelumnnya, Omicron disertai peningkatan kemampuan menghidari vaksin dan menyebabkan infeksi ulang. '),
(2, 'P002', 'Covid XBB Omicron Sedang', 'Pasien remaja/dewasa dengan pneumonia tetapi tidak menunjukan sebagai pneumonia berat. Pada Anak-anak dengan pneumonia tidak berat dengan keluhan batuk atau sulit bernapas disertai napas cepat .\r\n', 'Pasien harus segera dibawa ke rumah sakit rujukan atau rumah sakit darurat Covid-19 untuk mendapatkan perawatan lebih lanjut.', 'Covid XBB Omicron  dapat lebih cepat menular dari varian sebelumnnya, Omicron disertai peningkatan kemampuan menghidari vaksin dan menyebabkan infeksi ulang. '),
(3, 'P003', 'Covid XBB Omicron Berat', 'Pasien remaja/dewasa dengan demam atau gejala ISPA, ditambah satu dari: frekuensi napas > 30 kali per menit, distress pernapasan berat, atau saturasi oksigen <93% pada udara kamar. Pada anak dengan batuk atau kesulitan bernapas, ditambah tanda pneumonia berat.', 'Pasien harus segera dilarikan ke rumah sakit rujukan Covid-19 dan dirawat di ruang ICU (Intensive Care Unit) atau HCU (High Care Unit).\r\n', 'Covid XBB Omicron  dapat lebih cepat menular dari varian sebelumnnya, Omicron disertai peningkatan kemampuan menghidari vaksin dan menyebabkan infeksi ulang. ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(4) UNSIGNED NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `pekerjaan` varchar(60) NOT NULL,
  `tanggal` date NOT NULL,
  `telp` varchar(25) NOT NULL,
  `noip` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `alamat`, `kelamin`, `nama`, `pekerjaan`, `tanggal`, `telp`, `noip`) VALUES
(1, 'villa tangerang regency sangiang', 'Pria', 'Muhammad Fadilah', 'programmer', '2024-09-09', '085311320870', '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `relasi`
--

CREATE TABLE `relasi` (
  `id_relasi` int(6) NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `kd_gejala` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `relasi`
--

INSERT INTO `relasi` (`id_relasi`, `kd_penyakit`, `kd_gejala`) VALUES
(55, 'P001', 'K001'),
(56, 'P002', 'K002'),
(57, 'P003', 'K003'),
(58, 'P001', 'K004'),
(59, 'P001', 'K005'),
(60, 'P001', 'K006'),
(61, 'P001', 'K007'),
(62, 'P001', 'K008'),
(63, 'P001', 'K009'),
(64, 'P001', 'K010'),
(65, 'P001', 'K011'),
(66, 'P001', 'K012'),
(67, 'P002', 'K013'),
(68, 'P002', 'K014'),
(69, 'P002', 'K015'),
(70, 'P002', 'K016'),
(71, 'P002', 'K017'),
(72, 'P003', 'K018'),
(73, 'P003', 'K019'),
(74, 'P003', 'K020'),
(75, 'P003', 'K021'),
(76, 'P001', 'K022'),
(77, 'P001', 'K022'),
(78, 'P001', 'K023'),
(79, 'P002', 'K023'),
(80, 'P003', 'K023'),
(81, 'P001', 'K024'),
(82, 'P001', 'K025'),
(83, 'P003', 'K026'),
(84, 'P002', 'K027'),
(85, 'P001', 'G001'),
(86, 'P001', 'G004'),
(87, 'P001', 'G005'),
(88, 'P001', 'G006'),
(89, 'P001', 'G007'),
(90, 'P001', 'G008'),
(91, 'P001', 'G009'),
(92, 'P001', 'G010'),
(93, 'P001', 'G011'),
(94, 'P001', 'G012'),
(95, 'P001', 'G022'),
(96, 'P001', 'G023'),
(97, 'P001', 'G024'),
(98, 'P001', 'G025'),
(99, 'P002', 'G002'),
(100, 'P002', 'G013'),
(101, 'P002', 'G014'),
(102, 'P002', 'G015'),
(103, 'P002', 'G016'),
(104, 'P002', 'G017'),
(105, 'P002', 'G023'),
(106, 'P002', 'G027'),
(107, 'P003', 'G003'),
(108, 'P003', 'G018'),
(109, 'P003', 'G019'),
(110, 'P003', 'G020'),
(111, 'P003', 'G021'),
(112, 'P003', 'G022'),
(113, 'P003', 'G023'),
(114, 'P003', 'G026');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_analisa`
--

CREATE TABLE `tmp_analisa` (
  `noip` varchar(60) NOT NULL DEFAULT '',
  `kd_penyakit` char(4) NOT NULL DEFAULT '',
  `kd_gejala` char(4) NOT NULL DEFAULT '',
  `status` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_gejala`
--

CREATE TABLE `tmp_gejala` (
  `glj` int(5) NOT NULL,
  `kd_gejala` char(4) NOT NULL,
  `status` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tmp_gejala`
--

INSERT INTO `tmp_gejala` (`glj`, `kd_gejala`, `status`) VALUES
(334, 'G009', 'Y'),
(335, 'G010', 'Y'),
(336, 'G011', 'Y'),
(337, 'G012', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_pengguna`
--

CREATE TABLE `tmp_pengguna` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `nama` varchar(60) NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pekerjaan` varchar(60) NOT NULL,
  `noip` varchar(60) NOT NULL,
  `tanggal` date NOT NULL,
  `umur` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_penyakit`
--

CREATE TABLE `tmp_penyakit` (
  `kd_penyakit` char(4) NOT NULL,
  `noip` varchar(9) NOT NULL,
  `nilai` int(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(9) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`) VALUES
(1, 'pakar', 'pakar', 'Muhammad Fadli'),
(2, 'user', 'user', 'Putri');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indeks untuk tabel `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `relasi`
--
ALTER TABLE `relasi`
  ADD PRIMARY KEY (`id_relasi`);

--
-- Indeks untuk tabel `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
  ADD PRIMARY KEY (`glj`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `relasi`
--
ALTER TABLE `relasi`
  MODIFY `id_relasi` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT untuk tabel `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
  MODIFY `glj` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
