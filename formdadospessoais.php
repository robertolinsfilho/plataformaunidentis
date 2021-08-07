
<?php
include("conexao.php");
session_start();
if(empty($_SESSION['cpf'])){
  $_SESSION['cpf'] = $_GET['cpf'];
}
?>
<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
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
 <!-- ======= Top Bar ======= -->
 <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:contato@unidentis.com.br">contato@unidentis.com.br</a>
        <i class="icofont-phone"></i> 83 30443000
        <i class="icofont-ambulance"></i> <a data-toggle="modal" style="background-color:  #023bbf" class="btn"data-target="#exampleModal" >Urgência e Emergência</a>
        <i class="icofont-certificate-alt-1"></i> <a data-toggle="modal" style="background-color:  #023bbf" class="btn" data-target="#exampleModal1" >Imposto de Renda</a>
      </div>
      <div class="social-links">
        
        <a href="https://pt-br.facebook.com/unidentisplanoodontologico" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="https://www.instagram.com/unidentisplanoodontologico/?hl=en" class="instagram"><i class="icofont-instagram"></i></a>
       
        <a href="https://www.linkedin.com/company/unidentis-assitencia-odontologica-ltda/?originalSubdomain=br" class="linkedin"><i class="icofont-linkedin"></i></a>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">LOCALIZAÇÃO DAS CLÍNICAS </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <h4> Paraíba</h4>
         RUA DOUTOR OSÓRIO ABATH, N° 46, TORRE, JOÃO PESSOA-PB, CEP - 58040-750.<br>
         <h5>Contato Via WhatsApp:</h5>
          <a href="https://api.whatsapp.com/send/?phone=5583986176071&text&app_absent=0">Clique aqui</a><br><br><br>
         <h4>Rio Grande Do Norte </h4>
         HOSPITAL RIO GRANDE , N° 754, TIROL, NATAL- RN, CEP - 59020-100.<BR>
          <h5>Telefone: 84 4009-1000</h5> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
     
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Primeiro Acesso</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5> ACESSE COM O NÚMERO DO CPF DO TITULAR DO PLANO E A SENHA INICIAL 1234 </h5>
          <br>
          


        </div>
        <div class="modal-footer">
         <a href="https://unidentis.s4e.com.br/SYS/?TipoUsuario=1"> <button type="button" class="btn btn-secondary" >Acessar</button></a>

        </div>
      </div>
    </div>
  </div>
  <style>
    #blip-chat-container #blip-chat-open-iframe {background-color: red; width: 8%;max-width: 100px;max-height: 100px;}

    @media screen and (max-width: 480px), screen and (max-height: 420px) {
        #blip-chat-container #blip-chat-open-iframe {background-color: red; width: 30%;max-width: 100px;max-height: 100px;}
    }

</style>

    <script src="https://unpkg.com/blip-chat-widget@1.6.*" type="text/javascript">
    </script>
    <script>
        (function () {
            window.onload = function () {

                new BlipChat()
                .withAppKey('dW5pZGVudGlzOjU1YWE1MzYzLTRjYWQtNDNiMC1iZmFhLTc4MzBkMjA4OGY4MA==')
                .withButton({"color":"#023BBF","icon":"https://s3-sa-east-1.amazonaws.com/msging.net/iris/Media_23d982b2-566d-47b2-b21a-2d46b14ac37d"})
                .withCustomCommonUrl('https://chat.blip.ai/')
                .build();
            }
        })();
    </script> 
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

     <a href="index.html"><img style="width: 38%; height: 25%;"src="http://unidentisdigital.com.br/assets/img/LOGO.png" /></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.html">Início</a></li>
          <li><a href="redecredenciada.php">Rede Credenciada</a></li>
       
          <li><a href="carteirinha.php">Carteira Digital</a></li>
     
          <li><a href="segundavia.php">Boleto</a></li>
          <li><a href="tiss.html">Portal Tiss</a></li>
        

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
  <section id="hero"  class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1>Cadastro de<span> Pessoa Fisica</span></h1>
      



    </div>
  </section>
  
  <section id="form3" class="d-flex align-items-center"> 
    <div  class="container" data-aos="zoom-out" data-aos-delay="200">
         <h1>Dados<span> Pessoais</span></h1>
 

     <form action="enviodadospessoais" method="POST">
     <br>
       <div id="centro" class="row">
     
       
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Sexo:</label>
           <select name="sexo" placeholder="selecione"class="form-control">
               <option value="1">Masculino</option>
               <option value="0">Feminino</option>
           </select>
         </div>
         
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Whats's App:</label>
           <input type="text" name="whats" minlenght="15"id="celular"class="form-control" placeholder="Whats's App:" required>
         </div>
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">RG:</label>
           <input type="text" name="rg" class="form-control"  placeholder="RG" required>
         </div>
       </div>
       <br>
    
       
        
        
    
     
     
        <div class="row">
      
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Estado Civil:</label>
           <select class="form-control" placeholder="selecione" name="estadocivil">
               <option  value="Casado(a)">Casado(a)</option>
               <option value="Solteiro(a)">Solteiro(a)</option>
               <option value="Viuvo(a)">Viuvo(a)</option>
               <option value="Divorciado(a)">Divorciado(a)</option>
           </select>
         </div>
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Data Nascimento</label>
           <input type="text" name="datas" id="data"class="form-control"  placeholder="DD/MM/ANO" required>
         </div>
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Orgao Expedidor</label>
           <input type="text" name="expedidor" class="form-control"  placeholder="Orgao Expedidor" required>
        </div>
        </div>
        <br>
        <div class="row">
       
            <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Nome da Mae</label>
           <input type="text" name="mae" class="form-control"  placeholder="Nome da Mae" required>
        </div>
        <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Telefone fixo</label>
           <input type="text" name="fixo" class="form-control"  placeholder="Telefone Fixo" >
        </div>
        </div>        
       <br><br>
       <button type="submit" style="margin-left:80%" class="btn-get-started scrollto">prosseguir</button>
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