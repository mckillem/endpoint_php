CREATE TABLE `order`
(
    `id`       INT(11)      NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `createdAt` date NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `price` smallint(5) NOT NULL,
    `currency` VARCHAR(128) NOT NULL,
    `state` VARCHAR(255) NOT NULL
) ENGINE = InnoDB
  CHARSET = utf8;

INSERT INTO `order` (`id`, `createdAt`, `title`, `price`, `currency`, `state`)
VALUES (1, '2024-02-28 12:43:15', 'Název objednávky', 1800, 'Kč', 'Hotovo');

CREATE TABLE `item`
(
       `id` int(11) NOT NULL AUTO_INCREMENT,
       `title` varchar(255) NOT NULL,
       `price` smallint(5) NOT NULL,
       PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

INSERT INTO `item` (`id`, `title`, `price`)
VALUES (1,	'stůl', 500),
       (2,	'židle', 300),
       (3,	'skříň', 1000);

CREATE TABLE `order_item`
(
        `id` int(11) NOT NULL AUTO_INCREMENT,
         `order_id` int(11) NOT NULL,
         `item_id` int(11) NOT NULL,
         PRIMARY KEY (`id`),
         KEY `order_id` (`order_id`),
         KEY `item_id` (`item_id`),
         CONSTRAINT `order_item_ibfk_11` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
         CONSTRAINT `order_item_ibfk_10` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

INSERT INTO `order_item` (`id`, `order_id`, `item_id`)
VALUES (1,	1,	1),
       (2,	1,	2),
       (3,	1,	3);
