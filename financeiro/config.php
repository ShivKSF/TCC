<?php 

$nome_sistema = 'Gestão Hazáq';
$url_sistema = 'http://localhost/financeiro/';
$email_admin = 'kaique.sousa@unigranrio.br';
$nome_admin = 'Kaique Sousa Farias';
$senha_admin = 1;
$perfil_admin = 'Administrador';


//DADOS PARA O BANCO DADOS LOCAL
$servidor = 'localhost';
$usuario = 'root';
//$senha = '';
$senha = '240190';
$banco = 'financeiro';


//VARIAVEIS PARA CONTAS A RECEBER   OBS NAO COLOQUE % NOS VALORES
$valor_multa = 2; // esse valor de 2 corresponde a 2% sobre o valor da venda
$valor_juros_dia = 1.00; // aqui será 1.00 % ao dia sobre o valor da venda;
$dias_carencia = 0;


$frequencia_automatica = 'Sim'; //Caso você utilize sim e tenha uma conta que foi lançada como mensal, todo mês será gerado uma nova conta independentemente se a anterior foi paga.
 ?>