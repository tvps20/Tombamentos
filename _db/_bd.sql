-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.14 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para bancodearquivos1
CREATE DATABASE IF NOT EXISTS `bancodearquivos1` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bancodearquivos1`;

-- Copiando estrutura para tabela bancodearquivos1.cadastro_documento
CREATE TABLE IF NOT EXISTS `cadastro_documento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  `descricao` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` date DEFAULT NULL,
  `endereco` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bancodearquivos1.cadastro_documento: 2 rows
/*!40000 ALTER TABLE `cadastro_documento` DISABLE KEYS */;
INSERT INTO `cadastro_documento` (`id`, `nome`, `codigo`, `descricao`, `data`, `endereco`) VALUES
	(59, '1510348827.pdf', 123546878, NULL, NULL, NULL),
	(60, '1510348875.pdf', 1510348875, NULL, NULL, NULL);
/*!40000 ALTER TABLE `cadastro_documento` ENABLE KEYS */;

-- Copiando estrutura para tabela bancodearquivos1.cadastro_usuario
CREATE TABLE IF NOT EXISTS `cadastro_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` date DEFAULT NULL,
  `senha` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('ADMIN','USUARIO','DESATIVADO') DEFAULT 'USUARIO',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=130 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bancodearquivos1.cadastro_usuario: 1 rows
/*!40000 ALTER TABLE `cadastro_usuario` DISABLE KEYS */;
INSERT INTO `cadastro_usuario` (`id`, `nome`, `usuario`, `data`, `senha`, `status`) VALUES
	(129, 'thiago', 'tvps', NULL, '$1$q5/.rb2.$r8kACj9ifeejDlJpP0g1C.', 'ADMIN');
/*!40000 ALTER TABLE `cadastro_usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
