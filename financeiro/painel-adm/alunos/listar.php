<?php
//CHAMA CONEXAO COM SERVIDOR
require_once("../../conexao.php");
//CHAMA VARIAVEIS EM OUTRO ARQUIVO
require_once("campos.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
</head>

<body>
	<table id="example" class="display nowrap" style="width:100%">
		<thead>
			<tr>
				<th><?php echo $campo1 ?></th>
				<th>Apelido</th>
				<th><?php echo $campo3 ?></th>
				<th>Celular</th>
				<th>Email</th>
				<th></th>
			</tr>
		</thead>
		<div class="col-md-12 my-3 text-center">
		<button href="#" onclick="inserir()" type="button" class="btn btn-warning btn-lg btn-block">Cadastrar Atleta</button>
		</div>
		<tbody style="font-size:20px">
			<?php
			$query = $pdo->query("SELECT * FROM $tabela WHERE aluno = 1 ORDER BY id DESC ");
			$res = $query->fetchAll(PDO::FETCH_ASSOC);
			for ($i = 0; $i < @count($res); $i++) {
				foreach ($res[$i] as $key => $value) {
				}

				$id = $res[$i]['id'];
				$cp1 = $res[$i]['nome'];
				$cp2 = $res[$i]['nomeFantasia'];
				$cp3 = $res[$i]['cpf'];

				$cp5 = $res[$i]['logradouro'];
				$cp6 = $res[$i]['bairro'];
				$cp7 = $res[$i]['cidade'];
				$cp8 = $res[$i]['uf'];
				$cp9 = $res[$i]['complemento'];
				$cp10 = $res[$i]['numero'];
				$cp11 = $res[$i]['cep'];

				$cp13 = $res[$i]['celularPessoal'];

				$cp15 = $res[$i]['emailPessoal'];

				$cp17 = $res[$i]['contato'];
				$cp18 = $res[$i]['observacao'];
				$cp19 = $res[$i]['dataNascimento'];
				$cp20 = $res[$i]['ativo'];

				if ($cp20 == 'S') {
					$corBotao = 'btn btn-success';
					$ativo = 'Desativar Aluno';
					$icone = 'bi bi-person-check-fill';
					$ativar = 'N';
					$inativa = 'text-strong';
				} else {
					$corBotao = 'btn btn-danger';
					$ativo = 'Ativar Aluno';
					$icone = 'bi bi-person-x-fill';
					$ativar = 'S';
					$inativa = 'text-danger';
				}

			?>
				<tr class="<?php echo $inativa ?>">
					<td><?php echo $cp1 ?></td>
					<td><?php echo $cp2 ?></td>
					<td><?php echo $cp3 ?></td>
					<td><?php echo $cp13 ?></td>
					<td><?php echo $cp15 ?></td>
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-primary" href="#" onclick="editar('<?php echo $id ?>', '<?php echo $cp1 ?>', '<?php echo $cp2 ?>', '<?php echo $cp3 ?>', '<?php echo $cp5 ?>', '<?php echo $cp6 ?>', '<?php echo $cp7 ?>', '<?php echo $cp8 ?>', '<?php echo $cp9 ?>', '<?php echo $cp10 ?>', '<?php echo $cp11 ?>', '<?php echo $cp13 ?>', '<?php echo $cp15 ?>', '<?php echo $cp17 ?>', '<?php echo $cp18 ?>', '<?php echo $cp19 ?>', '<?php echo $cp20 ?>')" title="Editar Registro">
								<i class="bi bi-pencil-fill"></i>
							</button>

							<button type="button" class="<?php echo $corBotao ?>" href="#" onclick="mudarStatus('<?php echo $id ?>', '<?php echo $ativar ?>')" title="<?php echo $ativo ?>">
								<i class="bi <?php echo $icone ?>"></i>
							</button>

							<button type="button" class="btn btn-warning" href="#" onclick="mostrarDados('<?php echo $cp1 ?>', '<?php echo $cp2 ?>', '<?php echo $cp3 ?>', '<?php echo $cp5 ?>', '<?php echo $cp6 ?>', '<?php echo $cp7 ?>', '<?php echo $cp8 ?>', '<?php echo $cp9 ?>', '<?php echo $cp10 ?>', '<?php echo $cp11 ?>', '<?php echo $cp13 ?>', '<?php echo $cp15 ?>', '<?php echo $cp17 ?>', '<?php echo $cp18 ?>', '<?php echo $cp19 ?>', '<?php echo $cp20 ?>')" title="Ver Dados do Aluno">
								<i class="bi bi-person-badge-fill"></i>
							</button>
						</div>
					</td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</body>

</html>

<script>
	$(document).ready(function() {
		$('#example').DataTable({
			"ordering": false
		});

	});


	function editar(id, cp1, cp2, cp3, cp5, cp6, cp7, cp8, cp9, cp10, cp11, cp13, cp15, cp17, cp18, cp19, cp20) {
		$('#id').val(id);
		$('#<?= $campo1 ?>').val(cp1);
		$('#<?= $campo2 ?>').val(cp2);
		$('#<?= $campo3 ?>').val(cp3);

		$('#<?= $campo5 ?>').val(cp5);
		$('#<?= $campo6 ?>').val(cp6);
		$('#<?= $campo7 ?>').val(cp7);
		$('#<?= $campo8 ?>').val(cp8);
		$('#<?= $campo9 ?>').val(cp9);
		$('#<?= $campo10 ?>').val(cp10);
		$('#<?= $campo11 ?>').val(cp11);

		$('#<?= $campo13 ?>').val(cp13);

		$('#<?= $campo15 ?>').val(cp15);

		$('#<?= $campo17 ?>').val(cp17);
		$('#<?= $campo18 ?>').val(cp18);
		$('#<?= $campo19 ?>').val(cp19);
		$('#<?= $campo20 ?>').val(cp20);

		$('#tituloModal').text('Editar Registro');
		var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {});
		myModal.show();
		$('#mensagem').text('');
	}



	function limparCampos() {
		$('#id').val('');
		$('#<?= $campo1 ?>').val('');
		$('#<?= $campo2 ?>').val('');
		$('#<?= $campo3 ?>').val('');

		$('#<?= $campo5 ?>').val('');
		$('#<?= $campo6 ?>').val('');
		$('#<?= $campo7 ?>').val('');
		$('#<?= $campo8 ?>').val('');
		$('#<?= $campo9 ?>').val('');
		$('#<?= $campo10 ?>').val('');
		$('#<?= $campo11 ?>').val('');

		$('#<?= $campo13 ?>').val('');

		$('#<?= $campo15 ?>').val('');

		$('#<?= $campo17 ?>').val('');
		$('#<?= $campo18 ?>').val('');
		$('#<?= $campo19 ?>').val('');
		$('#<?= $campo20 ?>').val('');


		$('#mensagem').text('');

	}



	function mostrarDados(cp1, cp2, cp3, cp5, cp6, cp7, cp8, cp9, cp10, cp11, cp13, cp15, cp17, cp18, cp19, cp20) {

		$('#campo1').text(cp1);
		$('#campo2').text(cp2);
		$('#campo3').text(cp3);

		$('#campo5').text(cp5);
		$('#campo6').text(cp6);
		$('#campo7').text(cp7);
		$('#campo8').text(cp8);
		$('#campo9').text(cp9);
		$('#campo10').text(cp10);
		$('#campo11').text(cp11);

		$('#campo13').text(cp13);

		$('#campo15').text(cp15);

		$('#campo17').text(cp17);
		$('#campo18').text(cp18);
		$('#campo19').text(cp19);
		$('#campo20').text(cp20);


		var myModal = new bootstrap.Modal(document.getElementById('modalDados'), {});
		myModal.show();

	}
</script>