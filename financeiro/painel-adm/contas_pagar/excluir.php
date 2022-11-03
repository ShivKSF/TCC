<?php 
require_once("../../conexao.php");
require_once("campos.php");

@session_start();
$perfil_admin = $_SESSION['perfil_usuario'];

$id = @$_POST['id-excluir'];
$usuario_admin = @$_POST['usuario_admin'];
$senha_admin = @$_POST['senha_admin'];
$cp10 = $_SESSION['id_usuario'];

$query = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha AND perfil = 'Administrador' ");
$query->bindValue(":email", "$usuario_admin");
$query->bindValue(":senha", "$senha_admin");
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg > 0 || $perfil_admin == 'Administrador'){

//BUSCAR A IMAGEM PARA EXCLUIR DA PASTA
$query_con = $pdo->query("SELECT * FROM $pagina WHERE id = '$id'");
$res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
$imagem = $res_con[0]['arquivo'];
if($imagem != 'sem-foto.jpg'){
	@unlink('../../img/contas/'.$imagem);
}

$pdo->query("UPDATE $pagina SET excluido = 1, usuario_deleta = '$cp10' WHERE id = '$id'");
echo 'Excluído com Sucesso';
}else{
	echo 'Usuário não é um Administrador!';
}

 ?>