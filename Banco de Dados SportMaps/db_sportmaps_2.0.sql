-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 04-Jun-2025 às 00:16
-- Versão do servidor: 5.7.36
-- versão do PHP: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_sportmaps`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_empresa`
--

CREATE TABLE `tab_empresa` (
  `id_empresa` int(11) NOT NULL,
  `nome_fantasia` varchar(30) NOT NULL,
  `cnpj_empresa` varchar(20) NOT NULL,
  `end_empresa` varchar(50) NOT NULL,
  `numero_end_empresa` decimal(6,0) NOT NULL,
  `cep_empresa` varchar(10) NOT NULL,
  `complemento_emp` varchar(30) NOT NULL,
  `bairro_empresa` varchar(30) NOT NULL,
  `cidade_empresa` varchar(20) NOT NULL,
  `estado_empresa` varchar(2) NOT NULL,
  `pais_empresa` varchar(20) NOT NULL,
  `tel_empresa` varchar(20) NOT NULL,
  `email_empresa` varchar(50) NOT NULL,
  `foto1_emp` blob NOT NULL,
  `foto2_emp` blob NOT NULL,
  `foto3_emp` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_usuario`
--

CREATE TABLE `tab_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(30) NOT NULL,
  `cpf_usuario` varchar(15) NOT NULL,
  `nasc_usuario` date NOT NULL,
  `email_usuario` varchar(30) NOT NULL,
  `senha_usuario` varchar(20) NOT NULL,
  `end_usuario` varchar(50) NOT NULL,
  `end_usuario_numero` int(5) NOT NULL,
  `bairro_usuario` varchar(30) NOT NULL,
  `cep_usuario` varchar(30) NOT NULL,
  `cidade_usuario` varchar(2) NOT NULL,
  `estado_usuario` varchar(20) NOT NULL,
  `pais_usuario` varchar(30) NOT NULL,
  `complemento_end_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tab_empresa`
--
ALTER TABLE `tab_empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Índices para tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tab_empresa`
--
ALTER TABLE `tab_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
