<?php
//CONECTA O BANCO DE DADOS
require_once("../conexao.php");
//RECUPERA DO POST nome, email, senha
$id = $_POST['id-usuario'];
$nome = $_POST['nome-usuario'];
$email = $_POST['email-usuario'];
$senha = $_POST['senha-usuario'];
//VALIDADOR DE DADOS
$query = $pdo->query("SELECT * FROM usuarios WHERE email = '$email' "); // VALIDA O EMAIL
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res); //CONTA A QUANTIDADE DE EMAILS ENCONTRADOS
$id_usu = $res[0]['id'];
if($total_reg > 0 AND $id_usu != $id ){ // TRATAMENTO PARA RETORNAR MENSAGEM SOMENTE PARA USUARIOS[ID] DIFERETES NAO UTILIZAREM O MESMO EMAIL
    echo 'Esse endereço de email já existe em nossa base de dados! ' .$res[0]['nome']. ' está o utilizando no momento, escolha outro email!!'; // ENVIA MENSAGEM IMPEDINDO SALVAR INFORMACOES DUPLICADAS E INFORMA QUEM ESTA UTILIZANDO ESSE EMAIL
    exit();
}
//ATUALIZA A TABELA DE USUARIOS ONDE O CAMPO NOME RECEBE OS PARAMETROS ONDE/SOMENTE O ID SENDO IGUAL AO ID
$query = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = '$id' ");
$query->bindValue(":nome", "$nome");
$query->bindValue(":email", "$email");
$query->bindValue(":senha", "$senha");
$query->execute();

echo "Salvo com Sucesso"
?>