<?php 
require_once("../../conexao.php");
require_once("campos.php");
@session_start();
$nivel_usu = $_SESSION['nivel_usuario'];

$dataInicial = @$_POST['dataInicial'];
$dataFinal = @$_POST['dataFinal'];
$status = '%'.@$_POST['status'].'%';
$alterou_data = @$_POST['alterou_data'];
$vencidas = @$_POST['vencidas'];
$hoje = @$_POST['hoje'];
$amanha = @$_POST['amanha'];

$data_hoje = date('Y-m-d');
$data_amanha = date('Y/m/d', strtotime("+1 days",strtotime($data_hoje)));

if($alterou_data == 'Sim'){
	if($dataInicial != "" || $dataFinal != ""){
		$query = $pdo->query("SELECT * from $pagina where (vencimento >= '$dataInicial' and vencimento <= '$dataFinal') and status LIKE '$status'  order by id desc ");
	}
}else if($status != '%%' and $alterou_data == ''){
	$query = $pdo->query("SELECT * from $pagina where status LIKE '$status'  order by id desc ");
}

else if($vencidas == 'Vencidas'){
	$query = $pdo->query("SELECT * from $pagina where vencimento < curDate() and status = 'Pendente'  order by id desc ");
}

else if($vencidas == 'Hoje'){
	$query = $pdo->query("SELECT * from $pagina where vencimento = curDate() and status = 'Pendente'  order by id desc ");
}

else if($vencidas == 'Amanha'){
	$query = $pdo->query("SELECT * from $pagina where vencimento = '$data_amanha' and status = 'Pendente'  order by id desc ");
}

else{
	$query = $pdo->query("SELECT * from $pagina where status = 'Pendente' order by id desc ");
}

echo <<<HTML
<table id="{$pagina}" class="display nowrap" style="width:100%">
<thead>
<tr>
<th>Descrição</th>
<th>Vencimento</th>	
<th>Plano de Pagamento</th>	
<th>Valor</th>
<th>Comprovante</th>
<th></th>
</tr>
</thead>
<tbody>
HTML;

$total_valor = 0;
$total_valorF = 0;
$res = $query->fetchAll(PDO::FETCH_ASSOC);
for($i=0; $i < @count($res); $i++){
	foreach ($res[$i] as $key => $value){} 

		$id = $res[$i]['id'];
	$cp1 = $res[$i]['descricao'];
	$cp6 = $res[$i]['dataEmissao'];
	$cp7 = $res[$i]['dataVencimento'];
	$cp8 = $res[$i]['planoPagamento'];
	$cp9 = $res[$i]['Valor'];
	$cp10 = $res[$i]['id_usuario_lancamento'];
	$cp11 = $res[$i]['id_usuario_fechamento'];
	$arquivo = $res[$i]['arquivo'];

	$cp13 = $res[$i]['status'];
	$cp18 = $res[$i]['dataRecorrencia'];


		//EXTRAIR EXTENSÃO DO ARQUIVO
	$ext = pathinfo($arquivo, PATHINFO_EXTENSION);   
	if($ext == 'pdf'){ 
		$tumb_arquivo = 'pdf.png';
	}else if($ext == 'rar' || $ext == 'zip'){
		$tumb_arquivo = 'rar.png';
	}else{
		$tumb_arquivo = $arquivo;
	}


	if($cp13 == 'Paga'){
		$classe = 'text-success';
		$ocutar = 'd-none';
	}else{
		$classe = 'text-danger';
		$total_valor += $cp9;
		$total_valorF = number_format($total_valor, 2, ',', '.');
		$ocutar = '';
	}

	

	$query1 = $pdo->query("SELECT * from usuarios where id = '$cp10' ");
	$res1 = $query1->fetchAll(PDO::FETCH_ASSOC);
	if(@count($res1) > 0){
		$nome_usuario_lancamento = $res1[0]['nome'];
	}else{
		$nome_usuario_lancamento = 'Usuário não Identificado';
	}

	$query1 = $pdo->query("SELECT * from usuarios where id = '$cp11' ");
	$res1 = $query1->fetchAll(PDO::FETCH_ASSOC);
	if(@count($res1) > 0){
		$nome_usuario_fechamento = $res1[0]['nome'];
	}else{
		$nome_usuario_fechamento = 'Usuário não Identificado';
	}

	$descricao = $cp1;

	$data_emissao = implode('/', array_reverse(explode('-', $cp6)));
	$data_venc = implode('/', array_reverse(explode('-', $cp7)));
	$cp18 = implode('/', array_reverse(explode('-', $cp18)));

	$valor = number_format($cp9, 2, ',', '.');


		//PEGAR RESIDUOS DA CONTA
	$total_resid = 0;
	$valor_com_residuos = 0;
	$query2 = $pdo->query("SELECT * FROM contaspagar WHERE id_conta = '$id'");
	$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
	if(@count($res2) > 0){

		$descricao = '(Resíduo) - ' .$descricao;

		for($i2=0; $i2 < @count($res2); $i2++){
			foreach ($res2[$i2] as $key => $value){} 
				$id_res = $res2[$i2]['id'];
			$valor_resid = $res2[$i2]['valor'];
			$total_resid += $valor_resid;
		}


		$valor_com_residuos = $cp9 + $total_resid;
	}
	if($valor_com_residuos > 0){
		$vlr_antigo_conta = '('.$valor_com_residuos.')';
		$descricao_link = '';
		$descricao_texto = 'd-none';
	}else{
		$vlr_antigo_conta = '';
		$descricao_link = 'd-none';
		$descricao_texto = '';
	}


	echo <<<HTML
	<tr>
	<td>
	<i class="bi bi-square-fill $classe"></i>
	<span class="{$descricao_link}">
	<a href="#" onclick="mostrarResiduos('{$id}')" class="text-dark" title="Ver Resíduos">{$descricao}</a>
	</span>
	<span class="{$descricao_texto}">
	{$descricao}
	</span>
	</td>		
	<td>{$cp3}</td>	
	<td>{$cp5}</td>	

	<td>{$data_venc}</td>	
	<td>{$cp8}</td>	
	<td>R$ {$valor} <small><a href="#" onclick="mostrarResiduos('{$id}')" class="text-danger" title="Ver Resíduos">{$vlr_antigo_conta}</a></small></td>	

	<td >
	<a href="../img/contas/{$arquivo}" target="_blank">
	<img src="../img/contas/{$tumb_arquivo}" width="30px">
	</a>
	</td>

	<td>
	<a href="#" onclick="editar('{$id}', '{$cp1}', '{$cp3}', '{$cp4}', '{$cp5}', '{$cp6}', '{$cp7}', '{$cp8}', '{$cp9}', '{$tumb_arquivo}')" title="Editar Registro">	<i class="bi bi-pencil-square text-primary {$ocutar}"></i> </a>
	<a href="#" onclick="excluir('{$id}' , '{$cp1}')" title="Excluir Registro">	<i class="bi bi-trash text-danger {$ocutar}"></i> </a>

	<a class="mx-1" href="#" onclick="mostrarDados('{$id}', '{$cp1}', '{$cp3}', '{$cp4}', '{$cp5}', '{$data_emissao}', '{$data_venc}', '{$cp8}', '{$valor}', '{$nome_usuario_lancamento}', '{$nome_usuario_fechamento}', '{$cp13}', '$cp18')" title="Ver Dados da Conta">
	<i class="bi bi-exclamation-square"></i></a>


	<a href="#" onclick="parcelar('{$id}' , '{$cp1}', '{$cp9}')" title="Parcelar Conta">	<i class="bi bi-calendar-week text-secondary {$ocutar}"></i> </a>

	<a href="#" onclick="baixar('{$id}' , '{$cp1}', '{$cp9}', '$cp3')" title="Dar Baixa">	<i class="bi bi-check-square text-success mx-1 {$ocutar}"></i> </a>
	
	</td>
	</tr>
	HTML;
} 
echo <<<HTML
</tbody>
</table>
HTML;

?>

<script>
	$(document).ready(function() {    
		$('#<?=$pagina?>').DataTable({
			"ordering": false,
			 "stateSave": true,
		});

		$('#total_itens').text('R$ <?=$total_valorF?>');
	} );


	function editar(id, cp1, cp3, cp4, cp5, cp6, cp7, cp8, cp9, nome, arquivo){
		$('#arquivo').val('');
		$('#id').val(id);
		$('#<?=$campo1?>').val(cp1);
	$('#<?=$campo3?>').val(cp3);
	$('#<?=$campo4?>').val(cp4);
	
	$('#<?=$campo6?>').val(cp6);
	$('#<?=$campo7?>').val(cp7);
	$('#<?=$campo8?>').val(cp8);
	$('#<?=$campo9?>').val(cp9);
	

	$('#target').attr('src','../img/contas/'+arquivo);

	var usuario = "<?=$nivel_usu?>";
	if(usuario != 'Administrador'){
		document.getElementById("<?=$campo9?>").readOnly = true;
	}
	
	var plano = cp5.split("-");
	if(plano.length > 1){
		$('#cat_despesas').val(plano[1].trim());
		listarDespesas(plano[1].trim(), plano[0].trim())
	//$('#<?=$campo5?>').val(plano[0].trim());
}



$('#tituloModal').text('Editar Registro');
var myModal = new bootstrap.Modal(document.getElementById('modalForm'), {		});
myModal.show();
$('#mensagem').text('');
}



function limparCampos(){
	$('#id').val('');
	
	$('#<?=$campo1?>').val('');
	$('#<?=$campo9?>').val('');
	

	$('#mensagem').text('');

	$('#usuario_adm').val('');
	$('#senha_adm').val('');
	document.getElementById("<?=$campo9?>").readOnly = false;
	$('#target').attr('src','../img/contas/sem-foto.jpg');
	$('#arquivo').val('');

	//DEFINIR ABA A SER ABERTA
	var someTabTriggerEl = document.querySelector('#home-tab')
	var tab = new bootstrap.Tab(someTabTriggerEl);
	tab.show();
}


function mostrarDados(id, cp1, cp3, cp4, cp5, cp6, cp7, cp8, cp9, cp10, cp11, cp13, cp18){
	
	$('#campo1').text(cp1);

	$('#campo3').text(cp3);
	$('#campo4').text(cp4);
	$('#campo5').text(cp5);
	$('#campo6').text(cp6);
	$('#campo7').text(cp7);
	$('#campo8').text(cp8);
	$('#campo9').text(cp9);
	$('#campo10').text(cp10);
	$('#campo11').text(cp11);
	$('#campo13').text(cp13);
	$('#campo18').text(cp18);

	
	var myModal = new bootstrap.Modal(document.getElementById('modalDados'), {		});
	myModal.show();
	
}



function mostrarResiduos(id){

	$.ajax({
		url: pag + "/listar-residuos.php",
		method: 'POST',
		data: {id},
		dataType: "html",

		success:function(result){
			$("#listar-residuos").html(result);
		}
	});
	
	var myModal = new bootstrap.Modal(document.getElementById('modalResiduos'), {		});
	myModal.show();
	$('#mensagem').text('');
}



function baixar(id, descricao, valor, saida){
	$('#id-baixar').val(id);
	$('#descricao-baixar').text(descricao);
	$('#valor-baixar').val(valor);
	$('#saida-baixar').val(saida);
	$('#subtotal').val(valor);

	$('#juros-baixar').val('');
	$('#desconto-baixar').val('');
	$('#multa-baixar').val('');

	var myModal = new bootstrap.Modal(document.getElementById('modalBaixar'), {       });
	myModal.show();
	$('#mensagem-baixar').text('');
}

</script>