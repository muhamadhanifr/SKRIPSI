-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24 Jul 2020 pada 03.01
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujianonline`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `NIDN` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(255) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `level` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`, `NIDN`, `email`, `token`, `nohp`, `level`) VALUES
('123', '$2y$10$LKxDSjKOzpC7v..QN1UuY.y.g8hfu4dyTIv5ThOhEZ1oj8q8dU.PS', '', '', '', '', '', 'admin'),
('syifa123', '$2y$10$3/Bgb1sPrbCQhuhBp8H4FOjF3eSovOmUmmqfefnGgQEvRTZxdCiVu', '', '', '', '', '', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `angkatan`
--

CREATE TABLE `angkatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `angkatan`
--

INSERT INTO `angkatan` (`id`, `nama`) VALUES
(7, '2016'),
(2, '2017'),
(4, '2018'),
(5, '2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `namadosen` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `NIDN` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `norek` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `username`, `namadosen`, `password`, `NIDN`, `email`, `nohp`, `norek`, `alamat`, `level`) VALUES
(1, '1234', 'Muhamad Hanif Ridwannulloh', '$2y$10$9CrpPkhH0fgjnp3w4KNCZe0G.hdZTh4BVbtQx7sXr9OxiedyUEv2O', '1213412412412', 'hanifridwan18@gmail.com', '0895333862529', '123', 'Kp. Cimariuk RT 04 RW 19, Desa Manggung Harja, Kecamatan Ciparay, Kabupaten Bandung', 'dosen'),
(13, '425038203', 'Rosmalina, S.T., M.Kom', '$2y$10$3xRT0MNp0igqGEWwicDpiOhfmogfO09uicZYMm4zIyal5.i.brTqG', '425038203', '', '', '', '', 'dosen'),
(14, '409068303', 'Aries Budi Kurniawan, S.T., M.M,', '$2y$10$eTQqqkomVd9oPGbFTR5NWO.Ea6aWms3gQdRM0Z5gk.cBjDKQvCjj2', '409068303', '', '', '', '', 'dosen'),
(15, '401057504', 'Denny Rusdianto, S.T., M.Kom,', '$2y$10$zah8NVeEb8TOeahpfzSs.O/yzHZcsOFOLg6JaR9b.5C7CeHs5/k8m', '401057504', '', '', '', '', 'dosen'),
(16, '427038204', 'Sutiyono, S.T., M.Kom,', '$2y$10$O/WUX/fJp6K613MJp2rTrO.Va.L7z40SjwrdoC8ICLEnhkVdYweAW', '427038204', '', '', '', '', 'dosen'),
(17, '412086301', 'Mochamad Ridwan, S.T., M.Kom,', '$2y$10$dCKHL6qzSBeKW.IQmkPBo.ICa5h2Jv4BgKDPUGtjVHpBNaHWgUp9C', '412086301', '', '', '', '', 'dosen'),
(18, '407108701', 'Maria Evakori, S.T,', '$2y$10$Xsitw..LsJvMYrdLfBDD8e9yyakSk6pNOUFLaDl4HUKUVNECnc4sq', '407108701', '', '', '', '', 'dosen'),
(19, '428027501', 'Yudi Herdiana, S.T., M.T,', '$2y$10$49V0ejHArZ/2wmZB49kugOY6fkuaREmafRY6h4sAdYhJcm2YGZBle', '428027501', '', '', '', '', 'dosen'),
(20, '416017704', 'Rustiyana, S.T., M.T,', '$2y$10$Fgbwi.ELwtMm8Wmb4BCKPeNpIuyXlwGt0iUfBc21JPu/UyhsyQjEW', '416017704', '', '', '', '', 'dosen'),
(21, '428067005', 'Iyus Muslimin, S.T., M.T,', '$2y$10$ivqBKluFM.Qsk/q8JQTamOSgFjWQTT2hQncDWC8bNY6XWQJp6o5E6', '428067005', '', '', '', '', 'dosen'),
(22, '407047706', 'Yaya Suharya, S.Kom., M.T,', '$2y$10$C7TNU7lM0VVVz5Gm/uJG6us2MFiqP8VvtlphT28SLMXz7Rqr4U9Tq', '407047706', '', '', '', '', 'dosen'),
(23, '412027905', 'Nurul Imamah, S.T., M.T,', '$2y$10$PcZrtDWMCR1EFOVpuu8al.gDOZMokrjNMFYBq/cNde1ilJZsGc0ie', '412027905', '', '', '', '', 'dosen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwalujianmatakuliah`
--

CREATE TABLE `jadwalujianmatakuliah` (
  `id` int(11) NOT NULL,
  `idjenisujian` varchar(16) NOT NULL,
  `namaujian` varchar(255) NOT NULL,
  `idmatakuliah` varchar(16) NOT NULL,
  `angkatan` varchar(16) NOT NULL,
  `programstudi` varchar(50) NOT NULL,
  `waktupelaksanaan` datetime NOT NULL,
  `durasiujian` int(11) NOT NULL,
  `status` varchar(16) NOT NULL,
  `ketentuanujian` text NOT NULL,
  `soaltampil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawabanujianharianmhs`
--

CREATE TABLE `jawabanujianharianmhs` (
  `id` int(11) NOT NULL,
  `NIM` varchar(50) NOT NULL,
  `soal` int(11) NOT NULL,
  `pilihanjawaban` varchar(255) NOT NULL,
  `kodeujianharian` varchar(255) NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawabanujianmhs`
--

CREATE TABLE `jawabanujianmhs` (
  `id` int(11) NOT NULL,
  `NIM` varchar(16) NOT NULL,
  `soal` varchar(10) NOT NULL,
  `pilihanjawaban` varchar(255) NOT NULL,
  `idnilaimtk` varchar(255) NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenisujian`
--

CREATE TABLE `jenisujian` (
  `id` int(11) NOT NULL,
  `namaujian` varchar(255) NOT NULL,
  `tipeujian` varchar(50) NOT NULL,
  `tahunajaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `NIM` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `namamahasiswa` varchar(50) NOT NULL,
  `lembaga` varchar(50) NOT NULL,
  `programstudi` varchar(50) NOT NULL,
  `angkatan` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `level` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `NIM`, `password`, `namamahasiswa`, `lembaga`, `programstudi`, `angkatan`, `email`, `nohp`, `alamat`, `level`) VALUES
(1, 'C1A160025', '$2y$10$oJypqTxOdkzUodYxift2MeoYbvEddujsc69CxB6OeYvHk/ezhAZe6', 'MUHAMAD AZIZ PURWANANDIKA', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(6, 'C1A160002', '$2y$10$Ggc33OQPD8eyBV4foxqfM.KPFUrHZ6BsSsJrwTDXMInfnl8xqMVLa', 'DADAN RAMDANI', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(7, 'C1A160003', '$2y$10$qqsqJ6lF.lIQ/OekjqPyUOoEjumipwxHCTasTwMDvU2/CGjwu5W6C', 'APLAHA IQBAL NURSALAM', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(8, 'C1A160004', '$2y$10$H2MmcEo8AxwLsTqUTixjnu7HU28i1NWvoCWEmDFS8.aVnKc8vI986', 'JAKA PERYOGA TRISWARA', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(9, 'C1A160005', '$2y$10$LHp3.UoZyItmmE6Y4Px/ne1IQT1HGESZpdl1CR.4plI71huGuloKy', 'DIKA HADIJAYA', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(10, 'C1A160006', '$2y$10$NQnLmSCp3mu0JYuWdDYIO.xKkFc7.bafzsj299DrXpZ17DQR11YdC', 'ABDUL AZIZ', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(11, 'C1A160007', '$2y$10$/mNjmt1cCzd3s6ODy5R7.e5gS8Px1ttYHrHc3MzV8.X2Aol56vnLu', 'RIAN AHMAD HIDAYAT', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(12, 'C1A160008', '$2y$10$l.0k/oWFnZlDXU14h.aUj.IcJK7WPJT7/wKXmAlteiU7oUxWxlsF.', 'LISNAWATI', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(13, 'C1A160009', '$2y$10$FhIFKD5Jlly3oYNoCJ1.OOG4ycIgAM1uEUvg3AkaaT32k/9ziTA5u', 'GALIH REXY HAKIKI', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(14, 'C1A160010', '$2y$10$dExTnfB8d7Rj1eeHO.mmhevsaDqlIqAv4y9K9aD0JvHqaFgv9B0mK', 'MOHAMMAD BAYU ANGGARA', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(15, 'C1A160011', '$2y$10$/gK0auWggp0fQ96yDkMvceSSSzOJgwbh4iXq7NKxv9BAXFmrjeaS2', 'JIHAN PUJIANA', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(16, 'C1A160012', '$2y$10$DYZ2XfqipFi8n6T65ziU1OAIjI5FoC8QifFp5FvmLzZQ35gnzmMD2', 'YOGASWARA RABBANI', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(17, 'C1A160013', '$2y$10$9UVrRFaNMkeEixjG4iPzg.KqIQNNj1UmYvreHIPpb2J2c7JaB/YKq', 'AHMAD KAMAL FASYA', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(18, 'C1A160014', '$2y$10$9yyV80AZPONNbozn29D5lOoIoDGPTqGraO8isZ808HDyHCzeV55P6', 'FAHMI KURNIAWAN', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(19, 'C1A160015', '$2y$10$BynEz0T10JrW/7zZ9Bnllem0cO1Uvg1R1oQZb910UfXAPzvZEOFyu', 'SABDA ALAM', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(20, 'C1A160016', '$2y$10$cmGvZT4J0aWwOmhN0DOEN.3U9.W920w/j.2eemMPZkesWFfO6Npve', 'CHANDRA RIZKI AZHARI', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(21, 'C1A160017', '$2y$10$rx.JYjNhkM.RstLUb1D3Q.YKql6JFi9wcTZ5tK7EUU.18ErKKNoh.', 'SANDI SOPIAN', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(22, 'C1A160018', '$2y$10$puSI2OulsIZ7yJHjCHdXJe/EBsKD3C4KOOYH9zzFHRZR/tFMS.6aC', 'RIVAN RAMDANI', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(23, 'C1A160019', '$2y$10$GjSVDp6mldNy63C06KNnSOQJ6bQEDYAw5uyta8tOA0B/18bZ2XcZm', 'NOERHOLIS HAKIM', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(24, 'C1A160021', '$2y$10$AgJvxByzon0MteHIhTW2H.wfqgSiB9BfMMNrPdr7vqsc8BY7GXE0O', 'IKBAL NAUBAH RAMDANI', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(25, 'C1A160023', '$2y$10$1no99AIypwYTKMJqASxr9uZeccwrVCvKw.n5.8tgBJQ2avAShOQL.', 'ASRI HARDIYANTI', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(26, 'C1A160024', '$2y$10$fE0A0xaN54finzOEJ/NHXeK99efNM5H8fowCBo1PopjYXEkZgAoWy', 'MOCH ALFAREDZA', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(28, 'C1A160026', '$2y$10$T4sAUN9S6yALFLzJr8EYE.3BwoEqKsCq6680mPWsWMfC4aKD0n.Wa', 'ADLI MADANIYAH', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(29, 'C1A160027', '$2y$10$zZUah3HUD8UOXOu/mYUqPeKGqttvuIOcgvgRuVxsmVj1.5MY4dyzu', 'MOCH DENNIS SUGIRI', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(30, 'C1A160028', '$2y$10$VcwqUxMNnTI0PwejgV7Zgu3ExNolYpxdnfQ7DrQMxq6v6DhI4uGE2', 'MOCH ILHAM BAHARI', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(31, 'C1A160029', '$2y$10$8HcaTM9RUj.Jl9JBmF1WY.LOB6LhcpNsRzyW0.0g3GjfZYRpFnrbi', 'M JAMIL ZAINU NOOR', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(32, 'C1A160031', '$2y$10$ageCFt3mMh3.MIb7cJCcc.JL4djt9QvlVbyXzSkUxy89PXsXwGgSq', 'ILZA FADILATUL HAQ', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(33, 'C1A160032', '$2y$10$jaRbWLHjrhQzncmdWA1zvOmiCP5UxcN2Oeuy6aAdlfR8.uuJ6q.Fi', 'GILANG RAMADAN', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(34, 'C1A160033', '$2y$10$m/XV5IJTDg9rMci5AOsQVOmmyaK36dSyhkYjnpKCRDLx4LPqIUGXO', 'FITRI ASYSYIFA', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(35, 'C1A160034', '$2y$10$HKGsreZEkCL7dAPoDGbcHeFAh5y6W5ezh2LAQUpdEmes0aKtNgCXC', 'AKBAR TAWAKAL PANCANANDITA', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(36, 'C1A160035', '$2y$10$5pV3xpTBngXsODUPsRkBhOg54D6qtoetvJxFxltYcmImz3XmaihMm', 'MULYADI', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(37, 'C1A160036', '$2y$10$Z2Auw3r.D4HaqauA8kVnV.3JjQsG7C2HUP4CAWjZLbBSQaTz3mAF6', 'GILANG HANGGARA', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(38, 'C1A160037', '$2y$10$V12mPRlw8DXOhJF0LwkYcO5aWERWwh1Nku5big0vNs9tnqYeSf7H6', 'HOTAMAL NURHOLIDIN', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(39, 'C1A160038', '$2y$10$jSwjzOexhGs3jlmsda2kUeMhXhu0JDz9S4BZ7JMlHpBjPXk0BB.py', 'ASEP NANANG', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(40, 'C1A160039', '$2y$10$vso1CLfND7075nWwDyYY9uDyk3bov9WCy2puBCW1CaHrvNRi5D0y.', 'YUSA NASER', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(41, 'C1A160040', '$2y$10$qLSQGn5qFocbvVoFtoFNX.3UqqCPbibYhnDpiMbPl9J3bqK1lCTiO', 'RIVAL MAULANA YUSUP', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(42, 'C1A160041', '$2y$10$DMTxBI33v8.v9R07gHNlauJDVVN1.kjZMTCH.l7V2Q8izm8e1Ad6C', 'NADILA ADELIA', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(43, 'C1A160042', '$2y$10$IVdwqW46yKV/Y0Mvr10AbuC3lLGGm7oSwZlJsi59RbdnYlMwzWU9u', 'RIZKI ADITIA', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(44, 'C1A160043', '$2y$10$VYN1d8/jhc87q7/wbmGwjee/9zeZTwp7Qd8oxgXQwKlaUzyINK6eG', 'ROYNA NASRULLOH', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(45, 'C1A160044', '$2y$10$b8rNQDwum0LBKdUvUUpScuJizN5VPZWp8P81fYpvp067u6AtCsJlW', 'RIZKY APRILIANSYAH', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(46, 'C1A160045', '$2y$10$QOGkZ9kVAYv3SNAnWHw6verqBsmuNrOdplbaoIslfq.mKN7QcsraW', 'AGUS EKA PURNAMA', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(47, 'C1A160046', '$2y$10$aqqdwbP3WcmDLxbZ5nUN2u3oeFL0RRBogU12Gr745ib36EYAzTtsG', 'RANDI SOLIHIN', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(48, 'C1A160047', '$2y$10$YxreWI8SpGr2.DsjVf7LfeYe/x3jkKeSFelhpBUwo11kxlX894n2G', 'M. WISNU AJI PURNOMO', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(49, 'C1A160048', '$2y$10$Irzn.45twNyr3Yd7ChfBKOxxOcQyL/hTpY.fUhMOR5ILMh5puhn4K', 'BOBBY NUGRAHA ARIFFIN', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(50, 'C1A160049', '$2y$10$r5Gij.1aI6DzV2LOi6kH1uLCRl2kTK2ATwt74Yw0K6uw7NmN31B0m', 'AGUNG DENIS GUNAWAN', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(51, 'C1A160050', '$2y$10$6ta2clcTqXdNX9FODlCoIuQopV9josL7S2Az./v.1ANqGCqRIx8ii', 'YADI SUPRIADI', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(52, 'C1A160051', '$2y$10$/xsZ8ocKDVSb6behKD6xVOMym6acqTduuzlxm.TcObzQLz.0RHmDW', 'ILHAM MUNAJIRIN', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(53, 'C1A160052', '$2y$10$aKGtnqVWGgP0kN1JU/Y0/.WT40BdOxlP88DDPpucxi5U3RbUp01hm', 'RD. ROBBIE NUR MUHAMMAD', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(54, 'C1A160053', '$2y$10$t58isF8h4/hQeQFnSQz/k.O/ao7OGu/oGZxMKA1p1T4kIKpfmsMJO', 'MUHAMAD HANIF RIDWANNULLOH', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(69, 'C1A160001', '$2y$10$ddiGsJrm1d5flDFJoWNS5ufWTJ/kOmv2mI58DlqXe4Jx7C.Xg.pCa', 'CANDRA PAMUNGKAS', 'Fakultas Teknologi Informasi', 'Teknik Informatika', '2016', '', '', '', 'mahasiswa'),
(70, 'C1B160001', '$2y$10$hL2YmPBbJX1SQiyhp.m4uuY5//YmxZz9hEbDVL8QnFhQ8V8lBCeVe', 'AGUNG APRIYADINDI', '', 'Sistem Informasi', '2016', '', '', '', 'mahasiswa'),
(71, 'C1B160002', '$2y$10$CdSGDkSdmdyTbPcNa7G/WeR4W7RKE0VzMSLK5eayM41E1l8OyJ6xm', 'ALDI RINALDI', '', 'Sistem Informasi', '2016', '', '', '', 'mahasiswa'),
(72, 'C1B160003', '$2y$10$q8O5G.3LdzUdI2jm7BIunuOwqrocMWKSPJyBIX1GVHBrx/UZdmHAm', 'ISMI ISLAHIDA', '', 'Sistem Informasi', '2016', '', '', '', 'mahasiswa'),
(73, 'C1B160004', '$2y$10$D54DQmxBgjyckSPXmglTKOOtM2HIpz1sUdYKxLapTnX8b6aXchZra', 'FAHRUL ROZI', '', 'Sistem Informasi', '2016', '', '', '', 'mahasiswa'),
(74, 'C1B160005', '$2y$10$r1LCKzk/0dltXC62kBBlKeko7R8nsEzcOwpei8nn5CvTIlhI/64EC', 'MEGANTARI SUHENDAR', '', 'Sistem Informasi', '2016', '', '', '', 'mahasiswa'),
(75, 'C1B160006', '$2y$10$tnbgqlFsAM2D5rRARfz7Tea/X3BnfWvdl82KOkEoBGR1IwBysuVA2', 'ASEP YUGA ANDRIYANSYAH', '', 'Sistem Informasi', '2016', '', '', '', 'mahasiswa'),
(76, 'C1B160007', '$2y$10$xqRONrAV5t.CbYraTmnsYuDhpM0YqF0Xg/p5SSxVLyYzqXccr08ua', 'LUDI ZAELANI', '', 'Sistem Informasi', '2016', '', '', '', 'mahasiswa'),
(77, 'C1B160008', '$2y$10$LswF/VDuJtIJ8t4Gg/ce9emMzLeekIOHas5RoAiUa39.Miba2gZt.', 'RIZKI MARTIANAUFAL JABIR', '', 'Sistem Informasi', '2016', '', '', '', 'mahasiswa'),
(78, 'C1B160009', '$2y$10$Fs8rBzNhh18dP8vU7.FnvuejF41iKLRFIo7m1jexv0IJmu5E9DNJ6', 'RISMA ALFIANI', '', 'Sistem Informasi', '2016', '', '', '', 'mahasiswa'),
(79, 'C1B160010', '$2y$10$SgF2DOgSVT8Iyq.oZWqEVec4Gh5IuT/DX1EknBe7huWBc3XOP7DiW', 'DEVI KUSWARDANI', '', 'Sistem Informasi', '2016', '', '', '', 'mahasiswa'),
(80, 'C1B160011', '$2y$10$Q7pK32Ra6TUcGDqGS45HnuyI6HHKGGI4soH3YPmZmaFX6SocELXy2', 'ANGEU NURDESNI', '', 'Sistem Informasi', '2016', '', '', '', 'mahasiswa'),
(81, 'C1B160012', '$2y$10$HfZIqx/YWi9iRb0IYV2D6.5sqlnnyPoDezM.3wHT74DtyBHXJbQxW', 'ASEP SOMANTRI', '', 'Sistem Informasi', '2016', '', '', '', 'mahasiswa'),
(82, 'C1B160013', '$2y$10$5JkGoZEZAZ9EKMIa40Onr.6jDICHOeprpk4hJPJikjMwf.sF2hBRe', 'HANY FUJIANTI', '', 'Sistem Informasi', '2016', '', '', '', 'mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` int(11) NOT NULL,
  `idmatakuliah` varchar(16) NOT NULL,
  `namamatakuliah` varchar(50) NOT NULL,
  `lembaga` varchar(50) NOT NULL,
  `semester` varchar(16) NOT NULL,
  `ganjilgenap` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `idmatakuliah`, `namamatakuliah`, `lembaga`, `semester`, `ganjilgenap`) VALUES
(113, 'TIF113', 'APLIKASI DASAR KOMPUTER', 'TIF', '1', 'Ganjil'),
(114, 'TIF114', 'BAHASA INDONESIA', 'TIF', '1', 'Ganjil'),
(115, 'TIF115', 'FISIKA DASAR', 'TIF', '1', 'Ganjil'),
(116, 'TIF116', 'KALKULUS 1', 'TIF', '1', 'Ganjil'),
(117, 'TIF117', 'PANCASILA', 'TIF', '1', 'Ganjil'),
(118, 'TIF118', 'PENGANTAR TEKNOLOGI INFORMASI', 'TIF', '1', 'Ganjil'),
(119, 'TIF119', 'PRAKTEK APLIKASI DASAR KOMPUTER', 'TIF', '1', 'Ganjil'),
(120, 'TIF120', 'PRAKTEK PENGANTAR PEMROGRAMAN', 'TIF', '2', 'Genap'),
(121, 'TIF121', 'FISIKA DASAR 2', 'TIF', '2', 'Genap'),
(122, 'TIF122', 'KONSEP TEKNOLOGI', 'TIF', '2', 'Genap'),
(123, 'TIF123', 'ALGORITMA DAN PEMROGRAMAN 2', 'TIF', '2', 'Genap'),
(124, 'TIF124', 'KALKULUS 2', 'TIF', '2', 'Genap'),
(125, 'TIF125', 'LOGIKA MATEMATIKA', 'TIF', '2', 'Genap'),
(126, 'TIF126', 'BAHASA INGGRIS', 'TIF', '2', 'Genap'),
(127, 'TIF127', 'AGAMA', 'TIF', '2', 'Genap'),
(129, 'TIF128', 'PEMROGRAMAN BERORIENTASI OBJEK', 'TIF', '3', 'Ganjil'),
(130, 'TIF130', 'INTERAKSI MANUSIA DAN KOMPUTER', 'TIF', '3', 'Ganjil'),
(131, 'TIF131', 'ORGANISASI DAN ARSITEKTUR KOMPUTER', 'TIF', '3', 'Ganjil'),
(132, 'TIF132', 'BAHASA PEMROGRAMAN TINGKAT RENDAH', 'TIF', '3', 'Ganjil'),
(133, 'TIF133', 'ALJABAR LINIER DAN MATRIK', 'TIF', '3', 'Ganjil'),
(134, 'TIF134', 'MATEMATIKA DISKRIT', 'TIF', '3', 'Ganjil'),
(135, 'TIF135', 'STATISTIK DAN PROBABILITAS', 'TIF', '3', 'Ganjil'),
(136, 'TIF136', 'STRUKTUR DATA', 'TIF', '3', 'Ganjil'),
(137, 'TIF137', 'GRAFIKA KOMPUTER', 'TIF', '4', 'Genap'),
(138, 'TIF138', 'SISTEM MULTIMEDIA', 'TIF', '4', 'Genap'),
(139, 'TIF139', 'OPERATION RESEARCH', 'TIF', '4', 'Genap'),
(140, 'TIF140', 'BASIS DATA', 'TIF', '4', 'Genap'),
(141, 'TIF141', 'INTELEGENSIA BUATAN', 'TIF', '4', 'Genap'),
(142, 'TIF142', 'OTOMATA DAN TEORI BAHASA', 'TIF', '4', 'Genap'),
(143, 'TIF143', 'METODE NUMERIK', 'TIF', '4', 'Genap'),
(144, 'TIF144', 'E-COMMERCE', 'TIF', '5', 'Ganjil'),
(145, 'TIF145', 'PEMODELAN DAN SIMULASI', 'TIF', '5', 'Ganjil'),
(146, 'TIF146', 'SISTEM BERKAS', 'TIF', '5', 'Ganjil'),
(147, 'TIF147', 'JARINGAN KOMPUTER', 'TIF', '5', 'Ganjil'),
(149, 'TIF149', 'REKAYASA PERANGKAT LUNAK', 'TIF', '5', 'Ganjil'),
(150, 'TIF150', 'SISTEM BASIS DATA', 'TIF', '5', 'Ganjil'),
(151, 'TIF151', 'TEKNIK KOMPILASI', 'TIF', '5', 'Ganjil'),
(152, 'TIF152', 'INTERPRETASI DAN PENGOLAHAN CITRA', 'TIF', '6', 'Genap'),
(153, 'TIF153', 'MANAJEMEN PROYEK PERANGKAT LUNAK', 'TIF', '6', 'Genap'),
(154, 'TIF154', 'PEMROGRAMAN INTERNET', 'TIF', '6', 'Genap'),
(155, 'TIF155', 'SISTEM INFORMASI MANAJEMEN', 'TIF', '6', 'Genap'),
(156, 'TIF156', 'METODE PENELITIAN', 'TIF', '6', 'Genap'),
(157, 'TIF157', 'KRIFTOGRAFI (MK PILIHAN)', 'TIF', '6', 'Genap'),
(158, 'TIF158', 'MICROKONTROLER (MK PILIHAN)', 'TIF', '6', 'Genap'),
(159, 'TIF159', 'TEKNIK ANIMASI (MK PILIHAN)', 'TIF', '6', 'Genap'),
(160, 'TIF160', 'WIRELESS/MOBILE COMPUTING (MK PILIHAN)', 'TIF', '6', 'Genap'),
(161, 'TIF161', 'KKN', 'TIF', '7', 'Ganjil'),
(162, 'TIF162', 'PENGANTAR KEWIRAUSAHAAN', 'TIF', '7', 'Ganjil'),
(163, 'TIF163', 'SISTEM INFORMASI GEOGRAFIS', 'TIF', '7', 'Ganjil'),
(164, 'TIF164', 'TOPIK KHUSUS', 'TIF', '7', 'Ganjil'),
(165, 'TIF165', 'DATA ANALISYS (MK PILIHAN)', 'TIF', '7', 'Ganjil'),
(166, 'TIF166', 'NEURO COMPUTING', 'TIF', '7', 'Ganjil'),
(167, 'TIF167', 'PROYEK PERANGKAT LUNAK (MK PILIHAN)', 'TIF', '7', 'Ganjil'),
(168, 'TIF168', 'ETIKA PROFESI', 'TIF', '7', 'Ganjil'),
(169, 'TIF169', 'KEWARGANEGARAAN', 'TIF', '7', 'Ganjil'),
(170, 'TIF170', 'KERJA PRAKTEK', 'TIF', '7', 'Ganjil'),
(171, 'TIF171', 'SKRIPSI', 'TIF', '8', 'Genap'),
(172, 'SIF172', 'ALGORITMA DAN PEMROGRAMAN 1', 'SIF', '1', 'Ganjil'),
(173, 'SIF173', 'TEORI ORGANISASI UMUM', 'SIF', '1', 'Ganjil'),
(174, 'SIF174', 'PENGANTAR MANAJEMEN UMUM', 'SIF', '1', 'Ganjil'),
(175, 'SIF175', 'APLIKASI DASAR KOMPUTER', 'SIF', '1', 'Ganjil'),
(176, 'SIF176', 'KALKULUS 1', 'SIF', '1', 'Ganjil'),
(177, 'SIF177', 'BAHASA INDONESIA', 'SIF', '1', 'Ganjil'),
(178, 'SIF178', 'PANCASILA', 'SIF', '1', 'Ganjil'),
(179, 'SIF179', 'PENGANTAR TEKNOLOGI INFORMASI', 'SIF', '1', 'Ganjil'),
(180, 'SIF180', 'ALGORITMA DAN PEMROGRAMAN 2', 'SIF', '2', 'Genap'),
(181, 'SIF181', 'TEORI AKUNTANSI', 'SIF', '2', 'Genap'),
(182, 'SIF182', 'KONSEP SISTEM INFORMASI', 'SIF', '2', 'Genap'),
(183, 'SIF183', 'BASIS DATA', 'SIF', '2', 'Genap'),
(184, 'SIF184', 'BAHASA INGGRIS', 'SIF', '2', 'Genap'),
(185, 'SIF185', 'PRAKTIKUM PENGANTAR PEMROGRAMAN', 'SIF', '2', 'Genap'),
(186, 'SIF186', 'KALKULUS 2', 'SIF', '2', 'Genap'),
(187, 'SIF187', 'AGAMA', 'SIF', '2', 'Genap'),
(188, 'SIF188', 'STRUKTUR DATA', 'SIF', '3', 'Ganjil'),
(189, 'SIF189', 'INTERAKSI MANUSIA DAN KOMPUTER', 'SIF', '3', 'Ganjil'),
(190, 'SIF190', 'SISTEM BASIS DATA', 'SIF', '3', 'Ganjil'),
(191, 'SIF191', 'SISTEM INFORMASI AKUNTANSI', 'SIF', '3', 'Ganjil'),
(192, 'SIF192', 'MATEMATIKA DISKRIT', 'SIF', '3', 'Ganjil'),
(193, 'SIF193', 'ALJABAR LINIER DAN MATRIKS', 'SIF', '3', 'Ganjil'),
(194, 'SIF194', 'STATISTIK DAN PROBABILITAS', 'SIF', '3', 'Ganjil'),
(201, 'SIF195', 'SISTEM OPERASI', 'SIF', '4', 'Genap'),
(202, 'SIF202', 'PEMROGRAMAN VISUAL', 'SIF', '4', 'Genap'),
(203, 'SIF203', 'PEMROGRAMAN BERBASIS WEB', 'SIF', '4', 'Genap'),
(204, 'SIF204', 'SISTEM INFORMASI MANAJEMEN', 'SIF', '4', 'Genap'),
(205, 'SIF205', 'ANALISIS DAN PERANCANGAN SI', 'SIF', '4', 'Genap'),
(206, 'SIF206', 'DATA WAREHOUSING', 'SIF', '4', 'Genap'),
(207, 'SIF207', 'E-BUSINESS', 'SIF', '4', 'Genap'),
(208, 'SIF208', 'JARINGAN KOMPUTER', 'SIF', '5', 'Ganjil'),
(209, 'SIF209', 'RISET OPERASIONAL', 'SIF', '5', 'Ganjil'),
(210, 'SIF210', 'INTELEGENSIA BUATAN', 'SIF', '5', 'Ganjil'),
(211, 'SIF211', 'SI MANUFAKTUR (MK PILIHAN)', 'SIF', '5', 'Ganjil'),
(212, 'SIF212', 'SISTEM INFORMASI GEOGRAFIS (MK PILIHAN)', 'SIF', '5', 'Ganjil'),
(213, 'SIF213', 'SISTEM PENUNJANG KEPUTUSAN (MK PILIHAN)', 'SIF', '5', 'Ganjil'),
(214, 'SIF214', 'PENGELOLAAN SISTEM INFORMASI', 'SIF', '5', 'Ganjil'),
(215, 'SIF215', 'KERJA PRAKTEK', 'SIF', '5', 'Ganjil'),
(216, 'SIF216', 'METODE PENELITIAN', 'SIF', '6', 'Genap'),
(217, 'SIF217', 'TESTING DAN IMPLEMENTASI SISTEM', 'SIF', '6', 'Genap'),
(218, 'SIF218', 'ANALISA KINERJA SISTEM', 'SIF', '6', 'Genap'),
(219, 'SIF219', 'PENGEMBANGAN SI', 'SIF', '6', 'Genap'),
(220, 'SIF220', 'SI MANUFAKTUR 2 (MK PILIHAN)', 'SIF', '6', 'Genap'),
(221, 'SIF221', 'DATA MINING (MK PILIHAN)', 'SIF', '6', 'Genap'),
(222, 'SIF222', 'KRIFTOGRAFI', 'SIF', '6', 'Genap'),
(223, 'SIF223', 'PENGELOLAAN PROYEK SI', 'SIF', '7', 'Ganjil'),
(224, 'SIF224', 'PERENCANAAN STRATEGIS SI (MK PILIHAN)', 'SIF', '7', 'Ganjil'),
(225, 'SIF225', 'KEWARGANEGARAAN', 'SIF', '7', 'Ganjil'),
(226, 'SIF226', 'PENGANTAR KEWIRAUSAHAAN', 'SIF', '7', 'Ganjil'),
(227, 'SIF227', 'TOPIK KHUSUS', 'SIF', '7', 'Ganjil'),
(228, 'SIF228', 'ETIKA PROFESI', 'SIF', '7', 'Ganjil'),
(229, 'SIF229', 'KKN', 'SIF', '7', 'Ganjil'),
(230, 'SIF230', 'SKRIPSI', 'SIF', '8', 'Genap'),
(231, 'TIF231', 'ALGORITMA DAN PEMROGRAMAN 1', 'TIF', '1', 'Ganjil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilaipermtk`
--

CREATE TABLE `nilaipermtk` (
  `id` varchar(255) NOT NULL,
  `NIM` varchar(16) NOT NULL,
  `idmatakuliah` varchar(16) NOT NULL,
  `idjadwalujian` varchar(16) NOT NULL,
  `nilai` varchar(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilaiujianharian`
--

CREATE TABLE `nilaiujianharian` (
  `id` varchar(255) NOT NULL,
  `NIM` varchar(16) NOT NULL,
  `idmatakuliah` varchar(16) NOT NULL,
  `idjadwalujianharian` int(16) NOT NULL,
  `nilai` varchar(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilaiujiansusulan`
--

CREATE TABLE `nilaiujiansusulan` (
  `id` varchar(255) NOT NULL,
  `NIM` varchar(16) NOT NULL,
  `idmatakuliah` varchar(50) NOT NULL,
  `idjadwalujiansusulan` varchar(50) NOT NULL,
  `nilai` varchar(16) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `skajar`
--

CREATE TABLE `skajar` (
  `id` int(11) NOT NULL,
  `namask` varchar(255) NOT NULL,
  `tahunajaran` varchar(50) NOT NULL,
  `idmatakuliah` varchar(50) NOT NULL,
  `namadosen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skajar`
--

INSERT INTO `skajar` (`id`, `namask`, `tahunajaran`, `idmatakuliah`, `namadosen`) VALUES
(544, '2016/2017-Ganjil/TIF112', '2016/2017-Ganjil', 'TIF112', 'Rustiyana, S.T., M.T,'),
(545, '2016/2017-Ganjil/TIF113', '2016/2017-Ganjil', 'TIF113', 'Denny Rusdianto, S.T., M.Kom,'),
(546, '2016/2017-Ganjil/TIF114', '2016/2017-Ganjil', 'TIF114', 'Muhamad Hanif Ridwannulloh'),
(547, '2016/2017-Ganjil/TIF115', '2016/2017-Ganjil', 'TIF115', 'Nurul Imamah, S.T., M.T,'),
(548, '2016/2017-Ganjil/TIF116', '2016/2017-Ganjil', 'TIF116', 'Maria Evakori, S.T,'),
(549, '2016/2017-Ganjil/TIF117', '2016/2017-Ganjil', 'TIF117', 'Muhamad Hanif Ridwannulloh'),
(550, '2016/2017-Ganjil/TIF118', '2016/2017-Ganjil', 'TIF118', 'Aries Budi Kurniawan, S.T., M.M,'),
(551, '2016/2017-Ganjil/TIF119', '2016/2017-Ganjil', 'TIF119', 'Denny Rusdianto, S.T., M.Kom,'),
(552, '2016/2017-Ganjil/TIF128', '2016/2017-Ganjil', 'TIF128', 'Mochamad Ridwan, S.T., M.Kom,'),
(553, '2016/2017-Ganjil/TIF130', '2016/2017-Ganjil', 'TIF130', 'Sutiyono, S.T., M.Kom,'),
(554, '2016/2017-Ganjil/TIF131', '2016/2017-Ganjil', 'TIF131', 'Rustiyana, S.T., M.T,'),
(555, '2016/2017-Ganjil/TIF132', '2016/2017-Ganjil', 'TIF132', 'Iyus Muslimin, S.T., M.T,'),
(556, '2016/2017-Ganjil/TIF133', '2016/2017-Ganjil', 'TIF133', 'Yaya Suharya, S.Kom., M.T,'),
(557, '2016/2017-Ganjil/TIF134', '2016/2017-Ganjil', 'TIF134', 'Aries Budi Kurniawan, S.T., M.M,'),
(558, '2016/2017-Ganjil/TIF135', '2016/2017-Ganjil', 'TIF135', 'Rosmalina, S.T., M.Kom'),
(559, '2016/2017-Ganjil/TIF136', '2016/2017-Ganjil', 'TIF136', 'Mochamad Ridwan, S.T., M.Kom,'),
(560, '2016/2017-Ganjil/TIF144', '2016/2017-Ganjil', 'TIF144', 'Yudi Herdiana, S.T., M.T,'),
(561, '2016/2017-Ganjil/TIF145', '2016/2017-Ganjil', 'TIF145', 'Nurul Imamah, S.T., M.T,'),
(562, '2016/2017-Ganjil/TIF146', '2016/2017-Ganjil', 'TIF146', 'Mochamad Ridwan, S.T., M.Kom,'),
(563, '2016/2017-Ganjil/TIF147', '2016/2017-Ganjil', 'TIF147', 'Yaya Suharya, S.Kom., M.T,'),
(565, '2016/2017-Ganjil/TIF149', '2016/2017-Ganjil', 'TIF149', 'Muhamad Hanif Ridwannulloh'),
(566, '2016/2017-Ganjil/TIF150', '2016/2017-Ganjil', 'TIF150', 'Yudi Herdiana, S.T., M.T,'),
(567, '2016/2017-Ganjil/TIF151', '2016/2017-Ganjil', 'TIF151', 'Rosmalina, S.T., M.Kom'),
(568, '2016/2017-Ganjil/TIF161', '2016/2017-Ganjil', 'TIF161', 'Muhamad Hanif Ridwannulloh'),
(569, '2016/2017-Ganjil/TIF162', '2016/2017-Ganjil', 'TIF162', 'Muhamad Hanif Ridwannulloh'),
(570, '2016/2017-Ganjil/TIF163', '2016/2017-Ganjil', 'TIF163', 'Muhamad Hanif Ridwannulloh'),
(571, '2016/2017-Ganjil/TIF164', '2016/2017-Ganjil', 'TIF164', 'Yudi Herdiana, S.T., M.T,'),
(572, '2016/2017-Ganjil/TIF165', '2016/2017-Ganjil', 'TIF165', 'Yudi Herdiana, S.T., M.T,'),
(573, '2016/2017-Ganjil/TIF166', '2016/2017-Ganjil', 'TIF166', 'Rosmalina, S.T., M.Kom'),
(574, '2016/2017-Ganjil/TIF167', '2016/2017-Ganjil', 'TIF167', 'Aries Budi Kurniawan, S.T., M.M,'),
(575, '2016/2017-Ganjil/TIF168', '2016/2017-Ganjil', 'TIF168', 'Yudi Herdiana, S.T., M.T,'),
(576, '2016/2017-Ganjil/TIF169', '2016/2017-Ganjil', 'TIF169', 'Muhamad Hanif Ridwannulloh'),
(577, '2016/2017-Ganjil/TIF170', '2016/2017-Ganjil', 'TIF170', 'maman suparmam'),
(578, '2016/2017-Ganjil/SIF172', '2016/2017-Ganjil', 'SIF172', 'Muhamad Hanif Ridwannulloh'),
(579, '2016/2017-Ganjil/SIF173', '2016/2017-Ganjil', 'SIF173', 'maman suparmam'),
(580, '2016/2017-Ganjil/SIF174', '2016/2017-Ganjil', 'SIF174', 'Rosmalina, S.T., M.Kom'),
(581, '2016/2017-Ganjil/SIF175', '2016/2017-Ganjil', 'SIF175', 'Aries Budi Kurniawan, S.T., M.M,'),
(582, '2016/2017-Ganjil/SIF176', '2016/2017-Ganjil', 'SIF176', 'Denny Rusdianto, S.T., M.Kom,'),
(583, '2016/2017-Ganjil/SIF177', '2016/2017-Ganjil', 'SIF177', 'Sutiyono, S.T., M.Kom,'),
(584, '2016/2017-Ganjil/SIF178', '2016/2017-Ganjil', 'SIF178', 'Mochamad Ridwan, S.T., M.Kom,'),
(585, '2016/2017-Ganjil/SIF179', '2016/2017-Ganjil', 'SIF179', 'Maria Evakori, S.T,'),
(586, '2016/2017-Ganjil/SIF188', '2016/2017-Ganjil', 'SIF188', 'Yudi Herdiana, S.T., M.T,'),
(587, '2016/2017-Ganjil/SIF189', '2016/2017-Ganjil', 'SIF189', 'Rustiyana, S.T., M.T,'),
(588, '2016/2017-Ganjil/SIF190', '2016/2017-Ganjil', 'SIF190', 'Iyus Muslimin, S.T., M.T,'),
(589, '2016/2017-Ganjil/SIF191', '2016/2017-Ganjil', 'SIF191', 'Yaya Suharya, S.Kom., M.T,'),
(590, '2016/2017-Ganjil/SIF192', '2016/2017-Ganjil', 'SIF192', 'Nurul Imamah, S.T., M.T,'),
(591, '2016/2017-Ganjil/SIF193', '2016/2017-Ganjil', 'SIF193', 'Muhamad Hanif Ridwannulloh'),
(592, '2016/2017-Ganjil/SIF194', '2016/2017-Ganjil', 'SIF194', 'maman suparmam'),
(593, '2016/2017-Ganjil/SIF208', '2016/2017-Ganjil', 'SIF208', 'Rosmalina, S.T., M.Kom'),
(594, '2016/2017-Ganjil/SIF209', '2016/2017-Ganjil', 'SIF209', 'Rosmalina, S.T., M.Kom'),
(595, '2016/2017-Ganjil/SIF210', '2016/2017-Ganjil', 'SIF210', 'Aries Budi Kurniawan, S.T., M.M,'),
(596, '2016/2017-Ganjil/SIF211', '2016/2017-Ganjil', 'SIF211', 'Denny Rusdianto, S.T., M.Kom,'),
(597, '2016/2017-Ganjil/SIF212', '2016/2017-Ganjil', 'SIF212', 'Sutiyono, S.T., M.Kom,'),
(598, '2016/2017-Ganjil/SIF213', '2016/2017-Ganjil', 'SIF213', 'Mochamad Ridwan, S.T., M.Kom,'),
(599, '2016/2017-Ganjil/SIF214', '2016/2017-Ganjil', 'SIF214', 'Maria Evakori, S.T,'),
(600, '2016/2017-Ganjil/SIF215', '2016/2017-Ganjil', 'SIF215', 'Yudi Herdiana, S.T., M.T,'),
(601, '2016/2017-Ganjil/SIF223', '2016/2017-Ganjil', 'SIF223', 'Rustiyana, S.T., M.T,'),
(602, '2016/2017-Ganjil/SIF224', '2016/2017-Ganjil', 'SIF224', 'Iyus Muslimin, S.T., M.T,'),
(603, '2016/2017-Ganjil/SIF225', '2016/2017-Ganjil', 'SIF225', 'Iyus Muslimin, S.T., M.T,'),
(604, '2016/2017-Ganjil/SIF226', '2016/2017-Ganjil', 'SIF226', 'Yaya Suharya, S.Kom., M.T,'),
(605, '2016/2017-Ganjil/SIF227', '2016/2017-Ganjil', 'SIF227', 'Nurul Imamah, S.T., M.T,'),
(606, '2016/2017-Ganjil/SIF228', '2016/2017-Ganjil', 'SIF228', 'Muhamad Hanif Ridwannulloh'),
(608, '2016/2017-Genap/TIF120', '2016/2017-Genap', 'TIF120', ''),
(609, '2016/2017-Genap/TIF121', '2016/2017-Genap', 'TIF121', ''),
(610, '2016/2017-Genap/TIF122', '2016/2017-Genap', 'TIF122', ''),
(611, '2016/2017-Genap/TIF123', '2016/2017-Genap', 'TIF123', ''),
(612, '2016/2017-Genap/TIF124', '2016/2017-Genap', 'TIF124', ''),
(613, '2016/2017-Genap/TIF125', '2016/2017-Genap', 'TIF125', ''),
(614, '2016/2017-Genap/TIF126', '2016/2017-Genap', 'TIF126', ''),
(615, '2016/2017-Genap/TIF127', '2016/2017-Genap', 'TIF127', ''),
(616, '2016/2017-Genap/TIF137', '2016/2017-Genap', 'TIF137', ''),
(617, '2016/2017-Genap/TIF138', '2016/2017-Genap', 'TIF138', ''),
(618, '2016/2017-Genap/TIF139', '2016/2017-Genap', 'TIF139', ''),
(619, '2016/2017-Genap/TIF140', '2016/2017-Genap', 'TIF140', ''),
(620, '2016/2017-Genap/TIF141', '2016/2017-Genap', 'TIF141', ''),
(621, '2016/2017-Genap/TIF142', '2016/2017-Genap', 'TIF142', ''),
(622, '2016/2017-Genap/TIF143', '2016/2017-Genap', 'TIF143', ''),
(623, '2016/2017-Genap/TIF152', '2016/2017-Genap', 'TIF152', ''),
(624, '2016/2017-Genap/TIF153', '2016/2017-Genap', 'TIF153', ''),
(625, '2016/2017-Genap/TIF154', '2016/2017-Genap', 'TIF154', ''),
(626, '2016/2017-Genap/TIF155', '2016/2017-Genap', 'TIF155', ''),
(627, '2016/2017-Genap/TIF156', '2016/2017-Genap', 'TIF156', ''),
(628, '2016/2017-Genap/TIF157', '2016/2017-Genap', 'TIF157', ''),
(629, '2016/2017-Genap/TIF158', '2016/2017-Genap', 'TIF158', ''),
(630, '2016/2017-Genap/TIF159', '2016/2017-Genap', 'TIF159', ''),
(631, '2016/2017-Genap/TIF160', '2016/2017-Genap', 'TIF160', ''),
(632, '2016/2017-Genap/TIF171', '2016/2017-Genap', 'TIF171', ''),
(633, '2016/2017-Genap/SIF180', '2016/2017-Genap', 'SIF180', ''),
(634, '2016/2017-Genap/SIF181', '2016/2017-Genap', 'SIF181', ''),
(635, '2016/2017-Genap/SIF182', '2016/2017-Genap', 'SIF182', ''),
(636, '2016/2017-Genap/SIF183', '2016/2017-Genap', 'SIF183', ''),
(637, '2016/2017-Genap/SIF184', '2016/2017-Genap', 'SIF184', ''),
(638, '2016/2017-Genap/SIF185', '2016/2017-Genap', 'SIF185', ''),
(639, '2016/2017-Genap/SIF186', '2016/2017-Genap', 'SIF186', ''),
(640, '2016/2017-Genap/SIF187', '2016/2017-Genap', 'SIF187', ''),
(641, '2016/2017-Genap/SIF195', '2016/2017-Genap', 'SIF195', ''),
(642, '2016/2017-Genap/SIF202', '2016/2017-Genap', 'SIF202', ''),
(643, '2016/2017-Genap/SIF203', '2016/2017-Genap', 'SIF203', ''),
(644, '2016/2017-Genap/SIF204', '2016/2017-Genap', 'SIF204', ''),
(645, '2016/2017-Genap/SIF205', '2016/2017-Genap', 'SIF205', ''),
(646, '2016/2017-Genap/SIF206', '2016/2017-Genap', 'SIF206', ''),
(647, '2016/2017-Genap/SIF207', '2016/2017-Genap', 'SIF207', ''),
(648, '2016/2017-Genap/SIF216', '2016/2017-Genap', 'SIF216', ''),
(649, '2016/2017-Genap/SIF217', '2016/2017-Genap', 'SIF217', ''),
(650, '2016/2017-Genap/SIF218', '2016/2017-Genap', 'SIF218', ''),
(651, '2016/2017-Genap/SIF219', '2016/2017-Genap', 'SIF219', ''),
(652, '2016/2017-Genap/SIF220', '2016/2017-Genap', 'SIF220', ''),
(653, '2016/2017-Genap/SIF221', '2016/2017-Genap', 'SIF221', ''),
(654, '2016/2017-Genap/SIF222', '2016/2017-Genap', 'SIF222', ''),
(655, '2016/2017-Genap/SIF230', '2016/2017-Genap', 'SIF230', ''),
(656, '2016/2017-Ganjil/SIF229', '2016/2017-Ganjil', 'SIF229', 'maman suparmam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `idsoal` int(11) NOT NULL,
  `idmatakuliah` varchar(16) NOT NULL,
  `idjadwalujian` varchar(16) NOT NULL,
  `soal` text NOT NULL,
  `pilihanganda` text NOT NULL,
  `jawabansoal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `soalujianharian`
--

CREATE TABLE `soalujianharian` (
  `idsoal` int(11) NOT NULL,
  `kodeujianharian` varchar(255) NOT NULL,
  `soal` text NOT NULL,
  `pilihanganda` text NOT NULL,
  `jawabansoal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahunajaran`
--

CREATE TABLE `tahunajaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tahunajaran` varchar(50) NOT NULL,
  `semester` varchar(16) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahunajaran`
--

INSERT INTO `tahunajaran` (`id`, `nama`, `tahunajaran`, `semester`, `status`) VALUES
(10, '2016/2017-Ganjil', '2016/2017', 'Ganjil', 'Aktif'),
(11, '2017/2018-Ganjil', '2017/2018', 'Ganjil', 'Tidak Aktif'),
(12, '2018/2019-Ganjil', '2018/2019', 'Ganjil', 'Tidak Aktif'),
(13, '2020/2021-Ganjil', '2020/2021', 'Ganjil', 'Tidak Aktif'),
(14, '2019/2020-Ganjil', '2019/2020', 'Ganjil', 'Tidak Aktif'),
(17, '2016/2017-Genap', '2016/2017', 'Genap', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujianharian`
--

CREATE TABLE `ujianharian` (
  `id` int(11) NOT NULL,
  `kodeujianharian` varchar(255) NOT NULL,
  `idmatakuliah` varchar(50) NOT NULL,
  `tahunajaran` varchar(50) NOT NULL,
  `waktupelaksanaan` datetime NOT NULL,
  `durasiujian` int(11) NOT NULL,
  `ketentuanujian` text NOT NULL,
  `angkatan` varchar(16) NOT NULL,
  `status` varchar(50) NOT NULL,
  `soaltampil` int(11) NOT NULL,
  `kodeujian` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujiansusulan`
--

CREATE TABLE `ujiansusulan` (
  `id` int(11) NOT NULL,
  `kodeujiansusulan` varchar(255) NOT NULL,
  `idjadwalujian` varchar(10) NOT NULL,
  `tahunajaran` varchar(50) NOT NULL,
  `waktupelaksanaan` datetime NOT NULL,
  `NIM` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`,`password`,`nama`,`NIDN`,`email`,`token`,`nohp`,`level`);

--
-- Indexes for table `angkatan`
--
ALTER TABLE `angkatan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`,`nama`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `NIDN` (`NIDN`),
  ADD KEY `namadosen` (`namadosen`),
  ADD KEY `id` (`id`),
  ADD KEY `username_2` (`username`),
  ADD KEY `NIDN_2` (`NIDN`),
  ADD KEY `id_2` (`id`,`username`,`namadosen`,`password`,`NIDN`,`email`,`nohp`,`norek`,`level`);

--
-- Indexes for table `jadwalujianmatakuliah`
--
ALTER TABLE `jadwalujianmatakuliah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `namaujian` (`namaujian`),
  ADD KEY `id` (`id`,`idjenisujian`,`namaujian`,`idmatakuliah`,`angkatan`,`programstudi`,`waktupelaksanaan`,`durasiujian`,`status`,`soaltampil`);

--
-- Indexes for table `jawabanujianharianmhs`
--
ALTER TABLE `jawabanujianharianmhs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`NIM`,`soal`,`pilihanjawaban`,`kodeujianharian`,`status`),
  ADD KEY `soal` (`soal`),
  ADD KEY `NIM` (`NIM`);

--
-- Indexes for table `jawabanujianmhs`
--
ALTER TABLE `jawabanujianmhs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`NIM`,`soal`,`pilihanjawaban`,`idnilaimtk`,`status`);

--
-- Indexes for table `jenisujian`
--
ALTER TABLE `jenisujian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `namaujian` (`namaujian`),
  ADD KEY `id` (`id`,`namaujian`,`tipeujian`,`tahunajaran`),
  ADD KEY `tahunajaran` (`tahunajaran`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `NIM` (`NIM`),
  ADD KEY `NIM_2` (`NIM`),
  ADD KEY `id` (`id`,`NIM`,`password`,`namamahasiswa`,`lembaga`,`programstudi`,`angkatan`,`email`,`nohp`,`level`),
  ADD KEY `angkatan` (`angkatan`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idmatakuliah` (`idmatakuliah`),
  ADD KEY `idmatakuliah_2` (`idmatakuliah`),
  ADD KEY `id` (`id`,`idmatakuliah`,`namamatakuliah`,`lembaga`,`semester`,`ganjilgenap`);

--
-- Indexes for table `nilaipermtk`
--
ALTER TABLE `nilaipermtk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`NIM`,`idmatakuliah`,`idjadwalujian`,`nilai`,`status`);

--
-- Indexes for table `nilaiujianharian`
--
ALTER TABLE `nilaiujianharian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`NIM`,`idmatakuliah`,`idjadwalujianharian`,`nilai`,`status`),
  ADD KEY `idjadwalujianharian` (`idjadwalujianharian`);

--
-- Indexes for table `nilaiujiansusulan`
--
ALTER TABLE `nilaiujiansusulan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`NIM`,`idmatakuliah`,`idjadwalujiansusulan`,`nilai`,`status`);

--
-- Indexes for table `skajar`
--
ALTER TABLE `skajar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmatakuliah` (`idmatakuliah`),
  ADD KEY `namadosen` (`namadosen`),
  ADD KEY `tahunajaran` (`tahunajaran`),
  ADD KEY `namask` (`namask`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`idsoal`),
  ADD KEY `idsoal` (`idsoal`,`idmatakuliah`,`idjadwalujian`,`jawabansoal`);

--
-- Indexes for table `soalujianharian`
--
ALTER TABLE `soalujianharian`
  ADD PRIMARY KEY (`idsoal`),
  ADD KEY `idsoal` (`idsoal`,`kodeujianharian`,`jawabansoal`);

--
-- Indexes for table `tahunajaran`
--
ALTER TABLE `tahunajaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD KEY `nama_2` (`nama`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`,`nama`,`tahunajaran`,`semester`,`status`);

--
-- Indexes for table `ujianharian`
--
ALTER TABLE `ujianharian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kodeujianharian` (`kodeujianharian`),
  ADD KEY `id` (`id`,`kodeujianharian`,`idmatakuliah`,`tahunajaran`,`waktupelaksanaan`,`durasiujian`,`angkatan`,`status`,`soaltampil`,`kodeujian`),
  ADD KEY `angkatan` (`angkatan`),
  ADD KEY `tahunajaran` (`tahunajaran`);

--
-- Indexes for table `ujiansusulan`
--
ALTER TABLE `ujiansusulan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kodeujiansusulan` (`kodeujiansusulan`),
  ADD KEY `id` (`id`,`kodeujiansusulan`,`idjadwalujian`,`waktupelaksanaan`,`NIM`,`status`),
  ADD KEY `tahunajaran` (`tahunajaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angkatan`
--
ALTER TABLE `angkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `jadwalujianmatakuliah`
--
ALTER TABLE `jadwalujianmatakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `jawabanujianharianmhs`
--
ALTER TABLE `jawabanujianharianmhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `jawabanujianmhs`
--
ALTER TABLE `jawabanujianmhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=498;

--
-- AUTO_INCREMENT for table `jenisujian`
--
ALTER TABLE `jenisujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `skajar`
--
ALTER TABLE `skajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=657;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `idsoal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `soalujianharian`
--
ALTER TABLE `soalujianharian`
  MODIFY `idsoal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tahunajaran`
--
ALTER TABLE `tahunajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ujianharian`
--
ALTER TABLE `ujianharian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ujiansusulan`
--
ALTER TABLE `ujiansusulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
