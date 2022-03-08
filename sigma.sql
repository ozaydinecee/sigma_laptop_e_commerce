# Host: localhost  (Version 5.5.5-10.4.20-MariaDB)
# Date: 2022-01-04 19:02:37
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "display"
#

DROP TABLE IF EXISTS `display`;
CREATE TABLE `display` (
  `displayID` int(11) NOT NULL AUTO_INCREMENT,
  `component_name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `manufacturerID` int(11) NOT NULL,
  `refresh_rate` varchar(50) NOT NULL,
  PRIMARY KEY (`displayID`),
  KEY `manufacturerID` (`manufacturerID`),
  CONSTRAINT `display_ibfk_1` FOREIGN KEY (`manufacturerID`) REFERENCES `manufacturer` (`manufacturerID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

#
# Data for table "display"
#

INSERT INTO `display` VALUES (1,'Samsung LTN173HL01-801',2100,50,4,'144'),(2,'Toshiba LT156EE11000',750,50,5,'60'),(3,'Samsung LTN156HL01-102',1000,25,4,'244');

#
# Structure for table "manufacturer"
#

DROP TABLE IF EXISTS `manufacturer`;
CREATE TABLE `manufacturer` (
  `manufacturerID` int(11) NOT NULL AUTO_INCREMENT,
  `manufacturer_name` varchar(50) NOT NULL,
  `manufacturer_address` varchar(100) NOT NULL,
  PRIMARY KEY (`manufacturerID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

#
# Data for table "manufacturer"
#

INSERT INTO `manufacturer` VALUES (1,'NVIDIA','2788 San Tomas Expy, Santa Clara, CA 95051, United States'),(2,'Intel','Intel Corporation 2200 Mission College Blvd. Santa Clara, CA 95052 USA'),(3,'AMD','2485 Augustine Drive Santa Clara, CA 95054 USA'),(4,'Samsung','3655 N 1st St, San Jose, CA 95134 USA'),(5,'Toshiba','1-1, Shibaura 1-chome, Minato-ku, Tokyo 105-8001, Japan'),(6,'Gigabyte','No.6, Baoqiang Rd., Xindian Dist., New Taipei City 231, Taiwan'),(7,'Kingston','17600 Newhope St Fountain Valley, CA USA'),(8,'Crucial','8000 S. Federal Way Boise, ID 83716 USA'),(9,'Apple','Apple Inc. One Apple Park Way Cupertino, CA 95014 USA'),(10,'Linux Foundation','548 Market St'),(11,'Microsoft','One Microsoft Way Redmond Washington 98052-6399 USA');

#
# Structure for table "gpu"
#

DROP TABLE IF EXISTS `gpu`;
CREATE TABLE `gpu` (
  `gpuID` int(11) NOT NULL AUTO_INCREMENT,
  `component_name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `manufacturerID` int(11) NOT NULL,
  `vram_size` varchar(50) NOT NULL,
  PRIMARY KEY (`gpuID`),
  KEY `manufacturerID` (`manufacturerID`),
  CONSTRAINT `gpu_ibfk_1` FOREIGN KEY (`manufacturerID`) REFERENCES `manufacturer` (`manufacturerID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

#
# Data for table "gpu"
#

INSERT INTO `gpu` VALUES (1,'ASUS GeForce GT1030 GDDR5 2GB 64Bit NVIDIA',1800,3,1,'2'),(2,'MSI GEFORCE GT 730 4GB DDR3 64Bit NVIDIA',1900,5,1,'4'),(3,'GIGABYTE RADEON RX 6700 XT GAMING OC 12GB GDDR6 19',2500,4,6,'12');

#
# Structure for table "cpu"
#

DROP TABLE IF EXISTS `cpu`;
CREATE TABLE `cpu` (
  `cpuID` int(11) NOT NULL AUTO_INCREMENT,
  `component_name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `manufacturerID` int(11) NOT NULL,
  `clock_speed` varchar(50) NOT NULL,
  PRIMARY KEY (`cpuID`),
  KEY `manufacturerID` (`manufacturerID`),
  CONSTRAINT `cpu_ibfk_1` FOREIGN KEY (`manufacturerID`) REFERENCES `manufacturer` (`manufacturerID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

#
# Data for table "cpu"
#

INSERT INTO `cpu` VALUES (1,'Intel Celeron G4900 3.1 GHz 2 MB 1151P Tray',450,5,2,'3.1'),(2,'AMD Ryzen 3 1200 3.1 GHz AM4 8 MB Cache 65 W',300,10,3,'3.1'),(3,'Intel Core i5-11400 2.6 GHz LGA1200 12 MB Cache 65',750,10,2,'2.6'),(4,'Intel Core i7 10750H 2.6GHz up to 5GHz 12MB',1200,8,2,'5');

#
# Structure for table "os"
#

DROP TABLE IF EXISTS `os`;
CREATE TABLE `os` (
  `osID` int(11) NOT NULL AUTO_INCREMENT,
  `component_name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `manufacturerID` int(11) NOT NULL,
  `version` varchar(50) NOT NULL,
  PRIMARY KEY (`osID`),
  KEY `manufacturerID` (`manufacturerID`),
  CONSTRAINT `os_ibfk_1` FOREIGN KEY (`manufacturerID`) REFERENCES `manufacturer` (`manufacturerID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

#
# Data for table "os"
#

INSERT INTO `os` VALUES (1,'Linux',0,100,10,'13.12.3'),(2,'Windows 10',400,100,11,'10'),(3,'Windows 11',950,75,11,'11'),(4,'MacOS',1350,50,9,'1.2.4');

#
# Structure for table "ram"
#

DROP TABLE IF EXISTS `ram`;
CREATE TABLE `ram` (
  `ramID` int(11) NOT NULL AUTO_INCREMENT,
  `component_name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `manufacturerID` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  PRIMARY KEY (`ramID`),
  KEY `manufacturerID` (`manufacturerID`),
  CONSTRAINT `ram_ibfk_1` FOREIGN KEY (`manufacturerID`) REFERENCES `manufacturer` (`manufacturerID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

#
# Data for table "ram"
#

INSERT INTO `ram` VALUES (1,'Kingston 8GB',350,5,7,'8'),(2,'Crucial Basics 16GB',450,15,8,'16'),(3,'Crucial Ballistix 16GB',500,8,8,'16'),(4,'Kingston 16GB',625,20,7,'16');

#
# Structure for table "storage"
#

DROP TABLE IF EXISTS `storage`;
CREATE TABLE `storage` (
  `storageID` int(11) NOT NULL AUTO_INCREMENT,
  `component_name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `manufacturerID` int(11) NOT NULL,
  `capacity` varchar(50) NOT NULL,
  PRIMARY KEY (`storageID`),
  KEY `manufacturerID` (`manufacturerID`),
  CONSTRAINT `storage_ibfk_1` FOREIGN KEY (`manufacturerID`) REFERENCES `manufacturer` (`manufacturerID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

#
# Data for table "storage"
#

INSERT INTO `storage` VALUES (1,'Crucial BX500',500,3,8,'500GB'),(2,'SAMSUNG 970 EVOPLUS 300GB',450,8,4,'300GB'),(3,'SAMSUNG 980 1TB',975,10,4,'1TB'),(4,'Crucial P2 250GB',350,5,8,'250GB'),(5,'SAMSUNG 980 PRO 1 TB',1350,4,4,'1TB');

#
# Structure for table "laptop"
#

DROP TABLE IF EXISTS `laptop`;
CREATE TABLE `laptop` (
  `laptopID` int(11) NOT NULL AUTO_INCREMENT,
  `is_pre_made` tinyint(1) NOT NULL,
  `gpuID` int(11) NOT NULL,
  `cpuID` int(11) NOT NULL,
  `ramID` int(11) NOT NULL,
  `storageID` int(11) NOT NULL,
  `displayID` int(11) NOT NULL,
  `osID` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `laptop_img1` varchar(255) DEFAULT NULL,
  `laptop_img2` varchar(255) DEFAULT NULL,
  `laptop_img3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`laptopID`),
  KEY `gpuID` (`gpuID`),
  KEY `cpuID` (`cpuID`),
  KEY `ramID` (`ramID`),
  KEY `storageID` (`storageID`),
  KEY `displayID` (`displayID`),
  KEY `osID` (`osID`),
  CONSTRAINT `laptop_ibfk_1` FOREIGN KEY (`gpuID`) REFERENCES `gpu` (`gpuID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `laptop_ibfk_2` FOREIGN KEY (`cpuID`) REFERENCES `cpu` (`cpuID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `laptop_ibfk_3` FOREIGN KEY (`ramID`) REFERENCES `ram` (`ramID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `laptop_ibfk_4` FOREIGN KEY (`storageID`) REFERENCES `storage` (`storageID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `laptop_ibfk_5` FOREIGN KEY (`displayID`) REFERENCES `display` (`displayID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `laptop_ibfk_6` FOREIGN KEY (`osID`) REFERENCES `os` (`osID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

#
# Data for table "laptop"
#

INSERT INTO `laptop` VALUES (1,1,1,1,1,1,1,1,'Lenovo IG 3','1.jpg','1_2.png','1_3.png'),(2,1,2,2,2,2,2,2,'Tracer 7T-144','2_1.png','2_2.png','2_3.png'),(3,1,3,3,3,3,3,3,'Slayer 5-3050Ti','3_1.png','3_2.png','3_3.png'),(4,1,2,3,4,3,2,1,'Hunter 5T-144','4_1.png','4_2.png','4_3.png'),(5,1,3,4,3,3,2,2,'Fenix 10TN-144','5_1.png','5_2.png','5_3.png'),(6,1,1,2,2,2,3,4,'X Æ A-Xii','6_1.png','6_2.png','6_3.png'),(7,0,3,4,4,5,1,4,NULL,NULL,NULL,NULL);

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `street_address` varchar(100) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'Admin','Nimda','admin@gmail.com','MEF University',1,'1234'),(2,'leonardo','picadrio','leo@gmail.com','hollywood',0,'1234');

#
# Structure for table "invoice"
#

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `orderID` int(11) NOT NULL AUTO_INCREMENT,
  `insurance_period` varchar(30) NOT NULL,
  `date` datetime DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  `laptopID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `cpu_price` float DEFAULT NULL,
  `gpu_price` float DEFAULT NULL,
  `ram_price` float DEFAULT NULL,
  `storage_price` float DEFAULT NULL,
  `display_price` float DEFAULT NULL,
  `os_price` float DEFAULT NULL,
  PRIMARY KEY (`orderID`),
  KEY `laptopID` (`laptopID`),
  KEY `userID` (`userID`),
  CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`laptopID`) REFERENCES `laptop` (`laptopID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

#
# Data for table "invoice"
#

INSERT INTO `invoice` VALUES (1,'1 year','2022-01-03 11:55:39',14125,7,1,1200,2500,625,1350,2100,1350),(2,'1 year','2022-01-03 11:56:48',10200,1,1,450,1800,350,500,2100,0);
