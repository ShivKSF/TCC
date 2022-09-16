<?php
//CONECTA O BANCO DE DADOS
require_once("../../conexao.php");
require_once("campos.php");
//RECUPERA DO POST nome, email, senha
$id = $_POST['id'];
$nivel = $_POST['nivel'];

//VALIDADOR CAMPO
$query = $pdo->query("SELECT * FROM $pagina WHERE nivel = '$nivel' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res); //CONTA A QUANTIDADE DE EMAILS ENCONTRADOS
$id_reg = @$res[0]['id'];
if($total_reg > 0 AND $id_reg != $id ){ // TRATAMENTO PARA RETORNAR MENSAGEM SOMENTE PARA USUARIOS[ID] DIFERETES NAO UTILIZAREM O MESMO EMAIL
    echo 'Esse nível já existe em nossa base de dados!';
    exit();
}
//ATUALIZA A TABELA DE USUARIOS ONDE O CAMPO NOME RECEBE OS PARAMETROS ONDE/SOMENTE O ID SENDO IGUAL AO ID
if($id == ""){//VERIFICA SE O ID E IGUAL A "", SE FOR INSERE
    $query = $pdo->prepare("INSERT INTO $pagina SET nivel = :nivel ");
}else{//SE NAO, EDITA
    $query = $pdo->prepare("UPDATE $pagina SET nivel = :nivel WHERE id = '$id'");
}


$query->bindValue(":nivel", "$nivel");
$query->execute();

echo 'Salvo com Sucesso'
?>