<?php
//CONECTA O BANCO DE DADOS
require_once("conexao.php");

//CRIA USUARIO ADM CASO ELE NAO EXISTA
$query = $pdo->query("SELECT * FROM usuarios WHERE perfil = 'Administrador' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);


if ($total_reg == 0) {
    $pdo->query("INSERT INTO usuarios SET nome = '$nome_admin', email = '$email_admin', senha = '$senha_admin', perfil = '$perfil_admin' ");
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