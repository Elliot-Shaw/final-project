-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2021 at 12:09 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs_350`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Elliot', '$2y$10$m4cB8MNCp/fsH72EBQ8S0.AUigJRwAt0dtxcRtHwCHGOMTF2mjhkq'),
(2, 'dog', '$2y$10$mH8qEkKEHrQGXVSrrUBbruE/PkVzLH.oNOstZlAueOkxwIjZd2F5a'),
(3, 'ceciliaSchonewise', '$2y$10$c7sPSAEm9FOYG5cKN2Xg..Qneil.hQgq.LOIk7aiMRMusD5z2oMbe'),
(4, 'Henry', '$2y$10$9wd.S002ybzhwOda9/7gc.U5XubkJr8669UOcOiPAg/We99kQOl5.'),
(5, 'Ben', '$2y$10$SMw3Mxd1ES2UGsyr3etn7O25daZH1WtcYBULMq1O1l9NxFqZKqCpS'),
(6, 'epic man', '$2y$10$U2V/wiH5jDLqYZYk7NwPuOWkiTZy//dEgzJwW49pKJ9aCRV.R4a5W'),
(7, 'diggity', '$2y$10$BSVctQiGYqOXj7Z.8bhSF.iInnZo0exnF8.y4LzwsdM7vx140a/ZW'),
(8, 'eric', '$2y$10$InewDdaS2UpkteosOiAeDuBprKBW1o3wl6wNhg0hLG/mRZf3YgwIG');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `ssn` int(11) DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `credit_card` int(11) DEFAULT NULL,
  `mother` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `userID`, `ssn`, `phone_number`, `credit_card`, `mother`) VALUES
(1, 1, 2147483647, 999999, 999999, 'dax'),
(2, 2, 33, 1, 12121, 'cat'),
(3, 3, 2147483647, -1, 2147483647, 'Rubin'),
(4, 4, 101049, 245425, 2147483647, 'mom'),
(5, 5, 2147483647, 2147483647, 2147483647, 'motherydoo'),
(6, 6, 4444444, 0, 4444, '434343'),
(7, 7, 3232323, 3232, 232323, 'dary'),
(8, 8, 121322222, 2147483647, 2147483647, 'secsecs');

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`id`, `name`, `url`) VALUES
(2, 'google', 'www.google.com'),
(5, 'dog', 'www.dog.com'),
(6, 'poopoo', 'www.poopoo.com'),
(8, 'YoutTube', 'www.youtube.com');

--
-- Indexes for dumped tables
--


--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `url` (`url`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_data`
--
ALTER TABLE `user_data`
  ADD CONSTRAINT `user_data_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
