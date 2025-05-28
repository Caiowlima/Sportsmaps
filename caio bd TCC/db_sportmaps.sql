-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Maio-2025 às 01:32
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

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
-- Estrutura da tabela `tab_endereco`
--

CREATE TABLE `tab_endereco` (
  `id_end_usuario` int(10) NOT NULL,
  `logradouro` varchar(30) NOT NULL,
  `numero` int(6) NOT NULL,
  `cep` int(9) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `complemento` varchar(20) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `pais` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_usuario`
--

CREATE TABLE `tab_usuario` (
  `id_usuario` int(10) NOT NULL,
  `nome_usuario` varchar(30) NOT NULL,
  `Id_end_usuario` int(10) NOT NULL,
  `cpf_usuario` int(11) NOT NULL,
  `nasc_usuario` date NOT NULL,
  `email_usuario` varchar(30) NOT NULL,
  `senha_usuario` varchar(30) NOT NULL,
  `foto_usuario` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tab_endereco`
--
ALTER TABLE `tab_endereco`
  ADD PRIMARY KEY (`id_end_usuario`);

--
-- Índices para tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `Id_end_usuario` (`Id_end_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tab_endereco`
--
ALTER TABLE `tab_endereco`
  MODIFY `id_end_usuario` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  ADD CONSTRAINT `tab_usuario_ibfk_1` FOREIGN KEY (`Id_end_usuario`) REFERENCES `tab_endereco` (`id_end_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
