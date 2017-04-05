-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Abr-2017 às 01:18
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

    SELECT count(*) into contador FROM estoque WHERE nome_produtoE = id_prod;

    IF contador > 0 THEN
        UPDATE estoque SET qtdeE=qtdeE + qtde_comprada, valor_unitario= valor_unit
        WHERE nome_produtoE = id_prod;
    ELSE
        INSERT INTO estoque (nome_produtoE, qtdeE, valor_unitario) values (id_prod, qtde_comprada, valor_unit);
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
(19, 'Uva', 100, '120.00', '2017-02-03'),
(18, 'Uva', 250, '1.75', '2017-03-30'),
(17, 'Morango', 300, '2.50', '2017-03-30'),
(16, 'Chocolate', 100, '2.50', '2017-03-30');

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
  `nome_produtoE` varchar(45) NOT NULL,
  `qtdeE` int(11) DEFAULT NULL,
  `valor_unitario` decimal(9,2) DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`id`, `nome_produtoE`, `qtdeE`, `valor_unitario`) VALUES
(16, 'Uva', 250, '2.50'),
(15, 'Morango', 300, '2.50'),
(14, 'Chocolate', 100, '2.50');

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
(17, 'Uva', 100, '2017-03-31', '2.50', 'Gustavo');

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
  `login` varchar(45) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `id` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`nome`, `cpf`, `login`, `senha`, `id`) VALUES
('Gustavo', '333', 'gu', 'gu', 10),
('gustavo', 'gu', 'gu1', '123', 11),
('gu', 'gu', 'gu2', '', 12);

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
  ADD PRIMARY KEY (`id`,`nome_produtoE`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entrada_produto`
--
ALTER TABLE `entrada_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
