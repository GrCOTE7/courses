<?php

$sqls = [
	'DROP TABLE IF EXISTS agenda_user;',

	"CREATE TABLE `agenda_user` (
    `user_id` INT(11) NOT NULL,
    `agenda_id` INT(11) NOT NULL
  ) COLLATE='utf8_general_ci' ENGINE = InnoDB;",
];