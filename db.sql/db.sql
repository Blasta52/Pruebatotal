-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 07, 2020 at 02:27 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bd-trotalo`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `cliente` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `cliente`, `state`, `created_at`, `update_at`) VALUES
(13, 'C & A', 'active', '2020-12-06 21:36:30', '2020-12-06 21:36:30'),
(15, 'TAPVENTA', 'active', '2020-12-06 21:44:38', '2020-12-06 21:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `contratistas`
--

CREATE TABLE `contratistas` (
  `id_contratista` int(11) NOT NULL,
  `contratista` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contratistas`
--

INSERT INTO `contratistas` (`id_contratista`, `contratista`, `created_at`, `update_at`) VALUES
(8, 'IngCamilo', '2020-12-06 21:31:45', '2020-12-06 21:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `incidentes`
--

CREATE TABLE `incidentes` (
  `id_incidentes` int(11) NOT NULL,
  `incidente` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_cliente` int(11) NOT NULL,
  `id_contratista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `incidentes`
--

INSERT INTO `incidentes` (`id_incidentes`, `incidente`, `created_at`, `update_at`, `id_cliente`, `id_contratista`) VALUES
(23, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2020-12-06 21:36:51', '2020-12-06 21:36:51', 13, 8),
(24, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2020-12-06 21:38:55', '2020-12-06 21:38:55', 13, 8),
(25, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2020-12-06 21:45:54', '2020-12-06 21:45:54', 15, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `contratistas`
--
ALTER TABLE `contratistas`
  ADD PRIMARY KEY (`id_contratista`);

--
-- Indexes for table `incidentes`
--
ALTER TABLE `incidentes`
  ADD PRIMARY KEY (`id_incidentes`),
  ADD KEY `fk_incidentes_cliente_idx` (`id_cliente`),
  ADD KEY `fk_incidentes_contratistas1_idx` (`id_contratista`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contratistas`
--
ALTER TABLE `contratistas`
  MODIFY `id_contratista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `incidentes`
--
ALTER TABLE `incidentes`
  MODIFY `id_incidentes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `incidentes`
--
ALTER TABLE `incidentes`
  ADD CONSTRAINT `fk_incidentes_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_incidentes_contratistas1` FOREIGN KEY (`id_contratista`) REFERENCES `contratistas` (`id_contratista`) ON DELETE NO ACTION ON UPDATE NO ACTION;