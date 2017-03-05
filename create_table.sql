-- --------------------------------------------------------
-- Host:                         a2plcpnl0564.prod.iad2.secureserver.net
-- Server version:               5.5.52-cll-lve - MySQL Community Server (GPL)
-- Server OS:                    Linux
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table gterm_text_lt.logs
CREATE TABLE IF NOT EXISTS `logs` (
  `logID` int(11) NOT NULL AUTO_INCREMENT,
  `loginDate` datetime NOT NULL,
  `userID` varchar(64) COLLATE utf8_unicode_ci DEFAULT '0',
  `emailAddr` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`logID`),
  KEY `noteID` (`logID`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
-- Dumping structure for table gterm_text_lt.notes
CREATE TABLE IF NOT EXISTS `notes` (
  `noteID` int(11) NOT NULL AUTO_INCREMENT,
  `noteContent` mediumtext COLLATE utf8_unicode_ci,
  `updateDate` datetime NOT NULL,
  `userID` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`noteID`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
-- Dumping structure for table gterm_text_lt.user
CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `googleUserID` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `layout` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `emailAddr` varchar(64) COLLATE utf8_unicode_ci DEFAULT '0',
  `ip` varchar(64) COLLATE utf8_unicode_ci DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
