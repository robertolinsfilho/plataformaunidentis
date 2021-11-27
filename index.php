<style>
	.project-info.clearfix {
		padding: 8px;
	}

	.main-container i {
		padding-top: 29% !important;
	}
</style>
<?php
include_once "conexao.php";
session_start();

$_SESSION['URL_ATUAL']= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// Verifica se existe os dados da sessão de login
if (!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])) {
	// Usuário não logado! Redireciona para a página de login
	header("Location: login");
	exit;
}


// Por último, destrerror_reporting(0);ói a sessão
error_reporting(0);
//consultar no banco de dados
if ($_SESSION['usuario'] === 'cadastro@s4e.com.br') {
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
} else {
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
	$result_usuario5 = "SELECT COUNT(id) AS total FROM dependentes where vendedor = '$_SESSION[usuario]' and vizu = '1'";
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
	<link rel="stylesheet" href="assets/css/chart.css">
</head>

<body>
	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="row clearfix progress-box py-3">

				<div class="col-lg-3 col-md-6 col-sm-12 mb-30 showBtnChart">
					<div class="bg-white pd-5 box-shadow border-radius-5 height-50-p">
						<a href="nova">
							<div class="project-info clearfix">
								<div class="project-info-left">
									<div class="icon box-shadow bg-blue text-white">
										<i class="fa fa-mouse-pointer" aria-hidden="true"></i>
									</div>
								</div>
								<div class="project-info-right">
									<span class="no text-blue weight-500 font-24"><?php echo $row_usuario7['total'] ?></span>
									<p class="weight-400 font-18">Novas</p>
									
								</div>
							</div>
						</a>
						<?php if($_SESSION['usuario'] != 'cadastro@s4e.com.br') :?>
						<div status= 'Novas' class="openChart novas">
								<i class="fa fa-area-chart text-blue" aria-hidden="true"></i>
						</div>
						<?php endif;?>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-5 box-shadow border-radius-5 height-50-p">
						<a href="averbacao">
							<div class="project-info clearfix">
								<div class="project-info-left">

									<div class="icon box-shadow bg-light-green text-white">
										<i class="fa fa-handshake-o"></i>
									</div>

								</div>
								<div class="project-info-right">
									<span class="no text-light-green weight-500 font-24"><?php echo $row_usuario1['total'] ?></span>
									<p class="weight-400 font-18">Em Averbação</p>
								</div>
							</div>
						</a>

					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 mb-30 showBtnChart">
					<div class="bg-white pd-5 box-shadow border-radius-5 height-100-p">
						<a href="implantadas">
							<div class="project-info clearfix">
								<div class="project-info-left">

									<div class="icon box-shadow bg-success text-white">
										<i class="fa fa-check" aria-hidden="true"></i>
									</div>

								</div>
								<div class="project-info-right">
									<span class="no text-green weight-500 font-24"><?php echo $row_usuario4['total'] ?></span>
									<p class="weight-400 font-18">Implantadas</p>
								</div>
							</div>
						</a>
						<?php if($_SESSION['usuario'] != 'cadastro@s4e.com.br') :?>
						<div status= 'Implantadas' class="openChart implantadas">
								<i class="fa fa-area-chart text-green" aria-hidden="true"></i>
						</div>
						<?php endif;?>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 mb-30 showBtnChart">
					<div class="bg-white pd-5 box-shadow border-radius-5 height-100-p">
						<a href="indeferidas">
							<div class="project-info clearfix">
								<div class="project-info-left">

									<div class="icon box-shadow bg-danger text-white">
										<i class="fa fa-exclamation"></i>
									</div>
								</div>
								<div class="project-info-right">
									<span class="no text-danger weight-500 font-24"><?php echo $row_usuario['total'] ?></span>
									<p class="weight-400 font-18">Indeferidas</p>
								</div>
							</div>
						</a>
						<?php if($_SESSION['usuario'] != 'cadastro@s4e.com.br') :?>
						<div status= 'Indeferido' class="openChart indeferido">
								<i class="fa fa-area-chart text-danger" aria-hidden="true"></i>
						</div>
						<?php endif;?>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 mb-30 showBtnChart">
					<div class="bg-white pd-5 box-shadow border-radius-5 height-100-p">
						<a href="pendente">

							<div class="project-info clearfix">
								<div class="project-info-left">
									<div class="icon box-shadow bg-orange text-white">
										<i class="fa fa-money" aria-hidden="true"></i>
									</div>
								</div>
								
								<div class="project-info-right">
									<span class="no text-orange weight-500 font-24"><?php echo $row_usuario6['total'] ?></span>
									<p class="weight-400 font-18">Pag Pendente</p>
								</div>
							</div>
						</a>
						<?php if($_SESSION['usuario'] != 'cadastro@s4e.com.br') :?>
						<div status= 'PagPendente' class="openChart pag-pendente">
								<i class="fa fa-area-chart text-orange" aria-hidden="true"></i>
						</div>
						<?php endif;?>
					</div>
				</div>
				<!--  -->
				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-5 box-shadow border-radius-5 height-100-p">
						<a href="dependentes">
							<div class="project-info clearfix">
								<div class="project-info-left">

									<div class="icon box-shadow bg-light-green text-white">
										<i class="fa fa-user-plus" aria-hidden="true"></i>
									</div>

								</div>
								<div class="project-info-right">
									<span class="no text-light-green weight-500 font-24"><?php echo $row_usuario5['total'] ?></span>
									<p class="weight-400 font-18">Dependentes</p>
								</div>
							</div>
						</a>

					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-12 mb-30 showBtnChart">
					<div class="bg-white pd-5 box-shadow border-radius-5 height-100-p">
						<a href="analise">
							<div class="project-info clearfix">
								<div class="project-info-left">

									<div class="icon box-shadow bg-light-orange text-white">
										<i class="icon-copy fa fa-spinner" aria-hidden="true"></i>
									</div>

								</div>
								<div class="project-info-right">
									<span class="no text-light-orange weight-500 font-24"><?php echo $row_usuario22['total'] ?></span>
									<p class="weight-400 font-18">Em Analise</p>
								</div>
							</div>
						</a>
						<?php if($_SESSION['usuario'] != 'cadastro@s4e.com.br') :?>
						<div status='EmAnalise' class="openChart em-analise">
								<i class="fa fa-area-chart text-light-orange" aria-hidden="true"></i>
						</div>
						<?php endif;?>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 mb-30 showBtnChart">
					<div class="bg-white pd-5 box-shadow border-radius-5 height-100-p">
						<a href="canceladas">
							<div class="project-info clearfix">
								<div class="project-info-left">

									<div class="icon box-shadow bg-light-purple text-white">
										<i class="icon-copy fa fa-exclamation" aria-hidden="true"></i>
									</div>

								</div>
								<div class="project-info-right">
									<span class="no text-light-purple weight-500 font-24"><?php echo $row_usuario3['total'] ?></span>
									<p class="weight-400 font-18">Canceladas</p>
								</div>
							</div>
						</a>
						<?php if($_SESSION['usuario'] != 'cadastro@s4e.com.br') :?>
						<div status= 'Canceladas' class="openChart canceladas">
								<i class="fa fa-area-chart text-light-purple" aria-hidden="true"></i>
						</div>
						<?php endif;?>
					</div>
				</div>
			</div>
			<div id="chart" class="row clearfix progress-box py-3 pd-5 px-3">
				<div class="col-lg-12 col-md-12 col-sm-11 mb-30 bg-white pd-30 m-auto">
					<select class="form-control" name="select" id="dia">
						<option value="7" selected>7 dias</option>
						<option value="15">15 dias</option>
						<option value="30">30 dias</option>
					</select>
					<section>
						<div id="loader">
							
						</div>
						<div>
							<canvas id="myLineChart"></canvas>
						</div>
					</section>
				</div>
			</div>


		</div>
	</div>
	<?php include('include/footer.php'); ?>
	</div>
	</div>
	<?php include('include/script.php'); ?>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="assets/js/graficoIndex.js"></script>

	
</body>

</html>