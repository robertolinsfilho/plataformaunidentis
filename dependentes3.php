
<?php
include("conexao.php");
session_start();


$result_usuario = "SELECT * from dependentes where cpf_titular ='$_SESSION[cpf]' and ativo = '1'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);

$result_usuario2 = "SELECT * from dadospessoais where cpf = '$_SESSION[cpf]' ";
$resultado_usuario2 = mysqli_query($conexao, $result_usuario2);
$row_usuario2 = mysqli_fetch_assoc($resultado_usuario2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Unidentis</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
<style> 
.modal { z-index:999999;}
</style>
  <!-- Favicons -->
  <link href="assets/img/icon.ico" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,500&display=swap" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script type="text/javascript">
          $("#telefone, #celular").mask("(00) 00000-0000");
        </script>
        <script type="text/javascript">
          $("#cpf").mask("000.000.000-00");
        </script>
         <script type="text/javascript">
          $("#rg").mask("0.000.000");
        </script>
          <script type="text/javascript">
          $("#data").mask("00-00-0000", {reverse: true});
          $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
        </script>
  <!-- =======================================================
  * Template Name: BizLand - v1.1.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:financeiro@unidentis.com.br">contato@unidentis.com.br</a>
        <i class="icofont-phone"></i> 83 30443000
      </div>
    
    </div>
  </div>

 
 
  
  <section id="form3" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out"  style="border: solid 4px #cccc;" data-aos-delay="100">
         <h1>Cadastro de<span> Dependente</span></h1>
         <br><br>
    <?php
    $cont =0 ;
    while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){   
$cont++;
    ?>
    
 <div style="width:max-content;height:120px; border: solid 2px #cccc;border-radius:5px;display:inline-block;margin-left:5%;margin-top:1%;-webkit-box-shadow: 9px 7px 5px rgba(50, 50, 50, 0.77);
		-moz-box-shadow:    9px 7px 5px rgba(50, 50, 50, 0.77);
		box-shadow:         9px 7px 5px rgba(50, 50, 50, 0.77);">
        <h4 id="form" style="color:black;font-size:20px;padding-top:10px;padding-left:15px;padding-right:15px;"><?php echo $row_usuario['nome']?>(<?php echo $row_usuario['cpf']?>)</h4><br>
        <a style="margin-left: 35%;" href="excluirdependente?id=<?php echo $row_usuario['id'] ?>"><button  class="btn btn-danger">Excluir</button></a>
 </div>



 <?php
    }
?>
<br><br><br>
   
     <button type="button"  style="margin-left:40%;height:60px"class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Cadastrar Dependentes
</button>
<br><br>
<br><br>
<?php 

function tirarAcentos($string){
  return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}

$_SESSION['nomeplano'] =  tirarAcentos($_SESSION['nomeplano']);
$_SESSION['nomeplano'] = str_replace(" ", "", "$_SESSION[nomeplano]");

$preco = 0;
if($_SESSION['nomeplano'] === 'UNIDENTISVIP' &&  $_SESSION['ufdependente'] === 'PB'){
    $preco = 35;
}elseif($_SESSION['nomeplano'] === 'UNIDENTISVIPUNIVERSITARIOCARTAO' &&  $_SESSION['ufdependente'] == 'PB'){
    $preco = 20.90;
}elseif($_SESSION['nomeplano'] === 'UNIDENTISVIPUNIVERSITARIOCARTAO' &&  $cont >= '1' &&  $_SESSION['ufdependente'] === 'PB'){
    $preco = 19.90;
}elseif ($_SESSION['nomeplano'] === 'UNIDENTISVIPFAMILIA'  && $_SESSION['ufdependente'] === 'PB'){
    $preco =  20.00;
}elseif($_SESSION['nomeplano'] === 'UNIDENTISVIPCARTAO' &&  $_SESSION['ufdependente'] === 'PB'){
    $preco = 22.90;
}elseif($_SESSION['nomeplano'] === 'UNIDENTISVIPCARTÃO' &&  $_SESSION['ufdependente'] === 'PB'){
  $preco = 22.90;
}



if($_SESSION['nomeplano'] === 'UNIDENTISVIPUNIVERSITARIOCARTAO'  &&  $_SESSION['ufdependente'] === 'RN'){
    $preco= 24.00;
}elseif ($_SESSION['nomeplano'] === 'UNIDENTISVIPUNIVERSITARIOCARTAO' &&  $_SESSION['ufdependente'] === 'RN' &&  $cont >= 1){
    $preco = 23.00;
}elseif ($_SESSION['nomeplano'] === 'UNIDENTISVIPFAMILIA' &&  $_SESSION['ufdependente'] === 'RN'    ){
    $preco = 22.00;
}elseif($_SESSION['nomeplano'] === 'UNIDENTISVIPCARTAO' &&  $_SESSION['ufdependente'] === 'RN'){
    $preco = 24.90;
}elseif($_SESSION['nomeplano'] === 'UNIDENTISVIPCARTÃO' &&  $_SESSION['ufdependente'] === 'RN'){
  $preco = 24.90;
}

$_SESSION['preco'] = $preco;
$preco2 = $preco;

$preco = $preco * $cont;
?>

<br>
<style>

#resumo{
	margin-left:0%;
	background-color:aliceblue;
	padding:20px;
}
</style>
<div id="resumo">
              <h2 style="font-family: 'Poppins', sans-serif;font-size:26px">Resumo da Proposta :</h2>
							<h3 style="font-family: 'Poppins', sans-serif;font-size:20px">Valor Por Dependente  R$:<?php echo $preco2?></h3>
							<hr>
							<h3 style="font-family: 'Poppins', sans-serif;font-size:20px">Taxa de Implementação: R$:00,00</h3>
							<hr>
							<h3 style="font-family: 'Poppins', sans-serif;font-size:20px">Total: R$:<?php echo $preco?></h3>
							
							</div>


<a href="enviaremaildependente" style="margin-left: 80%;" class="btn btn-primary" >
Confirmar Proposta
</a>
<br><br>
   </div>
 
   
   </section>
   
   
   </body>
   <div id="preloader"></div>
     <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
   
     <!-- Vendor JS Files -->
     <script src="assets/vendor/jquery/jquery.min.js"></script>
     <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
     <script src="assets/vendor/php-email-form/validate.js"></script>
     <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
     <script src="assets/vendor/counterup/counterup.min.js"></script>
     <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
     <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
     <script src="assets/vendor/venobox/venobox.min.js"></script>
     <script src="assets/vendor/aos/aos.js"></script>

   


     <!-- Template Main JS File -->
     <script src="assets/js/main.js"></script>
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style='max-width: 530px !important;' role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Dependentes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="dependentes4" method="POST">
      <div class="row">
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">CPF:</label>
           <input type="text" name="cpf" id="cpf"class="form-control" placeholder="CPF" >
         </div>
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Parentesco</label>
           <select name="parentesco" placeholder="selecione" class="form-control" required>
               <option value="3">CONJUGE</option>
               <option value="4">FILHO(A)</option>
               <option value="8">PAI/MÃE</option>
               <option value="6">ENTEADO(A)</option>
               <option value="10">OUTRO(A)</option>
           </select>
         </div>
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Sexo:</label>
           <select name="sexo" placeholder="selecione"class="form-control">
               <option value="1">masculino</option>
               <option value="0">feminino</option>
           </select>
         </div>
         
       </div>
       <br>
       <div class="row">
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Nome Completo</label>
           <input type="text" name="nome" class="form-control" minlength="10" placeholder="Nome Completo" required>
         </div>
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">CPF Titular:</label>
           <input type="text" name="cpf_titular" value="<?php echo $_SESSION['cpf']?>"class="form-control"  placeholder="Nome Completo" readonly>
         </div>
        
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">CNS-CARTAO SUS </label>
           <input type="text" name="cns"class="form-control" minlength="15" maxlength="15" placeholder="Numero do cartão" >
         </div>
        
        
         <br>
       </div>
       <br>
        <div class="row">
        
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Estado Civil:</label>
           <select class="form-control" placeholder="selecione" name="estadocivil" required>
         </div>
               <option>casado</option>
               <option>solteiro</option>
               <option>viuvo</option>
               <option>divorciado</option>
           </select>
         </div>
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Data Nascimento</label>
           <input type="text" name="datas" id="data"class="form-control"  placeholder="DD/MM/ANO" required>
         </div>
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Nome da Mae</label>
           <input type="text" name="mae" class="form-control" minlenght="10"  placeholder="Nome da Mae" required>
        </div>
        </div>
        <br>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<form action="" method="">
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      
         
      </div>
      <div class="modal-body">
      <img style="margin: 0 auto;" src=  "http://unidentisdigital.com.br/assets/img/LOGO.png" alt="" width="300">
            <br><br>
                <h4 style="text-align: center">Um e-mail foi enviado para <?php echo $_SESSION['emaildependente']?> com o código de confirmação da inclusão que deverá ser informado no campo abaixo</h4>
                <input class="form-control" name="codigo" title="Digite o Código"placeholder="Digite o Código"> 
      </div>
      <div class="modal-footer">
    
       <a href="incluirdependentes"> <button type="button" class="btn btn-primary">Sair</button></a>
      </div>
    </div>
  </div>
</div>
  </html>