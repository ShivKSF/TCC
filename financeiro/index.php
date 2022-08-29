<?php
//CONECTA O BANCO DE DADOS
require_once("conexao.php");

//CRIA USUARIO ADM CASO ELE NAO EXISTA
$query = $pdo->query("SELECT * FROM usuarios WHERE nivel = 'Administrador' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if ($total_reg == 0) {
    $pdo->query("INSERT INTO usuarios SET nome = '$nome_adm', email = '$email_adm', senha = '123', nivel = 'Administrador' ");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <!--ICONE NA GUIA DO NAVEGADOR-->
    <link rel="shortcut icon" href="img/icone.ico" type="image/x-icon">
    <!--CSS-->
    <link rel="stylesheet" href="css/estiloLogin.css">
    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!--BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!--NOME DO SISTEMA SALVO EM config.php-->
    <title><?php echo $nome_sistema ?></title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="">
                <div class="account-wall">
                    <img class="profile-img" src="img/logo.png" alt="">
                    <form class="form-signin" method="post" action="autenticar.php">
                        <input type="email" name="email" class="form-control mb-2" placeholder="Email" required autofocus>
                        <input type="password" name="senha" class="form-control mb-3" placeholder="Senha" required>
                        <div class="d-grid gap-2 mt-2">
                            <button class="btn btn-primary" type="submit">
                                Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>