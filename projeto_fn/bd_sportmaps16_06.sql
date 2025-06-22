-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/06/2025 às 03:40
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_sportmaps_6_0`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_agendamento`
--

CREATE TABLE `tab_agendamento` (
  `id_agendamento` int(11) NOT NULL,
  `fk_id_usuario` int(11) DEFAULT NULL,
  `fk_id_disponibilidade` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `data_reserva_usuario` date DEFAULT NULL,
  `id_mod_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_can_usi`
--

CREATE TABLE `tab_can_usi` (
  `pk_id_can_usi` int(11) NOT NULL,
  `fk_id_agendamento` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `horario` decimal(10,0) DEFAULT NULL,
  `motivo` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_data`
--

CREATE TABLE `tab_data` (
  `id_data` int(11) NOT NULL,
  `dias_semana_empresa` int(30) NOT NULL,
  `status_data` tinyint(1) NOT NULL,
  `id_mod_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tab_data`
--

INSERT INTO `tab_data` (`id_data`, `dias_semana_empresa`, `status_data`, `id_mod_empresa`) VALUES
(1, 0, 0, 35),
(2, 0, 0, 36),
(3, 0, 0, 37);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_empresa`
--

CREATE TABLE `tab_empresa` (
  `id_empresa` int(11) NOT NULL,
  `nome_fantasia` varchar(30) NOT NULL,
  `razao_social` varchar(20) NOT NULL,
  `cnpj_empresa` varchar(20) NOT NULL,
  `end_empresa` varchar(50) NOT NULL,
  `numero_end_empresa` varchar(6) NOT NULL,
  `cep_empresa` varchar(10) NOT NULL,
  `complemento_emp` varchar(350) DEFAULT NULL,
  `bairro_empresa` varchar(30) NOT NULL,
  `cidade_empresa` varchar(20) NOT NULL,
  `estado_empresa` varchar(2) NOT NULL,
  `pais_empresa` varchar(20) DEFAULT NULL,
  `tel_empresa` varchar(20) NOT NULL,
  `email_empresa` varchar(50) NOT NULL,
  `foto1_emp` blob DEFAULT NULL,
  `foto2_emp` blob DEFAULT NULL,
  `foto3_emp` blob DEFAULT NULL,
  `senha_empresa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tab_empresa`
--

INSERT INTO `tab_empresa` (`id_empresa`, `nome_fantasia`, `razao_social`, `cnpj_empresa`, `end_empresa`, `numero_end_empresa`, `cep_empresa`, `complemento_emp`, `bairro_empresa`, `cidade_empresa`, `estado_empresa`, `pais_empresa`, `tel_empresa`, `email_empresa`, `foto1_emp`, `foto2_emp`, `foto3_emp`, `senha_empresa`) VALUES
(3, 'fghj', 'hgfnv', 'fgh', 'fdg', 'fdg', 'fg', NULL, 'dfg', 'fdg', 'PR', NULL, 'gfh', 'kk@gmail.com', NULL, NULL, NULL, '$2y$10$4Ii3FM/mGWTZqfnmo4GUv.BUARMcJHkOtxec9Kr4bUtI7se/SIM9e'),
(4, '34et', 'sf', 'ert', 'fdg', 'dfg', 'drfg', NULL, 'fd', 'gf', 'AP', NULL, 'ert', 'ai@gmail.com', NULL, NULL, NULL, '$2y$10$6Pg7G4KNKk96TUDfqkcsFeF6QBHWT2xMh3WhRP61CwEYPzGXAbTqe'),
(5, '34et', 'sf', 'ert', 'fdg', 'dfg', 'drfg', NULL, 'fd', 'gf', 'AP', NULL, 'ert', 'ai@gmail.com', NULL, NULL, NULL, '$2y$10$F3ZTAkWMGiSEF/BIWhSKSeWxDr4x0Z9qpY7g65WQpl8pmwzMPudAK'),
(6, '34et', 'sf', 'ert', 'fdg', 'dfg', 'drfg', NULL, 'fd', 'gf', 'AP', NULL, 'ert', 'ai@gmail.com', NULL, NULL, NULL, '$2y$10$z65qa1ttUZk6OoBPq4llbuvzHSchcE3MajYsRtdbn6yExcXzR8MAW'),
(7, 'fdg', 'fg', 'fdg', 'gfd', 'gdf', 'gdf', NULL, 'fdg', 'gfd', 'PR', NULL, 'dfg', 'fdg@gmail.com', NULL, NULL, NULL, '$2y$10$vwuDn4jyKxQPOnkgJmm0SOFF45dPv4ImPKchYT/heQP3HdF3o4kQu'),
(8, 'fdg', 'fg', 'fdg', 'gfd', 'gdf', 'gdf', NULL, 'fdg', 'gfd', 'PR', NULL, 'dfg', 'fdg@gmail.com', NULL, NULL, NULL, '$2y$10$n/wSl0fLdTP8nVLf.qdAceMFBRpM37FWK7cJFoYuOK5ppIDFdpTom'),
(9, 'fdg', 'fg', 'fdg', 'gfd', 'gdf', 'gdf', NULL, 'fdg', 'gfd', 'PR', NULL, 'dfg', 'fdg@gmail.com', NULL, NULL, NULL, '$2y$10$B3p7pwJas6KTVd/G6OTx3O7z./51mn/SZC30nvAnvbW6SjSMUENJy'),
(10, 'fdg', 'fg', 'fdg', 'gfd', 'gdf', 'gdf', NULL, 'fdg', 'gfd', 'PR', NULL, 'dfg', 'fdg@gmail.com', NULL, NULL, NULL, '$2y$10$K4QtUAja3snwf0r/00c2beDgDZlwctxm7tGnrg2TSSS8aIbVg/5PW'),
(11, 'fsd', 'sdf', 'sdf', 'dfg', 'gf', 'gfd', NULL, 'fdg', 'fgd', 'PE', NULL, 'sdf', 'oi@gmail.com', NULL, NULL, NULL, '$2y$10$4kp3JJdNTjuyCgK0O3BRZOZowtiUk2tXEchzu1DL4SvBuE.XPBvdy'),
(12, 'fsd', 'sdf', 'sdf', 'dfg', 'gf', 'gfd', NULL, 'fdg', 'fgd', 'PE', NULL, 'sdf', 'oi@gmail.com', NULL, NULL, NULL, '$2y$10$GJvUYnwzngUFwQNjbVgUO.cy0lMjFfX1m.tUCK4lVO.GfK3urlTcu'),
(13, 'fsd', 'sdf', 'sdf', 'dfg', 'gf', 'gfd', NULL, 'fdg', 'fgd', 'PE', NULL, 'sdf', 'oi@gmail.com', NULL, NULL, NULL, '$2y$10$XVZiORu1JazMASFqob0Wj.Uo/jrdodc904uOeGVRfJZOrxYLPvqYq'),
(14, 'fsd', 'sdf', 'sdf', 'dfg', 'gf', 'gfd', NULL, 'fdg', 'fgd', 'PE', NULL, 'sdf', 'oi@gmail.com', NULL, NULL, NULL, '$2y$10$7ms7fNDGmWPzZ10JjH3p1O.HrZdDxOkCvfUKO.ZhmNqES4O/W100C'),
(15, 'fsd', 'sdf', 'sdf', 'dfg', 'gf', 'gfd', NULL, 'fdg', 'fgd', 'PE', NULL, 'sdf', 'oi@gmail.com', NULL, NULL, NULL, '$2y$10$LPnmBQNlU6B5laA.B8gE1eOI9qAroHxBfWTf4LAPX1v1Yh1IweOdm'),
(16, 'sdf', 'sdf', 'sdf', 'dsf', 'fsd', 'dfs', NULL, 'sdf', 'fds', 'PI', NULL, 'sd', 'ola@gmail.com', NULL, NULL, NULL, '$2y$10$DdxExnVJ1RFOUMt6wkb1yu7VJHz8ohYIWn/6B4TZqf6hLZXlOh.yS'),
(17, 'fsd', 'dsf', 'fsd', 'fds', 'fd', 'fsd', NULL, 'fds', 'fd', 'PE', NULL, 'gfh', 'ai@gmail.com', NULL, NULL, NULL, '$2y$10$E1kc2lMT5rhyQQ1Dd34Z7elBb66EGpyGz9uCBIFzy/LTdAEpwxd32'),
(18, 'fdg', 'rt', 'gfd', 'fds', 'fds', 'sfd', NULL, 'fsd', 'fd', 'PI', NULL, 'gdf', 'aa@gmail.com', NULL, NULL, NULL, '$2y$10$gSZ9WrtoyA8z/Blltp5oaOcoXinrk3DyA1dLnV/mPSuOTfMGh4wda'),
(19, 'fs', 'sd', 'fsd', 'fdg', 'fdg', 'fsdg', NULL, 'fgd', 'fgd', 'PE', NULL, 'sfd', 'wi@gmail.com', NULL, NULL, NULL, '$2y$10$f5xvnTQIqy1nhclpEhaINO9eZpi1sMV8p9hN8H1jODgNOMY/S2fTi'),
(20, 'fs', 'sd', 'fsd', 'fdg', 'fdg', 'fsdg', NULL, 'fgd', 'fgd', 'PE', NULL, 'sfd', 'wi@gmail.com', NULL, NULL, NULL, '$2y$10$mKUyZ9dbVMcp0s5sBDJPzeUkDZu3S5Hs0lLBJT1Sju5yI2Zpq7Fg2'),
(21, 'fs', 'sd', 'fsd', 'fdg', 'fdg', 'fsdg', NULL, 'fgd', 'fgd', 'PE', NULL, 'sfd', 'wi@gmail.com', NULL, NULL, NULL, '$2y$10$5osMs5ZEblFqVzVyIE1oXue19HPZHOO17op7PO8u5IEBY0BoBplwa'),
(22, 'fs', 'sd', 'fsd', 'fdg', 'fdg', 'fsdg', NULL, 'fgd', 'fgd', 'PE', NULL, 'sfd', 'wi@gmail.com', NULL, NULL, NULL, '$2y$10$OQAmPcn13Okoaf/btLM9D.hQOoq/ubpFYjkxPJXhoNYcrsW6ucG7a'),
(23, 'fs', 'sd', 'fsd', 'fdg', 'fdg', 'fsdg', NULL, 'fgd', 'fgd', 'CE', NULL, 'sfd', 'wi@gmail.com', NULL, NULL, NULL, '$2y$10$fSD2kzj44uVYg.PWpEM7PuurVT7JFHDEfm2r1UvUK382u/JAEVRCm'),
(24, 'fs', 'sd', 'fsd', 'fdg', 'fdg', 'fsdg', NULL, 'fgd', 'fgd', 'CE', NULL, 'sfd', 'wi@gmail.com', NULL, NULL, NULL, '$2y$10$iUfJnOOQDFBfW49JnpllTuFjEKVDsdzuD8zw312OA9RXh7xqQ3mUW'),
(25, 'fs', 'sd', 'fsd', 'fdg', 'fdg', 'fsdg', NULL, 'fgd', 'fgd', 'CE', NULL, 'sfd', 'wi@gmail.com', NULL, NULL, NULL, '$2y$10$j3nZeznPXTlEYQQOqR7SCuODMtMwU5SAEm19VDdYEbIhMjTnPsL/O'),
(26, 'fs', 'sd', 'fsd', 'fdg', 'fdg', 'fsdg', NULL, 'fgd', 'fgd', 'CE', NULL, 'sfd', 'wi@gmail.com', NULL, NULL, NULL, '$2y$10$fim1udtzSVsF/pwQdt3iuuEs/5VLQTO4YhOxwIL/to6QEN9HxDnQ2'),
(27, 'fs', 'sd', 'fsd', 'fdg', 'fdg', 'fsdg', NULL, 'fgd', 'fgd', 'CE', NULL, 'sfd', 'wi@gmail.com', NULL, NULL, NULL, '$2y$10$0V.j6HX5zPzDTDHmk/XcFeCFyrbx7bMGzVaC0ANtn9cmcLhuimwQq'),
(28, 'fs', 'sd', 'fsd', 'fdg', 'fdg', 'fsdg', NULL, 'fgd', 'fgd', 'CE', NULL, 'sfd', 'wi@gmail.com', NULL, NULL, NULL, '$2y$10$3Q.Hbc6pjI3oDh65aYxk7erl41PJbL6H/lbCYEG0R7kc9AoU8Q29.'),
(29, 'fs', 'sd', 'fsd', 'fdg', 'fdg', 'fsdg', NULL, 'fgd', 'fgd', 'CE', NULL, 'sfd', 'wi@gmail.com', NULL, NULL, NULL, '$2y$10$t0A5bVmnc/xyOFFTF/Lave2s4BAnpfBVhDHbjSFxIIhcX/tE7YMpO'),
(30, 'fs', 'sd', 'fsd', 'fdg', 'fdg', 'fsdg', NULL, 'fgd', 'fgd', 'CE', NULL, 'sfd', 'wi@gmail.com', NULL, NULL, NULL, '$2y$10$hjuYdbbKRQJ8eJVjG9kwe.pfgbaL0X/lYKuqQxnbXsum5NAejwErC'),
(31, 'fs', 'sd', 'fsd', 'fdg', 'fdg', 'fsdg', NULL, 'fgd', 'fgd', 'CE', NULL, 'sfd', 'wi@gmail.com', NULL, NULL, NULL, '$2y$10$4nAvZO7/BAbrt3L7uQHOSOL5lNgspUgsRqwLL2riGofsoyr6MBQ3y'),
(32, 'fs', 'sd', 'fsd', 'fdg', 'fdg', 'fsdg', NULL, 'fgd', 'fgd', 'CE', NULL, 'sfd', 'wi@gmail.com', NULL, NULL, NULL, '$2y$10$T1jxdwO4l9T8Yl0EFvRHWe1xOUZbPvw6UVwt42i8TiXS0w2UjpejO'),
(33, 'fs', 'sd', 'fsd', 'fdg', 'fdg', 'fsdg', NULL, 'fgd', 'fgd', 'CE', NULL, 'sfd', 'wi@gmail.com', NULL, NULL, NULL, '$2y$10$3qZFzy1eqm4HHY8m59VoBuMWLKa86Xx2Eexi1ZFdHx68JcndKyv/S'),
(34, 'fs', 'sd', 'fsd', 'fdg', 'fdg', 'fsdg', NULL, 'fgd', 'fgd', 'CE', NULL, 'sfd', 'wi@gmail.com', NULL, NULL, NULL, '$2y$10$PI6yEo7ACSrSUAiESm/HEefuKgO0HMYMCqIVmDRsEN3uN3iEsHaty'),
(35, 'fs', 'sd', 'fsd', 'fdg', 'fdg', 'fsdg', NULL, 'fgd', 'fgd', 'CE', NULL, 'sfd', 'wi@gmail.com', NULL, NULL, NULL, '$2y$10$ctKiW8kSn3joOE.ktf/nqe1TerEIjqdENwjj4n0d9nDxkjzHN1.h2'),
(36, 'fs', 'sd', 'fsd', 'fdg', 'fdg', 'fsdg', NULL, 'fgd', 'fgd', 'CE', NULL, 'sfd', 'wi@gmail.com', NULL, NULL, NULL, '$2y$10$syJAIipPO4OU6usiqocH/u7XGxDdTL9/AcSOsCZWfUcWT0anJF.w2'),
(37, 'rew', 'ewr', 'wer', 'rwe', 'we', 'wer', NULL, 'r', 'rew', 'PE', NULL, 'wer', 'wer@gmail.com', NULL, NULL, NULL, '$2y$10$3sAGNVfnDRCdSbR2VdfiLO97Ii9oTtgRWD4iGtBSw8hUZTeF4UAUm'),
(38, 'rew', 'ewr', 'wer', 'rwe', 'we', 'wer', NULL, 'r', 'rew', 'PE', NULL, 'wer', 'wer@gmail.com', NULL, NULL, NULL, '$2y$10$.FeiTo0e88SgORYqJl7QTuZ5XSTP8IQoLsCKsEUSzbxAIq3TCQzlK'),
(39, 'rew', 'ewr', 'wer', 'rwe', 'we', 'wer', NULL, 'r', 'rew', 'PE', NULL, 'wer', 'wer@gmail.com', NULL, NULL, NULL, '$2y$10$hAHh02hJIeiY9BA5Gdj6Xe2mNOUxck/e81M0VdF9Ir6wR5II6NCTO'),
(40, 'dfg', 'fdgs', 'fdg', 'ffd', 'dfdf', 'dsfds', NULL, 'fds', 'sdf', 'RR', NULL, 'fdg', 'oi@gmail.com', NULL, NULL, NULL, '$2y$10$BfEmRowv3bCuPhUgYwfO5O6xSg9k5xv03kq/lVnBN4HBYmrXN88em'),
(41, 'ggf', 'gf', 'fdg', 'fdg', 'dg', 'dfg', NULL, 'dfg', 'gdf', 'PI', NULL, 'fdg', 'fdg@gmail.com', NULL, NULL, NULL, '$2y$10$EgEsaqvht1nt3QYI4gVZoOzfbyEa.2jbDk6qmzwCfLDjXlgEV38bm'),
(42, 'dfg', 'dfg', 'dfg', 'fgd', 'fg', 'dfg', NULL, 'gf', 'fdg', 'PE', NULL, 'dfg', 'Bene@gmail.com', NULL, NULL, NULL, '$2y$10$O5KfsMQDmejmp/4g3JidhOvbTHnMsCP0hePE8CQETPVEUYw6bsCKO'),
(43, 'sdf', 'sdf', 'sdf', 'dsf', 'dfs', 'ds', NULL, 'fsd', 'dfs', 'PE', NULL, 'dsf', 'sdf@gmail.com', NULL, NULL, NULL, '$2y$10$eiuUYEkB4Jrclw5R2chjBOMrjzKZ/ok0r8f7dG5bA6XduZrrxYqCC'),
(44, 'dfg', 'dfg', 'dfg', 'fgd', 'fdg', 'fdg', NULL, 'fdg', 'fdg', 'PB', NULL, 'dgf', 'gdf@gmail.com', NULL, NULL, NULL, '$2y$10$/ffMkTbZL7T9qAm/.CecOulsnjrcQjeygHxQ9Dvph5bPPnRTtGozS'),
(45, 'dfg', 'dfg', 'dfg', 'fgd', 'fdg', 'fdg', NULL, 'fdg', 'fdg', 'PB', NULL, 'dgf', 'gdf@gmail.com', NULL, NULL, NULL, '$2y$10$hsd6qL8Q2DiXqJtW8UAKeeb.M/LsX.pY4PyLi7RNOD69qDs4c3X3S'),
(46, 'fdg', 'fdg', 'dfg', 'asd', 'asd', 'asd', NULL, 'asd', 'sad', 'PE', NULL, 'dfg', 'dfg@gmail.com', NULL, NULL, NULL, '$2y$10$MFn6.9/N2bRZHC5TGEvJpOgfaQf4eCXO2EcrxU6WPIvMraWJCnlK2'),
(47, 'dfg', 'fdg', 'fdg', 'sdf', 'sdf', 'sdfdfs', NULL, 'sdf', 'sdf', 'DF', NULL, 'dfg', 'a@gmail.com', NULL, NULL, NULL, '$2y$10$LrvQWG2a9DohiW5YALSfUOUw2aipKd2GTfXd6ExjaSEEs1GJTg6r2'),
(48, 'fdg', 'dfg', 'dfg', 'sdf', 'sdf', 'sdf', NULL, 'dfs', 'sdf', 'SC', NULL, 'dfg', 'fdg@gmail.com', NULL, NULL, NULL, '$2y$10$4/m3MGav8HmARSr/YcOziOx91IaeOtxLCHcV3pk86YovKXr8sGY/6'),
(49, 'cv', 'cxv', 'xcv', 'cxv', 'xcv', 'cxv', NULL, 'xcv', 'cxv', 'PI', NULL, 'xcv', 'xcv@gmail.com', NULL, NULL, NULL, '$2y$10$wVM159Lbzw6kw6Fkhmyz1.ykolisYBq07ffg6Z8vUgvD1lUQIpfD.'),
(50, 'cv', 'cxv', 'xcv', 'cxv', 'xcv', 'cxv', NULL, 'xcv', 'cxv', 'PI', NULL, 'xcv', 'xcv@gmail.com', NULL, NULL, NULL, '$2y$10$Oidm6q4hXg8yihrfvrxxYuK8NlD/.ey0i5jXHah4tP4Dtib/QEUfK'),
(51, 'fgh', 'fgd', 'hgf', 'sdf', 'dsf', 'dsf', NULL, 'fds', 'dsf', 'PE', NULL, 'h', 'wai@gmail.com', NULL, NULL, NULL, '$2y$10$5GGN2r/OpDQjFm9RpZl7RenoEwXXeM9OiHGclzKdv4HKAIUt0C2Ye'),
(52, 'cvb', 'cvb', 'cvb', 'df', 'sdf', 'sdf', NULL, 'fsd', 'sdf', 'PI', NULL, 'cvb', 'fds@gmail.com', NULL, NULL, NULL, '$2y$10$hq14flir7lztTJIbtv1F..Xbo1E35wMhqjNwJKwFvQIadynXWZJla');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_hora`
--

CREATE TABLE `tab_hora` (
  `id_hora` int(11) NOT NULL,
  `horario_inicio` varchar(5) NOT NULL,
  `horario_termino` varchar(5) NOT NULL,
  `id_data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_modalidade`
--

CREATE TABLE `tab_modalidade` (
  `id_modalidade` int(11) NOT NULL,
  `mod_esporte` varchar(20) NOT NULL,
  `mod_qtd_max` int(3) DEFAULT NULL,
  `mod_qtd_min` int(3) DEFAULT NULL,
  `mod_restricoes` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_mod_empresa`
--

CREATE TABLE `tab_mod_empresa` (
  `id_mod_empresa` int(11) NOT NULL,
  `id_modalidade` int(11) DEFAULT NULL,
  `id_empresa` int(11) NOT NULL,
  `modalidade` varchar(50) NOT NULL,
  `quantidade_minima` int(20) NOT NULL,
  `quantidade_maxima` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tab_mod_empresa`
--

INSERT INTO `tab_mod_empresa` (`id_mod_empresa`, `id_modalidade`, `id_empresa`, `modalidade`, `quantidade_minima`, `quantidade_maxima`) VALUES
(1, NULL, 10, 'futebol', 0, 0),
(2, NULL, 10, 'futsal', 0, 0),
(3, NULL, 10, 'society', 0, 0),
(4, NULL, 10, 'futvolei', 0, 0),
(5, NULL, 10, 'basquete', 0, 0),
(6, NULL, 10, 'natacao', 0, 0),
(7, NULL, 10, 'tenis_mesa', 0, 0),
(8, NULL, 10, 'volei_quadra', 0, 0),
(9, NULL, 10, 'volei_praia', 0, 0),
(10, NULL, 15, 'futebol', 5, 11),
(11, NULL, 15, 'futsal', 5, 7),
(12, NULL, 15, 'society', 7, 11),
(13, NULL, 15, 'futvolei', 3, 5),
(14, NULL, 15, 'basquete', 5, 10),
(15, NULL, 15, 'natacao', 1, 1),
(16, NULL, 15, 'tenis_mesa', 1, 2),
(17, NULL, 15, 'volei_quadra', 6, 12),
(18, NULL, 15, 'volei_praia', 2, 2),
(19, NULL, 20, 'futsal', 4, 7),
(20, NULL, 21, 'futsal', 4, 7),
(21, NULL, 23, 'futebol', 5, 11),
(22, NULL, 24, 'futebol', 5, 11),
(23, NULL, 25, 'futebol', 5, 11),
(24, NULL, 26, 'futebol', 5, 11),
(25, NULL, 27, 'futebol', 5, 11),
(26, NULL, 28, 'futebol', 5, 11),
(27, NULL, 29, 'futebol', 5, 11),
(28, NULL, 30, 'futebol', 5, 11),
(29, NULL, 31, 'futebol', 5, 11),
(30, NULL, 32, 'futebol', 5, 11),
(31, NULL, 33, 'futebol', 5, 11),
(32, NULL, 34, 'futebol', 5, 11),
(33, NULL, 35, 'futebol', 5, 11),
(34, NULL, 36, 'futebol', 5, 11),
(35, NULL, 52, 'futebol', 5, 11),
(36, NULL, 52, 'futsal', 4, 7),
(37, NULL, 52, 'society', 6, 11);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_usuario`
--

CREATE TABLE `tab_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(30) NOT NULL,
  `cpf_usuario` varchar(15) NOT NULL,
  `rg_usuario` int(12) NOT NULL,
  `nasc_usuario` date NOT NULL,
  `email_usuario` varchar(30) NOT NULL,
  `celular_usuario` int(12) NOT NULL,
  `senha_usuario` varchar(255) NOT NULL,
  `end_usuario` varchar(50) NOT NULL,
  `end_usuario_numero` int(5) NOT NULL,
  `bairro_usuario` varchar(30) NOT NULL,
  `cep_usuario` varchar(30) NOT NULL,
  `cidade_usuario` varchar(2) NOT NULL,
  `estado_usuario` varchar(20) NOT NULL,
  `foto_usuario` blob DEFAULT NULL,
  `complemento_end_user` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tab_usuario`
--

INSERT INTO `tab_usuario` (`id_usuario`, `nome_usuario`, `cpf_usuario`, `rg_usuario`, `nasc_usuario`, `email_usuario`, `celular_usuario`, `senha_usuario`, `end_usuario`, `end_usuario_numero`, `bairro_usuario`, `cep_usuario`, `cidade_usuario`, `estado_usuario`, `foto_usuario`, `complemento_end_user`) VALUES
(2, 'dfg', 'dfg', 0, '2001-06-06', 'oi@gmail.com', 959, '$2y$10$vfBZm7diXcUPDye2eVl3I.ig0opL67no6Sv97luuictY4SIkuC57u', 'dfg', 0, 'dfg', 'dfgfd', 'fd', 'PE', NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tab_agendamento`
--
ALTER TABLE `tab_agendamento`
  ADD PRIMARY KEY (`id_agendamento`),
  ADD KEY `fk_id_usuario` (`fk_id_usuario`),
  ADD KEY `fk_id_disponibilidade` (`fk_id_disponibilidade`),
  ADD KEY `id_mod_empresa` (`id_mod_empresa`);

--
-- Índices de tabela `tab_can_usi`
--
ALTER TABLE `tab_can_usi`
  ADD PRIMARY KEY (`pk_id_can_usi`),
  ADD KEY `fk_id_agendamento` (`fk_id_agendamento`);

--
-- Índices de tabela `tab_data`
--
ALTER TABLE `tab_data`
  ADD PRIMARY KEY (`id_data`),
  ADD KEY `id_mod_empresa` (`id_mod_empresa`);

--
-- Índices de tabela `tab_empresa`
--
ALTER TABLE `tab_empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Índices de tabela `tab_hora`
--
ALTER TABLE `tab_hora`
  ADD PRIMARY KEY (`id_hora`),
  ADD KEY `id_data` (`id_data`);

--
-- Índices de tabela `tab_modalidade`
--
ALTER TABLE `tab_modalidade`
  ADD PRIMARY KEY (`id_modalidade`);

--
-- Índices de tabela `tab_mod_empresa`
--
ALTER TABLE `tab_mod_empresa`
  ADD PRIMARY KEY (`id_mod_empresa`),
  ADD KEY `id_empresa` (`id_empresa`),
  ADD KEY `id_modalidade` (`id_modalidade`);

--
-- Índices de tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tab_data`
--
ALTER TABLE `tab_data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tab_empresa`
--
ALTER TABLE `tab_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `tab_hora`
--
ALTER TABLE `tab_hora`
  MODIFY `id_hora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tab_modalidade`
--
ALTER TABLE `tab_modalidade`
  MODIFY `id_modalidade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tab_mod_empresa`
--
ALTER TABLE `tab_mod_empresa`
  MODIFY `id_mod_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tab_agendamento`
--
ALTER TABLE `tab_agendamento`
  ADD CONSTRAINT `tab_agendamento_ibfk_1` FOREIGN KEY (`id_mod_empresa`) REFERENCES `tab_agendamento` (`id_agendamento`);

--
-- Restrições para tabelas `tab_data`
--
ALTER TABLE `tab_data`
  ADD CONSTRAINT `tab_data_ibfk_1` FOREIGN KEY (`id_mod_empresa`) REFERENCES `tab_mod_empresa` (`id_mod_empresa`);

--
-- Restrições para tabelas `tab_hora`
--
ALTER TABLE `tab_hora`
  ADD CONSTRAINT `tab_hora_ibfk_1` FOREIGN KEY (`id_data`) REFERENCES `tab_data` (`id_data`);

--
-- Restrições para tabelas `tab_mod_empresa`
--
ALTER TABLE `tab_mod_empresa`
  ADD CONSTRAINT `tab_mod_empresa_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `tab_empresa` (`id_empresa`),
  ADD CONSTRAINT `tab_mod_empresa_ibfk_2` FOREIGN KEY (`id_modalidade`) REFERENCES `tab_modalidade` (`id_modalidade`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
