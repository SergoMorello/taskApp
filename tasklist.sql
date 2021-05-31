-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 01:28 PM
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
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `stat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Dumping data for table `tasklist`
--

INSERT INTO `tasklist` (`id`, `login`, `email`, `text`, `stat`) VALUES
(1, 'SergoMorello', 'sergomorello@yandex.ru', 'fdgdfg РїРїРІР°С‹ 2 РїРІС‹РїРІС‹\r\nРІС‹РїРІ', 1),
(2, 'РІС‹Р°РІС‹', 'СѓС†РїРІС‹Рї', 'СѓС†РїРІС‹\r\n\r\nРІР°СѓРїСѓ 21323 "; echo "24wr";', 0),
(3, 'fdsfg', 'gewds', 'gewgdsg', 0),
(4, 'gewghdgh', 'rhrehdf', 'hrewhf', 1),
(5, 'dfgrhf', 'hrehsdf', 'ewgdsg', 0),
(6, 'hrehs', 'rhewdsf', 'rgeweswg', 0),
(7, 'hrewhdfhj', 'jdgdf', 'ewgdsgf', 0),
(8, 'hrgdsgf', 'hsfsdgfz', 'gdsxcb', 0),
(9, 'gdsgsdregh', 'hrdfh', 'redsg', 0),
(10, 'hreghfd', 'ewsgdg', 'hcdfg', 0),
(11, 'fdsf', 'egd', 'egwd', 0),
(12, 'fdsf Р°РІСѓРїР°РІС‹Рї', 'РїРІС‹РїРІС‹Рї', 'СѓРїРІС‹Рї', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasklist`
--
ALTER TABLE `tasklist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasklist`
--
ALTER TABLE `tasklist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
