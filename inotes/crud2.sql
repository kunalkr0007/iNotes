-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2023 at 01:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crudproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud2`
--

CREATE TABLE `crud2` (
  `sno` int(15) NOT NULL,
  `title` varchar(50) NOT NULL,
  `notes` varchar(100) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crud2`
--

INSERT INTO `crud2` (`sno`, `title`, `notes`, `time`, `user_id`) VALUES
(1, 'Buy Books', 'first description ok', '2023-09-24 19:29:08', 8),
(2, 'Go to buy fruits', 'check form 44', '2023-09-24 19:36:31', 9),
(3, 'heloo  tehre2', 'edited notes', '2023-09-24 19:36:49', 8),
(5, 'hello 3', 'notes taking wednesday', '2023-09-26 12:31:09', 8),
(6, 'hi kunal', 'notes by kunal@hi', '2023-09-26 12:39:05', 8),
(7, 'notes by rahul', 'cege', '2023-09-26 12:40:13', 9),
(8, 'first note', 'hii i am anup', '2023-09-26 12:47:30', 10),
(9, 'hii', 'i m kunal', '2023-09-26 14:06:14', 11),
(10, 'dasd', 'asda', '2023-09-26 14:37:39', 11),
(11, 'sdf', 'fd', '2023-09-26 14:37:43', 11),
(12, 'aman', 'notsss', '2023-09-26 14:45:49', 13),
(15, 'first note on 000webhosta', 'its my first note on hosting app by kunal', '2023-09-26 22:52:29', 9),
(16, 'first note on 000webhosta', 'its my first note on hosting app by kunal', '2023-09-26 22:53:07', 9),
(17, 'first note on 000webhosta', 'its my first note on hosting app by kunal', '2023-09-27 10:01:07', 11),
(18, 'The case sensitivity of t', 'The case sensitivity of table and column names dep', '2023-09-27 10:01:22', 11),
(19, 'The case sensitivity of table and column names dep', 'The case sensitivity of table and column names depends upon the Database and Operating System. In ', '2023-09-27 10:07:49', 11),
(20, 'fff', ' kasdk', '2023-09-27 14:06:57', 11),
(21, 'latest note title', 'latest note description october ', '2023-10-12 16:54:14', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud2`
--
ALTER TABLE `crud2`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud2`
--
ALTER TABLE `crud2`
  MODIFY `sno` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
