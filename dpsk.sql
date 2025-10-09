-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2025 at 01:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dpsk`
--

-- --------------------------------------------------------

--
-- Table structure for table `aksesaplikasi`
--

CREATE TABLE `aksesaplikasi` (
  `idaplikasi` varchar(2) NOT NULL,
  `namaaplikasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `idxreward`
--

CREATE TABLE `idxreward` (
  `tgl` date NOT NULL,
  `indexrw` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menuakses`
--

CREATE TABLE `menuakses` (
  `idmenuakses` int(11) NOT NULL,
  `namamenu` varchar(50) NOT NULL,
  `kodemenu` varchar(6) NOT NULL,
  `idaplikasi` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2025_09_27_093932_create_pengguna_table', 1),
(11, '2025_09_29_140509_change_pass_column_in_pengguna_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `mnth` int(11) NOT NULL,
  `yr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` int(10) UNSIGNED NOT NULL,
  `userid` varchar(25) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `is_activated` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `userid`, `pass`, `namalengkap`, `jabatan`, `level`, `is_activated`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$E.1aX34RFcuADQ0msssl9O0JRz1SagMKblKkTkn4XN7ixKmxjqg4m', 'Administrator', 'Administrator', -1, 1, NULL, '2025-09-29 07:09:53'),
(2, 'operator1', '$2y$10$Y2gqiZPt3E1gS9D07rHWJeGv0R8/qmpPtHWmQ5dkyVg7gtfZdOqle', 'Operator Peserta', 'Operator', 1, 1, NULL, NULL),
(3, 'operator2', '$2y$10$Y2gqiZPt3E1gS9D07rHWJeGv0R8/qmpPtHWmQ5dkyVg7gtfZdOqle', 'Operator Mitra dan Unit', 'Operator', 1, 1, NULL, NULL),
(4, 'kepala', '$2y$10$Ka/GGbPbW.uztXPdX2YfA.mhaAy/6j79vDAZQ.x4hGk5DsiKiveQ6', 'Kepala Kantor', 'Kepala Kantor', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tperaturan`
--

CREATE TABLE `tperaturan` (
  `idperaturan` int(11) NOT NULL,
  `skepentingan` varchar(50) NOT NULL,
  `namaperaturan` varchar(250) NOT NULL,
  `sesuai` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_apensiun`
--

CREATE TABLE `t_apensiun` (
  `idpensiun` int(11) NOT NULL,
  `nopensiun` varchar(8) NOT NULL,
  `idanggota` int(11) DEFAULT NULL,
  `tglmohon` date NOT NULL,
  `tmtpensiun` date NOT NULL,
  `nosuratberhenti` varchar(20) NOT NULL,
  `statuspensiun` varchar(12) NOT NULL DEFAULT 'PENSIUNNORM',
  `suratdari` varchar(100) DEFAULT NULL,
  `tglsuratdari` date DEFAULT NULL,
  `nosuratdari` varchar(50) DEFAULT NULL,
  `tgldari` date NOT NULL,
  `statusmanfaat` varchar(10) NOT NULL DEFAULT 'NORMAL',
  `flag_pensiun` varchar(10) NOT NULL DEFAULT 'PENSIUN',
  `first_bulan` int(11) NOT NULL,
  `first_tahun` int(11) NOT NULL,
  `last_bulan` int(11) NOT NULL,
  `last_tahun` int(11) NOT NULL,
  `mpakhir` decimal(18,3) NOT NULL,
  `rekening` varchar(30) NOT NULL DEFAULT 'AMBILTUNAI',
  `keterangan` varchar(200) NOT NULL,
  `statushidup` tinyint(1) NOT NULL DEFAULT 1,
  `mpawal` float NOT NULL DEFAULT 0,
  `idxPCT` float DEFAULT NULL,
  `noagendadpsk` varchar(100) DEFAULT NULL,
  `rmspensiun` varchar(100) DEFAULT NULL,
  `nosuratterminasi` int(20) DEFAULT NULL,
  `tglterminasi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_faktornilai`
--

CREATE TABLE `t_faktornilai` (
  `id` int(11) NOT NULL,
  `umur` tinyint(4) NOT NULL,
  `statuskerja` varchar(10) NOT NULL,
  `fns_s_pria_kawin` float NOT NULL,
  `fns_b_pria_kawin` float NOT NULL,
  `fns_s_wanita_kawin` float NOT NULL,
  `fns_b_wanita_kawin` float NOT NULL,
  `fns_s_pria_lajang` float NOT NULL,
  `fns_b_pria_lajang` float NOT NULL,
  `fns_s_wanita_lajang` float NOT NULL,
  `fns_b_wanita_lajang` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_iuranpeserta`
--

CREATE TABLE `t_iuranpeserta` (
  `id_iuran` bigint(20) NOT NULL,
  `idanggota` int(11) NOT NULL,
  `gajipokok` decimal(18,3) NOT NULL,
  `phdp` decimal(18,3) NOT NULL,
  `ip_pct` float NOT NULL,
  `ipk_pct` float NOT NULL,
  `ip_num` decimal(18,3) NOT NULL,
  `ipk_num` decimal(18,3) NOT NULL,
  `tglcatat` date NOT NULL,
  `tglsetor` date NOT NULL,
  `thn_iuran` int(11) NOT NULL,
  `bln_iuran` int(11) NOT NULL,
  `flag_iuran` varchar(12) NOT NULL DEFAULT 'NORMAL',
  `ip_num0` decimal(18,3) NOT NULL,
  `ipk_num0` decimal(18,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_keluarga`
--

CREATE TABLE `t_keluarga` (
  `idkeluarga` int(11) NOT NULL,
  `idanggota` int(11) NOT NULL,
  `nm_keluarga` varchar(100) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL DEFAULT 'LAKI-LAKI',
  `tempatlahir` varchar(200) NOT NULL,
  `tgllahir` date NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `hubungan` year(4) NOT NULL,
  `keterangan_kel` varchar(150) NOT NULL,
  `statuswaris` varchar(12) NOT NULL,
  `nosuratnukah` varchar(20) NOT NULL,
  `nosuratcerai` varchar(20) NOT NULL,
  `notunjukwaris` varchar(20) NOT NULL,
  `nomohonwaris` varchar(20) NOT NULL,
  `jenisubah` varchar(20) NOT NULL,
  `tglubah` date NOT NULL,
  `statushidup` varchar(5) NOT NULL DEFAULT 'HIDUP',
  `tgltunjukwaris` date NOT NULL,
  `tglmohonwaris` date NOT NULL,
  `bolehwaris` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_manfaatpensiun`
--

CREATE TABLE `t_manfaatpensiun` (
  `idmanfaatpensiun` bigint(20) NOT NULL,
  `idanggota` int(11) NOT NULL,
  `tglberimanfaat` date NOT NULL,
  `thn_setor` int(11) NOT NULL,
  `bln_setor` int(11) NOT NULL,
  `nilai_mp` decimal(18,3) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_nilaiaktuaria`
--

CREATE TABLE `t_nilaiaktuaria` (
  `thnaktuaria` int(5) NOT NULL,
  `idunit` varchar(8) NOT NULL,
  `ip` float NOT NULL,
  `ipk` float NOT NULL,
  `blnberlaku` int(3) NOT NULL,
  `thnberlaku` int(6) NOT NULL,
  `nilaitambahan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_peserta`
--

CREATE TABLE `t_peserta` (
  `idanggota` int(11) NOT NULL,
  `nopeserta` varchar(15) NOT NULL DEFAULT '#',
  `nama` varchar(100) NOT NULL,
  `tempatlahir` varchar(200) NOT NULL,
  `tgllahir` date NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL DEFAULT 'PRIA',
  `alamatterakhir` varchar(200) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kotakab` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `pkerjaanakhir` varchar(100) NOT NULL DEFAULT 'GURU',
  `idmitra` varchar(8) NOT NULL,
  `idunit` varchar(8) NOT NULL,
  `tmtkeja` date NOT NULL COMMENT 'Terhitung milai tanggal kerja',
  `noskkeja1` varchar(20) DEFAULT NULL COMMENT 'Nomor SK pengangkutan pertama kerja tetap di mitra',
  `statusnikah` varchar(12) NOT NULL DEFAULT 'TK',
  `tglmohon` date DEFAULT NULL,
  `tglsahpeserta` date DEFAULT NULL,
  `statushiduo` tinyint(1) NOT NULL DEFAULT 1,
  `statuspeserta` varchar(8) NOT NULL DEFAULT 'AKTIF',
  `id_num` varchar(20) DEFAULT NULL,
  `first_bulan` int(11) NOT NULL DEFAULT 0,
  `first_tahun` int(11) NOT NULL DEFAULT 0,
  `last_bulan` int(11) NOT NULL DEFAULT 0,
  `last_tahun` int(11) NOT NULL DEFAULT 0,
  `dodt` int(11) DEFAULT NULL COMMENT 'date of death',
  `jumlahanak` int(11) NOT NULL DEFAULT 0,
  `cetak` int(1) NOT NULL DEFAULT 0,
  `tmtiuran` date DEFAULT NULL COMMENT 'tanggal pertama iuran',
  `tglkawin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_peserta`
--

INSERT INTO `t_peserta` (`idanggota`, `nopeserta`, `nama`, `tempatlahir`, `tgllahir`, `jeniskelamin`, `alamatterakhir`, `kelurahan`, `kecamatan`, `kotakab`, `provinsi`, `pkerjaanakhir`, `idmitra`, `idunit`, `tmtkeja`, `noskkeja1`, `statusnikah`, `tglmohon`, `tglsahpeserta`, `statushiduo`, `statuspeserta`, `id_num`, `first_bulan`, `first_tahun`, `last_bulan`, `last_tahun`, `dodt`, `jumlahanak`, `cetak`, `tmtiuran`, `tglkawin`) VALUES
(2, '13', 'Filbert Valentino Hartono', 'DKI Jakarta', '2004-02-10', 'Pria', 'Wisma harapan 2', 'Cimanggis', 'Cimanggis', 'Depok', 'Jawa Barat', 'GURU', 'EZ', 'ZZ', '2024-10-10', NULL, 'Belum Kawin', NULL, NULL, 1, 'AKTIF', '32010200420008', 0, 0, 0, 0, NULL, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_sukubunga`
--

CREATE TABLE `t_sukubunga` (
  `tahun` int(5) NOT NULL,
  `peserta` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_unitmitra`
--

CREATE TABLE `t_unitmitra` (
  `idunit` varchar(8) NOT NULL,
  `nama_um` varchar(200) NOT NULL,
  `alamat_um` varchar(200) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kotakab` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `idmitraup` varchar(8) NOT NULL,
  `stat_um` varchar(12) NOT NULL COMMENT 'Status unit mitra: AKTIF/TIDAK AKTIF',
  `ip_pct` float NOT NULL COMMENT 'iuran peserta (persen)',
  `ipk_pct` float NOT NULL COMMENT 'iuran pemberi kerja (persen)',
  `urut` int(11) NOT NULL,
  `nilaitambahan` float NOT NULL,
  `tahunaktuaria` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aksesaplikasi`
--
ALTER TABLE `aksesaplikasi`
  ADD PRIMARY KEY (`idaplikasi`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menuakses`
--
ALTER TABLE `menuakses`
  ADD PRIMARY KEY (`idmenuakses`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`mnth`,`yr`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tperaturan`
--
ALTER TABLE `tperaturan`
  ADD PRIMARY KEY (`idperaturan`);

--
-- Indexes for table `t_apensiun`
--
ALTER TABLE `t_apensiun`
  ADD PRIMARY KEY (`idpensiun`);

--
-- Indexes for table `t_faktornilai`
--
ALTER TABLE `t_faktornilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_iuranpeserta`
--
ALTER TABLE `t_iuranpeserta`
  ADD PRIMARY KEY (`id_iuran`);

--
-- Indexes for table `t_keluarga`
--
ALTER TABLE `t_keluarga`
  ADD PRIMARY KEY (`idkeluarga`);

--
-- Indexes for table `t_manfaatpensiun`
--
ALTER TABLE `t_manfaatpensiun`
  ADD PRIMARY KEY (`idmanfaatpensiun`);

--
-- Indexes for table `t_nilaiaktuaria`
--
ALTER TABLE `t_nilaiaktuaria`
  ADD PRIMARY KEY (`thnaktuaria`);

--
-- Indexes for table `t_peserta`
--
ALTER TABLE `t_peserta`
  ADD PRIMARY KEY (`idanggota`);

--
-- Indexes for table `t_unitmitra`
--
ALTER TABLE `t_unitmitra`
  ADD PRIMARY KEY (`idunit`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idpengguna` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_apensiun`
--
ALTER TABLE `t_apensiun`
  MODIFY `idpensiun` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_faktornilai`
--
ALTER TABLE `t_faktornilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_keluarga`
--
ALTER TABLE `t_keluarga`
  MODIFY `idkeluarga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_peserta`
--
ALTER TABLE `t_peserta`
  MODIFY `idanggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
