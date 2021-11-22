<?php
include_once "conexao.php";
error_reporting(0);
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
									<li class="breadcrumb-item active" aria-current="page">Dependentes</li>
								</ol>
							</nav>
						</div>
						
				</div>
				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

					<div class="flexLabel">
						<label class="labelInput">Dependentes</label>
						<hr>
					</div>

					<div class="row">
						<table class="data-table stripe hover nowrap">
							<thead>
								<tr>
								<th class="table-plus datatable-nosort">Nome Titular</th>		
                                  					
									<th>CPF Titular</th>
									<th>Vendendor</th>
									<th>Vidas</th>	
									<th>Data</th>
                                    <th>Status</th>
									
								</tr>
							</thead>


							<tbody>
							<?php
								//consultar no banco de dados

								$usuario = $_SESSION['usuario']; 
								$forekey = [];
								$count = 0;

								if($usuario == 'cadastro@s4e.com.br'):
									$result_usuario = "SELECT * from dependentes  where vizu = '1'";
									$resultado_usuario = mysqli_query($conexao, $result_usuario);
									
								else:
									$result_usuario = "SELECT * from dependentes where vizu = '1' and vendedor = '$usuario'";
									$resultado_usuario = mysqli_query($conexao, $result_usuario);
								endif;

								while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
									// Tratamento de data!!
									$data = date('d/m/Y', strtotime($row_usuario['data']));
									$forekey += array($row_usuario['forekey']);
									$count++;
									if($forekey[$count] == $forekey[$count - 1]){
										continue;
									};
        					?>
								<tr onclick="location.href = 'resumodependente.php?key=<?= $row_usuario['forekey'] ?>&id=<?= $row_usuario['id'] ?>';"> 
								<td class="table-plus"><?php echo $row_usuario['nome_titular']; ?></td>	
                               		
									<td><?= $row_usuario['cpf_titular']; ?> </td>
									<td><?= $row_usuario['vendedor']; ?></td>
									<td><?php
									$contadorDependentes = mysqli_query($conexao, "SELECT COUNT(*) as contador from dependentes where forekey = '{$row_usuario['forekey']}'");
									$contadorDependentes = mysqli_fetch_assoc($contadorDependentes);
									$contadorDependentes = (int)$contadorDependentes['contador'];
									echo $contadorDependentes;
									?></td>
									<td><?= $data; ?></td>	
                                    <td><?= $row_usuario['status']; ?></td>                
									
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
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
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