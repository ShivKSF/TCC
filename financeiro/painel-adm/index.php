<?php
@session_start();
require_once("../conexao.php");
require_once("verificar.php");
$id_usuario = $_SESSION['id_usuario'];
//RECUPERAR DADOS DO USUÁRIO
$query = $pdo->query("SELECT * FROM usuarios WHERE id = '$id_usuario' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$nome_usuario = $res[0]['nome'];
$email_usuario = $res[0]['email'];
$senha_usuario = $res[0]['senha'];
$perfil_usuario = $res[0]['perfil'];

//MENUS DO PAINEL
$menu1 = 'home';
$menu2 = 'alunos';
$menu3 = 'patrocinadores';
$menu4 = 'usuarios';
$menu5 = 'frequencias';
$menu6 = 'contas_receber';
$menu7 = 'contas_pagar';
$menu8 = 'despesas';
$menu9 = 'cat_despesas';
$menu10 = 'formas_pgtos';



if (@$_GET['pag'] == "") {
	$pag = $menu1;
} else {
	$pag = $_GET['pag'];
}


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<title><?php echo $nome_sistema ?></title>

	<link href="../img/icone.ico" rel="shortcut icon" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


	<link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="../DataTables/datatables.min.js"></script>

</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-warning">
		<div class="container-fluid">
			<a class="navbar-brand" href="#"><img src="../img/logo.png" width="30px"></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="index.php?pag=<?php echo $menu1 ?>">Dashboard</a>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Cadastros
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="index.php?pag=<?php echo $menu2 ?>">Atletas</a></li>
							<li><a class="dropdown-item" href="index.php?pag=<?php echo $menu3 ?>">Patrocinadores</a></li>
						</ul>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Financeiro
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="index.php?pag=<?php echo $menu6 ?>">Entradas</a></li>
							<li><a class="dropdown-item" href="index.php?pag=<?php echo $menu7 ?>">Saídas</a></li>
						</ul>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Configuração
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="index.php?pag=<?php echo $menu5 ?>">Planos de Pagamento</a></li>
							<li><a class="dropdown-item" href="index.php?pag=<?php echo $menu9 ?>">Categoria de Despesas</a></li>
							<li><a class="dropdown-item" href="index.php?pag=<?php echo $menu8 ?>">Tipos de Despesas</a></li>
							<li><a class="dropdown-item" href="index.php?pag=<?php echo $menu10 ?>">Formas de Pagamento</a></li>
						</ul>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Segurança
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="index.php?pag=<?php echo $menu4 ?>">Usuários</a></li>
						</ul>
					</li>

				</ul>
				<div class="d-flex mr-4">
					<img class="img-profile rounded-circle" src="../img/usuario.png" width="40px" height="40px">

					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<?php echo @$nome_usuario; ?>
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalPerfil">Editar Dados</a></li>

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
		require_once($pag . '.php');
		?>
	</div>

</body>

</html>

<!-- Modal -->
<div class="modal fade" id="modalPerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar Dados</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
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
						<input type="password" class="form-control" name="senha-usuario" placeholder="Senha" value="<?php echo $senha_usuario ?>" id="password-field">
						<input type="checkbox" onclick="PasswordFunction()"> Mostrar Senha
					</div>

					<small>
						<div id="mensagem-perfil" align="center"></div>
					</small>

					<input type="hidden" class="form-control" name="id-usuario" value="<?php echo $id_usuario ?>">


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-perfil">Fechar</button>
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Ajax para inserir ou editar dados -->
<script type="text/javascript">
	$("#form-perfil").submit(function() {
		event.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url: "editar-perfil.php",
			type: 'POST',
			data: formData,

			success: function(mensagem) {
				$('#mensagem-perfil').removeClass()
				if (mensagem.trim() == "Salvo com Sucesso") {
					$('#btn-fechar-perfil').click();
					window.location = "index.php";
				} else {
					$('#mensagem-perfil').addClass('text-danger')
				}

				$('#mensagem-perfil').text(mensagem)
			},

			cache: false,
			contentType: false,
			processData: false,

		});

	});
	// VISUALIZAR/OCULTAR SENHAS
	function PasswordFunction() {
		var x = document.getElementById("password-field");
		if (x.type === "password") {
			x.type = "text";
			$iconeSenha = "bi-eye-fill";
		} else {
			x.type = "password";
			$iconeSenha = "bi-eye-slash-fill";
		}
	}
</script>