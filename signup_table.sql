DROP TABLE IF EXISTS `signup_table`;
CREATE TABLE IF NOT EXISTS `signup_table`(
    `user_id` int NOT NULL AUTO_INCREMENT,
    `FirtsName` varchar(50) NOT NULL,
    `LastsName` varchar(50) NOT NULL,
    `MiddleNAme` varchar(50) NOT NULL,
    `Email` varchar(50) NOT NULL,
    `Password` varchar(20) NOT NULL,
    PRIMARY KEY (`user_id`),
     UNIQUE KEY `hey` (`FirtsName`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

