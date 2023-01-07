-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 07-Jan-2023 às 21:22
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
('admin', '1', 1667833664),
('cliente', '5', 1668380635),
('funcionarioManutencao', '2', 1668380312),
('funcionarioManutencao', '6', 1671023493),
('gestorFinaceiro', '12', 1671737448),
('gestorFinaceiro', '3', 1668380450),
('gestorLogistica', '13', 1672250004);

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
('admin', 1, NULL, NULL, NULL, 1667833663, 1667833663),
('cliente', 1, NULL, NULL, NULL, 1667833663, 1667833663),
('createPost', 2, 'Create a post', NULL, NULL, 1667833663, 1667833663),
('funcionarioManutencao', 1, NULL, NULL, NULL, 1667833663, 1667833663),
('gestorFinaceiro', 1, NULL, NULL, NULL, 1667833663, 1667833663),
('gestorLogistica', 1, NULL, NULL, NULL, 1667833663, 1667833663),
('gestorPistas', 1, NULL, NULL, NULL, 1667833663, 1667833663),
('updatePost', 2, 'Update post', NULL, NULL, 1667833663, 1667833663);

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
('admin', 'funcionarioManutencao'),
('admin', 'gestorFinaceiro'),
('admin', 'gestorLogistica'),
('admin', 'gestorPistas');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_recurso`
--

DROP TABLE IF EXISTS `categoria_recurso`;
CREATE TABLE IF NOT EXISTS `categoria_recurso` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designacao` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designacao` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '123456789123456789122'),
(3, '123456789012345678999'),
(4, '123456789987456321147');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hangar`
--

DROP TABLE IF EXISTS `hangar`;
CREATE TABLE IF NOT EXISTS `hangar` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designacao` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `hangar`
--

INSERT INTO `hangar` (`id`, `designacao`) VALUES
(1, 'Norte 1');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pista`
--

INSERT INTO `pista` (`id`, `designacao`, `comprimento`, `largura`, `estado`) VALUES
(1, '17/35', 2400, 45, 'operacional'),
(2, '03/21', 3805, 45, 'operacional');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id_funcionario_registo` bigint UNSIGNED NOT NULL,
  `id_funcionario_responsavel` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tarefa_voo` (`id_voo`),
  KEY `fk_tarefa_hangar` (`id_hangar`),
  KEY `fk_tarefa_recurso` (`id_recurso`),
  KEY `fk_tarefa_funcionario_registo` (`id_funcionario_registo`),
  KEY `fk_tarefa_funcionario_responsavel` (`id_funcionario_responsavel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade_medida`
--

DROP TABLE IF EXISTS `unidade_medida`;
CREATE TABLE IF NOT EXISTS `unidade_medida` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designacao` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `unidade_medida`
--

INSERT INTO `unidade_medida` (`id`, `designacao`) VALUES
(1, 'Litros');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'administrador', 'aVUK9dPTMvpy8uLhw4i0tnSH9woOej1d', '$2y$13$bbRRb/VVliZUBbs4EmXmPO1.YK9fM2CneYKdy02eAyppvyrC0ipKS', NULL, 'admin@admin.pt', 10, 1667834207, 1667834207, 'dumx5N1FRwmTbeINxA4TtxAvsh-lxnWH_1667834207'),
(2, 'funcionariomanutencao1', 'teJNxcluIWLF26olqj4PcaHK7dGBWK98', '$2y$13$PuyWNlWDae1CA8sC84iL2.nkcLzcjhGWrfynGgoOf.GJiasRkC5yO', NULL, '2211854@my.ipleiria.pt', 10, 1668380312, 1668380312, '-rlJPIrSTOmM1aj6wZo0t876olmwZy4H_1668380312'),
(3, 'gestorfinanceiro1', 'G9IV_vrd4HoedthC5MtyOk3M7-8htrmP', '$2y$13$m9HfspFYoQw6PVQGISsdjODGWgZxEmqfTVGoahdSphvSJurvH351W', NULL, 'gestorfinanceiro@gestores.pt', 10, 1668380450, 1668380450, '3DNmnQP9O_GGrLye7lyqpcTySAXlBO9W_1668380450'),
(5, 'cliente1', 'KaKekjEYs4he59dJQIC_wtdOk2jU4hmW', '$2y$13$lhekKfGMkTcJXDOalXB3ROlDsErQcChcUkc2lEZQhuoRPYhYxRvKm', NULL, 'cliente1@clientesbons.pt', 10, 1668380635, 1668380635, 'MxrURdoJqwvri6asAU6wdz5dGfKIhEU__1668380635'),
(6, '', 'WVwF6k8ACUjEjWSsHYodNQO7YgkwviXs', '$2y$13$0bW5D27aB1/irY0QA/IIsepBfoxADmCbvEBtTTX1YxpP7WBJTFvjy', NULL, '', 10, 1671023492, 1671023492, 'tdT8tDsnue0UqJE4PoX0lv9swrzDVbON_1671023492'),
(12, 'FMteste2editado', '_TqCak9QBodaUTq9D5cvIhenEKu3ZVLO', '$2y$13$GPB48o2.um89Bh5qnj2Ai.endyk7YFPMP.TTZUa6gkdT7QmxvVtLe', NULL, 'FMteste2@teste2.pt', 10, 1671025530, 1671735236, 'MzGBr3Xo9Hn_R_2SJqXuL35bYMUcGQJW_1671025530'),
(13, 'GLteste1', '1O7Z_jOJU_v3MMOfcUwfMjOBCSsPINA1', '$2y$13$EX5toqPW9neke/GVYRA2ru5Gyu3/K2cwV77WQzcQofH9VGKx38chW', NULL, 'GLteste1@teste1.pt', 10, 1672250004, 1672250004, 'Xd2YSqWb4GOTAvp_swhyr20XZ9X_hI8V_1672250003');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`id`, `telemovel`, `nif`, `nome`, `apelidos`, `cartaocidadao`, `id_user`, `data_registo`) VALUES
(1, 123456789, '123456789', 'FMteste1Nome', 'FMteste1Apelido', 123456789, 6, '2022-12-14 13:11:33'),
(2, 2147483647, '213213123', 'FMteste2Nomeeditado', 'FMteste2Apelido', 2147483647, 12, '2022-12-14 13:45:30'),
(3, 12345679, '213454789', 'GLteste1Nome', 'GLteste1Apelido', 9876125, 13, '2022-12-28 17:53:24'),
(4, 842657139, '777555111', 'adminNome', 'adminApelido', 147852369, 1, '2023-01-05 00:55:44');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
