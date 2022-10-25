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
				<th><?php echo $campo2 ?></th>
				<th><?php echo $campo4 ?></th>
				<th></th>
			</tr>
		</thead>
		<tbody style="font-size:20px">
			<div class="col-md-12 my-3 text-center">
				<button href="#" onclick="inserir()" type="button" class="btn btn-warning btn-lg btn-block">Cadastrar Usuário</button>
			</div>
			<?php
			$query = $pdo->query("SELECT * FROM $pagina ORDER BY id DESC ");
			$res = $query->fetchAll(PDO::FETCH_ASSOC);
			for ($i = 0; $i < @count($res); $i++) {
				foreach ($res[$i] as $key => $value) {
				}

				$id = $res[$i]['id'];
				$cp1 = $res[$i]['nome'];
				$cp2 = $res[$i]['email'];
				$cp3 = $res[$i]['senha'];
				$cp4 = $res[$i]['perfil'];
				$cp5 = $res[$i]['ativo'];

				if ($cp5 == 'S') {
					$corBotao = 'btn btn-success';
					$ativo = 'Desativar Usuário';
					$icone = 'bi bi-person-check-fill';
					$ativar = 'N';
					$inativa = 'text-strong';
				} else {
					$corBotao = 'btn btn-danger';
					$ativo = 'Ativar Usuário';
					$icone = 'bi bi-person-x-fill';
					$ativar = 'S';
					$inativa = 'text-danger';
				}

			?>
				<tr class="<?php echo $inativa ?>">
					<td><?php echo $cp1 ?></td>
					<td><?php echo $cp2 ?></td>
					<td><?php echo $cp4 ?></td>
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-primary" href="#" onclick="editar('<?php echo $id ?>', '<?php echo $cp1 ?>', '<?php echo $cp2 ?>', '<?php echo $cp3 ?>', '<?php echo $cp4 ?>')" title="Editar Registro">
								<i class="bi bi-pencil-fill"></i>
							</button>

							<button type="button" class="<?php echo $corBotao ?>" href="#" onclick="mudarStatus('<?php echo $id ?>', '<?php echo $ativar ?>')" title="<?php echo $ativo ?>">
								<i class="bi <?php echo $icone ?>"></i>
							</button>

						</div>
					</td>
				</tr>
			<?php
			}
			?>
		</tbody>
		<tfoot>
			<tr>
				<th><?php echo $campo1 ?></th>
				<th><?php echo $campo2 ?></th>
				<th><?php echo $campo4 ?></th>
				<th></th>
			</tr>
		</tfoot>
	</table>
</body>

</html>

<script>
	$(document).ready(function() {
		$('#example').DataTable({
			"ordering": false
		});

	});


	//ACOES
	function editar(id, cp1, cp2, cp3, cp4, cp5) {
		$('#id').val(id);
		$('#<?= $campo1 ?>').val(cp1);
		$('#<?= $campo2 ?>').val(cp2);
		$('#<?= $campo3 ?>').val(cp3);
		$('#<?= $campo4 ?>').val(cp4);
		$('#<?= $campo5 ?>').val(cp5);

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
		$('#<?= $campo4 ?>').val('');
		$('#<?= $campo5 ?>').val('');

		$('#mensagem').text('');

	}
</script>