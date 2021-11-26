<?php

include_once "conexao.php";
session_start();
error_reporting(0);


$cpf = $_GET['key'];

//consultar no banco de dados
$_SESSION['cpfnova'] = $cpf;

// LISTAR OS DADOS GERAIS DO ASSOCIADO
$queryDadosGeraisAssociado = mysqli_query($conexao, "SELECT * from dadospessoais where forekey ='$cpf'");
$dadosGeraisAssociado = mysqli_fetch_assoc($queryDadosGeraisAssociado);

// VERIFICAR SE O ASSOCIADO É O TITULAR
if ($dadosGeraisAssociado['cpf_titular'] != $dadosGeraisAssociado['cpf']) {
	// LISTAR OS DADOS PRINCIPAIS DO TITULAR DESTE PLANO
	$queryDadosTitular = mysqli_query($conexao, "SELECT * from responsavel where foreky ='$dadosGeraisAssociado[cpf_titular]'");
	$dadosTitular = mysqli_fetch_assoc($queryDadosTitular);
} else {
	// ASSOCIADO TITULAR DO PLANO || LISTAR OS DADOS PRINCIPAIS DO TITULAR DESTE PLANO
	$queryDadosTitular = mysqli_query($conexao, "SELECT * from dadospessoais where forekey ='$cpf'");
	$dadosTitular = mysqli_fetch_assoc($queryDadosTitular);
}

// PEGA O CPF DO TITULAR DO PLANO
$cpf_titular = $dadosTitular['cpf'];

// GUARDA O EMAIL NA SESSAO
$_SESSION['eemail'] = $dadosGeraisAssociado['email'];

// LISTA OS DADOS DO CONTRATO CARTAO DE CREDITO
$queryDadosCartao = mysqli_query($conexao, "SELECT * from contratocartao  where forekey  = '$cpf'");
$dadosCartao = mysqli_fetch_assoc($queryDadosCartao);

// LISTA OS DADOS DO ANTIGO CONTRATO BOLETO, JÁ EM DESUSO
$queryDadosBoleto = mysqli_query($conexao, "SELECT * from contrato where forekey  = '$cpf'");
$dadosBoleto = mysqli_fetch_assoc($queryDadosBoleto);

// LISTA OS DADOS PRINCIPAIS DO ASSOCIADO
$queryDadosPrincipaisAssociado = mysqli_query($conexao, "SELECT * from dadosprincipais  where forekey  = '$cpf'");
$dadosPrincipaisAssociado = mysqli_fetch_assoc($queryDadosPrincipaisAssociado);

// LISTA OS DADOS DO ENDERECO QUE ESTA AMARRADO AO ASSOCIADO PELA CHAVE ESTRANGEIRA 'CPF'
$queryDadosEnderecoAssociado = mysqli_query($conexao, "SELECT * from endereco  where forekey  = '$cpf'");
$dadosEnderecoAssociado = mysqli_fetch_assoc($queryDadosEnderecoAssociado);

// $result_usuario5 = "SELECT * from dependentes  where cpf_titular  = '$cpf_titular'";
// $resultado_usuario5 = mysqli_query($conexao, $result_usuario5);
// $row_usuario5 = mysqli_fetch_assoc($resultado_usuario5);

// REALIZA A CONEXAO COM A TABELA DEPENDENTES PARA SER LISTADA LÁ NA FRENTE COM 'WHILE' 
$queryDadosDependentes = mysqli_query($conexao, "SELECT * from dependentes  where forekey  = '$cpf'");

// QUANTIDADE DE USUÁRIOS
$resultado_usuario15 = mysqli_query($conexao, "SELECT COUNT(*) AS total from dependentes  where forekey  = '$cpf' ");
$row_usuario15 = mysqli_fetch_assoc($resultado_usuario15);
// SEM UTILIZAÇÃO POR ORA 

// LISTA AS FOTOS VINCULADAS AO ASSOCIADO
$queryFotosAssociados = mysqli_query($conexao, "SELECT * from fotos  where forekey  = '$cpf'");
$fotosAssociados = mysqli_fetch_assoc($queryFotosAssociados);

// LISTA OS DADOS DO VENDEDOR
$queryDadosVendedor = mysqli_query($conexao, "SELECT * from vendedor where email = '$dadosGeraisAssociado[vendedor]'");
$dadosVendedor = mysqli_fetch_assoc($queryDadosVendedor);

// $result_usuario10 = "SELECT * from responsavel where cpf = '$cpf'";
// $resultado_usuario10 = mysqli_query($conexao, $result_usuario10);
// $row_usuario10 = mysqli_fetch_assoc($resultado_usuario10);

// if ($row_usuario10['cpf'] ===  $cpf) {
// 	$result_usuario9 = "SELECT * from responsavel where cpf = '$cpf'";
// 	$resultado_usuario9 = mysqli_query($conexao, $result_usuario9);
// 	$row_usuario9 = mysqli_fetch_assoc($resultado_usuario9);
// } else {
// 	$result_usuario9 = "SELECT * from dadospessoais where cpf = '$cpf'";
// 	$resultado_usuario9 = mysqli_query($conexao, $result_usuario9);
// 	$row_usuario9 = mysqli_fetch_assoc($resultado_usuario9);
// }

// $result_usuario12 = "SELECT * from vendedor where email = '$_SESSION[usuario]'";
// $resultado_usuario12 = mysqli_query($conexao, $result_usuario12);
// $row_usuario12 = mysqli_fetch_assoc($resultado_usuario12);

switch ($dadosPrincipaisAssociado['sexo']) {
	case 1:
		$sexo = 'Masculino';
		break;

	default:
		$sexo = 'Feminino';
		break;
}

?>
<!DOCTYPE html>
<html>

<head>
	<script type="text/javascript">
		$(document).ready(function() {

			//When page loads...
			$("ul.tabs li:first-child a").addClass("active").show(); //Activate first tab
			$(".tab_content #link1").css("display", "block"); //Show first tab content

			//On Click Event
			$("ul.tabs li a").click(function() {

				$("ul.tabs li a").removeClass("active"); //Remove any "active" class
				$(".tab_content div").css("display", "none");

				$(this).addClass("active"); //Add "active" class to selected tab


				var activeTab = $(this).attr("href"); //Find the href attribute value to identify the active tab + content
				$(activeTab).fadeIn(); //Fade in the active ID content
				return false;
			});

		});
	</script>
	<?php include('include/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/build/jquery.steps.css">
	<link rel="stylesheet" href="./assets/css/style.css">
	<link rel="stylesheet" href="./assets/css/formWizard.css">
</head>

<body>

	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<!-- <div class="title">
								<h4>Resumo da Proposta</h4>
							</div> -->
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Resumo da Proposta</li>
								</ol>
							</nav>
						</div>
						<div class="pd-20 bg-white border-radius-4 box-shadow mb-30 main-box-wizard">

							<div class="wizard-content">
								<form action="alteracao.php?key=<?= $cpf ?>" method="POST" class="tab-wizard wizard-circle wizard">
									<div class="btn-relative">
										<input type="submit" value="Alterar" name="status" class="btn btn-outline-secondary">

										<?php
										if ($dadosGeraisAssociado['status'] == 'Nova') {
										?>
											<input type="submit" value="Apagar Proposta" name="status" class="btn btn-danger">
											<input type="submit" value="Enviar Email" name="status" class="btn btn-success">

										<?php
										}
										if ($dadosGeraisAssociado['pagamento'] == 0 and $dadosGeraisAssociado['ativo'] == 1 and $dadosGeraisAssociado['plano'] != 'UNIDENTISVIPEMPRESARIAL' and  $dadosGeraisAssociado['status'] != 'Cancelado') {
										?>
											<button type="button" class="btn btn-danger" onclick="desaparecer()" data-toggle="modal" data-target="#exampleModal2">
												Cancelar
											</button>
											<input type="submit" value="Enviar para Analise" name="status" class="btn btn-success">

										<?php
										}
										?>
										<?php
										if ($dadosGeraisAssociado['status'] == 'Indeferido' or $dadosGeraisAssociado['status'] == 'Cancelado') {
										?>
											<div style="text-align: left;" class="alert alert-danger" role="alert">
												<?php echo $dadosGeraisAssociado['indeferida'] ?>
											</div>
										<?php
										};

										if ($_SESSION['usuario']  === 'cadastro@s4e.com.br' && $dadosGeraisAssociado['pagamento'] != 0 && $dadosGeraisAssociado['status'] == 'Em Analise' ) {
										?>

											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
												Cancelar
											</button>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
												Indeferir
											</button>

											<input type="submit" value="Implantadas" name="status" class="btn btn-success">

										<?php
										} elseif ($dadosGeraisAssociado['status'] == 'Indeferido'  and $_SESSION['usuario']  === 'cadastro@s4e.com.br' and $dadosGeraisAssociado['pagamento'] != 0) {

										?>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
												Cancelar
											</button>
											<input type="submit" value="Implantadas" name="status" class="btn btn-success">
										<?php
										} elseif ($dadosGeraisAssociado['status'] == 'Indeferido'  and $_SESSION['usuario']  != 'cadastro@s4e.com.br' and $dadosGeraisAssociado['pagamento'] != 0) {
										?>
											<input type="submit" value="Enviar para Analise" name="status" class="btn btn-success">

										<?php
										}

										?>
									</div>

									<div id="tabs">
										<ul class="tabs">
											<li><a class="tab_content" href="#tabs-1">Proposta</a></li>
											<li><a class="tab_content" href="#tabs-2">Responsavel Financeiro</a></li>
											<li><a class="tab_content" href="#tabs-3">Beneficiarios</a></li>
											<li><a class="tab_content" href="#tabs-4">Imagens</a></li>
										</ul>
										<?php 
											if(isset($_SESSION['erroS4'])):
										?>
										<div class="alert alert-danger aviso-de-erro" role="alert"> <?= $_SESSION['erroS4']?> </div>
										<?php endif?>
										<div id="tabs-1">
											<div class="flexLabel">
												<label class="labelInput">Plano Contrato</label>
												<hr>
											</div>

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Plano</label>
														<input type="text" name="plano" value="<?php echo $dadosGeraisAssociado['plano']; ?>" class="form-control" readonly>

													</div>
												</div>

												<div class="col-md-3">
													<div class="form-group">
														<label>Preço </label>
														<input type="text" name="preco" value="R$: <?php echo $dadosGeraisAssociado['preco']; ?>" class="form-control" readonly>
													</div>
												</div>

												<div class="col-md-3">
													<div class="form-group">
														<label>Data </label>
														<input type="text" value="<?php echo substr($dadosGeraisAssociado['data'], 0, 10) ?>" class="form-control" readonly>
													</div>
												</div>
											</div>

											<?php
											if ($_SESSION['usuario'] == 'cadastro@s4e.com.br') {
											?>
												<h4 class="text-blue">Data do Primeiro Pagamento</h4>
												<div class="row">
													<div class="col-md-3">
														<div class="form-group">
															<label>Ano </label>
															<select class="form-control" name="ano">
																<option value="<?php echo substr($dadosGeraisAssociado['1pag'], 0, 4) ?>"> <?php echo substr($dadosGeraisAssociado['1pag'], 0, 4) ?></option>
																<option value="2022"></option>
															</select>
														</div>
													</div>

													<div class="col-md-3">
														<div class="form-group">
															<label>Mês </label>
															<select class="form-control" name="mes">
																<option value="<?php echo substr($dadosGeraisAssociado['1pag'], 4, 6) ?>"> <?php echo substr($dadosGeraisAssociado['1pag'], 4, 6) ?></option>
																<option value="01">01</option>
																<option value="02">02</option>
																<option value="03">03</option>
																<option value="04">04</option>
																<option value="05">05</option>
																<option value="06">06</option>
																<option value="07">07</option>
																<option value="08">08</option>
																<option value="09">09</option>
																<option value="10">10</option>
																<option value="11">11</option>
																<option value="12">12</option>
															</select>
														</div>
													</div>

												</div>
											<?php
											}
											?>



											<!-- <h4 class="text-blue">Corretora</h4> -->
											<div class="row">
												<div class="col-md-5">
													<div class="form-group">
														<label>Corretor </label>
														<input type="text" name="corretor" value="<?php echo $dadosVendedor['vendedor'] ?>" class="form-control" readonly>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label>Nome da Corretora </label>
														<input type="text" value="<?php echo $dadosVendedor['corretora'] ?>" class="form-control" readonly>
													</div>
												</div>

												<div class="col-md-3">
													<div class="form-group">
														<label>Codigo Corretora </label>
														<input type="text" value="<?php echo $dadosVendedor['email'] ?>" class="form-control">
													</div>
												</div>
											</div>

											<?php
											if ($dadosGeraisAssociado['plano'] === 'UNIDENTISVIPCARTAO' or $dadosGeraisAssociado['plano'] === 'UNIDENTISVIPFAMILIACARTAO' or $dadosGeraisAssociado['plano'] === 'PLANOVIPORTOCARTAO') {
											?>
												<div class="flexLabel">
													<label class="labelInput">Informações de Pagamento</label>
													<hr>
												</div>
												<div class="row">
													<div class="col-md-5">
														<div class="form-group">
															<label>Titular </label>
															<input type="text" name="nomecartao" value="<?php echo $dadosCartao['nome'] ?>" class="form-control">
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label>Número do Cartão </label>
															<input type="text" name="numerocartao" value="<?php echo $dadosCartao['cartao'] ?>" class="form-control">
														</div>
													</div>

													<div class="col-md-2">
														<div class="form-group">
															<label> Validade </label>
															<input type="text" name="validadecartao" value="<?php echo $dadosCartao['mes'] ?>" class="form-control">
														</div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
															<label> cvv </label>
															<input type="text" name="cvvcartao" value="<?php echo $dadosCartao['cvv'] ?>" class="form-control">
														</div>
													</div>
												</div>
											<?php
											}
											?>
											<div class="row">
												<div class="col-md-7">
													<div class="form-group">
														<label> Observação </label>
														<textarea placeholder="Coloque aqui sua observação" id="observation" name="observacao" maxlength="220" class="form-control"><?php echo $dadosGeraisAssociado['observacao'] ?></textarea>
													</div>
												</div>
											</div>

											<script>
												function desaparecer() {
													$(".form-check-input").removeAttr("required");
												}
											</script>
											<?php
											if ($dadosGeraisAssociado['pagamento'] == 0 && $dadosGeraisAssociado['status'] != 'Nova') {
											?>

												<h4 class="text-blue">Pagamento da Adesão</h4>

												<div class="form-check">
													<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
													<label class="form-check-label" for="invalidCheck">
														Declaro que recebi do responsável financeiro o valor referente a adesão do plano.
													</label>


												</div>

											<?php
											}
											?>
										</div>



										<!-- Step 2 -->

										<div id="tabs-2">
											<div class="flexLabel">
												<label class="labelInput">Responsavel Financeiro</label>
												<hr>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label>Nome </label>
														<input type="text" name="nome" value="<?php echo $dadosGeraisAssociado['nome'] ?>" class="form-control">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label>CPF</label>
														<input type="text" name="cpf" value="<?php echo $dadosGeraisAssociado['cpf'] ?>" class="form-control">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label>RG</label>
														<input type="text" name="rg" value="<?php echo $dadosPrincipaisAssociado['rg'] ?>" class="form-control">
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label>Órgão Emissor</label>
														<input type="text" name="expedidor" value="<?php echo $dadosPrincipaisAssociado['expedidor'] ?>" class="form-control">
													</div>
												</div>
											</div>
											<!--row-->
											<div class="row">
												<div class="col-md-3">
													<div class="form-group">
														<label>Sexo</label>
														<select class="form-control" name="sexo">
															<option value="<?php $dadosPrincipaisAssociado['sexo'] ?>"><?php echo $sexo ?></option>
															<option value="1">Masculino</option>
															<option value="0">Feminino</option>
														</select>
													</div>
												</div>

												<div class="col-md-3">
													<div class="form-group">
														<label>Data de Nascimento</label>
														<input type="text" name="nascimento" value="<?php echo $dadosPrincipaisAssociado['datas'] ?>" class="form-control">
													</div>
												</div>

												<div class="col-md-2">
													<div class="form-group">
														<label>Estado Civil</label>
														<input type="text" value="<?php echo $dadosPrincipaisAssociado['estadocivil'] ?>" class="form-control" readonly>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label>Nome da Mãe</label>
														<input type="text" name="mae" value="<?php echo $dadosGeraisAssociado['mae'] ?>" class="form-control">
													</div>
												</div>



											</div>
											<div class="row">
												<div class="col-md-3">
													<div class="form-group">
														<label>Cartão do SUS</label>
														<input type="text" name="sus" value="<?php echo $dadosGeraisAssociado['sus'] ?>" class="form-control">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label>E-mail</label>
														<input type="text" name="email" value="<?php echo $dadosGeraisAssociado['email'] ?>" class="form-control">
													</div>
												</div>

												<div class="col-md-3">
													<div class="form-group">
														<label>Telefone 1</label>
														<input type="text" name="celular" value="<?php echo $dadosGeraisAssociado['celular'] ?>" class="form-control">
													</div>
												</div>

												<div class="col-md-3">
													<div class="form-group">
														<label>Telefone 2</label>
														<input type="text" value="<?php echo $dadosPrincipaisAssociado['whats'] ?>" class="form-control">
													</div>
												</div>

											</div>
											<div class="row">
												<div class="col-md-1">
													<div class="form-group">
														<label>Local</label>
														<input type="text" value="<?php echo $dadosGeraisAssociado['local'] ?>" class="form-control">
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label>CEP</label>
														<input type="text" name="cep" value="<?php echo $dadosEnderecoAssociado['cep'] ?>" class="form-control" readonly>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label> Rua</label>
														<input type="text" name="rua" value="<?php echo $dadosEnderecoAssociado['rua'] ?>" class="form-control" readonly>
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label>Número</label>
														<input type="text" name="numero" value="<?php echo $dadosEnderecoAssociado['numero'] ?>" class="form-control">
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label>Cidade</label>
														<input type="text" name="cidade" value="<?php echo $dadosEnderecoAssociado['cidade'] ?>" class="form-control" readonly>
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label>Estado</label>
														<input type="text" name="estado" value="<?php echo $dadosEnderecoAssociado['estado'] ?>" class="form-control" readonly>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label> Complemento</label>
														<input type="text" name="complemento" value="<?php echo $dadosEnderecoAssociado['complemento'] ?>" class="form-control">
													</div>
												</div>
												<?php if ($_SESSION['usuario'] == 'cadastro@s4e.com.br') : ?>
													<div class="col-md-2">
														<div class="form-group">
															<label>Senha</label>
															<input type="text" name="senha" value="<?php echo $dadosPrincipaisAssociado['initpass'] ?>" class="form-control" readonly>
														</div>
													</div>
												<?php endif ?>
											</div>
											<div class="row">



											</div>
										</div>
										<!-- Step 3 -->

										<div id="tabs-3">
											<div class="flexLabel">
												<label class="labelInput">Titular</label>
												<hr>
											</div>
											<div class="row">
												<div class="col-md-3">
													<div class="form-group">
														<label>Nome</label>
														<input type="text" value="<?php echo $dadosTitular['nome'] ?>" class="form-control">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label> Mãe</label>
														<input type="text" value="<?php echo $dadosTitular['mae'] ?>" class="form-control">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label>CPF</label>
														<input type="text" value="<?php echo $dadosTitular['cpf'] ?>" class="form-control">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label>Estado Civil</label>
														<input type="text" value="<?php echo $dadosTitular['estado'] ?>" class="form-control">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-3">
													<div class="form-group">
														<label>Sexo </label>
														<input type="text" value="<?php echo $sexo ?>" class="form-control">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label> Cartão do SUS</label>
														<input type="text" value="<?php echo $dadosTitular['sus'] ?>" class="form-control">
													</div>

												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label> Data de Nascimento</label>
														<input type="text" value="<?php echo $dadosTitular['nascimento'] ?>" class="form-control">
													</div>

												</div>


											</div>


											<?php


											while ($dadosDependentes = mysqli_fetch_assoc($queryDadosDependentes)) {
												switch ($dadosDependentes['sexo']) {
													case 1:
														$sexo = 'Masculino';
														break;

													default:
														$sexo = 'Feminino';
														break;
												};
											?>
												<h4 class="text-blue">Beneficiarios</h4>
												<div class="row">


													<div class="col-md-3">
														<div class="form-group">
															<label>nome</label>
															<input type="text" value="<?php echo $dadosDependentes['nome'] ?>" class="form-control" readonly>
														</div>
													</div>


													<div class="col-md-3">
														<div class="form-group">
															<label> Cpf</label>
															<input type="text" name="cpf_dependente" value="<?php echo $dadosDependentes['cpf'] ?>" class="form-control">
														</div>

													</div>


													<div class="col-md-3">
														<div class="form-group">
															<label> Datas de nascimento</label>
															<input type="text" value="<?php echo $dadosDependentes['datas'] ?>" class="form-control">
														</div>

													</div>


													<div class="col-md-3">
														<div class="form-group">
															<label> Sexo</label>
															<input type="text" value="<?php echo $sexo ?>" class="form-control">
														</div>

													</div>


													<div class="col-md-3">
														<div class="form-group">
															<label> Mãe</label>
															<input type="text" value="<?php echo $dadosDependentes['mae'] ?>" class="form-control">
														</div>

													</div>


													<div class="col-md-3">
														<div class="form-group">
															<label> Cns</label>
															<input type="text" value="<?php echo $dadosDependentes['cns'] ?>" class="form-control">
														</div>

													</div>

													<?php
													if ($dadosDependentes['parentesco'] == 3) {
														$parentesco = 'Cônjuge';
													} elseif ($dadosDependentes['parentesco'] == 4) {
														$parentesco = 'Filho';
													} elseif ($dadosDependentes['parentesco'] == 6) {
														$parentesco = 'Enteado';
													} elseif ($dadosDependentes['parentesco']  == 8) {
														$parentesco = 'Pai/Mãe';
													} elseif ($dadosDependentes['parentesco'] == 10) {
														$parentesco = 'Outros';
													}
													?>
													<div class="col-md-3">
														<div class="form-group">
															<label> Parentesco</label>
															<input type="text" value="<?php echo $parentesco ?>" class="form-control">
														</div>

													</div>

												</div>

											<?php
											}
											?>



										</div>
										<!-- Step 4 -->
										<?php
										if ($dadosGeraisAssociado['plano'] != 'UNIDENTISVIPEMPRESARIAL') {
										?>


											<div id="tabs-4">
												<div class="flexLabel">
													<label class="labelInput">Imagens</label>
													<hr>
												</div>
												<div class="alert alert-success rotate-success" role="alert" style="position:absolute;visibility: hidden;">
													Rotação realizada com sucesso! Clique na imagem para ver a alteração!
												</div>
												<div class="row">

													<div class="col-md-4">
														<div class="form-group">
															<h3 class='imgS imgSEnd'>RG Frente</h3>

															<a href="fotos/<?php echo $fotosAssociados['rgfrente'] ?>" target="_blank">
																<div id="rgfrenteimg" class='wBackImg' style='background-image: url("fotos/<?php
																															$end = explode('.', $fotosAssociados['rgfrente']);
																															echo $end[count($end) - 1] == 'pdf' ? '../assets/img/icon_pdf.png' : $fotosAssociados['rgfrente']; ?>");'></div>
															</a>
															<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal5">
																Editar
															</button>
															<?php if($end[count($end) - 1] != 'pdf'):?>
															<button id="rgfrente1" type="button" fname = "<?= $fotosAssociados['rgfrente']?>" class="btn btn-secondary minus-rotate"><i  class="fa fa-undo" aria-hidden="true"></i></button>
          													<button id="rgfrente2" type="button" fname = "<?= $fotosAssociados['rgfrente']?>" class="btn btn-secondary plus-rotate"><i class="fa fa-repeat" aria-hidden="true"></i></button>
															<?php endif?>
														</div>
													</div>


													<div class="col-md-4">
														<div class="form-group">
															<h3 class='imgS imgSEnd'>RG Verso</h3>

															<a href="fotos/<?php echo $fotosAssociados['rgverso'] ?>" target="_blank">
																<div id="rgversoimg"class='wBackImg' style='background-image: url("fotos/<?php
																															$end = explode('.', $fotosAssociados['rgverso']);
																															echo $end[count($end) - 1] == 'pdf' ? '../assets/img/icon_pdf.png' : $fotosAssociados['rgverso']; ?>")'></div>
															</a>
															<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal6">
																Editar
															</button>
															<?php if($end[count($end) - 1] != 'pdf'):?>
															<button id="rgverso1" type="button" fname = "<?= $fotosAssociados['rgverso']?>" class="btn btn-secondary minus-rotate"><i  class="fa fa-undo" aria-hidden="true"></i></button>
          													<button id="rgverso2" type="button" fname = "<?= $fotosAssociados['rgverso']?>" class="btn btn-secondary plus-rotate"><i class="fa fa-repeat" aria-hidden="true"></i></button>
															<?php endif?>
														</div>

													</div>


													<div class="col-md-4">
														<div class="form-group">
															<h3 class='imgS imgSEnd'>CPF</h3>

															<a href="fotos/<?php echo $fotosAssociados['cpf'] ?>" target="_blank">
																<div id ="cpfimg"class='wBackImg' style='background-image: url("fotos/<?php
																															$end = explode('.', $fotosAssociados['cpf']);
																															echo $end[count($end) - 1] == 'pdf' ? '../assets/img/icon_pdf.png' : $fotosAssociados['cpf']; ?>");'></div>
															</a>
															<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal7">
																Editar
															</button>
															<?php if($end[count($end) - 1] != 'pdf'):?>
															<button id="cpf1"type="button" fname = "<?= $fotosAssociados['cpf']?>" class="btn btn-secondary minus-rotate"><i  class="fa fa-undo" aria-hidden="true"></i></button>
          													<button id="cpf2"type="button" fname = "<?= $fotosAssociados['cpf']?>" class="btn btn-secondary plus-rotate"><i class="fa fa-repeat" aria-hidden="true"></i></button>
															<?php endif?>
														</div>

													</div>


													<div class="col-md-4">
														<div class="form-group">
															<h3 class='imgS imgSEnd'>Comp Residência</h3>

															<a href="fotos/<?php echo $fotosAssociados['compresidencia'] ?>" target="_blank">
																<div id="compimg" class='wBackImg' style='background-image: url("fotos/<?php
																															$end = explode('.', $fotosAssociados['compresidencia']);
																															echo $end[count($end) - 1] == 'pdf' ? '../assets/img/icon_pdf.png' : $fotosAssociados['compresidencia']; ?>");'></div>
															</a>
															<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal8">
																Editar
															</button>
															<?php if($end[count($end) - 1] != 'pdf'):?>
															<button id="comp1"type="button" fname = "<?= $fotosAssociados['compresidencia']?>" class="btn btn-secondary minus-rotate"><i  class="fa fa-undo" aria-hidden="true"></i></button>
          													<button id ="comp2"type="button" fname = "<?= $fotosAssociados['compresidencia']?>" class="btn btn-secondary plus-rotate"><i class="fa fa-repeat" aria-hidden="true"></i></button>
															<?php endif?>
														</div>

													</div>

													<?php if ($dadosGeraisAssociado['plano'] != 'UNIDENTISVIPBOLETO') {
													?>

														<div class="col-md-4">
															<div class="form-group">
																<h3 class='imgS imgSEnd'>Cartão</h3>

																<a href="fotos/<?php echo $fotosAssociados['cartao'] ?>" target="_blank">
																	<div id="cartaoimg"class='wBackImg' style='background-image: url("fotos/<?php
																																$end = explode('.', $fotosAssociados['cartao']);
																																echo $end[count($end) - 1] == 'pdf' ? '../assets/img/icon_pdf.png' : $fotosAssociados['cartao']; ?>")'></div>
																</a>

																<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal9">Editar</button>
																<?php if($end[count($end) - 1] != 'pdf'):?>
																<button id="cartao1" type="button" fname = "<?= $fotosAssociados['cartao']?>" class="btn btn-secondary minus-rotate"><i  class="fa fa-undo" aria-hidden="true"></i></button>
																<button id="cartao2" type="button" fname = "<?= $fotosAssociados['cartao']?>" class="btn btn-secondary plus-rotate"><i class="fa fa-repeat" aria-hidden="true"></i></button>
																<?php endif?>
															</div>

														</div>
													<?php } ?>
													<div class="col-md-4">
														<div class="form-group">
															<h3 class='imgS imgSEnd'>Outro</h3>

															<a href="fotos/<?php echo $fotosAssociados['outro'] ?>" target="_blank">
																<div class='wBackImg' id ="outroimg" style='background-image: url("fotos/<?php
																															$end = explode('.', $fotosAssociados['outro']);
																															echo $end[count($end) - 1] == 'pdf' ? '../assets/img/icon_pdf.png' : $fotosAssociados['outro']; ?>")'></div>
															</a>
															<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal10">Editar</button>
															<?php if($end[count($end) - 1] != 'pdf'):?>
															<button id="outro1" type="button" fname = "<?= $fotosAssociados['cartao']?>" class="btn btn-secondary minus-rotate"><i  class="fa fa-undo" aria-hidden="true"></i></button>
          													<button id="outro2"type="button" fname = "<?= $fotosAssociados['cartao']?>" class="btn btn-secondary plus-rotate"><i class="fa fa-repeat" aria-hidden="true"></i></button>
															<?php endif?>
														</div>

													</div>


												</div>
											</div>
									</div>
								<?php
										}
								?>
								<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Motivo Indeferido</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true" style="font-weight: 500 !important">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<select style='top: 0' class="form-control" placeholder="selecione" name="motivo">
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
													<span aria-hidden="true" style="font-weight: 500 !important;">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<select style='top: 0;' class="form-control" placeholder="selecione" name="motivo1">
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
												<input type="submit" value="Cancelado" name="status" class="btn btn-danger" id="prosseguir">
											</div>
										</div>
									</div>
								</div>
								</form>
							</div>
						</div>

					</div>
				</div>

				<style>
					.drop-zone {
						max-width: 350px;
						height: 200px;
						padding: 10px;
						display: flex;
						align-items: center;
						justify-content: center;
						text-align: center;
						font-family: "Quicksand", sans-serif;
						font-weight: 500;
						font-size: 20px;
						cursor: pointer;
						color: #cccccc;
						border: 4px dashed #3284f1;
						border-radius: 10px;
						margin: 0 auto;
						position: relative;
					}


					.drop-zone--over {
						border-style: solid;
					}

					.drop-zone__input {
						display: none;
					}

					.drop-zone__thumb {
						width: 100%;
						height: 100%;
						border-radius: 10px;
						overflow: hidden;
						background-color: #cccccc;
						background-size: cover;
						position: relative;
					}

					.drop-zone__thumb::after {
						content: attr(data-label);
						position: absolute;
						bottom: 0;
						left: 0;
						width: 100%;
						padding: 5px 0;
						color: #ffffff;
						background: rgba(0, 0, 0, 0.75);
						font-size: 14px;
						text-align: center;
					}

					.text-blue1 {
						margin-left: 16%;
						margin-top: 4%;
						position: absolute;
						font-size: 28px;
						color: #3284f1;
						width: 20%;
						height: 100px;
						background-color: #cccccc;
						text-align: center;
						padding-top: 30px;
						border-radius: 5px;


					}
				</style>

				<!-- success Popup html End -->
			</div>
			<div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Alterar Foto</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true" style="font-weight: 500 !important;">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" action="alterarfotos?nome=rgfrente&key=<?= $cpf ?>" enctype="multipart/form-data">
								<div class="drop-zone">
									<span class="drop-zone__prompt">Clique para Selecionar uma Imagem</span>
									<input type="file" name="arquivo10[]" multiple="multiple" class="drop-zone__input">
								</div>

						</div>
						<div class="modal-footer">
							<input type="submit" name="SendCadImg" class="btn btn-primary">
						</div>
						</form>
					</div>
				</div>
			</div>

			<div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Alterar Foto</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true" style="font-weight: 500 !important;">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" action="alterarfotos?nome=rgverso&key=<?= $cpf ?>" enctype="multipart/form-data">
								<div class="drop-zone">
									<span class="drop-zone__prompt">Clique para Selecionar uma Imagem</span>
									<input type="file" name="arquivo10[]" multiple="multiple" class="drop-zone__input">
								</div>

						</div>
						<div class="modal-footer">
							<input type="submit" name="SendCadImg" class="btn btn-primary">
						</div>
						</form>
					</div>
				</div>
			</div>

			<div class="modal fade" id="exampleModal7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Alterar Foto</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true" style="font-weight: 500 !important;">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" action="alterarfotos?nome=cpf&key=<?= $cpf ?>" enctype="multipart/form-data">
								<div class="drop-zone">
									<span class="drop-zone__prompt">Clique para Selecionar uma Imagem</span>
									<input type="file" name="arquivo10[]" multiple="multiple" class="drop-zone__input">
								</div>

						</div>
						<div class="modal-footer">
							<input type="submit" name="SendCadImg" class="btn btn-primary">
						</div>
						</form>
					</div>
				</div>
			</div>

			<div class="modal fade" id="exampleModal8" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Alterar Foto</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true" style="font-weight: 500 !important;">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" action="alterarfotos?nome=compresidencia&key=<?= $cpf ?>" enctype="multipart/form-data">
								<div class="drop-zone">
									<span class="drop-zone__prompt">Clique para Selecionar uma Imagem</span>
									<input type="file" name="arquivo10[]" multiple="multiple" class="drop-zone__input">
								</div>

						</div>
						<div class="modal-footer">
							<input type="submit" name="SendCadImg" class="btn btn-primary">
						</div>
						</form>
					</div>
				</div>
			</div>

			<div class="modal fade" id="exampleModal9" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Alterar Foto</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true" style="font-weight: 500 !important;">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" action="alterarfotos?nome=cartao&key=<?= $cpf ?>" enctype="multipart/form-data">
								<div class="drop-zone">
									<span class="drop-zone__prompt">Clique para Selecionar uma Imagem</span>
									<input type="file" name="arquivo10[]" multiple="multiple" class="drop-zone__input">
								</div>

						</div>
						<div class="modal-footer">
							<input type="submit" name="SendCadImg" class="btn btn-primary">
						</div>
						</form>
					</div>
				</div>
			</div>

			<div class="modal fade" id="exampleModal10" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Alterar Foto</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true" style="font-weight: 500 !important;">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" action="alterarfotos?nome=outro&key=<?= $cpf ?>" enctype="multipart/form-data">
								<div class="drop-zone">
									<span class="drop-zone__prompt">Clique para Selecionar uma Imagem</span>
									<input type="file" name="arquivo10[]" multiple="multiple" class="drop-zone__input">
								</div>

						</div>
						<div class="modal-footer">
							<input type="submit" name="SendCadImg" class="btn btn-primary">
						</div>
						</form>
					</div>
				</div>
			</div>

			<!-- ROTATE IMAGE SECTION -->
			<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
			<script src="./assets/js/rotate-img.js"></script>
			<!-- END ROTATE IMAGE SECTION -->

			<script>
				document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
					const dropZoneElement = inputElement.closest(".drop-zone");

					dropZoneElement.addEventListener("click", (e) => {
						inputElement.click();
					});

					inputElement.addEventListener("change", (e) => {
						if (inputElement.files.length) {
							updateThumbnail(dropZoneElement, inputElement.files[0]);
						}
					});

					dropZoneElement.addEventListener("dragover", (e) => {
						e.preventDefault();
						dropZoneElement.classList.add("drop-zone--over");
					});

					["dragleave", "dragend"].forEach((type) => {
						dropZoneElement.addEventListener(type, (e) => {
							dropZoneElement.classList.remove("drop-zone--over");
						});
					});

					dropZoneElement.addEventListener("drop", (e) => {
						e.preventDefault();

						if (e.dataTransfer.files.length) {
							inputElement.files = e.dataTransfer.files;
							updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
						}

						dropZoneElement.classList.remove("drop-zone--over");
					});
				});

				/**
				 * Updates the thumbnail on a drop zone element.
				 *
				 * @param {HTMLElement} dropZoneElement
				 * @param {File} file
				 */
				function updateThumbnail(dropZoneElement, file) {
					let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

					// First time - remove the prompt
					if (dropZoneElement.querySelector(".drop-zone__prompt")) {
						dropZoneElement.querySelector(".drop-zone__prompt").remove();
					}

					// First time - there is no thumbnail element, so lets create it
					if (!thumbnailElement) {
						thumbnailElement = document.createElement("div");
						thumbnailElement.classList.add("drop-zone__thumb");
						dropZoneElement.appendChild(thumbnailElement);
					}

					thumbnailElement.dataset.label = file.name;

					// Show thumbnail for image files
					if (file.type.startsWith("image/")) {
						const reader = new FileReader();

						reader.readAsDataURL(file);
						reader.onload = () => {
							thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
						};
					} else if (file.type == 'application/pdf') {
						thumbnailElement.style.backgroundImage = `url('./assets/img/icon_pdf.png')`;
						thumbnailElement.style.backgroundSize = '60%';
						thumbnailElement.style.backgroundRepeat = 'no-repeat';
						thumbnailElement.style.backgroundPosition = 'center';
					} else {
						thumbnailElement.style.backgroundImage = null;
					}
				}
			</script>

			<?php

			include('include/footer.php'); ?>
		</div>
		<!--aqui-->
	</div>
	<?php include('include/script.php'); ?>
	<script src="src/plugins/jquery-steps/build/jquery.steps.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
		$(function() {
			$("#tabs").tabs();
		});
	</script>
	<script>
		//$(".tab-wizard").steps({
		//	headerTag: "h5",
		//	bodyTag: "section",
		//	transitionEffect: "fade",
		//	titleTemplate: '<span class="step">#index#</span> #title#',
		//	labels: {
		//	finish: "Proximo",
		//		next: "Proximo",
		//		previous: "Anterior",
		//	},
		// onStepChanged: function(event, currentIndex, priorIndex) {
		// 	$('.steps .current').prevAll().addClass('disabled');
		// },

		//});

	</script>
</body>

</html>