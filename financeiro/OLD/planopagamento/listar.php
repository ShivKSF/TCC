<?php
require_once("../../conexao.php");
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
			<div class="col-md-12 my-3 text-center">
				<button href="#" onclick="inserir()" type="button" class="btn btn-warning btn-lg btn-block">Adicionar Plano Pagamento</button>
			</div>
			<tr>
				<th><?php echo $campo1 ?></th>
				<th>Frequência</th>
				<th></th>
			</tr>
		</thead>
		<tbody>

			<?php
			$query = $pdo->query("SELECT * from $pagina order by id desc ");
			$res = $query->fetchAll(PDO::FETCH_ASSOC);
			for ($i = 0; $i < @count($res); $i++) {
				foreach ($res[$i] as $key => $value) {
				}

				$id = $res[$i]['id'];
				$cp1 = $res[$i]['descricao'];
				$cp2 = $res[$i]['frequencia'];
				$cp3 = $res[$i]['ativo'];

				if ($cp3 == 'S') {
					$corBotao = 'btn btn-success';
					$ativo = 'Desativar Usuário';
					$icone = 'bi bi-check-circle';
					$ativar = 'N';
					$inativa = 'text-strong';
				} else {
					$corBotao = 'btn btn-danger';
					$ativo = 'Ativar Usuário';
					$icone = 'bi bi-x-circle';
					$ativar = 'S';
					$inativa = 'text-danger';
				}

			?>
				<tr class="<?php echo $inativa ?>">
					<td><?php echo $cp1 ?></td>
					<td><?php echo $cp2 ?></td>

					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-primary" href="#" onclick="editar('<?php echo $id ?>', '<?php echo $cp1 ?>', '<?php echo $cp2 ?>')" title="Editar Registro">
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
	</table>
</body>
<footer>
	<p><strong>Observação:</strong><br>
		Frequência gera novas contas a cada <strong>"Frequência"</strong> em dias.<br>
		Quando inserido Frequência igual à <strong>"0"</strong> significa que o pagamento é a vista, sendo recebido uma única vez.
	</p>
</footer>

</html>

<script>
	$(document).ready(function() {
		$('#example').DataTable({
			"ordering": false
		});

	});

	//ACOES
	function editar(id, cp1, cp2) {
		$('#id').val(id);
		$('#<?= $campo1 ?>').val(cp1);
		$('#<?= $campo2 ?>').val(cp2);


		$('#tituloModal').text('Editar Registro');
		var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {});
		myModal.show();
		$('#mensagem').text('');
	}



	function limparCampos() {
		$('#id').val('');
		$('#<?= $campo1 ?>').val('');
		$('#<?= $campo2 ?>').val('');
		$('#mensagem').text('');

	}
</script>