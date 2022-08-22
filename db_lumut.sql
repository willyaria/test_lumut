/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.24-MariaDB : Database - lumut
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `account` */

DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`username`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `account` */

insert  into `account`(`id`,`username`,`password`,`name`,`role`,`updated_at`) values (1,'bagong','$2y$10$2oDi.oqWi3bU7TArwNJ5guFjrTmgwiLTUHJxOYIgIaxJC9iyTvhSi','gareng','programmer',NULL),(4,'Paido','$2y$10$vFvucDWIj/m.IQieRv97TeJap1/ZjeXycTH.088emp19sm8HESO/e','Paidi','Sales',NULL),(3,'puntadewa','$2y$10$gj0V4wAd0yPtADqgu/dowOzqSmjtcuy7tsFAplCa666Q7I8Kg4C9W','werkudoro','HRD',NULL),(2,'semar','$2y$10$qN0Ae3ZHzFj2BShbX.8E6e4P/XMubJp6JY0hnybNLtAi6EjtN4dsW','semar mendem','Marketing',NULL);

/*Table structure for table `account_password` */

DROP TABLE IF EXISTS `account_password`;

CREATE TABLE `account_password` (
  `id` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(45) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `fk_post_account_idx` (`username`),
  CONSTRAINT `account_password_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `account_password` */

insert  into `account_password`(`id`,`password`,`username`) values (1,'123456','bagong'),(4,'123456','Paido'),(3,'123456','puntadewa'),(2,'123456','semar');

/*Table structure for table `post` */

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (
  `idpost` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `username` varchar(45) NOT NULL,
  PRIMARY KEY (`idpost`),
  KEY `fk_post_account_idx` (`username`),
  CONSTRAINT `fk_post_account` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `post` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
