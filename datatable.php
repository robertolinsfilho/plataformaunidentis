<?php
include_once "conexao.php";
session_start();

error_reporting(0);


// Verifica se existe os dados da sessão de login
if (!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])) {
	// Usuário não logado! Redireciona para a página de login
	header("Location: login.php");
	exit;
}
if ($_SESSION['usuario'] === 'cadastro@s4e.com.br') {

	$result_usuario = "SELECT * from dadospessoais where ativo = '1'  ";
	$resultado_usuario = mysqli_query($conexao, $result_usuario);
	
} elseif(!empty($_SESSION['corretora'])) {
	$result_usuario = "SELECT * from dadospessoais where ativo = '1'  and corretora = '$_SESSION[corretora]'   ";
	$resultado_usuario = mysqli_query($conexao, $result_usuario);
	
}else{
    $result_usuario = "SELECT * from dadospessoais where ativo = '1'  and vendedor = '$_SESSION[usuario]'   ";
	$resultado_usuario = mysqli_query($conexao, $result_usuario);
}

$result_usuario2 = "SELECT * from vendedor where email = '$row_usuario[vendedor]'";
$resultado_usuario2 = mysqli_query($conexao, $result_usuario2);
$row_usuario2 = mysqli_fetch_assoc($resultado_usuario2);
$result_usuario4 = "SELECT COUNT(cpf) from dependentes where cpf_titular = '$row_usuario[cpf]'";
$resultado_usuario4 = mysqli_query($conexao, $result_usuario4);
$row_usuario4 = mysqli_fetch_assoc($resultado_usuario4);

//Verificar se encontrou resultado na tabela "usuarios"
header('Content-type: text/html; charset=utf-8', TRUE);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<?php include('include/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/responsive.dataTables.css">
	<link rel="stylesheet" href="./assets/css/datatable.css">
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
									<li class="breadcrumb-item active" aria-current="page">Geral</li>
								</ol>
							</nav>
						</div>

					</div>
					<!-- Simple Datatable start -->
					<div class="pd-20 border-radius-4 box-shadow mb-30" style="background-color: #f6f6f6;">

						<div class="flexLabel">
							<label class="labelInput">TODOS CLIENTES</label>
							<hr>
						</div>

						<div class="row">
							<table class="data-table stripe hover nowrap">
								<thead>
									<tr>
									<?php
										if ($_SESSION['usuario'] === 'cadastro@s4e.com.br') {
										?>
										<th>Data</th>
										<th>Vendedor</th>
										<th>Responsável Financeiro</th>										
										<th>CPF</th>
										<th>Vidas</th>
										<th>Plano</th>
										<th>Valor</th>
										<th>Status</th>
										<?php					
										} else {
										?>
										<th>Data</th>
										
										<th>Responsável Financeiro</th>										
										<th>CPF</th>
										<th>Vidas</th>
										<th>Plano</th>
										<th>Valor</th>
										<th>Status</th>	
										<?php
										}
										?>		
									</tr>
								</thead>
								<?php 
$count = $row_usuario4['COUNT(cpf)'];
$count = intval($count);
$count = $count + 1;
?>

								<tbody>

									<?php
									while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {
										if ($row_usuario['cpf_titular'] != $row_usuario['cpf']) {
											$result_usuario11 = "SELECT * from responsavel where cpf ='$row_usuario[cpf_titular]'";
											$resultado_usuario11 = mysqli_query($conexao, $result_usuario11);
											$row_usuario11 = mysqli_fetch_assoc($resultado_usuario11);
										} else {
											$result_usuario11 = "SELECT * from dadospessoais where cpf ='$cpf'";
											$resultado_usuario11 = mysqli_query($conexao, $result_usuario11);
											$row_usuario11 = mysqli_fetch_assoc($resultado_usuario11);
										}
									?>

										<tr onclick="location.href = 'form-wizard.php?cpf=<?php echo $row_usuario['cpf'] ?>';">
										<?php
										if ($_SESSION['usuario'] === 'cadastro@s4e.com.br') {
										?>
										<td><?php echo $row_usuario['data']; ?></td>
										<td ><?php echo $row_usuario['vendedor']; ?></td>
											<td ><?php echo $row_usuario['nome']; ?></td>
											<td><?php echo $row_usuario['cpf']; ?></td>
											<td><?php echo $count; ?></td>											
											<td><?php echo $row_usuario['plano']; ?></td>
											<td><?php echo $row_usuario['preco']; ?></td>
											<td><?php echo $row_usuario['status']; ?></td>		
										<?php					
										} else {
										?>
										<td><?php echo $row_usuario['data']; ?></td>
											<td ><?php echo $row_usuario['nome']; ?></td>
											<td><?php echo $row_usuario['cpf']; ?></td>
											<td><?php echo $count; ?></td>											
											<td><?php echo $row_usuario['plano']; ?></td>
											<td><?php echo $row_usuario['preco']; ?></td>
											<td><?php echo $row_usuario['status']; ?></td>	
										<?php
										}
										?>	
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
					<!-- Simple Datatable End -->
					<!-- multiple select row Datatable start -->

					<!-- multiple select row Datatable End -->
					<!-- Export Datatable start -->

					<!-- Export Datatable End -->
				</div>
				<?php include('include/footer.php'); ?>
			</div>
		</div>
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
						lengthMenu: "Mostrar _MENU_ registros",
						paginate: {
							first: "Primeiro",
							previous: "Anterior",
							next: "Seguinte"

						},

					},
					dom: 'Bfrtip',
					buttons: [
						'copy', 'csv', 'excel', 'pdf', 'print'
					],
					"lengthMenu": [
						[10, 25, 50, -1],
						[10, 25, 50, "All"]
					],
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
						"info": "_START_-_END_ of _TOTAL_ entries",
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
</body>

</html>