-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 13, 2018 at 08:54 AM
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
(1, 'Boletim Semanal - 12/08/18', '2018-08-11 13:05:06', 0, 'noimage.png', 5),
(2, 'Boletim Semanal - 05/08/18', '2018-08-11 13:05:06', 1, 'noimage.png', 5);

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
(7, 'Univesidade Federal de Lavras - UFLA', 'A Universidade Federal de Lavras (UFLA) é uma instituição de ensino superior pública federal brasileira, sediada na cidade de Lavras, no estado de Minas Gerais. É uma autarquia, vinculada ao Ministério da Educação, órgão responsável por sua manutenção. Po', '2018-08-11 02:51:05', '2018-08-11 02:51:05', 'ufla.jpg'),
(8, 'Prefeitura de Lavras/MG', 'Lavras é um município brasileiro da região do Campo das Vertentes, pertencente ao estado de Minas Gerais. Localiza-se a uma latitude 21° 14\' 43 sul e a uma longitude 44° 59\' 59 oeste, estando a uma altitude de 919 metros e possuindo uma área de 566,1 km².', '2018-08-11 02:52:51', '2018-08-11 02:52:51', 'lavras.png'),
(9, 'Classe de Jovens e Adolescentes - 3ª IPB', 'A Escola Dominical é uma instituição cristã, tipicamente protestante, voltada para a educação, geralmente de jovens e crianças. Junto da catequese e os cursos devocionais e evangelísticos como Cursilho e Curso Alfa, as escolas dominicais são os principais meios de instrução na vida e doutrina do Cristianismo. O adjetivo dominical remete tanto ao costumeiro ensino ministrado aos domingos quanto referência às coisas acerca do Senhor (em latim, Dominus). Entretanto, algumas denominações cristãs preferem outras designações, tais como, Escola Bíblica, Escola Sabatina, Culto das crianças, Reunião de Jovens e Menores, dentre outras.', '2018-08-11 02:58:40', '2018-08-11 02:58:40', 'jovens.jpg'),
(10, 'Test', 'This is a test.', '2018-08-11 03:54:08', '2018-08-11 03:54:08', 'noimage.png'),
(11, 'Prefeitura de Campo Belo/MG', 'Localiza-se a uma altitude de 945 metros e tem uma área de 526,75 km². De acordo com a estimativa do IBGE, sua população em julho de 2015 era de 54 076 habitantes.[3] (densidade demográfica: 102,66hab/km²). Está situada no entroncamento entre duas rodovias federais (BR-354 e BR-369), estando a 30 km da Rodovia Fernão Dias.', '2018-08-11 12:20:38', '2018-08-11 12:20:38', 'campobelo.jpg');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulletins`
--
ALTER TABLE `bulletins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
