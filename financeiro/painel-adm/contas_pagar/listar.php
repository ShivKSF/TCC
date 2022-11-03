<?php
require_once("../../conexao.php");
require_once("campos.php");
@session_start();
$perfil_usu = $_SESSION['perfil_usuario'];

$dataInicial = @$_POST['dataInicial'];
$dataFinal = @$_POST['dataFinal'];
$status = '%' . @$_POST['status'] . '%';
$alterou_data = @$_POST['alterou_data'];
$vencidas = @$_POST['vencidas'];
$hoje = @$_POST['hoje'];
$amanha = @$_POST['amanha'];

$data_hoje = date('Y-m-d');
$data_amanha = date('Y/m/d', strtotime("+1 days", strtotime($data_hoje)));

if ($alterou_data == 'Sim') {
	if ($dataInicial != "" || $dataFinal != "") {
		$query = $pdo->query("SELECT * FROM $pagina WHERE excluido = 0 AND (vencimento >= '$dataInicial' AND vencimento <= '$dataFinal') AND status LIKE '$status'  ORDER BY id DESC ");
	}
} else if ($status != '%%' and $alterou_data == '') {
	$query = $pdo->query("SELECT * FROM $pagina WHERE excluido = 0 AND status LIKE '$status'  ORDER BY id DESC ");
} else if ($vencidas == 'Vencidas') {
	$query = $pdo->query("SELECT * FROM $pagina WHERE excluido = 0 AND vencimento < curDate() AND status = 'Pendente'  ORDER BY id DESC ");
} else if ($vencidas == 'Hoje') {
	$query = $pdo->query("SELECT * FROM $pagina WHERE excluido = 0 AND vencimento = curDate() AND status = 'Pendente'  ORDER BY id DESC ");
} else if ($vencidas == 'Amanha') {
	$query = $pdo->query("SELECT * FROM $pagina WHERE excluido = 0 AND vencimento = '$data_amanha' AND status = 'Pendente'  ORDER BY id DESC ");
} else {
	$query = $pdo->query("SELECT * FROM $pagina WHERE excluido = 0 AND status = 'Pendente' ORDER BY id DESC ");
}

?>
<table id="<?php echo $pagina ?>" class="table table-striped table-light table-hover my-4">
	<thead>
		<tr>
			<th>Descrição</th>
			<th>Plano de Conta</th>
			<th>Data de Vencimento</th>
			<th>Plano de Pagamento</th>
			<th>Valor à Pagar</th>
			<th>Comprovante</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php

		$total_valor = 0;
		$total_valorF = 0;
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		for ($i = 0; $i < @count($res); $i++) {
			foreach ($res[$i] as $key => $value) {
			}

			$id = $res[$i]['id'];
			$cp1 = $res[$i]['descricao'];
			$cp5 = $res[$i]['plano_conta'];
			$cp6 = $res[$i]['data_emissao'];
			$cp7 = $res[$i]['vencimento'];
			$cp8 = $res[$i]['frequencia'];
			$cp9 = $res[$i]['valor'];
			$cp10 = $res[$i]['usuario_lanc'];
			$cp11 = $res[$i]['usuario_baixa'];
			$arquivo = $res[$i]['arquivo'];

			$cp13 = $res[$i]['status'];
			$cp18 = $res[$i]['data_baixa'];


			//EXTRAIR EXTENSÃO DO ARQUIVO
			$ext = pathinfo($arquivo, PATHINFO_EXTENSION);
			if ($ext == 'pdf') {
				$tumb_arquivo = 'pdf.png';
			} else if ($ext == 'rar' || $ext == 'zip') {
				$tumb_arquivo = 'rar.png';
			} else {
				$tumb_arquivo = $arquivo;
			}


			if ($cp13 == 'Paga') {
				$classe = 'text-success';
				$ocutar = 'd-none';
				$icone = 'bi bi-check-circle-fill';
			} else {
				$classe = 'text-danger';
				$total_valor += $cp9;
				$total_valorF = number_format($total_valor, 2, ',', '.');
				$ocutar = '';
				$icone = 'bi bi-x-circle-fill';
			}



			$query1 = $pdo->query("SELECT * FROM usuarios WHERE id = '$cp10' ");
			$res1 = $query1->fetchAll(PDO::FETCH_ASSOC);
			if (@count($res1) > 0) {
				$nome_usu_lanc = $res1[0]['nome'];
			} else {
				$nome_usu_lanc = 'Sem Usuário';
			}

			$query1 = $pdo->query("SELECT * FROM usuarios WHERE id = '$cp11' ");
			$res1 = $query1->fetchAll(PDO::FETCH_ASSOC);
			if (@count($res1) > 0) {
				$nome_usu_baixa = $res1[0]['nome'];
			} else {
				$nome_usu_baixa = 'Sem Usuário';
			}

			$descricao = $cp1;


			$data_emissao = implode('/', array_reverse(explode('-', $cp6)));
			$data_venc = implode('/', array_reverse(explode('-', $cp7)));
			$cp18 = implode('/', array_reverse(explode('-', $cp18)));

			$valor = number_format($cp9, 2, ',', '.');


			//PEGAR RESIDUOS DA CONTA
			$total_resid = 0;
			$valor_com_residuos = 0;
			$query2 = $pdo->query("SELECT * FROM valor_parcial WHERE id_conta = '$id'");
			$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
			if (@count($res2) > 0) {

				$descricao = '(Parcial) - ' . $descricao;

				for ($i2 = 0; $i2 < @count($res2); $i2++) {
					foreach ($res2[$i2] as $key => $value) {
					}
					$id_res = $res2[$i2]['id'];
					$valor_resid = $res2[$i2]['valor'];
					$total_resid += $valor_resid;
				}


				$valor_com_residuos = $cp9 + $total_resid;
			}
			if ($valor_com_residuos > 0) {
				$vlr_antigo_conta = '(' . $valor_com_residuos . ')';
				$descricao_link = '';
				$descricao_texto = 'd-none';
			} else {
				$vlr_antigo_conta = '';
				$descricao_link = 'd-none';
				$descricao_texto = '';
			}


		?>
			<tr>
				<td>
					<i class="<?php echo $icone ?> <?php echo $classe ?>"></i>
					<span class="<?php echo $descricao_link ?>">
						<a href="#" onclick="mostrarResiduos('<?php echo $id ?>')" class="text-dark" title="Valor Total da Conta"><?php echo $descricao ?></a>
					</span>
					<span class="<?php echo $descricao_texto ?>">
						<?php echo $descricao ?>
					</span>
				</td>
				<td><?php echo $cp5 ?></td>

				<td><?php echo $data_venc ?></td>
				<td><?php echo $cp8 ?></td>
				<td>R$ <?php echo $valor ?> <small><a href="#" onclick="mostrarResiduos('<?php echo $id ?>')" class="text-danger" title="Valor Total da Conta"><?php echo $vlr_antigo_conta ?></a></small></td>

				<td>
					<a href="../img/contas/<?php echo $arquivo ?>" target="_blank">
						<img src="../img/contas/<?php echo $tumb_arquivo ?>" width="30px">
					</a>
				</td>

				<td>
					<div class="btn-group">
						<button type="button" class="btn btn-primary" href="#" onclick="editar('<?php echo $id ?>', '<?php echo $cp1 ?>', '<?php echo $cp5 ?>', '<?php echo $cp6 ?>', '<?php echo $cp7 ?>', '<?php echo $cp8 ?>', '<?php echo $cp9 ?>', '<?php $tumb_arquivo ?>')" title="Editar Registro">
							<i class="bi bi-pencil-fill <?php echo $ocutar ?>"></i>
						</button>

						<button type="button" class="btn btn-danger" href="#" onclick="excluir('<?php echo $id ?>' , '<?php echo $cp1 ?>')" title="Excluir Registro">
							<i class="bi bi-trash-fill <?php echo $ocutar ?>"></i>
						</button>

						<button type="button" class="btn btn-dark" href="#" onclick="parcelar('<?php echo $id ?>' , '<?php echo $cp1 ?>', '<?php echo $cp9 ?>')" title="Parcelar Conta">
							<i class="bi bi-calendar-plus-fill <?php echo $ocutar ?>"></i>
						</button>

						<button type="button" class="btn btn-success" href="#" onclick="baixar('<?php echo $id ?>' , '<?php echo $cp1 ?>', '<?php echo $cp9 ?>')" title="Dar Baixa">
							<i class="bi bi-check-square-fill"></i>
						</button>
					</div>
				</td>
			</tr>
		<?php
		}
		?>
	</tbody>
</table>

<script>
	$(document).ready(function() {
		$('#<?= $pagina ?>').DataTable({
			"ordering": false,
			"stateSave": true,
		});

		$('#total_itens').text('R$ <?= $total_valorF ?>');
	});


	function editar(id, cp1, cp5, cp6, cp7, cp8, cp9, arquivo) {
		$('#arquivo').val('');
		$('#id').val(id);
		$('#<?= $campo1 ?>').val(cp1);


		$('#<?= $campo6 ?>').val(cp6);
		$('#<?= $campo7 ?>').val(cp7);
		$('#<?= $campo8 ?>').val(cp8);
		$('#<?= $campo9 ?>').val(cp9);


		$('#target').attr('src', '../img/contas/' + arquivo);

		var usuario = "<?= $perfil_usu ?>";
		if (usuario != 'Administrador') {
			document.getElementById("<?= $campo9 ?>").readOnly = true;
		}

		var plano = cp5.split("-");
		if (plano.length > 1) {
			$('#cat_despesas').val(plano[1].trim());
			listarDespesas(plano[1].trim(), plano[0].trim())
			//$('#<?= $campo5 ?>').val(plano[0].trim());
		}



		$('#tituloModal').text('Editar Registro');
		var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {});
		myModal.show();
		$('#mensagem').text('');
	}



	function limparCampos() {
		$('#id').val('');

		$('#<?= $campo1 ?>').val('');
		$('#<?= $campo9 ?>').val('');


		$('#mensagem').text('');

		$('#usuario_admin').val('');
		$('#senha_admin').val('');
		document.getElementById("<?= $campo9 ?>").readOnly = false;
		$('#target').attr('src', '../img/contas/sem-foto.jpg');
		$('#arquivo').val('');


		//DEFINIR ABA A SER ABERTA
		var someTabTriggerEl = document.querySelector('#home-tab')
		var tab = new bootstrap.Tab(someTabTriggerEl);
		tab.show();
	}


	function mostrarDados(id, cp1, cp5, cp6, cp7, cp8, cp9, cp10, cp11, cp13, cp18) {

		$('#campo1').text(cp1);
		$('#campo5').text(cp5);
		$('#campo6').text(cp6);
		$('#campo7').text(cp7);
		$('#campo8').text(cp8);
		$('#campo9').text(cp9);
		$('#campo10').text(cp10);
		$('#campo11').text(cp11);
		$('#campo13').text(cp13);
		$('#campo18').text(cp18);


		var myModal = new bootstrap.Modal(document.getElementById('modalDados'), {});
		myModal.show();

	}



	function mostrarResiduos(id) {

		$.ajax({
			url: pag + "/listar-residuos.php",
			method: 'POST',
			data: {
				id
			},
			dataType: "html",

			success: function(result) {
				$("#listar-residuos").html(result);
			}
		});

		var myModal = new bootstrap.Modal(document.getElementById('modalResiduos'), {});
		myModal.show();
		$('#mensagem').text('');
	}



	function baixar(id, descricao, valor) {
		$('#id-baixar').val(id);
		$('#descricao-baixar').text(descricao);
		$('#valor-baixar').val(valor);
		$('#subtotal').val(valor);

		$('#juros-baixar').val('');
		$('#desconto-baixar').val('');
		$('#multa-baixar').val('');

		var myModal = new bootstrap.Modal(document.getElementById('modalBaixar'), {});
		myModal.show();
		$('#mensagem-baixar').text('');
	}
</script>