<?php
//INICIA SESSAO
@session_start();
//CONECTA O BANCO DE DADOS
require_once("conexao.php");

//VARIAVEIS NOME DOS CAMPOS DE INPUT DO FORMULARIO (NAME=VARIAVEL)
$email = $_POST['email'];
$senha = $_POST['senha'];


// PREPARE = USADO PARA EVITAR DE EXECUTAREM COMANDOS NA CAIXA DE EMAIL/SENHA PARA COLETAR DADOS DO BANCO
$query = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha ");
$query->bindValue(":email", "$email");
$query->bindValue(":senha", "$senha");
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg > 0){
	$perfil = $res[0]['perfil'];
	$ativo = $res[0]['ativo'];

	//VARIAVEIS DE SESSÃO
	$_SESSION['perfil_usuario'] = $res[0]['perfil'];
	$_SESSION['id_usuario'] = $res[0]['id'];
	$_SESSION['nome_usuario'] = $res[0]['nome'];
	$_SESSION['ativo_usuario'] = $res[0]['ativo'];
	
	//VERIFICADOR DE LOGIN
	if($perfil == 'Administrador' && $ativo == 'S' || $perfil == 'Auxiliar' && $ativo == 'S'){
		echo "<script>window.location='painel-adm'</script>";
	} 
	else{
		echo "<script>window.alert('Acesso não Autorizado!')</script>";
		echo "<script>window.location='index.php'</script>";
	}
}
 ?>