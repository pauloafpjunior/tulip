-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 13, 2018 at 11:22 PM
-- Server version: 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.2.7-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tulipdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulletins`
--

CREATE TABLE `bulletins` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  `organization_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulletins`
--

INSERT INTO `bulletins` (`id`, `title`, `created_at`, `published`, `image`, `organization_id`) VALUES
(3, 'Xadrez', '2018-08-14 01:03:16', 1, 'img1.png', 5),
(4, 'Casamento', '2018-08-14 01:03:29', 0, 'img2.png', 5),
(5, 'Bíblia', '2018-08-14 01:03:39', 0, 'img3.png', 5),
(6, 'Cristianismo Descomplicado', '2018-08-14 01:04:05', 1, 'img4.png', 5),
(7, 'Teste', '2018-08-14 01:51:05', 0, 'noimage.png', 11),
(8, 'Teste', '2018-08-14 01:52:11', 0, 'noimage.png', 11),
(9, 'Teste', '2018-08-14 01:52:37', 0, 'noimage.png', 11),
(10, 'Teste', '2018-08-14 01:53:00', 0, 'noimage.png', 11),
(11, 'Teste', '2018-08-14 01:53:43', 0, 'noimage.png', 11),
(12, 'dddd', '2018-08-14 01:53:54', 0, 'noimage.png', 11),
(13, 'dddfgg', '2018-08-14 01:54:14', 0, 'noimage.png', 11),
(14, 'dddfggfff', '2018-08-14 01:54:57', 0, 'noimage.png', 11),
(15, 'dddfggfffdd', '2018-08-14 01:55:28', 0, 'noimage.png', 11),
(16, 'dddfggfffddfff', '2018-08-14 01:55:50', 0, 'noimage.png', 11),
(17, 'lkjdlkjd', '2018-08-14 01:56:52', 0, 'noimage.png', 11),
(18, 'lkjdlkjd', '2018-08-14 01:57:14', 0, 'noimage.png', 11),
(19, 'lçkjçlk', '2018-08-14 01:57:32', 0, 'noimage.png', 10),
(20, 'çlkjdddd', '2018-08-14 01:59:31', 0, 'noimage.png', 10),
(21, 'rrrr', '2018-08-14 01:59:52', 1, 'noimage.png', 10),
(22, 'kkkkk', '2018-08-14 02:00:40', 0, 'noimage.png', 10),
(23, 'Boletim Semanal Nº 1', '2018-08-14 02:19:44', 1, 'maxresdefault.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`, `description`, `created_at`, `last_updated`, `image`) VALUES
(5, 'Terceira Igreja Presbiteriana de Lavras', 'A Igreja Presbiteriana do Brasil é uma igreja protestante reformada, de orientação calvinista presbiteriana. Foi fundada em 1862 por um missionário estadunidense chamado Ashbel Green Simonton, que chegou ao Rio de Janeiro no dia 12 de agosto de 1859. É a ', '2018-08-11 02:48:55', '2018-08-11 02:48:55', 'ipb.png'),
(6, 'Inbatec/UFLA', 'A Incubadora de Empresas de Base Tecnológica da Universidade Federal de Lavras, denominada Inbatec/UFLA, foi inaugurada em 2009, sendo vinculada ao Núcleo de Inovação Tecnológica – NINTEC, criado em 2007, com base na Lei de Inovação. Atualmente, a Incubad', '2018-08-11 02:49:59', '2018-08-11 02:49:59', 'inbatec.jpg'),
(7, 'Univesidade Federal de Lavras - UFLA', 'A Universidade Federal de Lavras (UFLA) é uma instituição de ensino superior pública federal brasileira, sediada na cidade de Lavras, no estado de Minas Gerais. É uma autarquia, vinculada ao Ministério da Educação, órgão responsável por sua manutenção. Po', '2018-08-11 02:51:05', '2018-08-14 02:19:44', 'ufla.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `bulletin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `title`, `icon`, `content`, `bulletin_id`) VALUES
(1, 'Aniversariantes', 'birthday.png', 'Aniversariantes', 6),
(2, 'Devocional', 'devocional.png', 'Devocional', 6),
(3, 'Programaçao', 'calendar.png', '<p><strong>Segunda</strong>: Estudo Bíblico (19h)&nbsp;<br><strong>Terça</strong>: Reunião de Oração (19h)</p>', 6),
(4, 'Escala', 'people.png', '<p>19/08: Paulo<br>20/08: José</p>', 6),
(7, 'dddd', 'noimage.png', '<p>&nbsp;</p>', 22),
(8, 'kjhkj', 'noimage.png', '<p>&nbsp;</p>', 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulletins`
--
ALTER TABLE `bulletins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulletins`
--
ALTER TABLE `bulletins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
