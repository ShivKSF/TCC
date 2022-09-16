<?php
//INICIA SESSAO
@session_start();
//CONECTA O BANCO DE DADOS
require_once("../conexao.php");
//VERIFICA O USUARIO CONECTADO
require_once("verificar.php");

//RECUPERAR DADOS DO USUARIO A PARTIR DO ID
$id_usuario = $_SESSION['id_usuario'];
$query = $pdo->query("SELECT * FROM usuarios WHERE id = '$id_usuario' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
//ATUALIZA AS VARIAVEIS NAS BUSCAS A PARTIR DO ID
$nome_usuario = $res[0]['nome'];
$email_usuario = $res[0]['email'];
$senha_usuario = $res[0]['senha'];
$nivel_usuario = $res[0]['nivel'];

$pagina = @$_GET['pag'];

//MENU DO PAINEL
$menu1 = 'home';
$menu2 = 'pessoas';
$menu3 = 'usuarios';
$menu4 = 'niveis';
$menu5 = 'bancos';

if (@$_GET['pag'] == "") {
    $pag = $menu1;
} else {
    $pag = $_GET['pag'];
}


?>

<!DOCTYPE html>
<html lang="Pt-Br">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--API AJAX-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--DATATABLE-->
    <link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css" />
    <script src="../js/scripts.js"></script>
    <script type="text/javascript" src="../DataTables/datatables.min.js"></script>
    <link rel="stylesheet" href="../css/styleHome.css"/>
    <link rel="stylesheet" href="../css/stylePessoas.css"/>
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
                        <span class="material-symbols-outlined">&#xE88A;</span>
                        <span class="items">Home</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="material-symbols-outlined">&#xE145;</span>
                        <span class="items">Cadastros</span>
                        <span class="material-symbols-outlined">&#xE409;</span>
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
                        <span class="material-symbols-outlined">&#xE645;</span>
                        <span class="items">Construindo</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="material-symbols-outlined">&#xE645;</span>
                        <span class="items">Construindo</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="material-symbols-outlined">&#xE645;</span>
                        <span class="items">Construindo</span>
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


        <div>
            <?php
            require_once($pag . '.php');
        ?>
        </div>

    </div>

</body>
</html>


<!-- AJAX PARA INSERIR OU EDITAR DADOS -->
<script type="text/javascript">
    //NOME FORMULARIO PARA SUBMISSAO DE DADOS
    $("#form-perfil").submit(function() {
        //NAO ATUALIZA PAGINA
        event.preventDefault();
        //RECEBE DADOS DO FORMULARIO
        var formData = new FormData(this);

        $.ajax({
            //COLETA ARQUIVO, EXECUTA
            url: "editar-perfil.php",
            //PASSA O FORMULARIO NO METODO POST
            type: 'POST',
            //DADOS COLETADOS
            data: formData,

            // SE FUNCIONAR RETORNA MENSAGEM
            success: function(mensagem) {
                //EXIBE MENSAGEM EM '#mensagem-perfil' E REMOVE CLASSE DE COR
                $('#mensagem-perfil').removeClass()
                //VERIFICA SE A MENSAGEM SALVO COM SUCESSO E RETORNADA
                if (mensagem.trim() == "Salvo com Sucesso") {
                    //FECHA AUTOMATICO A TELA COM O BOTAO DE FECHAR, EM CASO DE SUCESSO
                    $('#btn-fechar-perfil').click();
                    window.location = "index.php";
                }
                //SE NAO, MOSTRA UM TEXTO VERMELHA
                else {
                    $('#mensagem-perfil').addClass('text-danger')
                }
                //MOSTRA MENSAGEM
                $('#mensagem-perfil').text(mensagem)
            },
            cache: false,
            contentType: false,
            processData: false,
        });
    });
</script>