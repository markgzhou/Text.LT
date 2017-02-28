CREATE TABLE IF NOT EXISTS `notes` (
	`noteID` INT  NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`noteContent` MEDIUMTEXT NULL,
	`updateDate` DATETIME NOT NULL,
	`userID` BIGINT NOT NULL DEFAULT '0',
	`ip` VARCHAR(16) NOT NULL DEFAULT '0',
	`email` VARCHAR(64) NOT NULL DEFAULT '0'
)
COLLATE='utf32_unicode_ci'
ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS `logs` (
  `logID` int(11) NOT NULL AUTO_INCREMENT,
  `loginDate` datetime NOT NULL,
  `userID` varchar(64) DEFAULT '0',
  `emailAddr` varchar(64) DEFAULT NULL,
  `ip` varchar(16) NOT NULL DEFAULT '0',
  PRIMARY KEY (`logID`),
  KEY `noteID` (`logID`)
) ENGINE=MyISAM;
