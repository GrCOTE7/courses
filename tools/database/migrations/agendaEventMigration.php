<?php

$sqls = [
  'DROP TABLE IF EXISTS agenda_event;',
  
	"CREATE TABLE `agenda_event` (
    `agenda_id` INT(11) NOT NULL,
    `event_id` INT(11) NOT NULL
  ) COLLATE='utf8_general_ci' ENGINE = InnoDB;",
];