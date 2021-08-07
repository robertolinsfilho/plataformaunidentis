
<?php
include("conexao.php");
session_start();
error_reporting(0);
if($_SESSION['cpf'] === ''){
  $_SESSION['cpf'] = $_GET['cpf'];
}
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
        <i class="icofont-envelope"></i> <a href="mailto:financeiro@unidentis.com.br">financeiro@unidentis.com.br</a>
        <i class="icofont-phone"></i> 83 30443025
      </div>
      <div class="social-links">
        <a href="https://twitter.com/login?lang=pt" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="https://pt-br.facebook.com/" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="https://www.instagram.com/" class="instagram"><i class="icofont-instagram"></i></a>
        
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

     <a href="index.html"><img style="width: 38%; height: 25%;"src="http://unidentisdigital.com.br/assets/img/LOGO.png" /></a>
     
     

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
        <h1>Cadastro de<span> Pessoa Fisica</span></h1>
      



    </div>
  </section>
  
  <section id="form1" class="d-flex align-items-center"> 
    <div  class="container" data-aos="zoom-out" data-aos-delay="200">
      <?php 
       $boleto40 = $_SESSION['boleto'];

     
      if($boleto40 ==='UNIDENTIS VIP BOLETO'){          
         $dono= " ";
      }elseif($boleto40 ==='UNIDENTISVIPCARTAO'){
        $dono= "(Dono do Cartão)";
      }elseif($boleto40 ==='UNIDENTISVIPFAMILIACARTAO'){
        $dono= "(Dono do Cartão)";
      }elseif($boleto40 ==='UNIDENTISVIPUNIVERSITARIO'){
        $dono= " ";
      }elseif($boleto40 ==='UNIDENTISVIPEMPRESARIAL'){
        $dono= " ";
      }
      ?>

         <h1 id="centro" >Dados<span> Responsável Financeiro<?php echo $dono?> </span></h1>
 
    
     <form  action="enviopessoafisica" method="POST">
       <div  class="row">
         <div class="col">
       
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">CPF:</label>
           <input type="text" id="cpf" minlenght="14" name="cpf" class="form-control" placeholder="CPF"required>
         </div>
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Email:</label>
           <input type="email" class="form-control" name="email" placeholder="e-mail"required>
         </div>
       
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Plano:</label>
           <input type="text" class="form-control" value="<?php echo $_SESSION['boleto']?>"name ="plano"placeholder="senha"readonly>
         </div>
         
         <br>
       </div>
       <br>
       <div class="row">
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Nome Completo</label>
           <input type="text" name="nome" class="form-control" placeholder="Nome Completo" required>
         </div>
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Celular:</label>
           <input type="text" name="celular" id="celular" class="form-control" placeholder="celular" required>
         </div>
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Estado:</label>
          <select class="form-control" name="estado">
            <option>AC</option>
            <option>AL</option>
            <option>AP</option>
            <option>AM</option>
            <option>BA</option>
            <option>CE</option>
            <option>DF</option>
            <option>ES</option>
            <option>GO</option>
            <option>MA</option>
            <option>MT</option>
            <option>MS</option>
            <option>MG</option>
            <option>PA</option>
            <option>PB</option>
            <option>PR</option>
            <option>PE</option>
            <option>PI</option>
            <option>RJ</option>
            <option>RN</option>
            <option>RS</option>
            <option>RO</option>
            <option>RR</option>
            <option>SC</option>
            <option>SP</option>
            <option>SE</option>
            <option>TO</option>
           


          </select>
          
         </div>
         
       <div class="col">
          <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Numero do Cartao SUS</label>
         <input type="text" name="sus" class="form-control" placeholder="Numero" >
       </div>
         <br>
         
       </div>
       <br>
       <?php
       if($_SESSION['boleto'] == 'UNIDENTISVIPEMPRESARIAL'){

       
       ?>
       <div class="row">
       
       <div class="col-md-5">
       <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Matricula</label>
         <input type="text" name="matricula" class="form-control" placeholder="Matricula" required>
       </div>
       <div class="col-md-5">
       <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Data de Admissão</label>
         <input type="date" name="admissao" class="form-control" placeholder="Numero" required>
       </div>
       </div>
       <?php
       }
       ?>
        <h6>O Contratante será o beneficiário do plano ? </h6>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
          <label class="form-check-label" for="inlineCheckbox1">Sim</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
          <label class="form-check-label" for="inlineCheckbox2">Não</label>
        </div>
       <br> <br>
       <button type="submit" style="margin-left:80%"class="btn-get-started scrollto">Prosseguir</button>
       </div>
       
      
     </form>
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
  
  </html>