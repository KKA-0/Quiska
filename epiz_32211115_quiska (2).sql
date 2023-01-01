-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2022 at 01:23 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_32211115_quiska`
--

-- --------------------------------------------------------

--
-- Table structure for table `confess`
--

CREATE TABLE `confess` (
  `id` int(10) NOT NULL,
  `userid` int(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `confess`
--

INSERT INTO `confess` (`id`, `userid`, `message`, `created_at`) VALUES
(65, 9, ' hello harsh ja\r\n', '2022-12-31 00:31:35'),
(66, 7, 'hello karankka', '2022-12-31 01:02:22'),
(67, 7, 'hello karankka', '2022-12-31 01:02:56'),
(68, 8, ' helllo, harsh bro how are you doing today? \r\n', '2022-12-31 16:14:31'),
(69, 7, ' zsdg', '2022-12-31 16:31:41'),
(70, 7, 'whats up bro how is it going for you these days you got busy now ait you well you have to guess how am i ', '2022-12-31 16:34:22'),
(71, 7, 'whats up bro how is it going for you these days?????? you got busy now aint you? well you have to guess how am i ?', '2022-12-31 16:34:37'),
(72, 3, 'whats up bro how is it going for you these days?????? you got busy now ain\"\"\"t you? well you have to guess how am i ?', '2022-12-31 16:35:48'),
(73, 7, 'whats up bro how is it going for you these days?????? you got busy now ai\'nt you? well you have to guess how am i ?', '2022-12-31 16:43:21');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(1, 'karan test 3', 'try@karan', 'karan'),
(15, 'yash', 'try@karan', 'asdf'),
(16, '12/9/2022', 'karan@asdf', 'are you still working'),
(17, 'harsh', 'harsh@gmail.com', 'hello '),
(18, 'karan', 'asdfsadfsadf@dsf', 'asdf'),
(19, 'karan', 'asdfsadfsadf@dsf', 'asdf'),
(20, 'karan', 'asdfsadfsadf@dsf', 'asdf'),
(21, 'karan', 'asdfsadfsadf@dsf', 'asdf'),
(22, 'karan', 'asdfsadfsadf@dsf', 'asdf'),
(23, 'karan', 'asdfsadfsadf@dsf', 'asdf'),
(24, 'kara123', 'karanyobro@gmail.com', 'aslkdjgl;asdf'),
(25, 'harsh', 'jadonharsh109@gmail.com', 'asjldjgf'),
(26, 'karan', 'jadonharsh109@gmail.com', 'hello '),
(27, 'karan', 'jadonharsh109@gmail.com', 'hello '),
(28, 'karan', 'jadonharsh109@gmail.com', 'hello '),
(29, 'karan', 'jadonharsh109@gmail.com', 'hello'),
(30, 'karan', 'karanyobro@gmail.com', 'lasdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `email`) VALUES
(1, 'asdgasd', '$2y$10$duQ2Ecbh4rKwOVR9Icym1.JFe8tHt1NTycbiDqfj.qRELz40cUC76', '2022-12-07 23:53:33', ''),
(2, 'karan', '$2y$10$d7r1xvLMPU67RnPEMpUafOeRzJsAuFbvMRSXIGzdcozeZDX6n2Xcm', '2022-12-08 00:07:39', 'karan@gmail.cpm'),
(3, 'KKA', '$2y$10$.QIAmGRwan2sN6FJBBdND.VSHnzwor1lOMAwifLVyefVYOpgMXb3.', '2022-12-08 00:28:01', 'karanyobro@gmail.com'),
(4, 'dev', '$2y$10$s/h9.OoDGu58OuMCNcEZd.Wd6tM5uwIyHJkY0zR.I88Oto3bKhOfm', '2022-12-09 17:39:37', 'dev@gmail.com'),
(6, 'asdffgh', '$2y$10$S3Tsqmyhz3e0hCNnkTiD5Oz9E0LAUezvUZkNcPoDj9bs6ZwXyUK2q', '2022-12-09 22:26:26', 'asdfsdfasd@hgsdfg'),
(7, 'KaranKKA', '$2y$10$z.ShAMBco2aAsBB2UAJd8eSalKEnVe/xx.fPk4ZrfhgRcwqR8T4ly', '2022-12-09 22:36:19', 'karanyobro@gmail.com'),
(8, 'Harsh', '$2y$10$AnzgTDVW8xepzIxa3/pgNegWuRiFiQPaIgLa0kd9AopKEAG8zs3PG', '2022-12-09 23:25:02', 'harsh123@gmail.com'),
(9, 'harshja', '$2y$10$njnEpyHBlktw5f.NTlEQVeCizOBNgouxgRBQVzwlFUHfq8CiqNnlC', '2022-12-24 16:39:51', 'karankka1@gmail.com'),
(10, 'Karanbro', '$2y$10$adv2Z2f7oIobipvdmwmtwuNzUMS0EZ.ck6g0OZTNmZIr3sEw3SjrW', '2022-12-31 17:06:21', 'karankka1@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `confess`
--
ALTER TABLE `confess`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
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
-- AUTO_INCREMENT for table `confess`
--
ALTER TABLE `confess`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
