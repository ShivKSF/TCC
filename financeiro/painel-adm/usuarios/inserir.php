<?php 
require_once("../../conexao.php");
require_once("campos.php"); //VARIAVEIS ARMAZENADAS

//VARIAVEIS RECEBENDO SEUS CAMPOS
$id = @$_POST['id'];
$cp1 = $_POST[$campo1];
$cp2 = $_POST[$campo2];
$cp3 = $_POST[$campo3];
$cp4 = $_POST[$campo4];

//VALIDAR CAMPO
$query = $pdo->query("SELECT * FROM $pagina WHERE email = '$cp2'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
$id_reg = @$res[0]['id'];
if($total_reg > 0 and $id_reg != $id){
	echo 'Este email já está cadastrado!!';
	exit();
}

if($id == ""){
	$query = $pdo->prepare("INSERT INTO $pagina SET nome = :campo1, email = :campo2, senha = :campo3, nivel = :campo4");
}else{
	$query = $pdo->prepare("UPDATE $pagina SET nome = :campo1, email = :campo2, senha = :campo3, nivel = :campo4 WHERE id = '$id'");
}

$query->bindValue(":campo1", "$cp1");
$query->bindValue(":campo2", "$cp2");
$query->bindValue(":campo3", "$cp3");
$query->bindValue(":campo4", "$cp4");
$query->execute();

echo 'Salvo com Sucesso';

 ?>