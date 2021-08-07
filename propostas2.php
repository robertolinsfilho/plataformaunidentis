<?php
session_start();
include_once('conexao.php');
$result_usuario = "SELECT * from dependentes ";
$resultado_usuario = mysqli_query($conexao, $result_usuario);

?>
 <script type="text/javascript">
function Mudarestado(el) {
  var display = document.getElementById(el).style.display;
  if (display == "none")
    document.getElementById(el).style.display = 'block';
  else
    document.getElementById(el).style.display = 'none';
}
</script>
<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/build/jquery.steps.css">
</head>
<body>
<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/responsive.dataTables.css">

	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
                
					<div class="row">
                    
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Incluir Propostas</h4>
							</div>
                            
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Incluir Propostas</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								
							</div>
						</div>
					</div>
				</div>
				
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                
					<div class="clearfix">
						<h4 class="text-blue">Incluir Propostas</h4>
					
					</div>
					<div class="wizard-content">
						<form class="tab-wizard wizard-circle wizard">
							<h5>Dados Pessoais</h5>
							<section>

								<div class="row">
								
									<div class="col-md-6">
										<div class="form-group">
											
											<input type="text" name="nome" placeholder="Nome Completo" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											
											<input type="text" name="cpf" placeholder="CPF" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										
											<input type="email"placeholder="Email" name="email" class="form-control">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											
											<input type="text" placeholder="Telefone :"name ="fixo" class="form-control">
										</div>
									</div>
                                    <div class="col-md-3">
										<div class="form-group">
											
											<input type="text" name ="telefone" placeholder="Telefone " class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											
											<select class="custom-select form-control">
												<option value="">Sexo</option>
												<option value="Masculin">Masculino</option>
												<option value="Feminino">Feminino</option>
											
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											
											<input type="text" class="form-control" name ="rg"placeholder="RG">
										</div>
									</div>
                                    <div class="col-md-3">
										<div class="form-group">
											
											<input type="text" class="form-control" name ="emissor"placeholder="Orgão Emissor">
										</div>
									</div>
                                    <div class="col-md-3">
										<div class="form-group">
											
											<input type="text" class="form-control date-picker" name ="nascimento"placeholder="Data de Nascimento">
										</div>
									</div>
								</div>
                                
								<div class="row">
								
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <input type="text" name="mae" placeholder="Mãe" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
										<div class="form-group">
											
											<select name="estado" class="custom-select form-control">
												<option value="">Estado Civil</option>
												<option value="Masculin">Solteiro</option>
												<option value="Feminino">Casado</option>
											
											</select>
										</div>
									</div>
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                    
                                        <input type="email"placeholder="Email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        
                                        <input type="text" placeholder="Cartão do SUS:"name ="sus" class="form-control">
                                    </div>
                                </div>
                               
                            </div>
                            <h5>Endereço</h5>
							<br>
							<div class="row">
								
									<div class="col-md-3">
										<div class="form-group">											
										<input type="text" name="cep" id="cep"class="form-control" placeholder="CEP"required>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">											
										<input type="text" class="form-control" id="rua" name="rua" placeholder="Rua"required>
										</div>
									</div>
                                    <div class="col-md-3">
										<div class="form-group">
											
											<input type="text" class="form-control" name ="numero"placeholder="Numero"required>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											
										<input type="text" name="uf" id="uf" class="form-control" placeholder="estado" required>
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
											
										<input type="text" name="cidade" id="cidade" class="form-control" placeholder="Ex: joao pessoa" required>
										</div>
									</div>
                            
                                <div class="col-md-4">
                                    <div class="form-group">
                                    
									<input type="text" name="bairro" id="bairro"class="form-control" placeholder="Bairo" required>
                                    </div>
                                </div>
                                
                               </div>
							</section>
							<!-- Step 2 -->
							<h5>Dependentes</h5>
							<section>
							<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h5 class="text-blue">Todos Clientes</h5>
							
						</div>
					</div>
					<div class="row">
						<table class="data-table stripe hover nowrap">
							<thead>
								<tr>
								<th class="table-plus datatable-nosort">Nome</th>		
															
									<th>Titular</th>
								
								
								</tr>
							</thead>


							<tbody>
							
							<?php
									while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
										
        					?>
								<tr>
								<td class="table-plus"><?php echo $row_usuario['nome']; ?></td>	
											
									<td><?php echo $row_usuario['cpf']; ?></td>
									
									
								
								</tr>
								<?php 
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
							
							</section>
							<!-- Step 3 -->
							<h5>Interview</h5>
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Interview For :</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label>Interview Type :</label>
											<select class="form-control">
												<option>Normal</option>
												<option>Difficult</option>
												<option>Hard</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Interview Date :</label>
											<input type="text" class="form-control date-picker" placeholder="Select Date">
										</div>
										<div class="form-group">
											<label>Interview Time :</label>
											<input class="form-control time-picker" placeholder="Select time" type="text">
										</div>
									</div>
								</div>
							</section>
							<!-- Step 4 -->
							<h5>Remark</h5>
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Behaviour :</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label>Confidance</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label>Result</label>
											<select class="form-control">
												<option>Select Result</option>
												<option>Selected</option>
												<option>Rejected</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Comments</label>
											<textarea class="form-control"></textarea>
										</div>
									</div>
								</div>
							</section>
						</form>
					</div>
				</div>

			

				<!-- success Popup html Start -->
				<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-body text-center font-18">
								<h3 class="mb-20">Form Submitted!</h3>
								<div class="mb-30 text-center"><img src="vendors/images/success.png"></div>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							</div>
							<div class="modal-footer justify-content-center">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
							</div>
						</div>
					</div>
				</div>
				<!-- success Popup html End -->
			</div>
			<?php include('include/footer.php'); ?>
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
				finish: "Submit"
			},
			onStepChanged: function (event, currentIndex, priorIndex) {
				$('.steps .current').prevAll().addClass('disabled');
			},
			onFinished: function (event, currentIndex) {
				$('#success-modal').modal('show');
			}
		});

	
	</script>
	<?php
			$situacao_usuario = "pendente";
			if($situacao_usuario == "pendente"){ ?>
				<script>
					$(document).ready(function(){
						$('#myModal').modal('show');
					});
				</script>
			<?php } ?>
			<script>
			jQuery(document).ready(function($){
    
	// Objeto com as relações de hotéis e suas respectivas acomodações disponíveis
	var acomodacoes = {
	  Selecione: ['Selecione'],
	  pessoafisica: ['Selecione', 'GRUPO MUNICÍPIOS - PB', 'GRUPO MUNICÍPIOS - RN'],
	  servidorpublico: ['Selecione', 'GOVERNO DO ESTADO PB', 'PREFEITURA MUNICIPAL DE CABEDELO', 'SEMOB', 'EMLUR','SECRETARIA DE SAUDE DO MUNICIPIO','FUNDAC','PREFEITURA MUNICIPAL DE SANTA RITA'],
	  HotelC: ['Selecione', 'SGL', 'DBL', 'TPL', 'QTP']
	}
	
	// Lista de acomodações
	$acomods = $('#Acomodacao option');
	
	// Evento ao alterar o hotel
	$('#Hotel').on('change', function(event){
	  // Hotel atual (selecionado)
	  var hotel = this.value;
	  
	  // Percorre a lista de acomodações
	  $acomods.each(function(index, el){
		
		// Verifica se a acomodação atual existe na relação
		// de acomodações para o hotel selecionado
		if (acomodacoes[hotel].indexOf(el.value) == -1) // Não existe
			$(el).prop('disabled', true); // Desabilita a acomodação
		else // Existe
		  $(el).prop('disabled', false); // Habilita a acomodação
	  });
	}).change(); // Executa o método change uma vez para desabilitar 
				 // todas as acomodações pois nenhum hotel foi selecionado ainda
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
                        alert("CEP não encontrado.");
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
</body>
<script>
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
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
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
</html>