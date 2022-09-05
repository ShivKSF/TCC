<?php 
require_once("../../conexao.php");
require_once("campos.php"); //VARIAVEIS ARMAZENADAS

$id = @$_POST['id-excluir'];
$pdo->query("UPDATE $pagina SET inativo = 1 WHERE id = '$id'");
echo 'Excluído com Sucesso';

 ?>