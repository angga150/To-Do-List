-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 12, 2025 at 09:52 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id_tag` int NOT NULL,
  `tag_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id_tag`, `tag_name`) VALUES
(1, 'uts'),
(2, 'buk fauziah'),
(3, 'uas'),
(4, 'pak andrian'),
(5, 'aku'),
(6, 'kamu'),
(7, 'dia');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `priority` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('Pending','Completed') COLLATE utf8mb4_general_ci DEFAULT 'Pending',
  `deadline` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `list` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `title`, `description`, `priority`, `status`, `deadline`, `list`, `created`) VALUES
(28, 'tugas buk fauziah', 'bikin makalah deadline sebelum uts', 'Sedang', 'Completed', '2025-10-25 06:30:00', 'Pribadi', '2025-10-17 16:04:35'),
(29, 'tugas pak andrian', 'bikin web tentang sistem informasi', 'Rendah', 'Pending', '2025-12-19 06:30:00', 'Tim A', '2025-10-17 12:28:40'),
(30, 'fasdfas', 'fdsa', 'Tertinggi', 'Pending', '2025-11-20 06:30:00', 'Pribadi', '2025-10-31 10:41:17'),
(31, 'fasfasf', 'fsafa', 'Tinggi', 'Pending', '2025-11-21 06:30:00', 'Tim A', '2025-10-31 10:43:19'),
(32, 'sdfasf', 'asdfaf', 'Rendah', 'Pending', '2025-11-06 06:30:00', 'Tim A', '2025-10-31 10:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `todotag`
--

CREATE TABLE `todotag` (
  `todolist_id` int NOT NULL,
  `task_id` int NOT NULL,
  `tag_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todotag`
--

INSERT INTO `todotag` (`todolist_id`, `task_id`, `tag_id`) VALUES
(1, 28, 1),
(2, 28, 2),
(3, 29, 3),
(4, 29, 4),
(5, 32, 5),
(6, 32, 6),
(7, 32, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `todotag`
--
ALTER TABLE `todotag`
  ADD PRIMARY KEY (`todolist_id`),
  ADD KEY `todo_id` (`task_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id_tag` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `todotag`
--
ALTER TABLE `todotag`
  MODIFY `todolist_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `todotag`
--
ALTER TABLE `todotag`
  ADD CONSTRAINT `todotag_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`task_id`),
  ADD CONSTRAINT `todotag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id_tag`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
