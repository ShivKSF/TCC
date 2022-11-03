<?php 
require_once("../../conexao.php");
require_once("campos.php");


@session_start();
$usuario_deleta = $_SESSION['id_usuario'];

$id = @$_POST['id-excluir'];

$pdo->query("UPDATE $pagina SET excluido = 1, usuario_deleta = '$usuario_deleta' where id = '$id'");
echo 'Excluído com Sucesso';

 ?>