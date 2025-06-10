-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 10-Jun-2025 às 00:52
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
-- Estrutura da tabela `tab_agendamento`
--

CREATE TABLE `tab_agendamento` (
  `id_agendamento` int(11) NOT NULL,
  `fk_id_usuario` int(11) DEFAULT NULL,
  `fk_id_disponibilidade` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `data_reserva_usuario` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_can_usi`
--

CREATE TABLE `tab_can_usi` (
  `pk_id_can_usi` int(11) NOT NULL,
  `fk_id_agendamento` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `horario` decimal(10,0) DEFAULT NULL,
  `motivo` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_data_hora`
--

CREATE TABLE `tab_data_hora` (
  `id_data_hora` int(11) NOT NULL,
  `horario` varchar(5) NOT NULL,
  `tempo_uso` int(5) NOT NULL,
  `status_horario` tinyint(1) NOT NULL,
  `data` date NOT NULL,
  `status_data` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_disponibilidade`
--

CREATE TABLE `tab_disponibilidade` (
  `id_disponibilidade` int(11) NOT NULL,
  `nome_evento` char(1) DEFAULT NULL,
  `fk_id_mod_empresa` int(11) DEFAULT NULL,
  `descricao_evento` char(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `fk_id_empresa` int(11) NOT NULL,
  `fk_id_data_hora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_empresa`
--

CREATE TABLE `tab_empresa` (
  `id_empresa` int(11) NOT NULL,
  `nome_fantasia` varchar(30) NOT NULL,
  `razao_social` varchar(20) NOT NULL,
  `cnpj_empresa` varchar(20) NOT NULL,
  `end_empresa` varchar(50) NOT NULL,
  `numero_end_empresa` varchar(6) NOT NULL,
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
-- Estrutura da tabela `tab_modalidade`
--

CREATE TABLE `tab_modalidade` (
  `id_modalidade` int(11) NOT NULL,
  `mod_esporte` varchar(20) NOT NULL,
  `mod_qtd_max` int(3) NOT NULL,
  `mod_qtd_min` int(3) NOT NULL,
  `mod_restricoes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_usuario`
--

CREATE TABLE `tab_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(30) NOT NULL,
  `cpf_usuario` varchar(15) NOT NULL,
  `rg_usuario` int(12) NOT NULL,
  `nasc_usuario` date NOT NULL,
  `email_usuario` varchar(30) NOT NULL,
  `tel_usuario` int(12) NOT NULL,
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
-- Índices para tabela `tab_agendamento`
--
ALTER TABLE `tab_agendamento`
  ADD PRIMARY KEY (`id_agendamento`),
  ADD KEY `fk_id_usuario` (`fk_id_usuario`),
  ADD KEY `fk_id_disponibilidade` (`fk_id_disponibilidade`);

--
-- Índices para tabela `tab_can_usi`
--
ALTER TABLE `tab_can_usi`
  ADD PRIMARY KEY (`pk_id_can_usi`),
  ADD KEY `fk_id_agendamento` (`fk_id_agendamento`);

--
-- Índices para tabela `tab_data_hora`
--
ALTER TABLE `tab_data_hora`
  ADD PRIMARY KEY (`id_data_hora`);

--
-- Índices para tabela `tab_disponibilidade`
--
ALTER TABLE `tab_disponibilidade`
  ADD PRIMARY KEY (`id_disponibilidade`),
  ADD KEY `fk_id_mod_empresa` (`fk_id_mod_empresa`),
  ADD KEY `fk_id_empresa` (`fk_id_empresa`),
  ADD KEY `fk_id_data_hora` (`fk_id_data_hora`);

--
-- Índices para tabela `tab_empresa`
--
ALTER TABLE `tab_empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Índices para tabela `tab_modalidade`
--
ALTER TABLE `tab_modalidade`
  ADD PRIMARY KEY (`id_modalidade`);

--
-- Índices para tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tab_data_hora`
--
ALTER TABLE `tab_data_hora`
  MODIFY `id_data_hora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tab_empresa`
--
ALTER TABLE `tab_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tab_modalidade`
--
ALTER TABLE `tab_modalidade`
  MODIFY `id_modalidade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tab_agendamento`
--
ALTER TABLE `tab_agendamento`
  ADD CONSTRAINT `tab_agendamento_ibfk_1` FOREIGN KEY (`fk_id_usuario`) REFERENCES `tab_usuario` (`id_usuario`),
  ADD CONSTRAINT `tab_agendamento_ibfk_2` FOREIGN KEY (`fk_id_disponibilidade`) REFERENCES `tab_disponibilidade` (`id_disponibilidade`);

--
-- Limitadores para a tabela `tab_can_usi`
--
ALTER TABLE `tab_can_usi`
  ADD CONSTRAINT `tab_can_usi_ibfk_1` FOREIGN KEY (`fk_id_agendamento`) REFERENCES `tab_agendamento` (`id_agendamento`);

--
-- Limitadores para a tabela `tab_disponibilidade`
--
ALTER TABLE `tab_disponibilidade`
  ADD CONSTRAINT `tab_disponibilidade_ibfk_2` FOREIGN KEY (`fk_id_empresa`) REFERENCES `tab_empresa` (`id_empresa`),
  ADD CONSTRAINT `tab_disponibilidade_ibfk_3` FOREIGN KEY (`fk_id_data_hora`) REFERENCES `tab_data_hora` (`id_data_hora`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
