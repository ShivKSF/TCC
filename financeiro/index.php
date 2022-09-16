<?php
//CONECTA O BANCO DE DADOS
require_once("conexao.php");

//CRIA USUARIO ADM CASO ELE NAO EXISTA
$query = $pdo->query("SELECT * FROM usuarios WHERE nivel = 'Administrador' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

//CRIAR O NÍVEL ADMINISTRADOR CASO ELE NÃO EXISTA
$query2 = $pdo->query("SELECT * FROM niveis WHERE nivel = '$nivel_adm' ");
$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
$total_reg2 = @count($res2);


if ($total_reg == 0) {
    $pdo->query("INSERT INTO usuarios SET nome = '$nome_adm', email = '$email_adm', senha = '$senha_adm', nivel = '$nivel_adm' ");
}

if ($total_reg2 == 0) {
    $pdo->query("INSERT INTO niveis SET nivel = '$nivel_adm'");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <!--ICONE NA GUIA DO NAVEGADOR-->
    <link rel="shortcut icon" href="img/icone.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/styleLogin.css">
    <title><?php echo $nome_sistema?></title>
</head>

<body>
    <div id="container">
        <div class="form">
            <div class="login">
                <h1>HAZÁQ</h1>
                <form class="form-signin" method="post" action="autenticar.php">
                    <input type="email" name="email" class="form-control mb-2" placeholder="Email" required autofocus>
                    <input type="password" name="senha" class="form-control mb-3" placeholder="Senha" required>
                    <button class="btn btn-primary" type="submit">Entrar</button>
                </form>
            </div>
        </div>
        <!--<div class="division"></div>-->

        <div class="background">
        
        </div>
    </div>
</body>
</html>