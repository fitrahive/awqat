-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 09 Jul 2023 pada 14.55
-- Versi server: 10.3.38-MariaDB-0ubuntu0.20.04.1
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `awqat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `quote` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `quotes`
--

INSERT INTO `quotes` (`id`, `quote`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Please follow health protocols to prevent the spread of COVID-19', '2023-07-09 14:27:57', NULL, NULL),
(2, 'Turn off the phone or use silent mode while in the mosque area', '2023-07-09 14:27:57', NULL, NULL),
(3, 'This is running text section and you can change this on the Awqat Dashboard', '2023-07-09 14:27:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key` varchar(64) NOT NULL,
  `value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(1, 'name', 'Masjid Al-Jabbar'),
(2, 'address', 'Jl. Cimincrang No. 14, Cimincrang, Kec. Gedebage, Kota Bandung, Jawa Barat 40292'),
(3, 'method', 'Kemenag'),
(4, 'adjustment.fajr', '0'),
(5, 'adjustment.sunrise', '0'),
(6, 'adjustment.dhuhr', '0'),
(7, 'adjustment.asr', '0'),
(8, 'adjustment.maghrib', '0'),
(9, 'adjustment.isha', '0'),
(10, 'theme', 'al-hikmah'),
(11, 'language', 'indonesia'),
(12, 'locale', 'id'),
(13, 'adjustment.hijri', '0'),
(14, 'label.fajr', 'Subuh'),
(15, 'label.sunrise', 'Syuruq'),
(16, 'label.dhuhr', 'Dzuhur'),
(17, 'label.asr', 'Ashar'),
(18, 'label.maghrib', 'Maghrib'),
(19, 'label.isha', 'Isya'),
(20, 'coordinate.latitude', '-6.5414161'),
(21, 'coordinate.longitude', '107.4550443');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` varchar(180) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'Fitrahive', 'fitrahive+awqat@sesulih.my.id', '$2y$10$g8IV/sv9yv3OVUTmMxzD0ufhqObTMQWKQ.qotBDeq3aWNO1H35tu6', '2023-07-04 20:58:18', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_timestamp` (`timestamp`) USING BTREE;

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
