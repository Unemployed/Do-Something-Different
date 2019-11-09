CREATE TABLE `tasks` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `date` date NOT NULL,
 `task` text NOT NULL,
 `num_completed` int(11) NOT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `date` (`date`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1