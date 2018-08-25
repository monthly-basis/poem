CREATE TABLE `poem` (
    `poem_id` int(10) unsigned auto_increment,
    `user_id` int(10) unsigned not null,
    `title` varchar(255) not null,
    `body` text,
    PRIMARY KEY (`poem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
