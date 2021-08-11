<?php

include_once "conexao.php";
session_start();
error_reporting(0);




    ?>

<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>	
	<link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/build/jquery.steps.css">

    <script>
           function Mudarestado(el) {
                var display = document.getElementById(el).style.display;
                if(display == "block")
                    document.getElementById(el).style.display = 'none';
                else
                    document.getElementById(el).style.display = 'block';
            }
		
    </script>
    <style>
        label{
            color:  #0099ff;
        }
		.form-group{
			background-color: aliceblue;

			border-radius: 5px;
            width: 80%;
			
		}
		.col{
			margin-left:0px;
		}
        .row{
            margin-top:2%
        }
        #minhaDiv{
            display: none;

        }
		.modal-header{
			background-color:#284ebf ;
			color:white;
			font-family: Poppins;
			border-radius: 21px 21px 0px 0px;
		}
		.modal-title{
			color:white;
		}
		.modal-content{
			border-radius:21px;
			background-color:#f6f6f6;
		}
        
    </style>
	<style>
								.drop-zone {
								width: 300px;
								height: 200px;
								padding: 20px;
								display: inline;
								align-items: center;
								justify-content: center;
								text-align: center;
								font-family: "Quicksand", sans-serif;
								font-weight: 500;
								font-size: 20px; 
								cursor: pointer;
								color: #023bbf;
								border: 4px solid #606060;
								border-radius: 10px;
								float:left;
								margin-left:2%;
								margin-top:2%;
								overflow: auto;
								

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
								#top{
								margin-left:3%;
								}
								#h5{
								margin-left:2%;
								margin-top:4%;
								}

								input, select{
										border: 1px solid #606060 !important; 
									
										background-color:#b3b3b3
										;margin-left:5%;
										text-align:center;
									
									}
								.fundoazul{
								background-color: #4177d0 ;
								}
								#submit{
								margin-left:85%;
								margin-top:2%;
								background-color: #4177d0 ;
								}

								@media screen and (max-device-width: 720px) {
								.text-blue1{
									margin-left: 5%;
									margin-top: 4%;
									position: absolute;
									font-size: 18px;
									color: #3284f1;
									width: 30%;
									height: 100px;
									background-color: #cccccc;
								text-align: center;
								padding-top: 30px;
								border-radius: 5px;
								

								}
								.text-blue2{
									margin-left: 5%;
									margin-top: 4%;
									position: absolute;
									font-size: 16px;
									color: #3284f1;
									width: 30%;
									height: 100px;
									background-color: #cccccc;
								text-align: center;
								padding-top: 20px;
								border-radius: 5px;
								

								}
								#submit{
								margin-left:11%;
								width:80%;
								margin-top:5%;
								
								}
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
								border: 2px solid #606060;
								border-radius: 10px;
								margin-left: 2%;
								margin-top: 1%;
								position: relative;
								overflow: auto
								}
								#top{
								width:70%;
								margin-left:5%;
								margin-top:10%;
								}
								.brand-logo{
								margin-top:-15%
								}
								#h5{
								margin-left:10%;
								margin-top: 7%;
								}
								.inline{
								width:50%
								}
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
				

				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				
					<div class="wizard-content">
						<form action="checkcadastro" method="POST" class="tab-wizard wizard-circle wizard"><br>				
					
						<h5 >Dados Pessoais</h5>
							<section>
                            <h4 style="color:#606060;font-weight:bold">DADOS PESSOAIS</h4>
							<br>
                            <hr style="width: 80%;position: relative;margin-top: -3.5%;margin-left: 21%;height:1px;background-color:#606060;" size = 50>
								<div class="row">
									<div class="col-4">																			
							<?php
							if($_SESSION['cliente'] == 'servidorpublico'){
							?>					
					
										<select style="background-color:#b3b3b3" name="plano" id="plano"class="custom-select form-control-md" required>
										<option >Selecione</option>
										<option value="UNIDENTISVIPEMPRESARIAL">UNIDENTIS VIP EMPRESARIAL</option>											
										</select>										
								
							<?php
							    }elseif($_SESSION['escolha'] == 'PB'){
							?>						
										<select style="background-color:#b3b3b3"  name="plano" id="plano" class="custom-select form-control-md" required>
										<option value="" >Selecione</option>
											<option value="UNIDENTISVIPBOLETO">UNIDENTIS VIP BOLETO - Familiar -Gr. Municipios PB - 455.913/07-4- R$: 40.00- ROL DA ANS</option>
											<option value="UNIDENTISVIPCARTAO">UNIDENTIS VIP CARTÃO - Familiar -Gr. Municipios PB - 455.913/07-4- R$: 23.90- ROL DA ANS</option>
											<option value="UNIDENTISVIPFAMILIACARTAO">UNIDENTIS VIP FAMÍLIA CARTÃO - Familiar -Gr. Municipios PB - 455.913/07-4- R$: 60.00- ROL DA ANS</option>
											<option value="UNIDENTISVIPUNIVERSITARIOCARTAO">UNIDENTIS VIP UNIVERSITÁRIO CARTÃO - Familiar -Gr. Municipios PB - 455.913/07-4- R$: 21.90- ROL DA ANS</option>
										</select>									
                            <?php
                            }elseif ($_SESSION['escolha'] == 'RN'){
                            ?>							                               
                                        <select style="background-color:#b3b3b3" name="plano" id="plano" class="custom-select form-control-md" required>
                                            <option value="" >Selecione</option>
                                            <option value="UNIDENTISVIPBOLETO">UNIDENTIS VIP BOLETO - Familiar -Gr. Municipios RN - 479.253/17-0- R$: 40.00- ROL DA ANS</option>
                                            <option value="UNIDENTISVIPCARTAO">UNIDENTIS VIP CARTÃO - Familiar -Gr. Municipios RN - 479.253/17-0- R$: 25.90- ROL DA ANS</option>
                                            <option value="UNIDENTISVIPFAMILIACARTAO">UNIDENTIS VIP FAMÍLIA CARTÃO - Familiar -Gr. Municipios RN - 479.253/17-0- R$: 66.00- ROL DA ANS</option>
                                            <option value="UNIDENTISVIPUNIVERSITARIOCARTAO">UNIDENTIS VIP UNIVERSITÁRIO CARTÃO - Familiar -Gr. Municipios RN - 479.253/17-0- R$: 25.00- ROL DA ANS</option>
                                        </select>
									<?php
                            }
							?>
                           																
						</div>								
								
									<div class="col-4">																				
									<input type="text"  id="a" placeholder="Nome"class="form-control" onkeyup="document.getElementById('a-1').value = this.value;">
									</div>							
									<div class="col-3">									
										<input type="text" name="cpf"  placeholder="CPF*" id="cpf"class="form-control"required>
                                    </div>
								</div>																	
								<div class="row">
									<div class="col-5">													
                                        <input type="email" placeholder="Email*" id="email" name="email" class="form-control"required>									
									</div>
									<div class="col-3">
                                    <input type="text" name ="telefone" placeholder="Telefone* " id="telefone" class="form-control" required>
									</div>
								
							
									
									<div class="col-3">											
									    <input type="text" placeholder="Telefone :"name ="fixo" id="telefone" class="form-control">
									</div>
									</div>
									
									<div class="row">
									<div class="col-2">
                                    <select name="sexo"  class="custom-select form-control"required>
											<option value="">Sexo*</option>
											<option value="1">Masculino</option>
											<option value="0">Feminino</option>										
										</select>
									</div>
									<div class="col-3">
                                        <input type="text" class="form-control" name ="rg" minlength="7" maxlength="7" id ="rg"placeholder="RG*"required>
									</div>						
									<div class="col-3">
                                        <input type="text" class="form-control" minlength="4" id="emissor"name ="emissor"placeholder="Orgão Emissor*"required>
									</div>
                                    <div class="col-3">
                                        <input type="text" class="form-control" id="data"name ="nascimento"placeholder="Data de Nascimento*"required>									
									</div>
                                  
									</div>
								
								
									<div class="row">
									
                                    <div class="col-4">
                                    <input type="text" name="mae" id="mae"placeholder="Mãe*" minlength="10" class="form-control"required>
									</div>
                                    <div class="col-3">
                                    <select name="estado" id="estado" class="custom-select form-control"required>
											<option value="">Estado Civil*</option>
											<option value="Solteiro">Solteiro</option>
											<option value="Casado">Casado</option>										
										</select>							
									</div>
                                    <div class="col-3">
                                        <input type="text" id="sus" placeholder="Cartão do SUS" name ="sus" minlength="15" class="form-control">
									</div>
								</div>
								
                                <?php
							if($_SESSION['cliente'] == 'servidorpublico'){
                            ?>
							<div class="row">
							<div class="col-md-3">			
								<input type="text" placeholder="Matricula*"name ="matricula" minlength="3" class="form-control" require>
							</div>
							
							<div class="col-md-3">						
								<input type="date" placeholder="Admissao*" name ="admissao" minlength="8"  class="form-control" required>
							</div>
                            </div>


							<?php
							}
							?>
                            <br>
                            <h4 style="color:#606060;font-weight:bold">ENDEREÇO</h4>
                            <br>
                            <hr style="width: 80%;position: relative;margin-top: -3.5%;margin-left: 21%;height:1px;background-color:#606060;" size = 50>
                            <div class="row">
									<div class="col-3">													
                                        <input type="text" name="cep" id="cep"class="form-control" placeholder="CEP*"required>									
									</div>
                                    <div class="col-3">													
                                        <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua*"required>									
									</div>
                                    <div class="col-3">													
                                        <input type="text" class="form-control" id="numero"name ="numero"placeholder="Numero*"required>										
									</div>
                                    <div class="col-3">													
                                        <input type="text" name="uf" id="uf" class="form-control" placeholder="Estado*" required>									
									</div>
                            </div>
                            <div class="row">
									<div class="col-3">													
                                        <input type="text" name="complemento" placeholder="Complemento" class="form-control">								
									</div>
                                    <div class="col-3">													
                                        <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Ex: joao pessoa*" required>								
									</div>
                                    <div class="col-3">													
                                        <input type="text" name="bairro" id="bairro"class="form-control" placeholder="Bairro*" required>							
									</div>
                            </div>  
                            <br>
                            <h4 style="background-color:#4177d0; border-radius: 3px;color: white;padding:2% ">O RESPONSÁVEL FINANCEIRO SERÁ TITULAR DO PLANO? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" style="background-color:#4177d0;border-color:#4177d0;font-size:25px"class="btn btn-danger" >SIM</button>  |<button type="button" style="background-color:#4177d0;border-color:#4177d0;font-size:25px"class="btn btn-danger" onclick="Mudarestado('minhaDiv')"> NÃO</button></h4>      
                            <div id="minhaDiv">
                            <div class="row">

                            <div class="col-5">                              
                                    <input type="text" name="nometitular" placeholder="Nome Completo*" class="form-control">
                            </div>
                            <div class="col-3">                           
                                    <input type="text" name="cpftitular"  id="cpf1" class="form-control" placeholder="CPF*" >                                
                            </div>

                            <div class="col-4">                              
                                    <input type="text" name="nascimentotitular" id="data1" class="form-control" placeholder="Data Nascimento*" >                                
                            </div>

                            </div>
                            <div class="row">

                            <div class="col-3">                               
                                    <select name="estadotitular" class="custom-select form-control">
                                        <option value="">Estado Civil*</option>
                                        <option value="Solteiro">Solteiro</option>
                                        <option value="Casado">Casado</option>
                                    </select>                                
                            </div>
                            <div class="col-3">  
                                    <select name="sexotitular" class="custom-select form-control">
                                        <option value="1">Sexo*</option>
                                        <option value="1">Masculino</option>
                                        <option value="1">Feminino</option>
                                    </select>                                
                            </div>

                            <div class="col-3">                               
                                <input type="text" name="maetitular" placeholder="Mãe" minlength="10" class="form-control">                            
                            </div>
                            <div class="col-3">                                
                                    <input type="text" name="sustitular" placeholder="Cartão do SUS" minlength="15" class="form-control">                                
                            </div>                         

                            </div>
                            </div>
                           <button type="submit">tste<button>
							</section>

							<br>
						
							<!-- Step 2 -->
                           <h5>Beneficiarios</h5>
                            <section id="resp">
                                
                            <link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/jquery.dataTables.css">
                            <link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/dataTables.bootstrap4.css">
                            <link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/responsive.dataTables.css">
							<?php 
                            $result_usuario = "SELECT * from dependentes where cpf_titular ='$_SESSION[cpf]'";
                            $resultado_usuario = mysqli_query($conexao, $result_usuario);
                            ?>
                            	<div class="row">
						<table  class="data-table stripe hover nowrap">
							<thead>
								<tr style="background-color:#4177d0 ">
									<th style="padding-left:5%" class="table-plus datatable-nosort">Nome</th>							
									<th style="padding-left:5%">CPF</th>
									<th style="padding-left:10%">Valor Unitário</U></th>
									<th style="padding-left:5%">Opções</th>	
									
								</tr>
							</thead>


							<tbody>
							
							<?php
									while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
										
        					?>
								<tr>
								<td class="table-plus"><?php echo $row_usuario['nome']; ?></td>	
								<td class="table-plus"><?php echo $row_usuario['cpf']; ?></td>	
								<td class="table-plus">R$ <?php echo $preco1 ?></td>				
								

									
									<td><a class="dropdown-item" href="apagardependente.php?id=<?php echo $row_usuario['id'] ?>"><i class="fa fa-pencil"></i> Apagar</a></td>	
								</tr>
								<?php 
									}
								?>
							</tbody>
						</table>
					</div>
                    <button type="button" style="background-color:#284ebf;padding:1% " class="btn btn-primary" id="att" data-toggle="modal" data-target="#exampleModal">
                        Cadastrar Dependentes
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div  class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">UNIDENTIS</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                       <h4 style="color:#606060;font-weight:bold;text-align: center;">CADASTRAR DEPENDENTES</h4>
                        <div class="row">
                        <div class="col-6">
																				
									<select class="form-control" name="parentesco">
									<option value="3">Conjuge</option>
									<option value="4">Filho</option>
									<option value="8">Pai/Mae</option>
									<option value="6">Enteado</option>
									<option value="10">Outro</option>
									</select>
									
								</div>
								<div class="col-6">
																			
									<input type="text" name="nomedependente" class="form-control" placeholder="Nome Completo"required>
									
								</div>
								<br>
								<div style ="margin-top:2%" class="col-6">
									
										
										<input type="text" class="form-control"  name ="cpfdependente"placeholder="CPF" id="cpf" >
									
								</div>
								<div style ="margin-top:2%" class="col-6">																		
									<input type="text" name="datadependente"  class="form-control " id="data" placeholder="Data de Nascimento" required>
									
								</div>
						
							</div>
							<div class="row">
						
							<div class="col-6">
																				
									<select class="form-control" name="estadodependente">
									<option value="Solteiro">Solteiro</option>
									<option value="Casado">Casado</option>
									<option value="Viúvo">Viúvo</option>
									<option value="Separado">Separado</option>
									<option value="Divorciado">Divorciado</option>
									<option value="Relação Estavel">DRelação Estavel</option>
									</select>
									
								</div>
								<div class="col-6">
																				
									<select class="form-control" name="sexodependentes">
									<option value="1">Masculino</option>
									<option value="0">Feminino</option>
								
									</select>
									
								</div>
								
							<div style ="margin-top:2%"class="col-6">																
									<input type="text" class="form-control" name ="maedependente"placeholder="Mãe"required>								
							</div>
							<div style ="margin-top:2%" class="col-6">													
								<input type="text" name="cnsdependente"  class="form-control" placeholder="Cartão do sus" >								
							</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="button" style="background-color:#284ebf"class="btn btn-primary">Cadastrar</button>
                        </div>
                        </div>
                    </div>
                    
                    </div>
                  
							</section>
							<!-- Step 3 -->
							<h5>Imagens</h5>
							<section>
							
							<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
							<div id="branco">                
                   
								<div class="drop-zone">
									<span style="color:white" class="drop-zone__prompt"><i style="font-size: 297%;padding: 11%;color:#606060" class="fas fa-download"></i><br><div class="fundoazul"  >RG FRENTE</div></span>                    
									<input type="file" name="arquivo10[]" multiple="multiple"class="drop-zone__input" required>
								</div>
								
								
								<div class="drop-zone">
									<span style="color:white" class="drop-zone__prompt"><i style="font-size: 297%;padding: 11%;color:#606060" class="fas fa-download"></i><br><div class="fundoazul"  >RG VERSO</div></span>
									<input type="file" name="arquivo1[]"  multiple="multiple" class="drop-zone__input" required>
								</div>
								
							
								<div class="drop-zone">
									<span style="color:white"  class="drop-zone__prompt"><i style="font-size: 297%;padding: 11%;color:#606060" class="fas fa-download"></i><br><div class="fundoazul" >CPF</div></span>
									<input type="file" name="arquivo2[]"  multiple="multiple" class="drop-zone__input" required>
								</div>
								
							
								<div class="drop-zone">
									<span style="color:white"  class="drop-zone__prompt"><i style="font-size: 297%;padding: 7%;color:#606060" class="fas fa-download"></i><br><div class="fundoazul"  >COMPROVANTE DE RESIDÊNCIA</div></span>
									<input type="file" name="arquivo3[]"  multiple="multiple" class="drop-zone__input" required>
								</div>
							
								<?php if( $_SESSION['plano'] != 'UNIDENTISVIPBOLETO'){
								?>
							
								<div class="drop-zone">
									<span style="color:white"  class="drop-zone__prompt"><i style="font-size: 297%;padding: 11%;color:#606060" class="fas fa-download"></i><br><div class="fundoazul"  >CARTÃO</div></span>
									<input type="file" name="arquivo4[]"  multiple="multiple" class="drop-zone__input" required>
								</div>
								<?php }?>  
								
							
								<div class="drop-zone">
									<span style="color:white" class="drop-zone__prompt"><i style="font-size: 297%;padding: 11%;color:#606060" class="fas fa-download"></i><br><div class="fundoazul" >OUTRO</div></span>
									<input type="file" name="arquivo5[]"  multiple="multiple" class="drop-zone__input" required>
								</div>
								
							
									</div>
							</section>
							<!-- Step 4 -->
						
							<h5>Resumo</h5>
							
							<section>
							<div class="row">
							<div class="col-4">																				
									<input type="text"  id="a" placeholder="Nome"class="form-control" onkeyup="document.getElementById('a-1').value = this.value;">
									</div>							
									<div class="col-3">									
										<input type="text" name="cpf"  placeholder="CPF*" id="cpf"class="form-control"required>
                                    </div>
								</div>																	
								<div class="row">
									<div class="col-5">													
                                        <input type="email" placeholder="Email*" id="email" name="email" class="form-control"required>									
									</div>
									<div class="col-3">
                                    <input type="text" name ="telefone" placeholder="Telefone* " id="telefone" class="form-control" required>
									</div>
								
							
									
									<div class="col-3">											
									    <input type="text" placeholder="Telefone :"name ="fixo" id="telefone" class="form-control">
									</div>
									</div>
									
									<div class="row">
									<div class="col-3">
                                    <select name="sexo"  class="custom-select form-control"required>
											<option value="">Sexo*</option>
											<option value="1">Masculino</option>
											<option value="0">Feminino</option>										
										</select>
									</div>
									<div class="col-3">
                                        <input type="text" class="form-control" name ="rg" minlength="7" maxlength="7" id ="rg"placeholder="RG*"required>
									</div>						
									<div class="col-3">
                                        <input type="text" class="form-control" minlength="4" id="emissor"name ="emissor"placeholder="Orgão Emissor*"required>
									</div>
                                    <div class="col-3">
                                        <input type="text" class="form-control" id="data"name ="nascimento"placeholder="Data de Nascimento*"required>									
									</div>
                                  
									</div>
								
								
									<div class="row">
									
                                    <div class="col-4">
                                    <input type="text" name="mae" id="mae"placeholder="Mãe*" minlength="10" class="form-control"required>
									</div>
                                    <div class="col-3">
                                    <select name="estado" id="estado" class="custom-select form-control"required>
											<option value="">Estado Civil*</option>
											<option value="Solteiro">Solteiro</option>
											<option value="Casado">Casado</option>										
										</select>							
									</div>
                                    <div class="col-3">
                                        <input type="text" id="sus" placeholder="Cartão do SUS" name ="sus" minlength="15" class="form-control">
									</div>
								</div>
								
                                <?php
							if($_SESSION['cliente'] == 'servidorpublico'){
                            ?>
							<div class="row">
							<div class="col-md-3">			
								<input type="text" placeholder="Matricula*"name ="matricula" minlength="3" class="form-control" require>
							</div>
							
							<div class="col-md-3">						
								<input type="date" placeholder="Admissao*" name ="admissao" minlength="8"  class="form-control" required>
							</div>
                            </div>


							<?php
							}
							?>
                            <br>
                            <h4 style="color:#606060;font-weight:bold">ENDEREÇO</h4>
                            <br>
                            <hr style="width: 80%;position: relative;margin-top: -3.5%;margin-left: 21%;height:1px;background-color:#606060;" size = 50>
                            <div class="row">
									<div class="col-3">													
                                        <input type="text" name="cep" id="cep"class="form-control" placeholder="CEP*"required>									
									</div>
                                    <div class="col-3">													
                                        <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua*"required>									
									</div>
                                    <div class="col-3">													
                                        <input type="text" class="form-control" id="numero"name ="numero"placeholder="Numero*"required>										
									</div>
                                    <div class="col-3">													
                                        <input type="text" name="uf" id="uf" class="form-control" placeholder="Estado*" required>									
									</div>
                            </div>
                            <div class="row">
									<div class="col-3">													
                                        <input type="text" name="complemento" placeholder="Complemento" class="form-control">								
									</div>
                                    <div class="col-3">													
                                        <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Ex: joao pessoa*" required>								
									</div>
                                    <div class="col-3">													
                                        <input type="text" name="bairro" id="bairro"class="form-control" placeholder="Bairro*" required>							
									</div>
                            </div>  
							</section>
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
						} else {
							thumbnailElement.style.backgroundImage = null;
						}
						}

						
						</script>
						
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
									onStepChanged: function (event, currentIndex, priorIndex) {
										$('.steps .current').prevAll().addClass('disabled');
									},
									
								});
							</script>
                            
<script>
$(document).ready(function() {

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#ibge").val("");
        }

        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#uf").val("...");
                    $("#ibge").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                            $("#ibge").val(dados.ibge);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
        });


     

</script>
	
<?php 
									
									include('include/footer.php'); ?>
<script src="src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
	<script src="src/plugins/datatables/media/js/dataTables.responsive.js"></script>
	<script src="src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>
	<!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/media/js/button/dataTables.buttons.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.bootstrap4.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.print.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.html5.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.flash.js"></script>
	<script src="src/plugins/datatables/media/js/button/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/media/js/button/vfs_fonts.js"></script>
	<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})


		$('document').ready(function(){
			$('.data-table').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
                    info: "_START_-_END_ de _TOTAL_ linhas",
					infoEmpty: "Mostrando 0 até 0 de 0 registros",
					searchPlaceholder: "Procurar",
					lengthMenu: "Mostrar _MENU_ registos",
					paginate: {
        			first: "Primeiro",
					previous: "Anterior",
					next: "Seguinte"
					
					},
					
				},
			});
			$('.data-table-export').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
				dom: 'Bfrtip',
				buttons: [
				'copy', 'csv', 'pdf', 'print'
				]
			});
			var table = $('.select-row').DataTable();
			$('.select-row tbody').on('click', 'tr', function () {
				if ($(this).hasClass('selected')) {
					$(this).removeClass('selected');
				}
				else {
					table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
				}
			});
			var multipletable = $('.multiple-select-row').DataTable();
			$('.multiple-select-row tbody').on('click', 'tr', function () {
				$(this).toggleClass('selected');
			});
		});
	</script>
</body>
</html>