-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 15, 2025 at 04:15 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv_mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` text,
  `program_studi` varchar(100) DEFAULT NULL,
  `universitas` varchar(100) DEFAULT NULL,
  `semester` int DEFAULT NULL,
  `ipk` decimal(3,2) DEFAULT NULL,
  `tentang_saya` text,
  `linkedin` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `nama`, `foto`, `email`, `telepon`, `alamat`, `program_studi`, `universitas`, `semester`, `ipk`, `tentang_saya`, `linkedin`, `github`, `created_at`, `updated_at`) VALUES
(1, 'M Alwan Fadhil Islamay Pasha', 'alwann.jpg', 'malwanfadhilip@gmail.com', '+62 895405174466', 'Jln Pelabuhan II Kp.Cikujang Peuntas RT 04/14\r\nKel.Dayeuluhur Kec.Warudoyong KOTA SUKABUMI', 'Teknik Informatika', 'Universitas Muhammaddiyah Sukabumi', 5, '3.10', 'Mahasiswa Teknik Informatika semester 5 yang passionate dalam pengembangan web dan mobile. Memiliki kemampuan problem solving yang baik dan selalu antusias untuk belajar teknologi baru. Aktif dalam berbagai proyek akademik dan memiliki pengalaman dalam pengembangan aplikasi berbasis web.', 'https://www.linkedin.com/in/m-alwan-fadhil-1a39a4293/', 'https://github.com/alwan-20', '2025-11-12 08:14:26', '2025-11-12 11:00:29');

-- --------------------------------------------------------

--
-- Table structure for table `keahlian`
--

CREATE TABLE `keahlian` (
  `id` int NOT NULL,
  `biodata_id` int NOT NULL,
  `kategori` enum('teknis','bahasa','interpersonal','lainnya') NOT NULL,
  `nama_keahlian` varchar(100) NOT NULL,
  `tingkat_kemahiran` enum('beginner','intermediate','advanced','expert') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `keahlian`
--

INSERT INTO `keahlian` (`id`, `biodata_id`, `kategori`, `nama_keahlian`, `tingkat_kemahiran`, `created_at`) VALUES
(1, 1, 'teknis', 'HTML & CSS', 'advanced', '2025-11-12 08:14:26'),
(2, 1, 'teknis', 'JavaScript', 'intermediate', '2025-11-12 08:14:26'),
(3, 1, 'teknis', 'PHP', 'intermediate', '2025-11-12 08:14:26'),
(4, 1, 'teknis', 'Laravel', 'intermediate', '2025-11-12 08:14:26'),
(5, 1, 'teknis', 'CodeIgniter', 'intermediate', '2025-11-12 08:14:26'),
(6, 1, 'teknis', 'MySQL', 'intermediate', '2025-11-12 08:14:26'),
(7, 1, 'teknis', 'Git & GitHub', 'intermediate', '2025-11-12 08:14:26'),
(8, 1, 'teknis', 'Flutter', 'beginner', '2025-11-12 08:14:26'),
(9, 1, 'teknis', 'Python', 'beginner', '2025-11-12 08:14:26'),
(10, 1, 'bahasa', 'Bahasa Indonesia', 'expert', '2025-11-12 08:14:26'),
(11, 1, 'bahasa', 'Bahasa Inggris', 'intermediate', '2025-11-12 08:14:26'),
(12, 1, 'interpersonal', 'Komunikasi', 'advanced', '2025-11-12 08:14:26'),
(13, 1, 'interpersonal', 'Kerja Tim', 'advanced', '2025-11-12 08:14:26'),
(14, 1, 'interpersonal', 'Problem Solving', 'intermediate', '2025-11-12 08:14:26'),
(15, 1, 'interpersonal', 'Manajemen Waktu', 'intermediate', '2025-11-12 08:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int NOT NULL,
  `biodata_id` int NOT NULL,
  `jenjang` varchar(50) NOT NULL,
  `nama_institusi` varchar(100) NOT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `tahun_mulai` year NOT NULL,
  `tahun_selesai` year DEFAULT NULL,
  `nilai` varchar(10) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `biodata_id`, `jenjang`, `nama_institusi`, `jurusan`, `tahun_mulai`, `tahun_selesai`, `nilai`, `keterangan`, `created_at`) VALUES
(1, 1, 'S1', 'Universitas Muhammaddiyah Sukabumi', 'Teknik Informatika', 2022, 2026, '3.1', 'Sedang menempuh semester 5 dengan fokus pada pengembangan perangkat lunak dan sistem informasi', '2025-11-12 08:14:26'),
(2, 1, 'MA', 'MA TUNAS CENDEKIA CIREBON', 'IPA', 2020, 2023, '80', 'Lulus dengan predikat memuaskan', '2025-11-12 08:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman`
--

CREATE TABLE `pengalaman` (
  `id` int NOT NULL,
  `biodata_id` int NOT NULL,
  `jenis` enum('magang','proyek','organisasi','volunteer') NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `organisasi` varchar(100) NOT NULL,
  `deskripsi` text,
  `tahun_mulai` year NOT NULL,
  `tahun_selesai` year DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengalaman`
--

INSERT INTO `pengalaman` (`id`, `biodata_id`, `jenis`, `posisi`, `organisasi`, `deskripsi`, `tahun_mulai`, `tahun_selesai`, `created_at`) VALUES
(3, 1, 'proyek', 'Mobile Developer', 'Proyek Aplikasi To-Do List', 'Membuat aplikasi mobile to-do list menggunakan Flutter dengan fitur CRUD, notifikasi, dan sinkronisasi cloud. Aplikasi berhasil di-deploy ke Play Store sebagai portofolio.', 2023, 2024, '2025-11-12 08:14:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biodata_id` (`biodata_id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biodata_id` (`biodata_id`);

--
-- Indexes for table `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biodata_id` (`biodata_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keahlian`
--
ALTER TABLE `keahlian`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengalaman`
--
ALTER TABLE `pengalaman`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD CONSTRAINT `keahlian_ibfk_1` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD CONSTRAINT `pengalaman_ibfk_1` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
