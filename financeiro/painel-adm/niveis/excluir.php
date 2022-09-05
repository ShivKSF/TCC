<?php
//CONECTA O BANCO DE DADOS
require_once("../../conexao.php");
//RECUPERA DO POST id-excluir
$id = @$_POST['id-excluir'];

//VERIFICACOES DE NIVEIS
//PEGANDO ID
$query = $pdo->query("SELECT * FROM niveis WHERE id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$nivel = $res[0]['nivel'];

//CONSULTA USUARIO COM DETERMINADO NIVEL
$query = $pdo->query("SELECT * FROM usuarios WHERE nivel = '$nivel'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

//ATUALIZA REGISTRO COLOCANDO USUARIO COMO INATIVO E TIRA DA VISUALIZACAO DOS USUARIOS
if($total_reg == 0){
	$pdo->query("UPDATE niveis SET inativo = 1 WHERE id = '$id'");
	echo 'Excluído com Sucesso';
}else{
	//MENSAGEM INFORMANDO QUE ESTA IMPEDINDO QUE SEJA REMOVIDO UM NIVEL QUE ESTEJA ATRELADO A UM USUARIO
	echo 'O Nível de Usuário possui usuários associados a ele, não será possível prosseguir com a exclusão.';
}


 ?>