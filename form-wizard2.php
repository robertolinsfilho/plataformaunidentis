<?php

include_once "conexao.php";


$cpf = $_GET['cpf'];

//consultar no banco de dados
$result_usuario = "SELECT * from dadospessoais where cpf ='$cpf'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
$result_usuario2 = "SELECT * from contratocartao  where cpf  = '$cpf'";
$resultado_usuario2 = mysqli_query($conexao, $result_usuario2);
$row_usuario2 = mysqli_fetch_assoc($resultado_usuario2);
$result_usuario3 = "SELECT * from dadosprincipais  where cpf  = '$cpf'";
$resultado_usuario3 = mysqli_query($conexao, $result_usuario3);
$row_usuario3 = mysqli_fetch_assoc($resultado_usuario3);
$result_usuario4 = "SELECT * from endereco  where cpf  = '$cpf'";
$resultado_usuario4 = mysqli_query($conexao, $result_usuario4);
$row_usuario4 = mysqli_fetch_assoc($resultado_usuario4);
$result_usuario5 = "SELECT * from dependentes  where cpf_titular  = '$cpf' ";
$resultado_usuario5 = mysqli_query($conexao, $result_usuario5);
$row_usuario5 = mysqli_fetch_assoc($resultado_usuario5);
//Verificar se encontrou resultado na tabela "usuarios"
$result_usuario6 = "SELECT count(*) as total from dependentes  where cpf_titular  = '$cpf' and status='Em analise'";
$resultado_usuario6 = mysqli_query($conexao, $result_usuario6);
$row_usuario6 = mysqli_fetch_assoc($resultado_usuario6);
$result_usuario7 = "SELECT * from fotos  where cpf_titular  = '$cpf'";
$resultado_usuario7 = mysqli_query($conexao, $result_usuario7);
$row_usuario7 = mysqli_fetch_assoc($resultado_usuario7);
$result_usuario8 = "SELECT * from contrato where cpf  = '$cpf'";
$resultado_usuario8 = mysqli_query($conexao, $result_usuario8);
$row_usuario8 = mysqli_fetch_assoc($resultado_usuario8);

    ?>
<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/build/jquery.steps.css">
    <style>
        label{
            color:  #0099ff;
        }
    </style>
	<link rel="stylesheet" href="./assets/css/style.css">
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
						<form  action="alteracaodependentes.php?cpf=<?php echo $row_usuario['cpf'] ?>" method="POST" class="tab-wizard wizard-circle wizard"><br>
						<div style="text-align:right;">
						<?php
						if($row_usuario5['status'] == 'Em Analise'){
						?>

						
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
						Cancelar
						</button>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
						Indeferir
						</button>
						<input type="submit" value="Implantadas" name="status"  class="btn btn-success">
						<input type="submit" value="Alterar" name="status" class="btn btn-dark">
						

								
							<?php 
						}elseif($row_usuario5['status'] == 'Indeferido'){
							
							?>
	
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
						Cancelar
						</button>
							<input type="submit" value="Implantadas" name="status"  class="btn btn-success">
							<?php
						}else{
							
						}
							?>
</div><br><br><br>
						
							
					
						
							<!-- Step 2 -->
							<h5>Responsavel Financeiro</h5>
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Nome :</label>
											<input type="text"  value="<?php echo $row_usuario['nome']?>" class="form-control"readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Nome da Mae:</label>
											<input type="text" value="<?php echo $row_usuario3['mae']?>"  class="form-control"readonly>
										</div>
									</div>
									
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Telefone Fixo:</label>
											<input type="text"  value="<?php echo $row_usuario3['fixo']?>" class="form-control"readonly>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Telefone:</label>
											<input type="text" value="<?php echo $row_usuario3['celular']?>"  class="form-control"readonly>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Segundo Telefone:</label>
											<input type="text" value="<?php echo $row_usuario3['whats']?>"  class="form-control"readonly>
										</div>
									</div>
									
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>E-mail:</label>
											<input type="text"  value="<?php echo $row_usuario3['email']?>" class="form-control"readonly>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>RG:</label>
											<input type="text" name="rg" value="<?php echo $row_usuario3['rg']?>"  class="form-control">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Orgao Emissor:</label>
											<input type="text" name="expedidor" value="<?php echo $row_usuario3['expedidor']?>"  class="form-control">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Cartão do SUS:</label>
											<input type="text" value="<?php echo $row_usuario['sus']?>"  class="form-control"readonly>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>CPF:</label>
											<input type="text"  value="<?php echo $row_usuario3['cpf']?>" class="form-control"readonly>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Data de Nascimento:</label>
											<input type="text" value="<?php echo $row_usuario3['datas']?>"  class="form-control"readonly>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Estado Civil:</label>
											<input type="text" value="<?php echo $row_usuario3['estadocivil']?>"  class="form-control"readonly>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Sexo:</label>
											<input type="text" name="sexo" value="<?php echo $row_usuario3['sexo']?>"  class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>CEP:</label>
											<input type="text" name="cep" value="<?php echo $row_usuario4['cep']?>" class="form-control">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>	Rua:</label>
											<input type="text" name="rua" value="<?php echo $row_usuario4['rua']?>"  class="form-control">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Numero:</label>
											<input type="text" name="numero" value="<?php echo $row_usuario4['numero']?>"  class="form-control">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Cidade:</label>
											<input type="text" name="cidade"value="<?php echo $row_usuario4['cidade']?>"  class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Estado:</label>
											<input type="text" name="estado" value="<?php echo $row_usuario4['estado']?>" class="form-control">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>	Complemento:</label>
											<input type="text" name="complemento"value="<?php echo $row_usuario4['complemento']?>"  class="form-control">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>	Status:</label>
											<input type="text" name="complemento" value="<?php echo $row_usuario5['status']?>" name="status" class="form-control" readonly>
										</div>
									</div>
								</div>
							</section>
							<!-- Step 3 -->
							<h5>Beneficiarios</h5>
							<section>
							
							<br>
							
								<br><br>
								
								<?php
								$x = 0;
								while ($x < $row_usuario6['total']  ){
							
								?>
								<h4 class="text-blue">Beneficiarios</h4><br>
								<div class="row">
								
						
									<div class="col-md-3">
										<div class="form-group">
											<label>nome:</label>
											<input type="text"  value="<?php echo $row_usuario5['nome']?>" class="form-control">
										</div>
									</div>
									
									
									<div class="col-md-3">
										<div class="form-group">
											<label>	Cpf:</label>
											<input type="text" value="<?php echo $row_usuario5['cpf']?>"  class="form-control">
										</div>

									</div>
									
									
									<div class="col-md-3">
										<div class="form-group">
											<label>	Datas de nascimento:</label>
											<input type="text" value="<?php echo $row_usuario5['datas']?>"  class="form-control">
										</div>

									</div>
									
									
									<div class="col-md-3">
										<div class="form-group">
											<label>	Sexo:</label>
											<input type="text" value="<?php echo $row_usuario5['sexo']?>"  class="form-control">
										</div>

									</div>
									
									
									<div class="col-md-3">
										<div class="form-group">
											<label>	Mae:</label>
											<input type="text" value="<?php echo $row_usuario5['mae']?>"  class="form-control">
										</div>

									</div>
									
									
									<div class="col-md-3">
										<div class="form-group">
											<label>	Cns:</label>
											<input type="text" value="<?php echo $row_usuario5['cns']?>"  class="form-control">
										</div>

									</div>
									
									
									<div class="col-md-3">
										<div class="form-group">
											<label>	Parentesco:</label>
											<input type="text" value="<?php echo $row_usuario5['parentesco']?>"  class="form-control">
										</div>

									</div>
									
									</div>
								
								<?php
									$x++;}
								?>
									
							
								
							</section>
							<!-- Step 4 -->
								
							<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
									<select class="form-control" placeholder="selecione" name="motivo">
											<option>001- CPF Irregular</option>
											<option>002- Divergência de DADOS </option>
											<option>003- Imagem em Anexo corrompida</option>
											<option>004- Imagem RG ilegível</option>
											<option>005- Falta documentos em anexo</option>
											<option>006- Falta cópia do Cartão de crédito</option>
											<option>007- Dados divergentes titular</option>
											<option>008- Dados divergentes dependente</option>
											<option>009- Cartão não pertence ao responsável Financeiro </option>
											<option>010- Cliente possui plano ativo</option>
											<option>011- Dependente com plano ativo</option>
											<option>012- Cartão Ilegivel</option>
											<option>013- outros</option>
											<option>014- Campo de Descrição</option>
											<option>015- Matricula Incorreta</option>
											<option>016- Comprovante de Residência ilegivel</option>
											<option>017- Beneficiario sem CNS</option>
											<option>018- Falta Codigo de Validade do Cartão</option>
											<option>019- Falta Frente do RG</option>
									</select>
																				
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<input type="submit" value="Indeferido" name="status"  class="btn btn-danger">
									</div>
									</div>
								</div>
								</div>



									
							<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
									<select class="form-control" placeholder="selecione" name="motivo">
									<option>001- Possui Codigo Ativo</option>
											<option>002- Possui Divida Ativa</option>
											<option>003- Desistiu De Aderir ao Plano</option>
											<option>004- Outros</option>
											<option>005- Enviar Proposta Fisica</option>
											<option>006- Data De Adesão Incorreta</option>
											<option>007- Proposta Cadastrada Incorretamente</option>
											<option>008- Cartao De Credito Vencido</option>
											<option>009- Cartao De Credito Nao Pertence a Responsavel</option>
											<option>010- Sem Cpf</option>
											<option>999- Rompimento De Contrato Por Solicitação Do Beneficiario</option>
									</select>
																				
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<input type="submit" value="Cancelado" name="status"  class="btn btn-danger">
									</div>
									</div>
								</div>
								</div>
						</form>
					</div>
				</div>

				
				<!-- success Popup html Start -->
		
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
				finish: "Next"
			},
			onStepChanged: function (event, currentIndex, priorIndex) {
				$('.steps .current').prevAll().addClass('disabled');
			},
			
		});
	</script>
	<script>
		$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
		</script>

</body>
</html>