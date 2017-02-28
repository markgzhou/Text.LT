CREATE TABLE `notes` (
	`noteID` INT  NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`noteContent` MEDIUMTEXT NULL,
	`updateDate` DATETIME NOT NULL,
	`userID` BIGINT NOT NULL DEFAULT '0',
	`ip` VARCHAR(16) NOT NULL DEFAULT '0',
	`email` VARCHAR(64) NOT NULL DEFAULT '0'
)
COLLATE='utf32_unicode_ci'
ENGINE=MyISAM;
