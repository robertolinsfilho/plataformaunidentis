<?php

include_once "conexao.php";
session_start();
error_reporting(0);
require __DIR__ . '/vendor/autoload.php';



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
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	
    <script>
	
           function Mudarestado(el) {
                var display = document.getElementById(el).style.display;
                if(display == "block")
                    document.getElementById(el).style.display = 'none';
                else
                    document.getElementById(el).style.display = 'block';
            }
			$("#data").mask("00-00-0000", {reverse: true});
			$("#cpf").mask("000.000.000-00");
			$("#cpf1").mask("000.000.000-00");
            $("#data1").mask("00-00-0000", {reverse: true});
            $("#data2").mask("00-00-0000", {reverse: true});

function validar(){
	var x= 0;
	var nome = document.getElementById('a');	
	if(nome.value === ''){
		console.log('entrei');		
		document.getElementById("a").style.setProperty('border-color', 'red', 'important');	
		setInterval(function(){				
		document.getElementById("anterior").click();				
	}, 200);
	
	}else{
		document.getElementById("a").style.setProperty('border-color', 'black', 'important');
	}
	var plano1 = document.getElementById('plano1');	
	if(plano1.value === ''){
				
		document.getElementById("plano1").style.setProperty('border-color', 'red', 'important');	
		setInterval(function(){				
		document.getElementById("anterior").click();				
	}, 200);	
	}else{
		document.getElementById("plano1").style.setProperty('border-color', 'black', 'important');
	}
	var plano2 = document.getElementById('plano2');	
	if(plano2.value === ''){
				
		document.getElementById("plano2").style.setProperty('border-color', 'red', 'important');	
		setInterval(function(){				
		document.getElementById("anterior").click();				
	}, 200);	
	}else{
		document.getElementById("plano2").style.setProperty('border-color', 'black', 'important');
	}
	var plano3 = document.getElementById('plano3');	
	if(plano3.value === ''){
				
		document.getElementById("plano3").style.setProperty('border-color', 'red', 'important');	
		setInterval(function(){				
		document.getElementById("anterior").click();				
	}, 200);	
	}else{
		document.getElementById("plano3").style.setProperty('border-color', 'black', 'important');
	}
	var cpf = document.getElementById('cpf');	
	if(cpf.value === ''){
		document.getElementById("cpf").style.setProperty('border-color', 'red', 'important');		
		setInterval(function(){		
		document.getElementById("anterior").click();
	}, 200);
	}else{
		document.getElementById("cpf").style.setProperty('border-color', 'black', 'important');
	}
	var email = document.getElementById('email');	
	if(email.value === ''){
		document.getElementById("email").style.setProperty('border-color', 'red', 'important');		
		setInterval(function(){		
		document.getElementById("anterior").click();
	}, 200);
	}else{
		document.getElementById("email").style.setProperty('border-color', 'black', 'important');
	}
	var telefone = document.getElementById('telefone');	
	if(telefone.value === ''){
		document.getElementById("telefone").style.setProperty('border-color', 'red', 'important');		
		setInterval(function(){		
		document.getElementById("anterior").click();
	}, 200);
	}else{
		document.getElementById("telefone").style.setProperty('border-color', 'black', 'important');
	}
	var sexo = document.getElementById('sexo');	
	if(sexo.value === ''){
		document.getElementById("sexo").style.setProperty('border-color', 'red', 'important');		
		setInterval(function(){		
		document.getElementById("anterior").click();
	}, 100);
	}else{
		document.getElementById("sexo").style.setProperty('border-color', 'black', 'important');
	}
	var rg = document.getElementById('rg');	
	if(rg.value === ''){
		document.getElementById("rg").style.setProperty('border-color', 'red', 'important');		
		setInterval(function(){		
		document.getElementById("anterior").click();
	}, 100);
	}else{
		document.getElementById("rg").style.setProperty('border-color', 'black', 'important');
	}
	var fixo = document.getElementById('fixo');	
	if(fixo.value === ''){
		document.getElementById("fixo").style.setProperty('border-color', 'red', 'important');		
		setInterval(function(){		
		document.getElementById("anterior").click();
	}, 100);
	}else{
		document.getElementById("fixo").style.setProperty('border-color', 'black', 'important');
	}
	var emissor = document.getElementById('emissor');	
	if(emissor.value === ''){
		document.getElementById("emissor").style.setProperty('border-color', 'red', 'important');		
		setInterval(function(){		
		document.getElementById("anterior").click();
	}, 100);
	}else{
		document.getElementById("emissor").style.setProperty('border-color', 'black', 'important');
	}
	var data = document.getElementById('data');	
	if(data.value === ''){
		document.getElementById("data").style.setProperty('border-color', 'red', 'important');		
		setInterval(function(){		
		document.getElementById("anterior").click();
	}, 100);
	}else{
		document.getElementById("data").style.setProperty('border-color', 'black', 'important');
	}
	var mae = document.getElementById('mae');	
	if(mae.value === ''){
		document.getElementById("mae").style.setProperty('border-color', 'red', 'important');		
		setInterval(function(){		
		document.getElementById("anterior").click();
	}, 100);
	}else{
		document.getElementById("mae").style.setProperty('border-color', 'black', 'important');
	}
	var estado = document.getElementById('estado');	
	if(estado.value === ''){
		document.getElementById("estado").style.setProperty('border-color', 'red', 'important');		
		setInterval(function(){		
		document.getElementById("anterior").click();
	}, 100);
	}else{
		document.getElementById("estado").style.setProperty('border-color', 'black', 'important');
	}
	var sus = document.getElementById('sus');	
	if(sus.value === ''){
		document.getElementById("sus").style.setProperty('border-color', 'red', 'important');		
		setInterval(function(){		
		document.getElementById("anterior").click();
	}, 100);
	}else{
		document.getElementById("sus").style.setProperty('border-color', 'black', 'important');
	}
	var cep = document.getElementById('cep');	
	if(cep.value === ''){
		document.getElementById("cep").style.setProperty('border-color', 'red', 'important');		
		setInterval(function(){		
		document.getElementById("anterior").click();
	}, 100);
	}else{
		document.getElementById("cep").style.setProperty('border-color', 'black', 'important');
	}
	
	var rua = document.getElementById('rua');	
	if(rua.value === ''){
		document.getElementById("rua").style.setProperty('border-color', 'red', 'important');		
		setInterval(function(){		
		document.getElementById("anterior").click();
	}, 100);
	}else{
		document.getElementById("rua").style.setProperty('border-color', 'black', 'important');
	}
	var numero = document.getElementById('numero');	
	if(numero.value === ''){
		document.getElementById("numero").style.setProperty('border-color', 'red', 'important');		
		setInterval(function(){		
		document.getElementById("anterior").click();
	}, 100);
	}else{
		document.getElementById("numero").style.setProperty('border-color', 'black', 'important');
	}
	var uf = document.getElementById('uf');	
	if(uf.value === ''){
		document.getElementById("uf").style.setProperty('border-color', 'red', 'important');		
		setInterval(function(){		
		document.getElementById("anterior").click();
	}, 100);
	}else{
		document.getElementById("uf").style.setProperty('border-color', 'black', 'important');
	}
	var cidade = document.getElementById('cidade');	
	if(cidade.value === ''){
		document.getElementById("cidade").style.setProperty('border-color', 'red', 'important');		
		setInterval(function(){		
		document.getElementById("anterior").click();
	}, 100);
	}else{
		document.getElementById("cidade").style.setProperty('border-color', 'black', 'important');
	}
	var bairro = document.getElementById('bairro');	
	if(bairro.value === ''){
		document.getElementById("bairro").style.setProperty('border-color', 'red', 'important');		
		setInterval(function(){		
		document.getElementById("anterior").click();
	}, 100);
	}else{
		document.getElementById("bairro").style.setProperty('border-color', 'black', 'important');
	}
}	

function valor(){
	setInterval(function(){	
	element = document.getElementById('plano');
	document.getElementById("qPlano").innerHTML = element.value;
	console.log(element.value);

	if(element.value === 'UNIDENTISVIPBOLETO'){
		valor = '40.00';
		document.getElementById("valorPlano").innerHTML = valor;
		
	}
	if(element.value === 'UNIDENTISVIPCARTAO'){
		valor = '23.90';
		document.getElementById("valorPlano").innerHTML = valor;
		
	}
	if(element.value === 'UNIDENTISVIPFAMILIACARTAO'){
		valor = '60.00';
		document.getElementById("valorPlano").innerHTML = valor;
		
	}
	if(element.value === 'UNIDENTISVIPUNIVERSITARIOCARTAO'){
		valor = '21.90';
		document.getElementById("valorPlano").innerHTML = valor;
		
	}
}, 100);
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
		.wizard-content .wizard>.steps>ul{
			
			width: 92% !important;
    		margin-left: 15% !important;
		}
		.wizard > .steps{
			width: 87% !important;
			margin-left: 7%;
		}
		#steps-uid-0-p-0{
			margin-top:2% !important
		}
		.wizard-content .wizard.wizard-circle>.steps .step{
			width: 35px !important;
    		height: 35px !important;
    		line-height: 31px !important;
			
		}
		#row4{
			margin-top:10%
		}
        
    </style>
	<style>
								.wizard-content .wizard>.content{
								overflow:visible !important;
								width: 79% !important;
    							margin-left: 20% !important;
								}
								.main-container {
  								margin-left: -2% !important;
								  padding:0px !important;
							}

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
	<div>
	
	</div>
	<div class="main-container">
		
		<div class="pd-ltr-20  height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
				<h5 style="font-size: .9rem;width:73vw;margin-left: 20%;margin-top:6%"><span style="font-size:1rem;font-weight:bold;color:#606060;">INCLUIR PROPOSTA</span> | VALOR TOTAL : <span id='valorPlano'>00.00</span> | PLANO : <span id='qPlano'> Nenhum </span> | DEPENDENTES : 0</h5>						

				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				
					<div class="wizard-content">
						<form action="checkcadastro"   enctype="multipart/form-data"  method="POST" class="tab-wizard wizard-circle wizard"><br>				
					
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
					
										<select style="background-color:#b3b3b3"   onclick="valor()" name="plano1" id="plano"class="custom-select form-control-md" >
										<option >Selecione</option>
										<option value="UNIDENTISVIPEMPRESARIAL">UNIDENTIS VIP EMPRESARIAL</option>											
										</select>										
								
							<?php
							    }elseif($_SESSION['escolha'] == 'PB'){
							?>						
										<select style="background-color:#b3b3b3" onclick="valor()"  name="plano2" id="plano" class="custom-select form-control-md" >
										<option value="" >Selecione</option>
											<option value="UNIDENTISVIPBOLETO">UNIDENTIS VIP BOLETO - Familiar -Gr. Municipios PB - 455.913/07-4- R$: 40.00- ROL DA ANS</option>
											<option value="UNIDENTISVIPCARTAO">UNIDENTIS VIP CART??O - Familiar -Gr. Municipios PB - 455.913/07-4- R$: 23.90- ROL DA ANS</option>
											<option value="UNIDENTISVIPFAMILIACARTAO">UNIDENTIS VIP FAM??LIA CART??O - Familiar -Gr. Municipios PB - 455.913/07-4- R$: 60.00- ROL DA ANS</option>
											<option value="UNIDENTISVIPUNIVERSITARIOCARTAO">UNIDENTIS VIP UNIVERSIT??RIO CART??O - Familiar -Gr. Municipios PB - 455.913/07-4- R$: 21.90- ROL DA ANS</option>
										</select>									
                            <?php
                            }elseif ($_SESSION['escolha'] == 'RN'){
                            ?>							                               
                                        <select style="background-color:#b3b3b3" name="plano"  onclick="valor()" id="plano3" class="custom-select form-control-md" >
                                            <option value="" >Selecione</option>
                                            <option value="UNIDENTISVIPBOLETO">UNIDENTIS VIP BOLETO - Familiar -Gr. Municipios RN - 479.253/17-0- R$: 40.00- ROL DA ANS</option>
                                            <option value="UNIDENTISVIPCARTAO">UNIDENTIS VIP CART??O - Familiar -Gr. Municipios RN - 479.253/17-0- R$: 25.90- ROL DA ANS</option>
                                            <option value="UNIDENTISVIPFAMILIACARTAO">UNIDENTIS VIP FAM??LIA CART??O - Familiar -Gr. Municipios RN - 479.253/17-0- R$: 66.00- ROL DA ANS</option>
                                            <option value="UNIDENTISVIPUNIVERSITARIOCARTAO">UNIDENTIS VIP UNIVERSIT??RIO CART??O - Familiar -Gr. Municipios RN - 479.253/17-0- R$: 25.00- ROL DA ANS</option>
                                        </select>
									<?php
                            }
							?>
                           																
						</div>								
								
									<div class="col-4">																				
									<input type="text"  id="a" name="nome" placeholder="Nome"class="form-control" onkeyup="document.getElementById('a-1').value = this.value;"  required oninvalid="this.setCustomValidity(' ')" 
									onchange="try{setCustomValidity('')}catch(e){}">
									
									</div>							
									<div class="col-3">									
										<input type="text" name="cpf"  placeholder="CPF*" onkeyup="document.getElementById('cpf-1').value = this.value;" id="cpf" class="form-control" required oninvalid="this.setCustomValidity(' ')" 
									onchange="try{setCustomValidity('')}catch(e){}"> 
                                    </div>
								</div>																	
								<div class="row">
									<div class="col-5">													
                                        <input type="email" placeholder="Email*" id="email" onkeyup="document.getElementById('email-1').value = this.value;" name="email" class="form-control" required oninvalid="this.setCustomValidity(' ')" 
									onchange="try{setCustomValidity('')}catch(e){}"> 									
									</div>
									<div class="col-3">
                                    <input type="text" name ="telefone" placeholder="Telefone* " onkeyup="document.getElementById('telefone-1').value = this.value;" id="telefone" class="form-control" required oninvalid="this.setCustomValidity(' ')" 
									onchange="try{setCustomValidity('')}catch(e){}"> 
									</div>
								
							
									
									<div class="col-3">											
									    <input type="text" placeholder="Telefone :"name ="fixo" id="fixo" class="form-control" required oninvalid="this.setCustomValidity(' ')" 
									onchange="try{setCustomValidity('')}catch(e){}"> 
									</div>
									</div>
									
									<div class="row">
									<div class="col-2">
                                    <select style="margin-left:14%" name="sexo" id="sexo" onkeyup="document.getElementById('sexo-1').value = this.value;" class="custom-select form-control" >
											<option value="">Sexo*</option>
											<option value="1">Masculino</option>
											<option value="0">Feminino</option>										
										</select>
									</div>
									<div class="col-3">
                                        <input type="text" id ="rg" onkeyup="document.getElementById('rg-1').value = this.value;" class="form-control" name ="rg" minlength="7" maxlength="7" placeholder="RG*">
									</div>						
									<div class="col-3">
                                        <input type="text" onkeyup="document.getElementById('emissor-1').value = this.value;" class="form-control" minlength="4" id="emissor"name ="emissor"placeholder="Org??o Emissor*">
									</div>
                                    <div class="col-3">
                                        <input type="text" class="form-control" id="data" onkeyup="document.getElementById('data-1').value = this.value;"name ="nascimento"placeholder="Data de Nascimento*">									
									</div>
                                  
									</div>
								
								
									<div class="row">
									
                                    <div class="col-4">
										
                                    <input type="text" name="mae" onkeyup="document.getElementById('email-1').value = this.value;" id="mae"placeholder="M??e*" minlength="10" class="form-control">
									</div>
                                    <div class="col-3">
                                    <select name="estado" id="estado" onkeyup="document.getElementById('estado-1').value = this.value;"class="custom-select form-control">
											<option value="">Estado Civil*</option>
											<option value="Solteiro">Solteiro</option>
											<option value="Casado">Casado</option>										
										</select>							
									</div>
                                    <div class="col-3">
                                        <input type="text" id="sus" onkeyup="document.getElementById('sus-1').value = this.value;" placeholder="Cart??o do SUS" name ="sus" minlength="15" class="form-control">
									</div>
								</div>
								
                                <?php
							if($_SESSION['cliente'] == 'servidorpublico'){
                            ?>
							<div class="row">
							<div class="col-md-3">			
								<input type="text"  onkeyup="document.getElementById('matricula-1').value = this.value;"  placeholder="Matricula*"name ="matricula" minlength="3" class="form-control" >
							</div>
							
							<div class="col-md-3">						
								<input type="date" placeholder="Admissao*"  onkeyup="document.getElementById('admissao-1').value = this.value;" name ="admissao" minlength="8" id="admissao" class="form-control" >
							</div>
                            </div>


							<?php
							}
							?>
                            <br>
                            <h4 style="color:#606060;font-weight:bold">ENDERE??O</h4>
                            <br>
                            <hr style="width: 80%;position: relative;margin-top: -3.5%;margin-left: 21%;height:1px;background-color:#606060;" size = 50>
                            <div class="row">
									<div class="col-3">													
                                        <input type="text" name="cep"  onkeyup="document.getElementById('cep-1').value = this.value;" id="cep"class="form-control" placeholder="CEP*">									
									</div>
                                    <div class="col-3">													
                                        <input type="text" class="form-control" id="rua"  onkeyup="document.getElementById('rua-1').value = this.value;" name="rua" placeholder="Rua*">									
									</div>
                                    <div class="col-3">													
                                        <input type="text" class="form-control"  onkeyup="document.getElementById('numero-1').value = this.value;" id="numero"name ="numero"placeholder="Numero*">										
									</div>
                                    <div class="col-2">													
                                        <input type="text" name="uf" id="uf" class="form-control"  onkeyup="document.getElementById('uf-1').value = this.value;" placeholder="Estado*" >									
									</div>
                            </div>
                            <div class="row">
									<div class="col-3">													
                                        <input type="text" name="complemento" id="complemento" onkeyup="document.getElementById('complemento-1').value = this.value;" placeholder="Complemento" class="form-control">								
									</div>
                                    <div class="col-3">													
                                        <input type="text" name="cidade"  onkeyup="document.getElementById('cidade-1').value = this.value;" id="cidade" class="form-control" placeholder="Ex: joao pessoa*" >								
									</div>
                                    <div class="col-3">													
                                        <input type="text" name="bairro"  onkeyup="document.getElementById('bairro-1').value = this.value;" id="bairro"class="form-control" placeholder="Bairro*" >							
									</div>
                            </div>  
                            <br>
                            <h4 style="background-color:#4177d0; border-radius: 3px;color: white;padding:2% ">O RESPONS??VEL FINANCEIRO SER?? TITULAR DO PLANO? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" style="background-color:#4177d0;border-color:#4177d0;font-size:25px"class="btn btn-danger" >SIM</button>  |<button type="button" style="background-color:#4177d0;border-color:#4177d0;font-size:25px"class="btn btn-danger" onclick="Mudarestado('minhaDiv')"> N??O</button></h4>      
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
                                <input type="text" name="maetitular" placeholder="M??e" minlength="10" class="form-control">                            
                            </div>
                            <div class="col-3">                                
                                    <input type="text" name="sustitular" placeholder="Cart??o do SUS" minlength="15" class="form-control">                                
                            </div>                         

                            </div>
                            </div>

					
							</section>
						
							<br>
						
							<!-- Step 2 -->
                           <h5>Beneficiarios</h5>
                            <section id="resp">
                              <script>
								     //Funcao adiciona uma nova linha na tabela
									 function adicionaLinha(idTabela) {
										var nome = document.querySelector("#nomedependente");
										var cpf = document.querySelector("#cpfdependente");
										var data = document.querySelector("#datadependente");
										var parentesco = document.querySelector("#parentesco");
										var estado = document.querySelector("#estadodependente");
										var sexo = document.querySelector("#sexodependente");
										var mae = document.querySelector("#maedependente");
										var cns = document.querySelector("#cnsdependente");
										var cpftitular = document.querySelector("#cpf");
										if(cpftitular.value.length < 11){
											alert('Preencha o CPF do Titular');
											
										}else{
										$.ajax({
										method: "POST",
										url: "demo_test_post.php",
										data: {nome: nome.value, cpf: cpf.value, data: data.value, parentesco: parentesco.value, estado: estado.value, sexo: sexo.value, mae: mae.value, cns: cnsdependente.value, cpftitular: cpftitular.value   }
										});
										
										var tabela = document.getElementById(idTabela);
										var numeroLinhas = tabela.rows.length;
										var linha = tabela.insertRow(numeroLinhas);
										var celula1 = linha.insertCell(0);
										var celula2 = linha.insertCell(1);   
										var celula3 = linha.insertCell(2);
										var celula4 = linha.insertCell(3); 
										celula1.innerHTML = nome.value; 
										celula2.innerHTML =  cpf.value; 
										celula3.innerHTML =  'R$:20.00'; 
										celula4.innerHTML =  "<a onclick='removeLinha(this)'><i class='fa fa-pencil'>Apagar</i></a>";
									}
										}

										// funcao remove uma linha da tabela
										function removeLinha(linha) {
										var i=linha.parentNode.parentNode.rowIndex;
										document.getElementById('tbl').deleteRow(i);
										}            
							  </script> 
                            <link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/jquery.dataTables.css">
                            <link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/dataTables.bootstrap4.css">
                            <link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/responsive.dataTables.css">
						
                            	<div id="row4" class="row">
						<table id="tbl" class="data-table stripe hover nowrap">
							<thead>
								<tr style="background-color:#4177d0 ">
									<th style="padding-left:5%" class="table-plus datatable-nosort">Nome</th>							
									<th style="padding-left:5%">CPF</th>
									<th style="padding-left:1%">Valor Unit??rio</U></th>
									<th style="padding-left:5%">Op????es</th>	
									
								</tr>
							</thead>						
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
                            <span aria-hidden="true" style="font-weight: 500 !important;">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                       <h4 style="color:#606060;font-weight:bold;text-align: center;">CADASTRAR DEPENDENTES</h4>
                        <div class="row">
                        <div class="col-6">
																				
									<select class="form-control" name="parentesco" id="parentesco">
									<option value="3">Conjuge</option>
									<option value="4">Filho</option>
									<option value="8">Pai/Mae</option>
									<option value="6">Enteado</option>
									<option value="10">Outro</option>
									</select>
									
								</div>
								<div class="col-6">
																			
									<input type="text" name="nomedependente" class="form-control" id="nomedependente" placeholder="Nome Completo">
									
								</div>
								<br>
								<div style ="margin-top:2%" class="col-6">
									
										
										<input type="text" class="form-control"  name ="cpfdependente" placeholder="CPF" id="cpfdependente" >
									
								</div>
								<div style ="margin-top:2%" class="col-6">																		
									<input type="text" name="datadependente"  class="form-control " id="datadependente" placeholder="Data de Nascimento" >
									
								</div>
						
							</div>
							<div class="row">
						
							<div class="col-6">
																				
									<select class="form-control" name="estadodependente" id="estadodependente">
									<option value="Solteiro">Solteiro</option>
									<option value="Casado">Casado</option>
									<option value="Vi??vo">Vi??vo</option>
									<option value="Separado">Separado</option>
									<option value="Divorciado">Divorciado</option>
									<option value="Rela????o Estavel">DRela????o Estavel</option>
									</select>
									
								</div>
								<div class="col-6">
																				
									<select class="form-control" name="sexodependente" id="sexodependente">
									<option value="1">Masculino</option>
									<option value="0">Feminino</option>
								
									</select>
									
								</div>
								
							<div style ="margin-top:2%"class="col-6">																
									<input type="text" class="form-control" id="maedependente" name ="maedependente"placeholder="M??e">								
							</div>
							<div style ="margin-top:2%" class="col-6">													
								<input type="text" name="cnsdependente" id="cnsdependente" class="form-control" placeholder="Cart??o do sus" >								
							</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="button"  onclick="adicionaLinha('tbl')" style="background-color:#284ebf"class="btn btn-primary" data-dismiss="modal">Cadastrar</button>
                        </div>
                        </div>
                    </div>
                    
                    </div>
								
							</section>
							<!-- Step 3 -->
							<h5>Imagens</h5>
							<section>
							
							<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
							<div style="margin-top:5%" id="branco">                
                   
								<div class="drop-zone">
									<span style="color:white" class="drop-zone__prompt"><i style="font-size: 297%;padding: 11%;color:#606060" class="fas fa-download"></i><br><div class="fundoazul"  >RG FRENTE</div></span>                    
									<input type="file" name="arquivo10[]" multiple="multiple"class="drop-zone__input" >
								</div>
								
								
								<div class="drop-zone">
									<span style="color:white" class="drop-zone__prompt"><i style="font-size: 297%;padding: 11%;color:#606060" class="fas fa-download"></i><br><div class="fundoazul"  >RG VERSO</div></span>
									<input type="file" name="arquivo1[]"  multiple="multiple" class="drop-zone__input" >
								</div>
								
							
								<div class="drop-zone">
									<span style="color:white"  class="drop-zone__prompt"><i style="font-size: 297%;padding: 11%;color:#606060" class="fas fa-download"></i><br><div class="fundoazul" >CPF</div></span>
									<input type="file" name="arquivo2[]"  multiple="multiple" class="drop-zone__input">
								</div>
								
							
								<div class="drop-zone">
									<span style="color:white"  class="drop-zone__prompt"><i style="font-size: 297%;padding: 7%;color:#606060" class="fas fa-download"></i><br><div class="fundoazul"  >COMPROVANTE DE RESID??NCIA</div></span>
									<input type="file" name="arquivo3[]"  multiple="multiple" class="drop-zone__input" >
								</div>
							
								<?php if( $_SESSION['plano'] != 'UNIDENTISVIPBOLETO'){
								?>
							
								<div class="drop-zone">
									<span style="color:white"  class="drop-zone__prompt"><i style="font-size: 297%;padding: 11%;color:#606060" class="fas fa-download"></i><br><div class="fundoazul"  >CART??O</div></span>
									<input type="file" name="arquivo4[]"  multiple="multiple" class="drop-zone__input" >
								</div>
								<?php }?>  
								
							
								<div class="drop-zone">
									<span style="color:white" class="drop-zone__prompt"><i style="font-size: 297%;padding: 11%;color:#606060" class="fas fa-download"></i><br><div class="fundoazul" >OUTRO</div></span>
									<input type="file" name="arquivo5[]"  multiple="multiple" class="drop-zone__input">
								</div>
								
							
									</div>
									<button name="SendCadImg" type="submit">submit</button>
							</section>
							<!-- Step 4 -->
						
							<h5>Resumo</h5>
							
							<section>
								
							<div id="row4" class="row">
							<div class="col-4">																				
									<input type="text"  id="a-1" placeholder="Nome"class="form-control" onkeyup="document.getElementById('a').value = this.value;" readonly>
									</div>							
									<div class="col-3">									
										<input type="text"   onkeyup="document.getElementById('cpf').value = this.value;" placeholder="CPF*" id="cpf-1"class="form-control"readonly>
                                    </div>
								</div>																	
								<div class="row">
									<div class="col-5">													
                                        <input type="email" placeholder="Email*"  onkeyup="document.getElementById('email').value = this.value;" id="email-1" name="email" class="form-control"readonly>								
									</div>
									<div class="col-3">
                                    <input type="text" name ="telefone" placeholder="Telefone* "  onkeyup="document.getElementById('telefone').value = this.value;"  id="telefone-1" class="form-control" readonly>
									</div>							
							
									
									<div class="col-3">											
									    <input type="text" placeholder="Telefone :"name ="fixo" id="telefone" class="form-control" readonly>
									</div>
									</div>
									
									<div class="row">
									<div class="col-3">
                                    <select name="sexo"  onkeyup="document.getElementById('sexo').value = this.value;"  id="sexo-1"class="custom-select form-control"readonly>
											<option value="">Sexo*</option>
											<option value="1">Masculino</option>
											<option value="0">Feminino</option>										
										</select>
									</div>
									<div class="col-3">
                                        <input type="text"  onkeyup="document.getElementById('rg').value = this.value;" class="form-control" name ="rg" minlength="7" maxlength="7" id ="rg-1"placeholder="RG*"readonly>
									</div>						
									<div class="col-3">
                                        <input type="text" class="form-control" minlength="4"  onkeyup="document.getElementById('emissor').value = this.value;" id="emissor-1"name ="emissor"placeholder="Org??o Emissor*"readonly>
									</div>
                                    <div class="col-3">
                                        <input type="text" class="form-control" id="data-1" onkeyup="document.getElementById('data').value = this.value;"  name ="nascimento"placeholder="Data de Nascimento*"readonly>								
									</div>
                                  
									</div>
								
								
									<div class="row">
									
                                    <div class="col-4">
                                    <input type="text"  id="mae-1" name="mae" onkeyup="document.getElementById('mae').value = this.value;"  placeholder="M??e*" minlength="10" class="form-control"readonly>
									</div>
                                    <div class="col-3">
                                    <select name="estado"  onkeyup="document.getElementById('estado').value = this.value;"   id="estado-1" class="custom-select form-control"readonly>
											<option value="">Estado Civil*</option>
											<option value="Solteiro">Solteiro</option>
											<option value="Casado">Casado</option>										
										</select>							
									</div>
                                    <div class="col-3">
                                        <input type="text"  onkeyup="document.getElementById('sus').value = this.value;"  id="sus-1" placeholder="Cart??o do SUS" name ="sus" minlength="15" class="form-control"readonly>
									</div>
								</div>
								
                                <?php
							if($_SESSION['cliente'] == 'servidorpublico'){
                            ?>
							<div class="row">
							<div class="col-md-3">			
								<input type="text" placeholder="Matricula*"name ="matricula" minlength="3" class="form-control" readonly>
							</div>
							
							<div class="col-md-3">						
								<input type="date" placeholder="Admissao*" name ="admissao" minlength="8"  class="form-control" readonly>
							</div>
                            </div>


							<?php
							}
							?>
                            <br>
                            <h4 style="color:#606060;font-weight:bold">ENDERE??O</h4>
                            <br>
                            <hr style="width: 80%;position: relative;margin-top: -3.5%;margin-left: 21%;height:1px;background-color:#606060;" size = 50>
                            <div class="row">
									<div class="col-3">													
                                        <input type="text" name="cep" onkeyup="document.getElementById('cep').value = this.value;"  id="cep-1"class="form-control" placeholder="CEP*" readonly>								
									</div>
                                    <div class="col-3">													
                                        <input type="text" class="form-control" id="rua-1" onkeyup="document.getElementById('rua').value = this.value;"  name="rua" placeholder="Rua*"readonly>								
									</div>
                                    <div class="col-3">													
                                        <input type="text" class="form-control" onkeyup="document.getElementById('numero').value = this.value;"  id="numero-1"name ="numero"placeholder="Numero*"readonly>									
									</div>
                                    <div class="col-3">													
                                        <input type="text" name="uf" id="uf-1" class="form-control" onkeyup="document.getElementById('uf').value = this.value;"  placeholder="Estado*" readonly>								
									</div>
                            </div>
                            <div class="row">
									<div class="col-3">													
                                        <input type="text" name="complemento" onkeyup="document.getElementById('complemento').value = this.value;"  placeholder="Complemento" id="complemento-1" class="form-control" readonly>						
									</div>
                                    <div class="col-3">													
                                        <input type="text" name="cidade" id="cidade-1" class="form-control" onkeyup="document.getElementById('cidade').value = this.value;"  placeholder="Ex: joao pessoa*" readonly>							
									</div>
                                    <div class="col-3">													
                                        <input type="text" id="bairro-1" name="bairro" onkeyup="document.getElementById('bairro').value = this.value;"  class="form-control" placeholder="Bairro*" readonly>							
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
										next: '<button id="proximo" onclick="validar()"class="form-control"  style="background-color:#009efb;border-color:#009efb;color:white" >Proximo</button>',
										previous: '<button class="form-control" style="background-color: #fff;border-color:white" id="anterior">Anterior</button>',
										
									},
									onStepChanged: function (event, currentIndex, priorIndex) {
										$('.steps .current').prevAll().addClass('disabled');
									},
									
								});
							</script>
                            
<script>
$(document).ready(function() {

        function limpa_formul??rio_cep() {
            // Limpa valores do formul??rio de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#ibge").val("");
        }

        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {

            //Nova vari??vel "cep" somente com d??gitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Express??o regular para validar o CEP.
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
							$("#rua-1").val(dados.logradouro);
                            $("#bairro-1").val(dados.bairro);
                            $("#cidade-1").val(dados.localidade);
                            $("#uf-1").val(dados.uf);
                            $("#ibge-1").val(dados.ibge);
                        } //end if.
                        else {
                            //CEP pesquisado n??o foi encontrado.
                            limpa_formul??rio_cep();
                            
                        }
                    });
                } //end if.
                else {
                    //cep ?? inv??lido.
                    limpa_formul??rio_cep();
                    alert("Formato de CEP inv??lido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formul??rio.
                limpa_formul??rio_cep();
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
					infoEmpty: "Mostrando 0 at?? 0 de 0 registros",
					searchPlaceholder: "Procurar",
					lengthMenu: "Mostrar _MENU_ registos",
					paginate: {
        			first: "Primeiro",
					previous: '<span id= "teste"></span>',
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
	</form>
</body>
</html>
