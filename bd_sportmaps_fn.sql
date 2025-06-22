-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/06/2025 às 23:07
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
-- Banco de dados: `bd_sportmaps16_06`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_data_hora`
--

CREATE TABLE `tab_data_hora` (
  `id_data_hora` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `dia_semana` varchar(20) NOT NULL,
  `horario_inicio` time NOT NULL,
  `horario_fim` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_reserva`
--

CREATE TABLE `tab_reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_mod_empresa` int(11) NOT NULL,
  `id_data_hora` int(11) NOT NULL,
  `horario_inicio_reserva` time NOT NULL,
  `horario_fim_reserva` time NOT NULL,
  `data_criacao` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `cidade_usuario` varchar(20) NOT NULL,
  `estado_usuario` varchar(20) NOT NULL,
  `foto_usuario` blob DEFAULT NULL,
  `complemento_end_user` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tab_data_hora`
--
ALTER TABLE `tab_data_hora`
  ADD PRIMARY KEY (`id_data_hora`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Índices de tabela `tab_empresa`
--
ALTER TABLE `tab_empresa`
  ADD PRIMARY KEY (`id_empresa`);

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
-- Índices de tabela `tab_reserva`
--
ALTER TABLE `tab_reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `fk_reserva_usuario` (`id_usuario`),
  ADD KEY `fk_reserva_modalidade` (`id_mod_empresa`),
  ADD KEY `fk_reserva_datahora` (`id_data_hora`);

--
-- Índices de tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tab_data_hora`
--
ALTER TABLE `tab_data_hora`
  MODIFY `id_data_hora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tab_empresa`
--
ALTER TABLE `tab_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de tabela `tab_modalidade`
--
ALTER TABLE `tab_modalidade`
  MODIFY `id_modalidade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tab_mod_empresa`
--
ALTER TABLE `tab_mod_empresa`
  MODIFY `id_mod_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de tabela `tab_reserva`
--
ALTER TABLE `tab_reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tab_data_hora`
--
ALTER TABLE `tab_data_hora`
  ADD CONSTRAINT `tab_data_hora_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `tab_empresa` (`id_empresa`);

--
-- Restrições para tabelas `tab_mod_empresa`
--
ALTER TABLE `tab_mod_empresa`
  ADD CONSTRAINT `tab_mod_empresa_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `tab_empresa` (`id_empresa`),
  ADD CONSTRAINT `tab_mod_empresa_ibfk_2` FOREIGN KEY (`id_modalidade`) REFERENCES `tab_modalidade` (`id_modalidade`);

--
-- Restrições para tabelas `tab_reserva`
--
ALTER TABLE `tab_reserva`
  ADD CONSTRAINT `fk_reserva_datahora` FOREIGN KEY (`id_data_hora`) REFERENCES `tab_data_hora` (`id_data_hora`),
  ADD CONSTRAINT `fk_reserva_modalidade` FOREIGN KEY (`id_mod_empresa`) REFERENCES `tab_mod_empresa` (`id_mod_empresa`),
  ADD CONSTRAINT `fk_reserva_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tab_usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
