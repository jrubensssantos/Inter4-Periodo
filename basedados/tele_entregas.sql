-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 30-Out-2014 às 22:40
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `tele_entregas`
--
CREATE DATABASE IF NOT EXISTS `tele_entregas` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci;
USE `tele_entregas`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecategoria`
--

CREATE TABLE IF NOT EXISTS `tecategoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `NmCategoria` varchar(100) COLLATE utf8_general_mysql500_ci NOT NULL,
  `FgStatus` char(1) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecliente`
--

CREATE TABLE IF NOT EXISTS `tecliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `NmCliente` varchar(100) COLLATE utf8_general_mysql500_ci NOT NULL,
  `DsTelefone` varchar(100) COLLATE utf8_general_mysql500_ci NOT NULL,
  `DsEmail` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `DtNascimento` date NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `teproduto`
--

CREATE TABLE IF NOT EXISTS `teproduto` (
  `idProduto` int(11) NOT NULL AUTO_INCREMENT,
  `DsProduto` varchar(100) COLLATE utf8_general_mysql500_ci NOT NULL,
  `NuValor` float NOT NULL,
  PRIMARY KEY (`idProduto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `teusuario`
--

CREATE TABLE IF NOT EXISTS `teusuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `DsEmail` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `NmUsuario` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  `DsSenha` varchar(400) COLLATE utf8_general_mysql500_ci NOT NULL,
  `FgStatus` char(1) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `teusuario`
--

INSERT INTO `teusuario` (`idUsuario`, `DsEmail`, `NmUsuario`, `DsSenha`, `FgStatus`) VALUES
(1, 'inter@teleentregas.com', 'Inter', '81dc9bdb52d04dc20036dbd8313ed055', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tuitempedido`
--

CREATE TABLE IF NOT EXISTS `tuitempedido` (
  `idItemPedido` int(11) NOT NULL AUTO_INCREMENT,
  `teProduto_idProduto` int(11) NOT NULL,
  `NuValor` float NOT NULL,
  `NuQuantidade` float NOT NULL,
  `NuValorEntrega` float NOT NULL,
  PRIMARY KEY (`idItemPedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tupedido`
--

CREATE TABLE IF NOT EXISTS `tupedido` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `DtPedido` date NOT NULL,
  `teCliente_idCliente` int(11) NOT NULL,
  `DsEnderecoEntrega` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`idPedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
