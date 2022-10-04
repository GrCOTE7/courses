<?php

$sqls = [
	'
  ALTER TABLE `agenda_user` ADD CONSTRAINT `agenda_user_fk0` FOREIGN KEY (`agenda_id`) REFERENCES `agendas`(`id`);

  ALTER TABLE `agenda_user` ADD CONSTRAINT `agenda_user_fk1` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);
  
  ALTER TABLE `agenda_event` ADD CONSTRAINT `agenda_event_fk0` FOREIGN KEY (`agenda_id`) REFERENCES `agendas`(`id`);
  
  ALTER TABLE `agenda_event` ADD CONSTRAINT `agenda_event_fk1` FOREIGN KEY (`event_id`) REFERENCES `events`(`id`);
  ',
];