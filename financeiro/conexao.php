<?php
require_once("config.php");

date_default_timezone_set('America/Sao_Paulo');

//TENTA O ACESSO AO BANCO DE DADOS
//PDO = EXTENSAO PARA ACESSAR O BANCO
try {
    $pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario", "$senha");
}
// catch = PEGA O ERRO INFORMANDO QUE NAO FOI POSSÍVEL CONECTAR AO BANCO DE DADOS E LOGO ABAIXO RETORNA O MOTIVO DO ERRO
// $e = VARIAVEL DO ERRO
catch (Exception $e) {
    echo 'Não foi possível conectar ao banco de dados! <br><br>'.$e;
}
?>