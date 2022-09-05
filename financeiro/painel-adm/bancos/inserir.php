<?php 
require_once("../../conexao.php");
require_once("campos.php"); //VARIAVEIS ARMAZENADAS

//VARIAVEIS RECEBENDO SEUS CAMPOS
$id = @$_POST['id'];
$cp1 = $_POST[$campo1];

//VALIDAR CAMPO
$query = $pdo->query("SELECT * FROM $pagina WHERE nome = '$cp1'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
$id_reg = @$res[0]['id'];
if($total_reg > 0 and $id_reg != $id){
	echo 'Esse Banco já está cadastrado!';
	exit();
}

if($id == ""){
	$query = $pdo->prepare("INSERT INTO $pagina SET nome = :campo1");
}else{
	$query = $pdo->prepare("UPDATE $pagina SET nome = :campo1 WHERE id = '$id'");
}

$query->bindValue(":campo1", "$cp1");
$query->execute();

echo 'Salvo com Sucesso';

 ?>