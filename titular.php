<?php
include("conexao.php");
session_start();
if(empty($_SESSION['cpf'])){
  $_SESSION['cpf'] = $_GET['cpf'];
}
$_SESSION['cpf'] = str_replace(".", "", $_SESSION['cpf']);
$_SESSION['cpf'] = str_replace("-", "", $_SESSION['cpf']);
//consultar no banco de dados
$result_usuario = "SELECT * from dependentes where cpf_titular= '$_SESSION[cpf]'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);


$result_usuario2 = "SELECT * from dadospessoais where cpf = '$_SESSION[cpf]'";
$resultado_usuario2 = mysqli_query($conexao, $result_usuario2);
$row_usuario2 = mysqli_fetch_assoc($resultado_usuario2);
//Verificar se encontrou resultado na tabela "usuarios"

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Unidentis</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/icon.ico" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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

  <!-- =======================================================
  * Template Name: BizLand - v1.1.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:financeiro@unidentis.com.br">financeiro@unidentis.com.br</a>
        <i class="icofont-phone"></i> 83 30443025
      </div>
      <div class="social-links">
        <a href="https://twitter.com/login?lang=pt" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="https://pt-br.facebook.com/" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="https://www.instagram.com/" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="https://www.skype.com/pt-br/" class="skype"><i class="icofont-skype"></i></a>
        <a href="https://www.linkedin.com/feed/" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

     <a href="index.html"><img style="width: 38%; height: 25%;"src="http://unidentisdigital.com.br/assets/img/LOGO.png" /></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->
      <nav class="nav-menu d-none d-lg-block">
        <ul>
        <li class="active"><a href="http://unidentis.com.br">Início</a></li>
          <li><a href="http://unidentis.com.br/redecredenciada.php">Rede Credenciada</a></li>
          
          <li><a href="http://unidentis.com.br/carteirinha.php">Carteira Digital</a></li>
          <li><a href="http://unidentis.com.br/segundavia.php">Boleto</a></li>
          <li><a href="http://unidentis.com.br/tiss.html.php">Portal Tiss</a></li>
          

        </ul>
      </nav><!-- .nav-menu -->


    </div>
  </header><!-- End Header -->
  <section id="hero"  class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1>Titular /<span> Dependentes</span></h1>
      



    </div>
  </section>
  
  <section id="form3" class="d-flex align-items-center"> 
    <div class="container" data-aos="zoom-out" data-aos-delay="200">
    <h1>Titular /<span> Dependentes</span></h1>
    <h2> Plano Unidentis VIP boleto</h2>
    
     <br><br>
     <h1><span> Titular</span></h1>
     <br>
     <div class="form-check">

</div>
<br><br>
<form action="contrato2" method="POST">
       <div class="row">
       <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">CPF:</label>
           <input type="text" name="cpf" value="<?php echo $_SESSION['cpf']?>"class="form-control" placeholder="CEP"readonly>
         </div>
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Nome:</label>
           <input type="text" name="nome" value="<?php echo $row_usuario2['nome']?>" class="form-control" readonly>
         </div>
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">E-mail:</label>
           <input type="text" class="form-control" name="email" value = "<?php echo $row_usuario2['email']?>" readonly>
         </div>
         
         
         <br>
       </div>
       
       <br><br>
    
   
    <br>
     <table class="table">
  <thead>
    <tr>
        <th width="200 px" scope="col">CPF Responsável financeiro</th>
        <th width="200 px" scope="col">Dependente</th>
        <th width="200 px" scope="col">CPF Dependente</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $cont = "0";
			while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
    
            $cont++;
        ?>
			
                    <div class="table-responsive-sm">
                    <table class="table table-sm">
                    <thead>
                        <tr>
                        
                            <th width="200 px" scope="row"><?php echo $row_usuario['cpf_titular']; ?></th>
                            <th width="200 px" scope="row"><?php echo $row_usuario['nome']; ?></th>
                            <th width="200 px" scope="row"><?php echo $row_usuario['cpf']; ?></th>
                           
                           
                        </tr>
                    </thead>
            </div>
            <div class="footer">
  <p></p>
</div>

				<?php
			}?>
		</tbody>
    </table>
    <h1>Dependentes:<?php echo $cont ?></h1>
    <br><br><br>
    <?php
     if($row_usuario2['plano'] == 'UNIDENTISVIPBOLETO' && $row_usuario2['estado'] == 'PB' && $cont == 0 ){
      $preco = 40;
  }elseif($row_usuario2['plano'] == 'UNIDENTISVIPBOLETO' && $cont >= 1 && $row_usuario2['estado'] == 'PB'){
      $preco = 35;
  }elseif($row_usuario2['plano'] == 'UNIDENTISVIPEMPRESARIAL'  && $row_usuario2['estado'] == 'PB'){
      $preco =18;
  }

  if($row_usuario2['plano'] == 'UNIDENTISVIPBOLETO' && $row_usuario2['estado'] == 'RN' && $cont == 0 ){
    $preco = 40;
}elseif($row_usuario2['plano'] == 'UNIDENTISVIPBOLETO' && $cont >=1 && $row_usuario2['estado'] == 'RN'){
    $preco = 35;
}elseif($row_usuario2['plano'] == 'UNIDENTISVIPEMPRESARIAL'  && $row_usuario2['estado'] == 'RN'){
    $preco =18;
}

		$_SESSION['preco'] = $preco;
    $cont = $cont + 1;
    $precod = $cont * $preco;
    ?>
     <a href="dependentes2"><button type="button" class="btn-get-started scrollto">Cadastrar dependentes</button></a>

<br><br><br>
<style>
        iframe{
            margin-left: 50%;
            position: absolute;
            margin-top: -10%;
        }
        </style>
      <h2>Preço por Dependente R$: <?php echo $preco?>
    <h1>Valor Total R$:<span> <?php echo $precod?></span></h1><br>
    <h2>Contrato:</h2>
    <iframe src="./pdf/CONTRATO_IND_FAMILIAR.pdf" width="500" height="400"></iframe>
    <img id="img1" src="assets/img/PDF.png" style="width: 3%"> <a href="./pdf/CONTRATO_IND_FAMILIAR.pdf" target="_blank">Clique aqui para baixar a minuta do contrato.</a> <br><br>
   <img id="img1" src="assets/img/PDF.png" style="width: 3%"> <a href="./pdf/Manual_de_orientacao_para_contratacao_de_planos_de_saude.pdf" target="_blank">Clique aqui para baixar a manual de orientação.</a><br><br>
   <img id="img1" src="assets/img/PDF.png" style="width: 3%"> <a href="./pdf/GUIA_DE_LEITURA_CONTRATUAL.pdf" target="_blank">Clique aqui para baixar a guia de leitura contratatual.</a><br><br>
   <br><br>
   <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="termos" required>
  <label class="form-check-label" for="inlineCheckbox1">Li e concordo com os termos do contrato</label>
</div><br><br>
<?php 
if($row_usuario2['plano'] != 'UNIDENTISVIPEMPRESARIAL'){
?>
   <h2>Dia do vencimento:</h2>
     
     
      <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="5" required>
      <label class="form-check-label" for="inlineRadio1">5</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="10" required>
      <label class="form-check-label" for="inlineRadio2">10</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="15"  required>
      <label class="form-check-label" for="inlineRadio3">15</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="20"  required>
      <label class="form-check-label" for="inlineRadio3">20</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="25"  required>
      <label class="form-check-label" for="inlineRadio3">25</label>
    </div>
   
<?php 
}
?>
<br><br><br><br>

       <button type="submit" class="btn-get-started scrollto">Prosseguir</button>
             </div>
       
      </form>
  
   
   
   
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
   

     <!-- Template Main JS File -->
     <script src="assets/js/main.js"></script>
     <?php
    

?>  
  </html>
