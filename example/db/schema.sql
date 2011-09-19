CREATE TABLE `users` (
  `id`      int(11) unsigned NOT NULL AUTO_INCREMENT,
  `oahu_id` varchar(255) DEFAULT NULL,
  `name`    varchar(255) DEFAULT NULL,
  `email`   varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;