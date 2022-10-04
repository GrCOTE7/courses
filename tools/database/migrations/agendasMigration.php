<?php

$sqls = [
	'DROP TABLE IF EXISTS agendas;',

	"CREATE TABLE `agendas` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `is_private` BOOLEAN NOT NULL DEFAULT '1',
    `owner` INT(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) COLLATE = 'utf8_general_ci' ENGINE = InnoDB;",
];