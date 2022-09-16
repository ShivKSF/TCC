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
    <link rel="stylesheet" href="../css/styleCadastro.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"/>
    <link rel="shortcut icon" href="img/icone.ico" type="image/x-icon">
    <title><?php echo $nome_sistema ?></title>
</head>
<body>
<div id="container">
        <!--------  MENU LATERAL ---------->
        <nav id="menu-lateral">
            <!---LOGO MENU--->
            <a class="navbar-brand" href="index.php?pag=<?php echo $menu1 ?>">
                <img src="../img/logoMenu.png" alt="">
            </a>

            <!--- ITENS MENU--->
            <ul class="itens-menu">
                <li>
                    <a href="index.php?pag=<?php echo $menu1 ?>">
                        <span class="material-symbols-outlined">&#xF088;</span>
                        <span class="items">Home</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?pag=<?php echo $menu5 ?>">
                        <span class="material-symbols-outlined">&#xF22c;</span>
                        <span class="items">Cadastros</span>
                    </a>
                    <ul class="dropmenu">
                        <li><a href="index.php?pag=<?php echo $menu2 ?>">Pessoas</a></li>
                        <li><a href="index.php?pag=<?php echo $menu5 ?>">Bancos</a></li>
                        <li><a href="index.php?pag=<?php echo $menu3 ?>">Usuários</a></li>
                        <li><a href="index.php?pag=<?php echo $menu4 ?>">Níveis de Usuários</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">
                        <span class="material-symbols-outlined">&#xEBCC;</span>
                        <span class="items">Menu</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="material-symbols-outlined">&#xE7FD;</span>
                        <span class="items">Menu</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="material-symbols-outlined">&#xE8B8;</span>
                        <span class="items">Menu</span>
                    </a>
                </li>
                <li>
                    <a href="../logout.php">
                        <span class="material-symbols-outlined">&#xE9BA;</span>
                        <span class="items">Logout</span>
                    </a>
                </li>
            </ul>
        </nav>


        <!---ICONE DO USUARIO-->
        <nav class="menu-superior" role="search">
            
            <div class="navbar-nav">
            <img class="img-profile rounded-circle" src="../img/usuario.png" width="40px" height="40px">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <!---NOME DO USUARIO LOGADO--->
                        <?php echo @$nome_usuario ?>
                    </a>
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalPefil">Editar
                    </a>
                    <a class="dropdown-item" href="../logout.php">Sair</a>
                    </div>
            </div>
        </nav>


        <div class="menu-superior">
            <?php
            require_once($pag . '.php');
        ?>
        </div>
</body>
</html>