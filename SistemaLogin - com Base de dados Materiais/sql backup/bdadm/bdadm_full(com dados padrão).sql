-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Jun-2017 às 20:34
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

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`COD_EMPRESA`, `DSC_EMPRESA`, `COD_UF`) VALUES
(1, 'INDUSTRIAL LEVORIN', 'SP'),
(2, 'GESSY LEVER DO BRASIL', 'SP'),
(3, 'BRASKIT IND. E COMERCIO', 'RJ'),
(4, 'INDUSTRIAS LUNAR', 'SC'),
(5, 'ALCOA', 'MG'),
(6, 'ALCOA', 'RS'),
(7, 'ALERGAM - IND. FARMACEUTICA', 'SC'),
(8, 'MERCEDES BENZ DO BRASIL', 'MG');

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

--
-- Extraindo dados da tabela `estoques`
--

INSERT INTO `estoques` (`COD_EMPRESA`, `COD_MATERIAL`, `COD_LOCALIZACAO`, `COD_FORNECEDOR`, `QTD_REAL`, `QTD_MINIMA`, `QTD_MAXIMA`, `QTD_REPOSICAO`) VALUES
(1, 8, 7, 17, 1000, 50, 1500, 100),
(1, 9, 7, 17, 5000, 200, 6000, 500),
(1, 10, 7, 12, 300, 80, 2000, 120),
(7, 8, 8, 17, 240, 80, 1000, 100),
(7, 10, 8, 12, 50, 10, 150, 30),
(5, 9, 8, 12, 2500, 400, 5000, 500),
(1, 1, 2, 9, 30, 5, 50, 10),
(1, 2, 2, 9, 30, 5, 60, 12),
(8, 2, 6, 2, 15, 5, 80, 10),
(8, 4, 6, 2, 5, 3, 10, 4),
(4, 4, 6, 9, 20, 8, 25, 10),
(1, 5, 2, 1, 110, 10, 120, 20),
(3, 5, 2, 1, 70, 10, 120, 25),
(6, 5, 6, 9, 85, 10, 100, 40),
(4, 5, 6, 2, 200, 10, 300, 50),
(7, 5, 2, 9, 400, 10, 450, 28),
(1, 7, 1, 9, 15, 5, 30, 10),
(3, 7, 1, 9, 18, 7, 50, 12),
(4, 7, 2, 2, 25, 8, 50, 14),
(1, 12, 5, 16, 30, 10, 50, 15),
(5, 12, 5, 16, 30, 10, 50, 15),
(6, 12, 5, 12, 30, 10, 50, 15),
(7, 13, 9, 8, 80, 20, 100, 30),
(4, 13, 9, 13, 30, 5, 50, 10),
(7, 15, 9, 13, 10, 2, 15, 5),
(1, 19, 3, 3, 10, 3, 20, 6),
(1, 20, 10, 4, 4000, 1000, 10000, 2000),
(1, 21, 3, 6, 500, 100, 1000, 300),
(5, 21, 3, 5, 800, 200, 1000, 400),
(6, 21, 3, 5, 900, 200, 1000, 400),
(3, 23, 4, 7, 1000, 150, 10000, 300),
(4, 23, 4, 18, 2200, 200, 30000, 300),
(3, 24, 4, 7, 1500, 150, 10000, 200),
(8, 26, 4, 7, 100, 40, 2000, 70),
(1, 26, 4, 18, 300, 50, 2000, 70),
(3, 27, 4, 7, 500, 100, 3000, 120),
(8, 27, 4, 18, 300, 50, 6000, 70),
(1, 27, 4, 18, 100, 50, 1000, 70),
(8, 28, 4, 5, 1520, 300, 2000, 400),
(8, 29, 4, 5, 1790, 300, 2000, 400),
(8, 30, 4, 5, 1650, 300, 2000, 400),
(1, 28, 4, 7, 250, 100, 1000, 130),
(4, 33, 4, 14, 50, 10, 200, 15),
(4, 34, 4, 6, 80, 20, 300, 25),
(4, 35, 4, 14, 100, 10, 250, 15),
(1, 33, 4, 14, 250, 10, 1200, 15),
(1, 34, 4, 6, 380, 20, 3300, 25),
(8, 35, 4, 6, 100, 10, 250, 15),
(3, 36, 4, 6, 70, 10, 200, 12),
(6, 36, 4, 14, 80, 15, 100, 20),
(3, 48, 9, 13, 200, 50, 500, 80),
(7, 48, 9, 9, 30, 5, 100, 10),
(1, 47, 7, 1, 10, 4, 80, 6),
(3, 47, 7, 2, 10, 4, 80, 6),
(5, 47, 7, 9, 20, 3, 100, 5),
(6, 47, 7, 9, 20, 3, 100, 12),
(7, 47, 7, 1, 30, 5, 150, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `COD_FORNECEDOR` smallint(3) NOT NULL,
  `DSC_FORNECEDOR` varchar(40) NOT NULL,
  `COD_UF` varchar(2) NOT NULL,
  `TPO_FORNECEDOR` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`COD_FORNECEDOR`, `DSC_FORNECEDOR`, `COD_UF`, `TPO_FORNECEDOR`) VALUES
(1, 'KALUNGA', 'SP', 'J'),
(2, 'PAPELARIA ALPHA', 'SP', 'J'),
(3, 'COPERBO', 'PE', 'J'),
(4, 'AKZO NOBEL', 'MG', 'J'),
(5, 'FERRAGENS TUNGA', 'SP', 'J'),
(6, 'MAT. ELETRICO TAKEI', 'SP', 'J'),
(7, 'FERRAGENS MOURA', 'RJ', 'F'),
(8, 'LIMPEZA LIMP-LIMP', 'SP', 'J'),
(9, 'MAT. ESCRITORIO GAMA', 'SP', 'J'),
(10, 'BORRACHAS ALCAPONE', 'SC', 'J'),
(11, 'BORRACHAS IRACEMA', 'CE', 'J'),
(12, 'EMB. TAMPA TUDO', 'PR', 'J'),
(13, 'PRODUTOS LIMPEZA LIRA', 'SP', 'F'),
(14, 'MATERIAIS ELETRICO CHOQUE', 'BA', 'J'),
(15, 'INDUSCABOS', 'PE', 'J'),
(16, 'ARTEFATOS BORRACHA ZENGA', 'RS', 'J'),
(17, 'EMBALAGENS ALDEIA', 'ES', 'J'),
(18, 'CARAMURU FERRAGENS', 'RN', 'J'),
(19, 'SEM PRESTIGIO LTDA', 'RN', 'F');

-- --------------------------------------------------------

--
-- Estrutura da tabela `linhas_materiais`
--

CREATE TABLE `linhas_materiais` (
  `COD_LINHA_MATERIAL` smallint(3) NOT NULL,
  `DSC_LINHA_MATERIAL` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `linhas_materiais`
--

INSERT INTO `linhas_materiais` (`COD_LINHA_MATERIAL`, `DSC_LINHA_MATERIAL`) VALUES
(2, 'MAT. EMBALAGEM'),
(3, 'MAT. LIMPEZA'),
(4, 'MATERIA-PRIMA'),
(5, 'MAT. MANUTENCAO'),
(1, 'MAT. ESCRITORIO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `localizacoes`
--

CREATE TABLE `localizacoes` (
  `COD_LOCALIZACAO` smallint(3) NOT NULL,
  `DSC_LOCALIZACAO` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `localizacoes`
--

INSERT INTO `localizacoes` (`COD_LOCALIZACAO`, `DSC_LOCALIZACAO`) VALUES
(1, 'CORREDOR A1'),
(2, 'CORREDOR A2'),
(3, 'CORREDOR A3'),
(4, 'CORREDOR B1'),
(5, 'CORREDOR B2'),
(6, 'CORREDOR X1'),
(7, 'CORREDOR K2'),
(8, 'CORREDOR K3'),
(9, 'SECAO PERIGO A1'),
(10, 'CONTAINER Z2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `materiais`
--

CREATE TABLE `materiais` (
  `COD_MATERIAL` smallint(5) NOT NULL,
  `DSC_MATERIAL` varchar(40) NOT NULL,
  `COD_LINHA_MATERIAL` smallint(3) NOT NULL,
  `COD_UNIDADE_MEDIDA` varchar(2) NOT NULL,
  `STA_MATERIAL` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `materiais`
--

INSERT INTO `materiais` (`COD_MATERIAL`, `DSC_MATERIAL`, `COD_LINHA_MATERIAL`, `COD_UNIDADE_MEDIDA`, `STA_MATERIAL`) VALUES
(2, 'CANETA PILOT VERDE', 1, 'PC', 'A'),
(3, 'CANETA PILOT PRETA', 1, 'PC', 'I'),
(4, 'BORRACHA', 1, 'PC', 'A'),
(5, 'CANETA BIC AZUL', 1, 'PC', 'A'),
(6, 'CANETA BIC VERMELHA', 1, 'PC', 'I'),
(7, 'LAPIS N. 2', 1, 'PC', 'A'),
(8, 'SACO PLASTICO TAM. 1', 2, 'PC', 'A'),
(9, 'SACO PLASTICO TAM. 2', 2, 'PC', 'A'),
(10, 'SACO PLASTICO TAM. 3', 2, 'PC', 'A'),
(11, 'SACO PLASTICO TAM. 4', 2, 'PC', 'I'),
(12, 'BOMBONA MEDIA', 2, 'PC', 'A'),
(13, 'ALCOOL', 3, 'LT', 'A'),
(14, 'SABAO EM PO', 3, 'KG', 'A'),
(15, 'DESINFETANTE', 3, 'LT', 'A'),
(16, 'CERA LIQUIDA', 3, 'LT', 'I'),
(17, 'PALHA DE ACO N.2', 3, 'PC', 'A'),
(18, 'PALHA DE ACO N.3', 3, 'PC', 'I'),
(19, 'BORRACHA SINTETICA', 4, 'TN', 'A'),
(20, 'PO DE BORRACHA', 4, 'KG', 'A'),
(21, 'ARAME N.2', 4, 'MT', 'A'),
(22, 'ARAMA N.3', 4, 'MT', 'I'),
(23, 'VALVULA CENTRAL', 4, 'PC', 'A'),
(24, 'BICO INJETOR', 4, 'PC', 'A'),
(25, 'COLA', 4, 'LT', 'I'),
(26, 'VALVULA EXTERNA A1', 4, 'PC', 'A'),
(27, 'VALVULA EXTERNA A2', 4, 'PC', 'I'),
(28, 'PARAFUSO SEXTAVADO N.3', 5, 'PC', 'A'),
(29, 'PARAFUSO SEXTAVADO N.4', 5, 'PC', 'A'),
(30, 'CHAPA DE ACO DE 2', 5, 'PC', 'A'),
(31, 'DISJUNTOR DE 10 A', 5, 'PC', 'A'),
(32, 'DISJUNTOR DE 50 A', 5, 'PC', 'I'),
(33, 'FIO ELETRICO 10 MM', 5, 'MT', 'A'),
(34, 'FIO ELETRICO 20 MM', 5, 'MT', 'A'),
(35, 'FIO ELETRICO 50 MM', 5, 'MT', 'A'),
(36, 'CABO COAXIAL', 5, 'MT', 'A'),
(37, 'PREGO SEM CABECA N.2', 5, 'PC', 'A'),
(38, 'PREGO SEM CABECA N.3', 5, 'PC', 'A'),
(39, 'PREGO COM CABECA N.2', 5, 'PC', 'A'),
(40, 'PREGO COM CABECA N.2', 5, 'PC', 'I'),
(1, 'CANETA PILOT AZUL', 1, 'PC', 'A'),
(41, 'CANDIDA', 3, 'LT', 'A'),
(42, 'ALCOOL GEL', 3, 'LT', 'A'),
(43, 'SABAO EM PEDRA', 3, 'PC', 'I'),
(44, 'CAIXA DE PAPELAO A1', 2, 'PC', 'A'),
(45, 'CAIXA DE PAPELAO A2', 2, 'PC', 'I'),
(46, 'CAIXA DE PAPELAO A3', 2, 'PC', 'A'),
(47, 'CANETA FABER CASTEL AZUL', 1, 'PC', 'A'),
(48, 'ACIDO', 3, 'LT', 'I'),
(49, 'SILICONE', 4, 'LT', 'A'),
(50, 'VALVULA INTERNA B1', 4, 'PC', 'A'),
(51, 'LUVAS BRANCAS DE LATEX', 3, 'PC', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidades_federais`
--

CREATE TABLE `unidades_federais` (
  `COD_UF` varchar(2) NOT NULL,
  `DSC_UF` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `unidades_federais`
--

INSERT INTO `unidades_federais` (`COD_UF`, `DSC_UF`) VALUES
('RS', 'RIO GRANDE DO SUL'),
('SC', 'SANTA CATARINA'),
('PR', 'PARANA'),
('SP', 'SAO PAULO'),
('RJ', 'RIO DE JANEIRO'),
('MG', 'MINAS GERAIS'),
('ES', 'ESPIRITO SANTO'),
('BA', 'BAHIA'),
('PE', 'PERNAMBUCO'),
('CE', 'CEARA'),
('RN', 'RIO GRANDE DO NORTE'),
('PA', 'PARA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidades_medidas`
--

CREATE TABLE `unidades_medidas` (
  `COD_UNIDADE_MEDIDA` varchar(2) NOT NULL,
  `DSC_UNIDADE_MEDIDA` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `unidades_medidas`
--

INSERT INTO `unidades_medidas` (`COD_UNIDADE_MEDIDA`, `DSC_UNIDADE_MEDIDA`) VALUES
('KG', 'KILO'),
('MT', 'METRO'),
('LT', 'LITRO'),
('TN', 'TONELADA'),
('CX', 'CAIXA'),
('PC', 'PECA');

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
