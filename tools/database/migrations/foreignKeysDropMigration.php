<?php

$sqls = [
	'
  ALTER TABLE `agenda_user` DROP FOREIGN KEY IF EXISTS `agenda_user_fk0`;

  ALTER TABLE `agenda_user` DROP FOREIGN KEY IF EXISTS `agenda_user_fk1`;
  
  ALTER TABLE `agenda_event` DROP FOREIGN KEY IF EXISTS `agenda_event_fk0`;
  
  ALTER TABLE `agenda_event` DROP FOREIGN KEY IF EXISTS `agenda_event_fk1`;
  ',
];