-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Mar-2017 às 13:59
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maissabor`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`gustavo`@`localhost` PROCEDURE `SP_AtualizaEstoque` (`id_prod` VARCHAR(50), `qtde_comprada` INT, `valor_unit` DECIMAL(9,2))  BEGIN
declare contador int(11);

    SELECT count(*) into contador FROM estoque WHERE nome_produto = id_prod;

    IF contador > 0 THEN
        UPDATE estoque SET qtde=qtde + qtde_comprada, valor_unitario= valor_unit
        WHERE nome_produto = id_prod;
    ELSE
        INSERT INTO estoque (nome_produto, qtde, valor_unitario) values (id_prod, qtde_comprada, valor_unit);
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada_produto`
--

CREATE TABLE `entrada_produto` (
  `id` int(11) NOT NULL,
  `nome_produto` varchar(45) NOT NULL,
  `qtde` int(11) DEFAULT NULL,
  `valor_unitario` decimal(9,2) DEFAULT '0.00',
  `data_entrada` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `entrada_produto`
--

INSERT INTO `entrada_produto` (`id`, `nome_produto`, `qtde`, `valor_unitario`, `data_entrada`) VALUES
(1, '', 100, '2.50', NULL),
(2, '', 100, '2.50', NULL),
(11, 'chocolate', 100, '2.50', NULL),
(12, 'chocolate', 20, '1.50', NULL);

--
-- Acionadores `entrada_produto`
--
DELIMITER $$
CREATE TRIGGER `TRG_EntradaProduto_AD` AFTER DELETE ON `entrada_produto` FOR EACH ROW BEGIN
      CALL SP_AtualizaEstoque (old.nome_produto, old.qtde * -1, old.valor_unitario);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRG_EntradaProduto_AI` AFTER INSERT ON `entrada_produto` FOR EACH ROW BEGIN
      CALL SP_AtualizaEstoque (new.nome_produto, new.qtde, new.valor_unitario);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRG_EntradaProduto_AU` AFTER UPDATE ON `entrada_produto` FOR EACH ROW BEGIN
      CALL SP_AtualizaEstoque (new.nome_produto, new.qtde - old.qtde, new.valor_unitario);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(11) NOT NULL,
  `nome_produto` varchar(45) NOT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `qtde` int(11) DEFAULT NULL,
  `valor_unitario` decimal(9,2) DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`id`, `nome_produto`, `id_produto`, `qtde`, `valor_unitario`) VALUES
(9, 'chocolate', 2, -105, '2.50'),
(8, 'morango', 1, -301, '50.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `nome` varchar(250) NOT NULL,
  `endereco` varchar(250) NOT NULL,
  `rua` varchar(250) DEFAULT NULL,
  `numero` int(30) NOT NULL,
  `cidade` varchar(250) NOT NULL,
  `estado` char(100) NOT NULL,
  `produto` varchar(100) NOT NULL,
  `cnpj` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`nome`, `endereco`, `rua`, `numero`, `cidade`, `estado`, `produto`, `cnpj`, `id`) VALUES
('gu', '', 'gu', 32, 'gu', 'gu', 'gu', 'cnpj', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `estoque_minimo` int(11) DEFAULT NULL,
  `estoque_maximo` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `estoque_minimo`, `estoque_maximo`) VALUES
(1, 'Chocolate', 10, 300),
(2, 'Coco Branco', 10, 300),
(3, 'Morango', 10, 300),
(4, 'Amendoim', 10, 300);

-- --------------------------------------------------------

--
-- Estrutura da tabela `saida_produto`
--

CREATE TABLE `saida_produto` (
  `id` int(11) NOT NULL,
  `nome_produto` varchar(45) NOT NULL,
  `qtde` int(11) DEFAULT NULL,
  `data_saida` date DEFAULT NULL,
  `valor_unitario` decimal(9,2) DEFAULT '0.00',
  `vendedor` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `saida_produto`
--

INSERT INTO `saida_produto` (`id`, `nome_produto`, `qtde`, `data_saida`, `valor_unitario`, `vendedor`) VALUES
(1, '', 50, NULL, '2.50', 'Gu'),
(2, '', 50, NULL, '2.50', 'Gu'),
(3, '', 45, NULL, '2.50', 'gu'),
(4, 'choc', 120, NULL, '120.00', 'gus'),
(5, '', 120, NULL, '120.00', 'gt'),
(6, '', 11, NULL, '11.00', 'gus'),
(7, '', 222, NULL, '2.00', 'tt'),
(8, 'Chocolate', 333, NULL, '33.00', 'ww'),
(9, 'chocolate', 120, NULL, '50.00', 'Gustavo'),
(10, 'chocolate', 100, NULL, '2.50', 'eu'),
(11, 'chocolate', 100, NULL, '2.50', 'qqq'),
(12, 'chocolate', 20, NULL, '2.50', 'as'),
(13, 'chocolate', 10, NULL, '2.50', 'abc');

--
-- Acionadores `saida_produto`
--
DELIMITER $$
CREATE TRIGGER `TRG_SaidaProduto_AD` AFTER DELETE ON `saida_produto` FOR EACH ROW BEGIN
      CALL SP_AtualizaEstoque (old.nome_produto, old.qtde, old.valor_unitario);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRG_SaidaProduto_AI` AFTER INSERT ON `saida_produto` FOR EACH ROW BEGIN
      CALL SP_AtualizaEstoque (new.nome_produto, new.qtde * -1, new.valor_unitario);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRG_SaidaProduto_AU` AFTER UPDATE ON `saida_produto` FOR EACH ROW BEGIN
      CALL SP_AtualizaEstoque (new.nome_produto, old.qtde - new.qtde, new.valor_unitario);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `nome` varchar(250) NOT NULL,
  `cpf` varchar(250) NOT NULL,
  `login` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `id` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`nome`, `cpf`, `login`, `senha`, `id`) VALUES
('Gustavo', '123', 'gu', 'gu', 1),
('Gustavo Henrique de Oliveira', '3998189832', 'guadm', 'gugu', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entrada_produto`
--
ALTER TABLE `entrada_produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saida_produto`
--
ALTER TABLE `saida_produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entrada_produto`
--
ALTER TABLE `entrada_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `saida_produto`
--
ALTER TABLE `saida_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
