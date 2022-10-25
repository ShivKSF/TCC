<?php 
require_once("../../conexao.php");
require_once("campos.php");

$cp1 = $_POST[$campo1];
$cp2 = $_POST[$campo2];
$cp3 = $_POST[$campo3];
$cp4 = $_POST[$campo4];
$cp5 = $_POST[$campo5];
$cp6 = $_POST[$campo6];
$cp7 = $_POST[$campo7];
$cp8 = $_POST[$campo8];
$cp9 = $_POST[$campo9];
$cp10 = $_POST[$campo10];
$cp11 = $_POST[$campo11];

$cp13 = $_POST[$campo13];
$cp14 = $_POST[$campo14];
$cp15 = $_POST[$campo15];
$cp16 = $_POST[$campo16];
$cp17 = $_POST[$campo17];
$cp18 = $_POST[$campo18];
$cp19 = $_POST[$campo19];
$cp20 = $_POST[$campo20];

$id = @$_POST['id'];

//VALIDAR CAMPO
$query = $pdo->query("SELECT * FROM $tabela WHERE cpf = '$cp3' AND cpf != NULL ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
$id_reg = @$res[0]['id'];
if($total_reg > 0 and $id_reg != $id){
	echo 'Este CPF já está cadastrado!!';
	exit();
}

//VALIDAR CAMPO
$query = $pdo->query("SELECT * FROM $tabela WHERE cnpj = '$cp4' AND cnpj != NULL ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
$id_reg = @$res[0]['id'];
if($total_reg > 0 and $id_reg != $id){
	echo 'Este CNPJ já está cadastrado!!';
	exit();
}


if($id == ""){
	$query = $pdo->prepare("INSERT INTO $tabela SET nome = :campo1, nomeFantasia = :campo2, cpf = :campo3, cnpj = :campo4, logradouro = :campo5, bairro = :campo6, cidade = :campo7, uf = :campo8, complemento = :campo9, numero = :campo10, cep = :campo11, celularPessoal = :campo13, celularComercial = :campo14, emailPessoal = :campo15, emailComercial = :campo16, contato = :campo17, observacao = :campo18, dataNascimento = :campo19, ativo = :campo20, dataCadastro = curDate(), patrocinador = 1");
}else{
	$query = $pdo->prepare("UPDATE $tabela SET nome = :campo1, nomeFantasia = :campo2, cpf = :campo3, cnpj = :campo4, logradouro = :campo5, bairro = :campo6, cidade = :campo7, uf = :campo8, complemento = :campo9, numero = :campo10, cep = :campo11, celularPessoal = :campo13, celularComercial = :campo14, emailPessoal = :campo15, emailComercial = :campo16, contato = :campo17, observacao = :campo18, dataNascimento = :campo19, ativo = :campo20, dataCadastro = curDate(), patrocinador = 1 WHERE id = '$id'");
}

$query->bindValue(":campo1", "$cp1");
$query->bindValue(":campo2", "$cp2");
$query->bindValue(":campo3", "$cp3");
$query->bindValue(":campo4", "$cp4");
$query->bindValue(":campo5", "$cp5");
$query->bindValue(":campo6", "$cp6");
$query->bindValue(":campo7", "$cp7");
$query->bindValue(":campo8", "$cp8");
$query->bindValue(":campo9", "$cp9");
$query->bindValue(":campo10", "$cp10");
$query->bindValue(":campo11", "$cp11");

$query->bindValue(":campo13", "$cp13");
$query->bindValue(":campo14", "$cp14");
$query->bindValue(":campo15", "$cp15");
$query->bindValue(":campo16", "$cp16");
$query->bindValue(":campo17", "$cp17");
$query->bindValue(":campo18", "$cp18");
$query->bindValue(":campo19", "$cp19");
$query->bindValue(":campo20", "$cp20");
$query->execute();

echo 'Salvo com Sucesso';

 ?>