
<?php
include("conexao.php");
session_start();
if(empty($_SESSION['cpf'])){
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
  <script type="text/javascript">
          $("#cep").mask("00000000");
        </script>
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
        <h1>Cadastro de<span> Pessoa Fisica</span></h1>
      



    </div>
  </section>
  
  <section id="form1" class="d-flex align-items-center"> 
    <div class="container" data-aos="zoom-out" data-aos-delay="200">
         <h1>Dados<span> de Endereço</span></h1>
 
     <br><br><br>
     <form action="envioendereco" method="POST">
       <div id ="centro" class="row">
      
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">CEP:</label>
           <input type="text" name="cep" id="cep"class="form-control" placeholder="CEP"required>
         </div>
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Rua:</label>
           <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua"required>
         </div>
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Numero:</label>
           <input type="text" class="form-control" name ="numero"placeholder="Numero"required>
         </div>
         
         <br>
       </div>
       <br>
       <div class="row">
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Bairro</label>
           <input type="text" name="bairro" id="bairro"class="form-control" placeholder="Bairo" required>
         </div>
        
         <div class="col">
            <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Cidade:</label>
            <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Ex: joao pessoa" required>
        </div>
        
         <div class="col">
          <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Estado</label>
         <input type="text" name="estado" id="uf" class="form-control" placeholder="estado" required>
       </div>
       <div class="col">
          <label style="color: blue; font-family:'Poppins', sans-serif;  " for="LabelNome">Complemento</label>
         <input type="text" name="complemento" class="form-control" placeholder="complemento">
       </div>
         <br>
       </div>
       <br><br>
       <button style="margin-left:80%"type="submit" class="btn-get-started scrollto">prosseguirr</button>
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
   <!-- Adicionando Javascript -->
   <script>

$(document).ready(function() {

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
        $("#ibge").val("");
    }
    
    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#rua").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#uf").val("...");
                $("#ibge").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                        $("#ibge").val(dados.ibge);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
});

</script>
</head>
  </html>