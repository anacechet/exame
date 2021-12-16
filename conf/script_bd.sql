create schema atleta;

CREATE TABLE `salto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `nota1` double DEFAULT NULL,
  `nota2` double DEFAULT NULL,
  `nota3` double DEFAULT NULL,
  `nota4` double DEFAULT NULL,
  `nota5` double DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO `atleta`.`salto` (`nome`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `nascimento`) VALUES ('Antônio', '6.0', '8.5', '9.7', '4.2', '3.1', '1968-08-04');
INSERT INTO `atleta`.`salto` (`nome`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `nascimento`) VALUES ('Bernardo', '2.1', '7.5', '3.6', '8.0', '9.4', '2005-02-15');
INSERT INTO `atleta`.`salto` (`nome`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `nascimento`) VALUES ('Bento', '8.2', '3.4', '9.8', '9.5', '7.6', '1986-09-18');
INSERT INTO `atleta`.`salto` (`nome`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `nascimento`) VALUES ('Cristhian ', '7.6', '9.2', '5.4', '8.1', '9.3', '1985-12-14');
INSERT INTO `atleta`.`salto` (`nome`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `nascimento`) VALUES ('Carlos', '6.2', '9.3', '4.7', '5.8', '9.6', '2000-04-19');
INSERT INTO `atleta`.`salto` (`nome`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `nascimento`) VALUES ('Diogo', '9.2', '9.7', '5.1', '8.4', '6.3', '1988-10-29');
INSERT INTO `atleta`.`salto` (`nome`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `nascimento`) VALUES ('Eduardo', '2.5', '8.9', '9.3', '7.5', '6.7', '2005-02-23');