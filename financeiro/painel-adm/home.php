<?php

require_once('../conexao.php');
require_once('verificar.php');

$hoje = date('Y-m-d');
$mes_atual = Date('m');
$ano_atual = Date('Y');
$dataInicioMes = $ano_atual . "-" . $mes_atual . "-01";



$query = $pdo->query("SELECT * FROM pessoas WHERE aluno = 1 AND ativo = 'S'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$alunosCadastrados = @count($res);

$query = $pdo->query("SELECT * FROM pessoas WHERE patrocinador = 1 AND ativo = 'S'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$patrocinadorCadastrados = @count($res);

$query = $pdo->query("SELECT * FROM contas_receber WHERE vencimento < curDate() and status != 'Paga' and excluido = 0");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$contas_receber_vencidas = @count($res);


$query = $pdo->query("SELECT * FROM contas_receber WHERE vencimento = curDate() and status != 'Paga' and excluido = 0");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$contas_receber_hoje = @count($res);


$query = $pdo->query("SELECT * FROM contas_pagar WHERE vencimento < curDate() and status != 'Paga' and excluido = 0");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$contas_pagar_vencidas = @count($res);


$query = $pdo->query("SELECT * FROM contas_pagar WHERE vencimento = curDate() and status != 'Paga' and excluido = 0");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$contas_pagar_hoje = @count($res);


$subtotal = 0;
$subtotalF = 0;


$lucroMes = 0;
$lucroMesF = 0;

for ($i = 0; $i < @count($res); $i++) {
	foreach ($res[$i] as $key => $value) {
	}

	$subt = $res[$i]['subtotal'];

	$subtotal += $subt;
	$lucroMes = $subtotal;
	$lucroMesF = number_format($lucroMes, 2, ',', '.');
	$subtotalF = number_format($subtotal, 2, ',', '.');
}




$totalPagarM = 0;
$query = $pdo->query("SELECT * FROM contas_pagar WHERE vencimento >= '$dataInicioMes' and vencimento <= curDate() and status = 'Pendente' and excluido = 0");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$pagarMes = @count($res);
$total_reg = @count($res);
if ($total_reg > 0) {

	for ($i = 0; $i < $total_reg; $i++) {
		foreach ($res[$i] as $key => $value) {
		}
		$totalPagarM += $res[$i]['valor'];
		$pagarMesF = number_format($totalPagarM, 2, ',', '.');
	}
}


$totalReceberM = 0.0;
$query = $pdo->query("SELECT * FROM contas_receber WHERE vencimento >= '$dataInicioMes' and vencimento <= curDate() and status = 'Pendente' and excluido = 0");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$receberMes = @count($res);
$total_reg = @count($res);
if ($total_reg > 0) {

	for ($i = 0; $i < $total_reg; $i++) {
		foreach ($res[$i] as $key => $value) {
		}
		$totalReceberM += $res[$i]['valor'];
		$receberMesF = number_format($totalReceberM, 2, ',', '.');
	}
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body>
	<div class="container-fluid mp-3">
		<section id="minimal-statistics">
			<div class="row">
				<div class="col-12 mt-3 mb-1">
					<h4 class="text-uppercase">Estatísticas do Sistema</h4>

				</div>
			</div>
			<div class="row mb-4 mx-4">
				<div class="col-xl-6 col-sm-6 col-12">
					<a class="link-primary" href="index.php?pag=<?php echo $menu2 ?>">
						<div class="card">
							<div class="card-content">
								<div class="card-body">
									<div class="row">
										<div class="align-self-center col-3">
											<i class="bi bi-people text-primary fs-1 float-start"></i>
										</div>
										<div class="col-9 text-end">
											<h3> <span class="text-primary"><?php echo @$alunosCadastrados ?></span></h3>
											<span>Alunos Cadastrados</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>


				<div class="col-xl-6 col-sm-6 col-12">
					<a class="link-info" href="index.php?pag=<?php echo $menu3 ?>">
						<div class="card">
							<div class="card-content">
								<div class="card-body">
									<div class="row">
										<div class="align-self-center col-3">
											<i class="bi bi-building text-info fs-1 float-start"></i>
										</div>
										<div class="col-9 text-end">
											<h3> <span class="text-info"><?php echo @$patrocinadorCadastrados ?></span></h3>
											<span>Patrocinadores Cadastrados</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>

			</div>

			<div class="row mb-4 mx-4">

				<div class="col-xl-6 col-sm-6 col-12">
					<a class="link-warning" href="index.php?pag=<?php echo $menu7 ?>">
						<div class="card">
							<div class="card-content">
								<div class="card-body">
									<div class="row">
										<div class="align-self-center col-3">
											<i class="bi bi-calendar2-check-fill text-warning fs-1 float-start"></i>
										</div>
										<div class="col-9 text-end">
											<h3> <span class=""><?php echo @$contas_pagar_hoje ?></span></h3>
											<span>Contas à Pagar (Hoje)</span>

										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>


				<div class="col-xl-6 col-sm-6 col-12">
					<a class="link-danger" href="index.php?pag=<?php echo $menu7 ?>">
						<div class="card">
							<div class="card-content">
								<div class="card-body">
									<div class="row">
										<div class="align-self-center col-3">
											<i class="bi bi-calendar-x-fill text-danger fs-1 float-start"></i>
										</div>
										<div class="col-9 text-end">
											<h3> <span class="">
													<?php echo @$contas_pagar_vencidas ?></span></h3>
											<span>Contas à Pagar Vencidas</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>

			<div class="row mb-4 mx-4">

				<div class="col-xl-6 col-sm-6 col-12">
					<a class="link-warning" href="index.php?pag=<?php echo $menu6 ?>">
						<div class="card">
							<div class="card-content">
								<div class="card-body">
									<div class="row">
										<div class="align-self-center col-3">
											<i class="bi bi-calendar2-check-fill text-warning fs-1 float-start"></i>
										</div>
										<div class="col-9 text-end">
											<h3> <span class=""><?php echo @$contas_receber_hoje ?></span></h3>
											<span>Contas Receber (Hoje)</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>


				<div class="col-xl-6 col-sm-6 col-12">
					<a class="link-danger" href="index.php?pag=<?php echo $menu6 ?>">
						<div class="card">
							<div class="card-content">
								<div class="card-body">
									<div class="row">
										<div class="align-self-center col-3">
											<i class="bi bi-calendar-x-fill text-danger fs-1 float-start"></i>
										</div>
										<div class="col-9 text-end">
											<h3><?php echo @$contas_receber_vencidas ?></h3>
											<span>Contas à Receber Vencidas</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>

		</section>

	</div>
	<section id="stats-subtitle">
		<div class="row mb-2">
			<div class="col-12 mt-3 mb-1">
				<h4 class="text-uppercase">Estatísticas Mensais</h4>

			</div>
		</div>

		<div class="row mb-4 mx-4">

			<div class="col-xl-6 col-md-12">
				<div class="card overflow-hidden">
					<div class="card-content">
						<div class="card-body cleartfix">
							<div class="row media align-items-stretch">
								<div class="align-self-center col-1">
									<i class="bi bi-calendar-week-fill text-danger fs-1 mr-2"></i>
								</div>
								<div class="media-body col-6">
									<h4>Contas à Pagar</h4>
									<span>Total de <?php echo @$pagarMes ?> Contas no Mês</span>
								</div>
								<div class="text-end col-5">
									<h2>R$ <?php echo @$pagarMesF ?></h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-6 col-md-12">
				<div class="card overflow-hidden">
					<div class="card-content">
						<div class="card-body cleartfix">
							<div class="row media align-items-stretch">
								<div class="align-self-center col-1">
									<i class="bi bi-calendar-week-fill text-success fs-1 mr-2"></i>
								</div>
								<div class="media-body col-6">
									<h4>Contas à Receber</h4>
									<span>Total de <?php echo @$receberMes ?> Contas no Mês</span>
								</div>
								<div class="text-end col-5">
									<h2>R$ <?php echo @$receberMesF ?></h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</body>

</html>