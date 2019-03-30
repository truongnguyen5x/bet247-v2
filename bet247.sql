-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 05, 2018 lúc 09:54 AM
-- Phiên bản máy phục vụ: 10.1.34-MariaDB
-- Phiên bản PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bet247`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `football_clubs`
--

CREATE TABLE `football_clubs` (
  `id` int(10) UNSIGNED NOT NULL,
  `club_sign` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `club_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `club_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `football_clubs`
--

INSERT INTO `football_clubs` (`id`, `club_sign`, `club_name`, `club_image`) VALUES
(1, 'ARG', 'Argentina', 'image/clubs/ICCwlkZgatRMX7xi6mMleO6NvJzcSgg99xd6pZQi.png'),
(2, 'AUS', 'Úc', 'image/clubs/Ue5vihZcCUS9u1w9rtM9shzT9l6SQPLkUmWfkYFM.png'),
(3, 'BEL', 'Bỉ', 'image/clubs/zilpUTXHQOyk4JrWK3XGHJ1DYHOIji29nwWyUTNm.png'),
(4, 'COL', 'Colombia', 'image/clubs/W85C2yVf2EUAnwwVIy3recsvkX6a9jqiwXhoSyad.png'),
(5, 'CRC', 'Costa rica', 'image/clubs/usvRLWpXJuvzOmIrz84NfkYy9TG9KfInIozRtnSb.png'),
(6, 'CRO', 'Croatia', 'image/clubs/XRHvHlCDfx89jP3el9DANaOSkkNvcZVmFFqdWXJW.png'),
(7, 'DEN', 'Đan mạch', 'image/clubs/SrEsCVxY86UzgJqgSEmUFWLsfJbO3I4PqUcp22AZ.png'),
(8, 'ENG', 'Anh', 'image/clubs/noQpjYJdi15c97fvQGexecbKTGZHePaZ5ntAfmqL.png'),
(9, 'FRA', 'Pháp', 'image/clubs/iJfH40DkVIdL3xy9kmZxXOezD0pIfKN3ROnZYO4Z.png'),
(10, 'GER', 'Đức', 'image/clubs/M1UtB51ZBBsyPkvFzcqYJ1o7ELkzdQlrvaf3pySR.gif'),
(11, 'ISL', 'Iceland', 'image/clubs/eD4VHiBk6onuMdGxrskw7kRqVbJ7lLzXiB8Lx94E.jpeg'),
(12, 'MNC', 'AS Monaco', 'image/clubs/HoznjPXTB2hjf2npPDnmDF4pRyzc7yac4xbrCtcu.jpeg'),
(13, 'IOM', 'Olympique de Marseille', 'image/clubs/yPQ3FEn7eLbnD6PiesX6YanaU3Dr44zJKfTCIXk4.png'),
(14, 'FCN', 'FC Nantes', 'image/clubs/vFbSep1vb2p2aBDADnFgPzJDxBbt7h2jdOGflg72.png'),
(15, 'PSG', 'Paris Saint-Germain', 'image/clubs/kJC1cUyu0vqL0nuDx9UtT3qHIcWJ9xrawSJphBgI.png'),
(16, 'TFC', 'Toulouse FC', 'image/clubs/uYbwRRNJXgObvRsNMrlAJmT9PLliHqdTw8TXcIVl.png'),
(17, 'MAN', 'Manchester City F.C.', 'image/clubs/bdXwXaa1dJSE2tRrXGbOOQ8c19KMbCosMfmwMCRZ.png'),
(18, 'LIV', 'Liverpool F.C.', 'image/clubs/gZ1FQT1TT8CPk8v2mh5nqXzgl7oVsucBk6KaRXwl.png'),
(19, 'MU', 'Manchester United F.C.', 'image/clubs/NTIbFoSTZ1C6iuTVovDw92VlDvzfhv1Uu5cGyKiv.jpeg'),
(20, 'TOT', 'Tottenham Hotspur F.C.', 'image/clubs/reALuqxzCltD3P0L5li76PoTTVYCDv0hhvEWN9ah.png'),
(21, 'HPFC', 'Hai Phong', 'image/clubs/gICblXCktc9gi9iVkDfnriq8m0I7QDDw6pnD5f4b.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `matches`
--

CREATE TABLE `matches` (
  `id` int(10) UNSIGNED NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `time_close_bet` datetime NOT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT '0',
  `is_done` tinyint(1) NOT NULL DEFAULT '0',
  `league` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `round` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_home_id` int(11) NOT NULL,
  `team_away_id` int(11) NOT NULL,
  `home_score` int(11) NOT NULL DEFAULT '0',
  `away_score` int(11) NOT NULL DEFAULT '0',
  `odds_win` double(8,2) NOT NULL,
  `odds_draw` double(8,2) NOT NULL,
  `odds_lose` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_09_011130_them_sdt', 1),
(4, '2018_07_09_011812_tao_bang_ca_cuoc', 1),
(5, '2018_07_09_012636_tao_bang_match', 1),
(6, '2018_07_09_013850_tao_bang_doi_bong', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone_number` bigint(20) DEFAULT NULL,
  `coin` int(11) NOT NULL DEFAULT '5000',
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `phone_number`, `coin`, `username`) VALUES
(1, 'Nguyễn van trường', 'a@gmail.com', '$2y$10$ybJZ6oBY6GY7YmXBnC3ZS.hoEcjW5vqBNG.MjMSnJxQlgt7HHzef2', 'Iap7cTrayd4rmgjHAD6L7Heowa1xI052jQEJzykP3ahriMvgwdkqVtqRUuJn', NULL, NULL, 1235485624, 5000, 'admin'),
(2, 'Nguyễn Đức Anh', 'b@gmail.com', '$2y$10$AQluzUvO1nz78IAwWY9TTeGYavYXGxGq.YGkPc751xD0QdAduXYSa', NULL, NULL, NULL, 1235869885, 5000, 'nducanh'),
(3, 'Nguyễn Đức Tùng', 'c@gmail.com', '$2y$10$Tjam8b5kACtK6Fst.dVrJeqNkPoUJzlbDnn9lFy8uKbI5pqDC4/D2', NULL, NULL, NULL, 1235485624, 5000, 'bestsnip'),
(4, 'Đặng Thanh Thảo', 'd@gmail.com', '$2y$10$XNiY/RtRElup17GT0SRTt.pDUgvoa8LBWeKzGRlXz2z.YzxzIPj3y', NULL, NULL, NULL, 955656484, 5000, 'cute9x');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_bets`
--

CREATE TABLE `user_bets` (
  `id` int(10) UNSIGNED NOT NULL,
  `match_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coin` int(11) NOT NULL DEFAULT '0',
  `outcome` enum('1','x','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `football_clubs`
--
ALTER TABLE `football_clubs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Chỉ mục cho bảng `user_bets`
--
ALTER TABLE `user_bets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `football_clubs`
--
ALTER TABLE `football_clubs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user_bets`
--
ALTER TABLE `user_bets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
