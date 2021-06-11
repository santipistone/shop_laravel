-- --------------------------------------------------------
-- Host:                         localhost
-- Versione server:              10.4.19-MariaDB - mariadb.org binary distribution
-- S.O. server:                  Win64
-- HeidiSQL Versione:            10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dump della struttura del database compito
CREATE DATABASE IF NOT EXISTS `compito` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `compito`;

-- Dump della struttura di tabella compito.dipendente
CREATE TABLE IF NOT EXISTS `dipendente` (
  `codice` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) DEFAULT NULL,
  `salario` int(11) DEFAULT NULL,
  `mansione` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`codice`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella compito.dipendente: ~6 rows (circa)
/*!40000 ALTER TABLE `dipendente` DISABLE KEYS */;
REPLACE INTO `dipendente` (`codice`, `nome`, `salario`, `mansione`) VALUES
	(1, 'Luca J', 8000, 'Cassa');
REPLACE INTO `dipendente` (`codice`, `nome`, `salario`, `mansione`) VALUES
	(2, 'Luca F', 8000, 'Rep. Donna');
REPLACE INTO `dipendente` (`codice`, `nome`, `salario`, `mansione`) VALUES
	(3, 'Francesco J', 8000, 'Cassa');
REPLACE INTO `dipendente` (`codice`, `nome`, `salario`, `mansione`) VALUES
	(4, 'Luigi K', 8000, 'Rep. Uomo');
REPLACE INTO `dipendente` (`codice`, `nome`, `salario`, `mansione`) VALUES
	(5, 'Francesco K', 8000, 'Cassa');
REPLACE INTO `dipendente` (`codice`, `nome`, `salario`, `mansione`) VALUES
	(25, 'Santi P', 300000, 'Proprietario');
/*!40000 ALTER TABLE `dipendente` ENABLE KEYS */;

-- Dump della struttura di tabella compito.lavora
CREATE TABLE IF NOT EXISTS `lavora` (
  `codice_n` int(11) NOT NULL,
  `codice_c` int(11) NOT NULL,
  `data_inizio` date NOT NULL,
  `data_fine` date DEFAULT NULL,
  `motivo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`codice_n`,`codice_c`),
  KEY `new_n` (`codice_n`),
  KEY `new_c` (`codice_c`),
  CONSTRAINT `lavora_ibfk_1` FOREIGN KEY (`codice_n`) REFERENCES `negozio` (`codice`),
  CONSTRAINT `lavora_ibfk_2` FOREIGN KEY (`codice_c`) REFERENCES `dipendente` (`codice`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella compito.lavora: ~5 rows (circa)
/*!40000 ALTER TABLE `lavora` DISABLE KEYS */;
REPLACE INTO `lavora` (`codice_n`, `codice_c`, `data_inizio`, `data_fine`, `motivo`) VALUES
	(1, 1, '2019-02-02', '2021-03-21', 'Furto');
REPLACE INTO `lavora` (`codice_n`, `codice_c`, `data_inizio`, `data_fine`, `motivo`) VALUES
	(1, 2, '0000-00-00', '0000-00-00', '');
REPLACE INTO `lavora` (`codice_n`, `codice_c`, `data_inizio`, `data_fine`, `motivo`) VALUES
	(1, 4, '2009-02-02', '0000-00-00', '');
REPLACE INTO `lavora` (`codice_n`, `codice_c`, `data_inizio`, `data_fine`, `motivo`) VALUES
	(1, 25, '2021-05-13', '0000-00-00', NULL);
REPLACE INTO `lavora` (`codice_n`, `codice_c`, `data_inizio`, `data_fine`, `motivo`) VALUES
	(2, 3, '2020-02-02', '0000-00-00', '');
/*!40000 ALTER TABLE `lavora` ENABLE KEYS */;

-- Dump della struttura di tabella compito.magazzino
CREATE TABLE IF NOT EXISTS `magazzino` (
  `sede` varchar(50) NOT NULL,
  `indirizzo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`sede`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella compito.magazzino: ~3 rows (circa)
/*!40000 ALTER TABLE `magazzino` DISABLE KEYS */;
REPLACE INTO `magazzino` (`sede`, `indirizzo`) VALUES
	('Catania', 'Via x');
REPLACE INTO `magazzino` (`sede`, `indirizzo`) VALUES
	('Napoli', 'Via Romagnosi');
REPLACE INTO `magazzino` (`sede`, `indirizzo`) VALUES
	('Roma', 'Via boschetto 30');
/*!40000 ALTER TABLE `magazzino` ENABLE KEYS */;

-- Dump della struttura di tabella compito.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dump dei dati della tabella compito.migrations: ~0 rows (circa)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dump della struttura di tabella compito.negozio
CREATE TABLE IF NOT EXISTS `negozio` (
  `codice` int(11) NOT NULL AUTO_INCREMENT,
  `codice_m` varchar(50) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `indirizzo` varchar(50) DEFAULT NULL,
  `fatturato` int(11) DEFAULT NULL,
  `n_commessi` int(11) DEFAULT 0,
  PRIMARY KEY (`codice`),
  KEY `new_m` (`codice_m`),
  CONSTRAINT `negozio_ibfk_1` FOREIGN KEY (`codice_m`) REFERENCES `magazzino` (`sede`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella compito.negozio: ~4 rows (circa)
/*!40000 ALTER TABLE `negozio` DISABLE KEYS */;
REPLACE INTO `negozio` (`codice`, `codice_m`, `nome`, `indirizzo`, `fatturato`, `n_commessi`) VALUES
	(1, 'Roma', 'Negozio 1', 'Via aaaaaa', 10000, 6);
REPLACE INTO `negozio` (`codice`, `codice_m`, `nome`, `indirizzo`, `fatturato`, `n_commessi`) VALUES
	(2, 'Roma', 'Negozio 2', 'Via bbbbbb', 15000, 1);
REPLACE INTO `negozio` (`codice`, `codice_m`, `nome`, `indirizzo`, `fatturato`, `n_commessi`) VALUES
	(3, 'Catania', 'Negozio 3', 'Via zzzzzz', 25000, 0);
REPLACE INTO `negozio` (`codice`, `codice_m`, `nome`, `indirizzo`, `fatturato`, `n_commessi`) VALUES
	(4, 'Napoli', 'Negozio 4', 'Ciao', 20, 7);
/*!40000 ALTER TABLE `negozio` ENABLE KEYS */;

-- Dump della struttura di tabella compito.orario
CREATE TABLE IF NOT EXISTS `orario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codice_c` int(11) NOT NULL,
  `codice_n` int(11) NOT NULL,
  `data` date NOT NULL,
  `o_inizio` time NOT NULL,
  `o_fine` time DEFAULT NULL,
  KEY `id` (`id`),
  KEY `FK__dipendente` (`codice_c`),
  KEY `FK__negozio` (`codice_n`),
  CONSTRAINT `FK__dipendente` FOREIGN KEY (`codice_c`) REFERENCES `dipendente` (`codice`),
  CONSTRAINT `FK__negozio` FOREIGN KEY (`codice_n`) REFERENCES `negozio` (`codice`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella compito.orario: ~15 rows (circa)
/*!40000 ALTER TABLE `orario` DISABLE KEYS */;
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(1, 25, 1, '2021-05-13', '15:29:38', '13:16:18');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(3, 1, 1, '2021-05-12', '16:27:20', '00:00:00');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(4, 1, 1, '2021-05-13', '16:27:35', '00:00:00');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(5, 25, 1, '2021-05-13', '16:29:02', '13:16:18');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(6, 25, 1, '2021-05-13', '16:31:41', '13:16:18');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(7, 25, 1, '2021-05-13', '16:34:39', '13:16:18');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(10, 25, 1, '2021-05-14', '12:42:43', '13:16:18');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(11, 25, 1, '2021-05-15', '17:08:21', '13:16:18');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(12, 25, 1, '2021-05-18', '15:27:09', '13:16:18');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(13, 25, 1, '2021-05-19', '11:33:53', '13:16:18');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(14, 25, 1, '2021-05-20', '15:51:44', '13:16:18');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(15, 25, 1, '2021-05-23', '15:31:06', '13:16:18');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(17, 25, 1, '2021-06-01', '11:54:03', '13:16:18');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(18, 25, 1, '2021-06-02', '11:30:55', '13:16:18');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(19, 25, 1, '2021-06-03', '11:05:50', '13:16:18');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(20, 25, 1, '2021-06-11', '13:16:16', '13:16:18');
/*!40000 ALTER TABLE `orario` ENABLE KEYS */;

-- Dump della struttura di tabella compito.ordini
CREATE TABLE IF NOT EXISTS `ordini` (
  `codice_neg` int(11) NOT NULL,
  `codice_prodotto` int(11) NOT NULL,
  `codice_cliente` int(11) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `data_` date DEFAULT NULL,
  `orario` time DEFAULT NULL,
  `indirizzo_sped` varchar(255) DEFAULT NULL,
  `cf` varchar(20) DEFAULT NULL,
  `spedito` tinyint(4) NOT NULL DEFAULT 0,
  KEY `new_c` (`codice_cliente`),
  KEY `new_p` (`codice_prodotto`),
  KEY `new_n` (`codice_neg`),
  CONSTRAINT `ordini_ibfk_1` FOREIGN KEY (`codice_prodotto`) REFERENCES `prodotto` (`codice`) ON DELETE CASCADE,
  CONSTRAINT `ordini_ibfk_2` FOREIGN KEY (`codice_cliente`) REFERENCES `users` (`id`),
  CONSTRAINT `ordini_ibfk_3` FOREIGN KEY (`codice_neg`) REFERENCES `negozio` (`codice`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella compito.ordini: ~16 rows (circa)
/*!40000 ALTER TABLE `ordini` DISABLE KEYS */;
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 2, 26, 1, '2021-05-13', '16:55:45', 'via boschetto 155', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 2, 25, 1, '2021-05-13', '17:04:10', 'via boschetto 155', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 5, 25, 1, '2021-05-13', '17:05:31', 'via boschetto 1', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 5, 25, 1, '2021-05-13', '17:07:30', 'via boschetto 155', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 5, 25, 1, '2021-05-13', '17:08:06', 'via boschetto 155', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 5, 26, 1, '2021-05-18', '15:06:00', 'via boschetto 155', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 2, 25, 1, '2021-05-20', '15:47:47', 'via boschetto 155', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 5, 25, 1, '2021-05-20', '15:50:32', 'via boschetto 155', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 2, 25, 1, '2021-05-30', '12:01:04', 'via boschetto 155', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 2, 25, 1, '2021-05-30', '12:02:44', 'via boschetto 155', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 2, 25, 1, '2021-05-30', '12:04:32', 'via boschetto 155', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 2, 25, 1, '2021-05-30', '12:04:42', 'via boschetto 155', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 5, 41, 1, '2021-06-09', '13:38:09', 'via boschetto 155', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 5, 41, 1, '2021-06-09', '13:39:08', 'via boschetto 155', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 5, 41, 5, '2021-06-09', '14:24:42', 'via boschetto 155', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(3, 53, 25, 1, '2021-06-10', '15:57:17', 'via boschetto 155', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 2, 41, 3, '2021-06-10', '16:02:16', 'via italia 99', 'stlsrs99m03i756u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 77, 25, 1, '2021-06-10', '16:23:17', 'via boschetto 155', 'pststp99m03i754u', 0);
/*!40000 ALTER TABLE `ordini` ENABLE KEYS */;

-- Dump della struttura di tabella compito.prodotto
CREATE TABLE IF NOT EXISTS `prodotto` (
  `codice` int(11) NOT NULL AUTO_INCREMENT,
  `codice_rep` int(11) NOT NULL,
  `image` varchar(300) NOT NULL DEFAULT '',
  `nome` varchar(50) NOT NULL DEFAULT '',
  `descrizione` varchar(300) DEFAULT NULL,
  `prezzo` float DEFAULT NULL,
  `stock` int(11) unsigned DEFAULT NULL,
  `codice_m` varchar(50) NOT NULL,
  `home` int(11) NOT NULL DEFAULT 0,
  `hidden` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`codice`),
  KEY `new_maga` (`codice_m`),
  CONSTRAINT `prodotto_ibfk_1` FOREIGN KEY (`codice_m`) REFERENCES `magazzino` (`sede`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella compito.prodotto: ~7 rows (circa)
/*!40000 ALTER TABLE `prodotto` DISABLE KEYS */;
REPLACE INTO `prodotto` (`codice`, `codice_rep`, `image`, `nome`, `descrizione`, `prezzo`, `stock`, `codice_m`, `home`, `hidden`) VALUES
	(2, 3, 'psp.png', 'PSP', 'Console portatile con carica batterie incluso', 220, 2, 'Roma', 1, 0);
REPLACE INTO `prodotto` (`codice`, `codice_rep`, `image`, `nome`, `descrizione`, `prezzo`, `stock`, `codice_m`, `home`, `hidden`) VALUES
	(4, 2, 'robot.png', 'Robot da cucina', 'Planetaria ', 1200, 0, 'Napoli', 1, 0);
REPLACE INTO `prodotto` (`codice`, `codice_rep`, `image`, `nome`, `descrizione`, `prezzo`, `stock`, `codice_m`, `home`, `hidden`) VALUES
	(5, 4, 'mac.png', 'MacBook Air', 'MacBook Air - 1TB SSD - 8GB RAM - Intel Core i7 3.7 GhZ', 1299, 8, 'Napoli', 1, 0);
REPLACE INTO `prodotto` (`codice`, `codice_rep`, `image`, `nome`, `descrizione`, `prezzo`, `stock`, `codice_m`, `home`, `hidden`) VALUES
	(53, 3, 'ps5.png', 'PS5', 'Console fissa', 500, 1, 'Catania', 1, 0);
REPLACE INTO `prodotto` (`codice`, `codice_rep`, `image`, `nome`, `descrizione`, `prezzo`, `stock`, `codice_m`, `home`, `hidden`) VALUES
	(74, 4, 'kisspng-macintosh-imac-g3-computer-monitor-white-imac-5a71a140aacd96.5533775715173962886996.png', 'iMac', 'Mac 2018 - 512GB SSD - 8GB RAM - Intel Core i5 3.1GhZ  ', 999, 4, 'Catania', 1, 0);
REPLACE INTO `prodotto` (`codice`, `codice_rep`, `image`, `nome`, `descrizione`, `prezzo`, `stock`, `codice_m`, `home`, `hidden`) VALUES
	(75, 1, ' ', 'prova', '1', 1, 1, 'Napoli', 1, 1);
REPLACE INTO `prodotto` (`codice`, `codice_rep`, `image`, `nome`, `descrizione`, `prezzo`, `stock`, `codice_m`, `home`, `hidden`) VALUES
	(76, 3, '[CITYPNG.COM]Full HD White Xbox Series S Console With Controller - 1862x2304.png', 'Xbox Series S', 'Console fissa, collegamento Wireless, alte prestazioni per gaming.', 249, 12, 'Roma', 1, 0);
REPLACE INTO `prodotto` (`codice`, `codice_rep`, `image`, `nome`, `descrizione`, `prezzo`, `stock`, `codice_m`, `home`, `hidden`) VALUES
	(77, 1, 'kisspng-iphone-x-iphone-8-apple-facetime-lte-iphone-10-5b10f37d2d2de0.3929770115278375651851.png', 'iPhone X', 'iPhone X - 128GB - Colore: Nero Satinato - Possibilità di effettuare un finanziamento', 299, 100, 'Napoli', 0, 0);
/*!40000 ALTER TABLE `prodotto` ENABLE KEYS */;

-- Dump della struttura di tabella compito.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `indirizzo` varchar(50) NOT NULL,
  `data` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella compito.users: ~8 rows (circa)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `nome`, `email`, `password`, `indirizzo`, `data`, `updated_at`, `created_at`) VALUES
	(1, 'Totti F.', 'abc@gmail.com', 'abc', 'Via casaldonato', NULL, NULL, NULL);
REPLACE INTO `users` (`id`, `nome`, `email`, `password`, `indirizzo`, `data`, `updated_at`, `created_at`) VALUES
	(25, 'santi pistone', 'santialissa@gmail.com', '$2y$10$xlrynOaA4IZvqs0fHI4LMOYI0MGPepzM.Jy9tDt7.8OKpV5TMfPAO', 'via boschetto 155', '0001-01-01', NULL, NULL);
REPLACE INTO `users` (`id`, `nome`, `email`, `password`, `indirizzo`, `data`, `updated_at`, `created_at`) VALUES
	(26, 'santi pistone', 'santipistone99@gmail.com', '$2y$10$BfztnkT0rfB8GL6Hi3ZO5.81tKQ76g9LFFztIq4vDtNcJcXbr4hym', 'via boschetto 155', '1992-02-01', NULL, NULL);
REPLACE INTO `users` (`id`, `nome`, `email`, `password`, `indirizzo`, `data`, `updated_at`, `created_at`) VALUES
	(36, 'a', 'santi1@gmail.com', '1', '', NULL, NULL, NULL);
REPLACE INTO `users` (`id`, `nome`, `email`, `password`, `indirizzo`, `data`, `updated_at`, `created_at`) VALUES
	(38, 'santi pistone', 'santialissa@gmail.it', '$2y$10$BfztnkT0rfB8GL6Hi3ZO5.81tKQ76g9LFFztIq4vDtNcJcXbr4hym', 'via boschetto 155', '0001-01-01', '2021-05-29 09:35:55', '2021-05-29 09:35:55');
REPLACE INTO `users` (`id`, `nome`, `email`, `password`, `indirizzo`, `data`, `updated_at`, `created_at`) VALUES
	(39, 'luca prova', 'prova123@gmail.com', '$10$xlrynOaA4IZvqs0fHI4LMOYI0MGPepzM.Jy9tDt7.8OKpV5TMfPAO', 'via boschetto 155', '1999-12-01', '2021-05-31 09:12:49', '2021-05-31 09:12:49');
REPLACE INTO `users` (`id`, `nome`, `email`, `password`, `indirizzo`, `data`, `updated_at`, `created_at`) VALUES
	(40, 'luca prova 2', 'prova124@gmail.com', '$2y$10$TqebUWljpe60ysKucOnDqu4DJo7LShE2ImGPJjbZ7Nj972WWknB3a', 'via boschetto 155', '1992-01-01', '2021-05-31 09:16:54', '2021-05-31 09:16:54');
REPLACE INTO `users` (`id`, `nome`, `email`, `password`, `indirizzo`, `data`, `updated_at`, `created_at`) VALUES
	(41, 'luca toni', 'prova123@libero.it', '$2y$10$TIJOTG8y7AB/jl76RayoPOjs/Wv.MYmqrxXBTqyRP3oVE0RieF4Vm', 'via boschetto 155', '1992-12-01', '2021-06-09 11:21:10', '2021-06-09 11:21:10');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dump della struttura di trigger compito.max_num_commessi
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `max_num_commessi` AFTER INSERT ON `lavora` FOR EACH ROW if EXISTS(SELECT * FROM negozio WHERE negozio.codice = NEW.codice_n AND  negozio.n_commessi = 10)
then
	SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Massimo numero di commessi raggiunto!';
END if//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dump della struttura di trigger compito.new_commesso
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `new_commesso` 
AFTER INSERT ON `lavora` 
FOR EACH ROW 
if EXISTS(SELECT negozio.nome from negozio WHERE negozio.codice = NEW.codice_n)
then
	UPDATE negozio SET 
	negozio.n_commessi = negozio.n_commessi +1 WHERE negozio.codice = NEW.codice_n;
END if//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
