-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2025 at 12:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`Id`, `Name`, `Email`, `Password`) VALUES
(1, 'Muhammad Abbas', 'abbas458468@gmail.com', '$2y$10$QPPwfPZqBrIBw'),
(2, 'Arslan', 'arslan@gmail.com', '$2y$10$ItZtoXicrhsAN'),
(3, 'Iftikhar Hussain ', 'ifikhar@gmail.com', '$2y$10$d2FxTDatQm2NG'),
(4, 'Ali Hussain', 'ali@gmail.com', '$2y$10$vgmDDRLXEQNyf');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Muhammad Abbas', 'abbas458468@gmail.com', '$2y$10$1Xv.MSR0YpKuOCl63XXVKOb9z/G8Xptzi/ZNfpRfahJoJ/08.YC2u'),
(2, 'Iftikhar Hussain ', 'abb458468@gmail.com', '$2y$10$DHAE0c0na1eqYONBSaa/NuUnV99vNsSjNnoydRByqkhkUES1nzuKK'),
(3, 'Nair', 'nasir@gmail.com', '$2y$10$keS6/zP9zlLl21tjxZI6ouIlhZkKgznzNCk9VyFHJNKBl6de08kv.'),
(4, 'Ali Hussain ', 'abbas458@gmail.com', '202cb962ac59075b964b07152d234b70'),
(5, 'Nelofar ', 'ab123@gmail.com', '202cb962ac59075b964b07152d234b70'),
(6, 'Arslan', 'arslan@gmail.com', '202cb962ac59075b964b07152d234b70'),
(7, 'kashif', 'kashif@gmail.com', '123'),
(8, 'muzu', 'muzu@gmail.com', '$2y$10$FvJQ0KYYCz8ULdsIEqxipufdQWI/QmTDj9cNreweGGkcRwxIbPXRO'),
(9, 'Samira batool', 'abb@gmail.com', '$2y$10$dP9YERZW0ThssTjVfEi3VuODf8zE8EqLmL84JyH9O41EI4/6OgDWO'),
(10, 'yazdan', 'yazdan@gmail.com', '$2y$10$tn9QPrvIXTYHvo1sL4EtWO1veoZzCEkDzs2G0W/Yka66bZer06/oK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
