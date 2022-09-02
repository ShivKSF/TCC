<?php
//CONECTA O BANCO DE DADOS
require_once("conexao.php");

//CRIAR O USUÁRIO ADMINISTRADOR CASO ELE NÃO EXISTA
$query = $pdo->query("SELECT * from usuarios where nivel = '$nivel_adm' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

//CRIAR O NÍVEL ADMINISTRADOR CASO ELE NÃO EXISTA
$query2 = $pdo->query("SELECT * from niveis where nivel = '$nivel_adm' ");
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
<html lang="pt-BR">

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