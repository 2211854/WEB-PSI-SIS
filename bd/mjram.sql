-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 16-Fev-2023 às 22:24
-- Versão do servidor: 8.0.27
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mjram`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1676131526),
('cliente', '19', 1676076330),
('cliente', '20', 1676078270),
('cliente', '21', 1676078520),
('funcionarioManutencao', '25', 1676132750),
('funcionarioManutencao', '26', 1676431769),
('gestorFinaceiro', '23', 1676131505),
('gestorLogistica', '24', 1676131808),
('gestorPistas', '22', 1676132987);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1673269941, 1673269941),
('cliente', 1, NULL, NULL, NULL, 1673269941, 1673269941),
('createAviao', 2, 'Criar um aviao', NULL, NULL, 1673269937, 1673269937),
('createCategoriarecurso', 2, 'Criar uma Categoriarecurso', NULL, NULL, 1673269937, 1673269937),
('createClasse', 2, 'Criar uma Classe', NULL, NULL, 1673269937, 1673269937),
('createCompanhia', 2, 'Criar uma Companhia', NULL, NULL, 1673269938, 1673269938),
('createDetalhevoo', 2, 'Criar um Detalhevoo', NULL, NULL, 1673269938, 1673269938),
('createEscalavoo', 2, 'Criar um Escalavoo', NULL, NULL, 1673269938, 1673269938),
('createFuncionario', 2, 'Criar um Funcionario', NULL, NULL, 1673269938, 1673269938),
('createHangar', 2, 'Criar um Hangar', NULL, NULL, 1673269938, 1673269938),
('createItemvenda', 2, 'Criar carrinho', NULL, NULL, 1673269939, 1673269939),
('createOcupacao', 2, 'Criar um Ocupacao', NULL, NULL, 1673269938, 1673269938),
('createPedidorecurso', 2, 'Criar um Pedidorecurso', NULL, NULL, 1673269938, 1673269938),
('createPista', 2, 'Criar um Pista', NULL, NULL, 1673269939, 1673269939),
('createRecurso', 2, 'Criar um Recurso', NULL, NULL, 1673269939, 1673269939),
('createTarefa', 2, 'Criar um Tarefa', NULL, NULL, 1673269939, 1673269939),
('createUnidademedida', 2, 'Criar um Unidademedida', NULL, NULL, 1673269939, 1673269939),
('createVoo', 2, 'Criar um Voo', NULL, NULL, 1673269939, 1673269939),
('deleteAviao', 2, 'Apagar um Aviao', NULL, NULL, 1673269937, 1673269937),
('deleteCategoriarecurso', 2, 'Apagar um Categoriarecurso', NULL, NULL, 1673269937, 1673269937),
('deleteClasse', 2, 'Apagar uma Classe', NULL, NULL, 1673269937, 1673269937),
('deleteCompanhia', 2, 'Apagar uma Companhia', NULL, NULL, 1673269938, 1673269938),
('deleteDetalhevoo', 2, 'Apagar um Detalhevoo', NULL, NULL, 1673269938, 1673269938),
('deleteEscalavoo', 2, 'Apagar um Escalavoo', NULL, NULL, 1673269938, 1673269938),
('deleteFuncionario', 2, 'Apagar um Funcionario', NULL, NULL, 1673269938, 1673269938),
('deleteHangar', 2, 'Apagar um Hangar', NULL, NULL, 1673269938, 1673269938),
('deleteItemvenda', 2, 'Apagar uma passagem do carrinho', NULL, NULL, 1673269939, 1673269939),
('deleteOcupacao', 2, 'Apagar um Ocupacao', NULL, NULL, 1673269938, 1673269938),
('deletePedidorecurso', 2, 'Apagar um Pedidorecurso', NULL, NULL, 1673269939, 1673269939),
('deletePista', 2, 'Apagar um Pista', NULL, NULL, 1673269939, 1673269939),
('deleteRecurso', 2, 'Apagar um Recurso', NULL, NULL, 1673269939, 1673269939),
('deleteTarefa', 2, 'Apagar um Tarefa', NULL, NULL, 1673269939, 1673269939),
('deleteUnidademedida', 2, 'Apagar um Unidademedida', NULL, NULL, 1673269939, 1673269939),
('deleteVenda', 2, 'Cancela uma compra', NULL, NULL, 1673269939, 1673269939),
('deleteVoo', 2, 'Apagar um Voo', NULL, NULL, 1673269939, 1673269939),
('funcionarioManutencao', 1, NULL, NULL, NULL, 1673269941, 1673269941),
('gestorFinaceiro', 1, NULL, NULL, NULL, 1673269941, 1673269941),
('gestorLogistica', 1, NULL, NULL, NULL, 1673269940, 1673269940),
('gestorPistas', 1, NULL, NULL, NULL, 1673269939, 1673269939),
('indexAviao', 2, 'Ver a lista de avioes', NULL, NULL, 1673269937, 1673269937),
('indexCategoriarecurso', 2, 'Ver a lista de Categoriarecurso', NULL, NULL, 1673269937, 1673269937),
('indexClasse', 2, 'Ver a lista de Classes', NULL, NULL, 1673269937, 1673269937),
('indexCompanhia', 2, 'Ver a lista de Companhias', NULL, NULL, 1673269938, 1673269938),
('indexDetalhevoo', 2, 'Ver a lista de Detalhevoo', NULL, NULL, 1673269938, 1673269938),
('indexEscalavoo', 2, 'Ver a lista de Escalavoo', NULL, NULL, 1673269938, 1673269938),
('indexFuncionario', 2, 'Ver a lista de Funcionario', NULL, NULL, 1673269938, 1673269938),
('indexHangar', 2, 'Ver a lista de Hangar', NULL, NULL, 1673269938, 1673269938),
('indexItemvenda', 2, 'Ver o carrinho de compras', NULL, NULL, 1673269939, 1673269939),
('indexOcupacao', 2, 'Ver a lista de Ocupacao', NULL, NULL, 1673269938, 1673269938),
('indexPedidorecurso', 2, 'Ver a lista de Pedidorecurso', NULL, NULL, 1673269939, 1673269939),
('indexPista', 2, 'Ver a lista de Pista', NULL, NULL, 1673269939, 1673269939),
('indexRecurso', 2, 'Ver a lista de Recurso', NULL, NULL, 1673269939, 1673269939),
('indexTarefa', 2, 'Ver a lista de Tarefa', NULL, NULL, 1673269939, 1673269939),
('indexUnidademedida', 2, 'Ver a lista de Unidademedida', NULL, NULL, 1673269939, 1673269939),
('indexVoo', 2, 'Ver a lista de Voo', NULL, NULL, 1673269939, 1673269939),
('indexVooFO', 2, 'fazer a pesquisa de voos', NULL, NULL, 1673269939, 1673269939),
('loginBO', 2, 'Fazer login no backoffice', NULL, NULL, 1673269937, 1673269937),
('loginFO', 2, NULL, NULL, NULL, 1673269937, 1673269937),
('logoutBO', 2, 'Fazer o logout no backoffice', NULL, NULL, 1673269937, 1673269937),
('logoutFO', 2, 'efetuar o logout Front Office', NULL, NULL, 1673269939, 1673269939),
('siteIndexBO', 2, 'Ver o site index backoffice', NULL, NULL, 1673269937, 1673269937),
('siteIndexFO', 2, 'Ver o siteIndex', NULL, NULL, 1673269939, 1673269939),
('updateAviao', 2, 'Atualiza um Aviao', NULL, NULL, 1673269937, 1673269937),
('updateCategoriarecurso', 2, 'Atualiza uma Categoriarecurso', NULL, NULL, 1673269937, 1673269937),
('updateClasse', 2, 'Atualiza uma Classe', NULL, NULL, 1673269937, 1673269937),
('updateCompanhia', 2, 'Atualiza uma Companhia', NULL, NULL, 1673269938, 1673269938),
('updateDetalhevoo', 2, 'Atualiza um Detalhevoo', NULL, NULL, 1673269938, 1673269938),
('updateEscalavoo', 2, 'Atualiza um Escalavoo', NULL, NULL, 1673269938, 1673269938),
('updateFuncionario', 2, 'Atualiza um Funcionario', NULL, NULL, 1673269938, 1673269938),
('updateHangar', 2, 'Atualiza um Hangar', NULL, NULL, 1673269938, 1673269938),
('updateOcupacao', 2, 'Atualiza um Ocupacao', NULL, NULL, 1673269938, 1673269938),
('updatePedidorecurso', 2, 'Atualiza um Pedidorecurso', NULL, NULL, 1673269938, 1673269938),
('updatePista', 2, 'Atualiza um Pista', NULL, NULL, 1673269939, 1673269939),
('updateRecurso', 2, 'Atualiza um Recurso', NULL, NULL, 1673269939, 1673269939),
('updateTarefa', 2, 'Atualiza um Tarefa', NULL, NULL, 1673269939, 1673269939),
('updateUnidademedida', 2, 'Atualiza um Unidademedida', NULL, NULL, 1673269939, 1673269939),
('updateVenda', 2, 'efetuar a compra dos itens do carrinho', NULL, NULL, 1673269939, 1673269939),
('updateVoo', 2, 'Atualiza um Voo', NULL, NULL, 1673269939, 1673269939),
('viewAviao', 2, 'Ver detalhes do aviao', NULL, NULL, 1673269937, 1673269937),
('viewCategoriarecurso', 2, 'Ver os detalhes do Categoriarecurso', NULL, NULL, 1673269937, 1673269937),
('viewClasse', 2, 'Ver detalhes da Classe', NULL, NULL, 1673269937, 1673269937),
('viewCompanhia', 2, 'Ver detalhes da Companhia', NULL, NULL, 1673269938, 1673269938),
('viewDetalhevoo', 2, 'Ver detalhes do Detalhevoo', NULL, NULL, 1673269938, 1673269938),
('viewEscalavoo', 2, 'Ver detalhes do Escalavoo', NULL, NULL, 1673269938, 1673269938),
('viewFuncionario', 2, 'Ver detalhes do Funcionario', NULL, NULL, 1673269938, 1673269938),
('viewHangar', 2, 'Ver detalhes do Hangar', NULL, NULL, 1673269938, 1673269938),
('viewOcupacao', 2, 'Ver detalhes do Ocupacao', NULL, NULL, 1673269938, 1673269938),
('viewPedidorecurso', 2, 'Ver detalhes do Pedidorecurso', NULL, NULL, 1673269939, 1673269939),
('viewPista', 2, 'Ver detalhes do Pista', NULL, NULL, 1673269939, 1673269939),
('viewRecurso', 2, 'Ver detalhes do Recurso', NULL, NULL, 1673269939, 1673269939),
('viewTarefa', 2, 'Ver detalhes do Tarefa', NULL, NULL, 1673269939, 1673269939),
('viewUnidademedida', 2, 'Ver detalhes do Unidademedida', NULL, NULL, 1673269939, 1673269939),
('viewVoo', 2, 'Ver detalhes do Voo', NULL, NULL, 1673269939, 1673269939),
('viewVooFO', 2, 'Ver os detalhes do voo', NULL, NULL, 1673269939, 1673269939);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('gestorPistas', 'createAviao'),
('gestorLogistica', 'createCategoriarecurso'),
('gestorPistas', 'createClasse'),
('gestorPistas', 'createCompanhia'),
('gestorFinaceiro', 'createDetalhevoo'),
('gestorPistas', 'createDetalhevoo'),
('gestorPistas', 'createEscalavoo'),
('admin', 'createFuncionario'),
('gestorPistas', 'createHangar'),
('cliente', 'createItemvenda'),
('gestorPistas', 'createOcupacao'),
('gestorLogistica', 'createPedidorecurso'),
('gestorPistas', 'createPista'),
('gestorLogistica', 'createRecurso'),
('gestorPistas', 'createTarefa'),
('gestorLogistica', 'createUnidademedida'),
('gestorPistas', 'createVoo'),
('gestorPistas', 'deleteAviao'),
('gestorLogistica', 'deleteCategoriarecurso'),
('gestorPistas', 'deleteClasse'),
('gestorPistas', 'deleteCompanhia'),
('gestorFinaceiro', 'deleteDetalhevoo'),
('gestorPistas', 'deleteDetalhevoo'),
('gestorPistas', 'deleteEscalavoo'),
('admin', 'deleteFuncionario'),
('gestorPistas', 'deleteHangar'),
('cliente', 'deleteItemvenda'),
('gestorPistas', 'deleteOcupacao'),
('gestorFinaceiro', 'deletePedidorecurso'),
('gestorLogistica', 'deletePedidorecurso'),
('gestorPistas', 'deletePista'),
('gestorLogistica', 'deleteRecurso'),
('gestorPistas', 'deleteTarefa'),
('gestorLogistica', 'deleteUnidademedida'),
('cliente', 'deleteVenda'),
('gestorPistas', 'deleteVoo'),
('admin', 'funcionarioManutencao'),
('admin', 'gestorFinaceiro'),
('admin', 'gestorLogistica'),
('admin', 'gestorPistas'),
('gestorPistas', 'indexAviao'),
('gestorLogistica', 'indexCategoriarecurso'),
('gestorPistas', 'indexClasse'),
('gestorPistas', 'indexCompanhia'),
('gestorFinaceiro', 'indexDetalhevoo'),
('gestorPistas', 'indexDetalhevoo'),
('gestorPistas', 'indexEscalavoo'),
('admin', 'indexFuncionario'),
('gestorPistas', 'indexHangar'),
('cliente', 'indexItemvenda'),
('gestorPistas', 'indexOcupacao'),
('gestorFinaceiro', 'indexPedidorecurso'),
('gestorLogistica', 'indexPedidorecurso'),
('gestorPistas', 'indexPista'),
('gestorLogistica', 'indexRecurso'),
('gestorPistas', 'indexTarefa'),
('gestorLogistica', 'indexUnidademedida'),
('gestorFinaceiro', 'indexVoo'),
('gestorPistas', 'indexVoo'),
('cliente', 'indexVooFO'),
('gestorFinaceiro', 'loginBO'),
('gestorLogistica', 'loginBO'),
('gestorPistas', 'loginBO'),
('cliente', 'loginFO'),
('gestorFinaceiro', 'logoutBO'),
('gestorLogistica', 'logoutBO'),
('gestorPistas', 'logoutBO'),
('cliente', 'logoutFO'),
('gestorFinaceiro', 'siteIndexBO'),
('gestorLogistica', 'siteIndexBO'),
('gestorPistas', 'siteIndexBO'),
('cliente', 'siteIndexFO'),
('gestorPistas', 'updateAviao'),
('gestorLogistica', 'updateCategoriarecurso'),
('gestorPistas', 'updateClasse'),
('gestorPistas', 'updateCompanhia'),
('gestorFinaceiro', 'updateDetalhevoo'),
('gestorPistas', 'updateDetalhevoo'),
('gestorPistas', 'updateEscalavoo'),
('admin', 'updateFuncionario'),
('gestorPistas', 'updateHangar'),
('gestorPistas', 'updateOcupacao'),
('gestorFinaceiro', 'updatePedidorecurso'),
('gestorLogistica', 'updatePedidorecurso'),
('gestorPistas', 'updatePista'),
('gestorLogistica', 'updateRecurso'),
('gestorPistas', 'updateTarefa'),
('gestorLogistica', 'updateUnidademedida'),
('cliente', 'updateVenda'),
('gestorPistas', 'updateVoo'),
('gestorPistas', 'viewAviao'),
('gestorLogistica', 'viewCategoriarecurso'),
('gestorPistas', 'viewClasse'),
('gestorPistas', 'viewCompanhia'),
('gestorFinaceiro', 'viewDetalhevoo'),
('gestorPistas', 'viewDetalhevoo'),
('gestorPistas', 'viewEscalavoo'),
('admin', 'viewFuncionario'),
('gestorPistas', 'viewHangar'),
('gestorPistas', 'viewOcupacao'),
('gestorFinaceiro', 'viewPedidorecurso'),
('gestorLogistica', 'viewPedidorecurso'),
('gestorPistas', 'viewPista'),
('gestorLogistica', 'viewRecurso'),
('gestorPistas', 'viewTarefa'),
('gestorLogistica', 'viewUnidademedida'),
('gestorFinaceiro', 'viewVoo'),
('gestorPistas', 'viewVoo'),
('cliente', 'viewVooFO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aviao`
--

DROP TABLE IF EXISTS `aviao`;
CREATE TABLE IF NOT EXISTS `aviao` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designacao` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marca` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `combustivelatual` bigint NOT NULL,
  `combustivelmaximo` bigint NOT NULL,
  `data_registo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` enum('inativo','operacional','manutencao','danificado') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'operacional',
  `id_companhia` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_aviao_companhia` (`id_companhia`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `aviao`
--

INSERT INTO `aviao` (`id`, `designacao`, `marca`, `modelo`, `combustivelatual`, `combustivelmaximo`, `data_registo`, `estado`, `id_companhia`) VALUES
(1, 'TAP1', 'Airbus', 'A380', 300000, 315000, '2022-12-06 13:34:46', 'operacional', 1),
(8, 'QR8', 'Boing', '777', 160000, 200000, '2023-01-09 00:18:54', 'operacional', 2),
(9, 'EJ9', 'Airbus', 'A320', 300000, 315000, '2023-02-13 23:06:52', 'operacional', 5),
(10, 'RYA10', 'Boing', '747', 290000, 295000, '2023-02-13 23:13:27', 'operacional', 6),
(11, 'HV11', 'Boing', '767', 200000, 215000, '2023-02-13 23:19:01', 'inativo', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_recurso`
--

DROP TABLE IF EXISTS `categoria_recurso`;
CREATE TABLE IF NOT EXISTS `categoria_recurso` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designacao` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categoria_recurso`
--

INSERT INTO `categoria_recurso` (`id`, `designacao`) VALUES
(1, 'Combustíveis'),
(2, 'Limpezas'),
(3, 'Pneus');

-- --------------------------------------------------------

--
-- Estrutura da tabela `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designacao` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `classe`
--

INSERT INTO `classe` (`id`, `designacao`) VALUES
(1, 'Economica'),
(2, 'Primeira'),
(3, 'Business');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` bigint UNSIGNED NOT NULL,
  `passaporte` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `passaporte`) VALUES
(10, 'pp12345647'),
(11, 'pp65412358'),
(12, 'pp86574236');

-- --------------------------------------------------------

--
-- Estrutura da tabela `companhia`
--

DROP TABLE IF EXISTS `companhia`;
CREATE TABLE IF NOT EXISTS `companhia` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sigla` (`sigla`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `companhia`
--

INSERT INTO `companhia` (`id`, `nome`, `sigla`) VALUES
(1, 'Transportes Aéreos Portugueses', 'TAP'),
(2, 'Qatar Airways', 'QR'),
(5, 'EasyJet', 'EJ'),
(6, 'Ryanair', 'RYA'),
(7, 'Transavia', 'HV');

-- --------------------------------------------------------

--
-- Estrutura da tabela `detalhe_voo`
--

DROP TABLE IF EXISTS `detalhe_voo`;
CREATE TABLE IF NOT EXISTS `detalhe_voo` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `preço` int NOT NULL,
  `id_voo` bigint UNSIGNED NOT NULL,
  `id_classe` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id_classe`,`id_voo`),
  KEY `id` (`id`),
  KEY `fk_detalhe_voo` (`id_voo`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `detalhe_voo`
--

INSERT INTO `detalhe_voo` (`id`, `preço`, `id_voo`, `id_classe`) VALUES
(9, 407, 6, 1),
(13, 488, 7, 1),
(17, 738, 8, 1),
(18, 662, 9, 1),
(22, 45, 10, 1),
(24, 469, 11, 1),
(27, 103, 12, 1),
(30, 45, 13, 1),
(10, 3705, 6, 2),
(14, 4540, 7, 2),
(15, 4837, 8, 2),
(19, 4678, 9, 2),
(23, 555, 10, 2),
(26, 4527, 11, 2),
(29, 1200, 12, 2),
(31, 550, 13, 2),
(11, 1516, 6, 3),
(12, 1049, 7, 3),
(16, 2435, 8, 3),
(20, 1576, 9, 3),
(21, 250, 10, 3),
(25, 1223, 11, 3),
(28, 331, 12, 3),
(32, 230, 13, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `escala_voo`
--

DROP TABLE IF EXISTS `escala_voo`;
CREATE TABLE IF NOT EXISTS `escala_voo` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `partida` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `destino` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `horario_partida` datetime NOT NULL,
  `horario_chegada` datetime NOT NULL,
  `id_voo` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_escala_voo` (`id_voo`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `escala_voo`
--

INSERT INTO `escala_voo` (`id`, `partida`, `destino`, `horario_partida`, `horario_chegada`, `id_voo`) VALUES
(17, 'Lisboa', 'Londres', '2023-02-15 07:05:00', '2023-02-15 10:05:00', 6),
(18, 'Londres', 'Dubai', '2023-02-15 12:40:00', '2023-02-15 23:45:00', 6),
(19, 'Lisboa', 'Sao Paulo', '2023-02-16 23:30:00', '2023-02-17 06:30:00', 7),
(20, 'Lisboa', 'Dubai', '2023-02-18 20:45:00', '2023-02-19 09:15:00', 8),
(21, 'Dubai', 'Singapura', '2023-02-19 10:00:00', '2023-02-19 21:25:00', 8),
(22, 'Lisboa', 'Madrid', '2023-02-19 11:35:00', '2023-02-19 13:50:00', 9),
(23, 'Madrid', 'Jida', '2023-02-19 15:25:00', '2023-02-19 23:15:00', 9),
(24, 'Jida', 'Jacarta', '2023-02-20 08:55:00', '2023-02-20 22:40:00', 9),
(25, 'Lisboa', 'Londres', '2023-02-25 18:45:00', '2023-02-25 21:35:00', 10),
(26, 'Lisboa', 'Sao Paulo', '2023-02-26 10:00:00', '2023-02-26 16:15:00', 11),
(27, 'Sao Paulo', 'Rio de Janeiro', '2023-02-26 18:20:00', '2023-02-26 19:25:00', 11),
(28, 'Lisboa', 'Roma', '2023-02-27 20:10:00', '2023-02-28 00:05:00', 12),
(29, 'Lisboa', 'Londres', '2023-02-28 18:50:00', '2023-02-28 21:40:00', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` bigint UNSIGNED NOT NULL,
  `nib` varchar(21) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nib`) VALUES
(4, '123456789987456321147'),
(13, '111111111111111111111'),
(14, '111122223333444455556'),
(15, '555566661111222233337'),
(16, '123456789123456789199'),
(17, '123456789012345678998');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hangar`
--

DROP TABLE IF EXISTS `hangar`;
CREATE TABLE IF NOT EXISTS `hangar` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designacao` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `hangar`
--

INSERT INTO `hangar` (`id`, `designacao`) VALUES
(2, 'Norte 1'),
(3, 'Norte 2'),
(4, 'Sul 1'),
(5, 'Sul 2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_venda`
--

DROP TABLE IF EXISTS `item_venda`;
CREATE TABLE IF NOT EXISTS `item_venda` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `passaporte` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_venda` bigint UNSIGNED NOT NULL,
  `id_classe` bigint UNSIGNED NOT NULL,
  `id_voo` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id_voo`,`passaporte`),
  KEY `id` (`id`),
  KEY `fk_item_venda` (`id_venda`),
  KEY `fk_item_classe` (`id_classe`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `item_venda`
--

INSERT INTO `item_venda` (`id`, `passaporte`, `id_venda`, `id_classe`, `id_voo`) VALUES
(7, 'PP65412358', 6, 1, 6),
(3, 'PT123456', 3, 1, 6),
(4, 'PT12345678', 3, 2, 6),
(5, 'PT345678', 4, 3, 7),
(6, 'PP65412358', 5, 3, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1667677647),
('m130524_201442_init', 1667677653),
('m190124_110200_add_verification_token_column_to_user_table', 1667677653),
('m140506_102106_rbac_init', 1667759613),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1667759613),
('m180523_151638_rbac_updates_indexes_without_prefix', 1667759613),
('m200409_110543_rbac_update_mssql_trigger', 1667759613);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocupacao`
--

DROP TABLE IF EXISTS `ocupacao`;
CREATE TABLE IF NOT EXISTS `ocupacao` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ocupacao` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_aviao` bigint UNSIGNED NOT NULL,
  `id_classe` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id_aviao`,`id_classe`),
  KEY `id` (`id`),
  KEY `fk_ocupacao_classe` (`id_classe`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `ocupacao`
--

INSERT INTO `ocupacao` (`id`, `ocupacao`, `id_aviao`, `id_classe`) VALUES
(2, '90', 1, 1),
(1, '10', 1, 2),
(3, '9', 1, 3),
(5, '9', 8, 2),
(4, '10', 8, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_recurso`
--

DROP TABLE IF EXISTS `pedido_recurso`;
CREATE TABLE IF NOT EXISTS `pedido_recurso` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `quantidade` bigint NOT NULL,
  `data_registo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `custo_total` bigint NOT NULL,
  `id_recurso` bigint UNSIGNED NOT NULL,
  `id_funcionario` bigint UNSIGNED NOT NULL,
  `estado` enum('aprovado','pago','reprovado','devolvido','entregue','por aprovar') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'por aprovar',
  PRIMARY KEY (`id`),
  KEY `fk_pedido_recurso` (`id_recurso`),
  KEY `fk_pedido_funcionario` (`id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pedido_recurso`
--

INSERT INTO `pedido_recurso` (`id`, `quantidade`, `data_registo`, `custo_total`, `id_recurso`, `id_funcionario`, `estado`) VALUES
(1, 500000, '2023-01-08 02:52:51', 100000, 1, 4, 'pago'),
(2, 1, '2023-01-08 04:02:04', 1, 1, 4, 'devolvido'),
(3, 500000, '2023-01-09 02:33:36', 100000, 1, 4, 'por aprovar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pista`
--

DROP TABLE IF EXISTS `pista`;
CREATE TABLE IF NOT EXISTS `pista` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designacao` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comprimento` bigint NOT NULL,
  `largura` bigint NOT NULL,
  `estado` enum('danificada','operacional','manutencao') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'operacional',
  PRIMARY KEY (`id`),
  UNIQUE KEY `designacao` (`designacao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pista`
--

INSERT INTO `pista` (`id`, `designacao`, `comprimento`, `largura`, `estado`) VALUES
(1, '17/35', 2400, 45, 'operacional'),
(2, '03/21', 3805, 45, 'operacional'),
(4, '02/20', 4000, 45, 'manutencao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recurso`
--

DROP TABLE IF EXISTS `recurso`;
CREATE TABLE IF NOT EXISTS `recurso` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stockatual` bigint NOT NULL,
  `id_categoria` bigint UNSIGNED NOT NULL,
  `id_unidade` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_recurso_unidade` (`id_unidade`),
  KEY `fk_recurso_categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `recurso`
--

INSERT INTO `recurso` (`id`, `nome`, `stockatual`, `id_categoria`, `id_unidade`) VALUES
(1, 'JET A', 1000002, 1, 1),
(3, 'Kit de limpeza', 5000, 2, 2),
(4, 'Pneu 270x', 50, 3, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefa`
--

DROP TABLE IF EXISTS `tarefa`;
CREATE TABLE IF NOT EXISTS `tarefa` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designacao` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_registo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_inicio` datetime DEFAULT NULL,
  `data_conclusao` datetime DEFAULT NULL,
  `estado` enum('cancelado','concluido','planeada') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'planeada',
  `id_voo` bigint UNSIGNED NOT NULL,
  `id_hangar` bigint UNSIGNED DEFAULT NULL,
  `id_recurso` bigint UNSIGNED DEFAULT NULL,
  `quantidade` bigint UNSIGNED DEFAULT NULL,
  `id_funcionario_registo` bigint UNSIGNED NOT NULL,
  `id_funcionario_responsavel` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tarefa_voo` (`id_voo`),
  KEY `fk_tarefa_hangar` (`id_hangar`),
  KEY `fk_tarefa_recurso` (`id_recurso`),
  KEY `fk_tarefa_funcionario_registo` (`id_funcionario_registo`),
  KEY `fk_tarefa_funcionario_responsavel` (`id_funcionario_responsavel`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tarefa`
--

INSERT INTO `tarefa` (`id`, `designacao`, `data_registo`, `data_inicio`, `data_conclusao`, `estado`, `id_voo`, `id_hangar`, `id_recurso`, `quantidade`, `id_funcionario_registo`, `id_funcionario_responsavel`) VALUES
(7, 'Reabastecer', '2023-02-14 00:57:33', NULL, NULL, 'planeada', 6, NULL, 1, 10000, 13, NULL),
(8, 'Reabastecer', '2023-02-16 22:23:01', NULL, NULL, 'planeada', 10, NULL, 1, 50000, 4, NULL),
(9, 'Trocar pneu', '2023-02-16 22:23:23', NULL, NULL, 'planeada', 10, 2, 4, 3, 4, NULL),
(10, 'limpeza', '2023-02-16 22:23:52', NULL, NULL, 'planeada', 11, NULL, 3, 5, 4, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade_medida`
--

DROP TABLE IF EXISTS `unidade_medida`;
CREATE TABLE IF NOT EXISTS `unidade_medida` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designacao` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `unidade_medida`
--

INSERT INTO `unidade_medida` (`id`, `designacao`) VALUES
(1, 'Litros'),
(2, 'Unidades');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'administrador', 'aVUK9dPTMvpy8uLhw4i0tnSH9woOej1d', '$2y$13$1TrMp8APxxSF44TI3kUuuOktVXf6OXGwDD3zYN0jc4JCTkkcvKyVa', NULL, 'admin@admin.pt', 10, 1667834207, 1676431618, 'dumx5N1FRwmTbeINxA4TtxAvsh-lxnWH_1667834207'),
(19, 'JoseDuarte', 'nixX24V3fMS4rq8g0Ygr9Hlyy_Jsdxau', '$2y$13$HcnFz3RkwO9dHjM2cZrBm.sqvvsCUl2vJwuZOHqFuf5wdFMVM8VJ2', NULL, 'jose.duarte@email.com', 10, 1676076330, 1676486908, 'b4XQjAwtC7E0Uu4ah8DKRg752jGTSY3X_1676076330'),
(20, 'MarcioValerio', 'eLBFLJAGpkVnZB39fySS_H9eIncNEXsp', '$2y$13$Lyo/q7gNw1REtc19bsGZv.gYhje3HtjfzM/wOhj0R1FGkgFXc/kN2', NULL, 'marcio.valerio@email.com', 10, 1676078270, 1676078270, 'Ko0SvtQ4cNf8bUFEcYJvxSEto-pVLgWv_1676078270'),
(21, 'RicardoSantos', 'U4xpPBhdkw1q2CI-Nj_myIY9AMpKPU6a', '$2y$13$StDYHKBb7H3JbaJEl9bJR.DPgKUkO3FSGO/YA2hi25lFPJ/Cw5Qhu', NULL, 'ricardo.santos@email.com', 10, 1676078520, 1676078520, 'IFp5Msm3oSMSHfDgjUrhMKCT9awsropZ_1676078520'),
(22, 'JoaoAntunes', 'UrjOTPSLeNRrYs40rQIyaD9nVnuvHL52', '$2y$13$jUfoFOHaqlVUbS9sYHA3o.35l/VmtZPOp8aTbBOIIX6V2o7ZNKXF6', NULL, 'joao.antunes@email.com', 10, 1676130854, 1676130854, '-bNjO7I3m7FJIsg0ZOaqMqSejbjilC-O_1676130854'),
(23, 'JoanaSilva', '6ruY2cyqabKctEHPktKN1ut5LR8BM8-q', '$2y$13$f1cP3tIzVHNg0WlBJzMScO1WR1woeFFcWxlsCwTCbdXl/18fTVHNC', NULL, 'joana.silva@email.com', 10, 1676131505, 1676131505, 'o3lMVZvS2lepEXdSQaiteVLf6C5Vyy-L_1676131505'),
(24, 'AnaCosta', 'Nw1nZFUGDErG21rcvGowwHA3LFEW8BQ6', '$2y$13$9m/NgBPtnJljPXenbsIIeO7z7x0T1A1dMIWKmWs.WxhGLdPbbFEFm', NULL, 'ana.costa@email.com', 10, 1676131808, 1676131808, 'nMDUFsIqwaRbvAkAVX-A2TDNiqtpAi_J_1676131808'),
(25, 'SimaoReis', 'IJJCZ30BMRRzOpZrgd8GsDX7VsHXiJOj', '$2y$13$7JOjE0hTH7m8HeZPjGleQ.cFob8ejEP2EyuKXLZqsHZzPD49TvzOu', NULL, 'simao.reis@email.com', 10, 1676132750, 1676132750, '1Cde6UKTiPpEVesdSsobNePtH0binAGX_1676132750'),
(26, 'teste', 'UDaEbAeq8rg6p6tApUoffOT9cL5Gn4kR', '$2y$13$RdKngo8LqsRzo2W/HMLpkeo737qeKkjQzfO4F./SoD6781DNaabeG', NULL, 'teste@teste.teste', 10, 1676431769, 1676431799, 'M70wJwpYWZg47cZEMefTJWXLFFQ6Hmh8_1676431769');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

DROP TABLE IF EXISTS `utilizador`;
CREATE TABLE IF NOT EXISTS `utilizador` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `telemovel` int NOT NULL,
  `nif` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apelidos` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cartaocidadao` int NOT NULL,
  `id_user` int NOT NULL,
  `data_registo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_utilizador_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`id`, `telemovel`, `nif`, `nome`, `apelidos`, `cartaocidadao`, `id_user`, `data_registo`) VALUES
(4, 942657139, '377555111', 'adminNome', 'adminApelido', 14785236, 1, '2023-01-05 00:55:44'),
(10, 936825714, '213456789', 'Jose', 'Duarte', 11111111, 19, '2023-02-11 00:45:30'),
(11, 987321654, '258741369', 'Marcio', 'Valerio', 15975368, 20, '2023-02-11 01:17:50'),
(12, 900006505, '121231231', 'Ricardo', 'Santos', 55135161, 21, '2023-02-11 01:22:00'),
(13, 957846123, '129526222', 'Joao', 'Antunes', 19529262, 22, '2023-02-11 15:54:14'),
(14, 963574128, '351236852', 'Joana', 'Silva', 35784612, 23, '2023-02-11 16:05:05'),
(15, 951753684, '159753842', 'Ana', 'Costa', 10000098, 24, '2023-02-11 16:10:08'),
(16, 951847263, '321312399', 'Simao', 'Reis', 11144477, 25, '2023-02-11 16:25:50'),
(17, 999999999, '389999999', 'teste', 'teste', 99999999, 26, '2023-02-15 03:29:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

DROP TABLE IF EXISTS `venda`;
CREATE TABLE IF NOT EXISTS `venda` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `estado` enum('cancelado','pago','carrinho') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'carrinho',
  `data_compra` datetime DEFAULT NULL,
  `data_registo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_cliente` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_venda_cliente` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id`, `estado`, `data_compra`, `data_registo`, `id_cliente`) VALUES
(3, 'cancelado', '2023-02-15 00:36:36', '2023-02-15 00:31:39', 10),
(4, 'pago', '2023-02-15 00:40:20', '2023-02-15 00:38:08', 10),
(5, 'pago', '2023-02-15 00:46:43', '2023-02-15 00:46:40', 11),
(6, 'pago', '2023-02-15 00:48:11', '2023-02-15 00:48:06', 11),
(7, 'carrinho', NULL, '2023-02-15 00:49:52', 11),
(8, 'carrinho', NULL, '2023-02-15 17:44:15', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `voo`
--

DROP TABLE IF EXISTS `voo`;
CREATE TABLE IF NOT EXISTS `voo` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designacao` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_registo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` enum('atrasado','cancelado','concluido','planeado','circulacao') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'planeado',
  `id_aviao` bigint UNSIGNED NOT NULL,
  `id_pista` bigint UNSIGNED NOT NULL,
  `id_funcionario` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_voo_aviao` (`id_aviao`),
  KEY `fk_voo_funcionario` (`id_funcionario`),
  KEY `fk_voo_pista` (`id_pista`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `voo`
--

INSERT INTO `voo` (`id`, `designacao`, `data_registo`, `estado`, `id_aviao`, `id_pista`, `id_funcionario`) VALUES
(6, '[TAP - 6] Voo1', '2023-02-13 23:20:34', 'concluido', 1, 1, 13),
(7, '[QR - 7] Voo2', '2023-02-13 23:21:09', 'planeado', 8, 2, 13),
(8, '[EJ - 8] Voo3', '2023-02-13 23:45:06', 'planeado', 9, 1, 4),
(9, '[RYA - 9] Voo4', '2023-02-13 23:45:38', 'planeado', 10, 2, 4),
(10, '[TAP - 10] Voo5', '2023-02-13 23:54:07', 'planeado', 1, 1, 4),
(11, '[QR - 11] Voo6', '2023-02-13 23:54:31', 'planeado', 8, 2, 4),
(12, '[EJ - 12] Voo7', '2023-02-13 23:54:52', 'planeado', 9, 1, 4),
(13, '[RYA - 13] Voo8', '2023-02-13 23:55:37', 'planeado', 10, 2, 4);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `aviao`
--
ALTER TABLE `aviao`
  ADD CONSTRAINT `fk_aviao_companhia` FOREIGN KEY (`id_companhia`) REFERENCES `companhia` (`id`);

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_utilizador` FOREIGN KEY (`id`) REFERENCES `utilizador` (`id`);

--
-- Limitadores para a tabela `detalhe_voo`
--
ALTER TABLE `detalhe_voo`
  ADD CONSTRAINT `fk_detalhe_classe` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id`),
  ADD CONSTRAINT `fk_detalhe_voo` FOREIGN KEY (`id_voo`) REFERENCES `voo` (`id`);

--
-- Limitadores para a tabela `escala_voo`
--
ALTER TABLE `escala_voo`
  ADD CONSTRAINT `fk_escala_voo` FOREIGN KEY (`id_voo`) REFERENCES `voo` (`id`);

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_funcionario_utilizador` FOREIGN KEY (`id`) REFERENCES `utilizador` (`id`);

--
-- Limitadores para a tabela `item_venda`
--
ALTER TABLE `item_venda`
  ADD CONSTRAINT `fk_item_classe` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id`),
  ADD CONSTRAINT `fk_item_venda` FOREIGN KEY (`id_venda`) REFERENCES `venda` (`id`),
  ADD CONSTRAINT `fk_item_voo` FOREIGN KEY (`id_voo`) REFERENCES `voo` (`id`);

--
-- Limitadores para a tabela `ocupacao`
--
ALTER TABLE `ocupacao`
  ADD CONSTRAINT `fk_ocupacao_aviao` FOREIGN KEY (`id_aviao`) REFERENCES `aviao` (`id`),
  ADD CONSTRAINT `fk_ocupacao_classe` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id`);

--
-- Limitadores para a tabela `pedido_recurso`
--
ALTER TABLE `pedido_recurso`
  ADD CONSTRAINT `fk_pedido_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id`),
  ADD CONSTRAINT `fk_pedido_recurso` FOREIGN KEY (`id_recurso`) REFERENCES `recurso` (`id`);

--
-- Limitadores para a tabela `recurso`
--
ALTER TABLE `recurso`
  ADD CONSTRAINT `fk_recurso_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_recurso` (`id`),
  ADD CONSTRAINT `fk_recurso_unidade` FOREIGN KEY (`id_unidade`) REFERENCES `unidade_medida` (`id`);

--
-- Limitadores para a tabela `tarefa`
--
ALTER TABLE `tarefa`
  ADD CONSTRAINT `fk_tarefa_funcionario_registo` FOREIGN KEY (`id_funcionario_registo`) REFERENCES `funcionario` (`id`),
  ADD CONSTRAINT `fk_tarefa_funcionario_responsavel` FOREIGN KEY (`id_funcionario_responsavel`) REFERENCES `funcionario` (`id`),
  ADD CONSTRAINT `fk_tarefa_hangar` FOREIGN KEY (`id_hangar`) REFERENCES `hangar` (`id`),
  ADD CONSTRAINT `fk_tarefa_recurso` FOREIGN KEY (`id_recurso`) REFERENCES `recurso` (`id`),
  ADD CONSTRAINT `fk_tarefa_voo` FOREIGN KEY (`id_voo`) REFERENCES `voo` (`id`);

--
-- Limitadores para a tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD CONSTRAINT `fk_utilizador_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `fk_venda_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`);

--
-- Limitadores para a tabela `voo`
--
ALTER TABLE `voo`
  ADD CONSTRAINT `fk_voo_aviao` FOREIGN KEY (`id_aviao`) REFERENCES `aviao` (`id`),
  ADD CONSTRAINT `fk_voo_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id`),
  ADD CONSTRAINT `fk_voo_pista` FOREIGN KEY (`id_pista`) REFERENCES `pista` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
