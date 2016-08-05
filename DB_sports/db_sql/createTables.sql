-- CREATE TABLES

-- Derek Walker
-- Matthew Wirtz
-- Jason Kaine
-- Brett Gaglione

CREATE TABLE IF NOT EXISTS `useraccount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;


CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `imgPath` varchar(50) NOT NULL,
  `keywords` varchar(255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `shoppingcart` (
  `userId` int(11) NOT NULL,
  `prodId` int(11) NOT NULL,
  `prodCount` int(11) NOT NULL,
  PRIMARY KEY (`userId`,`prodId`),
  FOREIGN KEY (`userId`) REFERENCES `useraccount`(`id`),
  FOREIGN KEY (`prodId`) REFERENCES `product`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `orderhistory` (
  `id` int(11) NOT NULL,
  `prodId` int(11) NOT NULL,
  `prodCount` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `shippingStaus` int(11) NOT NULL,
  `trackingNumber` int (11) NOT NULL,
  PRIMARY KEY (`id`,`prodId`),
  FOREIGN KEY (`prodId`) REFERENCES `product`(`id`),
  FOREIGN KEY (`userId`) REFERENCES `useraccount`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `inventory` (
  `tagNumber` int(11) NOT NULL AUTO_INCREMENT,
  `prodId` int(11) NOT NULL,
  `location` char(15) NOT NULL,
  `lastScanned` date NOT NULL,
  PRIMARY KEY (`tagNumber`),
  FOREIGN KEY (`prodId`) REFERENCES `product`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

