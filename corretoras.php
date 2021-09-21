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

$result_usuario = "SELECT * from corretora";
$resultado_usuario = mysqli_query($conexao, $result_usuario);



//consultar no banco de dados


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
								<h4>Geral</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Geral</li>
								</ol>
							</nav>
						</div>

					</div>
					<a href="cadastrocorretora"><button style="margin-left:81%;" class="btn btn-primary">Cadastrar Corretora</button></a>

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


										<th>Corretora</th>
										<th>Responsavel</th>
										<th>Email</th>

										<th class="datatable-nosort">Acão</th>

									</tr>
								</thead>


								<tbody>

									<?php
									while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {

									?>
										<tr>


											<td><?php echo $row_usuario['corretora']; ?></td>
											<td><?php echo $row_usuario['responsavel']; ?></td>
											<td><?php echo $row_usuario['email']; ?></td>
											<td>
												<div class="dropdown">
													<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
														<i class="fa fa-ellipsis-h"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-left">

														<a class="dropdown-item" href="form-wizard3.php?id=<?php echo $row_usuario['id'] ?>"><i class="fa fa-pencil"></i> Editar</a>

													</div>
												</div>
											</td>


										</tr>
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
						"info": "_START_-_END_ of _TOTAL_ entries",
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