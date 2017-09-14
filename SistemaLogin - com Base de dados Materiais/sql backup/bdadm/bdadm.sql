-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Jun-2017 às 20:20
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdadm`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `COD_EMPRESA` smallint(3) NOT NULL,
  `DSC_EMPRESA` varchar(40) NOT NULL,
  `COD_UF` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoques`
--

CREATE TABLE `estoques` (
  `COD_EMPRESA` smallint(3) NOT NULL,
  `COD_MATERIAL` smallint(5) NOT NULL,
  `COD_LOCALIZACAO` smallint(3) NOT NULL,
  `COD_FORNECEDOR` smallint(3) NOT NULL,
  `QTD_REAL` smallint(11) NOT NULL,
  `QTD_MINIMA` smallint(11) NOT NULL,
  `QTD_MAXIMA` smallint(11) NOT NULL,
  `QTD_REPOSICAO` smallint(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `COD_FORNECEDOR` smallint(3) NOT NULL,
  `DSC_FORNECEDOR` varchar(40) NOT NULL,
  `COD_UF` varchar(2) NOT NULL,
  `TPO_FORNECEDOR` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `linhas_materiais`
--

CREATE TABLE `linhas_materiais` (
  `COD_LINHA_MATERIAL` smallint(3) NOT NULL,
  `DSC_LINHA_MATERIAL` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `localizacoes`
--

CREATE TABLE `localizacoes` (
  `COD_LOCALIZACAO` smallint(3) NOT NULL,
  `DSC_LOCALIZACAO` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `materiais`
--

CREATE TABLE `materiais` (
  `COD_MATERIAL` smallint(5) NOT NULL,
  `DSC_MATERIAL` varchar(40) NOT NULL,
  `COD_LINHA_MATERIAL` smallint(3) NOT NULL,
  `COD_UNIDADE_MEDIDA` varchar(2) NOT NULL,
  `STA_MATERIAL` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidades_federais`
--

CREATE TABLE `unidades_federais` (
  `COD_UF` varchar(2) NOT NULL,
  `DSC_UF` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidades_medidas`
--

CREATE TABLE `unidades_medidas` (
  `COD_UNIDADE_MEDIDA` varchar(2) NOT NULL,
  `DSC_UNIDADE_MEDIDA` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`COD_EMPRESA`),
  ADD KEY `fk1_empresas` (`COD_UF`);

--
-- Indexes for table `estoques`
--
ALTER TABLE `estoques`
  ADD PRIMARY KEY (`COD_EMPRESA`,`COD_MATERIAL`),
  ADD KEY `fk1_estoques` (`COD_MATERIAL`),
  ADD KEY `fk3_estoques` (`COD_LOCALIZACAO`),
  ADD KEY `fk4_estoques` (`COD_FORNECEDOR`);

--
-- Indexes for table `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`COD_FORNECEDOR`),
  ADD KEY `fk1_fornecedores` (`COD_UF`);

--
-- Indexes for table `linhas_materiais`
--
ALTER TABLE `linhas_materiais`
  ADD PRIMARY KEY (`COD_LINHA_MATERIAL`);

--
-- Indexes for table `localizacoes`
--
ALTER TABLE `localizacoes`
  ADD PRIMARY KEY (`COD_LOCALIZACAO`);

--
-- Indexes for table `materiais`
--
ALTER TABLE `materiais`
  ADD PRIMARY KEY (`COD_MATERIAL`),
  ADD KEY `fk1_materiais` (`COD_UNIDADE_MEDIDA`);

--
-- Indexes for table `unidades_federais`
--
ALTER TABLE `unidades_federais`
  ADD PRIMARY KEY (`COD_UF`);

--
-- Indexes for table `unidades_medidas`
--
ALTER TABLE `unidades_medidas`
  ADD PRIMARY KEY (`COD_UNIDADE_MEDIDA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
