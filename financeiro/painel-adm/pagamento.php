<?php
//INICIA SESSAO
@session_start();
//CONECTA O BANCO DE DADOS
require_once("../conexao.php");
//VERIFICA O USUARIO CONECTADO
require_once("verificar.php");
?>

<!DOCTYPE html>
<html lang="Pt-Br">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/stylePagamento.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"/>
    <link rel="shortcut icon" href="img/icone.ico" type="image/x-icon">
    <title><?php echo $nome_sistema ?></title>
</head>
<body>
    <div id="container">

        <div id="menu">
            <img src="../img/logoMenu.png" alt="">
            <a href="./index.php">
                <span class="material-symbols-outlined">&#xF088;</span>
                <span class="items">Home</span>
            </a>
            <a class="active">
                <span class="material-symbols-outlined">&#xF22c;</span>
                <span class="items">Financeiro</span>
            </a>
            <a href="#">
                <span class="material-symbols-outlined">&#xEBCC;</span>
                <span class="items">Agenda</span>
            </a>
            <a href="./cadastro.php">
                <span class="material-symbols-outlined">&#xE7FD;</span>
                <span class="items">Cadastro</span>
            </a>
            <a href="#">
                <span class="material-symbols-outlined">&#xE8B8;</span>
                <span class="items">Configurações</span>
            </a>
            
            <a href="../index.php">
                <span class="material-symbols-outlined">&#xE9BA;</span>
                <span class="items">LogOut</span>
            </a>
        </div>

        <div id="dash">
            <h1>Financeiro</h1>
            <div class="painelPag">
                <div class="menuTabela">
                    <span>Despesas</span>
                    <span>R$ <a href="#"></a></span>
                </div>

                <div>
                    <button>Adicionar</button>
                </div>
                
                <div class="tabela">
                    <table class="conteudoTabela">
                        <thead>
                            <tr>
                                <th>Vencimento</th>
                                <th>Descrição</th>
                                <th>Forma Pag.</th>
                                <th>Valor (R$)</th>
                                <th>Data Pag.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01/01/1000</td>
                                <td>Conta de Luz</td>
                                <td>Pix</td>
                                <td>R$ 100,00</td>
                                <td><span class="material-symbols-outlined">
check
</span></td>
                            </tr>
                            <tr>
                                <td>02/02/2000</td>
                                <td>Conta de Água</td>
                                <td>Cheque</td>
                                <td>R$ 200,00</td>
                                <td><span class="material-symbols-outlined">
check
</span></td>
                            </tr>
                            <tr>
                                <td>03/03/3000</td>
                                <td>Aluguel</td>
                                <td>Crédito</td>
                                <td>R$ 300,00</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>04/04/4000</td>
                                <td>Internet</td>
                                <td>Débito</td>
                                <td>R$ 400,00</td>
                                <td><span class="material-symbols-outlined">
check
</span></td>
                            </tr>
                            <tr>
                                <td>05/05/5000</td>
                                <td>Equipamentos</td>
                                <td>R$ 500,00</td>
                                <td>Dinheiro</td>
                                <td><span class="material-symbols-outlined">
check
</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>
         
    </div>  
</body>
</html>