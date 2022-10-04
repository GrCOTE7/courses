<?php

$sqls = [
	
	'DROP TABLE IF EXISTS events;',

	"CREATE TABLE `events` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `agenda_id` INT(11) NOT NULL,
    `author_id` INT(11) NOT NULL,
    `title` varchar(255) NOT NULL,
    `description` TEXT NOT NULL,
    `is_private` BOOLEAN NOT NULL DEFAULT true,
    `start_date` DATETIME NOT NULL,
    `end_date` DATETIME,
    PRIMARY KEY (`id`)
    ) COLLATE='utf8_general_ci' ENGINE = InnoDB;
  "

];