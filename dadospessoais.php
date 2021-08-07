<?php

error_reporting(0);
ini_set(“display_errors”, 0 );
?>

<!DOCTYPE html>
<html >
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>	
		<script type="text/javascript">
          $("#telefone, #celular").mask("(00) 00000-0000");
        </script>


		<script type="text/javascript">
	
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
        </script>
	<?php include('include/head.php'); ?>
    <style>
        #minhaDiv{
            display: none;

        }
		.col-md-6,.col-md-5,.col-md-3,.col-md-4{
			background-color:#f6f6f6;
			padding:8px;
			border-radius:5px;
      
			
		}
    input, select{
      border: 1px solid #606060 !important; 
    }
    body{
      background-color:#f6f6f6
    }
    @media screen and (max-device-width: 720px) {
      .inline{
        width:54%;
       
      }
      .inline h4{
        font-size:20px
       
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
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
							<h5 style="font-size:17px;font-weight:bold;width:120%;color:#606060">INCLUIR PROPOSTA | VALOR TOTAL : 00.00 | PLANO :  | DEPENDENTES : 0</h5>
								<BR>
                                    <?php

                                    if(isset($_SESSION['menssagem'])) {

                                    ?>
                                <div class="alert alert-primary" role="alert">
                                     <?php
                                        echo $_SESSION['menssagem'];
                                        unset($_SESSION['menssagem']);


                                    ?>

                                </div>
                                <?php
                                    }
                                ?>
									<form  method="post" action="dadospessoaissession">
                             <div class="inline" style="display:-webkit-inline-box">   
                  <h4 style="color:#606060;padding-top:7px ">Escolha o Plano :</h4>
								<br>
								<?php
							if($_SESSION['cliente'] == 'servidorpublico'){
							?>
									<div class="col-md-10">
									<div class="form-group">
										
										<select style="background-color:#b3b3b3" name="plano" id="plano"class="custom-select form-control-lg" required>
										<option >Selecione</option>
											<option value="UNIDENTISVIPEMPRESARIAL">UNIDENTIS VIP EMPRESARIAL</option>
											
										</select>
										<span id="textinho0"></span>
									</div>
								</div>
							<?php
								}elseif($_SESSION['escolha'] == 'PB'){
								?>
							<div class="col-md-10">
									<div class="form-group">
										
										<select style="background-color:#b3b3b3"  name="plano" id="plano" class="custom-select form-control-lg" required>
										<option value="" >Selecione</option>
											<option value="UNIDENTISVIPBOLETO">UNIDENTIS VIP BOLETO - Familiar -Gr. Municipios PB - 455.913/07-4- R$: 40.00- ROL DA ANS</option>
											<option value="UNIDENTISVIPCARTAO">UNIDENTIS VIP CARTÃO - Familiar -Gr. Municipios PB - 455.913/07-4- R$: 23.90- ROL DA ANS</option>
											<option value="UNIDENTISVIPFAMILIACARTAO">UNIDENTIS VIP FAMÍLIA CARTÃO - Familiar -Gr. Municipios PB - 455.913/07-4- R$: 60.00- ROL DA ANS</option>
											<option value="UNIDENTISVIPUNIVERSITARIOCARTAO">UNIDENTIS VIP UNIVERSITÁRIO CARTÃO - Familiar -Gr. Municipios PB - 455.913/07-4- R$: 21.90- ROL DA ANS</option>
										</select>
										<span id="textinho0"></span>
									</div>
								</div>
                                <?php
                            }
							elseif ($_SESSION['escolha'] == 'RN'){

                                ?>
								
                                <div class="col-md-10">
                                    <div class="form-group">

                                        <select style="background-color:#b3b3b3" name="plano" id="plano" class="custom-select form-control-lg" required>
                                            <option value="" >Selecione</option>
                                            <option value="UNIDENTISVIPBOLETO">UNIDENTIS VIP BOLETO - Familiar -Gr. Municipios RN - 479.253/17-0- R$: 40.00- ROL DA ANS</option>
                                            <option value="UNIDENTISVIPCARTAO">UNIDENTIS VIP CARTÃO - Familiar -Gr. Municipios RN - 479.253/17-0- R$: 25.90- ROL DA ANS</option>
                                            <option value="UNIDENTISVIPFAMILIACARTAO">UNIDENTIS VIP FAMÍLIA CARTÃO - Familiar -Gr. Municipios RN - 479.253/17-0- R$: 66.00- ROL DA ANS</option>
                                            <option value="UNIDENTISVIPUNIVERSITARIOCARTAO">UNIDENTIS VIP UNIVERSITÁRIO CARTÃO - Familiar -Gr. Municipios RN - 479.253/17-0- R$: 25.00- ROL DA ANS</option>
                                        </select>
										<span id="textinho0"></span>
                                    </div>
                                </div>


                                <?php
                            }
							?>
              </div>
							</div>
							
						</div>
						
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
          <div class="inline2" style="display:inline">
					<div class="clearfix" >
						<div class="pull-left">
							<h4 style="color:#606060;font-weight:bold">DADOS PESSOAIS </h4>
              
                             
						</div>
						
					</div>
          <br>
          <hr style="width: 80%;position: relative;margin-top: -3.5%;margin-left: 21%;font-weight:bold;height:1px;background-color:#606060;" size = "50">
          <div>
					<div class="row">
								
								<div class="col-md-6">
									<div class="form-group">
										
										<input type="text" name="nome" id ="nome" placeholder="Nome Completo*" minlength="10" class="form-control" required>
										<span id="textinho"></span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										
										<input type="text" name="cpf"  placeholder="CPF*" id="cpf"class="form-control"required>
										<span id="textinho1"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									
										<input type="email"placeholder="Email*" id="email" name="email" class="form-control"required>
										<span id="textinho2"></span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
									<input type="text" name ="telefone" placeholder="Telefone* " id="telefone" class="form-control" required>
									<span id="textinho3"></span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										
									<input type="text" placeholder="Telefone :"name ="fixo" id="telefone" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										
                  <select name="sexo" id="sexo" class="custom-select form-control"required>
											<option value="">Sexo*</option>
											<option value="1">Masculino</option>
											<option value="0">Feminino</option>
										
										</select>
									
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										
										<input type="text" class="form-control" name ="rg" minlength="7" maxlength="7" id ="rg"placeholder="RG*"required>
                    <span id="textinho5"></span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										
										<input type="text" class="form-control" minlength="4" id="emissor"name ="emissor"placeholder="Orgão Emissor*"required>
                    <span id="textinho6"></span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										
										<input type="text" class="form-control" id="data"name ="nascimento"placeholder="Data de Nascimento*"required>
                    <span id="textinho7"></span>
									</div>
								</div>
							</div>
							
							<div class="row">
							
							<div class="col-md-3">
								<div class="form-group">
									
									<input type="text" name="mae" id="mae"placeholder="Mãe*" minlength="10" class="form-control"required>
                  <span id="textinho8"></span>
								</div>
							</div>
							<div class="col-md-3">
									<div class="form-group">
										
										<select name="estado" id="estado" class="custom-select form-control"required>
											<option value="">Estado Civil*</option>
											<option value="Solteiro">Solteiro</option>
											<option value="Casado">Casado</option>
										
										</select>
                    <span id="textinho9"></span>
									</div>
								</div>
						
							<div class="col-md-3">
								<div class="form-group">
									
									<input type="text" id="sus" placeholder="Cartão do SUS" name ="sus" minlength="15" class="form-control">
								</div>
							</div>
							<?php
							if($_SESSION['cliente'] == 'servidorpublico'){
                            ?>
							
							<div class="col-md-3">
								<div class="form-group">
									
									<input type="text" placeholder="Matricula*"name ="matricula" minlength="3" class="form-control" required>
								</div>
							</div>
							
							<div class="col-md-3">
								<div class="form-group">
									
									<input type="date" placeholder="Admissao*" name ="admissao" minlength="8"  class="form-control" required>
								</div>
							</div>



							<?php
							}
							?>


						</div>
            <br>
						<h4 style="color:#606060;font-weight:bold">ENDEREÇO</h4>
           
						<br>
            <hr style="width: 87%;position: relative;margin-top: -3.5%;margin-left: 14%;height:1px;background-color:#606060;" size = 50>
						<div class="row">
							
								<div class="col-md-3">
									<div class="form-group">											
									<input type="text" name="cep" id="cep"class="form-control" placeholder="CEP*"required>
                  <span id="textinho10"></span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">											
									<input type="text" class="form-control" id="rua" name="rua" placeholder="Rua*"required>
                  <span id="textinho11"></span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										
										<input type="text" class="form-control" id="numero"name ="numero"placeholder="Numero*"required>									</div>
                    <span id="textinho12"></span>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										
									<input type="text" name="uf" id="uf" class="form-control" placeholder="Estado*" required>
                  <span id="textinho13"></span>
									</div>
								</div>
						
							</div>
							
							<div class="row">
							
							<div class="col-md-3">
								<div class="form-group">

									<input type="text" name="complemento" placeholder="Complemento" class="form-control">
								</div>
							</div>
							<div class="col-md-3">
									<div class="form-group">
										
									<input type="text" name="cidade" id="cidade" class="form-control" placeholder="Ex: joao pessoa*" required>
                  <span id="textinho14"></span>
									</div>
								</div>
						
							<div class="col-md-4">
								<div class="form-group">
								
								<input type="text" name="bairro" id="bairro"class="form-control" placeholder="Bairro*" required>
                <span id="textinho15"></span>
								</div>
							</div>
							
						   </div>
                        <br>
                        <h4 style="background-color:#4177d0; border-radius: 3px;color: white;padding:2% ">O RESPONSÁVEL FINANCEIRO SERÁ TITULAR DO PLANO? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" style="background-color:#4177d0;border-color:#4177d0;font-size:25px"class="btn btn-danger" >SIM</button>  |<button type="button" style="background-color:#4177d0;border-color:#4177d0;font-size:25px"class="btn btn-danger" onclick="Mudarestado('minhaDiv')"> NÃO</button></h4>

                        <div id="minhaDiv">
                        <br>
                        <h4 style="color:#606060;font-weight:bold">DADOS PESSOAIS </h4>
                     
                            <br>
                            <hr style="width: 80%;position: relative;margin-top: -3.5%;margin-left: 21%;height:1px;background-color:#606060;" size = 50>
                            <div class="row">

                                <div class="col-md-5">
                                    <div class="form-group">

                                        <input type="text" name="nometitular" placeholder="Nome Completo*" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">

                                        <input type="text" name="cpftitular"  id="cpf1" class="form-control" placeholder="CPF*" >
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">

                                        <input type="text" name="nascimentotitular" id="data1" class="form-control" placeholder="Data Nascimento*" >
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">

                                        <select name="estadotitular" class="custom-select form-control">
                                            <option value="">Estado Civil*</option>
                                            <option value="Solteiro">Solteiro</option>
                                            <option value="Casado">Casado</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">

                                        <select name="sexotitular" class="custom-select form-control">
                                            <option value="1">Sexo*</option>
                                            <option value="1">Masculino</option>
                                            <option value="1">Feminino</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">

                                        <input type="text" name="maetitular" placeholder="Mãe" minlength="10" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">

                                        <input type="text" name="sustitular" placeholder="Cartão do SUS" minlength="15" class="form-control">
                                    </div>
                                </div>


                            </div>

                        </div>
                        <br>
						<style>
						#avanca{
									margin-left: 80%;
									width: 20% ; 
									background-color:#4177d0 ;
								}
						  @media screen and (max-device-width:1000px) {
								#avanca {
									margin-left: 70%;
									width: 30% ;
									background-color:#4177d0 ;
								}
								}
								
						</style>
                        <br><br>
						   <input onclick="validar()" class="btn btn-success" value="Avançar"type="submit" id="avanca" >
					</form>
					

			
		
				
					
				<!-- Form grid End -->

				<!-- Input Validation Start -->
				
					
					
				<!-- Input Validation End -->

			</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
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

function validar(){
	var input = document.getElementById("nome");
  if(input.value.length < 3){
    input.focus();
    input.style.border = "1px solid #ef3c59";
    document.getElementById("textinho").innerHTML = '<p class="help-block ng-binding" style="color:#ef3c59;">Campo obrigatório</p>';
    return false
  }else{
    document.getElementById("textinho").innerHTML = ''; // ou display: none
    input.style.border = "1px solid #999";
  }

  var plano = document.getElementById("plano");
  if(plano.value.length < 12){
    plano.focus();
    plano.style.border = "1px solid #ef3c59";
    document.getElementById("textinho0").innerHTML = '<p class="help-block ng-binding" style="color:#ef3c59;">Campo obrigatório</p>';
    return false
  }else{
    document.getElementById("textinho0").innerHTML = ''; // ou display: none
    plano.style.border = "1px solid #999";
  }
  var cpf = document.getElementById("cpf");
  if(cpf.value.length < 3){
    cpf.focus();
    cpf.style.border = "1px solid #ef3c59";
    document.getElementById("textinho1").innerHTML = '<p class="help-block ng-binding" style="color:#ef3c59;">Campo obrigatório</p>';
    return false
  }else{
    document.getElementById("textinho1").innerHTML = ''; // ou display: none
    cpf.style.border = "1px solid #999";
  }
  var email = document.getElementById("email");
  if(email.value.length < 3){
    email.focus();
    email.style.border = "1px solid #ef3c59";
    document.getElementById("textinho2").innerHTML = '<p class="help-block ng-binding" style="color:#ef3c59;">Campo obrigatório</p>';
    return false
  }else{
    document.getElementById("textinho2").innerHTML = ''; // ou display: none
    email.style.border = "1px solid #999";
  }
  var telefone = document.getElementById("telefone");
  if(telefone.value.length < 3){
    telefone.focus();
    telefone.style.border = "1px solid #ef3c59";
    document.getElementById("textinho3").innerHTML = '<p class="help-block ng-binding" style="color:#ef3c59;">Campo obrigatório</p>';
    return false
  }else{
    document.getElementById("textinho3").innerHTML = ''; // ou display: none
    telefone.style.border = "1px solid #999";
  }
  var sexo = document.getElementById("sexo");
  if(sexo.value.length < 7){
    sexo.focus();
    sexo.style.border = "1px solid #ef3c59";
    document.getElementById("textinho4").innerHTML = '<p class="help-block ng-binding" style="color:#ef3c59;">Campo obrigatório</p>';
    return false
  }else{
    document.getElementById("textinho4").innerHTML = ''; // ou display: none
    sexo.style.border = "1px solid #999";
  }
  var rg = document.getElementById("rg");
  if(rg.value.length < 3){
    rg.focus();
    rg.style.border = "1px solid #ef3c59";
    document.getElementById("textinho5").innerHTML = '<p class="help-block ng-binding" style="color:#ef3c59;">Campo obrigatório</p>';
    return false
  }else{
    document.getElementById("textinho5").innerHTML = ''; // ou display: none
    rg.style.border = "1px solid #999";
  }
  var emissor = document.getElementById("emissor");
  if(emissor.value.length < 3){
    emissor.focus();
    emissor.style.border = "1px solid #ef3c59";
    document.getElementById("textinho6").innerHTML = '<p class="help-block ng-binding" style="color:#ef3c59;">Campo obrigatório</p>';
    return false
  }else{
    document.getElementById("textinho6").innerHTML = ''; // ou display: none
    emissor.style.border = "1px solid #999";
  }
  var data = document.getElementById("data");
  if(data.value.length < 3){
    data.focus();
    data.style.border = "1px solid #ef3c59";
    document.getElementById("textinho7").innerHTML = '<p class="help-block ng-binding" style="color:#ef3c59;">Campo obrigatório</p>';
    return false
  }else{
    document.getElementById("textinho7").innerHTML = ''; // ou display: none
    data.style.border = "1px solid #999";
  }
  var mae = document.getElementById("mae");
  if(mae.value.length < 3){
    mae.focus();
    mae.style.border = "1px solid #ef3c59";
    document.getElementById("textinho8").innerHTML = '<p class="help-block ng-binding" style="color:#ef3c59;">Campo obrigatório</p>';
    return false
  }else{
    document.getElementById("textinho8").innerHTML = ''; // ou display: none
    mae.style.border = "1px solid #999";
  }
  var estado = document.getElementById("estado");
  if(estado.value.length < 3){
    estado.focus();
    estado.style.border = "1px solid #ef3c59";
    document.getElementById("textinho9").innerHTML = '<p class="help-block ng-binding" style="color:#ef3c59;">Campo obrigatório</p>';
    return false
  }else{
    document.getElementById("textinho9").innerHTML = ''; // ou display: none
    estado.style.border = "1px solid #999";
  }
  var cep = document.getElementById("cep");
  if(cep.value.length < 3){
    cep.focus();
    cep.style.border = "1px solid #ef3c59";
    document.getElementById("textinho10").innerHTML = '<p class="help-block ng-binding" style="color:#ef3c59;">Campo obrigatório</p>';
    return false
  }else{
    document.getElementById("textinho10").innerHTML = ''; // ou display: none
    cep.style.border = "1px solid #999";
  }
  var rua = document.getElementById("rua");
  if(rua.value.length < 3){
    rua.focus();
    rua.style.border = "1px solid #ef3c59";
    document.getElementById("textinho11").innerHTML = '<p class="help-block ng-binding" style="color:#ef3c59;">Campo obrigatório</p>';
    return false
  }else{
    document.getElementById("textinho11").innerHTML = ''; // ou display: none
    rua.style.border = "1px solid #999";
  }
  var numero = document.getElementById("numero");
  if(numero.value.length < 3){
    numero.focus();
    numero.style.border = "1px solid #ef3c59";
    document.getElementById("textinho12").innerHTML = '<p class="help-block ng-binding" style="color:#ef3c59;">Campo obrigatório</p>';
    return false
  }else{
    document.getElementById("textinho12").innerHTML = ''; // ou display: none
    numero.style.border = "1px solid #999";
  }
  var uf = document.getElementById("uf");
  if(uf.value.length < 3){
    uf.focus();
    uf.style.border = "1px solid #ef3c59";
    document.getElementById("textinho13").innerHTML = '<p class="help-block ng-binding" style="color:#ef3c59;">Campo obrigatório</p>';
    return false
  }else{
    document.getElementById("textinho13").innerHTML = ''; // ou display: none
    uf.style.border = "1px solid #999";
  }
  var cidade = document.getElementById("cidade");
  if(cidade.value.length < 3){
    cidade.focus();
    cidade.style.border = "1px solid #ef3c59";
    document.getElementById("textinho14").innerHTML = '<p class="help-block ng-binding" style="color:#ef3c59;">Campo obrigatório</p>';
    return false
  }else{
    document.getElementById("textinho14").innerHTML = ''; // ou display: none
    cidade.style.border = "1px solid #999";
  }
  var bairro = document.getElementById("bairro");
  if(bairro.value.length < 3){
    bairro.focus();
    bairro.style.border = "1px solid #ef3c59";
    document.getElementById("textinho15").innerHTML = '<p class="help-block ng-binding" style="color:#ef3c59;">Campo obrigatório</p>';
    return false
  }else{
    document.getElementById("textinho15").innerHTML = ''; // ou display: none
    bairro.style.border = "1px solid #999";
  }
  var input = document.getElementById("nome");
  if(input.value.length < 3){
    input.focus();
    input.style.border = "1px solid #ef3c59";
    document.getElementById("textinho").innerHTML = '<p class="help-block ng-binding" style="color:#ef3c59;">Campo obrigatório</p>';
    return false
  }else{
    document.getElementById("textinho").innerHTML = ''; // ou display: none
    input.style.border = "1px solid #999";
  }
  var input = document.getElementById("nome");
  if(input.value.length < 3){
    input.focus();
    input.style.border = "1px solid #ef3c59";
    document.getElementById("textinho").innerHTML = '<p class="help-block ng-binding" style="color:#ef3c59;">Campo obrigatório</p>';
    return false
  }else{
    document.getElementById("textinho").innerHTML = ''; // ou display: none
    input.style.border = "1px solid #999";
  }
  

}

input.onkeyup = valida_form;



	

</script>
</body>
</html>