-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2025 at 11:58 AM
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
-- Database: `pra-b3`
--

-- --------------------------------------------------------

--
-- Table structure for table `kanban`
--

CREATE TABLE `kanban` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deadline` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kanban`
--

INSERT INTO `kanban` (`id`, `title`, `description`, `user`, `department`, `date`, `deadline`, `status`) VALUES
(1, 'sfsllajslf', 'testing', 'Jorran', '', '2025-04-10 11:16:35', '2025-05-11', 'done'),
(2, 'sfsllajslf', 'testing', 'test', 'styling', '2025-04-17 11:45:42', '2025-05-11', 'backlog'),
(3, 'sfsllajslf', 'testing', 'Jorran', 'testing', '2025-04-17 11:52:08', '2025-05-11', 'backlog');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `department`) VALUES
(2, 'Jorran', '$2y$10$hB4R8qpBjdrTJS7OJ1637OT1oIeCq7.h6mbi8PMV9vdVxEcXWOvF.', 'admin', 'styling'),
(6, 'user', '$2y$10$AQDV7vDntRoybMd.ST.UXuyguZmDN7HV/NBkA0dAElUi.X/6AUHXi', 'user', 'styling'),
(7, 'test', '$2y$10$OouZq8uBe917xBNGHoR9CuqCOmhLqvx98cgTH0XiLj3tbOr08vQV2', 'admin', 'testing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kanban`
--
ALTER TABLE `kanban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kanban`
--
ALTER TABLE `kanban`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
