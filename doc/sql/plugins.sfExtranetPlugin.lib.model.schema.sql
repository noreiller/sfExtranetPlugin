
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- sf_extranet_item
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_extranet_item`;

CREATE TABLE `sf_extranet_item`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`type` VARCHAR(255),
	`category` VARCHAR(255),
	`title` VARCHAR(255),
	`description` TEXT,
	`file` VARCHAR(255),
	`is_published` TINYINT(1) DEFAULT 1,
	`date` DATETIME,
	`created_by` INTEGER,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `sf_extranet_item_FI_1` (`created_by`),
	CONSTRAINT `sf_extranet_item_FK_1`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE SET NULL
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
