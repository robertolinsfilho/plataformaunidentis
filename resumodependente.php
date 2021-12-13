<?php
include_once "conexao.php";
session_start();
error_reporting(0);
$cpf = $_GET['key'];

$id = $_GET['id'];

$result_usuario = "SELECT * from dadospessoais where forekey ='$cpf'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

$queryDadosDependentes = mysqli_query($conexao, "SELECT * from dependentes where forekey ='$cpf'");
$dadosDependentes = mysqli_fetch_assoc($queryDadosDependentes);

$uCpf = str_replace('-','',str_replace('.','',$dadosDependentes['cpf_titular']));

//consultar no banco de dados
$_SESSION['cpfnova'] = $uCpf;

// $url = "http://unidentis.s4e.com.br/v2/api/associados?token=RWNTF7PUC87KRYRTVNFGP8XNYWJ4DQC4XWCGSHPW2F9FCURP82&limite=50&cpfAssociado=$uCpf";
// $curl = curl_init($url);
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
// $resultado = json_decode(curl_exec($curl), true);
// // Fecha a conexão
// curl_close($curl);

// $x = $resultado['dados'];
// $total = count($x);
// $total = $total - 1;
// $y = 0;
// $z = 0;
// $j = 0;

// // Get data
// for ($i = 0; $i <= $total; $i++) {
// $y = $x[$i]['dependentes'];
// $plano =  $y[0]['nomePlano'];
// // echo $x["$i"]['dependentes'][0]['nomeSituacao'] . " $i ";
// 	if ($x[$i]['dependentes'][0]['nomeSituacao'] == 'ATIVO') {
// 		$nome = $x[$i]['dependentes'][0]['nomeDependente'];
// 		$contrato = $x[$i]['dependentes'][0]['codigoDependente'];
// 		$nascimento = $x[$i]['dependentes'][0]['dataDeNascimento'];
// 		$sexo = $x[$i]['dependentes'][0]['sexo'];
// 		$uCpf = $x[$i]['dependentes'][0]['numeroCpfDependente'];
// 		$rg = $x[$i]['dependentes'][0]['numeroCarteira'];
// 		$cep = $x[$i]['cep'];
// 		foreach($x[$i]['dependentes'][0]['contatos'] as $value):
// 			if($value['tipo'] == "Fixo" || $value['tipo'] == "Celular") :
// 				$telefone = $value['descricaoContato'];				
// 			endif;
// 			if($value['tipo'] == "E-mail") :
// 				$email = $value['descricaoContato'];
// 			endif;
// 		endforeach;
// 		$rua = $x[$i]['logradouro'];
// 		$numero = $x[$i]['numero'];
// 		$cidade = $x[$i]['cidade'];
// 		$uf = $x[$i]['ufSigla'];
// 	}
// }

$url = "http://unidentis.s4e.com.br/v2/api/associados?token=RWNTF7PUC87KRYRTVNFGP8XNYWJ4DQC4XWCGSHPW2F9FCURP82&limite=50&cpfAssociado=$uCpf";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$resultado = json_decode(curl_exec($curl), true);
$resultado = $resultado['dados'];

foreach ((array)$resultado as $value) {
	foreach ((array)$value['dependentes'] as $value1) {
  
	  if ((int)$value1['codigoSituacao'] == 1 && (string)$value1['grauParentescoNome'] == "TITULAR") {
  
		$contatos = array_values((array)$value['contatos']);
  
		foreach ($contatos as $contato) {
		  if ((string)$contato["tipo"] == "Fixo" or (string)$contato["tipo"] == "Celular") {
			if (strlen((string)$contato['descricaoContato']) == 11) {
			  $telefone = $contato['descricaoContato'];
			}
		  }
  
		  $_SESSION['emaildependente'] = null;
		  if ((string)$contato["tipo"] == "E-mail") {
			$email = (string)$contato['descricaoContato'];
		  }
		}
  
		$rua    = $value['logradouro'];
		$numero = $value['numero'];
		$cidade = $value['cidade'];
		$uf     = $value['ufSigla'];
		$cep    = $value['cep'];
		$uCpf 	= $value['cpf'];
		$rg 	= $value['rg'];
		$sexo = $value['sexo'];
		$nascimento = date('d/m/Y', strtotime($value['dataDeNascimento']));
		$contrato = $value['codigo'];
		$nome = $value['nome'];
	  }
	}
  }

/**  ?????   **/
$result_usuario12 = "SELECT * from vendedor where email = '$_SESSION[usuario]'";
$resultado_usuario12 = mysqli_query($conexao, $result_usuario12);
$row_usuario12 = mysqli_fetch_assoc($resultado_usuario12);

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
	<style>
		<?php
			if ($_SESSION['usuario']  == 'cadastro@s4e.com.br'):
		?>
			div.ui-tabs.ui-corner-all.ui-widget.ui-widget-content{
				position: relative;
				top: -2rem;
			}
			ul.tabs{
				top: -5rem;
			}

			<?php if($dadosDependentes['status'] === 'Implantado'): ?>
				ul.tabs{
				top: -2.75rem;
				}
			<?php endif;?>

			div.submitBtns{
				position: relative;
				top: -2rem;
			}
		<?php
			else:
		?>
			div.ui-tabs.ui-corner-all.ui-widget.ui-widget-content{
				position: relative;
				top: -2rem;
			}
			ul.tabs{
				top: -2.75rem;
			}
		<?php
			endif;
		?>
		input[type=submit]{
			cursor: pointer;
		}
	</style>
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
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Resumo Dependentes</li>
								</ol>
							</nav>
						</div>
						<?php 
							if(isset($_SESSION['erroS4'])):
						?>
						<div class="alert alert-danger aviso-de-erro" role="alert"> <?= $_SESSION['erroS4']?> </div>
						<?php endif?>
						<div class="pd-20 bg-white border-radius-4 box-shadow mb-30 main-box-wizard">
							<div class="wizard-content">
								<form action="alteracao.php?key=<?= $cpf ?>&id=<?= $id ?>" method="POST" class="tab-wizard wizard-circle wizard"><br>
									<div class="submitBtns" style="text-align:right;">

										<?php
										if ($_SESSION['usuario']  === 'cadastro@s4e.com.br' &&  $dadosDependentes['status'] === 'Em Analise') {
										?>

											<input type="submit" value="Indeferir" name="status" class="btn btn-primary">
											<input type="submit" value="Cancelar" name="status" class="btn btn-danger">
											<input type="submit" value="Implantar" name="status" class="btn btn-success">

										<?php
										} elseif ($_SESSION['usuario']  === 'cadastro@s4e.com.br' &&  $dadosDependentes['status'] === 'Indeferido') {
										?>
											<input type="submit" value="Cancelar" name="status" class="btn btn-danger">
											<input type="submit" value="Implantar" name="status" class="btn btn-success">

										<?php
										} else {
										}
										?>
									</div>
									<div id="tabs">
										<ul class="tabs">
											<li><a class="tab_content" href="#tabs-1">Responsavel Financeiro</a></li>
											<li><a class="tab_content" href="#tabs-2">Beneficiários</a></li>
										</ul>
										<div id="tabs-1">
											<div class="flexLabel">
												<label class="labelInput">Responsavel Financeiro</label>
												<hr>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Nome :</label>
														<input type="text" value="<?= $nome?>" class="form-control" readonly>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label>Contrato :</label>
														<input type="text" value="<?= $contrato ?>" class="form-control" readonly>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label>Data Nascimento:</label>
														<input type="text" value="<?= substr($nascimento, 0, 10) ?>" class="form-control" readonly>
													</div>
												</div>

											</div>
											<div class="row">

												<div class="col-md-2">
													<div class="form-group">
														<label>Sexo:</label>
														<input type="text" value="<?= $sexo ?>" class="form-control" readonly>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label>CPF:</label>
														<input type="text" value="<?= $uCpf ?>" class="form-control" readonly>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label>RG:</label>
														<input type="text" value="<?= $rg ?>" class="form-control" readonly>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label>Telefone:</label>
														<input type="text" value="<?= $telefone ?>" class="form-control" readonly>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label>E-mail:</label>
														<input type="text" value="<?= $email ?>" class="form-control" readonly>
													</div>
												</div>



												<div class="col-md-2">
													<div class="form-group">
														<label>CEP:</label>
														<input type="text" name="cep" value="<?= $cep ?>" class="form-control" readonly>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label> Rua:</label>
														<input type="text" name="rua" value="<?= $rua ?>" class="form-control" readonly>
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label>Numero:</label>
														<input type="text" name="numero" value="<?= $numero ?>" class="form-control" readonly>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label>Cidade:</label>
														<input type="text" name="cidade" value="<?= $cidade ?>" class="form-control" readonly>
													</div>
												</div>


												<div class="col-md-3">
													<div class="form-group">
														<label>Estado:</label>
														<input type="text" name="estado" value="<?= $uf ?>" class="form-control" readonly>
													</div>
												</div>


											</div>
										</div>
										<div id="tabs-2">
											<div class="flexLabel">
												<label class="labelInput">Beneficiarios</label>
												<hr>
											</div>
											<?php
												$result_usuario = "SELECT * from dependentes  where forekey = '$cpf' and vizu = '1'";
												$resultado_usuario = mysqli_query($conexao, $result_usuario);
												while($dependentes = mysqli_fetch_assoc($resultado_usuario)){
											?>
											<div class="row">
												<div class="col-md-3">
													<div class="form-group">
														<label>Codigo Resp Financeiro:</label>
														<input type="text" value="<?= $contrato ?>" class="form-control" readonly>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label>CPF:</label>
														<input type="text" value="<?= $dependentes['cpf'] ?>" class="form-control" readonly>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label> Nome:</label>
														<input type="text" value="<?= $dependentes['nome'] ?>" class="form-control" readonly>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label> Data Nascimento:</label>
														<input type="text" value="<?= $dependentes['datas'] ?>" class="form-control" readonly>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label>Sexo:</label>
														<input type="text" value="<?= $dependentes['sexo'] == 1 ? "Masculino" : "Feminino" ?>" class="form-control" readonly>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label>Estado Civil:</label>
														<input type="text" value="<?= $dependentes['estadocivil'] ?>" class="form-control" readonly>
													</div>
												</div>


												<div class="col-md-3">
													<div class="form-group">
														<label>CNS :</label>
														<input type="text" value="<?= $dependentes['cns'] ?>" class="form-control" readonly>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label> Mãe:</label>
														<input type="text" value="<?= $dependentes['mae'] ?>" class="form-control" readonly>
													</div>


												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label> Parenstesco:</label>
														<?php 
														$parentsc;
														switch ($dependentes['parentesco']) {
														  case '4':
															$parentsc = 'Filho';
															break;
														  case '3':
															$parentsc = 'Conjuge';
															break;
														  case '6':
															$parentsc = 'Enteado';
															break;
														  case '8':
															$parentsc = 'Pai/mãe';
															break;
														  case '10':
															$parentsc = 'Outro(a)';
															break;
														};
														?>
														<input type="text" value="<?= $parentsc ?>" class="form-control" readonly>
													</div>

												</div>
											</div>
											<hr>

											<?php }; ?>
										</div>
									</div>
									<!-- Step 4 -->


									<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Motivo Indeferido</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true" style="font-weight: 500 !important;">&times;</span>
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
													<button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-weight: 500 !important;">Fechar</button>
													<input type="submit" value="Indeferido" name="status" class="btn btn-danger" style="font-weight: 500 !important;">
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
													<button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-weight: 500 !important;">Fechar</button>
													<input type="submit" value="Cancelado" name="status" style="font-weight: 500 !important;" class="btn btn-danger">
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
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
		$(function() {
			$("#tabs").tabs();
		});
	</script>
</body>

</html>