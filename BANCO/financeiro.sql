# Host: localhost  (Version 5.6.15)
# Date: 2022-10-25 17:05:41
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "cat_despesas"
#

CREATE TABLE `cat_despesas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "cat_despesas"
#

INSERT INTO `cat_despesas` VALUES (2,'Empresa'),(3,'Residência'),(6,'Despesa Pessoal');

#
# Structure for table "contas_pagar"
#

CREATE TABLE `contas_pagar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  `plano_conta` varchar(50) NOT NULL,
  `data_emissao` date NOT NULL,
  `vencimento` date NOT NULL,
  `frequencia` varchar(50) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `usuario_lanc` int(11) NOT NULL,
  `usuario_baixa` int(11) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `data_recor` date DEFAULT NULL,
  `juros` decimal(8,2) DEFAULT NULL,
  `multa` decimal(8,2) DEFAULT NULL,
  `desconto` decimal(8,2) DEFAULT NULL,
  `subtotal` decimal(8,2) DEFAULT NULL,
  `data_baixa` date DEFAULT NULL,
  `arquivo` varchar(150) DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  `usuario_deleta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

#
# Data for table "contas_pagar"
#

INSERT INTO `contas_pagar` VALUES (1,'Semana 1','Aluguel - Despesa Pessoal','2022-10-25','2022-10-25','Uma Vez',100.00,1,1,'Paga','2022-10-25',0.00,0.00,0.00,100.00,'2022-10-25','sem-foto.jpg',0,NULL),(2,'Teste','Aluguel - Despesa Pessoal','2022-10-25','2022-10-25','Uma Vez',100.00,1,NULL,'Pendente','2022-10-25',NULL,NULL,NULL,NULL,NULL,'sem-foto.jpg',0,NULL);

#
# Structure for table "contas_receber"
#

CREATE TABLE `contas_receber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  `id_aluno` int(11) DEFAULT '0',
  `id_patrocinador` int(11) DEFAULT '0',
  `data_emissao` date NOT NULL,
  `vencimento` date NOT NULL,
  `frequencia` varchar(50) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `usuario_lanc` int(11) NOT NULL,
  `usuario_baixa` int(11) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `data_recor` date DEFAULT NULL,
  `juros` decimal(8,2) DEFAULT NULL,
  `multa` decimal(8,2) DEFAULT NULL,
  `desconto` decimal(8,2) DEFAULT NULL,
  `subtotal` decimal(8,2) DEFAULT NULL,
  `data_baixa` date DEFAULT NULL,
  `arquivo` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "contas_receber"
#

INSERT INTO `contas_receber` VALUES (1,'Teste',8,7,'2022-10-25','2022-10-25','Uma Vez',200.00,1,NULL,'Pendente','2022-10-25',NULL,NULL,NULL,NULL,NULL,'sem-foto.jpg'),(2,'',8,0,'2022-10-25','2022-10-25','Uma Vez',200.00,1,NULL,'Pendente','2022-10-25',NULL,NULL,NULL,NULL,NULL,'sem-foto.jpg');

#
# Structure for table "despesas"
#

CREATE TABLE `despesas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cat_despesa` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

#
# Data for table "despesas"
#

INSERT INTO `despesas` VALUES (1,'Luz',2),(2,'Água',2),(3,'Telefone',2),(6,'Internet',3),(10,'Água',3),(12,'Aluguel',6),(13,'Compras',6),(14,'Supermercado',6),(15,'Outra',6),(16,'Viagem',6),(17,'Folha de Pagamento',2),(18,'Compra de Produtos',2);

#
# Structure for table "frequencias"
#

CREATE TABLE `frequencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `dias` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "frequencias"
#

INSERT INTO `frequencias` VALUES (1,'Uma Vez',0),(2,'Diária',1),(3,'Semanal',7),(4,'Mensal',30),(5,'Trimestral',90),(6,'Semestral',180),(7,'Anual',365);

#
# Structure for table "pessoas"
#

CREATE TABLE `pessoas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `nomeFantasia` varchar(255) DEFAULT NULL,
  `cpf` varchar(255) DEFAULT NULL,
  `cnpj` varchar(255) DEFAULT NULL,
  `logradouro` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `uf` char(2) NOT NULL DEFAULT 'RJ',
  `complemento` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `cep` varchar(255) DEFAULT NULL,
  `registroGeral` varchar(255) DEFAULT NULL,
  `celularPessoal` varchar(255) DEFAULT NULL,
  `celularComercial` varchar(255) DEFAULT NULL,
  `emailPessoal` varchar(255) DEFAULT NULL,
  `emailComercial` varchar(255) DEFAULT NULL,
  `contato` varchar(255) DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `dataNascimento` date DEFAULT NULL,
  `aluno` tinyint(1) NOT NULL DEFAULT '0',
  `patrocinador` tinyint(1) NOT NULL DEFAULT '0',
  `ativo` char(1) NOT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

#
# Data for table "pessoas"
#

INSERT INTO `pessoas` VALUES (1,'Weverton','O Brabo','111111111111',NULL,'','','','','','','',NULL,'993660697',NULL,'weverton@gmail.com',NULL,'','','2022-10-04',1,0,'N','2022-10-16 00:00:00'),(2,'Ezequiel Farias Evangelista','','12312444444','','','Piabetá','Magé','RJ','Fundos','230','25931-49',NULL,'21984184135','','ezequiel@gmail.com','','21988888888','','2022-10-01',0,1,'S','2022-10-24 00:00:00'),(3,'Kaique Sousa','Kaique','11111111111',NULL,'Rua Paulo de Tarso','Piabetá','Magé','RJ','Fundos','230','25931498122',NULL,'21984184135',NULL,'kaique.sousaf@gmail.com',NULL,'','','2022-10-06',1,0,'N','2022-10-21 00:00:00'),(4,'teste','','','','','','','','','','',NULL,'','','','','','','2022-10-26',0,1,'N','2022-10-19 00:00:00'),(5,'Marlon','','',NULL,'','','','','','','',NULL,'',NULL,'',NULL,'','','2022-10-12',1,0,'S','2022-10-19 00:00:00'),(6,'Katiana Ananias','','','','','','','','','','',NULL,'','','','','','','2022-10-05',0,1,'S','2022-10-19 00:00:00'),(7,'Carlos Henrique','','','','','','','','','','',NULL,'','','','','21984184135','','2022-10-04',0,1,'S','2022-10-25 00:00:00'),(8,'Everton Molina','','1111111111111',NULL,'','','','RJ','','','',NULL,'',NULL,'',NULL,'','','2022-09-29',1,0,'S','2022-10-19 00:00:00'),(9,'Heverton','','',NULL,'','','','','','','',NULL,'',NULL,'',NULL,'','','2022-09-28',1,0,'S','2022-10-19 00:00:00');

#
# Structure for table "usuarios"
#

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `perfil` varchar(20) NOT NULL,
  `ativo` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "usuarios"
#

INSERT INTO `usuarios` VALUES (1,'Kaique Sousa Farias','kaique.sousa@unigranrio.br','1','Administrador','S'),(2,'Karen Linda de Sousa Farias Evangelista','karen@gmail.com','1','Auxiliar','S'),(3,'Ezequiel Farias','ezequiel.fariasevangelista@gmail.com','1','Administrador','N');

#
# Structure for table "valor_parcial"
#

CREATE TABLE `valor_parcial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_conta` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `data` date NOT NULL,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

#
# Data for table "valor_parcial"
#

INSERT INTO `valor_parcial` VALUES (46,3,'Pagar',20.00,'2022-10-21',1),(47,4,'Pagar',123041.00,'2022-10-21',1),(48,4,'Pagar',100.00,'2022-10-21',1),(49,5,'Pagar',1000.00,'2022-10-21',1),(50,5,'Pagar',100.00,'2022-10-21',1),(51,5,'Pagar',200.00,'2022-10-21',1),(52,5,'Pagar',100.00,'2022-10-21',1),(53,6,'Pagar',9970.00,'2022-10-21',1),(54,7,'Pagar',50.00,'2022-10-21',1),(55,8,'Pagar',500.00,'2022-10-21',1),(56,9,'Pagar',20.00,'2022-10-21',1),(57,9,'Pagar',20.00,'2022-10-21',1),(58,9,'Pagar',20.00,'2022-10-21',1),(59,9,'Pagar',20.00,'2022-10-21',1),(60,10,'Pagar',1000.00,'2022-10-21',1),(61,10,'Pagar',1000.00,'2022-10-21',1),(62,10,'Pagar',1000.00,'2022-10-21',1),(63,10,'Pagar',1000.00,'2022-10-21',1),(64,10,'Pagar',1000.00,'2022-10-21',1),(65,10,'Pagar',1000.00,'2022-10-21',1),(66,10,'Pagar',1000.00,'2022-10-21',1),(67,10,'Pagar',1000.00,'2022-10-21',1),(68,11,'Pagar',1000.00,'2022-10-21',1),(69,12,'Pagar',500.00,'2022-10-21',1),(70,12,'Pagar',800.00,'2022-10-21',1),(71,14,'Pagar',500.00,'2022-10-21',1),(72,15,'Pagar',50.00,'2022-10-21',1),(73,15,'Pagar',100.00,'2022-10-21',1),(74,15,'Pagar',2000.00,'2022-10-21',1),(75,16,'Pagar',120.00,'2022-10-21',1),(76,17,'Pagar',10.00,'2022-10-21',1),(77,17,'Pagar',20.00,'2022-10-21',1),(78,17,'Pagar',30.00,'2022-10-21',1),(79,20,'Pagar',10.00,'2022-10-21',1),(80,21,'Pagar',20.00,'2022-10-21',1),(81,21,'Pagar',30.00,'2022-10-21',1);
