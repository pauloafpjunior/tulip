-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 16, 2018 at 09:36 AM
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
(5, 'Bíblia', '2018-08-14 01:03:39', 1, 'img3.png', 5),
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
(23, 'Boletim Semanal Nº 1', '2018-08-14 02:19:44', 1, 'maxresdefault.jpg', 7),
(24, 'Teste', '2018-08-14 17:36:06', 0, 'noimage.png', 13),
(25, 'Teste2', '2018-08-14 17:36:17', 0, 'noimage.png', 13);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`, `description`, `last_updated`, `image`) VALUES
(5, 'Terceira Igreja Presbiteriana de Lavras', 'A Igreja Presbiteriana do Brasil é uma igreja protestante reformada, de orientação calvinista presbiteriana. Foi fundada em 1862 por um missionário estadunidense chamado Ashbel Green Simonton, que chegou ao Rio de Janeiro no dia 12 de agosto de 1859. É a ', '2018-08-11 02:48:55', 'ipb.png'),
(6, 'Inbatec/UFLA', 'A Incubadora de Empresas de Base Tecnológica da Universidade Federal de Lavras, denominada Inbatec/UFLA, foi inaugurada em 2009, sendo vinculada ao Núcleo de Inovação Tecnológica – NINTEC, criado em 2007, com base na Lei de Inovação. Atualmente, a Incubad', '2018-08-11 02:49:59', 'inbatec.jpg'),
(7, 'Univesidade Federal de Lavras - UFLA', 'A Universidade Federal de Lavras (UFLA) é uma instituição de ensino superior pública federal brasileira, sediada na cidade de Lavras, no estado de Minas Gerais. É uma autarquia, vinculada ao Ministério da Educação, órgão responsável por sua manutenção. Po', '2018-08-14 02:19:44', 'ufla.jpg');

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
(13, 'Devocional', 'noimage.png', '<p style=\"text-align:center;\"><strong>Cristo, que é a nossa vida</strong><br><strong>Texto-base: </strong><i>Colossenses 3.4</i></p><p style=\"text-align:justify;\">Esta expressão maravilhosamente rica do apóstolo Paulo indica que Cristo é a fonte de nossa vida. “Ele vos deu vida” (Efésios 2.1). Aquela mesma voz que trouxe Lázaro para fora do sepulcro nos ressuscitou, para andarmos em “novidade de vida” (Romanos 6.4). Agora, Ele é a essência de nossa vida espiritual. É por intermédio da vida dele que nós vivemos. Cristo está em nós, a esperança da glória, a causa de nossas ações, o pensamento central que direciona os demais pensamentos.</p><p style=\"text-align:justify;\">Jesus é o alimento de nossa vida. De que mais o crente pode se alimentar além da carne e sangue de Jesus? “Este é o pão que desce do céu, para que todo o que dele comer não pereça” (João 6.50). Ó cansados peregrinos neste deserto de pecado, vocês nunca conseguirão um bocado que sacie a fome de seus espíritos, a menos que o encontre em Jesus! Ele é a consolação de nossa vida. Todas as nossas verdadeiras alegrias procedem de Cristo. Em tempos de provação, Ele é a nossa consolação. Não existe qualquer outro ser pelo qual valha a pena vivermos, exceto o Senhor Jesus. E a graça dele “é melhor do que a vida” (Salmos 63.3). Cristo é o objetivo de nossa vida. Como o navio se apressa rumo ao porto, assim o crente se apressa rumo ao ancoradouro do coração de seu Salvador. Como a flecha voa até seu alvo, assim o crente voa até o aperfeiçoamento de sua comunhão com Cristo Jesus. Assim como o soldado luta por seu capitão, sendo recompensado quando seu capitão conquista a vitória, assim também o crente luta por Cristo, obtendo o seu triunfo nos triunfos de seu Senhor. “Para mim, o viver é Cristo” (Filipenses 1.21).&nbsp;</p><p style=\"text-align:justify;\">Cristo é o exemplo de nossa vida. Onde existe a mesma vida no interior, haverá, em grande medida, os mesmos resultados no exterior. Se vivemos em comunhão íntima com o Senhor Jesus, amadureceremos como Ele. Devemos colocá-Lo diante de nós, como nosso modelo divino, pois assim nos esforçaremos para andar nos passos dele, até que Ele se torne a coroa de nossa vida, na glória. Oh, quão seguro, quão honrável, quão alegre é o crente cuja vida é Cristo!<br>&nbsp;</p><p style=\"text-align:center;\"><strong>Fonte</strong>: <a href=\"https://voltemosaoevangelho.com/blog/2016/08/10-de-agosto-devocional-diario-charles-spurgeon\">https://voltemosaoevangelho.com/blog/2016/08/10-de-agosto-devocional-diario-charles-spurgeon</a></p>', 5);

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulletins`
--
ALTER TABLE `bulletins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
