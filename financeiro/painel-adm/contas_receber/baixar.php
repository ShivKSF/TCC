<?php 
require_once("../../conexao.php");
require_once("campos.php");
@session_start();
$id_usuario = $_SESSION['id_usuario'];

$data_atual = date('Y-m-d');
	$dia = date('d');
	$mes = date('m');
	$ano = date('Y');

$id = $_POST['id-baixar'];
$valor = $_POST['valor-baixar'];
$valor = str_replace(',', '.', $valor);

$valor_desconto = $_POST['valor-desconto'];
$valor_desconto = str_replace(',', '.', $valor_desconto);
$valor_juros = $_POST['valor-juros'];
$valor_juros = str_replace(',', '.', $valor_juros);
$valor_multa = $_POST['valor-multa'];
$valor_multa = str_replace(',', '.', $valor_multa);
$subtotal = $_POST['subtotal'];
$subtotal = str_replace(',', '.', $subtotal);

$query = $pdo->query("SELECT * from $pagina where id = '$id' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id = $res[0]['id'];
$cp1 = $res[0]['descricao'];
$cp2 = $res[0]['id_aluno'];
$cp4 = $res[0]['id_patrocinador'];
$cp7 = $res[0]['vencimento'];
$cp8 = $res[0]['frequencia'];
$cp9 = $res[0]['valor'];
$data_rec = $res[0]['data_recor'];

if($valor > $cp9){
	echo 'O valor a ser pago não pode ser superior ao valor da conta! O valor da conta é de R$ '.$cp9;
	exit();
}

if($valor <= 0){
	echo 'O precisa ser maior que 0 ';
	exit();
}


if($valor == $cp9){

	$pdo->query("UPDATE $pagina set usuario_baixa = '$id_usuario', status = 'Paga', juros = '$valor_juros', multa = '$valor_multa', desconto = '$valor_desconto', subtotal = '$subtotal', data_baixa = curDate() where id = '$id'");


	//CRIAR A PRÓXIMA CONTA A PAGAR
	$frequencia = $cp8;
	$query1 = $pdo->query("SELECT * from frequencias where nome = '$frequencia' ");
	$res1 = $query1->fetchAll(PDO::FETCH_ASSOC);
	$dias_frequencia = $res1[0]['dias'];

	if($dias_frequencia == 30 || $dias_frequencia == 31){

		$data_recor = date('Y/m/d', strtotime("+1 month",strtotime($data_rec)));
		$nova_data_vencimento = date('Y/m/d', strtotime("+1 month",strtotime($cp7)));

	}else if($dias_frequencia == 90){ 

		$data_recor = date('Y/m/d', strtotime("+3 month",strtotime($data_rec)));
		$nova_data_vencimento = date('Y/m/d', strtotime("+3 month",strtotime($cp7)));

	}else if($dias_frequencia == 180){ 

		$data_recor = date('Y/m/d', strtotime("+6 month",strtotime($data_rec)));
		$nova_data_vencimento = date('Y/m/d', strtotime("+6 month",strtotime($cp7)));

	}else if($dias_frequencia == 360){ 

		$data_recor = date('Y/m/d', strtotime("+1 year",strtotime($data_rec)));
		$nova_data_vencimento = date('Y/m/d', strtotime("+1 year",strtotime($cp7)));

	}else{
		$data_recor = date('Y/m/d', strtotime("+$dias_frequencia days",strtotime($data_atual)));
		$nova_data_vencimento = date('Y/m/d', strtotime("+$dias_frequencia days",strtotime($cp7))); 
	}


	if(@$dias_frequencia > 0){
		$pdo->query("INSERT INTO $pagina set descricao = '$cp1', id_aluno = '$cp2', id_patrocinador = '$cp4', data_emissao = curDate(), vencimento = '$nova_data_vencimento', frequencia = '$cp8', valor = '$cp9', usuario_lanc = '$id_usuario', status = 'Pendente', data_recor = '$data_recor'");
				$id_ult_registro = $pdo->lastInsertId();

				$pdo->query("UPDATE $pagina set data_recor = '' where id='$id'");
	}


	

}else{

	$descricao_conta = '(Resíduo) ' .$descricao_conta;
	//PEGAR RESIDUOS DA CONTA
	$total_resid = 0;
	$query = $pdo->query("SELECT * FROM valor_parcial WHERE id_conta = '$id'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	if(@count($res) > 0){
	
		for($i=0; $i < @count($res); $i++){
		foreach ($res[$i] as $key => $value){} 
			$valor_resid = $res[$i]['valor'];
			$total_resid += $valor_resid;


		}
	}

	$cp9 = $cp9 - $subtotal;

	$pdo->query("INSERT INTO valor_parcial set id_conta = '$id', tipo = 'Pagar', valor = '$subtotal', data = curDate(), usuario = '$id_usuario'");

	$pdo->query("UPDATE $pagina set usuario_baixa = '$id_usuario', status = 'Pendente', juros = '$valor_juros', multa = '$valor_multa', desconto = '$valor_desconto', valor = '$cp9', subtotal = '$subtotal', data_baixa = curDate() where id = '$id'");

}

echo 'Baixado com Sucesso';

?>