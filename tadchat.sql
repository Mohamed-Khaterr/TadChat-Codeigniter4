-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2022 at 03:55 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tadchat`
--

-- --------------------------------------------------------

--
-- Table structure for table `connection`
--

CREATE TABLE `connection` (
  `id` int(11) NOT NULL,
  `conn_resource_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_firstName` varchar(50) NOT NULL,
  `user_lastName` varchar(50) NOT NULL,
  `gender` enum('Male','Female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `connection`
--

INSERT INTO `connection` (`id`, `conn_resource_id`, `user_id`, `user_firstName`, `user_lastName`, `gender`) VALUES
(1262, 3879, 2, 'Mohamed', 'Khater', 'Male'),
(1263, 3883, 3, 'Fady', 'Victor', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` text DEFAULT NULL,
  `dateOfCreation` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `avatar`, `dateOfCreation`) VALUES
(1, 'Mohamed', 'Khater', 'a@a.com', '$2y$10$g.esUcts95Vl4VwnVr5m..Dh/SmlqMjWgLoMNmgr4R4/yV9TbQD3O', 'aaa', '2022-07-16 18:08:25'),
(2, 'Mohamed', 'Khater', 'khater@gmail.com', '$2y$10$g.esUcts95Vl4VwnVr5m..Dh/SmlqMjWgLoMNmgr4R4/yV9TbQD3O', NULL, '2022-07-17 08:31:56'),
(3, 'Fady', 'Victor', 'fady@gmail.com', '$2y$10$eJfr6WjSjx51dDJthG6lMuAeg9Wy0K9E/RHhhyLGZau4oVfCxohOu', NULL, '2022-07-17 08:26:56'),
(4, 'Abdelrahman', 'Wael', 'wael@gmail.com', '$2y$10$mfrQ2ufT46xhKvgEzPX8NeN/gcByRmulMFc800/gmBUUr.OhsftVG', NULL, '2022-07-17 08:31:01'),
(5, 'iPhone', '6s', 'iphone@gmail.com', '$2y$10$mfrQ2ufT46xhKvgEzPX8NeN/gcByRmulMFc800/gmBUUr.OhsftVG', NULL, '2022-07-17 20:45:02'),
(6, 'Nabil', 'Mohamed', 'nabil@gmail.com', '$2y$10$mfrQ2ufT46xhKvgEzPX8NeN/gcByRmulMFc800/gmBUUr.OhsftVG', NULL, '2022-07-18 01:42:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `connection`
--
ALTER TABLE `connection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `connection_users` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `connection`
--
ALTER TABLE `connection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1264;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `connection`
--
ALTER TABLE `connection`
  ADD CONSTRAINT `connection_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
