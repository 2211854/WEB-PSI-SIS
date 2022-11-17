-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 17-Nov-2022 às 10:14
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
('gestorFinaceiro', '3', 1668380450);

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
  `marca` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `combustivelatual` bigint NOT NULL,
  `combustivelmaximo` bigint NOT NULL,
  `data_registo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` enum('inativo','operacional','manutencao','danificado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'operacional',
  `id_companhia` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_aviao_companhia` (`id_companhia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_recursos`
--

DROP TABLE IF EXISTS `categoria_recursos`;
CREATE TABLE IF NOT EXISTS `categoria_recursos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designacao` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designacao` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` bigint UNSIGNED NOT NULL,
  `passaporte` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `companhia`
--

DROP TABLE IF EXISTS `companhia`;
CREATE TABLE IF NOT EXISTS `companhia` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `detalhes_voo`
--

DROP TABLE IF EXISTS `detalhes_voo`;
CREATE TABLE IF NOT EXISTS `detalhes_voo` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `preço` int NOT NULL,
  `id_voo` bigint UNSIGNED NOT NULL,
  `id_classe` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id_classe`,`id_voo`),
  KEY `id` (`id`),
  KEY `fk_detalhes_voos` (`id_voo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escalas_voo`
--

DROP TABLE IF EXISTS `escalas_voo`;
CREATE TABLE IF NOT EXISTS `escalas_voo` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `partida` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destino` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horario_partida` datetime NOT NULL,
  `horario_chegada` datetime NOT NULL,
  `id_voo` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_escalas_voo` (`id_voo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id` bigint UNSIGNED NOT NULL,
  `nib` varchar(21) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `hangares`
--

DROP TABLE IF EXISTS `hangares`;
CREATE TABLE IF NOT EXISTS `hangares` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designacao` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_venda`
--

DROP TABLE IF EXISTS `item_venda`;
CREATE TABLE IF NOT EXISTS `item_venda` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `passaporte` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_venda` bigint UNSIGNED NOT NULL,
  `id_classe` bigint UNSIGNED NOT NULL,
  `id_voo` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id_voo`,`passaporte`),
  KEY `id` (`id`),
  KEY `fk_item_vendas` (`id_venda`),
  KEY `fk_item_classe` (`id_classe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lugares`
--

DROP TABLE IF EXISTS `lugares`;
CREATE TABLE IF NOT EXISTS `lugares` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ocupacao` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_aviao` bigint UNSIGNED NOT NULL,
  `id_classe` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id_aviao`,`id_classe`),
  KEY `id` (`id`),
  KEY `fk_lugares_classe` (`id_classe`)
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
-- Estrutura da tabela `operacao_voo`
--

DROP TABLE IF EXISTS `operacao_voo`;
CREATE TABLE IF NOT EXISTS `operacao_voo` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `data_registo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_voo` bigint UNSIGNED NOT NULL,
  `id_operacao` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id_operacao`,`id_voo`),
  KEY `id` (`id`),
  KEY `fk_operacao_voo_1` (`id_voo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `operacoes`
--

DROP TABLE IF EXISTS `operacoes`;
CREATE TABLE IF NOT EXISTS `operacoes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designacao` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_registo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` enum('cancelado','concluido','planeada') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'planeada',
  `id_hangares` bigint UNSIGNED NOT NULL,
  `id_recurso` bigint UNSIGNED NOT NULL,
  `id_funcionario` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_operacoes_hangares` (`id_hangares`),
  KEY `fk_operacoes_recurso` (`id_recurso`),
  KEY `fk_operacoes_funcionario` (`id_funcionario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_recursos`
--

DROP TABLE IF EXISTS `pedido_recursos`;
CREATE TABLE IF NOT EXISTS `pedido_recursos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `quantidade` bigint NOT NULL,
  `data_registo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `custo_total` bigint NOT NULL,
  `id_recurso` bigint UNSIGNED NOT NULL,
  `id_funcionario` bigint UNSIGNED NOT NULL,
  `estado` enum('aprovado','pago','reprovado','devolvido','entregue','por aprovar') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'por aprovar',
  PRIMARY KEY (`id`),
  KEY `fk_pedido_recursos` (`id_recurso`),
  KEY `fk_pedido_funcionario` (`id_funcionario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pistas`
--

DROP TABLE IF EXISTS `pistas`;
CREATE TABLE IF NOT EXISTS `pistas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designacao` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comprimento` bigint NOT NULL,
  `largura` bigint NOT NULL,
  `estado` enum('danificada','operacional','manutencao') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'operacional',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `recursos`
--

DROP TABLE IF EXISTS `recursos`;
CREATE TABLE IF NOT EXISTS `recursos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stockatual` bigint NOT NULL,
  `id_categoria` bigint UNSIGNED NOT NULL,
  `id_unidade` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_recursos_unidade` (`id_unidade`),
  KEY `fk_recursos_categoria` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidades_medida`
--

DROP TABLE IF EXISTS `unidades_medida`;
CREATE TABLE IF NOT EXISTS `unidades_medida` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designacao` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'administrador', 'aVUK9dPTMvpy8uLhw4i0tnSH9woOej1d', '$2y$13$bbRRb/VVliZUBbs4EmXmPO1.YK9fM2CneYKdy02eAyppvyrC0ipKS', NULL, 'admin@admin.pt', 10, 1667834207, 1667834207, 'dumx5N1FRwmTbeINxA4TtxAvsh-lxnWH_1667834207'),
(2, 'funcionariomanutencao1', 'teJNxcluIWLF26olqj4PcaHK7dGBWK98', '$2y$13$PuyWNlWDae1CA8sC84iL2.nkcLzcjhGWrfynGgoOf.GJiasRkC5yO', NULL, '2211854@my.ipleiria.pt', 10, 1668380312, 1668380312, '-rlJPIrSTOmM1aj6wZo0t876olmwZy4H_1668380312'),
(3, 'gestorfinanceiro1', 'G9IV_vrd4HoedthC5MtyOk3M7-8htrmP', '$2y$13$m9HfspFYoQw6PVQGISsdjODGWgZxEmqfTVGoahdSphvSJurvH351W', NULL, 'gestorfinanceiro@gestores.pt', 10, 1668380450, 1668380450, '3DNmnQP9O_GGrLye7lyqpcTySAXlBO9W_1668380450'),
(5, 'cliente1', 'KaKekjEYs4he59dJQIC_wtdOk2jU4hmW', '$2y$13$lhekKfGMkTcJXDOalXB3ROlDsErQcChcUkc2lEZQhuoRPYhYxRvKm', NULL, 'cliente1@clientesbons.pt', 10, 1668380635, 1668380635, 'MxrURdoJqwvri6asAU6wdz5dGfKIhEU__1668380635');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

DROP TABLE IF EXISTS `utilizadores`;
CREATE TABLE IF NOT EXISTS `utilizadores` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `telemovel` int NOT NULL,
  `palavrapasse` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nif` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apelidos` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cartaocidadao` int NOT NULL,
  `id_user` int NOT NULL,
  `data_registo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_utilizadores_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

DROP TABLE IF EXISTS `vendas`;
CREATE TABLE IF NOT EXISTS `vendas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `estado` enum('cancelado','pago','carrinho') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'carrinho',
  `data_compra` datetime DEFAULT NULL,
  `data_registo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_cliente` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_vendas_cliente` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `voos`
--

DROP TABLE IF EXISTS `voos`;
CREATE TABLE IF NOT EXISTS `voos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `data_registo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` enum('atrasado','cancelado','concluido','planeado','circulacao') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'planeado',
  `id_aviao` bigint UNSIGNED NOT NULL,
  `id_pistas` bigint UNSIGNED NOT NULL,
  `id_funcionario` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_voos_aviao` (`id_aviao`),
  KEY `fk_voos_funcionario` (`id_funcionario`),
  KEY `fk_voos_pistas` (`id_pistas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_clientes_utilizadores` FOREIGN KEY (`id`) REFERENCES `utilizadores` (`id`);

--
-- Limitadores para a tabela `detalhes_voo`
--
ALTER TABLE `detalhes_voo`
  ADD CONSTRAINT `fk_detalhes_classe` FOREIGN KEY (`id_classe`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `fk_detalhes_voos` FOREIGN KEY (`id_voo`) REFERENCES `voos` (`id`);

--
-- Limitadores para a tabela `escalas_voo`
--
ALTER TABLE `escalas_voo`
  ADD CONSTRAINT `fk_escalas_voo` FOREIGN KEY (`id_voo`) REFERENCES `voos` (`id`);

--
-- Limitadores para a tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `fk_funcionarios_utilizadores` FOREIGN KEY (`id`) REFERENCES `utilizadores` (`id`);

--
-- Limitadores para a tabela `item_venda`
--
ALTER TABLE `item_venda`
  ADD CONSTRAINT `fk_item_classe` FOREIGN KEY (`id_classe`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `fk_item_vendas` FOREIGN KEY (`id_venda`) REFERENCES `vendas` (`id`),
  ADD CONSTRAINT `fk_item_voo` FOREIGN KEY (`id_voo`) REFERENCES `voos` (`id`);

--
-- Limitadores para a tabela `lugares`
--
ALTER TABLE `lugares`
  ADD CONSTRAINT `fk_lugares_aviao` FOREIGN KEY (`id_aviao`) REFERENCES `aviao` (`id`),
  ADD CONSTRAINT `fk_lugares_classe` FOREIGN KEY (`id_classe`) REFERENCES `classes` (`id`);

--
-- Limitadores para a tabela `operacao_voo`
--
ALTER TABLE `operacao_voo`
  ADD CONSTRAINT `fk_operacao_voo_1` FOREIGN KEY (`id_voo`) REFERENCES `voos` (`id`),
  ADD CONSTRAINT `fk_operacao_voo_2` FOREIGN KEY (`id_operacao`) REFERENCES `operacoes` (`id`);

--
-- Limitadores para a tabela `operacoes`
--
ALTER TABLE `operacoes`
  ADD CONSTRAINT `fk_operacoes_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionarios` (`id`),
  ADD CONSTRAINT `fk_operacoes_hangares` FOREIGN KEY (`id_hangares`) REFERENCES `hangares` (`id`),
  ADD CONSTRAINT `fk_operacoes_recurso` FOREIGN KEY (`id_recurso`) REFERENCES `recursos` (`id`);

--
-- Limitadores para a tabela `pedido_recursos`
--
ALTER TABLE `pedido_recursos`
  ADD CONSTRAINT `fk_pedido_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionarios` (`id`),
  ADD CONSTRAINT `fk_pedido_recursos` FOREIGN KEY (`id_recurso`) REFERENCES `recursos` (`id`);

--
-- Limitadores para a tabela `recursos`
--
ALTER TABLE `recursos`
  ADD CONSTRAINT `fk_recursos_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_recursos` (`id`),
  ADD CONSTRAINT `fk_recursos_unidade` FOREIGN KEY (`id_unidade`) REFERENCES `unidades_medida` (`id`);

--
-- Limitadores para a tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD CONSTRAINT `fk_utilizadores_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_vendas_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);

--
-- Limitadores para a tabela `voos`
--
ALTER TABLE `voos`
  ADD CONSTRAINT `fk_voos_aviao` FOREIGN KEY (`id_aviao`) REFERENCES `aviao` (`id`),
  ADD CONSTRAINT `fk_voos_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionarios` (`id`),
  ADD CONSTRAINT `fk_voos_pistas` FOREIGN KEY (`id_pistas`) REFERENCES `pistas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
