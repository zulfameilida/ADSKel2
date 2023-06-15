-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2023 at 07:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roomieboomie`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `ID` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `tingkat` varchar(255) NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `org_person` varchar(255) NOT NULL,
  `borrow_date` date NOT NULL,
  `borrow_time` time(6) NOT NULL,
  `room` varchar(255) NOT NULL,
  `borrow_cat` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`ID`, `name`, `nim`, `tingkat`, `org_name`, `org_person`, `borrow_date`, `borrow_time`, `room`, `borrow_cat`, `keterangan`) VALUES
(1, 'Acumalaka', 'G6601201099', '1', 'Himalkom IPB', '111', '2002-11-11', '11:11:00.000000', '1', '1', ' Test'),
(2, 'Ridho K', 'G6401201099', '1', 'Himalkom IPB', '132', '2023-07-10', '11:56:00.000000', '1', '1', ' Seminar Nasional'),
(3, 'Acumalaka', 'G6601201099', '1', 'Himalkom IPB', '132', '2023-10-06', '10:30:00.000000', '3', '1', ' Apacoba');

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `book_id` int(11) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `nim` int(11) DEFAULT NULL,
  `tingkat_organisasi` varchar(25) DEFAULT NULL,
  `nama_organisasi` varchar(25) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `waktu_pinjam` time DEFAULT NULL,
  `ruang` varchar(100) DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_booking`
--

INSERT INTO `tb_booking` (`book_id`, `nama`, `nim`, `tingkat_organisasi`, `nama_organisasi`, `jumlah`, `tgl_pinjam`, `waktu_pinjam`, `ruang`, `kategori`, `keterangan`) VALUES
(1, 'jonnyyespapa', 20230102, 'Fakultas', 'BEM', 12, '2023-05-27', '09:48:00', 'CCR 2.14', 'Rapat', 'Rapat besar'),
(2, 'purposeexotic', 20230103, 'IPB', 'BEM', 12, '2023-05-27', '09:48:00', 'Auditorium FMIPA', 'Rapat', 'Rapat besar'),
(3, 'quitbracelet', 20230203, 'Internasional', 'HMP', 23, '2023-05-17', '12:09:00', 'Gymnasium', 'Rapat', 'Harian'),
(4, 'otterabalone', 20230501, 'IPB', 'BEM', 12, '2023-05-04', '04:11:00', 'CCR 2.14', 'Rapat', 'Musyawarah Luar Biasa'),
(5, 'martenmeadowlark', 20230109, 'Internasional', 'Majalah', 12, '2023-05-31', '11:18:00', 'Auditorium FMIPA', 'Rapat', 'Program Kerja'),
(11, 'asepsurya', 20230101, 'Departemen', 'BEM', 12, '2023-05-31', '10:30:00', 'Gymnasium', 'Seminar', 'Rapat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruangan`
--

CREATE TABLE `tb_ruangan` (
  `ruangan_id` int(11) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `tersedia` varchar(50) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`ruangan_id`, `nama_ruangan`, `lokasi`, `tersedia`, `keterangan`, `gambar`) VALUES
(4, 'Lab Komputer 1 ILKOM', 'Lab Kom', 'Available', 'Untuk menunjang kegiatan belajar mengajar, Departemen Ilmu Komputer dilengkapi dengan tiga buah laboratorium komputer. Terdapat dua lab dengan kapasitas masing-masing 50 unit komputer dan satu lab dengan kapasitas 48 unit komputer. Selain itu, kampus IPB Dramaga juga dilengkapi dengan Laboratorium Robotika untuk keperluan pembelajaran sistem tertanam dan robotika serta Laboratorium Multimedia untuk keperluan pengembangan aplikasi multimedia dan pemindaian trimatra (tiga dimensi).', 'uploadslabkom2.jpg'),
(7, 'CCR 2.14', 'CCR 2.14', 'Available', 'CCR merupakan salah satu gedung perkuliahan yang ada di IPB Dramaga. Umumnya untuk perkuliahan mahasiswa PKU. Terdapat beberapa ruangan yang dapat dipinjam yaitu ruang kelas hingga audit CCR', '../asset/upload/ccr.jpg'),
(8, 'Auditorium FMIPA', 'Jalan Agatis', 'Available', 'Auditiorium FMIPA (Fakultas Matematika dan Ilmu Pengetahuan Alam) berlokasi di Jalan Agatis Kampus Dramaga IPB yang berdekatan dengan Departemen Biologi dan Departemen Kimia dan berada diseberang Masid Al-Hurriyah. Auditorium FMIPA diresmikan oleh Dekan FMIPA Dr. Sri Nurdiati pada April 2016 yang berguna untuk menunjang penyelenggaraan kegiatan bagi civitas IPB dan umum.', '../asset/upload/audit-fmipa1.jpg'),
(9, 'Auditorium FEM', 'Jalan Agatis', 'Available', 'Auditorum FEM IPB bisa dibilang paling muda karena baru saja dibangun. Bangunan ini diselesaikan dan digunakan pada 2019 lalu dan bisa menampung ±600 orang. Auditorum FEM IPB berlokasi tepat di samping gedung Baru Fakultas Ekonomi dan Manajemen (FEM) Kampus IPB Darmaga.', '../asset/upload/audit-fem1.jpg'),
(10, 'Gymnasium', 'CPVM+448', 'Available', 'Gymnasium merupakan gedung utama untuk setiap kegiatan olahraga mahasiswa. Fasilitas tersebut berlokasi di Kampus IPB University Dramaga. Berbagai pertandingan olahraga tingkat IPB University dan fakultas diadakan di fasilitas Gimnasium, yang meliputi futsal, basket, dan aerobik. Gimnasium juga memfasilitasi mahasiswa dan dosen untuk mengadakan kursus olahraga bagi mahasiswa tahun pertama.', '../asset/upload/gymnasium.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(8) NOT NULL,
  `emailId` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `emailId`, `password`, `role`) VALUES
(2, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'Admin'),
(3, 'user@gmail.com', '202cb962ac59075b964b07152d234b70', 'User'),
(4, 'asepsurya@apps.ipb.ac.id', '25f9e794323b453885f5181f1b624d0b', 'User'),
(5, 'jonnyyespapa@apps.ipb.ac.id', '5416d7cd6ef195a0f7622a9c56b55e84', 'User'),
(6, 'purposeexotic@apps.ipb.ac.id', '4297f44b13955235245b2497399d7a93', 'User'),
(7, 'quitbracelet@apps.ipb.ac.id', 'c21f969b5f03d33d43e04f8f136e7682', 'User'),
(8, 'otterabalone@apps.ipb.ac.id', 'fcea920f7412b5da7be0cf42b8c93759', 'User'),
(9, 'martenmeadowlark@apps.ipb.ac.id', '200820e3227815ed1756a6b531e7e0d2', 'User'),
(10, 'maybelexus@apps.ipb.ac.id', '1c63129ae9db9c60c3e8aa94d3e00495', 'User'),
(11, 'speedmallet@apps.ipb.ac.id', 'e807f1fcf82d132f9bb018ca6738a19f', 'User'),
(12, 'maidenlazuli@apps.ipb.ac.id', 'e19d5cd5af0378da05f63f891c7467af', 'User'),
(13, 'featherfoot@apps.ipb.ac.id', '69625bde9754c71ea4e18818e2e84d59', 'User'),
(14, 'dogfermented@apps.ipb.ac.id', 'ee11cbb19052e40b07aac0ca060c23ee', 'User'),
(15, 'depthporkchop@apps.ipb.ac.id', '7b24afc8bc80e548d66c4e7ff72171c5', 'User'),
(16, 'shampooinstructor@apps.ipb.ac.id', '5d93ceb70e2bf5daa84ec3d0cd2c731a', 'User'),
(17, 'transportsmart@apps.ipb.ac.id', '3fde6bb0541387e4ebdadf7c2ff31123', 'User'),
(18, 'somedecipher@apps.ipb.ac.id', '1adbb3178591fd5bb0c248518f39bf6d', 'User'),
(19, 'mysteriousbruise@apps.ipb.ac.id', 'e2798af12a7a0f4f70b4d69efbc25f4d', 'User'),
(20, 'lioncarefree@apps.ipb.ac.id', '62c8ad0a15d9d1ca38d5dee762a16e01', 'User'),
(21, 'dominantuniverse@apps.ipb.ac.id', 'dfeaf10390e560aea745ccba53e044ed', 'User'),
(22, 'abovedumbo@apps.ipb.ac.id', '7ef6156c32f427d713144f67e2ef14d2', 'User'),
(23, 'supporterimpress@apps.ipb.ac.id', 'cc03e747a6afbbcbf8be7668acfebee5', 'User'),
(24, 'keyboardrusak@apps.ipb.ac.id', '97db1846570837fce6ff62a408f1c26a', 'User'),
(25, 'daffafakhi@apps.ipb.ac.id', '7c9fb847d117531433435b68b61f91f6', 'Admin'),
(26, 'salmasal@apps.ipb.ac.id', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Admin'),
(27, 'zulfaam@apps.ipb.ac.id', '25d55ad283aa400af464c76d713c07ad', 'Admiin'),
(28, 'ameliamayy@apps.ipb.ac.id', '96e79218965eb72c92a549dd5a330112', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`ruangan_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  MODIFY `ruangan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
