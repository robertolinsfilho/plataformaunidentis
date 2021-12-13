<?php
include_once "conexao.php";
error_reporting(0);
session_start();
//consultar no banco de dados

if($_SESSION['usuario'] === 'cadastro@s4e.com.br'){
	$result_usuario = "SELECT * from dadospessoais where status = 'Indeferido' ";
	$resultado_usuario = mysqli_query($conexao, $result_usuario);

} elseif(!empty($_SESSION['corretora'])) {
	$result_usuario = "SELECT * from dadospessoais where status = 'Indeferido' and corretora = '$_SESSION[corretora]'   ";
	$resultado_usuario = mysqli_query($conexao, $result_usuario);

}
else{
	$result_usuario = "SELECT * from dadospessoais where status = 'Indeferido' and vendedor = '$_SESSION[usuario]'  ";
	$resultado_usuario = mysqli_query($conexao, $result_usuario);
}
$result_usuario3 = "SELECT * from dadospessoais where status = 'Em Analise' and ativo = '1' ";
$resultado_usuario3 = mysqli_query($conexao, $result_usuario3);
$row_usuario3 = mysqli_fetch_assoc($resultado_usuario3);
$result_usuario2 = "SELECT * from vendedor where email = '$row_usuario3[vendedor]'";
$resultado_usuario2 = mysqli_query($conexao, $result_usuario2);
$row_usuario2 = mysqli_fetch_assoc($resultado_usuario2);

    ?>
<!DOCTYPE html>
<html>
<style>
    @media screen and (max-width: 767px){
        div.dataTables_wrapper div.dataTables_length, div.dataTables_wrapper div.dataTables_filter, div.dataTables_wrapper div.dataTables_info, div.dataTables_wrapper div.dataTables_paginate {

            margin: 5%;
        }
    }
</style>
<head>
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
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Indeferidas</li>
								</ol>
							</nav>
						</div>
						
				</div>
				<!-- Simple Datatable start -->
				<div class="pd-20  border-radius-4 box-shadow mb-30" style="background-color: #f6f6f6;">

					<div class="flexLabel">
						<label class="labelInput">INDEFERIDAS</label>
						<hr>
					</div>
					
					<div class="row">
						<table class="data-table stripe hover nowrap">
							<thead>
								<tr>								
								<?php
										if ($_SESSION['usuario'] === 'cadastro@s4e.com.br') {
										?>

										<th>Vendedor</th>
										<th>Responsável Financeiro</th>										
										<th>CPF</th>
                                        <th>Plano</th>
										<th>Vidas</th>

										<th>Valor</th>
										<th>Status</th>
										<?php					
										} else {
										?>

										
										<th>Responsável Financeiro</th>										
										<th>CPF</th>
                                        <th>Plano</th>
										<th>Vidas</th>

										<th>Valor</th>
										<th>Status</th>	
										<?php
										}
										?>		
								</tr>
							</thead>

							<tbody>

							<?php
									while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
										$resultado_usuario4 = mysqli_query($conexao, "SELECT COUNT(forekey) as forekey from dependentes where forekey = '{$row_usuario['forekey']}'");
										$row_usuario4 = mysqli_fetch_assoc($resultado_usuario4);
										$count = (int)$row_usuario4['forekey'] + 1;
        					?>
								<tr onclick="location.href = 'form-wizard.php?key=<?= $row_usuario['forekey'] ?>';" >
								<?php
										if ($_SESSION['usuario'] === 'cadastro@s4e.com.br') {
										?>

										<td ><?php echo $row_usuario2['vendedor']; ?></td>
											<td ><?php echo $row_usuario['nome']; ?></td>
											<td cpf ><?php echo $row_usuario['cpf']; ?></td>
                                            <td><?php echo $row_usuario['plano']; ?></td>
											<td><?php echo $count; ?></td>

											<td>R$<?php echo $row_usuario['preco']; ?></td>
											<td><?php echo $row_usuario['status']; ?></td>		
										<?php					
										} else {
										?>

											<td ><?php echo $row_usuario['nome']; ?></td>
											<td cpf ><?php echo $row_usuario['cpf']; ?></td>
                                            <td><?php echo $row_usuario['plano']; ?></td>
											<td><?php echo $count; ?></td>

											<td>R$<?php echo $row_usuario['preco']; ?></td>
											<td><?php echo $row_usuario['status']; ?></td>	
										<?php
										}
										?>	
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/media/js/button/dataTables.buttons.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.bootstrap4.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.print.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.html5.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.flash.js"></script>
	<script src="src/plugins/datatables/media/js/button/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/media/js/button/vfs_fonts.js"></script>
	<script>
		$("[cpf]").mask("000.000.000-00");
		$('document').ready(function(){
			$('.data-table').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
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
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
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