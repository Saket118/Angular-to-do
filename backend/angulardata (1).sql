-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2025 at 08:21 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angulardata`
--

-- --------------------------------------------------------

--
-- Table structure for table `todotask`
--

CREATE TABLE `todotask` (
  `id` int(11) NOT NULL,
  `task` varchar(255) NOT NULL,
  `taskType` varchar(100) NOT NULL,
  `assignee` varchar(100) NOT NULL,
  `status` enum('Pending','In Progress','Done') NOT NULL DEFAULT 'Pending',
  `assignedDate` datetime NOT NULL,
  `completedDate` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todotask`
--

INSERT INTO `todotask` (`id`, `task`, `taskType`, `assignee`, `status`, `assignedDate`, `completedDate`, `created_at`, `updated_at`) VALUES
(1, 'Fix login bug', 'Bug', 'Alice', 'Done', '2025-09-20 10:00:00', '2025-09-22 05:55:09', '2025-09-22 05:26:42', '2025-09-22 05:55:10'),
(2, 'Write documentation', 'Documentation', 'Bob', 'Done', '2025-09-21 14:00:00', '2025-09-22 05:55:07', '2025-09-22 05:26:42', '2025-09-22 05:55:07'),
(3, 'Deploy release', 'Deployment', 'Charlie', 'Done', '2025-09-18 09:30:00', '2025-09-19 12:00:00', '2025-09-22 05:26:42', '2025-09-22 05:26:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todotask`
--
ALTER TABLE `todotask`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todotask`
--
ALTER TABLE `todotask`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
