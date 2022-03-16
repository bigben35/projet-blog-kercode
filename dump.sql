CREATE TABLE `user_login` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`pseudo` varchar(100) NOT NULL,
	`mail` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `admin_login` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`firstname` varchar(255) NOT NULL,
	`mail` varchar(255) NOT NULL,
	`password` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Article` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`title` varchar(255) NOT NULL,
	`image` varchar(255) NOT NULL,
	`content` TEXT NOT NULL,
	`date` DATETIME NOT NULL,
	`id_User_login` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Category` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name_Cat` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Commentaire` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`content` TEXT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Presentation` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`image` varchar(255) NOT NULL,
	`content` TEXT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `user_comment` (
	`id_Commentaire` INT NOT NULL,
	`id_User_login` INT NOT NULL
);

CREATE TABLE `Slider` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`title` varchar(255) NOT NULL,
	`image` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Contacts` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`lastname` varchar(100) NOT NULL,
	`firstname` varchar(100) NOT NULL,
	`mail` varchar(255) NOT NULL,
	`phone` varchar(255) NOT NULL,
	`objet` TEXT NOT NULL,
	`msg` TEXT NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `Article` ADD CONSTRAINT `Article_fk0` FOREIGN KEY (`id_User_login`) REFERENCES `user_login`(`id`);

ALTER TABLE `user_comment` ADD CONSTRAINT `user_comment_fk0` FOREIGN KEY (`id_Commentaire`) REFERENCES `Commentaire`(`id`);

ALTER TABLE `user_comment` ADD CONSTRAINT `user_comment_fk1` FOREIGN KEY (`id_User_login`) REFERENCES `user_login`(`id`);










