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

//MENU DO PAINEL
$menu1 = 'home';
$menu2 = 'pessoas';
$menu3 = 'usuarios';
$menu4 = 'niveis';

if(@$_GET['pag'] == "") {
    $pag = $menu1;
}
else{
    $pag = $_GET['pag'];
}


?>

<!DOCTYPE html>
<html lang="pt-BR">
<!--NAME É UTILIZADO PARA VARIAVEL / ID UTILIZADO SCRIPT(php/js)-->

<head>
    <link rel="shortcut icon" href="../img/icone.ico" type="image/x-icon">
    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!--BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!--API AJAX-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--DATATABLE-->
    <link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css"/>
    <script type="text/javascript" src="../DataTables/datatables.min.js"></script>
    <!--ESTILOS-->
    <link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
    <!--NOME DO SISTEMA SALVO EM config.php-->
    <title><?php echo $nome_sistema ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-warning">
        <div class="container-fluid">
            <!--ICONE NO MENU-->
            <a class="navbar-brand" href="index.php?pag=<?php echo $menu1 ?>"><img src="../img/logo.png" width="50px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?pag=<?php echo $menu1 ?>">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cadastros
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="index.php?pag=<?php echo $menu2 ?>">Pessoas</a></li>
                            <li><a class="dropdown-item" href="index.php?pag=<?php echo $menu3 ?>">Usuários</a></li>
                            <li><a class="dropdown-item" href="index.php?pag=<?php echo $menu4 ?>">Níveis de Usuários</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <div class="d-flex mr-4" role="search">
                    <!--ICONE DO USUARIO-->
                    <img class="img-profile rounded-circle" src="../img/usuario.png" width="40px" height="40px">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <!--NOME DO USUARIO LOGADO-->
                                <?php echo $nome_usuario ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalPefil">Editar</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../logout.php">Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid mb-4 mx-4">
        <?php
            require_once($pag. '.php');
        ?>
    </div>
</body>

</html>

<!-- MODAL PARA ABRIR UMA JANELA/TELA -->
<div class="modal fade" id="modalPefil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Dados</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- BODY -->
            <form id="form-perfil" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome-usuario" placeholder="Nome" value="<?php echo $nome_usuario ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email-usuario" placeholder="Email" value="<?php echo $email_usuario ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Senha</label>
                        <input type="text" class="form-control" name="senha-usuario" placeholder="Senha" value="<?php echo $senha_usuario ?>">
                    </div>
                    <small>
                        <div id="mensagem-perfil" align="center"></div>
                    </small>
                    <input type="hidden" class="form-control" name="id-usuario" value="<?php echo $id_usuario ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-perfil">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
                if (mensagem.trim() == "Salvo com Sucesso!!!") {
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