<style>
	.project-info.clearfix{
		padding:8px;
	}
	i{
		padding-top:28%
	}
	</style>
<?php
include_once "conexao.php";
session_start();

// Verifica se existe os dados da sessão de login
if(!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"]))
{
// Usuário não logado! Redireciona para a página de login
header("Location: login");
exit;
}


// Por último, destrerror_reporting(0);ói a sessão
error_reporting(0);
//consultar no banco de dados
if($_SESSION['usuario'] === 'cadastro@s4e.com.br'){
	$result_usuario = "SELECT COUNT(id) AS total FROM dadospessoais where status = 'Indeferido'  ";
	$resultado_usuario = mysqli_query($conexao, $result_usuario);
	$row_usuario = mysqli_fetch_assoc($resultado_usuario);
	$result_usuario1 = "SELECT COUNT(id) AS total FROM dadospessoais where status = 'Em Averbação' ";
	$resultado_usuario1 = mysqli_query($conexao, $result_usuario1);
	$row_usuario1 = mysqli_fetch_assoc($resultado_usuario1);
	$result_usuario2 = "SELECT COUNT(id) AS total FROM dadospessoais where status = 'Em Analise' ";
	$resultado_usuario2 = mysqli_query($conexao, $result_usuario2);
	$row_usuario22 = mysqli_fetch_assoc($resultado_usuario2);
	$result_usuario3 = "SELECT COUNT(id) AS total FROM dadospessoais where status = 'Cancelado'";
	$resultado_usuario3 = mysqli_query($conexao, $result_usuario3);
	$row_usuario3 = mysqli_fetch_assoc($resultado_usuario3);
	$result_usuario4 = "SELECT COUNT(id) AS total FROM dadospessoais where status = 'Implantadas'";
	$resultado_usuario4 = mysqli_query($conexao, $result_usuario4);
	$row_usuario4 = mysqli_fetch_assoc($resultado_usuario4);
	$result_usuario6 = "SELECT COUNT(id) AS total FROM dadospessoais where status = 'Pag Pendente' ";
	$resultado_usuario6 = mysqli_query($conexao, $result_usuario6);
	$row_usuario6 = mysqli_fetch_assoc($resultado_usuario6);
	$result_usuario7 = "SELECT COUNT(id) AS total FROM dadospessoais where status = 'Nova' ";
	$resultado_usuario7 = mysqli_query($conexao, $result_usuario7);
	$row_usuario7 = mysqli_fetch_assoc($resultado_usuario7);
	$result_usuario5 = "SELECT COUNT(id) AS total FROM dependentes where ativo = '1'";
	$resultado_usuario5 = mysqli_query($conexao, $result_usuario5);
	$row_usuario5 = mysqli_fetch_assoc($resultado_usuario5);	
}else{
$result_usuario = "SELECT COUNT(id) AS total FROM dadospessoais where status = 'Indeferido' and vendedor ='$_SESSION[usuario]' ";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
$result_usuario1 = "SELECT COUNT(id) AS total FROM dadospessoais where status = 'Em Averbação' and vendedor ='$_SESSION[usuario]'";
$resultado_usuario1 = mysqli_query($conexao, $result_usuario1);
$row_usuario1 = mysqli_fetch_assoc($resultado_usuario1);
$result_usuario2 = "SELECT COUNT(id) AS total FROM dadospessoais where status = 'Em Analise' and vendedor ='$_SESSION[usuario]'";
$resultado_usuario2 = mysqli_query($conexao, $result_usuario2);
$row_usuario22 = mysqli_fetch_assoc($resultado_usuario2);
$result_usuario3 = "SELECT COUNT(id) AS total FROM dadospessoais where status = 'Cancelado' and vendedor ='$_SESSION[usuario]'";
$resultado_usuario3 = mysqli_query($conexao, $result_usuario3);
$row_usuario3 = mysqli_fetch_assoc($resultado_usuario3);
$result_usuario4 = "SELECT COUNT(id) AS total FROM dadospessoais where status = 'Implantadas' and vendedor ='$_SESSION[usuario]'";
$resultado_usuario4 = mysqli_query($conexao, $result_usuario4);
$row_usuario4 = mysqli_fetch_assoc($resultado_usuario4);
$result_usuario6 = "SELECT COUNT(id) AS total FROM dadospessoais where status = 'Pag Pendente' and vendedor ='$_SESSION[usuario]'";
$resultado_usuario6 = mysqli_query($conexao, $result_usuario6);
$row_usuario6 = mysqli_fetch_assoc($resultado_usuario6);
$result_usuario7 = "SELECT COUNT(id) AS total FROM dadospessoais where status = 'Nova' and vendedor ='$_SESSION[usuario]'";
$resultado_usuario7 = mysqli_query($conexao, $result_usuario7);
$row_usuario7 = mysqli_fetch_assoc($resultado_usuario7);
$result_usuario5 = "SELECT COUNT(id) AS total FROM dependentes where vendedor = '$_SESSION[usuario]' and ativo = '1'";
$resultado_usuario5 = mysqli_query($conexao, $result_usuario5);
$row_usuario5 = mysqli_fetch_assoc($resultado_usuario5);
//Verificar se encontrou resultado na tabela "usuarios"
}
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<?php include('include/head.php'); ?>
</head>
<body style="background-color:#f6f6f6 !important;">
	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>
	<div class="main-container">
		<div  class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div style="background-color:#ededed; padding: 0 .5rem;padding-top:20px" class="row clearfix progress-box">
				
				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-5 box-shadow border-radius-5 height-50-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
							<a  href="nova">	<div class="icon box-shadow bg-blue text-white">
								<i class="fa fa-mouse-pointer" aria-hidden="true"></i>
								</div></a>
							</div>
							<div class="project-info-right">
								<span class="no text-blue weight-500 font-24"><?php echo $row_usuario7['total'] ?></span>
								<p class="weight-400 font-18">Novas</p>
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-5 box-shadow border-radius-5 height-50-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<a href="averbacao"><div class="icon box-shadow bg-light-green text-white">
									<i class="fa fa-handshake-o"></i>
								</div></a>
							</div>
							<div class="project-info-right">
								<span class="no text-light-green weight-500 font-24"><?php echo $row_usuario1['total'] ?></span>
								<p class="weight-400 font-18">Em Averbação</p>
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-5 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
							<a href="implantadas">	<div class="icon box-shadow bg-success text-white">
								<i class="fa fa-check" aria-hidden="true"></i>
								</div></a>
							</div>
							<div class="project-info-right">
								<span class="no text-green weight-500 font-24"><?php echo $row_usuario4['total'] ?></span>
								<p class="weight-400 font-18">Implantadas</p>
							</div>
						</div>
					
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-5 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<a href="indeferidas"><div class="icon box-shadow bg-danger text-white">
								<i class="fa fa-exclamation"></i>
								</div></a>
							</div>
							<div class="project-info-right">
								<span class="no text-danger weight-500 font-24"><?php echo $row_usuario['total'] ?></span>
								<p class="weight-400 font-18">Indeferidas</p>
							</div>
						</div>
						
					</div>
				</div><div class="col-lg-3 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-5 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
							<a href="pendente">	<div class="icon box-shadow bg-orange text-white">
								<i class="fa fa-money" aria-hidden="true"></i>
								</div></a>
							</div>
							<div class="project-info-right">
								<span class="no text-orange weight-500 font-24"><?php echo $row_usuario6['total'] ?></span>
								<p class="weight-400 font-18">Pag Pendente</p>
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-5 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
		    						<a href="dependentes"><div class="icon box-shadow bg-light-green text-white">
								<i class="fa fa-user-plus" aria-hidden="true"></i>
								</div></a>
							</div>
							<div class="project-info-right">
								<span class="no text-light-green weight-500 font-24"><?php echo $row_usuario5['total'] ?></span>
								<p class="weight-400 font-18">Dependentes</p>
							</div>
						</div>
						
					</div>
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-5 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<a href="analise"><div class="icon box-shadow bg-light-orange text-white">
								<i class="icon-copy fa fa-spinner" aria-hidden="true"></i>
								</div></a>
							</div>
							<div class="project-info-right">
								<span class="no text-light-orange weight-500 font-24"><?php echo $row_usuario22['total'] ?></span>
								<p class="weight-400 font-18">Em Analise</p>
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-5 box-shadow border-radius-5 margin-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
							<a href="canceladas"><div class="icon box-shadow bg-light-purple text-white">
								<i class="icon-copy fa fa-exclamation" aria-hidden="true"></i>
								</div></a>
							</div>
							<div class="project-info-right">
								<span class="no text-light-purple weight-500 font-24"><?php echo $row_usuario3['total'] ?></span>
								<p class="weight-400 font-18">Canceladas</p>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		
			
		
				</div>
			</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
	<script src="src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
	<script src="src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
	<script type="text/javascript">
		Highcharts.chart('areaspline-chart', {
			chart: {
				type: 'areaspline'
			},
			title: {
				text: ''
			},
			legend: {
				layout: 'vertical',
				align: 'left',
				verticalAlign: 'top',
				x: 70,
				y: 20,
				floating: true,
				borderWidth: 1,
				backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
			},
			xAxis: {
				categories: [
					'Monday',
					'Tuesday',
					'Wednesday',
					'Thursday',
					'Friday',
					'Saturday',
					'Sunday'
				],
				plotBands: [{
					from: 4.5,
					to: 6.5,
				}],
				gridLineDashStyle: 'longdash',
                gridLineWidth: 1,
                crosshair: true
			},
			yAxis: {
				title: {
					text: ''
				},
				gridLineDashStyle: 'longdash',
			},
			tooltip: {
				shared: true,
				valueSuffix: ' units'
			},
			credits: {
				enabled: false
			},
			plotOptions: {
				areaspline: {
					fillOpacity: 0.6
				}
			},
			series: [{
				name: 'John',
				data: [0, 5, 8, 6, 3, 10, 8],
				color: '#f5956c'
			}, {
				name: 'Jane',
				data: [0, 3, 6, 3, 7, 5, 9],
				color: '#f56767'
			}, {
				name: 'Johnny',
				data: [0, 2, 5, 3, 2, 4, 0],
				color: '#a683eb'
			}, {
				name: 'Daniel',
				data: [0, 4, 7, 3, 0, 7, 4],
				color: '#41ccba'
			}]
		});


		// Device Usage chart
		Highcharts.chart('device-usage', {
			chart: {
				type: 'pie'
			},
			title: {
				text: ''
			},
			subtitle: {
				text: ''
			},
			credits: {
				enabled: false
			},
			plotOptions: {
				series: {
					dataLabels: {
						enabled: false,
						format: '{point.name}: {point.y:.1f}%'
					}
				},
				pie: {
					innerSize: 127,
					depth: 45
				}
			},

			tooltip: {
				headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
				pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
			},
			series: [{
				name: 'Brands',
				colorByPoint: true,
				data: [{
					name: 'IE',
					y: 10,
					color: '#ecc72f'
				}, {
					name: 'Chrome',
					y: 40,
					color: '#46be8a'
				}, {
					name: 'Firefox',
					y: 30,
					color: '#f2a654'
				}, {
					name: 'Safari',
					y: 10,
					color: '#62a8ea'
				}, {
					name: 'Opera',
					y: 10,
					color: '#e14e50'
				}]
			}]
		});

		// gauge chart
		Highcharts.chart('ram', {

			chart: {
				type: 'gauge',
				plotBackgroundColor: null,
				plotBackgroundImage: null,
				plotBorderWidth: 0,
				plotShadow: false
			},
			title: {
				text: ''
			},
			credits: {
				enabled: false
			},
			pane: {
				startAngle: -150,
				endAngle: 150,
				background: [{
					borderWidth: 0,
					outerRadius: '109%'
				}, {
					borderWidth: 0,
					outerRadius: '107%'
				}, {
				}, {
					backgroundColor: '#fff',
					borderWidth: 0,
					outerRadius: '105%',
					innerRadius: '103%'
				}]
			},

			yAxis: {
				min: 0,
				max: 200,

				minorTickInterval: 'auto',
				minorTickWidth: 1,
				minorTickLength: 10,
				minorTickPosition: 'inside',
				minorTickColor: '#666',

				tickPixelInterval: 30,
				tickWidth: 2,
				tickPosition: 'inside',
				tickLength: 10,
				tickColor: '#666',
				labels: {
					step: 2,
					rotation: 'auto'
				},
				title: {
					text: 'RAM'
				},
				plotBands: [{
					from: 0,
					to: 120,
					color: '#55BF3B'
				}, {
					from: 120,
					to: 160,
					color: '#DDDF0D'
				}, {
					from: 160,
					to: 200,
					color: '#DF5353'
				}]
			},

			series: [{
				name: 'Speed',
				data: [80],
				tooltip: {
					valueSuffix: '%'
				}
			}]
		});
		Highcharts.chart('cpu', {

			chart: {
				type: 'gauge',
				plotBackgroundColor: null,
				plotBackgroundImage: null,
				plotBorderWidth: 0,
				plotShadow: false
			},
			title: {
				text: ''
			},
			credits: {
				enabled: false
			},
			pane: {
				startAngle: -150,
				endAngle: 150,
				background: [{
					borderWidth: 0,
					outerRadius: '109%'
				}, {
					borderWidth: 0,
					outerRadius: '107%'
				}, {
				}, {
					backgroundColor: '#fff',
					borderWidth: 0,
					outerRadius: '105%',
					innerRadius: '103%'
				}]
			},

			yAxis: {
				min: 0,
				max: 200,

				minorTickInterval: 'auto',
				minorTickWidth: 1,
				minorTickLength: 10,
				minorTickPosition: 'inside',
				minorTickColor: '#666',

				tickPixelInterval: 30,
				tickWidth: 2,
				tickPosition: 'inside',
				tickLength: 10,
				tickColor: '#666',
				labels: {
					step: 2,
					rotation: 'auto'
				},
				title: {
					text: 'CPU'
				},
				plotBands: [{
					from: 0,
					to: 120,
					color: '#55BF3B'
				}, {
					from: 120,
					to: 160,
					color: '#DDDF0D'
				}, {
					from: 160,
					to: 200,
					color: '#DF5353'
				}]
			},

			series: [{
				name: 'Speed',
				data: [120],
				tooltip: {
					valueSuffix: ' %'
				}
			}]
		});
	</script>
</body>
</html>