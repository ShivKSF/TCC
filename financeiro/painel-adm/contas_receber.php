<?php
require_once("../conexao.php");
require_once("verificar.php");
$pagina = 'contas_receber';

require_once($pagina . "/campos.php");

//ROTINA PARA VERIFICAR COBRANÇAS RECORRENTES
if ($frequencia_automatica != 'Não') {
	$data_atual = date('Y-m-d');
	$dia = date('d');
	$mes = date('m');
	$ano = date('Y');

	$query = $pdo->query("SELECT * from $pagina ORDER BY id desc ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	for ($i = 0; $i < @count($res); $i++) {
		foreach ($res[$i] as $key => $value) {
		}

		$id = $res[$i]['id'];
		$cp1 = $res[$i]['descricao'];
		$cp2 = $res[$i]['id_aluno'];
		$cp4 = $res[$i]['id_patrocinador'];
		$cp6 = $res[$i]['data_emissao'];
		$cp7 = $res[$i]['vencimento'];
		$cp8 = $res[$i]['frequencia'];
		$cp9 = $res[$i]['valor'];
		$cp10 = $res[$i]['usuario_lanc'];
		$cp11 = $res[$i]['usuario_baixa'];

		$cp13 = $res[$i]['status'];
		$cp14 = $res[$i]['data_recor'];

		$recor_str = explode("-", $cp14);

		$dia_recor = @$recor_str[2];


		$frequencia = $res[$i]['frequencia'];
		$query1 = $pdo->query("SELECT * from frequencias where nome = '$frequencia' ");
		$res1 = $query1->fetchAll(PDO::FETCH_ASSOC);
		$dias_frequencia = $res1[0]['dias'];

		if ($dias_frequencia == 30 || $dias_frequencia == 31) {

			$data_recor = date('Y/m/d', strtotime("+1 month", strtotime($data_atual)));
			$nova_data_vencimento = date('Y/m/d', strtotime("+1 month", strtotime($cp7)));
		} else if ($dias_frequencia == 90) {

			$data_recor = date('Y/m/d', strtotime("+3 month", strtotime($data_atual)));
			$nova_data_vencimento = date('Y/m/d', strtotime("+3 month", strtotime($cp7)));
		} else if ($dias_frequencia == 180) {

			$data_recor = date('Y/m/d', strtotime("+6 month", strtotime($data_atual)));
			$nova_data_vencimento = date('Y/m/d', strtotime("+6 month", strtotime($cp7)));
		} else if ($dias_frequencia == 360) {

			$data_recor = date('Y/m/d', strtotime("+1 year", strtotime($data_atual)));
			$nova_data_vencimento = date('Y/m/d', strtotime("+1 year", strtotime($cp7)));
		} else {
			$data_recor = date('Y/m/d', strtotime("+$dias_frequencia days", strtotime($data_atual)));
			$nova_data_vencimento = date('Y/m/d', strtotime("+$dias_frequencia days", strtotime($cp7)));
		}


		if ($dias_frequencia > 0) {
			if ($dia_recor == $dia) {


				$pdo->query("INSERT INTO $pagina set descricao = '$cp1', id_aluno = '$cp2', id_patrocinador = '$cp4', data_emissao = curDate(), vencimento = '$nova_data_vencimento', frequencia = '$cp8', valor = '$cp9', usuario_lanc = '$cp10', status = 'Pendente', data_recor = '$data_recor'");
				$id_ult_registro = $pdo->lastInsertId();

				$pdo->query("UPDATE $pagina set data_recor = '' where id='$id'");



				if ($data_atual == $cp6) {
					$pdo->query("DELETE FROM $pagina where id='$id_ult_registro'");
					$pdo->query("UPDATE $pagina SET data_recor = '$data_recor' where id='$id'");
				}
			}
		}
	}
}
?>
<div class="row my-3">
	<div class="col-md-9">

		<div style="float:left; margin-right:35px">
			<a href="#" onclick="inserir()" type="button" class="btn btn-warning btn-sm btn-block">Cadastrar Conta à Receber</a>
		</div>
		<div style="float:left; margin-right:10px">
			<p class="mx-4">Data Inicial:</p>
		</div>
		<div style="float:left; margin-right:20px">
			<input type="date" class="form-control form-control-sm" name="data-inicial" id="data-inicial" value="<?php echo date('Y-m-d') ?>" required>

		</div>
		<div style="float:left; margin-right:10px">
			<p class="mx-4">Data Final:</p>
		</div>
		<div style="float:left; margin-right:20px">
			<input type="date" class="form-control form-control-sm" name="data-final" id="data-final" value="<?php echo date('Y-m-d') ?>" required>
		</div>


		<!-- <div style="float:left; margin-right:10px"><span><small><i title="Filtrar por Status" class="bi bi-search"></i></small></span></div>
		<div style="float:left; margin-right:10px">
			<select class="form-select form-select-sm" aria-label="Default select example" name="status-busca" id="status-busca">
				<option value="Pendente">Pendentes / Pagas</option>
				<option value="Pendente">Pendentes</option>
				<option value="Paga">Pagas</option>

			</select>
		</div> -->

		<small class="mx-4">
			<a title="Contas à Pagar Vencidas" class="text-muted" href="#" onclick="listarContasVencidas('Vencidas')"><span>Vencidas</span></a> /
			<a title="Contas à Pagar Hoje" class="text-muted" href="#" onclick="listarContasVencidas('Hoje')"><span>Hoje</span></a> /
			<a title="Contas à Pagar Amanhã" class="text-muted" href="#" onclick="listarContasVencidas('Amanha')"><span>Amanhã</span></a>
		</small>


	</div>

	<div align="right" class="col-md-2">
		<small><i class="bi bi-cash text-success"></i> <span class="text-dark">Total: <span class="text-success" id="total_itens"></span></span></small>
	</div>
</div>

<small>
	<div class="tabela bg-light" id="listar">

	</div>
</small>



<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Inserir Registro</span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form" method="post">
				<div class="modal-body">


					<div class="row">
						<div class="col-md-4 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Aluno</label>
								<select class="form-select sel2" aria-label="Default select example" name="<?php echo $campo2 ?>" id="id-cliente" style="width:100%;">
									<option value="0">Sem Aluno</option>
									<?php
									$query = $pdo->query("SELECT * FROM pessoas WHERE aluno = 1 ORDER BY nome ASC");
									$res = $query->fetchAll(PDO::FETCH_ASSOC);
									for ($i = 0; $i < @count($res); $i++) {
										foreach ($res[$i] as $key => $value) {
										}
										$id_item = $res[$i]['id'];
										$nome_item = $res[$i]['nome'];
									?>
										<option value="<?php echo $id_item ?>"><?php echo $nome_item ?></option>

									<?php } ?>


								</select>
							</div>
						</div>

						<div class="col-md-4 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Valor da Conta</label>
								<input type="text" class="form-control" name="<?php echo $campo9 ?>" id="<?php echo $campo9 ?>" placeholder="Valor da Conta">

							</div>
						</div>


						<div class="col-md-4 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Descrição</label>
								<input type="text" class="form-control" name="<?php echo $campo1 ?>" placeholder="Descrição" id="<?php echo $campo1 ?>">
							</div>
						</div>

						<div class="col-md-4 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Patrocinador</label>
								<select class="form-select sel2" aria-label="Default select example" name="<?php echo $campo4 ?>" id="id-cliente" style="width:100%;">
									<option value="0">Sem Patrocinador</option>
									<?php
									$query = $pdo->query("SELECT * FROM pessoas WHERE patrocinador = 1 ORDER BY nome ASC");
									$res = $query->fetchAll(PDO::FETCH_ASSOC);
									for ($i = 0; $i < @count($res); $i++) {
										foreach ($res[$i] as $key => $value) {
										}
										$id_item = $res[$i]['id'];
										$nome_item = $res[$i]['nome'];
									?>
										<option value="<?php echo $id_item ?>"><?php echo $nome_item ?></option>

									<?php } ?>


								</select>
							</div>
						</div>


						<div class="col-md-4 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Data Emissão</label>
								<input type="date" class="form-control" name="<?php echo $campo6 ?>" id="<?php echo $campo6 ?>" value="<?php echo date('Y-m-d') ?>" required>
							</div>
						</div>

						<div class="col-md-3 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label"><?php echo $campo7 ?></label>
								<input type="date" class="form-control" name="<?php echo $campo7 ?>" id="<?php echo $campo7 ?>" value="<?php echo date('Y-m-d') ?>" required>
							</div>
						</div>

						<div class="col-md-3 col-sm-12">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Plano de Pagamento</label>
								<select class="form-select" aria-label="Default select example" name="<?php echo $campo8 ?>" id="<?php echo $campo8 ?>">

									<?php
									$query = $pdo->query("SELECT * FROM frequencias ORDER BY id ASC");
									$res = $query->fetchAll(PDO::FETCH_ASSOC);
									for ($i = 0; $i < @count($res); $i++) {
										foreach ($res[$i] as $key => $value) {
										}
										$id_item = $res[$i]['id'];
										$nome_item = $res[$i]['nome'];
									?>
										<option value="<?php echo $nome_item ?>"><?php echo $nome_item ?></option>

									<?php } ?>


								</select>
							</div>
						</div>


						<div class="col-md-4 col-sm-12">
							<div class="mb-3">
								<label>Arquivo</label>
								<input type="file" class="form-control-file" name="imagem" id="arquivo" onChange="carregarImg();">
							</div>
						</div>

						<div class="col-md-2 col-sm-12">
							<div id="divImg" class="mt-4">
								<img src="../img/sem-foto.jpg" width="100px" id="target">
							</div>
						</div>




					</div>



					<br>

					<small>
						<div id="mensagem" align="center"></div>
					</small>

					<input type="hidden" class="form-control" name="id" id="id">


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar">Fechar</button>
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</form>
		</div>
	</div>
</div>




<!-- Modal -->
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Excluir Registro</span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-excluir" method="post">
				<div class="modal-body">

					Deseja Realmente excluir este Registro: <span id="nome-excluido"></span>?

					<?php require_once("verificar_adm.php"); ?>

					<small>
						<div id="mensagem-excluir" align="center"></div>
					</small>

					<input type="hidden" class="form-control" name="id-excluir" id="id-excluir">


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-excluir">Fechar</button>
					<button type="submit" class="btn btn-danger">Excluir</button>
				</div>
			</form>
		</div>
	</div>
</div>





<!-- Modal -->
<div class="modal fade" id="modalDados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Conta <span id="campo1"></span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body">
				<small>


					<span><b>Aluno:</b> <span id="campo2"></span></span>
					</span>
					<hr style="margin:6px;">

					<span><b>Patrocinador:</b> <span id="campo4"></span></span>
					<span class="mx-4"><b>Recebimento Por:</b> <span id="campo11"></span>
					</span>
					<hr style="margin:6px;">


					<span><b>Data Emissão:</b> <span id="campo6"></span></span>
					<span class="mx-4"><b>Vencimento:</b> <span id="campo7"></span>
					</span>
					<hr style="margin:6px;">

					<span><b>Frequência:</b> <span id="campo8"></span></span>
					<span class="mx-4"><b><?php echo $campo9 ?>:</b> R$ <span id="campo9"></span>
					</span>
					<hr style="margin:6px;">

					<span><b>Usuário Lançamento:</b> <span id="campo10"></span></span>
					<hr style="margin:6px;">

					<span><b>Usuário Baixa:</b> <span id="campo11"></span></span>
					<hr style="margin:6px;">

					<span><b>Status Conta:</b> <span id="campo13"></span></span>
					<span class="mx-4"><b>Data Baixa:</b> <span id="campo18"></span>
					</span>
					<hr style="margin:6px;">





				</small>


			</div>

		</div>
	</div>
</div>







<!-- Modal -->
<div class="modal fade" id="modalParcelar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Parcelar Conta</span> - <span id="descricao-parcelar"></span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-parcelar" method="post">
				<div class="modal-body">

					<div class="row">
						<div class="col-md-3">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Valor</label>
								<input type="text" class="form-control" name="valor-parcelar" id="valor-parcelar" readonly>
							</div>
						</div>

						<div class="col-md-3">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Parcelas</label>
								<input type="number" class="form-control" name="qtd-parcelar" id="qtd-parcelar" required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Frequência das Parcelas</label>
								<select class="form-select" aria-label="Default select example" name="frequencia-parcelar" id="frequencia-parcelar">

									<?php
									$query = $pdo->query("SELECT * FROM frequencias ORDER BY id ASC");
									$res = $query->fetchAll(PDO::FETCH_ASSOC);
									for ($i = 0; $i < @count($res); $i++) {
										foreach ($res[$i] as $key => $value) {
										}
										$id_item = $res[$i]['id'];
										$nome_item = $res[$i]['nome'];

										if ($nome_item != 'Uma Vez' and $nome_item != 'Única') {

									?>
											<option <?php if ($nome_item == 'Mensal') { ?> selected <?php } ?> value="<?php echo $nome_item ?>"><?php echo $nome_item ?></option>

									<?php }
									} ?>


								</select>
							</div>
						</div>
					</div>




					<small>
						<div id="mensagem-parcelar" align="center"></div>
					</small>

					<input type="hidden" class="form-control" name="id-parcelar" id="id-parcelar">


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-parcelar">Fechar</button>
					<button type="submit" class="btn btn-primary">Parcelar</button>
				</div>
			</form>
		</div>
	</div>
</div>







<!-- Modal -->
<div class="modal fade" id="modalBaixar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Fechar Conta</span> - <span id="descricao-baixar"></span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="form-baixar" method="post">
				<div class="modal-body">

					<div class="row">
						<div class="col-md-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Valor <small class="text-muted">(Confirme o Valor da Conta)</small></label>
								<input onkeyup="totalizar()" type="text" class="form-control" name="valor-baixar" id="valor-baixar" required>
							</div>
						</div>

					</div>


					<div class="row">


						<div class="col-md-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Multa R$ <small><small>(Multa Padrão: <?php echo $valor_multa ?>%)</small></small></label>
								<input onkeyup="totalizar()" type="text" class="form-control" name="valor-multa" id="valor-multa" placeholder="Ex 15.00" value="0">
							</div>
						</div>

						<div class="col-md-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Júros R$ <small><small>(Júros Padrão: <?php echo $valor_juros_dia ?>% ao dia)</small></small></label>
								<input onkeyup="totalizar()" type="text" class="form-control" name="valor-juros" id="valor-juros" placeholder="Ex 0.15" value="0">
							</div>
						</div>

					</div>


					<div class="row">

						<div class="col-md-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Desconto em R$</label>
								<input onkeyup="totalizar()" type="text" class="form-control" name="valor-desconto" id="valor-desconto" placeholder="Ex 15.00" value="0">
							</div>
						</div>


						<div class="col-md-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">SubTotal</label>
								<input type="text" class="form-control" name="subtotal" id="subtotal" readonly>
							</div>
						</div>
					</div>




					<small>
						<div id="mensagem-baixar" align="center"></div>
					</small>

					<input type="hidden" class="form-control" name="id-baixar" id="id-baixar">


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-baixar">Fechar</button>
					<button type="submit" class="btn btn-success">Baixar</button>
				</div>
			</form>
		</div>
	</div>
</div>






<!-- Modal -->
<div class="modal fade" id="modalResiduos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><span id="tituloModal">Resíduos da Conta</span></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body">

				<small>
					<div id="listar-residuos"></div>
				</small>

			</div>

		</div>
	</div>
</div>





<script type="text/javascript">
	var pag = "<?= $pagina ?>"
</script>
<script src="../js/ajax.js"></script>

<script>
	$(document).ready(function() {

		listarClientes();



		$('#data-inicial').change(function() {
			var dataInicial = $('#data-inicial').val();
			var dataFinal = $('#data-final').val();
			var status = $('#status-busca').val();
			var alterou_data = 'Sim';
			listarBusca(dataInicial, dataFinal, status, alterou_data);
		});

		$('#data-final').change(function() {
			var dataInicial = $('#data-inicial').val();
			var dataFinal = $('#data-final').val();
			var status = $('#status-busca').val();
			var alterou_data = 'Sim';
			listarBusca(dataInicial, dataFinal, status, alterou_data);
		});

		$('#status-busca').change(function() {
			var dataInicial = $('#data-inicial').val();
			var dataFinal = $('#data-final').val();
			var status = $('#status-busca').val();
			listarBusca(dataInicial, dataFinal, status);
		});


	});







	function listarClientes() {
		var pag = "<?= $pagina ?>";
		$.ajax({
			url: pag + "/listar-clientes.php",
			method: 'POST',
			data: $('#form').serialize(),
			dataType: "html",

			success: function(result) {
				$("#listar-clientes").html(result);
			}
		});
	}




	function listarBusca(dataInicial, dataFinal, status, alterou_data) {
		$.ajax({
			url: pag + "/listar.php",
			method: 'POST',
			data: {
				dataInicial,
				dataFinal,
				status,
				alterou_data
			},
			dataType: "html",

			success: function(result) {
				$("#listar").html(result);
			}
		});
	}



	function listarContasVencidas(vencidas) {
		$.ajax({
			url: pag + "/listar.php",
			method: 'POST',
			data: {
				vencidas
			},
			dataType: "html",

			success: function(result) {
				$("#listar").html(result);
			}
		});
	}


	function listarContasHoje(hoje) {
		$.ajax({
			url: pag + "/listar.php",
			method: 'POST',
			data: {
				hoje
			},
			dataType: "html",

			success: function(result) {
				$("#listar").html(result);
			}
		});
	}


	function listarContasAmanha(amanha) {
		$.ajax({
			url: pag + "/listar.php",
			method: 'POST',
			data: {
				amanha
			},
			dataType: "html",

			success: function(result) {
				$("#listar").html(result);
			}
		});
	}


	function totalizar() {
		valor = $('#valor-baixar').val();
		desconto = $('#valor-desconto').val();
		juros = $('#valor-juros').val();
		multa = $('#valor-multa').val();

		if (desconto == "") {
			desconto = 0;
		}

		if (juros == "") {
			juros = 0;
		}

		if (multa == "") {
			multa = 0;
		}

		valor = valor.replace(",", ".");
		desconto = desconto.replace(",", ".");
		juros = juros.replace(",", ".");
		multa = multa.replace(",", ".");

		subtotal = parseFloat(valor) + parseFloat(juros) + parseFloat(multa) - parseFloat(desconto);


		console.log(subtotal)

		$('#subtotal').val(subtotal);

	}
</script>





<script type="text/javascript">
	$(document).ready(function() {
		$('.sel2').select2({
			placeholder: 'Diversos',
			dropdownParent: $('#modalForm')
		});

	});
</script>

<style type="text/css">
	.select2-selection__rendered {
		line-height: 36px !important;
		font-size: 16px !important;
		color: #666666 !important;

	}

	.select2-selection {
		height: 36px !important;
		font-size: 16px !important;
		color: #666666 !important;

	}
</style>