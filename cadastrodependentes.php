<?php
session_start();
if(!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"]))
{
// Usuário não logado! Redireciona para a página de login
header("Location: login");
exit;
}
error_reporting(0);
ini_set(“display_errors”, 0 );
include_once('conexao.php');
$_SESSION['cpf'] = str_replace(".", "", $_SESSION['cpf']);
$_SESSION['cpf'] = str_replace("-", "", $_SESSION['cpf']);
$result_usuario = "SELECT * from dependentes where cpf_titular ='$_SESSION[cpf]'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$result_usuario2 = "SELECT COUNT(*)  AS total from dependentes where cpf_titular ='$_SESSION[cpf]'";
$resultado_usuario2 = mysqli_query($conexao, $result_usuario2);
$row_usuario2 = mysqli_fetch_assoc($resultado_usuario2);
$url = "http://unidentis.s4e.com.br/SYS/services/vendedor.aspx/NovoUsuario?token=rHFxpzIE8Ny86TNhgGzoybf93bcIopkXxqKdfShdgUbdpoALw0&id=1&cpf=. '$cpf' .&tipo=0";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$resultado = json_decode(curl_exec($curl),true);
$cont = $row_usuario2['total'];
$_SESSION['cont'] = $cont;

if($_SESSION['plano'] == 'UNIDENTISVIPBOLETO' ){
	$preco = 40.00;
  }
 
if($_SESSION['plano'] == 'UNIDENTISVIPCARTAO' && $_SESSION['uf'] === 'PB' ){
	$preco = 23.90;
}elseif($_SESSION['plano'] == 'UNIDENTISVIPFAMILIACARTAO'  && $_SESSION['uf'] === 'PB'){
	$preco = 60.00;
}elseif($_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO' &&  $_SESSION['uf'] == 'PB'){
	$preco = 21.90;
}if($_SESSION['plano'] == 'UNIDENTISVIPCARTAO' && $_SESSION['uf'] === 'RN' ){
	$preco = 25.90;
}elseif($_SESSION['plano'] == 'UNIDENTISVIPFAMILIACARTAO' && $cont == 0 && $_SESSION['uf'] == 'RN'){
	$preco = 66.00;
}elseif($_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO' && $cont == 0 && $_SESSION['uf'] == 'RN'){
	$preco = 25.00;
}

if($_SESSION['plano'] == 'UNIDENTISVIPBOLETO' && $_SESSION['uf'] == 'PB' && $cont == 0 ){
	$preco1 = 40;
  }elseif($_SESSION['plano'] == 'UNIDENTISVIPBOLETO' && $cont >= 1 && $_SESSION['uf'] == 'PB'){
      $preco1 = 35;
  }elseif($_SESSION['plano'] == 'UNIDENTISVIPEMPRESARIAL'  && $_SESSION['uf'] == 'PB'){
      $preco1 =18;
  }
 
  if($_SESSION['plano'] == 'UNIDENTISVIPBOLETO' && $_SESSION['uf'] == 'RN' && $cont == 0 ){
    $preco1 = 40;
	}elseif($_SESSION['plano'] == 'UNIDENTISVIPBOLETO' && $cont >=1 && $_SESSION['uf'] == 'RN'){
    $preco1 = 35;
	}elseif($_SESSION['plano'] == 'UNIDENTISVIPEMPRESARIAL'  && $_SESSION['uf'] == 'RN'){
    $preco1 =18;
}

if($_SESSION['plano'] == 'UNIDENTISVIPCARTAO' && $_SESSION['uf'] === 'PB' && $cont == 0){
	$preco1 = 23.90;
	}elseif($_SESSION['plano'] == 'UNIDENTISVIPCARTAO' && $_SESSION['uf']== 'PB' && $cont >= 1) { 
		$preco1 = 22.90;
	}elseif($_SESSION['plano'] == 'UNIDENTISVIPFAMILIACARTAO' && $cont == 0 && $_SESSION['uf'] === 'PB'){
		$preco1 = 60;
	}elseif($_SESSION['plano'] == 'UNIDENTISVIPFAMILIACARTAO' && $cont == 1 && $_SESSION['uf'] == 'PB'){
		$preco1 =30;
	}elseif($_SESSION['plano'] == 'UNIDENTISVIPFAMILIACARTAO' && $cont >= 2 && $_SESSION['uf'] == 'PB'){
		$preco1 = 20;
	}elseif($_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO' && $cont == 0 && $_SESSION['uf'] == 'PB'){
		$preco1 = 21.90;
	}elseif($_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO' && $cont == 1 && $_SESSION['uf']== 'PB'){
		$preco1 = 20.90;
	}elseif($_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO' && $cont >= 2 && $_SESSION['uf'] == 'PB'){
		$preco1 = 19.90;
	}
	if($_SESSION['plano'] == 'UNIDENTISVIPCARTAO' && $_SESSION['uf'] === 'RN' && $cont == 0 ){
		$preco1 = 25.90;
	}elseif($_SESSION['plano'] == 'UNIDENTISVIPCARTAO' && $_SESSION['uf'] == 'RN' && $cont >= 1) { 
		$preco1 = 24.90;
	}
	elseif($_SESSION['plano'] == 'UNIDENTISVIPFAMILIACARTAO' && $cont == 0 && $_SESSION['uf'] == 'RN'){
		$preco1 = 66;
	}elseif($_SESSION['plano'] == 'UNIDENTISVIPFAMILIACARTAO' && $cont == 1 && $_SESSION['uf'] == 'RN'){
		$preco1 =33;
	}elseif($_SESSION['plano'] == 'UNIDENTISVIPFAMILIACARTAO' && $cont >= 2 && $_SESSION['uf'] == 'RN'){
		$preco1 = 22;
	}elseif($_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO' && $cont == 0 && $_SESSION['uf'] == 'RN'){
		$preco1 = 25;
	}elseif($_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO' && $cont == 1 && $_SESSION['uf'] == 'RN'){
		$preco1 = 24;
	}elseif($_SESSION['plano'] == 'UNIDENTISVIPUNIVERSITARIOCARTAO' && $cont >= 2 && $_SESSION['uf'] == 'RN'){
		$preco1 = 23;
	}




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
	<style>
		#plano{
		background-color:#b3b3b3
		;margin-left:5%;
		text-align:center;
		
	}
	 @media screen and (max-device-width: 480px) {
		.data-table.stripe.hover.nowrap{
		width:94%;
		margin-left:-2%;
	}
	#plano{
		
		width:50%
	}
	#h4{
		font-size:18px
	}
}
	
	input, select{
    	border: 1px solid #606060 !important; 
    }
	.modal-header, .btn{
    background-color:#023bbf
	}
	.modal-title, .close{
	color:white;
	font-family:Poppins;
	}
	h2{
		font-family:Poppins;
	}

	button{
		background-color:#284ebf ;
	}
		
	</style>
	<link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>
	<div class="main-container">
		<div style="background-color: #ededed !important;"class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
					<?php echo '<h5 style="font-size:17px;font-weight:bold;width:120%;margin-left:2%;color:#606060">INCLUIR PROPOSTA | VALOR TOTAL : '.$_SESSION['precototal'] .' | PLANO : ' .  $_SESSION['plano'] .' | DEPENDENTES :  '. $_SESSION['cont'] .  '</h5>'?> 
					<br>
					<div class="inline" style="display:-webkit-inline-box;margin-left:2%;margin-top:1%">
					<h4 id="h4"style="color:#606060;padding-top:7px; ">Escolha o Plano :</h4>
					<input id ="plano" class="form-control" value="<?php echo $_SESSION['plano']?>" readonly>
					<br>
	</div>
               
					<div class="col-md-6 col-sm-12">
							<div class="title">
							
							</div>
							<br>
						</div>
						
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div style="margin-top:1%"class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				<div class="inline" style="display:inline">
					<div class="clearfix">
						<div class="pull-left">
							<h4 style="color:#606060;font-weight:bold">Incluir Dependentes</h4>

						</div>
						<br>
					</div>
					<br>
						<hr style="width: 78%;position: relative;margin-top: -3.5%;margin-left: 23%;font-weight:bold;height:1px;background-color:#606060;" size = "50">
         		<div>
				 <br>
					<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 style="color:#606060;font-weight:bold">Todos os Dependentes</h4>
						
						</div>
					</div>
					<br>
       

					<div class="row">
						<table  class="data-table stripe hover nowrap">
							<thead>
								<tr style="background-color:#4177d0 ">
									<th style="padding-left:5%" class="table-plus datatable-nosort">Nome</th>							
									<th style="padding-left:5%">CPF</th>
									<th style="padding-left:10%">Valor Unitário</U></th>
									<th style="padding-left:5%">Opções</th>	
									
								</tr>
							</thead>


							<tbody>
							
							<?php
									while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
										
        					?>
								<tr>
								<td class="table-plus"><?php echo $row_usuario['nome']; ?></td>	
								<td class="table-plus"><?php echo $row_usuario['cpf']; ?></td>	
								<td class="table-plus">R$ <?php echo $preco1 ?></td>				
								

									
									<td><a class="dropdown-item" href="apagardependente.php?id=<?php echo $row_usuario['id'] ?>"><i class="fa fa-pencil"></i> Apagar</a></td>	
								</tr>
								<?php 
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
                <button type="button" style="background-color:#284ebf;padding:1% " class="btn btn-primary" id="att" data-toggle="modal" data-target="#exampleModal">
  Cadastrar Dependentes
</button>
<style>
			#avanca{
				margin-left: 80%;
				width: 20% ; 
				background-color:#3284f1;
			}
			 @media screen and (max-device-width:1000px) {
				#avanca {
				margin-left: 65%;
			    width: 30% ;
				background-color:#3284f1;
				margin-top: 6%
				}
				#att{
					margin-left: 11%;
				}
			}
	</style>
<?php
if($_SESSION['cliente'] === 'servidorpublico'){
?>	
<br>
<a href="resumo" ><button class="btn btn-success" id="avanca" >Avançar </button></a>

<?php
}else{


?>
<br>
<a href="cadastrofotos" ><button class="btn btn-success" id="avanca">Avançar</button></a>
<?php
}
?>
						</div>
					</div>
				</div>
				<!-- Default Basic Forms End -->

               
<!-- Modal -->
<div
  class="modal fade"
  id="exampleModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5
          class="modal-title"
          style="font-weight: bold; font-size: 18px"
          id="exampleModalLabel"
        >
          UNIDENTIS
        </h5>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <script
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"
      ></script>
      <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"
      ></script>
      <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"
      ></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

      <div class="modal-body">
        <h4 style="color: #606060; font-weight: bold;">
          CADASTRAR DEPENDENTE
        </h4>
        <br />
        <form method="POST" action="cadastrodependentessession">
          <div class="row">
            <link href="assets/css/style.css" rel="stylesheet" />
            <script type="text/javascript">
              $("#telefone, #celular").mask("(00) 00000-0000");
            </script>
            <script type="text/javascript">
              $("#cpf").mask("000.000.000-00");
            </script>
            <script type="text/javascript">
              $("#data").mask("00-00-0000", { reverse: true });
            </script>

            <div class="col-md-6">
              <div class="form-group">
                <select class="form-control" name="parentesco">
                  <option value="3">Conjuge</option>
                  <option value="4">Filho</option>
                  <option value="8">Pai/Mae</option>
                  <option value="6">Enteado</option>
                  <option value="10">Outro</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input
                  type="text"
                  name="nomedependente"
                  class="form-control"
                  placeholder="Nome Completo"
                  required
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  name="cpfdependente"
                  placeholder="CPF"
                  id="cpf"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input
                  type="text"
                  name="datadependente"
                  class="form-control"
                  id="data"
                  placeholder="Data de Nascimento"
                  required
                />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <select class="form-control" name="estadodependente">
                  <option value="Solteiro">Solteiro</option>
                  <option value="Casado">Casado</option>
                  <option value="Viúvo">Viúvo</option>
                  <option value="Separado">Separado</option>
                  <option value="Divorciado">Divorciado</option>
                  <option value="Relação Estavel">DRelação Estavel</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <select class="form-control" name="sexodependentes">
                  <option value="1">Masculino</option>
                  <option value="0">Feminino</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  name="maedependente"
                  placeholder="Mãe"
                  required
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input
                  type="text"
                  name="cnsdependente"
                  class="form-control"
                  placeholder="Cartão do sus"
                />
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="prosseguir">Cadastrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
		
		
				
					
				<!-- Form grid End -->

				<!-- Input Validation Start -->
				
					
					
				<!-- Input Validation End -->

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
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})


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