<?php 

require_once("../../conexao.php");
require_once("campos.php");
$id = @$_POST['id'];
$ativo = @$_POST['ativar'];

$pdo->query("UPDATE $pagina SET ativo = '$ativo' WHERE id = '$id'");
echo 'Alterado com Sucesso';

 ?>