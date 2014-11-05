-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03-Nov-2014 às 03:11
-- Versão do servidor: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tele_entregas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecategoria`
--

CREATE TABLE IF NOT EXISTS `tecategoria` (
`idCategoria` int(11) NOT NULL,
  `NmCategoria` varchar(100) COLLATE utf8_general_mysql500_ci NOT NULL,
  `FgStatus` char(1) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tecategoria`
--

INSERT INTO `tecategoria` (`idCategoria`, `NmCategoria`, `FgStatus`) VALUES
(1, 'Alimento Assado', 'A'),
(2, 'Bebida', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecliente`
--

CREATE TABLE IF NOT EXISTS `tecliente` (
`idCliente` int(11) NOT NULL,
  `NmCliente` varchar(100) COLLATE utf8_general_mysql500_ci NOT NULL,
  `DsTelefone` varchar(100) COLLATE utf8_general_mysql500_ci NOT NULL,
  `DsEmail` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `DtNascimento` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tecliente`
--

INSERT INTO `tecliente` (`idCliente`, `NmCliente`, `DsTelefone`, `DsEmail`, `DtNascimento`) VALUES
(1, 'Alessandro Marques', '(31) 9244-3733 ', 'alessandro.smarques@gmail.com', '2010-10-10'),
(2, 'João Rubens', '(31) 2561-9876', 'joao.rubens@gmail.com', '2000-11-15'),
(3, 'Fabricio Moreira', '(31) 4567-5677', 'fabricio.moreira@gmail.com', '1966-11-10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `teproduto`
--

CREATE TABLE IF NOT EXISTS `teproduto` (
`idProduto` int(11) NOT NULL,
  `DsProduto` varchar(100) COLLATE utf8_general_mysql500_ci NOT NULL,
  `NuValor` float NOT NULL,
  `teCategoria_idCategoria` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `teproduto`
--

INSERT INTO `teproduto` (`idProduto`, `DsProduto`, `NuValor`, `teCategoria_idCategoria`) VALUES
(1, 'Refrigerante', 3.5, 2),
(2, 'Pizza Modelo 1', 19.9, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `teusuario`
--

CREATE TABLE IF NOT EXISTS `teusuario` (
`idUsuario` int(11) NOT NULL,
  `DsEmail` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `NmUsuario` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  `DsSenha` varchar(400) COLLATE utf8_general_mysql500_ci NOT NULL,
  `FgStatus` char(1) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `teusuario`
--

INSERT INTO `teusuario` (`idUsuario`, `DsEmail`, `NmUsuario`, `DsSenha`, `FgStatus`) VALUES
(1, 'alessandro@unipaccontagem.com.br', 'Alessandro Marques', '81dc9bdb52d04dc20036dbd8313ed055', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tuitempedido`
--

CREATE TABLE IF NOT EXISTS `tuitempedido` (
`idItemPedido` int(11) NOT NULL,
  `teProduto_idProduto` int(11) NOT NULL,
  `NuValor` float NOT NULL,
  `NuQuantidade` float NOT NULL,
  `NuValorEntrega` float NOT NULL,
  `tuPedido_idPedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tupedido`
--

CREATE TABLE IF NOT EXISTS `tupedido` (
`idPedido` int(11) NOT NULL,
  `DtPedido` date NOT NULL,
  `teCliente_idCliente` int(11) NOT NULL,
  `DsEnderecoEntrega` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `FgStatus` varchar(1) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tupedido`
--

INSERT INTO `tupedido` (`idPedido`, `DtPedido`, `teCliente_idCliente`, `DsEnderecoEntrega`, `FgStatus`) VALUES
(1, '2014-11-12', 1, 'Rua dos Jaguarapes, 255 Apto 105', 'A'),
(2, '2014-11-15', 2, 'Rua margaridas 20, Proximo ao Epa', 'A');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwpedidocliente`
--
CREATE TABLE IF NOT EXISTS `vwpedidocliente` (
`idPedido` int(11)
,`DtPedido` date
,`NmCliente` varchar(100)
,`DsEnderecoEntrega` varchar(255)
,`fltFiltro` varchar(376)
,`FgStatus` varchar(1)
);
-- --------------------------------------------------------

--
-- Structure for view `vwpedidocliente`
--
DROP TABLE IF EXISTS `vwpedidocliente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwpedidocliente` AS select `p`.`idPedido` AS `idPedido`,`p`.`DtPedido` AS `DtPedido`,`c`.`NmCliente` AS `NmCliente`,`p`.`DsEnderecoEntrega` AS `DsEnderecoEntrega`,concat(`p`.`idPedido`,`p`.`DtPedido`,`c`.`NmCliente`,`p`.`DsEnderecoEntrega`) AS `fltFiltro`,`p`.`FgStatus` AS `FgStatus` from (`tupedido` `p` left join `tecliente` `c` on((`c`.`idCliente` = `p`.`teCliente_idCliente`)));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tecategoria`
--
ALTER TABLE `tecategoria`
 ADD PRIMARY KEY (`idCategoria`);

--
-- Indexes for table `tecliente`
--
ALTER TABLE `tecliente`
 ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `teproduto`
--
ALTER TABLE `teproduto`
 ADD PRIMARY KEY (`idProduto`), ADD KEY `fk_Produto_Categoria_idx` (`teCategoria_idCategoria`);

--
-- Indexes for table `teusuario`
--
ALTER TABLE `teusuario`
 ADD PRIMARY KEY (`idUsuario`);

--
-- Indexes for table `tuitempedido`
--
ALTER TABLE `tuitempedido`
 ADD PRIMARY KEY (`idItemPedido`), ADD KEY `fk_ItemPedido_Pedido_idx` (`tuPedido_idPedido`), ADD KEY `fk_ItemPedido_Produto_idx` (`teProduto_idProduto`);

--
-- Indexes for table `tupedido`
--
ALTER TABLE `tupedido`
 ADD PRIMARY KEY (`idPedido`), ADD KEY `fk_Pedido_Cliente_idx` (`teCliente_idCliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tecategoria`
--
ALTER TABLE `tecategoria`
MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tecliente`
--
ALTER TABLE `tecliente`
MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `teproduto`
--
ALTER TABLE `teproduto`
MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teusuario`
--
ALTER TABLE `teusuario`
MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tuitempedido`
--
ALTER TABLE `tuitempedido`
MODIFY `idItemPedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tupedido`
--
ALTER TABLE `tupedido`
MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tuitempedido`
--
ALTER TABLE `tuitempedido`
ADD CONSTRAINT `fk_ItemPedido_Pedido` FOREIGN KEY (`tuPedido_idPedido`) REFERENCES `tupedido` (`idPedido`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_ItemPedido_Produto` FOREIGN KEY (`teProduto_idProduto`) REFERENCES `teproduto` (`idProduto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tupedido`
--
ALTER TABLE `tupedido`
ADD CONSTRAINT `fk_Pedido_Cliente` FOREIGN KEY (`teCliente_idCliente`) REFERENCES `tecliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
