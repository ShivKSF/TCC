<?php
require_once("../../conexao.php");
require_once("campos.php");

?>
<table id="example" class="table table-striped table-light table-hover my-4">
	<thead>
		<tr>
			<th><?php echo $campo1 ?></th>
			<th>Despesas</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php


		$query = $pdo->query("SELECT * from $pagina WHERE excluido = 0 ORDER BY id desc ");
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		for ($i = 0; $i < @count($res); $i++) {
			foreach ($res[$i] as $key => $value) {
			}

			$id = $res[$i]['id'];
			$cp1 = $res[$i]['nome'];

			$query2 = $pdo->query("SELECT * from despesas WHERE cat_despesa = '$id'");
			$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
			$total_despesas = @count($res2);

		?>
			<tr>
				<td><?php echo $cp1 ?></td>
				<td><?php echo $total_despesas ?> Despesas</td>
				<td>
					<div class="btn-group">
						<button type="button" class="btn btn-primary" href="#" onclick="editar('<?php echo $id ?>', '<?php echo $cp1 ?>')" title="Editar Registro">
							<i class="bi bi-pencil-fill"></i>
						</button>
						<button type="button" class="btn btn-danger" href="#" onclick="excluir('<?php echo $id ?>' , '<?php echo $cp1 ?>')" title="Excluir Registro">
							<i class="bi bi-trash-fill"></i>
						</button>
					</div>
				</td>
			</tr>
		<?php
		}
		?>
	</tbody>
</table>
<?php

?>

<script>
	$(document).ready(function() {
		$('#example').DataTable({
			"ordering": false
		});

	});


	function editar(id, nome) {
		$('#id').val(id);
		$('#<?= $campo1 ?>').val(nome);

		$('#tituloModal').text('Editar Registro');
		var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {});
		myModal.show();
		$('#mensagem').text('');
	}



	function limparCampos() {
		$('#id').val('');
		$('#<?= $campo1 ?>').val('');


		$('#mensagem').text('');

	}
</script>