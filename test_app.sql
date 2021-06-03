-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 04:25 PM
-- Server version: 5.5.25
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasklist`
--

CREATE TABLE `tasklist` (
  `id` int(10) NOT NULL,
  `login` varchar(255) CHARACTER SET cp1251 NOT NULL,
  `email` varchar(255) CHARACTER SET cp1251 NOT NULL,
  `text` text CHARACTER SET cp1251 NOT NULL,
  `stat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasklist`
--

INSERT INTO `tasklist` (`id`, `login`, `email`, `text`, `stat`) VALUES
(1, 'SergoMorello', 'sergomorello@yandex.ru', 'eff', 1),
(2, 'РІС‹Р°РІС‹', 'СѓС†РїРІС‹Рї', '', 1),
(3, 'fdsfg', 'gewds', 'gewgdsg', 0),
(4, 'gewghdgh', 'rhrehdf', 'hrewhf', 0),
(5, 'dfgrhf', 'hrehsdf', 'ewgdsg\r\nfdf', 0),
(6, 'hrehs', 'rhewdsf', 'rgeweswg', 0),
(7, 'hrewhdfhj', 'jdgdf', 'ewgdsgf', 0),
(8, 'hrgdsgf', 'hsfsdgfz', 'gdsxcb', 1),
(9, 'gdsgsdregh', 'hrdfh', 'redsg', 1),
(10, 'hreghfd', 'ewsgdg', 'hcdfg', 0),
(11, 'fdsf', 'egd', 'egwd', 0),
(12, 'fdsf Р°РІСѓРїР°РІС‹Рї', 'РїРІС‹РїРІС‹Рї', 'СѓРїРІС‹Рї', 0),
(13, 'dsfdsf', 'gegds', 'gregdsgf', 0),
(14, '123', 'dfs', 'fsdf', 0),
(15, '123', '321', '123', 1),
(16, 'SergoMorello', 'fgdf', 'gdfsg', 0),
(17, 'dsfdsg', 'gregdfs', 'ghdfsg', 0),
(18, 'admin', 'fdsf', 'gdegfds Р»Рѕ\r\ngdsgfР°СѓРІРїР°РІС‹Рї \r\n\r\nРїРІС‹РїР°РІ', 0),
(19, 'admin', '&lt;script&gt;alert(&quot;1&quot;);&lt;/script&gt;', '123', 0),
(20, 'admin', 'gegdsg', 'hdfgds', 1),
(21, 'admin', 'gfds', 'gdsg', 0),
(22, 'admin', 'dsfrf', 'dfsdf Р°Р°РІР° &lt;test&gt;&lt;/test&gt;', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE `userlist` (
  `id` int(10) NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pass` varchar(255) CHARACTER SET cp1251 NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`id`, `login`, `pass`, `admin`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasklist`
--
ALTER TABLE `tasklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasklist`
--
ALTER TABLE `tasklist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `userlist`
--
ALTER TABLE `userlist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
