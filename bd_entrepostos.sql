-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 30-Set-2021 às 05:33
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_entrepostos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_entrada`
--

DROP TABLE IF EXISTS `tbl_entrada`;
CREATE TABLE IF NOT EXISTS `tbl_entrada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origem` varchar(100) DEFAULT NULL,
  `nome_de_usuario` varchar(100) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `validade` date NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nome_de_usuario` (`nome_de_usuario`),
  KEY `id_produto` (`id_produto`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_entrada`
--

INSERT INTO `tbl_entrada` (`id`, `origem`, `nome_de_usuario`, `id_produto`, `quantidade`, `validade`, `data`) VALUES
(1, 'Loja', 'chrisplusr', 1, 49, '2021-09-30', '2021-09-19 11:37:38'),
(2, 'Compra', 'chrisplusr', 2, 27, '2023-08-30', '2021-09-01 23:24:15'),
(3, 'Achados', 'chrisplusr', 1, 7, '2021-09-23', '2021-09-28 23:27:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_produto`
--

DROP TABLE IF EXISTS `tbl_produto`;
CREATE TABLE IF NOT EXISTS `tbl_produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(100) NOT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_produto`
--

INSERT INTO `tbl_produto` (`id`, `nome_produto`, `descricao`) VALUES
(1, 'Luvas P', NULL),
(2, 'Abaixador de língua\r\n', 'pacote com 100'),
(3, 'Abaixador de tensão superficial\r\n', 'frasco'),
(4, 'Amálgama cáp ', 'presa regular\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_saida`
--

DROP TABLE IF EXISTS `tbl_saida`;
CREATE TABLE IF NOT EXISTS `tbl_saida` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_de_usuario` varchar(100) DEFAULT NULL,
  `id_entrada` int(11) DEFAULT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `destino` varchar(100) DEFAULT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nome_de_usuario` (`nome_de_usuario`),
  KEY `id_entrada` (`id_entrada`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_saida`
--

INSERT INTO `tbl_saida` (`id`, `nome_de_usuario`, `id_entrada`, `id_produto`, `quantidade`, `destino`, `data`) VALUES
(1, 'chrisplusr', 1, 1, 20, 'Lixo', '2021-09-20 11:38:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `nome_de_usuario` varchar(100) NOT NULL,
  `apelido` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `nível_acesso` smallint(6) NOT NULL,
  `data_criacao` datetime NOT NULL,
  PRIMARY KEY (`nome_de_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`nome_de_usuario`, `apelido`, `email`, `senha`, `ativo`, `nível_acesso`, `data_criacao`) VALUES
('chrisplusr', 'Christian', 'chrisplusr@qualquercoisa.com', 'teste123', 1, 1, '2021-09-20 11:36:14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
