CREATE TABLE `users` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`is_admin` BOOLEAN NOT NULL,
	`name` varchar(255) NOT NULL UNIQUE,
	`password` varchar(255) NOT NULL,
	`organization_id` INT(11) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `organization` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `courses` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`category` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `course_user` (
	`course_id` INT(11) NOT NULL,
	`user_id` INT(11) NOT NULL
	PRIMARY KEY(course_id, user_id)
);

CREATE TABLE `course_organization` (
	`course_id` INT(11) NOT NULL,
	`organisation_id` INT(11) NOT NULL
	PRIMARY KEY(course_id, organisation_id)
);

ALTER TABLE `users` ADD CONSTRAINT `users_fk0` FOREIGN KEY (`organization_id`) REFERENCES `organization`(`id`);

ALTER TABLE `course_user` ADD CONSTRAINT `course_user_fk0` FOREIGN KEY (`course_id`) REFERENCES `courses`(`id`);

ALTER TABLE `course_user` ADD CONSTRAINT `course_user_fk1` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

ALTER TABLE `course_organization` ADD CONSTRAINT `course_organization_fk0` FOREIGN KEY (`course_id`) REFERENCES `courses`(`id`);

ALTER TABLE `course_organization` ADD CONSTRAINT `course_organization_fk1` FOREIGN KEY (`organisation_id`) REFERENCES `organization`(`id`);






