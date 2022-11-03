<?php 
require_once("../../conexao.php");
require_once("campos.php");

@session_start();
$usuario_deleta = $_SESSION['id_usuario'];

$id = @$_POST['id-excluir'];

$query = $pdo->query("SELECT * from despesas WHERE cat_despesa = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg == 0){
$pdo->query("UPDATE $pagina SET excluido = 1, usuario_deleta = '$usuario_deleta' WHERE id = '$id'");
echo 'Excluído com Sucesso';
}else{
	echo 'Esta categoria possui despesas associadas a ela, primeiro exclua estas despesas e depois exclua a categoria!';
}

 ?>
