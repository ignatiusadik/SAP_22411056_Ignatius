-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 04 Jul 2025 pada 03.07
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_karyawan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cutis`
--

CREATE TABLE `cutis` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `alasan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cutis`
--

INSERT INTO `cutis` (`id`, `user_id`, `tanggal_mulai`, `tanggal_selesai`, `alasan`, `status`, `created_at`, `updated_at`) VALUES
(2, 9, '2025-06-24', '2025-07-03', 'Mengantar Saudara Menikah', 'rejected', '2025-06-21 07:06:08', '2025-06-21 08:51:35'),
(4, 9, '2025-07-05', '2025-07-08', 'Melakukan Pengobatan Mata', 'pending', '2025-06-21 08:54:01', '2025-06-21 09:09:45'),
(5, 9, '2025-07-03', '2025-07-08', 'Mmmmm', 'approved', '2025-07-01 21:03:41', '2025-07-01 21:03:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `devisis`
--

CREATE TABLE `devisis` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_devisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `devisis`
--

INSERT INTO `devisis` (`id`, `nama_devisi`, `created_at`, `updated_at`) VALUES
(2, 'Sumber Daya Manusia (HRD)', '2025-06-18 06:11:48', '2025-06-18 06:11:48'),
(3, 'Finance Department', '2025-06-18 06:12:11', '2025-06-18 06:30:31'),
(4, 'Operations Department', '2025-06-18 06:30:09', '2025-06-18 06:30:09'),
(5, 'Marketing Department', '2025-06-18 06:30:51', '2025-06-18 06:30:51'),
(6, 'IT Department', '2025-06-18 06:31:08', '2025-06-18 06:31:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gajipokoks`
--

CREATE TABLE `gajipokoks` (
  `id` bigint UNSIGNED NOT NULL,
  `perusahaan_id` bigint UNSIGNED NOT NULL,
  `id_devisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gaji_pokok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gajipokoks`
--

INSERT INTO `gajipokoks` (`id`, `perusahaan_id`, `id_devisi`, `gaji_pokok`, `created_at`, `updated_at`) VALUES
(3, 1, '2', '15000000', '2025-06-20 01:31:50', '2025-06-20 05:24:44'),
(4, 1, '3', '12000000', '2025-06-20 05:25:07', '2025-06-20 05:25:07'),
(6, 1, '6', '8000000', '2025-06-20 20:11:49', '2025-06-20 20:11:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gajis`
--

CREATE TABLE `gajis` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `gaji_pokok` decimal(10,0) NOT NULL,
  `tunjangan` decimal(10,0) NOT NULL,
  `transport` decimal(10,0) NOT NULL,
  `bonus` decimal(10,0) NOT NULL,
  `total_gaji` decimal(10,0) NOT NULL,
  `bulan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year NOT NULL,
  `status` enum('pending','paid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gajis`
--

INSERT INTO `gajis` (`id`, `user_id`, `gaji_pokok`, `tunjangan`, `transport`, `bonus`, `total_gaji`, `bulan`, `tahun`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 8000000, 2000000, 300000, 300000, 10600000, '01', '2025', 'paid', '2025-06-20 22:42:25', '2025-06-21 09:10:45'),
(2, 15, 15000000, 200000, 1000000, 1000000, 17200000, '01', '2025', 'pending', '2025-06-20 23:10:57', '2025-06-20 23:10:57'),
(3, 19, 15000000, 800000, 200000, 850000, 16850000, '02', '2025', 'pending', '2025-06-21 09:50:51', '2025-06-21 09:50:51'),
(4, 9, 8000000, 1000000, 1000000, 5000000, 15000000, '01', '2025', 'pending', '2025-07-01 21:04:42', '2025-07-01 21:04:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_06_08_065229_create_perusahaan_table', 2),
(6, '2025_06_08_065256_create_devisi_table', 2),
(7, '2025_06_08_065280_create_users_table', 2),
(8, '2025_06_08_060957_create_gaji_table', 3),
(9, '2025_06_08_060958_create_gaji_table', 4),
(10, '2025_06_08_060959_create_gaji_table', 5),
(11, '2025_06_20_062342_create_gajipokok_table', 6),
(12, '2025_06_21_133706_create_cutis_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaans`
--

CREATE TABLE `perusahaans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perusahaans`
--

INSERT INTO `perusahaans` (`id`, `nama_perusahaan`, `email`, `no_tlp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'PT HDI ABADI JAYA', 'hdiabadijaya@gmail.com', '0721455216', 'Jl. RA Basid No.31 Labuhan Ratu, Bandar Lampung', NULL, '2025-06-14 05:48:54'),
(3, 'PT MAKMUR JAYA', 'ptmakmur@gmail.com', '081379806780', 'Jl. Griya Fantasi No.62 Wayhalim, Bandar Lampung', '2025-06-16 17:11:27', '2025-06-16 17:11:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `perusahaan_id` bigint UNSIGNED DEFAULT NULL,
  `devisi_id` bigint UNSIGNED DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `role` enum('superadmin','admin','karyawan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `jenis_kelamin`, `tanggal_lahir`, `perusahaan_id`, `devisi_id`, `phone`, `alamat`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Adi', 'adi@gmail.com', '$2y$12$zfsN5KrL2zTFoKHOPnTr1u/JQ63gq6.nWfthXeztRHo7WQ7pVVpeu', NULL, NULL, NULL, NULL, NULL, NULL, 'superadmin', NULL, '2025-06-10 19:26:53', '2025-06-10 19:26:53'),
(2, 'Admin Perusahaan', 'admin@gmail.com', '$2y$12$FeV/z67av2ZAiRdog7kTc.S77S/2Fqw8KkNb49D7/vnTmt6vqKNFa', 'laki-laki', '1998-09-01', 1, NULL, NULL, 'Jl. Raden Imba Kusuma No.31 Kemiling', 'admin', NULL, '2025-06-10 19:26:53', '2025-06-10 19:26:53'),
(9, 'Jaka', 'jaka@gmail.com', '$2y$12$cBwH/X3HaAZ2guGaqOFvI.3jLjbsMwpc1rVja0wb7.cskkz5zec8i', 'laki-laki', NULL, 1, 6, '331313', 'afaw', 'karyawan', NULL, '2025-06-15 20:57:29', '2025-06-19 06:17:03'),
(12, 'Sumartini', 'tinisumar201@gmail.com', '$2y$12$2lBazPFPf1qexUmUvQw8EOAUG04Ik8IIay3jiUX4UkQlu.M9SJjmm', 'perempuan', NULL, 3, NULL, '082385977611', 'Jln Raden Imba Kusuma, Perum Villa Sakura No 31, Kemiling, Bandar Lampung', 'admin', NULL, '2025-06-16 07:12:08', '2025-06-18 06:32:01'),
(15, 'wahyu', 'wahyu@gmail.com', '$2y$12$n0TFsanXWbJzYrdG6Do0iOqy97/ZsIKCIYXtR0xqBw11cMg2UxYJq', 'laki-laki', '2025-06-04', 1, 2, '082385977611', 'Jln Raden Imba Kusuma, Perum Villa Sakura No 31, Kemiling, Bandar Lampung', 'karyawan', NULL, '2025-06-19 05:25:32', '2025-06-19 05:25:32'),
(19, 'dimas', 'dimas@gmail.com', '$2y$12$FjKJbTmMe9T5/JRgUzdKZuUZO00AW1jDD9BTJu6Nq0RyeqCLjkJmu', 'laki-laki', '2025-06-02', 1, 2, '122323', 'asss', 'karyawan', NULL, '2025-06-19 20:36:28', '2025-06-19 20:36:28');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cutis`
--
ALTER TABLE `cutis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cutis_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `devisis`
--
ALTER TABLE `devisis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `gajipokoks`
--
ALTER TABLE `gajipokoks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gajipokoks_perusahaan_id_foreign` (`perusahaan_id`);

--
-- Indeks untuk tabel `gajis`
--
ALTER TABLE `gajis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gajis_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `perusahaans`
--
ALTER TABLE `perusahaans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_perusahaan_id_foreign` (`perusahaan_id`),
  ADD KEY `users_devisi_id_foreign` (`devisi_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cutis`
--
ALTER TABLE `cutis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `devisis`
--
ALTER TABLE `devisis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gajipokoks`
--
ALTER TABLE `gajipokoks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `gajis`
--
ALTER TABLE `gajis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perusahaans`
--
ALTER TABLE `perusahaans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cutis`
--
ALTER TABLE `cutis`
  ADD CONSTRAINT `cutis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `gajipokoks`
--
ALTER TABLE `gajipokoks`
  ADD CONSTRAINT `gajipokoks_perusahaan_id_foreign` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `gajis`
--
ALTER TABLE `gajis`
  ADD CONSTRAINT `gajis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_devisi_id_foreign` FOREIGN KEY (`devisi_id`) REFERENCES `devisis` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_perusahaan_id_foreign` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
