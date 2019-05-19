-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 20. 05 2019 kl. 01:07:09
-- Serverversion: 10.1.36-MariaDB
-- PHP-version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydrtv`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Data dump for tabellen `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'movie'),
(2, 'serie');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `favorites`
--

CREATE TABLE `favorites` (
  `user_fk` bigint(20) UNSIGNED NOT NULL,
  `movie_fk` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Data dump for tabellen `favorites`
--

INSERT INTO `favorites` (`user_fk`, `movie_fk`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 3);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `genre`
--

CREATE TABLE `genre` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Data dump for tabellen `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'horror'),
(2, 'comic'),
(3, 'fantasy'),
(4, 'action');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `genre_movies`
--

CREATE TABLE `genre_movies` (
  `genre_fk` bigint(20) UNSIGNED NOT NULL,
  `movie_fk` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Data dump for tabellen `genre_movies`
--

INSERT INTO `genre_movies` (`genre_fk`, `movie_fk`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(1, 5),
(2, 6),
(3, 7);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_fk` bigint(20) UNSIGNED NOT NULL,
  `production` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year(4) NOT NULL,
  `path` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Data dump for tabellen `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `category_fk`, `production`, `year`, `path`) VALUES
(1, 'disney1', 'blabla', 1, 'walt disney', 2000, 'shrek-5-trailer.mp4'),
(2, 'disney2', 'blabla', 2, 'walt disney', 2010, 'shrek-5-trailer.mp4'),
(3, 'test3', 'blabla', 3, 'test3', 2003, 'shrek-5-trailer.mp4'),
(4, 'test4', 'blabla', 2, 'test4', 2009, 'shrek-5-trailer.mp4'),
(5, 'test5', 'blabla', 2, 'test3', 2003, 'shrek-5-trailer.mp4'),
(6, 'test6', 'blabla', 2, 'test4', 2011, 'shrek-5-trailer.mp4'),
(7, 'Detective Pikachu', 'Wauw Pikachu is here!', 2, 'Warner Bros.', 2019, 'shrek-5-trailer.mp4');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_fk` bigint(20) NOT NULL,
  `user_fk` bigint(20) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Data dump for tabellen `ratings`
--

INSERT INTO `ratings` (`id`, `movie_fk`, `user_fk`, `rating`, `comment`) VALUES
(1, 1, 1, 2, 'test1'),
(2, 1, 1, 2, 'test2'),
(3, 1, 1, 2, ''),
(4, 1, 1, 2, 'lalala');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `response`
--

CREATE TABLE `response` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_fk` bigint(20) NOT NULL,
  `rating_fk` bigint(20) NOT NULL,
  `response` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Data dump for tabellen `response`
--

INSERT INTO `response` (`id`, `user_fk`, `rating_fk`, `response`) VALUES
(1, 2, 1, 'hahahha'),
(2, 1, 1, 'styr dig'),
(3, 2, 1, 'åårh'),
(4, 1, 1, 'hej');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `path`) VALUES
(1, 'André', 'Vestergaard', 'av@kea.dk', '123456', '21879710_1053867184749691_3233441853638443008_n.png'),
(2, 'Malene', 'Bærtelsen', 'mb@kea.dk', '123456', '21879710_1053867184749691_3233441853638443008_n.png');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `watched`
--

CREATE TABLE `watched` (
  `user_fk` bigint(20) NOT NULL,
  `movie_fk` bigint(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Data dump for tabellen `watched`
--

INSERT INTO `watched` (`user_fk`, `movie_fk`, `date`) VALUES
(1, 1, '2019-05-10 08:04:14'),
(1, 2, '2019-05-10 08:04:14'),
(1, 1, '2019-05-10 09:36:36'),
(2, 1, '2019-05-10 09:37:24');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `category`
--
ALTER TABLE `category`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks for tabel `genre`
--
ALTER TABLE `genre`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks for tabel `movies`
--
ALTER TABLE `movies`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks for tabel `ratings`
--
ALTER TABLE `ratings`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks for tabel `response`
--
ALTER TABLE `response`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tilføj AUTO_INCREMENT i tabel `genre`
--
ALTER TABLE `genre`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tilføj AUTO_INCREMENT i tabel `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tilføj AUTO_INCREMENT i tabel `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tilføj AUTO_INCREMENT i tabel `response`
--
ALTER TABLE `response`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
