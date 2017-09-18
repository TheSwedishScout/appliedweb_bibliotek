CREATE TABLE `books` (
	`isbn` varchar(255) NOT NULL,
	`title` varchar(255) NOT NULL,
	`ingress` TEXT NOT NULL,
	`pages` numeric(5) NOT NULL,
	`edition` numeric(5) NOT NULL,
	`publiched` numeric(5) NOT NULL,
	`publicher` varchar(255) NOT NULL,
	`numberofbooks` int NOT NULL,
	`isout` int NOT NULL,
	`image` varchar(255),
	PRIMARY KEY (`isbn`)
);

CREATE TABLE `author` (
	`id` int NOT NULL AUTO_INCREMENT,
	`first-name` varchar(255) NOT NULL,
	`last-name` varchar(255) NOT NULL,
	`ssn` varchar(255),
	`birthyear` varchar(255),
	`author-page` varchar(255),
	PRIMARY KEY (`id`)
);

CREATE TABLE `authorbookconnect` (
	`id` int NOT NULL AUTO_INCREMENT,
	`book` varchar(255) NOT NULL,
	`author` int NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `user` (
	`ssn` INT NOT NULL,
	`name` varchar(255) NOT NULL,
	`username` varchar(255) NOT NULL UNIQUE,
	`password` varchar(255) NOT NULL,
	`user-lvl` int(3) NOT NULL,
	PRIMARY KEY (`ssn`)
);

CREATE TABLE `loand` (
	`id` int NOT NULL AUTO_INCREMENT,
	`user` INT NOT NULL,
	`book` varchar(255) NOT NULL,
	`out-date` DATE NOT NULL,
	`in-date` DATE,
	PRIMARY KEY (`id`)
);

CREATE TABLE `reviews` (
	`id` int NOT NULL AUTO_INCREMENT,
	`user` INT NOT NULL,
	`book` varchar(255) NOT NULL,
	`review` TEXT NOT NULL,
	`stars` double NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `authorbookconnect` ADD CONSTRAINT `authorbookconnect_fk0` FOREIGN KEY (`book`) REFERENCES `books`(`isbn`);

ALTER TABLE `authorbookconnect` ADD CONSTRAINT `authorbookconnect_fk1` FOREIGN KEY (`author`) REFERENCES `author`(`id`);

ALTER TABLE `loand` ADD CONSTRAINT `loand_fk0` FOREIGN KEY (`user`) REFERENCES `user`(`ssn`);

ALTER TABLE `loand` ADD CONSTRAINT `loand_fk1` FOREIGN KEY (`book`) REFERENCES `books`(`isbn`);

ALTER TABLE `reviews` ADD CONSTRAINT `reviews_fk0` FOREIGN KEY (`user`) REFERENCES `user`(`ssn`);

ALTER TABLE `reviews` ADD CONSTRAINT `reviews_fk1` FOREIGN KEY (`book`) REFERENCES `books`(`isbn`);
