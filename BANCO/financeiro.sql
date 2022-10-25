# Host: localhost  (Version 5.6.15)
# Date: 2022-10-21 13:50:42
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
# Structure for table "cat_produtos"
#

CREATE TABLE `cat_produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

#
# Data for table "cat_produtos"
#

INSERT INTO `cat_produtos` VALUES (1,'Sapatos'),(2,'Bermudas'),(3,'Calças'),(4,'Sungas'),(7,'Biquines'),(8,'Camisas'),(9,'Camisetas');

#
# Structure for table "clientes"
#

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `pessoa` varchar(15) NOT NULL,
  `doc` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `ativo` varchar(5) NOT NULL,
  `obs` varchar(100) DEFAULT NULL,
  `data` date NOT NULL,
  `banco` varchar(40) DEFAULT NULL,
  `agencia` varchar(10) DEFAULT NULL,
  `conta` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

#
# Data for table "clientes"
#

INSERT INTO `clientes` VALUES (1,'Diversos','Física','000.000.000-50','',NULL,'Sim',NULL,'2021-07-27',NULL,NULL,NULL,'cliente@cliente.com'),(2,'Marcos Freitas','Física','485.555.555-55','(59) 22522-2222','Rua C','Não','','2021-04-13','','','','marcos@hotmail.com'),(3,'Empresa A','Jurídica','44.455.555/5555-52','(55) 88888-8888','Rua D','Sim','Nenhuma','2021-04-13','Nubank','0125-7','55889-7','empresax@hotmail.com'),(5,'Marina Silva','Física','454.885.555-57','(58) 65555-5555','Rua C','Sim','Rua C','2021-04-19','','','','marina@hotmail.com'),(6,'Karolina Souza','Física','648.525.555-55','(54) 55555-55','Rua D','Sim','','2021-04-19','','','','karol@hotmail.com'),(7,'Empresa BC','Jurídica','55.415.555/5555-75','(84) 55555-5555','Rua D','Sim','','2021-04-19','','','','empresabc@hotmail.com'),(8,'Marlone Silva','Física','548.555.444-55','(64) 55555-5555','Rua D','Sim','','2021-04-19','','','','marlone'),(9,'Paula Silva','Física','488.555.565-10','(45) 55555-5555','Rua A','Sim','Nenhuma','2021-07-26','','','','paula@hotmail.com'),(11,'Amanda','Física','205.841.205-15','(31) 97527-5084','Rua S','Sim','','2021-07-26','','','','amanda@hotmail.com');

#
# Structure for table "contas_despesa"
#

CREATE TABLE `contas_despesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `data` date NOT NULL,
  `usuario` int(11) NOT NULL,
  `lancamento` varchar(50) NOT NULL,
  `documento` varchar(35) DEFAULT NULL,
  `plano_conta` varchar(50) DEFAULT NULL,
  `fornecedor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

#
# Data for table "contas_despesa"
#

INSERT INTO `contas_despesa` VALUES (11,'Paula Marta',700.00,'2021-04-22',1,'Caixa','Dinheiro','Aluguel - Despesa Pessoal',2),(12,'Matheus Silva',50.00,'2021-04-22',1,'Caixa','Boleto','Aluguel - Despesa Pessoal',3),(13,'Teste',49.00,'2021-04-26',1,'Caixa','Boleto','Aluguel - Despesa Pessoal',3),(14,'Paula Marta',50.00,'2021-04-26',1,'Bradesco','Boleto','Aluguel - Despesa Pessoal',2),(15,'Kamila Silva',200.00,'2021-04-26',1,'Caixa Econômica','Boleto','Aluguel - Despesa Pessoal',1),(16,'aaddfa',190.00,'2021-04-26',1,'Itaú','Boleto','Aluguel - Despesa Pessoal',1),(17,'Paula Marta',45.00,'2021-04-26',1,'Nubank','Boleto','Aluguel - Despesa Pessoal',2),(18,'Despesa Tesete',289.00,'2021-04-26',1,'Caixa','Dinheiro','Aluguel - Despesa Pessoal',1),(19,'Teste',300.00,'2021-04-26',1,'Santander','Boleto','Aluguel - Despesa Pessoal',2),(20,'Netflix',35.00,'2021-04-26',1,'Santander','Boleto','Aluguel - Despesa Pessoal',2),(21,'Matheus Silva',50.00,'2021-04-26',4,'Caixa','Boleto','Aluguel - Despesa Pessoal',3),(22,'asasdf',50.00,'2021-04-26',4,'Banco do Brasil','Boleto','Aluguel - Despesa Pessoal',3),(23,'asas',50.00,'2021-04-26',4,'Banco do Brasil','Boleto','Aluguel - Despesa Pessoal',2),(24,'asdsfa',40.00,'2021-04-26',4,'Banco do Brasil','Boleto','Aluguel - Despesa Pessoal',1),(25,'Matheus Silva',600.00,'2021-04-26',4,'Caixa','Boleto','Aluguel - Despesa Pessoal',3),(26,'Matheus Silva',60.00,'2021-04-26',4,'Caixa','Boleto','Aluguel - Despesa Pessoal',3),(27,'fadfas',60.00,'2021-04-26',4,'Caixa','Boleto','Aluguel - Despesa Pessoal',2),(28,'Matheus Silva',500.00,'2021-04-27',1,'Banco do Brasil','Boleto','Aluguel - Despesa Pessoal',3),(29,'Fármacia',250.00,'2021-04-27',1,'Caixa','Dinheiro','Compras - Despesa Pessoal',4),(30,'Fármacia',30.00,'2021-04-27',1,'Caixa','Boleto','Aluguel - Despesa Pessoal',4),(31,'Paula Marta',50.00,'2021-04-27',1,'Caixa','Boleto','Aluguel - Despesa Pessoal',2),(32,'Fármacia',50.00,'2021-04-27',1,'Caixa','Boleto','Aluguel - Despesa Pessoal',4),(33,'Teste',45.00,'2021-05-12',4,'Caixa','Boleto','Aluguel - Despesa Pessoal',0),(34,'Kamila Silva',60.00,'2021-05-12',1,'Caixa','Transferência','Água - Residência',6);

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

#
# Data for table "contas_pagar"
#

INSERT INTO `contas_pagar` VALUES (1,'Teste','Aluguel - Despesa Pessoal','2022-10-21','2022-10-21','Uma Vez',100.00,1,1,'Paga','2022-10-21',0.00,2.00,0.00,102.00,'2022-10-21','sem-foto.jpg',0,NULL),(2,'Testando','Aluguel - Despesa Pessoal','2022-10-21','2022-10-21','Uma Vez',200.00,1,1,'Paga','2022-10-21',0.00,0.00,0.00,200.00,'2022-10-21','sem-foto.jpg',0,NULL),(3,'Testando 2','Aluguel - Despesa Pessoal','2022-10-21','2022-10-21','Uma Vez',10.00,1,1,'Paga','2022-10-21',0.00,0.00,0.00,10.00,'2022-10-21','sem-foto.jpg',0,NULL),(4,'a','Aluguel - Despesa Pessoal','2022-10-21','2022-10-21','Uma Vez',100.00,1,1,'Paga','2022-10-21',0.00,0.00,0.00,100.00,'2022-10-21','sem-foto.jpg',0,NULL),(5,'adasd','Aluguel - Despesa Pessoal','2022-10-21','2022-10-21','Uma Vez',600.00,1,1,'Paga','2022-10-21',0.00,0.00,0.00,600.00,'2022-10-21','sem-foto.jpg',0,NULL),(6,'testando','Aluguel - Despesa Pessoal','2022-10-21','2022-10-21','Uma Vez',30.00,1,1,'Paga','2022-10-21',10.00,10.00,50.00,30.00,'2022-10-21','sem-foto.jpg',0,NULL),(7,'teste','Aluguel - Despesa Pessoal','2022-10-21','2022-10-21','Uma Vez',50.00,1,1,'Paga','2022-10-21',0.00,0.00,0.00,50.00,'2022-10-21','sem-foto.jpg',0,NULL),(8,'testando','Aluguel - Despesa Pessoal','2022-10-21','2022-10-21','Uma Vez',9500.00,1,1,'Paga','2022-10-21',0.00,0.00,0.00,9500.00,'2022-10-21','sem-foto.jpg',0,NULL),(9,'teste','Aluguel - Despesa Pessoal','2022-10-21','2022-10-21','Uma Vez',20.00,1,1,'Paga','2022-10-21',0.00,0.00,0.00,15.00,'2022-10-21','sem-foto.jpg',0,NULL),(10,'teste','Aluguel - Despesa Pessoal','2022-10-21','2022-10-21','Uma Vez',1000.00,1,1,'Paga','2022-10-21',0.00,0.00,0.00,900.00,'2022-10-21','sem-foto.jpg',0,NULL),(11,'teste','Aluguel - Despesa Pessoal','2022-10-21','2022-10-21','Uma Vez',1000.00,1,1,'Paga','2022-10-21',0.00,0.00,0.00,1000.00,'2022-10-21','sem-foto.jpg',0,NULL),(12,'teste','Aluguel - Despesa Pessoal','2022-10-21','2022-10-21','Uma Vez',8700.00,1,1,'Paga','2022-10-21',0.00,0.00,0.00,8700.00,'2022-10-21','sem-foto.jpg',0,NULL),(13,'teste','Aluguel - Despesa Pessoal','2022-10-21','2022-10-21','Uma Vez',1000.00,1,1,'Paga','2022-10-21',0.00,0.00,0.00,1000.00,'2022-10-21','sem-foto.jpg',0,NULL),(14,'aaa','Aluguel - Despesa Pessoal','2022-10-21','2022-10-21','Uma Vez',9500.00,1,1,'Paga','2022-10-21',0.00,0.00,0.00,9500.00,'2022-10-21','sem-foto.jpg',0,NULL),(15,'aaa','Aluguel - Despesa Pessoal','2022-10-21','2022-10-21','Uma Vez',97850.00,1,1,'Paga','2022-10-21',0.00,0.00,0.00,97850.00,'2022-10-21','sem-foto.jpg',0,NULL),(16,'aaaaaaaaaa','Aluguel - Despesa Pessoal','2022-10-21','2022-10-21','Uma Vez',19880.00,1,1,'Paga','2022-10-21',0.00,0.00,0.00,19880.00,'2022-10-21','sem-foto.jpg',0,NULL),(17,'asdas','Aluguel - Despesa Pessoal','2022-10-21','2022-10-21','Uma Vez',40.00,1,1,'Paga','2022-10-21',0.00,0.00,0.00,40.00,'2022-10-21','sem-foto.jpg',0,NULL),(18,'Amanha','Aluguel - Despesa Pessoal','2022-10-22','2022-10-22','Uma Vez',100.00,1,1,'Paga','2022-10-21',0.00,0.00,0.00,100.00,'2022-10-21','sem-foto.jpg',0,NULL),(19,'100','Aluguel - Despesa Pessoal','2022-10-21','2022-10-21','Uma Vez',100000.00,1,1,'Paga','2022-10-21',0.00,0.00,0.00,100000.00,'2022-10-21','sem-foto.jpg',0,NULL),(20,'fsdf','Aluguel - Despesa Pessoal','2022-10-21','2022-10-21','Uma Vez',9990.00,1,1,'Paga','2022-10-21',0.00,0.00,0.00,9990.00,'2022-10-21','sem-foto.jpg',0,NULL),(21,'100','Aluguel - Despesa Pessoal','2022-10-21','2022-10-21','Uma Vez',50.00,1,1,'Paga','2022-10-21',0.00,0.00,0.00,50.00,'2022-10-21','sem-foto.jpg',0,NULL);

#
# Structure for table "contas_receber"
#

CREATE TABLE `contas_receber` (
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

#
# Data for table "contas_receber"
#

INSERT INTO `contas_receber` VALUES (9,'Teste','Aluguel - Despesa Pessoal','2022-10-01','2022-10-01','Uma Vez',100.00,1,1,'Paga','2022-10-21',0.00,0.00,0.00,100.00,'2022-10-21','sem-foto.jpg',0,NULL),(10,'asdausdb','Aluguel - Despesa Pessoal','2022-10-21','2022-10-21','Uma Vez',2000.00,1,1,'Paga','2022-10-21',0.00,0.00,0.00,2000.00,'2022-10-21','sem-foto.jpg',0,NULL),(11,'Teste','Aluguel - Despesa Pessoal','2022-10-21','2022-10-21','Uma Vez',100.00,1,1,'Paga','2022-10-21',0.00,0.00,0.00,100.00,'2022-10-21','sem-foto.jpg',0,NULL);

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
# Structure for table "formas_pgtos"
#

CREATE TABLE `formas_pgtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "formas_pgtos"
#

INSERT INTO `formas_pgtos` VALUES (1,'Boleto'),(2,'Carnê'),(3,'Cartão de Débito'),(4,'Cartão de Crédito'),(5,'Cheque'),(6,'Dinheiro'),(7,'Transferência'),(8,'Pix');

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

INSERT INTO `pessoas` VALUES (1,'Weverton','O Brabo','111111111111',NULL,'','','','','','','',NULL,'993660697',NULL,'weverton@gmail.com',NULL,'','','2022-10-04',1,0,'N','2022-10-16 00:00:00'),(2,'Ezequiel Farias Evangelista','Ezequiel Farias Evangelista','12312444444','','','Piabetá','Magé','RJ','Fundos','230','25931-49',NULL,'21984184135','','ezequiel.fariasevangelista@gmail.com','ezequiel@gmail.com','21988888888','','2022-10-01',0,1,'S','2022-10-16 00:00:00'),(3,'Kaique Sousa','Kaique','11111111111',NULL,'Rua Paulo de Tarso','Piabetá','Magé','RJ','Fundos','230','25931498122',NULL,'21984184135',NULL,'shivsoraka@gmail.com',NULL,'','','2022-10-06',1,0,'N','2022-10-16 00:00:00'),(4,'teste','','','','','','','','','','',NULL,'','','','','','','2022-10-26',0,1,'N','2022-10-19 00:00:00'),(5,'Marlon','','',NULL,'','','','','','','',NULL,'',NULL,'',NULL,'','','2022-10-12',1,0,'S','2022-10-19 00:00:00'),(6,'Katiana Ananias','','','','','','','','','','',NULL,'','','','','','','2022-10-05',0,1,'S','2022-10-19 00:00:00'),(7,'Carlos Henrique','','','','','','','','','','',NULL,'','','','','','','2022-10-04',0,1,'N','2022-10-19 00:00:00'),(8,'Everton Molina','','1111111111111',NULL,'','','','RJ','','','',NULL,'',NULL,'',NULL,'','','2022-09-29',1,0,'S','2022-10-19 00:00:00'),(9,'Heverton','','',NULL,'','','','','','','',NULL,'',NULL,'',NULL,'','','2022-09-28',1,0,'S','2022-10-19 00:00:00');

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

INSERT INTO `usuarios` VALUES (1,'Kaique Sousa Farias','kaique.sousa@unigranrio.br','1','Administrador','S'),(2,'Karen Linda de Sousa Farias Evangelista','karen@gmail.com','1','Auxiliar','N'),(3,'Ezequiel Farias','ezequiel.fariasevangelista@gmail.com','1','Administrador','S');

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
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

#
# Data for table "valor_parcial"
#

INSERT INTO `valor_parcial` VALUES (46,3,'Pagar',20.00,'2022-10-21',1),(47,4,'Pagar',123041.00,'2022-10-21',1),(48,4,'Pagar',100.00,'2022-10-21',1),(49,5,'Pagar',1000.00,'2022-10-21',1),(50,5,'Pagar',100.00,'2022-10-21',1),(51,5,'Pagar',200.00,'2022-10-21',1),(52,5,'Pagar',100.00,'2022-10-21',1),(53,6,'Pagar',9970.00,'2022-10-21',1),(54,7,'Pagar',50.00,'2022-10-21',1),(55,8,'Pagar',500.00,'2022-10-21',1),(56,9,'Pagar',20.00,'2022-10-21',1),(57,9,'Pagar',20.00,'2022-10-21',1),(58,9,'Pagar',20.00,'2022-10-21',1),(59,9,'Pagar',20.00,'2022-10-21',1),(60,10,'Pagar',1000.00,'2022-10-21',1),(61,10,'Pagar',1000.00,'2022-10-21',1),(62,10,'Pagar',1000.00,'2022-10-21',1),(63,10,'Pagar',1000.00,'2022-10-21',1),(64,10,'Pagar',1000.00,'2022-10-21',1),(65,10,'Pagar',1000.00,'2022-10-21',1),(66,10,'Pagar',1000.00,'2022-10-21',1),(67,10,'Pagar',1000.00,'2022-10-21',1),(68,11,'Pagar',1000.00,'2022-10-21',1),(69,12,'Pagar',500.00,'2022-10-21',1),(70,12,'Pagar',800.00,'2022-10-21',1),(71,14,'Pagar',500.00,'2022-10-21',1),(72,15,'Pagar',50.00,'2022-10-21',1),(73,15,'Pagar',100.00,'2022-10-21',1),(74,15,'Pagar',2000.00,'2022-10-21',1),(75,16,'Pagar',120.00,'2022-10-21',1),(76,17,'Pagar',10.00,'2022-10-21',1),(77,17,'Pagar',20.00,'2022-10-21',1),(78,17,'Pagar',30.00,'2022-10-21',1),(79,20,'Pagar',10.00,'2022-10-21',1),(80,21,'Pagar',20.00,'2022-10-21',1),(81,21,'Pagar',30.00,'2022-10-21',1);
