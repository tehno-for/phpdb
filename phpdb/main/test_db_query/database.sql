USE `database`;

DROP TABLE IF EXISTS `Members`;
CREATE TABLE `Members` (
  `member_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
);
INSERT INTO `Members` VALUES (1,'Erich Gamma','test5@test.ru','5');
INSERT INTO `Members` VALUES (2,'Richard Helm','test10@test.ru','10');
INSERT INTO `Members` VALUES (3,'Ralph Johnson','test15@test.ru','15');
INSERT INTO `Members` VALUES (4,'John Vlissides','test20@test.ru','20');
INSERT INTO `Members` VALUES (5,'Pepe Marin','test25@test.ru','25');