<?php
include_once "conexao.php";
error_reporting(0);
session_start();
//consultar no banco de dados

if($_SESSION['usuario'] === 'cadastro@s4e.com.br'){
	$result_usuario = "SELECT * from dadospessoais where status = 'cadastro@s4e.com.br' ";
	$resultado_usuario = mysqli_query($conexao, $result_usuario);
}else{
	$result_usuario = "SELECT * from dadospessoais where status = 'Indeferido' and vendedor = '$_SESSION[usuario]' or '$_SESSION[usuario]' = 'admin' ";
	$resultado_usuario = mysqli_query($conexao, $result_usuario);
}
$result_usuario3 = "SELECT * from dadospessoais where status = 'Em Analise' and ativo = '1' ";
$resultado_usuario3 = mysqli_query($conexao, $result_usuario3);
$row_usuario3 = mysqli_fetch_assoc($resultado_usuario3);
$result_usuario2 = "SELECT * from vendedor where email = '$row_usuario3[vendedor]'";
$resultado_usuario2 = mysqli_query($conexao, $result_usuario2);
$row_usuario2 = mysqli_fetch_assoc($resultado_usuario2);
//Verificar se encontrou resultado na tabela "usuarios"

    ?>
<!DOCTYPE html>
<html>
<head>
<style>
td{
	cursor:pointer;	
}
th{
	background-color:#4177d0 ;
	color:white;
}
.nome{
	color:#606060;
	font-weight:bold
}
</style>
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
								<h4>Indeferidas</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Indeferidas</li>
								</ol>
							</nav>
						</div>
						
				</div>
				<!-- Simple Datatable start -->
				<div class="pd-20  border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h5 class="nome">Indefiridas</h5>
							
						</div>
					</div>
					<hr style="width: 85%;position: relative;margin-top: -3.2%;margin-left: 15%;font-weight:bold;height:1px;background-color:#606060;" size = "50"><br>
					<div class="row">
						<table class="data-table stripe hover nowrap">
							<thead>
								<tr>
								<th class="table-plus datatable-nosort">Nome</th>		
															
									<th>Titular</th>
									<th>Vendedor</th>
									<th>Plano</th>
									<th>Status</th>
									<th>Estado</th>
									
								
                                    <th>Data</th>	
								</tr>
							</thead>


							<tbody>

							<?php
									while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
        
        					?>
								<tr onclick="location.href = 'form-wizard.php?cpf=<?php echo $row_usuario['cpf'] ?>';" >
								<td class="table-plus"><?php echo $row_usuario['nome']; ?></td>	
													
									<td><?php echo $row_usuario['cpf']; ?></td>
									<td><?php echo $row_usuario2['vendedor']; ?></td>
									<td><?php echo $row_usuario['plano']; ?></td>
									<td><?php echo $row_usuario['status']; ?></td>
									<td><?php echo $row_usuario['estado']; ?></td>
									
					
                                    <td><?php echo $row_usuario['data']; ?></td>	
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