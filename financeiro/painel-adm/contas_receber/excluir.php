<?php 
require_once("../../conexao.php");
require_once("campos.php");


@session_start();
$perfil_usuario = $_SESSION['perfil_usuario'];

$id = @$_POST['id-excluir'];
$usuario_adm = @$_POST['usuario_adm'];
$senha_adm = @$_POST['senha_adm'];

$query = $pdo->prepare("SELECT * from usuarios where email = :email and senha = :senha and perfil = 'Administrador' ");
$query->bindValue(":email", "$usuario_adm");
$query->bindValue(":senha", "$senha_adm");
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg > 0 || $perfil_usuario == 'Administrador'){

//BUSCAR A IMAGEM PARA EXCLUIR DA PASTA
$query_con = $pdo->query("SELECT * FROM $pagina WHERE id = '$id'");
$res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
$imagem = $res_con[0]['arquivo'];
if($imagem != 'sem-foto.jpg'){
	@unlink('../../img/contas/'.$imagem);
}

$pdo->query("DELETE from $pagina where id = '$id'");
echo 'Excluído com Sucesso';
}else{
	echo 'Dados Incorretos ou o usuário não é um Administrador!';
}

 ?>