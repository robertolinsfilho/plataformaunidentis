<?php
session_start();
if (!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])) {
	// Usuário não logado! Redireciona para a página de login
	header("Location: login");
	exit;
}
error_reporting(0);
ini_set('display_errors', 0);
include_once('conexao.php');
$cpf = str_replace("-", "", str_replace(".", "", $_SESSION['cpf']));

$forekey = $_SESSION['forekey'];

$result_usuario = "SELECT * from dependentes where forekey ='$forekey'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$result_usuario2 = "SELECT COUNT(*)  AS total from dependentes where forekey ='$forekey'";
$resultado_usuario2 = mysqli_query($conexao, $result_usuario2);
$row_usuario2 = mysqli_fetch_assoc($resultado_usuario2);

$url = "http://unidentis.s4e.com.br/SYS/services/vendedor.aspx/NovoUsuario?token=rHFxpzIE8Ny86TNhgGzoybf93bcIopkXxqKdfShdgUbdpoALw0&id=1&cpf=. '$cpf' .&tipo=0";

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$resultado = json_decode(curl_exec($curl), true);
$cont = $row_usuario2['total'];
$_SESSION['cont'] = $cont;

if ($_SESSION['plano'] == 'PLANOVIPORTOCARTAO'){
	$preco1 = 99.00;
}

if ($_SESSION['plano'] == 'UNIDENTISVIPBOLETO' && $_SESSION['escolha'] == 'RN' && $cont == 0) {
	$preco1 = 40;
} elseif ($_SESSION['plano'] == 'UNIDENTISVIPBOLETO' && $cont >= 1 && $_SESSION['escolha'] == 'RN') {
	$preco1 = 35;
}

if ($_SESSION['plano'] == 'UNIDENTISVIPCARTAO' && $_SESSION['escolha'] === 'PB') {
	switch ($cont) {
		case 0:
			$preco1 = 23.90;
			break;
		default:
			$preco1 = 22.90;
			break;
	}
	
} elseif ($_SESSION['plano'] == 'UNIDENTISVIPFAMILIACARTAO' && $_SESSION['escolha'] === 'PB') {
	switch ($cont) {
		case 0:
			$preco1 = 60;
			break;
		case 1:
			$preco1 = 30; 
		default:
			$preco1 = 20;
			break;
		$preco1 = 60;
	}
}  elseif ($_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO' && $_SESSION['escolha'] == 'PB') {
	
	switch ($cont) {
		case 0:
			$preco1 = 21.90;
			break;
		case 1:
			$preco1 = 20.90; 
		default:
			$preco1 = 19.90;
			break;
	}
}
if ($_SESSION['plano'] == 'UNIDENTISVIPCARTAO' && $_SESSION['escolha'] === 'RN') {
	switch ($cont) {
		case 0:
			$preco1 = 25.90;
			break;
		default:
			$preco1 = 24.90;
			break;
	}
	
}  elseif ($_SESSION['plano'] == 'UNIDENTISVIPFAMILIACARTAO' && $_SESSION['escolha'] == 'RN') {
	switch ($cont) {
		case 0:
			$preco1 = 66;
			break;
		case 1:
			$preco1 = 33; 
		default:
			$preco1 = 22;
			break;
	}
	
}  elseif ($_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO' && $_SESSION['escolha'] == 'RN') {
	switch ($cont) {
		case 0:
			$preco1 = 25;
			break;
		case 1:
			$preco1 = 24; 
		default:
			$preco1 = 23;
			break;
	}
}

if ($_SESSION['plano'] == 'UNIDENTISVIPEMPRESARIAL') {
	$preco1 = 18;
}

$plano2 = explode();

$cont = $cont + 1;
$_SESSION['precototal'] = $cont * $preco1;

$plano = $_SESSION['plano'];
?>
<!DOCTYPE html>
<html style="background-color:#ededed !important">

<head>
	<?php include('include/head.php'); ?>

	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/responsive.dataTables.css">
	
	<!-- poppins -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;900&display=swap" rel="stylesheet">
	<style>
		/* #plano {
			background-color: #b3b3b3;
			margin-left: 5%;
			text-align: center;

		}

		@media screen and (max-device-width: 480px) {
			.data-table.stripe.hover.nowrap {
				width: 94%;
				margin-left: -2%;
			}

			#plano {
				width: 100%;
				max-width: 360px;
			}

			#h4 {
				font-size: 18px
			}
		}

		input,
		select {
			border: 1px solid #606060 !important;
		}

		.modal-header,
		.btn {
			background-color: #023bbf
		}

		.modal-title,
		.close {
			color: white;
			font-family: Poppins;
		}

		h2 {
			font-family: Poppins;
		}

		button {
			background-color: #284ebf;
		} */
		#minhaDiv {
			display: none;

		}

		.col-md-6,
		.col-md-5,
		.col-md-3,
		.col-md-4,
		.col-md-2 {
			background-color: #f6f6f6;
			padding: 4px;
			border-radius: 5px;
		}

		h5.proposta {
			font-size: .9rem;
			width: auto;
			min-width: 40%;
			margin-left: 1%;
			margin-bottom: -.25rem;
			display: flex;
			justify-content: space-between;
			font-size: .75rem;
		}

		h5.proposta>span {
			color: #606060;
			padding: 0 .5rem;
			font-size: 1.75rem;
			line-height: .5rem;
			font-weight: 300;
			position: relative;
			top: 0;
		}

		div.selectCamp {
			display: flex;
			justify-content: space-between;
			align-items: center;
			width: 100%;
			overflow: hidden;
		}

		select[name=plano] {
			max-width: 340px;
			padding-left: 0.25rem;
		}

		@media (max-width: 500px) {
			.proposta {
				font-size: .55rem !important;
				flex-wrap: wrap !important;
				margin-bottom: .15rem !important;
				justify-content: start !important;
			}

			.proposta span {
				font-size: 1rem !important;
				line-height: .5rem !important;
				padding: 0 .2rem !important;
			}

			div.selectCamp {
				flex-wrap: wrap;
				gap: 1rem;
			}
		}
	</style>
	<!-- <link rel="stylesheet" href="./assets/css/style.css"> -->
	<link rel="stylesheet" href="./assets/css/cadastro.css">
	<link rel="stylesheet" href="./assets/css/isRequired.css">
	<style>
		span.erroMsg{
			top: .25rem;
		}
	</style>
</head>

<body>
	<?php include('include/header.php');?>
	<?php include('include/sidebar.php'); ?>

	<div class="main-container" style='background-color: #eeeeee; margin-top: 1.5rem;'>
		<div class="
          pd-ltr-20
          height-100-p
          xs-pd-20-10
        ">
			<div class="min-height-200px personalData">
				<div class="page-header">
					<div class="row">
						<h5 class="proposta">
							<p style="color: #606060; font-weight: 600;">INCLUIR PROPOSTA</p> <span>|</span>VALOR TOTAL: <p id='valorPlano'> <?= $_SESSION['precototal'] ? $_SESSION['precototal'] : '0' ?></p> <span>|</span> PLANO: <p id='qPlano'> <?= $_SESSION['plano'] ?> </p> <span>|</span>BENEFICIÁRIOS: <?= $_SESSION['cont'] + 1 ?>
						</h5>
						<br>
						<div class="selectCamp pl-2 pb-2">
							<h4 id='inlineH4' style="color:#606060;white-space: nowrap;font-size: 1.65rem;">ESCOLHA O PLANO: </h4>
							<div class="col-md-10">
								<div class="form-group" style="margin: 0 !important;">
									<select name="plano" id="plano" class="form-control custom-select" style=" -webkit-appearance: none;-moz-appearance: none; appearance: none; background: url(http://www.webcis.com.br/images/imagens-noticias/select/ico-seta-appearance.gif) no-repeat; background-position: -1000px;" disabled>
										<option value="<?php echo $_SESSION['plano'] ?>"> <?php echo $_SESSION['plano'] ? $_SESSION['plano'] : 'teste' ?></option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30 divPai" style="padding: 0px 2rem; padding-top: 20px; position:relative;">
					<!--  -->
					<div class="flexLabel">
						<label class="labelInput">Cadastro de Dependente</label>
						<hr>
					</div>
					<form action="cadastrodependentessession" method="POST">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">

									<input type="text" name="nomedependente" class="form-control isRequired" placeholder="Nome Completo" minlength="10" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<input type="text" name="cpfdependente" id="cpf" formato="cpf" placeholder="CPF" class="form-control" >
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">

									<select name="parentesco" class="form-control isRequired" required>
										<option selected disabled>Selecione</option>
										<option value="3">CONJUGE</option>
										<option value="4">FILHO(A)</option>
										<option value="8">PAI/MÃE</option>
										<option value="6">ENTEADO(A)</option>
										<option value="10">OUTRO(A)</option>
									</select>
								</div>
							</div>

							<div class="col-md-2">
								<div class="form-group">

									<select name="sexodependentes" class="form-control isRequired" required>
										<option selected disabled >Selecione</option>
										<option value="1">masculino</option>
										<option value="0">feminino</option>
									</select>
								</div>
							</div>

							<!-- ! -->

							<!-- <div class="col-md-2">
									<input type="text" name="cpf_titular" formato="cpf" value="<?php //echo $_SESSION['cpf'] 
																								?>" placeholder="CPF Titular" class="form-control" Completo" readonly>
								</div> -->

							<!-- ! -->

							<div class="col-md-3">
								<div class="form-group">

									<input type="text" name="cnsdependente" class="form-control" formato="cns" placeholder="CNS-CARTAO SUS" minlength="15" maxlength="15">
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">

									<select class="form-control isRequired" name="estadodependente" required>
										<option>casado</option>
										<option>solteiro</option>
										<option>viuvo</option>
										<option>divorciado</option>
										<option selected disabled>Selecione</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">

									<input type="text" name="datadependente" id="data" placeholder="Data Nascimento" class="form-control isRequired" formato="data" required>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">

									<input type="text" name="maedependente" class="form-control isRequired" placeholder="Nome da Mãe" minlenght="10" da Mae" required>
								</div>
							</div>
						</div>
						<button type="submit" isRequired class="btn btn-primary saveBtn check">Salvar</button>
					</form>
					<?php
					if ($_SESSION['cliente'] === 'servidorpublico') {
					?>
						<br>
						<a href=javascript:history.back()><button class="btn btn-secondary" id="voltar">Voltar</button></a>
						<a href="resumo"><button class="btn btn-success" id="avanca">Avançar</button></a>

					<?php
					} else {


					?>
						<br>
						<a href=javascript:history.back()><button class="btn btn-secondary" id="voltar">Voltar</button></a>
						<a href="cadastrofotos"><button class="btn btn-success" id="avanca">Avançar</button></a>
					<?php
					}
					?>
				</div>
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30 divPai" style="padding: 20px 2rem; position:relative;">
					<!--  -->
					<div class="inline" style="display:inline">

						<div>
							<br>
							<div>
								<table class="data-table stripe hover nowrap" style="width: 105%; margin-left: -2.5%;">
									<thead>
										<tr style="background-color:#4177d0; color: #ffffff;">
											<th class="table-plus datatable-nosort">Nome</th>
											<th>CPF</th>
											<th>Valor Unitário</U></th>
											<th>Opções</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="table-plus"><?php echo $_SESSION['nome']; ?></td>
											<td class="table-plus" formato="cpf"><?php echo $_SESSION['cpf']; ?></td>
											<?php if ($_SESSION['cont'] >= 1) { ?>
												<td class="table-plus preco_tabela"> <?= $preco1 ?> </td>
											<?php } else { ?>
												<td class="table-plus table_preco"></td>
											<?php }; ?>

											<td>
												<a class="dropdown-item" href="apagardependente.php?id=<?php echo $row_usuario['id'] ?>">
												</a>
											</td>
										</tr>
										<?php
										while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {

										?>
											<tr>
												<td class="table-plus"><?php echo $row_usuario['nome']; ?></td>
												<td class="table-plus" formato="cpf"><?php echo $row_usuario['cpf']; ?></td>
												<td class="table-plus preco_tabela"><?php echo $preco1 ?></td>

												<td>
													<a class="dropdown-item" href="apagardependente.php?id=<?php echo $row_usuario['id'] ?>">
														<!-- <i class="fa fa-pencil" aria-hidden="true"></i> -->
														<i class="fa fa-trash" aria-hidden="true"></i> excluir
													</a>
												</td>
											</tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</div>

							<script>
								const valor = parseFloat(document.querySelector("#valorPlano").innerText).toLocaleString("pt-BR", {
									style: 'currency',
									currency: 'BRL'
								});
								if (document.querySelectorAll(".preco_tabela")) {
									const valor = document.querySelectorAll(".preco_tabela").forEach(element => {
										element.innerHTML = parseFloat(element.innerText).toLocaleString("pt-BR", {
											style: 'currency',
											currency: 'BRL'
										});
									})
								}

								function toBRL() {
									document.querySelector("#valorPlano").innerHTML = valor;
								}
								toBRL();
							</script>
							<!-- <button type="button" style="background-color:#284ebf;padding:1% " class="btn btn-primary" id="att" data-toggle="modal" data-target="#exampleModal">
								Cadastrar Dependentes
							</button> -->

						</div>
					</div>
				</div>
				<!-- Default Basic Forms End -->
			</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<script>
		const tablePreco = document.querySelector("td.table_preco");
		if ((window.localStorage.valor)) tablePreco.innerHTML = JSON.parse(window.localStorage.valor);
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
	<script>
		$('[formato=cpf]').mask('999.999.999-99');
		$('[formato=cnpj]').mask('99.999.999/9999-99');
		// $('[formato=telefone]').mask('(99) 99999-9999');
		$('[formato=cns]').mask('999 9999 9999 9999');
		$('[formato=data]').mask("00/00/0000");
	</script>
	<?php include('include/script.php'); ?>

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
		$('#myModal').on('shown.bs.modal', function() {
			$('#myInput').trigger('focus')
		})


		$('document').ready(function() {
			$('.data-table').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [
					[10, 25, 50, -1],
					[10, 25, 50, "All"]
				],
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
				"lengthMenu": [
					[10, 25, 50, -1],
					[10, 25, 50, "All"]
				],
				"language": {
					info: "_START_-_END_ de _TOTAL_ linhas",
					infoEmpty: "Mostrando 0 até 0 de 0 registros",
					searchPlaceholder: "Search"
				},
				dom: 'Bfrtip',
				buttons: [
					'copy', 'csv', 'pdf', 'print'
				]
			});
			var table = $('.select-row').DataTable();
			$('.select-row tbody').on('click', 'tr', function() {
				if ($(this).hasClass('selected')) {
					$(this).removeClass('selected');
				} else {
					table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
				}
			});
			var multipletable = $('.multiple-select-row').DataTable();
			$('.multiple-select-row tbody').on('click', 'tr', function() {
				$(this).toggleClass('selected');
			});
		});
	</script>
<script src="./assets/js/isRequired.js"></script>

</body>

</html>