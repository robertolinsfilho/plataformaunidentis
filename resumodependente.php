<?php

include_once "conexao.php";
session_start();
error_reporting(0);


$cpf = $_GET['cpf'];

$id = $_GET['id'];
//consultar no banco de dados
$_SESSION['cpfnova'] = $cpf;


$result_usuario = "SELECT * from dadospessoais where cpf ='$cpf'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
$result_usuario2 = "SELECT * from dependentes where id ='$id'";
$resultado_usuario2 = mysqli_query($conexao, $result_usuario2);
$row_usuario2 = mysqli_fetch_assoc($resultado_usuario2);

$url = "http://unidentis.s4e.com.br/v2/api/associados?token=RWNTF7PUC87KRYRTVNFGP8XNYWJ4DQC4XWCGSHPW2F9FCURP82&limite=50&cpfDependente=$cpf";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$resultado = json_decode(curl_exec($curl), true);
$resultado = $resultado['dados'];
$x = 0;
$y = 0;
$z = 0;
foreach ($resultado as $value) {

	foreach ($value['dependentes'] as $value1) {

		foreach ((array)$value1['nomeSituacao'] as $value2) {

			if ($value2 != 'CANCELADO') {
				$x = 1;
				$_SESSION['nomedependente'] = $value1['nomeDependente'];
				$_SESSION['nometitular'] = $value['nome'];
				$_SESSION['numerocpf'] = $value['cpf'];
				$_SESSION['datanascimentotitular'] = $value['dataDeNascimento'];
				$_SESSION['codresp'] = $value['codigo'];
				$_SESSION['codigodependente'] = $value1['codigoDependente'];
				$_SESSION['rgdependente'] = $value['rg'];
				$_SESSION['cidade'] = $value['cidade'];
				$_SESSION['sexotitular'] = $value['sexo'];
				$_SESSION['sexodependente'] = $value1['sexo'];
				$_SESSION['cepdependente'] = $value['cep'];
				$_SESSION['ruadependente'] = $value['logradouro'];
				$_SESSION['bairrodependente'] = $value['bairro'];
				$_SESSION['cepdependente'] = $value['cep'];
				$_SESSION['ufdependente'] = $value['ufSigla'];
				$_SESSION['numerodependente'] = $value['numero'];
				$_SESSION['nomedependente'] = $value1['nomeDependente'];
				$_SESSION['nomeplano'] = $value1['nomePlano'];
			}
		}
	}
}

foreach ($resultado as $value) {

	foreach ($value['dependentes'] as $value1) {

		foreach ((array)$value['contatos'] as $value2) {


			if ($value1['nomeSituacao'] != 'CANCELADO') {

				if ($value2['tipo'] == 'Celular') {
					$_SESSION['celulardependente'] = $value2['descricaoContato'];
					$y = 1;
				}
				if ($value2['tipo'] == 'E-mail') {
					$_SESSION['emaildependente'] = $value2['descricaoContato'];
					$z = 1;
				}
			}
		}
	}
}
$result_usuario3 = "SELECT * from dependentes where id ='$id'";
$resultado_usuario3 = mysqli_query($conexao, $result_usuario3);
$row_usuario3 = mysqli_fetch_assoc($resultado_usuario3);

if ($row_usuario3['parenstesco'] = 3) {
	$parentesco = 'Cônjuge';
} elseif ($row_usuario2['parenstesco'] = 4) {
	$parentesco = 'Filho';
} elseif ($row_usuario2['parenstesco'] = 6) {
	$parentesco = 'Enteado';
} elseif ($row_usuario2['parentesco']  = 8) {
	$parentesco = 'Pai/Mãe';
} elseif ($row_usuario2['parentesco']  = 10) {
	$parentesco = 'Outros';
}


if ($row_usuario3['sexo'] = 1) {
	$sexo = 'Masculino';
} else {
	$sexo = 'Feminino';
}
if ($row_usuario6['sexo'] = 1) {
	$sexo = 'Masculino';
} else {
	$sexo = 'Feminino';
}
$result_usuario12 = "SELECT * from vendedor where email = '$_SESSION[usuario]'";
$resultado_usuario12 = mysqli_query($conexao, $result_usuario12);
$row_usuario12 = mysqli_fetch_assoc($resultado_usuario12);
?>
<!DOCTYPE html>
<html>

<head>
	<?php include('include/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/build/jquery.steps.css">
	<style>
		label {
			color: #0099ff;
		}

		.form-group {
			background-color: aliceblue;
			padding: 12px;
			border-radius: 5px;

		}
	</style>
</head>

<body>
	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Resumo da Proposta</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Resumo da Proposta</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">

						</div>

						<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
							<div class="clearfix">
								<h4 class="text-blue">Detalhes</h4>

							</div>
							<div class="wizard-content">
								<form action="alteracao.php?cpf=<?php echo $row_usuario['cpf'] ?>&id=<?php echo $id ?>" method="POST" class="tab-wizard wizard-circle wizard"><br>
									<div style="text-align:right;">

										<?php

										if ($_SESSION['usuario']  === 'cadastro@s4e.com.br' &&  $row_usuario3['status'] === 'Em Analise') {
										?>

											<input type="submit" value="Implantar" name="status" class="btn btn-success">
											<input type="submit" value="Cancelar" name="status" class="btn btn-danger">
											<input type="submit" value="Indeferir" name="status" class="btn btn-primary">

										<?php
										} elseif ($_SESSION['usuario']  === 'cadastro@s4e.com.br' &&  $row_usuario3['status'] === 'Indeferido') {
										?>
											<input type="submit" value="Implantar" name="status" class="btn btn-success">
											<input type="submit" value="Cancelar" name="status" class="btn btn-danger">


										<?php
										} else {
										}
										?>
									</div><br>


									<br>

									<!-- Step 2 -->
									<h5>Responsavel Financeiro</h5>
									<section>
										<div class="row">
											<div class="col-md-5">
												<div class="form-group">
													<label>Nome :</label>
													<input type="text" value="<?php echo $_SESSION['nometitular'] ?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Contrato :</label>
													<input type="text" value="<?php echo $_SESSION['codresp'] ?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Data Nascimento:</label>
													<input type="text" value="<?php echo substr($_SESSION['datanascimentotitular'], 0, 10) ?>" class="form-control" readonly>
												</div>
											</div>

										</div>
										<div class="row">

											<div class="col-md-2">
												<div class="form-group">
													<label>Sexo:</label>
													<input type="text" value="<?php echo $_SESSION['sexotitular'] ?>" class="form-control" readonly>
												</div>
											</div>

											<div class="col-md-3">
												<div class="form-group">
													<label>CPF:</label>
													<input type="text" value="<?php echo $_SESSION['numerocpf'] ?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>RG:</label>
													<input type="text" value="<?php echo $_SESSION['rgdependente'] ?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Telefone:</label>
													<input type="text" value="<?php echo $_SESSION['celulardependente'] ?>" class="form-control" readonly>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<div class="form-group">
													<label>E-mail:</label>
													<input type="text" value="<?php echo $_SESSION['emaildependente'] ?>" class="form-control" readonly>
												</div>
											</div>



											<div class="col-md-2">
												<div class="form-group">
													<label>CEP:</label>
													<input type="text" name="cep" value="<?php echo $_SESSION['cepdependente'] ?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label> Rua:</label>
													<input type="text" name="rua" value="<?php echo $_SESSION['ruadependente'] ?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Numero:</label>
													<input type="text" name="numero" value="<?php echo $_SESSION['numerodependente'] ?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Cidade:</label>
													<input type="text" name="cidade" value="<?php echo  $_SESSION['cidade'] ?>" class="form-control" readonly>
												</div>
											</div>


											<div class="col-md-3">
												<div class="form-group">
													<label>Estado:</label>
													<input type="text" name="estado" value="<?php echo $_SESSION['ufdependente'] ?>" class="form-control" readonly>
												</div>
											</div>


										</div>
									</section>
									<!-- Step 3 -->
									<h5>Beneficiarios</h5>
									<section>
										<h4 class="text-blue"> Dependente: </h4>
										<br>
										<div class="row">
											<div class="col-md-3">
												<div class="form-group">
													<label>Codigo Resp Financeiro:</label>
													<input type="text" value="<?php echo $_SESSION['codresp'] ?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>CPF:</label>
													<input type="text" value="<?php echo $row_usuario3['cpf'] ?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label> Nome:</label>
													<input type="text" value="<?php echo $row_usuario3['nome'] ?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label> Data Nascimento:</label>
													<input type="text" value="<?php echo $row_usuario3['datas'] ?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Sexo:</label>
													<input type="text" value="<?php echo $sexo ?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Estado Civil:</label>
													<input type="text" value="<?php echo $row_usuario3['estadocivil'] ?>" class="form-control" readonly>
												</div>
											</div>


											<div class="col-md-3">
												<div class="form-group">
													<label>CNS :</label>
													<input type="text" value="<?php echo $row_usuario3['cns'] ?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label> Mãe:</label>
													<input type="text" value="<?php echo $row_usuario3['mae'] ?>" class="form-control" readonly>
												</div>


											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label> Parenstesco:</label>
													<input type="text" value="<?php echo $parentesco ?>" class="form-control" readonly>
												</div>


											</div>
										</div>
										<br><br>






									</section>
									<!-- Step 4 -->


									<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Motivo Indeferido</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<select class="form-control" placeholder="selecione" name="motivo">
														<option value="001- CPF Irregular">001- CPF Irregular</option>
														<option value="002- Divergência de DADOS">002- Divergência de DADOS </option>
														<option value="003- Imagem em Anexo corrompida">003- Imagem em Anexo corrompida</option>
														<option value="004- Imagem RG ilegível">004- Imagem RG ilegível</option>
														<option value="005- Falta documentos em anexo">005- Falta documentos em anexo</option>
														<option value="006- Falta cópia do Cartão de crédito">006- Falta cópia do Cartão de crédito</option>
														<option value="007- Dados divergentes titular">007- Dados divergentes titular</option>
														<option value="008- Dados divergentes dependente">008- Dados divergentes dependente</option>
														<option value="009- Cartão não pertence ao responsável Financeiro">009- Cartão não pertence ao responsável Financeiro </option>
														<option value="010- Cliente possui plano ativo">010- Cliente possui plano ativo</option>
														<option value="011- Dependente com plano ativo">011- Dependente com plano ativo</option>
														<option value="012- Cartão Ilegivel">012- Cartão Ilegivel</option>
														<option value="013- outros">013- outros</option>
														<option value="014- Campo de Descrição">014- Campo de Descrição</option>
														<option value="015- Matricula Incorreta">015- Matricula Incorreta</option>
														<option value="016- Comprovante de Residência ilegivel">016- Comprovante de Residência ilegivel</option>
														<option value="017- Beneficiario sem CNS">017- Beneficiario sem CNS</option>
														<option value="018- Falta Codigo de Validade do Cartão">018- Falta Codigo de Validade do Cartão</option>
														<option value="019- Falta Frente do RG">019- Falta Frente do RG</option>
													</select>

												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<input type="submit" value="Indeferido" name="status" class="btn btn-danger">
												</div>
											</div>
										</div>
									</div>


									<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Motivo Cancelamento</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<select class="form-control" placeholder="selecione" name="motivo1">
														<option value="001- Possui Codigo Ativo">001- Possui Codigo Ativo</option>
														<option value="002- Possui Divida Ativa">002- Possui Divida Ativa</option>
														<option value="003- Desistiu De Aderir ao Plano">003- Desistiu De Aderir ao Plano</option>
														<option value="004- Outros">004- Outros</option>
														<option value="005- Enviar Proposta Fisica">005- Enviar Proposta Fisica</option>
														<option value="006- Data De Adesão Incorret">006- Data De Adesão Incorreta</option>
														<option value="007- Proposta Cadastrada Incorretamente">007- Proposta Cadastrada Incorretamente</option>
														<option value="008- Cartao De Credito Vencido">008- Cartao De Credito Vencido</option>
														<option value="009- Cartao De Credito Nao Pertence a Responsavel">009- Cartao De Credito Nao Pertence a Responsavel</option>
														<option value="010- Sem Cpf">010- Sem Cpf</option>
														<option value="999- Rompimento De Contrato Por Solicitação Do Beneficiario">999- Rompimento De Contrato Por Solicitação Do Beneficiario</option>
													</select>

												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<input type="submit" value="Cancelado" name="status" class="btn btn-danger">
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>

					</div>
				</div>



				<!-- success Popup html End -->
			</div>

			<?php

			include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
	<script src="src/plugins/jquery-steps/build/jquery.steps.js"></script>
	<script>
		$(".tab-wizard").steps({
			headerTag: "h5",
			bodyTag: "section",
			transitionEffect: "fade",
			titleTemplate: '<span class="step">#index#</span> #title#',
			labels: {
				finish: "Proximo",
				next: "Proximo",
				previous: "Anterior",
			},
			onStepChanged: function(event, currentIndex, priorIndex) {
				$('.steps .current').prevAll().addClass('disabled');
			},

		});
	</script>
</body>

</html>